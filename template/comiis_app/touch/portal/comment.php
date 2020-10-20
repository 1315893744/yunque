<?PHP exit('Access Denied');?>
<!--{template common/header}-->
<div class="comiis_wzv comiis_wzvall bg_f b_b">
	<div class="view_top">
		<h2><a href="$url">$csubject[title]</a></h2>
		<div class="view_time">
			<span class="f_c y">
				<i class="comiis_font">&#xe63a;</i><!--{if $csubject[viewnum] > 0}-->$csubject[viewnum]<!--{else}-->0<!--{/if}-->{lang view_views}
				<i class="comiis_font">&#xe679;</i>{$csubject[commentnum]}{lang comment}
			</span>
		</div>	
	</div>
</div>
<div class="comiis_plli mt12 bg_f b_t cl">
	<!--{loop $commentlist $comment}-->
		<!--{template portal/comment_li}-->
	<!--{/loop}-->
</div>
<!--{if $pricount}-->
	<p class="mbn mtn y">{lang hide_portal_comment}</p>
<!--{/if}-->
<div class="b_t cl">$multi</div>
<!--{eval $comiis_foot = 'no';}-->
<!--{template common/footer}-->