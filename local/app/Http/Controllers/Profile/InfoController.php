<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\User;

class InfoController extends Controller {

    public function __construct() {
        $this->middleware('auth', ['except' => 'nav']);
    }

    public function show($username) {
        $user = User::where('username', '=', $username)->first();

        if ($user) {
            return view('profile.dashboard', ['user' => $user]);
        } else {
            return redirect()->to('/login');
        }
    }
    
    /**
     * Show the application's top nav.
     *
     * @return \Illuminate\Http\Response
     */
    public function nav() {
        return view('auth.partials.nav');
    }

    public function experiences() {
        $user = Auth::user();
        $experiences = [];
        return view('profile.experiences', ['user' => $user, 'experiences' => $experiences]);
    }

}
