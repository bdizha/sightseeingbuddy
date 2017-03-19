@extends('layouts.step', ['active' => 'images', 'links' => $links, 'disable' => true, 'excludeJs' => true])

@section('form')
    {!! Form::open([
    'method' => 'PATCH',
    'route' => ['images.update', $experience->id],
    'class' => '']) !!}
    @include('experience.images.form', ['experience' => $experience, 'gallery' => $gallery])
    {!! Form::close() !!}
    @include('partials.upload')
@endsection