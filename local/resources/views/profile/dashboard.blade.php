@extends('layouts.app')

@section('content')
    <section id="page" class="gray-block">
        <div class="container profile">

            @include('profile.partials.local', ['title' => 'Welcome to your local dashboard!'])

            <h1 id="experiences">
                My experiences offered
            </h1>

            @include('profile.experience.list', ['experiences' => $experiences])
            <div class="clear-both"></div>
        </div>
    </section>
@endsection