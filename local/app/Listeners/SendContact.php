<?php

namespace App\Listeners;

use App\Events\Contact;
use Illuminate\Contracts\Mail\Mailer;

class SendContact
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
    public function handle(Contact $event)
    {
        $data = [];
        $data['contact'] = $event->contact;
        $data['subject'] = 'Sightseeing Buddy - New contact message';
        $data['email'] = env("CONTACT_EMAIL");
        $data['name'] = env("CONTACT_NAME");

        try {
            $this->mailer->send('email.contact', $data, function ($message) use ($data) {
                $message->to($data['email'], $data['name'])
                    ->cc(env("CC_EMAIL"), env("CC_NAME"))
                    ->subject($data['subject']);
            });
        } catch (\Exception $e) {
        }
    }
}
