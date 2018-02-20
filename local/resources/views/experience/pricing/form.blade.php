<div class='row'>
    <div class='col-xs-12'>
        <div class="panel panel-default">
            <div class="panel-heading mt-0">
                Pricing
            </div>
            <div class="panel-body mb-0">
                {!! csrf_field() !!}
                {{ Form::hidden('experience_id', $pricing->experience_id) }}
                <p>
                    Add your price per person. Do your sums and account for ALL your expenses including and applicable
                    to your experience. Keep it fair, contact us if you’re not sure.
                </p>

                <p>Here are a few examples:</p>
                <ul>
                    <li>Your rate per hour/day</li>
                    <li>Food &amp; beverages</li>
                    <li>Transport fees</li>
                    <li>Equipment</li>
                    <li>Entrance fees</li>
                </ul>
                <p>
                    *Sightseeing Buddy reserves the right to apply fair pricing. We’re travel gurus and give suggestions if
                    your price is too low or too high.
                <p>
                </p>
                Sightseeing Buddy adds an average of 20% to your price. The price displayed on your experience is the total
                price, including our fees and commissions. You will get the exact amount you’ve quoted.
                </p>
                <p>
                    See example below:
                </p>
                <div class="gray-bottom-border mt-1 mb-1"></div>
                <h1 class="page-title page-title-left">
                    Guests & deals
                </h1>
                <div class="row form-group {{ $errors->has('guests') ? 'has-error' : '' }}" id="guests">
                    <div class="col-sm-5 col-xs-6">
                        @if ($errors->has('guests'))
                            <label class="control-label" for="guests">{{ $errors->first('guests') }}</label>
                        @endif
                        {{ Form::select('guests', Helper::guests(), $pricing->guests, ['class' => 'form-control fullwidth', 'id' => 'guests','required' => true, 'placeholder' => 'Maximum number of guests*']) }}
                    </div>
                </div>
                <div class='row'>
                    <div class="col-sm-8 col-xs-12">
                        <div class="row">
                            <div class="col-sm-4 col-xs-4">
                                <label class="control-label">Booking for</label>
                                <label class="control-value" id="pricing_persons" data-pricing-persons="{{ $pricing->guests ? $pricing->guests : 0 }}">{{ $pricing->guests ? $pricing->guests : 0 }} person</label>
                            </div>
                            <div class="col-sm-5 col-xs-5">
                                <label class="control-label">Price per person</label>
                                {{ Form::text('per_person', $pricing->per_person, ['class' => 'form-control fullwidth', 'id' => 'per_person', 'required' => true, 'placeholder' => 'R0.00', 'onkeyup' => '(new setPricing).init();', 'onkeypress' => "return isNumber(event)"]) }}
                            </div>
                            <div class="col-sm-3 col-xs-3">
                                <label class="control-label">You'll receive</label>
                                <label class="control-value" id="pricing_local_fee">R00.00</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 col-xs-12">
                        <div class="row">
                            <div class="col-sm-6 col-xs-6">
                                <label class="control-label">Sightseeing Buddy fee</label>
                                <label class="control-value" id="pricing_commission">R0.00</label>
                            </div>
                            <div class="col-sm-6 col-xs-6">
                                <label class="control-label">Total price</label>
                                <label class="control-value" id="pricing_total">R10.00</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="gray-bottom-border mt-1 mb-1"></div>
                <h1 class="page-title page-title-left">
                    Availability
                </h1>
                <h4>
                    Available days
                </h4>
                <div class='row'>
                    <div class="col-sm-12 col-xs-12">
                        @foreach(Helper::days() as $key => $day)
                            <div class="schedule-item">
                                <label class="checkbox-inline">
                                    {{ Form::checkbox('days[]', $key, in_array($key, $experience->days), ['id' => "days_" . $key]) }}
                                    <label for="{{ "days_" . $key }}">
                                        <span></span>
                                        {{ $day }}
                                    </label>
                                </label>
                            </div>
                        @endforeach
                    </div>
                </div>
                <h4>
                    Available starting times
                </h4>
                <div class='row'>
                    <div class="col-sm-12 col-xs-12">
                        @foreach(Helper::times() as $key => $time)
                            <div class="schedule-item">
                                <label class="checkbox-inline">
                                    {{ Form::checkbox('times[]', $key, in_array($time, $experience->times), ['id' => "times_" . $key]) }}
                                    <label for="{{ "times_" . $key }}">
                                        <span></span>
                                        {{ $time }}
                                    </label>
                                </label>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class='row mt-2'>
                    <div class="col-sm-12 col-xs-12">
                        <div class="row">
                            <input type="submit" class="btn btn-default hide" value="Save"/>
                            <a href="{{ route('info.edit', ["id" => $experience->id]) }}"
                               class="btn btn-default">Back</a>
                            <input type="submit" class="btn btn-default pull-right" value="Next"/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
