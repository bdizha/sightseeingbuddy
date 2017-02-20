@extends('layouts.step')

@section('content')
@include('step.partials.sidebar', ['active' => 'location', 'links' => $links])
{!! Form::open([
'route' => 'location.store',
'class' => 'col-sm-8 col-sm-offset-1 same-height']) !!}
@include('step.location.form', ['user' => $user]) 
{!! Form::close() !!}
@endsection