var verifyCallback = function() {
  $('.js-ga-validate').attr('data-ga-validate','true');
  $('.js-ga-error').addClass('hidden');
};
var initCaptcha = function(){
  $('.g-recaptcha').each(function(index, el) {
    grecaptcha.render(el, {
      sitekey: $(this).data('sitekey'),
      callback: verifyCallback
    });
  });
};
$('[data-parsley-validate]').submit(function(e){
  if ($(this).find('.js-ga-validate').attr('data-ga-validate') == 'true') {
    $(this).find('.js-ga-error').addClass('hidden');
  } else {
    $(this).find('.js-ga-error').removeClass('hidden');
    e.preventDefault();
  }
});
