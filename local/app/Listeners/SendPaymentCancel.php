<?php

namespace App\Listeners;

use App\Events\PaymentCancel;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendPaymentCancel
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
     * @param  PaymentCancel  $event
     * @return void
     */
    public function handle(PaymentCancel $event)
    {
        $data = [
            'user' => $event->user,
            'user' => $event->booking,
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
