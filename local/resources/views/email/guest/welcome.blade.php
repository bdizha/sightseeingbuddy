@extends('layouts.email')
@section('content')
    <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
        <tbody>
        @include('email.partials.greeting', ['name' => $user->first_name])
        @include('email.partials.content', ['text' => "Thank you for verifying your account. You’re all set up to book an experience with a buddy."])
        @include('email.partials.content', ['text' => "Click button to login to your dashboard."])
        @include('email.partials.button', ['url' => '/local/login', 'text' => 'Login'])
        </tbody>
    </table>
@stop