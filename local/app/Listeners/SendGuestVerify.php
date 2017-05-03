<?php

namespace App\Listeners;

use App\Events\GuestVerify;
use Illuminate\Contracts\Mail\Mailer;

class SendGuestVerify
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
     * @param  GuestVerify $event
     * @return void
     */
    public function handle(GuestVerify $event)
    {
        $data = [
            'user' => $event->user,
            'from' => env("EMAIL_FROM"),
            'subject' => 'Keep it Local: Please confirm your email'
        ];

        try {

            $this->mailer->send('email.guest.verify', $data, function ($message) use ($data) {
                $message->to($data['user']->email, $data['user']->first_name)
                    ->cc(env("CC_EMAIL"), env("CC_NAME"))
                    ->subject($data['subject']);
            });
        } catch (\Exception $e) {
        }
    }
}
