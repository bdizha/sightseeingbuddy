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
                    *Sightseeing Buddy reserves the right to apply fair pricing. We’re travel gurus and give suggestions
                    if
                    your price is too low or too high.
                <p>
                </p>
                Sightseeing Buddy adds an average of 20% to your price. The price displayed on your experience is the
                total
                price, including our fees and commissions. You will get the exact amount you’ve quoted.
                </p>
                <p>
                    See example below:
                </p>
                <div class="gray-bottom-border mt-1 mb-1"></div>
                <h2 class="page-title page-title-left">
                    Guests & deals
                </h2>
                <div class='row'>
                    <div class="col-sm-12 col-xs-12">
                        <table class="table table-pricing">
                            <thead>
                                <tr>
                                    <th>Booking for</th>
                                    <th>Price per person</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="{{ $errors->has('guests') ? 'has-error' : '' }}">
                                        @if ($errors->has('guests'))
                                            <label class="control-label" for="guests">{{ $errors->first('guests') }}</label>
                                        @endif
                                        {{ Form::select('guests', Helper::guests(), $pricing->guests, ['class' => 'form-control fullwidth', 'id' => 'guests','required' => true, 'tabindex' => 3, 'placeholder' => 'Maximum number of guests*']) }}
                                    </td>
                                    <td>
                                        {{ Form::text('per_person', $pricing->per_person, ['class' => 'form-control fullwidth', 'id' => 'per_person', 'required' => true, 'placeholder' => 'R0.00', 'onkeyup' => '(new setPricing).init();', 'onkeypress' => "return isNumber(event)"]) }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <table class="table table-pricing">
                            <thead>
                                <tr>
                                    <th>You'll receive</th>
                                    <th>Sightseeing Buddy fee</th>
                                    <th>Total price</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <span id="pricing_persons" style="display: none"></span>
                                        <label class="control-value" id="pricing_local_fee">R00.00</label>
                                    </td>
                                    <td>
                                        <label class="control-value" id="pricing_commission">R0.00</label>
                                    </td>
                                    <td>
                                        <label class="control-value" id="pricing_total">R10.00</label>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="gray-bottom-border mt-1 mb-1"></div>
                <h2 class="page-title page-title-left">
                    Availability
                </h2>
                <h4>
                    Available days
                </h4>
                <div class='row'>
                    <div class="col-sm-12 col-xs-12">
                        @foreach(Helper::days() as $key => $day)
                            <div class="schedule-item">
                                <label class="checkbox-inline">
                                    {{ Form::checkbox('days[]', $key, in_array($key, $experience->days), ['id' => "days_" . $key, 'tabindex' => 3 + $key]) }}
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
