<?php

if (!defined('IN_DISCUZ')) {
    exit('Access Denied');
}
$comiis_fav_count = C::t('home_favorite')->count_by_id_idtype($article[aid], 'aid');
if ($comiis_fav_count && $_G['uid']) {
    $comiis_thead_fav = C::t('home_favorite')->fetch_by_id_idtype($article[aid], 'aid', $_G['uid']);
} else {
    $comiis_thead_fav = array();
}