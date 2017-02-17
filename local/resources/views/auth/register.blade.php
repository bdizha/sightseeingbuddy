@extends('layouts.app', ['isHome' => false, 'categories' => []])

@section('content')
@include('auth.partials.register', ['parent' => 'register'])
@endsection