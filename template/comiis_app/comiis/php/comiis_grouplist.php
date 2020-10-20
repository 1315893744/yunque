<?php

if (!defined('IN_DISCUZ')) {
    exit('Access Denied');
}
if ($_G['uid']) {
    $user_fid = C::t('forum_groupuser')->fetch_all_fid_by_uids($_G['uid']);
} else {
    $user_fid = array();
}