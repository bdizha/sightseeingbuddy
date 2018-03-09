<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class AuthController extends Controller
{

    public function getLinks()
    {
        $links = [
            'find' => [
                'label' => 'Sign up',
                'route' => 'register',
                'sub_label' => 'Find a buddy'
            ],
            'become' => [
                'label' => 'Sign up',
                'route' => 'introduction.create',
                'sub_label' => 'Become a buddy'
            ],
            'login' => [
                'label' => 'Log in',
                'route' => 'login',
                'sub_label' => 'Access my account'
            ]
        ];

        return $links;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function become(Request $request)
    {
        $links = $this->getLinks();
        return view('auth.become', ['links' => $links]);
    }

}
