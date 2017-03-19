@extends('layouts.step', ['active' => 'contact', 'links' => $links])

@section('form')
    {!! Form::open([
    'route' => 'contact.store',
    'class' => '']) !!}
    @include('step.contact.form', ['user' => $user, 'contact' => $contact])
    {!! Form::close() !!}
@endsection