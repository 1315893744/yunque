<?php

if (!defined('IN_DISCUZ')) {
    exit('Access Denied');
}
$perpage = 10;
$count = uc_pm_view_num($_G['uid'], $touid, 0);
$pages = ceil($count / $perpage);
if ($page > $pages) {
    $page = $pages;
}
$result = uc_pm_view($_G['uid'], 0, $touid, 5, ceil($count / $perpage) - $page + 1, $perpage, 0, 0);
$multi = pmmulti($count, $perpage, $page, 'home.php?mod=space&do=pm&subop=view&viewall=1&touid=' . $touid);
$msglist = array();
$comiis_msg_endtime = 0;
foreach ($result as $key => $value) {
    $comiis_msg_endtime = $value['dateline'];
    $daykey = dgmdate($value['dateline'], 'Y-m-d');
    $msglist[$daykey][$key] = $value;
}