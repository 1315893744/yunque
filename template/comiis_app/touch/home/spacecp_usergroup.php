<?PHP exit('Access Denied');?>
<!--{template common/header}-->
<!--{if !in_array($do, array('buy', 'exit')) && $do != 'switch'}-->
	<!--{if $_G['comiis_homegid'] == 0}-->
		<!--{eval $n = 0;}-->
		<!--{loop $_G['cache']['usergroups'] $k $v}-->
			<!--{if $v['type'] == 'member'}-->
				<!--{if $n == 1}-->
					<!--{eval $a = $k; $grnum = $v['creditshigher'];}-->
					<!--{eval break;}-->
				<!--{/if}-->
				<!--{if $_G['group']['groupid'] == $k}-->
					<!--{eval $n = 1;}-->
				<!--{/if}-->
			<!--{/if}-->
		<!--{/loop}-->
	<!--{else}-->
		<!--{eval $a = $_GET['gid']; $grnum = $_G['cache']['usergroups'][$_GET['gid']]['creditshigher'];}-->
	<!--{/if}-->
	<!--{if $_G['comiis_homegid'] == 0 || $do == 'expiry' || $do == 'list'}-->
    <div class="comiis_levhead b_b">
        <div class="user_img"><img src="<!--{avatar($space[uid], middle, true)}-->" /></div>
        <h2 class="f_b">{$comiis_lang['all58']}{$comiis_lang['tip262']}: $_G[group][grouptitle]</h2>
		<!--{if $_G['group']['groupcreditslower'] && $_G['cache']['usergroups'][$a]['pubtype'] != 'free' && $_G['cache']['usergroups'][$a]['pubtype'] != 'buy'}-->
        <div class="lev_x comiis_flex">
            <em class="f_c">{if $comiis_app_switch['comiis_lev_txt']}{$comiis_app_switch['comiis_lev_txt']}{else}Lv.{/if}{$_G[group]['stars']}</em>
            <span class="flex bg_b"><em class="z bg_0" style="width:{echo round($_G['member']['credits']/$grnum * 100, 1);}%;"></em></span>
            <em class="f_c">{if $comiis_app_switch['comiis_lev_txt']}{$comiis_app_switch['comiis_lev_txt']}{else}Lv.{/if}{$_G['cache']['usergroups'][$a]['stars']}</em>
        </div>
        <h3 class="f_c">{$comiis_lang['tip265']} <span class="f_a">{echo $grnum - $_G['member']['credits']}</span> {lang credits}{$comiis_lang['tip266']} {$_G['cache']['usergroups'][$a]['grouptitle']}</h3>
        <!--{/if}-->        
    </div>
    <div class="styli_h10 bg_e b_b"></div>
    <!--{/if}-->
    <!--{if $comiis_app_switch['comiis_subnv_top'] != 1}--><div style="height:41px;"><div class="comiis_scrollTop_box"><!--{/if}-->
    <div class="comiis_topnv bg_f b_b">
      <ul class="comiis_flex">
        <li class="flex{if $activeus[usergroup] && $_GET['dos'] != 'show'} f_0{/if}">{if $activeus[usergroup] && $_GET['dos'] != 'show'}<em class="bg_0"></em>{/if}<a href="home.php?mod=spacecp&ac=usergroup"{if $activeus[usergroup] && $_GET['dos'] != 'show'}{else} class="b_b f_b"{/if}><!--{if $_G['comiis_homegid'] == 0}-->{$comiis_lang['all58']}{$comiis_lang['tip262']}<!--{else}-->{$comiis_lang['tip262']}{$comiis_lang['tip267']}<!--{/if}--></a></li>
        <li class="flex{if $do == 'expiry' || $do == 'list'} f_0{/if}">{if $do == 'expiry' || $do == 'list'}<em class="bg_0"></em>{/if}<a href="home.php?mod=spacecp&ac=usergroup&do={if $do == 'expiry'}expiry{else}list{/if}"{if $do == 'expiry' || $do == 'list'}{else} class="b_b f_b"{/if}>{$comiis_lang['tip262']}{$comiis_lang['attachment_buy']}</a></li>
      </ul>
    </div>
    <!--{if $comiis_app_switch['comiis_subnv_top'] != 1}--></div></div><!--{/if}-->
