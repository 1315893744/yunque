<?php
if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

class k_misign_wsq_api {

	function forumdisplay_mobilesign() {
		global $_G;
		$setting = $misign = $_G['cache']['plugin']['k_misign'];
		$setting['groups'] = $misign['groups'] = unserialize($misign['groups']);
		$setting['ban'] = $misign['ban'] = explode(",",$misign['ban']);
		$setting['width'] = $misign['width'] = $misign['width'] ? $misign['width'] : 220;
		$setting['bcolor'] = $misign['bcolor'] = $misign['bcolor'] ? $misign['bcolor'] : '#ff6f3d';
		$setting['hcolor'] = $misign['hcolor'] = $misign['hcolor'] ? $misign['hcolor'] : '#ff7d49';
		
		$stats = C::t("#k_misign#plugin_k_misignset")->fetch(1);
		$qiandaodb = C::t('#k_misign#plugin_k_misign')->fetch_by_uid($_G['uid']);
		$tdtime = gmmktime(0,0,0,dgmdate($_G['timestamp'], 'n',$misign['tos']),dgmdate($_G['timestamp'], 'j',$misign['tos']),dgmdate($_G['timestamp'], 'Y',$misign['tos'])) - $misign['tos']*3600;
		$allowmem = memory('check');
		
		if((!in_array($_G['uid'], $misign['ban']) && in_array($_G['groupid'], $misign['groups'])) || !$_G['uid']) {
			if($allowmem && $misign['mcacheopen']){
				$signtime = memory('get', 'k_misign_'.$_G['uid']);
			}
			$return = array();
			require_once DISCUZ_ROOT.'./source/plugin/wechat/wechat.lib.class.php';
			if(!$signtime){
				$htime = dgmdate($_G['timestamp'], 'H',$misign['tos']);
				if($qiandaodb){
					if($allowmem && $misign['mcacheopen']){
						memory('set', 'k_misign_'.$_G['uid'], $qiandaodb['time'], 86400);
					}
					if($qiandaodb['time'] < $tdtime){
						$return = array(
							'text' => lang('plugin/k_misign', 'djqd'),
							'link' => WeChatHook::getPluginUrl('k_misign:sign', array('operation' => 'qiandao', 'wsq' => 1, 'formhash' => $_G['formhash']))
						);
					}else{
						$return = array(
							'text' => lang('plugin/k_misign', 'tdyq'),
							'link' => WeChatHook::getPluginUrl('k_misign:sign', array('wsq' => 1)),
						);
					}
				}else{
					$return = array(
						'text' => lang('plugin/k_misign', 'djqd'),
						'link' => $_G['uid'] ? WeChatHook::getPluginUrl('k_misign:sign', array('operation' => 'qiandao', 'wsq' => 1, 'formhash' => $_G['formhash'])) : WeChatHook::getPluginUrl('k_misign:sign', array('wsq' => 1)),
					);
				}
			}else{
				if($signtime < $tdtime){
					$return = array(
						'text' => lang('plugin/k_misign', 'djqd'),
						'link' => WeChatHook::getPluginUrl('k_misign:sign', array('operation' => 'qiandao', 'wsq' => 1, 'formhash' => $_G['formhash'])),
					);
				}else{
					$return = array(
						'text' => lang('plugin/k_misign', 'tdyq'),
						'link' => WeChatHook::getPluginUrl('k_misign:sign', array('wsq' => 1)),
					);
				}
			}
		}
		return $return;
	}

