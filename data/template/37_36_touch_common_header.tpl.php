<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); hookscriptoutput('header');
0
|| checktplrefresh('./template/comiis_app/touch/common/header.htm', './template/comiis_app/touch/common/comiis_title.htm', 1600755730, '36', './data/template/37_36_touch_common_header.tpl.php', 'template/comiis_app/', 'touch/common/header')
;?>
<?php global $comiis_lang, $comiis_app_switch;require_once DISCUZ_ROOT.'./template/comiis_app/comiis/php/comiis_lang.'.currentlang().'.php';?><!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php if($comiis_app_switch['comiis_header_show'] == 2) { $comiis_isweixin = 1;?><?php } elseif($comiis_app_switch['comiis_header_show'] == 0 || $comiis_app_switch['comiis_header_show'] == 1) { $comiis_isweixin = 0;?><?php } if($_G['basescript'] == 'forum' && CURMODULE == 'index') { if($comiis_app_switch['comiis_bbsxname']) { $navtitle = $comiis_app_switch['comiis_bbsxname'];?><?php } else { } } elseif($_G['basescript'] == 'member' && $_GET['mod'] == 'getpasswd') { $navtitle = $comiis_app_switch['comiis_reg_zmtxt'];?><?php } elseif(($_G['basescript'] == 'forum' || $_G['basescript'] == 'group') && CURMODULE == 'viewthread' && $_GET['do']=='tradeinfo') { $navtitle = ($trade[subject] ? $trade[subject] : $comiis_lang['tip74']);?><?php } elseif(($_G['basescript'] == 'forum' || $_G['basescript'] == 'group') && CURMODULE == 'trade' && $_GET['orderid']) { $navtitle = $comiis_lang['view61'];?><?php } elseif(($_G['basescript'] == 'forum' || $_G['basescript'] == 'group') && CURMODULE == 'trade') { $navtitle = $comiis_lang['view62'];?><?php } elseif(($_G['basescript'] == 'forum' || $_G['basescript'] == 'group') && CURMODULE == 'post') { $navtitle = $_GET[action] == 'edit' ? '编辑' : '发帖';?><?php } elseif($_G['basescript'] == 'group' && $_GET['action']=='create') { ?>
    <?php $navtitle = $comiis_group_lang['004'].$comiis_group_lang['001'];?><?php } elseif($_G['basescript'] == 'group' && CURMODULE == 'index') { $navtitle =$comiis_group_lang['001'];?><?php } elseif($_G['basescript'] == 'group' && CURMODULE == 'my') { $navtitle =$comiis_group_lang['001'];?><?php } elseif($_G['basescript'] == 'portal' && CURMODULE == 'comment') { $navtitle = '全部'.$comiis_lang['all53'];?><?php } elseif($_G['basescript'] == 'portal' && CURMODULE == 'portalcp' && $_GET['ac']=='article') { $navtitle = !empty($aid) ? $comiis_lang['post19'] : $comiis_lang['post18'];?><?php } elseif(($_G['basescript'] == 'forum' || $_G['basescript'] == 'group') && CURMODULE == 'misc' && $_GET['action']=='viewpayments') { $navtitle = $comiis_lang['view46'];?><?php } elseif($_G['basescript'] == 'home' && CURMODULE == 'medal') { $navtitle = $comiis_lang['tip319'];?><?php } elseif($_G['basescript'] == 'home' && CURMODULE == 'spacecp' && $_GET['ac']=='profile') { $navtitle = $comiis_lang['post16'];?><?php } elseif($_G['basescript'] == 'home' && CURMODULE == 'spacecp' && $_GET['ac']=='poke') { $navtitle = $comiis_lang['post38'];?><?php } elseif($_G['basescript'] == 'home' && CURMODULE == 'spacecp' && $_GET['ac']=='usergroup') { ?>
    <?php if($_G['comiis_homegid'] != 0) { ?>
        <?php $navtitle = $comiis_lang['tip262'].$comiis_lang['tip267'];?>    <?php } else { ?>
        <?php $navtitle = $comiis_lang['all58'].$comiis_lang['tip262'];?>    <?php } } elseif($_G['basescript'] == 'home' && CURMODULE == 'space' && $_GET['do']=='thread') { $navtitle = '我的主题';?><?php } elseif($_G['basescript'] == 'home' && CURMODULE == 'spacecp' && $_GET['ac']=='search') { ?>
    <?php $navtitle = $comiis_lang['tip338'];?><?php } elseif($_G['basescript'] == 'home' && CURMODULE == 'follow' && $_GET['do']=='following') { $navtitle = $comiis_lang['all33'];?><?php } elseif($_G['basescript'] == 'home' && CURMODULE == 'follow' && $_GET['do']=='follower') { $navtitle = $comiis_lang['all34'];?><?php } elseif($_G['basescript'] == 'home' && CURMODULE == 'space' && $_GET['do']=='friend' && $_GET['view'] == 'online') { ?>
    <?php $navtitle = $comiis_lang['tip337'];?><?php } elseif($_G['basescript'] == 'home' && CURMODULE == 'space' && $_GET['do']=='friend') { $navtitle = $comiis_lang['all58'].$comiis_lang['all59'];?><?php } elseif($_G['basescript'] == 'home' && CURMODULE == 'space' && $_GET['do']=='pm') { if(in_array($filter, array('privatepm','announcepm')) || in_array($_GET['subop'], array('view'))) { if(in_array($filter, array('privatepm','announcepm'))) { $navtitle = '消息';?><?php } elseif(in_array($_GET['subop'], array('view'))) { $navtitle = $_GET['viewall'] == 1 ? '查看消息' : $comiis_lang['tip236'];?><?php } ?>	
<?php } elseif($_GET['subop'] == 'viewg') { $navtitle = $comiis_lang['all45'];?><?php } } elseif($_G['basescript'] == 'home' && CURMODULE == 'spacecp' && $_GET['ac']=='pm') { $navtitle = '发消息';?><?php } elseif($_G['basescript'] == 'home' && CURMODULE == 'space' && $_GET['do']=='notice') { $navtitle = $comiis_lang['all51'].'提醒';?><?php } elseif($_G['basescript'] == 'home' && CURMODULE == 'spacecp' && $_GET['ac']=='credit' && $_GET['op']=='log') { $navtitle = $comiis_lang['all48'];?><?php } elseif($_G['basescript'] == 'home' && CURMODULE == 'spacecp' && $_GET['ac']=='credit') { $navtitle = $comiis_lang['all48'];?><?php } elseif($_G['basescript'] == 'home' && CURMODULE == 'space' && $_GET['do']=='doing') { $navtitle = $comiis_lang['all56'].$comiis_lang['all57'];?><?php } elseif($_G['basescript'] == 'home' && CURMODULE == 'space' && $_GET['do']=='blog' && $_GET['id']) { $navtitle = $blog['subject'];?><?php } elseif($_G['basescript'] == 'home' && CURMODULE == 'space' && $_GET['do']=='blog') { $navtitle = '日志';?><?php } elseif($_G['basescript'] == 'home' && CURMODULE == 'spacecp' && $_GET['ac']=='blog') { $navtitle = $blog[blogid] ? $comiis_lang['post25'].'日志' : $comiis_lang['post24'].'日志';?><?php } elseif($_G['basescript'] == 'home' && CURMODULE == 'spacecp' && $_GET['ac']=='upload') { $navtitle = '添加相册';?><?php } elseif($_G['basescript'] == 'home' && CURMODULE == 'space' && $_GET['do']=='album' && $_GET['picid']) { $navtitle = $space[username].$comiis_lang['all44'].'相册';?><?php } elseif($_G['basescript'] == 'home' && CURMODULE == 'spacecp' && $_GET['op'] == 'edit') { $navtitle = '编辑相册';?><?php } elseif($_G['basescript'] == 'home' && CURMODULE == 'spacecp' && $_GET['op'] == 'editpic') { $navtitle = '编辑相册';?><?php } elseif($_G['basescript'] == 'home' && CURMODULE == 'space' && $_GET['do']=='album' && $_GET['id']) { $navtitle = $space[username].$comiis_lang['all44'].'相册';?><?php } elseif($_G['basescript'] == 'home' && CURMODULE == 'space' && $_GET['do']=='album') { $navtitle = '相册';?><?php } elseif($_G['basescript'] == 'misc' && CURMODULE == 'faq' && $_GET['op'] == 'url') { $navtitle = $comiis_app_switch['comiis_open_wblink_title'];?><?php } elseif($_G['basescript'] == 'misc' && CURMODULE == 'faq' && $_GET['op'] == 'recommend') { $navtitle = $comiis_lang['view44'];?><?php } elseif($_G['basescript'] == 'misc' && CURMODULE == 'invite') { $navtitle = '邀请好友';?><?php } elseif($_G['mod'] == 'misc' && $_GET['action'] == 'activityapplylist') { $navtitle = $comiis_lang['tip221'];?><?php } elseif(($_G['basescript'] == 'forum' || $_G['basescript'] == 'group') && CURMODULE == 'misc' && $_GET['action'] == 'viewratings') { $navtitle = $comiis_lang['view49'];?><?php } elseif(($_G['basescript'] == 'forum' || $_G['basescript'] == 'group') && CURMODULE == 'misc' && $_GET['action'] == 'viewattachpayments') { $navtitle = $comiis_lang['view46'];?><?php } elseif($_G['basescript'] == 'misc' && CURMODULE == 'tag') { $navtitle = ($tagname ? $comiis_lang['view54'].' : '.$tagname : 'Tag '.$comiis_lang['view54']);?><?php } elseif($_G['basescript'] == 'home' && CURMODULE == 'space' && $_GET['do'] == 'profile') { $navtitle = $comiis_lang['view58'];?><?php } elseif(($_G['basescript'] == 'forum' || $_G['basescript'] == 'group') && CURMODULE == 'announcement') { $navtitle = $comiis_lang['view59'];?><?php } elseif($_G['basescript'] == 'plugin' && CURMODULE == 'k_misign') { $navtitle = $comiis_lang['all61'];?><?php } ?><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="Cache-control" content="<?php if($_G['setting']['mobile']['mobilecachetime'] > 0) { ?><?php echo $_G['setting']['mobile']['mobilecachetime'];?><?php } else { ?>no-cache<?php } ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimal-ui, minimum-scale=1.0, maximum-scale=1.0">
<meta name="apple-mobile-web-app-capable" content="yes" />
<meta name="apple-touch-fullscreen" content="yes">
<?php if($comiis_app_switch['comiis_appname']) { ?>
<meta name="apple-mobile-web-app-title" content="<?php echo $comiis_app_switch['comiis_appname'];?>">
<?php } ?>
<meta name="apple-mobile-web-app-status-bar-style" content="black" />
<meta name="format-detection" content="telephone=no" />
<meta name="format-detection" content="email=no" />
<link rel="apple-touch-icon-precomposed" sizes="57x57" href="template/comiis_app/pic/icon57.png">
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="template/comiis_app/pic/icon114.png">
<link rel="apple-touch-icon-precomposed" sizes="152x152" href="template/comiis_app/pic/icon152.png">
<link rel="icon" sizes="114x114" href="template/comiis_app/pic/icon114.png" /> 
<?php if($comiis_app_switch['comiis_ucqqfull'] == 1) { ?>
<meta name="full-screen" content="yes">
<meta name="browsermode" content="application">
<meta name="x5-fullscreen" content="true">
<meta name="x5-page-mode" content="app">
<?php } if($_G['basescript'] == 'home' && CURMODULE == 'space' && $_GET['do'] == 'profile' && $_GET['mycenter'] == 1) { ?>
<meta http-equiv="cache-control" content="max-age=0" />
<meta http-equiv="expires" content="0" />
<meta http-equiv="expires" content="Tue, 01 Jan 1986 1:00:00 GMT" />
<meta http-equiv="pragma" content="no-cache" />
<meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
<?php } if($_G['basescript']=='forum' && CURMODULE=='viewthread') { $comiis_view_pic = $_G['siteurl'].'./template/comiis_app/pic/icon152.png';?><?php if(is_array($postlist)) foreach($postlist as $post) { if(count($post['attachments'])) { $comiis_view_pic_array = current($post[attachments]);$comiis_view_pic = $_G['siteurl'].$comiis_view_pic_array['url'].$comiis_view_pic_array['attachment'];?><meta property="og:image" content="<?php echo $comiis_view_pic;?>">
<meta itemprop="image" content="<?php echo $comiis_view_pic;?>"><?php break;?><?php } } } ?>
<base href="<?php echo $_G['siteurl'];?>" />
<title><?php if(!empty($navtitle)) { ?><?php echo $navtitle;?><?php } if($comiis_app_switch['comiis_sitename'] || $_G['setting']['sitename']) { ?> - <?php } if($comiis_app_switch['comiis_sitename']) { ?><?php echo $comiis_app_switch['comiis_sitename'];?><?php } else { ?><?php echo $_G['setting']['sitename'];?><?php } ?></title>
<meta name="keywords" content="<?php if(!empty($metakeywords)) { echo dhtmlspecialchars($metakeywords); } ?>" />
<meta name="description" content="<?php if(!empty($metadescription)) { echo dhtmlspecialchars($metadescription); ?>, <?php } if($comiis_app_switch['comiis_sitename']) { ?><?php echo $comiis_app_switch['comiis_sitename'];?><?php } else { ?><?php echo $_G['setting']['bbname'];?><?php } ?>" />
<link rel="shortcut icon" href="template/comiis_app/comiis/img/favicon.ico">
<script src="template/comiis_app/comiis/js/jquery.min.js?<?php echo VERHASH;?>" type="text/javascript"></script>
<script type="text/javascript">var STYLEID = '<?php echo STYLEID;?>', STATICURL = '<?php echo STATICURL;?>', IMGDIR = '<?php echo IMGDIR;?>', VERHASH = '<?php echo VERHASH;?>', charset = '<?php echo CHARSET;?>', discuz_uid = '<?php echo $_G['uid'];?>', cookiepre = '<?php echo $_G['config']['cookie']['cookiepre'];?>', cookiedomain = '<?php echo $_G['config']['cookie']['cookiedomain'];?>', cookiepath = '<?php echo $_G['config']['cookie']['cookiepath'];?>', showusercard = '<?php echo $_G['setting']['showusercard'];?>', attackevasive = '<?php echo $_G['config']['security']['attackevasive'];?>', disallowfloat = '<?php echo $_G['setting']['disallowfloat'];?>', creditnotice = '<?php if($_G['setting']['creditnotice']) { ?><?php echo $_G['setting']['creditnames'];?><?php } ?>', defaultstyle = '<?php echo $_G['style']['defaultextstyle'];?>', REPORTURL = '<?php echo $_G['currenturl_encode'];?>', SITEURL = '<?php echo $_G['siteurl'];?>', JSPATH = '<?php echo $_G['setting']['jspath'];?>', comiis_pageid = '<?php echo $comiis_nav_ids;?>', comiis_page_start = 0, comiis_rlmenu = <?php echo $comiis_app_switch['comiis_scrolltop_ico'] ? intval($comiis_app_switch['comiis_scrolltop_ico']) : 0;; ?>, comiis_lrshow = <?php echo $comiis_app_switch['comiis_scrolltop_show'] ? intval($comiis_app_switch['comiis_scrolltop_show']) : 0;; ?>, comiis_post_btnwz = <?php echo $comiis_app_switch['comiis_post_btnwz'] ? intval($comiis_app_switch['comiis_post_btnwz']) : 0;; ?>, comiis_footer = <?php if(($comiis_foot != 'no' || $comiis_open_footer) && !$comiis_closefooter && count($comiis_app_nav['mnav'])) { ?>1<?php } else { ?>0<?php } ?>, comiis_open_wblink = <?php echo $comiis_app_switch['comiis_open_wblink'] ? intval($comiis_app_switch['comiis_open_wblink']) : 0;; ?>, comiis_open_wblink_txt = '<?php echo $comiis_app_switch['comiis_open_wblink_txt'];?>', comiis_open_wblink_tip = <?php echo $comiis_app_switch['comiis_open_wblink_tip'] ? intval($comiis_app_switch['comiis_open_wblink_tip']) : 0;; ?>;
var comiis_all_https = new Array(<?php if(is_array(explode("\n",$comiis_app_switch['comiis_open_nwblink']))) foreach(explode("\n",$comiis_app_switch['comiis_open_nwblink']) as $v) { if(strlen(trim($v)) > 1) { ?>'<?php echo trim($v);; ?>', <?php } } ?>window.location.host);
</script>
<link rel="stylesheet" href="template/comiis_app/comiis/css/comiis.css?<?php echo VERHASH;?>" type="text/css" media="all">
<script src="template/comiis_app/comiis/js/common<?php if(currentlang() == 'SC_UTF8' || currentlang() == 'TC_UTF8') { ?>_u<?php } ?>.js?<?php echo VERHASH;?>" type="text/javascript" charset="<?php echo CHARSET;?>"></script>
<?php if($comiis_app_switch['comiis_loadimg']) { ?><script src="template/comiis_app/comiis/js/jquery.lazyload.min.js" type="text/javascript"></script><?php } ?>
<script>
var comiis_nvscroll = <?php if($comiis_isweixin != 1) { if($comiis_app_switch['comiis_header_show'] == 1) { ?>1<?php } else { ?>0<?php } } else { ?>0<?php } ?>;
var comiis_isweixin = '<?php echo $comiis_isweixin;?>';
</script>
<?php if($comiis_app_switch['comiis_share_style'] != 0 || $comiis_app_switch['comiis_leftnv'] == 1 || $comiis_app_switch['comiis_all_abg'] != 1 || $comiis_app_switch['comiis_iphone_font'] == 1) { ?>
<style>
<?php if($comiis_app_switch['comiis_iphone_font'] == 1) { ?>*, caption, th, h1, h2, h3, h4, h5, h6 {font-weight:400}<?php } if($comiis_app_switch['comiis_all_abg'] != 1) { ?>a:active {background:rgba(0,0,0,0.08)}<?php } if($comiis_app_switch['comiis_share_style'] != 0) { ?>.comiis_share_box #comiis_share a span {background-image:url(template/comiis_app/comiis/img/comiis_share_ico<?php if($comiis_app_switch['comiis_share_style'] == 1) { ?>01<?php } elseif($comiis_app_switch['comiis_share_style'] == 2) { ?>02<?php } ?>.png)}<?php } if($comiis_app_switch['comiis_leftnv'] == 1) { ?>#comiis_head {z-index:200}<?php } ?>
</style>
<?php } if($comiis_app_switch['comiis_seohead']) { ?><?php echo $comiis_app_switch['comiis_seohead'];?><?php } ?>
<?php if(!empty($_G['setting']['pluginhooks']['global_comiis_header_mobile'])) echo $_G['setting']['pluginhooks']['global_comiis_header_mobile'];?><?php $_G['comiis_new'] = 3;?></head><?php include template('common/comiis_header'); if($_G['basescript'] == 'member' && CURMODULE == 'logging' && $comiis_isweixin == 1) { ?>
    <?php if($_GET['lostpasswd'] == 'yes' && $comiis_app_switch['comiis_reg_zmtxt']) { ?>
        <?php $comiis_bg = 1;?>    <?php } elseif($comiis_app_switch['comiis_reg_dltxt'] && $_GET['lostpasswd'] != 'yes') { ?>
        <?php $comiis_bg = 1;?>    <?php } } elseif($_G['basescript'] == 'member' && CURMODULE == 'register' && $_GET['mod']!='connect' && $comiis_isweixin == 1 && $comiis_app_switch['comiis_reg_regtxt']) { ?>
    <?php $comiis_bg = 1;?><?php } elseif($comiis_app_switch['comiis_reg_zmtxt'] && $comiis_isweixin == 1 && $_G['basescript'] == 'member' && $_GET['mod'] == 'getpasswd') { ?>
    <?php $comiis_bg = 1;?><?php } ?>
<body id="<?php echo $_G['basescript'];?>" class="comiis_bodybg<?php if($comiis_bg==1) { ?> bg_f<?php } ?> pg_<?php echo CURMODULE;?><?php if($comiis_foot != 'no' && $comiis_open_footer && ($_G['basescript'] == 'forum' && CURMODULE == 'forumdisplay')) { ?> comiis_showfoot<?php } ?> ugcbh">
<?php if($comiis_app_switch['comiis_loadbox'] != 1) { ?>
<div class="comiis_loadings">
<div class="comiis_loadings_icon">
<i class="weui-loading weui-icon_toast"></i>
<p class="comiis_loadings_content"><?php echo $comiis_lang['loader'];?></p>
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
<?php } if(!$_G['cookie']['comiis_fullscreen_cookies'] && (($_G['basescript'] == 'forum' && CURMODULE == 'index') || $comiis_data['default'] == 1) && $comiis_app_switch['comiis_fullscreen']) { ?>
<style><?php echo $comiis_app_switch['comiis_fullscreen_css'];?></style>
<div class="comiis_fullscreen bg_f">
<a href="<?php echo $comiis_app_switch['comiis_fullscreen_url'];?>" class="comiis_fullscreen_img"><img src="<?php echo $comiis_app_switch['comiis_fullscreen_img'];?>"></a>
<?php if($comiis_app_switch['comiis_fullscreen_nologo'] !=1) { ?>
<a href="<?php echo $comiis_app_switch['comiis_fullscreen_logourl'];?>" class="comiis_fullscreen_logo">
<img src="<?php echo $comiis_app_switch['comiis_fullscreen_logoimg'];?>">
<p class="f_d"><?php echo $comiis_app_switch['comiis_fullscreen_copy'];?></p>
</a>
<?php } ?>
<div class="comiis_fullscreen_time"><?php echo str_replace(array('[timenum]'), array($comiis_app_switch['comiis_fullscreen_time']), $comiis_app_switch['comiis_fullscreen_djs']);; ?></div>
</div>
<script type="text/javascript">
setcookie('comiis_fullscreen_cookies', '1', <?php echo $comiis_app_switch['comiis_fullscreen_showtime'];?>, '', '', '');
var comiis_fullscreen_title = document.title;
document.title = '<?php echo $comiis_app_switch['comiis_fullscreen_title'];?>';
var num = <?php echo $comiis_app_switch['comiis_fullscreen_time'];?>;
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
<?php } ?>
<div class="comiis_body">
<?php if($comiis_app_switch['comiis_leftnv'] != 2) { ?>
        <?php loadcache('usergroups');?>        <div class="comiis_leftmenubg" style="display:none"></div>
<?php } ?>
    <?php if($comiis_app_switch['comiis_leftnv'] != 1 && $comiis_app_switch['comiis_leftnv'] != 2) { ?>
        <div class="comiis_sidenv_box<?php if($comiis_app_switch['comiis_leftnv_list'] == 1) { ?> comiis_sidenv_boxv1<?php } ?>" style="display:none;">
            <div class="comiis_sidenv_top<?php if($comiis_app_switch['comiis_leftnv_top'] == 1) { ?> comiis_sidenv_topv1<?php } ?> f_f">
            <?php if($_G['uid']) { ?>
                <?php if($comiis_app_switch['comiis_leftnv_top'] == 0) { ?><div class="sidenv_edit"><i class="comiis_font fyy">&#xe63e;</i></div><?php } ?>
                <div class="sidenv_exit"><a href="member.php?mod=logging&amp;action=logout&amp;formhash=<?php echo FORMHASH;?>"><span><i class="comiis_font">&#xe61c;</i><?php if($comiis_app_switch['comiis_leftnv_top'] == 0) { ?>退出<?php } ?></span></a></div>
                <a href="home.php?mod=space&amp;uid=<?php echo $_G['uid'];?>&amp;do=profile&amp;mycenter=1" class="sidenv_user">
                  <?php if($_G['member']['newpm'] || $_G['member']['newprompt']) { ?><span class="sidenv_num bg_del f_f"><?php echo $_G['member']['newpm'] + $_G['member']['newprompt']; ?></span><?php } ?>				
                  <em><img src="<?php echo avatar($_G['uid'],middle,true); ?>?<?php echo time();; ?>"></em>
                  <?php if($comiis_app_switch['comiis_leftnv_top'] == 1) { ?>
                  <p class="user_tit fyy"><?php echo $_G['member']['username'];?></p>
                  <p class="mt5"><span class="user_lev bg_0"<?php if($_G['cache']['usergroups'][$_G['member']['groupid']]['color']) { ?> style="background:<?php echo $_G['cache']['usergroups'][$_G['member']['groupid']]['color'];?> !important;color:#fff !important"<?php } ?>><?php if($comiis_app_switch['comiis_lev_txt']) { ?><?php echo $comiis_app_switch['comiis_lev_txt'];?><?php } else { ?>Lv.<?php } ?><?php echo $_G['group']['stars'];?></span></p>
                  <?php } else { ?>
                  <p><span class="user_tit fyy"><?php echo $_G['member']['username'];?></span><span class="user_lev bg_0"<?php if($_G['cache']['usergroups'][$_G['member']['groupid']]['color']) { ?> style="background:<?php echo $_G['cache']['usergroups'][$_G['member']['groupid']]['color'];?> !important;color:#fff !important"<?php } ?>><?php if($comiis_app_switch['comiis_lev_txt']) { ?><?php echo $comiis_app_switch['comiis_lev_txt'];?><?php } else { ?>Lv.<?php } ?><?php echo $_G['group']['stars'];?></span></p>
                  <p class="fyy mt5"><span><?php echo strip_tags($_G['group']['grouptitle']);; ?></span><span>积分: <?php echo $_G['member']['credits'];?></span></p>
                  <?php } ?>
                </a>
                <?php } elseif(!$_G['connectguest']) { ?>			
                <?php if($comiis_app_switch['comiis_leftnv_top'] == 0) { ?>
                <div class="sidenv_exit"><a href="member.php?mod=<?php echo $_G['setting']['regname'];?>"><span><i class="comiis_font">&#xe61c;</i><?php echo $_G['setting']['reglinkname'];?></span></a></div>
                <?php } ?>
                <a href="member.php?mod=logging&amp;action=login" class="sidenv_user">
                  <em><?php echo avatar(0,middle);?></em>
                  <p><span class="user_tit fyy">
                  <script language="javascript">					
                    var myDate = new Date();
                    var i = myDate.getHours();
                    if(i < 12)
                    document.write("<?php echo $comiis_lang['tip88'];?>");
                    else if(i >=12 && i < 14)
                    document.write("<?php echo $comiis_lang['tip89'];?>");
                    else if(i >= 14 && i < 18)
                    document.write("<?php echo $comiis_lang['tip90'];?>");
                    else if(i >= 18)
                    document.write("<?php echo $comiis_lang['tip91'];?>");					
                    </script> <?php echo $comiis_lang['tip92'];?><?php if($comiis_app_switch['comiis_leftnv_top'] == 1) { ?><?php echo $comiis_lang['tip93'];?><?php } ?></span></p>
                  <p class="fyy mt5"><?php echo $comiis_lang['tip94'];?></p>
                </a>
             <?php } else { ?>
                <?php if($comiis_app_switch['comiis_leftnv_top'] == 0) { ?><div class="sidenv_edit"><i class="comiis_font fyy">&#xe63e;</i></div><?php } ?>
                <div class="sidenv_exit"><a href="member.php?mod=logging&amp;action=logout&amp;formhash=<?php echo FORMHASH;?>"><span><i class="comiis_font">&#xe61c;</i><?php if($comiis_app_switch['comiis_leftnv_top'] == 0) { ?>退出<?php } ?></span></a></div>
                <a href="member.php?mod=connect" class="sidenv_user">
                  <?php if($_G['member']['newpm'] || $_G['member']['newprompt']) { ?><span class="sidenv_num bg_del f_f"><?php echo $_G['member']['newpm'] + $_G['member']['newprompt']; ?></span><?php } ?>				
                  <em><img src="<?php echo avatar(0,middle,true); ?>?<?php echo time();; ?>"></em>
                  <?php if($comiis_app_switch['comiis_leftnv_top'] == 1) { ?>
                  <p class="user_tit fyy"><?php echo $_G['member']['username'];?></p>
                  <p class="fyy mt5"><?php echo strip_tags($_G['group']['grouptitle']);; ?>, <?php echo $comiis_lang['reg21'];?></p>
                  <?php } else { ?>
                  <p><span class="user_tit fyy"><?php echo $_G['member']['username'];?></span><span class="comiis_tm"><?php echo strip_tags($_G['group']['grouptitle']);; ?></span></p>
                  <p class="fyy mt5"><span><?php echo $comiis_lang['reg21'];?></span></p>
                  <?php } ?>
                </a>
            <?php } ?>
                <?php if($comiis_app_switch['comiis_svg'] != 1) { ?><div class="comiis_svg_box"><?php if($comiis_app_switch['comiis_leftnv_list'] == 1) { ?><div class="comiis_svg_c"></div><div class="comiis_svg_d"></div><?php } else { ?><div class="comiis_svg_a"></div><div class="comiis_svg_b"></div><?php } ?></div><?php } ?>
            </div>
            <?php if(!empty($_G['setting']['pluginhooks']['global_misign_mobile']) && $_G['uid']) { ?>
                <style>body .comiis_sidenv_box .sidenv_li {height:-moz-calc(100% - 200px);height:-webkit-calc(100% - 200px);height:calc(100% - 200px);}</style>
                <div class="comiis_k_misign<?php if($comiis_app_switch['comiis_leftnv_list'] == 1) { ?>v1<?php } ?>">
                    <?php if(!empty($_G['setting']['pluginhooks']['global_misign_mobile'])) echo $_G['setting']['pluginhooks']['global_misign_mobile'];?>
                </div>
            <?php } ?>
            <div class="sidenv_li<?php if($comiis_app_switch['comiis_leftnv_list'] == 1) { ?> sidenv_liv1 f_f<?php } ?>">			
                <ul class="comiis_left_Touch bhrfw">
                    <?php if(is_array($comiis_app_nav['lnav'])) foreach($comiis_app_nav['lnav'] as $temp) { ?>                        <li class="comiis_left_Touch"><a href="<?php echo $temp['url'];?>" class="comiis_left_Touch"><i class="comiis_font comiis_left_Touch<?php if(!$temp['bgcolor']) { ?> f_c<?php } ?>"<?php if($temp['bgcolor']) { ?> style="color:<?php echo $temp['bgcolor'];?>;"<?php } ?>><?php if($temp['icon']) { ?>&#x<?php echo $temp['icon'];?>;<?php } else { ?>&#xe633;<?php } ?></i><?php echo $temp['name'];?></a></li>
                    <?php } ?>
                    <?php if($_G['uid'] && getstatus($_G['member']['allowadmincp'], 1)) { ?>
                        <li class="comiis_left_Touch"><a href="admin.php?mobile=no" class="comiis_left_Touch"><i class="comiis_font comiis_left_Touch f_0">&#xe612;</i><?php echo $comiis_lang['tip304'];?> <?php echo $comiis_lang['tip305'];?></a></li>
                    <?php } ?>
                    <li class="comiis_left_Touch styli_h10"></li>
                </ul>
            </div>
        </div>
    <?php } elseif($comiis_app_switch['comiis_leftnv'] == 1) { ?>
        <div class="comiis_gobtn_tbox<?php if($comiis_app_switch['comiis_leftnv_list'] == 1) { ?> comiis_sidenv_boxv1 f_f<?php } else { ?> bg_f<?php } ?> cl">
            <?php if($comiis_app_switch['comiis_leftnv_user'] != 1) { ?>
            <div class="comiis_gobtn_user">
                <div class="comiis_sidenv_top<?php if($comiis_app_switch['comiis_leftnv_top'] == 1) { ?> comiis_sidenv_topv1<?php } ?> f_f">
                <?php if($_G['uid']) { ?>
                    <div class="sidenv_exit"><a href="member.php?mod=logging&amp;action=logout&amp;formhash=<?php echo FORMHASH;?>"><span><i class="comiis_font">&#xe61c;</i><?php if($comiis_app_switch['comiis_leftnv_top'] == 0) { ?>退出<?php } ?></span></a></div>
                    <a href="home.php?mod=space&amp;uid=<?php echo $_G['uid'];?>&amp;do=profile&amp;mycenter=1" class="sidenv_user">              		
                      <em><img src="<?php echo avatar($_G['uid'],middle,true); ?>?<?php echo time();; ?>"><?php if($_G['member']['newpm'] || $_G['member']['newprompt']) { ?><span class="sidenv_num bg_del f_f"><?php echo $_G['member']['newpm'] + $_G['member']['newprompt']; ?></span><?php } ?>		</em>
                      <?php if($comiis_app_switch['comiis_leftnv_top'] == 1) { ?>
                      <p class="user_tit fyy"><?php echo $_G['member']['username'];?></p>
                      <p><span class="user_lev bg_0"<?php if($_G['cache']['usergroups'][$_G['member']['groupid']]['color']) { ?> style="background:<?php echo $_G['cache']['usergroups'][$_G['member']['groupid']]['color'];?> !important;color:#fff !important"<?php } ?>><?php if($comiis_app_switch['comiis_lev_txt']) { ?><?php echo $comiis_app_switch['comiis_lev_txt'];?><?php } else { ?>Lv.<?php } ?><?php echo $_G['group']['stars'];?></span><span class="fyy"><?php echo strip_tags($_G['group']['grouptitle']);; ?> 积分: <?php echo $_G['member']['credits'];?></span></p>
                      <?php } else { ?>
                      <p class="mt5"><span class="user_tit fyy"><?php echo $_G['member']['username'];?></span><span class="user_lev bg_0"<?php if($_G['cache']['usergroups'][$_G['member']['groupid']]['color']) { ?> style="background:<?php echo $_G['cache']['usergroups'][$_G['member']['groupid']]['color'];?> !important;color:#fff !important"<?php } ?>><?php if($comiis_app_switch['comiis_lev_txt']) { ?><?php echo $comiis_app_switch['comiis_lev_txt'];?><?php } else { ?>Lv.<?php } ?><?php echo $_G['group']['stars'];?></span></p>
                      <p class="fyy"><span><?php echo strip_tags($_G['group']['grouptitle']);; ?></span><span>积分: <?php echo $_G['member']['credits'];?></span></p>
                      <?php } ?>
                    </a>
                    <?php } elseif(!$_G['connectguest']) { ?>			
                    <?php if($comiis_app_switch['comiis_leftnv_top'] == 0) { ?>
                    <div class="sidenv_exit"><a href="member.php?mod=<?php echo $_G['setting']['regname'];?>"><span><i class="comiis_font">&#xe61c;</i><?php echo $_G['setting']['reglinkname'];?></span></a></div>
                    <?php } ?>
                    <a href="member.php?mod=logging&amp;action=login" class="sidenv_user">
                      <em><?php echo avatar(0,middle);?></em>
                      <p class="mt5"><span class="user_tit fyy">
                      <script language="javascript">					
                        var myDate = new Date();
                        var i = myDate.getHours();
                        if(i < 12)
                        document.write("<?php echo $comiis_lang['tip88'];?>");
                        else if(i >=12 && i < 14)
                        document.write("<?php echo $comiis_lang['tip89'];?>");
                        else if(i >= 14 && i < 18)
                        document.write("<?php echo $comiis_lang['tip90'];?>");
                        else if(i >= 18)
                        document.write("<?php echo $comiis_lang['tip91'];?>");					
                        </script> <?php echo $comiis_lang['tip92'];?><?php if($comiis_app_switch['comiis_leftnv_top'] == 1) { ?><?php echo $comiis_lang['tip93'];?><?php } ?></span></p>
                      <p class="fyy"><?php echo $comiis_lang['tip94'];?></p>
                    </a>
                 <?php } else { ?>
                    <?php if($comiis_app_switch['comiis_leftnv_top'] == 0) { ?><div class="sidenv_edit"><i class="comiis_font fyy">&#xe63e;</i></div><?php } ?>
                    <div class="sidenv_exit"><a href="member.php?mod=logging&amp;action=logout&amp;formhash=<?php echo FORMHASH;?>"><span><i class="comiis_font">&#xe61c;</i><?php if($comiis_app_switch['comiis_leftnv_top'] == 0) { ?>退出<?php } ?></span></a></div>
                    <a href="member.php?mod=connect" class="sidenv_user">
                      <?php if($_G['member']['newpm'] || $_G['member']['newprompt']) { ?><span class="sidenv_num bg_del f_f"><?php echo $_G['member']['newpm'] + $_G['member']['newprompt']; ?></span><?php } ?>				
                      <em><img src="<?php echo avatar(0,middle,true); ?>?<?php echo time();; ?>"></em>
                      <?php if($comiis_app_switch['comiis_leftnv_top'] == 1) { ?>
                      <p class="user_tit fyy"><?php echo $_G['member']['username'];?></p>
                      <p class="fyy"><?php echo strip_tags($_G['group']['grouptitle']);; ?>, <?php echo $comiis_lang['reg21'];?></p>
                      <?php } else { ?>
                      <p class="mt5"><span class="user_tit fyy"><?php echo $_G['member']['username'];?></span><span class="comiis_tm"><?php echo strip_tags($_G['group']['grouptitle']);; ?></span></p>
                      <p class="fyy"><span><?php echo $comiis_lang['reg21'];?></span></p>
                      <?php } ?>
                    </a>
                <?php } ?>
                <?php if($comiis_app_switch['comiis_svg'] != 1) { ?><div class="comiis_svg_box"><?php if($comiis_app_switch['comiis_leftnv_list'] == 1) { ?><div class="comiis_svg_c"></div><div class="comiis_svg_d"></div><?php } else { ?><div class="comiis_svg_a"></div><div class="comiis_svg_b"></div><?php } ?></div><?php } ?>
                </div>                
            </div>
            <?php } ?>
            <ul<?php if($comiis_app_switch['comiis_leftnv_user'] == 1) { ?> class="leftnv_nouser"<?php } ?>>
                <?php if(is_array($comiis_app_nav['lnav'])) foreach($comiis_app_nav['lnav'] as $temp) { ?>                <li><a href="<?php echo $temp['url'];?>"><span<?php if($temp['bgcolor']) { ?> style="background:<?php echo $temp['bgcolor'];?>;"<?php } else { ?> class="bg_0"<?php } ?>><i class="comiis_font f_f"><?php if($temp['icon']) { ?>&#x<?php echo $temp['icon'];?>;<?php } else { ?>&#xe607;<?php } ?></i></span><?php echo $temp['name'];?></a></li>
                <?php } ?>
                <?php if($_G['uid'] && getstatus($_G['member']['allowadmincp'], 1)) { ?>
                    <li><a href="admin.php?mobile=no"><span class="bg_0"><i class="comiis_font f_f">&#xe612;</i></span><?php echo $comiis_lang['tip304'];?></a></li>
                <?php } ?>
            </ul>
        </div>
    <?php } if($_GET['do'] == 'doing' || $_GET['mycenter'] || $_G['comiis_close_header'] != 1 && !($_G['basescript'] == 'home' && CURMODULE == 'space' && ($_GET['from'] =='space' || $_GET['do'] == 'profile' || $_GET['do'] == 'wall'))) { ?>
<div id="comiis_head"<?php if($comiis_isweixin == 1) { ?> class="comiis_head_hidden"<?php } ?>>		
<div class="comiis_head<?php if($comiis_app_switch['comiis_header_style'] == 1) { ?> bg_f b_b<?php } if($comiis_app_switch['comiis_forum_showstyle']==3 && $_G['basescript']=='forum' && CURMODULE=='forumdisplay') { ?> f_f<?php } else { ?> f_top<?php } ?> cl">
<div class="header_z">
<?php if($comiis_head['left']) { ?>
<?php echo $comiis_head['left'];?>
<?php } else { ?>
<a href="javascript:history.back();"><i class="comiis_font">&#xe60d;</i></a>
<?php } ?>
</div>
<h2>
<?php if($comiis_head['center']) { ?>
<?php echo $comiis_head['center'];?>
<?php } else { if($comiis_app_switch['comiis_appname']) { ?><?php echo $comiis_app_switch['comiis_appname'];?><?php } else { ?><img src="<?php echo $comiis_app_switch['comiis_logourl'];?>" class="comiis_noloadimage"><?php } } ?>
</h2>
<div class="header_y">
                <?php if($comiis_app_switch['comiis_leftnv'] == 1) { ?><a href="javascript:;" class="comiis_leftnv_top_key"><i class="comiis_font">&#xe666;</i></a><?php } if($comiis_head['right']) { ?>
<?php echo $comiis_head['right'];?>
<?php } else { ?>
<a href="forum.php?mod=guide&amp;view=hot"><i class="comiis_font">&#xe662;</i></a>
<?php } ?>
</div>
</div>
</div>
<?php if($comiis_isweixin != 1) { ?><div style="height:48px;"></div><?php } } ?>	
<div class="comiis_bodybox"<?php if($_COOKIE['comiis_loading']) { ?> style="-webkit-transform: translateY(44px);transform: translateY(44px);"<?php } ?>>
<?php if(!empty($_G['setting']['pluginhooks']['global_header_mobile'])) echo $_G['setting']['pluginhooks']['global_header_mobile'];?>
<script>
if(history.length < 1 || history.length == 1 || document.referrer === ''){
$('.header_z').html('<?php echo $header_left;?>');
}
</script><?php comiis_load('XxKPUdUoOuXFOfpPVy', '');?>