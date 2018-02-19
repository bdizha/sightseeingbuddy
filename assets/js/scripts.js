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
            adaptiveHeight: true,
            autoplaySpeed: 3000
        });

        $('[data-slick-carousel-three]').slick({
            dots: true,
            infinite: true,
            slidesToShow: 1,
            slidesToScroll: 1,
            adaptiveHeight: true,
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

        setHeightFor('.media-heading.same-height');
        setHeightFor('.media-media-summary.same-height');
        setHeightFor('.media .media-heading');
        setHeightFor('.media .media-summary');
        setHeightFor('.contact-block .same-height');

        $('.same-height').matchHeight(options);
    };
}

function setHeightFor(selector) {
    var $columns = $(selector);
    var maxHeight = Math.max.apply(Math, $columns.map(function () {
        return $(this).height();
    }).get());

    $columns.height(maxHeight);
}

function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}

function setGuest() {
    this.init = function () {
        $("select#guests").change(function () {
            console.log("setting new guests: " + $(this).val());
            $("#pricing_persons").attr("data-pricing-persons", $(this).val());
            $("#pricing_persons").html($(this).val() + " person(s)");

            (new setPricing).init();
        });
    };
}

function setPricing() {
    var rate = 0.2;
    this.init = function () {

        if ($("#per_person").length > 0 && $("#pricing_persons").length > 0) {
            console.log("setting new pricings");
            var persons = $("#pricing_persons").attr("data-pricing-persons");
            var perPerson = $("#per_person").val().replace("R", "");
            var pricingTotal = parseFloat(perPerson) * parseFloat(persons);
            var pricingCommission = pricingTotal * rate;
            var pricingLocalFee = pricingTotal - pricingCommission;

            $('#pricing_total').html("R" + pricingTotal.toFixed(2));
            $('#pricing_commission').html("R" + pricingCommission.toFixed(2));
            $('#pricing_local_fee').html("R" + pricingLocalFee.toFixed(2));
            $("#per_person").val('R' + perPerson);

            console.log("pricingTotal: " + pricingTotal.toFixed(2));
            console.log("pricingCommission: " + pricingCommission.toFixed(2));
            console.log("pricingLocalFee: " + pricingLocalFee.toFixed(2));
        }
    };
}

function SelectColor() {
    this.init = function () {

        // $("select").each(function () {
        //     if ($(this).val() != "") {
        //         $(this).css({color: "#FFFFFF"});
        //     }
        //     else {
        //         $(this).css({color: "#aeaeae"});
        //     }
        // });
        //
        // $("select").change(function () {
        //     if ($(this).val() != "") {
        //         $(this).css({color: "#FFFFFF"});
        //     }
        //     else {
        //         $(this).css({color: "#aeaeae"});
        //     }
        // });
    };
}

