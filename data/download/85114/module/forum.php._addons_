<?php

if(!defined('IN_DISCUZ')) {
    exit('Access Denied');
}

//统一处理模块参数
$filter =   array(
    'fid'           => 'i',
    'tid'           => 'i',
    'pid'           => 'i',
    'type'          => 's',
    'uid'           => 'i',
    'filter'        => 's',
    'isanonymous'   => 's',
    'forum_pwd'     => 's',
    'thread_pwd'    => 's',
);
$param  = request_params::filterInput($filter, $_GET);
$params = array_merge($params, $param);

try {
    switch ($params['action']) {
        case 'feed':            //首页帖子流
            checkToken($params, $_G, false);
            $arrResonse['data'] = getFeed($params, $_G);
            break;
        case 'new_feed':
            checkToken($params, $_G, false);
            $arrResonse['data'] = getNewFeed($params, $_G);
            break;
        case 'list':            //discuz板块接口
            $arrResonse['data'] = getForum($params, $_G);
            break;
        case 'display':         //帖子列表
            checkToken($params, $_G, false);
            $arrResonse['data'] = getDisplay($params, $_G);
            break;
        case 'detail':          //discuz板块详情接口
            checkToken($params, $_G, false);
            $arrResonse['data'] = getForumDetail($params, $_G);
            break;
        case 'detaillist':      //获取子版块列表
            $arrResonse['data'] = getSubForumList($fid);
            break;
        case 'viewthread':      //帖子信息
            checkToken($params, $_G, false);
            $arrResonse['data'] = getiVewthread($params, $_G);
            break;
        case 'viewpost':        //查看回复列表(查看全部|查看作者)
            $arrResonse['data'] = getiVewPost($params, $_G);
            break;
        case 'post':            //发表回复(发表帖子回复|发表评论回复)
            $arrResonse['data'] = replayPost($params, $_G);
            break;
        case 'delpost':         //删除帖子(tpid:删除帖子|ppid:删除评论)
            $arrResonse['data'] = delPost($params, $_G);
            break;
        default:
            throw new discuz_exception(error_plugin::ERROR_ACTION_INVALID, $params['action']);
    }
} catch (discuz_exception $e) {
    //统一报错处理
    $arrResonse = array(
        "errNo"     =>  $e->getCode(),
        "errMsg"    =>  $e->getMessage(),
        "data"      =>  array(),
    );
}

//统一数据输出
smart_core::outputJson($arrResonse);


/**
 * getFeed
 * @description :   首页帖子流
 *
 * @param $params
 * @param $_G
 * @return array
 * @author zhaoxichao
 * @date 05/06/2019
 */
function getFeed($params, $_G) {
    // 添加版本控制 V1.5版本以后使用新首页帖子流接口
    if (!empty($_G['setting']['plugins']) && !empty($_G['setting']['plugins']['version']) && ($_G['setting']['plugins']['version']['baidusm_smartprogram'] >= 'V1.5')) {
        $data = getNewFeed($params, $_G);
        // 数据不为空再返回
        if (!empty($data['threads'])) {
            return $data;
        }
    }

    $arrRet = array(
        'hasMore'   =>  false,
        "threads"   =>  array(),
    );
    $threads = array();

    //获取发帖最多的10个板块
    $sql = 'select thread.fid,forum.name, count(thread.fid) as count  from '.DB::table('forum_thread').' thread left join '.DB::table('forum_forum').' forum on thread.fid = forum.fid  group by thread.fid order by count desc limit 10';
    $res = DB::fetch_all($sql);
    if (empty($res)) {
        return  $arrRet;
    }

    //获取帖子流数据(2条最热;1条最新;1条精华)
    foreach ($res as $fk => $threadInfo) {
        $threadName =  isset($threadInfo['name']) ? $threadInfo['name'] : '默认板块';
        $fid    =   addslashes($threadInfo['fid']);

        if (!perm::getFeedViewPerm($_G, $fid)) {
            continue;           // 过滤无读权限帖子
        }
        $arrSql = array(
            "hot"   =>   'select thread.tid, thread.subject, thread.replies, thread.icon, image.message from '.DB::table('forum_thread').' thread left join '.DB::table('forum_post').' image on thread.tid =  image.tid where thread.fid = '. $fid .' and thread.displayorder >= 0 order by thread.heats desc limit 2',
            'new'   =>   'select thread.tid, thread.subject, thread.replies, thread.icon, image.message from '.DB::table('forum_thread').' thread left join '.DB::table('forum_post').' image on thread.tid =  image.tid where thread.fid = '. $fid .' and thread.displayorder >= 0 order by thread.lastpost desc limit 1',
            'digest' =>  'select thread.tid, thread.subject, thread.replies, thread.icon, image.message from '.DB::table('forum_thread').' thread left join '.DB::table('forum_post').' image on thread.tid =  image.tid where thread.fid = '. $fid .' and thread.displayorder >= 0 order by thread.digest desc limit 1',
        );

        foreach ($arrSql as $s => $sql) {
            $arrTmp = array();
            $arrTids = array();

            $res = DB::fetch_all($sql);
            if (empty($res)) {
                continue;
            }

            foreach ($res as $key => $value) {
                $arrTids[] = $value['tid'];
                $arrTmp[$value['tid']] = array(
                    'fid'       =>  $fid,
                    'tid'       =>  $value['tid'],
                    'title'     =>  $value['subject'],
                    'plate'     =>  $threadName,
                    'replyNum'  =>  $value['replies'],
                    'imgUrl'    =>  array(),
                );
            }

            $arrTmp = getImgByTids($arrTids, $arrTmp);  //批量获取帖子图片

            $rest = getThreadDetailByTids($arrTids);
            if (!empty($rest)) {
                foreach ($rest as $k => $v) {
                    $arrTmp[$v['tid']]['author']  = $v['author'];
                }
            }

            // 去除重复帖子
            foreach ($arrTmp as $ks => $vs) {
                if (isset($threads[$ks])) {
                   continue;
                }

                $threads[$ks] = $vs;
            }
        }
    }
    
    foreach ($threads as $vt) {
        $arrRet['threads'][] =  $vt;
    }

    // 插入广告数据
    $arrRet['threads'] = insertAdvert($arrRet['threads'], 'feed', 1);

    //分页
    list($arrRet['threads'], $arrRet['hasMore']) = paging($arrRet['threads'], $params['page']);

    return  $arrRet;
}

