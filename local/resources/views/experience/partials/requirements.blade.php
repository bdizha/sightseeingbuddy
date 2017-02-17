<div class="pub-table pub-shot-owner">
    <div class="pub-column pub-shot-column-left">
        <div class="pub-shot-owner-photo">
            <a class="pub-link" href="/{{ $shot->user->username }}">
                <img alt="{{ $shot->caption }}" class="pub-media" src="/{{ Helper::imagePathFor($shot->user->media) }}" title="{{ $shot->caption }}"/>
            </a>
        </div>
    </div>
    <div class="pub-column pub-shot-column-middle">
        <div class="pub-shot-owner-name"><a class="pub-link" href="/{{ $shot->user->username }}">{{ "@" . $shot->user->username }}</a></div>
    </div>
    <div class="pub-column pub-shot-column-right">
        <div class="pub-shot-timestamp">{{ Helper::dateFormatFor($shot->created_at) }}</div>
    </div>
</div>