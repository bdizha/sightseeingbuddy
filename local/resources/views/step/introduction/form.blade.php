<div class="row">
    <article class="article">
        <div class='row'>
            <div class='col-sm-4 col-xs-12 step-form-left'>
                <h1 class="page-title page-title-left">
                    Create a profile
                </h1>
                <div class='text-center'>
                    <div id="cover-image-bin" class="image-bin profile-picture form-group">
                        <div class="bin-item">
                            <img src="{{ Helper::personImage($introduction->image, "gray") }}" />
                            {{ Form::hidden('image', $introduction->image, ['id' => 'image']) }}
                            <i class="fa fa-close bin-close"></i>
                        </div>
                    </div>

                    <!-- The fileinput-button span is used to style the file input field as button -->
                    <span class="btn btn-yellow">
                        <span>Upload profile pic</span>
                        <!-- The file input field used as target for the file upload widget -->
                        <input id="fileupload" class="fileupload" bin="cover-image-bin" image-type="single" type="file" name="files[]">
                    </span>
                    <br>
                    <br>
                    <!-- The global progress bar -->
                    <div id="progress" class="progress">
                        <div class="progress-bar progress-bar-success"></div>
                    </div>

                    <div class="form-group text-center {{ $errors->has('image') ? 'has-error' : '' }}" id="person-image"">
                        @if ($errors->has('image'))
                        <label class="control-label" for="fileupload">{{ $errors->first('image') }}</label>
                        @endif
                        <p>
                            Uploading your profile picture is compulsory for verification.
                        </p>
                    </div>
                </div>
            </div>
            <div class='col-sm-8 col-xs-12'>
                <div class="gray-left-border">
                    <h1 class="page-title page-title-left">
                        Introduce yourself
                    </h1>
                    {!! csrf_field() !!}
                    {{ Form::hidden('user_id', $user->id) }}
                    <div class="row form-group {{ $errors->has('first_name') ? 'has-error' : '' }}" id="first-name">
                        <div class="col-xs-12">
                            @if ($errors->has('first_name'))
                            <label class="control-label" for="first_name">{{ $errors->first('first_name') }}</label>
                            @endif
                            <div class="input-group">
                                <label class="control-label" for="mobile">First name</label>
                                {{ Form::text('first_name', $user->first_name, ['class' => 'form-control fullwidth', 'placeholder' => 'Your first name*']) }}
                            </div>
                        </div>
                    </div>
                    <div class="row form-group {{ $errors->has('last_name') ? 'has-error' : '' }}" id="last-name">
                        <div class="col-xs-12">
                            @if ($errors->has('last_name'))
                            <label class="control-label" for="last_name">{{ $errors->first('last_name') }}</label>
                            @endif
                            <div class="input-group">
                                <label class="control-label" for="mobile">Last name</label>
                                {{ Form::text('last_name', $user->last_name, ['class' => 'form-control fullwidth', 'placeholder' => 'Your last name*']) }}
                            </div>
                        </div>
                    </div>
                    <div class="row form-group {{ $errors->has('id_number') ? 'has-error' : '' }}" id="email">
                        <div class="col-xs-12">
                            @if ($errors->has('id_number'))
                            <label class="control-label" for="id_number">{{ $errors->first('id_number') }}</label>
                            @endif
                            <div class="input-group">
                                <label class="control-label" for="mobile">ID Number</label>
                                {{ Form::text('id_number', $introduction->id_number, ['class' => 'form-control fullwidth', 'placeholder' => 'Your RSA ID number*']) }}
                            </div>
                        </div>
                    </div>
                    <div class="row form-group {{ $errors->has('reason') ? 'has-error' : '' }}" id="password">
                        <div class="col-xs-12">
                            @if ($errors->has('reason'))
                            <label class="control-label" for="reason">{{ $errors->first('reason') }}</label>
                            @endif
                            <div class="input-group">
                                <label class="control-label" for="mobile">Reason</label>
                                {{ Form::text('reason', $introduction->reason, ['class' => 'form-control fullwidth', 'placeholder' => 'Tell us why you’re a local with a difference*']) }}
                            </div>
                        </div>
                    </div>
                    <div class="row form-group {{ $errors->has('description') ? 'has-error' : '' }}" id="password-confirmation">
                        <div class="col-xs-12">
                            @if ($errors->has('description'))
                            <label class="control-label" for="description">{{ $errors->first('description') }}</label>
                            @endif
                            <div class="input-group">
                                <label class="control-label" for="mobile">Description</label>
                                {{ Form::textarea('description', $introduction->description, ['class' => 'form-control fullwidth', 'placeholder' => 'More detailed description of yourself']) }}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Next" />
                    </div>
                </div>
            </div>
        </div>
    </article>
</div>