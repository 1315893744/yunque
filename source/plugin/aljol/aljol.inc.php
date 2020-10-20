<?php
if(!$_G['mobile']) {
	include template('aljol:aljol');
	exit;
}
if(!$_G['uid']) {
	header('Location:member.php?mod=logging&action=login&referer=plugin.php?id=aljol');
}
if($_G['groupid'] == '5'){
	showmessage('&#24744;&#24050;&#34987;&#31105;&#27490;&#35775;&#38382;&#65281;&#65281;&#65281;');
}
$act = addslashes($_GET['act']);
$chat = addslashes($_GET['chat']);
$friendid = intval($_GET['friendid']);
$beginToday = mktime(0,0,0,date('m'),date('d'),date('Y'));
$endToday = mktime(0,0,0,date('m'),date('d')+1,date('Y'))-1;
$requesttable = 'home_friend_request';
$friendtable = 'home_friend';
$fanstable = 'home_follow';
$signtable = 'common_member_field_forum';
$usertable = 'common_member';
$a = lang("plugin/aljol","aljol_inc_php_1");

//调用自动删除30天以前的图片函数
DeletePicture_Auto();
//ajax开始
if($act == 'chat') {//发送消息
	if($_G['groupid'] == '4'){//禁止发言
		$tmp_array=array(
            'code'=>4,
        );
		echo json_encode(ajaxPostCharSet($tmp_array));
		exit;
	}
	if($_G['groupid'] == '5'){//禁止访问
		$tmp_array=array(
            'code'=>5,
        );
		echo json_encode(ajaxPostCharSet($tmp_array));
		exit;
	}
	$checkWord = DB::fetch_all('select * from %t', array('common_word'));
	foreach($checkWord as $k => $v){
		$chat = str_replace($v['find'], '***', $chat);
	}
    $talkid=DB::insert('aljol_talk',array(
        'uid'=>$_G['uid'],
        'username'=>$_G['username'],
        'friendid'=>$friendid,
        'talk'=>$chat,
        'datetime'=>TIMESTAMP,
        'talkstate'=>1,
    ),true);
    if($talkid){
        news($friendid,$chat);
        $tmp_array=array(
            'code'=>200,
            'chat'=>ubbReplace($chat),
            'username'=>$_G['username'],
            'head'=> avatar($_G['uid']),
        );
    }else{
        $tmp_array=array(
            'code'=>400,
        );
    }
    echo json_encode(ajaxPostCharSet($tmp_array));
}else if($act == 'friendchat') {//接收消息
	if(!$friendid){
		$friendtalk=DB::fetch_first('select a.*,b.picture from %t a left join %t b on a.picture=b.pid where a.id>%d and a.friendid=0 and a.uid!=%d order by a.id asc',array('aljol_talk','aljol_picture', $_GET['chatid'], $_G['uid'], 1));
	}else{
		$friendtalk=DB::fetch_first('select a.*,b.picture from %t a left join %t b on a.picture=b.pid where a.uid=%d and a.friendid=%d and a.talkstate=%d order by a.datetime asc',array('aljol_talk','aljol_picture',$friendid,$_G['uid'],1));
	}

    if(!empty($friendtalk)){
        $tmp_array=array(
            'code' => 200,
            'chat' => ubbReplace($friendtalk['talk']),
            'username' => $friendtalk['username'],
			'uid' => $friendtalk['uid'],
			'id' => $friendtalk['id'],
			'datetime' => date('H:i',$friendtalk['datetime']),
            'picture' => $friendtalk['picture'],
            'type' => $friendtalk['type'],
        );
        DB::query('update %t set talkstate=%d where id=%d',array('aljol_talk',2,$friendtalk['id']));
    }else {
        $tmp_array=array(
            'code'=>400,
        );
    }
    echo json_encode(ajaxPostCharSet($tmp_array));
}else if ($act == 'news') {//前台消息提醒模块
    $time = TIMESTAMP-1800;
    $news = DB::fetch_all('select * from %t where friendid=%d and datetime>%d',array('aljol_news',$_G['uid'],$time));
    if(!empty($news)) {
        foreach ($news as $tmp_key => $tmp_value) {
            $tmp_value['lastnews'] = ubbReplace($tmp_value['lastnews']);
            if($tmp_value['datetime']>$beginToday && $tmp_value['datetime']<$endToday){
                $tmp_value['time'] = date('H:i',$tmp_value['datetime']);
            }else {
                $tmp_value['time'] = date('Y-m-d',$tmp_value['datetime']);
            }
            $tmp_value['head'] = avatar($tmp_value['uid']);
            $news[$tmp_key] = $tmp_value;
        }
        echo json_encode(ajaxPostCharSet($news));
    }
}else if($act == 'deletenews') {//删除消息提醒
    if(DB::delete('aljol_news', array('uid' => $friendid,'friendid'=>$_G['uid']))) {
        $tmp_array=array(
            'code'=>200,
        );
    }else {
        $tmp_array=array(
            'code'=>400,
        );
    }
    echo json_encode(ajaxPostCharSet($tmp_array));
}else if($act == 'upload') {//上传图片
	if($_G['groupid'] == '4'){//禁止发言
		$tmp_array=array(
			'code'=>4,
		);
		echo json_encode(ajaxPostCharSet($tmp_array));
		exit;
	}
	if($_G['groupid'] == '5'){//禁止访问
		$tmp_array=array(
			'code'=>5,
		);
		echo json_encode(ajaxPostCharSet($tmp_array));
		exit;
	}
    $type = addslashes($_GET['type']);
    $rand = rand(100, 999);
    $pics = date("YmdHis") . $rand.'.'.$type;
    $dir='source/plugin/aljol/static/img/file/'.date('Ymd',TIMESTAMP).'/';
    if(!is_dir($dir)) {
        @mkdir($dir, 0777);
    }
    $src = $dir. $pics;
    $type_image['src']=$src;
    if($type == 'gif') {
        if(@copy($_FILES['picture']['tmp_name'], $src)||@move_uploaded_file($_FILES['picture']['tmp_name'], $src)){
            @unlink($_FILES['picture']['tmp_name']);
        }
    }else {
		file_put_contents($src,file_get_contents($_GET['picpath']));
    }
    $picture = DB::insert('aljol_picture',array(
        'uid'=>$_G['uid'],
        'friendid'=>$friendid,
        'picture'=>$type_image['src'],
        'datetime'=>TIMESTAMP,
    ),true);
    $talkid = DB::insert('aljol_talk',array(
        'uid'=>$_G['uid'],
        'username'=>$_G['username'],
        'friendid'=>$friendid,
        'datetime'=>TIMESTAMP,
        'talkstate'=>1,
        'picture'=>$picture,
    ),true);
    if($talkid) {
        $chat = '[picture]';
        news($friendid,$chat);
        $tmp_array = array(
            'code' => 200,
            'username'=>$_G['username'],
            'src' => $type_image['src'],
            'head' => avatar($_G['uid']),
        );
    }else {
        $tmp_array=array(
            'code'=>400,
        );
    }
   echo json_encode(ajaxPostCharSet($tmp_array));
}else if ($act == 'friendlist') {
    $listtype = intval($_GET['listtype']);
	$page = $_GET['page']?intval($_GET['page']):1;
    $paging = 10;
    $offset = ($page-1)*$paging;
    if($listtype == 1) {//我的朋友
        $friend = DB::fetch_all('select a.*, b.sightml from %t a left join %t b on a.fuid = b.uid where a.uid=%d limit %d,%d',array($friendtable,$signtable,$_G['uid'],$offset,$paging));
        if(!empty($friend)) {
            foreach ($friend as $tmp_key => $tmp_value) {
                if(empty($tmp_value['sightml'])) {
                    $tmp_value['sightml'] = $a;
                }
                $tmp_array[]=array(
                    'code' => 200,
                    'head' => avatar($tmp_value['fuid']),
                    'friendname' => $tmp_value['fusername'],
                    'friendid' => $tmp_value['fuid'],
                    'sign' => SignReplace($tmp_value['sightml']),
                );
            }
        }
    }else if($listtype == 2) {//我关注的
        $fans = DB::fetch_all('select a.*, b.sightml from %t a left join %t b on a.followuid = b.uid where a.uid=%d limit %d,%d',array($fanstable,$signtable,$_G['uid'],$offset,$paging));
        if(!empty($fans)) {
            foreach ($fans as $tmp_key => $tmp_value) {
                if(empty($tmp_value['sightml'])) {
                    $tmp_value['sightml'] = $a;
                }
                $tmp_array[]=array(
                    'code' => 200,
                    'head' => avatar($tmp_value['followuid']),
                    'friendname' => $tmp_value['fusername'],
                    'friendid' => $tmp_value['followuid'],
                    'sign' => SignReplace($tmp_value['sightml']),
                );
            }
        }
    }else{//关注我的
        $fans = DB::fetch_all('select a.*, b.sightml from %t a left join %t b on a.uid = b.uid where a.followuid=%d limit %d,%d',array($fanstable,$signtable,$_G['uid'],$offset,$paging));
        if(!empty($fans)) {
            foreach ($fans as $tmp_key => $tmp_value) {
                if(empty($tmp_value['sightml'])) {
                    $tmp_value['sightml'] = $a;
                }
                $tmp_array[]=array(
                    'code' => 200,
                    'head' => avatar($tmp_value['uid']),
                    'friendname' => $tmp_value['username'],
                    'friendid' => $tmp_value['uid'],
                    'sign' => SignReplace($tmp_value['sightml']),
                );
            }
        }
    }
    echo json_encode(ajaxPostCharSet($tmp_array));
}else if($act == 'search') {//搜索
    $searchkey = addslashes($_GET['searchkey']);
	if($searchkey == $_G['uid']) {
		$tmp_array=array(
				'code'=>500,
		);
	}else{
		$userlist = DB::fetch_first('select a.*, b.sightml from %t a left join %t b on a.uid = b.uid where a.uid=%d',array($usertable,$signtable,$searchkey));
		if(!empty($userlist)) {
			if(empty($userlist['sightml'])) {
				$userlist['sightml'] = $a;
			}else{
				$userlist['sightml'] = SignReplace($userlist['sightml']);
			}
			$tmp_array=$userlist;
			$tmp_array['code']=200;
			$tmp_array['head']=avatar($userlist['uid']);
			$friend = DB::fetch_first('select * from %t where uid=%d and fuid=%d',array($friendtable,$_G['uid'],$searchkey));
			if(!empty($friend)) {//已经是好友
				$tmp_array['myfriend'] = 1;
			}else {
				$friendrequest = DB::fetch_first('select * from %t where uid=%d and fuid=%d',array($requesttable,$searchkey,$_G['uid']));
				if(!empty($friendrequest)) {//等待验证
					$tmp_array['myfriend'] = 2;
				}else{//可以申请好友
					$tmp_array['myfriend'] = 3;
				}

			}
		}else{
			$tmp_array=array(
				'code'=>400,
			);
		}
	}
    echo json_encode(ajaxPostCharSet($tmp_array));
}else if($act == 'addfriend') {//添加好友
    $thisfriend = DB::fetch_first('select * from %t where uid=%d and fuid=%d',array($friendtable,$_G['uid'],$friendid));
    if(empty($thisfriend)) {
        DB::insert($requesttable,array(
            'uid'=>$friendid,
            'fuid'=>$_G['uid'],
            'fusername'=>$_G['username'],
            'gid'=>1,
            'dateline'=>TIMESTAMP,
        ));
        $a = lang("plugin/aljol","aljol_inc_php_2");
        $b = lang("plugin/aljol","aljol_inc_php_3");
        $c = "showWindow(this.id, this.href,'get',0);";
        $str = '<a href="home.php?mod=space&uid='.$_G['uid'].'">'.$_G['username'].'</a>'.$a.'<a onclick="'.$c.'" class="xw1" id="afr_'.$_G['uid'].'" href="home.php?mod=spacecp&ac=friend&op=add&uid='.$_G['uid'].'&from=notice">'.$b.'</a>';
        DB::insert('home_notification',array(
            'uid' => $friendid,
            'type' => 'friend',
			'new' => 1,
            'authorid' =>$_G['uid'],
            'author' => $_G['username'],
            'note' => $str,
            'dateline' => TIMESTAMP,
            'from_id' => $_G['uid'],
            'from_idtype' => 'friendrequest',
            'category' =>2,
        ));
        $tmp_array=array(
            'code'=>200,
        );
    }else{
        $tmp_array=array(
            'code'=>400,
        );
    }

    echo json_encode(ajaxPostCharSet($tmp_array));
}else if($act == 'yesandno') {//好友申请是否同意
    $stateid = intval($_GET['stateid']);
    $firendname = DB::fetch_first('select * from %t where uid=%d',array('common_member',$friendid));
    if($stateid == 1) {//同意
        DB::insert($friendtable,array(
            'uid'=>$_G['uid'],
            'fuid'=>$friendid,
            'fusername'=>$firendname['username'],
            'gid'=>1,
            'dateline'=>TIMESTAMP,
        ));
        DB::insert($friendtable,array(
            'uid'=>$friendid,
            'fuid'=>$_G['uid'],
            'fusername'=>$_G['username'],
            'gid'=>1,
            'dateline'=>TIMESTAMP,
        ));
        notification_add($friendid, 'friend', 'friend_add');
        $tmp_array=array(
            'code'=>200,
        );
    }else{
        $tmp_array=array(
            'code'=>400,
        );
    }
    DB::delete($requesttable, array('uid' => $_G['uid'],'fuid' =>$friendid));
    DB::delete('home_notification', array('uid' => $_G['uid'],'type' => 'friend','authorid' =>$friendid,'author' => $firendname['username'],'from_idtype' => 'friendrequest'));
    echo json_encode(ajaxPostCharSet($tmp_array));
}

