<?php namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use Session;
use App\User;

class PasswordController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id, Request $request) {

        $this->verify();
        $user = $request->user();
        return view('profile.password', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id, Request $request) {
        $user = $request->user();

        $this->validate($request, [
            'password' => 'required|confirmed|min:6',
        ]);

        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user->fill($input)->save();

        Session::flash('flash_message', 'Password successfully updated!');

        return redirect()->to("/" . $user->username);
    }

}
