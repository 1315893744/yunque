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

class User extends Base
{
    public function DiscuzCreate()
    {
        $result = $this->http->post('user/discuzCreate');
        return json_decode($result->getBody()->getContents(), true);
    }

    public function Apps()
    {
        $result = $this->http->post('user/Apps', [
            'form_params' => $this->makeSign(['user_id' => $this->id])
        ]);
        return json_decode($result->getBody()->getContents(), true);
    }

    public function Create($url, $name, $url_pc)
    {
        $result = $this->http->post('app/Create', [
            'form_params' => $this->makeSign([
                'user_id' => $this->id,
                'url' => $url,
                'name' => $name,
                'url_pc' => $url_pc
            ])
        ]);
        return json_decode($result->getBody()->getContents(), true);
    }
}