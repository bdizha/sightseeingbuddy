@extends('layouts.app')

@section('content')
@include('experience.partials.sidebar', ['active' => 'images', 'links' => $links])
{!! Form::open([
'route' => 'images.store',
'class' => 'col-sm-8 col-sm-offset-1 same-height']) !!}
@include('experience.images.form', ['user' => $user, 'experience' => $experience]) 
{!! Form::close() !!}
@include('partials.upload')
@endsection