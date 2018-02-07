<?php

namespace App\Listeners;

use App\Events\PaymentCancel;
use Illuminate\Contracts\Mail\Mailer;

class SendPaymentCancel
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
     * @param  PaymentCancel $event
     * @return void
     */
    public function handle(PaymentCancel $event)
    {
        $booking = $event->booking;
        $data = [
            'booking' => $booking,
            'user' => $booking->user,
            'experience' => $booking->experience,
            'pricing' => $booking->experience->pricing,
            'local' => $booking->experience->user,
            'from' => env('MAIL_FROM'),
            'subject' => 'Sightseeing Buddy: Booking cancelled'
        ];

        try {

            $this->mailer->send('email.guest.payment.cancel', $data, function ($message) use ($data) {
                $message->to($data['user']->email, $data['user']->first_name)
                    ->cc(env("CC_EMAIL"), env("CC_NAME"))
                    ->subject($data['subject']);
            });
        } catch (\Exception $e) {
//            dd($e);
        }
    }
}
