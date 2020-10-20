<?PHP exit('Access Denied');?>
<!--{template common/header}-->
<!--{if $_GET['op'] == 'edit'}-->
<form id="editcommentform_{$cid}" name="editcommentform_{$cid}" method="post" autocomplete="off" action="home.php?mod=spacecp&ac=comment&op=edit&cid=$cid{if $_GET[modcommentkey]}&modcommentkey=$_GET[modcommentkey]{/if}">
	<input type="hidden" name="referer" value="{echo dreferer()}" />
	<input type="hidden" name="editsubmit" value="true" />
	<!--{if $_G[inajax]}--><input type="hidden" name="handlekey" value="$_GET[handlekey]" /><!--{/if}-->
	<input type="hidden" name="formhash" value="{FORMHASH}" />
	<div class="comiis_tip bg_f cl">
		<div class="tip_tit bg_e f_b b_b">{lang edit}</div>
		<dt class="f_c">
			<div class="tip_form">
				<li class="nop b_ok f_c cl"><textarea class="comiis_pt f_c" placeholder="{$comiis_lang['all27']}" id="needmessage" name="message">$comment[message]</textarea></li>			
			</div>
		</dt>
		<dd class="b_t cl">
            <!--{if $comiis_app_switch['comiis_post_btnwz'] == 1}-->
                <a href="javascript:;" onclick="popup.close();" class="tip_btn bg_f f_b">{lang cancel}</a>			
                <button type="submit" name="editsubmit_btn" id="fastpostsubmit_btn" value="{lang edit}" class="formdialog tip_btn bg_f f_0"><span class="tip_lx">{lang determine}</span></button>
			<!--{else}-->
                <button type="submit" name="editsubmit_btn" id="fastpostsubmit_btn" value="{lang edit}" class="formdialog tip_btn bg_f f_0">{lang determine}</button>
                <a href="javascript:;" onclick="popup.close();" class="tip_btn bg_f f_b"><span class="tip_lx">{lang cancel}</span></a>			
			<!--{/if}-->
		</dd>
	</div>
</form>
<!--{elseif $_GET['op'] == 'delete'}-->
	<div class="comiis_tip bg_f cl">
	<form id="deletecommentform_{$cid}" name="deletecommentform_{$cid}" method="post" autocomplete="off" action="home.php?mod=spacecp&ac=comment&op=delete&cid=$cid">
			<input type="hidden" name="referer" value="{echo dreferer()}" />
			<input type="hidden" name="deletesubmit" value="true" />
			<input type="hidden" name="formhash" value="{FORMHASH}" />
			<!--{if $_G[inajax]}--><input type="hidden" name="handlekey" value="$_GET[handlekey]" /><!--{/if}-->
			<dt class="f_b">
				<p>{lang delete_reply}?</p>
			</dt>
			<dd class="b_t cl">
                <!--{if $comiis_app_switch['comiis_post_btnwz'] == 1}-->
                    <a href="javascript:popup.close();" class="tip_btn bg_f f_b">{lang cancel}</a>
                    <button type="submit" name="deletesubmitbtn" value="true" class="formdialog tip_btn bg_f f_0" comiis="handle"><span class="tip_lx">{lang determine}</span></button>
                <!--{else}-->
                    <button type="submit" name="deletesubmitbtn" value="true" class="formdialog tip_btn bg_f f_0" comiis="handle">{lang determine}</button>
                    <a href="javascript:popup.close();" class="tip_btn bg_f f_b"><span class="tip_lx">{lang cancel}</span></a>
                <!--{/if}-->
			</dd>
		</form>
	</div>
	<script type="text/javascript">
		function succeedhandle_$_GET['handlekey'] (a, b, c) {
			$('.comiis_blog_replynum').html(parseInt($('.comiis_blog_replynum').eq(0).html()) - 1);
			$('#comment_'+c['cid']+'_li').remove();
			popup.open(b, 'alert');
		}
		function errorhandle_$_GET['handlekey'] (a, b){
			popup.open(a, 'alert');
		}
	</script>
<!--{elseif $_GET['op'] == 'reply'}-->
<!--{eval comiis_load('SBP6xvzampqqAiiX5i', 'comment,secqaacheck,seccodecheck');}-->
<!--{/if}-->
<!--{template common/footer}-->