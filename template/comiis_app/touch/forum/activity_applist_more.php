<?PHP exit('Access Denied');?>
<!--{template common/header}-->
<!--{if $applylist}-->
	<ul class="cl">
		<!--{loop $applylist $apply}-->
		<li>
			<a target="_blank" href="home.php?mod=space&uid=$apply[uid]&do=profile">
				<img src="<!--{avatar($apply[uid], small, true)}-->" class="vm" />
				<span class="f_b">$apply[username]</span>
			</a>
		</li>
		<!--{/loop}-->
	</ul>
	<div class="comiis_act_page cl">
	<!--{if $activity['applynumber'] > ($pp * $page)}-->
		<a onclick="comiis_activity_page('1')" href="javascript:;" class="bg_a f_f">{$comiis_lang['all18']}</a>
	<!--{/if}-->
	<!--{if $page > 1}-->
		<a onclick="comiis_activity_page('0')" href="javascript:;" class="bg_a f_f">{$comiis_lang['all17']}</a>
	<!--{/if}-->
	</div>
<!--{/if}-->
<!--{template common/footer}-->