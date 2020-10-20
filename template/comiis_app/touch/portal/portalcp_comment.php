<?PHP exit('Access Denied');?>
<!--{template common/header}-->
<!--{if $_GET['op'] == 'requote'}-->
	[quote]{$comment[username]}: {$comment[message]}[/quote]
<!--{elseif $_GET['op'] == 'edit'}-->
	<div class="comiis_tip bg_f cl">
		<div class="tip_tit bg_e f_b b_b">{lang edit}</div>
		<form id="editcommentform_{$cid}" name="editcommentform_{$cid}" method="post" autocomplete="off" action="portal.php?mod=portalcp&ac=comment&op=edit&cid=$cid{if $_GET[modarticlecommentkey]}&modarticlecommentkey=$_GET[modarticlecommentkey]{/if}">
			<input type="hidden" name="referer" value="{echo dreferer()}" />
			<input type="hidden" name="editsubmit" value="true" />
			<!--{if $_G[inajax]}--><input type="hidden" name="handlekey" value="$_GET[handlekey]" /><!--{/if}-->
			<input type="hidden" name="formhash" value="{FORMHASH}" />
			<dt>	
				<div class="tip_form">
					<li class="nop f_c cl"><textarea id="message_{$cid}" name="message" rows="4" class="comiis_pt comiis_message_d">$comment[message]</textarea></li>
				</div>
			</dt>
			<dd class="b_t cl">
                <!--{if $comiis_app_switch['comiis_post_btnwz'] == 1}-->
                    <a href="javascript:popup.close();" class="tip_btn bg_f f_b">{lang cancel}</a>		
                    <button type="submit" name="editsubmit_btn" id="editsubmit_btn" value="true" class="formdialog tip_btn bg_f f_0"><span class="tip_lx">{lang submit}</span></button>
                <!--{else}-->
                    <button type="submit" name="editsubmit_btn" id="editsubmit_btn" value="true" class="formdialog tip_btn bg_f f_0">{lang submit}</button>
                    <a href="javascript:popup.close();" class="tip_btn bg_f f_b"><span class="tip_lx">{lang cancel}</span></a>
                <!--{/if}-->
			</dd>
		</form>
	</div>
<!--{elseif $_GET['op'] == 'delete'}-->
	<div class="comiis_tip bg_f cl">
		<form id="deletecommentform_{$cid}" name="deletecommentform_{$cid}" method="post" autocomplete="off" action="portal.php?mod=portalcp&ac=comment&op=delete&cid=$cid">
			<input type="hidden" name="referer" value="{echo dreferer()}" />
			<input type="hidden" name="deletesubmit" value="true" />
			<input type="hidden" name="formhash" value="{FORMHASH}" />
			<!--{if $_G[inajax]}--><input type="hidden" name="handlekey" value="$_GET[handlekey]" /><!--{/if}-->
			<dt class="f_b">
				<p>{lang comment_delete_confirm}</p>
			</dt>
			<dd class="b_t cl">
                <!--{if $comiis_app_switch['comiis_post_btnwz'] == 1}-->
                    <a href="javascript:popup.close();" class="tip_btn bg_f f_b">{lang cancel}</a>		
                    <button type="submit" name="deletesubmitbtn" value="true" class="formdialog tip_btn bg_f f_0"><span class="tip_lx">{lang confirms}</span></button>
                <!--{else}-->
                    <button type="submit" name="deletesubmitbtn" value="true" class="formdialog tip_btn bg_f f_0">{lang confirms}</button>
                    <a href="javascript:popup.close();" class="tip_btn bg_f f_b"><span class="tip_lx">{lang cancel}</span></a>
                <!--{/if}-->
			</dd>
		</form>
	</div>
<!--{/if}-->
<!--{template common/footer}-->