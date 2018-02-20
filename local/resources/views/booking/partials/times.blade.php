<?php $key = 0 ?>
@foreach($experience->times as $time)
    <div class='row schedule-item {{ fmod($key, 2) ? 'even' : 'odd' }}'>
        <div class="col-sm-2 col-xs-2">
            <label>
                {{ $time }}
            </label>
        </div>
        <div class="col-sm-3 col-xs-3">
            {{ in_array($time, $bookedTimes) ? 'No' : 'Yes' }}
        </div>
        <div class="col-sm-7 col-xs-7">
            @if(!in_array($time, $bookedTimes))
                <a href="/local/booking/create/{{ $experience->id }}/{{ $time }}{{ empty($timestamp) ? "" : "/" . $timestamp }}"
                   class="btn btn-default pull-right book-now">Book now</a>
            @endif
        </div>
    </div>
    <?php $key++ ?>
@endforeach