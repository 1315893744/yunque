<?php

'14127ba9770bdb1339a99d13214d2256';
'1512659442';
if (!defined('IN_DISCUZ')) {
    exit('Access Denied');
}
$needhiddenreply = $hiddenreplies && $_G['uid'] != $post['authorid'] && $_G['uid'] != $_G['forum_thread']['authorid'] && !$post['first'] && !$_G['forum']['ismoderator'];
$comiis_page = @ceil(($_G['forum_thread']['replies'] + 1) / $_G['ppp']);
if ($_G['forum']['favtimes'] && $_G['uid']) {
    $comiis_forum_fav = C::t('home_favorite')->fetch_by_id_idtype($_G['fid'], $_G['forum_thread']['isgroup'] ? 'gid' : 'fid', $_G['uid']);
} else {
    $comiis_forum_fav = array();
}
if ($_G['forum_thread']['favtimes'] && $_G['uid']) {
    $comiis_thead_fav = C::t('home_favorite')->fetch_by_id_idtype($_G['forum_thread']['tid'], 'tid', $_G['uid']);
} else {
    $comiis_thead_fav = array();
}
if ($_G['forum_thread']['recommend_add']) {
    if ($comiis_app_switch['comiis_recommend'] == 0) {
        $comiis_recommend_style1 = DB::fetch_all('SELECT recommenduid as uid FROM ' . DB::table('forum_memberrecommend') . (' WHERE tid=\'' . $_G['tid'] . '\' ORDER BY dateline DESC LIMIT 10'));
    } elseif ($comiis_app_switch['comiis_recommend'] == 1) {
        $comiis_recommend_style2 = DB::fetch_all('SELECT m.uid, m.username FROM ' . DB::table('forum_memberrecommend') . ' fm INNER JOIN ' . DB::table('common_member') . (' m ON fm.recommenduid = m.uid WHERE fm.tid=\'' . $_G['tid'] . '\' ORDER BY fm.dateline DESC LIMIT 10'));
    }
    if ($_G['uid']) {
        $comiis_my_recommend = C::t('forum_memberrecommend')->fetch_by_recommenduid_tid($_G['uid'], $_G['tid']);
    } else {
        $comiis_my_recommend = array();
    }
}
if ($_G['uid'] && count($postlist) > 1) {
    $_G['comiis_forum_hotreply_member'] = DB::fetch_all('SELECT pid FROM %t WHERE uid=\'%d\'', array('forum_hotreply_member', $_G['uid']), 'pid');
}
$title_post = $postlist;
reset($title_post);
$title_post = current($title_post);
$comiis_isnotitle = $_G[forum_thread][subject] == cutstr(trim(strip_tags($title_post['message'])), dstrlen($_G[forum_thread][subject]), '') ? 1 : 0;
function comiis_ckfollow($followuid)
{
    global $_G;
    if (empty($_G['uid'])) {
        return false;
    }
    $var = 'home_follow_' . $_G['uid'] . '_' . $followuid;
    if (isset($_G[$var])) {
        return $_G[$var];
    }
    $_G[$var] = false;
    $follow = C::t('home_follow')->fetch_status_by_uid_followuid($_G['uid'], $followuid);
    if (isset($follow[$_G['uid']])) {
        $_G[$var] = true;
    }
    return $_G[$var];
}
function comiis_relateitem($relateitem)
{
    global $comiis_app_switch;
    if ($relateitem && $comiis_app_switch['comiis_view_cnxh'] == 1) {
        $comiis_tids = array();
        foreach ($relateitem as $temp) {
            $comiis_tids[] = $temp['tid'];
        }
        if (count($comiis_tids)) {
            require_once libfile('function/post');
            $message = array();
            $comiis_picid_array = array();
            require_once libfile('function/post');
            $query = DB::query('SELECT tid, pid, message FROM `' . DB::table('forum_post') . '` WHERE tid IN (' . dimplode($comiis_tids) . ') AND first=1');
            while ($temp = DB::fetch($query)) {
                $message[$temp['tid']] = messagecutstr($temp['message'], 100);
                $comiis_picid_array[getattachtableid($temp[tid])][] = $temp['pid'];
            }
            $comiis_pic_lista = array();
            $comiis_pic_list = array();
            foreach ($comiis_picid_array as $tableid => $pids) {
                if ($tableid >= 0 && !($tableid >= 10)) {
                    $query = DB::query('SELECT tid, aid, attachment, width FROM `' . DB::table('forum_attachment_' . intval($tableid)) . '` WHERE pid IN (' . dimplode($pids) . ') AND isimage IN (1, -1)');
                    while ($temp = DB::fetch($query)) {
                        $comiis_pic_list[$temp['tid']]['num'] = $comiis_pic_list[$temp['tid']]['num'] + 1;
                        if (!($comiis_pic_list[$temp['tid']]['num'] > 3)) {
                            $comiis_pic_list[$temp['tid']]['aid'][] = $temp['aid'];
                            $comiis_pic_list[$temp['tid']]['width'][] = $temp['width'];
                            $comiis_pic_list[$temp['tid']]['attachment'][] = $temp['attachment'];
                        }
                    }
                }
            }
            return array('message' => $message, 'comiis_pic_list' => $comiis_pic_list);
        }
    }
    return array('message' => '', 'comiis_pic_list' => '');
}