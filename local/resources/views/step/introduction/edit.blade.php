@extends('layouts.step')

@section('content')
@include('step.partials.sidebar', ['active' => 'introduction', 'links' => $links])
@include('step.introduction.form', [
'user' => $user, 
'introduction' => $introduction, 
'method' => 'PATCH',
'route' => ['introduction.update', $user->id]]) 
@include('partials.upload')
@endsection