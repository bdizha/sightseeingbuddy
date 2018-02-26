@extends('layouts.email', ['heading'])
@section('content')
    <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
        <tbody>
        @include('email.partials.content', ['text' => 'Hi ' . $user->first_name])
        @include('email.partials.content', ['text' => "Your booking has failed. And please try again here:"])
        @include('email.partials.button', ['url' => '/local/experience/' . $experience->slug, 'text' => $experience->teaser])
        @include('email.partials.content', ['text' => "If there’s anything you need help with, please contact us."])
        </tbody>
    </table>
@stop