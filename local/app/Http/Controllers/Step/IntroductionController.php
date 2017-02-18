<?php

namespace App\Http\Controllers\Step;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\StepController;
use Session;
use App\Introduction;
use App\Company;

class IntroductionController extends StepController {

    protected $next_step = "location";
    protected $cur_step = "introduction";
    protected $prev_step = null;

    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(Request $request) {
        $introduction = new Introduction();
        $user = Auth::user();

        return view('step.introduction.add', ['introduction' => $introduction, 'user' => $user]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request) {

        $user = Auth::user();
        $introduction = new Introduction();
        $introduction->user_id = $user->id;

        return $this->save($introduction, $request);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return Response
     */
    public function edit($id, Request $request) {
        $introduction = Introduction::where('id', '=', $id)->first();
        $user = Auth::user();

        return view('step.introduction.edit', ['introduction' => $introduction, 'user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @return Response
     */
    public function update($id, Request $request) {
        $introduction = Introduction::where('id', '=', $id)->first();
        return $this->save($introduction, $request);
    }

    private function save($introduction, $request) {

        $fields = [
            'position' => 'required|max:255',
            'company' => 'required|max:255',
            'start_year' => 'required|max:6',
            'start_month' => 'required|max:6',
        ];

        $user = Auth::user();
        $isMore = $request->input('is_more');
        if (empty($isMore)) {
            $introductionCount = Introduction::where('user_id', '=', $user->id)->count();

            if (!empty($introductionCount)) {
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
        $introduction->fill($input)->save();

        Session::flash('flash_message', 'Introduction successfully saved!');

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
        $introduction = Introduction::findOrFail($id);
        $introduction->delete();

        Session::flash('flash_message', 'Introduction successfully deleted!');        
        return redirect(route("{$this->cur_step}.create"));
    }

}
