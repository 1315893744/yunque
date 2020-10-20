<?php

if (!defined('IN_DISCUZ')) {
    exit('Access Denied');
}
if ($comiis_app_switch['comiis_bbstype'] == 1) {
    $comiis_recommend_forum = array();
    $favfid_list = array();
    loadcache('forums');
    if (!empty($forum_favlist)) {
        foreach ($forum_favlist as $temp) {
            $favfid_list[$temp['id']] = $temp['favid'];
        }
    }
    if (empty($gid) && $comiis_app_switch['comiis_bbshot'] == 1) {
        $comiis_recommend_forum_id = (array) dunserialize($comiis_app_switch['comiis_bbshot_forum']);
        $comiis_recommend_forum = C::t('forum_forum')->fetch_all($comiis_recommend_forum_id);
        $comiis_recommend_forum_fields = C::t('forum_forumfield')->fetch_all($comiis_recommend_forum_id);
        foreach ($comiis_recommend_forum as $id => $forum) {
            if ($comiis_recommend_forum_fields[$forum['fid']]['fid']) {
                $comiis_recommend_forum[$id] = array_merge($forum, $comiis_recommend_forum_fields[$forum['fid']]);
            }
            forum($comiis_recommend_forum[$id]);
        }
    }
    $comiis_isnoe = 0;
    $comiis_isfav = 0;
}