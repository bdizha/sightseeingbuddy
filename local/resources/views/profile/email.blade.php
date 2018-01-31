@extends('layouts.app', ['isHome' => false, 'categories' => []])

@section('content')    
<div class="pub-edit">
    <div class="pub-table">
        @include('profile.partials.links', ['link' => 'email'])
        <div class="pub-form-column pub-form-edit">
            <div class="pub-form pub-shadow pub-radius">
                {!! Form::model($user, [
                'method' => 'PATCH',
                'route' => ['email.update', $user->id]
                ]) !!}
                @include('partials.newsletter')
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="pub-row pub-margin-bottom">
                    {!! Form::label('news', 'News', ['class' => 'pub-label']) !!}
                    {!! Form::checkbox('news', 1, $email->news) !!}
                </div>
                <div class="pub-row pub-margin-bottom">
                    {!! Form::label('updates', 'Updates', ['class' => 'pub-label']) !!}
                    {!! Form::checkbox('updates', 1, $email->updates) !!}
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