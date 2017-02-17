<div class="pub-profile-shots pub-shadow pub-radius">
    <ul class="pub-profile-shots-grid">
        <div class="pub-profile-grid-sizer"></div>
        @foreach ($shots as $k => $shot)
        <li class="pub-profile-shot">
            <div class="pub-table">
                <a href="#" class="pub-vex-link" data-href="/shot/{{ $shot->id }}">
                    @include('shot.partials.image', ['shot' => $shot]) 
                </a>
            </div>
        </li>
        @endforeach
    </ul>
    <div class="pub-clear"></div>
</div>