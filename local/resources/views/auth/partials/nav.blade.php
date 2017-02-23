<ul class="nav navbar-right top-nav">
    @if (Auth::guest())
    <li><a class="text-uppercase" href="{{ route('login') }}">Login</a></li>
    <li><a class="text-uppercase text-bold" href="{{ route('register') }}">Sign Up</a></li>
    @else
    <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <i class="fa fa-user"></i>
            {{ Auth::user()->first_name }}
            <b class="caret"></b>
        </a>
        <ul class="dropdown-menu">
            <li>
                <a class="text-uppercase text-bold" href="/local/profile/{{ Auth::user()->username }}">
                   <i class="fa fa-fw fa-user"></i>
                    Profile
                </a>
            </li>
            <li>
                <a class="text-uppercase text-bold" href="{{ route("introduction.edit", ["id" => Auth::user()->id]) }}">
                    <i class="fa fa-fw fa-gear"></i> 
                    Settings
                </a>
            </li>
            <li class="divider"></li>
            <li>
                <a class="text-uppercase text-bold" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();">
                    <i class="fa fa-fw fa-power-off"></i> 
                    Log Out
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </li>
        </ul>
    </li>
    @endif
</ul>