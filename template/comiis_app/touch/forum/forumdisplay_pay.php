<?PHP exit('Access Denied');?>
<!--{template common/header}-->
<style>.comiis_fastpost_btn {display:none;}</style>
<div class="comiis_password_top">
	<div class="comiis_password_ico"><i class="comiis_font f_0">&#xe67c;</i><i class="comiis_font icoa f_f">&#xe6b9;</i></div>
	<p class="f_c">{lang youneedpay} $paycredits {$_G['setting']['extcredits'][$_G['setting']['creditstransextra'][1]]['unit']}{$_G['setting']['extcredits'][$_G['setting']['creditstransextra'][1]]['title']}<br>{lang onlyintoforum}</p>
</div>
<div class="comiis_password_form cl">
	<form method="post" autocomplete="off" action="forum.php?mod=forumdisplay&fid=$_G[fid]&action=paysubmit">
		<input type="hidden" name="formhash" value="{FORMHASH}" />
		<button type="submit" name="loginsubmit" value="true" class="comiis_btn bg_c f_f">{lang confirmyourpay}</button>
		<button type="button" onclick="history.go(-1)" class="comiis_btn bg_0 f_f mt15">{lang cancel}</button>
	</form>
</div>
<!--{template common/footer}-->