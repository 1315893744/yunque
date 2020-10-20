<?PHP

 
if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
loadcache(array('comiis_app_jsapi_ticket', 'comiis_app_access_token'));
class comiis_JSSDK {
  private $appId;
  private $appSecret;
  public function __construct($appId, $appSecret) {
    $this->appId = $appId;
    $this->appSecret = $appSecret;
  }
  public function getSignPackage() {
    $jsapiTicket = $this->getJsApiTicket();
    $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
    $url = "$protocol$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    $timestamp = time();
    $nonceStr = $this->createNonceStr();
    $string = "jsapi_ticket=$jsapiTicket&noncestr=$nonceStr&timestamp=$timestamp&url=$url";
    $signature = sha1($string);
    $signPackage = array(
      "appId"     => $this->appId,
      "nonceStr"  => $nonceStr,
      "timestamp" => $timestamp,
      "url"       => $url,
      "signature" => $signature,
      "rawString" => $string
    );
    return $signPackage; 
  }
  private function createNonceStr($length = 16) {
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    $str = "";
    for ($i = 0; $i < $length; $i++) {
      $str .= substr($chars, mt_rand(0, strlen($chars) - 1), 1);
    }
    return $str;
  }
  private function getJsApiTicket() {
	global $_G;
    $data = $_G['cache']['comiis_app_jsapi_ticket'];
    if ($data['expire_time'] < time()) {
      $accessToken = $this->getAccessToken();
      $url = "https://api.weixin.qq.com/cgi-bin/ticket/getticket?type=jsapi&access_token=$accessToken";
      $res = json_decode($this->httpGet($url));
      $ticket = $res->ticket;
      if ($ticket) {
        $data['expire_time'] = time() + 250;
        $data['jsapi_ticket'] = $ticket;
        save_syscache("comiis_app_jsapi_ticket", $data);
      }
    } else {
      $ticket = $data['jsapi_ticket'];
    }
    return $ticket;
  }
  private function getAccessToken() {
	global $_G;
    $data = $_G['cache']['comiis_app_access_token'];
    if ($data['expire_time'] < time()) {
      $url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid={$this->appId}&secret={$this->appSecret}";
      $res = json_decode($this->httpGet($url));
      $access_token = $res->access_token;
      if ($access_token) {
        $data['expire_time'] = time() + 250;
        $data['access_token'] = $access_token;
        save_syscache("comiis_app_access_token", $data);
      }
    } else {
      $access_token = $data['access_token'];
    }
    return $access_token;
  }
  private function httpGet($url) {
	return dfsockopen($url);
  }
}
$comiis_jssdk = new comiis_JSSDK($comiis_app_switch['comiis_wxappid'], $comiis_app_switch['comiis_wxappsecret']);
$comiis_signPackage = $comiis_jssdk->GetSignPackage();