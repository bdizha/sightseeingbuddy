<div class="row">
    <div class='col-xs-12 ml-0'>
        <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading mt-0">
                    Add your images
                </div>
                <div class="panel-body">
                    {!! csrf_field() !!}
                    {{ Form::hidden('experience_id', $experience->id) }}
                    <p>
                        Upload a cover photo size to be supplied by Sergio. This is where you want to impress and
                        entice your audience, make sure it sums up your experience. The cover photo will be
                        displayed in the
                        search results when guests are still undecided, make them choose you!
                    </p>
                    <p>
                        Upload 1 - 3 gallery photos. This will be displayed in your local gallery.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="mt-3 text-center">
    <div class='row'>
        <div class="col-sm-6 col-xs-12">
            <div id="cover-image-bin" class="image-bin">
                @if($experience->cover_image)
                    <div class="bin-item">
                        <img src="{{ $experience->cover_image }}"/>
                        {{ Form::hidden('image', $experience->cover_image) }}
                        <i class="fa fa-close bin-close"></i>
                    </div>
                @endif
            </div>
            <div class="form-group text-center {{ $errors->has('image') ? 'has-error' : '' }}" id="gallery-image">
                @if ($errors->has('image'))
                    <label class="control-label" for="fileupload">{{ $errors->first('image') }}</label>
                @endif
            </div>
            <span class="btn btn-default full-width">
                    <span>UPLOAD COVER IMAGE</span>
                <!-- The file input field used as target for the file upload widget -->
                    <input id="fileupload" class="fileupload" bin="cover-image-bin" image-type="single" type="file"
                           name="files[]">
                </span>
            <div class='mb-2'>
                <small>This photo will show up in search results</small>
            </div>
        </div>
        <div class="col-sm-6 col-xs-12">
            <div id="gallery-bin" class="image-bin">
                @foreach($experience->gallery as $image)
                    <div class="bin-item">
                        <img src="{{ $image->image }}"/>
                        {{ Form::hidden('images[]', $image->image) }}
                        <i class="fa fa-close bin-close"></i>
                    </div>
                @endforeach
            </div>
            <div class="form-group text-center {{ $errors->has('images') ? 'has-error' : '' }}" id="gallery-images">
                @if ($errors->has('images'))
                    <label class="control-label" for="fileupload">{{ $errors->first('images') }}</label>
                @endif
            </div>
            <span class="btn btn-default full-width">
                    <span>UPLOAD 3 GALLERY IMAGES</span>
                <!-- The file input field used as target for the file upload widget -->
                    <input id="fileupload" class="fileupload" bin="gallery-bin" image-type="multiple" type="file"
                           name="files[]">
                </span>
            <div class='mb-2'>
                <small>These 3 images will show up in your local experience gallery.</small>
            </div>
        </div>
    </div>
</div>

<div class='row mb-1'>
    <div class="col-sm-12 col-xs-12">
        <div class="row">
            <div class="form-group">
                <input type="submit" class="btn btn-default hide" value="Save"/>
                <a href="{{ route('pricing.edit', ["id" => $experience->id]) }}"
                   class="btn btn-default">Back</a>
                <span class='inline pull-right'>&nbsp;&nbsp;</span>
                <input type="submit" class="btn btn-default pull-right" value="Next"/>
            </div>
        </div>
    </div>
</div>