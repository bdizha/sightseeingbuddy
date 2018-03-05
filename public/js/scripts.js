"use strict";function PageTimer(){var t=this;this.getLoadTime=function(){var t=(new Date).getTime();window.performance=window.performance||window.mozPerformance||window.msPerformance||window.webkitPerformance||{};var e=performance.timing||{},i=t-e.navigationStart;return Math.round(i/10)/100},this.logToConsole=function(){$(window).on("load",function(){console&&console.info&&console.info("Client loaded in "+t.getLoadTime()+"s")})},this.append=function(e){$(window).on("load",function(){e.text(" | LT: "+t.getLoadTime()+"s")})}}function StickyFooter(t,e){var i=$(window);this.updateWrapperCSS=function(){var i=e.outerHeight();t.css({marginBottom:-1*i,paddingBottom:i})},this.bindOnResize=function(){return i.on("resize",this.updateWrapperCSS),this},this.update=function(){return this.updateWrapperCSS(),this}}function ExternalLinkHandler(){var t=this,e=document.location.hostname;this.matchInternalLink=[new RegExp("^https?://(.*?)"+e)],this.addTargetAttribute=function(e){e.find("a").filter('[href^="http://"], [href^="https://"]').each(function(){for(var e=$(this),i=e.attr("href"),n=!1,a=0;a<t.matchInternalLink.length;a++){var o=t.matchInternalLink[a];i.match(o)&&(n=!0)}n||e.attr("target","_blank").addClass("external-link")})}}function UIBindings(){this.bindTooltips=function(){$('[data-toggle="tooltip"]').tooltip()},this.bindPopovers=function(){$('[data-toggle="popover"]').popover()},this.bindSlickCarousels=function(){$("[data-slick-carousel-default]").slick({dots:!0,slidesToShow:1,slidesToScroll:1,arrows:!0,fade:!0,autoplay:!0,adaptiveHeight:!0,autoplaySpeed:3e3}),$("[data-slick-carousel-three]").slick({dots:!0,infinite:!0,slidesToShow:1,slidesToScroll:1,adaptiveHeight:!0,autoplay:!0,autoplaySpeed:3e3}),$('[data-toggle="slick-nav"]').on("click",function(t){t.preventDefault();var e=$(this).data("index");$("[data-slick-carousel-default]").slick("slickGoTo",e)})},this.bindSharing=function(){$("[data-share-default]").each(function(){var t=new ShareHandler($(this));t.appendFacebook(),t.appendTwitter()})},this.bindMagnificpopup=function(){$(".gallery-image").magnificPopup({type:"image",callbacks:{markupParse:function(t,e,i){e.description=i.el.data("description")}},gallery:{enabled:!0},image:{headerFit:!0,captionFit:!0,preserveHeaderAndCaptionWidth:!1,markup:'<div class="mfp-figure"><figure><header class="mfp-header"><div class="mfp-top-bar"><div class="mfp-title"></div><div class="mfp-close"></div><div class="mfp-decoration"></div></div></header><section class="mfp-content-container"><div class="mfp-img"></div></section><footer class="mfp-footer"><figcaption class="mfp-figcaption"><div class="mfp-bottom-bar-container"><div class="mfp-bottom-bar"><div class="mfp-counter"></div><div class="mfp-description"></div><div class="mfp-decoration"></div></div></div></figcaption></footer></figure></div>'}})},this.bindMasonary=function(){$("img").load(function(){$(".grid").masonry()}),$(".grid").masonry({itemSelector:".grid-item",columnWidth:".grid-sizer",gutter:5})},this.bindSubmittingButtons=function(){$(document).on("submit",function(){var t=$(this).find("[data-submit-text]"),e=$(this).find("[data-submitting-text]"),i=t.closest("button");e.removeClass("hide"),t.hide(),i.prop("disabled",!0)})}}function Notifications(){var t=$("#notifications-wrapper"),e=$("#notifications"),i=t.offset().top;this.bindOnScroll=function(){t.height(t.height()),$(window).on("scroll",function(){var t=$(window).scrollTop();t>i?e.addClass("fixed"):e.removeClass("fixed")})},this.bindCloseButton=function(){$(document).on("click",'[data-toggle="remove"]',function(e){e.preventDefault();var i=$(this).closest(".notification");i.fadeOut(250,function(){t.height("auto"),t.height(t.height())})})},this.init=function(){this.bindOnScroll(),this.bindCloseButton()}}function Vertilize(){this.init=function(){var t={byRow:!0,property:"height",target:null,remove:!1};setHeightFor(".media-heading.same-height"),setHeightFor(".media-media-summary.same-height"),setHeightFor(".media .media-heading"),setHeightFor(".media .media-summary"),setHeightFor(".contact-block .same-height"),$(".same-height").matchHeight(t)}}function setHeightFor(t){var e=$(t),i=Math.max.apply(Math,e.map(function(){return $(this).height()}).get());e.height(i)}function isNumber(t){t=t?t:window.event;var e=t.which?t.which:t.keyCode;return!(e>31&&(e<48||e>57))}function setGuest(){this.init=function(){$("select#guests").change(function(){console.log("setting new guests: "+$(this).val()),$("#pricing_persons").attr("data-pricing-persons",$(this).val()),$("#pricing_persons").html($(this).val()+" person(s)"),(new setPricing).init()})}}function setPricing(){var t=.2;this.init=function(){var e=$("#per_person"),i=$("#pricing_persons");if(e.length>0&&i.length>0){var n=i.attr("data-pricing-persons"),a=e.val().replace("R",""),o=parseFloat(a)*parseFloat(n),r=o*t,s=o+r;$("#pricing_total").html("R"+s.toFixed(2)),$("#pricing_commission").html("R"+r.toFixed(2)),$("#pricing_local_fee").html("R"+o.toFixed(2)),e.val("R"+a)}}}function SelectColor(){this.init=function(){}}function HomeBanners(){this.init=function(){}}function HeaderNav(){var t=$(".top-yellow-bg .container");this.init=function(){$.get("/local/auth/nav",function(e){t.children(".top-nav").remove(),t.append(e)}),$.get("/local/auth/guest",function(t){t.authenticated&&"local"!==t.type||$("#become-a-buddy-item").show(),t.authenticated?($(".btn-guest-on").css({display:"inline-block"}),$(".btn-guest-off").hide()):($(".btn-guest-off").css({display:"inline-block"}),$(".btn-guest-on").hide()),$(".nav .item").css({visibility:"visible"}),$(".btn-guest").css({visibility:"visible"})},"json");var e=$("#url").val();return"undefined"!==e&&void 0!==e&&void $(".navbar-nav li a").each(function(){$(this).parent().removeClass("active"),$(this).attr("href")===e&&$(this).parent().addClass("active")})}}function SetCurrency(){this.init=function(){var t=$.cookie("flag");_.isUndefined(t)&&(t="za"),SelectCurrency(t),$.get("/local/booking/forex",function(t){currencyRates=t.rates,currencyRates.ZAR=1,ConvertCurrency()},"json"),$(".dropdown .flag-icon").click(function(){var t=$(this).attr("data-flag");SelectCurrency(t)}),$(".selected span").click(function(){var t=$(".flag-select .dropdown");t.hasClass("open")?$(".flag-select .dropdown").removeClass("open"):$(".flag-select .dropdown").addClass("open")})}}function CalcDateWidth(){var t=$(".datetime-inner").width(),e=$(".datepicker-days .table-condensed").height();$(".datepicker-years .table-condensed").width(t/2-3).height(e),$(".datepicker-months .table-condensed").width(t/2-3).height(e),$(".datepicker-decades .table-condensed").width(t/2-3).height(e),$(".datepicker-centuries .table-condensed").width(t/2-3).height(e)}function ConvertCurrency(){if(!_.isEmpty(currencyRates)){var t={GBP:"&pound;",USD:"&dollar;",EUR:"&euro;",ZAR:"R"},e=$("#current_currency").val(),i=currencyRates[e];$(".data-currency").each(function(){var n=$(this).attr("data-currency-base"),a=parseFloat(n)*i,o=t[e];$(this).html(o+a.toFixed(2))})}}function SelectCurrency(t){$.cookie("flag",t,{expires:365,path:"/"}),$(".dropdown .flag-icon").parent().removeClass("hide"),$(".selected span").attr("class","flag-icon flag-icon-"+t).css({visibility:"visible"}),$(".flag-select .dropdown").removeClass("open"),$(".dropdown .flag-icon-"+t).parent().addClass("hide");var e=$("#current_currency");"gb"===t?e.val("GBP"):"us"===t?e.val("USD"):"eu"===t?e.val("EUR"):(t="za",e.val("ZAR")),ConvertCurrency()}function DatePicker(){this.init=function(){var t="",e="";$(".datetime-group").css({visibility:"hidden",height:0,overflow:"hidden"}),window.onclick=function(t){"duration"!==t.target.id&&$(".datetime-group").css({visibility:"hidden",height:0})};var i=$("#datepicker").attr("data-days-active"),n=$("#datepicker").attr("data-days-inactive"),a=new Date,o=new Date(a.getTime()+864e5);$("#datepicker").datepicker({daysOfWeekDisabled:n,daysOfWeekHighlighted:i,startDate:o,templates:{leftArrow:"&nbsp;",rightArrow:"&nbsp;"}}),$("#datepicker").datepicker().on("changeDate",function(t){var e=$(".datepicker-switch").html(),i=$(".table-condensed td.active").html(),n=$("#experience-id").val(),a=i+" "+e;$(".available-times").attr("date",a),$(".times-row").hide();var o={date:a,experience_id:n};$.post("/local/booking/times",o).done(function(t){$(".times-row").html(t).show(),setTimeout(function(){$(".guest-arrow").on("click",function(){var t=$(this).attr("data-dir"),e=parseInt($(this).siblings(".guest-amount").html()),i=parseInt($("#experience-guests").val());if(t<0?e>1&&(e-=1):e+=1,console.log("experienceGuests",i),e>i)return!1;e===i&&$(this).parent().children(".arrow-top").hide(),$(this).siblings(".arrow-top").show(),$(this).siblings(".guest-amount").html(e);var n=$(this).attr("data-id"),a=$(".schedule-item-"+n+" .book-now"),o=a.attr("data-href");a.attr("href",o+"/"+e)})},1e3)}),$("#schedule-modal").modal("show"),(new BookNow).init()});$(".datetime-input").click(function(){$(".datetime-group").css({visibility:"visible",height:"auto",overflow:"hidden"}),CalcDateWidth()}),$(".date-range").datepicker({templates:{leftArrow:"&nbsp;",rightArrow:"&nbsp;"},startDate:o,toValue:function(t,e,i){var n=new Date(t);return n.setDate(n.getDate()+7),new Date(n)}}),$(".date-range").datepicker().on("changeDate",function(i){var n=parseInt(i.timeStamp/1e3);$.get("/local/date/"+n,function(t){$("#"+$(this).attr("data-id")).val(t.date)}),t=$("#date-to").val(),e=$("#date-from").val(),$(".datetime-input").val(e+" - "+t)})}}function BookNow(){this.init=function(){$(".book-now").click(function(){var t=$(this).attr("href"),e=$(".available-times").attr("timestamp");return window.location=t+"/"+e,!1})}}function UIModal(){this.init=function(){$(".notice-modal").modal("show"),$(".btn-modal").click(function(){return $("#"+$(this).attr("modal-id")).modal("show"),!1}),$(".btn-close").click(function(){return $("#"+$(this).attr("modal-id")).modal("hide"),!1})}}function TogglePassword(){this.init=function(){$(".password-eye").click(function(){$(this).toggleClass("active");var t=$(this).siblings("input");"text"===t.attr("type")?t.attr("type","password"):t.attr("type","text")})}}function AffixButton(){this.init=function(){}}function Newsletter(){this.init=function(){var t="/local/newsletter",e=$("#newsletter-group"),i=$("#newsletter-group .control-label"),n=$("#newsletter-group .newsletter-alert");$("#newsletter_email").keypress(function(a){console.log("Submitting newsletter subscription..."),13===a.which&&(console.log("Pressed the enter button..."),$.ajax({type:"post",data:{email:$(this).val()},url:t,dataType:"json",success:function(t){console.log("Success...."),e.removeClass("has-error"),i.addClass("hide"),n.removeClass("hide"),$("#newsletter_email").addClass("hide")},error:function(t){var a=JSON.stringify(t),o=$.parseJSON(a);console.log(t),console.log(o.responseJSON),e.addClass("has-error"),i.html(o.responseJSON.email),i.removeClass("hide"),n.addClass("hide")}}),console.log("Done with submission..."))})}}function FileUpload(){this.init=function(){var t="/local/upload/image",e="",i="",n=function(){$(this).parent().remove(),$(window).resize(),(new Vertilize).init()};$(".fileupload").fileupload({url:t,dataType:"json",done:function(t,a){$.each(a.result.files,function(t,a){$(".profile-picture img").attr("src","/files/"+a.name);var o="single"===i?"image":"images[]",r='<div class="bin-item"><img src="/files/'+a.name+'" /><input type="hidden" name="'+o+'" value="/files/'+a.name+'" /><i class="fa fa-close bin-close"></i></div>';"single"===i?e.html(r):e.append(r),$(".bin-close").show().click(n),$(window).resize()}),(new Vertilize).init()},progressall:function(t,e){var i=parseInt(e.loaded/e.total*100,10);$("#progress .progress-bar").css("width",i+"%")}}).prop("disabled",!$.support.fileInput).parent().addClass($.support.fileInput?void 0:"disabled"),$(".fileupload").click(function(){e=$("#"+$(this).attr("bin")),i=$(this).attr("image-type")}),$(".bin-close").click(n)}}function ShareHandler(t){var e={url:t.data("url"),text:t.data("text")},i=function(t){var e={};return $.each(t,function(t,i){i&&(e[t]=i)}),$.param(e)},n=function(t,e){var i=Math.round((screen.height-e.height)/2),n=Math.round((screen.width-e.width)/2);t.location.href=e.url,t.focus(),t.resizeTo(e.width,e.height),t.moveTo(n,i)},a={"google-plus":function(t){return{url:"https://plus.google.com/share?"+i({hl:t.lang,url:t.url})}},facebook:function(t){return{url:"http://www.facebook.com/sharer/sharer.php?"+i({u:t.url,t:t.text}),width:900,height:500}},twitter:function(t){return{url:"https://twitter.com/intent/tweet?"+i({text:t.text,url:t.url,via:t.via}),width:650,height:360}},linkedin:function(t){return{url:"https://www.linkedin.com/cws/share?url="+i({url:t.url,isFramed:"true"}),width:550,height:550}},pinterest:function(t){return{url:"http://pinterest.com/pin/create/button/?url="+i({url:t.url,description:t.text,media:t.image}),width:700,height:300}}},o=this;this.createButton=function(e){var i=$('<a class="share-btn"><i class="fa fa-'+e+' fa-lg" ></i></a>');return i.css({cursor:"pointer"}),i.on("click",function(t){t.preventDefault(),o.share(e)}),t.append(i),i},this.appendTwitter=function(){t.append(o.createButton("twitter"))};var r=function(t,i,o,r){var s=$.extend({},e);s.platform=i,s.text||(s.text=r.find("meta").filter('[property="article-title"]').attr("content")),s.via||(s.via=r.find("#twitterHandle").attr("content")),s.lang||(s.lang=r.find("html").attr("lang")),s.image||(s.image=r.find("meta").filter('[property="og:image"]').attr("content"));var c=s.text;if("twitter"==i){var l=26;if(s.via&&(l+=(" via @"+s.via).length),c.length+l>140){var d=c.length+l-140;c=c.substr(0,c.length-d)+"…"}}var u=a[i]({url:o,text:c,via:s.via});n(t,u)};this.share=function(t){var i=e.url?e.url:window.location.href,n=window.open("","share"+t,"toolbar=0, status=0, width=50, height=50, top=0, left=0");if(window.location.href!==i){var a=$('<div id="shareLoader"></div>'),o=$('<div style="position: fixed; left: 0; top: 0; right: 0; bottom: 0; background: rgba(0,0,0,0.5);"></div>'),s=$('<i class="fa fa-cog fa-spin" style="color: #fff"></i>');s.css({position:"fixed",top:"50%",left:"50%"}),o.append(s),a.append(o),$("body").append(a),$.ajax(i,{async:!0,success:function(e){a.remove(),r(n,t,i,$("<root/>").append(e))},error:function(){a.remove(),alert("Failed to load URL: "+i)}})}else r(n,t,i,$(document))},this.appendFacebook=function(){t.append(o.createButton("facebook"))},this.appendGoogle=function(){t.append(o.createButton("google-plus"))},this.appendLinkedIn=function(){t.append(o.createButton("linkin"))},this.appendPinterest=function(){t.append(o.createButton("pinterest"))}}var App,currencyRates={};$(function(){var t=$(window);new StickyFooter($("#container"),$("#footer")).update().bindOnResize(),(new ExternalLinkHandler).addTargetAttribute($("body")),(new PageTimer).logToConsole(),(new UIBindings).bindTooltips(),(new UIBindings).bindPopovers(),(new UIBindings).bindSlickCarousels(),(new UIBindings).bindSharing(),(new UIBindings).bindMasonary(),(new UIBindings).bindMagnificpopup(),(new UIBindings).bindSubmittingButtons(),(new Vertilize).init(),(new HeaderNav).init(),(new DatePicker).init(),(new BookNow).init(),(new UIModal).init(),(new FileUpload).init(),(new setPricing).init(),(new setGuest).init(),(new HomeBanners).init(),(new SelectColor).init(),(new SetCurrency).init(),(new Newsletter).init(),(new TogglePassword).init(),(new AffixButton).init(),setHeightFor(".media-heading.same-height"),setHeightFor(".media-media-summary.same-height"),t.on("resize",function(){(new AffixButton).init(),(new Vertilize).init()}),setTimeout(function(){$("#notifications-wrapper").hide()},2e5)});
//# sourceMappingURL=scripts.js.map
