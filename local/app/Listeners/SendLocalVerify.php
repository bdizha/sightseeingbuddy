<?php

namespace App\Listeners;

use App\Events\LocalVerify;
use Illuminate\Contracts\Mail\Mailer;

class SendLocalVerify
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
     * @param  LocalVerify $event
     * @return void
     */
    public function handle(LocalVerify $event)
    {
        $data = [
            'user' => $event->user,
            'from' => config("mail.FROM_EMAIL"),
            'subject' => 'Verify your profile'
        ];

        try {

            $this->mailer->send('email.local.verify', $data, function ($message) use ($data) {
                $message->to($data['user']->email, $data['user']->first_name)
                    ->bcc(config("mail.CC_EMAIL"), config("mail.CC_NAME"))
                    ->subject($data['subject']);
            });
        } catch (\Exception $e) {
        }
    }
}
