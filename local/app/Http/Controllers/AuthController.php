<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class AuthController extends Controller {

    public function getLinks() {

        $type = !empty($_GET['type']) ? $_GET['type'] : "";
        $links = [
            'register' => [
                'label' => 'Sign up',
                'route' => 'register',
                'sub_label' => $type == "local" ? 'Become a local' : 'Become a guest & find a local'
            ],
            'login' => [
                'label' => 'Log in',
                'route' => 'login',
                'sub_label' => 'Access my account'
            ]
        ];
        
        return $links;
    }

}
