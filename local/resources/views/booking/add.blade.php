@extends('layouts.app', ['url' => '/local/search'])

@section('content')
    <section id="page" class="booking-block">
        @include('profile.partials.header', ['title' => 'LET\'S CONFIRM YOUR LOCAL EXPERIENCE BOOKING'])
    </section>
    <section class="gray-block booking-block">
        <div class="container mt-1">
            @include('profile.partials.tabs', ['user' => $user, 'title' => '', 'tab' => 'messages'])
            <div class="gray-bottom-border mb-1"></div>
        </div>
        <div class="container pb-3">
            <form method="POST" action="https://{{ $pfHost }}/eng/process">
                @foreach($data as $key => $input)
                    <input type="hidden" name="{{ $key }}" value="{{ $input }}"/>
                @endforeach
                <div class='row'>
                    <div class="col-sm-6 col-xs-12">
                        <h3>Your booking details</h3>
                        <div class="booking-row">
                            <h4>Name:</h4>
                            <h3>{{ $user->first_name }}</h3>
                        </div>
                        <div class="booking-row">
                            <h4>Surname:</h4>
                            <h3>{{ $user->last_name }}</h3>
                        </div>
                        <div class="booking-row">
                            <h4>Date:</h4>
                            <h3>{{ $date  }}</h3>
                        </div>
                        <div class="booking-row">
                            <h4>Time:</h4>
                            <h3>{{ $time }}</h3>
                        </div>
                        <div class="hidden-xs">
                            <div class="booking-row mb-1">
                                <small>
                                    By booking this experience, you confirm that you've read and accept our
                                    <a href="/pages/terms-conditions" target="_blank">Terms & Conditions</a> and
                                    <a href="/pages/privacy-policy" target="_blank">Privacy Policy</a>
                                </small>
                            </div>
                            <button type="submit" modal-id="confirm-modal"
                                    class="btn btn-modal btn-lg btn-default mb-1">
                                Make payment
                            </button>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xs-12">
                        <h3>Your experience details</h3>
                        <div class="booking-row">
                            <h4>Experience:</h4>
                            <h3>{{ $experience->teaser }}</h3>
                        </div>
                        <div class="booking-row">
                            <h4>Host:</h4>
                            <h3>{{ $experience->user->first_name }}</h3>
                        </div>
                        <div class="booking-row">
                            <h4>Number of guests:</h4>
                            <h3>{{ $experience->pricing->guests }}</h3>
                        </div>
                        <div class="booking-row">
                            <h4>Price per guest:</h4>
                            <h3 class="data-currency"
                                data-currency-base="{{ number_format(str_replace("R", "", $experience->pricing->per_person), 2, '.', '') }}">
                                R{{ number_format(str_replace("R", "", $experience->pricing->per_person), 2, '.', '') }}
                            </h3>
                        </div>
                        <div class="booking-row">
                            <h4>Grand total:</h4>
                            <h1>
                                <span class="data-currency" data-currency-base="{{ $experience->total }}">
                                    {{ $experience->total }}
                                </span>
                            </h1>
                        </div>
                        <div class="hidden-lg hidden-md hidden-sm">
                            <div class="booking-row">
                                <small>
                                    By booking this experience, you confirm that you've read and accept our
                                    <a href="/pages/terms-conditions" target="_blank">Terms & Conditions</a> and
                                    <a href="/pages/privacy-policy" target="_blank">Privacy Policy</a>
                                </small>
                            </div>
                            <button type="button" modal-id="confirm-modal"
                                    class="btn btn-modal btn-lg btn-default mb-1">
                                Make payment
                            </button>
                        </div>
                    </div>
                </div>
                @include('booking.partials.confirm')
            </form>
            @include('booking.partials.message')
        </div>
    </section>
@endsection