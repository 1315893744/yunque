<?PHP exit('Access Denied');?>
<!--{eval comiis_load('MG6GxEH2Zi4SZEwvR3', 'rewardprice');}-->
<!--{if $bestpost}-->
<div class="comiis_xsda bg_h">
	<h2 class="b_h f_a">
		<span>$bestpost[avatar]<a href="home.php?mod=space&uid=$bestpost[authorid]&do=profile">$bestpost[author]</a></span>
		<i class="comiis_font">&#xe63b;</i>{lang reward_bestanswer}		
	</h2>
	<div class="kmmessage f_b">$bestpost[message]</div>
	<div class="kmall f_a"><a href="forum.php?mod=redirect&goto=findpost&ptid=$bestpost[tid]&pid=$bestpost[pid]">{lang view_full_content}<i class="comiis_font">&#xe60c;</i></a></div>		
</div>
<!--{/if}-->
<div class="comiis_a comiis_message_table">$post[message]</div>
<!--{if $post['attachment']}-->
	<div class="warning">{lang attachment}: <em><!--{if $_G['uid']}-->{lang attach_nopermission}<!--{else}-->{lang attach_nopermission_login}<!--{/if}--></em></div>
<!--{elseif $post['imagelist'] || $post['attachlist']}-->
    <!--{if $post['imagelist']}-->
         {echo showattach($post, 1)}
    <!--{/if}-->
    <!--{if $post['attachlist']}-->
         {echo showattach($post)}
    <!--{/if}-->
<!--{/if}-->
<!--{eval $post['attachment'] = $post['imagelist'] = $post['attachlist'] = '';}-->