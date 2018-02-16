<?php

namespace App\Listeners;

use App\Events\Compose;
use Illuminate\Contracts\Mail\Mailer;

class SendMessage
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(Mailer $mailer)
    {
        $this->mailer = $mailer;
    }

    /**
     * Handle the event.
     *
     * @param  Message $event
     * @return void
     */
    public function handle(Compose $event)
    {
        $message = $event->message;

        $sender = $message->sender;
        $recipient = $message->recipient;
        $data = [
            'message' => $message,
            'user' => $recipient,
            'from' => env("MAIL_FROM"),
            'subject' => 'Sightseeing Buddy: You\'ve a new message from ' . $sender->first_name . " " . $sender->last_name
        ];

        try {

            $this->mailer->send('email.message', $data, function ($message) use ($data) {
                $message->to($data['user']->email, $data['user']->first_name)
                    ->cc(env("CC_EMAIL"), env("CC_NAME"))
                    ->subject($data['subject']);
            });
        } catch (\Exception $e) {
//            dd($e);
        }
    }
}
