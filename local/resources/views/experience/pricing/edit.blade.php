@extends('layouts.step')

@section('content')
@include('experience.partials.sidebar', ['active' => 'pricing', 'links' => $links])
{!! Form::open([
'method' => 'PATCH',
'route' => ['pricing.update', $user->id],
'class' => 'col-sm-8 col-sm-offset-1 same-height']) !!}
@include('experience.pricing.form', ['user' => $user, 'pricing' => $pricing]) 
{!! Form::close() !!}
@endsection