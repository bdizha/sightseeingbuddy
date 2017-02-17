<div class="pub-shot-comment" id="pub-shot-comment-{{ $comment->id }}">
    <div class="pub-shot-comment-owner">
        <a class="pub-link" href="/{{ $comment->user->username }}">{{ "@" . $comment->user->username }}</a>
    </div>
    <div class="pub-shot-comment-content">{{ $comment->content }}</div>
</div>