<!--{/if}-->
<!--{if in_array($do, array('buy', 'exit'))}-->
	<div class="comiis_tip bg_f cl">
	<div id="return_$_GET[handlekey]" class="tip_tit bg_e f_b b_b"><!--{if $join}-->{lang memcp_usergroups_joinbuy}<!--{else}-->{lang memcp_usergroups_joinexit}<!--{/if}--></div>
	<form id="buygroupform_{$groupid}" name="buygroupform_{$groupid}" method="post" autocomplete="off" action="home.php?mod=spacecp&ac=usergroup&do=$do&groupid=$groupid"{if !empty($_GET['inajax'])} onsubmit="ajaxpost('buygroupform_{$groupid}', 'return_$_GET['handlekey']', 'return_$_GET['handlekey']', 'onerror');return false;"{/if}>
		<input type="hidden" name="referer" value="{echo dreferer()}" />
		<input type="hidden" name="buysubmit" value="true" />
		<input type="hidden" name="gid" value="$_GET[gid]" />
		<!--{if $_G[inajax]}--><input type="hidden" name="handlekey" value="$_GET[handlekey]" /><!--{/if}-->
		<input type="hidden" name="formhash" value="{FORMHASH}" />
		<div class="comiis_styli_tip">
            <div class="tip_form">
                <!--{if $join}-->
                    <!--{if $group['dailyprice']}-->
                        <li class="tip_txt comiis_flex b_b">
                            <div class="styli_tit f_c">{lang memcp_usergroups_dailyprice}</div>
                            <div class="flex f_a">$group[dailyprice] {$_G[setting][extcredits][$_G[setting][creditstrans]][unit]}{$_G[setting][extcredits][$_G[setting][creditstrans]][title]}</div>
                        </li>
                        <li class="tip_txt comiis_flex b_b">
                            <div class="styli_tit f_c">{lang memcp_usergroups_credit}</div>
                            <div class="flex f_a">$usermaxdays {lang days}</div>
                        </li>
                        <li class="tip_txt comiis_flex b_b">
                            <div class="styli_tit f_c">{lang memcp_usergroups_span}</div>
                            <div class="flex bg_e" style="padding:0 5px;"><input type="text" name="days" value="$group[minspan]" class="comiis_px f_a" onkeyup="change_credits_need(this.value)" /></div>
                           <div class="styli_r">{lang days}</div>
                        </li>
                        <li class="tip_txt comiis_flex">
                            <div class="styli_tit f_c">{lang credits_need}{$_G[setting][extcredits][$_G[setting][creditstrans]][title]}</div>
                            <div class="flex f_a" id="credits_need">
                                {$_G[setting][extcredits][$_G[setting][creditstrans]][unit]}
                                <script language="javascript">
                                    var dailyprice = $group[dailyprice];
                                    function change_credits_need(daynum) {
                                        if(!isNaN(parseInt(daynum))) {
                                            $('#credits_need').html(parseInt(daynum) * dailyprice);
                                        } else {
                                            $('#credits_need').html('0');
                                        }
                                    }
                                    change_credits_need($group[minspan]);
                                </script>
                            </div>
                        </li>
                        <li class="bg_h f_c mb10" style="padding:6px 8px;font-size:12px;">
                                {lang memcp_usergroups_explain}:
                                <!--{if $join}-->
                                    {lang memcp_usergroups_join_comment}
                                <!--{else}-->
                                    {lang memcp_usergroups_exit_comment}
                                <!--{/if}-->
                        </li>
                    <!--{else}-->
                        <li class="tip_txt f_a">{lang memcp_usergroups_explain}: {lang memcp_usergroups_free_comment}</li>
                    <!--{/if}-->
                <!--{else}-->                    
                    <li class="tip_txt f_a">{lang memcp_usergroups_explain}:
                        <!--{if $group[type] != 'special' || $group[system]=='private'}-->
                            {lang memcp_usergroups_admin_exit_comment}
                        <!--{elseif $group['dailyprice']}-->
                            {lang memcp_usergroups_exit_comment}
                        <!--{else}-->
                            {lang memcp_usergroups_open_exit_comment}
                        <!--{/if}-->
                    </li>
                <!--{/if}-->
            </div>
		</div>
		<dd class="b_t cl">
            <!--{if $comiis_app_switch['comiis_post_btnwz'] == 1}-->
                <a href="javascript:;" onclick="popup.close();" class="tip_btn bg_f f_b">{lang cancel}</a>
                <button type="submit" name="editsubmit_btn" id="editsubmit_btn" value="true" class="formdialog tip_btn bg_f f_0"><span class="tip_lx">{lang submit}</span></button>
            <!--{else}-->
                <button type="submit" name="editsubmit_btn" id="editsubmit_btn" value="true" class="formdialog tip_btn bg_f f_0">{lang submit}</button>
                <a href="javascript:;" onclick="popup.close();" class="tip_btn bg_f f_b"><span class="tip_lx">{lang cancel}</span></a>		
            <!--{/if}-->
		</dd>
	</form>
	</div>
