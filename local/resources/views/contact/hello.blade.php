@extends('layouts.app', ['url' => '/local/contact-us/create'])

@section('content')

    <section>
        <div class="container pt-2">
            <div class="mb-1 text-center">
                <h1>We&#39;d love to hear from you!</h1>
            </div>
        </div>
    </section>

    <section class="gray-block pb-0">
        <div class="container-fluid">
            <div class='row'>
                <div class="col-sm-6 col-xs-12">
                    <div class='row'>
                        <img src="/images/sunset-beach.jpg" class="fullwidth"/>
                    </div>
                </div>
                <div class="col-sm-6 col-xs-12">
                    <div class="pl-1 row-max-0">
                        <div class="panel panel-default">
                            <div class="panel-heading hide">We&#39;d love to hear from you!</div>
                            <div class="panel-body">
                               <div class="mt-1">
                                   <p>
                                       Feel free to contact us. We have a team of dedicated and knowledgeable staff waiting to assist you.
                                   </p>
                                   <p>
                                       Simply fill in the below form along with the required fields.
                                   </p>
                                   <p>&nbsp;</p>
                               </div>
                                {!! Form::open([
                                'route' => 'contact-us.store']) !!}
                                <div class="gray-bottom-border mb-1 mt-1"></div>
                                <div class='row'>
                                    <div class="col-sm-6 col-xs-12">
                                        <div class="form-group {{ $errors->has('first_name') ? 'has-error' : '' }}"
                                             id="first-name">
                                            @if ($errors->has('first_name'))
                                                <label class="control-label"
                                                       for="inputError1">{{ $errors->first('first_name') }}</label>
                                            @endif
                                            <input class="form-control fullwidth" type="text" id="first-name"
                                                   name="first_name"
                                                   value="{{ old('first_name') }}" autocomplete="off" required
                                                   placeholder="Your first name*"/>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-xs-12">
                                        <div class="form-group {{ $errors->has('last_name') ? 'has-error' : '' }}"
                                             id="last-name">
                                            @if ($errors->has('last_name'))
                                                <label class="control-label"
                                                       for="inputError1">{{ $errors->first('last_name') }}</label>
                                            @endif
                                            <input class="form-control fullwidth" type="text" id="last-name"
                                                   name="last_name"
                                                   value="{{ old('last_name') }}" autocomplete="off" required
                                                   placeholder="Your last name*"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="row form-group {{ $errors->has('email') ? 'has-error' : '' }}" id="email">
                                    <div class="col-sm-12 col-xs-12">
                                        @if ($errors->has('email'))
                                            <label class="control-label"
                                                   for="inputError1">{{ $errors->first('email') }}</label>
                                        @endif
                                        <input class="form-control fullwidth" type="text" id="email" name="email"
                                               value="{{ old('email') }}" autocomplete="off" required
                                               placeholder="Your email address*">
                                    </div>
                                </div>
                                <div class="row form-group {{ $errors->has('message') ? 'has-error' : '' }}"
                                     id="message">
                                    <div class="col-sm-12 col-xs-12">
                                        @if ($errors->has('message'))
                                            <label class="control-label"
                                                   for="inputError1">{{ $errors->first('message') }}</label>
                                        @endif
                                        <textarea id="message" name="message" class="form-control fullwidth" rows="3"
                                                  placeholder="Your email message..." required>{{ old('message') }}</textarea>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-sm-6 col-xs-12">
                                        <input type="submit" class="btn btn-yellow" value="Submit"/>
                                    </div>
                                </div>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection