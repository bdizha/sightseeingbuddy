@extends('layouts.app')

@section('content')
<section class="gray-block" id="page">
    <div class="container">
        @include('auth.partials.sidebar', ['active' => 'register', 'links' => $links])
        @include('auth.partials.register')
    </div>
</section>
@endsection