<div class="table">
    <div class="profile-picture">
        <img src="{{ Helper::personImage(empty($user->introduction) ? "" : $user->introduction->image) }}" />
    </div>
</div>