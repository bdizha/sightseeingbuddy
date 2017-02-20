@extends('layouts.app')

@section('content')
<section class="gray-block" id="page">
    <div class="container">
        @include('experience.partials.sidebar', ['active' => 'pricing', 'links' => $links])
        {!! Form::open([
        'route' => ['pricing.update', experience->id],
        'class' => 'col-sm-8 col-sm-offset-1 same-height']) !!}
        @include('experience.pricing.form', ['user' => $user, 'experience' => $experience]) 
        {!! Form::close() !!}
    </div>
</section>
@endsection