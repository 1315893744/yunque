<?php

if (!defined('IN_DISCUZ')) {
    exit('Access Denied');
}

class QidouLove {
    const PLUGIN_ID = 'qidou_love';
    
    
    /*
     * 初始化用户数据
     */
    
    public static function initial_user( $uid ){
        $love_user = C::t('#qidou_love#love_user')->get_user_first($uid);
        $extend_user = C::t('#qidou_love#love_user')->get_user_extend($uid);
        if( $love_user ){
            C::t('#qidou_love#love_user')->update($extend_user,array('uid'=>$uid));
            $extend_user['uid'] = $uid;
        }else{
            global $_G;
            $extend_user['uid'] = $uid;
            $extend_user['add_time'] = $_G['timestamp'];
            C::t('#qidou_love#love_user')->insert($extend_user);
        }
        return array_merge($love_user,$extend_user);
    }
    
    
    /*
     * 初始化数据，select使用的正确数据格式
     * $data 二维数组
     * $field1 第一个字段名
     * $field2 第二个字段名
     * 返回 二维数组
     */
    public static function initial_data( $data,$field1,$field2,$is_type=false ){
        $arr = array();
        foreach( $data as $val ){
            if( !$is_type && !$field2){
                $arr[$val[$field1]] = $val[$field1];
            }else if( !$is_type && $field2 ){
                $arr[$val[$field1]] = array($val[$field1],$val[$field2]);
            }else{
                $arr[$val[$field1]][] = $val[$field2];
            }
        }
        return $arr;
    }
    
    
    /*
     * 数组参数拼接
     * 用于分页时的参数传递
     */
    public static function param_join( $data ){
        $param_data = array();
        foreach( $data as $key=>$val ){
            $param_data[] = $key.'='.$val;
        }
        return implode('&',$param_data);
    }
    
    
    /*
     * 语言包转换中文编码
     * $charset 编码
     * $lang 中文语言
     * 返回转码后的中文
     */
    public static function convert_lang( $charset,$lang ){
        if( strpos($charset,'g')!==false ){
            $lang = iconv('GB2312','UTF-8',$lang);
        }
        return $lang;
    }
    
    
    /*
     * 中文自动转码
     */
    public static function auto_iconv( $lang ){
        global $_G;
        return mb_convert_encoding($lang,$_G['charset'],'auto');
    }
    
    /*
     * 上传图片
     * $basepath
     * $FILE 传入单个文件
     * 返回上传成功后的文件地址
     */
    public static function upload( $basepath,$FILE ){
        
        if($FILE['tmp_name']) {
            $upload = new love_upload();
            if(!$upload->init($FILE, 'qidou_love','love_upload', random(8)) || !$upload->save()) {
                $pic = '';
            }
            $pic = $basepath.$upload->attach['attachment'];
        } else {
            $pic = '';
        }
        return $pic;
    }
    
    
    /*
     * 生成select元素html结构
     * $name select的name属性和id属性值
     * $data select所需要的数据
     * $selected select选中的项
     * $initial 如果存在的时候会创建一个初始化的option
     * 返回生成好的select元素html代码
     */
    public static function create_select($name,$data,$selected,$initial){
        $select = "<select name='$name' id='$name'>";
        if( $initial ){
            $select .= "<option value='".$initial[0]."'>".$initial[1]."</option>";
        }
        foreach( $data as $val ){
            $sed = $selected==$val[0]?'selected':'';
            $select .= "<option value='".$val[0]."' $sed>".$val[1]."</option>";
        }
        $select .= "</select>";
        return $select;
    }
    /*
     * 输出json提示信息
     */
    public static function output($success, $msg,$id=0,$status=0) {
        $data['success'] = $success;
        $data['message'] = $msg;
        $data['id'] = $id;
        $data['status'] = $status;
        echo json_encode($data);
        exit;
    }
    
    
    /*
     * 数组过滤，过滤非法数据
     * $types 过滤函数（自定义函数先进行声明）
     * array_map 对数组的每一项进行过滤
     * 返回过滤后的数据
     */
    
    public static function check_array( $array,$type=0 ){
        $types = array(
            '0'=>'addslashes',
            '1'=>'intval',
            '2'=>'strtotime',
            '3'=>'dhtmlspecialchars'
            );
        return array_map($types[$type],$array);
    }
    
    
    /*
     * 性别转换
     */
    public static function return_gender( $default,$gender ){
        if( $gender==1 ){
            $default = 2;
        }else if( $gender==2 ){
            $default = 1;
        }
        return $default;
    }
    
    /*
     * 数组分组
     * 把一维数组变成指定数量的二维数组
     */
    
    public static function array_group( $array,$size=4 ){
        $len = ceil( count( $array ) / $size );
	$narr = array();
	for( $i=0; $i<$len;$i++ ){
            $narr[] = array_splice($array,0,$size);
	}
        return array_filter($narr);
    }
    

}