// 首页信息流新接口 V1.5版本及以后使用
function getNewFeed($params, $_G) {
    // 先查询有权限的板块
    $arrRet = array(
        'hasMore'   =>  false,
        "threads"   =>  array(),
    );

    // 游客身份时
    $sql = "select fid from %t where (source_id = 0 and source_type = 0) ";

    // 登录时候需要加上用户
    if (!empty($_G['uid'])) {
        $sql .= " or (source_id = {$_G['uid']} and source_type = 1) ";
    }

    if (!empty($_G['groupid'])) {
        $sql .= "or (source_id = {$_G['groupid']} and source_type = 2)";
    }

    $fids = DB::fetch_all($sql, array('forum_user_map'), 'fid');
    $fidsArr = array_keys($fids);

    if (!empty($fidsArr)) {
        // 根据有权限的板块查找主题 thread
        $arrRet = C::t("#baidusm_smartprogram#forum_thread_score")->fetch_all_thread_by_page($fidsArr, $params['page']);
    }

    return $arrRet;
}

/**
 * getForum
 * @description :   discuz板块接口
 *
 * @param $params
 * @param $_G
 * @return array
 * @author zhaoxichao
 * @date 21/06/2019
 */
function getForum($params, $_G) {
    $data = array(
        'hasMore'   =>  false,
        'forumList' =>  array(),
    );

    $forums = $GLOBALS['forums'] ? $GLOBALS['forums'] : C::t('forum_forum')->fetch_all_by_status(1);

    $forumlist = array();
    //只需遍历二级板块
    foreach ($forums as $forum) {
        $fid = $forum["fid"];
        $arrField = C::t('forum_forumfield')->fetch($fid);

        //获取论坛icon
        if (!empty($arrField["icon"])) {
            $forum['icon'] = get_forumimg_parse($arrField["icon"], $_G);
        }

        if ($forum['fup'] && !empty($forumlist[$forum['fup']])) {
            //是二级板块
            $forumlist[$forum['fup']]['sublist'][] = smart_core::getvalues($forum, array('fid', 'icon', 'name', 'threads', 'posts', 'redirect', 'todayposts', 'description'));
        } else if ($forum['fup'] == 0) {
            //是一级板块
            $forumlist[$forum['fid']] = smart_core::getvalues($forum, array('fid', 'name', 'threads', 'posts', 'redirect', 'todayposts', 'description'));
        }
    }

    $data = array(
        'forumList' => array_values(smart_core::getvalues($forumlist, array('/^\d+$/'), array('fid', 'name', 'threads', 'posts', 'redirect', 'todayposts', 'description', 'sublist', 'icon'))),
    );

    foreach ($data['forumList'] as $key => $value) {
        if (isset($value['sublist'])) {
            $data['forumList'][$key]['subList'] = $value['sublist'];
            unset($data['forumList'][$key]['sublist']);
        } else {
            unset($data['forumList'][$key]);
        }

    }

    //添加板块读取权限和登录权限
    foreach ($data['forumList'] as $k => $value) {
        $data['forumList'][$k]['perm'] = forumAccess($value['fid']);                    //板块权限
        $data['forumList'][$k]['name'] = $value['name'];
        foreach ($data['forumList'][$k]['subList'] as $kk => $kv) {
            $data['forumList'][$k]['subList'][$kk]['perm']      = forumAccess($kv['fid']);   //板块权限
            $data['forumList'][$k]['subList'][$kk]['isLogin']   = false;
            $data['forumList'][$k]['subList'][$kk]['name']      = $kv['name'];
        }
    }



    //添加分页
    list($data['forumList'], $data['hasMore']) = paging($data['forumList'], $params['page'], 4);

    return $data;
}


/**
 * getDisplay
 * @description :   帖子列表
 *
 * @param $params
 * @param $_G
 * @return array
 * @throws discuz_exception
 * @author zhaoxichao
 * @date 13/06/2019
 */
