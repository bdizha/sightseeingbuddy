@extends('layouts.auth', ['page' => 'error'])

@section('content')
<div class="jobPost">
    <header class="jobErrorHeader">
        <h1>Oops, page not found :(</h1>
    </header>
    <div class="jobCentered">
        <a href="/"><img alt="404" src="/images/404.png" title="404" /></a>
    </div>  
</div>
@endsection