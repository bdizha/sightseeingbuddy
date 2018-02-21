@extends('layouts.app', ['url' => '/local/search'])

@section('content')
    <section id="page" class="booking-block">
        @include('profile.partials.header', ['user' => $user, 'section' => 'search', 'title' => 'Your booking history'])
    </section>

    <section id="page" class="gray-block">
        <div class="container profile">

            @include('profile.partials.tabs', ['user' => $user, 'title' => '', 'tab' => 'bookings'])
            <div class="gray-bottom-border mb-1"></div>

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
                            <button class="btn btn-default btn-modal" modal-id="booking-modal-{{ $booking->id }}">View
                            </button>
                            @if($booking->status !== 'pending')
                                <button class="btn btn-danger btn-modal" modal-id="cancel-modal-{{ $booking->id }}">Cancel</button>
                            @endif
                            @include("booking.partials.cancel", ['booking' => $booking])
                            @include('booking.partials.history', ['booking' => $booking, 'experience' => $booking->experience, 'user' => $booking->user])
                        </td>
                    </tr>
                @endforeach
                </tbody>
                @if(empty($bookings->count()))
                    <tfoot>
                    <tr>
                        <td colspan="6">
                            No bookings found :(
                        </td>
                    </tr>
                    </tfoot>
                @endif
            </table>
        </div>
    </section>
@endsection