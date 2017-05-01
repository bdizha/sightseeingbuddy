@extends('layouts.app', ['isHome' => false, 'categories' => []])

@section('content')    
<div class="pub-edit">
    <div class="pub-table">
        @include('profile.partials.links', ['link' => 'password'])
        <div class="pub-form-column pub-form-edit">
            <div class="pub-form pub-shadow pub-radius">
                {!! Form::model($user, [
                'method' => 'PATCH',
                'route' => ['password.update', $user->id]
                ]) !!}
                @include('partials.newsletter')
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="pub-row pub-margin-bottom">
                    <label for="password" class="pub-label">Password</label>
                    <input id="password" type="password" placeholder="Password" class="pub-input pub-radius" name="password">
                </div>
                <div class="pub-row pub-margin-bottom">
                    <label for="password_confirmation" class="pub-label">Confirm Password</label>
                    <input id="password_confirmation" type="password" placeholder="Confirm Password" class="pub-input pub-radius" name="password_confirmation">
                </div>
                <div class="pub-row">
                    {!! Form::submit('Update', ['class' => 'pub-button pub-current pub-radius']) !!}
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection