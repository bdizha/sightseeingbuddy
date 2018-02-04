@extends('layouts.step', ['active' => 'location', 'links' => $links])

@section('form')
{!! Form::open([
'method' => 'PATCH',
'route' => ['location.update', $user->id],
'class' => '']) !!}
@include('step.location.form', ['user' => $user, 'location' => $location]) 
{!! Form::close() !!}
@endsection