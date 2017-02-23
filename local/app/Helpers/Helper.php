<?php

namespace App\Helpers;

use Carbon\Carbon;

class Helper {

    public static function imagePathFor($media, $size = "") {
        return "";
    }

    public static function dateFormatFor($created_at) {
        $date = Carbon::parse($created_at)->diffForHumans(null, true);
        $dateParts = explode(" ", $date);
        return $dateParts[0] . $dateParts[1][0];
    }

    public static function timestamp($path) {
        return filemtime(__DIR__ . "/../../../public/" . $path);
    }

    public static function guests() {
        $guests = range(1, 10);
        return array_combine($guests, $guests);
    }

    public static function gender() {
        $guests = ['female' => 'Female', 'male' => 'Male'];
        return $guests;
    }

    public static function days() {
        $days = [
            1 => 'Mondays',
            2 => 'Tuesdays',
            3 => 'Wednesdays',
            4 => 'Thursdays',
            5 => 'Fridays',
            6 => 'Sutardays',
            7 => 'Sundays'
        ];

        return $days;
    }

    public static function times() {
        $hours = range(0, 23);
        $times = [];
        foreach ($hours as $hour) {
            $paddedHour = str_pad($hour, 2, 0, STR_PAD_LEFT);
            $time = $paddedHour . "h00";
            $times[$time] = $time;

            $midTime = $paddedHour . "h30";
            $times[$midTime] = $midTime;
        }

        return $times;
    }

    public static function personImage($image) {
        if (empty($image)) {
            $image = "/files/person.png";
        }

        return $image;
    }

}
