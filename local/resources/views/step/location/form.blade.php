<div class='row'>
    <div class='col-sm-6 col-xs-12'>
        <div class='row'>
            <div class="panel panel-default">
                <div class="panel-heading">Where do you live?</div>
                <div class="panel-body">
                    {!! csrf_field() !!}
                    {{ Form::hidden('user_id', $user->id) }}
                    <div class="row form-group {{ $errors->has('country_id') ? 'has-error' : '' }}">
                        <div class="col-xs-12">
                            @if ($errors->has('country_id'))
                                <label class="control-label"
                                       for="country_id">{{ $errors->first('country_id') }}</label>
                            @endif
                            <div class="input-group">
                                <label class="control-label" for="country">Country</label>
                                {{ Form::select('country_id', \App\Country::getList(), $location->country_id, ['class' => 'form-control fullwidth', 'id' => 'country_id','required' => true, 'placeholder' => 'Your country*']) }}
                            </div>
                        </div>
                    </div>
                    <div class="row form-group {{ $errors->has('city_id') ? 'has-error' : '' }}">
                        <div class="col-xs-12">
                            @if ($errors->has('city_id'))
                                <label class="control-label"
                                       for="city_id">{{ $errors->first('city_id') }}</label>
                            @endif
                            <div class="input-group">
                                <label class="control-label" for="city">City</label>
                                {{ Form::select('city_id', \App\City::getList(), $location->city_id, ['class' => 'form-control fullwidth', 'id' => 'city_id','required' => true, 'placeholder' => 'Your city or town*']) }}
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
                                {{ Form::text('street_address', $location->street_address, ['class' => 'form-control fullwidth', 'id' => 'street_address','required' => true, 'placeholder' => 'Your street address*']) }}
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
                                {{ Form::text('postal_code', $location->postal_code, ['class' => 'form-control fullwidth', 'id' => 'postal_code','required' => true, 'placeholder' => 'Your postal code*']) }}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <a href="{{ route('introduction.edit', ['id' => $user->id]) }}"
                           class="btn btn-default">Back</a>
                        <input type="submit" class="btn btn-default pull-right" value="Next"/>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class='col-sm-6 col-xs-12'>
        <div class="row">
            <div id="map"></div>
        </div>
        @include('partials.map')
    </div>
</div>