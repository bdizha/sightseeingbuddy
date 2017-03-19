@extends('layouts.step', ['active' => 'contact', 'links' => $links])

@section('form')
    {!! Form::open([
    'method' => 'PATCH',
    'route' => ['contact.update', $user->id],
    'class' => '']) !!}
    @include('step.contact.form', ['user' => $user, 'contact' => $contact])
    {!! Form::close() !!}
@endsection