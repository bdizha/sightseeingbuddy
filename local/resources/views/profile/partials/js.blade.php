<script>
    $(document).ready(function () {

        if ($("#is_current").prop("checked")) {
            $("#ended-at").hide();
        } else {
            $("#ended-at").show();
        }

        $(".jobCheckbox").click(function () {
            if ($("#is_current").prop("checked")) {
                $("#ended-at").hide();
            } else {
                $("#ended-at").show();
            }
        });

        $(".jobAddMore").click(function () {
            $("#is_more").val(1);
        });
    });
</script>