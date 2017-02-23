<?php

namespace App\Http\Controllers\Step;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\StepController;
use Session;
use App\Introduction;
use App\Images\UploadHandler;

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

        $links = $this->getLinks($user);

        return view('step.introduction.add', [
            'introduction' => $introduction,
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
        $user = Auth::user();
        $introduction = Introduction::firstOrNew(['user_id' => $user->id]);

        $links = $this->getLinks($user);

        return view('step.introduction.edit', [
            'introduction' => $introduction,
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
        $user = Auth::user();
        $introduction = Introduction::firstOrNew(['user_id' => $user->id]);
        return $this->save($introduction, $request);
    }

    private function save($introduction, $request) {
        
        $fields = [
            'image' => 'required',
            'id_number' => 'required',
            'reason' => 'required',
            'description' => 'required',
        ];

        $this->validate($request, $fields);
        $input = $request->all();

        $userInput = [
            'first_name' => $input['first_name'],
            'last_name' => $input['last_name']
        ];

        unset($input['first_name'], $input['last_name']);

        $user = Auth::user();
        $user->fill($userInput)->save();

        $introduction->fill($input)->save();

        Session::flash('flash_message', 'Introduction successfully saved!');

        return redirect(route("{$this->next_step}.edit", ["id" => $user->id]));
    }

    public function upload(Request $request) {
        new UploadHandler();
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
