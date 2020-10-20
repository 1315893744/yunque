<?php
if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

$todaystar = C::t("#k_misign#plugin_k_misign")->gettodaystar($tdtime);
$todaystarinfo = getuserbyuid($todaystar['uid']);
$todaystar = array_merge($todaystar, $todaystarinfo);

$todaystar['levelarray'] = get_level($todaystar['days']);
$qiandaodb['levelarray'] = get_level($qiandaodb['days']);

$todaystar['level'] = $todaystar['levelarray']['level'];
$qiandaodb['level'] = $qiandaodb['levelarray']['levelnum'];

$numtostr = array(
	0 => 'zero',
	1 => 'one',
	2 => 'two',
	3 => 'three',
	4 => 'four',
	5 => 'five',
	6 => 'six',
	7 => 'seven',
	8 => 'eight',
	9 => 'nine',
);

if($misign['prizestatus']){
	$prizememberlists = C::t("#k_misign#plugin_k_misign_prize_log")->fetch_all(0, 12);
	foreach($prizememberlists as $value){
		$value['avatar'] = avatar($value['uid'], 'small', 1);
		$prizememberlist[] = $value;
	}
}

$rewardmemberlists = C::t("#k_misign#plugin_k_misign")->getsignlist('q.time', 'DESC', 0, 100);
$pushmemberlist = C::t("#k_misign#plugin_k_misign_push")->fetch_all_cp(0, 6);
foreach($pushmemberlist as $push){
		if($push['pic']) {
			$valueparse = parse_url($push['pic']);
			if(isset($valueparse['host'])) {
				$push['pic'] = $push['pic'];
			} else {
				$push['pic'] = $_G['setting']['attachurl'].$push['pic'].'?'.random(6);
			}
		}
		$pushmemberlists[] = $push;
}

if($extend['k_migeyan']){//小米每日格言点赞插件
	$k_migeyan['cache_file'] = DISCUZ_ROOT.'./data/sysdata/cache_k_migeyan.php';
	if(@filemtime($k_migeyan['cache_file']) > $tdtime){
		@include $k_migeyan['cache_file'];
		if($geyanCache['gid'] > 0){
			$k_migeyan['geyan'] = $geyanCache;
		}else{
			$k_migeyan['geyan'] = C::t("#k_migeyan#k_migeyan")->fetch_by_rand(0);
			if(!$k_migeyan['geyan']){
				$k_migeyan['geyan']['subject'] = lang('plugin/k_migeyan', 'houtaiadd');
				$k_migeyan['geyan']['zannum'] = 0;
				$k_migeyan['geyan']['day']='1970-1-1';
				$k_migeyan['geyan']['gid']='0';
				k_migeyan_writegeyan($k_migeyan['geyan']);
			}
		}
	}
	function k_migeyan_writegeyan($geyan){
		$geyanCache['gid'] = $geyan['gid'];
		$geyanCache['day'] = date("Y-m-d");
		$geyanCache['subject'] = addslashes($geyan['subject']);
		$geyanCache['zannum'] = $geyan['zannum'];
		require_once libfile('function/cache');
		writetocache('k_migeyan', "\$geyanCache=".arrayeval($geyanCache).";\n"); 
	}
}

if($_G['uid'] && $extend['magic']['bq'] && $extend['magicdetail']['bq']['available']){
	$bqstarttime = $tdtime - 86400*30;
	$bq = C::t("#k_misign#plugin_k_misign_bq")->fetch_by_time($_G['uid'], $bqstarttime);
	$tobqday = intval(($bq['thistime'] - $bq['lasttime']) / 86400);
	$bqeddays = $bq['bqdays'] + $tobqday + $qiandaodb['lasted'];
	$bqshowtip = str_replace(array('{starttime}', '{endtime}', '{tobqdays}', '{lasted}'), array(dgmdate($bq['lasttime'], 'm-d'),dgmdate($bq['thistime'], 'm-d'), $tobqday, $bqeddays), $misign['bq_tips']);
	$bqshowtip = $bqshowtip ? $bqshowtip : lang('plugin/k_misign','magic_bq_tips', array('starttime' => dgmdate($bq['lasttime'], 'm-d'), 'endtime' => dgmdate($bq['thistime'], 'm-d'), 'tobqdays' => $tobqday, 'lasted' => $bqeddays));
}
$navigation = $misign['title'];
$navtitle = "$navigation";

if(defined('IN_MOBILE')){
	include template('diy:k_misign_index', '', 'source/plugin/k_misign/template/'.($misign['styles']['mobile'] ? $misign['styles']['mobile'] : 'mobile_default'));
}else{
	include template('diy:k_misign_index', '', 'source/plugin/k_misign/template/'.($misign['styles']['pc'] ? $misign['styles']['pc'] : 'default'));
}
?>