@extends('layouts.auth')

@section('content')
    @include('auth.partials.sidebar', ['active' => null, 'links' => $links])
    @include('auth.partials.reset')
@endsection