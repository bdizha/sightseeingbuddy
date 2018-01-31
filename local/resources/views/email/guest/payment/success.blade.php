@extends('layouts.email', ['heading'])
@section('content')
    <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
        <tbody>
        @include('email.partials.content', ['text' => 'Hi ' . $user->first_name])
        @include('email.partials.content', ['text' => "Your booking has been confirmed, here are your details:"])
        @include('email.partials.content', ['text' => "<b>Experience</b>: " . $experience->teaser])
        @include('email.partials.content', ['text' => "<b>Host</b>: " . $local->name])
        @include('email.partials.content', ['text' => "<b>Date</b>: " . \Carbon\Carbon::parse($booking->date)->format("d/m/Y")])
        @include('email.partials.content', ['text' => "<b>Time</b>: " . $booking->time])
        @include('email.partials.content', ['text' => "<b>Number of guests</b>: " . $pricing->guests])
        @include('email.partials.content', ['text' => "<b>Special request</b>: " . implode(",", unserialize($booking->special_requests))])
        @include('email.partials.content', ['text' => "If there’s anything you’d like to add, please contact (Host name):"])
        @include('email.partials.button', ['url' => '/local/profile/' . $booking->local->username, 'text' => 'Visit your host\'s profile'])
        @include('email.partials.content', ['text' => "Enjoy your experience,"])
        </tbody>
    </table>
@stop