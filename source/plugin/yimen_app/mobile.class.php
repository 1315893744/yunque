<?php
/*
 * 手机版嵌入点
 *
 *
 */
if (!defined('IN_DISCUZ')) {
    exit('Access Denied');
}

class mobileplugin_yimen_app
{

    public function global_header_mobile()
    {
        $char = function ($char) {
            global $_G;
            if ($_G['charset'] == 'utf-8') {
                return $char;
            } else {
                return diconv($char, 'utf-8', 'gbk');
            }
        };
        //手机版登录入口
        $setting = C::t('#yimen_app#setting')->getSetting();
        global $_G;
        //需要在这里处理微信静默登录
        $isAutoLogin = isset($setting['login_wechat']['auto_login']) && $setting['login_wechat']['auto_login'] == 1 && $setting['login_wechat']['wx_appid'] != '' ? true : false;
        if ($isAutoLogin && !isset($_COOKIE['wechat_login']) && $_G['uid'] == 0 && strpos($_SERVER['HTTP_USER_AGENT'], 'MicroMessenger')) {
            setcookie('wechat_login', 1);
            $wchatUrl = 'https://open.weixin.qq.com/connect/oauth2/authorize?appid=' . $setting['login_wechat']['wx_appid']
                . '&redirect_uri=' . urlencode($setting['global']['site_url'] . 'plugin.php?id=yimen_app&s=login/wechat')
                . '&response_type=code&scope=snsapi_base,snsapi_userinfo&state=yimemapp#wechat_redirect';
            header('Location: ' . $wchatUrl);
        }
        //拦截登录页
        $type = strpos($_SERVER['HTTP_USER_AGENT'], 'LT-APP') ? 'jump_app' : 'jump_h5';
        if (isset($setting['global'][$type]) && $setting['global'][$type] != '') {
            if (($_GET['mod'] == $_G['setting']['regname'] || $_GET['mod'] == 'logging') && $_GET['action'] != "logout") {
                header('Location: ' . $setting['global'][$type]);
                return;
            }
        }
        //app注入分享
        $setJS = '';
        $setShare = '';
        if (strpos($_SERVER['HTTP_USER_AGENT'], 'LT-APP') && $setting['global']['share'] == 1) {
            $setJS = '<script src="./source/plugin/yimen_app/static/app.js"></script>';
            $setShare = '
                (function(){
                    setTimeout(()=>{
                        var img = [];
                        for(var i=0;i<document.images.length;i++){
                          if(parseInt(document.images[i].width)>100){
                            img.push(document.images[i].src);
                          }
                        }
                        var shareInfo={
                            title : document.getElementsByTagName("meta")["keywords"].content,
                            link  : location.href,
                            imgUrl: img[0]?img[0]:"",
                            desc  : (document.getElementsByTagName("meta")["description"].content).substring(0,30),
                            success: function() {
                              alert("\u5206\u4eab\u6210\u529f");
                            },
                            cancel: function() {
                               alert("\u53d6\u6d88\u5206\u4eab\u6216\u5206\u4eab\u5931\u8d25");
                            }
                        }
                        jsBridge.onMenuShareTimeline(shareInfo);
                        jsBridge.onMenuShareFriend(shareInfo);
                        jsBridge.onMenuShareQQ(shareInfo);
                        jsBridge.onMenuShareQZone(shareInfo);
                    },500);
                })();
                ';
        }
        //注入js代码
        $type = strpos($_SERVER['HTTP_USER_AGENT'], 'LT-APP') ? 'js_app' : 'js_h5';
        $jss = '';
        if (isset($setting['global'][$type]) && $setting['global'][$type] != '') {
            $jss = $char(base64_decode($setting['global'][$type]));
        }
        $js = $setJS . '<script>'
            . $setShare
            . $jss . '
            </script>';
        return $js;
    }
}