@extends('layouts.app', ['url' => '/local/search'])

@section('content')
    <section id="page" class="booking-block">
        <div class="container mt-2">
            <div class="mb-1 text-center">
                <h1>Manage my booking</h1>
            </div>
        </div>
    </section>
    <section id="page" class="gray-block booking-block">
        <div class="container gray-block mt-1">
            <aside id="sidebar" class="col-sm-3 local-left same-height hidden-sm hidden-xs" data-mh="column">
                <ul class="nav nav-stacked nav-pills">
                    <li class="item item-level-1 active">
                        <a href="/local/booking/manage">
                            <h2>My booking</h2>
                            <span>Find my booking</span>
                        </a>
                    </li>
                </ul>
            </aside>
            <div class="col-sm-8 col-sm-offset-1 same-height mt-3 gray-bottom-border gray-top-border" data-mh="column">
                <div class='row'>
                    <div class="col-sm-9 col-xs-12">
                        <div class="row">
                            <div class="panel panel-default">
                                @if(Request::isMethod('post'))
                                @else
                                    <div class="panel-heading">
                                        Find my booking
                                    </div>
                                    <div class="panel-body">
                                        {!! Form::open(['route' => 'booking_manage','id' => 'booking-manage-form']) !!}
                                        <div class="form-group" id="error-title">
                                            <label class="control-label" for="inputError1">Your lastname</label>
                                            <input class="form-control fullwidth" type="text" id="review-title"
                                                   name="title"
                                                   value="" autocomplete="off" required
                                                   placeholder="E.g Smith"/>
                                            <div class="error"></div>
                                        </div>
                                        <div class="form-group" id="error-content">
                                            <label class="control-label" for="inputError1">Booking reference</label>
                                            <input class="form-control fullwidth" type="text" id="booking-reference"
                                                   name="title"
                                                   value="" autocomplete="off" required
                                                   placeholder="E.g #1000000000000000000000"/>
                                            <div class="error"></div>
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" class="btn fullwidth btn-yellow" value="Find It">
                                        </div>
                                    </div>
                                    {!! Form::close() !!}
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
@endsection