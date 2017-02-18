@extends('layouts.app')

@section('content')  
@section('content')
<section class="gray-block" id="page">
    <div class="container">
        @include('auth.partials.sidebar', ['active' => 'login', 'links' => $links])
        @include('auth.partials.login')
    </div>
</section>
@endsection