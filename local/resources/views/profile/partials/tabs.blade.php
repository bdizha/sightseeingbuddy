<div class='row'>
    <div class="col-sm-12 col-xs-12">
        @if(!empty($title))
            <div class="text-left">
                {{ $title }}
            </div>
        @endif
        <ul class="profile-nav pull-right">
            <li class="item<?php echo $tab === 'messages' ? ' active' : '' ?>">
                <a href="{{ "/local/messages" }}">
                    <i class="messages"></i>
                    <span>Messages</span>
                </a>
            </li>
            <li class="item<?php echo $tab === 'manage' ? ' active' : '' ?>">
                <a href="{{ "/local/booking/manage" }}">
                    <i class="find"></i>
                    <span>Find my booking</span>
                </a>
            </li>
            <li class="item<?php echo $tab === 'dashboard' ? ' active' : "" ?>">
                <a href="{{ "/local/dashboard" }}">
                    <i class="dashboard"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="item<?php echo $tab === 'bookings' ? " active" : "" ?>">
                <a href="{{ "/local/bookings" }}">
                    <i class="bookings"></i>
                    <span>Manage Booking</span>
                </a>
            </li>
        </ul>
    </div>
</div>