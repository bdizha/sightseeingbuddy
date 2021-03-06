<?php

namespace App\Listeners;

use App\Events\GuestWelcome;
use Illuminate\Contracts\Mail\Mailer;

class SendGuestWelcome
{
    protected $mailer;

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
     * @param  GuestWelcome $event
     * @return void
     */
    public function handle(GuestWelcome $event)
    {
        $data = [
            'user' => $event->user,
            'from' => config("mail.FROM_EMAIL"),
            'subject' => 'Welcome to our buddy community'
        ];

        try {

            $this->mailer->send('email.guest.welcome', $data, function ($message) use ($data) {
                $message->to($data['user']->email, $data['user']->first_name)
                    ->bcc(config("mail.CC_EMAIL"), config("mail.CC_NAME"))
                    ->subject($data['subject']);
            });
        } catch (\Exception $e) {
        }
    }
}
