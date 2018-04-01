@extends('layouts.auth')

@section('content')
    <aside id="sidebar" class="col-sm-3 local-left same-height hidden-sm hidden-xs" data-mh="column">
        <ul class="nav nav-stacked nav-pills">
            <li class="item item-level-1 active">
                <a href="{{ route("guest.edit", ['id' => $user->id]) }}">
                    <h2>Settings</h2>
                    <span>Update your details</span>
                </a>
            </li>
        </ul>
    </aside>
    <div class="col-sm-8 col-sm-offset-1 same-height mt-3 gray-bottom-border gray-top-border" data-mh="column">
        <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading">Update Your Details</div>
                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    {!! Form::open([
                       'method' => 'PATCH',
                       'route' => ['guest.update', $user->id],
                       'class' => ''])
                    !!}
                    {!! csrf_field() !!}
                    <input type="hidden" name="type" value="guest">
                    <div class="row form-group {{ $errors->has('first_name') ? 'has-error' : '' }}"
                         id="fields-first-name-field">
                        <div class="col-sm-9 col-xs-12">
                            @if ($errors->has('first_name'))
                                <label class="control-label"
                                       for="inputError1">{{ $errors->first('first_name') }}</label>
                            @endif
                            <input class="form-control fullwidth" type="text" id="fields-first-name"
                                   name="first_name"
                                   value="{{ old('first_name') ? old('first_name') : $user->first_name }}"
                                   autocomplete="off"
                                   required placeholder="Your first name*">
                        </div>
                    </div>
                    <div class="row form-group {{ $errors->has('last_name') ? 'has-error' : '' }}"
                         id="fields-last-name-field">
                        <div class="col-sm-9 col-xs-12">
                            @if ($errors->has('last_name'))
                                <label class="control-label"
                                       for="inputError1">{{ $errors->first('last_name') }}</label>
                            @endif
                            <input class="form-control fullwidth" type="text" id="fields-last-name" name="last_name"
                                   value="{{ old('last_name') ? old('last_name') : $user->last_name }}"
                                   autocomplete="off"
                                   required placeholder="Your last name*">
                        </div>
                    </div>
                    <div class="row form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                        <div class="col-sm-9 col-xs-12">
                            @if ($errors->has('email'))
                                <label class="control-label" for="inputError1">{{ $errors->first('email') }}</label>
                            @endif
                            <input class="form-control fullwidth" type="text" name="email"
                                   value="{{ old('email') ? old('email') : $user->email }}" autocomplete="off"
                                   required placeholder="Your email address*">
                        </div>
                    </div>
                    <div class="row form-group {{ $errors->has('mobile') ? 'has-error' : '' }}">
                        <div class="col-sm-9 col-xs-12">
                            @if ($errors->has('mobile'))
                                <label class="control-label"
                                       for="inputError1">{{ $errors->first('mobile') }}</label>
                            @endif
                            <input class="form-control fullwidth" type="text" name="mobile"
                                   value="{{ old('mobile') ? old('mobile') : $user->mobile }}" autocomplete="off"
                                   required placeholder="Your mobile*">
                        </div>
                    </div>
                    <div class="row form-group {{ $errors->has('country_id') ? 'has-error' : '' }}">
                        <div class="col-sm-9 col-xs-12">
                            @if ($errors->has('country_id'))
                                <label class="control-label"
                                       for="country_id">{{ $errors->first('country_id') }}</label>
                            @endif
                            <div class="input-group">
                                <label class="control-label" for="country">Country</label>
                                {{ Form::select('country_id', \App\Country::getFullList(), old('country_id') ? old('country_id') : $user->country_id, ['class' => 'form-control fullwidth','required' => true, 'placeholder' => 'Your country*']) }}
                            </div>
                        </div>
                    </div>
                    <div class="row form-group {{ $errors->has('password') ? 'has-error' : '' }}"
                         id="fields-password-field">
                        <div class="col-sm-9 col-xs-12">
                            @if ($errors->has('password'))
                                <label class="control-label"
                                       for="inputError1">{{ $errors->first('password') }}</label>
                            @endif
                            <div class="password-group">
                                <input class="form-control fullwidth" type="password" id="fields-password"
                                       name="password"
                                       value="{{ old('password') ? old('password') : $user->salt }}" autocomplete="off"
                                       placeholder="Your password*"/>
                                <div class="password-eye"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row form-group {{ $errors->has('password_confirmation') ? 'has-error' : '' }}"
                         id="fields-password-confirmation-field">
                        <div class="col-sm-9 col-xs-12">
                            @if ($errors->has('password_confirmation'))
                                <label class="control-label"
                                       for="inputError1">{{ $errors->first('password_confirmation') }}</label>
                            @endif
                            <div class="password-group">
                                <input class="form-control fullwidth" type="password"
                                       id="fields-password-confirmation"
                                       name="password_confirmation" value="{{ old('password_confirmation') ? old('password_confirmation') : $user->salt }}"
                                       autocomplete="off" placeholder="Confirm password*"/>
                                <div class="password-eye"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-sm-9 col-xs-12">
                            <input type="submit" class="btn fullwidth btn-default"
                                   value="Submit"/>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection