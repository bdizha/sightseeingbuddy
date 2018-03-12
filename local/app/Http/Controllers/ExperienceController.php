<?php

namespace App\Http\Controllers;

use App\Experience;
use Carbon\Carbon;

class ExperienceController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth', ['except' => ["show", "date"]]);
    }

    public function show($slug)
    {
        $experience = Experience::where('slug', '=', $slug)->first();

        $gallery = [];

        $totalImages = $experience->gallery->count();
        foreach ($experience->gallery as $key => $image) {
            $count = ($key + 1);
            $item = [
                "URL" => $image->image,
                "options" => [
                    "thumbnail" => $image->image
                ],
                "caption" => "{$count}/{$totalImages}: #{$count} {$experience->teaser}"
            ];

            $gallery[] = $item;
        }

        $user = $experience->user;
        $user->image = $this->getImage('/pages/imager?w=200&h=200&url=' . $user->image);
        $experience->cover_image = $this->getImage('/pages/imager?w=550&h=320&url=' . $experience->cover_image);

        $reviews = $experience->reviews;

        return view('experience.show', [
            'experience' => $experience,
            'gallery' => $gallery,
            'user' => $user,
            'extras' => $this->getExras(),
            'reviews' => $reviews
        ]);
    }

    public function schedule($id)
    {
        $experience = Experience::where('id', '=', $id)->first();

        $user = $experience->user;
        $user->image = $this->getImage('/pages/imager?w=200&h=200&url=' . $user->image);

        return view('experience.schedule', [
            'experience' => $experience,
            'user' => $user
        ]);
    }

    public function date($timestamp)
    {
        $date = Carbon::createFromTimestamp($timestamp);
        die(json_encode(['date' => $date->format("d/m/Y")]));
    }

    public function getLinks($experience = null)
    {

        $action = empty($experience) ? "create" : "edit";
        $parameters = empty($experience) ? [] : ["id" => $experience->id];

        $links = [
            'info' => [
                'label' => 'Your local experience',
                'route' => route("info.{$action}", $parameters),
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

    public function getExras()
    {
        $extras = [
            [
                'label' => 'Pickup',
                'name' => 'extra_pickup',
                'items' => [
                    [
                        'label' => 'Free of charge',
                        'value' => 1
                    ],
                    [
                        'label' => 'Extra charges',
                        'value' => 2
                    ],
                    [
                        'label' => 'Not included',
                        'value' => 3
                    ]
                ]
            ],
            [
                'label' => 'Food & beverages',
                'name' => 'extra_food',
                'items' => [
                    [
                        'label' => 'Free of charge',
                        'value' => 1
                    ],
                    [
                        'label' => 'Extra charges',
                        'value' => 2
                    ],
                    [
                        'label' => 'Not included',
                        'value' => 3
                    ]
                ]
            ],
            [
                'label' => 'Miscellaneous',
                'name' => 'extra_misc',
                'items' => [
                    [
                        'label' => 'Free of charge',
                        'value' => 1
                    ],
                    [
                        'label' => 'Extra charges',
                        'value' => 2
                    ],
                    [
                        'label' => 'Not included',
                        'value' => 3
                    ]
                ]
            ]
        ];

        return $extras;
    }

}
