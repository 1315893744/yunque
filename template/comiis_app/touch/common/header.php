<?PHP exit('Access Denied');?>
<!--{eval global $comiis_lang, $comiis_app_switch;require_once DISCUZ_ROOT.'./template/comiis_app/comiis/php/comiis_lang.'.currentlang().'.php';}-->
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<!--{if $comiis_app_switch['comiis_header_show'] == 2}-->
{eval $comiis_isweixin = 1;}
<!--{elseif $comiis_app_switch['comiis_header_show'] == 0 || $comiis_app_switch['comiis_header_show'] == 1}-->
{eval $comiis_isweixin = 0;}
<!--{/if}-->
<!--{subtemplate common/comiis_title}-->
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
<link rel="icon" sizes="114x114" href="template/comiis_app/pic/icon114.png" /> 
<!--{if $comiis_app_switch['comiis_ucqqfull'] == 1}-->
<meta name="full-screen" content="yes">
<meta name="browsermode" content="application">
<meta name="x5-fullscreen" content="true">
<meta name="x5-page-mode" content="app">
<!--{/if}-->
<!--{if $_G['basescript'] == 'home' && CURMODULE == 'space' && $_GET['do'] == 'profile' && $_GET['mycenter'] == 1}-->
<meta http-equiv="cache-control" content="max-age=0" />
<meta http-equiv="expires" content="0" />
<meta http-equiv="expires" content="Tue, 01 Jan 1986 1:00:00 GMT" />
<meta http-equiv="pragma" content="no-cache" />
<meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
<!--{/if}-->
<!--{if $_G['basescript']=='forum' && CURMODULE=='viewthread'}-->
<!--{eval $comiis_view_pic = $_G['siteurl'].'./template/comiis_app/pic/icon152.png';}-->
<!--{loop $postlist $post}-->
<!--{if count($post[attachments])}-->
<!--{eval $comiis_view_pic_array = current($post[attachments]);$comiis_view_pic = $_G['siteurl'].$comiis_view_pic_array['url'].$comiis_view_pic_array['attachment'];}-->
<meta property="og:image" content="{$comiis_view_pic}">
<meta itemprop="image" content="{$comiis_view_pic}">
<!--{eval break;}-->
<!--{/if}-->
<!--{/loop}-->
<!--{/if}-->
<base href="{$_G['siteurl']}" />
<title><!--{if !empty($navtitle)}-->$navtitle<!--{/if}--><!--{if $comiis_app_switch['comiis_sitename'] || $_G['setting']['sitename']}--> - <!--{/if}--><!--{if $comiis_app_switch['comiis_sitename']}-->$comiis_app_switch['comiis_sitename']<!--{else}-->$_G['setting']['sitename']<!--{/if}--></title>
<meta name="keywords" content="{if !empty($metakeywords)}{echo dhtmlspecialchars($metakeywords)}{/if}" />
<meta name="description" content="{if !empty($metadescription)}{echo dhtmlspecialchars($metadescription)}, {/if}{if $comiis_app_switch['comiis_sitename']}$comiis_app_switch['comiis_sitename']{else}$_G['setting']['bbname']{/if}" />
<link rel="shortcut icon" href="template/comiis_app/comiis/img/favicon.ico">
<script src="template/comiis_app/comiis/js/jquery.min.js?{VERHASH}"></script>
<script type="text/javascript">var STYLEID = '{STYLEID}', STATICURL = '{STATICURL}', IMGDIR = '{IMGDIR}', VERHASH = '{VERHASH}', charset = '{CHARSET}', discuz_uid = '$_G[uid]', cookiepre = '{$_G[config][cookie][cookiepre]}', cookiedomain = '{$_G[config][cookie][cookiedomain]}', cookiepath = '{$_G[config][cookie][cookiepath]}', showusercard = '{$_G[setting][showusercard]}', attackevasive = '{$_G[config][security][attackevasive]}', disallowfloat = '{$_G[setting][disallowfloat]}', creditnotice = '<!--{if $_G['setting']['creditnotice']}-->$_G['setting']['creditnames']<!--{/if}-->', defaultstyle = '$_G[style][defaultextstyle]', REPORTURL = '$_G[currenturl_encode]', SITEURL = '$_G[siteurl]', JSPATH = '$_G[setting][jspath]', comiis_pageid = '{$comiis_nav_ids}', comiis_page_start = 0, comiis_rlmenu = {echo $comiis_app_switch['comiis_scrolltop_ico'] ? intval($comiis_app_switch['comiis_scrolltop_ico']) : 0;}, comiis_lrshow = {echo $comiis_app_switch['comiis_scrolltop_show'] ? intval($comiis_app_switch['comiis_scrolltop_show']) : 0;}, comiis_post_btnwz = {echo $comiis_app_switch['comiis_post_btnwz'] ? intval($comiis_app_switch['comiis_post_btnwz']) : 0;}, comiis_footer = {if ($comiis_foot != 'no' || $comiis_open_footer) && !$comiis_closefooter && count($comiis_app_nav['mnav'])}1{else}0{/if}, comiis_open_wblink = {echo $comiis_app_switch['comiis_open_wblink'] ? intval($comiis_app_switch['comiis_open_wblink']) : 0;}, comiis_open_wblink_txt = '{$comiis_app_switch['comiis_open_wblink_txt']}', comiis_open_wblink_tip = {echo $comiis_app_switch['comiis_open_wblink_tip'] ? intval($comiis_app_switch['comiis_open_wblink_tip']) : 0;};
var comiis_all_https = new Array({loop explode("\n",$comiis_app_switch['comiis_open_nwblink']) $v}{if strlen(trim($v)) > 1}'{echo trim($v);}', {/if}{/loop}window.location.host);
</script>
<link rel="stylesheet" href="template/comiis_app/comiis/css/comiis.css?{VERHASH}" type="text/css" media="all">
<script src="template/comiis_app/comiis/js/common{if currentlang() == 'SC_UTF8' || currentlang() == 'TC_UTF8'}_u{/if}.js?{VERHASH}" charset="{CHARSET}"></script>
<!--{if $comiis_app_switch['comiis_loadimg']}--><script type="text/javascript" src="template/comiis_app/comiis/js/jquery.lazyload.min.js"></script><!--{/if}-->
<script>
var comiis_nvscroll = {if $comiis_isweixin != 1}{if $comiis_app_switch['comiis_header_show'] == 1}1{else}0{/if}{else}0{/if};
var comiis_isweixin = '$comiis_isweixin';
</script>
<!--{if $comiis_app_switch['comiis_share_style'] != 0 || $comiis_app_switch['comiis_leftnv'] == 1 || $comiis_app_switch['comiis_all_abg'] != 1 || $comiis_app_switch['comiis_iphone_font'] == 1}-->
<style>
<!--{if $comiis_app_switch['comiis_iphone_font'] == 1}-->*, caption, th, h1, h2, h3, h4, h5, h6 {font-weight:400}<!--{/if}-->
<!--{if $comiis_app_switch['comiis_all_abg'] != 1}-->a:active {background:rgba(0,0,0,0.08)}<!--{/if}-->
<!--{if $comiis_app_switch['comiis_share_style'] != 0}-->.comiis_share_box #comiis_share a span {background-image:url(template/comiis_app/comiis/img/comiis_share_ico{if $comiis_app_switch['comiis_share_style'] == 1}01{elseif $comiis_app_switch['comiis_share_style'] == 2}02{/if}.png)}<!--{/if}-->
<!--{if $comiis_app_switch['comiis_leftnv'] == 1}-->#comiis_head {z-index:200}<!--{/if}-->
</style>
<!--{/if}-->
<!--{if $comiis_app_switch['comiis_seohead']}-->$comiis_app_switch['comiis_seohead']<!--{/if}-->
<!--{hook/global_comiis_header_mobile}-->
<!--{eval $_G['comiis_new'] = 3;}-->
</head>
<!--{template common/comiis_header}-->
<!--{if $_G['basescript'] == 'member' && CURMODULE == 'logging' && $comiis_isweixin == 1}-->
    <!--{if $_GET['lostpasswd'] == 'yes' && $comiis_app_switch['comiis_reg_zmtxt']}-->
        <!--{eval $comiis_bg = 1;}-->
    <!--{elseif $comiis_app_switch['comiis_reg_dltxt'] && $_GET['lostpasswd'] != 'yes'}-->
        <!--{eval $comiis_bg = 1;}-->
    <!--{/if}-->
