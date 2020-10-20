<?php
if (!defined('IN_DISCUZ')) {
    exit('Aecsse Denied');
}
class table_love_trends extends discuz_table{
    public function __construct() {
        $this->_table = 'forum_thread';
        $this->_pk = 'id';
        parent::__construct();
    }
    /*
     * 返回用户统计数量
     */
    public function get_trends_count( $where ){
        $sql = "SELECT count(*) as count FROM %t WHERE 1";
        $condition[] = $this->_table;
        
        $sql .=" AND authorid=%d";
        $condition[] = $where['uid'];
        $count = DB::fetch_first($sql,$condition);
        return $count['count'];
    }
    /*
     * $start 开始位置
     * $size 记录数量
     * $status 商品状态 (0为全部，1开启)
     * 返回指定数量的分类集合
     */
    public function get_trends_list( $start,$size,$where ){
        $sql = "SELECT t.tid,t.subject as title,t.dateline,t.views,p.message as content,i.attachment as image FROM %t as t LEFT JOIN %t as p ON t.tid=p.tid LEFT JOIN %t as i ON p.tid=i.tid";
        $condition[] = $this->_table;
        $condition[] = 'forum_post';
        $condition[] = 'forum_threadimage';
        
        $sql .=" WHERE t.authorid=%d AND p.first=1";
        $condition[] = $where['uid'];
        
        $sql .=" ORDER BY t.dateline desc ";
        $sql .= " LIMIT %d,%d";
        $condition[] = $start;
        $condition[] = $size;
        return DB::fetch_all($sql,$condition);
    }
    
    /*
     * 获取文章点赞数量
     */
    public function get_trends_give( $tids ){
        if( !$tids ){return array();}
        $sql = "SELECT count(*) as count,tid FROM %t WHERE tid in (".implode(',',$tids).") GROUP BY tid";
        $give_count = QidouLove::initial_data(DB::fetch_all($sql,array('forum_memberrecommend')),'tid','count',true);
        return $give_count;
    }
    
    
    /*
     * $start 开始位置
     * $size 记录数量
     * $status 商品状态 (0为全部，1开启)
     * 返回指定数量的分类集合
     */
    public function get_album_list( $tids ){
        if( !$tids ){return array();}
        $sql = "SELECT tid,tableid FROM %t WHERE tid in (".implode(',',$tids).") GROUP BY tid";
        $album_list = QidouLove::initial_data(DB::fetch_all($sql,array('forum_attachment')),'tableid','tid',true);
        
        $count = array();
        $album = array();
        $new_album = array();
        
        foreach( $album_list as $key=>$list){
            $album = array_merge($album,DB::fetch_all("SELECT tid,dateline,attachment FROM %t WHERE tid in(".implode(',',$list).") ORDER BY dateline desc",array('forum_attachment_'.$key)));
        }
        foreach( $album as $list ){
            if( !$count[$list['tid']] ){
                $count[$list['tid']] = 0;
            }
            $count[$list['tid']]++;
            $new_album[strtotime(date('Y-m-d',$list['dateline']))][] = $list['attachment'];
        }
        krsort($new_album);
        return array('count'=>$count,'album'=>$new_album);
    }
    
}
?>