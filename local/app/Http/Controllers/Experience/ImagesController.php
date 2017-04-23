<?php

namespace App\Http\Controllers\Experience;

use Illuminate\Http\Request;
use App\Http\Controllers\ExperienceController;
use Session;
use App\ExperienceGallery;
use App\Experience;
use Imgix\UrlBuilder;

class ImagesController extends ExperienceController
{

    protected $next_step = "last";
    protected $cur_step = "images";
    protected $prev_step = "pricing";

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return Response
     */
    public function edit($id, Request $request)
    {
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
    public function update($id, Request $request)
    {
        return $this->save($id, $request);
    }

    private function save($experienceId, $request)
    {
        $builder = new UrlBuilder("keepitlocal.imgix.net");
        $builder->setSignKey("arQnS85SyXJAFH8r");

        $fields = [
            'image' => 'required|max:255',
            'images' => 'required'
        ];

        $this->validate($request, $fields);
        $input = $request->all();

        $experience = Experience::find($experienceId);

        if (strpos($input['image'], 'imgix') === false) {
            $imGix = str_replace("/files/", "", urlencode($input['image']));
            $params = array("w" => 550, "h" => 320, 'crop' => 'entropy', 'fit' => 'crop');
            $experience->cover_image = $builder->createURL($imGix, $params);
        }
        $experience->save();

        ExperienceGallery::where("experience_id", "=", $experienceId)->delete();

        foreach ($input['images'] as $image) {

            if (strpos($input['image'], 'imgix') === false) {

                $builder = new UrlBuilder("keepitlocal.imgix.net");
                $builder->setSignKey("arQnS85SyXJAFH8r");
                $imageName = str_replace("/files/", "", urlencode($image));
                $params = array("w" => 1200, "h" => 400, 'crop' => 'entropy', 'fit' => 'crop');

                ExperienceGallery::create([
                    'experience_id' => $experienceId,
                    'image' => $builder->createURL($imageName, $params)
                ]);
            }
            else{
                ExperienceGallery::create([
                    'experience_id' => $experienceId,
                    'image' => $$image
                ]);
            }
        }

        Session::flash('flash_message', 'Experience gallery successfully saved!');
        return redirect(route("{$this->next_step}.edit", ['id' => $experienceId]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        $gallery = ExperienceGallery::findOrFail($id);
        $gallery->delete();

        Session::flash('flash_message', 'Experience gallery successfully deleted!');
        return redirect(route("{$this->cur_step}.create"));
    }

}
