@extends('layouts.app')

@section('content')
<section class="gray-block" id="page">
    <div class="container">
        @include('step.partials.sidebar', ['active' => 'wallet', 'links' => $links])
        {!! Form::open([
        'route' => 'wallet.store',
        'class' => 'col-sm-8 col-sm-offset-1 same-height']) !!}
        @include('step.wallet.form', ['user' => $user, 'wallet' => $wallet]) 
        {!! Form::close() !!}
    </div>
</section>
@endsection