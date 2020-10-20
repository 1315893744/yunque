<?php
/*
 * @Author: ofearn
 * @Date: 2019/10/19 13:34
 * @Last Modified by: ofearn@qq.com
 */

namespace app\service;
if (!defined('IN_DISCUZ')) {
    exit('Access Denied');
}

use app\Db;

if (!defined('IN_DISCUZ')) {
    exit('Access Denied');
}

class Setting
{
    protected $settings = [];

    public function __construct($name = '')
    {
        if ($name != '') {
            $this->set($name);
        }
    }

    public function get($name = '')
    {
        if ($name == '') {
            return $this->settings;
        }
        $names = explode('.', $name);
        if (empty($this->settings[$names[0]])) {
            $this->set($names[0]);
        }
        if (count($names) == 1) {
            return $this->settings[$name] ?: [];
        } else {
            return $this->settings[$names[0]][$names[1]] ?: '';
        }
    }

    protected function set($name)
    {

        $set = Db::table('yimen_settings')->where('group', $name)->pluck('value', 'name')->toArray();
        if ($set) {
            $this->settings[$name] = $set;
        }
    }

    public function up($group, $data)
    {
        $setting = $this->get($group);
        foreach ($data as $key => $value) {
            if (!array_key_exists($key, $setting)) {
                Db::table('yimen_settings')->insert([
                    'name' => $key,
                    'value' => $value,
                    'group' => $group,
                    'tip' => $key
                ]);
                $this->settings[$group][$key] = $value;
            } else {
                if ($setting[$key] != $value) {
                    Db::table('yimen_settings')->where('group', $group)->where('name', $key)->update(['value' => $value]);
                }
            }
        }
        return true;
    }
}