@extends('layouts.email', ['heading'])
@section('content')
    <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
        <tbody>
        @include('email.partials.greeting', ['name' => $user->first_name])
        @include('email.partials.content', ['text' => "Thank you for verifying your account. You’re all set up to book your local experience."])
        @include('email.partials.content', ['text' => "Here are a some of our featured experiences:"])
        @include('email.partials.content', ['text' => "<br >"])
        @include('email.partials.content', ['text' => "Happy travelling,"])
        </tbody>
    </table>
@stop