<!--{elseif $_G['basescript'] == 'member' && CURMODULE == 'register' && $_GET['mod']!='connect' && $comiis_isweixin == 1 && $comiis_app_switch['comiis_reg_regtxt']}-->
    <!--{eval $comiis_bg = 1;}-->
<!--{elseif $comiis_app_switch['comiis_reg_zmtxt'] && $comiis_isweixin == 1 && $_G['basescript'] == 'member' && $_GET['mod'] == 'getpasswd'}-->
    <!--{eval $comiis_bg = 1;}-->
<!--{/if}-->
<body id="{$_G[basescript]}" class="comiis_bodybg<!--{if $comiis_bg==1}--> bg_f<!--{/if}--> pg_{CURMODULE}<!--{if $comiis_foot != 'no' && $comiis_open_footer && ($_G['basescript'] == 'forum' && CURMODULE == 'forumdisplay')}--> comiis_showfoot<!--{/if}--> ugcbh">
<!--{if $comiis_app_switch['comiis_loadbox'] != 1}-->
<div class="comiis_loadings">
	<div class="comiis_loadings_icon">
		<i class="weui-loading weui-icon_toast"></i>
		<p class="comiis_loadings_content">{$comiis_lang['loader']}</p>
	</div>
</div>
<script>
function comiis_loadings() {
	$('.comiis_loadings').fadeOut(500);
}
(function($, window, undefined) {
	$(window).ready(function () {
		comiis_loadings();
	});
	window.onerror = function () {
		comiis_loadings();
	};
	setTimeout(function() {
		comiis_loadings();
	}, 1500);
})(jQuery, window);
</script>
<!--{/if}-->
<!--{if !$_G['cookie']['comiis_fullscreen_cookies'] && (($_G['basescript'] == 'forum' && CURMODULE == 'index') || $comiis_data['default'] == 1) && $comiis_app_switch['comiis_fullscreen']}-->
	<style>{$comiis_app_switch['comiis_fullscreen_css']}</style>
	<div class="comiis_fullscreen bg_f">
		<a href="{$comiis_app_switch['comiis_fullscreen_url']}" class="comiis_fullscreen_img"><img src="{$comiis_app_switch['comiis_fullscreen_img']}"></a>
		<!--{if $comiis_app_switch['comiis_fullscreen_nologo'] !=1}-->
		<a href="{$comiis_app_switch['comiis_fullscreen_logourl']}" class="comiis_fullscreen_logo">
			<img src="{$comiis_app_switch['comiis_fullscreen_logoimg']}">
			<p class="f_d">{$comiis_app_switch['comiis_fullscreen_copy']}</p>
		</a>
		<!--{/if}-->
		<div class="comiis_fullscreen_time">{echo str_replace(array('[timenum]'), array($comiis_app_switch['comiis_fullscreen_time']), $comiis_app_switch['comiis_fullscreen_djs']);}</div>
	</div>
	<script type="text/javascript">
	setcookie('comiis_fullscreen_cookies', '1', {$comiis_app_switch['comiis_fullscreen_showtime']}, '', '', '');
	var comiis_fullscreen_title = document.title;
	document.title = '{$comiis_app_switch['comiis_fullscreen_title']}';
	var num = {$comiis_app_switch['comiis_fullscreen_time']};
	var interval = setInterval(function(){
		if(num == 0){
			comiis_fullscreen_close();
		}
		num--;
		$('.comiis_fullscreen_time span').html(num);
	},1000);
	$('.comiis_fullscreen_time').on('click', function(e) {
		comiis_fullscreen_close();
	});
	function comiis_fullscreen_close() {
		document.title = comiis_fullscreen_title;
		$('.comiis_fullscreen').hide();
		clearInterval(interval);
	}
	</script>
