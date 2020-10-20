<?PHP exit('Access Denied');?>
<!--{if !$post['message'] && (($_G['forum']['ismoderator'] && $_G['group']['alloweditpost'] && (!in_array($post['adminid'], array(1, 2, 3)) || $_G['adminid'] <= $post['adminid'])) || ($_G['forum']['alloweditpost'] && $_G['uid'] && $post['authorid'] == $_G['uid']))}-->
<div class="comiis_spguanli">
    <h2><a href="forum.php?mod=post&action=edit&fid=$_G[fid]&tid=$_G[tid]&pid=$post[pid]&page=$page" class="bg_0 f_f">{lang post_add_aboutcounter}</a></h2>
</div>
<!--{else}-->
<div class="comiis_a comiis_message_table">$post[message]</div>
<!--{/if}-->
<!--{if count($trades) > 1 || ($_G['uid'] == $_G['forum_thread']['authorid'] || $_G['group']['allowedittrade'])}-->
<div class="comiis_pltit comiis_vsptit bg_e b_ok mt10 cl">	
	<h2>
		<!--{if !$_G['forum_thread']['is_archived'] && ($_G['uid'] == $_G['forum_thread']['authorid'] || $_G['group']['allowedittrade'])}-->
			<!--{if $_G['uid'] == $_G['forum_thread']['authorid']}-->
				<!--{if $_G['group']['allowposttrade']}-->
				<a href="forum.php?mod=post&action=reply&fid=$_G[fid]&tid=$_G[tid]&firstpid=$post[pid]&addtrade=yes{if !empty($_GET['from'])}&from=$_GET['from']{/if}" class="bg_0 f_f">+ {lang trade_add_post}</a>
				<!--{/if}-->
			<!--{/if}-->
		<!--{/if}-->
		<em class="f_b"><i class="comiis_font f_0 z">&#xe687;</i>{lang post_trade_totalnumber}: $tradenum</em>
	</h2>
</div>
<!--{/if}-->
<!--{if $tradenum}-->
<!--{eval comiis_load('w8N3bhYiOFhdCjw38Y', 'trades,post');}-->
<!--{else}-->
<div class="comiis_notip cl">
	<i class="comiis_font f_e cl">&#xe613;</i>
	<span class="f_d">{lang trade_nogoods}</span>
</div>
<!--{/if}-->