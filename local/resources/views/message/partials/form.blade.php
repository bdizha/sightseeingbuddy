<div class="message-header">
    <div class="row">
        <div class="col-xs-6">
            <div class="message-row">
                <span class="text-bold">From</span>
                <span class="value">{{ $user->first_name . ' ' . $user->last_name }}</span>
            </div>
            <div class="message-row">
                <span class="text-bold">Experience</span>
                <span class="value">{{ str_limit($experience->teaser, 100) }}</span>
            </div>
        </div>
        <div class="col-xs-6">
            <div class="message-row">
                <span class="text-bold">Date</span>
                <span class="value">{{ \Carbon\Carbon::now()->format("d/m/Y") }}</span>
            </div>
            <div class="message-row">
                <span class="text-bold">Time</span>
                <span class="value">{{ \Carbon\Carbon::now()->format("H\hi") }}</span>
            </div>
        </div>
    </div>
</div>
{!! Form::open(['route' => 'messages.store']) !!}
<div class="modal-body">
    {{ Form::hidden('experience_id', $experience->id) }}
    {{ Form::hidden('recipient_id', $experience->user->id) }}
    {{ Form::hidden('message_id', $message->id) }}
    <div class="row form-group {{ $errors->has('content') ? 'has-error' : '' }}">
        <div class="col-xs-12">
            @if ($errors->has('content'))
                <label class="control-label"
                       for="experience">{{ $errors->first('content') }}</label>
            @endif
            <div class="input-group">
                            <textarea name="content" class="form-control"
                                      placeholder="Compose your message here...">{{ old('content') }}</textarea>
            </div>
        </div>
    </div>
</div>
<div class="modal-footer text-center">
    <button modal-id="compose-modal" type="submit" class="btn btn-default">Send</button>
</div>
{!! Form::close() !!}