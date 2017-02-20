@extends('layouts.auth')

@section('content')
@include('step.experience.form', ['route' => 'experience.store', 'method' => 'POST', 'user' => $user, 'experiences' => $experiences]) 
@endsection