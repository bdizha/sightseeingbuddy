<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BookingController extends Controller {

    public function create($id, $date, $time, Request $request) {
        $experience = Experience::where('id', '=', $id)->first();

        $user = $experience->user;
        return view('booking.add', [
            'experience' => $experience,
            'user' => $user,
            'time' => $time,
            'date' => $date
        ]);
    }

    public function place($id, Request $request) {
        dd("You're placing your booking now...");
    }

    public function receipt($id, Request $request) {
        dd("Booking has been placed...");
    }
}
