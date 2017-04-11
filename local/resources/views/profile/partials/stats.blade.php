<?php if(!$user->introduction): ?>
    <?php $user->introduction = new \App\Introduction(); ?>
<?php endif ?>

<div class="row">
    <div class="profile-picture img-1 col-sm-4 col-xs-12">
        <img src="{{ Helper::personImage($user->introduction->image) }}" />
    </div>
    <div class="profile-info col-sm-8 col-xs-12">
        <h1>{{ str_limit($title) }}</h1>
        <h2>{{ $user->first_name . " " . $user->last_name }}</h2>
        <div class='row'>
            <div class="col-sm-8 col-xs-8">
                <span class="profile-label">
                    Average rating:
                </span>
            </div>
            <div class="col-sm-4 col-xs-4">
                <span class="profile-value"></span>
            </div>
        </div>
        <div class='row'>
            <div class="col-sm-8 col-xs-8">
                <span class="profile-label">
                    Experiences offered:
                </span>
            </div>
            <div class="col-sm-4 col-xs-4">
                <span class="profile-value">{{ $user->experiences_count }}</span>
            </div>
        </div>
        <div class='row'>
            <div class="col-sm-8 col-xs-8">
                <span class="profile-label">
                    Successful experiences:
                </span>
            </div>
            <div class="col-sm-4 col-xs-4">
                <span class="profile-value">{{ $user->bookings_count }}</span>
            </div>
        </div>
        <div class='row'>
            <div class="col-sm-8 col-xs-8">
                <span class="profile-label">
                    Profile verified:
                </span>
            </div>
            <div class="col-sm-4 col-xs-4">
                <i class="profile-{{ $user->is_verified ? "verified" : "declined" }}"></i>
            </div>
        </div>
    </div>
</div>