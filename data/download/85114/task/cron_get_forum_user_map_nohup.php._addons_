<?php
/**
 * @name: cron_get_forum_user_map_nohup.php
 * @desc: 使用linux nohup 挂起的方式 统计板块与用户关系以及主题(帖子)的分数
 * @author: (songshouming)
 * Time: 2019-11-05 15:22
 */

require './source/class/class_core.php';

$discuz = C::app();
$cachelist = array();

$discuz->cachelist = $cachelist;
$discuz->init();

helper_log::runlog('swan_task', "cron_get_forum_user_map 开始执行!!!");    //打印日志

if(!defined('IN_DISCUZ')) {
    exit('Access Denied');
}

define('BAIDU_SCRIPT_PAGE_SIZE', 500);

getAllForumData();
getThreadScore();

helper_log::runlog('swan_task', "cron_get_forum_user_map 执行结束!!!"); //打印日志

// 处理板块与用户的关系
function getAllForumData() {
    $countRes = DB::result_first("select count(1) as cnt from %t WHERE `password`=%s;", array('forum_forumfield', ''), 'cnt');
    $totalPage = ceil(intval($countRes) / BAIDU_SCRIPT_PAGE_SIZE);

    $page = 1;
    while ($page <= $totalPage) {
        $start = ($page - 1) * BAIDU_SCRIPT_PAGE_SIZE;

        $datas = DB::fetch_all("SELECT formulaperm, viewperm, fid FROM %t WHERE `password`=%s ".DB::limit($start, BAIDU_SCRIPT_PAGE_SIZE), array('forum_forumfield', ''));

        $page++;
        foreach ($datas as $data) {
            // 先清空板块与用户的映射关系
            deleteForumUserMap($data['fid']);

            $insertData = array(
                'fid' => $data['fid'],
                'create_time' => time(),
            );

            $usernames = array(); //设定特定的用户
            if (!empty($data['formulaperm'])) {
                $formulaperm = dunserialize($data['formulaperm']);
                if (!empty($formulaperm['users'])) {
                    $formulaperm['users'] = str_replace(array("\n", "\r"), " ", $formulaperm['users']);
                    $usernames = explode(" ", trim($formulaperm['users']));
                    $usernames = array_filter($usernames);
                }
            }

            if (empty($data['viewperm']) && empty($usernames)) {
                // 没有设置用户和用户组权限设置
                DB::insert('forum_user_map', $insertData);
                continue;
            }

            $viewgroups = array(); //特定用户组
            // 判断是否设定用户组
            if (!empty($data['viewperm'])) {
                $viewgroups = explode("\t", trim($data['viewperm']));
                $viewgroups = array_filter($viewgroups);

                // 没有设定特定用户
                if (empty($usernames)) {
                    foreach ($viewgroups as $viewgroup) {
                        if (!empty($viewgroup)) {
                            $insertData['source_id'] = $viewgroup;
                            $insertData['source_type'] = 2;
                            DB::insert('forum_user_map', $insertData);
                        }
                    }
                }
            }

            $usergroups = array(); // 用户所在组

            // 设置特定用户
            if (!empty($usernames)) {
                $members = C::t('common_member')->fetch_all_by_username($usernames);

                foreach ($members as $member) {
                    if (!empty($member['groupid']) && !in_array($member['groupid'], $usergroups)) {
                        $usergroups[] = $member['groupid'];

                        if (empty($viewgroups)) {
                            $insertData['source_id'] = $member['uid'];
                            $insertData['source_type'] = 1;
                            DB::insert('forum_user_map', $insertData);
                        } else {
                            // 同时设置了特定用户和特定用户组
                            if (in_array($member['groupid'], $viewgroups)) {
                                $insertData['source_id'] = $member['uid'];
                                $insertData['source_type'] = 1;
                                DB::insert('forum_user_map', $insertData);
                            }
                        }

                    }
                }
            }

        }
    }

}

/**
 * 清空版权的映射关系
 * @param $fid
 */
function deleteForumUserMap($fid) {
    DB::delete("forum_user_map", "fid = ".$fid);
}

// 设置主题的分数
function getThreadScore() {
    $countSql = "select count(1) as cnt from %t;";
    $countRes = DB::result_first($countSql, array('forum_thread'), 'cnt');

    $totalPage = ceil(intval($countRes) / BAIDU_SCRIPT_PAGE_SIZE);
    $page = 1;

    while ($page <= $totalPage) {
        $start = ($page - 1) * BAIDU_SCRIPT_PAGE_SIZE;

        $threads = DB::fetch_all("select tid, fid, dateline, lastpost, views, replies, digest, closed, heats, favtimes, sharetimes, displayorder from %t ".
            DB::limit($start, BAIDU_SCRIPT_PAGE_SIZE), array('forum_thread'));

        $delTids = array();
        $insertOrUpdateTids = array();
        $scoresMap = array();   // 分数数组
        foreach ($threads as $thread) {
            $isShow = intval($thread['displayorder']) < 0 ? false : true; // 是否可以展现的主题 -1是已删除 -2审核中

            if ($isShow) {
                $insertOrUpdateTids[] = $thread['tid'];

                // 热度分数
                $hotScore = 1 * intval($thread['digest']) + 0.495 * intval($thread['replies']) + 0.1 * intval($thread['favtimes']) + 0.05 * intval($thread['views'])
                    + 0.2 * intval($thread['sharetimes']) + 0.2 * intval($thread['heats']);

                // 时间分数
                $timeScore = ((intval($thread['lastpost']) -  intval($thread['dateline'])) + 1) / ((time() - intval($thread['dateline'])) + 1);

                $hotScore = round($hotScore, 3);
                $timeScore = round($timeScore, 3);
                $score = round(($hotScore + $timeScore), 3);

                $scoresMap[$thread['tid']] = array(
                    'tid' => $thread['tid'],
                    'fid' => $thread['fid'],
                    'score' => $score,
                    'hot_score' => $hotScore,
                    'time_score' => $timeScore,
                    'update_time' => time(),
                );
            } else {
                $delTids[] = $thread['tid'];
            }
        }

        if (!empty($delTids)) {
            // 不显示的主题，需要删除
            DB::delete('forum_thread_score', DB::field('tid', $delTids), 'in');
        }

        if (!empty($insertOrUpdateTids)) {
            $updateTids = getTidsInScoreTable($insertOrUpdateTids);

            foreach ($insertOrUpdateTids as $insertOrUpdateTid) {
                if (!empty($updateTids[$insertOrUpdateTid])) {
                    // 更新分数
                    DB::update('forum_thread_score', $scoresMap[$insertOrUpdateTid], DB::field('tid', $insertOrUpdateTid));

                } else {
                    // 新增分数
                    $data = $scoresMap[$insertOrUpdateTid];
                    $data['create_time'] = time();
                    DB::insert('forum_thread_score', $data);
                }
            }

        }

        $page++;
    }

}

/**
 * 查询分数是否已经存在
 *
 * @param $insertOrUpdateTids
 * @return array
 * @throws DbException
 */
function getTidsInScoreTable($insertOrUpdateTids) {
    $result = DB::fetch_all("select tid from %t where ". DB::field('tid', $insertOrUpdateTids), array('forum_thread_score'), 'tid');

    return $result;
}

