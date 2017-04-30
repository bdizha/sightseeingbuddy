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
<div class='row'>
    <div class="col-sm-7 col-xs-12">
        @include('profile.partials.stats', ['title' => $title])
    </div>
    <div class="col-sm-5 col-xs-12">
        @if(!empty($_GET['verify']) && $_GET['verify'] == "yes")
            <div class='row mt-1'>
                <div class="col-sm-6 col-xs-6">
                    <a href="{{ url('/local/profile/' . $user->username . "?verify=true") }}"
                       class="btn btn-yellow fullwidth">Verify profile
                    </a>
                </div>
                <div class="col-sm-6 col-xs-6">
                    <a href="{{ url('/local/profile/' . $user->username . "?verify=false") }}"
                       class="btn btn-primary fullwidth">Decline profile
                    </a>
                </div>
            </div>
        @else
            <div class='row mt-1'>
                <div class="col-sm-12 col-xs-12">
                    @if(Auth::guest() OR $user->id != Auth::user()->id)
                        <button class="btn btn-lg btn-yellow fullwidth mb-1">
                            Contact Host
                        </button>
                    @else
                        <a href="{{ route('info.create') }}" class="btn btn-lg btn-yellow fullwidth mb-1">
                            Create new experience
                        </a>
                    @endif
                </div>
                <div class="col-sm-6 col-xs-6">
                    @if(Auth::guest() OR $user->id != Auth::user()->id)
                        <a href="{{ route('search') }}"
                           class="btn btn-primary fullwidth">Find a local</a>
                    @else
                        <a href="{{ route('introduction.edit', ["id" => Auth::user()->id]) }}"
                           class="btn btn-primary fullwidth">Edit Profile</a>
                    @endif
                </div>
                <div class="col-sm-6 col-xs-6">
                    @if(Auth::guest() OR $user->id != Auth::user()->id)
                        <a href="" onclick="window.history.go(-1); return false;" class="btn btn-primary pull-right fullwidth">Back</a>
                    @else
                        <a href="{{ url('/local/profile/' . $user->username) }}#experiences" class="btn btn-primary pull-right fullwidth">My Experiences</a>
                    @endif
                </div>
            </div>
        @endif
        @if(!Auth::guest() and $user->id == Auth::user()->id)
            <div class="row">
                <div class="col-sm-12 col-xs-12 mt-1 text-bold">
                    Amount made thus far: R{{ $user->total_revenue }}
                </div>
            </div>
        @endif
    </div>
</div>

<div class="gray-bottom-border mt-1 mb-1"></div>