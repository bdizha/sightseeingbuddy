@extends('layouts.app')

@section('content')
    <section id="page" class="booking-block">
        @include('profile.partials.header', ['user' => $user, 'section' => 'search', 'title' => 'LET\'S FIND YOU A LOCAL EXPERIENCE'])
    </section>

    <section id="page" class="gray-block booking-block">
        <div class="container mt-1">
            @include('profile.partials.tabs', ['user' => $user, 'title' => 'WELCOME TO YOUR DASHBOARD', 'tab' => 'dashboard'])
            <div class="gray-bottom-border mb-1"></div>
        </div>
        <div class="container">
            <div class="panel panel-default">
                <div class="panel-heading">
                    How to find your local?
                </div>
                <div class="panel-body">
                    <div class="row steps-block mt-1 mb-1">
                        <div class="step col-sm-4 col-xs-12">
                            <figure class="step-figure" style="background-image: url(/uploads/files/_AUTOx160_crop_center-center_80/SSB_Assets_GlobalAsset-6.svg)"></figure>
                            <h3 class="text-bold text-center">
                                <span class="sub-heading">1. Find </span>
                            </h3>
                            <p class="text-center text-light">
                                Browse through our extensive list of hosts, and choose the host that best suits your needs
                            </p>
                            <div class="step-arrow"></div>
                        </div>
                        <div class="step col-sm-4 col-xs-12">
                            <figure class="step-figure" style="background-image: url(/uploads/files/_AUTOx160_crop_center-center_80/SSB_Assets_GlobalAsset-7.svg)"></figure>
                            <h3 class="text-bold text-center">
                                <span class="sub-heading">2. Book</span>
                            </h3>
                            <p class="text-center text-light">
                                Get chatting with your host, and start planning your trip
                            </p>
                            <div class="step-arrow"></div>
                        </div>
                        <div class="step col-sm-4 col-xs-12">
                            <figure class="step-figure" style="background-image: url(/uploads/files/_AUTOx160_crop_center-center_80/SSB_Assets_GlobalAsset-8.svg)"></figure>
                            <h3 class="text-bold text-center">
                                <span class="sub-heading">3. Enjoy</span>
                            </h3>
                            <p class="text-center text-light">
                                Arrive and enjoy your tailor-made experience the local way
                            </p>
                            <div class="step-arrow"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="gray-bottom-border mb-1"></div>
        </div>
        <div class="container mt-1 pb-3">
            {!! Form::open([
            'route' => 'search',
            'class' => 'search-form']) !!}
            <div class='row'>
                <div class="col-sm-4 col-xs-12">
                    @foreach($categories as $category)
                        <div class="search-item">
                            <label class="checkbox-inline">
                                {{ Form::checkbox('category_ids[]', $category->id, in_array($category->id, $categoryIds), ['id' => 'category_' . $category->id]) }}
                                <label for="{{ 'category_' . $category->id }}">
                                    <span></span>
                                    <icon class="category-{{ $category->id }}"></icon>
                                    {{ $category->name }}
                                </label>
                            </label>
                        </div>
                    @endforeach
                </div>
                <div class="col-sm-5 col-xs-12">
                    <div class="form-group" id="destination">
                        <div class="input-group">
                            <div class="input-group-addon"></div>
                            <input class="text form-control input-lg fullwidth" type="text" id="destination"
                                   name="destination" value="{{ $destination }}" placeholder="Your destination">
                        </div>
                    </div>
                    <div class="form-group" id="guests">
                        <div class="input-group">
                            <div class="input-group-addon"></div>
                            {{ Form::select('guests', Helper::guests(), $guests, ['class' => 'form-control fullwidth', 'placeholder' => 'Amount of guests']) }}
                        </div>
                    </div>
                    <div class="form-group" id="duration">
                        <div class="input-group">
                            <div class="input-group-addon"></div>
                            <input class="text form-control input-lg fullwidth datetime-input" type="text" id="duration"
                                   name="duration" value="{{ $dateFrom }} - {{ $dateTo }}" placeholder="Length of stay">
                        </div>
                    </div>
                    <div class="datetime-group">
                        <div class="datetime-inner">
                            <div class="date-range" data-id="date-from">
                                <input type="hidden" name="date_from" id="date-from" value="{{ $dateFrom }}"/>
                                <div class="date-arrow"></div>
                                <div class="date-header">From</div>
                                <div id="from-date" class="datepicker"></div>
                            </div>
                            <div class="date-range" data-id="date-to">
                                <input type="hidden" name="date_to" id="date-to" value="{{ $dateTo }}"/>
                                <div class="date-header">To</div>
                                <div id="to-date" class="datepicker"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3 col-xs-12">
                    <div class="form-group">
                        <button type="submit" class="btn btn-default btn-lg btn-block">Go</button>
                    </div>
                    <div class="form-group">
                        <a href="/local/search?all=true" class="btn btn-default btn-lg btn-block">BROWSE ALL</a>
                    </div>
                    <!--<a href="#" class="btn btn-default btn-lg btn-block" id="advanced-search">ADVANCED SEARCH</a>-->
                </div>
            </div>
            {!! Form::close() !!}
        </div>
        <div class="container">
            <div class="gray-bottom-border mb-1"></div>
            @include('experience.partials.list', ['experiences' => $experiences])
        </div>
        </div>
    </section>
@endsection