<?php $key = 0 ?>
@foreach($experience->times as $time)
    <div class='row schedule-item text-center {{ fmod($key, 2) ? 'even' : 'odd' }} schedule-item-{{ $key }}'>
        <div class="col-sm-2 col-xs-2 text-left">
            <label>
                {{ $time }}
            </label>
        </div>
        <div class="col-sm-2 col-xs-2">
            {{ in_array($time, $bookedTimes) ? 'No' : 'Yes' }}
        </div>
        <div class="col-sm-4 col-xs-4">
            <div class="schedule-guest">
                <div class="guest-amount">1</div>
                <div class="arrow-top guest-arrow" data-id="{{ $key }}" data-dir="1"></div>
                <div class="arrow-bottom guest-arrow" data-id="{{ $key }}" data-dir="-1"></div>
            </div>
        </div>
        <div class="col-sm-4 col-xs-4">
            @if(!in_array($time, $bookedTimes))
                <a data-href="/local/booking/create/{{ $experience->id }}/{{ $time }}{{ empty($timestamp) ? "" : "/" . $timestamp }}" href="/local/booking/create/{{ $experience->id }}/{{ $time }}{{ empty($timestamp) ? "" : "/" . $timestamp }}/1"
                   class="btn btn-default pull-right book-now">Book now</a>
            @endif
        </div>
    </div>
    <?php $key++ ?>
@endforeach