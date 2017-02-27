@extends('layouts.step', ['hasJs' => false])

@section('content')
@include('experience.partials.sidebar', ['active' => 'images', 'links' => $links])
{!! Form::open([
'method' => 'PATCH',
'route' => ['images.update', $experience->id],
'class' => 'col-sm-8 col-sm-offset-1 same-height']) !!}
@include('experience.images.form', ['experience' => $experience, 'gallery' => $gallery]) 
{!! Form::close() !!}
@include('partials.upload')
@endsection