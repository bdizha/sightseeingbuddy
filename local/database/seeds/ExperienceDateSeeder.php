<?php

use App\Experience;
use App\ExperienceDate;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class ExperienceDateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $experiences = Experience::get();

        $weeks = 50;
        $counter = 0;

        while ($counter <= $weeks) {
            foreach ($experiences as $experience) {
                $days = $experience->days;
                $times = $experience->times;

                $today = Carbon::today()->addWeek($counter);
                echo $experience->teaser . "\n";

                if (in_array($today->dayOfWeek, $days)) {

                    $year = date_format($today, "Y");
                    $month = date_format($today, "m");
                    $day = date_format($today, "d");

                    foreach ($times as $time) {
                        $timesParts = explode('h', $time);

                        $hour = $timesParts[0];
                        $minute = $timesParts[1];
                        $date = Carbon::create($year, $month, $day, $hour, $minute, 0, "Africa/Johannesburg");

//                        dd([
//                            'time' => $time,
//                            'date' => $date,
//                            'day' => $today->dayOfWeek,
//                            'days' => $days
//                        ]);

                        $values = [
                            'experience_id' => $experience->id,
                            'date' => $date
                        ];

                        $attributes = [
                            'experience_id' => $experience->id,
                            'date' => $date
                        ];

                        ExperienceDate::updateOrCreate($attributes, $values);
                    }

                }

            }
            $counter++;
        }
    }
}
