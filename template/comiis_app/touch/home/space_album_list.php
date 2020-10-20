<?PHP exit('Access Denied');?>
<!--{if $_GET['from'] != 'space'}--><!--{eval $comiis_bg = 1;}--><!--{/if}-->
<!--{template common/header}-->
<!--{if $_GET['from']=='space'}-->
	<!--{template home/space_header}-->
	<div class="bg_f b_t mt10">
<!--{else}-->
    <!--{if $comiis_app_switch['comiis_subnv_top'] != 1}--><div style="height:40px;"><div class="comiis_scrollTop_box"><!--{/if}-->
	<div class="comiis_topnv b_b">
		<ul class="comiis_flex">
			<!--{if $_G['uid'] == $space['uid']}-->
				<li class="flex{if $actives[me]} f_0{/if}">{if $actives[me]}<em class="bg_0"></em>{/if}<a href="{if $_G['uid']}home.php?mod=space&do=album&view=me{elseif !$_G[connectguest]}javascript:popup.open('{$comiis_lang['tip16']}', 'confirm', 'member.php?mod=logging&action=login');{else}javascript:popup.open('{$comiis_lang['reg23']}', 'confirm', 'member.php?mod=connect');{/if}"{if !$actives[me]} class="f_c"{/if}>{lang my_album}</a></li>
			<!--{else}-->
				<li class="flex{if $actives[me]} f_0{/if}">{if $actives[me]}<em class="bg_0"></em>{/if}<a href="javascript:;"{if !$actives[me]} class="f_c"{/if}>Ta{lang eccredit_s}{lang album}</a></li>
			<!--{/if}-->
			<li class="flex{if $actives[we]} f_0{/if}">{if $actives[we]}<em class="bg_0"></em>{/if}<a href="{if $_G['uid']}home.php?mod=space&do=album&view=we{elseif !$_G[connectguest]}javascript:popup.open('{$comiis_lang['tip16']}', 'confirm', 'member.php?mod=logging&action=login');{else}javascript:popup.open('{$comiis_lang['reg23']}', 'confirm', 'member.php?mod=connect');{/if}"{if !$actives[we]} class="f_c"{/if}>{lang friend_album}</a></li>
			<li class="flex{if $actives[all]} f_0{/if}">{if $actives[all]}<em class="bg_0"></em>{/if}<a href="home.php?mod=space&do=album&view=all"{if !$actives[all]} class="f_c"{/if}>{lang view_all}</a></li>
		</ul>
	</div>
	<!--{if $comiis_app_switch['comiis_subnv_top'] != 1}--></div></div><!--{/if}-->
<!--{/if}-->
<!--{if $count}-->
	<!--{eval comiis_load('t9V4xOZqIyVL9i12dv', 'list,space');}-->
<!--{if $multi}-->$multi<!--{/if}-->
<!--{else}-->
	<div class="comiis_notip comiis_sofa mt15 cl">
		<i class="comiis_font f_e cl">&#xe613;</i>
		<span class="f_d">{lang data_nonexistence}</span>
	</div>
<!--{/if}-->
<!--{if $_GET['from']=='space'}-->
	<!--{if $space[uid] == $_G[uid]}-->
	</div>
	<div class="cl" style="height:40px;"></div>
	<div class="comiis_space_footfb bg_f b_t">
		<a href="home.php?mod=spacecp&ac=upload"><i class="comiis_font f_wb">&#xe642;</i><span class="f_b">{lang publish}{lang album}</span></a>
	</div>
	<!--{else}-->
	</div>
	<!--{template home/space_footer}-->
	<!--{/if}-->
<!--{/if}-->
<!--{eval $comiis_foot = 'no';}-->
<!--{template common/footer}-->