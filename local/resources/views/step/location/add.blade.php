@extends('layouts.auth', ['isHome' => false, 'categories' => []])

@section('content')
@include('step.education.form', ['route' => 'education.store', 'method' => 'POST', 'schools' => $schools]) 
@endsection