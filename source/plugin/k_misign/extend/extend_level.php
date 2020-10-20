<?php
if(!defined('IN_DISCUZ') || !defined('IN_ADMINCP')) {
	exit('Access Denied');
}
$misign['extends'] = unserialize($misign['extendp']);
$op = in_array($_GET['op'], array('install', 'uninstall', 'check', 'import', 'edit')) ? $_GET['op'] : '';
require_once DISCUZ_ROOT.'./source/plugin/k_misign/language/extend_level.'.currentlang().'.php';

if(!$op){
	if(!submitcheck('rulesubmit')) {
?>
<script type="text/JavaScript">
var statusshow = '<?php echo $extendlang['status_1'];?>';
var rowtypedata = [
	[
		[1, '', 'td25'],
		[1, '<input type="text" class="txt" name="newleveldays[]">', 'td30'],
		[1, '<input type="text" class="txt" name="newlevelnum[]">', 'td30'],
		[1, '<input type="text" class="txt" name="newlevelname[]">', 'td30'],
		[1, '<label><input class="checkbox" type="checkbox" name="newstatus[]" value="1" checked="checked">'+statusshow+'</label>', 'td28'],
	],
];
</script>
<?php
		$install = DB::fetch_first("show tables like '".DB::table("plugin_k_misign_level")."';");
		if(!$install){
			cpmsg(lang('plugin/k_misign', 'extend_install'), "action=plugins&operation=config&do=".$do."&identifier=k_misign&pmod=cp_extend&act=level&op=install", 'loading');
		}
		
		$perpage = 30;
		$page = intval($_GET['page']);
		$start = ($page-1) * $perpage;
		if(empty($page)){
			$page = 1;
		}
		if($start < 0){
			$start = 0;
		}
		$multi = '';
		$list = C::t("#k_misign#plugin_k_misign_level")->fetch_all_cp($start, $perpage);
		foreach($list as $lists){
			$showlist .= showtablerow('', array('class="td30"', 'class="td30"','class="td30"', 'class="td30"', 'class="td28"'), array(
				'<input class="checkbox" type="checkbox" name="delete['.$lists['lid'].']" value="'.$lists['lid'].'">',
				'<input class="text" type="text" name="leveldaysnew['.$lists['lid'].']" value="'.$lists['leveldays'].'">',
				'<input class="text" type="text" name="levelnumnew['.$lists['lid'].']" value="'.$lists['levelnum'].'">',
				'<input class="text" type="text" name="levelnamenew['.$lists['lid'].']" value="'.$lists['levelname'].'">',
				'<label><input class="checkbox" type="checkbox" name="statusnew['.$lists['lid'].']" value="1" '.($lists['status'] ? 'checked="checked" ' : '').'>'.$extendlang['status_1'].'</label>',
			), TRUE);
		}
		$count =  0;
		$count = C::t("#k_misign#plugin_k_misign_level")->count();
		$multi = multi($count, $perpage, $page, '?action=plugins&operation=config&do='.$pluginid.'&identifier=k_misign&pmod=cp_extend&act=level');
		
		showtips($extendlang['tips']);
		showformheader('plugins&operation=config&do='.$pluginid.'&identifier=k_misign&pmod=cp_extend&act=level');
		showtableheader(lang('plugin/k_misign', 'extend_level').'  <a id="check" onclick="ajaxget(this.href, this.id, this.id, \''.$extendlang['plzwait'].'\');return false" href="'.ADMINSCRIPT.'?action=plugins&operation=config&do='.$pluginid.'&identifier=k_misign&pmod=cp_extend&act=level&op=check">'.($misign['extends']['level'] ? $extendlang['extendstatus_2'] : $extendlang['extendstatus_1']).'</a>', 'fixpadding', '');
		showsubtitle(array('', $extendlang['leveldays'], $extendlang['levelnum'], $extendlang['levelname'], $extendlang['status']));
		echo $showlist;
		echo '<tr><td>&nbsp;</td><td colspan="6"><div><a href="javascript:;" onclick="addrow(this, 0)" class="addtr">'.$extendlang['add'].'</a></div></td></tr>';
		showsubmit('rulesubmit', 'submit', 'del', '<a href="'.ADMINSCRIPT.'?action=plugins&operation=config&do='.$pluginid.'&identifier=k_misign&pmod=cp_extend&act=level&op=import">'.$extendlang['import'].'</a>', $multi);
		showtablefooter();
		showformfooter();
	}else{
		if(is_array($_GET['delete'])) {
			foreach($_GET['delete'] as $id) {
				C::t("#k_misign#plugin_k_misign_level")->delete($id);
			}
		}
		if(is_array($_GET['leveldaysnew'])) {
			foreach($_GET['leveldaysnew'] as $id => $value) {
				$data = array('leveldays' => intval($value), 'levelnum' => intval($_GET['levelnumnew'][$id]), 'levelname' => addslashes($_GET['levelnamenew'][$id]), 'status' => intval($_GET['statusnew'][$id]));
				C::t("#k_misign#plugin_k_misign_level")->update(intval($id),$data);
			}
		}
		if(is_array($_GET['newleveldays'])) {
			foreach($_GET['newleveldays'] as $id => $value) {
				$data = array('leveldays' => intval($value), 'levelnum' => intval($_GET['newlevelnum'][$id]), 'levelname' => addslashes($_GET['newlevelname'][$id]), 'status' => intval($_GET['newstatus'][$id]));
				C::t("#k_misign#plugin_k_misign_level")->insert($data);
			}
		}
		cpmsg('update_success', "action=plugins&operation=config&do=".$do."&identifier=k_misign&pmod=cp_extend&act=level", 'succeed');
	}
}elseif($op == 'install'){
	$sql = <<<EOF
CREATE TABLE IF NOT EXISTS `pre_plugin_k_misign_level` (
  `lid` int(11) NOT NULL AUTO_INCREMENT,
  `levelnum` int(11) NOT NULL,
  `levelname` varchar(255) NOT NULL,
  `leveldays` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`lid`),
  KEY `leveldays` (`leveldays`,`status`)
) ENGINE=MyISAM;
EOF;
	runquery($sql);
	cpmsg('update_success', "action=plugins&operation=config&do=".$do."&identifier=k_misign&pmod=cp_extend&act=level", 'succeed');
}elseif($op == 'uninstall'){
	$data['value'] = $misign['extends'];
	unset($data['value']['level']);
	$data['value'] = serialize($data['value']);
	C::t("common_pluginvar")->update_by_variable($do, 'extend', $data);
	
	DB::query("DROP TABLE IF EXISTS ".DB::table('plugin_k_misign_level'));
	@unlink(DISCUZ_ROOT.'./source/plugin/k_misign/language/extend_level.'.currentlang().'.php');
	@unlink(DISCUZ_ROOT.'./source/plugin/k_misign/extend/extend_level.php');
	@unlink(DISCUZ_ROOT.'./source/plugin/k_misign/table/table_plugin_k_misign_level.php');
	cpmsg('update_success', "action=plugins&operation=config&do=".$do."&identifier=k_misign&pmod=cp_extend", 'succeed');
}elseif($op == 'check'){
	if($misign['extends']['level']){
		$data['value'] = $misign['extends'];
		$data['value']['level'] = '0';
		$data['value'] = serialize($data['value']);
		C::t("common_pluginvar")->update_by_variable($do, 'extendp', $data);
		$resultshow = $extendlang['extendstatus_1'];
	}else{
		$data['value'] = $misign['extends'];
		$data['value']['level'] = '1';
		$data['value'] = serialize($data['value']);
		C::t("common_pluginvar")->update_by_variable($do, 'extendp', $data);
		$resultshow = $extendlang['extendstatus_2'];
	}
	
	updatecache('plugin');
	ajaxshowheader();
	echo $resultshow;
	ajaxshowfooter();
}elseif($op == 'import'){
	DB::query("TRUNCATE TABLE ".DB::table("plugin_k_misign_level"));
	$nlvtext = str_replace(array("\r\n", "\n", "\r"), '/hhf/', $misign['lvtext']);
	list($lv1name, $lv2name, $lv3name, $lv4name, $lv5name, $lv6name, $lv7name, $lv8name, $lv9name, $lv10name, $lvmastername) = explode("/hhf/", $nlvtext);
	$data =array(
		array('leveldays' => 1, 'levelnum' => 1, 'levelname' => $lv1name, 'status' => 1),
		array('leveldays' => 3, 'levelnum' => 2, 'levelname' => $lv2name, 'status' => 1),
		array('leveldays' => 7, 'levelnum' => 3, 'levelname' => $lv3name, 'status' => 1),
		array('leveldays' => 15, 'levelnum' => 4, 'levelname' => $lv4name, 'status' => 1),
		array('leveldays' => 30, 'levelnum' => 5, 'levelname' => $lv5name, 'status' => 1),
		array('leveldays' => 60, 'levelnum' => 6, 'levelname' => $lv6name, 'status' => 1),
		array('leveldays' => 120, 'levelnum' => 7, 'levelname' => $lv7name, 'status' => 1),
		array('leveldays' => 240, 'levelnum' => 8, 'levelname' => $lv8name, 'status' => 1),
		array('leveldays' => 365, 'levelnum' => 9, 'levelname' => $lv9name, 'status' => 1),
		array('leveldays' => 750, 'levelnum' => 10, 'levelname' => $lv10name, 'status' => 1),
		array('leveldays' => 1500, 'levelnum' => 11, 'levelname' => $lvmastername, 'status' => 1),
	); 
	foreach($data as $v){
		C::t("#k_misign#plugin_k_misign_level")->insert($v);
	}
	cpmsg('update_success', "action=plugins&operation=config&do=".$do."&identifier=k_misign&pmod=cp_extend&act=level", 'succeed');
}elseif($op == 'edit'){
	$lid = intval($_GET['lid']);
}
?>