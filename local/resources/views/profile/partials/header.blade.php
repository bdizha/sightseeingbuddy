<div class="container profile white-font">
    <div class='row'>
        <div class="col-sm-12">
            <div class='row mt-1 text-center'>
                @if(!empty($user->id))
                    <h1 class="text-center">HELLO {{ $user->first_name }}</h1>
                @endif
                <h2>{{ $title }}</h2>
            </div>
        </div>
    </div>
</div>