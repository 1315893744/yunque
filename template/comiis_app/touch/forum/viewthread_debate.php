<?PHP exit('Access Denied');?>
<!--{if $debate[affirmvotes] || $debate[negavotes]}--><div class="comiis_bltxt f_c">{$comiis_lang['view23']} <span class="f_0">{echo $debate[affirmvotes] + $debate[negavotes];}</span> {$comiis_lang['view24']}</div><!--{/if}-->
<!--{if $debate[umpire]}-->
	<!--{if $debate['umpirepoint']}-->
	<div class="comiis_debate_over bg_e b_ok cl">
		<h2 class="b_b">
			<em class="f_d y">{lang debate_comment_dateline}: $debate[endtime]</em>
			<!--{if $debate[winner]}-->
			<!--{if $debate[winner] == 1}-->
			<span class="f_g">{lang debate_square}{lang debate_winner}</span>
			<!--{elseif $debate[winner] == 2}-->
			<span class="f_g">{lang debate_opponent}{lang debate_winner}</span>
			<!--{else}-->
			<span class="f_g">{lang debate_draw}</span>
			<!--{/if}-->
			<!--{/if}-->		
		</h2>
		<!--{if $debate[umpirepoint]}--><p><strong>{lang debate_umpirepoint}</strong>: $debate[umpirepoint]</p><!--{/if}-->
		<!--{if $debate[bestdebater]}--><p><strong>{lang debate_bestdebater}</strong>: $debate[bestdebater]</p><!--{/if}-->
	</div>
	<!--{/if}-->
<!--{/if}-->
<!--{eval $comiis_affirmvotes = round((100 / ($debate[affirmvotes] + $debate[negavotes])) * $debate[affirmvotes]);}-->
<!--{eval comiis_load('i74telN7nI57ENetW7', 'comiis_affirmvotes,debate');}-->
<!--{if $debate[umpire] && $_G['username'] && $debate[umpire] == $_G['member']['username']}-->
<div class="comiis_debate_btn cl">
	<!--{if $debate[remaintime] && !$debate[umpirepoint]}-->
	 <a href="forum.php?mod=misc&action=debateumpire&tid=$_G[tid]&pid=$post[pid]{if $_GET[from]}&from=$_GET[from]{/if}" class="dialog bg_c f_f">{lang debate_umpire_end}</a>
	<!--{elseif TIMESTAMP - $debate['dbendtime'] < 3600}-->
	<a href="forum.php?mod=misc&action=debateumpire&tid=$_G[tid]&pid=$post[pid]{if $_GET[from]}&from=$_GET[from]{/if}" class="dialog bg_c f_f">{lang debate_umpirepoint_edit}</a>
	<!--{/if}-->
</div>
<!--{/if}-->
<div id="postmessage_$post[pid]" class="postmessage km_message">
	<h2 class="b_b">{$comiis_lang['view22']}</h2>
	<div class="comiis_a comiis_message_table">$post[message]</div>
</div>
<!--{if $debate[endtime]}-->
<div class="comiis_debate_time cl"><span class="bg_b f_d">{lang endtime}: $debate[endtime] <!--{if $debate[umpire]}-->{lang debate_umpire}: $debate[umpire]<!--{/if}--></span></div>
<!--{/if}-->