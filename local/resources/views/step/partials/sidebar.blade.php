<aside id="sidebar" class="col-sm-3 local-left same-height hidden-sm hidden-xs" data-mh="step">
    <ul class="nav nav-stacked nav-pills">
        <?php $counter = 0 ?>
        @foreach($links as $key => $link)
            <?php $counter++ ?>
            <li class="item item-level-1 @if ($key == $active)active @endif">
                <a href="{{ $key !== $active && !empty($disable) ? "javascript:void();" : $link['route'] }}">
                    <h2>{{ 'Step ' . ($counter) }}</h2>
                    <span>{{ $link['label'] }}</span>
                </a>
            </li>
        @endforeach
    </ul>
</aside>