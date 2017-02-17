<?php

namespace App\Helpers;

use Carbon\Carbon;

class Helper {

    public static function imagePathFor($media, $size = "") {
        if (empty($media)) {
            $media = "f4b9ec30ad9f68f89b29639786cb62ef.png";
        }

        $size = str_replace("x", "_", $size);
        $fileName = $size ? str_replace(".", "_" . $size . ".", $media) : $media;

        return Hawkeye::generateFullImagePathFor($fileName);
    }

    public static function dateFormatFor($created_at) {
        $date = Carbon::parse($created_at)->diffForHumans(null, true);
        $dateParts = explode(" ", $date);
        return $dateParts[0] . $dateParts[1][0];
    }

    public static function timestamp($path) {
        return filemtime(__DIR__ . "/../../../public/" . $path);
    }

}
