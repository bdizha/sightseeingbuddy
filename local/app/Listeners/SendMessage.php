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
            'content' => $message->content,
            'experience' => $message->experience,
            'user' => $recipient,
            'from' => 'info@sightseeingbuddy.com',
            'subject' => 'Sightseeing Buddy: You\'ve a new message from ' . $sender->first_name . " " . $sender->last_name
        ];

        try {

            $this->mailer->send('email.message', $data, function ($message) use ($data) {
                $message->to('keenan@sightseeingbuddy.com', $data['user']->first_name)
                    ->cc('bdizha@gmail.com', 'Batanayi Matuku')
                    ->subject($data['subject']);
            });
        } catch (\Exception $e) {
//            dd($e);
        }
    }
}
