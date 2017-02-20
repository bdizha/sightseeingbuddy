@extends('layouts.step')

@section('content')
@include('experience.partials.sidebar', ['active' => 'pricing', 'links' => $links])
{!! Form::open([
'route' => 'pricing.store',
'class' => 'col-sm-8 col-sm-offset-1 same-height']) !!}
@include('experience.pricing.form', ['user' => $user, 'experience' => $experience]) 
{!! Form::close() !!}
@endsection