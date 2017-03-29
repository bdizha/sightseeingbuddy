@extends('layouts.email', ['heading'])
@section('heading')
@include('email.partials.heading', ['text' => 'Job Matches'])
@endsection
@section('content')
<table align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
    <tbody>
        @include('email.partials.greeting', ['text' => 'Sir/Madam'])
        @include('email.partials.content', ['text' => 'You have received a new candidate response to your job listing on:'])
        @include('email.partials.link', ['url' => '/', 'text' => 'www.jobeet.co.za'])
        @include('email.partials.content', ['text' => "Here's your Job advert:"])
        @include('email.partials.link', ['url' => '/job/' . $position->slug() . '/' . $position->reference, 'text' => $position->title])
        @include('email.partials.content', ['text' => "Message:"])
        @include('email.partials.content', ['text' => $application->message])
        @include('email.partials.button', ['url' => '/job/meta/create', 'text' => '+ New Job'])
    </tbody>
</table>
@stop