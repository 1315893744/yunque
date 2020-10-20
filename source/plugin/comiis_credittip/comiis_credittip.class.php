<?php
 
if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
class mobileplugin_comiis_credittip{
	function global_footer_mobile(){
		global $_G;
		if(!$_G['uid']){
			return;
		}
		$comiis_credittip = $_G['cache']['plugin']['comiis_credittip'];
		$comiis_set_style = $comiis_credittip['tipstyle'] ? 1 : 0; // 样式 0/1
		$comiis_credittip['jbgcolor'] = $this->_hex2rgba($comiis_credittip['jbgcolor']);
		$comiis_credittip['nbgcolor'] = $this->_hex2rgba($comiis_credittip['nbgcolor']);
		$comiis_set_timeout = $comiis_credittip['time'] < 300 ? 300 : $comiis_credittip['time']; // 停留时间
		$comiis_atime = 200; //动画时间 X2
		$comiis_alltime = $comiis_set_timeout + $comiis_atime * 2; // 总时间
		$comiis_3f1bfb = round($comiis_atime / $comiis_alltime * 100 , 2);
		$comiis_keyframes_bfb = array(
			'1' => ($comiis_3f1bfb / 2),
			'2' => $comiis_3f1bfb,
			'3' => (100 - $comiis_3f1bfb),
		);
		include template('comiis_credittip:hook');
		return $html;
	}
	function _hex2rgba($color) {
		global $_G;
        $color = str_replace('#', '', $color);
		return strlen($color) > 3 ? 'rgba('.hexdec(substr($color, 0, 2)).','.hexdec(substr($color, 2, 2)).','.hexdec(substr($color, 4, 2)).','.$_G['cache']['plugin']['comiis_credittip']['opacity'].')' : 'rgba('.hexdec(substr($color, 0, 1)).','.hexdec(substr($color, 1, 1)).','.hexdec(substr($color, 2, 1)).','.$_G['cache']['plugin']['comiis_credittip']['opacity'].')';
    }
}
