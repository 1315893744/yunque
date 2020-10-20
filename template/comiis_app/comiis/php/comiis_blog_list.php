<?php

if (!defined('IN_DISCUZ')) {
    exit('Access Denied');
}
$blogarray = array();
$blogidarray = array();
foreach ($bloglist as $temp) {
    $blogidarray[$temp['blogid']] = $temp['blogid'];
}
if (!empty($blogidarray)) {
    $data_blogfield = C::t('home_blogfield')->fetch_all($blogidarray);
    foreach ($data_blogfield as $curblogid => $result) {
        if ($result['friend'] == 4) {
            $result['pic'] = '';
            $result['message'] = '';
        } else {
            $result['message'] = getstr($result['message'], $summarylen, 0, 0, 0, 0 - 1);
        }
        $blogarray[$result['blogid']]['message'] = cutstr(strip_tags(preg_replace('/&[a-z]+\\;/i', '', $result['message'])), 120);
        if ($result['pic']) {
            if ($result['picflag'] == 2) {
                $blogarray[$result['blogid']]['pic'] = $_G['setting']['ftp']['attachurl'] . 'album/' . $result['pic'];
            } else {
                $blogarray[$result['blogid']]['pic'] = $_G['setting']['attachurl'] . 'album/' . $result['pic'];
            }
        }
    }
}