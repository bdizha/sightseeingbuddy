<div class="row">
    <article class="article">
        <div class='row'>
            <div class='col-xs-12'>
                <h1 class="page-title page-title-left">
                    Submit your local experience
                </h1>
                {!! csrf_field() !!}
                <p>
                    Lorem ipsum dolor sit amet, vis saperet delectus eu, id vel recusabo facilisis. Graece tibique periculis
                    eu cum, at fabulas omittam nec, et vis vitae tantas quaerendum. Pri inani platonem at, vix eu scaevola
                    officiis luptatum. Iusto putent consequat mel ut, dicit nonumes definitiones qui ad.
                </p>
                <p>
                    Ius in possim hendrerit, libris electram eos ei. Inani graece vel ei, ipsum melius no mea. Ea usu ullum
                    alterum. Vim ut bonorum efficiantur philosophia
                </p>
            </div>
            <div class='col-xs-12'>

                <div class="gray-bottom-border mt-1 mb-1"></div>
                <div class='row mb-2'>
                    <div class="col-sm-12 col-xs-12">
                        <div class="text-left mb-1">
                            <a target="_blank" href="/local/experience/{{ $experience->id }}" class="btn btn-yellow">PREVIEW MY LOCAL EXPERIENCE</a>
                        </div>
                        <div class="form-group {{ $errors->has('terms') ? 'has-error' : '' }}" id="terms">
                            @if ($errors->has('terms'))
                            <label class="control-label" for="fileupload">{{ $errors->first('terms') }}</label>
                            @endif
                        </div>
                        <label class="checkbox-inline">
                            {{ Form::checkbox("terms", 1, false) }}
                            I agree that I will be contacted by an ambassador & confirm that I will be available over the next 3
                            weeks for a verification meeting.
                        </label>
                    </div>
                </div>
            </div>
            <div class='col-xs-12'>
                <div class='row'>
                    <div class="col-sm-12 col-xs-12">
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="Save" />
                            <a href="{{ route('images.edit', ["id" => $experience->id]) }}" class="btn btn-primary pull-right">Back</a>
                            <span class='inline pull-right'>&nbsp;&nbsp;</span>
                            <input type="submit" class="btn btn-yellow pull-right" value="Submit" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </article>
</div>