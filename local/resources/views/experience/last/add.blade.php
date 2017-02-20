@extends('layouts.app')

@section('content')
@include('experience.partials.sidebar', ['active' => 'last', 'links' => $links])
{!! Form::open([
'route' => 'last.store',
'class' => 'col-sm-8 col-sm-offset-1 same-height']) !!}
@include('experience.last.form', ['user' => $user, 'experience' => $experience]) 
{!! Form::close() !!}
@endsection