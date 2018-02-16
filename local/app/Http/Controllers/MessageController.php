<?php

namespace App\Http\Controllers;

use App\Events\Compose;
use App\Experience;
use App\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;

class MessageController extends Controller
{
    public function index(Request $request)
    {
        $this->middleware('auth');

        $user = Auth::user();
        $messages = Message::with('sender')
            ->with('recipient')
            ->orderBy("created_at", "DESC")->get();

        $data = [
            'messages' => $messages,
            'user' => $user
        ];

        if ($request->has('experience_id')) {
            $experienceId = $request->get("experience_id");
        } elseif (old("experience_id", false)) {
            $experienceId = old("experience_id");
        }

        if (!empty($experienceId)) {
            $data["experience"] = Experience::where('id', '=', $experienceId)->first();
        }

        return view('message.index', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        $message = new Message();
        $message->sender_id = $user->id;
        $message->is_read = false;

        return $this->save($message, $request);
    }

    /**
     * Read a message
     *
     * @return Response
     */
    public function read(Request $request)
    {
        $user = Auth::user();
        $messageId = $request->get("message_id");
        $message = Message::where('id', '=', $messageId)->first();
        $message->is_read = $user->id !== $message->sender_id;
        $message->save();
    }

    private function save($message, $request)
    {
        $fields = [
            'content' => 'required|max:10000'
        ];

        $this->validate($request, $fields);
        $input = $request->all();
        $message->fill($input)->save();

        event(new Compose($message));

        Session::flash('flash_message', 'Message successfully sent!');
        return redirect(route("messages.index"));
    }
}