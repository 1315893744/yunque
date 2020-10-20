<?php

if (!defined('IN_DISCUZ')) {
    exit('Access Denied');
}
$list_picarray_temp = array();
$list_count = array();
$templist = array();
$list = array();
$comiis_aid = array();
$wheresql = category_get_wheresql($cat);
$list = category_get_list($cat, $wheresql, $page);
if (is_array($list['list'])) {
    foreach ($list['list'] as $temp) {
        $templist[$temp['aid']] = $temp;
        $comiis_aid[] = $temp['aid'];
        if ($temp['pic']) {
            $templist[$temp['aid']]['piclist'][0] = $temp['pic'];
        }
    }
    $list['list'] = $templist;
}
if (count($comiis_aid)) {
    $list_count = DB::fetch_all('SELECT * FROM %t WHERE aid IN (%n)', array('portal_article_count', $comiis_aid), 'aid');
    $list_picarray_temp = DB::fetch_all('SELECT attachment,thumb,remote,aid FROM %t WHERE isimage=\'1\' AND aid IN (%n) ORDER BY attachid DESC', array('portal_attachment', $comiis_aid));
    if (is_array($list_picarray_temp)) {
        foreach ($list_picarray_temp as $temp) {
            $temp['attachment'] = pic_get($temp['attachment'], 'portal', $temp['thumb'], $temp['remote'], 1, 0);
            if ($list['list'][$temp['aid']]['piclist'][0] != $temp['attachment'] && !(count($list['list'][$temp['aid']]['piclist']) >= 3)) {
                $list['list'][$temp['aid']]['piclist'][] = $temp['attachment'];
            }
        }
    }
}
$comiis_page = @ceil($list['count'] / $cat['perpage']);