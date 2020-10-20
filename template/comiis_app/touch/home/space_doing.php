<?PHP exit('Access Denied');?>
<!--{eval $comiis_bg = 1;}-->
<!--{template common/header}-->
<!--{if $comiis_app_switch['comiis_doingtimgs']}-->
    <div class="cl" style="position:relative;">
    <!--{if $comiis_app_switch['comiis_doingtimgs']}-->$comiis_app_switch['comiis_doingtimgs']<!--{/if}-->
    <!--{if $comiis_app_switch['comiis_svg'] != 1}--><div class="comiis_svg_box" style="bottom:-6px;"><div class="comiis_svg_a"></div><div class="comiis_svg_b"></div></div><!--{/if}-->
    </div>
<!--{/if}-->
<!--{if $comiis_app_switch['comiis_subnv_top'] != 1}--><div style="height:41px;"><div class="comiis_scrollTop_box"><!--{/if}-->
<div class="comiis_topnv bg_f b_b">
	<ul class="comiis_flex">
		<li class="flex{if $actives[me]} f_0{/if}">{if $actives[me]}<em class="bg_0"></em>{/if}<a href="{if $_G['uid']}home.php?mod=space&do=$do&view=me{elseif !$_G[connectguest]}javascript:popup.open('{$comiis_lang['tip16']}', 'confirm', 'member.php?mod=logging&action=login');{else}javascript:popup.open('{$comiis_lang['reg23']}', 'confirm', 'member.php?mod=connect');{/if}"{if !$actives[me]} class="f_c"{/if}>{$comiis_lang['all58']}{$comiis_lang['all56']}</a></li>
		<li class="flex{if $actives[we]} f_0{/if}">{if $actives[we]}<em class="bg_0"></em>{/if}<a href="{if $_G['uid']}home.php?mod=space&do=$do&view=we{elseif !$_G[connectguest]}javascript:popup.open('{$comiis_lang['tip16']}', 'confirm', 'member.php?mod=logging&action=login');{else}javascript:popup.open('{$comiis_lang['reg23']}', 'confirm', 'member.php?mod=connect');{/if}"{if !$actives[we]} class="f_c"{/if}>{$comiis_lang['all59']}{$comiis_lang['all56']}</a></li>		
		<li class="flex{if $actives[all]} f_0{/if}">{if $actives[all]}<em class="bg_0"></em>{/if}<a href="home.php?mod=space&do=$do&view=all"{if !$actives[all]} class="f_c"{/if}>{lang view_all}</a></li>
	</ul>
</div>
<!--{if $comiis_app_switch['comiis_subnv_top'] != 1}--></div></div><!--{/if}-->
<!--{if helper_access::check_module('doing')}-->
	<!--{template home/space_doing_form}-->
<!--{/if}-->
<div class="styli_h10 bg_e cl"></div>
<!--{if $dolist}-->
	<div class="comiis_allpl bg_f cl">
		<ul>
		<!--{loop $dolist $dv}-->
		<!--{eval $doid = $dv[doid];}-->
		<!--{eval $_GET[key] = $key = random(8);}-->
			<li class="comiis_list_readimgs b_t">
				<a href="home.php?mod=space&uid=$dv[uid]&do=profile" class="allpl_tx bg_e"><!--{avatar($dv[uid],middle)}--></a>
				<h2><span class="f_d y"><!--{date($dv['dateline'], 'u')}--></span><a href="home.php?mod=space&uid=$dv[uid]&do=profile" class="f14 f_b">$dv[username]</a></h2>
				<div class="allpl_nr allpl_face">
					$dv[message]
				</div>
				<!--{eval $list = $clist[$doid];}-->
				<!--{template home/space_doing_li}-->
				<div class="allpl_ft">				
					<!--{if helper_access::check_module('doing')}-->
					<a href="{if $_G['uid']}home.php?mod=spacecp&ac=doing&op=docomment&handlekey=msg_0&doid={$doid}&id=0&key={$key}{elseif !$_G[connectguest]}javascript:popup.open('{$comiis_lang['tip16']}', 'confirm', 'member.php?mod=logging&action=login');{else}javascript:popup.open('{$comiis_lang['reg23']}', 'confirm', 'member.php?mod=connect');{/if}" class="{if $_G['uid']}dialog {/if}b_ok f_c bg_e"><i class="comiis_font">&#xe626;</i>{lang reply}</a>
					<!--{/if}-->
					<!--{if $dv[uid]==$_G[uid]}--><a href="home.php?mod=spacecp&ac=doing&op=delete&doid=$doid&id=$dv[id]&handlekey=doinghk_{$doid}_$dv[id]" id="{$key}_doing_delete_{$doid}_{$dv[id]}" class="dialog b_ok f_c bg_e"><i class="comiis_font">&#xe67f;</i>{lang delete}</a><!--{/if}-->
					<!--{if $dv[status] == 1}--><span class="f_g">{lang moderate_need}</span><!--{/if}-->
				</div>
			</li>
		<!--{/loop}-->
		<!--{if $pricount}-->
			<li class="f_d b_t">{lang hide_doing}</li>
		<!--{/if}-->
		</ul>
	</div>
	<!--{if $multi}-->
	<div  class="bg_f b_t cl">$multi</div>
	<!--{/if}-->
<!--{else}-->
	<div class="comiis_notip comiis_sofa bg_f b_t cl">
		<i class="comiis_font f_e cl">&#xe613;</i>
		<span class="f_d">{lang doing_no_replay}<!--{if $space[self]}-->{lang doing_now}<!--{/if}--></span>
	</div>
<!--{/if}-->
<!--{eval $comiis_foot = 'no';}-->
<!--{template common/footer}-->