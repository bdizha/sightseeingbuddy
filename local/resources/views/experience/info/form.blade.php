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
                                    <label class="control-label"
                                           for="country_id">{{ $errors->first('country_id') }}</label>
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
                                    {{ Form::text('city', $experience->city_name, ['class' => 'form-control fullwidth', 'placeholder' => 'Your city*']) }}
                                </div>
                            </div>
                        </div>
                        <div class="row form-group {{ $errors->has('street_address') ? 'has-error' : '' }}"
                             id="street_address">
                            <div class="col-xs-12">
                                @if ($errors->has('street_address'))
                                    <label class="control-label"
                                           for="street_address">{{ $errors->first('street_address') }}</label>
                                @endif
                                <div class="input-group">
                                    <label class="control-label" for="street_address">Street address</label>
                                    {{ Form::text('street_address', $experience->street_address, ['class' => 'form-control fullwidth', 'placeholder' => 'Meeting point street address*']) }}
                                </div>
                            </div>
                        </div>
                        <div class="row form-group {{ $errors->has('postal_code') ? 'has-error' : '' }}"
                             id="postal_code">
                            <div class="col-xs-12">
                                @if ($errors->has('postal_code'))
                                    <label class="control-label"
                                           for="postal_code">{{ $errors->first('postal_code') }}</label>
                                @endif
                                <div class="input-group">
                                    <label class="control-label" for="postal_code">Postal code</label>
                                    {{ Form::text('postal_code', $experience->postal_code, ['class' => 'form-control fullwidth', 'placeholder' => 'Postal code*']) }}
                                </div>
                            </div>
                        </div>
                        <div class="row form-group {{ $errors->has('languages') ? 'has-error' : '' }}" id="languages">
                            <div class="col-sm-12 col-xs-12">
                                <div class="gray-bottom-border"></div>
                                <div class="line-items language-items">
                                    <?php $languages = !empty(old("languages")) ? old("languages") : $languages ?>
                                    @foreach($languages as $key => $language)
                                        <div class="line-item" id="language-{{ $key + 1}}">
                                            <label>{{ $language }}</label>
                                            <input type="hidden" value="{{ $language }}" name="languages[]">
                                            <i class="fa fa-close line-close" data-id="language-{{ $key + 1}}"></i>
                                        </div>
                                    @endforeach
                                </div>
                                @if ($errors->has('languages'))
                                    <label class="control-label"
                                           for="language">{{ $errors->first('languages') }}</label>
                                @endif
                            </div>
                            <div class="col-sm-9 col-xs-9">
                                <div class="input-group">
                                    <label class="control-label" for="activity">Offered languages</label>
                                    {{ Form::text('language', old('language'), ['class' => 'form-control fullwidth btn-input', 'placeholder' => 'Offered languages*', "data-id" => "languages"]) }}
                                </div>
                            </div>
                            <div class="col-sm-3 col-xs-3">
                                <input type="button" class="btn btn-yellow pull-right btn-add" count="0"
                                       field="language" plural="languages" value="Add"/>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-7 col-xs-12">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d52973.7501198164!2d18.47359695747957!3d-33.91901849430067!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1dcc5c6704f82b65%3A0x78920bf352a0d24f!2sKenilworth%2C+Cape+Town%2C+7708!5e0!3m2!1sen!2sza!4v1488221127609"
                                width="400" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
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
                <div class="row form-group {{ $errors->has('sub_category_id') ? 'has-error' : '' }}"
                     id="sub_category_id">
                    <div class="col-xs-12">
                        @if ($errors->has('sub_category'))
                            <label class="control-label" for="sub_category">{{ $errors->first('sub_category') }}</label>
                        @endif
                        <div class="input-group">
                            <label class="control-label" for="sub_category">Experience sub category</label>
                            {{ Form::text('sub_category', $experience->sub_category, ['class' => 'form-control fullwidth btn-input', 'placeholder' => 'Experience sub category*', 'data-id' => 'category_id']) }}
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
                            {{ Form::text('teaser', $experience->teaser, ['class' => 'form-control fullwidth', 'placeholder' => 'Experience teaser title*']) }}
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
                            {{ Form::textarea('description', $experience->description, ['rows' => 5, 'class' => 'form-control fullwidth', 'placeholder' => 'Detailed description of your experience*']) }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="gray-bottom-border mt-1 mb-1"></div>
        <div class='row'>
            <div class="col-sm-5 col-xs-12">
                <div class="row form-group {{ $errors->has('highlights') ? 'has-error' : '' }}" id="highlight">
                    <div class="col-sm-12 col-xs-12">
                        <div class="gray-bottom-border"></div>
                        <div class="line-items highlight-items">
                            <?php $highlights = !empty(old("highlights")) ? old("highlights") : $highlights ?>
                            @foreach($highlights as $key => $highlight)
                                <div class="line-item" id="highlight-{{ $key + 1 }}">
                                    <label>{{ $highlight }}</label>
                                    <input type="hidden" value="{{ $highlight }}" name="highlights[]">
                                    <i class="fa fa-close line-close" data-id="highlight-{{ $key + 1 }}"></i>
                                </div>
                            @endforeach
                        </div>
                        @if ($errors->has('highlights'))
                            <label class="control-label" for="highlight">{{ $errors->first('highlights') }}</label>
                        @endif
                    </div>
                    <div class="col-sm-9 col-xs-9">
                        <div class="input-group">
                            <label class="control-label" for="activity">Experience highlights</label>
                            {{ Form::text('highlight', old('highlight'), ['class' => 'form-control fullwidth btn-input', 'placeholder' => 'Experience highlights*', "data-id" => "highlight"]) }}
                        </div>
                    </div>
                    <div class="col-sm-3 col-xs-3">
                        <input type="button" class="btn btn-yellow pull-right btn-add" count="0" field="highlight"
                               plural="highlights" value="Add"/>
                    </div>
                </div>
                <div class="row form-group {{ $errors->has('duration') ? 'has-error' : '' }}" id="duration">
                    <div class="col-sm-7 col-xs-7">
                        @if ($errors->has('duration'))
                            <label class="control-label" for="duration">{{ $errors->first('duration') }}</label>
                        @endif
                        <div class="input-group">
                            <label class="control-label" for="duration">Duration</label>
                            {{ Form::text('duration', $experience->duration, ['class' => 'form-control fullwidth', 'placeholder' => 'Duration*']) }}
                        </div>
                    </div>
                    <div class="col-sm-5 col-xs-5  pull-right">
                        @if ($errors->has('units'))
                            <label class="control-label" for="units">{{ $errors->first('units') }}</label>
                        @endif
                        <div class="input-group">
                            <label class="control-label" for="units">Units</label>
                            {{ Form::select('units', ['hours' => 'Hours', 'days' => 'Days'], $experience->units, ['class' => 'form-control fullwidth', 'placeholder' => 'Units*']) }}
                        </div>
                    </div>
                </div>
                <div class="row form-group {{ $errors->has('activities') ? 'has-error' : '' }}" id="activity">
                    <div class="col-sm-12 col-xs-12">
                        <div class="gray-bottom-border"></div>
                        <div class="line-items activity-items">
                            <?php $activities = !empty(old("activities")) ? old("activities") : $activities ?>
                            @foreach($activities as $key => $activity)
                                <div class="line-item" id="activity-{{ $key + 1}}">
                                    <label>{{ $activity }}</label>
                                    <input type="hidden" value="{{ $activity }}" name="activities[]">
                                    <i class="fa fa-close line-close" data-id="activity-{{ $key + 1}}"></i>
                                </div>
                            @endforeach
                        </div>
                        @if ($errors->has('activities'))
                            <label class="control-label" for="activity">{{ $errors->first('activities') }}</label>
                        @endif
                    </div>
                    <div class="col-sm-9 col-xs-9">
                        <div class="input-group">
                            <label class="control-label" for="activity">Experience activities</label>
                            {{ Form::text('activity', old('activity'), ['class' => 'form-control fullwidth btn-input', 'placeholder' => 'Extra activities*', "data-id" => "activity"]) }}
                        </div>
                    </div>
                    <div class="col-sm-3 col-xs-3">
                        <input type="button" class="btn btn-yellow pull-right btn-add" count="0" field="activity"
                               plural="activities" value="Add"/>
                    </div>
                </div>
                <div class="row form-group {{ $errors->has('transportation_mode') ? 'has-error' : '' }}"
                     id="transportation_mode">
                    <div class="col-xs-12">
                        @if ($errors->has('transportation_mode'))
                            <label class="control-label"
                                   for="transportation_mode">{{ $errors->first('transportation_mode') }}</label>
                        @endif
                        <div class="input-group">
                            <label class="control-label" for="activity">Transportation mode</label>
                            {{ Form::text('transportation_mode', $experience->transportation_mode, ['class' => 'form-control fullwidth', 'placeholder' => 'Transportation mode*']) }}
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
                                <div class="row">
                                    <label class="checkbox-inline">
                                        {{ Form::radio($extra['name'], $item['value'], $experience[$extra['name']] == $item['label'], ['id' => $extra['name'] . "_" . $item['value']]) }}
                                        <label for="{{ $extra['name'] . "_" . $item['value'] }}">
                                            <span></span>
                                            {{ $item['label'] }}
                                        </label>
                                    </label>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endforeach
            </div>
        </div>
        <div class='row'>
            <div class="col-sm-12 col-xs-12">
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Save"/>
                    <a href="{{ route('wallet.create') }}" class="btn btn-primary pull-right">Back</a>
                    <span class='inline pull-right'>&nbsp;&nbsp;</span>
                    <input type="submit" class="btn btn-primary pull-right" value="Next"/>
                </div>
            </div>
        </div>
    </article>
</div>