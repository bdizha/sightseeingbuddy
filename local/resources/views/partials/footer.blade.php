<input type="hidden" id="url" value="@if(!empty($url)){{ $url }}@else{{ "/local/search" }}@endif"/>
<footer id="footer">
    <div class="container">
        <div class="row site-footer">
            <div class="col-md-4">
                <h2>Connect with us</h2>
                <div class="socials-block">
                    <a class="share-btn external-link" target="_blank"
                       href="https://www.facebook.com/Sightseeing-Buddy-629528153904966/"><i class="fa fa-facebook"></i></a>
                    <a class="share-btn external-link" target="_blank" href="https://twitter.com/SightBud"><i
                                class="fa fa-twitter"></i></a>
                    <a class="share-btn external-link" target="_blank"
                       href="https://www.instagram.com/sightseeingbuddy/"><i class="fa fa-instagram"></i></a>
                    <a class="share-btn" target="_blank" href=""><i class="fa fa-youtube"></i></a>
                </div>
                <h2>Sign up to our newsletter</h2>
                <div id="newsletter-group" class="form-group">
                    <label class="control-label hide" id="errorEmail" for="newsletter_email">Invalid email.</label>
                    <div class="newsletter-alert hide">
                        You've successfully subscribed to our newsletter!
                    </div>
                    <input class="text form-control fullwidth" type="text" id="newsletter_email"
                           name="newsletter_email" value="" required autocomplete="off"
                           placeholder="Please enter your email address...">
                </div>
                <div class="payfast-logo">
                    <img src="/images/payfast.svg" alt="">
                </div>
            </div>
            <div class="col-md-8">
                <div class="row">
                    <div class="col-xs-6">
                        <h2>Information</h2>
                        <ul class="nav nav-stacked nav-pills">
                            <li class=" item item-level-1">
                                <a href="/pages/about-sightseeing-buddy">
                                    About Sightseeing Buddy
                                </a>
                            </li>
                            <li class=" item item-level-1">
                                <a href="/pages/how-it-works">
                                    How it works
                                </a>
                            </li>
                            <li class=" item item-level-1">
                                <a href="/pages/becoming-a-buddy">
                                    Become a buddy
                                </a>
                            </li>
                            <li class=" item item-level-1 active">
                                <a href="/pages/finding-a-buddy">
                                    Find a buddy
                                </a>
                            </li>
                            <li class=" item item-level-1">
                                <a href="/pages/booking-advice">
                                    Booking advice
                                </a>
                            </li>
                            <li class=" item item-level-1">
                                <a href="/blog">
                                    Blog
                                </a>
                            </li>
                            <li class=" item item-level-1">
                                <a href="/pages/faq">
                                    FAQ
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-xs-6">
                        <h2>Other</h2>
                        <ul class="nav nav-stacked nav-pills">
                            <li class=" item item-level-1">
                                <a href="/pages/privacy-policy">
                                    Privacy policy
                                </a>
                            </li>
                            <li class=" item item-level-1">
                                <a href="/pages/terms-conditions">
                                    Terms &amp; conditions
                                </a>
                            </li>
                            <li class=" item item-level-1">
                                <a href="/pages/payments-pricing">
                                    Payments &amp; pricing
                                </a>
                            </li>
                            <li class=" item item-level-1">
                                <a href="/pages/cancellation-refunds">
                                    Cancellation &amp; refunds
                                </a>
                            </li>
                            <li class=" item item-level-1">
                                <a href="/pages/security">
                                    Security
                                </a>
                            </li>
                            <li class=" item item-level-1">
                                <a href="/pages/reviews-ratings">
                                    Reviews &amp; ratings
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <a class="scroll-to-top hvr-wobble-vertical" href="#">
            &nbsp;
        </a>
    </div>
</footer>
<footer id="bottom">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 mb-1 mt-1">
                &copy; {{ date("Y") }} Sightseeing Buddy
                <span class="pull-right">
                Powered by
                <a class="text-white" href="http://www.interseed.co.za" target="_blank">Interseed</a>
            </span>
            </div>
        </div>
    </div>
</footer>
<script type="text/javascript" src="/cpresources/lib/redactor/redactor.js?d=1491941552"></script>
<script type="text/javascript">
    /*<![CDATA[*/
    $(document).ready(function () {
//       $('.redactor-input').redactor();
        $('.redactor-editor').on('keypress', function () {
            (new Vertilize).init();
        });
    });
    /*]]>*/
</script>