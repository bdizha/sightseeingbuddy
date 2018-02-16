@extends('layouts.email')
@section('content')
    <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
        <tbody>
        @include('email.partials.content', ['text' => $content])
        @include('email.partials.button', ['url' => route("messages.index") . "?experience_id=". $experience->id, 'text' => 'Reply to ' . $user->first_name . '\'s message'])
        </tbody>
    </table>
@stop