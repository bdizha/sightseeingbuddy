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
            @include("message.partials.form", ["experience" => $experience])
        </div>
    </div>
</div>