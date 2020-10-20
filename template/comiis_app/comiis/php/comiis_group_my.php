<?php

if (!defined('IN_DISCUZ')) {
    exit('Access Denied');
}
$user_fid = C::t('forum_groupuser')->fetch_all_fid_by_uids($_G['uid']);
$list_all = array();
$list = array();
$list_all = C::t('forum_forum')->fetch_all_for_grouplist('', '', '', '', 1);
foreach ($list_all as $temp) {
    $temp['icon'] = get_groupimg($temp['icon'], 'icon');
    $_G['cache']['forums'][$temp['fid']] = $temp;
}
$page = max(1, intval(getgpc('page')));
$mpp = 10;
$startlimit = ($page - 1) * $mpp;
if ($view == 'mythread') {
    $fidwhere = ' AND authorid=\'' . $_G['uid'] . '\'';
} else {
    $fidwhere = '';
}
$num = DB::result_first('SELECT COUNT(*) FROM %t WHERE isgroup=\'1\' AND displayorder>=\'0\' AND fid IN(' . dimplode($user_fid) . (')' . $fidwhere), array('forum_thread'));
$multipage = multi($num, $mpp, $page, 'group.php?mod=my&view=groupthread');
loadcache('databasemaxid');
$maxid = $_G['cache']['databasemaxid']['thread']['id'] - $_G['setting']['blockmaxaggregationitem'];
$maxwhere = $_G['cache']['databasemaxid']['thread']['id'] - $_G['setting']['blockmaxaggregationitem'] > 0 ? 'tid > ' . $maxid . ' AND ' : '';
$_G['forum_threadlist'] = DB::fetch_all('SELECT * FROM %t WHERE ' . $maxwhere . 'isgroup=\'1\' AND displayorder>=\'0\' AND fid IN(' . dimplode($user_fid) . (')' . $fidwhere . ' ORDER BY dateline DESC LIMIT ' . $startlimit . ',' . $mpp), array('forum_thread'));