function HomeBanners() {

    this.init = function () {

        // var searchBlock = $("#search-block");
        // var indexSlider = $(".index-slider");
        //
        // if (searchBlock.length > 0) {
        //
        //     if (indexSlider.width() > 300) {
        //
        //         var sliderHeight = indexSlider.height();
        //         var searchHeight = searchBlock.height();
        //         var heightDiff = parseFloat(sliderHeight) / 2 + parseFloat(searchHeight) / 2;
        //
        //         console.log("slider height: " + sliderHeight);
        //         console.log("search height: " + searchHeight);
        //         console.log("diff height: " + heightDiff);
        //         searchBlock.css({
        //             "top": "-" + (heightDiff + 20) + "px",
        //             "visibility": "visible"
        //         });
        //
        //         if (parseFloat(indexSlider.attr("data-height")) != sliderHeight) {
        //
        //         }
        //         indexSlider.attr("data-height", sliderHeight);
        //         setTimeout(function () {
        //             (new HomeBanners).init();
        //         }, 3000);
        //     }
        // }
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

var currencyRates = {};
function SetCurrency() {
    this.init = function () {

        var flag = $.cookie('flag');

        if (_.isUndefined(flag)) {
            flag = "za";
        }

        console.log("Setting currency ::::");
        console.log(flag);

        SelectCurrency(flag);

        $.get("/local/booking/forex", function (data) {

            currencyRates = data.rates;
            currencyRates["ZAR"] = 1;

            // convert currency
            ConvertCurrency();

            console.log("Currency rates:::");
            console.log(currencyRates);
        }, "json");

        $(".dropdown .flag-icon").click(function () {
            var flag = $(this).attr("data-flag");
            SelectCurrency(flag);
        });

        $(".selected span").click(function () {
            var dropDown = $(".flag-select .dropdown");

            if (dropDown.hasClass("open")) {
                $(".flag-select .dropdown").removeClass("open");
            }
            else {
                $(".flag-select .dropdown").addClass("open");
            }
        });
    };
}

function CalcDateWidth() {
    var dateWidth = $(".datetime-inner").width();

    var dateHeight = $(".datepicker-days .table-condensed").height();

    $(".datepicker-years .table-condensed").width((dateWidth / 2) - 3).height(dateHeight);
    $(".datepicker-months .table-condensed").width((dateWidth / 2) - 3).height(dateHeight);
    $(".datepicker-decades .table-condensed").width((dateWidth / 2) - 3).height(dateHeight);
    $(".datepicker-centuries .table-condensed").width((dateWidth / 2) - 3).height(dateHeight);

    console.log("setting width...: " + (dateWidth / 2));

    // setTimeout(function () {
    //     // CalcDateWidth();
    // }, 1500);
}

function ConvertCurrency() {

    console.log("Currency length::::" + _.isEmpty(currencyRates));

    if (!_.isEmpty(currencyRates)) {

        var currencies = {
            GBP: "&pound;",
            USD: "&dollar;",
            EUR: "&euro;",
            ZAR: "R"
        };

        var currency = $("#current_currency").val();
        var currencyRate = currencyRates[currency];

        console.log("current currency:" + currency);
        console.log(currencyRates);

        console.log("Conversion rate: " + currencyRates[currency]);

        $(".data-currency").each(function () {
            var pricing = $(this).attr("data-currency-base");

            var convertedPricing = parseFloat(pricing) * currencyRate;
            var currencyPricing = currencies[currency];

            $(this).html(currencyPricing + convertedPricing.toFixed(2));
        });
    }
}

function SelectCurrency(flag) {

    // save this currency flag
    $.cookie('flag', flag, {expires: 365, path: '/'});

    $(".dropdown .flag-icon").parent().removeClass("hide");
    $(".selected span").attr("class", "flag-icon flag-icon-" + flag).css({visibility: "visible"});
    $(".flag-select .dropdown").removeClass("open");
    $(".dropdown .flag-icon-" + flag).parent().addClass("hide");

    var currentCurrency = $("#current_currency");

    if (flag === "gb") {
        currentCurrency.val("GBP");
    }
    else if (flag === "us") {
        currentCurrency.val("USD");
    }
    else if (flag === "eu") {
        currentCurrency.val("EUR");
    }
    else {
        flag = 'za';
        currentCurrency.val("ZAR");
    }

    // convert currency
    ConvertCurrency();
}

function DatePicker() {
    this.init = function () {
        var toDate = '';
        var fromDate = '';

        $(".datetime-group").css({visibility: "hidden", "height": 0, overflow: 'hidden'});

        window.onclick = function (event) {
            if (event.target.id !== "duration") {
                $(".datetime-group").css({visibility: "hidden", "height": 0});
            }
        };

        var daysActive = $("#datepicker").attr("data-days-active");
        var daysInActive = $("#datepicker").attr("data-days-inactive");

        var today = new Date();

        var sDate = new Date(today.getTime() + 1000 * 60 * 60 * 24);

        $('#datepicker').datepicker({
            daysOfWeekDisabled: daysInActive,
            daysOfWeekHighlighted: daysActive,
            startDate: sDate,
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

            // console.log("datepicker switch: " + monthYear);
            // console.log("date: " + day);

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

        $(".table-condensed tr").click(function () {
            console.log("table-condensed disabled...");
        });

        var dateRangeWidth = 0;
        $(".datetime-input").click(function () {
            $(".datetime-group").css({visibility: "visible", "height": 'auto', overflow: 'hidden'});

            CalcDateWidth();

            console.log($(".date-range").width());
        });

        $('.date-range').datepicker({
            templates: {
                leftArrow: '&nbsp;',
                rightArrow: '&nbsp;'
            },
            startDate: sDate,
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

function TogglePassword() {
    this.init = function () {
        $(".password-eye").click(function () {
            $(this).toggleClass('active');
            var passwordInput = $(this).siblings("input");
            if (passwordInput.attr("type") === "text") {
                passwordInput.attr("type", "password");
            }
            else {
                passwordInput.attr("type", "text");
            }
        });
    };
}

function AffixButton() {
    this.init = function () {
        // $("#book-experience-btn").affix({
        //     offset: {
        //         top: 250  /* Set top offset equal to header outer height including margin */
        //     }
        // });
        //
        // var w = ($("body").width() - $(".container").width()) / 2;
        // $("#book-experience-btn").css({right: w + "px"}).width($("#booking-btn-container").width() - 30);
    };
}


function Newsletter() {
    this.init = function () {
        var newsletterUrl = "/local/newsletter";
        var newsletterGroup = $("#newsletter-group");
        var newsletterGroupLabel = $("#newsletter-group .control-label");
        var newsletterGroupAlert = $("#newsletter-group .newsletter-alert");

        $("#newsletter_email").keypress(function (event) {

            console.log("Submitting newsletter subscription...");

            if (event.which === 13) {
                console.log("Pressed the enter button...");
                $.ajax({
                    type: 'post',
                    data: {email: $(this).val()},
                    url: newsletterUrl,
                    dataType: "json",
                    success: function (response) {
                        console.log("Success....");
                        newsletterGroup.removeClass("has-error");
                        newsletterGroupLabel.addClass("hide");
                        newsletterGroupAlert.removeClass("hide");
                        $("#newsletter_email").addClass("hide");
                    },
                    error: function (response) {
                        var data = JSON.stringify(response);
                        var json = $.parseJSON(data);
                        console.log(response);
                        console.log(json.responseJSON);
                        newsletterGroup.addClass("has-error");

                        newsletterGroupLabel.html(json.responseJSON.email);
                        newsletterGroupLabel.removeClass("hide");
                        newsletterGroupAlert.addClass("hide");
                    }
                });

                console.log("Done with submission...");
            }
        });
    };
}

function FileUpload() {
    this.init = function () {
        // Change this to the location of your server-side upload handler:
        var url = '/local/upload/image';
        var imageBin = "";
        var imageType = "";

        var removeBin = function () {
            $(".bin-item img").remove();

            $(".bin-close").hide();

            $(window).resize();
            (new Vertilize).init();
        };

        $('.fileupload').fileupload({
            url: url,
            dataType: 'json',
            done: function (e, data) {
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
                    $('.bin-close').show().click(removeBin);

                    $(window).resize();
                });
                (new Vertilize).init();
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

    // (new Notifications).init();

    (new Vertilize).init();

    (new HeaderNav).init();

    (new DatePicker).init();

    (new BookNow).init();

    (new UIModal).init();

    (new FileUpload).init();

    (new setPricing).init();

    (new setGuest).init();

    (new HomeBanners).init();

    (new SelectColor).init();

    (new SetCurrency).init();

    (new Newsletter).init();

    (new TogglePassword).init();

    (new AffixButton).init();

    setHeightFor('.media-heading.same-height');
    setHeightFor('.media-media-summary.same-height');


    $window.on('resize', function () {
        (new AffixButton).init();
        (new Vertilize).init();
    });

    setTimeout(function () {
        $('#notifications-wrapper').hide();
    }, 200000);
});