<!--{elseif $do == 'switch'}-->
	<div class="comiis_tip bg_f cl">
	<div id="return_$_GET[handlekey]" class="tip_tit bg_e f_b b_b">{lang memcp_usergroups_switch}</div>
	<form id="switchgroupform_{$groupid}" name="switchgroupform_{$groupid}" method="post" autocomplete="off" action="home.php?mod=spacecp&ac=usergroup&do=switch&groupid=$groupid"{if !empty($_GET['inajax'])} onsubmit="ajaxpost('switchgroupform_{$groupid}', 'return_$_GET['handlekey']', 'return_$_GET['handlekey']', 'onerror');return false;"{/if}>
		<input type="hidden" name="referer" value="{echo dreferer()}" />
		<input type="hidden" name="groupsubmit" value="true" />
		<input type="hidden" name="gid" value="$_GET[gid]" />
		<!--{if $_G[inajax]}--><input type="hidden" name="handlekey" value="$_GET[handlekey]" /><!--{/if}-->
		<input type="hidden" name="formhash" value="{FORMHASH}" />
		<div class="comiis_styli_tip">
            <div class="tip_form">
                <li class="tip_txt comiis_flex b_b">
                    <div class="styli_tit f_c">{lang memcp_usergroups_main_old}</div>
                    <div class="flex">$_G[group][grouptitle]</div>
                </li>
                <li class="tip_txt comiis_flex">
                    <div class="styli_tit f_c">{lang memcp_usergroups_main_new}</div>
                    <div class="flex">$group[grouptitle]</div>
                </li>
            </div>
		</div>
		<dd class="b_t cl">
            <!--{if $comiis_app_switch['comiis_post_btnwz'] == 1}-->
                <a href="javascript:;" onclick="popup.close();" class="tip_btn bg_f f_b">{lang cancel}</a>
                <button type="submit" name="editsubmit_btn" id="editsubmit_btn" value="true" class="formdialog tip_btn bg_f f_0"><span class="tip_lx">{lang submit}</span></button>
            <!--{else}-->
                <button type="submit" name="editsubmit_btn" id="editsubmit_btn" value="true" class="formdialog tip_btn bg_f f_0">{lang submit}</button>
                <a href="javascript:;" onclick="popup.close();" class="tip_btn bg_f f_b"><span class="tip_lx">{lang cancel}</span></a>		
            <!--{/if}-->
		</dd>
	</form>
	</div>
