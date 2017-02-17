<div class="pub-shot pub-radius pub-shadow" id="pub-shot-{{ $shot->id }}">
    <div class="pub-shot-head">
        @include('shot.partials.user', ['shot' => $shot])   
    </div>
    <div class="pub-shot-body">
        <div class="pub-shot-media">
            @include('shot.partials.image', ['shot' => $shot])   
        </div>   
        <div class="pub-shot-caption pub-padding">
            {{ $shot->caption }}
        </div>  
        <div class="pub-shot-acts pub-table">
            <div class="pub-shot-act{{ !Auth::guest() ? $shot->hasFlamed(Auth::user()->id) ? ' pub-active' : '' : '' }}">
                <span class="pub-shot-icon pub-icon-love" data-shot-id="{{ $shot->id }}"></span>
                <span class="pub-shot-act-count">{{ $shot->flames->count() }} flames</span>
            </div>
            <div class="pub-shot-act{{ !Auth::guest() ? $shot->hasCommented(Auth::user()->id) ? ' pub-active' : '' : '' }}">
                <span class="pub-shot-icon pub-icon-reply" data-shot-id="{{ $shot->id }}"></span>
                <span class="pub-shot-act-count">{{ $shot->comments->count() }} comments</span>
            </div>
            <div class="pub-shot-act pub-active pub-shot-acts-right">
                <span class="pub-shot-icon pub-icon-menu"></span>
                <span class="pub-shot-act-count">&nbsp;</span>
            </div>
        </div>              
    </div>
    <div class="pub-shot-foot">  
        <div class="pub-shot-comments">
            <div class="pub-list">
                @include('shot.partials.comments', ['shot' => $shot])   
            </div>
            <div class="pub-shot-comment-form">
                <div class="pub-shot-comment-input">
                    <input class="pub-input pub-radius" data-shot-id="{{ $shot->id }}" submit="true" placeholder="Leave a Comment" name="comment" type="text" value="" id="comment">
                </div>
            </div>
        </div>
    </div>
</div>