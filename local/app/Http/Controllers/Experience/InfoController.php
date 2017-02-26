<?php

namespace App\Http\Controllers\Experience;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ExperienceController;
use Session;
use App\Experience;
use App\City;
use App\ExperienceHighlight;
use App\ExperienceActivity;
use App\ExperienceLanguage;
use App\Language;
use App\ExperienceCategory;

class InfoController extends ExperienceController {

    protected $next_step = "pricing";
    protected $cur_step = "info";
    protected $prev_step = "last";

    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(Request $request) {
        $experience = new Experience();
        $user = Auth::user();

        $links = $this->getLinks();

        return view('experience.info.add', [
            'experience' => $experience,
            'user' => $user,
            'links' => $links,
            'extras' => $this->getExras()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request) {

        $user = Auth::user();
        $experience = new Experience();
        $experience->user_id = $user->id;

        return $this->save($experience, $request);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return Response
     */
    public function edit($id, Request $request) {
        $experience = Experience::where('id', '=', $id)->first();
        $user = Auth::user();

        $links = $this->getLinks($experience);

        return view('experience.info.edit', [
            'experience' => $experience,
            'user' => $user,
            'links' => $links,
            'extras' => $this->getExras()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @return Response
     */
    public function update($id, Request $request) {
        $experience = Experience::where('id', '=', $id)->first();
        return $this->save($experience, $request);
    }

    private function save($experience, $request) {

        $fields = [
            'country_id' => 'required|max:255',
            'city' => 'required|max:255',
            'street_address' => 'required|max:255',
            'postal_code' => 'required|max:255',
            'languages' => 'required',
            'activities' => 'required',
            'highlights' => 'required',
            'duration' => 'required',
            'units' => 'required',
            'category_id' => 'required|max:255',
            'sub_category' => 'required|max:255',
            'description' => 'required|max:1024',
            'extra_pickup' => 'required|max:1',
            'extra_food' => 'required|max:1',
            'extra_misc' => 'required|max:1'
        ];

        $this->validate($request, $fields);
        $input = $request->all();

        $city = City::updateOrCreate(
                        [
                            'country_id' => $input['country_id'],
                            "name" => trim($input["city"])
        ]);

        $input["city_id"] = $city->id;

        $categoryArray = [
            "level" => "sub",
            "name" => trim($input["sub_category"])
        ];
        $subCategory = ExperienceCategory::updateOrCreate($categoryArray);

        $input["sub_category_id"] = $subCategory->id;
        $experience->fill($input)->save();

        // set languages
        foreach ($input['languages'] as $language) {
            $language = Language::updateOrCreate(['name' => $language]);
            ExperienceLanguage::updateOrCreate([
                'experience_id' => $experience->id,
                'language_id' => $language->id
            ]);
        }

        // set highlights
        foreach ($input['highlights'] as $highlight) {
            ExperienceHighlight::updateOrCreate([
                'description' => $highlight,
                'experience_id' => $experience->id
            ]);
        }

        // set activities
        foreach ($input['activities'] as $activity) {
            ExperienceActivity::updateOrCreate([
                'description' => $activity,
                'experience_id' => $experience->id
            ]);
        }

        Session::flash('flash_message', 'Experience successfully saved!');

        return redirect(route("{$this->next_step}.edit", ['id' => $experience->id]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id) {
        $experience = Experience::findOrFail($id);
        $experience->delete();

        Session::flash('flash_message', 'Experience successfully deleted!');
        return redirect(route("{$this->cur_step}.create"));
    }

    public function getExras() {
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
