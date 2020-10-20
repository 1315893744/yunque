<?php
/**
 * @name: table_forum_thread_score.php
 * @desc: 取主题分数数据
 * @author: (songshouming@baidu.com)
 * Time: 2019-11-01 14:46
 */
if(!defined('IN_DISCUZ')) {
    exit('Access Denied');
}

class table_forum_thread_score extends discuz_table
{
    public function __construct()
    {

        $this->_table = 'forum_thread_score';
        $this->_pk = 'tid';
        $this->_pre_cache_key = 'forum_thread_score_';

        parent::__construct();
    }

    /**
     * 获取首页信息流数据
     *
     * @param $fids
     * @param $page
     * @param int $pageSize
     * @return array
     * @throws DbException
     * @throws discuz_exception
     */
    public function fetch_all_thread_by_page($fids, $page, $pageSize = PAGENUM) {
        $arrRet = array(
            'hasMore'   =>  false,
            "threads"   =>  array(),
        );

        $page = max(intval($page), 1);
        $start = ($page - 1) * $pageSize;

        if(empty($fids)) {
            return $arrRet;
        }

        $inSql = implode(",", $fids);
        $count = DB::result_first("select count(1) as cnt from ".DB::table($this->_table)." where fid in ({$inSql})");
        $totalPage = ceil($count / $pageSize);

        if (empty($count)) {
            return $arrRet;
        }

        $sql = "select thread.tid, thread.fid, thread.subject as title, thread.replies as replyNum, thread.author from %t as thread_score inner join %t  as thread on thread.tid = thread_score.tid where "
            . " thread.fid in ({$inSql}) and thread.displayorder >= 0 order by thread_score.score desc, thread.lastpost desc ". DB::limit($start, $pageSize);

        $threads = DB::fetch_all($sql, array($this->_table, 'forum_thread'), 'tid');
        $arrTids = array_keys($threads);

        // 获取板块名称
        $forums = DB::fetch_all("SELECT fid, name FROM %t WHERE ".DB::field('fid', $fids), array("forum_forum"), 'fid');

        foreach ($threads as $key => $value) {
            $threads[$key]['imgUrl'] = array();
            $threads[$key]['plate'] = empty($forums[$value['fid']]) || empty($forums[$value['fid']]['name']) ? "默认板块" : $forums[$value['fid']]['name']; // 板块名称
        }

        $threads = getImgByTids($arrTids, $threads);  //批量获取帖子图片
        $threads = array_values($threads);

        $arrRet = array(
            'hasMore' => $page < $totalPage ? true : false,
            'threads' => $threads,
        );

        // 插入广告数据
        $arrRet['threads'] = insertAdvert($arrRet['threads'], 'new_feed', 1, $page);

        return $arrRet;
    }
}