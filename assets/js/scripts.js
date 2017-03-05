/*jslint browser: true, nomen: true */
/*global $ */
'use strict';

function PageTimer() {
    var self = this;
    this.getLoadTime = function () {
        var now = new Date().getTime();
        // Get the performance object
        window.performance = window.performance || window.mozPerformance || window.msPerformance || window.webkitPerformance || {};
        var timing = performance.timing || {};

        var ms = now - timing.navigationStart;

        return Math.round(ms / 10) / 100;
    };

    this.logToConsole = function () {
        $(window).on('load', function () {
            console && console.info && console.info("Client loaded in " + self.getLoadTime() + 's');
        });
    };

    this.append = function (holder) {
        $(window).on('load', function () {
            holder.text(' | LT: ' + self.getLoadTime() + 's');
        });
    }
}


function StickyFooter($wrap, $footer) {
    var $window = $(window);
    this.updateWrapperCSS = function () {
        var footerHeight = $footer.outerHeight();

        $wrap.css({
            marginBottom: -1 * footerHeight,
            paddingBottom: footerHeight
        });
    };

    this.bindOnResize = function () {
        $window.on('resize', this.updateWrapperCSS);

        return this;
    };

    this.update = function () {
        this.updateWrapperCSS();

        return this;
    };
}


/*
 Ensure all external links load as new window/tabs:
 */

var App;

function ExternalLinkHandler() {
    var self = this;
    var hostname = document.location.hostname;

    this.matchInternalLink = [new RegExp("^https?:\/\/(.*?)" + hostname)];

    this.addTargetAttribute = function (context) {
        context.find('a').filter('[href^="http://"], [href^="https://"]').each(function () {
            var anchor = $(this);
            var href = anchor.attr('href');
            var isInternalLink = false;

            for (var i = 0; i < self.matchInternalLink.length; i++) {
                var regex = self.matchInternalLink[i];
                if (href.match(regex)) {
                    isInternalLink = true;
                }
            }

            if (!isInternalLink) {
                anchor.attr('target', '_blank').addClass('external-link');
            }
        });
    };

}

function UIBindings() {
    this.bindTooltips = function () {
        $('[data-toggle="tooltip"]').tooltip();
    };
    this.bindPopovers = function () {
        $('[data-toggle="popover"]').popover();
    };

    this.bindSlickCarousels = function () {
        $('[data-slick-carousel-default]').slick({
            dots: true,
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: false,
            fade: true
        });

        $('[data-slick-carousel-three]').slick({
            dots: true,
            infinite: true,
            slidesToShow: 3,
            slidesToScroll: 1,
            adaptiveHeight: false
        });

        $('[data-toggle="slick-nav"]').on('click', function (e) {
            e.preventDefault();
            var index = $(this).data('index');
            $('[data-slick-carousel-default]').slick('slickGoTo', index);
        });
    };

    this.bindSharing = function () {
        $("[data-share-default]").each(function () {
            var shareHandler = new ShareHandler($(this));
            shareHandler.appendFacebook();
            shareHandler.appendTwitter();
            shareHandler.appendGoogle();
            //shareHandler.appendLinkedIn();
            //shareHandler.appendPinterest();
        });
    };

    this.bindMagnificpopup = function () {
        $('.gallery-image').magnificPopup({
            type: 'image',
            callbacks:
                    {
                        markupParse: function (template, values, item)
                        {
                            values.description = item.el.data('description');
                        }
                    },
            gallery: {
                enabled: true
            },
            image:
                    {
                        headerFit: true,
                        captionFit: true,
                        preserveHeaderAndCaptionWidth: false,
                        markup:
                                '<div class="mfp-figure">' +
                                '<figure>' +
                                '<header class="mfp-header">' +
                                '<div class="mfp-top-bar">' +
                                '<div class="mfp-title"></div>' +
                                '<div class="mfp-close"></div>' +
                                '<div class="mfp-decoration"></div>' +
                                '</div>' +
                                '</header>' +
                                '<section class="mfp-content-container">' +
                                '<div class="mfp-img"></div>' +
                                '</section>' +
                                '<footer class="mfp-footer">' +
                                '<figcaption class="mfp-figcaption">' +
                                '<div class="mfp-bottom-bar-container">' +
                                '<div class="mfp-bottom-bar">' +
                                '<div class="mfp-counter"></div>' +
                                '<div class="mfp-description"></div>' +
                                '<div class="mfp-decoration"></div>' +
                                '</div>' +
                                '</div>' +
                                '</figcaption>' +
                                '</footer>' +
                                '</figure>' +
                                '</div>',
                    }
        });
    };

    this.bindMasonary = function () {
        $('img').load(function () {
            $(".grid").masonry();
        });
        $('.grid').masonry({
            itemSelector: '.grid-item',
            columnWidth: '.grid-sizer',
            gutter: 5
        });
    };

    this.bindSubmittingButtons = function () {
        $(document).on('submit', function () {
            var submitText = $(this).find('[data-submit-text]');
            var submittingText = $(this).find('[data-submitting-text]');
            var btn = submitText.closest('button');
            submittingText.removeClass('hide');
            submitText.hide();
            btn.prop('disabled', true);
        });
    };


}

