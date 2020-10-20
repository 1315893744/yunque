<?php



if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

/*
 * discuz自带上传函数
 * 添加自定义上传路径
 * 仅供本插件上传使用
 */
Class love_upload{

	var $attach = array();
	var $plugin = '';
	var $up_dir = 0;
	var $errorcode = 0;
	var $forcename = '';

	public function __construct() {

	}

	function init($attach, $plugin, $up_dir, $forcename = '') {
                
		if(!is_array($attach) || empty($attach) || !$this->is_upload_file($attach['tmp_name']) || trim($attach['name']) == '' || $attach['size'] == 0) {
			$this->attach = array();
			$this->errorcode = -1;
			return false;
		} else {
			$this->plugin = $plugin;
			$this->up_dir = $up_dir;
			$this->forcename = $forcename;

			$attach['size'] = intval($attach['size']);
			$attach['name'] =  trim($attach['name']);
			$attach['thumb'] = '';
			$attach['ext'] = $this->fileext($attach['name']);

			$attach['name'] =  dhtmlspecialchars($attach['name'], ENT_QUOTES);
			if(strlen($attach['name']) > 90) {
                            $attach['name'] = cutstr($attach['name'], 80, '').'.'.$attach['ext'];
			}

			$attach['isimage'] = $this->is_image_ext($attach['ext']);
			$attach['extension'] = $this->get_target_extension($attach['ext']);
			$attach['attachdir'] = $this->get_target_dir($this->plugin,$up_dir,true);
			$attach['attachment'] = $attach['attachdir'].$this->get_target_filename().'.'.$attach['extension'];
			$attach['target'] = $attach['attachment'];
            
			$this->attach = & $attach;
			$this->errorcode = 0;
			return true;
		}

	}

	function save($ignore = 0) {
            
            if(!$this->save_to_local($this->attach['tmp_name'], $this->attach['target'])) {
                    $this->errorcode = -103;
                    return false;
            } else {
                    $this->errorcode = 0;
                    return true;
            }

            return false;
	}

	function error() {
		return $this->errorcode;
	}

	function errormessage() {
		return lang('error', 'file_upload_error_'.$this->errorcode);
	}

	function fileext($filename) {
		return addslashes(strtolower(substr(strrchr($filename, '.'), 1, 10)));
	}

	function is_image_ext($ext) {
		static $imgext  = array('jpg', 'jpeg', 'gif', 'png', 'bmp');
		return in_array($ext, $imgext) ? 1 : 0;
	}

	function get_image_info($target, $allowswf = false) {
		$ext = love_upload::fileext($target);
		$isimage = love_upload::is_image_ext($ext);
		if(!$isimage && ($ext != 'swf' || !$allowswf)) {
			return false;
		} elseif(!is_readable($target)) {
			return false;
		} elseif($imageinfo = @getimagesize($target)) {
			list($width, $height, $type) = !empty($imageinfo) ? $imageinfo : array('', '', '');
			$size = $width * $height;
			if($size > 16777216 || $size < 16 ) {
				return false;
			} elseif($ext == 'swf' && $type != 4 && $type != 13) {
				return false;
			} elseif($isimage && !in_array($type, array(1,2,3,6,13))) {
				return false;
			} elseif(!$allowswf && ($ext == 'swf' || $type == 4 || $type == 13)) {
				return false;
			}
			return $imageinfo;
		} else {
			return false;
		}
	}

	function is_upload_file($source) {
		return $source && ($source != 'none') && (is_uploaded_file($source) || is_uploaded_file(str_replace('\\\\', '\\', $source)));
	}

	function get_target_filename() {
        $filename = date('His').strtolower(random(16));
		return $filename;
	}

	function get_target_extension($ext) {
		static $safeext  = array('attach', 'jpg', 'jpeg', 'gif', 'png', 'swf', 'bmp', 'txt', 'zip', 'rar', 'mp3');
		return strtolower(!in_array(strtolower($ext), $safeext) ? 'attach' : $ext);
	}

	function get_target_dir($plugin, $up_dir, $check_exists = true) {

		$img_dir = md5($plugin.$up_dir);

                $subdir = 'source/plugin/'.$plugin.'/'.$up_dir.'/'.substr($img_dir,rand(0,strlen($img_dir)-2), 2).'/';
                
                $check_exists && love_upload::check_dir_exists('source/plugin/'.$plugin);
		$check_exists && love_upload::check_dir_exists('source/plugin/'.$plugin.'/'.$up_dir);
                $check_exists && love_upload::check_dir_exists($subdir);

		return $subdir;
	}

	function check_dir_exists($upload_dir) {
            
                $upload_dir = DISCUZ_ROOT.$upload_dir;
                
		$res = is_dir($upload_dir);
                
		if(!$res) {
                    $res = $upload_dir && love_upload::make_dir($upload_dir);
		}

		return $res;
	}

	function save_to_local($source, $target) {
                $succeed = false;
		if(!love_upload::is_upload_file($source)) {
			$succeed = false;
		}elseif(@copy($source, $target)) {
			$succeed = true;
		}elseif(function_exists('move_uploaded_file') && @move_uploaded_file($source, $target)) {
			$succeed = true;
		}elseif (@is_readable($source) && (@$fp_s = fopen($source, 'rb')) && (@$fp_t = fopen($target, 'wb'))) {
			while (!feof($fp_s)) {
                            $s = @fread($fp_s, 1024 * 512);
                            @fwrite($fp_t, $s);
			}
			fclose($fp_s); fclose($fp_t);
			$succeed = true;
		}
		if($succeed)  {
			$this->errorcode = 0;
			@chmod($target, 0644); @unlink($source);
		} else {
			$this->errorcode = 0;
		}

		return $succeed;
	}

	function make_dir($dir, $index = true) {
		$res = true;
		if(!is_dir($dir)) {
			$res = @mkdir($dir, 0777);
			$index && @touch($dir.'/index.html');
		}
		return $res;
	}
}

?>