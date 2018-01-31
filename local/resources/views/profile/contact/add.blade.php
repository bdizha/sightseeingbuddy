@extends('layouts.auth', ['isHome' => false, 'categories' => []])

@section('content')
<div class="jobPost">
    <header class="jobPostHeader">
        <h1><span>Step 1</span>: Contact</h1>
    </header>
    {!! Form::open([
    'route' => 'contact.store',
    'class' => 'jobForm jobGrey']) !!}
    @include('step.contact.form', ['user' => $user]) 
    {!! Form::close() !!}
</div>
@endsection