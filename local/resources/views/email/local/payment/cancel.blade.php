@extends('layouts.email', ['heading'])
@section('content')
    <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
        <tbody>
        @include('email.partials.content', ['text' => 'Hi ' . $local->first_name])
        @include('email.partials.content', ['text' => "Your booking has been cancelled - " . $booking->reference])
        @include('email.partials.content', ['text' => "<b>Experience</b>: " . $experience->teaser])
        @include('email.partials.content', ['text' => "<b>Guest</b>: " . $user->name])
        @include('email.partials.content', ['text' => "<b>Meeting Point</b>: " . $meetingPoint])
        @include('email.partials.content', ['text' => "<b>Date</b>: " . \Carbon\Carbon::parse($booking->date)->format("d/m/Y")])
        @include('email.partials.content', ['text' => "<b>Time</b>: " . $booking->time])
        @include('email.partials.content', ['text' => "<b>Number of guests</b>: " . $booking->guests])
        @include('email.partials.content', ['text' => "<b>Total Price</b>: " . $total])
        @include('email.partials.content', ['text' => "<b>Reason</b>: " . $booking->reason])
        @include('email.partials.content', ['text' => "If there’s anything you need help with, please feel free to contact us."])
        @include('email.partials.button', ['url' => '/local/experience/' . $experience->slug, 'text' => "View Experience"])
        </tbody>
    </table>
@stop