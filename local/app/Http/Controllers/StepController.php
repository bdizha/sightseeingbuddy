<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class StepController extends Controller {

    public function getLinks($user = null) {

        $action = empty($user) ? "create" : "edit";
        $parameters = empty($user) ? [] : ["id" => $user->id];
        
        $links = [
            'introduction' => [
                'label' => 'Introduction',
                'route' => route("introduction.{$action}", $parameters)
            ],
            'location' => [
                'label' => 'Your Locations',
                'route' => route("location.{$action}", $parameters)
            ],
            'wallet' => [
                'label' => 'Payment Details',
                'route' => route("wallet.{$action}", $parameters)
            ]
        ];

        return $links;
    }

}
