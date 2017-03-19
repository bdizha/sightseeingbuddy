@extends('layouts.app', ['url' => '/local/search'])

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
        <form method="POST" action="{{ route('payment_confirm') }}">
            <?php $total = $experience->pricing->guests * $experience->pricing->per_person ?>
            <input type="hidden" name="merchant_id" value="10000100"/>
            <input type="hidden" name="merchant_key" value="46f0cd694581a"/>
            <input type="hidden" name="return_url" value="{{ route('payment_success') }}"/>
            <input type="hidden" name="cancel_url" value="{{ route('payment_cancel') }}"/>
            <input type="hidden" name="notify_url" value="{{ route('payment_verify') }}"/>
            <input type="hidden" name="name_first" value="{{ $user->first_name }}"/>
            <input type="hidden" name="name_last" value="{{ $user->last_name }}"/>
            <input type="hidden" name="email_address" value="{{ $user->email }}"/>
            <input type="hidden" name="m_payment_id" value="{{ $reference }}"/>
            <input type="hidden" name="amount" value="{{ $total }}"/>
            <input type="hidden" name="item_name" value="{{ $experience->teaser }}"/>
            <input type="hidden" name="item_description" value="{{ $experience->teaser }}"/>
            <input type="hidden" name="signature" value="{{ md5("name_first={$user->first_name}&name_last={user->last_name}&email_address={$user->email}") }}"/>
                {!! csrf_field() !!}
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
                        <button type="submit" modal-id="confirm-modal" class="btn btn-modal btn-lg btn-yellow mb-1">Make payment</button>
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
                        <button type="button" modal-id="confirm-modal" class="btn btn-modal btn-lg btn-yellow mb-1">Make payment</button>
                    </div>
                </div>
            </div>
            @include('booking.partials.confirm')
        </form>
    </div>
</section>
@endsection