<?php

namespace App\Http\Controllers\Step;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\StepController;
use Session;
use App\Location;

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

        $links = $this->getLinks($user);

        return view('step.location.add', [
            'location' => $location,
            'links' => $links,
            'user' => $user
        ]);
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
        $user = Auth::user();

        $location = Location::firstOrNew(['user_id' => $user->id]);

        $links = $this->getLinks($user);

        return view('step.location.edit', [
            'location' => $location,
            'links' => $links,
            'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @return Response
     */
    public function update($id, Request $request) {
        $user = Auth::user();
        $location = Location::firstOrNew(['user_id' => $user->id]);
        return $this->save($location, $request);
    }

    private function save($location, $request) {

        $fields = [
            'country_id' => 'required|max:255',
            'city_id' => 'required|max:255',
            'street_address' => 'required|max:255',
            'postal_code' => 'required|max:255',
        ];

        $this->validate($request, $fields);
        $input = $request->all();

        $location->fill($input)->save();

        Session::flash('flash_message', 'Location successfully saved!');

        $user = Auth::user();

        return redirect(route("{$this->next_step}.edit", ["id" => $user->id]));
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
