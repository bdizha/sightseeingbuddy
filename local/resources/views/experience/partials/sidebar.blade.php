<aside id="sidebar" class="col-sm-3 local-left same-height" data-mh="edit">
    <ul class="nav nav-stacked nav-pills">
        <?php $counter = 0 ?>
        @foreach($links as $key => $link)
        <?php $counter++ ?>
        <li class="item item-level-1 @if ($key == $active)active @endif">
            <a href="{{ $link['route'] }}">
                <h2>{{ 'Step ' . ($counter) }}</h2>
                <span>{{ $link['label'] }}</span>
            </a>
        </li>
        @endforeach
    </ul>
</aside>