<?PHP exit('Access Denied');?>
<!--{if !empty($albumlist)}-->
	<div class="comiis_p12 f14 bg_f f_c b_b cl" style="padding-bottom:10px;><!--{if $keyword}-->{lang search_result_keyword}<!--{else}-->{lang search_result}<!--{/if}--></div>
<!--{/if}-->
<!--{if empty($albumlist)}-->
	<div class="comiis_notip mt15 cl">
		<i class="comiis_font f_e cl">&#xe613;</i>
		<span class="f_d">{lang search_nomatch}</span>
	</div>
<!--{else}-->
	<div class="comiis_album_list cl">
		<ul>
			<!--{loop $albumlist $key $value}-->
			<li>
				<a href="home.php?mod=space&uid=$value[uid]&do=album&id=$value[albumid]">
					<!--{if $value[pic]}--><img src="{echo str_replace(array('static/image/common/nopublish.jpg'), array('template/comiis_app/comiis/img/comiis_jmalbum.jpg'), $value[pic]);}" class="vm" /><!--{else}--><img src="{IMGDIR}/comiis_noalbum.jpg" class="vm" /><!--{/if}-->
					<span class="album_tit"><!--{if $value[albumname]}-->$value[albumname]<!--{else}-->{lang default_album}<!--{/if}--></span>
					<!--{if $value[picnum]}--><span class="album_num f_f"><i class="comiis_font">&#xe627;</i>{$value[picnum]}</span><!--{/if}-->
				</a>
			</li>
			<!--{/loop}-->		
		</ul>
	</div>
	<!--{if !empty($multipage)}--><div class="mt10 b_t cl">$multipage</div><!--{/if}-->
<!--{/if}-->