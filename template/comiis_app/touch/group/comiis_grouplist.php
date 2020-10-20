<?PHP exit('Access Denied');?>
<!--{if $sgid}--><!--{eval $_GET['hot'] = 'yes';}--><!--{/if}-->
<!--{eval include_once DISCUZ_ROOT.'./template/comiis_app/comiis/php/comiis_grouplist.php'}-->
<script>
comiis_group = 1;
function comiis_search_show(a){
    if(a == 1){
        $('#comiis_search_noe').hide();
        $('#comiis_search_two').show()
        $('#scform_srchtxt').focus();
    }else{
        $('#comiis_search_two').hide();
        $('#comiis_search_noe').show();
    }
}
</script>
<script src="template/comiis_app/comiis/js/comiis_forum.js?{VERHASH}" charset="{CHARSET}"></script>
<div class="comiis_topsearch cl">	  
    <div id="comiis_search_noe"><a href="javascript:comiis_search_show(1);" class="ssbox ssct b_ok bg_f f_d"><i class="comiis_font f_d">&#xe622;</i> $comiis_group_lang['024']</a></div>
    <div id="comiis_search_two" style="display:none">            
        <form class="searchform" method="post" autocomplete="off" action="search.php?mod=group">
            <input type="hidden" name="formhash" value="{FORMHASH}" />
            <input type="hidden" name="searchsubmit" value="yes" />
            <ul class="comiis_flex">				
            <input type="search" id="scform_srchtxt" name="srchtxt" placeholder="{$comiis_lang['enter_content']}..." class="ssbox b_ok bg_f f_d flex" />	
            <a href="javascript:comiis_search_show(0);" class="f_0">{$comiis_lang['all9']}</a>
            </ul>			
        </form>
    </div>
</div>	
<div class="comiis_bbslist bg_f cl">
	<div class="comiis_bbslist_gid bg_e cl">
		<ul>
			<li class="{if $_GET['hot'] == 'yes' || !$gid}bg_f {/if}b_b" id="comiis_grouplist_l_0"><span class="bg_0"></span><a href="group.php?hot=yes">{$comiis_app_switch['comiis_group_jxtj_name']}</a></li>
			<!--{loop $first $groupid $group}-->
			<li class="{if $gid == $groupid && !$_GET['hot']}bg_f {/if}b_b" id="comiis_grouplist_l_{$groupid}"><span class="bg_0"></span><a href="group.php?gid=$groupid">$group[name]</a></li>
			<!--{/loop}-->		
		</ul>
	</div>
	<div class="comiis_bbslist_fid cl">
	<!--{if $_GET['hot'] == 'yes' || !$gid}-->
		<ul id="comiis_grouplist_0">
		<!--{if $_G['setting']['group_recommend'] && count(dunserialize($_G['setting']['group_recommend']))}-->
		<!--{if ($comiis_app_switch['comiis_header_show'] == 2 || ($comiis_app_switch['comiis_header_show'] == 3 && $comiis_isweixin == 1))}--><h2 class="b_b"><span class="y f_0"><a href="forum.php?mod=group&action=create">+ {$comiis_group_lang['033']}</a></span></h2><!--{/if}-->
		<!--{loop dunserialize($_G['setting']['group_recommend']) $val}-->
			<li class="b_b">				
				<!--{if in_array($val['fid'], $user_fid)}-->
					<span class="kmgroup f_e"><a href="forum.php?mod=forumdisplay&action=list&fid={$val['fid']}"><i class="comiis_font">&#xe60c</i></a></span>
				<!--{else}-->
					<span class="bg_c f_f"><a href="forum.php?mod=group&action=join&fid={$val['fid']}" class="dialog">+ {$comiis_group_lang['041']}</a></span>
				<!--{/if}-->				
				<a href="forum.php?mod=forumdisplay&action=list&fid=$val[fid]" class="bbslist_v2ico"><img src="{if $val['icon']}$val['icon']{else}static/image/common/groupicon.gif{/if}" class="comiis_noloadimage"></a>
				<a href="forum.php?mod=forumdisplay&action=list&fid=$val[fid]" class="post_tit"><em>$val[name]</em><!--{if $val['todayposts']}--><i class="bg_a f_f">$val['todayposts']</i><!--{/if}--></a>
				<p class="f_d"><!--{if $val['description']}-->{$val['description']}<!--{else}-->{$comiis_lang['tip325']}<!--{/if}--></p>
			</li>
		<!--{/loop}-->
		<!--{else}-->
            <div class="comiis_notip cl">
                <i class="comiis_font f_e cl">&#xe613</i>
                <span><em class="f_d">{$comiis_group_lang['042']}</em><br><a href="forum.php?mod=group&action=create" class="bg_c f_f">{$comiis_group_lang['030']}{$comiis_group_lang['001']}</a></span>   
            </div>
		<!--{/if}-->
		</ul>	
	<!--{else}-->
		<ul id="comiis_grouplist_$groupid">
		<!--{if $list}-->
		<!--{if ($comiis_app_switch['comiis_header_show'] == 2 || ($comiis_app_switch['comiis_header_show'] == 3 && $comiis_isweixin == 1))}--><h2 class="b_b"><span class="y f_0"><a href="forum.php?mod=group&action=create">+ {$comiis_group_lang['033']}</a></span><span class="f_c">$curtype[name]</span></h2><!--{/if}-->
			<!--{loop $list $fid $val}-->
				<li class="b_b">					
                    <!--{if in_array($fid, $user_fid)}-->
                        <span class="kmgroup f_e"><a href="forum.php?mod=forumdisplay&action=list&fid={$fid}"><i class="comiis_font">&#xe60c</i></a></span>
                    <!--{else}-->
                        <span class="bg_c f_f"><a href="forum.php?mod=group&action=join&fid={$fid}" class="dialog">+ {$comiis_group_lang['041']}</a></span>
                    <!--{/if}-->
					<a href="forum.php?mod=forumdisplay&action=list&fid={$fid}" class="bbslist_v2ico"><img src="{if $val['icon']}$val['icon']{else}static/image/common/groupicon.gif{/if}" class="comiis_noloadimage"></a>
					<a href="forum.php?mod=forumdisplay&action=list&fid={$fid}" class="post_tit"><em>$val[name]</em><!--{if $val['todayposts']}--><i class="bg_a f_f">$val['todayposts']</i><!--{/if}--></a>
					<p class="f_d"><!--{if $val['description']}-->{$val['description']}<!--{else}-->{$comiis_lang['tip325']}<!--{/if}--></p>
				</li>
			<!--{/loop}-->
		<!--{if $list}-->$multipage<!--{/if}-->
		<!--{else}-->
            <div class="comiis_notip cl">
                <i class="comiis_font f_e cl">&#xe613</i>
                <span><em class="f_d">{$comiis_group_lang['042']}</em><br><a href="forum.php?mod=group&action=create" class="bg_c f_f">{$comiis_group_lang['030']}{$comiis_group_lang['001']}</a></span>                
            </div>
		<!--{/if}-->
		</ul>
	<!--{/if}-->	
	</div>
</div>
{eval}
$comiis_app_wx_share['img'] = './template/comiis_app/pic/icon152.png';
$comiis_app_wx_share['title'] = $comiis_group_lang['001'].' - '.$comiis_app_switch['comiis_sitename'];
{/eval}