<?php
if(!defined('IN_DISCUZ') || !defined('IN_ADMINCP')) {
	exit('Access Denied');
}
$op = in_array($_GET['op'], array('install', 'uninstall')) ? $_GET['op'] : '';
require_once DISCUZ_ROOT.'./source/plugin/k_misign/language/extend_dataimport.'.currentlang().'.php';

if(is_file(DISCUZ_ROOT.'./data/k_misign_import.lock')){
	cpmsg($extendlang['imported'], '', 'error');
}
if(!$op){
	if(!submitcheck('dataimportsubmit')) {
		showtips($extendlang['tips']);
		showtableheader(lang('plugin/k_misign', 'extend_dataimport'));
		showformheader("plugins&operation=config&identifier=k_misign&pmod=cp_extend&act=dataimport", "");
		echo '<tr><td colspan="2" class="td27" s="1">'.$extendlang['selectver'].':</td></tr>
		<tr class="noborder""><td class="vtop rowform"><ul class="nofloat" onmouseover="altStyle(this);">';
		$plists = C::t("common_plugin")->fetch_all_identifier(array('dsu_paulsign', 'fx_checkin', 'singcere_sign', 'dsu_amupper', 'qidou_assign', 'ljdaka', 'xigua_sign', 'gsignin'));
		foreach($plists as $plist){
			echo '<li><input class="radio" type="radio" name="imchoice" value="'.$plist['identifier'].'">&nbsp;'.$plist['name'].'</li>';
		}
		echo '</ul></td><td class="vtop tips2" s="1"></td></tr>';
		showsubmit('dataimportsubmit', 'submit');
		showformfooter();
		showtablefooter();
	} elseif(submitcheck('dataimportsubmit') && $_GET['imchoice']) {
		if($_GET['imchoice'] == 'dsu_paulsign'){//DSU每日签到
			DB::query("TRUNCATE TABLE ".DB::table("plugin_k_misign"));
			DB::query("INSERT INTO ".DB::table("plugin_k_misign")." (uid, time, days, lasted, mdays, reward, lastreward) SELECT uid, time, days, lasted, mdays, reward, lastreward FROM ".DB::table("dsu_paulsign"));
		}elseif($_GET['imchoice'] == 'fx_checkin'){//飞雪签到
			DB::query("TRUNCATE TABLE ".DB::table("plugin_k_misign"));
			DB::query("INSERT INTO ".DB::table("plugin_k_misign")." (uid, time, days, lasted) SELECT uid, time, days, constant FROM ".DB::table("fx_checkin"));
		}elseif($_GET['imchoice'] == 'singcere_sign'){//S！签到
			DB::query("TRUNCATE TABLE ".DB::table("plugin_k_misign"));
			DB::query("INSERT INTO ".DB::table("plugin_k_misign")." (uid, time, days, lasted, mdays, reward, lastreward) SELECT uid, lastsign, signs, continuous, msigns, rewards, lastreward FROM ".DB::table("singcere_sign_count"));
		}elseif($_GET['imchoice'] == 'dsu_amupper'){//DSU打卡机
			DB::query("TRUNCATE TABLE ".DB::table("plugin_k_misign"));
			DB::query("INSERT INTO ".DB::table("plugin_k_misign")." (uid, time, days, lasted) SELECT uid, lasttime, addup, cons FROM ".DB::table("plugin_dsuamupper"));
		}elseif($_GET['imchoice'] == 'qidou_assign'){//七豆签到
			DB::query("TRUNCATE TABLE ".DB::table("plugin_k_misign"));
			DB::query("INSERT INTO ".DB::table("plugin_k_misign")." (uid, time, days, lasted, reward) SELECT uid, signtime, totaltian, liantian, totalmoney FROM ".DB::table("qidou_assign_item"));
		}elseif($_GET['imchoice'] == 'ljdaka'){//亮剑打卡签到
			DB::query("TRUNCATE TABLE ".DB::table("plugin_k_misign"));
			DB::query("INSERT INTO ".DB::table("plugin_k_misign")." (uid, time, days, lasted, reward) SELECT uid, timestamp, allday, day, money FROM ".DB::table("plugin_daka_user"));
		}elseif($_GET['imchoice'] == 'xigua_sign'){//西瓜微社区签到
			DB::query("TRUNCATE TABLE ".DB::table("plugin_k_misign"));
			DB::query("INSERT INTO ".DB::table("plugin_k_misign")." (uid, time, days, mdays, lasted, reward) SELECT uid, ts, days, mdays, lasted, last_exp FROM ".DB::table("xigua_sign"));
		}elseif($_GET['imchoice'] == 'gsignin'){//GA签到中心
			DB::query("TRUNCATE TABLE ".DB::table("plugin_k_misign"));
			DB::query("INSERT INTO ".DB::table("plugin_k_misign")." (uid, time, days, lasted) SELECT uid, lasttime, total, continuous FROM ".DB::table("gsignin_member"));
		}
		file_put_contents(DISCUZ_ROOT.'./data/k_misign_import.lock', '1');
		cpmsg('update_success', '', 'succeed');
	}else{
		cpmsg($extendlang['selectver'], '', 'error');
	}
}elseif($op == 'install'){
	
}elseif($op == 'uninstall'){
	@unlink(DISCUZ_ROOT.'./source/plugin/k_misign/language/extend_dataimport.'.currentlang().'.php');
	@unlink(DISCUZ_ROOT.'./source/plugin/k_misign/extend/extend_dataimport.php');
	cpmsg('update_success', "action=plugins&operation=config&do=".$do."&identifier=k_misign&pmod=cp_extend", 'succeed');
}
?>