@extends('layouts.auth')

@section('content')
    @include('auth.partials.sidebar', ['active' => 'find', 'links' => $links])
    @include('auth.partials.register')
@endsection