<?php

namespace App\Http\Controllers\Experience;

use Illuminate\Http\Request;
use App\Http\Controllers\ExperienceController;
use Session;
use App\ExperienceGallery;
use App\Experience;
use Imgix\UrlBuilder;

class ImagesController extends ExperienceController {

    protected $next_step = "last";
    protected $cur_step = "images";
    protected $prev_step = "pricing";

    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return Response
     */
    public function edit($id, Request $request) {
        $gallery = ExperienceGallery::findOrNew($id);
        $experience = Experience::find($id);

        $links = $this->getLinks($experience);

        return view('experience.images.edit', [
            'gallery' => $gallery,
            'experience' => $experience,
            'links' => $links
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @return Response
     */
    public function update($id, Request $request) {
        return $this->save($id, $request);
    }

    private function save($experienceId, $request) {

        $fields = [
            'image' => 'required|max:255',
            'images' => 'required'
        ];

        $this->validate($request, $fields);
        $input = $request->all();

        $experience = Experience::find($experienceId);
        $experience->cover_image = $input['image'];
        $experience->save();

        $builder = new UrlBuilder("keeptilocal.imgix.net");
//        $builder->setSignKey("test1234");
        $params = array("w" => 550, "h" => 320);
        echo $builder->createURL("4dab14ce2a0c4656ee8b922bce308a0c.jpg", $params);
        die();

        ExperienceGallery::where("experience_id", "=", $experienceId)->delete();

        foreach ($input['images'] as $image) {
            ExperienceGallery::create([
                'experience_id' => $experienceId,
                'image' => $image
            ]);
        }

        Session::flash('flash_message', 'Experience gallery successfully saved!');
        return redirect(route("{$this->next_step}.edit", ['id' => $experienceId]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id) {
        $gallery = ExperienceGallery::findOrFail($id);
        $gallery->delete();

        Session::flash('flash_message', 'Experience gallery successfully deleted!');
        return redirect(route("{$this->cur_step}.create"));
    }

}
