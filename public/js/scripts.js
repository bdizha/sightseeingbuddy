"use strict";function PageTimer(){var t=this;this.getLoadTime=function(){var t=(new Date).getTime();window.performance=window.performance||window.mozPerformance||window.msPerformance||window.webkitPerformance||{};var e=performance.timing||{},i=t-e.navigationStart;return Math.round(i/10)/100},this.logToConsole=function(){$(window).on("load",function(){console&&console.info&&console.info("Client loaded in "+t.getLoadTime()+"s")})},this.append=function(e){$(window).on("load",function(){e.text(" | LT: "+t.getLoadTime()+"s")})}}function StickyFooter(t,e){var i=$(window);this.updateWrapperCSS=function(){var i=e.outerHeight();t.css({marginBottom:-1*i,paddingBottom:i})},this.bindOnResize=function(){return i.on("resize",this.updateWrapperCSS),this},this.update=function(){return this.updateWrapperCSS(),this}}function ExternalLinkHandler(){var t=this,e=document.location.hostname;this.matchInternalLink=[new RegExp("^https?://(.*?)"+e)],this.addTargetAttribute=function(e){e.find("a").filter('[href^="http://"], [href^="https://"]').each(function(){for(var e=$(this),i=e.attr("href"),n=!1,o=0;o<t.matchInternalLink.length;o++){var a=t.matchInternalLink[o];i.match(a)&&(n=!0)}n||e.attr("target","_blank").addClass("external-link")})}}function UIBindings(){this.bindTooltips=function(){$('[data-toggle="tooltip"]').tooltip()},this.bindPopovers=function(){$('[data-toggle="popover"]').popover()},this.bindSlickCarousels=function(){$("[data-slick-carousel-default]").slick({dots:!0,slidesToShow:1,slidesToScroll:1,arrows:!0,fade:!0,autoplay:!0,adaptiveHeight:!0,autoplaySpeed:3e3}),$("[data-slick-carousel-three]").slick({dots:!0,infinite:!0,slidesToShow:1,slidesToScroll:1,adaptiveHeight:!0,autoplay:!0,autoplaySpeed:3e3}),$('[data-toggle="slick-nav"]').on("click",function(t){t.preventDefault();var e=$(this).data("index");$("[data-slick-carousel-default]").slick("slickGoTo",e)})},this.bindSharing=function(){$("[data-share-default]").each(function(){var t=new ShareHandler($(this));t.appendFacebook(),t.appendTwitter()})},this.bindMagnificpopup=function(){$(".gallery-image").magnificPopup({type:"image",callbacks:{markupParse:function(t,e,i){e.description=i.el.data("description")}},gallery:{enabled:!0},image:{headerFit:!0,captionFit:!0,preserveHeaderAndCaptionWidth:!1,markup:'<div class="mfp-figure"><figure><header class="mfp-header"><div class="mfp-top-bar"><div class="mfp-title"></div><div class="mfp-close"></div><div class="mfp-decoration"></div></div></header><section class="mfp-content-container"><div class="mfp-img"></div></section><footer class="mfp-footer"><figcaption class="mfp-figcaption"><div class="mfp-bottom-bar-container"><div class="mfp-bottom-bar"><div class="mfp-counter"></div><div class="mfp-description"></div><div class="mfp-decoration"></div></div></div></figcaption></footer></figure></div>'}})},this.bindMasonary=function(){$("img").load(function(){$(".grid").masonry()}),$(".grid").masonry({itemSelector:".grid-item",columnWidth:".grid-sizer",gutter:5})},this.bindSubmittingButtons=function(){$(document).on("submit",function(){var t=$(this).find("[data-submit-text]"),e=$(this).find("[data-submitting-text]"),i=t.closest("button");e.removeClass("hide"),t.hide(),i.prop("disabled",!0)})}}function Notifications(){var t=$("#notifications-wrapper"),e=$("#notifications"),i=t.offset().top;this.bindOnScroll=function(){t.height(t.height()),$(window).on("scroll",function(){var t=$(window).scrollTop();t>i?e.addClass("fixed"):e.removeClass("fixed")})},this.bindCloseButton=function(){$(document).on("click",'[data-toggle="remove"]',function(e){e.preventDefault();var i=$(this).closest(".notification");i.fadeOut(250,function(){t.height("auto"),t.height(t.height())})})},this.init=function(){this.bindOnScroll(),this.bindCloseButton()}}function Vertilize(){this.init=function(){var t={byRow:!0,property:"height",target:null,remove:!1};console.log("resizing..."),$(".same-height").matchHeight(t)}}function setHeightFor(t){var e=$(t),i=Math.max.apply(Math,e.map(function(){return $(this).height()}).get());e.height(i)}function isNumber(t){t=t?t:window.event;var e=t.which?t.which:t.keyCode;return!(e>31&&(e<48||e>57))}function setGuest(){this.init=function(){$("select#guests").change(function(){console.log("setting new guests: "+$(this).val()),$("#pricing_persons").attr("data-pricing-persons",$(this).val()),$("#pricing_persons").html($(this).val()+" person(s)"),(new setPricing).init()})}}function setPricing(){var t=.2;this.init=function(){if($("#per_person").length>0&&$("#pricing_persons").length>0){console.log("setting new pricings");var e=$("#pricing_persons").attr("data-pricing-persons"),i=$("#per_person").val().replace("R",""),n=parseFloat(i)*parseFloat(e),o=n*t,a=n-o;$("#pricing_total").html("R"+n.toFixed(2)),$("#pricing_commission").html("R"+o.toFixed(2)),$("#pricing_local_fee").html("R"+a.toFixed(2)),$("#per_person").val("R"+i),console.log("pricingTotal: "+n.toFixed(2)),console.log("pricingCommission: "+o.toFixed(2)),console.log("pricingLocalFee: "+a.toFixed(2))}}}function SelectColor(){this.init=function(){}}function HomeBanners(){this.init=function(){var t=$("#search-block"),e=$(".index-slider");if(t.length>0&&e.width()>300){var i=e.height(),n=t.height(),o=parseFloat(i)/2+parseFloat(n)/2;console.log("slider height: "+i),console.log("search height: "+n),console.log("diff height: "+o),t.css({top:"-"+(o+20)+"px",visibility:"visible"}),parseFloat(e.attr("data-height"))!=i,e.attr("data-height",i),setTimeout(function(){(new HomeBanners).init()},3e3)}}}function HeaderNav(){var t=$(".top-yellow-bg .container");this.init=function(){$.get("/local/auth/nav",function(e){t.children(".top-nav").remove(),t.append(e)});var e=$("#url").val();return"undefined"!==e&&void 0!==e&&void $(".navbar-nav li a").each(function(){$(this).parent().removeClass("active"),$(this).attr("href")===e&&$(this).parent().addClass("active")})}}function SetCurrency(){this.init=function(){var t=$.cookie("flag");_.isUndefined(t)&&(t="za"),console.log("Setting currency ::::"),console.log(t),SelectCurrency(t),$.get("/local/booking/forex",function(t){currencyRates=t.rates,currencyRates.ZAR=1,ConvertCurrency(),console.log("Currency rates:::"),console.log(currencyRates)},"json"),$(".dropdown .flag-icon").click(function(){var t=$(this).attr("data-flag");SelectCurrency(t)}),$(".selected span").click(function(){var t=$(".flag-select .dropdown");t.hasClass("open")?$(".flag-select .dropdown").removeClass("open"):$(".flag-select .dropdown").addClass("open")})}}function ConvertCurrency(){if(console.log("Currency length::::"+_.isEmpty(currencyRates)),!_.isEmpty(currencyRates)){var t={GBP:"&pound;",USD:"&dollar;",EUR:"&euro;",ZAR:"R"},e=$("#current_currency").val(),i=currencyRates[e];console.log("current currency:"+e),console.log(currencyRates),console.log("Conversion rate: "+currencyRates[e]),$(".data-currency").each(function(){var n=$(this).attr("data-currency-base"),o=parseFloat(n)*i,a=t[e];$(this).html(a+Math.round(o))})}}function SelectCurrency(t){$.cookie("flag",t,{expires:365,path:"/"}),$(".dropdown .flag-icon").parent().removeClass("hide"),$(".selected span").attr("class","flag-icon flag-icon-"+t).css({visibility:"visible"}),$(".flag-select .dropdown").removeClass("open"),$(".dropdown .flag-icon-"+t).parent().addClass("hide");var e=$("#current_currency");"gb"===t?e.val("GBP"):"us"===t?e.val("USD"):"eu"===t?e.val("EUR"):(t="za",e.val("ZAR")),ConvertCurrency()}function DatePicker(){this.init=function(){var t="",e="";window.onclick=function(t){"duration"!==t.target.id&&$(".datetime-group").hide()};var i=$("#datepicker").attr("data-days-active"),n=$("#datepicker").attr("data-days-inactive");console.log("some data is coming through now"),console.log(n),$("#datepicker").datepicker({daysOfWeekDisabled:n,daysOfWeekHighlighted:i,templates:{leftArrow:"&nbsp;",rightArrow:"&nbsp;"}}),$("#datepicker").datepicker().on("changeDate",function(t){var e=$(".datepicker-switch").html(),i=$(".table-condensed td.active").html(),n=$("#experience-id").val(),o=i+" "+e;console.log("datepicker switch: "+e),console.log("date: "+i),$(".available-times").attr("date",o),$(".times-row").hide();var a={date:o,experience_id:n};$.post("/local/booking/times",a).done(function(t){console.log("times html::::"),console.log(t),$(".times-row").html(t).show()}),$("#schedule-modal").modal("show"),(new BookNow).init()}),$(".datetime-input").click(function(){$(".datetime-group").show()}),$(".date-range").datepicker({templates:{leftArrow:"&nbsp;",rightArrow:"&nbsp;"},toValue:function(t,e,i){var n=new Date(t);return n.setDate(n.getDate()+7),new Date(n)}}),$(".date-range").datepicker().on("changeDate",function(i){var n=parseInt(i.timeStamp/1e3);$.get("/local/date/"+n,function(t){$("#"+$(this).attr("data-id")).val(t.date)}),t=$("#date-to").val(),e=$("#date-from").val(),$(".datetime-input").val(e+" - "+t)})}}function BookNow(){this.init=function(){$(".book-now").click(function(){var t=$(this).attr("href"),e=$(".available-times").attr("timestamp");return window.location=t+"/"+e,!1})}}function UIModal(){this.init=function(){$(".notice-modal").modal("show"),$(".btn-modal").click(function(){return $("#"+$(this).attr("modal-id")).modal("show"),!1}),$(".btn-close").click(function(){return $("#"+$(this).attr("modal-id")).modal("hide"),!1})}}function FileUpload(){this.init=function(){var t="/local/upload/image",e="",i="",n=function(){e=$(this).parent().remove(),$(window).resize(),(new Vertilize).init()};$(".fileupload").fileupload({url:t,dataType:"json",done:function(t,o){$.each(o.result.files,function(t,o){$(".profile-picture img").attr("src","/files/"+o.name);var a="single"===i?"image":"images[]",r='<div class="bin-item"><img src="/files/'+o.name+'" /><input type="hidden" name="'+a+'" value="/files/'+o.name+'" /><i class="fa fa-close bin-close"></i></div>';"single"===i?e.html(r):e.append(r),$(".bin-close").click(n),$(window).resize()}),(new Vertilize).init()},progressall:function(t,e){var i=parseInt(e.loaded/e.total*100,10);$("#progress .progress-bar").css("width",i+"%")}}).prop("disabled",!$.support.fileInput).parent().addClass($.support.fileInput?void 0:"disabled"),$(".fileupload").click(function(){e=$("#"+$(this).attr("bin")),i=$(this).attr("image-type")}),$(".bin-close").click(n)}}function ShareHandler(t){var e={url:t.data("url"),text:t.data("text")},i=function(t){var e={};return $.each(t,function(t,i){i&&(e[t]=i)}),$.param(e)},n=function(t,e){var i=Math.round((screen.height-e.height)/2),n=Math.round((screen.width-e.width)/2);t.location.href=e.url,t.focus(),t.resizeTo(e.width,e.height),t.moveTo(n,i)},o={"google-plus":function(t){return{url:"https://plus.google.com/share?"+i({hl:t.lang,url:t.url})}},facebook:function(t){return{url:"http://www.facebook.com/sharer/sharer.php?"+i({u:t.url,t:t.text}),width:900,height:500}},twitter:function(t){return{url:"https://twitter.com/intent/tweet?"+i({text:t.text,url:t.url,via:t.via}),width:650,height:360}},linkedin:function(t){return{url:"https://www.linkedin.com/cws/share?url="+i({url:t.url,isFramed:"true"}),width:550,height:550}},pinterest:function(t){return{url:"http://pinterest.com/pin/create/button/?url="+i({url:t.url,description:t.text,media:t.image}),width:700,height:300}}},a=this;this.createButton=function(e){var i=$('<a class="share-btn"><i class="fa fa-'+e+' fa-lg" ></i></a>');return i.css({cursor:"pointer"}),i.on("click",function(t){t.preventDefault(),a.share(e)}),t.append(i),i},this.appendTwitter=function(){t.append(a.createButton("twitter"))};var r=function(t,i,a,r){var s=$.extend({},e);s.platform=i,s.text||(s.text=r.find("meta").filter('[property="article-title"]').attr("content")),s.via||(s.via=r.find("#twitterHandle").attr("content")),s.lang||(s.lang=r.find("html").attr("lang")),s.image||(s.image=r.find("meta").filter('[property="og:image"]').attr("content"));var c=s.text;if("twitter"==i){var l=26;if(s.via&&(l+=(" via @"+s.via).length),c.length+l>140){var d=c.length+l-140;c=c.substr(0,c.length-d)+"…"}}var u=o[i]({url:a,text:c,via:s.via});n(t,u)};this.share=function(t){var i=e.url?e.url:window.location.href,n=window.open("","share"+t,"toolbar=0, status=0, width=50, height=50, top=0, left=0");if(window.location.href!==i){var o=$('<div id="shareLoader"></div>'),a=$('<div style="position: fixed; left: 0; top: 0; right: 0; bottom: 0; background: rgba(0,0,0,0.5);"></div>'),s=$('<i class="fa fa-cog fa-spin" style="color: #fff"></i>');s.css({position:"fixed",top:"50%",left:"50%"}),a.append(s),o.append(a),$("body").append(o),$.ajax(i,{async:!0,success:function(e){o.remove(),r(n,t,i,$("<root/>").append(e))},error:function(){o.remove(),alert("Failed to load URL: "+i)}})}else r(n,t,i,$(document))},this.appendFacebook=function(){t.append(a.createButton("facebook"))},this.appendGoogle=function(){t.append(a.createButton("google-plus"))},this.appendLinkedIn=function(){t.append(a.createButton("linkin"))},this.appendPinterest=function(){t.append(a.createButton("pinterest"))}}var App,currencyRates={};$(function(){var t=$(window);new StickyFooter($("#container"),$("#footer")).update().bindOnResize(),(new ExternalLinkHandler).addTargetAttribute($("body")),(new PageTimer).logToConsole(),(new UIBindings).bindTooltips(),(new UIBindings).bindPopovers(),(new UIBindings).bindSlickCarousels(),(new UIBindings).bindSharing(),(new UIBindings).bindMasonary(),(new UIBindings).bindMagnificpopup(),(new UIBindings).bindSubmittingButtons(),(new Notifications).init(),(new Vertilize).init(),(new HeaderNav).init(),(new DatePicker).init(),(new BookNow).init(),(new UIModal).init(),(new FileUpload).init(),(new setPricing).init(),(new setGuest).init(),(new HomeBanners).init(),(new SelectColor).init(),(new SetCurrency).init(),setHeightFor(".media-heading.same-height"),setHeightFor(".media-media-summary.same-height"),t.on("resize",function(){(new Vertilize).init(),setHeightFor(".media-heading.same-height"),setHeightFor(".media-media-summary.same-height")}),setTimeout(function(){$("#notifications-wrapper").hide()},2e5)});
//# sourceMappingURL=scripts.js.map
