<?PHP
/**
 * 
 * 克米出品 必属精品
 * 克米设计工作室 版权所有 http://www.Comiis.com
 * 专业论坛首页及风格制作, 页面设计美化, 数据搬家/升级, 程序二次开发, 网站效果图设计, 页面标准DIV+CSS生成, 各类大中小型企业网站设计...
 * 我们致力于为企业提供优质网站建设、网站推广、网站优化、程序开发、域名注册、虚拟主机等服务，
 * 一流设计和解决方案为企业量身打造适合自己需求的网站运营平台，最大限度地使企业在信息时代稳握无限商机。
 *
 *   电话: 0668-8810200
 *   手机: 13450110120  15813025137
 *    Q Q: 21400445  8821775  11012081  327460889
 * E-mail: ceo@comiis.com
 *
 * 工作时间: 周一到周五早上09:00-11:30, 下午03:00-05:30, 晚上09:00-11:00(周六、日休息)
 * 克米设计用户交流群: ①群83667771 ②群83667772 ③群83667773 ④群110900020 ⑤群110900021 ⑥群70068388 ⑦群110899987
 * 
 */
 
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
        $data['expire_time'] = time() + 7000;
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
        $data['expire_time'] = time() + 7000;
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