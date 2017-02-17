<div class="jobPost">
    @include('step.partials.heading', ['step' => 2, 'heading' => 'Summary'])  
    <div class="jobGrey">
        {!! Form::open([
        'method' => $method,
        'route' => $route,
        'class' => '']) !!}

        {!! csrf_field() !!}
        @include('partials.errors')

        <div class="jobWhite">
            <div class="inputRow inputTable{{ $errors->has('summary') ? ' hasError' : '' }}">
                <textarea type="text" rows="6" name="summary" placeholder="Summary">{{ !empty($user->summary) ? $user->summary : old('summary') }}</textarea>
            </div>
            <div class="inputRow inputTable">
                <div class="inputColumn inputRight">
                    <a href="{{ route('contact.edit', $user->id) }}" class="button greyButton">Previous</a>
                </div>
                <div class="inputColumn inputLeft">
                    <input type="submit" class="button greenButton" value="Next" />
                </div>
            </div>
        </div>

        {!! Form::close() !!}
    </div>
    @include('step.partials.js') 
</div>