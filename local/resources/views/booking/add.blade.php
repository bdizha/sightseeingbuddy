@extends('layouts.app')

@section('content')
<section id="page" class="booking-block">
    @include('profile.partials.header', ['title' => 'LET\'S CONFIRM YOUR LOCAL EXPERIENCE BOOKING'])
</section>
<section id="page" class="gray-block booking-block">
    <div class="container gray-block mt-1">
        <div class='row'>
            <div class="col-sm-12 col-xs-12">
                <ul class="profile-nav pull-right">
                    <li class="item">
                        <a href="{{ "/dashboard" }}">
                            <i class="dashboard"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li class="item">
                        <a href="{{ "/bookings" }}">
                            <i class="bookings"></i>
                            <span>Bookings</span>
                        </a>
                    </li>
                    <li class="item">
                        <a href="/local/profile/{{ $user->id }}">
                            <img src="/images/person-66.png" />
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="gray-bottom-border mb-1"></div>
        <form>
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
                        <button type="submit" class="btn btn-lg btn-yellow mb-1">Make payment</button>
                    </div>
                </div>
                <div class="col-sm-6 col-xs-12">
                    <div class="booking-row">
                        <h3>Experience heading</h3>
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
                                <?php $total = $experience->pricing->guests * $experience->pricing->per_person ?>
                                <h1>
                                    <span class="currency-name" currency-name="ZAR">R</span><span class="currency-value" currency-value="{{ $total }}">{{ $total }}</span>
                                </h1>
                            </div>
                            <div class="col-sm-7 col-xs-12">
                                <div class="currency-block">
                                    "CURRENCY CONVERTER" LINK VIA NEW TAB AS API IS $799 p/year
                                    <light>:www.xe.com</light>
                                </div>
                                <small>
                                    By using this third-party website, you confirm that you've
                                    read and accept our <a href="/pages/terms-conditions" target="_blank">Terms & Conditions</a> and
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
                        <button type="submit" class="btn btn-lg btn-yellow mb-1">Make payment</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
@endsection