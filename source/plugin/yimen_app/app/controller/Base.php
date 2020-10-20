<?php

namespace app\controller;

use app\lib\Log;
use Illuminate\Database\Capsule\Manager as Capsule;

if (!defined('IN_DISCUZ')) {
    exit('Access Denied');
}

class Base
{
    protected $set;
    protected $jumpType;
    protected $jumpUrl;
    protected $siteUrl;

    public function __construct()
    {
        $this->initSystemConfig();
        $this->recordSqlLog();
        $this->allowCross();
    }

    protected function jump($isJson, $json)
    {
        if ($isJson) {
            return json($json);
        }
        if (empty($json['url'])) {
            $url = $this->jumpUrl;
            if ($this->jumpType == 0) {
                showmessage(__($json['msg']), $url);
            } else {
                header('Location:' . $url);
            }
        } else {
            header('Location:' . $json['url']);
        }
    }

    protected function initSystemConfig()
    {
        $this->set = new \app\service\Setting();
        $this->jumpType = $this->set->get('global.jump_type');
        $this->jumpUrl = $this->set->get('global.jump_url');
        $this->siteUrl = $this->set->get('global.site_url');
    }

    protected function allowCross()
    {
        if ($this->set->get('global.is_allow_cross') == '1') {
            allow_cross();
        }
    }

    protected function recordSqlLog()
    {
        if ($this->set->get('global.is_save_sql') == '1') {
            Capsule::connection('default')->listen(function ($query) {
                $sql = "\t" . vsprintf(str_replace("?", "'%s'", $query->sql), $query->bindings) . "\t" . $query->time . ' ms';
                Log::write($sql);
            });
        }
    }

    protected function error($msg, $errCode = 0)
    {
        $data = [
            'code' => 0,
            'msg' => $msg
        ];
        if ($errCode != 0) {
            $data['errCode'] = $errCode;
        }
        return json($data);
    }

    protected function success($msg, $data = [])
    {
        return json([
            'code' => 1,
            'msg' => $msg,
            'data' => $data
        ]);
    }
}