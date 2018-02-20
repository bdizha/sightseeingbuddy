<div class="modal fade confirm-modal in" id="cancel-modal-{{ $booking->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <h3 class="modal-title">
                    CANCELLING BOOKING
                </h3>
            </div>
            <div class="modal-body text-center">
                Are you sure you want to cancel this booking?
            </div>
            <div class="text-center mb-1">
                <a class="btn btn-default btn-danger" href="/local/booking/cancel?reference={{ $booking->reference }}">
                    Yes, cancel
                </a>
                <button modal-id="cancel-modal-{{ $booking->id }}" type="button" class="btn btn-default btn-close">No, nevermind</button>
            </div>
        </div>
    </div>
</div>