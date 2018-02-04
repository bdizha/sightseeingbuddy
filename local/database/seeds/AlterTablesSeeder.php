<?php

use Illuminate\Database\Seeder;
use App\Experience;

class AlterTablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // slugify experiences
        $experiences = Experience::all();
        foreach($experiences as $experience){
            echo "Slugifying experience: {$experience->teaser}\n";
            $experience->save();
        }
    }
}
