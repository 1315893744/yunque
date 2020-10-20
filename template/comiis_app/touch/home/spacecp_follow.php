<?PHP exit('Access Denied');?>
<!--{template common/header}-->
<!--{if $op == 'bkname'}-->
<!--{if !submitcheck('editbkname')}-->
	<div class="comiis_tip comiis_tip_form bg_f cl">
		<div class="tip_tit bg_f f_b b_b">{lang follow_add_bkname}</div>		
		<form method="post" autocomplete="off" id="bknameform_{$_GET[handlekey]}" name="bknameform_{$_GET[handlekey]}" action="home.php?mod=spacecp&ac=follow&op=bkname&fuid=$followuser['followuid']&editsubmit_btn=true">
			<input type="hidden" name="referer" value="{echo dreferer()}" />
			<input type="hidden" name="editbkname" value="true" />
			<!--{if $_G[inajax]}--><input type="hidden" name="handlekey" value="$_GET[handlekey]" /><!--{/if}-->
			<input type="hidden" name="formhash" value="{FORMHASH}" />
			<dt class="f_c">
				<div class="tip_form">
					<li class="tip_txt f_c">{lang follow_for}$followuser['fusername']{lang follow_add_bkname}</li>
					<li class="nop b_ok f_c cl"><input type="text" name="bkname" value="$followuser['bkname']" class="comiis_px" /></li>
				</div>
			</dt>	
			<dd class="b_t cl">
                <!--{if $comiis_app_switch['comiis_post_btnwz'] == 1}-->
                    <a href="javascript:;" onclick="popup.close();" class="tip_btn bg_f f_b">{lang cancel}</a>
                    <button type="submit" name="editsubmit_btn" id="editsubmit_btn" value="true" class="formdialog tip_btn bg_f f_0" comiis="handle"><span class="tip_lx">{lang save}</span></button>
                <!--{else}-->
                    <button type="submit" name="editsubmit_btn" id="editsubmit_btn" value="true" class="formdialog tip_btn bg_f f_0" comiis="handle">{lang save}</button>
                    <a href="javascript:;" onclick="popup.close();" class="tip_btn bg_f f_b"><span class="tip_lx">{lang cancel}</span></a>
                <!--{/if}-->
			</dd>
		</form>
	</div>
<!--{/if}-->
<script type="text/javascript" reload="1">
	function succeedhandle_followbkame_{$followuser[followuid]}(a,b,c) {
		$('#followbkame_{$followuser[followuid]}').html(c['bkname']);
		popup.open(b, 'alert');
	}
</script>
<!--{/if}-->
<!--{template common/footer}-->