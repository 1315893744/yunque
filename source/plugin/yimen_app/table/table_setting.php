<?php

class table_setting extends discuz_table
{
    public function __construct()
    {
        $this->_table = 'yimen_settings';
        parent::__construct();
    }

    /*
     * 获取所有配置
     *  @return array()
     */
    public function getSetting()
    {
        $setting = DB::fetch_all('select * from %t', array($this->_table));
        $settingArr = array();
        foreach ($setting as $v) {
            $settingArr[$v['group']][$v['name']] = $v['value'];
        }
        return $settingArr;
    }

    /*
     * 获取所有配置
     *  @return array()
     */
    public function getSettings()
    {
        $setting = DB::fetch_all('select * from %t', array($this->_table));
        $settingArr = array();
        foreach ($setting as $v) {
            $settingArr[$v['name']] = $v['value'];
        }
        return $settingArr;
    }

    /*
     *
     * 根据配置组获取配置
     * $group 配置组名称
     *  @return array()
     */
    public function getSettingByGroup($group)
    {
        $setting = DB::fetch_all("select * from %t where `group`=%s", array($this->_table, $group));
        $settingArr = array();
        foreach ($setting as $v) {
            $settingArr[$v['name']] = $v['value'];
        }
        return $settingArr;
    }

    /*
     *
     * 更新配置
     *  $name 配置名
     *  $value 更改的配置名
     *  return bool
     */
    public function upSettingByName($name, $value)
    {
        return DB::update($this->_table, array('value' => $value), "name='" . $name . "'");
    }

    /*
     * 批量更新配置
     *  $arr 配置数组
     *
     *  @return null
     */
    public function upSettingAll($arr)
    {
        $setting = $this->getSettings();
        foreach ($arr as $k => $v) {
            if ($setting[$k] != $v) {
                $this->upSettingByName($k, $v);
            }
        }
    }

    /**
     * 批量更新配置组配置
     *
     * @param array $arr
     * @param string $group
     * @return void
     */
    public function upSettingByGroup($arr, $group)
    {
        $setting = $this->getSettingByGroup($group);
        foreach ($arr as $k => $v) {
            if ($setting[$k] != $v) {
                //更新配置
                DB::update($this->_table, array('value' => $v), "name='" . $k . "' and `group` ='" . $group . "'");
            }
        }
    }
}
