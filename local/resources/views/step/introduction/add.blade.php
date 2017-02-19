@extends('layouts.app')

@section('content')
<section class="gray-block" id="page">
    <div class="container">
        @include('step.partials.sidebar', ['active' => 'introduction', 'links' => $links])
        {!! Form::open([
        'route' => 'introduction.store',
        'class' => 'col-sm-8 col-sm-offset-1 same-height']) !!}
        @include('step.introduction.form', ['user' => $user, 'introduction' => $introduction]) 
        {!! Form::close() !!}
    </div>
</section>
@endsection