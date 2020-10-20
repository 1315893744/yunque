<?php
/*
 * @Author: ofearn
 * @Date: 2019/12/19 10:55
 * @Last Modified by: ofearn@qq.com
 */

namespace app\lib;


class YimenException extends \Exception
{
    public function getErr(\Exception $e)
    {
        header('Content-Type:application/json');
        echo json_encode([
            'code' => 0,
            'msg' => $e->message
        ]);
        exit();
    }
}