function getDisplay($params, $_G) {
    $arrRet = array(
        'hasMore'   =>  false,
        'sortList'  =>  array(
            array(
                "name"      => (CHARSET == 'gbk') ? mb_convert_encoding('最新', 'GBK', 'UTF-8') : '最新',
                "filter"    =>  "lastpost",
            ),
            array(
                "name"      => (CHARSET == 'gbk') ? mb_convert_encoding('热门', 'GBK', 'UTF-8') : '热门',
                "filter"    =>  "heats",
            ),
            array(
                "name"      => (CHARSET == 'gbk') ? mb_convert_encoding('精华', 'GBK', 'UTF-8') : '精华',
                "filter"    =>  "digest",
            ),
        ),
        'forumThreadList'   =>  array(),
    );
    $arrTmp = array();

    $fid    =   addslashes($params['fid']);
    if (empty($fid)) {
        throw new discuz_exception(error_plugin::ERROR_PARAMS_INVALID, 'fid');
    }

    $_G['forum_pwd']   = $params['forum_pwd'];
    perm::getViewPerm($_G, $fid);           // 判断板块查看权限
    $order = (in_array($params['filter'], array('heats', 'lastpost', 'digest'))) ?  trim($params['filter']) : 'lastpost';

    // 通过limit n, m 来判断是否有下一页,规避获取数据条数过多导致的缺陷
    // 因为每页最多展示20条数据,这里多取一条数据,用来判断是否有下一页数据
    $offset = ($params['page'] - 1) * PAGENUM;    // page默认最小值为1
    $end    = PAGENUM + 1;
    $sqls = array(
        'lastpost' =>  'select tid,subject,author,authorid,replies,typeid,price,dateline,lastpost,lastposter,views from '.DB::table('forum_thread').' where fid = ' .$fid. ' and displayorder >= 0 order by lastpost desc limit '.$offset.', '. $end,
        'heats'    =>  'select tid,subject,author,authorid,replies,typeid,price,dateline,lastpost,lastposter,views from '.DB::table('forum_thread').' where fid = ' .$fid. ' and displayorder >= 0 order by heats desc limit '.$offset.', '. $end ,
        'digest'   =>  'select tid,subject,author,authorid,replies,typeid,price,dateline,lastpost,lastposter,views from '.DB::table('forum_thread').' where fid = ' .$fid. ' and displayorder >= 0 and digest = 1 order by dateline desc limit '.$offset.', '. $end,
    );
    $res = DB::fetch_all($sqls[$order]);
    if (empty($res)) {
        return  $arrRet;
    }

    //板块权限
    foreach ($res as $key => $value) {
        $arrTids[] = $value['tid'];
        $arrTmp[$value['tid']] = array(
            "tid"       =>   $value['tid'],
            "title"     =>   $value['subject'],
            "imgUrl"    =>   array(),
            "author"    =>   $value['author'],
            "replyNum"  =>   $value['replies'],
            "typeid"    =>   $value['typeid'],       //主题分类id
            "price"     =>   $value['price'],
            "authorId"  =>   $value['authorid'],
            "dateLine"  =>   formTimestampNature($value['dateline']),
            "lastPost"  =>   formTimestampNature($value['lastpost']),
            "lastPoster"=>   $value['lastposter'],
            "views"     =>   $value['views'],
        );
    }

    $arrTmp = getImgByTids($arrTids, $arrTmp);  //获取帖子图片

    $forumThreadlist = array_values($arrTmp);

    $forumThreadlist = insertAdvert($forumThreadlist, 'feed', 2);

    // 通过SQL之limit进行分页,此处仅判断是否有下一页
    list($arrRet['forumThreadList'], $arrRet['hasMore']) = paging($forumThreadlist, 1, PAGENUM);

    return  $arrRet;
}

/**
 * getForumDetail
 * @description :   discuz板块详情接口
 *
 * @param $params
 * @param $_G
 * @return array
 * @throws discuz_exception
 * @author zhaoxichao
 * @date 12/06/2019
 */
function getForumDetail($params, $_G) {
    $arrRet = array(
        'hasMore'	=>	false,
        'plateInfo'	=>	array(),        //板块信息
        'subPlateList'	=>	array(),    //子板块信息
    );

    $fid    =   addslashes($params['fid']);
    $page   =   addslashes($params['page']);
    if (empty($fid)) {
        throw new discuz_exception(error_plugin::ERROR_PARAMS_INVALID, 'fid');
    }

    $_G['forum_pwd']   = $params['forum_pwd'];
    perm::getViewPerm($_G, $fid);   // 判断板块查看权限

    //获取板块详情
    $arrRet['plateInfo'] = getForumDetailByFid($fid, $_G);

    //获取子板块详情
    $subForumList = getSubForumList($fid, $_G);
    if (empty($subForumList)) {
        return  $arrRet;
    }

    list($arrRet['subPlateList'], $arrRet['hasMore']) = paging($subForumList['subPlateList'], $page);

    return  $arrRet;
}

/**
 * getSubForumList
 * @description :   获取子版块列表
 *
 * @param $fid
 * @return array
 * @throws discuz_exception
 * @author zhaoxichao
 * @date 03/06/2019
 */
function getSubForumList($fid, $_G) {
    if (empty($fid)) {
        throw new discuz_exception(error_plugin::ERROR_PARAMS_INVALID, 'fid');
    }

    $arrRet = array(
        "subPlateList"  =>  array(),
    );

    $sql = 'select forum.name,forum.threads,forum.posts,forum.todayposts,forum.fid,field.icon from '.DB::table('forum_forum').' forum left join '.DB::table('forum_forumfield').' field on forum.fid = field.fid where forum.fup = '. $fid. " and forum.status = 1";
    $res = DB::fetch_all($sql);
    if (empty($res)) {
        return   $arrRet;
    }

    foreach ($res as $key => $value) {
        $perm = forumAccess($value['fid']);                  //板块权限
        $arrRet['subPlateList'][] = array(
            "fid"	    =>	$value['fid'],
            "name"	    =>	$value['name'],
            "icon"	    =>	empty($value['icon']) ? '' : get_forumimg_parse($value['icon'], $_G), // 板块头像
            "threads"	=>	$value['threads'],
            "posts"		=>	$value['posts'],
            "todayposts"=>	$value['todayposts'],
            "isLogin"   =>  false,      //需用户登录
            'perm'      =>  $perm,
        );
    }

    return $arrRet;
}

