<?PHP exit('Access Denied');?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<!--{eval hookscriptoutput('header');require_once DISCUZ_ROOT.'./template/comiis_app/comiis/php/comiis_lang.'.currentlang().'.php';}-->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="Cache-control" content="{if $_G['setting']['mobile'][mobilecachetime] > 0}{$_G['setting']['mobile'][mobilecachetime]}{else}no-cache{/if}" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimal-ui, minimum-scale=1.0, maximum-scale=1.0">
<meta name="apple-mobile-web-app-capable" content="yes" />
<meta name="apple-touch-fullscreen" content="yes">
<!--{if $comiis_app_switch['comiis_appname']}-->
<meta name="apple-mobile-web-app-title" content="{$comiis_app_switch['comiis_appname']}">
<!--{/if}-->
<meta name="apple-mobile-web-app-status-bar-style" content="black" />
<meta name="format-detection" content="telephone=no" />
<meta name="format-detection" content="email=no" />
<link rel="apple-touch-icon-precomposed" sizes="57x57" href="template/comiis_app/pic/icon57.png">
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="template/comiis_app/pic/icon114.png">
<link rel="apple-touch-icon-precomposed" sizes="152x152" href="template/comiis_app/pic/icon152.png">
<!--{if $comiis_app_switch['comiis_ucqqfull'] == 1}-->
<meta name="full-screen" content="yes">
<meta name="browsermode" content="application">
<meta name="x5-fullscreen" content="true">
<meta name="x5-page-mode" content="app">
<!--{/if}-->
<title>{$comiis_lang['tip18']} - <!--{if $comiis_app_switch['comiis_sitename']}-->$comiis_app_switch['comiis_sitename']<!--{else}-->$_G['setting']['sitename']<!--{/if}--></title>
<meta name="keywords" content="{if !empty($metakeywords)}{echo dhtmlspecialchars($metakeywords)}{/if}" />
<meta name="description" content="{if !empty($metadescription)}{echo dhtmlspecialchars($metadescription)}, {/if}{if $comiis_app_switch['comiis_sitename']}$comiis_app_switch['comiis_sitename']{else}$_G['setting']['bbname']{/if}" />
<link rel="shortcut icon" href="template/comiis_app/comiis/img/favicon.ico">
<script src="template/comiis_app/comiis/js/jquery.min.js?{VERHASH}"></script>
<script type="text/javascript">var STYLEID = '{STYLEID}', STATICURL = '{STATICURL}', IMGDIR = '{IMGDIR}', VERHASH = '{VERHASH}', charset = '{CHARSET}', discuz_uid = '$_G[uid]', cookiepre = '{$_G[config][cookie][cookiepre]}', cookiedomain = '{$_G[config][cookie][cookiedomain]}', cookiepath = '{$_G[config][cookie][cookiepath]}', showusercard = '{$_G[setting][showusercard]}', attackevasive = '{$_G[config][security][attackevasive]}', disallowfloat = '{$_G[setting][disallowfloat]}', creditnotice = '<!--{if $_G['setting']['creditnotice']}-->$_G['setting']['creditnames']<!--{/if}-->', defaultstyle = '$_G[style][defaultextstyle]', REPORTURL = '$_G[currenturl_encode]', SITEURL = '$_G[siteurl]', JSPATH = '$_G[setting][jspath]', comiis_pageid = '{$comiis_nav_ids}', comiis_page_start = 0, comiis_rlmenu = {$comiis_app_switch['comiis_scrolltop_ico']}, comiis_lrshow = {$comiis_app_switch['comiis_scrolltop_show']}, comiis_post_btnwz = {$comiis_app_switch['comiis_post_btnwz']}, comiis_footer = {if ($comiis_foot != 'no' || $comiis_open_footer) && !$comiis_closefooter && count($comiis_app_nav['mnav'])}1{else}0{/if}, comiis_open_wblink = {$comiis_app_switch['comiis_open_wblink']}, comiis_open_wblink_txt = '{$comiis_app_switch['comiis_open_wblink_txt']}', comiis_open_wblink_tip = {$comiis_app_switch['comiis_open_wblink_tip']};
var comiis_all_https = new Array({loop explode("\n",$comiis_app_switch['comiis_open_nwblink']) $v}'{echo trim($v);}', {/loop}window.location.host);
</script>
<link rel="stylesheet" href="template/comiis_app/comiis/css/comiis.css?{VERHASH}" type="text/css" media="all">
<style>.swiper-wrapper{height:100%}</style>
<script src="template/comiis_app/comiis/js/common{if currentlang() == 'SC_UTF8'}_u{/if}.js?{VERHASH}" charset="{CHARSET}"></script>
<!--{if $comiis_app_switch['comiis_share_style'] != 0 || $comiis_app_switch['comiis_leftnv'] == 1 || $comiis_app_switch['comiis_all_abg'] != 1}-->
<style>
<!--{if $comiis_app_switch['comiis_all_abg'] != 1}-->a:active {background:rgba(0,0,0,0.08);}<!--{/if}-->
<!--{if $comiis_app_switch['comiis_share_style'] != 0}-->.comiis_share_box #comiis_share a span {background-image:url(template/comiis_app/comiis/img/comiis_share_ico{if $comiis_app_switch['comiis_share_style'] == 1}01{elseif $comiis_app_switch['comiis_share_style'] == 2}02{/if}.png);}<!--{/if}-->
<!--{if $comiis_app_switch['comiis_leftnv'] == 1}-->#comiis_head {z-index:200;}<!--{/if}-->
</style>
<!--{/if}-->
<!--{if $comiis_app_switch['comiis_seohead']}-->$comiis_app_switch['comiis_seohead']<!--{/if}-->
<!--{hook/global_comiis_header_mobile}-->
</head>
<script src="template/comiis_app/comiis/js/comiis_swiper.min.js?{VERHASH}"></script>
<script src="template/comiis_app/comiis/js/comiis_touch.min.js?{VERHASH}"></script>
<!--{eval include_once DISCUZ_ROOT.'./template/comiis_app/comiis/php/comiis_viewthread_album.php'}-->
<!--{eval comiis_load('fdE4V5FmE9H5emowun', 'comiis_is_first,comiis_img_no,comiis_show_aid,comiis_thead_fav,comiis_my_recommend,comiis_show_aid_message,attachmentlist');}-->
<div class="comiis_share_box bg_e b_t comiis_showleftbox">
	<div id="comiis_share" class="bdsharebuttonbox"></div>
	<h2 class="bg_f f_g b_t comiis_share_box_close"><a href="javascript:;">{lang cancel}</a></h2>
