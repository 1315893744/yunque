<?PHP exit('Access Denied');?>
<!--{template common/header}-->
<!--{if $op == 'comment'}-->
	<!--{loop $list $k $value}-->
		<!--{template home/space_comment_li}-->
	<!--{/loop}-->
<!--{elseif $op == 'district'}-->
$html
<!--{/if}-->
<!--{template common/footer}-->