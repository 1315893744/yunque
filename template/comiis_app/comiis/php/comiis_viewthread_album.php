<?php

if (!defined('IN_DISCUZ')) {
    exit('Access Denied');
}
$aid = intval($_GET['aid']);
$comiis_post = array();
$comiis_show_aid_message = array();
$comiis_show_aid_temp = array();
$comiis_show_aid = array();
$comiis_aimgs = array();
$key = 0;
$comiis_is_first = 0;
$comiis_img_no = 0;
foreach ($attachmentlist as $attach) {
    if (!($attach['payed'] == 0)) {
        $comiis_aimgs[$attach['pid']][] = $attach['aid'];
    }
}
foreach ($comiis_aimgs as $key => $temp) {
    if (in_array($aid, $temp)) {
        $comiis_show_aid = $temp;
        foreach ($postarr as $comiis_post) {
            if ($comiis_post['pid'] == $key && $comiis_post['first']) {
                $comiis_is_first = $key;
                break;
            }
        }
        break;
    }
}
if ($comiis_is_first && preg_match_all('/\\[(attach|attachimg)\\](.*?)\\[\\/(attach|attachimg)\\](.*?)\\<comiis_message_end\\>/is', str_ireplace(array('[attach]', '[attachimg]'), array('<comiis_message_end>[attach]', '<comiis_message_end>[attachimg]'), $comiis_post['message']) . '<comiis_message_end>', $message_array, PREG_SET_ORDER)) {
    foreach ($message_array as $temp) {
        $comiis_show_aid_message[intval($temp[2])] = strip_tags(str_ireplace(array("\n", "\r", "\t", ' ', '\'', '"'), '', messagecutstr($temp[4], 180)));
        $comiis_show_aid_temp[] = intval($temp[2]);
    }
    foreach ($comiis_show_aid as $temp) {
        if (!in_array($temp, $comiis_show_aid_temp)) {
            $comiis_show_aid_temp[] = $temp;
        }
    }
    $comiis_show_aid = $comiis_show_aid_temp;
}
$comiis_img_no = array_search($aid, $comiis_show_aid);
if ($_G['forum_thread']['recommend_add']) {
    if ($_G['uid']) {
        $comiis_my_recommend = C::t('forum_memberrecommend')->fetch_by_recommenduid_tid($_G['uid'], $_G['tid']);
    } else {
        $comiis_my_recommend = array();
    }
}
if ($_G['forum_thread']['favtimes'] && $_G['uid']) {
    $comiis_thead_fav = C::t('home_favorite')->fetch_by_id_idtype($_G['forum_thread']['tid'], 'tid', $_G['uid']);
} else {
    $comiis_thead_fav = array();
}