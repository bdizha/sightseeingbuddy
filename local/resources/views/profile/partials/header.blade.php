<div class="container profile">
	<div class='row'>
        <div class="col-sm-3 col-xs-12 profile-picture img-1">
            @include('booking.partials.user', ['user' => $user])
        </div>
        <div class="col-sm-9 col-xs-12">
            <div class='row mt-1'>
    		@if(!empty($user->id))
               	  <h1>HELLO {{ $user->first_name }}</h1>
	        @endif
                <h2>{{ $title }}</h2>
            </div>
        </div>
    </div>
</div>