<?php

namespace App\Listeners;

use App\Events\LocalVerify;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Contracts\Mail\Mailer;

class SendLocalVerify
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
     * @param  LocalVerify $event
     * @return void
     */
    public function handle(LocalVerify $event)
    {
        $data = [
            'user' => $event->user,
            'subject' => 'Keep it Local: New local verification request',
            'email' => env('VERIFY_EMAIL'),
            'name' => env('VERIFY_NAME')
        ];

        try {

            $this->mailer->send('email.admin.verify', $data, function ($message) use ($data) {
                $message->to($data['email'], $data['name'])
                    ->subject($data['subject']);
            });
        } catch (\Exception $e) {
            dd($e);
        }
    }
}
