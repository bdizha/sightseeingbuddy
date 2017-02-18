<?php namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use Session;
use App\User;
use Viraj\Hawkeye\HawkeyeFacade as Hawkeye;

class PhotoController extends Controller {

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
        return view('profile.photo', ['user' => $user]);
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
            'media' => 'required|max:500',
        ]);

        $input = $request->all();

        if (!empty($input["media"])) {
            $files = Hawkeye::upload('media')->resize()->get();
            $input["media"] = $files["separated"][0]["original"];
        }

        $user->fill($input)->save();

        return redirect()->to("/" . $user->username);
    }

}
