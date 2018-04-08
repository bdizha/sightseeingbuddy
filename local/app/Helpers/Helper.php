<?php

namespace App\Helpers;

use Carbon\Carbon;

class Helper
{

    public static function imagePathFor($media, $size = "")
    {
        return "";
    }

    public static function dateFormatFor($created_at)
    {
        $date = Carbon::parse($created_at)->diffForHumans(null, true);
        $dateParts = explode(" ", $date);
        return $dateParts[0] . $dateParts[1][0];
    }

    public static function timestamp($path)
    {
        return filemtime(__DIR__ . "/../../../public/" . $path);
    }

    public static function guests()
    {
        $range = range(1, 10);

        $guests = [];
        $counter = 1;
        foreach (array_combine($range, $range) as $item) {
            $guests[$item] = $counter === 1 ? $counter . " person" : $counter . " persons";
            $counter++;
        }
        return $guests;
    }

    public static function gender()
    {
        $guests = ['female' => 'Female', 'male' => 'Male'];
        return $guests;
    }

    public static function days()
    {
        $days = [
            1 => 'Mondays',
            2 => 'Tuesdays',
            3 => 'Wednesdays',
            4 => 'Thursdays',
            5 => 'Fridays',
            6 => 'Saturdays',
            0 => 'Sundays'
        ];

        return $days;
    }

    public static function times()
    {
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

    public static function strLimit($value, $limit, $end)
    {
        $limitedParts = explode(" ", str_limit($value, $limit, ""));
        $valueParts = explode(" ", $value);

        $preserved = "";
        foreach ($limitedParts as $key => $limitedPart) {
            if (strcmp($limitedPart, $valueParts[$key]) == 0) {
                $preserved .= " " . $limitedPart;
            } else {
                return $preserved . $end;
            }
        }
        return $preserved;
    }

    public static function personImage($image, $color = "yellow")
    {
        if (empty($image)) {
            $image = "/images/person-{$color}.png";
        }

        return $image;
    }

}
