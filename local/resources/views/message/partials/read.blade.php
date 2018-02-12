<div class="modal fade read-modal in" id="read-modal-{{ $message->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <h3 class="modal-title">
                    Message
                </h3>
            </div>
            @include('message.partials.header')
            <div class="modal-body">
                {!! $message->content !!}
            </div>
            <div class="modal-footer text-right">
                <button modal-id="read-modal-{{ $message->id }}" type="button" class="btn btn-yellow btn-close">Reply</button>
            </div>
        </div>
    </div>
</div>