<?php

namespace App\Listeners;

use App\Events\PaymentFailure;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Contracts\Mail\Mailer;

class SendPaymentFailure
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
    public function handle(PaymentFailure $event)
    {
        $booking = $event->booking;
        $experience = $booking->experience;
        $data = [
            'booking' => $booking,
            'user' => $booking->user,
            'experience' => $experience,
            'pricing' => $booking->experience->pricing,
            'local' => $booking->experience->user,
            'meetingPoint' => $experience->street_address . ", " . $experience->postal_code . ", " . $experience->city->name . ", " . $experience->country->name,
            'total' => 'R' . number_format(sprintf("%.2f", $booking->amount), 2, '.', ''),
            'from' =>config('mail.FROM_EMAIL'),
            'subject' => 'Sightseeing Buddy: Payment failure'
        ];

        try {

            $this->mailer->send('email.guest.payment.failure', $data, function ($message) use ($data) {
                $message->to($data['user']->email, $data['user']->first_name)
                    ->bcc(config("mail.CC_EMAIL"), config("mail.CC_NAME"))
                    ->subject($data['subject']);
            });
        } catch (\Exception $e) {
//            dd($e);
        }
    }
}
