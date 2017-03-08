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
                    <div class='row schedule-item'>
                        <div class="col-sm-2 col-xs-2">
                            <label>Time</label>
                        </div>
                        <div class="col-sm-2 col-xs-2">
                            <label>Available</label>
                        </div>
                        <div class="col-sm-8 col-xs-8">
                        </div>
                    </div>
                    <?php $key = 0 ?>
                    @foreach($experience->times as $time)
                    <div class='row schedule-item {{ fmod($key, 2) ? 'even' : 'odd' }}'>
                        <div class="col-sm-2 col-xs-2">
                            <label>
                                {{ $time }}
                            </label>
                        </div>
                        <div class="col-sm-3 col-xs-3">
                            {{ fmod($key, 2) ? 'Yes' : 'No' }}
                        </div>
                        <div class="col-sm-7 col-xs-7">
                            <a href="/local/booking/create/{{ $experience->id }}/{{ $time }}" class="btn btn-yellow pull-right book-now">Book now</a>
                        </div>
                    </div>
                    <?php $key++ ?>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>