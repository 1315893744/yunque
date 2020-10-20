<?php


 
class table_comiis extends discuz_table {
	public function fetch_image_by_fid($fid,$tid,$image_number, $endcondition, $limit) {
		if($endcondition == 'lastpost'){
			$add="and t.replies>'0' ";
		}else{
			$add="";		
		}
		return DB::fetch_all("select t.tid, t.subject, a.aid, COUNT(a.aid) as aids from %t t LEFT JOIN %t a USING (tid) WHERE t.fid='%d' {$add}and t.tid!='%d' and t.displayorder>='0' GROUP BY a.tid having(aids>='%d') ORDER BY %i desc".DB::limit($limit), array('forum_thread', 'forum_attachment', $fid, $tid, $image_number, $endcondition));
	}
	public function image_number_tid_uid($tid, $uid) {
		return DB::result_first("SELECT COUNT(*) FROM ".DB::table(getattachtablebytid($tid))." WHERE tid='%d' AND uid='%d' AND isimage IN ('1','-1')", array($tid, $uid));
	}
	public function fetch_all_image_by_tid_uid($tid, $uid) {
		return DB::fetch_all("SELECT * FROM ".DB::table(getattachtablebytid($tid))." WHERE tid='%d' AND uid='%d' AND isimage IN ('1','-1') ORDER BY pid,dateline", array($tid, $uid));
	}
	public function fetch_by_tid($tid) {
		return DB::fetch_first("SELECT * FROM %t WHERE tid='%d' and displayorder>='0'", array('forum_thread', $tid));
	}
	public function fetch_all_by_tid($tid, $pid, $limit) {
		$value = $return = $query = array();
		$pids = implode(",",$pid);
		$query = DB::query("SELECT * FROM %t WHERE tid='%d' and (pid not in (%i) || first=1) and invisible='0' ORDER BY first DESC,dateline DESC".DB::limit($limit), array('forum_post', $tid, $pids));
		while($value = DB::fetch($query)) {
			$value['dateline'] = dgmdate($value['dateline'], 'u', '9999', getglobal('setting/dateformat').' H:i:s');
			if($value['first'] == 1){
				$value['message'] = new_ubb($value['message'], 1);
				$return['thread'] = $value;
			}else{
				$value['message'] = new_ubb($value['message'], 2);
				$return['post'][] = $value;
			}
		}
		return $return;
	}
	public function update_views_tid($tid) {
		DB::query("UPDATE LOW_PRIORITY ".DB::table("forum_thread")." SET views=views+1 WHERE tid='$tid'", 'UNBUFFERED');
	}
	public function fetch_aid_message_by_tid($tid, $uid, $attachment) {
		$pid_message = $aid = $temp = $value = $return = $query = $message_array = array();
		$query = DB::query("SELECT * FROM %t WHERE tid='%d' and authorid='%d' and invisible='0' ORDER BY dateline DESC", array('forum_post', $tid, $uid));
		while($value = DB::fetch($query)) {
			$pid_message[$value['pid']] = new_ubb($value['message']);
			if(stripos("comiis".$value["message"],"[attach]") || stripos("comiis".$value["message"],"[attachimg]")){
				$return['pid'][] = $value["pid"];
				$value['message'] = str_replace("[attach]", "<comiis>[attach]", $value['message'])."<comiis>";
				if(preg_match_all("/\[attach\](.*?)\[\/attach\](.*?)\<comiis\>/is", $value['message'], $message_array, PREG_SET_ORDER)){
					if(is_array($message_array)){
						foreach($message_array as $temp) {
							$return['message'][$temp[1]] = new_ubb($temp[2]);
						}
					}
				}
				$message_array = array();
				$value['message'] = str_replace("[attachimg]", "<comiisimg>[attachimg]", $value['message'])."<comiisimg>";
				if(preg_match_all("/\[attachimg\](.*?)\[\/attachimg\](.*?)\<comiisimg\>/is", $value['message'], $message_array, PREG_SET_ORDER)){
					if(is_array($message_array)){
						foreach($message_array as $temp) {
							$return['message'][$temp[1]] = new_ubb($temp[2]);
						}
					}
				}
			}
		}
		foreach($attachment as $temp) {
			if(!$return['message'][$temp['aid']]){
				$return['message'][$temp['aid']] = $pid_message[$temp['pid']];
				$return['pid'][] = $temp['pid'];
			}
		}
		if(!isset($return['pid'])){
			$return['pid'][] = 0;
		}
		return $return;
	}
}
?>