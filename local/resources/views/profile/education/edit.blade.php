@extends('layouts.auth', ['isHome' => false, 'categories' => []])

@section('content')
@include('step.education.form', ['method' => 'PATCH', 'route' => ['education.update', $school->id], 'schools' => $schools]) 
@endsection