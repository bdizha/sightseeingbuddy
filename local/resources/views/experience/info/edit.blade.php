@extends('layouts.step', ['hasJs' => true])

@section('content')
@include('experience.partials.sidebar', ['active' => 'experience', 'links' => $links])
{!! Form::open([
'method' => 'PATCH',
'route' => ['info.update', $user->id],
'class' => 'col-sm-8 col-sm-offset-1 same-height']) !!}
@include('experience.info.form', ['user' => $user, 'experience' => $experience]) 
{!! Form::close() !!}
@endsection