/**
 * getiVewthread
 * @description :   帖子信息
 *
 * @param $params
 * @param $_G
 * @return array
 * @throws discuz_exception
 * @author zhaoxichao
 * @date 06/06/2019
 */
function getiVewthread($params, $_G) {
    $arrRet = array(
        "allow_view"    =>  0,
        "threadInfo"    =>  array(),
        "forumThreadlist"   =>  array(),
    );

    $tid = addslashes($params['tid']);

    //获取帖子详情
    $sqlThread = "select forum.name, forum.fid, thread.tid, thread.subject, thread.dateline, thread.author, thread.authorid, thread.replies, thread.lastpost, thread.lastposter from ".DB::table('forum_thread')." thread left join ".DB::table('forum_forum')." forum on thread.fid = forum.fid where thread.tid = " . $tid;
    $thread = DB::fetch_all($sqlThread);
    if (empty($thread)) {
        return  $arrRet;
    }
    $thread = $thread[0];

    //获取帖子内容
    $post = C::t("forum_post")->fetch_threadpost_by_tid_invisible($tid, 0);
    if (empty($post)) {
        return  $arrRet;
    }

    // 新版本之后帖子详情页需要加版本控制;来判断是否帖子是否需要输入密码
    if (checkPluginVersion($_G, 'V1.5')) {
        $_G['fid'] = $thread['fid'];
        $_G['tid'] = $thread['tid'];


        $_G['forum_pwd']   = $params['forum_pwd'];
        perm::getViewPerm($_G, $_G['fid']);           // 判断板块查看权限
        if (!empty($params['thread_pwd'])) {
            // 已经输入密码了
            $_G['cookie']['postpw_'.$post['pid']] = md5($params['thread_pwd']);
        }
        list($needPassword, $message) = checkThreadNeedPassword($_G, $thread['authorid'], $post['message'], $post['pid']);
        $post['message'] = $message;

        if ($needPassword) {
            if (!empty($params['thread_pwd'])) {
                throw new discuz_exception(error_plugin::ERROR_FORUM_VIEW_PERM_PWD_INVALID, $params['action']);
            } else {
                //需要输入密码
                throw new discuz_exception(error_plugin::ERROR_THREAD_VIEW_PERM_PWD, $params['action']);
            }

        }
    }

    // 新增message图片
    if (!empty($post['attachment'])) {
        addAttachment($post);
    }

    $favor = isCollected('tid', $tid, $_G['uid']);          //是否收藏

    $userInfo = UserInfo($params, $thread['authorid']);

    $arrTids = array();
    $threadInfo = array(
        "source"    =>    $thread['name'],
        "pid"       =>    $post['pid'],
        "fid"       =>    $thread['fid'],
        "tid"       =>    $thread['tid'],
        "author"    =>    isset($thread['author']) ? $thread['author'] : '匿名',
        "authorId"  =>    $thread['authorid'],
        "title"     =>    $thread['subject'],
        "dateLine"  =>    formTimestampNature($thread['dateline']),
        "message"   =>    strip_tags($post['message']),
        "imageUrl"  =>    array(),
        "avatar"    =>    $userInfo['avatar'],
        "replyNums" =>    $thread['replies'],   // 回复次数
        "isFavorite"=>    $favor,               // 是否收藏
        "permReply"=>    perm::getReplyPerm($_G,$thread['fid']),
        "attachmentList" => empty($post['attachmentList']) ? array() : $post['attachmentList'],
    );

    $arrTids[] = $thread['tid'];
    $icons = getIconsByTids($arrTids);
    $imageUrl = array();
    if (!empty($icons)) {
        foreach ($icons as $km => $vm) {
            $img = '';
            if (false !== strpos($vm['attachment'], 'http')
                || false !== strpos($vm['attachment'], 'https')) {
                $img = parseImg($vm['attachment']);
            } else if ($vm['attachment'] != "[]") {
                if (false !== strpos(ATTACHMENTFORM, 'http') || false !== strpos(ATTACHMENTFORM, 'https')) {
                    $img = ATTACHMENTFORM . $vm['attachment'];
                } else {
                    if (intval($vm['remote'])) {
                        $img = $_G['setting']['ftp']['attachurl'].'forum/'. $vm['attachment'];
                    } else {
                        $img =  DOMAIN . ATTACHMENTFORM . $vm['attachment'];
                    }
                }
            }

            if (!empty($img)) {
                $imageUrl[] = $img;
            }

        }
    }

    $threadInfo['imageUrl'] = $imageUrl;

    //插入广告
    $threadInfo = insertAdvert($threadInfo, 'thdend', 3);

    $arrRet['threadInfo'] = $threadInfo;

    //获取评论信息
    $postList = getiVewPost($params, $_G, intval($threadInfo['authorId']));

    $arrRet = array_merge($arrRet, $postList);

    return $arrRet;
}

/**
 * getiVewPost
 * @description :   回复列表
 *
 * @param $params
 * @param $_G
 * @param $authorId 帖子作者
 * @return array
 * @author zhaoxichao
 * @date 06/06/2019
 */
