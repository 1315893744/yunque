<?php
/**
 * @name: uninstall.php
 * @desc: 卸载插件执行的方法
 * @author: (songshouming)
 * Time: 2019-11-07 20:23
 */
if(!defined('IN_DISCUZ') || !defined('IN_ADMINCP')) {
    exit('Access Denied');
}

require_once libfile('function/plugin');

// 数据库表前缀
global $_G;
$tablePrefix = empty($_G['config']['db'][1]['tablepre']) ? 'pre_' : $_G['config']['db'][1]['tablepre'];

$sql = <<<EOF

DROP TABLE IF EXISTS {$tablePrefix}swan_app_config;

DROP TABLE IF EXISTS {$tablePrefix}login_token;

DROP TABLE IF EXISTS {$tablePrefix}bind_bd2dz;

DROP TABLE IF EXISTS {$tablePrefix}forum_user_map;

DROP TABLE IF EXISTS {$tablePrefix}forum_thread_score;

EOF;

$action = trim($_GET['action']);
$toUrl = trim($_GET['tourl']);

// 同意不卸载用户绑定关系表
if ($action == "agree") {
    $sql = <<<EOF

DROP TABLE IF EXISTS {$tablePrefix}swan_app_config;

DROP TABLE IF EXISTS {$tablePrefix}login_token;

DROP TABLE IF EXISTS {$tablePrefix}forum_user_map;

DROP TABLE IF EXISTS {$tablePrefix}forum_thread_score;

EOF;
}

runquery($sql);
$finish = TRUE;

echo "<script type=\"text/javascript\">window.location.href = \"{$toUrl}\";</script>";
?>
