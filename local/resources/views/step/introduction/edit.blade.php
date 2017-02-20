@extends('layouts.step')

@section('content')
@include('step.partials.sidebar', ['active' => 'introduction', 'links' => $links])
{!! Form::open([
'route' => ['introduction.update', introduction->id],
'class' => 'col-sm-8 col-sm-offset-1 same-height']) !!}
@include('step.contact.form', ['user' => $user, 'introduction' => $introduction]) 
{!! Form::close() !!}
@endsection