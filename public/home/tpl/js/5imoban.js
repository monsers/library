/*
	我爱模版：http://www.5imoban.net
	design by z.k
*/
// JavaScript Document
var timer;
$(function(){
//关闭IE6提示
$(".ifie6_x").click(function(){$("#ifie6").hide();});
//fixed导航,返回顶部
$(window).scroll(function(e){var s = $(document).scrollTop();if(s > 219){$("#fixed_out").show();}else{$("#fixed_out").hide();};var wh = $(window).height();var dh = $(document).height();if(s >= (wh)){$("#totop_go").show()}else{$("#totop_go").hide()};});
$("#totop_go").click(function(){$("body,html").animate({'scrollTop':0},500);});
//首页精美网站欣赏case特效
$(".index_list5 li").hover(function(){$(this).children(".case_img").animate({top:"0px"},300);$(this).children(".case_mask").animate({top:"15px"},300).show();$(this).children(".case_zoom").animate({top:"60px"},300).show();},function(){$(this).children(".case_img").stop(true,false).animate({top:"20px"},300);$(this).children(".case_mask").stop(true,false).animate({top:"35px"},300).hide();$(this).children(".case_zoom").stop(true,false).animate({top:"80px"},300).hide();});
//链接文字渐变色
$(".colorgray").mouseover(function(){var _this = $(this);timer = setTimeout(function(){_this.animate({color:"#2997a6"},300)},50);}).mouseout(function(){var _this = $(this);if(timer){clearTimeout(timer);_this.animate({color:"#333"},300);};});
//图片半透明效果
$(".opacityimg").hover(function(){$(this).animate({opacity:0.618},300)},function(){$(this).stop(true,false).animate({opacity:1},300)});
//搜索框获取焦点后的变化
$("#searchbox form input[type=text]").focus(function(){$("#searchbox form input[type=submit]").css("background-image","url(http://www.5imoban.net/tpl/images/search_ico_focus.png)");if($("#keywords").val() == ""){$(this).prev().animate({opacity:0.3},500);$(this).animate({width:"250px"},500);}}).blur(function(){$("#searchbox form input[type=submit]").css("background-image","url(http://www.5imoban.net/tpl/images/search_ico_blur.png)");if($("#keywords").val()==""){$(this).prev().animate({opacity:1},500);$(this).animate({width:"100px"},500);}}).keyup(function(){$(this).prev().animate({opacity:0},1);});
//导航栏tab选项卡
$("#nav_tab li").each(function(index){$(this).hover(function(){$(this).addClass("nav_tab_current").siblings().removeClass("nav_tab_current");$("#nav_con dd").removeClass("nav_con_fir").eq(index).show().siblings().hide();});});
//CSS模版index页面的图片列表特效
$(".index_css_list li").hover(function (){$(this).children("div").animate({top:"2px"},300);},function(){$(this).children("div").stop(true,false).animate({top:"165px"},300);});
//sidebar
$(".active").parents().next().slideDown('normal').parents().siblings().children(".sidebar_body").slideUp();$(".sidebar_title span").click(function(){var sidebar_title = $('.sidebar_title span'),sidebar_body = $('.sidebar_body');if ($(this).attr('class') != 'active'){sidebar_body.slideUp('normal');$(this).parents('.sidebar_title').next().stop(true,true).slideToggle('normal');sidebar_title.removeClass('active');$(this).addClass('active');}})
//文章页大图article_bigimg
/*$("#main_content_body img").click(function(){var _t = $(this);var _dh = $(document).height();var _st = $(document).scrollTop();var _src = _t.attr("src");$("#article_bigimg div").css({"margin-top":_st+50+"px"}).append("<img src="+_src+">");$("#article_bigimg").css({"height":_dh+"px"}).show();});$("#article_bigimg").click(function(){$("#article_bigimg div").empty();$(this).hide();});*/
$("#main_content_body img").click(function() {
    var _t = $(this);
	var _dh = $(document).height();
    var _st = $(document).scrollTop();
    var _src = _t.attr("src");
    $("#article_bigimg div").css({
        "margin-top": _st + 50 + "px"
    }).append("<img src=" + _src + ">");
    $("#article_bigimg").css({"height":_dh+"px"}).show();
});
$("#article_bigimg").click(function() {
    $("#article_bigimg div").empty();
    $(this).hide();
});

//判断下载按钮和预览按钮是否为空链接
if($("#content_down_1").attr("href") == "#" || $("#content_down_1").attr("href") == ""){$("#content_down_1").remove();}
if($("#content_down_2").attr("href") == "#" || $("#content_down_2").attr("href") == ""){$("#content_down_2").remove();}
if($("#content_down_3").attr("href") == "#" || $("#content_down_3").attr("href") == ""){$("#content_down_3").remove();}

})
