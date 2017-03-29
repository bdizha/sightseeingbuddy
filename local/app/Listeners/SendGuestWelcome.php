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
            'from' => 'info@keepitlocal.co.za',
            'subject' => 'Welcome to our community'
        ];

        try {

            $this->mailer->send('email.guest.welcome', $data, function ($message) use ($data) {
                $message->to($data['user']->email, $data['user']->first_name)
                    ->cc('bdizha@gmail.com', 'Batanayi Matuku')
                    ->subject($data['subject']);
            });
        } catch (\Exception $e) {

        }
    }
}
