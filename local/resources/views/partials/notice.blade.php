@if(Session::has('flash_message'))
    <div id="notifications-wrapper">
        <div id="notifications" class="alert-success">
            <i class="fa fa-check" aria-hidden="true"></i>
            {{ Session::get('flash_message') }}
        </div>
    </div>
@else
    <input type="hidden" id="notifications-wrapper"/>
    <input type="hidden" id="notifications"/>
@endif