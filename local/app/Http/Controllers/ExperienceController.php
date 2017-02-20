<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class ExperienceController extends Controller {

    public function getLinks() {
        $links = [
            'info' => [
                'label' => 'Your local experience',
                'route' => 'info'
            ],
            'pricing' => [
                'label' => 'Pricing & availability',
                'route' => 'pricing'
            ],
            'images' => [
                'label' => 'Add images',
                'route' => 'images'
            ],
            'last' => [
                'label' => 'Submit your experience',
                'route' => 'last'
            ]
        ];
        
        return $links;
    }

}
