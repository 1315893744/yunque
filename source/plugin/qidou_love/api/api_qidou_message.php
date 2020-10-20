<?php
/**
 *
 *
 * @author NaiXiaoXin<wangsiqi@goyoo.com>
 * @copyright 2003-2016 Goyoo Inc.
 */
if (!defined('IN_DISCUZ'))
{
    exit('Access Denied');
}

class qidou_message
{

    private $appInfo = array();
    private $header = array();
    public $is_appbyme = false;

    public function __construct()
    {
        global $_G;
        loadcache('plugin');
        $this->is_appbyme = $_G['cache']['plugin']['appbyme_app']['gotye'];
        if( $this->is_appbyme ){
        
            $app_key = array_values(unserialize(DB::result_first("SELECT cvalue FROM  %t WHERE `ckey` = %s", array('appbyme_config', 'RONGYUN_KEY'))));

            $this->appInfo = $app_key[0];

            if (!function_exists('curl_init'))
            {
                throw new Exception('please support Curl');
            }
            $this->setHeader();
        }
    }

    public function send_message( $post_uid,$get_uid,$post_title,$post_message ){
        if( $post_uid == $get_uid ){
            return false;
        }
        if( $this->is_appbyme ){
            $json['content'] = diconv($post_message, CHARSET, 'utf-8');
            $send_user  = getuserbyuid( $post_uid );
            $json['extra']['sender'] = array(
                'uid'  => $post_uid,
                'name' => diconv($send_user['username'], CHARSET, 'utf-8'),
                'icon' => avatar($post_uid, 'middle', true),
            );
            $get_user = getuserbyuid( $get_uid );
            $json['extra']['receiver'] = array(
                'uid'  => $get_uid,
                'name' => diconv($get_user['username'], CHARSET, 'utf-8'),
                'icon' => avatar($get_uid, 'middle', true),
            );
            $result =  $this->curl_post(
                    'http://api.cn.ronghub.com/message/private/publish.json',
                    array('fromUserId' => $post_uid,
                        'toUserId' => $get_uid,
                        'objectName' => 'RC:TxtMsg',
                        'content' => json_encode($json)
                        )
                    );
        }else{
            loaducenter();
            $result = uc_pm_send($post_uid,$get_uid,$post_title,$post_message);
        }
        return $result;
    }
    
    
    public function curl_post($url, $data)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $this->getHeader());
        $return = curl_exec($ch);
        curl_close($ch);
        $result= json_decode($return, true);
        if ($result['code'] == 200){
            $return = true;
        }else{
            $return = false;
        }
        return $return;

    }

    private function getHeader(){
        $return = array();
        foreach ($this->header as $key => $value)
        {
            $return[] = $key . ':' . $value;
        }
        return $return;
    }

    private function setHeader(){
        global $_G;
        $this->header['App-Key'] = $this->appInfo['appKey'];
        $this->header['Nonce'] = random('32');
        $this->header['Timestamp'] = $_G['timestamp'];
        $this->header['Signature'] = $this->getSign();
    }

    private function getSign(){
        return sha1($this->appInfo['appSecret'] . $this->header['Nonce'] . $this->header['Timestamp']);
    }
}
