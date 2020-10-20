<?php

if (!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

$comiis_loadcache_array = array();
$comiis_loadcache_array[] = 'comiis_app_checktime';
if (empty($_G['cache']['plugin'])) {
	$comiis_loadcache_array[] = 'plugin';
}
if (empty($_G['cache']['comiis_app_access_token'])) {
	$comiis_loadcache_array[] = 'comiis_app_access_token';
}
if (empty($_G['cache']['attachtype'])) {
	$comiis_loadcache_array[] = 'attachtype';
}
if (count($comiis_loadcache_array)) {
	loadcache($comiis_loadcache_array);
}
$comiis_weixinupload = $_G['cache']['plugin']['comiis_weixinupload'];
if (!$comiis_weixinupload['appid'] || !$comiis_weixinupload['appsecret']) {
	comiis_uploadmsg(10, 0, '', '', 1);
	return;
}
$plugin_id = 'comiis_weixinupload';
$comiis_fid = intval($_GET['fid']);
$data = $_G['cache']['comiis_app_access_token'];
if ($data['expire_time'] < time() || !comiis_check_access($data['access_token'])) {
	$data['access_token'] = comiis_get_access($comiis_weixinupload['appid'], $comiis_weixinupload['appsecret']);
} else {
	$access_token = $data['access_token'];
}
$comiis_wxup_access_token = $access_token;
$comiis_redata = array();
if ($comiis_wxup_access_token) {
	require_once libfile('class/image');
	require_once libfile('function/upload');
	$upload = new discuz_upload();
	$attach = array();
	$attach['ext'] = 'jpg';
	if (!empty($_GET['serverId']) && is_array($_GET['serverId'])) {
		foreach ($_GET['serverId'] as $tempid) {
			$imageurl = 'http://file.api.weixin.qq.com/cgi-bin/media/get?access_token=' . $comiis_wxup_access_token . '&media_id=' . $tempid;
			$comiis_wx_data = dfsockopen($imageurl);
			if (!$comiis_wx_data) {
				$comiis_wx_data = file_get_contents($imageurl);
			}
			if (substr($comiis_wx_data, 0, 11) == '{"errcode":') {
				$x = 0;
				while ($x <= 3) {
					sleep(1);
					$comiis_wx_data = dfsockopen($imageurl);
					if (!$comiis_wx_data) {
						$comiis_wx_data = file_get_contents($imageurl);
					}
					if (!empty($comiis_wx_data) && substr($comiis_wx_data, 0, 11) != '{"errcode":') {
						break;
					}
					$x = $x + 1;
				}
			}
			if (!empty($comiis_wx_data) && substr($comiis_wx_data, 0, 11) != '{"errcode":') {
				if ($comiis_wx_data) {
					$attach['name'] = uniqid('wechat_upload' . time());
					$attach['thumb'] = '';
					$attach['isimage'] = 1;
					$attach['extension'] = $upload->get_target_extension($attach['ext']);
					$attach['attachdir'] = $upload->get_target_dir('forum');
					$attach['attachment'] = $attach['attachdir'] . $upload->get_target_filename('forum') . '.' . $attach['extension'];
					$attach['target'] = $_G['setting']['attachdir'] . 'forum/' . $attach['attachment'];
					if (!@($fp = fopen($attach['target'], 'wb'))) {
						comiis_uploadmsg(8, 0, '', '', 1);
					} else {
						flock($fp, 2);
						fwrite($fp, $comiis_wx_data);
						fclose($fp);
						if (!$upload->get_image_info($attach['target'])) {
							@unlink($attach['target']);
							comiis_uploadmsg(8, 0, '', '', 1);
						} else {
							$attach['size'] = filesize($attach['target']);
							$upload->attach = $attach;
							if ($_G['group']['maxattachsize'] && $upload->attach['size'] > $_G['group']['maxattachsize']) {
								$error_sizelimit = $_G['group']['maxattachsize'];
								@unlink($attach['target']);
								comiis_uploadmsg(3, 0, '', '', $error_sizelimit);
							} else {
								if ($comiis_fid && isset($_G['cache']['attachtype'][$comiis_fid][$upload->attach['ext']])) {
									$maxsize = $_G['cache']['attachtype'][$comiis_fid][$upload->attach['ext']];
								} else {
									if (isset($_G['cache']['attachtype'][0][$upload->attach['ext']])) {
										$maxsize = $_G['cache']['attachtype'][0][$upload->attach['ext']];
									}
								}
								if (isset($maxsize)) {
									if (!$maxsize) {
										$error_sizelimit = 'ban';
										@unlink($attach['target']);
										comiis_uploadmsg(4, 0, '', '', $error_sizelimit);
										continue;
									}
									if ($upload->attach['size'] > $maxsize) {
										$error_sizelimit = $maxsize;
										@unlink($attach['target']);
										comiis_uploadmsg(5, 0, '', '', $error_sizelimit);
										continue;
									}
								}
								if ($upload->attach['size'] && $_G['group']['maxsizeperday']) {
									$todaysize = getuserprofile('todayattachsize') + $upload->attach['size'];
									if ($todaysize >= $_G['group']['maxsizeperday']) {
										$error_sizelimit = 'perday|' . $_G['group']['maxsizeperday'];
										@unlink($attach['target']);
										comiis_uploadmsg(11, 0, '', '', $error_sizelimit);
										continue;
									}
								}
								$thumb = $width = 0;
								if ($upload->attach['isimage']) {
									if ($_G['setting']['thumbsource'] && $_G['setting']['sourcewidth'] && $_G['setting']['sourceheight']) {
										$image = new image();
										$thumb = $image->Thumb($upload->attach['target'], '', $_G['setting']['sourcewidth'], $_G['setting']['sourceheight'], 1, 1) ? 1 : 0;
										$width = $image->imginfo['width'];
										$upload->attach['size'] = $image->imginfo['size'];
									}
									if ($_G['setting']['thumbstatus']) {
										$image = new image();
										$thumb = $image->Thumb($upload->attach['target'], '', $_G['setting']['thumbwidth'], $_G['setting']['thumbheight'], $_G['setting']['thumbstatus'], 0) ? 1 : 0;
										$width = $image->imginfo['width'];
									}
									if ($_G['setting']['thumbsource'] || !$_G['setting']['thumbstatus']) {
										list($width) = @getimagesize($upload->attach['target']);
									}
									if ($_G['setting']['watermarkstatus'] && empty($_G['forum']['disablewatermark'])) {
										$image = new image();
										$image->Watermark($attach['target'], '', 'forum');
										$upload->attach['size'] = $image->imginfo['size'];
									}
								}
								$aids[] = $aid = getattachnewaid();
								$setarr = array('aid' => $aid, 'dateline' => $_G['timestamp'], 'filename' => $upload->attach['name'], 'filesize' => $upload->attach['size'], 'attachment' => $upload->attach['attachment'], 'isimage' => $upload->attach['isimage'], 'uid' => $_G['uid'], 'thumb' => $thumb, 'remote' => '0', 'width' => $width);
								C::t('forum_attachment_unused')->insert($setarr);
								comiis_uploadmsg(0, $aid, $upload->attach['attachment'], $upload->attach['name']);
							}
						}
					}
				} else {
					comiis_uploadmsg(9, 0, '', '', 1);
				}
			}
		}
		echo json_encode($comiis_redata);
		exit(0);
	}
}
function comiis_uploadmsg($statusid, $aid, $attachment, $name, $error_sizelimit = 0)
{
	global $comiis_redata;
	$comiis_redata[] = 'DISCUZUPLOAD|1|' . $statusid . '|' . $aid . '|1|' . $attachment . '|' . $name . '|' . $error_sizelimit;
	return NULL;
}
function comiis_check_access($access_token)
{
	global $_G;
	if ($_G['cache']['comiis_app_checktime'] < time()) {
		$url = 'https://api.weixin.qq.com/cgi-bin/ticket/getticket?type=jsapi&access_token=' . $access_token;
		$comiis_wx_data2 = dfsockopen($url);
		if (!$comiis_wx_data2) {
			$comiis_wx_data2 = file_get_contents($url);
		}
		$res = json_decode($comiis_wx_data2);
		$ticket = $res->ticket;
		save_syscache('comiis_app_checktime', time() + 60);
		if ($ticket) {
			return true;
		}
		return false;
	}
	return true;
}
function comiis_get_access($appid, $appsecret)
{
	$url = 'https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=' . $appid . '&secret=' . $appsecret;
	$comiis_wx_data2 = dfsockopen($url);
	if (!$comiis_wx_data2) {
		$comiis_wx_data2 = file_get_contents($url);
	}
	$res = json_decode($comiis_wx_data2);
	$access_token = $res->access_token;
	if ($access_token) {
		$data['expire_time'] = time() + 3000;
		$data['access_token'] = $access_token;
		save_syscache('comiis_app_access_token', $data);
		return $data['access_token'];
	}
	echo '<!---- Access_token Error: (' . $res->errcode . ') ' . $res->errmsg . ' ---->';
}