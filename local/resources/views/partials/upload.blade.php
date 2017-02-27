<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="/jquery-file-upload/js/vendor/jquery.ui.widget.js"></script>
<!-- The Iframe Transport is required for browsers without support for XHR file uploads -->
<script src="/jquery-file-upload/js/jquery.iframe-transport.js"></script>
<!-- The basic File Upload plugin -->
<script src="/jquery-file-upload/js/jquery.fileupload.js"></script>

<script>
    $(function () {
        'use strict';
        // Change this to the location of your server-side upload handler:
        var url = '/local/upload/image';
        var imageBin = "";
        var imageType = "";

        var removeBin = function () {
            imageBin = $(this).parent().remove();
        };

        $('.fileupload').fileupload({
            url: url,
            dataType: 'json',
            done: function (e, data) {
                console.log(imageBin);

                $.each(data.result.files, function (index, file) {
                    $('.profile-picture img').attr('src', "/files/" + file.name);

                    var inputName = imageType === "single" ? "image" : "images[]";
                    var imageSet = "<div class=\"bin-item\">" +
                            "<img src=\"/files/" + file.name + "\" />" +
                            "<input type=\"hidden\" name=\"" + inputName + "\" value=\"/files/" + file.name + "\" />" +
                            "<i class=\"fa fa-close bin-close\"></i>" +
                            "</div>";

                    if (imageType === "single") {
                        imageBin.html(imageSet);
                    } else {
                        imageBin.append(imageSet);
                    }
                    $('.bin-close').click(removeBin);
                });
            },
            progressall: function (e, data) {
                var progress = parseInt(data.loaded / data.total * 100, 10);
                $('#progress .progress-bar').css(
                        'width',
                        progress + '%'
                        );
            }
        }).prop('disabled', !$.support.fileInput)
                .parent().addClass($.support.fileInput ? undefined : 'disabled');

        $('.fileupload').click(function () {
            imageBin = $("#" + $(this).attr("bin"));
            imageType = $(this).attr("image-type");
        });

        $('.bin-close').click(removeBin);
    });
</script>