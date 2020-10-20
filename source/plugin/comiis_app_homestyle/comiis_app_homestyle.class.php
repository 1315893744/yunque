<?php
if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}


class mobileplugin_comiis_app_homestyle{
	function global_comiis_header_mobile(){
		global $_G, $space;
		$_G['comiis_homestyleid'] = 'yes';
		$space['uid'] = intval($space['uid']);
		$homestyle_img = $homestyle_user_img = '';
		if($_G['uid']){
			$comiis_uidhomestyleid = 'comiis_homestyleid_u'.$_G['uid'];
			$comiis_uid_homestyle = getcookie($comiis_uidhomestyleid);
			if($comiis_uid_homestyle == ''){
				$homestyle = DB::fetch_first("SELECT uid, img, img_id FROM %t WHERE uid='%d'", array('comiis_app_homestyle', $_G['uid']));
				if($homestyle['uid'] == $_G['uid']){
					$homestyle_img = $homestyle['img'];
					$_G['comiis_homestyleid'] = $homestyle['img_id'];
				}else{
					$homestyle_img = 'home_bg.jpg';
				}
				dsetcookie($comiis_uidhomestyleid, ($homestyle['img_id'] ? intval($homestyle['img_id']) : 'yes').'*'.$homestyle_img, 86400 * 360);
			}else{
				list($_G['comiis_homestyleid'], $homestyle_img) = explode('*', $comiis_uid_homestyle);
			}
		}else{
			$homestyle_img = 'home_bg.jpg';
		}
		if($space['uid'] && $space['uid'] != $_G['uid']){
			$homestyle = DB::fetch_first("SELECT uid, img, img_id FROM %t WHERE uid='%d'", array('comiis_app_homestyle', $space['uid']));
			if($homestyle['uid'] == $space['uid']){
				$homestyle_user_img = $homestyle['img'];
			}else{
				$homestyle_user_img = 'home_bg.jpg';
			}
			return  '<style>.comiis_sidenv_box .comiis_sidenv_top{background:url(./source/plugin/comiis_app_homestyle/image/home_bg/'.htmlspecialchars($homestyle_img).') no-repeat 0 0 / cover;}.comiis_space_box{background:url(./source/plugin/comiis_app_homestyle/image/home_bg/'.htmlspecialchars($homestyle_user_img).') no-repeat 0 0 / cover;}</style>';
		}else{
			return '<style>.comiis_sidenv_box .comiis_sidenv_top,.comiis_space_box {background:url(./source/plugin/comiis_app_homestyle/image/home_bg/'.htmlspecialchars($homestyle_img).') no-repeat 0 0 / cover;}</style>';
		}
	}
}