<div class="col-sm-8 col-sm-offset-1 same-height mt-3"  data-class="column">
    <div class="row">
        <article class="article">
            <h1 class="page-title page-title-left">
                Reset Password
            </h1>
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <p>Enter the email address used to register with to be sent an email containing instructions on resetting your password</p>
            <form id="sign-in" method="POST" class="form" action="{{ url('/local/password/email') }}">
                {!! csrf_field() !!}
                <div class="row form-group {{ $errors->has('email') ? 'has-error' : '' }}" id="fields-email-field">
                    <div class="col-sm-6 col-xs-12">
                        @if ($errors->has('email'))
                            <label class="control-label" for="inputError1">{{ $errors->first('email') }}</label>
                        @endif
                        <input class="form-control fullwidth" type="text" id="fields-email" name="email" value="{{ old('email') }}" autocomplete="off" placeholder="Your email">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-sm-4 col-xs-6">
                        <input type="submit" class="btn btn-yellow" value="Log In & Find a Local" />
                    </div>
                    <div class="col-sm-4 col-xs-6">
                        <a href="{{ url('/login') }}" class="btn-height">Sign In</a>
                    </div>
                </div>
            </form>
        </article>
    </div>
</div>