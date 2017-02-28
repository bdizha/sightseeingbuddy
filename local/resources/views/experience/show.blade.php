@extends('layouts.app')

@section('content')
<section id="page" class="gray-block">
    <div class="container profile">
        <div class='row'>
            <div class="col-sm-12 col-xs-12">
                <ul class="profile-nav pull-right">
                    <li class="item active">
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
        <div class='row mb-1'>
            <div class="col-sm-6 col-xs-12">
                @include('profile.partials.stats', ['title' => $experience->teaser])
            </div>
            <div class="col-sm-6 col-xs-12">
                <div class='row'>
                    <div class="col-sm-12 col-xs-12">
                        <a href="/local/booking/create/3" class="btn btn-lg btn-yellow fullwidth mb-1">Book experience</a>
                    </div>
                    <div class="col-sm-6 col-xs-6">
                        <a href="#experience-info" class="btn btn-primary fullwidth">Information</a>
                    </div>
                    <div class="col-sm-6 col-xs-6">
                        <a href="#experiences" class="btn btn-primary fullwidth pull-right">My Experiences</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('experience.partials.carousel')

    <div class="container experience-block gray-block mt-1" id='experience-info'>

        <h1 id="experiences" class="page-title page-title-center">
            Local experience information
        </h1>

        <div class="row">
            <div class="col-sm-6 col-xs-12">
                <article class="media media-responsive">
                    <div class="media-body">
                        <h3>
                            {{ $experience->teaser }}       
                        </h3>
                        <div class="media-summary">
                            {!! nl2br($experience->description) !!}
                        </div>
                    </div>
                </article>
                <img class="media-object" src="{{ $experience->cover_image }}" alt="{{ $experience->teaser }}" title="{{ $experience->teaser }}">
            </div>
            <div class="col-sm-6 col-xs-12">
                <div class="gray-bottom-border mt-1"></div>
                <div class="exp-item">
                    <h3>
                        Offered languages       
                    </h3>
                    <ul>
                        @foreach($experience->languages as $key => $language)
                        <li>{{ $language->name }}</li>
                        @endforeach
                    </ul>
                </div>
                <div class="exp-item">
                    <h3>
                        Experience highlights
                    </h3>
                    <ul>
                        @foreach($experience->highlights as $key => $highlight)
                        <li>{{ $highlight->description }}</li>
                        @endforeach
                    </ul>
                </div>
                <div class="exp-item">
                    <h3>
                        Experience activities  
                    </h3>
                    <ul>
                        @foreach($experience->activities as $key => $activity)
                        <li>{{ $activity->description }}</li>
                        @endforeach
                    </ul>
                </div>
                <div class="gray-bottom-border mt-1 mb-1"></div>
                <h3>
                    {{ $experience->sub_category . " details" }}       
                </h3>
                <div class="row">
                    <div class="col-sm-6 col-xs-6">
                        <label>{{ "Type:" }}</label>
                    </div>
                    <div class="col-sm-6 col-xs-6">
                        {{ $experience->category->name }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6 col-xs-6">
                        <label>{{ "Duration:" }}</label>
                    </div>
                    <div class="col-sm-6 col-xs-6">
                        {{ $experience->duration }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6 col-xs-6">
                        <label>{{ "Transportation mode:" }}</label>
                    </div>
                    <div class="col-sm-6 col-xs-6">
                        {{ $experience->transportation_mode }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6 col-xs-6">
                        <label>{{ "Meeting point:" }}</label>
                    </div>
                    <div class="col-sm-6 col-xs-6">
                        {{ $experience->city->name }},
                        {{ $experience->country->name }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6 col-xs-6">
                        <label>{{ "No. of guests:" }}</label>
                    </div>
                    <div class="col-sm-6 col-xs-6">
                        @if($experience->pricing->guests > 1){{ 1 }} - @endif{{ $experience->pricing->guests }} person(s)
                    </div>
                </div>
                @foreach($extras as $extra)
                <div class="row">
                    <div class="col-sm-6 col-xs-6">
                        <label>{{ $extra['label'] . ":" }}</label>
                    </div>
                    <div class="col-sm-6 col-xs-6">
                        {{ $experience[$extra['name']] }}
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
@endsection