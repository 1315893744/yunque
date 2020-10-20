<?php
/*
 * @Author: ofearn
 * @Date: 2020/3/24 9:41
 * @Last Modified by: ofearn@qq.com
 */
if (!defined('IN_DISCUZ') || !defined('IN_ADMINCP')) {
    exit('Access Denied');
}
if (version_compare(PHP_VERSION, '5.6.0', '<')) {
    cpmsg('php vserion must >= 5.6.0', '', 'error');
}