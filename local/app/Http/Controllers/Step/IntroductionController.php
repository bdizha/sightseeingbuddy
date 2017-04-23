<?php

namespace App\Http\Controllers\Step;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\StepController;
use App\Events\LocalWelcome;
use App\Events\LocalVerify;
use Session;
use App\Images\UploadHandler;
use App\User;
use Imgix\UrlBuilder;

class IntroductionController extends StepController {

    protected $next_step = "location";
    protected $cur_step = "introduction";
    protected $prev_step = null;

    public function __construct() {
        $this->middleware('auth', ['except' => ["create", "store", "upload"]]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(Request $request) {
        $user = new User();

        $links = $this->getLinks($user);

        return view('step.introduction.add', [
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
        return $this->save(new User(), true, $request);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return Response
     */
    public function edit($id, Request $request) {
        $user = User::find($id);

        $links = $this->getLinks($user);

        return view('step.introduction.edit', [
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
        $user = User::find($id);
        return $this->save($user, false, $request);
    }

    private function save($user, $notifyUser, $request) {

        $builder = new UrlBuilder("keepitlocal.imgix.net");

        $fields = [
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'password' => 'required|min:6|confirmed',
            'image' => 'required',
            'type' => 'required',
            'gender' => 'required',
            'id_number' => 'required',
            'mobile' => 'required|max:255',
            'telephone' => 'max:255',
            'reason' => 'required',
            'description' => 'required'
        ];

        if(!empty($user->id)){
            unset($fields['password']);
        }

        $this->validate($request, $fields);
        $input = $request->all();

        $input['password'] = bcrypt($input['password']);

        $imGix = str_replace("/files/", "", urlencode($input['image']));
        $params = array("w" => 200, "h" => 200);
        $input['image'] = $builder->createURL($imGix, $params);

        $user->fill($input)->save();

        if($notifyUser) {
            event(new LocalWelcome($user));
            event(new LocalVerify($user));
        }

        Session::flash('flash_message', 'Introduction successfully saved!');

        Auth::guard()->login($user);

        return redirect(route("{$this->next_step}.edit", ["id" => $user->id]));
    }

    public function upload(Request $request) {
        new UploadHandler();
    }

}
