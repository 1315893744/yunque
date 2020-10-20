<?php

class magic_k_misign_bq {

	var $version = '1.0';//脚本版本号
	var $name = 'magic_bq';//道具名称 (可填写语言包项目)
	var $description = 'magic_bq_dec';//道具说明 (可填写语言包项目)
	var $price = '10';//道具默认价格
	var $weight = '10';//道具默认重量
	var $copyright = 'www.kuozhan.net';//版权 (可填写语言包项目)

	function getsetting($parameters) {//返回设置项目
		$settings = array(
		/*
			'text' => array(
				'title' => 'text_title',//设置项目名称 (可填写语言项目)
				'type' => 'mradio',//项目类型
				'value' => array(),//项目选项
				'default' => 0,//项目默认值
			)
			*/
		);
		return $settings;
	}

	function setsetting(&$advnew, &$parameters) {//保存设置项目
	}

	function usesubmit() {//道具使用
		global $_G;
		$tdtime = gmmktime(0,0,0,dgmdate($_G['timestamp'], 'n',$var['tos']),dgmdate($_G['timestamp'], 'j',$var['tos']),dgmdate($_G['timestamp'], 'Y',$var['tos'])) - $var['tos']*3600;
		$qiandaodb = C::t("#k_misign#plugin_k_misign")->fetch($_G['uid']);
		$bid = intval($_GET['bid']);
		$bq = C::t("#k_misign#plugin_k_misign_bq")->fetch_by_bid($bid);
		if(!$bq){
			showmessage(lang('plugin/k_misign', 'magic_bq_notexit'));
		}
		$tobqday = intval(($bq['thistime'] - $bq['lasttime']) / 86400);	
		
		if($tobqday){
			if($tobqday == 1){
				C::t("#k_misign#plugin_k_misign_bq")->delete($bid);
				if(dgmdate(($bq['thistime']-86400), 'm') == dgmdate(TIMESTAMP, 'm')){
					$mdays = $qiandaodb['mdays']+1;
				}else{
					$mdays = $qiandaodb['mdays'];
				}
				C::t("#k_misign#plugin_k_misign")->update($_G['uid'], array('lasted' => $bq['bqdays'] + $tobqday + $qiandaodb['lasted'], 'days' => $qiandaodb['days']+1, 'mdays' => $mdays));
			}else{
				C::t("#k_misign#plugin_k_misign_bq")->update($bid, array('thistime' => $bq['thistime']-86400));
				if(dgmdate(($bq['thistime']-86400), 'm') == dgmdate(TIMESTAMP, 'm')){
					$mdays = $qiandaodb['mdays']+1;
				}else{
					$mdays = $qiandaodb['mdays'];
				}
				C::t("#k_misign#plugin_k_misign")->update($_G['uid'], array('lasted' => $qiandaodb['lasted']+1, 'days' => $qiandaodb['days']+1, 'mdays' => $mdays));
			}
		}else{
			showmessage(lang('plugin/k_misign', 'magic_bq_neednotbq'));
		}
		usemagic($this->magic['magicid'], $this->magic['num']);
		showmessage(lang('plugin/k_misign', 'success'), dreferer(), array(), array('alert' => 'right', 'showdialog' => 1, 'locationtime' => true));
	}

	function show() {//道具显示
		global $_G;
		$misign = $_G['cache']['plugin']['k_misign'];
		$tdtime = gmmktime(0,0,0,dgmdate($_G['timestamp'], 'n',$misign['tos']),dgmdate($_G['timestamp'], 'j',$misign['tos']),dgmdate($_G['timestamp'], 'Y',$misign['tos'])) - $misign['tos']*3600;
		$qiandaodb = C::t("#k_misign#plugin_k_misign")->fetch($_G['uid']);
		$bqstarttime = $tdtime - 86400*30;
		$bq = C::t("#k_misign#plugin_k_misign_bq")->fetch_by_time($_G['uid'], $bqstarttime);
		$tobqday = intval(($bq['thistime'] - $bq['lasttime']) / 86400);
		$bqeddays = $bq['bqdays'] + $tobqday + $qiandaodb['lasted'];
		$bqshowtip = str_replace(array('{starttime}', '{endtime}', '{tobqdays}', '{lasted}'), array(dgmdate($bq['lasttime'], 'm-d'),dgmdate($bq['thistime'], 'm-d'), $tobqday, $bqeddays), $misign['bq_tips']);
		$bqshowtip = $bqshowtip ? $bqshowtip : lang('plugin/k_misign','magic_bq_tips', array('starttime' => dgmdate($bq['lasttime'], 'm-d'), 'endtime' => dgmdate($bq['thistime'], 'm-d'), 'tobqdays' => $tobqday, 'lasted' => $bqeddays));
		
		magicshowtype('top');
		magicshowtips(lang('plugin/k_misign', 'magic_bq_dec'));
		if($tobqday){
			magicshowtips('<br />'.$bqshowtip);
		}else{
			magicshowtips(lang('plugin/k_misign', 'magic_bq_neednotbq'));
		}
		magicshowsetting('', 'bid', intval($_GET['bid']), 'hidden');
		magicshowtype('bottom');
	}

}

?>