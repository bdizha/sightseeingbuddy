@extends('layouts.email')
@section('content')
    <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
        <tbody>
        @include('email.partials.greeting', ['name' => $recipient->first_name])
        @include('email.partials.content', ['text' => "You have new message from " . $sender->first_name . " " . $sender->last_name .". Click button to reply"])
        @include('email.partials.button', ['url' => route("messages.index") . "?message_id=". $messageId, 'text' => 'Reply to ' . $sender->first_name . '\'s message'])
        </tbody>
    </table>
@stop