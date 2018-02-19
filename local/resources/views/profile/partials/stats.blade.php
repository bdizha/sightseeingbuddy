<?php if (!$user): ?>
    <?php $user = new \App\User(); ?>
<?php endif ?>

<div class="row">
    <div class="profile-picture img-1 col-sm-4 col-xs-12">
        @if(!empty($user->image))
            {!! $user->image !!}
        @else
            <img src="{{ Helper::personImage($user->image, 'gray') }}"/>
        @endif
    </div>
    <?php $ratings = ['Excellent', 'Very good', 'Average', 'Poor', 'Terrible'] ?>
    <div class="profile-info col-sm-8 col-xs-12">
        <h1>{{ str_limit($title) }}</h1>
        <h2>{{ $user->first_name . " " . $user->last_name }}</h2>
        <div class='row'>
            <div class="col-sm-6">
                <span class="profile-label">
                    Average rating:
                </span>
            </div>
            <div class="col-sm-6">
                <div class="rating-box">
                    @foreach($ratings as $key => $rating)
                        <div class="rating star<?php echo ($key + 1 <= ceil($user->average_rating)) ? ' star-filled' : '' ?>"></div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class='row'>
            <div class="col-sm-6">
                <span class="profile-label">
                    Experiences offered:
                </span>
            </div>
            <div class="col-sm-6">
                <span class="profile-value">{{ $user->experiences_count }}</span>
            </div>
        </div>
        <div class='row'>
            <div class="col-sm-6">
                <span class="profile-label">
                    Successful experiences:
                </span>
            </div>
            <div class="col-sm-6">
                <span class="profile-value">{{ $user->bookings_count }}</span>
            </div>
        </div>
        <div class='row'>
            <div class="col-sm-6">
                <span class="profile-label">
                    Profile verified:
                </span>
            </div>
            <div class="col-sm-6">
                <i class="profile-{{ $user->is_verified ? "verified" : "declined" }}"></i>
            </div>
        </div>
    </div>
</div>