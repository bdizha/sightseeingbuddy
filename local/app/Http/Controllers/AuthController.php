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
                'sub_label' => $type == "local" ? 'become a buddy' : 'Become a guest & find a buddy'
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
