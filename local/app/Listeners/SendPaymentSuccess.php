<?php

namespace App\Listeners;

use App\Events\PaymentSuccess;
use Illuminate\Contracts\Mail\Mailer;

class SendPaymentSuccess
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
     * @param  PaymentSuccess $event
     * @return void
     */
    public function handle(PaymentSuccess $event)
    {
        $booking = $event->booking;
        $data = [
            'booking' => $booking,
            'user' => $booking->user,
            'from' => env('MAIL_FROM'),
            'subject' => 'Keep it Local: Successful payment'
        ];

        try {

            $this->mailer->send('email.guest.payment.success', $data, function ($message) use ($data) {
                $message->to($data['user']->email, $data['user']->first_name)
                    ->subject($data['subject']);
            });
        } catch (\Exception $e) {

        }
    }
}
