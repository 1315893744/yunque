<?php

if (!defined('IN_DISCUZ')) {
    exit('Access Denied');
}
$page = max(1, intval(getgpc('page')));
$mpp = 10;
if ($page == 1 && $_G['uid']) {
    $user_fid = mygrouplist($_G['uid'], 'lastupdate', array('f.name', 'ff.icon', 'ff.description'), 6);
}
if ($comiis_app_switch['comiis_group_ilist']) {
    $startlimit = ($page - 1) * $mpp;
    $num = DB::result_first('SELECT COUNT(*) FROM %t WHERE isgroup=\'1\' AND displayorder>=\'0\'', array('forum_thread'));
    $multipage = multi($num, $mpp, $page, 'group.php?mod=index');
    loadcache('databasemaxid');
    $maxid = $_G['cache']['databasemaxid']['thread']['id'] - $_G['setting']['blockmaxaggregationitem'];
    $maxwhere = $_G['cache']['databasemaxid']['thread']['id'] - $_G['setting']['blockmaxaggregationitem'] > 0 ? 'tid > ' . $maxid . ' AND ' : '';
    $_G['forum_threadlist'] = DB::fetch_all('SELECT * FROM %t WHERE ' . $maxwhere . 'isgroup=\'1\' AND displayorder>=\'0\' ORDER BY dateline DESC LIMIT ' . $startlimit . ',' . $mpp, array('forum_thread'));
    foreach ($_G['forum_threadlist'] as $k => $temp) {
        $_G['forum_threadlist'][$k]['dateline'] = dgmdate($_G['forum_threadlist'][$k]['dateline'], 'u');
    }
    include_once DISCUZ_ROOT . './template/comiis_app/comiis/php/comiis_forumdisplay.php';
}