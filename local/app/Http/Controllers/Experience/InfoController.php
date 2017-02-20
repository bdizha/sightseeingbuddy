<?php

namespace App\Http\Controllers\Experience;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ExperienceController;
use Session;
use App\Experience;

class InfoController extends ExperienceController {

    protected $next_step = "experience";
    protected $cur_step = "info";
    protected $prev_step = "last";

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

        return view('experience.info.add', [
            'experience' => $experience,
            'user' => $user,
            'links' => $links
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

        return view('experience.info.edit', [
            'experience' => $experience,
            'user' => $user,
            'links' => $links
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
            'image' => 'required|max:6',
            'gender' => 'required|max:10',
            'id_number' => 'required|max:6',
            'reason' => 'required|max:6',
            'description' => 'required|max:6',
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

        $company = Company::where("name", "=", $input["company"])->first();

        if (empty($company["name"]) && !empty($input["company"])) {
            $company = Company::create([
                        'name' => $input["company"]
            ]);
        }

        $input["company_id"] = $company->id;
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
