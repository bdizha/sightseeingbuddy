@extends('layouts.step')

@section('content')
@include('experience.partials.sidebar', ['active' => 'info', 'links' => $links])
{!! Form::open([
'method' => 'PATCH',
'route' => ['info.update', $experience->id],
'class' => 'col-sm-8 col-sm-offset-1 same-height']) !!}
@include('experience.info.form', ['user' => $user, 'experience' => $experience]) 
{!! Form::close() !!}
@endsection