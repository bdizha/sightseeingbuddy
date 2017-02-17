@extends('layouts.step', ['heading' => $user->first_name . ', welcome to Jobeet!', 'link' => ''])

@section('content')
<div class="jobPost">
    <div class="jobGrey">
        <div class="jobTip">
            Only candidates with resumes show up in our recruiter searches. And we have more than 20,000 recruiters and hiring managers searching for candidates like you.
        </div>
        <div class="jobWhite">
            <div class="jobButton">
                <div class="button greenButton">Upload a Resume</div>
            </div>
        </div>
        <div class="jobWhite">
            <div class="jobButton">
                <a href="{{ url('/contact/create') }}" class="button greyButton">Build a New Resume</a>
            </div>
        </div>
        <div class="jobRow jobCentered">
            <a href="{{ url('/welcome?step=later') }}">No thanks, I'll add one later</a>
        </div>
    </div>
</div>
@endsection