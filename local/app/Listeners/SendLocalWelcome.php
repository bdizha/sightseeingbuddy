<?php

namespace App\Listeners;

use App\Events\LocalWelcome;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Contracts\Mail\Mailer;

class SendLocalWelcome
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
     * @param  LocalWelcome $event
     * @return void
     */
    public function handle(LocalWelcome $event)
    {
        $data = [
            'user' => $event->user,
            'from' => env("EMAIL_FROM"),
            'subject' => 'Welcome to our community'
        ];

        try {

            $this->mailer->send('email.local.welcome', $data, function ($message) use ($data) {
                $message->to($data['user']->email, $data['user']->first_name)
                    ->cc(env("CC_EMAIL"), env("CC_NAME"))
                    ->subject($data['subject']);
            });
        } catch (\Exception $e) {

        }
    }
}
