<div class="col-sm-8 col-sm-offset-1 same-height mt-3 gray-bottom-border gray-top-border" data-mh="column">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">Log in to Keep it Local</div>
            <div class="panel-body">
                <form id="sign-in" method="POST" class="form" action="{{ route('login') }}">
                    {!! csrf_field() !!}
                    <div class="row form-group {{ $errors->has('email') ? 'has-error' : '' }}" id="email-field">
                        <div class="col-sm-8 col-xs-12">
                            @if ($errors->has('email'))
                                <label class="control-label" for="inputError1">{{ $errors->first('email') }}</label>
                            @endif
                            <input class="form-control fullwidth" type="text" id="email" name="email"
                                   value="{{ old('email') }}"  autocomplete="off"
                                   required placeholder="Your email">
                        </div>
                    </div>
                    <div class="row form-group {{ $errors->has('password') ? 'has-error' : '' }}" id="email-field">
                        <div class="col-sm-8 col-xs-12">
                            @if ($errors->has('password'))
                                <label class="control-label" for="inputError1">{{ $errors->first('password') }}</label>
                            @endif
                            <input class="form-control fullwidth" type="password" id="password" name="password" value=""
                                    autocomplete="off" required placeholder="Your password" />
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-sm-8 col-xs-12">
                            <input type="submit" class="btn btn-yellow" value="Log In"/>
                            <a href="{{ route('register') }}" class="btn-height">Don't have an account?</a>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-sm-4 col-xs-12">
                            <a href="{{ url('/local/password/reset') }}" class="btn-height">Forgot password?</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>