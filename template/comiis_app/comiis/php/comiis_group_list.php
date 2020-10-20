<?php

if (!defined('IN_DISCUZ')) {
    exit('Access Denied');
}
$comiis_displayorder_num = 0;
$comiis_displayorder_list = '';
$_G['cache']['forums'][$thread[fid]]['name'] = $_G[forum][name];
if (count($_G['forum_threadlist'])) {
    foreach ($_G['forum_threadlist'] as $thread) {
        if (in_array($thread['displayorder'], array(1, 2, 3, 4)) && $page == 1) {
            $comiis_displayorder_list .= '<li class="b_t"><a href="forum.php?mod=viewthread&tid=' . $thread[tid] . '"' . $thread[highlight] . ($thread['isgroup'] == 1 || $thread['forumstick'] ? 'target="_blank"' : '') . '><span class="bg_0 f_f">' . $comiis_lang['view2'] . '</span>' . $thread[subject] . '</a></li>';
            ($comiis_displayorder_num += 1) + -1;
        }
    }
}