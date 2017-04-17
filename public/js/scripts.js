"use strict";function PageTimer(){var t=this;this.getLoadTime=function(){var t=(new Date).getTime();window.performance=window.performance||window.mozPerformance||window.msPerformance||window.webkitPerformance||{};var i=performance.timing||{},e=t-i.navigationStart;return Math.round(e/10)/100},this.logToConsole=function(){$(window).on("load",function(){console&&console.info&&console.info("Client loaded in "+t.getLoadTime()+"s")})},this.append=function(i){$(window).on("load",function(){i.text(" | LT: "+t.getLoadTime()+"s")})}}function StickyFooter(t,i){var e=$(window);this.updateWrapperCSS=function(){var e=i.outerHeight();t.css({marginBottom:-1*e,paddingBottom:e})},this.bindOnResize=function(){return e.on("resize",this.updateWrapperCSS),this},this.update=function(){return this.updateWrapperCSS(),this}}function ExternalLinkHandler(){var t=this,i=document.location.hostname;this.matchInternalLink=[new RegExp("^https?://(.*?)"+i)],this.addTargetAttribute=function(i){i.find("a").filter('[href^="http://"], [href^="https://"]').each(function(){for(var i=$(this),e=i.attr("href"),n=!1,o=0;o<t.matchInternalLink.length;o++){var a=t.matchInternalLink[o];e.match(a)&&(n=!0)}n||i.attr("target","_blank").addClass("external-link")})}}function UIBindings(){this.bindTooltips=function(){$('[data-toggle="tooltip"]').tooltip()},this.bindPopovers=function(){$('[data-toggle="popover"]').popover()},this.bindSlickCarousels=function(){$("[data-slick-carousel-default]").slick({dots:!0,slidesToShow:1,slidesToScroll:1,arrows:!0,fade:!0,autoplay:!0,autoplaySpeed:3e3}),$("[data-slick-carousel-three]").slick({dots:!0,infinite:!0,slidesToShow:3,slidesToScroll:1,adaptiveHeight:!1,autoplay:!0,autoplaySpeed:3e3}),$('[data-toggle="slick-nav"]').on("click",function(t){t.preventDefault();var i=$(this).data("index");$("[data-slick-carousel-default]").slick("slickGoTo",i)})},this.bindSharing=function(){$("[data-share-default]").each(function(){var t=new ShareHandler($(this));t.appendFacebook(),t.appendTwitter()})},this.bindMagnificpopup=function(){$(".gallery-image").magnificPopup({type:"image",callbacks:{markupParse:function(t,i,e){i.description=e.el.data("description")}},gallery:{enabled:!0},image:{headerFit:!0,captionFit:!0,preserveHeaderAndCaptionWidth:!1,markup:'<div class="mfp-figure"><figure><header class="mfp-header"><div class="mfp-top-bar"><div class="mfp-title"></div><div class="mfp-close"></div><div class="mfp-decoration"></div></div></header><section class="mfp-content-container"><div class="mfp-img"></div></section><footer class="mfp-footer"><figcaption class="mfp-figcaption"><div class="mfp-bottom-bar-container"><div class="mfp-bottom-bar"><div class="mfp-counter"></div><div class="mfp-description"></div><div class="mfp-decoration"></div></div></div></figcaption></footer></figure></div>'}})},this.bindMasonary=function(){$("img").load(function(){$(".grid").masonry()}),$(".grid").masonry({itemSelector:".grid-item",columnWidth:".grid-sizer",gutter:5})},this.bindSubmittingButtons=function(){$(document).on("submit",function(){var t=$(this).find("[data-submit-text]"),i=$(this).find("[data-submitting-text]"),e=t.closest("button");i.removeClass("hide"),t.hide(),e.prop("disabled",!0)})}}function Notifications(){var t=$("#notifications-wrapper"),i=$("#notifications"),e=t.offset().top;this.bindOnScroll=function(){t.height(t.height()),$(window).on("scroll",function(){var t=$(window).scrollTop();t>e?i.addClass("fixed"):i.removeClass("fixed")})},this.bindCloseButton=function(){$(document).on("click",'[data-toggle="remove"]',function(i){i.preventDefault();var e=$(this).closest(".notification");e.fadeOut(250,function(){t.height("auto"),t.height(t.height())})})},this.init=function(){this.bindOnScroll(),this.bindCloseButton()}}function Vertilize(){this.init=function(){var t={byRow:!0,property:"height",target:null,remove:!1};$(".same-height").matchHeight(t)}}function HomeBanners(){this.init=function(){var t=$("#current_url").val();if($(window).width()>=992&&("blog"==t||""==t||"become-a-local"==t)){var i=$(".carousel-inner").first(),e=$(".carousel-caption"),n=$(".home-btn-block"),o=250;i>100&&(resolvedCaption=!0),console.log("Index slicer height: "+i.height()),$(".search-form").css({top:(i.height()-o)/2+"px"}),e.css({top:(i.height()-o)/2-24+"px"}),n.css({top:(i.height()-o)/2+200+"px"}),0==resolvedCaption&&setTimeout(function(){(new HomeBanners).init()},3e3)}}}function HeaderNav(){var t=$(".top-yellow-bg .container");this.init=function(){$.get("/local/auth/nav",function(i){t.children(".top-nav").remove(),t.append(i)});var i=$("#url").val();return"undefined"!==i&&void 0!==i&&void $(".navbar-nav li a").each(function(){$(this).parent().removeClass("active"),$(this).attr("href")===i&&$(this).parent().addClass("active")})}}function DatePicker(){this.init=function(){var t="",i="";window.onclick=function(t){"duration"!==t.target.id&&$(".datetime-group").hide()};var e=$("#datepicker").attr("data-days-active"),n=$("#datepicker").attr("data-days-inactive");console.log("some data is coming through now"),console.log(n),$("#datepicker").datepicker({daysOfWeekDisabled:n,daysOfWeekHighlighted:e,templates:{leftArrow:"&nbsp;",rightArrow:"&nbsp;"}}),$("#datepicker").datepicker().on("changeDate",function(t){var i=$(".datepicker-switch").html(),e=$(".table-condensed td.active").html(),n=$("#experience-id").val(),o=e+" "+i;console.log("datepicker switch: "+i),console.log("date: "+e),$(".available-times").attr("date",o),$(".times-row").hide();var a={date:o,experience_id:n};$.post("/local/booking/times",a).done(function(t){console.log("times html::::"),console.log(t),$(".times-row").html(t).show()}),$("#schedule-modal").modal("show"),(new BookNow).init()}),$(".datetime-input").click(function(){$(".datetime-group").show()}),$(".date-range").datepicker({templates:{leftArrow:"&nbsp;",rightArrow:"&nbsp;"},toValue:function(t,i,e){var n=new Date(t);return n.setDate(n.getDate()+7),new Date(n)}}),$(".date-range").datepicker().on("changeDate",function(e){var n=parseInt(e.timeStamp/1e3);$.get("/local/date/"+n,function(t){$("#"+$(this).attr("data-id")).val(t.date)}),t=$("#date-to").val(),i=$("#date-from").val(),$(".datetime-input").val(i+" - "+t)})}}function BookNow(){this.init=function(){$(".book-now").click(function(){var t=$(this).attr("href"),i=$(".available-times").attr("timestamp");return window.location=t+"/"+i,!1})}}function UIModal(){this.init=function(){$(".notice-modal").modal("show"),$(".btn-modal").click(function(){return $("#"+$(this).attr("modal-id")).modal("show"),!1}),$(".btn-close").click(function(){return $("#"+$(this).attr("modal-id")).modal("hide"),!1})}}function ShareHandler(t){var i={url:t.data("url"),text:t.data("text")},e=function(t){var i={};return $.each(t,function(t,e){e&&(i[t]=e)}),$.param(i)},n=function(t,i){var e=Math.round((screen.height-i.height)/2),n=Math.round((screen.width-i.width)/2);t.location.href=i.url,t.focus(),t.resizeTo(i.width,i.height),t.moveTo(n,e)},o={"google-plus":function(t){return{url:"https://plus.google.com/share?"+e({hl:t.lang,url:t.url})}},facebook:function(t){return{url:"http://www.facebook.com/sharer/sharer.php?"+e({u:t.url,t:t.text}),width:900,height:500}},twitter:function(t){return{url:"https://twitter.com/intent/tweet?"+e({text:t.text,url:t.url,via:t.via}),width:650,height:360}},linkedin:function(t){return{url:"https://www.linkedin.com/cws/share?url="+e({url:t.url,isFramed:"true"}),width:550,height:550}},pinterest:function(t){return{url:"http://pinterest.com/pin/create/button/?url="+e({url:t.url,description:t.text,media:t.image}),width:700,height:300}}},a=this;this.createButton=function(i){var e=$('<a class="share-btn"><i class="fa fa-'+i+' fa-lg" ></i></a>');return e.css({cursor:"pointer"}),e.on("click",function(t){t.preventDefault(),a.share(i)}),t.append(e),e},this.appendTwitter=function(){t.append(a.createButton("twitter"))};var r=function(t,e,a,r){var s=$.extend({},i);s.platform=e,s.text||(s.text=r.find("meta").filter('[property="article-title"]').attr("content")),s.via||(s.via=r.find("#twitterHandle").attr("content")),s.lang||(s.lang=r.find("html").attr("lang")),s.image||(s.image=r.find("meta").filter('[property="og:image"]').attr("content"));var c=s.text;if("twitter"==e){var d=26;if(s.via&&(d+=(" via @"+s.via).length),c.length+d>140){var l=c.length+d-140;c=c.substr(0,c.length-l)+"…"}}var u=o[e]({url:a,text:c,via:s.via});n(t,u)};this.share=function(t){var e=i.url?i.url:window.location.href,n=window.open("","share"+t,"toolbar=0, status=0, width=50, height=50, top=0, left=0");if(window.location.href!==e){var o=$('<div id="shareLoader"></div>'),a=$('<div style="position: fixed; left: 0; top: 0; right: 0; bottom: 0; background: rgba(0,0,0,0.5);"></div>'),s=$('<i class="fa fa-cog fa-spin" style="color: #fff"></i>');s.css({position:"fixed",top:"50%",left:"50%"}),a.append(s),o.append(a),$("body").append(o),$.ajax(e,{async:!0,success:function(i){o.remove(),r(n,t,e,$("<root/>").append(i))},error:function(){o.remove(),alert("Failed to load URL: "+e)}})}else r(n,t,e,$(document))},this.appendFacebook=function(){t.append(a.createButton("facebook"))},this.appendGoogle=function(){t.append(a.createButton("google-plus"))},this.appendLinkedIn=function(){t.append(a.createButton("linkin"))},this.appendPinterest=function(){t.append(a.createButton("pinterest"))}}var App,resolvedCaption=!1;$(function(){var t=$(window);new StickyFooter($("#container"),$("#footer")).update().bindOnResize(),(new ExternalLinkHandler).addTargetAttribute($("body")),(new PageTimer).logToConsole(),(new UIBindings).bindTooltips(),(new UIBindings).bindPopovers(),(new UIBindings).bindSlickCarousels(),(new UIBindings).bindSharing(),(new UIBindings).bindMasonary(),(new UIBindings).bindMagnificpopup(),(new UIBindings).bindSubmittingButtons(),(new Notifications).init(),(new Vertilize).init(),(new HeaderNav).init(),(new DatePicker).init(),(new BookNow).init(),(new UIModal).init(),(new HomeBanners).init(),t.on("resize",function(){(new Vertilize).init()}),setTimeout(function(){$("#notifications-wrapper").hide()},2e5)});
//# sourceMappingURL=scripts.js.map
