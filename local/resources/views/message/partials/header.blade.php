<div class="message-header">
    <div class="row">
        <div class="col-xs-6">
            <div class="message-row">
                <span class="text-bold">From</span>
                <span class="value">{{ $message->sender->first_name . ' ' . $message->sender->last_name }}</span>
            </div>
            <div class="message-row">
                <span class="text-bold">Experience</span>
                <span class="value">{{ str_limit($message->experience->teaser, 100) }}</span>
            </div>
        </div>
        <div class="col-xs-6">
            <div class="message-row">
                <span class="text-bold">Date</span>
                <span class="value">{{ \Carbon\Carbon::parse($message->updated_at)->format("d/m/Y") }}</span>
            </div>
            <div class="message-row">
                <span class="text-bold">Time</span>
                <span class="value">{{ \Carbon\Carbon::parse($message->updated_at)->format("H\hi") }}</span>
            </div>
        </div>
    </div>
</div>