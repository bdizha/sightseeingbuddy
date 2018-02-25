@extends('layouts.email')
@section('content')
    <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
        <tbody>
        @include('email.partials.greeting', ['name' => $user->first_name])
        @include('email.partials.content', ['text' => "Thank you for signing up to become a local. You’ll be contacted by us to verify your profile, have a certified copy of your ID/Passport ready.  If you’re offering a food experience, get ready to cook for us, this is part of the verification process."])
        </tbody>
    </table>
@stop