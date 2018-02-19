<?php

namespace App\Http\Controllers\Profile;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\City;
use Session;

class LocationController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return Response
     */
    public function edit() {
        $user = Auth::user();

        $this->verify();
        
        $provinces = $this->getProvinces();        
        return view('profile.location', ['user' => $user, 'provinces' => $provinces]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @return Response
     */
    public function update(Request $request) {
        $user = Auth::user();

        $this->save($user, $request);
        return redirect("/location/{$user->id}/edit");
    }

    private function save($user, $request) {

        $fields = [
            'city' => 'required|max:255',
            'province_id' => 'required|max:255',
            'post_code' => 'required|max:255'
        ];

        $this->validate($request, $fields);
        $input = $request->all();

        if (!empty($input["city"])) {
            $city = City::where("name", "=", $input["city"])->first();

            if (empty($city["name"])) {
                $city = City::create([
                            'name' => $input["city"],
                            "province_id" => $input["province_id"]
                ]);
            }

            $input['city_id'] = $city->id;
            unset($input["city"]);
        }

        $user->fill($input)->save();

        Session::flash('flash_message', 'User successfully saved!');
    }

}
