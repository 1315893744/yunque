<?php
if (!defined('IN_DISCUZ')) {
    exit('Aecsse Denied');
}
class table_love_reward extends discuz_table{
    public function __construct() {
        $this->_table = 'qidou_love_reward';
        $this->_pk = 'id';
        parent::__construct();
    }
    /*
     * 返回用户统计数量
     */
    public function get_reward_count($where){
        $sql = "SELECT count(*) as count FROM %t WHERE 1";
        $condition[] = $this->_table;
        
        if( $where['uid'] ){
            $sql .=" AND uid=%d";
            $condition[] = $where['uid'];
        }
        if( $where['rid'] ){
            $sql .=" AND rid=%d";
            $condition[] = $where['rid'];
        }
        if( $where['r_name'] ){
            $sql .=" AND r_name like %s ";
            $condition[] = '%'.$where['r_name'].'%';
        }
        $count = DB::fetch_first($sql,$condition);
        return $count['count'];
    }
    /*
     * $start 开始位置
     * $size 记录数量
     * $status 商品状态 (0为全部，1开启)
     * 返回指定数量的分类集合
     */
    public function get_reward_list( $start,$size,$where ){
        $sql = "SELECT * FROM %t WHERE 1";
        $condition[] = $this->_table;
        
        if( $where['uid'] ){
            $sql .=" AND uid=%d";
            $condition[] = $where['uid'];
        }
        if( $where['rid'] ){
            $sql .=" AND rid=%d";
            $condition[] = $where['rid'];
        }
        if( $where['r_name'] ){
            $sql .=" AND r_name like %s ";
            $condition[] = '%'.$where['r_name'].'%';
        }
        $sql .=" ORDER BY r_price desc ";
        $sql .= " LIMIT %d,%d";
        $condition[] = $start;
        $condition[] = $size;
        return DB::fetch_all($sql,$condition);
    }
    
    /*
     * $start 开始位置
     * $size 记录数量
     * $status 商品状态 (0为全部，1开启)
     * 返回指定数量的分类集合
     */
    public function get_ruser_count( $where ){
        $sql = "SELECT uid FROM %t WHERE 1";
        $condition[] = $this->_table;
        
        if( $where['uid'] ){
            $sql .=" AND uid=%d";
            $condition[] = $where['uid'];
        }
        if( $where['rid'] ){
            $sql .=" AND rid=%d";
            $condition[] = $where['rid'];
        }
        $sql .=" GROUP BY uid";
        return count(DB::fetch_all($sql,$condition));
    }
    
    /*
     * $start 开始位置
     * $size 记录数量
     * $status 商品状态 (0为全部，1开启)
     * 返回指定数量的分类集合
     */
    public function get_ruser_list( $start,$size,$where ){
        $sql = "SELECT *,sum(r_price) as r_price FROM %t WHERE 1";
        $condition[] = $this->_table;
        
        if( $where['uid'] ){
            $sql .=" AND uid=%d";
            $condition[] = $where['uid'];
        }
        if( $where['rid'] ){
            $sql .=" AND rid=%d";
            $condition[] = $where['rid'];
        }
        $sql .=" GROUP BY uid ORDER BY r_price desc ";
        $sql .= " LIMIT %d,%d";
        $condition[] = $start;
        $condition[] = $size;
        return DB::fetch_all($sql,$condition);
    }
    
    public function update( $data,$condition ){
        return DB::update($this->_table, $data,$condition,true);
    }
    
    /*
     * 添加礼物
     */
    
    public function insert( $data ){
        return DB::insert($this->_table,$data,true);
    }
    
    
}
?>