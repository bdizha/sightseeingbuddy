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
            <form id="reset" method="POST" class="form" action="{{ url('/local/password/reset') }}">
                {!! csrf_field() !!}

                <input type="hidden" name="token" value="{{ $token }}">

                <div class="row form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                    <div class="col-sm-6 col-xs-12">
                        @if ($errors->has('email'))
                            <label class="control-label" for="inputError1">{{ $errors->first('email') }}</label>
                        @endif
                        <input class="form-control fullwidth" type="text" id="email" name="email" value="{{ old('email') }}" autocomplete="off" placeholder="Your email">
                    </div>
                </div>
                <div class="row form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                    <div class="col-sm-6 col-xs-12">
                        @if ($errors->has('password'))
                            <label class="control-label" for="inputError1">{{ $errors->first('password') }}</label>
                        @endif
                        <input class="form-control fullwidth" type="password" id="password" name="password" value="{{ old('password') }}" autocomplete="off" placeholder="New passport">
                    </div>
                </div>
                <div class="row form-group {{ $errors->has('password_confirmation') ? 'has-error' : '' }}">
                    <div class="col-sm-6 col-xs-12">
                        @if ($errors->has('password_confirmation'))
                            <label class="control-label" for="inputError1">{{ $errors->first('password_confirmation') }}</label>
                        @endif
                        <input class="form-control fullwidth" type="password" id="password_confirmation" name="password_confirmation" value="{{ old('password_confirmation') }}" autocomplete="off" placeholder="Confirm passport">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-sm-4 col-xs-6">
                        <input type="submit" class="btn btn-yellow" value="Reset Password" />
                    </div>
                </div>
            </form>
        </article>
    </div>
</div>