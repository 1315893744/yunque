<?php
if (!defined('IN_DISCUZ')) {
    exit('Aecsse Denied');
}
class table_love_list extends discuz_table{
    public function __construct() {
        $this->_table = 'qidou_love_list';
        $this->_pk = 'id';
        parent::__construct();
    }
    /*
     * 返回用户统计数量
     */
    public function get_user_count($where){
        $sql = "SELECT count(*) as count FROM %t WHERE 1";
        $condition[] = $this->_table;
        
        if( $where['user_type'] ){
            $sql .=" AND user_type=%d";
            $condition[] = $where['user_type'];
        }
        if( $where['user_status']==1 ){
            $sql .=" AND user_status=0";
        }else if( $where['user_status']==2 ){
            $sql .=" AND user_status=1";
        }
        if( $where['user_info'] ){
            $sql .=" AND (user_name like %s or nick_name like %s)";
            $condition[] = '%'.$where['user_info'].'%';
            $condition[] = '%'.$where['user_info'].'%';
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
    public function get_love_list( $start,$size,$where ){
        $sql = "SELECT * FROM %t WHERE 1";
        $condition[] = $this->_table;
        
        if( $where['love_id'] ){
            $sql .=" AND love_id=%d";
            $condition[] = $where['love_id'];
        }
        $sql .=" ORDER BY love_num desc ";
        $sql .= " LIMIT %d,%d";
        $condition[] = $start;
        $condition[] = $size;
        return DB::fetch_all($sql,$condition);
    }
    
    public function update( $data,$condition ){
        return DB::update($this->_table, $data,$condition,true);
    }
    
    
    /*
     * 检测是否喜欢
     */
    public function get_is_love( $uid,$love_id ){
        return DB::fetch_first("SELECT * FROM %t WHERE uid=%d AND love_id=%d",array($this->_table,$uid,$love_id));
    }
    
    /*
     * 添加喜欢
     */
    
    public function add_love( $data ){
        return DB::insert('qidou_love_list', $data,true);
    }
    
    /*
     * 更新喜欢
     */
    public function update_love( $uid,$love_id ){
        return DB::query("UPDATE %t SET love_num=love_num+1 WHERE uid=%d and love_id=%d",array($this->_table,$uid,$love_id));
    }
    
    
}
?>