<!--{/if}-->
<div class="comiis_body">
	<!--{if $comiis_app_switch['comiis_leftnv'] != 2}-->
        <!--{eval loadcache('usergroups');}-->
        <div class="comiis_leftmenubg" style="display:none"></div>
	<!--{/if}-->
    <!--{if $comiis_app_switch['comiis_leftnv'] != 1 && $comiis_app_switch['comiis_leftnv'] != 2}-->
        <div class="comiis_sidenv_box{if $comiis_app_switch['comiis_leftnv_list'] == 1} comiis_sidenv_boxv1{/if}" style="display:none;">
            <div class="comiis_sidenv_top{if $comiis_app_switch['comiis_leftnv_top'] == 1} comiis_sidenv_topv1{/if} f_f">
            <!--{if $_G['uid']}-->
                <!--{if $comiis_app_switch['comiis_leftnv_top'] == 0}--><div class="sidenv_edit"><i class="comiis_font fyy">&#xe63e;</i></div><!--{/if}-->
                <div class="sidenv_exit"><a href="member.php?mod=logging&action=logout&formhash={FORMHASH}"><span><i class="comiis_font">&#xe61c;</i><!--{if $comiis_app_switch['comiis_leftnv_top'] == 0}-->{lang logout}<!--{/if}--></span></a></div>
                <a href="home.php?mod=space&uid=$_G[uid]&do=profile&mycenter=1" class="sidenv_user">
                  {if $_G[member][newpm] || $_G[member][newprompt]}<span class="sidenv_num bg_del f_f">{echo $_G[member][newpm] + $_G[member][newprompt]}</span>{/if}				
                  <em><img src="{echo avatar($_G[uid],middle,true)}?{echo time();}"></em>
                  <!--{if $comiis_app_switch['comiis_leftnv_top'] == 1}-->
                  <p class="user_tit fyy">{$_G[member][username]}</p>
                  <p class="mt5"><span class="user_lev bg_0"{if $_G['cache']['usergroups'][$_G[member]['groupid']]['color']} style="background:$_G['cache']['usergroups'][$_G[member]['groupid']]['color'] !important;color:#fff !important"{/if}>{if $comiis_app_switch['comiis_lev_txt']}{$comiis_app_switch['comiis_lev_txt']}{else}Lv.{/if}{$_G[group]['stars']}</span></p>
                  <!--{else}-->
                  <p><span class="user_tit fyy">{$_G[member][username]}</span><span class="user_lev bg_0"{if $_G['cache']['usergroups'][$_G[member]['groupid']]['color']} style="background:$_G['cache']['usergroups'][$_G[member]['groupid']]['color'] !important;color:#fff !important"{/if}>{if $comiis_app_switch['comiis_lev_txt']}{$comiis_app_switch['comiis_lev_txt']}{else}Lv.{/if}{$_G[group]['stars']}</span></p>
                  <p class="fyy mt5"><span>{echo strip_tags($_G[group][grouptitle]);}</span><span>{lang credits}: $_G[member][credits]</span></p>
                  <!--{/if}-->
                </a>
                <!--{elseif !$_G[connectguest]}-->			
                <!--{if $comiis_app_switch['comiis_leftnv_top'] == 0}-->
                <div class="sidenv_exit"><a href="member.php?mod={$_G[setting][regname]}"><span><i class="comiis_font">&#xe61c;</i>{$_G['setting']['reglinkname']}</span></a></div>
                <!--{/if}-->
                <a href="member.php?mod=logging&action=login" class="sidenv_user">
                  <em><!--{avatar(0,middle)}--></em>
                  <p><span class="user_tit fyy">
                  <script language="javascript">					
                    var myDate = new Date();
                    var i = myDate.getHours();
                    if(i < 12)
                    document.write("{$comiis_lang['tip88']}");
                    else if(i >=12 && i < 14)
                    document.write("{$comiis_lang['tip89']}");
                    else if(i >= 14 && i < 18)
                    document.write("{$comiis_lang['tip90']}");
                    else if(i >= 18)
                    document.write("{$comiis_lang['tip91']}");					
                    </script> {$comiis_lang['tip92']}<!--{if $comiis_app_switch['comiis_leftnv_top'] == 1}-->{$comiis_lang['tip93']}<!--{/if}--></span></p>
                  <p class="fyy mt5">{$comiis_lang['tip94']}</p>
                </a>
             <!--{else}-->
                <!--{if $comiis_app_switch['comiis_leftnv_top'] == 0}--><div class="sidenv_edit"><i class="comiis_font fyy">&#xe63e;</i></div><!--{/if}-->
                <div class="sidenv_exit"><a href="member.php?mod=logging&action=logout&formhash={FORMHASH}"><span><i class="comiis_font">&#xe61c;</i><!--{if $comiis_app_switch['comiis_leftnv_top'] == 0}-->{lang logout}<!--{/if}--></span></a></div>
                <a href="member.php?mod=connect" class="sidenv_user">
                  {if $_G[member][newpm] || $_G[member][newprompt]}<span class="sidenv_num bg_del f_f">{echo $_G[member][newpm] + $_G[member][newprompt]}</span>{/if}				
                  <em><img src="{echo avatar(0,middle,true)}?{echo time();}"></em>
                  <!--{if $comiis_app_switch['comiis_leftnv_top'] == 1}-->
                  <p class="user_tit fyy">{$_G[member][username]}</p>
                  <p class="fyy mt5">{echo strip_tags($_G[group][grouptitle]);}, {$comiis_lang['reg21']}</p>
                  <!--{else}-->
                  <p><span class="user_tit fyy">{$_G[member][username]}</span><span class="comiis_tm">{echo strip_tags($_G[group][grouptitle]);}</span></p>
                  <p class="fyy mt5"><span>{$comiis_lang['reg21']}</span></p>
                  <!--{/if}-->
                </a>
            <!--{/if}-->
                <!--{if $comiis_app_switch['comiis_svg'] != 1}--><div class="comiis_svg_box">{if $comiis_app_switch['comiis_leftnv_list'] == 1}<div class="comiis_svg_c"></div><div class="comiis_svg_d"></div>{else}<div class="comiis_svg_a"></div><div class="comiis_svg_b"></div>{/if}</div><!--{/if}-->
            </div>
            <!--{if !empty($_G['setting']['pluginhooks']['global_misign_mobile']) && $_G['uid']}-->
                <style>body .comiis_sidenv_box .sidenv_li {height:-moz-calc(100% - 200px);height:-webkit-calc(100% - 200px);height:calc(100% - 200px);}</style>
                <div class="comiis_k_misign{if $comiis_app_switch['comiis_leftnv_list'] == 1}v1{/if}">
                    <!--{hook/global_misign_mobile}-->
                </div>
            <!--{/if}-->
            <div class="sidenv_li{if $comiis_app_switch['comiis_leftnv_list'] == 1} sidenv_liv1 f_f{/if}">			
                <ul class="comiis_left_Touch bhrfw">
                    <!--{loop $comiis_app_nav['lnav'] $temp}-->
                        <li class="comiis_left_Touch"><a href="$temp['url']" class="comiis_left_Touch"><i class="comiis_font comiis_left_Touch{if !$temp['bgcolor']} f_c{/if}"{if $temp['bgcolor']} style="color:{$temp['bgcolor']};"{/if}>{if $temp['icon']}&#x{$temp['icon']};{else}&#xe633;{/if}</i>$temp['name']</a></li>
                    <!--{/loop}-->
                    <!--{if $_G['uid'] && getstatus($_G['member']['allowadmincp'], 1)}-->
                        <li class="comiis_left_Touch"><a href="admin.php?mobile=no" class="comiis_left_Touch"><i class="comiis_font comiis_left_Touch f_0">&#xe612;</i>{$comiis_lang['tip304']} {$comiis_lang['tip305']}</a></li>
                    <!--{/if}-->
                    <li class="comiis_left_Touch styli_h10"></li>
                </ul>
            </div>
        </div>
    <!--{elseif $comiis_app_switch['comiis_leftnv'] == 1}-->
        <div class="comiis_gobtn_tbox{if $comiis_app_switch['comiis_leftnv_list'] == 1} comiis_sidenv_boxv1 f_f{else} bg_f{/if} cl">
            <!--{if $comiis_app_switch['comiis_leftnv_user'] != 1}-->
            <div class="comiis_gobtn_user">
                <div class="comiis_sidenv_top{if $comiis_app_switch['comiis_leftnv_top'] == 1} comiis_sidenv_topv1{/if} f_f">
                <!--{if $_G['uid']}-->
                    <div class="sidenv_exit"><a href="member.php?mod=logging&action=logout&formhash={FORMHASH}"><span><i class="comiis_font">&#xe61c;</i><!--{if $comiis_app_switch['comiis_leftnv_top'] == 0}-->{lang logout}<!--{/if}--></span></a></div>
                    <a href="home.php?mod=space&uid=$_G[uid]&do=profile&mycenter=1" class="sidenv_user">              		
                      <em><img src="{echo avatar($_G[uid],middle,true)}?{echo time();}">{if $_G[member][newpm] || $_G[member][newprompt]}<span class="sidenv_num bg_del f_f">{echo $_G[member][newpm] + $_G[member][newprompt]}</span>{/if}		</em>
                      <!--{if $comiis_app_switch['comiis_leftnv_top'] == 1}-->
                      <p class="user_tit fyy">{$_G[member][username]}</p>
                      <p><span class="user_lev bg_0"{if $_G['cache']['usergroups'][$_G[member]['groupid']]['color']} style="background:$_G['cache']['usergroups'][$_G[member]['groupid']]['color'] !important;color:#fff !important"{/if}>{if $comiis_app_switch['comiis_lev_txt']}{$comiis_app_switch['comiis_lev_txt']}{else}Lv.{/if}{$_G[group]['stars']}</span><span class="fyy">{echo strip_tags($_G[group][grouptitle]);} {lang credits}: $_G[member][credits]</span></p>
                      <!--{else}-->
                      <p class="mt5"><span class="user_tit fyy">{$_G[member][username]}</span><span class="user_lev bg_0"{if $_G['cache']['usergroups'][$_G[member]['groupid']]['color']} style="background:$_G['cache']['usergroups'][$_G[member]['groupid']]['color'] !important;color:#fff !important"{/if}>{if $comiis_app_switch['comiis_lev_txt']}{$comiis_app_switch['comiis_lev_txt']}{else}Lv.{/if}{$_G[group]['stars']}</span></p>
                      <p class="fyy"><span>{echo strip_tags($_G[group][grouptitle]);}</span><span>{lang credits}: $_G[member][credits]</span></p>
                      <!--{/if}-->
                    </a>
                    <!--{elseif !$_G[connectguest]}-->			
                    <!--{if $comiis_app_switch['comiis_leftnv_top'] == 0}-->
                    <div class="sidenv_exit"><a href="member.php?mod={$_G[setting][regname]}"><span><i class="comiis_font">&#xe61c;</i>{$_G['setting']['reglinkname']}</span></a></div>
                    <!--{/if}-->
                    <a href="member.php?mod=logging&action=login" class="sidenv_user">
                      <em><!--{avatar(0,middle)}--></em>
                      <p class="mt5"><span class="user_tit fyy">
                      <script language="javascript">					
                        var myDate = new Date();
                        var i = myDate.getHours();
                        if(i < 12)
                        document.write("{$comiis_lang['tip88']}");
                        else if(i >=12 && i < 14)
                        document.write("{$comiis_lang['tip89']}");
                        else if(i >= 14 && i < 18)
                        document.write("{$comiis_lang['tip90']}");
                        else if(i >= 18)
                        document.write("{$comiis_lang['tip91']}");					
                        </script> {$comiis_lang['tip92']}<!--{if $comiis_app_switch['comiis_leftnv_top'] == 1}-->{$comiis_lang['tip93']}<!--{/if}--></span></p>
                      <p class="fyy">{$comiis_lang['tip94']}</p>
                    </a>
                 <!--{else}-->
                    <!--{if $comiis_app_switch['comiis_leftnv_top'] == 0}--><div class="sidenv_edit"><i class="comiis_font fyy">&#xe63e;</i></div><!--{/if}-->
                    <div class="sidenv_exit"><a href="member.php?mod=logging&action=logout&formhash={FORMHASH}"><span><i class="comiis_font">&#xe61c;</i><!--{if $comiis_app_switch['comiis_leftnv_top'] == 0}-->{lang logout}<!--{/if}--></span></a></div>
                    <a href="member.php?mod=connect" class="sidenv_user">
                      {if $_G[member][newpm] || $_G[member][newprompt]}<span class="sidenv_num bg_del f_f">{echo $_G[member][newpm] + $_G[member][newprompt]}</span>{/if}				
                      <em><img src="{echo avatar(0,middle,true)}?{echo time();}"></em>
                      <!--{if $comiis_app_switch['comiis_leftnv_top'] == 1}-->
                      <p class="user_tit fyy">{$_G[member][username]}</p>
                      <p class="fyy">{echo strip_tags($_G[group][grouptitle]);}, {$comiis_lang['reg21']}</p>
                      <!--{else}-->
                      <p class="mt5"><span class="user_tit fyy">{$_G[member][username]}</span><span class="comiis_tm">{echo strip_tags($_G[group][grouptitle]);}</span></p>
                      <p class="fyy"><span>{$comiis_lang['reg21']}</span></p>
                      <!--{/if}-->
                    </a>
                <!--{/if}-->
                <!--{if $comiis_app_switch['comiis_svg'] != 1}--><div class="comiis_svg_box">{if $comiis_app_switch['comiis_leftnv_list'] == 1}<div class="comiis_svg_c"></div><div class="comiis_svg_d"></div>{else}<div class="comiis_svg_a"></div><div class="comiis_svg_b"></div>{/if}</div><!--{/if}-->
                </div>                
            </div>
            <!--{/if}-->
            <ul{if $comiis_app_switch['comiis_leftnv_user'] == 1} class="leftnv_nouser"{/if}>
                <!--{loop $comiis_app_nav['lnav'] $temp}-->
                <li><a href="$temp['url']"><span{if $temp['bgcolor']} style="background:{$temp['bgcolor']};"{else} class="bg_0"{/if}><i class="comiis_font f_f">{if $temp['icon']}&#x{$temp['icon']};{else}&#xe607;{/if}</i></span>$temp['name']</a></li>
                <!--{/loop}-->
                <!--{if $_G['uid'] && getstatus($_G['member']['allowadmincp'], 1)}-->
                    <li><a href="admin.php?mobile=no"><span class="bg_0"><i class="comiis_font f_f">&#xe612;</i></span>{$comiis_lang['tip304']}</a></li>
                <!--{/if}-->
            </ul>
        </div>
    <!--{/if}-->
	<!--{if $_GET['do'] == 'doing' || $_GET['mycenter'] || $_G['comiis_close_header'] != 1 && !($_G['basescript'] == 'home' && CURMODULE == 'space' && ($_GET['from'] =='space' || $_GET['do'] == 'profile' || $_GET['do'] == 'wall'))}-->
	<div id="comiis_head"{if $comiis_isweixin == 1} class="comiis_head_hidden"{/if}>		
		<div class="comiis_head{if $comiis_app_switch['comiis_header_style'] == 1} bg_f b_b{/if}{if $comiis_app_switch['comiis_forum_showstyle']==3 && $_G['basescript']=='forum' && CURMODULE=='forumdisplay'} f_f{else} f_top{/if} cl">
			<div class="header_z">
				<!--{if $comiis_head['left']}-->
					{$comiis_head['left']}
				<!--{else}-->
					<a href="javascript:history.back();"><i class="comiis_font">&#xe60d;</i></a>
				<!--{/if}-->
			</div>
			<h2>
				<!--{if $comiis_head['center']}-->
					{$comiis_head['center']}
				<!--{else}-->
					<!--{if $comiis_app_switch['comiis_appname']}-->{$comiis_app_switch['comiis_appname']}<!--{else}--><img src="{$comiis_app_switch['comiis_logourl']}" class="comiis_noloadimage"><!--{/if}-->
				<!--{/if}-->
			</h2>
			<div class="header_y">
                <!--{if $comiis_app_switch['comiis_leftnv'] == 1}--><a href="javascript:;" class="comiis_leftnv_top_key"><i class="comiis_font">&#xe666;</i></a><!--{/if}-->
				<!--{if $comiis_head['right']}-->
					{$comiis_head['right']}
				<!--{else}-->
					<a href="forum.php?mod=guide&view=hot"><i class="comiis_font">&#xe662;</i></a>
				<!--{/if}-->
			</div>
		</div>
	</div>
	<!--{if $comiis_isweixin != 1}--><div style="height:48px;"></div><!--{/if}-->
	<!--{/if}-->	
	<div class="comiis_bodybox"{if $_COOKIE['comiis_loading']} style="-webkit-transform: translateY(44px);transform: translateY(44px);"{/if}>
	<!--{hook/global_header_mobile}-->
	<script>
	if(history.length < 1 || history.length == 1 || document.referrer === ''){
		$('.header_z').html('{$header_left}');
	}
	</script>
	<!--{eval comiis_load('XxKPUdUoOuXFOfpPVy', '');}-->