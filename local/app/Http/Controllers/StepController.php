<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class StepController extends Controller {

    public function getLinks() {
        $links = [
            'introduction' => [
                'label' => 'Introduction',
                'route' => 'introduction'
            ],
            'location' => [
                'label' => 'Your Locations',
                'route' => 'location'
            ],
            'wallet' => [
                'label' => 'Payment Details',
                'route' => 'wallet'
            ],
            'contact' => [
                'label' => 'Contact Information',
                'route' => 'contact'
            ]
        ];
        
        return $links;
    }

}
