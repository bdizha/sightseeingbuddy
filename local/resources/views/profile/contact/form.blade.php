{!! csrf_field() !!}
@include('partials.newsletter')
<div class="jobWhite">
    <div class="inputRow inputTable{{ $errors->has('city') ? ' hasError' : '' }}">
        {!! Form::label('city', 'City', ['class' => 'inputLabel']) !!}
        {!! Form::text('city', $user->city_id ? $user->city->name : old('city'), ['id' => 'city', 'placeholder' => 'Ex. Cape Town']) !!}
    </div>
    <div class="inputRow inputTable{{ $errors->has('post_code') ? ' hasError' : '' }}">
        {!! Form::label('province_id', 'Province', ['class' => 'inputLabel']) !!}
        {!! Form::select('province_id', $provinces, $user->province_id, ['id' => 'province_id']) !!}
    </div>
    <div class="inputRow inputTable{{ $errors->has('post_code') ? ' hasError' : '' }}">
        {!! Form::label('post_code', 'Post Code', ['class' => 'inputLabel']) !!}
        {!! Form::text('post_code', old('post_code') ? old('post_code') : $user->post_code, ['id' => 'post_code', 'placeholder' => 'Ex. XXXX']) !!}
    </div>
    <div class="inputRow inputTable">
        <input type="submit" class="button greenButton" value="Next" />
    </div>
</div>