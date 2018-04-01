<?php

namespace App\Http\Controllers\Step;

use App\Events\LocalVerify;
use App\Events\AdminVerify;
use App\Http\Controllers\StepController;
use App\Images\UploadHandler;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;

class IntroductionController extends StepController
{

    protected $next_step = "location";
    protected $cur_step = "introduction";
    protected $prev_step = null;

    public function __construct()
    {
        $this->middleware('auth', ['except' => ["create", "store", "upload"]]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(Request $request)
    {
        $user = new User();

        $links = $this->getLinks($user);

        return view('step.introduction.add', [
            'user' => $user,
            'links' => $links,
            'index' => 1
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        return $this->save(new User(), true, $request);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return Response
     */
    public function edit($id, Request $request)
    {
        $user = User::find($id);
        $links = $this->getLinks($user);

        return view('step.introduction.edit', [
            'user' => $user,
            'links' => $links,
            'index' => 1
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @return Response
     */
    public function update($id, Request $request)
    {
        $user = User::find($id);
        return $this->save($user, false, $request);
    }

    private function save($user, $notifyUser, $request)
    {
        $fields = [
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'mobile' => 'required|max:20',
            'password' => 'required|min:6|confirmed',
            'image' => 'required',
            'type' => 'required',
            'gender' => 'required',
            'id_number' => 'required',
            'telephone' => 'max:20',
            'reason' => 'required',
            'description' => 'required'
        ];

        $input = $request->all();

        $this->validate($request, $fields);

        if (!empty($input['password'])) {
            $input['salt'] = $input['password'];
            $input['password'] = bcrypt($input['password']);
        }

        $user->fill($input)->save();

        if ($notifyUser) {
            event(new AdminVerify($user));
            event(new LocalVerify($user));
        }

        Session::flash('flash_message', 'Introduction successfully saved!');

        Auth::guard()->login($user);

        return redirect(route("{$this->next_step}.edit", ["id" => $user->id]));
    }

    public function upload(Request $request)
    {
        new UploadHandler();
    }

}
