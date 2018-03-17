<div class='row'>
    <div class='col-xs-12 mb-1 pl-0'>
        <div class="panel panel-default">
            <div class="panel-heading mt-0">
                Your local experience you'd like to offer
            </div>
            <?php $subCategoryId = 7 ?>
            <div class="panel-body">
                {!! csrf_field() !!}
                <div class='row'>
                    <div class="col-sm-5 col-xs-12">
                        <div class="row form-group {{ $errors->has('country_id') ? 'has-error' : '' }}">
                            <div class="col-xs-12">
                                @if ($errors->has('country_id'))
                                    <label class="control-label"
                                           for="country_id">{{ $errors->first('country_id') }}</label>
                                @endif
                                <div class="input-group">
                                    <label class="control-label" for="country">Your Country</label>
                                    {{ Form::select('country_id', \App\Country::getList(), $experience->country_id, ['class' => 'form-control fullwidth', 'id' => 'country_id', 'required' => true, 'placeholder' => 'Your country*']) }}
                                </div>
                            </div>
                        </div>
                        <div class="row form-group {{ $errors->has('city') ? 'has-error' : '' }}"
                             id="experience">
                            <div class="col-xs-12">
                                @if ($errors->has('city'))
                                    <label class="control-label"
                                           for="experience">{{ $errors->first('city') }}</label>
                                @endif
                                <div class="input-group">
                                    <label class="control-label" for="city">Your city</label>
                                    {{ Form::text('city', $experience->city_name, ['class' => 'form-control fullwidth', 'id' => 'city_name','required' => true, 'placeholder' => 'Your city*']) }}
                                </div>
                            </div>
                        </div>
                        <div class="row form-group {{ $errors->has('street_address') ? 'has-error' : '' }}">
                            <div class="col-xs-12">
                                @if ($errors->has('street_address'))
                                    <label class="control-label"
                                           for="street_address">{{ $errors->first('street_address') }}</label>
                                @endif
                                <div class="input-group">
                                    <label class="control-label" for="street_address">Street address</label>
                                    {{ Form::text('street_address', $experience->street_address, ['class' => 'form-control fullwidth', 'id' => 'street_address','required' => true, 'placeholder' => 'Meeting point street address*']) }}
                                </div>
                            </div>
                        </div>
                        <div class="row form-group {{ $errors->has('postal_code') ? 'has-error' : '' }}">
                            <div class="col-xs-12">
                                @if ($errors->has('postal_code'))
                                    <label class="control-label"
                                           for="postal_code">{{ $errors->first('postal_code') }}</label>
                                @endif
                                <div class="input-group">
                                    <label class="control-label" for="postal_code">Postal code</label>
                                    {{ Form::text('postal_code', $experience->postal_code, ['class' => 'form-control fullwidth','id' => 'postal_code', 'required' => true, 'placeholder' => 'Postal code*']) }}
                                </div>
                            </div>
                        </div>
                        <div class="row form-group {{ $errors->has('languages') ? 'has-error' : '' }}"
                             id="languages">
                            <div class="col-sm-12 col-xs-12">
                                <div class="gray-bottom-border"></div>
                                <div class="line-items language-items">
                                    <?php $languages = !empty(old("languages")) ? old("languages") : $languages ?>
                                    @foreach($languages as $key => $language)
                                        <div class="line-item" id="language-{{ $key + 1}}">
                                            <label>{{ $language }}</label>
                                            <input type="hidden" value="{{ $language }}" name="languages[]">
                                            <i class="fa fa-close line-close"
                                               data-id="language-{{ $key + 1}}"></i>
                                        </div>
                                    @endforeach
                                </div>
                                @if ($errors->has('languages'))
                                    <label class="control-label"
                                           for="language">{{ $errors->first('languages') }}</label>
                                @endif
                            </div>
                            <div class="col-sm-12 col-xs-12">
                                <div class="input-group">
                                    <label class="control-label" for="activity">Offered languages</label>
                                    <div class="input-add">
                                        <?php $params = ['class' => 'form-control fullwidth btn-input', 'placeholder' => 'Offered languages*', "data-id" => "languages"] ?>
                                        @if (empty($languages))
                                                <?php $params['required'] = true ?>
                                        @endif
                                        {{ Form::text('language', old('language'), $params) }}
                                        <input type="button" class="btn btn-default btn-add" count="0"
                                               field="language" plural="languages" value="Add"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-7 col-xs-12">
                        <div class="row">
                            <div id="map"></div>
                        </div>
                        @include('partials.map')
                    </div>
                </div>
            </div>
        </div>
        <div class="gray-bottom-border mt-1 mb-1"></div>
        <div class='row'>
            <div class="col-sm-5 col-xs-12">
                <div class="row form-group {{ $errors->has('category_id') ? 'has-error' : '' }}"
                     id="category_id">
                    <div class="col-xs-12">
                        @if ($errors->has('category_id'))
                            <label class="control-label"
                                   for="category_id">{{ $errors->first('category_id') }}</label>
                        @endif
                        <div class="input-group">
                            <label class="control-label" for="Category">Experience category</label>
                            {{ Form::select('category_id', \App\ExperienceCategory::getList('main'), $experience->category_id, ['class' => 'form-control fullwidth','required' => true, 'placeholder' => 'Experience category*']) }}
                        </div>
                    </div>
                </div>
                <div class="row form-group {{ $errors->has('sub_category_id') ? 'has-error' : '' }}"
                     id="sub_category_id" style="display: none;">
                    <div class="col-xs-12">
                        @if ($errors->has('sub_category_id'))
                            <label class="control-label"
                                   for="sub_category">{{ $errors->first('sub_category_id') }}</label>
                        @endif
                        <div class="input-group">
                            <label class="control-label" for="sub_category_id">Experience sub category</label>
                            {{ Form::select('sub_category_id', \App\ExperienceCategory::getList('sub'), $subCategoryId, ['class' => 'form-control fullwidth','required' => true, 'placeholder' => 'Experience sub category*']) }}
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
                            {{ Form::text('teaser', $experience->teaser, ['class' => 'form-control fullwidth','required' => true, 'placeholder' => 'Experience teaser title*']) }}
                        </div>
                    </div>
                </div>
            </div>
            <div class='col-sm-7 col-xs-12'>
                <div class="row form-group {{ $errors->has('description') ? 'has-error' : '' }}"
                     id="description">
                    <div class="col-xs-12">
                        @if ($errors->has('description'))
                            <label class="control-label"
                                   for="description">{{ $errors->first('description') }}</label>
                        @endif
                        <div class="input-group">
                            <label class="control-label" for="country">Your experience description</label>
                            {{ Form::textarea('description', $experience->description, ['rows' => 5, 'class' => 'form-control fullwidth redactor-input','required' => true, 'placeholder' => 'Detailed description of your experience*']) }}
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
                            <label class="control-label"
                                   for="highlight">{{ $errors->first('highlights') }}</label>
                        @endif
                    </div>
                    <div class="col-sm-12 col-xs-12">
                        <div class="input-group ">
                            <label class="control-label" for="activity">Experience highlights</label>
                            <div class="input-add">
                                <?php $params = ['class' => 'form-control fullwidth btn-input', 'placeholder' => 'Experience highlights*', "data-id" => "highlight"] ?>
                                @if (empty($highlights))
                                    <?php $params['required'] = true ?>
                                @endif
                                {{ Form::text('highlight', old('highlight'), $params) }}
                                <input type="button" class="btn btn-default btn-add" count="0"
                                       field="highlight"
                                       plural="highlights" value="Add"/>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row form-group {{ $errors->has('duration') ? 'has-error' : '' }}" id="duration">
                    <div class="col-sm-7 col-xs-7">
                        @if ($errors->has('duration'))
                            <label class="control-label" for="duration">{{ $errors->first('duration') }}</label>
                        @endif
                        <div class="input-group">
                            <label class="control-label" for="duration">Duration</label>
                            {{ Form::select('duration', Helper::guests(), $experience->duration, ['class' => 'form-control fullwidth','required' => true, 'placeholder' => 'Duration*']) }}
                        </div>
                    </div>
                    <div class="col-sm-5 col-xs-5  pull-right">
                        @if ($errors->has('units'))
                            <label class="control-label" for="units">{{ $errors->first('units') }}</label>
                        @endif
                        <div class="input-group">
                            <label class="control-label" for="units">Units</label>
                            {{ Form::select('units', ['hours' => 'Hours', 'days' => 'Days'], $experience->units, ['class' => 'form-control fullwidth','required' => true, 'placeholder' => 'Units*']) }}
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
                            <label class="control-label"
                                   for="activity">{{ $errors->first('activities') }}</label>
                        @endif
                    </div>
                    <div class="col-sm-12 col-xs-12">
                        <div class="input-group">
                            <label class="control-label" for="activity">Experience activities</label>
                            <div class="input-add">
                                <?php $params = ['class' => 'form-control fullwidth btn-input', 'placeholder' => 'Extra activities*', "data-id" => "activity"] ?>
                                {{ Form::text('activity', old('activity'), $params) }}
                                <input type="button" class="btn btn-default btn-add" count="0"
                                       field="activity"
                                       plural="activities" value="Add"/>
                            </div>
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
                    <input type="submit" class="btn btn-default pull-right" value="Next"/>
                </div>
            </div>
        </div>
    </div>
</div>