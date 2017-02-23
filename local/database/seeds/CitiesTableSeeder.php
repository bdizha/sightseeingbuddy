<?php

use Illuminate\Database\Seeder;
use App\City;
use App\Country;

class CitiesTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $cities = array(
            array(
                'name' => "Johannesburg",
                'province' => "Gauteng",
            ),
            array(
                'name' => "Pretoria",
                'province' => "Gauteng",
            ),
            array(
                'name' => "East Rand",
                'province' => "Gauteng",
            ),
            array(
                'name' => "West Rand",
                'province' => "Gauteng",
            ),
            array(
                'name' => "Vaal",
                'province' => "Gauteng",
            ),
            array(
                'name' => "Cape Town",
                'province' => "Western Cape",
            ),
            array(
                'name' => "Winelands",
                'province' => "Western Cape",
            ),
            array(
                'name' => "West Coast",
                'province' => "Western Cape",
            ),
            array(
                'name' => "Garden Route",
                'province' => "Western Cape",
            ),
            array(
                'name' => "Overberg",
                'province' => "Western Cape",
            ),
            array(
                'name' => "Karoo",
                'province' => "Western Cape",
            ),
            array(
                'name' => "Durban",
                'province' => 'KwaZulu-Natal'
            ),
            array(
                'name' => "North Coast",
                'province' => 'KwaZulu-Natal'
            ),
            array(
                'name' => "Midlands",
                'province' => 'KwaZulu-Natal'
            ),
            array(
                'name' => "South Coast",
                'province' => 'KwaZulu-Natal'
            ),
            array(
                'name' => "",
                'province' => 'Eastern Cape'
            ),
            array(
                'name' => "",
                'province' => 'Free State'
            ),
            array(
                'name' => "",
                'province' => 'Mpumalanga'
            ),
            array(
                'name' => "",
                'province' => 'North West'
            ),
            array(
                'name' => "",
                'province' => 'Northern Cape'
            ),
            array(
                'name' => "",
                'province' => 'Limpopo'
            ),
        );

        $country = Country::where('name', '=', 'South Africa')->first();

        if (empty($country)) {
            die("No country is found.\n" . __FILE__);
        }

        foreach ($cities as $city) {
            echo "Inserting city: " . $city["name"] . "\n";
            
            if(empty($city['name'])){
                continue;
            }
            
            City::create([
                'name' => $city["name"],
                'country_id' => $country->id
            ]);
        }

        echo "Successfully inserted cities\n";
    }

}
