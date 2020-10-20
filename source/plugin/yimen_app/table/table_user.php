<?php


class table_user extends discuz_table
{
    public function __construct()
    {
        $this->_table = 'yimen_users';
        $this->_pk = 'id';
        parent::__construct();
    }

    /*
     * 根据Unionid和平台获取用户信息
     *
     */
    public function getByUnionid($unionid, $type)
    {
        //根据unionid获取用户信息
        $userInfo = DB::fetch_first(
            "select * from %t  WHERE unionid=%s and platform=%s",
            array($this->_table, $unionid, $type)
        );
        if (empty($userInfo)) {
            return false;
        }
        return $userInfo;
    }


    /*
     * 根据openid和平台获取用户信息
     *
     */
    public function getByOpenid($openid, $type)
    {
        //根据Openid获取用户信息
        $userInfo = DB::fetch_first(
            "select * from %t  WHERE openid=%s and platform=%s",
            array($this->_table, $openid, $type)
        );
        if (empty($userInfo)) {
            return false;
        }
        return $userInfo;
    }

    public function upnick()
    {
        $list = DB::fetch_all('select * from %t', array($this->_table));
        $i = 0;
        foreach ($list as $v) {
            if ($v['nick'] == base64_encode(base64_decode($v['nick']))) {
            } else {
                $this->upUserById($v['id'], array('nick' => base64_encode($v['nick'])));
                $i++;
            }
        }
        return $i;
    }

    /*
     * 根据用户Id获取信息
     *
     *
     */
    public function getInfoById($id)
    {
        $userInfo = DB::fetch_first(
            "select * from %t  WHERE platform=%d",
            array($this->_table, $id)
        );
        if (empty($userInfo)) {
            return false;
        }
        return $userInfo;
    }

    /*
     * 根据用户ID 来更新用户数据
     *
     */
    public function upUserById($id, $data)
    {
        return DB::update($this->_table, $data, 'id=' . $id);
    }

    /*
     * 添加一个用户
     *
     */
    public function addUser($data)
    {
        return DB::insert($this->_table, $data, true);
    }

    /*
     * 获取用户列表
     *
     *
     */
    public function getUserList($page, $size)
    {
        return DB::fetch_all('select * from %t ORDER BY create_time DESC LIMIT %d,%d', array($this->_table, ($page - 1) * $size, $size));
    }

    /*
     * 获取用户总数
     *
     */
    public function getCount()
    {
        $rows = DB::fetch_all('select count(*) as count from %t', array($this->_table));
        return $rows[0]['count'];
    }

    /*
     * 根据平台获取用户列表
     *
     */
    public function getListByType($type)
    {
        return DB::fetch_all('select * from %t where platform=%s', array($this->_table, $type));
    }

    /*
     * 获取用户数量
     *
     */
    public function getCountByType($type)
    {
        switch ($type) {
            case 'now':
            $rows = DB::fetch_all(
                'select count(*) as count from %t where create_time > %d',
                array($this->_table, strtotime(date('Y-m-d', time())))
            );
            break;
            case 'week':
                $w = date('w') ? date('w') : 7;
                $rows = DB::fetch_all(
                    'select count(*) as count from %t where create_time > %d',
                    array($this->_table, mktime(0, 0, 0, date('m'), date('d') - $w + 1, date('Y')))
                );
                break;
            case 'month':
                $rows = DB::fetch_all(
                    'select count(*) as count from %t where create_time > %d',
                    array($this->_table, mktime(0, 0, 0, 1, 1, date('Y')))
                );
                break;
            case 'all':
                $rows = DB::fetch_all('select count(*) as count from %t', array($this->_table));
                break;
        }
        return $rows[0]['count'];
    }
}