<!--{elseif $do == 'expiry' || $do == 'list'}-->
    <div class="comiis_p12 bg_e f13 f_b b_b cl">
        {lang youhave} <span class="f_a">$usermoney</span> {$_G[setting][extcredits][$_G[setting][creditstrans]][unit]}{$_G[setting][extcredits][$_G[setting][creditstrans]][title]}
    </div>
    <!--{if $do == 'expiry'}-->
    <div class="cl" style="padding:5px 12px 0;margin-bottom:-8px;">
        <div class="comiis_quote bg_h f_a">{lang usergroup_expired}</div>
    </div>
    <!--{/if}-->
    <!--{if $expirylist}-->
    <div class="comiis_userlist01 cl">
        <ul>
            <!--{loop $expirylist $groupid $group}-->
            <li class="b_t">
                <p class="ybtn">
                    <!--{if in_array($groupid, $extgroupids) || $groupid == $_G['groupid']}-->
                        <!--{if $groupid != $_G['groupid']}-->
                            <!--{if !$group[noswitch]}-->
                                <a href="home.php?mod=spacecp&ac=usergroup&do=switch&groupid=$groupid&handlekey=switchgrouphk" class="dialog comiis_minibtn bg_c f_f">{lang memcp_usergroups_set_main}</a>
                            <!--{/if}-->
                            <!--{if !$group['maingroup']}-->
                                <!--{if $_G['cache']['usergroups'][$groupid]['pubtype'] == 'buy'}-->
                                    <a href="home.php?mod=spacecp&ac=usergroup&do=buy&groupid=$groupid&handlekey=buygrouphk" class="dialog comiis_minibtn bg_c f_f">{lang renew}</a>
                                <!--{/if}-->
                                <a href="home.php?mod=spacecp&ac=usergroup&do=exit&groupid=$groupid&handlekey=exitgrouphk" class="dialog comiis_minibtn bg_c f_f">{lang memcp_usergroups_exit}</a>
                            <!--{/if}-->
                        <!--{else}-->
                            <!--{if $_G['cache']['usergroups'][$groupid]['pubtype'] == 'buy'}-->
                                <a href="home.php?mod=spacecp&ac=usergroup&do=buy&groupid=$groupid&handlekey=buygrouphk" class="dialog comiis_minibtn bg_c f_f">{lang renew}</a>
                            <!--{/if}-->
                            {lang main_usergroup}
                        <!--{/if}-->
                    <!--{elseif $_G['cache']['usergroups'][$groupid]['pubtype'] == 'free'}-->
                        <a href="home.php?mod=spacecp&ac=usergroup&do=buy&groupid=$groupid&handlekey=buygrouphk" class="dialog comiis_minibtn bg_c f_f">{lang free_buy}</a>
                    <!--{elseif $_G['cache']['usergroups'][$groupid]['pubtype'] == 'buy'}-->
                        <a href="home.php?mod=spacecp&ac=usergroup&do=buy&groupid=$groupid&handlekey=buygrouphk" class="dialog comiis_minibtn bg_c f_f">{lang memcp_usergroups_buy}</a>
                    <!--{/if}-->
                </p>
                <p class="tit">
                    <a href="home.php?mod=spacecp&ac=usergroup&gid=$groupid">$group[grouptitle]</a>
                </p>
                <p class="txt f_a">
                    <!--{if $_G['cache']['usergroups'][$groupid]['pubtype'] == 'buy' && $group[dailyprice]}-->
                        $group[dailyprice]{$_G[setting][extcredits][$_G[setting][creditstrans]][unit]}{$_G[setting][extcredits][$_G[setting][creditstrans]][title]}/{lang days}
                    <!--{elseif $_G['cache']['usergroups'][$groupid]['pubtype'] == 'free'}-->
                        {lang free}
                    <!--{/if}-->
                    <!--{if $group[time]}-->, <font class="f_wb">$group[time] {$comiis_lang['tip263']}</font><!--{elseif $group[usermaxdays]}--><font class="f_d">, {$comiis_lang['tip264']}{$group[usermaxdays]}{lang days}</font><!--{/if}-->
                </p>
            </li>
            <!--{/loop}-->
        </ul>
    </div>
    <!--{else}-->
    <div class="comiis_notip comiis_sofa cl">
        <i class="comiis_font f_e mt15 cl">&#xe613;</i>
        <span class="f_d">{lang memcp_usergroup_unallow}</span>
    </div>
    <!--{/if}-->
