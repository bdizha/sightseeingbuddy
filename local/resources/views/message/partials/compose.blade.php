<div class="modal fade compose-modal in" id="compose-modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <h3 class="modal-title">
                    New: Message
                </h3>
            </div>
            @include("message.partials.form", ["experience" => $experience, "message" => $message])
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        $(".compose-modal").modal("show");
    });
</script>