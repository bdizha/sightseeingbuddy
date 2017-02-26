<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class ExperienceController extends Controller {

    public function getLinks($experience = null) {

        $action = empty($experience) ? "create" : "edit";
        $parameters = empty($experience) ? [] : ["id" => $experience->id];

        $links = [
            'info' => [
                'label' => 'Your local experience',
                'route' => route("info.{$action}", $parameters)
            ],
            'pricing' => [
                'label' => 'Pricing & availability',
                'route' => route("pricing.{$action}", $parameters)
            ],
            'images' => [
                'label' => 'Add images',
                'route' => route("images.{$action}", $parameters)
            ],
            'last' => [
                'label' => 'Submit your experience',
                'route' => route("last.{$action}", $parameters)
            ]
        ];

        return $links;
    }

}
