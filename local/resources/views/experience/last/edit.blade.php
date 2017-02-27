@extends('layouts.step', ['hasJs' => true])

@section('content')
@include('experience.partials.sidebar', ['active' => 'last', 'links' => $links])
{!! Form::open([
'method' => 'PATCH',
'route' => ['last.update', $experience->id],
'class' => 'col-sm-8 col-sm-offset-1 same-height']) !!}
@include('experience.last.form', ['experience' => $experience]) 
{!! Form::close() !!}
@endsection