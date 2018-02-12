<div class="modal fade compose-modal in" id="compose-modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <h3 class="modal-title">
                    New: Message
                </h3>
            </div>
            <div class="message-header">
                <div class="row">
                    <div class="col-xs-6">
                        <div class="message-row">
                            <span class="text-bold">From</span>
                            <span class="value">{{ $user->first_name . ' ' . $user->last_name }}</span>
                        </div>
                        <div class="message-row">
                            <span class="text-bold">Experience</span>
                            <span class="value">{{ 'N/A' }}</span>
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
            <div class="modal-body">
                <textarea class="redactor-input" placeholder="Compose your message here..."></textarea>
            </div>
            <div class="modal-footer text-right">
                <button modal-id="compose-modal" type="submit" class="btn btn-yellow btn-close">Send</button>
            </div>
        </div>
    </div>
</div>