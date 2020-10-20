<?php

if (!defined('IN_DISCUZ')) {
    exit('Access Denied');
}
function comiis_read_setting($fieldid, $space = array(), $showstatus = false, $ignoreunchangable = false, $ignoreshowerror = false)
{
    global $_G;
    if (empty($_G['cache']['profilesetting'])) {
        loadcache('profilesetting');
    }
    $field = $_G['cache']['profilesetting'][$fieldid];
    if (empty($field) || !$field['available'] || in_array($fieldid, array('uid', 'constellation', 'zodiac', 'birthmonth', 'birthyear', 'birthprovince', 'birthdist', 'birthcommunity', 'resideprovince', 'residedist', 'residecommunity'))) {
        return '';
    }
    if ($showstatus) {
        $uid = intval($space['uid']);
        if ($uid && !isset($_G['profile_verifys'][$uid])) {
            $_G['profile_verifys'][$uid] = array();
            $value = C::t('common_member_verify_info')->fetch_by_uid_verifytype($uid, 0);
            if (C::t('common_member_verify_info')->fetch_by_uid_verifytype($uid, 0)) {
                $fields = dunserialize($value['field']);
                foreach ($fields as $key => $fvalue) {
                    if ($_G['cache']['profilesetting'][$key]['needverify']) {
                        $_G['profile_verifys'][$uid][$key] = $fvalue;
                    }
                }
            }
        }
        $verifyvalue = null;
        if (isset($_G['profile_verifys'][$uid][$fieldid])) {
            if ($fieldid == 'gender') {
                $verifyvalue = lang('space', 'gender_' . intval($_G['profile_verifys'][$uid][$fieldid]));
            } elseif ($fieldid == 'birthday') {
                $verifyvalue = $_G['profile_verifys'][$uid]['birthyear'] . '-' . $_G['profile_verifys'][$uid]['birthmonth'] . '-' . $_G['profile_verifys'][$uid]['birthday'];
            } else {
                $verifyvalue = $_G['profile_verifys'][$uid][$fieldid];
            }
        }
    }
    $html = '';
    $field['unchangeable'] = !$ignoreunchangable && $field['unchangeable'] ? 1 : 0;
    if ($fieldid == 'birthday') {
        if ($field['unchangeable'] && !empty($space[$fieldid])) {
            return '<div class="comiis_styli">' . $space['birthyear'] . '-' . $space['birthmonth'] . '-' . $space['birthday'] . '</div>';
        }
        $birthyeayhtml = '';
        $nowy = dgmdate($_G['timestamp'], 'Y');
        $i = 0;
        while (!($i >= 100)) {
            $they = $nowy - $i;
            $selectstr = $they == $space['birthyear'] ? ' selected' : '';
            $birthyeayhtml .= '<option value="' . $they . '"' . $selectstr . '>' . $they . '</option>';
            ($i += 1) + -1;
        }
        $birthmonthhtml = '';
        $i = 1;
        while (!($i >= 13)) {
            $selectstr = $i == $space['birthmonth'] ? ' selected' : '';
            $birthmonthhtml .= '<option value="' . $i . '"' . $selectstr . '>' . $i . '</option>';
            ($i += 1) + -1;
        }
        $birthdayhtml = '';
        if (empty($space['birthmonth']) || in_array($space['birthmonth'], array(1, 3, 5, 7, 8, 10, 12))) {
            $days = 31;
        } elseif (in_array($space['birthmonth'], array(4, 6, 9, 11))) {
            $days = 30;
        } elseif ($space['birthyear'] && ($space['birthyear'] % 400 == 0 || $space['birthyear'] % 4 == 0 && $space['birthyear'] % 400 != 0)) {
            $days = 29;
        } else {
            $days = 28;
        }
        $i = 1;
        while (!($i > $days)) {
            $selectstr = $i == $space['birthday'] ? ' selected' : '';
            $birthdayhtml .= '<option value="' . $i . '"' . $selectstr . '>' . $i . '</option>';
            ($i += 1) + -1;
        }
        $html = '<select name="birthyear" id="birthyear" class="ps" onchange="showbirthday();" tabindex="1">' . '<option value="">' . lang('space', 'year') . '</option>' . $birthyeayhtml . '</select>' . '&nbsp;&nbsp;' . '<select name="birthmonth" id="birthmonth" class="ps" onchange="showbirthday();" tabindex="1">' . '<option value="">' . lang('space', 'month') . '</option>' . $birthmonthhtml . '</select>' . '&nbsp;&nbsp;' . '<select name="birthday" id="birthday" class="ps" tabindex="1">' . '<option value="">' . lang('space', 'day') . '</option>' . $birthdayhtml . '</select>';
    } elseif ($fieldid == 'gender') {
        if ($field['unchangeable'] && $space[$fieldid] > 0) {
            return '<div class="comiis_styli">' . lang('space', 'gender_' . intval($space[$fieldid])) . '</div>';
        }
        $selected = array($space[$fieldid] => ' selected="selected"');
        $html = '<div class="comiis_login_select"><span class="inner"><i class="comiis_font f_d">&#xe60c;</i><span class="z"><span class="comiis_question f_c" id="gender_name"</span></span></span><select name="gender" id="gender" tabindex="1">';
        if ($field['unchangeable']) {
            $html .= '<option value="">' . lang('space', 'gender') . '</option>';
        } else {
            $html .= '<option value="0"' . ($space[$fieldid] == '0' ? ' selected="selected"' : '') . '>' . lang('space', 'gender_0') . '</option>';
        }
        $html .= '<option value="1"' . ($space[$fieldid] == '1' ? ' selected="selected"' : '') . '>' . lang('space', 'gender_1') . '</option>' . '<option value="2"' . ($space[$fieldid] == '2' ? ' selected="selected"' : '') . '>' . lang('space', 'gender_2') . '</option>' . '</select></div>';
    } elseif ($fieldid == 'birthcity') {
        if ($field['unchangeable'] && !empty($space[$fieldid])) {
            return '<div class="comiis_styli">' . $space['birthprovince'] . '-' . $space['birthcity'] . '</div>';
        }
        $values = array(0, 0, 0, 0);
        $elems = array('birthprovince', 'birthcity', 'birthdist', 'birthcommunity');
        if (!empty($space['birthprovince'])) {
            $html = '<div id="birthdistrictbox">';
            $html .= '<div class="comiis_styli">' . profile_show('birthcity', $space);
            $html .= '&nbsp;<a href="javascript:;" onclick="showdistrict(\'birthdistrictbox\', [\'birthprovince\', \'birthcity\', \'birthdist\', \'birthcommunity\'], 4, \'\', \'birth\'); return false;" class="f_g">[' . lang('spacecp', 'profile_edit') . ']</a></div>';
            $html .= '</div>';
        } else {
            $html = '<div id="birthdistrictbox">' . comiis_showdistrict($values, $elems, 'birthdistrictbox', 1, 'birth') . '</div>';
        }
    } elseif ($fieldid == 'residecity') {
        if ($field['unchangeable'] && !empty($space[$fieldid])) {
            return '<div class="comiis_styli">' . $space['resideprovince'] . '-' . $space['residecity'] . '</div>';
        }
        $values = array(0, 0, 0, 0);
        $elems = array('resideprovince', 'residecity', 'residedist', 'residecommunity');
        if (!empty($space['resideprovince'])) {
            $html = '<div id="residedistrictbox">';
            $html .= '<div class="comiis_styli">' . profile_show('residecity', $space);
            $html .= '&nbsp;<a href="javascript:;" onclick="showdistrict(\'residedistrictbox\', [\'resideprovince\', \'residecity\', \'residedist\', \'residecommunity\'], 4, \'\', \'reside\'); return false;" class="f_g">[' . lang('spacecp', 'profile_edit') . ']</a></div>';
            $html .= '</div>';
        } else {
            $html = '<div id="residedistrictbox">' . comiis_showdistrict($values, $elems, 'residedistrictbox', 1, 'reside') . '</div>';
        }
    } elseif ($fieldid == 'qq') {
        $html = '<input type="text" name="' . $fieldid . '" id="' . $fieldid . '" class="comiis_input kmshow" value="' . $space[$fieldid] . '" tabindex="1" />';
    } else {
        if ($field['unchangeable'] && $space[$fieldid] != '') {
            if ($field['formtype'] == 'file') {
                $imgurl = getglobal('setting/attachurl') . './profile/' . $space[$fieldid];
                return '<span><a href="' . $imgurl . '" target="_blank"><img src="' . $imgurl . '"  style="max-width: 500px;" /></a></span>';
            }
            return '<span>' . nl2br($space[$fieldid]) . '</span>';
        }
        if ($field['formtype'] == 'textarea') {
            $html = '<textarea name="' . $fieldid . '" id="' . $fieldid . '"class="comiis_pxs" tabindex="1">' . $space[$fieldid] . '</textarea>';
        } elseif ($field['formtype'] == 'select') {
            $field['choices'] = explode("\n", $field['choices']);
            $html = '<div class="comiis_login_select"><span class="inner"><i class="comiis_font f_d">&#xe60c;</i><span class="z"><span class="comiis_question f_c" id="' . $fieldid . '_name"></span></span></span><select name="' . $fieldid . '" id="' . $fieldid . '" tabindex="1">';
            foreach ($field['choices'] as $op) {
                $html .= '<option value="' . $op . '"' . ($op == $space[$fieldid] ? 'selected="selected"' : '') . ('>' . $op . '</option>');
            }
            $html .= '</select></div>';
        } elseif ($field['formtype'] == 'list') {
            $field['choices'] = explode("\n", $field['choices']);
            $html = '<div class="comiis_p5 b_ok bg_e"><select name="' . $fieldid . '[]" id="' . $fieldid . '" multiple="multiplue" tabindex="1" style="width:100%;background:none;border:none;-webkit-appearance:none;-moz-appearance:none;-o-appearance:none;appearance:none;">';
            $space[$fieldid] = explode("\n", $space[$fieldid]);
            foreach ($field['choices'] as $op) {
                $html .= '<option value="' . $op . '"' . (in_array($op, $space[$fieldid]) ? 'selected="selected"' : '') . ('>' . $op . '</option>');
            }
            $html .= '</select>';
        } elseif ($field['formtype'] == 'checkbox') {
            $field['choices'] = explode("\n", $field['choices']);
            $space[$fieldid] = explode("\n", $space[$fieldid]);
            foreach ($field['choices'] as $k => $op) {
                $html .= '' . ('<input type="checkbox" name="' . $fieldid . '[]" id="' . $fieldid . '_' . $k . '" value="' . $op . '" tabindex="1"') . (in_array($op, $space[$fieldid]) ? ' checked="checked"' : '') . ' />' . ('<label for="' . $fieldid . '_' . $k . '"><i class="comiis_font f_d"></i>' . $op . '</label>');
            }
        } elseif ($field['formtype'] == 'radio') {
            $field['choices'] = explode("\n", $field['choices']);
            foreach ($field['choices'] as $k => $op) {
                $html .= '' . ('<input type="radio" id="' . $fieldid . '_' . $k . '" name="' . $fieldid . '" value="' . $op . '" tabindex="1"') . ($op == $space[$fieldid] ? ' checked="checked"' : '') . ' />' . ('<label for="' . $fieldid . '_' . $k . '"><i class="comiis_font f_d"></i>' . $op . '</label>');
            }
        } elseif ($field['formtype'] == 'file') {
            $html = '<input type="file" value="" name="' . $fieldid . '" id="' . $fieldid . '" tabindex="1" class="pf" style="height:26px;" /><input type="hidden" name="' . $fieldid . '" value="' . $space[$fieldid] . '" />';
            if (!empty($space[$fieldid])) {
                $url = getglobal('setting/attachurl') . './profile/' . $space[$fieldid];
                $html .= '&nbsp;<label><input type="checkbox" class="checkbox" tabindex="1" name="deletefile[' . $fieldid . ']" id="' . $fieldid . '" value="yes" />' . lang('spacecp', 'delete') . ('</label><br /><a href="' . $url . '" target="_blank"><img src="' . $url . '" width="200" /></a>');
            }
        } else {
            $html = '<input type="text" name="' . $fieldid . '" id="' . $fieldid . '" class="comiis_input kmshow" value="' . $space[$fieldid] . '" tabindex="1" />';
        }
    }
    $html .= !$ignoreshowerror ? '' : '';
    if ($showstatus) {
        $html .= '<p class="d">' . $value['description'];
        if ($space[$fieldid] == '' && $value['unchangeable']) {
            $html .= lang('spacecp', 'profile_unchangeable');
        }
        if ($verifyvalue !== null) {
            if ($field['formtype'] == 'file') {
                $imgurl = getglobal('setting/attachurl') . './profile/' . $verifyvalue;
                $verifyvalue = '<img src=\'' . $imgurl . '\' alt=\'' . $imgurl . '\' style=\'max-width: 500px;\'/>';
            }
            $html .= lang('spacecp', 'profile_is_verifying') . ('<p id="newvalue_' . $fieldid . '" style="display:none">') . $verifyvalue . '</p>';
        } elseif ($field['needverify']) {
            $html .= lang('spacecp', 'profile_need_verifying');
        }
        $html .= '</p>';
    }
    return $html;
}
function comiis_showdistrict($values, $elems = array(), $container = 'districtbox', $showlevel = null, $containertype = 'birth')
{
    $html = '';
    if (!preg_match('/^[A-Za-z0-9_]+$/', $container)) {
        return $html;
    }
    $showlevel = !empty($showlevel) ? intval($showlevel) : count($values);
    $showlevel = !($showlevel > 4) ? $showlevel : 4;
    $upids = array(0);
    $i = 0;
    while (!($i >= $showlevel)) {
        if (empty($values[$i])) {
            $j = $i;
            while (!($j >= $showlevel)) {
                $values[$j] = '';
                ($j += 1) + -1;
            }
            break;
        }
        $upids[] = intval($values[$i]);
        ($i += 1) + -1;
    }
    $options = array(1 => array(), 2 => array(), 3 => array(), 4 => array());
    if ($upids && is_array($upids)) {
        foreach (C::t('common_district')->fetch_all_by_upid($upids, 'displayorder', 'ASC') as $value) {
            if (!($value['level'] == 1 && ($value['id'] != $values[0] && ($value['usetype'] == 0 || !($containertype == 'birth' && in_array($value['usetype'], array(1, 3)) || $containertype != 'birth' && in_array($value['usetype'], array(2, 3))))))) {
                $options[$value['level']][] = array($value['id'], $value['name']);
            }
        }
    }
    $names = array('province', 'city', 'district', 'community');
    $i = 0;
    while (!($i >= 4)) {
        if (!empty($elems[$i])) {
            $elems[$i] = dhtmlspecialchars(preg_replace('/[^\\[A-Za-z0-9_\\]]/', '', $elems[$i]));
        } else {
            $elems[$i] = ($containertype == 'birth' ? 'birth' : 'reside') . $names[$i];
        }
        ($i += 1) + -1;
    }
    $i = 0;
    while (true) {
        if ($i >= $showlevel) {
            return $html;
        }
        $level = $i + 1;
        if (!empty($options[$level])) {
            $jscall = 'showdistrict(\'' . $container . '\', [\'' . $elems['0'] . '\', \'' . $elems['1'] . '\', \'' . $elems['2'] . '\', \'' . $elems['3'] . '\'], ' . $showlevel . ', ' . $level . ', \'' . $containertype . '\')';
            $html .= "\r\n\t\t\t\r\n\t\t\t<div class=\"comiis_login_select" . ($i ? 'b_t' : '') . ($i == 0 ? ' comiis_styli' : '') . '"><span class="inner"><i class="comiis_font f_d">&#xe60c;</i><span class="z"><span class="' . $elems[$i] . '_text f_c" id="' . $elems[$i] . "_name\"></span></span></span>\r\n\t\t\t\r\n\t\t\t<select name=\"" . $elems[$i] . '" id="' . $elems[$i] . '" onchange="' . $jscall . '" tabindex="1">';
            $html .= '<option value="">' . lang('spacecp', 'district_level_' . $level) . '</option>';
            foreach ($options[$level] as $option) {
                $selected = $option[0] == $values[$i] ? ' selected="selected"' : '';
                $html .= '<option did="' . $option[0] . '" value="' . $option[1] . '"' . $selected . '>' . $option[1] . '</option>';
            }
            $html .= '</select></div>';
        }
        ($i += 1) + -1;
    }
}
function comiis_readset($allowitems, $fieldid, $space, $vid)
{
    $htmls = array();
    foreach ($allowitems as $fieldid) {
        if (!in_array($fieldid, array('sightml', 'customstatus', 'timeoffset'))) {
            $html = comiis_read_setting($fieldid, $space, $vid ? false : true);
            if ($html) {
                $htmls[$fieldid] = $html;
            }
        }
    }
    return $htmls;
}