@extends('layouts.app')

@section('content')
    <section id="page" class="gray-block">

        @include('experience.partials.header', ['type' => 'schedule'])

        <div class="container experience-block gray-block" id='experience-info'>
            <div class="gray-bottom-border"></div>
            <h1 id="experiences" class="page-title page-title-center">
                Availability of local experience
            </h1>
            <div class="row">
                <?php $days = array_keys(Helper::days()) ?>
                <?php $inActiveDays = array_diff($days, $experience->days) ?>
                <div class="col-sm-6 col-xs-12">
                    <div id="datepicker" class="datepicker" data-days-inactive="{{ implode(",", $inActiveDays) }}"
                         data-days-active="{{ implode(",", $experience->days) }}"></div>
                </div>
                <div class="col-sm-6 col-xs-12">
                    @if(Auth::guest() || Auth::user()->id != $experience->user->id)
                        <h3>Confirm your dates</h3>
                        <div class="media-summary">
                            <p>We’d hate to see you set your heart on an experience only to find out afterwards that
                                your selected host is unavailable.</p>
                            <p>Check when your host is available and not available on this convenient calendar.</p>
                        </div>
                    @else
                        <h3>Manage your time</h3>
                        <div class="media-summary">
                            <p>Our easy to use monthly calendar shows and highlights your availability. You can see when
                                your experience is booked for. We’ll also keep you updated by email when a booking’s
                                been made.</p>
                        </div>
                    @endif
                    <h2>Legend</h2>
                    <div class="legend">
                        <icon class="available"></icon>
                        Available on this day
                    </div>
                    <div class="legend">
                        <icon class="not-available"></icon>
                        Not available on this day
                    </div>
                </div>
            </div>
        </div>
        <input type="hidden" value="{{ $experience->id }}" id="experience-id"/>

        @include('experience.partials.availability')
    </section>
@endsection