<?php
/**
 * @name: task.php
 * @desc: 一些任务执行
 * @author: (songshouming@baidu.com)
 * Time: 2019-11-04 20:32
 */

if(!defined('IN_DISCUZ')) {
    exit('Access Denied');
}
//统一处理模块参数
$filter =   array(
    'action'  =>  's',
);
$param = request_params::filterInput($filter, $_GET);
$params = array_merge($params, $param);

try {
    signIsInvaild($params);     //sign校验

    switch ($params['action']) {
        case 'calc_user_forum':
            checkLastProcessEnd($params, "cron_get_forum_user_map_nohup.php");
            shell_exec("nohup ". PHP_BINDIR."/php ".DISCUZ_ROOT . "./source/plugin/baidusm_smartprogram/task/cron_get_forum_user_map_nohup.php > ./data/log/out.txt 2>&1 & ");
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
 * 判断上个任务是否结束
 * @param $params
 * @param $taskName
 * @throws discuz_exception
 */
function checkLastProcessEnd($params, $taskName) {
    // 判断是否还有进程未结束
    $processNum = exec("ps -ef | grep {$taskName} | grep -v grep | wc -l");

    if (intval($processNum) > 0) {
        $msg = " {$taskName} 上个进程未结束";
        helper_log::runlog('swan_task', $msg);
        throw new discuz_exception(error_plugin::ERROR_LAST_TASK_NO_END, $params['action']);
    }
}