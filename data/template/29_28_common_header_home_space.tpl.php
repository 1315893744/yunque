<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); 
0
|| checktplrefresh('./template/quater_6_ui/common/header.htm', './template/quater_6_ui/common/header_common.htm', 1601007774, '28', './data/template/29_28_common_header_home_space.tpl.php', './template/quater_6_ui', 'common/header_home_space')
|| checktplrefresh('./template/quater_6_ui/common/header.htm', './template/quater_6_ui/common/pubsearchform.htm', 1601007774, '28', './data/template/29_28_common_header_home_space.tpl.php', './template/quater_6_ui', 'common/header_home_space')
|| checktplrefresh('./template/quater_6_ui/common/header.htm', './template/default/common/header_qmenu.htm', 1601007774, '28', './data/template/29_28_common_header_home_space.tpl.php', './template/quater_6_ui', 'common/header_home_space')
;?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:wb="http://open.weibo.com/wb">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo CHARSET;?>" />
<?php if($_G['config']['output']['iecompatible']) { ?><meta http-equiv="X-UA-Compatible" content="IE=EmulateIE<?php echo $_G['config']['output']['iecompatible'];?>" /><?php } ?>
<title><?php if(!empty($navtitle)) { ?><?php echo $navtitle;?> - <?php } if(empty($nobbname)) { ?> <?php echo $_G['setting']['bbname'];?> - <?php } ?> Powered by Discuz!</title>
<?php echo $_G['setting']['seohead'];?>
    
<meta name="keywords" content="<?php if(!empty($metakeywords)) { echo dhtmlspecialchars($metakeywords); } ?>" />
<meta name="description" content="<?php if(!empty($metadescription)) { echo dhtmlspecialchars($metadescription); ?> <?php } if(empty($nobbname)) { ?>,<?php echo $_G['setting']['bbname'];?><?php } ?>" />
<meta name="generator" content="Discuz! <?php echo $_G['setting']['version'];?>" />
<meta name="author" content="Discuz! Team and Comsenz UI Team" />
<meta name="copyright" content="2001-2013 Comsenz Inc." />
<meta name="MSSmartTagsPreventParsing" content="True" />
<meta http-equiv="MSThemeCompatible" content="Yes" />
<base href="<?php echo $_G['siteurl'];?>" /><link rel="stylesheet" type="text/css" href="data/cache/style_29_common.css?<?php echo VERHASH;?>" /><link rel="stylesheet" type="text/css" href="data/cache/style_29_home_space.css?<?php echo VERHASH;?>" /><?php if($_G['uid'] && isset($_G['cookie']['extstyle']) && strpos($_G['cookie']['extstyle'], TPLDIR) !== false) { ?><link rel="stylesheet" id="css_extstyle" type="text/css" href="<?php echo $_G['cookie']['extstyle'];?>/style.css" /><?php } elseif($_G['style']['defaultextstyle']) { ?><link rel="stylesheet" id="css_extstyle" type="text/css" href="<?php echo $_G['style']['defaultextstyle'];?>/style.css" /><?php } ?>    <script src="template/quater_6_ui/src/js/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript">var STYLEID = '<?php echo STYLEID;?>', STATICURL = '<?php echo STATICURL;?>', IMGDIR = '<?php echo IMGDIR;?>', VERHASH = '<?php echo VERHASH;?>', charset = '<?php echo CHARSET;?>', discuz_uid = '<?php echo $_G['uid'];?>', cookiepre = '<?php echo $_G['config']['cookie']['cookiepre'];?>', cookiedomain = '<?php echo $_G['config']['cookie']['cookiedomain'];?>', cookiepath = '<?php echo $_G['config']['cookie']['cookiepath'];?>', showusercard = '<?php echo $_G['setting']['showusercard'];?>', attackevasive = '<?php echo $_G['config']['security']['attackevasive'];?>', disallowfloat = '<?php echo $_G['setting']['disallowfloat'];?>', creditnotice = '<?php if($_G['setting']['creditnotice']) { ?><?php echo $_G['setting']['creditnames'];?><?php } ?>', defaultstyle = '<?php echo $_G['style']['defaultextstyle'];?>', REPORTURL = '<?php echo $_G['currenturl_encode'];?>', SITEURL = '<?php echo $_G['siteurl'];?>', JSPATH = '<?php echo $_G['setting']['jspath'];?>', CSSPATH = '<?php echo $_G['setting']['csspath'];?>', DYNAMICURL = '<?php echo $_G['dynamicurl'];?>';</script>
<script src="<?php echo $_G['setting']['jspath'];?>common.js?<?php echo VERHASH;?>" type="text/javascript"></script>
    
<?php if(empty($_GET['diy'])) { $_GET['diy'] = '';?><?php } if(!isset($topic)) { $topic = array();?><?php } ?>
    <!--[if IE 6]>
     <script language='javascript' type="text/javascript">   
    function ResumeError() {  
         return true;  
    }  
    window.onerror = ResumeError;   
    </script> 
    <![endif]-->

