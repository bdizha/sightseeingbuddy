$("#fields-video").blur(function() {
    console.log('out');
    $('.embed-responsive').html($(this).val());
});
