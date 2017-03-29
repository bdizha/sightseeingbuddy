<?php

namespace App\Listeners;

use App\Events\LocalWelcome;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendLocalWelcome
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
     * @param  LocalWelcome  $event
     * @return void
     */
    public function handle(LocalWelcome $event)
    {
        $data = [
            'user' => $event->user,
            'from' => 'info@keepitlocal.co.za',
            'subject' => 'Welcome to our community'
        ];

        try {

            $this->mailer->send('email.local.welcome', $data, function ($message) use ($data) {
                $message->to($data['user']->email, $data['user']->first_name)
                    ->cc('bdizha@gmail.com', 'Batanayi Matuku')
                    ->subject($data['subject']);
            });
        } catch (\Exception $e) {

        }
    }
}
