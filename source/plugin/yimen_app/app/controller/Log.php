<?php
/*
 * @Author: ofearn
 * @Date: 2019/12/9 11:23
 * @Last Modified by: ofearn@qq.com
 */

namespace app\controller;
if (!defined('IN_DISCUZ')) {
    exit('Access Denied');
}

class Log extends Base
{
    public function sql()
    {
        $list = \app\lib\Log::get();
        return $this->success('6I635Y+WU1FM5pel5b+X5oiQ5Yqf', $list);
    }
}