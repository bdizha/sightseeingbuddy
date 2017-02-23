@extends('layouts.step')

@section('content')
@include('step.partials.sidebar', ['active' => 'contact', 'links' => $links])
{!! Form::open([
'method' => 'PATCH',
'route' => ['contact.update', $user->id],
'class' => 'col-sm-8 col-sm-offset-1 same-height']) !!}
@include('step.contact.form', ['user' => $user, 'contact' => $contact]) 
{!! Form::close() !!}
@endsection