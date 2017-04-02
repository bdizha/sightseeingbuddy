@extends('layouts.email', ['heading'])
@section('content')
    <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
        <tbody>
        @include('email.partials.greeting', ['name' => $user->first_name])
        @include('email.partials.content', ['text' => "Be ready to be inspired by our unique, fun and hospitable locals. Our locals will take you away from the typical tourist attractions and into their lives, showing you the real Africa."])
        @include('email.partials.content', ['text' => "You’re one step away from unlocking local experiences."])
        @include('email.partials.button', ['url' => route("auth_verify", ['verify_token' => $user->verify_token]), 'text' => 'Click to confirm email'])
        @include('email.partials.content', ['text' => "Thank you for joining Keep it Local!"])
        @include('email.partials.content', ['text' => "<br >"])
        @include('email.partials.content', ['text' => "Have great day,"])
        </tbody>
    </table>
@stop