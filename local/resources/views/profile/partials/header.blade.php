<div class="container profile">
    <div class='row mt-1'>
        <div class="col-sm-3 col-xs-12">
            @include('booking.partials.user', ['user' => $user])
        </div>
        <div class="col-sm-9 col-xs-12">
            <div class='row mt-2'>
                <h1>HELLO {{ $user->first_name }}</h1>
                <h2>{{ $title }}</h2>
            </div>
        </div>
    </div>
</div>