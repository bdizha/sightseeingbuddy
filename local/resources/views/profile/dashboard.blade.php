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
        <div class='row'>
            <div class="col-sm-6 col-xs-12">
                @include('profile.partials.stats', ['title' => 'Welcome to your local dashboard'])
            </div>
            <div class="col-sm-6 col-xs-12">
                <div class='row'>
                    <div class="col-sm-12 col-xs-12">
                        <a href="{{ route('info.create') }}" class="btn btn-lg btn-yellow fullwidth mb-1">CREATE NEW LOCAL EXPERIENCE</a>
                    </div>
                    <div class="col-sm-6 col-xs-6">
                        <a href="{{ route('introduction.edit', ["id" => Auth::user()->id]) }}" class="btn btn-primary">Edit Profile</a>
                    </div>
                    <div class="col-sm-6 col-xs-6">
                        <a href="#experiences" class="btn btn-primary pull-right">My Experiences</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="gray-bottom-border mt-1 mb-1"></div>

        <h1 id="experiences" class="page-title page-title-center">
            My experiences offered
        </h1>

        @include('profile.experience.list', ['experiences' => $user->experiences])

        <div class="clear-both"></div>
</section>
@endsection