<?PHP exit('Access Denied');?>
<!--{eval $_G['home_tpl_titles'] = array('{lang message}');}-->
<!--{template common/header}-->
<!--{template home/space_header}-->
<style>.comiis_footer_scroll {bottom:82px;}</style>
<!--{if $_GET['cid'] && $_GET['view'] != 'me'}-->
	<a href="home.php?mod=space&uid={$_GET['uid']}&do=wall&view=me&from=space" class="comiis_loadbtn bg_f f_d">{$comiis_lang['home_openall']}</a>
<!--{/if}-->
<div class="comiis_plli bg_f b_t mt10 cl">			
<!--{if count($list) > 0}-->
	<!--{loop $list $k $value}-->
		<!--{template home/space_comment_li}-->
	<!--{/loop}-->	
<!--{else}-->
	<div class="comiis_notip comiis_sofa mt15 cl">
		<i class="comiis_font f_e cl">&#xe613;</i>
		<span class="f_d">{$comiis_lang['all22']}</span>
	</div>
<!--{/if}-->
</div>
<!--{if $multi}--><div class="b_t cl">$multi</div><!--{/if}-->
<!--{if !$_GET['cid'] && $_GET['view'] == 'me'}-->
<!--{eval comiis_load('RJBRz3jgasJF1jxRfj', 'space,wall');}-->
<!--{/if}-->
<!--{eval $comiis_foot = 'no';}-->
<!--{template common/footer}-->