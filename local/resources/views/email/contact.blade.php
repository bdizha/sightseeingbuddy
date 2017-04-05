@extends('layouts.email')
@section('content')
    <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
        <tbody>
        @include('email.partials.content', ['text' => "Hi: " . $name])
        @foreach($contact as $field => $value)
            @include('email.partials.content', ['text' => "<b>" . $field . "</b>: " . $value])
        @endforeach
        </tbody>
    </table>
@stop