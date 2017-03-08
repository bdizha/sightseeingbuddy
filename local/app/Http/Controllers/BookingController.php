<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Experience;

class BookingController extends Controller {

    public function create($id, $time, $timestamp, Request $request) {
        $experience = Experience::where('id', '=', $id)->first();
        
        $user = $experience->user;
        return view('booking.add', [
            'experience' => $experience,
            'user' => $user,
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
        dd("Booking has been placed...");
    }
}
