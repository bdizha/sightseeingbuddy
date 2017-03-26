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
                <li class="item">
                    <a href="/local/profile/{{ $user->username }}">
                        <img src="/images/person-66.png"/>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="gray-bottom-border mb-1"></div>
    <div class='row mb-1'>
        <div class="col-sm-6 col-xs-12">
            @include('profile.partials.stats', ['title' => $experience->teaser])
        </div>
        <div class="col-sm-6 col-xs-12">
            <div class='row'>
                <div class="col-sm-12 col-xs-12">
                    @if(Auth::guest() OR $experience->user->id != Auth::user()->id)
                        <a href="/local/experience/{{ $experience->id }}/schedule"
                           class="btn btn-lg btn-yellow fullwidth mb-1">Book experience</a>
                    @else
                        <a href="/local/info/{{ $experience->id }}/edit"
                           class="btn btn-lg btn-yellow fullwidth mb-1">Edit experience</a>
                    @endif
                </div>
                <div class="col-sm-6 col-xs-6">
                    <a href="/local/experience/{{ $experience->id }}/schedule" class="btn btn-primary fullwidth">Information</a>
                </div>
                <div class="col-sm-6 col-xs-6">
                    <a href="#experiences" class="btn btn-primary fullwidth pull-right">My Experiences</a>
                </div>
            </div>
        </div>
    </div>
</div>