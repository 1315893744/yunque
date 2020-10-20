<?php

if (!defined('IN_DISCUZ')) {
    exit('Access Denied');
}
if (in_array($comiis_list_template, array('default_t_style', 'default_s_style', 'default_h_style', 'default_b_style', 'default_g_style'))) {
    if (in_array($comiis_list_template, array('default_t_style', 'default_s_style', 'default_h_style'))) {
        $comiis_open_displayorder = 0;
        $comiis_app_switch['comiis_list_ico'] = 0;
        $comiis_forumlist_notit = 1;
    }
    if ($comiis_list_template == 'default_g_style') {
        $comiis_app_switch['comiis_list_ico'] = 0;
        $comiis_open_displayorder = 1;
        $comiis_forumlist_notit = 1;
    }
    if ($comiis_list_template == 'default_t_style' || $comiis_list_template == 'default_s_style') {
        $_G['forum_threadlist'] = $threadlist;
    } elseif ($comiis_list_template == 'default_h_style') {
        $_G['forum_threadlist'] = $list;
    }
    require DISCUZ_ROOT . './source/plugin/comiis_app/language/language.' . currentlang() . '.php';
    loadcache('comiis_app_list_style', 1);
    $comiis_app_list_num = $_G['cache']['comiis_app_list_style']['fidlist'][$_G['fid']] ? $_G['cache']['comiis_app_list_style']['fidlist'][$_G['fid']] : $_G['cache']['comiis_app_list_style'][$comiis_list_template];
    $comiis_app_list = $comiis_liststyle_config[$comiis_app_list_num]['sn'];
    $_G['comiis_app_var']['comiis_list_ico'] = $comiis_app_switch['comiis_list_ico'];
    $_G['comiis_app_var']['comiis_open_displayorder'] = $comiis_open_displayorder;
    $_G['comiis_app_var']['comiis_forumlist_notit'] = $comiis_forumlist_notit;
    $_G['comiis_app_var']['comiis_app_list_num'] = $comiis_app_list_num;
    $_G['comiis_app_var']['comiis_app_list'] = $comiis_app_list;
    comiis_load($comiis_app_list, '', '1');
}