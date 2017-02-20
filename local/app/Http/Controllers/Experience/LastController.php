<?php

namespace App\Http\Controllers\Experience;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ExperienceController;
use Session;
use App\Experience;

class LastController extends ExperienceController {

    protected $next_step = null;
    protected $cur_step = "last";
    protected $prev_step = "images";

    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(Request $request) {
        $experience = new Experience();
        $user = Auth::user();

        $links = $this->getLinks();

        return view('experience.last.add', [
            'experience' => $experience,
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
        $experience = new Experience();
        $experience->user_id = $user->id;

        return $this->save($experience, $request);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return Response
     */
    public function edit($id, Request $request) {

        $experience = Experience::where('id', '=', $id)->first();
        $user = Auth::user();
        $links = $this->getLinks();
        
        return view('experience.last.edit', [
            'experience' => $experience,
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
        $experience = Experience::where('id', '=', $id)->first();
        return $this->save($experience, $request);
    }

    private function save($experience, $request) {

        $fields = [
            'name' => 'required|max:255',
            'qualification' => 'required|max:255',
            'start_year' => 'required|max:6',
            'start_month' => 'required|max:6',
        ];

        $user = Auth::user();
        $isMore = $request->input('is_more');
        if (empty($isMore)) {
            $experienceCount = Experience::where('user_id', '=', $user->id)->count();

            if (!empty($experienceCount)) {
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

        $experience->fill($input)->save();

        Session::flash('flash_message', 'Experience successfully saved!');

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
        $experience = Experience::findOrFail($id);
        $experience->delete();

        Session::flash('flash_message', 'Experience successfully deleted!');
        return redirect(route("{$this->cur_step}.create"));
    }

}
