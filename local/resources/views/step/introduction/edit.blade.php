@extends('layouts.step', ['active' => 'introduction', 'links' => $links])

@section('form')
    {!! Form::open([
    'method' => 'PATCH',
    'route' => ['introduction.update', $user->id],
    'class' => '']) !!}
    @include('step.introduction.form', ['user' => $user])
    {!! Form::close() !!}
@endsection