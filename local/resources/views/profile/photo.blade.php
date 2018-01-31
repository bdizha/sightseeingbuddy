@extends('layouts.app', ['isHome' => false, 'categories' => []])

@section('content')    
<div class="pub-edit">
    <div class="pub-table">
        @include('profile.partials.links', ['link' => 'photo'])
        <div class="pub-form-column pub-form-edit">
            <div class="pub-form pub-shadow pub-radius">
                {!! Form::model($user, [
                'method' => 'PATCH',
                'route' => ['photo.update', $user->id],
                'files' => true
                ]) !!}
                @include('partials.newsletter')
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="pub-row pub-margin-bottom">
                    @if ($user->media)
                    <div class="pub-image-block pub-centered pub-margin-bottom">
                        <img alt="{{ $user->username }}" class="pub-media pub-radius pub-shadow" src="/{{ Hawkeye::generateFullImagePathFor($user->media) }}" title="{{ $user->username }}"/>
                    </div>
                    @endif
                    <div class="pub-media-frame">
                        <div class="pub-button pub-radius">Choose Photo</div>
                        {!! Form::file('media') !!}
                    </div>
                </div>
                @include('profile.partials.actions', ['return' => $user->username, 'label' => 'Update'])
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection