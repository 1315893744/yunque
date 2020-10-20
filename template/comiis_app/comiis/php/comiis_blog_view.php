<?php

if (!defined('IN_DISCUZ')) {
    exit('Access Denied');
}
if ($_G['uid']) {
    $comiis_thead_fav = C::t('home_favorite')->fetch_by_id_idtype($blog[blogid], 'blogid', $_G['uid']);
} else {
    $comiis_thead_fav = array();
}