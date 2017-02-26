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
                                <label class="control-label" for="country_id">{{ $errors->first('country_id') }}</label>
                                @endif
                                <div class="input-group">
                                    <label class="control-label" for="country">Your Country</label>
                                    {{ Form::select('country_id', \App\Country::getList(), $experience->country_id, ['class' => 'form-control fullwidth', 'placeholder' => 'Your country*']) }}
                                </div>
                            </div>
                        </div>
                        <div class="row form-group {{ $errors->has('city') ? 'has-error' : '' }}" id="experience">
                            <div class="col-xs-12">
                                @if ($errors->has('city'))
                                <label class="control-label" for="experience">{{ $errors->first('city') }}</label>
                                @endif
                                <div class="input-group">
                                    <label class="control-label" for="city">Your city</label>
                                    {{ Form::text('city', $experience->formatted_city, ['class' => 'form-control fullwidth', 'placeholder' => 'Your city*']) }}
                                </div>
                            </div>
                        </div>
                        <div class="row form-group {{ $errors->has('street_address') ? 'has-error' : '' }}" id="street_address">
                            <div class="col-xs-12">
                                @if ($errors->has('street_address'))
                                <label class="control-label" for="street_address">{{ $errors->first('street_address') }}</label>
                                @endif
                                <div class="input-group">
                                    <label class="control-label" for="street_address">Street address</label>
                                    {{ Form::text('street_address', old('street_address'), ['class' => 'form-control fullwidth', 'placeholder' => 'Meeting point street address*']) }}
                                </div>
                            </div>
                        </div>
                        <div class="row form-group {{ $errors->has('postal_code') ? 'has-error' : '' }}" id="postal_code">
                            <div class="col-xs-12">
                                @if ($errors->has('postal_code'))
                                <label class="control-label" for="postal_code">{{ $errors->first('postal_code') }}</label>
                                @endif
                                <div class="input-group">
                                    <label class="control-label" for="postal_code">Postal code</label>
                                    {{ Form::text('postal_code', old('postal_code'), ['class' => 'form-control fullwidth', 'placeholder' => 'Postal code*']) }}
                                </div>
                            </div>
                        </div>
                        <div class="row form-group {{ $errors->has('language') ? 'has-error' : '' }}" id="languages">
                            <div class="col-sm-12 col-xs-12">
                                <div class="gray-bottom-border"></div>
                                <div class="line-items language-items">
                                </div>
                            </div>
                            <div class="col-sm-9 col-xs-9">
                                @if ($errors->has('language'))
                                <label class="control-label" for="language">{{ $errors->first('language') }}</label>
                                @endif
                                <div class="input-group">
                                    <label class="control-label" for="activity">Offered languages</label>
                                    {{ Form::text('language', old('language'), ['class' => 'form-control fullwidth', 'placeholder' => 'Offered languages*']) }}
                                </div>
                            </div>
                            <div class="col-sm-3 col-xs-3">
                                <input type="button" class="btn btn-yellow pull-right btn-add" count="0" field="language" value="Add" />
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
                        <div class="input-group">
                            <label class="control-label" for="Category">Experience category</label>
                            {{ Form::select('category_id', \App\ExperienceCategory::getList(), $experience->category_id, ['class' => 'form-control fullwidth', 'placeholder' => 'Experience category*']) }}
                        </div>
                    </div>
                </div>
                <div class="row form-group {{ $errors->has('sub_category_id') ? 'has-error' : '' }}" id="sub_category_id">
                    <div class="col-xs-12">
                        @if ($errors->has('sub_category'))
                        <label class="control-label" for="sub_category">{{ $errors->first('sub_category') }}</label>
                        @endif
                        <div class="input-group">
                            <label class="control-label" for="sub_category">Experience sub category</label>
                            {{ Form::text('sub_category', old('sub_category'), ['class' => 'form-control fullwidth', 'placeholder' => 'Experience sub category*']) }}
                        </div>
                    </div>
                </div>
                <div class="row form-group {{ $errors->has('teaser') ? 'has-error' : '' }}" id="teaser">
                    <div class="col-xs-12">
                        @if ($errors->has('teaser'))
                        <label class="control-label" for="teaser">{{ $errors->first('teaser') }}</label>
                        @endif
                        <div class="input-group">
                            <label class="control-label" for="teaser">Experience teaser title</label>
                            {{ Form::text('teaser', old('teaser'), ['class' => 'form-control fullwidth', 'placeholder' => 'Experience teaser title*']) }}
                        </div>
                    </div>
                </div>
            </div>
            <div class='col-sm-7 col-xs-12'>
                <div class="row form-group {{ $errors->has('description') ? 'has-error' : '' }}" id="description">
                    <div class="col-xs-12">
                        @if ($errors->has('description'))
                        <label class="control-label" for="description">{{ $errors->first('description') }}</label>
                        @endif
                        <div class="input-group">
                            <label class="control-label" for="country">Your experience description</label>
                            {{ Form::textarea('description', old('description'), ['rows' => 5, 'class' => 'form-control fullwidth', 'placeholder' => 'Detailed description of your experience*']) }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="gray-bottom-border mt-1 mb-1"></div>
        <div class='row'>
            <div class="col-sm-5 col-xs-12">
                <div class="row form-group {{ $errors->has('highlight') ? 'has-error' : '' }}" id="highlight">
                    <div class="col-sm-12 col-xs-12">
                        <div class="gray-bottom-border"></div>
                        <div class="line-items highlight-items">
                        </div>
                    </div>
                    <div class="col-sm-9 col-xs-9">
                        @if ($errors->has('highlight'))
                        <label class="control-label" for="highlight">{{ $errors->first('highlight') }}</label>
                        @endif
                        <div class="input-group">
                            <label class="control-label" for="activity">Experience highlights</label>
                            {{ Form::text('highlight', old('highlight'), ['class' => 'form-control fullwidth', 'placeholder' => 'Experience highlights*']) }}
                        </div>
                    </div>
                    <div class="col-sm-3 col-xs-3">
                        <input type="button" class="btn btn-yellow pull-right btn-add" count="0" field="highlight" value="Add" />
                    </div>
                </div>
                <div class="row form-group {{ $errors->has('duration') ? 'has-error' : '' }}" id="duration">
                    <div class="col-sm-7 col-xs-7">
                        @if ($errors->has('duration'))
                        <label class="control-label" for="duration">{{ $errors->first('duration') }}</label>
                        @endif
                        <div class="input-group">
                            <label class="control-label" for="duration">Duration</label>
                            {{ Form::text('duration', old('duration'), ['class' => 'form-control fullwidth', 'placeholder' => 'Duration*']) }}
                        </div>
                    </div>
                    <div class="col-sm-5 col-xs-5  pull-right">
                        @if ($errors->has('units'))
                        <label class="control-label" for="units">{{ $errors->first('units') }}</label>
                        @endif
                        <div class="input-group">
                            <label class="control-label" for="units">Units</label>
                            {{ Form::select('units', ['hours' => 'Hours', 'days' => 'Days'], old('units'), ['class' => 'form-control fullwidth', 'placeholder' => 'Units*']) }}
                        </div>
                    </div>
                </div>
                <div class="row form-group {{ $errors->has('activity') ? 'has-error' : '' }}" id="activity">
                    <div class="col-sm-12 col-xs-12">
                        <div class="gray-bottom-border"></div>
                        <div class="line-items activity-items">
                        </div>
                    </div>
                    <div class="col-sm-9 col-xs-9">
                        @if ($errors->has('activity'))
                        <label class="control-label" for="activity">{{ $errors->first('activity') }}</label>
                        @endif
                        <div class="input-group">
                            <label class="control-label" for="activity">Experience activities</label>
                            {{ Form::text('activity', old('activity'), ['class' => 'form-control fullwidth', 'placeholder' => 'Extra activities*']) }}
                        </div>
                    </div>
                    <div class="col-sm-3 col-xs-3">
                        <input type="button" class="btn btn-yellow pull-right btn-add" count="0" field="activity" value="Add" />
                    </div>
                </div>
                <div class="row form-group {{ $errors->has('transportation_mode') ? 'has-error' : '' }}" id="transportation_mode">
                    <div class="col-xs-12">
                        @if ($errors->has('transportation_mode'))
                        <label class="control-label" for="transportation_mode">{{ $errors->first('transportation_mode') }}</label>
                        @endif
                        <div class="input-group">
                            <label class="control-label" for="activity">Transportation mode</label>
                            {{ Form::text('transportation_mode', old('transportation_mode'), ['class' => 'form-control fullwidth', 'placeholder' => 'Transportation mode*']) }}
                        </div>
                    </div>
                </div>
            </div>
            <div class='col-sm-7 col-xs-12'>
                @foreach($extras as $extra)
                <div class="row mb-1">
                    <div class="col-xs-12">
                        <label>{{ $extra['label'] }}*</label>
                    </div>
                    @foreach($extra['items'] as $item)
                    <div class="col-sm-4 col-xs-4">
                        <label class="radio-inline">
                            {{ Form::radio($extra['name'], $item['value'], false) }}
                            {{ $item['label'] }}
                        </label>
                    </div>
                    @endforeach
                </div>
                @endforeach
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