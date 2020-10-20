<!--<html>
<script>
    if (confirm("为了满足网信办对实名制发帖的要求，百度小程序插件在用户登录/注册时记录了百度账号和论坛账号的对应关系。建议您确定同意在卸载插件时保留账号关系数据表，便于日后对用户发表的违规内容进行定位，且在重新安装插件时，用户账号关系不至于丢失？")) {
        window.location.href = SITEURL + "/plugin.php?id=baidusm_smartprogram&mod=uninstall&action=agree&tourl="+window.location.href;
    } else {
        window.location.href = SITEURL + "/plugin.php?id=baidusm_smartprogram&mod=uninstall&action=disagree&tourl="+window.location.href;
    }
</script>
</html>
-->
<?php
/**
 * uninstall.php
 *
 * @description :   卸载
 *
 * @author : zhaoxichao
 * @since : 23/08/2019
 */

if(!defined('IN_DISCUZ') || !defined('IN_ADMINCP')) {
    exit('Access Denied');
}

// 数据库表前缀
global $_G;
$tablePrefix = empty($_G['config']['db'][1]['tablepre']) ? 'pre_' : $_G['config']['db'][1]['tablepre'];

$sql = <<<EOF

DROP TABLE {$tablePrefix}swan_app_config;

DROP TABLE {$tablePrefix}login_token;

DROP TABLE {$tablePrefix}forum_user_map;

DROP TABLE {$tablePrefix}forum_thread_score;

EOF;

//runquery($sql);

$finish = TRUE;