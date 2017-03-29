<?php

namespace App\Listeners;

use App\Events\PaymentSuccess;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendPaymentSuccess
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
     * @param  PaymentSuccess  $event
     * @return void
     */
    public function handle(PaymentSuccess $event)
    {
        $booking = $event->booking;
        $data = [
            'booking' => $booking,
            'user' => $booking->user,
            'from' => 'info@keepitlocal.co.za',
            'subject' => 'Welcome to our community'
        ];

        try {

            $this->mailer->send('email.guest.payment-success', $data, function ($message) use ($data) {
                $message->to($data['user']->email, $data['user']->first_name)
                    ->cc('bdizha@gmail.com', 'Batanayi Matuku')
                    ->subject($data['subject']);
            });
        } catch (\Exception $e) {

        }
    }
}
