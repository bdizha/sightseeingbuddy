@extends('layouts.email')
@section('content')
    <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
        <tbody>
        @include('email.partials.content', ['text' => "<b>Email</b>: " . $subscriber->email])
        </tbody>
    </table>
@stop