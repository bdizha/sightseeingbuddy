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
     * Show the form for editing the specified resource.
     *
     * @return Response
     */
    public function edit($id, Request $request) {

        $experience = Experience::where('id', '=', $id)->first();
        $user = Auth::user();
        $links = $this->getLinks($experience);
        
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
            'terms' => 'required|max:2'
        ];

        $this->validate($request, $fields);

        Session::flash('flash_message', 'Experience successfully saved!');

        return redirect(url("/local/experience/" . $experience->id));
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
