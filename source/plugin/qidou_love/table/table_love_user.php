<?php
if (!defined('IN_DISCUZ')) {
    exit('Aecsse Denied');
}
class table_love_user extends discuz_table{
    public function __construct() {
        $this->_table = 'qidou_love_user';
        $this->_pk = 'id';
        parent::__construct();
    }
    /*
     * 返回用户统计数量
     */
    public function get_user_count($where){
        $sql = "SELECT count(*) as count FROM %t WHERE 1";
        $condition[] = $this->_table;
        
        if( $where['gender'] ){
            $sql .=" AND gender=%d";
            $condition[] = $where['gender'];
        }
        if( $where['is_recom'] ){
            $sql .=" AND is_recom=%d";
            $condition[] = $where['is_recom']-1;
        }
        if( $where['recom'] == 1 ){
            $sql .=" AND is_recom=1";
        }
        if( !$where['all'] ){
            $sql .=" AND user_album is not null AND user_album != '' AND age > 0 AND height > 0";
        }
        if( $where['user_name'] ){
            $sql .=" AND user_name like %s";
            $condition[] = '%'.$where['user_name'].'%';
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
    public function get_user_list( $start,$size,$where ){
        $sql = "SELECT * FROM %t WHERE 1";
        $condition[] = $this->_table;
        
        if( $where['gender'] ){
            $sql .=" AND gender=%d";
            $condition[] = $where['gender'];
        }
        if( $where['is_recom'] ){
            $sql .=" AND is_recom=%d";
            $condition[] = $where['is_recom']-1;
        }
        if( $where['recom'] == 1 ){
            $sql .=" AND is_recom=1";
        }
        if( !$where['all'] ){
            $sql .=" AND user_album is not null AND user_album != '' AND age > 0 AND height > 0";
        }
        if( $where['user_name'] ){
            $sql .=" AND user_name like %s";
            $condition[] = '%'.$where['user_name'].'%';
        }
        switch( $where['orderby'] ){
            case 1:
                $sql .=" ORDER BY charm_num desc ";
            break;
        }
        $sql .= " LIMIT %d,%d";
        $condition[] = $start;
        $condition[] = $size;
        return DB::fetch_all($sql,$condition);
    }
    
    
    /*
     * $uid 获取指定UID的用户
     * 返回一条用户
     */
    public function get_user_first( $uid ){
        return DB::fetch_first("SELECT * FROM %t WHERE uid=%d",array($this->_table,$uid));
    }
    
    /*
     * 获取扩展用户信息
     */
    
    public function get_user_extend( $uid ){
        return DB::fetch_first("
            SELECT f.sightml,p.gender,p.birthyear,p.birthmonth,p.birthday,p.constellation,
            p.education,p.occupation,p.affectivestatus,p.height,p.weight,m.groupid,m.username as user_name
            FROM %t f,%t p,%t m WHERE f.uid=p.uid AND p.uid=m.uid AND f.uid=%d
        ",
            array('common_member_field_forum','common_member_profile','common_member',$uid)
        );
    }
    
    
    
    /*
     * $data 用户信息数据
     * 返回插入的id
     */
    public function insert( $data ){
        return DB::insert($this->_table, $data,true);
    }
    
    /*
     * $data 用户更新数据
     * $condition 更新条件
     * 返回更新id 
     */
    public function update( $data,$condition ){
        return DB::update($this->_table, $data,$condition,true);
    }
    
    /*
     * $condition删除用户条件
     */
    public function delete( $condition ){
        return DB::delete($this->_table, $condition);
    }
    
    /*
     * 获取关注总数
     */
    public function get_follow_count( $uid ){
        $result = DB::fetch_first("SELECT count(*) as count FROM %t WHERE uid=%d",array('home_follow',$uid));
        return $result['count'];
    }
    
    /*
     * 检测是否关注
     */
    public function get_is_follow( $uid,$fuid ){
        return DB::fetch_first("SELECT * FROM %t WHERE uid=%d AND followuid=%d",array('home_follow',$uid,$fuid));
    }
    
    /*
     * 添加关注
     */
    public function add_follow( $data ){
        return DB::insert('home_follow', $data,true);
    }
    
    /*
     * 取消关注
     */
    public function del_follow( $condition ){
        return DB::delete('home_follow', $condition);
    }
    
    /*
     * 更新喜欢好友数量
     */
    public function update_num( $uid,$field ){
        return DB::query("UPDATE %t SET $field=$field+1 WHERE uid=%d",array($this->_table,$uid));
    }
    
    /*
     * 获取随机数量的用户
     */
    public function get_rand_meet( $limit,$where ){
        /*
         * SELECT * FROM pre_qidou_love_user WHERE gender=2 and uid >= ((SELECT MAX(uid) FROM pre_qidou_love_user WHERE gender=2)-(SELECT MIN(uid) FROM pre_qidou_love_user WHERE gender=2)) * RAND() + (SELECT MIN(uid) FROM pre_qidou_love_user WHERE gender=2) LIMIT 1
         */
        $sql = "SELECT * FROM %t WHERE gender=%d AND user_album is not null AND user_album !='' AND age > 0 AND height > 0 ORDER BY RAND() LIMIT %d";
        $condition[] = $this->_table;
        $condition[] = $where['gender'];
        $condition[] = $limit;
        return DB::fetch_all($sql,$condition);
    }
    
    /*
     * 获取用户集合
     * 返回一条用户
     */
    public function get_user_gather( $uids ){
        if( !$uids ){return;}
        return DB::fetch_all("SELECT * FROM %t WHERE uid in ($uids)",array($this->_table));
    }
    
    /*
     * 获取用户组名称
     */
    public function get_user_group(){
        return QidouLove::initial_data(DB::fetch_all("SELECT groupid,grouptitle FROM %t",array('common_usergroup')),'groupid','grouptitle');
    }
    /*
     * 获取用户的货币信息
     */
    public function get_user_account( $uid,$type ){
        $sql = "SELECT extcredits%d AS price FROM %t WHERE uid=%d";
        $account = DB::fetch_first($sql,array($type,'common_member_count',$uid));
        return $account['price'];
    }
    
    
}
?>