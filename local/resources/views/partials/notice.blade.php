@if(Session::has('flash_message'))
    <div class="modal fade in" id="notifications-modal">
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
                <div class="modal-body">
                    {{ Session::get('flash_message') }}
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function () {
            console.log("testing >>>> before");
            $("#notifications-modal").modal("show");
            console.log("testing >>>> after");
        });
    </script>
@else
    <input type="hidden" id="notifications-wrapper"/>
    <input type="hidden" id="notifications"/>
@endif