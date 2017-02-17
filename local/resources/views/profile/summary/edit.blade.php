@extends('layouts.auth', ['isHome' => false, 'categories' => []])

@section('content')
@include('step.summary.form', ['method' => 'PATCH', 'route' => ['summary.update', $user->id], 'user' => $user])
@endsection