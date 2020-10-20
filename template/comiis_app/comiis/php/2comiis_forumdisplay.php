<?php

if (!defined('IN_DISCUZ')) {
    exit('Access Denied');
}
if ($_G['forum']['favtimes'] && $_G['uid']) {
    $comiis_forum_fav = C::t('home_favorite')->fetch_by_id_idtype($_G['fid'], 'fid', $_G['uid']);
} else {
    $comiis_forum_fav = array();
}
$comiis_forumlist_array = (array) dunserialize($comiis_app_switch['comiis_open_displayorder']);
$comiis_open_displayorder = in_array($_G['fid'], $comiis_forumlist_array) || in_array('all', $comiis_forumlist_array) ? 0 : 1;
$comiis_forumlist_array = (array) dunserialize($comiis_app_switch['comiis_open_announcement']);
$comiis_app_switch['comiis_open_announcement'] = in_array($_G['fid'], $comiis_forumlist_array) || in_array('all', $comiis_forumlist_array) ? 0 : 1;
$comiis_authorids = array();
$comiis_displayorder_array = array();
$comiis_tids = array();
$comiis_readtids = array();
$comiis_displayorder_list = '';
$comiis_displayorder_num = 0;
if (count($_G['forum_threadlist'])) {
    foreach ($_G['forum_threadlist'] as $k => $thread) {
        if (in_array($thread['displayorder'], array(1, 2, 3, 4)) && $page == 1 && $comiis_open_displayorder) {
            $comiis_displayorder_list .= '<li class="b_t"><a href="forum.php?mod=viewthread&tid=' . $thread[tid] . '"' . $thread[highlight] . ($thread['isgroup'] == 1 || $thread['forumstick'] ? 'target="_blank"' : '') . '>' . ($comiis_app_switch['comiis_ann_ico'] == 1 ? '<i class="comiis_font comiis_list_ann bg_0 f_f">&#xe6cf;</i>' : '<em class="comiis_xifont f_0">' . $comiis_lang['view41'] . '</em>') . $thread[subject] . '</a></li>';
            ($comiis_displayorder_num += 1) + -1;
        }
    }
}
$comiis_forumlist_array = (array) dunserialize($comiis_app_switch['comiis_forumlist_notit']);
$comiis_forumlist_notit = in_array($_G['fid'], $comiis_forumlist_array) || in_array('all', $comiis_forumlist_array) ? 0 : 1;
$comiis_forumlist_array = (array) dunserialize($comiis_app_switch['comiis_list_ico']);
$comiis_app_switch['comiis_list_ico'] = in_array($_G['fid'], $comiis_forumlist_array) || in_array('all', $comiis_forumlist_array) ? 0 : 1;