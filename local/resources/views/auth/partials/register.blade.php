<div class="col-sm-8 col-sm-offset-1 same-height mt-3"  data-class="column">
    <div class="row">
        <article class="article">
            <h1 class="page-title page-title-left">
                Sign up to Keep it Local
            </h1>
            <form id="sign-in" method="POST" class="form" action="{{ route('register') }}">
                {!! csrf_field() !!}
                <div class="row form-group {{ $errors->has('first_name') ? 'has-error' : '' }}" id="fields-first-name-field">
                    <div class="col-sm-6 col-xs-12">
                        @if ($errors->has('first_name'))
                        <label class="control-label" for="inputError1">{{ $errors->first('first_name') }}</label>
                        @endif
                        <input class="form-control fullwidth" type="text" id="fields-first-name" name="first_name" value="{{ old('first_name') }}" data-show-chars-left="" autocomplete="off" placeholder="Your first name*">
                    </div>
                </div>
                <div class="row form-group {{ $errors->has('last_name') ? 'has-error' : '' }}" id="fields-last-name-field">
                    <div class="col-sm-6 col-xs-12">
                        @if ($errors->has('last_name'))
                        <label class="control-label" for="inputError1">{{ $errors->first('last_name') }}</label>
                        @endif
                        <input class="form-control fullwidth" type="text" id="fields-last-name" name="last_name" value="{{ old('last_name') }}" data-show-chars-left="" autocomplete="off" placeholder="Your last name*">
                    </div>
                </div>
                <div class="row form-group {{ $errors->has('email') ? 'has-error' : '' }}" id="fields-email-field">
                    <div class="col-sm-6 col-xs-12">
                        @if ($errors->has('email'))
                        <label class="control-label" for="inputError1">{{ $errors->first('email') }}</label>
                        @endif
                        <input class="form-control fullwidth" type="text" id="fields-email" name="email" value="{{ old('email') }}" data-show-chars-left="" autocomplete="off" placeholder="Your email address*">
                    </div>
                </div>
                <div class="row form-group {{ $errors->has('password') ? 'has-error' : '' }}" id="fields-password-field">
                    <div class="col-sm-6 col-xs-12">
                        @if ($errors->has('password'))
                        <label class="control-label" for="inputError1">{{ $errors->first('password') }}</label>
                        @endif
                        <input class="form-control fullwidth" type="password" id="fields-password" name="password" value="" data-show-chars-left="" autocomplete="off" placeholder="Your password*">
                    </div>
                </div>
                <div class="row form-group {{ $errors->has('password_confirmation') ? 'has-error' : '' }}" id="fields-password-confirmation-field">
                    <div class="col-sm-6 col-xs-12">
                        @if ($errors->has('password_confirmation'))
                        <label class="control-label" for="inputError1">{{ $errors->first('password_confirmation') }}</label>
                        @endif
                        <input class="form-control fullwidth" type="password" id="fields-password-confirmation" name="password_confirmation" value="" data-show-chars-left="" autocomplete="off" placeholder="Confirm password*">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-sm-4 col-xs-6">
                        <input type="submit" class="btn btn-yellow" value="Sign Up & Find a Local" />
                    </div>
                    <div class="col-sm-4 col-xs-6">
                        <a href="{{ route('login') }}">Already have an account?</a>
                    </div>
                </div>
            </form>
        </article>
    </div>
</div>