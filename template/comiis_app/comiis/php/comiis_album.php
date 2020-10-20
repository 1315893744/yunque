<?php

if (!defined('IN_DISCUZ')) {
    exit('Access Denied');
}
$comiis_img_no = 0;
$comiis_pic = array();
$comiis_show_aid = array();
if ($_G['uid']) {
    $comiis_thead_fav = C::t('home_favorite')->fetch_by_id_idtype($pic['albumid'], 'albumid', $_G['uid']);
} else {
    $comiis_thead_fav = array();
}
foreach (C::t('home_pic')->fetch_all_by_albumid($pic['albumid'], '', '', '', '1') as $key => $temp) {
    $comiis_show_aid[$key] = $temp['picid'];
    $temp['pic_thumb'] = pic_get($temp['filepath'], 'album', $temp['thumb'], $temp['remote']);
    $temp['pic'] = pic_get($temp['filepath'], 'album', 0, $temp['remote']);
    $temp['title'] = $temp['title'] ? $temp['title'] : $album['depict'];
    $comiis_pic[] = $temp;
}
$comiis_img_no = array_search($picid, $comiis_show_aid);