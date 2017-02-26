<?php

namespace App\Http\Controllers\Experience;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ExperienceController;
use Session;
use App\ExperienceGallery;
use App\Experience;

class ImagesController extends ExperienceController {

    protected $next_step = "last";
    protected $cur_step = "images";
    protected $prev_step = "pricing";

    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(Request $request) {
        $gallery = new ExperienceGallery();
        $user = Auth::user();

        $links = $this->getLinks();

        return view('experience.images.add', [
            'gallery' => $gallery,
            'experience' => new Experience(),
            'links' => $links,
            'user' => $user
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request) {

        $user = Auth::user();
        $images = new ExperienceGallery();
        $images->user_id = $user->id;

        return $this->save($images, $request);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return Response
     */
    public function edit($id, Request $request) {
        $gallery = ExperienceGallery::where('experience_id', '=', $id)->first();
        $user = Auth::user();

        $links = $this->getLinks();

        return view('experience.images.edit', [
            'gallery' => $gallery,
            'experience' => new Experience(),
            'links' => $links,
            'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @return Response
     */
    public function update($id, Request $request) {
        $images = ExperienceController::where('id', '=', $id)->first();
        return $this->save($images, $request);
    }

    private function save($images, $request) {

        $fields = [
            'name' => 'required|max:255'
        ];

        $user = Auth::user();
        $isMore = $request->input('is_more');

        if (empty($isMore)) {
            $imagessCount = ExperienceController::where('user_id', '=', $user->id)->count();

            if (!empty($imagessCount)) {
                return redirect(url("/profile/{$user->username}"));
            }
        }

        $this->validate($request, $fields);
        $input = $request->all();

        $images->fill($input)->save();

        Session::flash('flash_message', 'ExperienceController successfully saved!');

        $route = $isMore ? $this->cur_step : $this->next_step;
        return redirect(route("{$route}.create"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id) {
        $images = ExperienceController::findOrFail($id);
        $images->delete();

        Session::flash('flash_message', 'ExperienceController successfully deleted!');
        return redirect(route("{$this->cur_step}.create"));
    }

}