function getiVewPost($params, $_G, $authorId) {
    $arrRet = array(
        'hasMore'           =>   false,
        'forumThreadlist'   =>  array(
            "allCommentList"          =>  array(),
            "onlyLandlordCommentList" =>  array(),
        ),
    );

    $tid    =   addslashes($params['tid']);
    if (empty($tid)) {
        return  $arrRet;
    }

    $page = max(1, intval($params['page']));

    if (empty($authorId)) {
        $postUser = getPostUserByTid($tid);     //根据tid获取帖子版主信息
        $authorId = intval($postUser['authorid']);
    }


    //获取当前用户信息
    $space = UserInfo($params, $_G['uid']);

    $allCommentList = $onlyLandlordCommentList =  array();
    // 查看全部回复
    if ('all' == $params['type'] || $params['type'] != 'author') {
        $postInfo = getPostByTid($tid, $page);     //根据tid获取帖子回复信息
        if (empty($postInfo)) {
            return  $arrRet;
        }

        foreach ($postInfo as $key => $value) {
            // 新增附件处理
            if (!empty($value['attachment'])) {
                addAttachment($value);
            }
            $allCommentList[] = formatPostInfo($value, $space);                 //全部回复
        }
        //插入广告数据
        $allCommentList = insertAdvert($allCommentList, 'thdreply', 4);
        //格式化分页结果
        list($allCommentList, $pageAll) = paging($allCommentList, 1);

        $arrRet['forumThreadlist']['allCommentList'] = $allCommentList;
        $arrRet['hasMore'] = $pageAll;
    }


    // 查看楼主回复的
    if ('author' == $params['type'] || $params['type'] != 'all') {
        $onlyLandlordPosts = getPostByTid($tid, $page, $authorId);
        foreach ($onlyLandlordPosts as $value) {
            if (!empty($value['anonymous'])) {
                // 匿名的不展示
                continue;
            }

            // 新增附件处理
            if (!empty($value['attachment'])) {
                addAttachment($value);
            }
            $onlyLandlordCommentList[] = formatPostInfo($value, $space);
        }

        // 插入广告数据
        $onlyLandlordCommentList = insertAdvert($onlyLandlordCommentList, 'thdreply', 4);
        list($onlyLandlordCommentList, $pageAuthor) = paging($onlyLandlordCommentList, 1);

        $arrRet['forumThreadlist']['onlyLandlordCommentList'] = $onlyLandlordCommentList;
        $arrRet['hasMore'] = ('author' ==  $params['type']) ? $pageAuthor : $arrRet['hasMore'];
    }


    return $arrRet;
}

/**
 * getPostByTid
 * @description :   获取回复信息
 *
 * @param $tid
 * @return array
 * @throws discuz_exception
 * @author zhaoxichao
 * @date 03/06/2019
 */
function getPostByTid($tid, $page, $authorId = null) {
    $arrRet = array();

    if (empty($tid)) {
        throw new discuz_excption(error_plugin::ERROR_PARAMS_INVALID);
    }

    $start = ($page - 1) * PAGENUM;

    $arrRet = C::t("forum_post")->fetch_all_by_tid("tid:".$tid, $tid, true, 'asc', $start, PAGENUM+1, 0, 0, $authorId);
    if (empty($arrRet)) {
        return  $arrRet;
    }

    return  array_values($arrRet);
}

/**
 * getPostUserByTid
 * @description :   获取帖子发布者名称
 *
 * @param $tid
 * @return array
 * @author zhaoxichao
 * @date 20/06/2019
 */
function getPostUserByTid($tid) {
    $arrRet = array();

    if (empty($tid)) {
        throw new discuz_excption(error_plugin::ERROR_PARAMS_INVALID);
    }

    $arrRet = C::t("forum_post")->fetch_threadpost_by_tid_invisible($tid, 0);
    if (empty($arrRet)) {
        return  $arrRet;
    }

    return  $arrRet;
}

/**
 * 获取拼接的message字段
 *
 * @param $oldPost 回复评论的记录
 * @param $message 新的评论message
 * @return mixed
 */
function getReplyMessage($oldPost, $message) {

    if ($oldPost['first'] != 1) {

        $post_reply_quote = lang('forum/misc', 'post_reply_quote', array('author' => empty($oldPost['anonymous']) ? $oldPost['author'] : '匿名者', 'time' => dgmdate($oldPost['dateline'])));
        require_once libfile("function/post");
        $oldMessage = messagecutstr($oldPost['message'], 100);
        $oldMessage = implode("\n", array_slice(explode("\n", $oldMessage), 0, 3));

        if(!defined('IN_MOBILE')) {
            $oldMessage = "[quote][size=2][url=forum.php?mod=redirect&goto=findpost&pid={$oldPost['pid']}&ptid={$oldPost['tid']}][color=#999999]{$post_reply_quote}[/color][/url][/size]\n{$oldMessage}[/quote]";
        } else {
            $oldMessage = "[quote][color=#999999]{$post_reply_quote}[/color]\n[color=#999999]{$oldMessage}[/color][/quote]";
        }

        $message = $oldMessage ."\n\n". $message;
        return $message;

    } else {
        return $message;
    }

}


/**
 * replayPost
 * @description :   发表帖子type=thread|发表回复type=post
 *
 * @param $params
 * @param $_G
 * @return array
 * @throws discuz_exception
 * @author zhaoxichao
 * @date 10/06/2019
 */
