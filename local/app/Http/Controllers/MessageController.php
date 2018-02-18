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
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $user = Auth::user();
        $messages = Message::with('sender')
            ->with('recipient')
            ->where("is_reply", "=", false)
            ->orderBy("updated_at", "DESC")->get();

        $data = [
            'messages' => $messages,
            'user' => $user
        ];

        if ($request->has('experience_id')) {
            $experienceId = $request->get("experience_id");
        } elseif (old("experience_id", false)) {
            $experienceId = old("experience_id");
        } elseif ($request->has('message_id')) {
            $data['messageId'] = $request->get("message_id");
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
        $message->reads = serialize([]);

        return $this->save($message, $request);
    }

    /**
     * Read a message
     *
     * @return Response
     */
    public function read(Request $request, $message_id)
    {
        $user = Auth::user();

        $reads = [$user->id];
        $message = Message::where('id', '=', $message_id)->first();
        $message->reads = serialize(array_merge($reads, unserialize($message->reads)));
        $message->save();

        echo 'ok';
        exit(200);
    }

    private function save($message, $request)
    {
        $fields = [
            'content' => 'required|max:10000'
        ];

        $this->validate($request, $fields);
        $input = $request->all();

        $messageId = $input['message_id'];
        if (!empty($messageId)) {
            $input['is_reply'] = !empty($messageId);
        }
        else{
            $input['message_id'] = 0;
        }
        $message->fill($input)->save();

        event(new Compose($message));

        if (!empty($messageId)) {
            $message = Message::where('id', '=', $messageId)->first();
            $message->save();
        }

        Session::flash('flash_message', 'Message successfully sent!');
        return redirect(route("messages.index"));
    }
}