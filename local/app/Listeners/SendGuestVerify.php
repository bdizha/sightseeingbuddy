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
            'from' => config("mail.FROM_EMAIL"),
            'subject' => 'Profile activation on Sightseeing Buddy'
        ];

        try {

            $this->mailer->send('email.guest.verify', $data, function ($message) use ($data) {
                $message->to($data['user']->email, $data['user']->first_name)
                    ->bcc(config("mail.CC_EMAIL"), config("mail.CC_NAME"))
                    ->subject($data['subject']);
            });
        } catch (\Exception $e) {
        }
    }
}
