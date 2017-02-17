<div class="jobPost">
    @include('step.partials.heading', ['step' => 4, 'heading' => 'Education'])  
    <div class="jobGrey">
        @foreach($schools as $s)
        <div class="jobResume jobWhite">
            @include('profile.partials.education', ['s' => $s])
        </div>
        @endforeach

        {!! Form::open([
        'method' => $method,
        'route' => $route,
        'class' => '']) !!}

        {!! csrf_field() !!}
        @include('partials.errors')

        <div class="jobWhite">
            <input type="hidden" id="is_more" name="is_more" value="0">
            <div class="inputRow inputTable">
                <input type="text" name="name" placeholder="School name" value="{{ !empty($school->name) ? $school->name : old('name') }}">
            </div>
            <div class="inputRow inputTable">
                <div class="inputColumn inputRight">
                    {!! Form::select('qualification', Helper::formQualifications(), !empty($school->qualification) ? $school->qualification : old('qualification')) !!}
                </div>
                <div class="inputColumn inputLeft">
                    <label class="inputLabel jobCheckbox" for="is_current">Is Current</label>
                    {!! Form::checkbox('is_current', 1, !empty($school->is_current) ? $school->is_current : old('is_current'), ['class' => 'jobCheckbox', 'id' => 'is_current']) !!}
                </div>
            </div>
            <div class="inputRow inputTable">
                <input type="text" name="concentration" placeholder="Concentration" value="{{ !empty($school->concentration) ? $school->concentration : old('concentration') }}">
            </div>
            <div class="inputRow inputTable">
                <div class="inputColumn inputRight">
                    <label class="inputLabel">Start Date</label>
                    <div class="jobTable">
                        <div class="jobColumn jobColumnMonth">
                            {!! Form::select('start_month', Helper::formMonths(), !empty($school->start_month) ? $school->start_month : old('start_month')) !!}
                        </div>
                        <div class="jobColumn jobColumnYear">
                            {!! Form::select('start_year', Helper::formYears(), !empty($school->start_year) ? $school->start_year : old('start_year')) !!}
                        </div>
                    </div>
                </div>
                <div class="inputColumn inputLeft">
                    <div id="ended-at">
                        <label class="inputLabel">End Date</label>
                        <div class="jobTable">
                            <div class="jobColumn jobColumnMonth">
                                {!! Form::select('end_month', Helper::formMonths(), !empty($school->end_month) ? $school->end_month : old('end_month')) !!}
                            </div>
                            <div class="jobColumn jobColumnYear">
                                {!! Form::select('end_year', Helper::formYears(), !empty($school->end_year) ? $school->end_year : old('end_year')) !!}
                            </div>
                        </div>
                    </div>
                </div>
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
                    <a href="{{ route('experience.create') }}" class="button greyButton">Previous</a>
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