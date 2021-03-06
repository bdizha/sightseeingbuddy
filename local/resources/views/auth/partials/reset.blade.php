<div class="col-sm-8 col-sm-offset-1 same-height mt-3 gray-bottom-border gray-top-border" data-mh="column">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">Create New Password</div>
            <div class="panel-body">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                <form id="reset" method="POST" class="form" action="{{ url('/local/password/reset') }}">
                    {!! csrf_field() !!}

                    <input type="hidden" name="token" value="{{ $token }}">

                    <div class="row form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                        <div class="col-sm-8 col-xs-12">
                            @if ($errors->has('email'))
                                <label class="control-label" for="inputError1">{{ $errors->first('email') }}</label>
                            @endif
                            <input class="form-control fullwidth" type="text" id="email" name="email"
                                   value="{{ old('email') }}" autocomplete="off" required placeholder="Your email">
                        </div>
                    </div>
                    <div class="row form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                        <div class="col-sm-8 col-xs-12">
                            <div class="password-group">
                                @if ($errors->has('password'))
                                    <label class="control-label"
                                           for="inputError1">{{ $errors->first('password') }}</label>
                                @endif
                                <input class="form-control fullwidth" type="password" id="password" name="password"
                                       value="{{ old('password') }}" autocomplete="off" required
                                       placeholder="New password"/>
                                <div class="password-eye"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row form-group {{ $errors->has('password_confirmation') ? 'has-error' : '' }}">
                        <div class="col-sm-8 col-xs-12">
                            <div class="password-group">
                                @if ($errors->has('password_confirmation'))
                                    <label class="control-label"
                                           for="inputError1">{{ $errors->first('password_confirmation') }}</label>
                                @endif
                                <input class="form-control fullwidth" type="password" id="password_confirmation"
                                       name="password_confirmation" value="{{ old('password_confirmation') }}"
                                       autocomplete="off" required placeholder="Confirm password"/>
                                <div class="password-eye"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-sm-4 col-xs-6">
                            <input type="submit" class="btn fullwidth btn-default" value="Change password"/>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>