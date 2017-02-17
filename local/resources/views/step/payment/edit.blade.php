@extends('layouts.auth', ['isHome' => false, 'categories' => []])

@section('content')
@include('step.experience.form', ['method' => 'PATCH', 'route' => ['experience.update', $experience->id], 'experiences' => $experiences]) 
@endsection