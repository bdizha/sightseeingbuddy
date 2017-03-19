@extends('layouts.step')

@section('content')
@include('step.partials.sidebar', ['active' => 'introduction', 'links' => $links])
{!! Form::open([
'method' => 'PATCH',
'route' => ['introduction.update', $user->id],
'class' => '']) !!}
@include('step.introduction.form', ['user' => $user, 'introduction' => $introduction]) 
{!! Form::close() !!}
@include('partials.upload')
@endsection