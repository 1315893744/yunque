<?php

class table_order extends discuz_table
{
    public function __construct()
    {
        $this->_table = 'yimen_orders';
        parent::__construct();
    }

    /*
     *
     * 查询订单信息
     *
     */
    public function getOrderInfo($order_id)
    {
        $orderInfo = DB::fetch_first('select * from %t where order_id=%s', array($this->_table, $order_id));
        if (empty($orderInfo)) {
            return false;
        }
        return $orderInfo;
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
    public function upOrderById($id, $data)
    {
        return DB::update($this->_table, $data, 'id=' . $id);
    }

    /*
     * 标记一个订单已经完成
     *
     */
    public function setOrderSuc($id)
    {
        return DB::update($this->_table, array('state' => 1, 'update_time' => time()), 'id=' . $id);
    }

    /*
     * 标记一个订单已回调
     *
     *
     */
    public function setOrderCallback($id)
    {
        return DB::update($this->_table, array('callback' => 1, 'callback_time' => time()), 'id=' . $id);
    }

    /*
     *  获取订单记录
     *  $type
     */
    public function getOrderList($page, $size)
    {
        return DB::fetch_all('select * from %t ORDER BY create_time DESC LIMIT %d,%d', array($this->_table, ($page - 1) * $size, $size));
    }

    /*
     * 获取订单总数
     *
     */
    public function getOrderCount()
    {
        $rows = DB::fetch_all('select count(*) as count from %t', array($this->_table));
        return $rows[0]['count'];
    }

    /*
     * 获取订单总金额
     *
     */
    public function getAmountByType($type)
    {
        switch ($type) {
            case 'now':
                $rows = DB::fetch_all(
                    'select sum(amount) as count from %t where create_time >%d',
                    array($this->_table, strtotime(date('Y-m-d', time())))
                );
                break;
            case 'week':
                $w = date('w') ? date('w') : 7;
                $rows = DB::fetch_all(
                    'select sum(amount) as count from %t where create_time >%d',
                    array($this->_table, mktime(0, 0, 0, date('m'), date('d') - $w + 1, date('Y')))
                );
                break;
            case 'month':
                $rows = DB::fetch_all(
                    'select sum(amount) as count from %t where create_time >%d',
                    array($this->_table, mktime(0, 0, 0, 1, 1, date('Y')))
                );
                break;
            case 'all':
                $rows = DB::fetch_all('select sum(amount) as count from %t', array($this->_table));
                break;
            case 'err':
                $rows = DB::fetch_all('select sum(amount) as count from %t where state=0', array($this->_table));
                break;
        }
        return $rows[0]['count'];
    }

    public function getAmountCountByType($type)
    {
        switch ($type) {
            case 'now':
                $rows = DB::fetch_all(
                    'select count(*) as count from %t where create_time >%d',
                    array($this->_table, strtotime(date('Y-m-d', time())))
                );
                break;
            case 'week':
                $w = date('w') ? date('w') : 7;
                $rows = DB::fetch_all(
                    'select count(*) as count from %t where create_time >%d',
                    array($this->_table, mktime(0, 0, 0, date('m'), date('d') - $w + 1, date('Y')))
                );
                break;
            case 'month':
                $rows = DB::fetch_all(
                    'select count(*) as count from %t where create_time >%d',
                    array($this->_table, mktime(0, 0, 0, 1, 1, date('Y')))
                );
                break;
            case 'all':
                $rows = DB::fetch_all('select count(*) as count from %t', array($this->_table));
                break;
            case 'err':
                $rows = DB::fetch_all('select count(*) as count from %t where state=0', array($this->_table));
                break;
        }
        return $rows[0]['count'];
    }
}
