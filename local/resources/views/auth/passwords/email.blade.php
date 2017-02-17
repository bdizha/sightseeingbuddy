@extends('layouts.auth', ['isHome' => false, 'categories' => []])

@section('content')    
@include('auth.partials.email')
@endsection