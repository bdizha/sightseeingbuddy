<div class="container profile">
    <div class='row'>
        <div class="col-sm-12 col-xs-12">
            <ul class="profile-nav pull-right">
                <li class="item active">
                    <a href="{{ "/local/dashboard" }}">
                        <i class="dashboard"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="item">
                    <a href="{{ "/local/bookings" }}">
                        <i class="bookings"></i>
                        <span>Bookings</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="gray-bottom-border mb-1"></div>
    <div class='row mb-1'>
        <div class="col-sm-7 col-xs-12">
            @include('profile.partials.stats', ['title' => $experience->teaser])
        </div>
        <div class="col-sm-5 col-xs-12">
            <div class='row'>
                <div class="col-sm-12 col-xs-12" id="booking-btn-container">
                    @if(Auth::guest() OR $experience->user->id != Auth::user()->id)
                        @if($type == 'schedule')
                            <a id="book-experience-btn" href="/local/messages?experience_id={{ $experience->id }}"
                               class="btn btn-lg btn-default fullwidth mb-1">Contact Buddy</a>
                        @else
                            <a id="book-experience-btn" href="/local/experience/{{ $experience->id }}/schedule"
                               class="btn btn-lg btn-default fullwidth mb-1">Book experience</a>
                        @endif
                    @else
                        <a href="/local/info/{{ $experience->id }}/edit"
                           class="btn btn-lg btn-default fullwidth mb-1">Edit experience</a>
                    @endif
                </div>
                <div class="col-sm-6 col-xs-12">
                    @if(Auth::guest() OR $experience->user->id != Auth::user()->id)
                        <a href="/local/profile/{{ $experience->user->username }}"
                           class="btn btn-default fullwidth">Hosts experiences</a>
                    @else
                        <a href="/local/experience/{{ $experience->slug }}#experiences"
                           class="btn btn-default fullwidth">Information</a>
                    @endif
                </div>
                <div class="col-sm-6 col-xs-12">
                    @if(Auth::guest() OR $experience->user->id != Auth::user()->id)
                        <a href="" onclick="window.history.go(-1); return false;"
                           class="btn btn-default fullwidth mt-xs-1">Back</a>
                    @else
                        <a href="{{ url('/local/profile/' . $user->username) }}#experiences"
                           class="btn btn-default fullwidth pull-right mt-xs-1">My Experiences</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>