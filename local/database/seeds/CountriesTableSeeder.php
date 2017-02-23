<?php

use Illuminate\Database\Seeder;
use App\Country;

class CountriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $countries = DB::connection('mysql2')->select('select * from country');
        
        foreach($countries as $country){
            Country::create([
                'name' => $country->name,
                'code' => $country->code
            ]);
        }
    }
}
