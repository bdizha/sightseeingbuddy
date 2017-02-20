<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\User;

class InfoController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function show($id) {
        $user = User::where('id', '=', $id)->first();

        if ($user) {
            return view('profile.dashboard', ['user' => $user]);
        } else {
            return redirect()->to('/login');
        }
    }

    public function experiences() {
        $user = Auth::user();
        $experiences = [];
        return view('profile.experiences', ['user' => $user, 'experiences' => $experiences]);
    }

}