	function forumdisplay_topBar() {
		global $_G;
		require_once DISCUZ_ROOT.'./source/plugin/wechat/wechat.lib.class.php';
		
		$setting = $misign = $_G['cache']['plugin']['k_misign'];
		$setting['groups'] = $misign['groups'] = unserialize($misign['groups']);
		$setting['ban'] = $misign['ban'] = explode(",",$misign['ban']);
		$setting['width'] = $misign['width'] = $misign['width'] ? $misign['width'] : 220;
		$setting['bcolor'] = $misign['bcolor'] = $misign['bcolor'] ? $misign['bcolor'] : '#ff6f3d';
		$setting['hcolor'] = $misign['hcolor'] = $misign['hcolor'] ? $misign['hcolor'] : '#ff7d49';
		
		$stats = C::t("#k_misign#plugin_k_misignset")->fetch(1);
		$qiandaodb = C::t('#k_misign#plugin_k_misign')->fetch_by_uid($_G['uid']);
		$tdtime = gmmktime(0,0,0,dgmdate($_G['timestamp'], 'n',$misign['tos']),dgmdate($_G['timestamp'], 'j',$misign['tos']),dgmdate($_G['timestamp'], 'Y',$misign['tos'])) - $misign['tos']*3600;
		$allowmem = memory('check');
		
		if((!in_array($_G['uid'], $misign['ban']) && in_array($_G['groupid'], $misign['groups'])) || !$_G['uid']) {
			if($allowmem && $misign['mcacheopen']){
				$signtime = memory('get', 'k_misign_'.$_G['uid']);
			}
			if(!$signtime){
				$htime = dgmdate($_G['timestamp'], 'H',$misign['tos']);
				if($qiandaodb){
					if($allowmem && $misign['mcacheopen']){
						memory('set', 'k_misign_'.$_G['uid'], $qiandaodb['time'], 86400);
					}
					/*
					if($qiandaodb['time'] < $tdtime){
						include template("k_misign:hook_indexside");
						return $return;
					}else{
						include template("k_misign:hook_indexside");
						return $return;
					}
					*/
				}else{
					/*
					include template("k_misign:hook_indexside");
					return $return;
					*/
				}
			}else{
				/*
				if($signtime < $tdtime){
					include template("k_misign:hook_indexside");
					return $return;
				}else{
					include template("k_misign:hook_indexside");
					return $return;
				}
				*/
			}
		}
		
		$return = array();
		$return[] = array(
		    'name' => lang('plugin/k_misign', 'djqd'),
		    'html' => '
<style type="text/css">
#topcontainer .midaben_con {
	font-family:arial,"Hiragino Sans GB","Microsoft Yahei",sans-serif;
	background-color:#fff;
	min-width:205px;
	height:50px;
	border-radius:5px;
	position:relative
}
#topcontainer .midaben_con .midaben_signpanel {
	background-color:'.$misign['bcolor'].';
	height:50px;
	display:block;
	position:relative;
	border-radius:4px;
	background-image:url('.$_G['siteurl'].'source/plugin/k_misign/static/default/tou.png);
	background-repeat:no-repeat;
	background-position:14px 8px;
	cursor:pointer
}
#topcontainer .midaben_con .midaben_signpanel .font {
	position:absolute;
	color:#fff;
	width:55px;
	height:30px;
	font-size:24px;
	line-height:30px;
	top:11px;
	left:50px
}
#topcontainer .midaben_con .midaben_signpanel .nums {
	display:none;
}
#topcontainer .midaben_con .midaben_signpanel .fblock {
	height:46px;
	width:45%;
	background-color:#fff;
	padding-left:5px;
	padding-right:5px;
	position:absolute;
	top:2px;
	right:2px;
	font-size:14px;
	color:#606060
}
#topcontainer .midaben_con .midaben_signpanel .fblock .all {
	height:23px;
	line-height:26px;
	padding-left:30px;
	border-bottom:1px solid #eee;
	background-image:url('.$_G['siteurl'].'source/plugin/k_misign/static/default/tou2.jpg);
	background-repeat:no-repeat;
	background-position:5px 0;
	margin-bottom:0;
	color:#606060
}
#topcontainer .midaben_con .midaben_signpanel .fblock .line {
	height:22px;
	line-height:24px;
	padding-left:30px;
	background-image:url('.$_G['siteurl'].'source/plugin/k_misign/static/default/tou2.jpg);
	background-repeat:no-repeat;
	background-position:5px -25px;
	color:#606060
}
#topcontainer .midaben_con a.midaben_signpanel:hover {
	background-color:'.$misign['hcolor'].';
}
#topcontainer .midaben_con a.midaben_signpanel:active {
	background-color:'.$misign['hcolor'].';
}
#topcontainer .midaben_con .default {
	cursor:default;
	background-color:'.$misign['bcolor'].';
}
#topcontainer .midaben_con a.default:hover {
	background-color:'.$misign['hcolor'].';
}
#topcontainer .midaben_con a.default:active {
	background-color:'.$misign['hcolor'].';
}
#topcontainer .midaben_con .visted {
	background-position:7px 8px
}
#topcontainer .midaben_con .visted .font {
	font-size:20px;
	line-height:25px;
	width:60px;
	left:40px;
	top:8px;
	text-shadow:0 1px 0 '.$misign['hcolor'].';
}
#topcontainer .midaben_con .visted .nums {
	display:block;
	font-size:12px;
	width:56px;
	text-align:center;
	line-height:20px;
	position:absolute;
	color:#fff;
	top:29px;
	left:43px
}
#topcontainer .midaben_con .midaben_win {
	width:205px;
	height:115px;
	background-color:#fff;
	border:1px solid #dedfe3;
	border-radius:5px;
	position:absolute;
	top:-135px;
	left:10px;
	box-shadow:0 5px 0 #dedfe3;
	padding-left:5px;
	padding-right:5px
}
#topcontainer .midaben_con .midaben_win .angleA {
	width:0;
	_border:0;
	position:absolute;
	bottom:-30px;
	left:70px;
	border-color:#dedfe3 transparent transparent;
	border-style:solid;
	border-width:15px
}
#topcontainer .midaben_con .midaben_win .angleB {
	width:0;
	_border:0;
	position:absolute;
	bottom:-20px;
	left:75px;
	border-color:#fff transparent transparent;
	border-style:solid;
	border-width:10px
}
#topcontainer .midaben_con .midaben_win .title {
	padding-left:58px;
	height:55px;
	padding-top:22px;
	background-repeat:no-repeat;
	background-image:url('.$_G['siteurl'].'source/plugin/k_misign/static/default/tou3.jpg);
	background-position:0 5px;
	border-bottom:1px solid #eee
}
#topcontainer .midaben_con .midaben_win .title h3 {
	font-size:18px;
	color:#434a54;
	line-height:25px;
	font-weight:400;
	margin:0;
	padding:0
}
#topcontainer .midaben_con .midaben_win .title .con {
	font-size:12px;
	color:#434a54;
	line-height:20px;
	font-weight:normal;
	width:150px;
	margin:0;
	padding:0
}
#topcontainer .midaben_con .midaben_win .info {
	height:35px;
	line-height:35px;
	color:#aab2bd;
	font-size:14px;
	text-align:center;
	padding-left:10px
}
#topcontainer .midaben_con a.midaben_signpanel:visited,#topcontainer .midaben_con a.visted:visited,#topcontainer .midaben_con a.visted:hover,#topcontainer .midaben_con a.visted:active {
	background-color:'.$misign['bcolor'].'
}

