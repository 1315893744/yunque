<?php

if (!defined('IN_DISCUZ')) {
    exit('Access Denied');
}
if (intval($_GET['pid'])) {
    $comiis_pid = intval($_GET['pid']);
    $comiis_upload = 0;
    $comiis_templatefile = '94_touch_' . substr(md5('comiis' . $comiis_pid), 8, 16) . '_mobile.tpl.php';
    if (file_exists(DISCUZ_ROOT . './data/template/' . $comiis_templatefile) && $_G['comiis_app_portal_cache'] != 1) {
        if (!(filemtime(DISCUZ_ROOT . './data/template/' . $comiis_templatefile) >= time() - 60)) {
            $comiis_upload = 1;
        }
    } else {
        $comiis_upload = 1;
    }
    if ($comiis_upload == 1) {
        include_once DISCUZ_ROOT . './source/plugin/comiis_app_portal/language/language.' . currentlang() . '.php';
        include_once DISCUZ_ROOT . './source/plugin/comiis_app_portal/comiis_app_portal_cache_fun.php';
        $comiis_portal_lang = array();
        $comiis_portal = array();
        touch(DISCUZ_ROOT . './data/template/' . $comiis_templatefile);
        $content_body = '';
        $content_footer = '';
        $smdir = DISCUZ_ROOT . './source/plugin/comiis_app_portal/comiis';
        $comiis_data = DB::fetch_first('SELECT * FROM %t WHERE id=\'%d\' AND `show`=\'1\'', array('comiis_app_portal_page', $comiis_pid));
        if ($comiis_data['id'] == $comiis_pid) {
            $comiis_diydata = DB::fetch_all('SELECT * FROM %t WHERE pid=\'%d\' ORDER BY displayorder, id', array('comiis_app_portal_diy', $comiis_pid));
            $comiis_diyid = array();
            $content_head = ob_get_contents();
            ob_clean();
            $_G['gzipcompress'] ? ob_start('ob_gzhandler') : ob_start();
            echo '<style>' . strip_tags($comiis_data['css']) . "</style>\r\n\t\t\t\t<script>\r\n\t\t\t\tfunction comiis_app_portal_loop(h, speed, delay, sid) {\r\n\t\t\t\t\tvar t = null;\r\n\t\t\t\t\tvar o = document.getElementById(sid);\r\n\t\t\t\t\to.innerHTML += o.innerHTML;\r\n\t\t\t\t\to.scrollTop = 0;\r\n\t\t\t\t\tfunction start() {\r\n\t\t\t\t\t\tt = setInterval(scrolling, speed);\r\n\t\t\t\t\t\to.scrollTop += 2;\r\n\t\t\t\t\t}\r\n\t\t\t\t\tfunction scrolling() {\r\n\t\t\t\t\t\tif(o.scrollTop % h != 0) {\r\n\t\t\t\t\t\t\to.scrollTop += 2;\r\n\t\t\t\t\t\t\tif(o.scrollTop >= o.scrollHeight / 2) o.scrollTop = 0;\r\n\t\t\t\t\t\t} else {\r\n\t\t\t\t\t\t\tclearInterval(t);\r\n\t\t\t\t\t\t\tsetTimeout(start, delay);\r\n\t\t\t\t\t\t}\r\n\t\t\t\t\t}\r\n\t\t\t\t\tsetTimeout(start, delay);\r\n\t\t\t\t}\r\n\t\t\t\tfunction comiis_app_portal_swiper(a, b){\r\n\t\t\t\t\tif(typeof(Swiper) == 'undefined') {\r\n\t\t\t\t\t\t\$.getScript(\"./source/plugin/comiis_app_portal/image/comiis.js\").done(function(){\r\n\t\t\t\t\t\t\tnew Swiper(a, b);\r\n\t\t\t\t\t\t});\r\n\t\t\t\t\t}else{\r\n\t\t\t\t\t\tnew Swiper(a, b);\r\n\t\t\t\t\t}\r\n\t\t\t\t}\r\n\t\t\t\t</script>";
            if (is_array($comiis_diydata['0'])) {
                foreach ($comiis_diydata as $temp) {
                    if ($temp['type'] != 'plugin') {
                        $comiis_diyid[] = $temp['diyid'];
                    }
                }
                block_get(implode(',', $comiis_diyid));
                $comiis_footer = array();
                foreach ($comiis_diydata as $data) {
                    if (!(strlen($data['dir']) >= 30) && is_dir($smdir . '/' . $data['dir'] . '/touch') && is_file($smdir . '/' . $data['dir'] . '/touch/comiis_template.php') && (is_array($_G['block'][$data['diyid']]) || $data['type'] == 'plugin') && ($data['show'] == 1 || $_G['uid'] && (check_diy_perm($topic) || getstatus($_G['member']['allowadmincp'], 1)) && $_GET['diy'] == 'yes')) {
                        if ($data['type'] == 'footer') {
                            $comiis_footer[] = $data;
                        } else {
                            if (is_file($smdir . '/' . $data['dir'] . '/language/language_' . currentlang() . '.php')) {
                                include_once libfile('language/' . currentlang(), 'plugin/comiis_app_portal/comiis/' . $data['dir']);
                                $comiis_portal = array_merge($comiis_portal, $comiis_portal_lang);
                            }
                            if ($data['type'] != 'plugin') {
                                $comiis_blockdata = block_fetch_content($data['diyid'], true, true);
                                $comiis = $_G['block'][$data['diyid']];
                                $comiis['itemlist'] = comiis_app_portal_fields($comiis['itemlist']);
                            }
                            echo '<div id="comiis_app_block_' . $data['id'] . '" class="bg_f' . ($data['margintop'] ? ' mt10' : '') . ($data['marginbottom'] ? ' mb10' : '') . ($data['bordertop'] ? ' b_t' : '') . ($data['borderbottom'] ? ' b_b' : '') . ' cl">';
                            include template('touch/comiis_template', $data['id'], './source/plugin/comiis_app_portal/comiis/' . $data['dir']);
                            echo '</div>';
                        }
                    }
                }
            } else {
                echo '<div style=\'font-size:14px;color:#bbb;text-align:center;margin-top:50px;\'>' . $comiis_app_portal_lang['75'] . '</div>';
            }
            $content_body = ob_get_contents();
            ob_clean();
            $comiis_templatefooterfile = '94_touch_' . substr(md5('comiis' . $comiis_pid . 'footer'), 8, 16) . '_mobile.tpl.php';
            if (count($comiis_footer)) {
                $_G['gzipcompress'] ? ob_start('ob_gzhandler') : ob_start();
                foreach ($comiis_footer as $data) {
                    if (is_file($smdir . '/' . $data['dir'] . '/language/language_' . currentlang() . '.php')) {
                        include_once libfile('language/' . currentlang(), 'plugin/comiis_app_portal/comiis/' . $data['dir']);
                        $comiis_portal = array_merge($comiis_portal, $comiis_portal_lang);
                    }
                    if ($data['type'] != 'plugin') {
                        $comiis_blockdata = block_fetch_content($data['diyid'], true);
                        $comiis = $_G['block'][$data['diyid']];
                        if (is_array($comiis['itemlist'])) {
                            foreach ($comiis['itemlist'] as $k => $v) {
                                $comiis['itemlist'][$k]['fields'] = !empty($v['fields']) ? (array) dunserialize($v['fields']) : array();
                            }
                        }
                    }
                    echo '<div id="comiis_app_block_' . $data['id'] . '" class="bg_f' . ($data['margintop'] ? ' mt10' : '') . ($data['marginbottom'] ? ' mb10' : '') . ($data['bordertop'] ? ' b_t' : '') . ($data['borderbottom'] ? ' b_b' : '') . ' cl">';
                    include template('touch/comiis_template', $data['id'], './source/plugin/comiis_app_portal/comiis/' . $data['dir']);
                    echo '</div>';
                }
                $content_footer = ob_get_contents();
                ob_clean();
            } elseif (file_exists(DISCUZ_ROOT . './data/template/' . $comiis_templatefooterfile)) {
                $fp = @fopen(DISCUZ_ROOT . './data/template/' . $comiis_templatefooterfile, 'wb');
                if (@fopen(DISCUZ_ROOT . './data/template/' . $comiis_templatefooterfile, 'wb')) {
                    fwrite($fp, ' ');
                    fclose($fp);
                } else {
                    exit('Can not write to cache files, please check directory ./data/ .');
                }
                @unlink(DISCUZ_ROOT . './data/template/' . $comiis_templatefooterfile);
            }
            if ($content_body) {
                $fp = @fopen(DISCUZ_ROOT . './data/template/' . $comiis_templatefile, 'wb');
                if (@fopen(DISCUZ_ROOT . './data/template/' . $comiis_templatefile, 'wb')) {
                    fwrite($fp, $content_body);
                    fclose($fp);
                } else {
                    exit('Can not write to cache files, please check directory ./data/ .');
                }
            }
            if ($content_footer) {
                $fp = @fopen(DISCUZ_ROOT . './data/template/' . $comiis_templatefooterfile, 'wb');
                if (@fopen(DISCUZ_ROOT . './data/template/' . $comiis_templatefooterfile, 'wb')) {
                    fwrite($fp, $content_footer);
                    fclose($fp);
                } else {
                    exit('Can not write to cache files, please check directory ./data/ .');
                }
            }
            echo $content_head;
        }
    }
}
