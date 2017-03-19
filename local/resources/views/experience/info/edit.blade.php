@extends('layouts.step', ['active' => 'info', 'links' => $links])

@section('form')
    {!! Form::open([
    'method' => 'PATCH',
    'route' => ['info.update', $experience->id],
    'class' => '']) !!}
    @include('experience.info.form', ['user' => $user, 'experience' => $experience])
    {!! Form::close() !!}
@endsection