<div class="modal fade schedule-modal in" id="schedule-modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <h3 class="modal-title">
                    Time availability
                </h3>
            </div>
            <div class="modal-body">
                <div class="available-times">
                    <div class='row schedule-item text-center'>
                        <div class="col-sm-2 col-xs-2">
                            <label>Time</label>
                        </div>
                        <div class="col-sm-2 col-xs-2">
                            <label>Available</label>
                        </div>
                        <div class="col-sm-8 col-xs-8">
                        </div>
                    </div>
                    <div class="times-row">
                        @include('booking.partials.times', ['bookedTimes' => []])
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>