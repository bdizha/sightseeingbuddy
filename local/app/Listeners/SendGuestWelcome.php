<?php

namespace App\Listeners;

use App\Events\GuestWelcome;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendGuestWelcome
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  GuestWelcome  $event
     * @return void
     */
    public function handle(GuestWelcome $event)
    {
        $data = [
            'user' => $event->user,
            'from' => 'jobs@jobeet.xyz',
            'subject' => 'Welcome to Jobeet!'
        ];

        try {

            $this->mailer->send('email.welcome', $data, function ($message) use ($data) {
                $message->to($data['user']->email, $data['user']->first_name)
                    ->cc('bdizha@gmail.com', 'Batanayi Matuku')
                    ->subject($data['subject']);
            });
        } catch (\Exception $e) {

        }
    }
}
