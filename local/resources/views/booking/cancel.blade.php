@extends('layouts.app', ['url' => '/local/search'])

@section('content')
    <section id="page" class="booking-block">
        @include('profile.partials.header', ['title' => 'Failed payment!'])
    </section>
    <section id="page" class="gray-block booking-block">
        <div class="container gray-block mt-1">
            <div class="gray-bottom-border mb-1 mt-3"></div>
            <div class='row'>
                <div class="col-sm-12 col-xs-12 mt-1 mb-2">
                    Thank you for your interest in the Sightseeing Buddy experiences.
                    <p>
                        Unfortunately, we were not able to process your payment for your experience.
                    </p>
                    <p>
                        <b>Common reasons for failed credit card payments include:</b><br />
                        - The card is expired, or the expiration date was entered incorrectly;<br />
                        - Insufficient funds or payment limit on the card; or<br />
                        - The card is not set up for international/overseas transactions, or the issuing bank has rejected the transaction.
                    </p>
                    <p>
                        You can double-check and try your existing payment card again, use another card, or choose a different payment method.
                    </p>
                </div>
            </div>
            <div class="gray-bottom-border mb-3"></div>
        </div>
    </section>
@endsection