</div>
<div class="comiis_share_tip"></div>
<script src="template/comiis_app/comiis/js/comiis_nativeShare.js"></script>
<!--{eval comiis_load('JaGxFk1RAXx3sGD1R8', 'comiis_img_no,comiis_is_first');}-->
{if $comiis_app_switch['comiis_share_html']}
	{$comiis_app_switch['comiis_share_html']}
{/if}
<script>
var comiis_wx_title, comiis_wx_description, comiis_wx_imgUrl ,comiis_wx_url;
comiis_wx_title = $('.picshow_foot h2 font').text();
comiis_wx_description = $('.picshow_foot .picshow_txt').text();
comiis_wx_imgUrl = $('.swiper-wrapper .swiper-slide-active').attr("aid-src");
comiis_wx_url = window.location.href.replace('&mobile=2', '');
<!--{if $comiis_app_switch['comiis_share_js']}-->
function comiis_user_share() {
	{$comiis_app_switch['comiis_share_js']}
}
<!--{/if}-->
</script>
<!--{if $comiis_app_switch['comiis_wxappid'] && $comiis_app_switch['comiis_wxappsecret']}-->
	<!--{eval include_once DISCUZ_ROOT.'./template/comiis_app/comiis/php/jssdk.php';}-->
	<script src="https://res.wx.qq.com/open/js/jweixin-1.0.0.js" type="text/javascript"></script>
	<script>
		$(document).ready(function() {
			wx.config({
				debug: 0,
				appId: '{$comiis_signPackage["appId"]}',
				timestamp: '{$comiis_signPackage["timestamp"]}',
				nonceStr: '{$comiis_signPackage["nonceStr"]}',
				signature: '{$comiis_signPackage["signature"]}',
				jsApiList: ['onMenuShareTimeline', 'onMenuShareAppMessage', 'onMenuShareQQ', 'onMenuShareWeibo', 'onMenuShareQZone', 'getLocation', 'openLocation']
			});
			wx.ready(function () {
				var comiis_wx_share_data = {
					title: comiis_wx_title,
					desc: comiis_wx_description,
					imgUrl: comiis_wx_imgUrl,
					link: comiis_wx_url
				}
				wx.onMenuShareAppMessage(comiis_wx_share_data);
				wx.onMenuShareQQ(comiis_wx_share_data);
				wx.onMenuShareWeibo(comiis_wx_share_data);
				wx.onMenuShareQZone(comiis_wx_share_data);
				wx.onMenuShareTimeline(comiis_wx_share_data);
			});
		});
	</script>
<!--{/if}-->
<!--{hook/global_footer_mobile}-->
</body>
</html>
<!--{eval updatesession();}-->
<!--{if defined('IN_MOBILE')}-->
	<!--{eval output();}-->
<!--{else}-->
	<!--{eval output_preview();}-->
<!--{/if}-->