@extends('layouts.email')
@section('content')
    <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
        <tbody>
        @include('email.partials.greeting', ['name' => $user->first_name])
        @include('email.partials.content', ['text' => "Be ready to be inspired by our unique, fun and hospitable buddies."])
        @include('email.partials.content', ['text' => "Activate your profile on Sightseeing Buddy by clicking the button."])
        @include('email.partials.button', ['url' => route("auth_verify", ['verify_token' => $user->verify_token]), 'text' => 'Activate my profile'])
        </tbody>
    </table>
@stop