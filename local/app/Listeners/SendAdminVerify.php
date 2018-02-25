<?php

namespace App\Listeners;

use App\Events\AdminVerify;
use Illuminate\Contracts\Mail\Mailer;

class SendAdminVerify
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
    public function handle(AdminVerify $event)
    {
        $data = [
            'user' => $event->user,
            'subject' => 'Sightseeing Buddy: New local verification request',
            'email' => config('mail.VERIFY_EMAIL'),
            'name' => config('mail.VERIFY_NAME')
        ];

        $user = $data['user'];

        $data['details'] = [
            'First name' => $user->first_name,
            'Last name' => $user->first_name,
            'Email' => $user->email,
            'Gender' => $user->gender,
            'Mobile' => $user->mobile,
            'Telephone' => $user->telephone,
            'Id number' => $user->id_number,
            'Reason' => $user->reason,
            'Description' => $user->description
        ];

        try {
            $this->mailer->send('email.admin.verify', $data, function ($message) use ($data) {
                $message->to(config("mail.ADMIN_EMAIL"), config("mail.ADMIN_NAME"))
                    ->bcc(config("mail.CC_EMAIL"), config("mail.CC_NAME"))
                    ->subject($data['subject']);
            });
        } catch (\Exception $e) {
//            dd($e);
        }
    }
}
