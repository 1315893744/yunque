<?PHP exit('Access Denied');?>
<!--{eval 
	$_G[home_tpl_titles] = array('{lang task}');
}-->
<!--{template common/header}-->
<ul class="comiis_task_act cl">
	<!--{loop $parterlist $parter}-->
		<li>
			<a href="home.php?mod=space&uid=$parter[uid]&do=profile" title="{if $parter[status] == 1}{lang task_complete}{elseif $parter[status] == -1}{lang task_failed}{elseif $parter[status] == 0}{lang task_complete} $parter[csc]%{/if}">$parter[avatar]<span class="f_c">$parter[username]</span></a>
		</li>
	<!--{/loop}-->
</ul>
<!--{template common/footer}-->