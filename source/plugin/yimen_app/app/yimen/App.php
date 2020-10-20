<?php
/*
 * @Author: ofearn
 * @Date: 2019/12/9 16:45
 * @Last Modified by: ofearn@qq.com
 */

namespace app\yimen;

if (!defined('IN_DISCUZ')) {
    exit('Access Denied');
}

class App extends Base
{
    public function Info()
    {
        // app id
        $result = $this->http->post('app/Info', [
            'form_params' => $this->makeSign([
                'app_id' => $this->id
            ])
        ]);
        return json_decode($result->getBody()->getContents(), true);
    }

    public function Go($type)
    {
        $typeArr = ['info', 'config', 'build'];
        if (!in_array($type, $typeArr)) {
            return false;
        }
        // app id
        $result = $this->http->post('app/Go', [
            'form_params' => $this->makeSign([
                'app_id' => $this->id,
                'to' => $type
            ])
        ]);
        return json_decode($result->getBody()->getContents(), true);
    }

    public function Update($url, $url_pc)
    {
        $result = $this->http->post('app/Update', [
            'from_param' => $this->makeSign([
                'app_id' => $this->id,
                'url' => $url,
                'url_pc' => $url_pc
            ])
        ]);
        return json_decode($result->getBody()->getContents(), true);
    }
}