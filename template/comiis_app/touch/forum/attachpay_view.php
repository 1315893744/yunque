<?PHP exit('Access Denied');?>
<!--{template common/header}-->
<!--{if $loglist}-->
	<div class="comiis_userlist bg_f cl">
		<ul>
		<!--{loop $loglist $key $log}-->
			<li class="b_b">
				<a href="home.php?mod=space&uid={$log[uid]}&do=profile">						
					<img src="<!--{avatar($log[uid], middle, true)}-->">
					<h2><span class="f_c">$log[dateline]</span>{$log[username]}</h2>
					<p class="f_c">{$log[$extcreditname]} {$_G[setting][extcredits][$_G[setting][creditstransextra][1]][unit]} {$_G['setting']['extcredits'][$_G['setting']['creditstransextra'][1]][title]}</p>
				</a>
			</li>		
		<!--{/loop}-->
		</ul>
	</div>	
	<!--{if $key > 12}-->
	<div class="comiis_loadbtn f_d">{$comiis_lang['all21']}</div>
	<!--{/if}-->
<!--{else}-->
	<div class="comiis_notip comiis_sofa mt12 cl">
		<i class="comiis_font f_e cl">&#xe613;</i>
		<span class="f_d">{lang attachment_buy_not}</span>
	</div>
<!--{/if}-->
<!--{eval $comiis_foot = 'no';}-->
<!--{template common/footer}-->