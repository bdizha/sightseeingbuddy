@extends('layouts.app')

@section('content')
<section class="gray-block" id="page">
    <div class="container">
        @include('step.partials.sidebar', ['active' => 'contact', 'links' => $links])
        {!! Form::open([
        'route' => 'contact.store',
        'class' => 'col-sm-8 col-sm-offset-1 same-height']) !!}
        @include('step.contact.form', ['user' => $user, 'contact' => $contact]) 
        {!! Form::close() !!}
    </div>
</section>
@endsection