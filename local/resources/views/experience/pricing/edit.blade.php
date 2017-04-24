@extends('layouts.step', ['active' => 'pricing', 'links' => $links])

@section('form')
    {!! Form::open([
    'method' => 'PATCH',
    'route' => ['pricing.update', $pricing->id],
    'class' => '']) !!}
    @include('experience.pricing.form', ['user' => $user, 'pricing' => $pricing])
    {!! Form::close() !!}
@endsection