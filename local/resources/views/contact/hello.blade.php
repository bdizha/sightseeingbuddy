@extends('layouts.show', [
'page' => 'settings', 
'heading' => 'Say Hello?', 
'link' => '',
'hideSearch' => true
])

@section('content')

<div class="jobTable">
    <div class="jobColumn jobMetaLeft">
        @include('page.partials.links', ['links' => $links, 'active' => 'contact-us'])        
    </div>
    <div class="jobColumn jobMetaRight">
        <div class="jobPost">
            {!! Form::open([
            'method' => 'POST',
            'route' => 'hello.store',
            'class' => 'jobForm jobGrey']) !!}

            {!! csrf_field() !!}
            @include('partials.errors') 

            <h4>Kindly drop us a line or two :)</h4>
            
            @if (session('status'))
            <div class="jobAlertSuccess">
                {{ session('status') }}
            </div>
            @endif

            <div class="jobPadding">
                <div class="inputRow inputTable{{ $errors->has('subject') ? ' hasError' : '' }}">
                    {!! Form::text('subject', old('subject'), ['placeholder' => 'Subject']) !!}
                </div>
                <div class="inputRow inputTable{{ $errors->has('mobile') ? ' hasError' : '' }}">
                    {!! Form::text('mobile', old('mobile'), ['placeholder' => 'Mobile']) !!}
                </div>
                <div class="inputRow inputTable{{ $errors->has('email') ? ' hasError' : '' }}">
                    {!! Form::text('email', old('email'), ['placeholder' => 'Email']) !!}
                </div>
                <div class="inputRow inputTable{{ $errors->has('content') ? ' hasError' : '' }}">
                    {!! Form::textarea('content', old('content'), ['placeholder' => 'Message']) !!}
                </div>
                <div class="inputRow inputTable">
                    <input type="submit" class="button greenButton" value="Send" />
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection