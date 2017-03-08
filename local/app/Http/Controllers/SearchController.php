<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Experience;
use App\ExperienceCategory;

class SearchController extends Controller {

    public function index(Request $request) {
        $query = Experience::orderBy("teaser", "ASC");
        $experiences = $query->get();
        
        $categories = ExperienceCategory::where("level", "=", "main")->get();
        
        $user = Auth::user();
        if(Auth::guest()){
            $user = new User();
            $user->first_name = "You";
            $user->last_name = "";
            $user->email = "you@example.com";
            $user->introduction = new \App\Introduction;
        }
        
        return view("search.index", [
            "experiences" => $experiences,
            "categories" => $categories,
            "user" => $user
        ]);
    }

}
