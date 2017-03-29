@extends('layouts.email', ['heading'])
@section('content')
    <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
        <tbody>
        @include('email.partials.content', ['text' => 'Hi ' . $user->first_name])
        @include('email.partials.content', ['text' => "Your booking has been confirmed, here are your details:"])
        @include('email.partials.content', ['text' => "Experience: " . $booking->experience->teaser])
        @include('email.partials.content', ['text' => "Host: " . $booking->experience->local->name])
        @include('email.partials.content', ['text' => "Date: " . \Carbon\Carbon::parse($booking->date)->format("d/m/Y")])
        @include('email.partials.content', ['text' => "Time: " . $booking->time])
        @include('email.partials.content', ['text' => "Number of guests: " . $booking->experience->pricing->guests])
        @include('email.partials.content', ['text' => "Special request: " . implode(",", unserialize($booking->special_requests))])
        @include('email.partials.content', ['text' => "If there’s anything you’d like to add, please contact (Host name):"])
        @include('email.partials.button', ['url' => '/profile/' . $booking->local->username, 'text' => 'Link to go to host profile'])
        @include('email.partials.content', ['text' => "Enjoy your experience,"])
        </tbody>
    </table>
@stop