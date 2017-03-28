@extends('layouts.step', ['active' => 'wallet', 'links' => $links])

@section('form')
    {!! Form::open([
    'route' => 'wallet.store',
    'class' => '']) !!}
    @include('step.wallet.form', ['user' => $user, 'wallet' => $wallet])
    {!! Form::close() !!}
@endsection