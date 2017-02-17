@extends('layouts.auth', ['isHome' => false, 'categories' => []])

@section('content')
@include('step.summary.form', ['method' => 'POST', 'route' => 'summary.store', 'user' => $user]) 
@endsection