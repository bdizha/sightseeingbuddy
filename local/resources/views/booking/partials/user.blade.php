<div class="table">
    <div class="profile-picture">
        @if(!empty($user->image))
            {!! $user->image !!}
        @else
            <img src="{{ Helper::personImage($user->image) }}"/>
        @endif
    </div>
</div>