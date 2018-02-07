@extends('layouts.app', ['url' => '/local/search'])

@section('content')
    <section id="page" class="booking-block">
        @include('profile.partials.header', ['title' => 'Thank you!'])
    </section>
    <section id="page" class="gray-block booking-block">
        <div class="container gray-block mt-1">
            <div class="gray-bottom-border mb-1 mt-3"></div>
            <div class='row'>
                <div class="col-sm-12 col-xs-12 mt-1 mb-1">
                    Thank you for your payment for Sightseeing Buddy experience. We've received your experience request and will soon be in touch with you.
                </div>
            </div>
            <div class="gray-bottom-border mb-3"></div>
        </div>
    </section>
@endsection