@extends('layouts.app')

@section('content')
<section class="gray-block" id="page">
    <div class="container">
        @include('experience.partials.sidebar', ['active' => 'info', 'links' => $links])
        {!! Form::open([
        'route' => ['info.update', experience->id],
        'class' => 'col-sm-8 col-sm-offset-1 same-height']) !!}
        @include('experience.info.form', ['user' => $user, 'experience' => $experience]) 
        {!! Form::close() !!}
    </div>
</section>
@endsection