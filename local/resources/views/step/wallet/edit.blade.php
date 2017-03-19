@extends('layouts.step', ['active' => 'wallet', 'links' => $links])

@section('form')
{!! Form::open([
'method' => 'PATCH',
'route' => ['wallet.update', $user->id],
'class' => '']) !!}
@include('step.wallet.form', ['user' => $user, 'wallet' => $wallet]) 
{!! Form::close() !!}
@endsection