<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Experience;
use Carbon\Carbon;

class BookingController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function create($id, $time, $timestamp, Request $request) {
        $experience = Experience::where('id', '=', $id)->first();
        
        return view('booking.add', [
            'experience' => $experience,
            'user' => $experience->user,
            'time' => $time,
            'timestamp' => $timestamp
        ]);
    }

    public function place($id, Request $request) {
        dd("You're placing your booking now...");
    }

    public function forex() {
        $currency = file_get_contents("https://www.citysightseeing.co.za/api/forex-rates");
        die($currency);
    }

    public function receipt($id, Request $request) {
        $experience = Experience::where('id', '=', $id)->first();
        
        $daysSinceEpoch = Carbon::createFromTimestamp(1489343200);
        dd(array($daysSinceEpoch->format("d/m/Y"), time()));

        return view('booking.receipt', [
            'user' => $experience->user,
            'experience' => $experience
        ]);
    }

}
