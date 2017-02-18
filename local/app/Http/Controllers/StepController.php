<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class StepController extends Controller {

    public function getLinks() {
        $links = [
            'introduction' => [
                'label' => 'Introduction',
                'url' => '/local/step/introduction'
            ],
            'location' => [
                'label' => 'Your Locations',
                'url' => '/local/step/location'
            ],
            'wallet' => [
                'label' => 'Payment Details',
                'url' => '/local/step/payments'
            ],
            'contact' => [
                'label' => 'Contact Information',
                'url' => '/local/step/contact'
            ]
        ];
        
        return $links;
    }

}
