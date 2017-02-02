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
    }
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
            fade: true
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
            gutter: 5,
        });
    }

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
        })
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
    var sameHeight = $('.same-height');
    var height = 0;
    var currentHeight = height;

    this.setHeight = function () {
        sameHeight.each(function () {
            height = Math.max(height, $(this).height());

            console.log("height>>>>" + height);
        });
    };

    this.applyHeight = function () {
        sameHeight.height(height);
    };

    this.init = function () {
        this.setHeight();

        if (currentHeight != height) {
            this.applyHeight();
            currentHeight = height;
        }
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


    setInterval(function () {
        (new Vertilize).init();
    }, 3000);
});

$(document).ready(function () {

    $(document).on('submit', '.comment-form', function (e) {
        e.preventDefault();

        var $form = $(this);
        var data = $form.serialize();

        $.ajax({
            method: 'POST',
            url: data.action,
            data: data,
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        })
            .success(function (data) {
                console.log('success', data);

                // Clear out the text box
                $form.find('textarea[name="fields[comment]"]').val('');

                // Add the new comment html
                var $comment_html = $(data.html).find('.comment-single');

                // Are we replying to a comment, or on the top-level? Determines where to append
                if (data.comment.parentId) {
                    var $replies_container = $('#comment-' + data.comment.parentId + ' .comments-list');

                    // Hide the reply form
                    $form.hide();

                    // Check for existing container for other replies
                    if ($replies_container.length == 0) {
                        $('#comment-' + data.comment.parentId).append('<ul class="comments-list"/>');
                    }

                    $('#comment-' + data.comment.parentId + ' .comments-list').append($comment_html);
                } else {
                    $('.comments-list:first').append($comment_html);
                }
            })
            .error(function (data) {
                console.log('error', data);
            });
    });


    // Toggle to show/hide replies
    $(document).on('click', 'a.comment-toggle', function (e) {
        e.preventDefault();

        $(this).parents('.comment-single:first').find('.comments-list:first').toggle();
    });

    // Toggle to show/hide reply form
    $(document).on('click', 'a.comment-reply', function (e) {
        e.preventDefault();

        $(this).parents('.comment-single:first').find('.comment-form:first').toggle();
    });

    // Handle voting
    $(document).on('click', 'a.comment-vote-down, a.comment-vote-up', function (e) {
        e.preventDefault();

        $.ajax({
            url: $(this).attr('href'),
        })
            .success(function (data) {
                console.log('success', data);

                // update label
                if (data.success) {
                    $(e.target).parent().parent().find('.count').html(data.votes + ' votes');
                }
            })
            .error(function (data) {
                console.log('error', data);
            });
    });

    // Handle flagging
    $(document).on('click', 'a.comment-flag', function (e) {
        e.preventDefault();

        $.ajax({
            url: $(this).attr('href'),
        })
            .success(function (data) {
                console.log('success', data);

                // update label
                $(e.target).parent().parent().find('.comment-flag').replaceWith('<span class="static-label comment-flag"><span class="glyphicon glyphicon-flag"></span>Flagged as inappropriate</span>');
            })
            .error(function (data) {
                console.log('error', data);
            });
    });

    // Handle deleting
    $(document).on('click', 'a.comment-delete', function (e) {
        e.preventDefault();

        $.ajax({
            url: $(this).attr('href'),
        })
            .success(function (data) {
                console.log('success', data);
            })
            .error(function (data) {
                console.log('error', data);
            });
    });

    // Handle editing
    $(document).on('click', 'a.comment-edit', function (e) {
        e.preventDefault();

        // Simply hides text and shows form
        $(this).parents('.comment-text').find('.comment-content').hide();
        $(this).parents('.comment-text').find('.edit-comment-form').show();
    });

    $(document).on('submit', '.edit-comment-form', function (e) {
        e.preventDefault();

        var data = $(this).serialize();
        var $self = $(this);

        $.ajax({
            method: 'POST',
            url: data.action,
            data: data,
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        })
            .success(function (data) {
                console.log('success', data);

                // Update the comment text
                var comment_text = $self.find('textarea[name="fields[comment]"]').val().replace(/\n/g, '<br />');
                $self.parents('.comment-text').find('.comment-content').html('<p>' + comment_text + '</p>');

                // Hide/show form and content
                $self.parents('.comment-text').find('.comment-content').show();
                $self.parents('.comment-text').find('.edit-comment-form').hide();
            })
            .error(function (data) {
                console.log('error', data);
            });
    });

});
