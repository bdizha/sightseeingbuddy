@extends('layouts.app', ['url' => '/local/contact-us/create'])

@section('content')

    <section>
        <div class="container mt-1">
            <div class="mt-3 text-center">
                <h1>We'd love to hear from you!</h1>
            </div>
        </div>
    </section>

    <section class="gray-block pb-0">
        <div class="container-fluid">
            <div class='row'>
                <div class="col-sm-6 col-xs-12">
                    <div class='row'>
                        <img src="/images/contact.jpg" class="fullwidth"/>
                    </div>
                </div>
                <div class="col-sm-6 col-xs-12">
                    <div class="pl-1 row-max-0">
                        {!! Form::open([
                        'route' => 'contact-us.store']) !!}
                        <h3>This a sub header</h3>
                        <p>
                            Some test here
                            Some test here
                            Some test here
                            Some test here
                            Some test here
                            Some test here
                            Some test here
                            Some test here
                            Some test here
                            Some test here
                            Some test here
                            Some test here
                            Some test here
                            Some test here
                            Some test here
                            Some test here
                            Some test here
                            Some test here
                            Some test here
                            Some test here
                        </p>
                        <div class="gray-bottom-border mb-1 mt-1"></div>
                        <div class='row'>
                            <div class="col-sm-6 col-xs-12">
                                <div class="form-group {{ $errors->has('first_name') ? 'has-error' : '' }}"
                                     id="first-name">
                                    @if ($errors->has('first_name'))
                                        <label class="control-label"
                                               for="inputError1">{{ $errors->first('first_name') }}</label>
                                    @endif
                                    <input class="form-control fullwidth" type="text" id="first-name" name="first_name"
                                           value="{{ old('first_name') }}" autocomplete="off"
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
                                    <input class="form-control fullwidth" type="text" id="last-name" name="last_name"
                                           value="{{ old('last_name') }}" autocomplete="off"
                                           placeholder="Your last name*"/>
                                </div>
                            </div>
                        </div>
                        <div class="row form-group {{ $errors->has('email') ? 'has-error' : '' }}" id="email">
                            <div class="col-sm-12 col-xs-12">
                                @if ($errors->has('email'))
                                    <label class="control-label" for="inputError1">{{ $errors->first('email') }}</label>
                                @endif
                                <input class="form-control fullwidth" type="text" id="email" name="email"
                                       value="{{ old('email') }}" autocomplete="off"
                                       placeholder="Your email address*">
                            </div>
                        </div>
                        <div class="row form-group {{ $errors->has('message') ? 'has-error' : '' }}" id="message">
                            <div class="col-sm-12 col-xs-12">
                                @if ($errors->has('message'))
                                    <label class="control-label" for="inputError1">{{ $errors->first('message') }}</label>
                                @endif
                                <textarea id="message" name="message" class="form-control fullwidth" rows="3"
                                          placeholder="Your email message...">{{ old('message') }}</textarea>
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
    </section>
@endsection