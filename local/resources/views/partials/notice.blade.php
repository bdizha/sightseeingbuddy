@if(Session::has('flash_message'))
<div class="modal fade notice-modal in" id="notice-modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <h3 class="modal-title">
                    Success
                </h3>
            </div>
            <div class="modal-body text-center">
                {{ Session::get('flash_message') }}
            </div>
        </div>
    </div>
</div>
@endif