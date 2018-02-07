@extends('layouts.app', ['url' => '/local/search'])

@section('content')
    <section id="page" class="booking-block">
        @include('profile.partials.header', ['title' => 'Cancelled booking!'])
    </section>
    <section id="page" class="gray-block booking-block">
        <div class="container gray-block mt-1">
            <div class="gray-bottom-border mb-1 mt-3"></div>
            <div class='row'>
                <div class="col-sm-12 col-xs-12 mt-1 mb-1">
                    Thank you for booking online with SightseeingBuddy. We look forward to you booking again with us soon.
                    <p>
                        Your refund (less cancellation/administration charges) will be made to the payment card used to make the booking.
                    </p>
                </div>
            </div>
            <div class="gray-bottom-border mb-3"></div>
        </div>
    </section>
@endsection