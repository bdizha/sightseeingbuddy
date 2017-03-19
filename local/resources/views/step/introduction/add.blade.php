@extends('layouts.step', ['active' => 'introduction', 'links' => $links, 'excludeJs' => true])

@section('form')
    {!! Form::open([
    'route' => 'introduction.store',
    'class' => '']) !!}
    @include('step.introduction.form', ['user' => $user, 'introduction' => $introduction])
    {!! Form::close() !!}
    @include('partials.upload')
@endsection