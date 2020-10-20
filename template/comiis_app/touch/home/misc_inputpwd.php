<?PHP exit('Access Denied');?>
<!--{template common/header}-->
<div class="comiis_password_top">
	<div class="comiis_password_ico"><i class="comiis_font f_0">&#xe67c;</i><i class="comiis_font icoa f_f">&#xe61d;</i></div>
	<p class="f_c">{lang enter_password}</p>
</div>
<div class="comiis_password_form cl">
	<form method="post" autocomplete="off"  id="invalueform" name="invalueform" action="home.php?mod=misc&ac=inputpwd">
		<input type="hidden" name="handlekey" value="$_GET[handlekey]" />
		<input type="hidden" name="refer" value="$_SERVER[REQUEST_URI]" />
		<input type="hidden" name="blogid" value="$invalue[blogid]" />
		<input type="hidden" name="albumid" value="$invalue[albumid]" />
		<input type="hidden" name="pwdsubmit" value="true" />
		<input type="hidden" name="formhash" value="{FORMHASH}" />
		<div class="comiis_password_input bg_f b_ok"><input type="password" name="viewpwd" class="comiis_px" placeholder="{$comiis_lang['reg13']}" /></div>
		<button type="submit" name="submit" value="true" class="comiis_btn bg_c f_f">{lang submit}</button>
	</form>
</div>
<!--{eval $comiis_foot = 'no';}-->
<!--{template common/footer}-->