<meta name="application-name" content="<?php echo $_G['setting']['bbname'];?>" />
<meta name="msapplication-tooltip" content="<?php echo $_G['setting']['bbname'];?>" />
<?php if($_G['setting']['portalstatus']) { ?>
<meta name="msapplication-task" content="name=<?php echo $_G['setting']['navs']['1']['navname'];?>;action-uri=<?php echo !empty($_G['setting']['domain']['app']['portal']) ? 'http://'.$_G['setting']['domain']['app']['portal'] : $_G['siteurl'].'portal.php'; ?>;icon-uri=<?php echo $_G['siteurl'];?><?php echo IMGDIR;?>/portal.ico" />
<?php } ?>
<meta name="msapplication-task" content="name=<?php echo $_G['setting']['navs']['2']['navname'];?>;action-uri=<?php echo !empty($_G['setting']['domain']['app']['forum']) ? 'http://'.$_G['setting']['domain']['app']['forum'] : $_G['siteurl'].'forum.php'; ?>;icon-uri=<?php echo $_G['siteurl'];?><?php echo IMGDIR;?>/bbs.ico" />
<?php if($_G['setting']['groupstatus']) { ?>
<meta name="msapplication-task" content="name=<?php echo $_G['setting']['navs']['3']['navname'];?>;action-uri=<?php echo !empty($_G['setting']['domain']['app']['group']) ? 'http://'.$_G['setting']['domain']['app']['group'] : $_G['siteurl'].'group.php'; ?>;icon-uri=<?php echo $_G['siteurl'];?><?php echo IMGDIR;?>/group.ico" />
<?php } if(helper_access::check_module('feed')) { ?>
<meta name="msapplication-task" content="name=<?php echo $_G['setting']['navs']['4']['navname'];?>;action-uri=<?php echo !empty($_G['setting']['domain']['app']['home']) ? 'http://'.$_G['setting']['domain']['app']['home'] : $_G['siteurl'].'home.php'; ?>;icon-uri=<?php echo $_G['siteurl'];?><?php echo IMGDIR;?>/home.ico" />
<?php } if($_G['basescript'] == 'forum' && $_G['setting']['archiver']) { ?>
<link rel="archives" title="<?php echo $_G['setting']['bbname'];?>" href="<?php echo $_G['siteurl'];?>archiver/" />
<?php } if(!empty($rsshead)) { ?>
<?php echo $rsshead;?><?php } if(widthauto()) { ?>

<link rel="stylesheet" id="css_widthauto" type="text/css" href="data/cache/style_<?php echo STYLEID;?>_widthauto.css?<?php echo VERHASH;?>" />
<script type="text/javascript">HTMLNODE.className += ' widthauto'</script>
<?php } if($_G['basescript'] == 'forum' || $_G['basescript'] == 'group') { ?>
<script src="<?php echo $_G['setting']['jspath'];?>forum.js?<?php echo VERHASH;?>" type="text/javascript"></script>
<?php } elseif($_G['basescript'] == 'home' || $_G['basescript'] == 'userapp') { ?>
<script src="<?php echo $_G['setting']['jspath'];?>home.js?<?php echo VERHASH;?>" type="text/javascript"></script>
<?php } elseif($_G['basescript'] == 'portal') { ?>
<script src="<?php echo $_G['setting']['jspath'];?>portal.js?<?php echo VERHASH;?>" type="text/javascript"></script>
<?php } if($_G['basescript'] != 'portal' && $_GET['diy'] == 'yes' && check_diy_perm($topic)) { ?>
<script src="<?php echo $_G['setting']['jspath'];?>portal.js?<?php echo VERHASH;?>" type="text/javascript"></script>
<?php } if($_GET['diy'] == 'yes' && check_diy_perm($topic)) { ?>
<link rel="stylesheet" type="text/css" id="diy_common" href="data/cache/style_<?php echo STYLEID;?>_css_diy.css?<?php echo VERHASH;?>" />
<?php } ?>
</head><body id="nv_<?php echo $_G['basescript'];?>" class="pg_<?php echo CURMODULE;?><?php if($_G['basescript'] === 'portal' && CURMODULE === 'list' && !empty($cat)) { ?> <?php echo $cat['bodycss'];?><?php } ?>" onkeydown="if(event.keyCode==27) return false;">
<div id="append_parent"></div>
<div id="ajaxwaitid"></div>
<?php if($_GET['diy'] == 'yes' && check_diy_perm($topic)) { ?> <?php include template('common/header_diy'); ?> 
<?php } ?> 
<?php if(check_diy_perm($topic)) { ?> <?php include template('common/header_diynav'); ?> 
<?php } ?> 
<?php if(CURMODULE == 'topic' && $topic && empty($topic['useheader']) && check_diy_perm($topic)) { ?> 
<?php echo $diynav;?> 
<?php } ?> 
<?php if(empty($topic) || $topic['useheader']) { ?> 
<?php if($_G['setting']['mobile']['allowmobile'] && (!$_G['setting']['cacheindexlife'] && !$_G['setting']['cachethreadon'] || $_G['uid']) && ($_GET['diy'] != 'yes' || !$_GET['inajax']) && ($_G['mobile'] != '' && $_G['cookie']['mobile'] == '' && $_GET['mobile'] != 'no')) { ?>
<div class="xi1 bm bm_c"> 请选择 <a href="<?php echo $_G['siteurl'];?>forum.php?mobile=yes">进入手机版</a> <span class="xg1">|</span> <a href="<?php echo $_G['setting']['mobile']['nomobileurl'];?>">继续访问电脑版</a> </div>
<?php } ?> 
<?php if($_G['setting']['shortcut'] && $_G['member']['credits'] >= $_G['setting']['shortcut']) { ?>
<div id="shortcut"> <span><a href="javascript:;" id="shortcutcloseid" title="关闭">关闭</a></span> 您经常访问 <?php echo $_G['setting']['bbname'];?>，试试添加到桌面，访问更方便！ <a href="javascript:;" id="shortcuttip">添加 <?php echo $_G['setting']['bbname'];?> 到桌面</a> </div>
<script type="text/javascript">setTimeout(setShortcut, 2000);</script> 
<?php } ?>

<div id="Quater_headtop" <?php if($_GET['diy'] == 'yes' && check_diy_perm($topic)) { ?>class="hides"<?php } ?>>
  <div class="wp cl">
  <?php if(!empty($_G['setting']['pluginhooks']['global_cpnav_top'])) echo $_G['setting']['pluginhooks']['global_cpnav_top'];?>
  <?php if(!empty($_G['setting']['pluginhooks']['global_cpnav_extra1'])) echo $_G['setting']['pluginhooks']['global_cpnav_extra1'];?>
  <?php if(!empty($_G['setting']['pluginhooks']['global_cpnav_extra2'])) echo $_G['setting']['pluginhooks']['global_cpnav_extra2'];?>
  </div>
  <div id="Quater_bar" class="cl"> 
    <div class="wp cl">
      <!-- 站点LOGO -->
      <div class="hd_logo"> 
         <?php $mnid = getcurrentnav();?> <h2><a href="forum.php"><img src="template/quater_6_ui/src/logo.png" /></a></h2>
      </div>
      <!-- 导航 -->
      <div class="nav">
        <ul>
          <?php if(is_array($_G['setting']['navs'])) foreach($_G['setting']['navs'] as $nav) { ?> 
          <?php if($nav['available'] && (!$nav['level'] || ($nav['level'] == 1 && $_G['uid']) || ($nav['level'] == 2 && $_G['adminid'] > 0) || ($nav['level'] == 3 && $_G['adminid'] == 1))) { ?>
          <li <?php if($mnid == $nav['navid']) { ?>class="a" <?php } ?>
        <?php if(!empty($subnavs)) { ?>class="b" <?php } ?>
        <?php echo $nav['nav'];?>>
          <i class="arrow"></i>
          </li>
          <?php } ?> 
          <?php } ?>
        </ul>
        <?php if(!empty($_G['setting']['pluginhooks']['global_nav_extra'])) echo $_G['setting']['pluginhooks']['global_nav_extra'];?> 
      </div>
      <!-- 用户信息 --> 
      <?php if($_G['uid']) { ?>
      <div class="Quater_user logined">
        <div class="Quater_user_info">
          <div class="user-main ">
            <div class="avatar"> <a href="home.php?mod=space&amp;uid=<?php echo $_G['uid'];?>" target="_blank" title="访问我的空间" id="umnav" onMouseOver="showMenu({'ctrlid':this.id,'ctrlclass':'a'})"> 
              <?php echo avatar($_G[uid],small);?>              </a><?php if($_G['member']['newprompt']) { ?><span class="unread_num png"><?php echo $_G['member']['newprompt'];?></span><?php } if($_G['member']['newpm']) { ?><span class="unread_num2 png"><?php echo $_G['member']['newpm'];?></span><?php } ?></div>
            <span class="nickname"><?php echo $_G['member']['username'];?></span><span class="arrow"></span></div>
          <div class="user-link">
            <ul>
              <li><a id="nte_menu" href="home.php?mod=space&amp;do=notice" class="notification">提醒<?php if($_G['member']['newprompt']) { ?><span style="padding-left: 5px;color: #CE2727;"><?php echo $_G['member']['newprompt'];?></span><?php } ?></a></li>
              <li><a id="msg_menu" href="home.php?mod=space&amp;do=pm" class="msg">消息<?php if($_G['member']['newpm']) { ?><span style="padding-left: 5px;color: #CE2727;"><?php echo $_G['member']['newpm'];?></span><?php } ?></a></li>
              <?php if(check_diy_perm($topic)) { ?>
              <li><a href="javascript:openDiy();" title="打开 DIY 面板">打开DIY</a></li>
              <?php } ?>
              <li><a href="home.php?mod=spacecp">设置</a></li>
              <?php if(($_G['group']['allowmanagearticle'] || $_G['group']['allowpostarticle'] || $_G['group']['allowdiy'] || getstatus($_G['member']['allowadmincp'], 4) || getstatus($_G['member']['allowadmincp'], 6) || getstatus($_G['member']['allowadmincp'], 2) || getstatus($_G['member']['allowadmincp'], 3))) { ?>
              <li><a href="portal.php?mod=portalcp"><?php if($_G['setting']['portalstatus'] ) { ?>门户管理<?php } else { ?>模块管理<?php } ?></a></li>
              <?php } ?> 
              <?php if($_G['uid'] && $_G['group']['radminid'] > 1) { ?>
              <li><a href="forum.php?mod=modcp&amp;fid=<?php echo $_G['fid'];?>" target="_blank"><?php echo $_G['setting']['navs']['2']['navname'];?>管理</a></li>
              <?php } ?> 
              <?php if($_G['uid'] && $_G['adminid'] == 1 && $_G['setting']['cloud_status']) { ?>
              <li><a href="admin.php?frames=yes&amp;action=cloud&amp;operation=applist" target="_blank">云平台</a></li>
              <?php } ?> 
              <?php if($_G['uid'] && getstatus($_G['member']['allowadmincp'], 1)) { ?>
              <li><a href="admin.php" target="_blank">管理中心</a></li>
              <?php } ?>
              <li class="l4"><a href="member.php?mod=logging&amp;action=logout&amp;formhash=<?php echo FORMHASH;?>">退出登录</a></li>
              <li><?php if(!empty($_G['setting']['pluginhooks']['global_usernav_extra1'])) echo $_G['setting']['pluginhooks']['global_usernav_extra1'];?></li>
              <?php if($_G['uid']) { ?>
              <div class="cl" style="float: left; width: 200px; border-top: 1px dotted #E6E6E6; padding: 10px 0; margin-top: 8px;">
   <?php if(is_array($_G['setting']['mynavs'])) foreach($_G['setting']['mynavs'] as $nav) { if($nav['available'] && (!$nav['level'] || ($nav['level'] == 1 && $_G['uid']) || ($nav['level'] == 2 && $_G['adminid'] > 0) || ($nav['level'] == 3 && $_G['adminid'] == 1))) { ?>
<li class="daoju"><?php echo $nav['code'];?></li>
<?php } ?>
   <?php } ?>
              </div>
          <?php } ?>
  <?php if(!empty($_G['setting']['pluginhooks']['global_myitem_extra'])) echo $_G['setting']['pluginhooks']['global_myitem_extra'];?>
            </ul>
          </div>
        </div>
      </div>
      <ul class="usernav">
      </ul>
      <?php } elseif(!empty($_G['cookie']['loginuser'])) { ?>
      <div class="Quater_user">
        <div class="Quater_user_info">
          <div class="user-main ">
            <div class="avatar"> <img src="template/quater_6_ui/src/noLogin.jpg" alt="" height="32" width="32"></div>
            <span class="nickname"><?php echo $_G['member']['username'];?></span><span class="arrow"></span></div>
          <div class="user-link">
            <ul>
              <li><a id="loginuser"><?php echo dhtmlspecialchars($_G['cookie']['loginuser']); ?></a></li>
              <li><a href="member.php?mod=logging&amp;action=login" onClick="showWindow('login', this.href)">激活</a></li>
              <li><a href="member.php?mod=logging&amp;action=logout&amp;formhash=<?php echo FORMHASH;?>">退出</a></li>
            </ul>
          </div>
        </div>
      </div>
      <?php } elseif(!$_G['connectguest']) { ?>
      <div class="Quater_user lg_box" style="margin-left: 30px;">
       <ul>
              <li class="z" style="margin-right: 0; overflow: hidden;"><a href="member.php?mod=logging&amp;action=login" class="log1" style="color: #3498db;"><i></i>登录</a></li>
              <li class="z reg"><a href="member.php?mod=<?php echo $_G['setting']['regname'];?>" class="reg1" style="padding-left: 3px; color: #E2E5EA;"><i></i> / 注册</a></li>
       </ul>
      </div>
      <div style="display:none"><?php include template('member/login_simple'); ?></div>
      <?php } else { ?>
      <div class="Quater_user">
        <div class="Quater_user_info">
          <div class="user-main ">
            <div class="avatar"> <img src="template/quater_6_ui/src/noLogin.jpg" alt="" height="32" width="32"></div>
            <span class="nickname">用户</span><span class="arrow"></span></div>
          <div class="user-link">
            <ul>
              <li class="l1"><a href="home.php?mod=spacecp&amp;ac=usergroup"><i></i><?php echo $_G['member']['username'];?></a></li>
              <li class="l2"><a href="member.php?mod=logging&amp;action=logout&amp;formhash=<?php echo FORMHASH;?>">退出</a></li>
            </ul>
          </div>
        </div>
      </div>
      <?php } ?>
      <div href="javascript:void(0)" target="_blank" class="search-li" title="搜索"><i class="icon-search "></i></div>
      <div style="display: none;" class="quater_search"> 
       <div class="wp cl" style="width: 570px; margin: 0 auto; position: relative; z-index: 1000; background: none;">
          <?php if($_G['setting']['search']) { $slist = array();?><?php if($_G['fid'] && $_G['forum']['status'] != 3 && $mod != 'group') { ?><?php
$slist[forumfid] = <<<EOF
<li><a href="javascript:;" rel="curforum" fid="{$_G['fid']}" >本版</a></li>
EOF;
?><?php } if($_G['setting']['portalstatus'] && $_G['setting']['search']['portal']['status'] && ($_G['group']['allowsearch'] & 1 || $_G['adminid'] == 1)) { ?><?php
$slist[portal] = <<<EOF
<li><a href="javascript:;" rel="article">文章</a></li>
EOF;
?><?php } if($_G['setting']['search']['forum']['status'] && ($_G['group']['allowsearch'] & 2 || $_G['adminid'] == 1)) { ?><?php
$slist[forum] = <<<EOF
<li><a href="javascript:;" rel="forum" class="curtype">帖子</a></li>
EOF;
?><?php } if(helper_access::check_module('blog') && $_G['setting']['search']['blog']['status'] && ($_G['group']['allowsearch'] & 4 || $_G['adminid'] == 1)) { ?><?php
$slist[blog] = <<<EOF
<li><a href="javascript:;" rel="blog">日志</a></li>
EOF;
?><?php } if(helper_access::check_module('album') && $_G['setting']['search']['album']['status'] && ($_G['group']['allowsearch'] & 8 || $_G['adminid'] == 1)) { ?><?php
$slist[album] = <<<EOF
<li><a href="javascript:;" rel="album">相册</a></li>
EOF;
?><?php } if($_G['setting']['groupstatus'] && $_G['setting']['search']['group']['status'] && ($_G['group']['allowsearch'] & 16 || $_G['adminid'] == 1)) { ?><?php
$slist[group] = <<<EOF
<li><a href="javascript:;" rel="group">{$_G['setting']['navs']['3']['navname']}</a></li>
EOF;
?><?php } ?><?php
$slist[user] = <<<EOF
<li><a href="javascript:;" rel="user">用户</a></li>
EOF;
?>
<?php } if($_G['setting']['search'] && $slist) { ?>
<div id="scbar" class="<?php if($_G['setting']['srchhotkeywords'] && count($_G['setting']['srchhotkeywords']) > 5) { ?>scbar_narrow <?php } ?>cl">
<form id="scbar_form" method="<?php if($_G['fid'] && !empty($searchparams['url'])) { ?>get<?php } else { ?>post<?php } ?>" autocomplete="off" onsubmit="searchFocus($('scbar_txt'))" action="<?php if($_G['fid'] && !empty($searchparams['url'])) { ?><?php echo $searchparams['url'];?><?php } else { ?>search.php?searchsubmit=yes<?php } ?>" target="_blank">
<input type="hidden" name="mod" id="scbar_mod" value="search" />
<input type="hidden" name="formhash" value="<?php echo FORMHASH;?>" />
<input type="hidden" name="srchtype" value="title" />
<input type="hidden" name="srhfid" value="<?php echo $_G['fid'];?>" />
<input type="hidden" name="srhlocality" value="<?php echo $_G['basescript'];?>::<?php echo CURMODULE;?>" />
<?php if(!empty($searchparams['params'])) { if(is_array($searchparams['params'])) foreach($searchparams['params'] as $key => $value) { $srchotquery .= '&' . $key . '=' . rawurlencode($value);?><input type="hidden" name="<?php echo $key;?>" value="<?php echo $value;?>" />
<?php } ?>
<input type="hidden" name="source" value="discuz" />
<input type="hidden" name="fId" id="srchFId" value="<?php echo $_G['fid'];?>" />
<input type="hidden" name="q" id="cloudsearchquery" value="" />

<style>
#scbar { overflow: visible; position: relative; }
#sg{ background: #FFF; width:456px; border: 1px solid #B2C7DA; }
.scbar_narrow #sg { width: 316px; }
#sg li { padding:0 8px; line-height:30px; font-size:14px; }
#sg li span { color:#999; }
.sml { background:#FFF; cursor:default; }
.smo { background:#E5EDF2; cursor:default; }
            </style>
            <div style="display: none; position: absolute; top:37px; left:44px;" id="sg">
                <div id="st_box" cellpadding="2" cellspacing="0"></div>
            </div>
<?php } ?>
<table cellspacing="0" cellpadding="0">
<tr>
<td class="scbar_btn_td"><button type="submit" name="searchsubmit" id="scbar_btn" sc="1" class="pn pnc" value="true"><strong class="xi2">搜索</strong></button></td>   
<td class="scbar_type_td"><a href="javascript:;" id="scbar_type" class="xg1" onclick="showMenu(this.id)" hidefocus="true">搜索</a></td>                         
<td class="scbar_txt_td"><input type="text" name="srchtxt" id="scbar_txt" value="请输入搜索内容" autocomplete="off" x-webkit-speech speech /></td>
</tr>
</table>
</form>
</div>
<div class="scbar_hot_td" style="float: left; width: 570px; padding: 35px 0;">
<div id="scbar_hot" style="height: auto; padding: 0;">
<?php if($_G['setting']['srchhotkeywords']) { ?>
<div class="hot_1 cl" style="font-size: 16px; margin: 0 0 12px 0; color: #BBBBBB; font-weight: 400;">热搜</div>
                            <div class="hot_2 cl"><?php if(is_array($_G['setting']['srchhotkeywords'])) foreach($_G['setting']['srchhotkeywords'] as $val) { if($val=trim($val)) { $valenc=rawurlencode($val);?><?php
$__FORMHASH = FORMHASH;$srchhotkeywords[] = <<<EOF


EOF;
 if(!empty($searchparams['url'])) { 
$srchhotkeywords[] .= <<<EOF

<a href="{$searchparams['url']}?q={$valenc}&source=hotsearch{$srchotquery}" target="_blank" class="xi2" sc="1" style="	display: inline-block;
    color: #3ca5f6;
    font-weight: 700;
    font-size: 16px;
float: left;
    height: 33px;
    border: 1px solid #f0f0f0;
    margin: 0 20px 20px 0;
    padding: 0 15px;
    cursor: pointer;
    line-height: 33px;">{$val}</a>

EOF;
 } else { 
$srchhotkeywords[] .= <<<EOF

<a href="search.php?mod=forum&amp;srchtxt={$valenc}&amp;formhash={$__FORMHASH}&amp;searchsubmit=true&amp;source=hotsearch" target="_blank" class="xi2" sc="1" style="	display: inline-block;
    color: #3ca5f6;
    font-weight: 700;
    font-size: 16px;
float: left;
    height: 33px;
    border: 1px solid #f0f0f0;
    margin: 0 20px 20px 0;
    padding: 0 15px;
    cursor: pointer;
    line-height: 33px;">{$val}</a>

EOF;
 } 
$srchhotkeywords[] .= <<<EOF


EOF;
?>
<?php } } ?>
                            </div><?php echo implode('', $srchhotkeywords);; } ?>
</div>
</div>
<ul id="scbar_type_menu" class="p_pop" style="display: none;"><?php echo implode('', $slist);; ?></ul>
<script type="text/javascript">
initSearchmenu('scbar', '<?php echo $searchparams['url'];?>');
</script>
<?php } ?>
          <?php if($_G['setting']['search']) { ?> 
<!-- 搜索筛选 -->
<ul id="scbar_type_menu" class="p_pop" style="display: none;">
  <?php echo implode('', $slist);; ?></ul>
<script type="text/javascript">
initSearchmenu('scbar', '<?php echo $searchparams['url'];?>');
</script> 
<?php } ?>
       </div>
       <i class="close-search headericon-close"></i>
      </div>
      <div class="global-search-mask" style="display: none; background-color: #FFFFFF; width: 100%; height: 100%; position: fixed; top: 0; left: 0px; z-index: 300;"></div>
      <script type="text/javascript">
      jQuery(document).ready(function(jQuery) {
jQuery('.search-li').click(function(){
jQuery('.global-search-mask').fadeIn(200);
jQuery('.quater_search').slideDown(300);
})
jQuery('.close-search').click(function(){
jQuery('.global-search-mask').fadeOut(50);
jQuery('.quater_search').slideUp(300);
})

})
    </script>
    <div class="th_post y cl" style="display: none;"><a onClick="showWindow('newthread', 'forum.php?mod=post&amp;action=newthread&amp;fid=<?php echo $_G['fid'];?>')" href="javascript:;" title="发新帖" style="margin: 0;">发布</a></div>
    </div>
  </div>
</div>
<div class="mus_box cl">
  <div id="mus" class="wp cl"> 
    <?php if($_G['setting']['subnavs']) { ?> 
    <?php if(is_array($_G['setting']['subnavs'])) foreach($_G['setting']['subnavs'] as $navid => $subnav) { ?> 
    <?php if($_G['setting']['navsubhover'] || $mnid == $navid) { ?>
    <ul class="cl <?php if($mnid == $navid) { ?>current<?php } ?>" id="snav_<?php echo $navid;?>" style="display:<?php if($mnid != $navid) { ?>none<?php } ?>">
      <?php echo $subnav;?>
    </ul>
    <?php } ?> 
    <?php } ?> 
    <?php } ?> 
  </div>
</div>

<?php if(!IS_ROBOT) { ?> 
<?php if($_G['uid']) { ?>
<ul id="myprompt_menu" class="p_pop" style="display: none;">
  <li><a href="home.php?mod=space&amp;do=pm" id="pm_ntc" style="background-repeat: no-repeat; background-position: 0 50%;"><em class="prompt_news<?php if(empty($_G['member']['newpm'])) { ?>_0<?php } ?>"></em>消息</a></li>
  <li><a href="home.php?mod=follow&amp;do=follower"><em class="prompt_follower<?php if(empty($_G['member']['newprompt_num']['follower'])) { ?>_0<?php } ?>"></em>新听众<?php if($_G['member']['newprompt_num']['follower']) { ?>(<?php echo $_G['member']['newprompt_num']['follower'];?>)<?php } ?></a></li>
  
  <?php if($_G['member']['newprompt'] && $_G['member']['newprompt_num']['follow']) { ?>
  <li><a href="home.php?mod=follow"><em class="prompt_concern"></em>我关注的(<?php echo $_G['member']['newprompt_num']['follow'];?>)</a></li>
  <?php } ?> 
  <?php if($_G['member']['newprompt']) { ?> 
  <?php if(is_array($_G['member']['category_num'])) foreach($_G['member']['category_num'] as $key => $val) { ?>  <li><a href="home.php?mod=space&amp;do=notice&amp;view=<?php echo $key;?>"><em class="notice_<?php echo $key;?>"></em><?php echo lang('template', 'notice_'.$key); ?>(<span class="rq"><?php echo $val;?></span>)</a></li>
  <?php } ?> 
  <?php } ?> 
  <?php if(empty($_G['cookie']['ignore_notice'])) { ?>
  <li class="ignore_noticeli"><a href="javascript:;" onClick="setcookie('ignore_notice', 1);hideMenu('myprompt_menu')" title="暂不提醒"><em class="ignore_notice"></em></a></li>
  <?php } ?>
</ul>
<?php } ?> 
<?php if($_G['uid'] && !empty($_G['style']['extstyle'])) { ?>
<div id="sslct_menu" class="cl p_pop" style="display: none;"> 
  <?php if(!$_G['style']['defaultextstyle']) { ?><span class="sslct_btn" onClick="extstyle('')" title="默认"><i></i></span><?php } ?> 
  <?php if(is_array($_G['style']['extstyle'])) foreach($_G['style']['extstyle'] as $extstyle) { ?> 
  <span class="sslct_btn" onClick="extstyle('<?php echo $extstyle['0'];?>')" title="<?php echo $extstyle['1'];?>"><i style='background:<?php echo $extstyle['2'];?>'></i></span> 
  <?php } ?> 
</div>
<?php } ?> <div id="qmenu_menu" class="p_pop <?php if(!$_G['uid']) { ?>blk<?php } ?>" style="display: none;">
<?php if(!empty($_G['setting']['pluginhooks']['global_qmenu_top'])) echo $_G['setting']['pluginhooks']['global_qmenu_top'];?>
<?php if($_G['uid']) { ?>
<ul class="cl nav"><?php if(is_array($_G['setting']['mynavs'])) foreach($_G['setting']['mynavs'] as $nav) { if($nav['available'] && (!$nav['level'] || ($nav['level'] == 1 && $_G['uid']) || ($nav['level'] == 2 && $_G['adminid'] > 0) || ($nav['level'] == 3 && $_G['adminid'] == 1))) { ?>
<li><?php echo $nav['code'];?></li>
<?php } } ?>
</ul>
<?php } elseif($_G['connectguest']) { ?>
<div class="ptm pbw hm">
请先<br /><a class="xi2" href="member.php?mod=connect"><strong>完善帐号信息</strong></a> 或 <a href="member.php?mod=connect&amp;ac=bind" class="xi2 xw1"><strong>绑定已有帐号</strong></a><br />后使用快捷导航
</div>
<?php } else { ?>
<div class="ptm pbw hm">
请 <a href="javascript:;" class="xi2" onclick="lsSubmit()"><strong>登录</strong></a> 后使用快捷导航<br />没有帐号？<a href="member.php?mod=<?php echo $_G['setting']['regname'];?>" class="xi2 xw1"><?php echo $_G['setting']['reglinkname'];?></a>
</div>
<?php } if($_G['setting']['showfjump']) { ?><div id="fjump_menu" class="btda"></div><?php } ?>
<?php if(!empty($_G['setting']['pluginhooks']['global_qmenu_bottom'])) echo $_G['setting']['pluginhooks']['global_qmenu_bottom'];?>
</div> 
<?php } ?> 

<?php if(!empty($_G['setting']['plugins']['jsmenu'])) { ?>
<ul class="p_pop h_pop" id="plugin_menu" style="display: none">
  <?php if(is_array($_G['setting']['plugins']['jsmenu'])) foreach($_G['setting']['plugins']['jsmenu'] as $module) { ?> 
  <?php if(!$module['adminid'] || ($module['adminid'] && $_G['adminid'] > 0 && $module['adminid'] >= $_G['adminid'])) { ?>
  <li><?php echo $module['url'];?></li>
  <?php } ?> 
  <?php } ?>
</ul>
<?php } ?> 
<!-- 二级导航 -->
<div class="sub_nav"> <?php echo $_G['setting']['menunavs'];?> </div>


<!-- 用户菜单 -->
<ul class="sub_menu" id="m_menu" style="display: none;">
  <?php if(check_diy_perm($topic)) { ?>
  <li><a href="javascript:openDiy();" title="打开 DIY 面板">打开DIY</a></li>
  <?php } ?> 
  <?php if(is_array($_G['setting']['mynavs'])) foreach($_G['setting']['mynavs'] as $nav) { ?> 
  <?php if($nav['available'] && (!$nav['level'] || ($nav['level'] == 1 && $_G['uid']) || ($nav['level'] == 2 && $_G['adminid'] > 0) || ($nav['level'] == 3 && $_G['adminid'] == 1))) { ?>
  <li style="display: none;"><?php echo $nav['code'];?></li>
  <?php } ?> 
  <?php } ?>
  <li><a href="home.php?mod=spacecp">设置</a></li>
  <?php if(($_G['group']['allowmanagearticle'] || $_G['group']['allowpostarticle'] || $_G['group']['allowdiy'] || getstatus($_G['member']['allowadmincp'], 4) || getstatus($_G['member']['allowadmincp'], 6) || getstatus($_G['member']['allowadmincp'], 2) || getstatus($_G['member']['allowadmincp'], 3))) { ?>
  <li><a href="portal.php?mod=portalcp"><?php if($_G['setting']['portalstatus'] ) { ?>门户管理<?php } else { ?>模块管理<?php } ?></a></li>
  <?php } ?> 
  <?php if($_G['uid'] && $_G['group']['radminid'] > 1) { ?>
  <li><a href="forum.php?mod=modcp&amp;fid=<?php echo $_G['fid'];?>" target="_blank"><?php echo $_G['setting']['navs']['2']['navname'];?>管理</a></li>
  <?php } ?>
  <li><a href="home.php?mod=space&amp;do=favorite&amp;view=me">我的收藏</a></li>
  <?php if($_G['uid'] && $_G['adminid'] == 1 && $_G['setting']['cloud_status']) { ?>
  <li><a href="admin.php?frames=yes&amp;action=cloud&amp;operation=applist" target="_blank">云平台</a></li>
  <?php } ?> 
  <?php if($_G['uid'] && getstatus($_G['member']['allowadmincp'], 1)) { ?>
  <li><a href="admin.php" target="_blank">管理中心</a></li>
  <?php } ?>
  <li><?php if(!empty($_G['setting']['pluginhooks']['global_usernav_extra1'])) echo $_G['setting']['pluginhooks']['global_usernav_extra1'];?></li>
  <li><?php if(!empty($_G['setting']['pluginhooks']['global_usernav_extra2'])) echo $_G['setting']['pluginhooks']['global_usernav_extra2'];?></li>
  <li><?php if(!empty($_G['setting']['pluginhooks']['global_usernav_extra3'])) echo $_G['setting']['pluginhooks']['global_usernav_extra3'];?></li>
  <li><?php if(!empty($_G['setting']['pluginhooks']['global_usernav_extra4'])) echo $_G['setting']['pluginhooks']['global_usernav_extra4'];?></li>
  <li><a href="member.php?mod=logging&amp;action=logout&amp;formhash=<?php echo FORMHASH;?>">退出</a></li>
</ul>
<ul class="sub_menu" id="l_menu" style="display: none;">
  
  <!-- 第三方登录 -->
  <li class="user_list app_login"><a href="connect.php?mod=login&amp;op=init&amp;referer=forum.php&amp;statfrom=login"><i class="i_qq"></i>腾讯QQ</a></li>
  <li class="user_list app_login"><a href="plugin.php?id=wechat:login"><i class="i_wb"></i>微信登录</a></li>
</ul><?php echo adshow("headerbanner/wp a_h");?><?php echo adshow("subnavbanner/a_mu");?><?php if(!empty($_G['setting']['pluginhooks']['global_header'])) echo $_G['setting']['pluginhooks']['global_header'];?> 
<?php } ?>

<div id="wp" class="wp time_wp cl">
