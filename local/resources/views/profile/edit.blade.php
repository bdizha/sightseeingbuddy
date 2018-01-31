@extends('layouts.app', ['isHome' => false, 'categories' => []])

@section('content')    
<div class="pub-edit">
    <div class="pub-table">
        @include('profile.partials.links', ['link' => 'profile'])
        <div class="pub-form-column pub-form-edit">
            <div class="pub-form pub-shadow pub-radius">
                {!! Form::model($user, [
                'method' => 'PATCH',
                'route' => ['settings.update', $user->id]
                ]) !!}
                @include('partials.newsletter')
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="id" value="{{ $user->id }}">
                <div class="pub-row pub-margin-bottom">
                    {!! Form::label('name', 'Full Name', ['class' => 'pub-label']) !!}
                    {!! Form::text('name', $user->name, ['class' => 'pub-input pub-radius', 'placeholder' => 'Full Name']) !!}
                </div>
                <div class="pub-row pub-margin-bottom">
                    {!! Form::label('username', 'Username', ['class' => 'pub-label']) !!}
                    {!! Form::text('username', $user->username, ['class' => 'pub-input pub-radius', 'placeholder' => 'Username']) !!}
                </div>
                <div class="pub-row pub-margin-bottom">
                    {!! Form::label('email', 'Email', ['class' => 'pub-label']) !!}
                    {!! Form::text('email', $user->email, ['class' => 'pub-input pub-radius', 'placeholder' => 'Email']) !!}
                </div>
                <div class="pub-row pub-margin-bottom">
                    {!! Form::label('mobile', 'Mobile Number', ['class' => 'pub-label']) !!}
                    {!! Form::text('mobile', $user->mobile, ['class' => 'pub-input pub-radius', 'placeholder' => 'Mobile Number']) !!}
                </div>
                <div class="pub-row pub-margin-bottom">
                    {!! Form::label('bio', 'Bio', ['class' => 'pub-label']) !!}
                    {!! Form::textarea('bio', $user->bio, ['class' => 'pub-input pub-radius', 'placeholder' => 'Summary']) !!}
                </div>
                <div class="pub-row pub-margin-bottom">
                    {!! Form::label('gender', 'Gender', ['class' => 'pub-label']) !!}
                    {!! Form::select('gender', [0 => 'Not Set', 'Male', 'Female'], $user->gender, array('class'=>'pub-input pub-radius')) !!}
                </div>
                <div class="pub-row pub-margin-bottom">
                    {!! Form::label('city', 'City', ['class' => 'pub-label']) !!}
                    {!! Form::text('city', $user->city_id ? $user->city->name : null , ['class' => 'pub-input pub-radius', 'placeholder' => 'City']) !!}
                </div>
                <div class="pub-row pub-margin-bottom">
                    {!! Form::label('country_id', 'Country', ['class' => 'pub-label']) !!}
                    {!! Form::select('country_id', $countries, $user->country_id, array('class'=>'pub-input pub-radius')) !!}
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