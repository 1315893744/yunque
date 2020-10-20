<?php


if (!defined('IN_DISCUZ')) {
    exit('Access Denied');
}

class plugin_yimen_app
{

    public function global_footer()
    {
        $char = function ($char) {
            global $_G;
            if ($_G['charset'] == 'utf-8') {
                return $char;
            } else {
                return diconv($char, 'utf-8', 'gbk');
            }
        };
        global $_G;
        $setting = C::t('#yimen_app#setting')->getSetting();
        //拦截登录页
        if (isset($setting['global']['jump_pc']) && $setting['global']['jump_pc'] != '') {
            if (($_GET['mod'] == $_G['setting']['regname'] || $_GET['mod'] == 'logging') && $_GET['action'] != "logout") {
                header('Location: ' . $setting['global']['jump_pc']);
                return;
            }
        }
        //注入js代码
        if (isset($setting['global']['js_pc']) && $setting['global']['js_pc'] != '') {
            $_G['setting']['statcode'] .= '
            <script type="text/javascript">
                ' . $char(base64_decode($setting['global']['js_pc'])) . '
            </script>
            ';
            return;
        }
        return;
    }
}
