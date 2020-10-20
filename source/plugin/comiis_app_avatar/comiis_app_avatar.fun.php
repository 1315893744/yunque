<?php

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
if(file_put_contents($tmpavatar, base64_decode(str_replace($result[1], '', $base64)))){
	list($width, $height, $type, $attr) = getimagesize($tmpavatar);
	$imgtype = array(1 => '.gif', 2 => '.jpg', 3 => '.png');
	$filetype = $imgtype[$type];
	if(!$filetype) $filetype = '.jpg';
	if($width < 10 || $height < 10 || $type == 4){
		@unlink($tmpavatar);
	}
	require_once libfile('class/image');
	$image = new image;
	$tmpavatarbig = './temp/upload'.$_G['uid'].'big'.$filetype;
	$tmpavatarmiddle = './temp/upload'.$_G['uid'].'middle'.$filetype;
	$tmpavatarsmall = './temp/upload'.$_G['uid'].'small'.$filetype;
	$image->Thumb($tmpavatar, $tmpavatarbig, 200, 200, 1);
	$image->Thumb($tmpavatar, $tmpavatarmiddle, 120, 120, 1);
	$image->Thumb($tmpavatar, $tmpavatarsmall, 48, 48, 2);
	loaducenter();
	$tmpavatarbig = $avatarpath.$tmpavatarbig;
	$tmpavatarmiddle = $avatarpath.$tmpavatarmiddle;
	$tmpavatarsmall = $avatarpath.$tmpavatarsmall;
	$extra = '&avatar1='.comiis_app_avatar_byte2hex(file_get_contents($tmpavatarbig)).'&avatar2='.comiis_app_avatar_byte2hex(file_get_contents($tmpavatarmiddle)).'&avatar3='.comiis_app_avatar_byte2hex(file_get_contents($tmpavatarsmall));
	$postdata = uc_api_requestdata('user', 'rectavatar', 'uid='. $_G['uid'], $extra);
	$result = uc_fopen2(UC_API.'/index.php', 500000, $postdata, '', TRUE, UC_IP, 20);
	@unlink($tmpavatar);
	@unlink($tmpavatarbig);
	@unlink($tmpavatarmiddle);
	@unlink($tmpavatarsmall);
	if(empty($space['avatarstatus']) && uc_check_avatar($_G['uid'], 'middle')) {
		C::t('common_member')->update($_G['uid'], array('avatarstatus'=>'1'));
		updatecreditbyaction('setavatar');
		manyoulog('user', $_G['uid'], 'update');
	}
}else{
	exit('err:0');
}
function comiis_app_avatar_byte2hex($string){
	$buffer = '';
	$value = unpack('H*', $string);
	$value = str_split($value[1], 2);
	$b = '';
	foreach($value as $k => $v){
		$b .= strtoupper($v);
	}
	return $b;
}