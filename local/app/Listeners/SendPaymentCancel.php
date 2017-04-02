<?php

namespace App\Listeners;

use App\Events\PaymentCancel;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
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
            'from' => 'info@keepitlocal.co.za',
            'subject' => 'Welcome to our community'
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
