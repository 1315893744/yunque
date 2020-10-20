<?php
/*
 * @Author: ofearn
 * @Date: 2019/11/22 12:13
 * @Last Modified by: ofearn@qq.com
 */

namespace app\lib;


class Log
{
    public static function write($log)
    {
        runlog('sql', $log);
    }

    public static function get()
    {
        return File::getFileLine();
    }
}