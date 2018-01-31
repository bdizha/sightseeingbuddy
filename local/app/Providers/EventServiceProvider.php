<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'App\Events\Registration' => [
            'App\Listeners\SendRegistration@handle'
        ],
        'App\Events\PaymentSuccess' => [
            'App\Listeners\SendPaymentSuccess@handle'
        ],
        'App\Events\PaymentFailure' => [
            'App\Listeners\SendPaymentFailure@handle'
        ],
        'App\Events\GuestWelcome' => [
            'App\Listeners\SendGuestWelcome@handle'
        ],
        'App\Events\GuestVerify' => [
            'App\Listeners\SendGuestVerify@handle'
        ],
        'App\Events\LocalWelcome' => [
            'App\Listeners\SendLocalWelcome@handle'
        ],
        'App\Events\LocalVerify' => [
            'App\Listeners\SendLocalVerify@handle'
        ],
        'App\Events\LocalResult' => [
            'App\Listeners\SendLocalResult@handle'
        ],
        'App\Events\Contact' => [
            'App\Listeners\SendContact@handle'
        ],
        'App\Events\Subscribe' => [
            'App\Listeners\SendSubscription@handle'
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
