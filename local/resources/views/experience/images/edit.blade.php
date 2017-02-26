@extends('layouts.step', ['hasJs' => true])

@section('content')
@include('experience.partials.sidebar', ['active' => 'images', 'links' => $links])
{!! Form::open([
'method' => 'PATCH',
'route' => ['info.update', $user->id],
'class' => 'col-sm-8 col-sm-offset-1 same-height']) !!}
@include('experience.images.form', ['user' => $user, 'gallery' => $gallery]) 
{!! Form::close() !!}
@endsection