function Notifications() {
    var wrapper = $('#notifications-wrapper');
    var div = $('#notifications');
    var wrapperTop = wrapper.offset().top;

    this.bindOnScroll = function () {
        wrapper.height(wrapper.height());
        $(window).on('scroll', function () {
            var scrollTop = $(window).scrollTop();
            if (scrollTop > wrapperTop) {
                div.addClass('fixed');
            } else {
                div.removeClass('fixed');
            }
        });
    };

    this.bindCloseButton = function () {
        $(document).on('click', '[data-toggle="remove"]', function (e) {
            e.preventDefault();
            var notification = $(this).closest('.notification');
            notification.fadeOut(250, function () {
                wrapper.height('auto');
                wrapper.height(wrapper.height());

            });
        });
    };

    this.init = function () {
        this.bindOnScroll();
        this.bindCloseButton();
    };
}

function Vertilize() {
    var $window = $(window);
    var sameHeight = $('.same-height');

    var height = 0;
    var currentHeight = height;

    this.setHeight = function () {
        sameHeight.each(function () {
            height = Math.max(height, $(this).height());
        });
    };

    this.applyHeight = function () {
        sameHeight.height(height);
    };

    this.init = function () {
        this.setHeight();

        if (currentHeight !== height) {
            this.applyHeight();
            currentHeight = height;
        }
    };

    this.init();

//    $window.on('resize', Vertilize());
}

function HeaderNav() {
    var navContainer = $('.top-yellow-bg .container');

    this.init = function () {
        $.get("/local/auth/nav", function (data) {
            navContainer.children(".top-nav").remove();
            navContainer.append(data);
            console.log(data);
        });
    };
}

function DatePicker() {
    this.init = function () {
        $('#datepicker').datepicker({
            daysOfWeekDisabled: "5,6",
            daysOfWeekHighlighted: "1,3,4",
            templates: {
                leftArrow: '&nbsp;',
                rightArrow: '&nbsp;'
            }
        });

        $('#datepicker').datepicker().on("changeDate", function (e) {
            console.log("clicked hhh an event:::::data");
            console.log(e);
            console.log("Timestamp");
            console.log(e.timeStamp);

            $("#schedule-modal").modal('show');
        });
    };
}

$(function () {

    (new StickyFooter($('#container'), $('#footer'))).update().bindOnResize();

    (new ExternalLinkHandler).addTargetAttribute($('body'));

    (new PageTimer).logToConsole();

    (new UIBindings).bindTooltips();

    (new UIBindings).bindPopovers();

    (new UIBindings).bindSlickCarousels();

    (new UIBindings).bindSharing();

    (new UIBindings).bindMasonary();

    (new UIBindings).bindMagnificpopup();

    (new UIBindings).bindSubmittingButtons();

    (new Notifications).init();

    (new Vertilize).init();

    (new HeaderNav).init();

    (new DatePicker).init();
});
