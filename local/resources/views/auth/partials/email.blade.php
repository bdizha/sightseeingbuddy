<div class="col-sm-8 col-sm-offset-1 same-height mt-3 gray-bottom-border gray-top-border" data-mh="column">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">Recover Password</div>
            <div class="panel-body">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                <p>Enter the email address used to register with to be sent an email containing instructions on
                    resetting your password</p>
                <form id="sign-in" method="POST" class="form" action="{{ url('/local/password/email') }}">
                    {!! csrf_field() !!}
                    <div class="row form-group {{ $errors->has('email') ? 'has-error' : '' }}" id="fields-email-field">
                        <div class="col-sm-9 col-xs-12">
                            @if ($errors->has('email'))
                                <label class="control-label" for="inputError1">{{ $errors->first('email') }}</label>
                            @endif
                            <input class="form-control fullwidth" type="text" id="fields-email" name="email"
                                   value="{{ old('email') }}" autocomplete="off" placeholder="Your email">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-sm-9 col-xs-12">
                            <div class="row form-group">
                                <div class="col-sm-6 col-xs-12">
                                    <input type="submit" class="btn fullwidth btn-default" value="Send new password link"/>
                                </div>
                                <div class="col-sm-6 col-xs-12">
                                    <a href="{{ url('/login') }}" class="btn-height mt-xs-1">Sign In</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>