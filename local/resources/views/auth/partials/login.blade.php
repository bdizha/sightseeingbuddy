<div class="col-sm-8 col-sm-offset-1">
    <div class="row">
        <article class="article">
            <h1 class="page-title page-title-left">
                Log in to Keep it Local
            </h1>
            <form id="sign-in" method="POST" class="form" action="{{ route('login') }}">
                {!! csrf_field() !!}
                @include('partials.errors')
                <div class="row form-group {{ $errors->has('email') ? 'has-error' : '' }}" id="fields-email-field">
                    <div class="col-sm-6 col-xs-12">
                        <input class="form-control fullwidth" type="text" id="fields-email" name="fields[email]" value="{{ old('email') }}" data-show-chars-left="" autocomplete="off" placeholder="Your email">
                    </div>
                </div>
                <div class="row form-group {{ $errors->has('password') ? 'has-error' : '' }}" id="fields-email-field">
                    <div class="col-sm-6 col-xs-12">
                        <input class="form-control fullwidth" type="password" id="fields-password" name="fields[password]" value="" data-show-chars-left="" autocomplete="off" placeholder="Your password">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-sm-6 col-xs-12">
                        <input type="submit" class="btn btn-yellow" value="Logn In & Find a Local" />
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-sm-4 col-xs-6">
                        <a href="{{ route('register') }}">Don't have an account?</a>
                    </div>
                    <div class="col-sm-4 col-xs-6">
                        <a href="{{ url('/local/password/reset') }}">Forgot password?</a>
                    </div>
                </div>
            </form>
        </article>
    </div>
</div>