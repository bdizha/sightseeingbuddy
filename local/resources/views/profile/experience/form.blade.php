<div class="jobPost">
    @include('step.partials.heading', ['step' => 3, 'heading' => 'Experience'])  
    <div class="jobGrey">
        @foreach($experiences as $e)
        <div class="jobResume jobWhite">
            @include('profile.partials.experience', ['e' => $e])
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
                <input type="text" name="position" placeholder="Position" value="{{ !empty($experience->position) ? $experience->position : old('position') }}">
            </div>
            <div class="inputRow inputTable">
                <div class="inputColumn inputRight">
                    <input type="text" name="company" placeholder="Employer name" value="{{ !empty($experience->company_id) ? $experience->company->name : old('company') }}">
                </div>
                <div class="inputColumn inputLeft">
                    <label class="inputLabel jobCheckbox" for="is_current">Is Current</label>
                    {!! Form::checkbox('is_current', 1, !empty($experience->is_current) ? $experience->is_current : old('is_current'), ['class' => 'jobCheckbox', 'id' => 'is_current']) !!}
                </div>
            </div>
            <div class="inputRow inputTable">
                <div class="inputColumn inputRight">
                    <label class="inputLabel">Start Date</label>
                    <div class="jobTable">
                        <div class="jobColumn jobColumnMonth">
                            {!! Form::select('start_year', Helper::formYears(), !empty($experience->start_year) ? $experience->start_year : old('start_year')) !!}
                        </div>
                        <div class="jobColumn jobColumnYear">
                            {!! Form::select('start_month', Helper::formMonths(), !empty($experience->start_month) ? $experience->start_month : old('start_month')) !!}
                        </div>
                    </div>
                </div>
                <div class="inputColumn inputLeft">
                    <div id="ended-at">
                        <label class="inputLabel">End Date</label>
                        <div class="jobTable">
                            <div class="jobColumn jobColumnMonth">
                                {!! Form::select('end_year', Helper::formYears(), !empty($experience->end_year) ? $experience->end_year : old('end_year')) !!}
                            </div>
                            <div class="jobColumn jobColumnYear">
                                {!! Form::select('end_month', Helper::formMonths(), !empty($experience->end_month) ? $experience->end_month : old('end_month')) !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="inputRow inputTable">
                {!! Form::textarea('description', !empty($experience->description) ? $experience->description : old('description'), ['placeholder' => 'Description']) !!}
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
                    <a href="{{ route('summary.edit', $user->id) }}" class="button greyButton">Previous</a>
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