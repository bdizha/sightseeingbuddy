@extends('layouts.step', ['active' => 'introduction', 'links' => $links])

@section('form')
    {!! Form::open([
    'route' => 'introduction.store',
    'class' => '']) !!}
    @include('step.introduction.form', ['user' => $user])
    {!! Form::close() !!}
@endsection