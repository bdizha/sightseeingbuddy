<?php namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use Session;
use App\User;
use App\City;
use App\Province;

class SettingsController extends Controller {

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
        $user = $request->user();

        $this->verify();

        $countries = [];
        $cities = City::lists('name', 'id');

        return view('profile.edit', ['user' => $user, 'countries' => $countries, 'cities' => $cities]);
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
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $id,
            'username' => 'required|max:255|unique:users,username,' . $id,
            'mobile' => 'required|max:255',
            'gender' => 'required'
        ]);

        $input = $request->all();
        
        $user->fill($input)->save();

        Session::flash('flash_message', 'Profile successfully updated!');

        return redirect()->to("/settings/{$user->id}/edit");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id) {
        // deactivate the user here.
    }

}
