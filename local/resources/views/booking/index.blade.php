@extends('layouts.app', ['url' => '/local/search'])

@section('content')
    <section id="page" class="gray-block">
        <div class="container profile">
            <div class='row'>
                <div class="col-sm-12 col-xs-12">
                    <ul class="profile-nav pull-right">
                        <li class="item active">
                            <a href="{{ "/local/dashboard" }}">
                                <i class="dashboard"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                        <li class="item">
                            <a href="{{ "/local/bookings" }}">
                                <i class="bookings"></i>
                                <span>Bookings</span>
                            </a>
                        </li>
                        <li class="item">
                            <a href="/local/profile/{{ $user->username }}">
                                <img src="/images/person-66.png"/>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="gray-bottom-border mb-1"></div>
            <div class='row'>
                <div class="col-sm-6 col-xs-12">
                    @include('profile.partials.stats', ['title' => 'Your booking history'])
                </div>
                <div class="col-sm-6 col-xs-12">
                    <div class='row mt-1'>
                        <div class="col-sm-12 col-xs-12">
                            <a href="{{ route('info.create') }}" class="btn btn-lg btn-yellow fullwidth mb-1">CREATE NEW
                                LOCAL EXPERIENCE</a>
                        </div>
                        <div class="col-sm-6 col-xs-6">
                            <a href="{{ route('introduction.edit', ["id" => Auth::user()->id]) }}"
                               class="btn btn-primary fullwidth">Edit Profile</a>
                        </div>
                        <div class="col-sm-6 col-xs-6">
                            <a href="#experiences" class="btn btn-primary pull-right fullwidth">My Experiences</a>
                        </div>
                    </div>
                    @if($user->id == Auth::user()->id)
                        <div class="row">
                            <div class="col-sm-12 col-xs-12 mt-1 text-bold">
                                Amount made thus far: R{{ $user->total_revenue }}
                            </div>
                        </div>
                    @endif
                </div>
            </div>

            <div class="gray-bottom-border mt-1 mb-1"></div>

            <h1 id="experiences" class="page-title page-title-center">
                My bookings
            </h1>
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>#Reference</th>
                    <th>Date</th>
                    <th>Host</th>
                    <th>Amount</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($bookings as $booking)
                    <tr>
                        <th scope="row">{{ $booking->reference }}</th>
                        <td>{{ \Carbon\Carbon::parse($booking->date)->format("d/m/Y") }}</td>
                        <td>{{ $booking->experience->user->first_name }}</td>
                        <td>R{{ $booking->amount }}</td>
                        <td>{{ ucfirst($booking->status) }}</td>
                        <td>
                            <button class="btn btn-primary btn-modal" modal-id="booking-modal-{{ $booking->id }}">View</button>
                        </td>
                    </tr>
                    @include('booking.partials.history', ['booking' => $booking, 'experience' => $booking->experience, 'user' => $booking->user])
                @endforeach
                </tbody>
            </table>
        </div>
    </section>
@endsection