<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Experience;

class ExperienceController extends Controller {

    public function show($id) {
        $experience = Experience::where('id', '=', $id)->first();

        $user = $experience->user;
        return view('experience.show', [
            'experience' => $experience,
            'user' => $user
        ]);
    }

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
