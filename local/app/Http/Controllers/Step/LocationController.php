<?php

namespace App\Http\Controllers\Step;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\StepController;
use Session;

class LocationController extends StepController {
    
    protected $next_step = "wallet";
    protected $cur_step = "location";
    protected $prev_step = "introduction";

    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(Request $request) {
        $location = new Location();
        $user = Auth::user();

        $location = Location::where('user_id', '=', $user->id)->get();

        return view('step.location.add', ['location' => $location, 'location' => $location, 'user' => $user]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request) {

        $user = Auth::user();
        $location = new Location();
        $location->user_id = $user->id;

        return $this->save($location, $request);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return Response
     */
    public function edit($id, Request $request) {
        
        $location = Location::where('id', '=', $id)->first();
        $user = Auth::user();

        $location = Location::where('user_id', '=', $user->id)
                        ->where('id', '!=', $id)->get();

        return view('step.location.edit', ['location' => $location, 'location' => $location, 'user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @return Response
     */
    public function update($id, Request $request) {
        $location = Location::where('id', '=', $id)->first();
        return $this->save($location, $request);
    }

    private function save($location, $request) {

        $fields = [
            'name' => 'required|max:255',
            'qualification' => 'required|max:255',
            'start_year' => 'required|max:6',
            'start_month' => 'required|max:6',
        ];

        $user = Auth::user();
        $isMore = $request->input('is_more');
        if (empty($isMore)) {
            $locationCount = Location::where('user_id', '=', $user->id)->count();

            if (!empty($locationCount)) {
                return redirect(route("{$this->next_step}.create"));
            }
        }

        $isCurrent = $request->input('is_current');
        if (empty($isCurrent)) {
            $fields['end_year'] = 'required|max:6';
            $fields['end_month'] = 'required|max:6';
        }

        $this->validate($request, $fields);
        $input = $request->all();

        $location->fill($input)->save();

        Session::flash('flash_message', 'Location successfully saved!');

        $route = $isMore ? $this->cur_step : $this->next_step;

        return redirect(route("{$route}.create"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id) {
        $location = Location::findOrFail($id);
        $location->delete();

        Session::flash('flash_message', 'Location successfully deleted!');        
        return redirect(route("{$this->cur_step}.create"));
    }

}
