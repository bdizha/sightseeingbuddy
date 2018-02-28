<div class="col-sm-8 col-sm-offset-1 same-height mt-3 gray-bottom-border gray-top-border" data-mh="column">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">Sign up to Sightseeing Buddy</div>
            <div class="panel-body">
                <form id="sign-in" method="POST" class="form" action="{{ route('register') }}">
                    {!! csrf_field() !!}
                    <input type="hidden" name="type" value="guest">
                    <div class="row form-group {{ $errors->has('first_name') ? 'has-error' : '' }}"
                         id="fields-first-name-field">
                        <div class="col-sm-9 col-xs-12">
                            @if ($errors->has('first_name'))
                                <label class="control-label"
                                       for="inputError1">{{ $errors->first('first_name') }}</label>
                            @endif
                            <input class="form-control fullwidth" type="text" id="fields-first-name" name="first_name"
                                   value="{{ old('first_name') }}" autocomplete="off"
                                   required placeholder="Your first name*">
                        </div>
                    </div>
                    <div class="row form-group {{ $errors->has('last_name') ? 'has-error' : '' }}"
                         id="fields-last-name-field">
                        <div class="col-sm-9 col-xs-12">
                            @if ($errors->has('last_name'))
                                <label class="control-label" for="inputError1">{{ $errors->first('last_name') }}</label>
                            @endif
                            <input class="form-control fullwidth" type="text" id="fields-last-name" name="last_name"
                                   value="{{ old('last_name') }}" autocomplete="off"
                                   required placeholder="Your last name*">
                        </div>
                    </div>
                    <div class="row form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                        <div class="col-sm-9 col-xs-12">
                            @if ($errors->has('email'))
                                <label class="control-label" for="inputError1">{{ $errors->first('email') }}</label>
                            @endif
                            <input class="form-control fullwidth" type="text" name="email"
                                   value="{{ old('email') }}" autocomplete="off"
                                   required placeholder="Your email address*">
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
                                {{ Form::select('country_id', \App\Country::getFullList(), old('country_id'), ['class' => 'form-control fullwidth','required' => true, 'placeholder' => 'Country Code*']) }}
                            </div>
                        </div>
                    </div>
                    
                    <div class="row form-group {{ $errors->has('mobile') ? 'has-error' : '' }}">
                        <div class="col-sm-9 col-xs-12">
                            @if ($errors->has('mobile'))
                                <label class="control-label" for="inputError1">{{ $errors->first('mobile') }}</label>
                            @endif
                            <input class="form-control fullwidth" type="text" name="mobile"
                                   value="{{ old('mobile') }}" autocomplete="off"
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
                                {{ Form::select('country_id', \App\Country::getFullList(), old('country_id'), ['class' => 'form-control fullwidth','required' => true, 'placeholder' => 'Your country*']) }}
                            </div>
                        </div>
                    </div>
                    <div class="row form-group {{ $errors->has('password') ? 'has-error' : '' }}"
                         id="fields-password-field">
                        <div class="col-sm-9 col-xs-12">
                            @if ($errors->has('password'))
                                <label class="control-label" for="inputError1">{{ $errors->first('password') }}</label>
                            @endif
                            <div class="password-group">
                                <input class="form-control fullwidth" type="password" id="fields-password"
                                       name="password"
                                       value="{{ old('password') }}" autocomplete="off" required
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
                                <input class="form-control fullwidth" type="password" id="fields-password-confirmation"
                                       name="password_confirmation" value="{{ old('password_confirmation') }}"
                                       autocomplete="off"
                                       required placeholder="Confirm password*"/>
                                <div class="password-eye"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-sm-9 col-xs-12">
                            <small>
                                By creating an account, you confirm that you've read and accept our
                                <a href="/pages/terms-conditions" class="text-bold" target="_blank">Terms &
                                    Conditions</a> and
                                <a href="/pages/privacy-policy" class="text-bold" target="_blank">Privacy Policy</a>
                            </small>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-sm-4 col-xs-12">
                            <input type="submit" class="btn fullwidth btn-default"
                                   value="Sign Up & @if($currentType == 'local') become a buddy @else find a buddy @endif "/>
                        </div>
                        <div class="col-sm-5 col-xs-12">
                            <a href="{{ route('login') }}" class="btn-height">Already have an account</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>