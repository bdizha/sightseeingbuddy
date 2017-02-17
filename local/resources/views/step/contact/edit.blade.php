@extends('layouts.auth', ['isHome' => false, 'categories' => []])

@section('content')
@include('step.skill.form', ['method' => 'PATCH', 'route' => ['skill.update', $skill->id], 'skill' => $skill, 'skills' => $skills])
@endsection