<!--{else}-->
    <!--{eval
        $permtype = array(0 => '{lang permission_menu_normaloptions}', 1 => '{lang permission_modoptions_name}');
    }-->
    <div class="comiis_levshow bg_f">
        <!--{if $_G['comiis_homegid'] == 0}-->
            <table cellpadding="0" cellspacing="0">
                <tr><th>{$comiis_lang['all58']}{$comiis_lang['tip262']}</th><td>$maingroup[grouptitle]</td></tr>
                <tr class="bg_e"><th>{lang credits}</th><td>$space[credits]</td></tr>
                <tr><th>{lang user_level}</th><td><span class="levico bg_a f_f"{if $_G['cache']['usergroups'][$maingroup['groupid']]['color']} style="background:$_G['cache']['usergroups'][$maingroup['groupid']]['color'] !important"{/if}>{if $comiis_app_switch['comiis_lev_txt']}{$comiis_app_switch['comiis_lev_txt']}{else}Lv.{/if}{$_G['cache']['usergroups'][$maingroup['groupid']]['stars']}</span><!--{echo showstars($_G['cache']['usergroups'][$maingroup['groupid']]['stars']);}--></td></tr>
                <!--{echo permtbody($maingroup)}-->
            </table>
        <!--{else}-->
            <!--{if $switchtype == 'user'}--><!--{eval $cid = 1;$tlang = '{lang usergroup_group1}';}--><!--{/if}-->
            <!--{if $switchtype == 'upgrade'}--><!--{eval $cid = 2;$tlang = '{lang usergroup_group2}';}--><!--{/if}-->
            <!--{if $switchtype == 'admin'}--><!--{eval $cid = 3;$tlang = '{lang usergroup_group3}';}--><!--{/if}-->
            <table cellpadding="0" cellspacing="0">
                <tr><th>{$comiis_lang['tip262']}</th><td>$currentgrouptitle</td></tr>
                <tr class="bg_e">
                    <th>{lang credits}</th>
                    <td>
                        <!--{if $group['grouptype'] == 'member'}-->
                            <!--{eval $v = $group[groupcreditshigher] - $_G['member']['credits'];}-->
                            <!--{if $_G['group']['grouptype'] == 'member' && $v > 0}-->
                                {lang spacecp_usergroup_message1} $v
                            <!--{else}-->
                                {lang spacecp_usergroup_message2} $group[groupcreditshigher]
                            <!--{/if}-->
                        <!--{/if}-->
                        <!--{if isset($publicgroup[$group['groupid']]) && $group['groupid'] != $_G['groupid'] && $publicgroup[$group['groupid']]['allowsetmain']}-->
                            <a href="home.php?mod=spacecp&ac=usergroup&do=switch&groupid=$group['groupid']&gid=$_GET[gid]&handlekey=switchgrouphk" class="dialog f_a">{lang memcp_usergroups_set_main}</a>
                        <!--{/if}-->
                        <!--{if in_array($group['groupid'], $extgroupids) && $switchmaingroup && $group['grouptype'] == 'special' && $group['groupid'] != $_G['groupid']}-->
                            <!--{if $_G['cache']['usergroups'][$group['groupid']]['pubtype'] == 'buy'}-->
                                <a href="home.php?mod=spacecp&ac=usergroup&do=buy&groupid=$group['groupid']&gid=$_GET[gid]&handlekey=buygrouphk" class="dialog f_a">{lang renew}</a>
                            <!--{/if}-->
                            <a href="home.php?mod=spacecp&ac=usergroup&do=exit&groupid=$group['groupid']&gid=$_GET[gid]&handlekey=exitgrouphk" class="dialog f_a">{lang memcp_usergroups_exit}</a>
                        <!--{/if}-->
                        <!--{if $group['grouptype']=='special' && $group['groupid'] != $_G['groupid'] && array_key_exists($group['groupid'], $publicgroup) && !$publicgroup[$group['groupid']]['allowsetmain']}-->
                            <a href="home.php?mod=spacecp&ac=usergroup&do=buy&groupid=$group['groupid']&gid=$_GET[gid]&handlekey=buygrouphk" class="dialog f_a">{lang memcp_usergroups_buy}</a>
                        <!--{/if}-->
                        <!--{if array_key_exists($group['groupid'], $groupterms['ext'])}-->
                            {lang memcp_usergroups_timelimit}: <!--{date($groupterms[ext][$group['groupid']])}-->
                        <!--{/if}-->
                    </td>
                </tr>
                <tr><th>{lang user_level}</th><td><span class="levico bg_a f_f"{if $_G['cache']['usergroups'][$a]['color']} style="background:$_G['cache']['usergroups'][$a]['color'] !important"{/if}>{if $comiis_app_switch['comiis_lev_txt']}{$comiis_app_switch['comiis_lev_txt']}{else}Lv.{/if}{$_G['cache']['usergroups'][$a]['stars']}</span> <!--{echo showstars($_G['cache']['usergroups'][$maingroup['groupid']]['stars']);}--></td></tr>
                <!--{echo permtbody($group)}-->
            </table>
        <!--{/if}-->
    </div>
