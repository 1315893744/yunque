<?PHP exit('Access Denied');?>
<!--{if !empty($articlelist)}-->
	<div class="comiis_p12 f14 bg_f f_c b_b cl" style="padding-bottom:10px;"><!--{if $keyword}-->{lang search_result_keyword}<!--{else}-->{lang search_result}<!--{/if}--></div>
<!--{/if}-->
<div class="comiis_wz_list cl">
	<!--{if empty($articlelist)}-->
		<li class="comiis_notip mt15 cl">
			<i class="comiis_font f_e cl">&#xe613;</i>
			<span class="f_d">{lang search_nomatch}</span>
		</li>
	<!--{else}-->
		<!--{loop $articlelist $article}-->
		<li class="wz_list b_t">
			<a href="{echo fetch_article_url($article);}">
				<!--{if $article[pic]}--><div class="wz_img"><img src="$article[pic]" width="160" height="120"></div><!--{/if}-->
				<div class="wz_info">
					<p{if empty($article[pic])} style="height:22px"{/if}>$article[title]</p>
					<!--{if empty($article[pic])}--><span class="f_d">$article[summary]</span><!--{/if}-->
					<span class="f_d"><em>$article[viewnum] {$comiis_lang['view47']}</em>$article[dateline]</span>
				</div>
			</a>
		</li>
		<!--{/loop}-->
	<!--{/if}-->
	<!--{if !empty($multipage)}--><div class="mt10 b_t cl">$multipage</div><!--{/if}-->
</div>