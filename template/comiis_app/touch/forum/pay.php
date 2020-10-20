<?PHP exit('Access Denied');?>
<!--{template common/header}-->
<div class="comiis_tip comiis_tip_form bg_f cl">
	<form id="payform" method="post" autocomplete="off" action="forum.php?mod=misc&action=pay&paysubmit=yes&infloat=yes{if !empty($_GET['from'])}&from=$_GET['from']{/if}">	
		<input type="hidden" name="formhash" value="{FORMHASH}" />
		<input type="hidden" name="referer" value="{echo dreferer()}" />
		<input type="hidden" name="tid" value="$_G[tid]" />
		<input type="hidden" name="handlekey" value="$_GET['handlekey']" />
		<div class="tip_tit bg_e f_b b_b">{lang pay}</div>
		<dt class="kmlab" style="padding-bottom:8px;">
			<div class="tip_form">
				<li class="tip_txt b_b"><span class="f_0 y"><a href="home.php?mod=space&uid=$thread[authorid]&do=profile" target="_blank">$thread[author]</a></span>{lang author}</li>
				<li class="tip_txt b_b"><span class="y">$thread[price] {$_G['setting']['extcredits'][$_G['setting']['creditstransextra'][1]][unit]}</span>{lang price}({$_G['setting']['extcredits'][$_G['setting']['creditstransextra'][1]][title]})</li>
				<li class="tip_txt b_b"><span class="y">$thread[netprice] {$_G['setting']['extcredits'][$_G['setting']['creditstransextra'][1]][unit]}</span>{lang pay_author_income}({$_G['setting']['extcredits'][$_G['setting']['creditstransextra'][1]][title]})</li>
				<li class="tip_txt"><span class="y">$balance {$_G['setting']['extcredits'][$_G['setting']['creditstransextra'][1]][unit]}</span>{lang pay_balance}({$_G['setting']['extcredits'][$_G['setting']['creditstransextra'][1]][title]})</li>
			</div>
		</dt>
		<dd class="b_t cl">
            <!--{if $comiis_app_switch['comiis_post_btnwz'] == 1}-->
                <a href="javascript:;" onclick="popup.close();" class="tip_btn bg_f f_b">{lang cancel}</a>
                <button type="submit" name="paysubmit" value="{lang submit}" class="formdialog tip_btn bg_f f_0"><span class="tip_lx">{lang submit}</span></button>	
			<!--{else}-->
                <button type="submit" name="paysubmit" value="{lang submit}" class="formdialog tip_btn bg_f f_0">{lang submit}</button>	
                <a href="javascript:;" onclick="popup.close();" class="tip_btn bg_f f_b"><span class="tip_lx">{lang cancel}</span></a>
			<!--{/if}-->
		</dd>
    </form>
</div>
<!--{if !empty($_GET['infloat'])}-->
<script type="text/javascript" reload="1">
function succeedhandle_$_GET['handlekey'](locationhref) {
	<!--{if !empty($_GET['from'])}-->
		location.href = locationhref;
	<!--{else}-->		
		alert('{$comiis_lang['tip57']}');
	<!--{/if}-->
}
</script>
<!--{/if}-->
<!--{template common/footer}-->