function replayPost($params, $_G) {
    $arrRet = array();

    //获取请求参数
    $filter =   array(
        'message'   =>  's',
        'subject'   =>  's',
        'imgUrl'    =>  's',
    );
    $param  = request_params::filterInput($filter, $_GET);
    $params = array_merge($params, $param);

    $fid        = addslashes($params['fid']);           //必填
    $tid        = addslashes($params['tid']);
    $oldPid     = addslashes($params['pid']);           //被回复的pid
    $message    = addslashes($params['message']);       //评论内容
    $subject    = addslashes($params['subject']);
    $user       = UserInfo($params, $_G['uid']);
    $imgUrl     = $params['imgUrl'];

//    if (CHARSET == 'gbk') {
//        $message = mb_convert_encoding($message, 'GBK', 'UTF-8');
//        $subject = mb_convert_encoding($subject, 'GBK', 'UTF-8');
//    }

    $type  = addslashes($params['type']);
    if (!in_array($type, array('post', 'thread'))) {
        throw new discuz_exception(error_plugin::ERROR_PARAMS_INVALID);
    }

    checkLoginForce($_G); // 强登录校验

    //生成新pid
    $newId = C::t('forum_post_tableid')->insert(array('pid' => null), true);

    $newPost = array(
        'pid'       =>  $newId,
        'tid'       =>  $tid,
        'fid'       =>  $fid,
        'author'    =>  $user['username'],
        'authorid'  =>  $user['uid'],
        'subject'   =>  $subject,
        'message'   =>  $message,
        'dateline'  =>  time(),
    );


    //发表回复
    if ('post' == $type) {
        if(empty($fid) || empty($tid) || empty($oldPid)
           || empty($message)) {
            helper_log::runlog('swan_error', implode("\t", $params));
            throw new discuz_exception(error_plugin::ERROR_PARAMS_INVALID);
        }

        // 先查询被回复的评论内容
        $oldDetail = getDetailByPid($tid, $oldPid);

        if (empty($oldDetail)) {
            helper_log::runlog('swan_error', implode("\t", $params)."post no find");
            throw new discuz_exception(error_plugin::ERROR_PARAMS_INVALID);
        }

        $oldDetail = $oldDetail[$oldPid];

        // 获取组装之后的message内容
        $newPost['subject'] = '';
        $newPost['message'] = getReplyMessage($oldDetail, $message);

        $resP = C::t('forum_post')->insert("tid:".$tid, $newPost);
        if (!$resP) {
            throw new discuz_exception(error_plugin::ERROR_INSERT_DATA_ERROR);
        }

        $posts = getDetailByPid($tid, $newId);
        $newDetail = !empty($posts[$newId]) ? $posts[$newId] : array();

        if (empty($oldDetail)) {
            $replaypost = '';
        } else {
            $replaypost = array(
                'author'    =>  isset($oldDetail['author']) ? $oldDetail['author'] : '匿名',
                'dateLine'  =>  formTimestampNature($oldDetail['dateline']),
                'message'   =>  $oldDetail['message'],
                'position'  =>  $oldDetail['position'],
            );
        }

        //回复次数加1
        repliesPlusOrDescrease($tid, true);

        $arrRet =   array(
            "position"		=>	$newDetail['position'],  //最新回帖的信息
            "message"		=>	$message,
            "pid"			=>	$newDetail['pid'],
            "dateLine"      =>  formTimestampNature($newDetail['dateline']),
            "author"        =>  isset($newDetail['author']) ? $newDetail['author'] : '匿名',
            "userName"      =>  isset($newDetail['userName']) ? $newDetail['userName'] : '匿名',
            "authorId"      =>  $user['uid'],
            "avatar"        =>  $user['avatar'],
            "replayPost"	=>	$replaypost,        //被回复帖子信息
        );

        // 更新板块主题数、发帖数
        C::t('forum_forum')->update_forum_counter($fid, 0, 1, 1);
    }

    //发表帖子
    if ('thread' == $type) {
        if(empty($fid) || empty($message) || empty($subject)) {
            helper_log::runlog('swan_error', implode("\t", $params));
            throw new discuz_exception(error_plugin::ERROR_PARAMS_INVALID);
        }

        #本版有待处理的管理事项
        C::t('forum_forum')->update($fid, array('modworks' => '1'));

        //insert thread
        $newThread = array(
            'fid'       =>  $fid,   //必填参数
            'posttableid' => 0,
            'author'    =>  $user['username'],
            'authorid'  =>  $user['uid'],
            'subject'   =>  $subject,
            'dateline'  =>  time(),
            'lastpost'  =>  time(),
            'lastposter' => $user['username'],
            'attachment' => 0,

        );

        $insertTid = C::t('forum_thread')->insert($newThread, true);
        if (!$insertTid) {
            throw new discuz_exception(error_plugin::ERROR_INSERT_DATA_ERROR);
        }

        #最新主题表
        C::t('forum_newthread')->insert(array(
            'tid' => $insertTid,
            'fid' => $fid,
            'dateline' => time(),
        ));

        #用户家园字段表 - 更新:最近一次行为记录
        if(!$params['isanonymous']) {
            C::t('common_member_field_home')->update($user['uid'], array('recentnote'=>$subject));
        }

        // 插入threadimage
        if ($insertTid && strpos($message, '[/img]') !== false) {
            preg_match("/\s?\[img\](.+?)\[\/img\]\s?/i", $message, $matches);
            if (!empty($matches[1])) {
                $imgUrlArr = explode("forum/", $matches[1]);

                if (!empty($imgUrlArr)) {
                    $newImg = array(
                        'tid'        => $insertTid,
                        'attachment' => $imgUrlArr[1],
                        'remote'     => checkIsRemote($imgUrlArr[1]) ? 1 : 0
                    );
                    $resP = DB::insert('forum_threadimage', $newImg);
                    if (!$resP) {
                        throw new discuz_exception(error_plugin::ERROR_INSERT_DATA_ERROR);
                    }
                }

            }
        }

        $arr = array(
            'tid'   =>  $insertTid,
            'first' => 1,           //代表首帖
            'attachment' => '0',
            'replycredit' => 0,
        );
        $newPost = array_merge($newPost, $arr);
        $resP = C::t('forum_post')->insert("tid:".$insertTid, $newPost);
        if (!$resP) {
            throw new discuz_exception(error_plugin::ERROR_INSERT_DATA_ERROR);
        }

        $arrRet = array(
            'tid'   =>  $insertTid,
        );

        // 更新板块主题数、发帖数
        C::t('forum_forum')->update_forum_counter($fid, 1, 1, 1);
    }

    return $arrRet;
}

