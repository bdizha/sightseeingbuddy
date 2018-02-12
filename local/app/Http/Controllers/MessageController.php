<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function index(Request $request)
    {
        $this->middleware('auth');

        $user = Auth::user();
        $messages = Message::with('sender')
            ->with('recipient')
            ->orderBy("created_at", "DESC")->get();

        return view('message.index', [
            'messages' => $messages,
            'user' => $user
        ]);
    }
}
