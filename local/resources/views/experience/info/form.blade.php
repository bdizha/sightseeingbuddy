<div class="row">
    <article class="article">
        <div class='row'>
            <div class='col-xs-12'>
                <h1 class="page-title page-title-left">
                    Your local experience you'd like to offer
                </h1>
                {!! csrf_field() !!}
                <div class='row'>
                    <div class="col-sm-5 col-xs-12">
                        <div class="row form-group {{ $errors->has('country_id') ? 'has-error' : '' }}" id="country_id">
                            <div class="col-xs-12">
                                @if ($errors->has('country_id'))
                                <label class="control-label" for="email">{{ $errors->first('country_id') }}</label>
                                @endif
                                {{ Form::select("country_id", ["12" => "South Africa"], old('country_id'), ['class' => 'form-control fullwidth', 'placeholder' => 'Which country?*']) }}
                            </div>
                        </div>
                        <div class="row form-group {{ $errors->has('city_id') ? 'has-error' : '' }}" id="city_id">
                            <div class="col-xs-12">
                                @if ($errors->has('city_id'))
                                <label class="control-label" for="city_id">{{ $errors->first('city_id') }}</label>
                                @endif
                                {{ Form::select("city_id", ["id" => "Cape Town"], old('city_id'), ['class' => 'form-control fullwidth', 'placeholder' => 'Which city or town?*']) }}
                            </div>
                        </div>
                        <div class="row form-group {{ $errors->has('street_address') ? 'has-error' : '' }}" id="street_address">
                            <div class="col-xs-12">
                                @if ($errors->has('street_address'))
                                <label class="control-label" for="street_address">{{ $errors->first('street_address') }}</label>
                                @endif
                                {{ Form::text('street_address', old('street_address'), ['class' => 'form-control fullwidth', 'placeholder' => 'Meeting point street address*']) }}
                            </div>
                        </div>
                        <div class="row form-group {{ $errors->has('postal_code') ? 'has-error' : '' }}" id="postal_code">
                            <div class="col-xs-12">
                                @if ($errors->has('postal_code'))
                                <label class="control-label" for="postal_code">{{ $errors->first('postal_code') }}</label>
                                @endif
                                {{ Form::text('postal_code', old('postal_code'), ['class' => 'form-control fullwidth', 'placeholder' => 'Postal code*']) }}
                            </div>
                        </div>
                        <div class="row form-group {{ $errors->has('languages') ? 'has-error' : '' }}" id="languages">
                            <div class="col-xs-12">
                                @if ($errors->has('languages'))
                                <label class="control-label" for="languages">{{ $errors->first('languages') }}</label>
                                @endif
                                {{ Form::text('languages', old('languages'), ['class' => 'form-control fullwidth', 'placeholder' => 'Languages offered*']) }}
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-7 col-xs-12">

                    </div>
                </div>
            </div>
        </div>
        <div class="gray-bottom-border mt-1 mb-1"></div>
        <div class='row'>
            <div class="col-sm-5 col-xs-12">
                <div class="row form-group {{ $errors->has('category_id') ? 'has-error' : '' }}" id="category_id">
                    <div class="col-xs-12">
                        @if ($errors->has('category_id'))
                        <label class="control-label" for="category_id">{{ $errors->first('category_id') }}</label>
                        @endif
                        {{ Form::text('category_id', old('category_id'), ['class' => 'form-control fullwidth', 'placeholder' => 'Experience category*']) }}
                    </div>
                </div>
                <div class="row form-group {{ $errors->has('sub_category_id') ? 'has-error' : '' }}" id="sub_category_id">
                    <div class="col-xs-12">
                        @if ($errors->has('sub_category_id'))
                        <label class="control-label" for="sub_category_id">{{ $errors->first('sub_category_id') }}</label>
                        @endif
                        {{ Form::text('sub_category_id', old('sub_category_id'), ['class' => 'form-control fullwidth', 'placeholder' => 'Experience sub category*']) }}
                    </div>
                </div>
                <div class="row form-group {{ $errors->has('teaser') ? 'has-error' : '' }}" id="teaser">
                    <div class="col-xs-12">
                        @if ($errors->has('teaser'))
                        <label class="control-label" for="teaser">{{ $errors->first('teaser') }}</label>
                        @endif
                        {{ Form::text('teaser', old('teaser'), ['class' => 'form-control fullwidth', 'placeholder' => 'Experience teaser title*']) }}
                    </div>
                </div>
            </div>
            <div class='col-sm-7 col-xs-12'>
                <div class="row form-group {{ $errors->has('description') ? 'has-error' : '' }}" id="description">
                    <div class="col-xs-12">
                        @if ($errors->has('description'))
                        <label class="control-label" for="description">{{ $errors->first('description') }}</label>
                        @endif
                        {{ Form::textarea('description', old('description'), ['rows' => 5, 'class' => 'form-control fullwidth', 'placeholder' => 'Detailed description of your experience*']) }}
                    </div>
                </div>
            </div>
        </div>
        <div class="gray-bottom-border mt-1 mb-1"></div>
        <div class='row'>
            <div class="col-sm-5 col-xs-12">
                <div class="row form-group {{ $errors->has('email') ? 'has-error' : '' }}" id="email">
                    <div class="col-xs-12">
                        @if ($errors->has('email'))
                        <label class="control-label" for="email">{{ $errors->first('email') }}</label>
                        @endif
                        {{ Form::text('email', old('email'), ['class' => 'form-control fullwidth', 'placeholder' => 'Your email address*']) }}
                    </div>
                </div>
                <div class="row form-group {{ $errors->has('email') ? 'has-error' : '' }}" id="email">
                    <div class="col-xs-12">
                        @if ($errors->has('email'))
                        <label class="control-label" for="email">{{ $errors->first('email') }}</label>
                        @endif
                        {{ Form::text('email', old('email'), ['class' => 'form-control fullwidth', 'placeholder' => 'Your email address*']) }}
                    </div>
                </div>
                <div class="row form-group {{ $errors->has('email') ? 'has-error' : '' }}" id="email">
                    <div class="col-xs-12">
                        @if ($errors->has('email'))
                        <label class="control-label" for="email">{{ $errors->first('email') }}</label>
                        @endif
                        {{ Form::text('email', old('email'), ['class' => 'form-control fullwidth', 'placeholder' => 'Your email address*']) }}
                    </div>
                </div>
                <div class="row form-group {{ $errors->has('email') ? 'has-error' : '' }}" id="email">
                    <div class="col-xs-12">
                        @if ($errors->has('email'))
                        <label class="control-label" for="email">{{ $errors->first('email') }}</label>
                        @endif
                        {{ Form::text('email', old('email'), ['class' => 'form-control fullwidth', 'placeholder' => 'Your email address*']) }}
                    </div>
                </div>
            </div>
            <div class='col-sm-7 col-xs-12'>
                <div class="row">
                    <div class="col-sm-6 col-xs-6">
                        <div class="form-group">
                            <label>Pickup*</label>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xs-6">
                        <div class="form-group">
                            <label>Pickup*</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6 col-xs-6">
                        <div class="form-group">
                            <label>Pickup*</label>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xs-6">
                        <div class="form-group">
                            <label>Pickup*</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6 col-xs-6">
                        <div class="form-group">
                            <label>Pickup*</label>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xs-6">
                        <div class="form-group">
                            <label>Pickup*</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class='row'>
            <div class="col-sm-12 col-xs-12">
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Save" />
                    <a href="{{ route('wallet.create') }}" class="btn btn-primary pull-right">Back</a>
                    <span class='inline pull-right'>&nbsp;&nbsp;</span>
                    <input type="submit" class="btn btn-primary pull-right" value="Next" />
                </div>
            </div>
        </div>
    </article>
</div>