<!--{/if}-->
{eval
function permtbody($maingroup) {
global $_G, $Tlang, $bperms, $pperms, $sperms, $aperms, $permlang;
}
<!--{loop $bperms $key $groupbperm}-->
<tr{if $key%2==0} class="bg_e"{/if}>
    <th>$permlang['perms_'.$groupbperm]</th>
    <td>
        <!--{if $groupbperm == 'creditshigher' || $groupbperm == 'readaccess' || $groupbperm == 'maxpmnum'}-->
        $maingroup[$groupbperm]
        <!--{elseif $groupbperm == 'allowsearch'}-->
            <!--{if $maingroup['allowsearch'] == '0'}-->{lang permission_basic_disable_sarch}<!--{elseif $maingroup['allowsearch'] == '1'}-->{lang permission_basic_search_title}<!--{else}-->{lang permission_basic_search_content}<!--{/if}-->
        <!--{else}-->
            <!--{if $maingroup[$groupbperm] >= 1}--><i class="comiis_font f_wx">&#xe683;</i><!--{else}--><i class="comiis_font f_g">&#xe639;</i><!--{/if}-->
        <!--{/if}-->
    </td>
</tr>
<!--{/loop}-->
<!--{loop $pperms $key $grouppperm}-->
<tr{if $key%2==1} class="bg_e"{/if}>
    <th>$permlang['perms_'.$grouppperm]</th>
    <td>
        <!--{if in_array($grouppperm, array('maxsigsize', 'maxbiosize'))}-->
            $maingroup[$grouppperm] {lang bytes}
        <!--{elseif $grouppperm == 'allowrecommend'}-->
            <!--{if $maingroup[allowrecommend] > 0}-->+$maingroup[allowrecommend]<!--{else}--><i class="comiis_font f_g">&#xe639;</i><!--{/if}-->
        <!--{elseif in_array($grouppperm, array('allowat', 'allowcreatecollection'))}-->
            <!--{echo intval($maingroup[$grouppperm])}-->
        <!--{else}-->
            <!--{if $maingroup[$grouppperm] == 1 || (in_array($grouppperm, array('raterange', 'allowcommentpost')) && !empty($maingroup[$grouppperm]))}--><i class="comiis_font f_wx">&#xe683;</i><!--{else}--><i class="comiis_font f_g">&#xe639;</i><!--{/if}-->
        <!--{/if}-->
    </td>
</tr>
<!--{/loop}-->
<!--{loop $sperms $key $perm}-->
<tr{if $key%2==0} class="bg_e"{/if}>
    <th>$permlang['perms_'.$perm]</th>
    <td>
        <!--{if in_array($perm, array('maxspacesize', 'maximagesize'))}-->
            <!--{if $maingroup[$perm]}-->$maingroup[$perm]<!--{else}-->{lang permission_attachment_nopermission}<!--{/if}-->
        <!--{else}-->
            <!--{if $maingroup[$perm] == 1}--><i class="comiis_font f_wx">&#xe683;</i><!--{else}--><i class="comiis_font f_g">&#xe639;</i><!--{/if}-->
        <!--{/if}-->
    </td>
</tr>
<!--{/loop}-->
<!--{loop $aperms $key $groupaperm}-->
<tr{if $key%2==0} class="bg_e"{/if}>
    <th>$permlang['perms_'.$groupaperm]</th>
    <td>
        <!--{if in_array($groupaperm, array('maxattachsize', 'maxsizeperday', 'maxattachnum'))}-->
            <!--{if $maingroup[$groupaperm]}-->$maingroup[$groupaperm]<!--{else}-->{lang permission_attachment_nopermission}<!--{/if}-->
        <!--{elseif $groupaperm == 'attachextensions'}-->
            <!--{if $maingroup[allowpostattach] == 1}--><!--{if $maingroup[attachextensions]}--><p class="nwp" title="$maingroup[attachextensions]">$maingroup[attachextensions]</p><!--{else}-->{lang permission_attachment_nopermission}<!--{/if}--><!--{else}--><i class="comiis_font f_g">&#xe639;</i><!--{/if}-->
        <!--{else}-->
            <!--{if $maingroup[$groupaperm] == 1}--><i class="comiis_font f_wx">&#xe683;</i><!--{else}--><i class="comiis_font f_g">&#xe639;</i><!--{/if}-->
        <!--{/if}-->
    </td>
</tr>
<!--{/loop}-->
<!--{eval
}
}-->
<!--{eval $comiis_foot = 'no';}-->
<!--{template common/footer}-->