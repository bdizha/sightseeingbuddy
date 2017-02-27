<div class="row">
    <article class="article">
        <div class='row'>
            <div class='col-xs-12'>
                <h1 class="page-title page-title-left">
                    Add your images
                </h1>
                {!! csrf_field() !!}
                {{ Form::hidden('experience_id', $experience->id) }}
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
        </div>
    </article>

    <div class="mt-3 text-center">
        <div class='row'>
            <div class="col-sm-6 col-xs-12">
                <div id="cover-image-bin" class="image-bin">

                </div>
                <div class="form-group text-center {{ $errors->has('image') ? 'has-error' : '' }}" id="gallery-image">
                    @if ($errors->has('image'))
                    <label class="control-label" for="fileupload">{{ $errors->first('image') }}</label>
                    @endif
                </div>
                <span class="btn btn-yellow full-width">
                    <span>UPLOAD COVER IMAGE</span>
                    <!-- The file input field used as target for the file upload widget -->
                    <input id="fileupload" class="fileupload" bin="cover-image-bin" image-type="single" type="file" name="files[]">
                </span>
                <div class='mb-2'><small>This photo will show up in search results</small></div>
            </div>
            <div class="col-sm-6 col-xs-12">
                <div id="gallery-bin" class="image-bin">

                </div>
                <div class="form-group text-center {{ $errors->has('images') ? 'has-error' : '' }}" id="gallery-images">
                    @if ($errors->has('images'))
                    <label class="control-label" for="fileupload">{{ $errors->first('images') }}</label>
                    @endif
                </div>
                <span class="btn btn-yellow full-width">
                    <span>UPLOAD 3 GALLERY IMAGES</span>
                    <!-- The file input field used as target for the file upload widget -->
                    <input id="fileupload" class="fileupload" bin="gallery-bin" image-type="multiple" type="file" name="files[]">
                </span>
                <div class='mb-2'><small>These 3 images will show up in your local experience gallery.</small></div>
            </div>
        </div>
    </div>

    <div class='row'>
        <div class="col-sm-12 col-xs-12">
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Save" />
                <a href="{{ route('wallet.create') }}" class="btn btn-primary pull-right">Back</a>
                <span class='inline pull-right'>&nbsp;&nbsp;</span>
                <input type="submit" class="btn btn-primary pull-right" value="Next" />
            </div>
        </div>
    </div>
</div>