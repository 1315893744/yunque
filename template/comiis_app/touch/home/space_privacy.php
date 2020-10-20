<?PHP exit('Access Denied');?>
<!--{template common/header}-->
<div class="comiis_password_top">
	<div class="comiis_password_user f_0"><a href="home.php?mod=space&uid=$space[uid]&do=profile"><!--{avatar($space[uid],middle)}-->{$space[username]}</a></div>
	<p class="f_c">{lang set_privacy}</p>
</div>
<div class="comiis_password_form cl">
	<!--{if !$isfriend}-->
	<a href="home.php?mod=spacecp&ac=friend&op=add&uid=$space[uid]" id="add_friend" class="dialog comiis_btn bg_c f_f">{lang add_friend}</a>
	<!--{/if}-->
</div>
<!--{eval $comiis_foot = 'no';}-->
<!--{template common/footer}-->