/**
 * delPost
 * @description :   删除帖子
 *
 * @param $params
 * @param $_G
 * @return array
 * @throws discuz_exception
 * @author zhaoxichao
 * @date 12/06/2019
 */
function delPost($params, $_G) {
    $arrRet = array();

    //获取请求参数
    $filter =   array(
        'ppid' => 'i',
        'tpid' => 'i',
    );
    $param = request_params::filterInput($filter, $_GET);
    $params = array_merge($params, $param);

    $tpid   =   addslashes($params['tpid']);
    $ppid   =   addslashes($params['ppid']);
    $tid    =   addslashes($params['tid']);

    $pid = !empty($tpid) ? $tpid : $ppid;
    if (empty($pid)) {
        throw new discuz_exception(error_plugin::ERROR_PARAMS_INVALID);
    }
    $tid = intval($tid);

    //删除评论
    if ($ppid) {
        $post = C::t("forum_post")->fetch("tid:".$tid, $pid);
        if (empty($post)) {
            throw new discuz_exception(error_plugin::ERROR_DELETE_DATA_EMPTY);
        }

        if ($post['authorid'] != $_G['uid']) {
            throw new discuz_exception(error_plugin::ERROR_DELETE_DATA_EMPTY);
        }

        $result = C::t('forum_post')->update("tid:".$post['tid'], $pid, array('invisible' => '-5'), true);
        if (empty($result)) {
            throw new discuz_exception(error_plugin::ERROR_DELETE_DATA_ERROR);
        }

        // 帖子回复数 -1
        repliesPlusOrDescrease($post['tid'], false);
        $arrRet['pid'] = $pid;  //删除成功失败标识

        C::t('forum_forum')->update_forum_counter($post['fid'], 0, -1);
    }

    //删除帖子
    if ($tpid) {
        $thread = C::t("forum_thread")->fetch_by_tid_displayorder($pid, 0, '>=', $_G['uid']);
        if (empty($thread)) {
            throw new discuz_exception(error_plugin::ERROR_DELETE_DATA_EMPTY);
        }

        // delete thread 删除帖子在这
        $result = C::t("forum_thread")->update($pid, array('displayorder' => -1));
        if (empty($result)) {
            throw new discuz_exception(error_plugin::ERROR_DELETE_DATA_ERROR);
        }

        insertThreadMod($pid, $_G);

        $arrRet['tid'] = $pid;  //删除成功失败标识

        // 删除
        C::t('forum_forum')->update_forum_counter($thread['fid'], -1, -1);
    }

    return $arrRet;
}

/**
 * 添加删除主题记录到回收站
 *
 * @param $tid
 * @param $_G
 */
function insertThreadMod($tid, $_G) {
    $data = array(
        'tid' => $tid,
        'uid' => $_G['uid'],
        'username' => $_G['username'],
        'dateline' => time(),
        'action' => 'DEL',
        'expiration' => 0,
        'status' => 1,
        'reason' => ''
    );
    C::t('forum_threadmod')->insert($data);
}

/**
 * getForumDetailByFid
 * @description :   获取板块详情
 *
 * @param $fid
 * @param $_G
 * @return array
 * @throws discuz_exception
 * @author zhaoxichao
 * @date 12/06/2019
 */
function getForumDetailByFid($fid, $_G) {
    $arrRet = array();

    if (empty($fid)) {
        throw new discuz_exception(error_plugin::ERROR_PARAMS_INVALID, 'fid');
    }

    $sql = 'select forum.name,forum.favtimes,forum.posts,forum.threads,forum.rank,forum.fid,field.icon from '.DB::table('forum_forum').' forum left join '.DB::table('forum_forumfield').' field on forum.fid = field.fid where forum.fid = '. $fid;
    $res = DB::fetch_all($sql);
    if (empty($res)) {
        throw new discuz_exception(error_plugin::ERROR_SELECT_DATA_EMPTY);
    }

    $ret = $res[0];
    $collected = isCollected('fid', $fid, $_G['uid']);      //是否收藏
    $arrRet = array(
        "name"	        =>	$ret['name'],
        "author"	    =>	'admin',                // 站长
        "favoriteNum"	=>	$ret['favtimes'],       // 收藏数量
        "postsNum"	    =>	$ret['threads'],          // 帖子总数
        "rank"	        =>	$ret['rank'],           // 排名
        "fid"	        =>	$ret['fid'],            // 板块id
        "isCollected"	=>	$collected,             // 是否收藏
        "icon"	        =>	empty($ret['icon']) ? '' : get_forumimg_parse($ret['icon'], $_G), // 板块头像
        "permPost"	    =>  perm::getPostPerm($_G, $fid),
    );

    return $arrRet;
}

