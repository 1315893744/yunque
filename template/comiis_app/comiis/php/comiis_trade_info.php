<?php

if (!defined('IN_DISCUZ')) {
    exit('Access Denied');
}
if ($_G['forum_thread']['favtimes'] && $_G['uid']) {
    $comiis_thead_fav = C::t('home_favorite')->fetch_by_id_idtype($_G['forum_thread']['tid'], 'tid', $_G['uid']);
} else {
    $comiis_thead_fav = array();
}