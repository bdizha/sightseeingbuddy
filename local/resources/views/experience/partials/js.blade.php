<script type="text/javascript">

    $(document).ready(function () {

        var btnAdd = function () {
            var field = $(this).attr("field");
            var plural = $(this).attr("plural");
            var fieldElm = $("[name=" + field + "]");
            var value = fieldElm.val();

            if (value === "") {
                return false;
            }

            // clear the field
            fieldElm.val("");

            var fieldItems = $("." + field + "-items");
            var count = fieldItems.length + 1;

            console.log("value: " + value);
            console.log("count: " + count);
            console.log(fieldItems.html());

            var html = "<div class=\"line-item\" id=\"" + field + "-" + count + "\">" +
                "<label>" + value + "</label>" +
                "<input type=\"hidden\" value=\"" + value + "\" name=\"" + plural + "[]\" />" +
                "<i class=\"fa fa-close line-close\" data-id=\"" + field + "-" + count + "\"></i>" +
                "</div>";

            fieldItems.append(html);

            $(".line-close").click(lineClose);
        };

        $(".btn-add").click(btnAdd);

        $(".btn-input").keypress(function (event) {
            if (event.which == 13) {
                event.preventDefault();

                var $this = $(this);
                $("#" + $this.attr("data-id") + " .btn-add").click();

                console.log($this.attr("data-id") + ">>>> data id");
                return false;
            }
        });

        var lineClose = function () {
            var dataId = $(this).attr("data-id");
            $("#" + dataId).remove();
            return false;
        };

        $(".line-close").click(lineClose);

    });

</script>