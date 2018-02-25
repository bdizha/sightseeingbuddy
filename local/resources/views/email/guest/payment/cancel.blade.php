@extends('layouts.email', ['heading'])
@section('content')
    <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
        <tbody>
        @include('email.partials.content', ['text' => 'Hi ' . $user->first_name])
        @include('email.partials.content', ['text' => "Your booking has been cancelled - " . $booking->reference])
        @include('email.partials.content', ['text' => "<b>Experience</b>: " . $experience->teaser])
        @include('email.partials.content', ['text' => "<b>Local</b>: " . $local->name])
        @include('email.partials.content', ['text' => "<b>Date</b>: " . \Carbon\Carbon::parse($booking->date)->format("d/m/Y")])
        @include('email.partials.content', ['text' => "<b>Time</b>: " . $booking->time])
        @include('email.partials.content', ['text' => "<b>Number of guests</b>: " . $pricing->guests])
        @include('email.partials.content', ['text' => "If there’s anything you need help with, please feel free to contact us."])
        @include('email.partials.button', ['url' => '/local/experience/' . $experience->slug, 'text' => "View Experience"])
        @include('email.partials.content', ['text' => "If there’s anything you need help with, please contact us."])
        @include('email.partials.content', ['text' => "Good luck,"])
        </tbody>
    </table>
@stop