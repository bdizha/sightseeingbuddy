<div class="modal fade respond-modal in" id="respond-modal-{{ $message->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-text-bold="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <h3 class="modal-title">
                    Re: Message
                </h3>
            </div>
            @include('message.partials.header')
            <div class="modal-body">
                <textarea class="redactor-input" placeholder="Compose your message here..."></textarea>
            </div>
            <div class="modal-footer text-right">
                <button modal-id="respond-modal-{{ $message->id }}" type="submit" class="btn btn-yellow btn-close">Send</button>
            </div>
        </div>
    </div>
</div>