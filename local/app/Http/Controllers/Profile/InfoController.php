<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\User;
use Session;

class InfoController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['nav', 'show']]);
    }

    public function show($username)
    {
        $user = User::where('username', '=', $username)->first();

        if (!empty($_GET["verify"])) {
            $verify = $_GET['verify'];

            if ($verify == "true") {
                Session::flash('flash_message', 'You\'ve successfully verified this profile!');
                $user->is_verified = true;
            }

            if ($verify === "false") {
                Session::flash('flash_message', 'You\'ve successfully declined this profile!');
                $user->is_verified = false;
            }

            $user->save();
        }

        try {
            $user->image = file_get_contents(url("/") . '/pages/imager?w=200&h=200&url=' . $user->image);
        } catch (\Exception $e) {
        }

        $experiences = $user->experiences;
        foreach ($experiences as $key => $experience) {
            try {
                $experiences[$key]->cover_image = file_get_contents(url("/") . '/pages/imager?w=550&h=320&url=' . $experience->cover_image);
            } catch (\Exception $e) {
            }
        }

        if ($user) {
            return view('profile.dashboard', [
                'user' => $user,
                'experiences' => $experiences
            ]);
        } else {
            return redirect()->to('/login');
        }
    }

    /**
     * Show the application's top nav.
     *
     * @return \Illuminate\Http\Response
     */
    public function nav()
    {
        return view('auth.partials.nav');
    }

    public function experiences()
    {
        $user = Auth::user();
        $experiences = [];
        return view('profile.experiences', ['user' => $user, 'experiences' => $experiences]);
    }

}
