@extends('layouts.step', ['active' => 'wallet', 'links' => $links])

{!! Form::open([
'route' => 'wallet.store',
'class' => '']) !!}
@include('step.wallet.form', ['user' => $user, 'wallet' => $wallet]) 
{!! Form::close() !!}
@endsection