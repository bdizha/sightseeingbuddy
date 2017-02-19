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
                    <div class="row form-group {{ $errors->has('bank') ? 'has-error' : '' }}" id="bank">
                        <div class="col-xs-12">
                            @if ($errors->has('bank'))
                            <label class="control-label" for="bank">{{ $errors->first('bank') }}</label>
                            @endif
                             {{ Form::text('bank', old('bank'), ['class' => 'form-control fullwidth', 'placeholder' => 'Your bank name*']) }}
                        </div>
                    </div>
                    <div class="row form-group {{ $errors->has('branch') ? 'has-error' : '' }}" id="branch">
                        <div class="col-xs-12">
                            @if ($errors->has('branch'))
                            <label class="control-label" for="branch">{{ $errors->first('branch') }}</label>
                            @endif
                             {{ Form::text('branch', old('branch'), ['class' => 'form-control fullwidth', 'placeholder' => 'Your branch name*']) }}
                        </div>
                    </div>
                    <div class="row form-group {{ $errors->has('account_number') ? 'has-error' : '' }}" id="account_number">
                        <div class="col-xs-12">
                             @if ($errors->has('account_number'))
                            <label class="control-label" for="account_number">{{ $errors->first('account_number') }}</label>
                            @endif
                             {{ Form::text('account_number', old('account_number'), ['class' => 'form-control fullwidth', 'placeholder' => 'Your account number*']) }}
                        </div>
                    </div>
                    <div class="form-group">
                        <a href="{{ route('location.create') }}" class="btn btn-primary">Back</a>
                        <input type="submit" class="btn btn-primary pull-right" value="Next" />
                    </div>
                </div>
            </div>
        </div>
    </article>
</div>