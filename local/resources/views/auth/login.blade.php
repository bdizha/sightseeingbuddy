@extends('layouts.app', ['isHome' => false, 'categories' => []])

@section('content')  
@include('auth.partials.login', ['parent' => 'login'])
@endsection