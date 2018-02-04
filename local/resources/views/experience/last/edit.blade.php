@extends('layouts.step', ['active' => 'last', 'links' => $links])

@section('form')
    {!! Form::open([
    'method' => 'PATCH',
    'route' => ['last.update', $experience->id],
    'class' => '']) !!}
    @include('experience.last.form', ['experience' => $experience])
    {!! Form::close() !!}
@endsection