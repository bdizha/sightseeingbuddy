@extends('layouts.email')
@section('content')
    <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
        <tbody>
        @include('email.partials.content', ['text' => "Hi: " . $user->first_name])
        @include('email.partials.content', ['text' => "You are receiving this email because we received a password reset request for your account. Click button to reset password.
    "])
        @include('email.partials.button', ['url' => url('password/reset', $token).'?email='.urlencode($user->getEmailForPasswordReset()), 'text' => 'Reset Password'])
        @include('email.partials.content', ['text' => "If you did not request a password reset, no further action is required."])
        @include('email.partials.content', ['text' => "If you’re having trouble clicking the \"Reset Password\" button, copy and paste the URL below into your web browser:"])
        @include('email.partials.content', ['text' =>  url('password/reset', $token).'?email='.urlencode($user->getEmailForPasswordReset())])
        </tbody>
    </table>
@stop