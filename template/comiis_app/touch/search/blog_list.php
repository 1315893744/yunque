<?PHP exit('Access Denied');?>
<!--{if !empty($bloglist)}-->
	<!--{eval include_once DISCUZ_ROOT.'./template/comiis_app/comiis/php/comiis_blog_list.php'}-->
	<div class="comiis_p12 f14 bg_f f_c b_b cl" style="padding-bottom:10px;"><!--{if $keyword}-->{lang search_result_keyword}<!--{else}-->{lang search_result}<!--{/if}--></div>
<!--{/if}-->
<!--{if empty($bloglist)}-->
	<div class="comiis_notip mt15 cl">
		<i class="comiis_font f_e cl">&#xe613;</i>
		<span class="f_d">{lang search_nomatch}</span>
	</div>
<!--{else}-->	
<div class="comiis_bloglist cl">
	<ul>
	<!--{loop $bloglist $blog}-->
		<li class="bg_f b_t">
			<a href="home.php?mod=space&uid=$blog[uid]&do=profile" class="blog_avt"><!--{avatar($blog[uid],small)}--></a>
			<div class="blog_tit">
				<a href="home.php?mod=space&uid=$blog[uid]&do=blog&id=$blog[blogid]">$blog['subject']</a>					
			</div>
			<div class="blog_user">
				<!--{if $blog['hot']}--><span class="f_wb y"><i class="comiis_font">&#xe64e;</i><em>$blog[hot]</em></span><!--{/if}-->
				<span class="f_d y"><i class="comiis_font">&#xe63a;</i><em>$blog[viewnum]</em></span>
				<span class="f_d y"><i class="comiis_font">&#xe679;</i><em>$blog[replynum]</em></span>					
				<a href="home.php?mod=space&uid=$blog[uid]&do=profile" class="f_0">$blog[username]</a>
				<span class="f_d">$blog[dateline]</span>
			</div>
			<div class="blog_mes f_c cl">
				<a href="home.php?mod=space&uid=$blog[uid]&do=blog&id=$blog[blogid]">
					<!--{if $blogarray[$blog['blogid']]['pic']}--><div class="blog_img"><img src="$blogarray[$blog['blogid']]['pic']" /></div><!--{/if}-->
					{$blogarray[$blog['blogid']]['message']}
				</a>
			</div>
		</li>
	<!--{/loop}-->	
	</ul>
</div>
<!--{/if}-->
<!--{if !empty($multipage)}--><div class="b_t cl">$multipage</div><!--{/if}-->