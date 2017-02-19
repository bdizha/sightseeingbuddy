<div class="row">
    <article class="article">
        <div class='row'>
            <div class='col-sm-4 col-xs-12 step-form-left'>
                <h1 class="page-title page-title-left">
                    Create a profile
                </h1>
                <div class='text-center'>
                    <div class="profile-picture form-group">
                        <img src="/images/person.png" />
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-yellow" value="Upload profile pic" />
                    </div>

                    <div class='text-center'>
                        Uploading your profile picture is compulsory for verification.
                    </div>
                </div>
            </div>
            <div class='col-sm-8 col-xs-12'>
                <div class="gray-left-border mt-1">
                    <h1 class="page-title">
                        Introduce yourself
                    </h1>
                    <form id="sign-in" method="POST" class="form" action="{{ route('register') }}">
                        {!! csrf_field() !!}
                        <div class="row form-group {{ $errors->has('first_name') ? 'has-error' : '' }}" id="first-name">
                            <div class="col-xs-12">
                                @if ($errors->has('first_name'))
                                <label class="control-label" for="first_name">{{ $errors->first('first_name') }}</label>
                                @endif
                                {{ Form::text('first_name', old('first_name'), ['class' => 'form-control fullwidth', 'placeholder' => 'Your first name*']) }}
                            </div>
                        </div>
                        <div class="row form-group {{ $errors->has('last_name') ? 'has-error' : '' }}" id="last-name">
                            <div class="col-xs-12">
                                @if ($errors->has('last_name'))
                                <label class="control-label" for="last_name">{{ $errors->first('last_name') }}</label>
                                @endif
                                {{ Form::text('last_name', old('last_name'), ['class' => 'form-control fullwidth', 'placeholder' => 'Your last name*']) }}
                            </div>
                        </div>
                        <div class="row form-group {{ $errors->has('id_number') ? 'has-error' : '' }}" id="email">
                            <div class="col-xs-12">
                                @if ($errors->has('id_number'))
                                <label class="control-label" for="id_number">{{ $errors->first('id_number') }}</label>
                                @endif
                                {{ Form::text('id_number', old('id_number'), ['class' => 'form-control fullwidth', 'placeholder' => 'Your RSA ID number*']) }}
                            </div>
                        </div>
                        <div class="row form-group {{ $errors->has('reason') ? 'has-error' : '' }}" id="password">
                            <div class="col-xs-12">
                                @if ($errors->has('reason'))
                                <label class="control-label" for="reason">{{ $errors->first('reason') }}</label>
                                @endif
                                {{ Form::text('reason', old('reason'), ['class' => 'form-control fullwidth', 'placeholder' => 'Tell us why you’re a local with a difference*']) }}
                            </div>
                        </div>
                        <div class="row form-group {{ $errors->has('description') ? 'has-error' : '' }}" id="password-confirmation">
                            <div class="col-xs-12">
                                @if ($errors->has('description'))
                                <label class="control-label" for="description">{{ $errors->first('description') }}</label>
                                @endif
                                {{ Form::textarea('description', old('description'), ['class' => 'form-control fullwidth', 'placeholder' => 'More detailed description of yourself']) }}
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="Next" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </article>
</div>