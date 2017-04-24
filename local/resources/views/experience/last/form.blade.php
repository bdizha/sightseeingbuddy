<div class="row">
    <div class='col-xs-12'>
        <div class="panel panel-default">
            <div class="panel-heading mt-0">
                Submit your local experience
            </div>
            <div class="panel-body">
                {!! csrf_field() !!}
                <p>
                    Did you forget to tell us about The Big Five roaming around in your backyard? Your
                    mouth-watering menu? Your guests won’t be happy! Go back and change it if you’re not 100%
                    satisfied.
                </p>
                <p>
                    We guarantee a safe and worry-free experience. Our team will contact you within the next 3 days
                    to verify your profile and experience submitted.
                </p>
            </div>
        </div>
    </div>
    <div class='col-xs-12'>
        <div class="gray-bottom-border mt-1 mb-1"></div>
        <div class='row mb-2'>
            <div class="col-sm-12 col-xs-12">
                <div class="text-left mb-1">
                    <a target="_blank" href="/local/experience/{{ $experience->slug }}" class="btn btn-yellow">PREVIEW
                        MY LOCAL EXPERIENCE</a>
                </div>
                <div class="form-group {{ $errors->has('terms') ? 'has-error' : '' }}" id="terms">
                    @if ($errors->has('terms'))
                        <label class="control-label" for="fileupload">{{ $errors->first('terms') }}</label>
                    @endif
                </div>
                <label class="checkbox-inline">
                    {{ Form::checkbox('terms', 1, false, ['id' => "experience_terms"]) }}
                    <label for="experience_terms">
                        <span></span>
                        I agree that I will be contacted by an ambassador & confirm that I will be available over
                        the next 3 weeks for a verification
                    </label>
                </label>
            </div>
        </div>
    </div>
    <div class='col-xs-12'>
        <div class='row'>
            <div class="col-sm-12 col-xs-12">
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Save"/>
                    <a href="{{ route('images.edit', ["id" => $experience->id]) }}"
                       class="btn btn-primary pull-right">Back</a>
                    <span class='inline pull-right'>&nbsp;&nbsp;</span>
                    <input type="submit" class="btn btn-yellow pull-right" value="Submit"/>
                </div>
            </div>
        </div>
    </div>
</div>