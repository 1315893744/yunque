<?php

class table_good extends discuz_table
{
    public function __construct()
    {
        $this->_table = 'yimen_goods';
        parent::__construct();
    }

    public function getCountById($id)
    {
        $res = DB::fetch_first('select * from %t where id=%s', array($this->_table, $id));
        return $res['count'];
    }

    /*
     * 创建一个订单
     *
     *
     */
    public function create($data)
    {
        return DB::insert($this->_table, $data, true);
    }

    /*
     * 更改一个订单
     *
     */
    public function upById($id, $data)
    {
        return DB::update($this->_table, $data, 'id=' . $id);
    }

    public function getList()
    {
        return DB::fetch_all('select * from %t ', array($this->_table));
    }

}
