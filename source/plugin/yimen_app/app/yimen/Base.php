<?php
/*
 * @Author: ofearn
 * @Date: 2019/12/9 16:22
 * @Last Modified by: ofearn@qq.com
 */

namespace app\yimen;

if (!defined('IN_DISCUZ')) {
    exit('Access Denied');
}

use app\lib\Random;
use app\lib\Verify;
use GuzzleHttp\Client;

class Base
{
    protected $baseUrl = 'http://gate.open.yimenyun.com/portal/';
    protected $version = 'v1';
    protected $secret;
    protected $id;
    protected $http;

    public function __construct($id = '', $secret = '')
    {
        $this->id = $id;
        $this->secret = $secret;
        $this->http = new Client([
            'base_uri' => $this->baseUrl . $this->version . '/',
        ]);
    }

    protected function makeSign($data)
    {
        $arr = [
            'nonce' => Random::alnum(32),
            'timestamp' => strval(time())
        ];
        $array = array_merge($data, $arr);
        $array['sign'] = Verify::getSign($this->secret, $array);
        return $array;
    }
}