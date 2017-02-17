@extends('layouts.auth', ['isHome' => false, 'categories' => []])

@section('content')
@include('step.skill.form', ['method' => 'POST', 'route' => 'skill.store', 'skill' => $skill, 'skills' => $skills]) 
@endsection