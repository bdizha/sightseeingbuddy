function ShareHandler($container) {
  //var query = $.param(params);

  var definedProps = {
    url: $container.data('url'),
    text: $container.data('text')
  };

  var buildHttpQuery = function (data) {
    var copy = {};

    $.each(data, function (k, v) {
      if (v) {
        copy[k] = v;
      }
    });

    return $.param(copy);
  };

  var openPopup = function (shareWindow, conf) {
    var top = Math.round((screen.height - conf.height)/2);
    var left = Math.round((screen.width - conf.width)/2);

    shareWindow.location.href = conf.url;
    shareWindow.focus();
    shareWindow.resizeTo(conf.width, conf.height);

    shareWindow.moveTo(left, top);

    //window.open(
    //  conf.url,
    //  "share" + conf.platform,
    //  "toolbar=0, status=0, width=" + conf.width + ", height=" + conf.height + ", top=" + top + ", left=" + left
    //);

  };

  var popups = {
    'google-plus': function (opt) {
      return {
        url: "https://plus.google.com/share?" + buildHttpQuery({
          hl: opt.lang,
          url: opt.url
        })
      };
    },
    facebook: function (opt) {
      return {
        url: "http://www.facebook.com/sharer/sharer.php?" + buildHttpQuery({
          u: opt.url,
          t: opt.text
        }),
        width: 900,
        height: 500
      };
    },
    twitter: function (opt) {
      return {
        url: "https://twitter.com/intent/tweet?" + buildHttpQuery({
          text: opt.text,
          url: opt.url,
          via: opt.via
        }),

        width: 650,
        height: 360
      };
    },
    linkedin: function (opt) {
      return {
        url: 'https://www.linkedin.com/cws/share?url=' + buildHttpQuery({
          url: opt.url,
          isFramed: 'true'
        }),
        width: 550,
        height: 550
      };
    },
    pinterest: function (opt) {
      return {
        url: 'http://pinterest.com/pin/create/button/?url=' + buildHttpQuery({
          url: opt.url,
          description: opt.text,
          media: opt.image
        }),
        width: 700,
        height: 300
      };
    }
  };


  var self = this;

  this.createButton = function (platform) {
    var button = $('<a class="share-btn"><i class="fa fa-' + platform + ' fa-lg" ></i></a>');

    button.css({cursor: 'pointer'});

    button.on('click', function (e) {
      e.preventDefault();
      self.share(platform);
    });

    $container.append(button);

    return button;
  };

  this.appendTwitter = function () {
    $container.append(self.createButton('twitter'));
  };


  var sharePage = function (shareWindow, platform, url, $page) {
    var shareProps = $.extend({}, definedProps);

    shareProps.platform = platform;

    if (!shareProps.text) {
      shareProps.text = $page.find('meta').filter('[property="article-title"]').attr('content');
    }
    if (!shareProps.via) {
      shareProps.via = $page.find('#twitterHandle').attr('content');
    }
    if (!shareProps.lang) {
      shareProps.lang = $page.find('html').attr('lang');
    }
    if (!shareProps.image) {
      shareProps.image = $page.find('meta').filter('[property="og:image"]').attr('content');
    }

    var text = shareProps.text;

    if (platform == 'twitter') {
      var startLen = 23 + 3; // twitter short URL length + 3
      if (shareProps.via) {
        startLen += (' via @' + shareProps.via).length;
      }
      if (text.length + startLen > 140) {
        var diff = (text.length + startLen) - 140;
        text = text.substr(0, text.length - diff) + '…';
      }
    }

    var popupConf = popups[platform]({
      url: url,
      text: text,
      via: shareProps.via
    });

    openPopup(shareWindow, popupConf);
  };

  this.share = function (platform) {
    var url = definedProps.url ? definedProps.url : window.location.href;

    var shareWindow = window.open(
      "",
      "share" + platform,
      "toolbar=0, status=0, width=" + 50 + ", height=" + 50 + ", top=" + 0 + ", left=" + 0
    );

    if (window.location.href !== url) {
      // show loader
      var shareLoader = $('<div id="shareLoader"></div>');
      var fade = $('<div style="position: fixed; left: 0; top: 0; right: 0; bottom: 0; background: rgba(0,0,0,0.5);"></div>');
      var spinner = $('<i class="fa fa-cog fa-spin" style="color: #fff"></i>');
      spinner.css({position: 'fixed', top: '50%', left: '50%' });
      fade.append(spinner);
      shareLoader.append(fade);

      $('body').append(shareLoader);

      $.ajax(url, {
        async:    true,
        success: function (data) {
          shareLoader.remove();
          sharePage(shareWindow, platform, url, $('<root/>').append(data));
        },
        error: function () {
          shareLoader.remove();
          alert('Failed to load URL: ' + url);
        }
      });
    } else {
      sharePage(shareWindow, platform, url, $(document));
    }

  };

  this.appendFacebook = function () {
    $container.append(self.createButton('facebook'));
  };

  this.appendGoogle = function () {
    $container.append(self.createButton('google-plus'));
  };

  // TODO test
  this.appendLinkedIn = function () {
    $container.append(self.createButton('linkin'));
  };

  // TODO test / enable
  this.appendPinterest = function () {
    $container.append(self.createButton('pinterest'));
  };
}
