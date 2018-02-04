@extends('layouts.step', ['active' => 'info', 'links' => $links, 'disable' => true])

@section('form')
    {!! Form::open([
    'route' => 'info.store',
    'class' => '']) !!}
    @include('experience.info.form', ['user' => $user, 'experience' => $experience])
    {!! Form::close() !!}
@endsection