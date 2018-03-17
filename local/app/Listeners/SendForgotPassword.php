<?php

namespace App\Listeners;

use App\Events\ForgotPassword;
use Illuminate\Contracts\Mail\Mailer;

class SendForgotPassword
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
    public function handle(ForgotPassword $event)
    {
        $data = $event->data;
        $data['subject'] = 'Sightseeing Buddy - Reset Password';
        $data['email'] = config("mail.CONTACT_EMAIL");
        $data['name'] = config("mail.CONTACT_NAME");
        $data['from'] = config("mail.FROM_EMAIL");

        try {
            $this->mailer->send('auth.emails.password', $data, function ($message) use ($data) {
                $message->to($data['user']['email'], $data['user']['name'])
                    ->bcc(config("mail.CC_EMAIL"), config("mail.CC_NAME"))
                    ->subject($data['subject']);
            });
        } catch (\Exception $e) {
        }
    }
}
