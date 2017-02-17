<div class="jobPost">
    @include('step.partials.heading', ['step' => 5, 'heading' => 'Skills'])  
    <div class="jobGrey">
        {!! Form::open([
        'method' => $method,
        'route' => $route,
        'class' => '']) !!}

        {!! csrf_field() !!}
        @include('partials.errors')

        <div class="jobWhite">
            <input type="hidden" id="is_more" name="is_more" value="0">
            <div class="inputRow inputTable">
                {!! Form::text('name', !empty($skill->name) ? $skill->name : old('name'), ['placeholder' => 'Skill name']) !!}
            </div>
        </div>
        <div class="jobWhite">
            <div class="inputRow inputTable">
                <input type="submit" class="button greyButton jobAddMore" value="Add More" />
            </div>
        </div>
        <div class="jobWhite">
            <div class="inputRow inputTable">
                <div class="inputColumn inputRight">
                    <a href="{{ route('experience.edit', $user->id) }}" class="button greyButton">Previous</a>
                </div>
                <div class="inputColumn inputLeft">
                    <input type="submit" class="button greenButton" value="Next" />
                </div>
            </div>
        </div>

        {!! Form::close() !!}
        @foreach($skills as $s)
        <div class="jobResume jobWhite">
            @include('profile.partials.skill', ['s' => $s])    
        </div>
        @endforeach
    </div>
    @include('step.partials.js') 
</div>