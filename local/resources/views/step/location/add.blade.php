@extends('layouts.step', ['active' => 'location', 'links' => $links])

@section('form')
{!! Form::open([
'route' => 'location.store',
'class' => '']) !!}
@include('step.location.form', ['user' => $user]) 
{!! Form::close() !!}
@endsection