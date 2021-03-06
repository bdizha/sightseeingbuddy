@extends('layouts.auth')

@section('content')
    @include('auth.partials.sidebar', ['active' => 'login', 'links' => $links])
    <div class="col-sm-8 col-sm-offset-1 same-height mt-3 gray-bottom-border gray-top-border" data-mh="column">
        <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading">Experience the Culture with Sightseeing Buddy</div>
                <div class="panel-body">
                    <p>If you are looking to book an authentic experience with a buddy or interested in hosting one,
                        please sign up by selecting the button below</p>
                    <div class="row form-group">
                        <div class="col-sm-6 col-xs-12">
                            <a href="{{ route('register') }}" class="btn fullwidth btn-default">Find a buddy</a>
                        </div>
                        <div class="col-sm-6 col-xs-12">
                            <a href="{{ route("introduction.create") }}" class="btn fullwidth btn-default">Become a
                                buddy</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection