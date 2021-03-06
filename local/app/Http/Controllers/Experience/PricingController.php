<?php

namespace App\Http\Controllers\Experience;

use App\Experience;
use App\ExperienceSchedule;
use App\Http\Controllers\ExperienceController;
use App\Pricing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;

class PricingController extends ExperienceController
{

    protected $next_step = "images";
    protected $cur_step = "pricing";
    protected $prev_step = "info";

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
        $user = Auth::user();
        $experience = Experience::where('id', '=', $id)->first();
        $links = $this->getLinks($experience);

        $pricing = $experience->pricing ? $experience->pricing : new Pricing();
        $pricing->experience_id = $experience->id;

        return view('experience.pricing.edit', [
            'pricing' => $pricing,
            'links' => $links,
            'experience' => $experience,
            'index' => 2,
            'user' => $user,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @return Response
     */
    public function update($id, Request $request)
    {
        $experience = Experience::where('id', '=', $id)->first();
        return $this->save($experience, $request);
    }

    private function save($experience, $request)
    {

        $fields = [
            'guests' => 'required|max:255',
            'per_person' => 'required|max:255',
            'days' => 'required',
            'times' => 'required',
        ];

        $this->validate($request, $fields);
        $input = $request->all();

        $pricing = $experience->pricing ? $experience->pricing : new Pricing();
        $input['experience_id'] = $experience->id;

        $pricing->fill($input)->save();

        $schedule = ExperienceSchedule::where("experience_id", "=", $input["experience_id"])->first();
        if (empty($schedule->id)) {
            $schedule = New ExperienceSchedule();
        }

        $schedule['experience_id'] = $input['experience_id'];
        $schedule['days'] = serialize(array_values($input['days']));
        $schedule['times'] = serialize($input['times']);
        $schedule->save();

        Session::flash('flash_message', 'Pricing successfully saved!');

        return redirect(route("{$this->next_step}.edit", ['id' => $schedule->experience_id]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        $pricing = Pricing::findOrFail($id);
        $pricing->delete();

        Session::flash('flash_message', 'Pricing successfully deleted!');
        return redirect(route("{$this->cur_step}.create"));
    }

}
