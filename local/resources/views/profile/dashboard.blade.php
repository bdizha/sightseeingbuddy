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
                </ul>
            </div>
        </div>
        <div class="gray-bottom-border mb-1"></div>
        <div class='row'>
            <div class="col-sm-6 col-xs-12">
                <div class="table">
                    <div class="profile-picture">
                        <img src="/images/person.png" />
                    </div>
                    <div class="profile-info">
                        <h1>Welcome to your local dashboard</h1>
                        <h2>John Smith</h2>
                        <div class='row'>
                            <div class="col-sm-8 col-xs-8">
                                <span class="profile-label">
                                    Average rating:
                                </span>
                            </div>
                            <div class="col-sm-4 col-xs-4">
                                <span class="profile-value"></span>
                            </div>
                        </div>
                        <div class='row'>
                            <div class="col-sm-8 col-xs-8">
                                <span class="profile-label">
                                    Experiences offered:
                                </span>
                            </div>
                            <div class="col-sm-4 col-xs-4">
                                <span class="profile-value">4</span>
                            </div>
                        </div>
                        <div class='row'>
                            <div class="col-sm-8 col-xs-8">
                                <span class="profile-label">
                                    Successful experiences:
                                </span>
                            </div>
                            <div class="col-sm-4 col-xs-4">
                                <span class="profile-value">15</span>
                            </div>
                        </div>
                        <div class='row'>
                            <div class="col-sm-8 col-xs-8">
                                <span class="profile-label">
                                    Profile verified:
                                </span>
                            </div>
                            <div class="col-sm-4 col-xs-4">
                                <img src="" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xs-12">
                <div class='row'>
                    <div class="col-sm-12 col-xs-12">
                        <input type="submit" class="btn btn-lg btn-yellow fullwidth mb-1" value="CREATE NEW LOCAL EXPERIENCE" />
                    </div>
                    <div class="col-sm-6 col-xs-6">
                        <a href="{{ route('wallet.create') }}" class="btn btn-primary">Edit Profile</a>
                    </div>
                    <div class="col-sm-6 col-xs-6">
                        <a href="{{ route('wallet.create') }}" class="btn btn-primary pull-right">My Experiences</a>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="gray-bottom-border mt-1 mb-1"></div>
        
        <h1 class="page-title page-title-center">
            My experiences offered
        </h1>

        @include('profile.experience.list')
        
        <div class="clear-both"></div>
</section>
@endsection