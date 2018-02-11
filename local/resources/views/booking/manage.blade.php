@extends('layouts.app', ['url' => '/local/search'])

@section('content')
    @if(!Auth::guest() && Auth::user()->type == 'guest')
        <section id="page" class="booking-block">
            @include('profile.partials.header', ['user' => $user, 'section' => 'search', 'title' => 'Your booking history'])
        </section>
    @endif

    <section id="page" class="gray-block">
        <div class="container profile">

            @if(!Auth::guest() && Auth::user()->type == 'local')
                @include('profile.partials.local', ['title' => 'Your booking history'])
            @else
                @include('profile.partials.tabs', ['user' => $user, 'title' => '', 'tab' => 'manage'])
                <div class="gray-bottom-border mb-1"></div>
            @endif

            <section id="page" class="gray-block booking-block">
                <div class="container gray-block mt-1">
                    <div class='row'>
                        <div class="col-sm-6 col-xs-12">
                            <div class="row">
                                <div class="panel panel-default">
                                    @if(Request::isMethod('post'))
                                    @else
                                        <div class="panel-heading">
                                            Find my booking
                                        </div>
                                        <div class="panel-body">
                                            {!! Form::open(['route' => 'bookings','id' => 'booking-manage-form']) !!}
                                            <div class="form-group" id="error-title">
                                                <label class="control-label" for="inputError1">Your surname</label>
                                                <input class="form-control fullwidth" type="text" id="surname"
                                                       name="surname"
                                                       value="" autocomplete="off" required
                                                       placeholder="E.g Smith"/>
                                                <div class="error"></div>
                                            </div>
                                            <div class="form-group" id="error-content">
                                                <label class="control-label" for="inputError1">Booking
                                                    reference</label>
                                                <input class="form-control fullwidth" type="text"
                                                       id="reference"
                                                       name="reference"
                                                       value="" autocomplete="off" required
                                                       placeholder="E.g #SSSSSSSBBBBBB"/>
                                                <div class="error"></div>
                                            </div>
                                            <div class="form-group">
                                                <input type="submit" class="btn fullwidth btn-yellow"
                                                       value="Find It">
                                            </div>
                                        </div>
                                        {!! Form::close() !!}
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </section>
@endsection