<div class="row">
    <article class="article">
        <div class='row'>
            <div class='col-xs-12'>
                <h1 class="page-title page-title-left">
                    Pricing
                </h1>
                {!! csrf_field() !!}
                {{ Form::hidden('experience_id', $pricing->experience_id) }}
                <p>
                    Lorem ipsum dolor sit amet, vis saperet delectus eu, id vel recusabo facilisis. Graece tibique periculis
                    eu cum, at fabulas omittam nec, et vis vitae tantas quaerendum. Pri inani platonem at, vix eu scaevola
                    officiis luptatum. Iusto putent consequat mel ut, dicit nonumes definitiones qui ad.
                </p>
                <p>
                    Ius in possim hendrerit, libris electram eos ei. Inani graece vel ei, ipsum melius no mea. Ea usu ullum
                    alterum. Vim ut bonorum efficiantur philosophia
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
                        {{ Form::select('guests', Helper::guests(), $pricing->guests, ['class' => 'form-control fullwidth', 'placeholder' => 'Maximum number of guests*']) }}
                    </div>
                </div>
                <div class='row'>
                    <div class="col-sm-7 col-xs-12">
                        <div class="row">
                            <div class="col-sm-4 col-xs-4">
                                <label class="control-label">Booking for</label>
                                <label class="control-value">1 person</label>
                            </div>
                            <div class="col-sm-4 col-xs-4">
                                <label class="control-label">Price per person</label>
                                {{ Form::text('per_person', $pricing->per_person, ['class' => 'form-control fullwidth', 'placeholder' => 'R0.00']) }}
                            </div>
                            <div class="col-sm-4 col-xs-4">
                                <label class="control-label">You'll receive</label>
                                <label class="control-value">R00.00</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-5 col-xs-12">
                        <div class="row">
                            <div class="col-sm-6 col-xs-6">
                                <label class="control-label">Keep it Local fee</label>
                                <label class="control-value">R0.00</label>
                            </div>
                            <div class="col-sm-6 col-xs-6">
                                <label class="control-label">Total price</label>
                                <label class="control-value">R00.00</label>
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
                                {{ Form::checkbox('days[' . $day . ']', $key, in_array($day, $experience->days)) }}
                                {{ $day }}
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
                                {{ Form::checkbox('times[' . $time . ']', $key, in_array($time, $experience->times)) }}
                                {{ $time }}
                            </label>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class='row mt-2'>
                    <div class="col-sm-12 col-xs-12">
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="Save" />
                            <a href="{{ route('info.edit', ["id" => $experience->id]) }}" class="btn btn-primary pull-right">Back</a>
                            <span class='inline pull-right'>&nbsp;&nbsp;</span>
                            <input type="submit" class="btn btn-primary pull-right" value="Next" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </article>
</div>
