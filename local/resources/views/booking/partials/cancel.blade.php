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
                <button class="btn btn-danger btn-reason" data-id="{{ $booking->id }}">
                    Yes, cancel
                </button>
                <button modal-id="cancel-modal-{{ $booking->id }}" type="button" class="btn btn-default btn-close">No,
                    nevermind
                </button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade confirm-modal in" id="reason-modal-{{ $booking->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <h3 class="modal-title">
                    Please provide reason for your cancellation
                </h3>
            </div>
            <div class="modal-body">
                <div class="modal-body">
                    <input type="hidden" id="reference-{{ $booking->id }}" value="{{ $booking->reference }}">
                    <div class="row form-group {{ Request::has('error') && Request::get('booking_id') == $booking->id ? 'has-error' : '' }}">
                        <div class="col-xs-12">
                            @if(Request::has('error') && Request::get('booking_id') == $booking->id)
                                <label class="control-label" id="reason-error-{{ $booking->id }}"
                                       for="reason-{{ $booking->id }}">Please enter your reason</label>
                            @endif
                            <textarea name="reason-{{ $booking->id }}" id="reason-{{ $booking->id }}"
                                      class="form-control"
                                      placeholder="Enter your reason here...">{{ old('reason') }}</textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer text-center">
                    <button data-id="{{ $booking->id }}" type="button" class="btn btn-default btn-cancel">Submit
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>