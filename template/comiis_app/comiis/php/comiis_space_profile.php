<?php

if (!defined('IN_DISCUZ')) {
    exit('Access Denied');
}
if (!$space['self'] && $_G['uid'] && $_GET['additional'] != 'removevlog') {
    $visitor = C::t('home_visitor')->fetch_by_uid_vuid($space['uid'], $_G['uid']);
    $is_anonymous = empty($_G['cookie']['anonymous_visit_' . $_G['uid'] . '_' . $space['uid']]) ? 0 : 1;
    if (empty($visitor['dateline'])) {
        $setarr = array('uid' => $space['uid'], 'vuid' => $_G['uid'], 'vusername' => $is_anonymous ? '' : $_G['username'], 'dateline' => $_G['timestamp']);
        C::t('home_visitor')->insert($setarr, false, true);
    } elseif ($_G['timestamp'] - $visitor['dateline'] >= 300) {
        C::t('home_visitor')->update_by_uid_vuid($space['uid'], $_G['uid'], array('dateline' => $_G['timestamp'], 'vusername' => $is_anonymous ? '' : $_G['username']));
    }
}
$comiis_visitor = C::t('home_visitor')->fetch_all_by_uid($_G['uid'], 5);