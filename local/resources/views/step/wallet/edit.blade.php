@extends('layouts.step')

@section('content')
@include('step.partials.sidebar', ['active' => 'wallet', 'links' => $links])
{!! Form::open([
'route' => ['wallet.update', wallet->id],
'class' => 'col-sm-8 col-sm-offset-1 same-height']) !!}
@include('step.wallet.form', ['user' => $user, 'wallet' => $wallet]) 
{!! Form::close() !!}
@endsection