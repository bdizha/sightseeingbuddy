<aside id="sidebar" class="col-sm-3 local-left same-height hidden-sm hidden-xs" data-mh="column">
    <ul class="nav nav-stacked nav-pills">
        @foreach($links as $key => $link)
        <li class="item item-level-1 @if ($key == $active)active @endif">
            <a href="{{ route($link['route']) }}">
                <h2>{{ $link['label'] }}</h2>
                <span>{{ $link['sub_label'] }}</span>
            </a>
        </li>
        @endforeach
    </ul>
</aside>