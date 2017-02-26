<script type="text/javascript">

    $(document).ready(function () {
        
        $(".btn-add").click(function () {
            var field = $(this).attr("field");
            var fieldElm = $("[name=" + field + "]");
            var value = fieldElm.val();
            
            if(value === ""){
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
                    "<input type=\"hidden\" value=\"" + value + "\" name=\"" + field + "[]\" />" +
                    "<i class=\"fa fa-close line-close\" data-id=\"" + field + "-" + count + "\"></i>" +
                    "</div>";

            fieldItems.append(html);
        });

        $(".line-close").click(function () {
            var dataId = $(this).attr("data-id");
            $("#" + dataId).remove();
            return false;
        });
    });

</script>