//ajax结束
else if($act == 'talk'){//聊天界面，初始化调用20条数据
    if($friendid == $_G['uid']) {
        header('Location:plugin.php?id=aljol');
    }
    $firendname = DB::fetch_first('select * from %t where uid=%d',array($usertable,$friendid));

	$selfrecordcount = DB::result_first('select count(*) from %t where (uid=%d and friendid=%d) or (uid=%d and friendid=%d) order by datetime asc',array('aljol_talk',$_G['uid'],$friendid,$friendid,$_G['uid']));

    $selfrecordcount = DB::result_first('select count(*) from %t where (uid=%d and friendid=%d) or (uid=%d and friendid=%d) order by datetime asc',array('aljol_talk',$_G['uid'],$friendid,$friendid,$_G['uid']));
	/*
 *源 码    哥 y  m  g     6  .   c    o  m
 *更多商业插件/模版免费下载 就在源 码    哥
 *本资源来源于网络收集,仅供个人学习交流，请勿用于商业用途，并于下载24小时后删除!
 *如果侵犯了您的权益,请及时告知我们,我们即刻删除!
 */
	$perpage = 30;
	$morepage = $_GET['morepage'] ? $_GET['morepage'] : 1;
	$begincount = ($morepage - 1)*$perpage;
	if(!$friendid){
		if($morepage>=2){
			$selftalkrecord = DB::fetch_all('select a.*, b.picture as img from %t a left join %t b on a.picture=b.pid where a.id<%d and a.friendid=0 order by a.id desc limit %d,%d',array('aljol_talk','aljol_picture', $_GET['chatid'], $begincount , $perpage));
		}else{
			$selftalkrecord = DB::fetch_all('select a.*, b.picture as img from %t a left join %t b on a.picture=b.pid where a.friendid=0 order by a.id desc limit %d,%d',array('aljol_talk','aljol_picture', $begincount , $perpage));
			$loadchatid = $selftalkrecord[0]['id'];
		}

		if(empty($_GET['ajax'])){
			sort($selftalkrecord);
		}
	}else{
		$selftalkrecord = DB::fetch_all('select a.*, b.picture as img from %t a left join %t b on a.picture=b.pid where (a.uid=%d and a.friendid=%d) or (a.uid=%d and a.friendid=%d) order by a.datetime asc limit %d,%d',array('aljol_talk','aljol_picture',$_G['uid'],$friendid,$friendid,$_G['uid'],$begincount,$perpage));
	}
    if(!empty($selftalkrecord)) {
        foreach ($selftalkrecord as $tmp_key => $tmp_value) {
            $tmp_value['talk'] = ubbReplace($tmp_value['talk']);
            $tmp_value['datetime'] = date('m-d H:i:s',$tmp_value['datetime']);
            if($tmp_value['img']) {
                $tmp_value['picture'] = $tmp_value['img'];
            }
            $selftalkrecord[$tmp_key] = $tmp_value;
        }
    }

    DB::update('aljol_talk',array('talkstate'=>2),array('uid'=>$friendid,'friendid'=>$_G['uid']));
	if($_GET['ajax']){
		$tmp_array=array(
            'code'=>200,
			'data'=>ajaxPostCharSet($selftalkrecord)
        );
		echo json_encode($tmp_array);
		exit;
	}else{
		include template('aljol:talk');
	}
}else if($act == 'requestfriendlist') {//好友通知
    $page = $_GET['page']?intval($_GET['page']):1;
    $paging = 10;
    $offset = ($page-1)*$paging;
    $addfriendrequest = DB::fetch_all('select a.*,b.sightml from %t a left join %t b on a.fuid=b.uid where a.uid=%d limit %d,%d',array($requesttable,$signtable,$_G['uid'],$offset,$paging));
	foreach ($addfriendrequest as $tmp_key => $tmp_value) {
		if(empty($tmp_value['sightml'])){
			$tmp_value['sightml'] = $a;
		}else{
			$tmp_value['sightml'] = SignReplace($tmp_value['sightml']);
		}
		$addfriendrequest[$tmp_key] = $tmp_value;

	}
    if($page >=2){
        include template('aljol:requestlist');
    }else{
        include template('aljol:request');
    }
}else {//主界面，初始化调用最近30天的消息数据
    $time = TIMESTAMP - 604800;
    $chatlist = DB::fetch_all('select * from %t where friendid=%d and datetime>%d order by datetime desc',array('aljol_news',$_G['uid'],$time));
    if(!empty($chatlist)) {
        foreach ($chatlist as $tmp_key => $tmp_value) {
            $tmp_value['lastnews'] = ubbReplace($tmp_value['lastnews']);
            if($tmp_value['datetime']>$beginToday && $tmp_value['datetime']<$endToday){
                $tmp_value['time'] = date('H:i',$tmp_value['datetime']);
            }else {
                $tmp_value['time'] = date('Y-m-d',$tmp_value['datetime']);
            }
            $chatlist[$tmp_key] = $tmp_value;
            $friendidlist[] = $tmp_value['uid'];
        }
    }
	include template('aljol:aljol');
}

