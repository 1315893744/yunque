<?php
    if(!defined('IN_DISCUZ') || !defined('IN_ADMINCP')) {
            exit('Access Denied');
    }
    $a_lang = lang('plugin/qidou_love');
    showformheader('');
    showtableheader();
    showsetting($a_lang['h_recom'].$a_lang['link'], '',$_G['siteurl'].'plugin.php?id=qidou_love&type=1', 'text',0,0,$a_lang['link_info']);
    showsetting($a_lang['h_girl'].$a_lang['link'], 'link',$_G['siteurl'].'plugin.php?id=qidou_love&type=2', 'text',0,0,$a_lang['link_info']);
    showsetting($a_lang['h_boy'].$a_lang['link'], 'link',$_G['siteurl'].'plugin.php?id=qidou_love&type=4', 'text',0,0,$a_lang['link_info']);
    showsetting($a_lang['h_encounter'].$a_lang['link'], 'link',$_G['siteurl'].'plugin.php?id=qidou_love:qidou_user&act=meet&type=3', 'text',0,0,$a_lang['link_info']);
    showsetting($a_lang['h_ucenter'].$a_lang['link'], 'link',$_G['siteurl'].'plugin.php?id=qidou_love:qidou_user&act=compile', 'text',0,0,$a_lang['link_info']);
    showtablefooter();
    showformfooter();
?>