@extends('layouts.email')
@section('content')
    <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
        <tbody>
        @include('email.partials.greeting', ['name' => $user->first_name])
        @include('email.partials.content', ['text' => "Be ready to welcome the world to your doorstep."])
        @include('email.partials.content', ['text' => "You’ve been called the ‘best host ever’. Now’s your time to shine."])
        @include('email.partials.content', ['text' => "Please proceed to create your new experience/s on your local dashboard. You’ll be contacted by us to verify your profile, have a copy of your ID ready for part of the verification process. If you’re offering a food experience, get ready to cook for us, this is part of the verification process."])
        @include('email.partials.content', ['text' => "<br >"])
        @include('email.partials.content', ['text' => "Happy hosting,"])
        </tbody>
    </table>
@stop