//函数
//表情
function ubbReplace($str) {
    $str = str_replace ( ">", '<；', $str );
    $str = str_replace ( ">", '>；', $str );
	$str = str_replace ( "\n", '>；br/>；', $str );
    $str = preg_replace ( "[\[em_([0-9]*)\]]", "<img src=\"source/plugin/aljol/static/img/face/$1.gif\" / class='Em'>", $str );
    return $str;
}
function SignReplace($str) {
    $str=str_replace("<br>","",$str);
	$str = str_replace ( "\n", '', $str );
	return strip_tags($str);
}
function ajaxPostCharSet($arr) {
    if(is_array($arr)){
        if (strtolower(CHARSET) == 'gbk') {
            foreach ($arr as $key => $val) {
                if(is_array($val)){
                    $pt_goods[$key] = ajaxPostCharSet($val);
                }else{
                    $pt_goods[$key] = diconv($val,'gbk','utf-8');
                }
            }
            return $pt_goods;
        }
        return $arr;
    } else {
        if (strtolower(CHARSET) == 'gbk') {
            return diconv($arr,'gbk','utf-8');
        }
        return $arr;
    }

}
function ajaxGetCharSet($arr) {
    if(is_array($arr)){
        if (strtolower(CHARSET) == 'gbk') {
            foreach ($arr as $key => $val) {
                if(is_array($val)){
                    $pt_goods[$key] = ajaxGetCharSet($val);
                }else{
                    $pt_goods[$key] = diconv($val,'utf-8','gbk');
                }

            }
            return $pt_goods;
        }
        return $arr;
    } else {
        if (strtolower(CHARSET) == 'gbk') {
            return diconv($arr,'utf-8','gbk');
        }
        return $arr;
    }
}
//插入消息盒子
function news($friendid,$chat) {
    global $_G;
    $talkrecord = DB::fetch_first('select * from %t where uid=%d and friendid=%d',array('aljol_news',$_G['uid'],$friendid));
    $friendrecord = DB::fetch_first('select * from %t where friendid=%d and uid=%d',array('aljol_news',$_G['uid'],$friendid));
    if(empty($talkrecord)) {
        DB::insert('aljol_news',array(
            'uid'=>$_G['uid'],
            'username'=>$_G['username'],
            'friendid'=>$friendid,
            'datetime'=>TIMESTAMP,
            'lastnews'=>$chat,
        ));
    }else {
        DB::update('aljol_news',array('datetime'=>TIMESTAMP,'lastnews'=>$chat),array('id'=>$talkrecord['id']));
    }
    if(empty($friendrecord)) {
        $firendname = DB::fetch_first('select * from %t where uid=%d',array('common_member',$friendid));
        DB::insert('aljol_news',array(
            'uid'=>$friendid,
            'username'=>$firendname['username'],
            'friendid'=>$_G['uid'],
            'datetime'=>TIMESTAMP,
            'lastnews'=>$chat,
        ));
    }else {
        DB::update('aljol_news',array('datetime'=>TIMESTAMP,'lastnews'=>$chat),array('id'=>$friendrecord['id']));
    }
}

//自动删除30天之前的图片
function DeletePicture_Auto() {
    $time = TIMESTAMP-2592000;
    $imglistcount = DB::result_first('select count(*) from %t where datetime<%d',array('aljol_picture',$time));

    $Limit = mt_rand(0,$imglistcount-1);
    $imglist = DB::fetch_all('select * from %t where datetime<%d limit %d,%d ',array('aljol_picture',$time,$Limit,10));
    foreach ($imglist as $tmp_key => $tmp_value) {
        if(@unlink($tmp_value['picture'])) {
            DB::delete('aljol_picture',array('pid'=>$tmp_value['pid']));
        }
    }
}
?>
