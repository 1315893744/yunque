<?PHP exit('Access Denied');?>
<!--{template common/header}-->
<div class="comiis_tip comiis_tip_form bg_f cl">
	<form id="attachpayform" method="post" autocomplete="off" action="forum.php?mod=misc&action=attachpay&tid={$_G[tid]}&paysubmit=yes&infloat=yes">
		<input type="hidden" name="formhash" value="{FORMHASH}" />
		<input type="hidden" name="referer" value="{echo dreferer()}" />
		<input type="hidden" name="aid" value="$aid" />
		<div class="tip_tit bg_e f_b b_b">{lang pay_attachment}</div>
		<dt class="kmlab" style="padding-bottom:8px;">
			<div class="tip_form">
				<li class="tip_txt b_b"><span class="y"><a href="home.php?mod=space&uid=$attach[uid]&do=profile" target="_blank">$attach[author]</a></span>{lang author}</li>
				<li class="tip_txt b_b"><span class="y">$attach[filename]</span>{lang attachment}</li>
				<li class="tip_txt b_b"><span class="f_a y">$attach[price] {$_G['setting']['extcredits'][$_G['setting']['creditstransextra'][1]][unit]}</span>{lang price}({$_G['setting']['extcredits'][$_G['setting']['creditstransextra'][1]][title]})</li>
				<!--{if $status != 1}-->
				<li class="tip_txt b_b"><span class="f_a y">$attach[netprice] {$_G['setting']['extcredits'][$_G['setting']['creditstransextra'][1]][unit]}</span>{lang pay_author_income}({$_G['setting']['extcredits'][$_G['setting']['creditstransextra'][1]][title]})</li>
				<li class="tip_txt"><span class="f_a y">$balance {$_G['setting']['extcredits'][$_G['setting']['creditstransextra'][1]][unit]}</span>{lang pay_balance}({$_G['setting']['extcredits'][$_G['setting']['creditstransextra'][1]][title]})</li>
				<!--{/if}-->
				<!--{if $status != 1}-->
				<li class="tip_txt comiis_input_style b_t">
					<input type="checkbox" id="buyall" name="buyall" value="yes" />
					<label for="buyall"><i class="comiis_font"></i> {lang buy_all_attch}</label>
				</li>
				<!--{/if}-->
				<!--{if $status == 1}-->
				<div class="comiis_quote bg_h" style="margin-top:3px;">{lang status_insufficient}</div>
				<!--{elseif $status == 2}-->
				<div class="comiis_quote bg_h" style="margin-top:3px;">{lang status_download}<br><a href="forum.php?mod=attachment&aid=$aidencode" class="f_a">{lang download}</a></div>
				<!--{/if}-->
			</div>
		</dt>
		<!--{if $status != 1}-->
		<dd class="b_t cl">
            <!--{if $comiis_app_switch['comiis_post_btnwz'] == 1}-->
                <a href="javascript:;" onclick="popup.close();" class="tip_btn bg_f f_b">{lang cancel}</a>	
                <button type="submit" name="paysubmit" value="true" class="formdialog tip_btn bg_f f_0"><span class="tip_lx"><!--{if $status == 0}-->{lang pay_attachment}<!--{else}-->{lang free_buy}<!--{/if}--></span></button>	
			<!--{else}-->
                <button type="submit" name="paysubmit" value="true" class="formdialog tip_btn bg_f f_0"><!--{if $status == 0}-->{lang pay_attachment}<!--{else}-->{lang free_buy}<!--{/if}--></button>
                <a href="javascript:;" onclick="popup.close();" class="tip_btn bg_f f_b"><span class="tip_lx">{lang cancel}</span></a>	
			<!--{/if}-->
		</dd>
		<!--{/if}-->
    </form>
</div>
<!--{if $status != 1}--><script>comiis_input_style();</script><!--{/if}-->
<!--{template common/footer}-->