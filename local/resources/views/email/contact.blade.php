@extends('layouts.email', ['heading'])
@section('heading')
@include('email.partials.heading', ['text' => 'New Contact'])
@endsection
@section('content')
<table align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
    <tbody>
        @foreach($positions as $position)
        @include('email.partials.link', ['url' => '/job/' . $position->slug() . '/' . $position->reference, 'text' => $position->title])
        @include('email.partials.content', ['text' => $position->location()])
        @endforeach

        @include('email.partials.button', ['url' => '/jobs', 'text' => 'See More Jobs'])
    </tbody>
</table>
@stop