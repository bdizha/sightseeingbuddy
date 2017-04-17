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
            arrows: true,
            fade: true,
            autoplay: true,
            autoplaySpeed: 3000
        });

        $('[data-slick-carousel-three]').slick({
            dots: true,
            infinite: true,
            slidesToShow: 3,
            slidesToScroll: 1,
            adaptiveHeight: false,
            autoplay: true,
            autoplaySpeed: 3000
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
            //shareHandler.appendGoogle();
            //shareHandler.appendLinkedIn();
            //shareHandler.appendPinterest();
        });
    };

    this.bindMagnificpopup = function () {
        $('.gallery-image').magnificPopup({
            type: 'image',
            callbacks: {
                markupParse: function (template, values, item) {
                    values.description = item.el.data('description');
                }
            },
            gallery: {
                enabled: true
            },
            image: {
                headerFit: true,
                captionFit: true,
                preserveHeaderAndCaptionWidth: false,
                markup: '<div class="mfp-figure">' +
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

    this.init = function () {
        var options = {
            byRow: true,
            property: 'height',
            target: null,
            remove: false
        };

        $('.same-height').matchHeight(options);

    };
}


var resolvedCaption = false;
function HomeBanners() {

    this.init = function () {
        // get the current url from the body
        var currentUrl = $("#current_url").val();

        if ($(window).width() >= 992 && (currentUrl == "blog" || currentUrl == "" || currentUrl == "become-a-local")) {
            var indexSlider = $(".carousel-inner").first();
            var carouselCaption = $(".carousel-caption");
            var btnBlock = $(".home-btn-block");
            var searchForm = 250;

            if (indexSlider > 100) {
                resolvedCaption = true;
            }

            console.log("Index slicer height: " + indexSlider.height());

            $(".search-form").css({top: ((indexSlider.height() - searchForm) / 2) + "px"});
            carouselCaption.css({top: (((indexSlider.height() - searchForm) / 2) - 24) + "px"});
            btnBlock.css({top: (((indexSlider.height() - searchForm) / 2) + 200) + "px"});

            if (resolvedCaption == false) {
                setTimeout(function () {
                    (new HomeBanners).init();
                }, 3000);
            }
        }
    }
}

function HeaderNav() {
    var navContainer = $('.top-yellow-bg .container');

    this.init = function () {
        $.get("/local/auth/nav", function (data) {
            navContainer.children(".top-nav").remove();
            navContainer.append(data);
        });

        var url = $("#url").val();
        if (url === "undefined" || url === undefined) {
            return false;
        }

        $(".navbar-nav li a").each(function () {
            $(this).parent().removeClass("active");
            if ($(this).attr("href") === url) {
                $(this).parent().addClass("active");
            }
        });
    };
}

function DatePicker() {
    this.init = function () {
        var toDate = '';
        var fromDate = '';

        window.onclick = function (event) {
            if (event.target.id !== "duration") {
                $(".datetime-group").hide();
            }
        };

        var daysActive = $("#datepicker").attr("data-days-active");
        var daysInActive = $("#datepicker").attr("data-days-inactive");

        console.log("some data is coming through now");
        console.log(daysInActive);

        $('#datepicker').datepicker({
            daysOfWeekDisabled: daysInActive,
            daysOfWeekHighlighted: daysActive,
            templates: {
                leftArrow: '&nbsp;',
                rightArrow: '&nbsp;'
            }
        });

        $('#datepicker').datepicker().on("changeDate", function (e) {
            var monthYear = $(".datepicker-switch").html();
            var day = $(".table-condensed td.active").html();
            var experienceId = $("#experience-id").val();
            var date = day + " " + monthYear;

            console.log("datepicker switch: " + monthYear);
            console.log("date: " + day);

            $(".available-times").attr("date", date);

            $(".times-row").hide();

            var data = {
                "date": date,
                "experience_id": experienceId
            };

            $.post("/local/booking/times", data)
                .done(function (html) {
                    console.log("times html::::");
                    console.log(html);

                    $(".times-row").html(html).show();
                });

            $("#schedule-modal").modal('show');

            (new BookNow).init();
        });

        $(".datetime-input").click(function () {
            $(".datetime-group").show();
        });

        $('.date-range').datepicker({
            templates: {
                leftArrow: '&nbsp;',
                rightArrow: '&nbsp;'
            },
            toValue: function (date, format, language) {
                var d = new Date(date);
                d.setDate(d.getDate() + 7);
                return new Date(d);
            }
        });

        $('.date-range').datepicker().on("changeDate", function (e) {
            var timestamp = parseInt(e.timeStamp / 1000);

            $.get("/local/date/" + timestamp, function (data) {
                $("#" + $(this).attr("data-id")).val(data.date);
            });

            toDate = $("#date-to").val();
            fromDate = $("#date-from").val();

            $(".datetime-input").val(fromDate + " - " + toDate);
        });
    };
}

function BookNow() {
    this.init = function () {
        $('.book-now').click(function () {
            var href = $(this).attr("href");
            var timestamp = $(".available-times").attr("timestamp");
            window.location = href + "/" + timestamp;
            return false;
        });
    };
}

function UIModal() {
    this.init = function () {

        $(".notice-modal").modal("show");

        $(".btn-modal").click(function () {
            $("#" + $(this).attr("modal-id")).modal('show');
            return false;
        });

        $(".btn-close").click(function () {
            $("#" + $(this).attr("modal-id")).modal('hide');
            return false;
        });
    };
}

$(function () {
    var $window = $(window);

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

    (new BookNow).init();

    (new UIModal).init();

    (new HomeBanners).init();

    $window.on('resize', function () {
        (new Vertilize).init();
    });

    setTimeout(function () {
        $('#notifications-wrapper').hide();
    }, 200000);
});
