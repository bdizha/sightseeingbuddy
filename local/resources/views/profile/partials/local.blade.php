@include('profile.partials.tabs', ['tab' => '', 'title' => ''])
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
                       class="btn btn-default fullwidth">Verify profile
                    </a>
                </div>
                <div class="col-sm-6 col-xs-6">
                    <a href="{{ url('/local/profile/' . $user->username . "?verify=false") }}"
                       class="btn btn-default fullwidth">Decline profile
                    </a>
                </div>
            </div>
        @else
            <div class='row mt-1'>
                <div class="col-sm-12 col-xs-12">
                    @if(Auth::guest() OR $user->id != Auth::user()->id)
                        <a href="{{ route('search') }}"
                           class="btn btn-lg btn-default fullwidth mb-1">find a buddy</a>
                    @else
                        <a href="{{ route('info.create') }}" class="btn btn-lg btn-default fullwidth mb-1">
                            Create new experience
                        </a>
                    @endif
                </div>
                <div class="col-sm-6 col-xs-6">
                    @if(Auth::guest() OR $user->id != Auth::user()->id)
                        <a href="#experiences"
                           class="btn btn-default fullwidth">Experiences</a>
                    @else
                        <a href="{{ route('introduction.edit', ["id" => Auth::user()->id]) }}"
                           class="btn btn-default fullwidth">Edit Profile</a>
                    @endif
                </div>
                <div class="col-sm-6 col-xs-6">
                    @if(Auth::guest() OR $user->id != Auth::user()->id)
                        <a href="" onclick="window.history.go(-1); return false;" class="btn btn-default fullwidth pull-right">Back</a>
                    @else
                        <a href="{{ url('/local/profile/' . $user->username) }}#experiences" class="btn btn-default fullwidth pull-right">My Experiences</a>
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