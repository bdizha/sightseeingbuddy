<div class="row">
    <article class="article">
        <div class='row'>
            <div class='col-sm-4 col-xs-12 step-form-left'>
            </div>
            <div class='col-sm-8 col-xs-12'>
                <div class="gray-left-border mt-1">
                    <h1 class="page-title">
                        Where do you live?
                    </h1>
                    {!! csrf_field() !!}
                    <div class="row form-group {{ $errors->has('country_id') ? 'has-error' : '' }}" id="first-name">
                        <div class="col-xs-12">
                            @if ($errors->has('country_id'))
                            <label class="control-label" for="country_id">{{ $errors->first('country_id') }}</label>
                            @endif
                            {{ Form::select('country_id', ['L' => 'Large', 'S' => 'Small'], null, ['class' => 'form-control fullwidth', 'placeholder' => 'Your country*']) }}
                        </div>
                    </div>
                    <div class="row form-group {{ $errors->has('city_id') ? 'has-error' : '' }}" id="last-name">
                        <div class="col-xs-12">
                            @if ($errors->has('city_id'))
                            <label class="control-label" for="city_id">{{ $errors->first('city_id') }}</label>
                            @endif
                            {{ Form::select('city_id', ['L' => 'Large', 'S' => 'Small'], null, ['class' => 'form-control fullwidth', 'placeholder' => 'Your city or town*']) }}
                        </div>
                    </div>
                    <div class="row form-group {{ $errors->has('street_address') ? 'has-error' : '' }}" id="email">
                        <div class="col-xs-12">
                             @if ($errors->has('street_address'))
                            <label class="control-label" for="street_address">{{ $errors->first('street_address') }}</label>
                            @endif
                            {{ Form::text('street_address', old('street_address'), ['class' => 'form-control fullwidth', 'placeholder' => 'Your street address*']) }}
                        </div>
                    </div>
                    <div class="row form-group {{ $errors->has('postal_code') ? 'has-error' : '' }}" id="password">
                        <div class="col-xs-12">
                            @if ($errors->has('postal_code'))
                            <label class="control-label" for="postal_code">{{ $errors->first('postal_code') }}</label>
                            @endif
                            {{ Form::text('postal_code', old('postal_code'), ['class' => 'form-control fullwidth', 'placeholder' => 'Your postal code*']) }}
                        </div>
                    </div>
                    <div class="form-group">
                        <a href="{{ route('introduction.create') }}" class="btn btn-primary">Back</a>
                        <input type="submit" class="btn btn-primary pull-right" value="Next" />
                    </div>
                </div>
            </div>
        </div>
    </article>
</div>