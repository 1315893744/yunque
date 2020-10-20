<?php

if (!defined('IN_DISCUZ')) {
    exit('Access Denied');
}
if ($_GET['op'] == 'recommend') {
    $comiis_all_recommend = DB::fetch_all('SELECT m.uid, m.username FROM ' . DB::table('forum_memberrecommend') . ' fm INNER JOIN ' . DB::table('common_member') . ' m ON fm.recommenduid = m.uid WHERE fm.tid=\'' . intval($_GET['tid']) . '\' ORDER BY fm.dateline DESC');
} elseif ($_GET['op'] == 'activitylist') {
    $comiis_temp = C::t('forum_activityapply')->fetch_all_for_thread(intval($_GET['tid']), 0, 0, 0, 1);
    $comiis_ctivity_n = array();
    $comiis_ctivity_y = array();
    $comiis_ctivity_ns = 0;
    $comiis_ctivity_ys = 0;
    foreach ($comiis_temp as $temp) {
        if ($temp['verified'] == 1) {
            $comiis_ctivity_y[] = $temp;
        } else {
            $comiis_ctivity_n[] = $temp;
        }
    }
    $comiis_ctivity_ys = count($comiis_ctivity_y);
    $comiis_ctivity_ns = count($comiis_ctivity_n);
}