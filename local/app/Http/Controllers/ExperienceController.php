<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Experience;
use Carbon\Carbon;
use Craft\Exception;

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
        foreach ($experience->gallery as $key => $image) {
            try {
                $transformedImage = file_get_contents(url("/") . '/pages/imager?url=' . $image->image);
                if ($transformedImage) {
                    $gallery[] = $transformedImage;
                }
            } catch (\Exception $e) {
            }
        }

        $user = $experience->user;
        try {
            $user->image = file_get_contents(url("/") . '/pages/imager?w=200&h=200&url=' . $user->image);
        } catch (\Exception $e) {
            dd($e);
        }

        try {
            $experience->cover_image = file_get_contents(url("/") . '/pages/imager?w=550&h=320&url=' . $experience->cover_image);
        } catch (\Exception $e) {
            $experience->cover_image = null;
        }
        return view('experience.show', [
            'experience' => $experience,
            'gallery' => $gallery,
            'user' => $user,
            'extras' => $this->getExras()
        ]);
    }

    public function schedule($id)
    {
        $experience = Experience::where('id', '=', $id)->first();

        $user = $experience->user;
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
