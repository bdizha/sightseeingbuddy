<div class="row">
    <article class="article">
        <div class='row'>
            <div class='col-sm-4 col-xs-12 step-form-left'>
            </div>
            <div class='col-sm-8 col-xs-12'>
                <div class="gray-left-border mt-1">
                    <h1 class="page-title page-title-left">
                        How do we contact you?
                    </h1>
                    {!! csrf_field() !!}

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
                        <a href="{{ route('wallet.edit', ["id" => $user->id]) }}" class="btn btn-primary">Back</a>
                        <input type="submit" class="btn btn-primary pull-right" value="Next" />
                    </div>
                </div>
            </div>
        </div>
    </article>
</div>