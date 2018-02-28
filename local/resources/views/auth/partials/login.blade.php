<div class="col-sm-8 col-sm-offset-1 same-height mt-3 gray-bottom-border gray-top-border" data-mh="column">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">Log in to Sightseeing Buddy</div>
            <div class="panel-body">
                <form id="sign-in" method="POST" class="form" action="{{ route('login') }}">
                    {!! csrf_field() !!}
                    <div class="row form-group {{ $errors->has('email') ? 'has-error' : '' }}" id="email-field">
                        <div class="col-sm-9 col-xs-12">
                            @if ($errors->has('email'))
                                <label class="control-label" for="inputError1">{{ $errors->first('email') }}</label>
                            @endif
                            <input class="form-control fullwidth" type="text" id="email" name="email"
                                   value="{{ old('email') }}"  autocomplete="off"
                                   required placeholder="Your email">
                        </div>
                    </div>
                    <div class="row form-group {{ $errors->has('password') ? 'has-error' : '' }}" id="email-field">
                        <div class="col-sm-9 col-xs-12">
                            <div class="password-group ">
                                @if ($errors->has('password'))
                                    <label class="control-label"
                                           for="inputError1">{{ $errors->first('password') }}</label>
                                @endif
                                <input class="form-control fullwidth" type="password" id="password" name="password"
                                       value=""
                                       autocomplete="off" required placeholder="Your password"/>
                                <div class="password-eye"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-sm-9 col-xs-12">
                            <input type="submit" class="btn fullwidth btn-default" value="Log In"/>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-sm-5 col-xs-12">
                            <a href="{{ route('register') }}" class="btn btn-tertiary mt-xs-1">Don't have an account?</a>
                        </div>
                        <div class="col-sm-4 col-xs-12">
                            <a href="{{ url('/local/password/reset') }}" class="btn btn-tertiary mt-xs-1">Forgot password?</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>