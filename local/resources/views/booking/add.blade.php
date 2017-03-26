@extends('layouts.app', ['url' => '/local/search'])

@section('content')
    <section id="page" class="booking-block">
        @include('profile.partials.header', ['title' => 'LET\'S CONFIRM YOUR LOCAL EXPERIENCE BOOKING'])
    </section>
    <section class="white-block">
        <div class="container mt-1">
            <div class='row'>
                <div class="col-sm-12 col-xs-12">
                    <ul class="profile-nav pull-right">
                        <li class="item">
                            <a href="{{ "/local/dashboard" }}">
                                <i class="dashboard"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                        <li class="item">
                            <a href="{{ "/local/bookings" }}">
                                <i class="bookings"></i>
                                <span>Bookings</span>
                            </a>
                        </li>
                        <li class="item">
                            <a href="/local/profile/{{ $user->username }}">
                                <img src="/images/person_white.png"/>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="gray-bottom-border mb-1"></div>
            <div class='row mt-2'>
                <div class="col-sm-6 col-xs-12">
                    <div class="booking-row">
                        <button type="button" modal-id="message-modal" class="btn btn-modal btn-lg btn-yellow mb-1">
                            Message for other special requests
                        </button>
                    </div>
                    <div class="booking-row text-bold">
                        {{ $time }}, {{ $date }}
                    </div>
                </div>
                <div class="col-sm-6 col-xs-12">
                    <div class="mb-1">
                        @foreach(range(1, 4) as $value)
                            <div class="col-sm-6 col-xs-6">
                                <div class="row">
                                    <label class="checkbox-inline">
                                        {{ Form::checkbox("special_request[]", null, false, ['id' => "special_request_" . $value]) }}
                                        <label for="{{ "special_request_" . $value }}">
                                            <span></span>
                                            Special request {{ $value }}
                                        </label>
                                    </label>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="page" class="gray-block booking-block">
        <div class="container pt-1">

            <form method="POST" action="https://{{ $pfHost }}/eng/process">
                @foreach($data as $key => $input)
                    <input type="hidden" name="{{ $key }}" value="{{ $input }}"/>
                @endforeach
                <div class='row'>
                    <div class="col-sm-6 col-xs-12">
                        <div class="booking-row">
                            <h3>Your contact details</h3>
                            <h4>Name:</h4>
                            <h3>{{ $user->first_name }}</h3>
                        </div>
                        <div class="booking-row">
                            <h4>Surname:</h4>
                            <h3>{{ $user->last_name }}</h3>
                        </div>
                        <div class="booking-row">
                            <h4>Email:</h4>
                            <h3>{{ $user->email }}</h3>
                        </div>
                        <div class="hidden-xs">
                            <div class="booking-row">
                                <small>
                                    By booking this experience, you confirm that you've read and accept our
                                    <a href="/pages/terms-conditions" target="_blank">Terms & Conditions</a> and
                                    <a href="/pages/privacy-policy" target="_blank">Privacy Policy</a>
                                </small>
                            </div>
                            <button type="submit" modal-id="confirm-modal" class="btn btn-modal btn-lg btn-yellow mb-1">
                                Make payment
                            </button>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xs-12">
                        <div class="booking-row">
                            <h3>{{ $experience->teaser }}</h3>
                            <h4>Host:</h4>
                            <h3>{{ $experience->user->email }}</h3>
                        </div>
                        <div class="booking-row">
                            <h4>Number of guests:</h4>
                            <h3>{{ $experience->pricing->guests }}</h3>
                        </div>
                        <div class="booking-row">
                            <h4>Price per guest:</h4>
                            <h3>R{{ $experience->pricing->per_person }}</h3>
                        </div>
                        <div class="booking-row">
                            <div class='row'>
                                <div class="col-sm-5 col-xs-12">
                                    <h4>Grand total:</h4>
                                    <h1>
                                        <span class="currency-name" currency-name="ZAR">R</span>
                                        <span class="currency-value" currency-value="{{ $experience->total }}">{{ $experience->total }}</span>
                                    </h1>
                                </div>
                                <div class="col-sm-7 col-xs-12">
                                    <div class="currency-block">
                                        "CURRENCY CONVERTER" LINK VIA NEW TAB AS API IS $799 p/year
                                        <light>:www.xe.com</light>
                                    </div>
                                    <small>
                                        By using this third-party website, you confirm that you've
                                        read and accept our <a href="/pages/terms-conditions" target="_blank">Terms &
                                            Conditions</a> and
                                        <a href="/pages/privacy-policy" target="_blank">Privacy Policy</a>
                                    </small>
                                </div>
                            </div>
                        </div>
                        <div class="hidden-lg hidden-md hidden-sm">
                            <div class="booking-row">
                                <small>
                                    By booking this experience, you confirm that you've read and accept our
                                    <a href="/pages/terms-conditions" target="_blank">Terms & Conditions</a> and
                                    <a href="/pages/privacy-policy" target="_blank">Privacy Policy</a>
                                </small>
                            </div>
                            <button type="button" modal-id="confirm-modal" class="btn btn-modal btn-lg btn-yellow mb-1">
                                Make payment
                            </button>
                        </div>
                    </div>
                </div>
            </form>
            @include('booking.partials.confirm')
            @include('booking.partials.message')
        </div>
    </section>
@endsection