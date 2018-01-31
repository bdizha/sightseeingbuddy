<div class='row'>
    <div class="col-sm-12 col-xs-12">
        @if(!empty($title))
            <div class="text-left">
                {{ $title }}
            </div>
        @endif
        <ul class="profile-nav pull-right">
            <li class="item">
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