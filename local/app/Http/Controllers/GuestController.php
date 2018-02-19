<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\User;

class GuestController extends Controller {

    protected $next_step = "location";
    protected $cur_step = "introduction";
    protected $prev_step = null;

    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return Response
     */
    public function edit($id, Request $request) {
        $user = User::find($id);

        return view('guest.edit', [
            'user' => $user
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
        $fields = [
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'mobile' => 'required|max:255|unique:users,mobile,' . $user->id,
            'password' => 'required|min:6|confirmed',
            'country_id' => 'required',
            'type' => 'required',
        ];

        $input = $request->all();

        if(!empty($user->id) && $input['password'] == $input['password_confirmation']){
            unset($fields['password']);
        }

        if(!empty($input['password'])){
            $input['password'] = bcrypt($input['password']);
        }

        $this->validate($request, $fields);

        $user->fill($input)->save();

        Session::flash('flash_message', 'Profile successfully saved!');

        return redirect('/local/dashboard');
    }

}
