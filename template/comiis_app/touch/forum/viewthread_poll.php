<?PHP exit('Access Denied');?>
<div class="comiis_a comiis_message_table">$post[message]</div>
<div class="comiis_poll cl comiis_input_style b_t">
<form id="poll" name="poll" method="post" autocomplete="off" action="forum.php?mod=misc&action=votepoll&fid=$_G[fid]&tid=$_G[tid]&pollsubmit=yes{if $_GET[from]}&from=$_GET[from]{/if}&quickforward=yes&mobile=2" >
	<input type="hidden" name="formhash" value="{FORMHASH}" />
	<h2><i class="comiis_font f_ok">&#xe640;</i> <!--{if $multiple}--><span class="f_ok">{lang poll_multiple}{lang thread_poll}</span><!--{if $maxchoices}--><em class="f_a"> {lang poll_more_than}</em><!--{/if}--><!--{else}--><span class="f_ok">{lang poll_single}{lang thread_poll}</span><!--{/if}--></h2>
	<p class="txt f_c">
		<!--{if $visiblepoll && $_G['group']['allowvote']}-->{lang poll_after_result}, <!--{/if}-->{lang poll_voterscount}
	</p>
	<!--{if $_G[forum_thread][remaintime]}-->
	<p class="txt f_c">
		{lang poll_count_down}:
		<!--{if $_G[forum_thread][remaintime][0]}-->$_G[forum_thread][remaintime][0] {lang days}<!--{/if}-->
		<!--{if $_G[forum_thread][remaintime][1]}-->$_G[forum_thread][remaintime][1] {lang poll_hour}<!--{/if}-->
		$_G[forum_thread][remaintime][2] {lang poll_minute}
	</p class="txt f_c">
	<!--{elseif $expiration && $expirations < TIMESTAMP}-->
	<p><strong>{lang poll_end}</strong></p>
	<!--{/if}-->
	<!--{eval comiis_load('StLvwXTkXBKxSjwSx6', 'isimagepoll,polloptions,optiontype,visiblepoll');}-->
    <div class="comiis_poll_bottom cl">
	<!--{if $_G['group']['allowvote'] && !$_G['forum_thread']['is_archived']}-->
		<input type="submit" name="pollsubmit" id="pollsubmit" value="{lang submit}" class="formdialog comiis_btn kmshow bg_0 f_f" />
		<!--{if $overt}-->
		<span class="f_d">{lang poll_msg_overt}</span>
		<!--{/if}-->
	<!--{elseif !$allwvoteusergroup}-->
		<!--{if !$_G['uid']}-->
		<span class="f_a">{lang poll_msg_allwvote_user}</span>
		<!--{else}-->
		<span class="f_d">{lang poll_msg_allwvoteusergroup}</span>
		<!--{/if}-->
	<!--{elseif !$allowvotepolled}-->
		<span class="f_a">{lang poll_msg_allowvotepolled}</span>
	<!--{elseif !$allowvotethread}-->
		<span class="f_a">{lang poll_msg_allowvotethread}</span>
	<!--{/if}-->
	</div>	
</form>
</div>
<script>
<!--{if $optiontype=='checkbox'}-->
	var max_obj = $maxchoices;
	var p = 0;
	function poll_checkbox(obj) {
		if(obj.checked) {
			if(p >= max_obj) {
				obj.checked = false;
				popup.open('{$comiis_lang['view26']} ' + max_obj + ' {$comiis_lang['view27']}', 'alert');
				return false;
			}else{
				p++;
			}
		} else {
			p--;
		}
		document.getElementById('pollsubmit').disabled = p <= max_obj && p > 0 ? false : true;
	}
<!--{/if}-->
</script>