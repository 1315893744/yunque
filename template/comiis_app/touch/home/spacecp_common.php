<?PHP exit('Access Denied');?>
<!--{template common/header}-->
<!--{if $_GET['op'] == 'ignore'}-->
<div class="comiis_tip comiis_tip_form bg_f cl">
	<form method="post" autocomplete="off" id="ignoreform_{$formid}" name="ignoreform_{$formid}" action="home.php?mod=spacecp&ac=common&op=ignore&type=$type">
		<div class="tip_tit bg_f f_b b_b" id="return_report">{lang shield_notice}</div>
		<!--{if $_G[inajax]}--><input type="hidden" name="handlekey" value="$_GET[handlekey]" /><!--{/if}-->
		<input type="hidden" name="ignoresubmit" value="true" />
		<input type="hidden" name="formhash" value="{FORMHASH}" />
		<input type="hidden" name="referer" value="{echo dreferer()}">
		<dt class="kmlabs">	
			<div class="tip_form comiis_input_style f_b">
				<input type="radio" name="authorid" id="authorid1" value="$_GET[authorid]" checked="checked" />
				<label for="authorid1"><i class="comiis_font f_0">&#xe645;</i> {lang shield_this_friend}</label>
				<input type="radio" name="authorid" id="authorid0" value="0" />
				<label for="authorid0"><i class="comiis_font f_d">&#xe646;</i> {lang shield_all_friend}</label>
			</div>
		</dt>
		<dd class="b_t cl">
            <!--{if $comiis_app_switch['comiis_post_btnwz'] == 1}-->
                <a href="javascript:;" onclick="popup.close();" class="tip_btn bg_f f_b">{lang cancel}</a>
                <button type="submit" name="feedignoresubmit" value="true" class="formdialog tip_btn bg_f f_0"><span class="tip_lx">{lang determine}</span></button>
            <!--{else}-->
                <button type="submit" name="feedignoresubmit" value="true" class="formdialog tip_btn bg_f f_0">{lang determine}</button>
                <a href="javascript:;" onclick="popup.close();" class="tip_btn bg_f f_b"><span class="tip_lx">{lang cancel}</span></a>
            <!--{/if}-->
		</dd>
	</form>
</div>
<script type="text/javascript">comiis_input_style();</script>
<!--{/if}-->
<!--{template common/footer}-->