@extends('layouts.app')

@section('content')
    <section id="page" class="gray-block">
        <div class="container profile">

            @include('profile.partials.local', ['title' => 'Welcome to your local dashboard'])

            <h1 id="experiences" class="page-title page-title-center">
                My experiences offered
            </h1>

            @include('profile.experience.list', ['experiences' => $user->experiences])
            <div class="clear-both"></div>
        </div>
    </section>
@endsection