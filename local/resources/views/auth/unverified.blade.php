@extends('layouts.auth')

@section('content')
    @include('auth.partials.sidebar', ['active' => 'login', 'links' => $links])
    @include('auth.partials.unverified')
@endsection