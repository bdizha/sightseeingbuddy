<div class='row introduction-form'>
    <div class='col-sm-5 col-xs-12 step-form-left'>
        <div class="panel panel-default">
            <div class="panel-heading"> {{ empty($user->id) ? "Create" : "Edit" }} Your Profile</div>
            <div class="panel-body">
                <div class='text-center'>
                    <div id="cover-image-bin" class="image-bin profile-picture form-group">
                        <div class="bin-item">
                            <img src="{{ Helper::personImage($user->image, "gray") }}"/>
                            {{ Form::hidden('image', $user->image, ['id' => 'image']) }}
                            <i class="fa fa-close bin-close"></i>
                        </div>
                    </div>
                    <!-- The global progress bar -->
                    <div id="progress" class="progress">
                        <div class="progress-bar progress-bar-success"></div>
                    </div>

                    <!-- The fileinput-button span is used to style the file input field as button -->
                    <div class="btn btn-default btn-image">
                        <span>Upload profile pic</span>
                        <!-- The file input field used as target for the file upload widget -->
                        <input id="fileupload" class="fileupload" bin="cover-image-bin" image-type="single" type="file"
                               name="files[]">
                    </div>

                    <div class="form-group text-center {{ $errors->has('image') ? 'has-error' : '' }}"
                         id="person-image">
                        @if ($errors->has('image'))
                            <label class="control-label" for="fileupload">{{ $errors->first('image') }}</label>
                        @endif
                        <p>
                            Uploading your profile picture is compulsory for verification.
                        </p>
                    </div>
                    <div class="row form-group {{ $errors->has('first_name') ? 'has-error' : '' }}" id="first-name">
                        <div class="col-xs-12">
                            @if ($errors->has('first_name'))
                                <label class="control-label"
                                       for="first_name">{{ $errors->first('first_name') }}</label>
                            @endif
                            <div class="input-group">
                                <label class="control-label" for="mobile">First name</label>
                                {{ Form::text('first_name', $user->first_name, ['class' => 'form-control fullwidth', 'required' => true, 'placeholder' => 'Your first name*']) }}
                            </div>
                        </div>
                    </div>
                    <div class="row form-group {{ $errors->has('last_name') ? 'has-error' : '' }}" id="last-name">
                        <div class="col-xs-12">
                            @if ($errors->has('last_name'))
                                <label class="control-label"
                                       for="last_name">{{ $errors->first('last_name') }}</label>
                            @endif
                            <div class="input-group">
                                <label class="control-label" for="mobile">Last name</label>
                                {{ Form::text('last_name', $user->last_name, ['class' => 'form-control fullwidth', 'required' => true, 'placeholder' => 'Your last name*']) }}
                            </div>
                        </div>
                    </div>
                    <div class="row form-group {{ $errors->has('email') ? 'has-error' : '' }}" id="email">
                        <div class="col-xs-12">
                            @if ($errors->has('email'))
                                <label class="control-label" for="email">{{ $errors->first('email') }}</label>
                            @endif
                            <div class="input-group">
                                <label class="control-label" for="email">Email</label>
                                {{ Form::text('email', $user->email, ['class' => 'form-control fullwidth', 'required' => true, 'placeholder' => 'Your email address*']) }}
                            </div>
                        </div>
                    </div>
                    <div class="row form-group {{ $errors->has('password') ? 'has-error' : '' }}"
                         id="fields-password-field">
                        <div class="col-xs-12">
                            <div class="password-group">
                                @if ($errors->has('password'))
                                    <label class="control-label"
                                           for="inputError1">{{ $errors->first('password') }}</label>
                                @endif
                                <input class="form-control fullwidth" type="password" id="fields-password"
                                       name="password"
                                       value="{{ old('password') ? old('password') : $user->salt }}" autocomplete="off" @if (Auth::guest())required
                                       @endif placeholder="Your password*"/>
                                <div class="password-eye"></div>
                            </div>
                        </div>
                    </div>
                    <div class="password-group row form-group {{ $errors->has('password_confirmation') ? 'has-error' : '' }}"
                         id="fields-password-confirmation-field">
                        <div class="col-xs-12">
                            <div class="password-group">
                                @if ($errors->has('password_confirmation'))
                                    <label class="control-label"
                                           for="inputError1">{{ $errors->first('password_confirmation') }}</label>
                                @endif
                                <input class="form-control fullwidth" type="password" id="fields-password-confirmation"
                                       name="password_confirmation" value="{{ old('password_confirmation') ? old('password_confirmation') : $user->salt }}" autocomplete="off"
                                       @if (Auth::guest())required @endif placeholder="Confirm password*"/>
                                <div class="password-eye"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class='col-sm-7 col-xs-12'>
        <div class="gray-left-border">
            <div class="panel panel-default">
                <div class="panel-heading">Introduce yourself</div>
                <div class="panel-body">
                    {!! csrf_field() !!}
                    {{ Form::hidden('user_id', $user->id) }}
                    <input type="hidden" name="type" value="local">

                    <div class="row form-group {{ $errors->has('gender') ? 'has-error' : '' }}">
                        <div class="col-xs-12">
                            @if ($errors->has('gender'))
                                <label class="control-label"
                                       for="gender">{{ $errors->first('gender') }}</label>
                            @endif
                            <div class="input-group">
                                <label class="control-label" for="mobile">Gender</label>
                                {!! Form::select('gender', ['male' => 'Male', 'female' => 'Female'], $user->gender, array('class'=>'form-control fullwidth', 'required' => true, 'placeholder' => 'Your Gender*')) !!}
                            </div>
                        </div>
                    </div>
                    <div class="row form-group {{ $errors->has('id_number') ? 'has-error' : '' }}" id="email">
                        <div class="col-xs-12">
                            @if ($errors->has('id_number'))
                                <label class="control-label"
                                       for="id_number">{{ $errors->first('id_number') }}</label>
                            @endif
                            <div class="input-group">
                                <label class="control-label" for="mobile">ID Number</label>
                                {{ Form::text('id_number', $user->id_number, ['class' => 'form-control fullwidth', 'required' => true, 'placeholder' => 'Your RSA ID number*']) }}
                            </div>
                        </div>
                    </div>
                    <div class="row form-group {{ $errors->has('mobile') ? 'has-error' : '' }}" id="mobile">
                        <div class="col-xs-12">
                            @if ($errors->has('mobile'))
                                <label class="control-label" for="mobile">{{ $errors->first('mobile') }}</label>
                            @endif
                            <div class="input-group">
                                <label class="control-label" for="mobile">Mobile</label>
                                {{ Form::text('mobile', $user->mobile, ['class' => 'form-control fullwidth', 'required' => true, 'placeholder' => 'Your mobile number*']) }}
                            </div>
                        </div>
                    </div>
                    <div class="row form-group {{ $errors->has('telephone') ? 'has-error' : '' }}" id="telephone">
                        <div class="col-xs-12">
                            @if ($errors->has('telephone'))
                                <label class="control-label"
                                       for="telephone">{{ $errors->first('telephone') }}</label>
                            @endif
                            <div class="input-group">
                                <label class="control-label" for="telephone">Telephone</label>
                                {{ Form::text('telephone', $user->telephone, ['class' => 'form-control fullwidth', 'required' => true, 'placeholder' => 'Your home telephone number*']) }}
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
                                {{ Form::text('reason', $user->reason, ['class' => 'form-control fullwidth', 'required' => true, 'placeholder' => 'Tell us why you’re a local with a difference*']) }}
                            </div>
                        </div>
                    </div>
                    <div class="row form-group {{ $errors->has('description') ? 'has-error' : '' }}"
                         id="password-confirmation">
                        <div class="col-xs-12">
                            @if ($errors->has('description'))
                                <label class="control-label"
                                       for="description">{{ $errors->first('description') }}</label>
                            @endif
                            <div class="input-group">
                                <label class="control-label" for="mobile">Description</label>
                                {{ Form::textarea('description', $user->description, ['class' => 'form-control fullwidth redactor-input', 'required' => true, 'placeholder' => 'More detailed description of yourself']) }}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-default" value="Next"/>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>