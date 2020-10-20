<?PHP exit('Access Denied');?>
<!--{template common/header}-->
<div class="comiis_p12 bg_f f14 f_b b_b cl">
	<span class="f_a">{lang total}: &nbsp;</span>
	<!--{loop $logcount $id $count}-->
	{$_G['setting']['extcredits'][$id][title]} <!--{if $count>0}-->+<!--{/if}-->$count {$_G['setting']['extcredits'][$id][unit]} &nbsp;
	<!--{/loop}-->
</div>
<div class="comiis_userlist mt12 b_t bg_f cl">
	<ul>
	<!--{loop $loglist $key $log}-->
		<li class="b_b">
			<a href="home.php?mod=space&uid={$log[uid]}&do=profile">						
				<img src="<!--{avatar($log[uid], middle, true)}-->">
				<h2><span class="f_c">$log[dateline]</span>{$log[username]}<em class="f_a">{$_G['setting']['extcredits'][$log[extcredits]][title]} $log[score] {$_G['setting']['extcredits'][$log[extcredits]][unit]}</em></h2>
				<p class="f_c">$log[reason]</p>
			</a>
		</li>		
	<!--{/loop}-->
	</ul>
</div>	
<!--{if $key > 12}-->
	<div class="comiis_loadbtn f_d">{$comiis_lang['all21']}</div>
<!--{/if}-->
<!--{eval $comiis_foot = 'no';}-->
<!--{template common/footer}-->