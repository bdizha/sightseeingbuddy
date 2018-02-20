<div class='row'>
    <div class='col-sm-8 col-xs-12'>
        <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading">Your payment details</div>
                <div class="panel-body">
                    {!! csrf_field() !!}
                    <div class="row form-group {{ $errors->has('bank') ? 'has-error' : '' }}" id="bank">
                        <div class="col-xs-12">
                            @if ($errors->has('bank'))
                                <label class="control-label" for="bank">{{ $errors->first('bank') }}</label>
                            @endif
                            <div class="input-group">
                                <label class="control-label" for="bank">Bank</label>
                                {{ Form::text('bank', $wallet->bank, ['class' => 'form-control fullwidth','required' => true, 'placeholder' => 'Your bank name*']) }}
                            </div>
                        </div>
                    </div>
                    <div class="row form-group {{ $errors->has('branch') ? 'has-error' : '' }}" id="branch">
                        <div class="col-xs-12">
                            @if ($errors->has('branch'))
                                <label class="control-label" for="branch">{{ $errors->first('branch') }}</label>
                            @endif
                            <div class="input-group">
                                <label class="control-label" for="branch">Branch</label>
                                {{ Form::text('branch', $wallet->branch, ['class' => 'form-control fullwidth','required' => true, 'placeholder' => 'Your branch name or code*']) }}
                            </div>
                        </div>
                    </div>
                    <div class="row form-group {{ $errors->has('account_number') ? 'has-error' : '' }}"
                         id="account_number">
                        <div class="col-xs-12">
                            @if ($errors->has('account_number'))
                                <label class="control-label"
                                       for="account_number">{{ $errors->first('account_number') }}</label>
                            @endif
                            <div class="input-group">
                                <label class="control-label" for="account_number">Account number</label>
                                {{ Form::text('account_number', $wallet->account_number, ['class' => 'form-control fullwidth','required' => true, 'placeholder' => 'Your account number*']) }}
                            </div>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-xs-12">
                            <p>
                                By creating an account, you confirm that you've read and accept our
                                <a href="/pages/terms-conditions" target="_blank">Terms & Conditions</a> &
                                <a href="/pages/privacy-policy" target="_blank">Privacy Policy</a>.
                            </p>
                        </div>
                    </div>
                    <div class="form-group">
                        <a href="{{ route('location.edit', ['id' => $user->id]) }}" class="btn btn-default">Back</a>
                        <input type="submit" class="btn btn-default pull-right" value="Next"/>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>