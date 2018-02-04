<?php

namespace App\Listeners;

use App\Events\Subscribe;
use Illuminate\Contracts\Mail\Mailer;

class SendSubscription
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
    public function handle(Subscribe $event)
    {
        $data = [];
        $data['subscriber'] = $event->subscriber;
        $data['subject'] = 'Sightseeing Buddy - New subscription email';
        $data['email'] = env("CONTACT_EMAIL");
        $data['name'] = env("CONTACT_NAME");

        try {
            $this->mailer->send('email.subscription', $data, function ($message) use ($data) {
                $message->to($data['email'], $data['name'])
                    ->cc(env("CC_EMAIL"), env("CC_NAME"))
                    ->subject($data['subject']);
            });
        } catch (\Exception $e) {
//            dd($e);
        }
    }
}
