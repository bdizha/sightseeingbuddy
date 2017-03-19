@extends('layouts.auth')

@section('content')
    @include('auth.partials.sidebar', ['active' => 'register', 'links' => $links])
    @include('auth.partials.register')
@endsection