@extends('layouts.email', ['heading'])
@section('heading')
@include('email.partials.heading', ['text' => 'Find jobs without searching'])
@endsection
@section('content')
<table align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
    <tbody>
        @include('email.partials.greeting', ['name' => $user->first_name])
        
        @include('email.partials.content', ['text' => "Thanks again for joining Jobeet. Here are two things you can do to get the most out of your membership."])
        
        @include('email.partials.link', ['url' => '/welcome', 'text' => 'Set Job Preferences Here'])
        @include('email.partials.content', ['text' => "Be sure to let us know what you're looking for. Any updates you make will help us match you with the best opportunities for your career."])
        
        @include('email.partials.link', ['url' => '/welcome', 'text' => 'Add Resume Here'])
        @include('email.partials.content', ['text' => "Only candidates with resumes show up in recruiter searches. Don't miss out on the right opportunity - add your resume now!"])

        @include('email.partials.button', ['url' => '/jobs', 'text' => 'Browse Jobs Now'])
    </tbody>
</table>
@stop