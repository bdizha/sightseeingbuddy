@extends('layouts.app')

@section('content')
<section id="page" class="gray-block">
   
    @include('experience.partials.header')

    <div class="index-slider">
        @include('experience.partials.carousel')
    </div>

    <div class="container profile experience-block gray-block mt-1" id='experience-info'>

        <h1 id="experiences">
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
                {!! $experience->cover_image !!}
                <div class="row">
                    <div class="col-sm-12 col-xs-12 mt-1">
                        @if(Auth::guest() OR $experience->user->id != Auth::user()->id)
                            <a href="/local/experience/{{ $experience->id }}/schedule"
                               class="btn btn-lg btn-yellow fullwidth mb-1">Book experience</a>
                        @else
                            <a href="/local/info/{{ $experience->id }}/edit"
                               class="btn btn-lg btn-yellow fullwidth mb-1">Edit experience</a>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xs-12">
                <div class="gray-bottom-border mt-1 mb-1"></div>
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
                        {{ $experience->units }}
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