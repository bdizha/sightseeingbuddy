@extends('layouts.email')
@section('content')
    <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
        <tbody>
        @include('email.partials.greeting', ['name' => "Admin"])
        @include('email.partials.content', ['text' => "A new local has signed up. Please proceed to verify their profile here:"])
        @include('email.partials.content', ['text' => "Local's details:"])
        @foreach($details as $label => $detail)
            @include('email.partials.content', ['text' => "<b>" . $label . "</b>: " . $detail])
        @endforeach
        @include('email.partials.button', ['url' => '/local/profile/' . $user->username . "?verify=yes", 'text' => 'Verify profile'])
        </tbody>
    </table>
@stop