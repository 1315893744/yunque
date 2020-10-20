<?php
// include_once 'common.php';
// (new App())->run();

use app\Init;


if (!defined('IN_DISCUZ')) {
    exit('Access Denied');
}
include_once DISCUZ_ROOT . 'config/config_ucenter.php';
include_once DISCUZ_ROOT . 'uc_client/client.php';
include_once DISCUZ_ROOT . 'source/function/function_member.php';
define('APP_NAME', 'yimen_app');
define('APP_PATH', dirname(__FILE__));
include_once APP_PATH . '/app/common.php';
include_once APP_PATH . '/vendor/autoload.php';
set_exception_handler([\app\lib\YimenException::class, 'getErr']);
if (version_compare(PHP_VERSION, '5.6.0', '<')) {
    throw new Exception("php vserion must >= 5.6.0");
}
(new Init())->run();
exit();
