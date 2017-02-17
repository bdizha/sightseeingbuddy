<div class="pub-fans pub-radius pub-shadow">
    @foreach ($fans as $fan)
    <div class="pub-table pub-fan">
        <div class="pub-column pub-fan-column-left">
            <div class="pub-fan-photo">
                <a class="pub-link" href="/{{ $fan->username }}">
                    <?php $media = $fan->media ?>
                    @if(!$media)
                    <?php $media = "f4b9ec30ad9f68f89b29639786cb62ef.png" ?>
                    @endif
                    <img alt="{{ $fan->name }}" class="pub-media" src="/{{ Helper::imagePathFor($media) }}" title="{{ $fan->name }}"/>
                </a>
            </div>
        </div>
        <div class="pub-column pub-fan-column-middle">
            <div class="pub-fan-name">
                <h3 class="pub-fan-name">{{ $fan->name }}</h3>
                <a class="pub-link" href="/{{ $fan->username }}">{{ "@" . $fan->username }}</a>
            </div>
        </div>
        <div class="pub-column pub-fan-column-right">
            <div class="pub-button pub-radius">Following</div>
        </div>
    </div>
    @endforeach
</div>