/**
 * getThreadDetailByTids
 * @description :   根据tid获取帖子详情
 *
 * @param $arrTids
 * @return array
 * @throws discuz_exception
 * @author zhaoxichao
 * @date 01/06/2019
 */
function getThreadDetailByTids($arrTids) {
    if (empty($arrTids)) {
        throw new discuz_exception(error_plugin::ERROR_PARAMS_INVALID, 'fid');
    }

    $strTid = count($arrTids) > 1 ? implode(',', $arrTids) : $arrTids[0];
    $sqlThreadDetail = 'select * from '.DB::table('forum_post').' where tid in ('. $strTid .') and first = 1';

    $res = DB::fetch_all($sqlThreadDetail);

    return $res;
}

/**
 * formatPostInfo
 * @description :   格式化帖子回复数据
 *
 * @param $value
 * @param $space
 * @return array
 * @author zhaoxichao
 * @date 06/06/2019
 */
function formatPostInfo($value, $space) {
    $arrRet = array(
        "pid"       =>  $value['pid'],
        "tid"       =>  $value['tid'],
        "author"    =>  intval($value['anonymous']) == 1 ? '匿名' : $value['author'],
        "authorId"  =>  $value['authorid'],
        "dateLine"  =>  formTimestampNature($value['dateline']),
        "message"   =>  dealPostMessage(strip_tags($value['message'])),
        "anonymous" =>  $value['anonymous'],    //是否匿名
        "position"  =>  $value['position'],     //位置包含帖子
        "userName"  =>  empty($value['anonymous']) ? $value['author'] : '匿名',
        "avatar"    =>  getRealUserAvatar($value['authorid']),       //当前用户头像
        "groupId"   =>  $space['groupid'],      //用户组id
        "attachmentList" => empty($value['attachmentList']) ? array() : $value['attachmentList'],

    );

    $replyPost = dealReplyPostMessage($value);
    if (!empty($replyPost)) {
        $arrRet['replyPost'] = $replyPost;
    }

    return  $arrRet;
}

// 兼容message中有引用回复的message
function dealPostMessage($message) {
    $messageArr = explode("[/quote]", $message);

    if (count($messageArr) === 2) {
        $message = $messageArr[1];
    }

    return $message;
}

/**
 * 处理回复的老评论内容
 *
 * @param $post
 * @return array
 */
function dealReplyPostMessage($post) {
    $replyPost = array();

    if (strpos($post['message'], "[url=") !== false) {
        $reg = '/(\[([^\]]*)\])/';
        preg_match_all($reg,$post['message'],$matches);
        if (!empty($matches[2]) && !empty($matches[2][2])) {
            $query = parse_url($matches[2][2]);
            parse_str($query['query'], $urlArr);

            $pid = intval($urlArr['pid']);

            if ($pid) {
                $oldPost = C::t("forum_post")->fetch("tid:".$post['tid'], $pid);
                if (empty($oldPost)) {
                    return $replyPost;
                }

                $replyPost = array(
                    "userName" =>  empty($oldPost['anonymous']) ? $oldPost['author'] : '匿名',
                    "dateLine"  =>  formTimestampNature($oldPost['dateline']),
                    "message"   =>  dealPostMessage(strip_tags($oldPost['message'])),
                    "position"  =>  $oldPost['position'],
                );

            }
        }

    }

    return $replyPost;
}

/**
 * 判断帖子是否需要密码
 *
 * @param $_G
 * @param $authorid 作者id
 * @param $message
 * @param $fid
 * @return true-需要输入密码;false-不需要输入密码
 */
function checkThreadNeedPassword($_G, $authorid, $message, $pid) {
    $needPassword = true;
    $cookiePassword = $_G['cookie']['postpw_'.$pid];    // cookie中的password
    if(strpos($message, '[/password]') !== FALSE) {
        //判断是不是作者或版主
        if($authorid != $_G['uid'] && !getIsModerator($_G, $_G['fid'])) {
            preg_match_all("/\s?\[password\](.+?)\[\/password\]\s?/i", $message, $matches);
            $message = preg_replace_callback("/\s?\[password\](.+?)\[\/password\]\s?/i", create_function('$matches', ''), $message);

            $needPassword = chechThreadPassword($matches[1][0], $cookiePassword);
            if (!$needPassword) {
                dsetcookie('postpw_'.$pid, $cookiePassword);
            }
        } else {
            $message = preg_replace("/\s?\[password\](.+?)\[\/password\]\s?/i", "", $message);
            $needPassword = false;
        }
    } else {
        $needPassword = false;
    }

    return array($needPassword, $message);
}

/**
 * @param $password
 * @param $cookiePassword
 * @return string
 */
function chechThreadPassword($password, $cookiePassword) {
    if(empty($cookiePassword) || $cookiePassword != md5($password)) {
        return true; // 密码为空或者密码不正确,则需要验证密码
    }
    return false;
}

/**
 * 判断用户是不是版主
 *
 * @param $_G
 * @param $fid
 */
function getIsModerator($_G, $fid) {
    $ismoderator = 0;
    $adminid = intval($_G['adminid']);

    if($_G['uid']) {
        if($adminid == 3) {
            $ismoderator = C::t('forum_moderator')->fetch_uid_by_fid_uid($fid, $_G['uid']);
        }
    }
    $ismoderator = !empty($ismoderator) || $adminid == 1 || $adminid == 2 ? 1 : 0;

    return $ismoderator;
}
