<div class="container profile white-font">
    <div class='row'>
        <div class="col-sm-12">
            <div class='row mt-1 text-center'>
                <h1 class="text-center">HELLO {{ !empty($user->id) ? $user->first_name : "Guest" }}</h1>
                <h2>{{ $title }}</h2>
            </div>
        </div>
    </div>
</div>