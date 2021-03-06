<?php

use Illuminate\Database\Seeder;
use App\ExperienceCategory;

class ExperienceCategoriesSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $experiencesCategories = [
            [
                'name' => "Dining experiences"
            ],
            [
                'name' => "Things to do"
            ]
        ];

        foreach ($experiencesCategories as $category) {
            ExperienceCategory::create(
                    $category
            );
        }
    }

}
