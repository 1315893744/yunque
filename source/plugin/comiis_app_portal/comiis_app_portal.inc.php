<?php

if (!defined('IN_DISCUZ')) {
    exit('Access Denied');
}
$plugin_id = 'comiis_app_portal';
if (!function_exists('comiis_app_load_app_portal_data')) {
    if (!file_exists(DISCUZ_ROOT . './source/plugin/' . $plugin_id . '/comiis_info/comiis.php')) {
        return false;
    }
    include DISCUZ_ROOT . './source/plugin/' . $plugin_id . '/comiis_info/comiis.php';
}
if (!function_exists('comiis_app_load_app_portal_data')) {
    return false;
}
comiis_app_load_app_portal_data($plugin_id);
if (!file_exists(DISCUZ_ROOT . './source/plugin/' . $plugin_id . '/comiis_info/comiis_md5file.php')) {
    return false;
}
include DISCUZ_ROOT . './source/plugin/' . $plugin_id . '/comiis_info/comiis_md5file.php';
$siteuniqueid = $_G['setting']['siteuniqueid'] ? $_G['setting']['siteuniqueid'] : C::t('common_setting')->fetch('siteuniqueid');

require DISCUZ_ROOT . './source/plugin/' . $plugin_id . '/language/language.' . currentlang() . '.php';
if ($_GET['style'] == 'yes') {
    if ($_G['uid'] && (check_diy_perm($topic) || getstatus($_G['member']['allowadmincp'], 1))) {
        if (!submitcheck('submit')) {
            $editid = intval($_GET['editid']);
            $comiis_diy = DB::fetch_first('SELECT * FROM %t WHERE id=\'%d\'', array('comiis_app_portal_diy', $editid));
            if ($comiis_diy['id'] == $editid) {
                include_once template('comiis_app_portal:comiis_html');
            }
        } else {
            $comiis_id = intval($_GET['editid']);
            $comiis_margintop = intval($_GET['margintop']) ? 1 : 0;
            $comiis_marginbottom = intval($_GET['marginbottom']) ? 1 : 0;
            $comiis_bordertop = intval($_GET['bordertop']) ? 1 : 0;
            $comiis_borderbottom = intval($_GET['borderbottom']) ? 1 : 0;
            DB::update('comiis_app_portal_diy', array('margintop' => $comiis_margintop, 'marginbottom' => $comiis_marginbottom, 'bordertop' => $comiis_bordertop, 'borderbottom' => $comiis_borderbottom), DB::field('id', $comiis_id));
            showmessage('OK', '/');
        }
    }
} elseif (intval($_GET['pid'])) {
    $comiis_portal_lang = array();
    $comiis_portal = array();
    $comiis_pid = intval($_GET['pid']);
    if (!isset($comiis_app_switch) && !isset($comiis_app_nav)) {
        loadcache(array('comiis_app_switch', 'comiis_app_nav', 'stamps', 'forums'));
        $comiis_app_switch = $_G['cache']['comiis_app_switch'];
        $comiis_app_nav = $_G['cache']['comiis_app_nav'];
    }
    $smdir = DISCUZ_ROOT . './source/plugin/comiis_app_portal/comiis';
    $comiis_data = DB::fetch_first('SELECT * FROM %t WHERE id=\'%d\' AND `show`=\'1\'', array('comiis_app_portal_page', $comiis_pid));
    if ($comiis_data['id'] == $comiis_pid) {
        if (defined('IN_MOBILE')) {
            $comiis_templatefile = '94_touch_' . substr(md5('comiis' . $comiis_pid), 8, 16) . '_mobile.tpl.php';
            if (!file_exists(DISCUZ_ROOT . './data/template/' . $comiis_templatefile)) {
                $_G['comiis_app_portal_cache'] = 1;
                include_once DISCUZ_ROOT . './source/plugin/comiis_app_portal/comiis_app_portal_cache.inc.php';
            }
            $comiis_directory = DB::fetch_first('SELECT t.directory FROM %t s LEFT JOIN %t t ON s.templateid = t.templateid WHERE s.styleid=\'%d\'', array('common_style', 'common_template', $_G['setting']['styleid2']));
            $in_comiis_app = $comiis_directory['directory'] == './template/comiis_app' ? 1 : 0;
            if (!$_GET['inajax']) {
                if (strlen(trim(strip_tags($comiis_data['title'])))) {
                    $navtitle = trim(strip_tags($comiis_data['title']));
                    $_G['setting']['sitename'] = '';
                    $comiis_app_switch['comiis_sitename'] = '';
                } else {
                    $navtitle = $comiis_app_portal_lang['201'];
                }
                if ($in_comiis_app == 1) {
                    if ($comiis_data['header'] != '1') {
                        $_G['basescript'] = 'comiis_app_home';
                    }
                    $comiis_head = array('left' => $comiis_data['default'] == '1' ? '<a href="javascript:;" onclick="comiis_leftnv();"' . ($_G['uid'] ? ' class="kmuser"><i class="comiis_font">&#xe675;</i><em>' . avatar($_G[uid], middle) . (empty($_G['cookie']['ignore_notice']) && ($_G[member][newpm] || $_G[member][newprompt_num][follower] || $_G[member][newprompt_num][follow] || $_G[member][newprompt]) ? '<span class="icon_msgs bg_del"></span>' : '') . '</em></a>' : '><em><i class="comiis_font">&#xe603;</i></em></a>') : '', 'center' => $comiis_data['name'], 'right' => $comiis_data['openre'] == '1' ? '<a href="search.php?mod=forum"><i class="comiis_font">&#xe622;</i></a>' : ' ');
                    $metakeywords = $comiis_data['keywords'];
                    $metadescription = $comiis_data['description'];
                    include_once template('touch/common/header', 0, 'template/comiis_app/');
                    echo '<link rel="stylesheet" href="./source/plugin/comiis_app_portal/image/comiis.css?' . VERHASH . '" type="text/css">' . ($comiis_data['default'] == '1' ? '' : "<style>\r\n\t\t\t\t\t\tbody {background:" . ($comiis_data['color'] ? $comiis_data['color'] : '#f3f3f3') . " !important;}\r\n\t\t\t\t\t\tbody .bg_0,#comiis_head .comiis_head{background:" . ($comiis_data['bgcolor'] ? $comiis_data['bgcolor'] : '#53bcf5') . " !important;}\r\n\t\t\t\t\t\t.comiis_head h2,.comiis_head i,.comiis_openfootbox i,.user_lev{color:" . ($comiis_data['fontcolor'] ? $comiis_data['fontcolor'] : '#fff') . '}' . " !important;}\r\n\t\t\t\t\t\t" . ($comiis_data['bgcolor'] ? '.comiis_foot_memu .f_0 a i,.comiis_foot_memu .f_0 a{color:' . $comiis_data['bgcolor'] . ' !important;}' : '') . "\r\n\t\t\t\t\t\t</style>");
                } else {
                    include_once template('comiis_app_portal:comiis_header');
                    $comiis_app_switch['comiis_loadimg'] = 0;
                }
                include_once template('comiis_app_portal:comiis_css');
                if (file_exists(DISCUZ_ROOT . './data/template/' . $comiis_templatefile)) {
                    include_once DISCUZ_ROOT . './data/template/' . $comiis_templatefile;
                }
            }
            if ($comiis_data['loadforum'] == 1) {
                $fids = unserialize($comiis_data['fids']);
                if (!(isset($fids[0]) && ($fids[0] == '0' || $fids[0] == ''))) {
                }
                $notids = $comiis_data['tids'] ? explode(',', trim($comiis_data['tids'])) : '';
                $maxid = $_G['cache']['databasemaxid']['thread']['id'] - $_G['setting']['blockmaxaggregationitem'];
                $maxwhere = ($_G['cache']['databasemaxid']['thread']['id'] - $_G['setting']['blockmaxaggregationitem'] > 0 ? 'tid > ' . $maxid . ' AND ' : '') . ($fids ? 'fid IN (' . dimplode($fids) . ') AND ' : '') . (intval($comiis_data['times']) ? 'dateline>=\'' . (time() - intval($comiis_data['times'])) . '\' AND ' : '') . (is_array($notids) ? 'tid NOT IN (' . dimplode($notids) . ') AND ' : '') . ($comiis_data['isimage'] ? 'attachment IN (\'1\',\'2\') AND ' : '');
                $order = in_array($comiis_data['pl'], array('lastpost', 'views', 'replies', 'dateline')) ? $comiis_data['pl'] : 'dateline';
                $nums = intval($comiis_data['num']) ? intval($comiis_data['num']) : 20;
                $num = DB::result_first('SELECT COUNT(*) FROM %t WHERE isgroup=\'0\' AND ' . $maxwhere . 'displayorder>=\'0\'', array('forum_thread'));
                $page = intval(getgpc('page')) ? intval($_GET['page']) : 1;
                $comiis_page = ceil($num / $nums);
                $max_page = intval($comiis_data['pages']);
                $comiis_page = $comiis_page > $max_page ? $max_page : $comiis_page;
                $page = $page > $comiis_page ? $comiis_page : $page;
                $startlimit = ($page - 1) * $nums;
                $_G['forum_threadlist'] = DB::fetch_all('SELECT * FROM %t WHERE isgroup=\'0\' AND ' . $maxwhere . 'displayorder>=\'0\' AND status>=0 ORDER BY displayorder DESC,' . $order . ' DESC' . DB::limit($startlimit, $nums), array('forum_thread'));
                $forum_colorarray = array('', '#EE1B2E', '#EE5023', '#996600', '#3C9D40', '#2897C5', '#2B65B7', '#8F2A90', '#EC1282');
                $highlight = '';
                foreach ($_G['forum_threadlist'] as $k => $thread) {
                    if ($thread['highlight']) {
                        $string = sprintf('%02d', $thread['highlight']);
                        $stylestr = sprintf('%03b', $string[0]);
                        $highlight = ' style="';
                        $highlight .= $stylestr[0] ? 'font-weight: bold;' : '';
                        $highlight .= $stylestr[1] ? 'font-style: italic;' : '';
                        $highlight .= $stylestr[2] ? 'text-decoration: underline;' : '';
                        $highlight .= $string[1] ? 'color: ' . $forum_colorarray[$string[1]] : '';
                        $highlight .= '"';
                    } else {
                        $highlight = '';
                    }
                    $_G['forum_threadlist'][$k]['highlight'] = $highlight;
                    $_G['forum_threadlist'][$k]['dbdateline'] = $thread['dateline'];
                    $_G['forum_threadlist'][$k]['dateline'] = dgmdate($thread['dateline'], 'u', '9999', getglobal('setting/dateformat'));
                    $_G['forum_threadlist'][$k]['dblastpost'] = $thread['lastpost'];
                    $_G['forum_threadlist'][$k]['lastpost'] = dgmdate($thread['lastpost'], 'u');
                }
                $comiis_index_applist = $in_comiis_app == 1 ? intval($comiis_data['comiisstyle']) : 0;
                if ($_GET['inajax']) {
                    include template('common/header_ajax');
                }
                if ($comiis_index_applist == 0) {
                    $comiis_tids = array();
                    foreach ($_G['forum_threadlist'] as $temp) {
                        if ($temp['attachment'] == 2) {
                            $comiis_tids[] = $temp['tid'];
                        }
                    }
                    $comiis_picid_array = array();
                    if (count($comiis_tids)) {
                        require_once libfile('function/post');
                        $query = DB::query('SELECT tid, pid FROM `' . DB::table('forum_post') . '` WHERE tid IN (' . dimplode($comiis_tids) . ') AND first=1');
                        while ($temp = DB::fetch($query)) {
                            $comiis_picid_array[getattachtableid($temp[tid])][] = $temp['pid'];
                        }
                    }
                    $comiis_pic_lists = array();
                    $comiis_pic_list = array();
                    foreach ($comiis_picid_array as $tableid => $pids) {
                        if ($tableid >= 0 && !($tableid >= 10)) {
                            $query = DB::query('SELECT tid, aid, attachment, width FROM `' . DB::table('forum_attachment_' . intval($tableid)) . '` WHERE pid IN (' . dimplode($pids) . ') AND isimage IN (1, -1)');
                            while ($temp = DB::fetch($query)) {
                                $comiis_pic_list[$temp['tid']]['num'] = $comiis_pic_list[$temp['tid']]['num'] + 1;
                                if ($comiis_pic_list[$temp['tid']]['num'] == 1) {
                                    $comiis_pic_lista[$temp['tid']]['aid'][] = $temp['aid'];
                                    $comiis_pic_lista[$temp['tid']]['width'][] = $temp['width'];
                                    $comiis_pic_lista[$temp['tid']]['attachment'][] = $temp['attachment'];
                                }
                                if (!($comiis_pic_list[$temp['tid']]['num'] > 3)) {
                                    $comiis_pic_list[$temp['tid']]['aid'][] = $temp['aid'];
                                    $comiis_pic_list[$temp['tid']]['width'][] = $temp['width'];
                                    $comiis_pic_list[$temp['tid']]['attachment'][] = $temp['attachment'];
                                }
                                if (!($comiis_pic_list[$temp['tid']]['num'] > 9)) {
                                    $comiis_pic_lists[$temp['tid']]['aid'][] = $temp['aid'];
                                    $comiis_pic_lists[$temp['tid']]['width'][] = $temp['width'];
                                    $comiis_pic_lists[$temp['tid']]['attachment'][] = $temp['attachment'];
                                }
                            }
                        }
                    }
                }
                if ($in_comiis_app == 1 && $comiis_index_applist && file_exists(DISCUZ_ROOT . './source/plugin/comiis_app/language/language.' . currentlang() . '.php')) {
                    require_once DISCUZ_ROOT . './source/plugin/comiis_app/language/language.' . currentlang() . '.php';
                    loadcache(array('comiis_app_list_style', 'forums'));
                    $comiis_app_list_num = $_G['cache']['comiis_app_list_style']['default_s_style'];
                    $comiis_app_list_num = $comiis_index_applist;
                    $comiis_app_list = $comiis_liststyle_config[$comiis_app_list_num]['sn'];
                    $comiis_app_switch['comiis_list_ico'] = 1;
                    $comiis_open_displayorder = 0;
                    $comiis_forumlist_notit = 1;
                    $_G['comiis_app_var']['comiis_list_ico'] = 1;
                    $_G['comiis_app_var']['comiis_open_displayorder'] = 0;
                    $_G['comiis_app_var']['comiis_forumlist_notit'] = 1;
                    $_G['comiis_app_var']['comiis_app_list_num'] = $comiis_app_list_num;
                    $_G['comiis_app_var']['comiis_app_list'] = $comiis_app_list;
                    if (!function_exists('comiis_load') && file_exists(DISCUZ_ROOT . './source/plugin/comiis_app/function/function_comiis.php')) {
                        require_once DISCUZ_ROOT . './source/plugin/comiis_app/function/function_comiis.php';
                    }
                    comiis_load($comiis_app_list, '', '1');
                    echo '<script>var formhash = \'{FORMHASH}\', allowrecommend = \'' . $_G['group']['allowrecommend'] . "';</script>\r\n\t\t\t\t\t\t<script src='template/comiis_app/comiis/js/comiis_forumdisplay.js?" . VERHASH . "'></script>\r\n\t\t\t\t\t\t<script>comiis_recommend_addkey();</script>\r\n\t\t\t\t\t\t";
                }
                include template('comiis_app_portal:touch/comiis_forumdisplay_listok');
                if ($_GET['inajax']) {
                    include template('common/footer_ajax');
                }
            }
            if (!$_GET['inajax']) {
                $comiis_templatefooterfile = '94_touch_' . substr(md5('comiis' . $comiis_pid . 'footer'), 8, 16) . '_mobile.tpl.php';
                if (file_exists(DISCUZ_ROOT . './data/template/' . $comiis_templatefooterfile)) {
                    include_once DISCUZ_ROOT . './data/template/' . $comiis_templatefooterfile;
                }
                echo '<script src=\'./plugin.php?id=comiis_app_portal:comiis_app_portal_cache&pid=' . $comiis_pid . '&v=' . VERHASH . '\'></script>';
                if ($in_comiis_app == 1) {
                    if ($comiis_data['comiisfooter'] != '1') {
                        $comiis_foot = 'no';
                    }
                    include_once template('touch/common/footer', 0, 'template/comiis_app/');
                }
                output();
            }
        } else {
            $qrfile = DISCUZ_ROOT . './data/attachment/temp/mobile_qrcode_' . $comiis_pid . ($comiis_data['comiisheader'] == '1' ? '_s' : '') . '.png';
            if (!file_exists($qrfile)) {
                require_once DISCUZ_ROOT . 'source/plugin/mobile/qrcode.class.php';
                QRcode::png($_G['siteurl'] . ($comiis_data['comiisheader'] == '1' ? 'page-' . $comiis_pid . '.html' : 'plugin.php?id=comiis_app_portal&pid=' . $comiis_pid . '&mobile=2'), $qrfile, 4, 6);
            }
            include_once template('comiis_app_portal:comiis_qrcode');
        }
    } else {
        showmessage($comiis_app_portal_lang['76']);
    }
} else {
    showmessage($comiis_app_portal_lang['77']);
}