</style>
<div id="midaben_sign">
    <div class="midaben_con mbm">
        <a class="midaben_signpanel JD_sign '.($qiandaodb['time'] >= $tdtime ? 'visted' : '').'" id="JD_sign" '.($qiandaodb['time'] >= $tdtime || !$_G['uid'] ? 'href="'.WeChatHook::getPluginUrl('k_misign:sign', array('wsq' => 1)).'"' : ' href="'.WeChatHook::getPluginUrl('k_misign:sign', array('operation' => 'qiandao', 'wsq' => 1, 'formhash' => $_G['formhash'])).'"').'>
            <div class="font">
                '.($qiandaodb['time'] >= $tdtime ? lang('plugin/k_misign', 'signed') : lang('plugin/k_misign', 'sign')).'
            </div>
            <span class="nums">
                '.lang('plugin/k_misign', 'row').$qiandaodb['lasted'].lang('plugin/k_misign', 'days').'
            </span>
            <div class="fblock">
                <div class="all">
                    '.$stats['todayq'].lang('plugin/k_misign', 'people').'
                </div>
                <div class="line">
					'.($qiandaodb['time'] >= $tdtime ? $qiandaodb['row'] : '<span style="font-size:12px;">'.lang('plugin/k_misign', 'signtoranklist').'</span>').'
                </div>
            </div>
        </a>
        <div id="JD_win" class="midaben_win JD_win" style="display:none;">
            <div class="title">
                <h3>'.lang('plugin/k_misign', 'signsuccess').'</h3>
                <p class="con">
                </p>
            </div>
            <div class="info">
            </div>
            <div class="angleA">
            </div>
            <div class="angleB">
            </div>
        </div>
    </div>
</div>
			',
			'more' => $_G['uid'] ? WeChatHook::getPluginUrl('k_misign:sign', array('operation' => 'qiandao', 'wsq' => 1, 'formhash' => $_G['formhash'])) : WeChatHook::getPluginUrl('k_misign:sign', array('wsq' => 1)),
		);
		return $return;

	}


	function forumdisplay_headerBar() {
		global $_G, $hook, $extend, $levelquery, $setting, $misign, $wsq;
		$wsq = true;
		require_once DISCUZ_ROOT.'./source/plugin/wechat/wechat.lib.class.php';
		
		$setting = $misign = $_G['cache']['plugin']['k_misign'];
		$setting['groups'] = $misign['groups'] = unserialize($misign['groups']);
		$setting['ban'] = $misign['ban'] = explode(",",$misign['ban']);
		$setting['width'] = $misign['width'] = $misign['width'] ? $misign['width'] : 220;
		$setting['bcolor'] = $misign['bcolor'] = $misign['bcolor'] ? $misign['bcolor'] : '#ff6f3d';
		$setting['hcolor'] = $misign['hcolor'] = $misign['hcolor'] ? $misign['hcolor'] : '#ff7d49';
		
		$stats = C::t("#k_misign#plugin_k_misignset")->fetch(1);
		$qiandaodb = C::t('#k_misign#plugin_k_misign')->fetch_by_uid($_G['uid']);
		$tdtime = gmmktime(0,0,0,dgmdate($_G['timestamp'], 'n',$misign['tos']),dgmdate($_G['timestamp'], 'j',$misign['tos']),dgmdate($_G['timestamp'], 'Y',$misign['tos'])) - $misign['tos']*3600;
		
		$signurl =  WeChatHook::getPluginUrl('k_misign:sign', array('operation' => 'qiandao', 'wsq' => 1, 'formhash' => $_G['formhash']));
		$signedurl = WeChatHook::getPluginUrl('k_misign:sign', array('wsq' => 1));
		
		
		if(!$_G['uid'])return null;
		
		require_once libfile('function/core', 'plugin/k_misign');
		$setting['extendb']['mobile_default'] = $misign['extendb']['mobile_default'] = $misign['extendb']['mobile_default'] ? $misign['extendb']['mobile_default'] : 'mobile_default';
		$return = include_once libfile('button/'.$misign['extendb']['mobile_default'], 'plugin/k_misign');
		return $return;

	}

}

?>
