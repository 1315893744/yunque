<?PHP exit('Access Denied');?>
<!--{template common/header}-->
<div class="comiis_memu_y bg_f f_b" id="comiis_menu_xcvtr_menu"  style="display:none;">
	<ul>		
		<li><a href="javascript:;" class="b_b comiis_share_key"><i class="comiis_font">&#xe61f;</i>{$comiis_lang['all1']}</a></li>
		<!--{if $album[albumid]>0}-->
		<li><a href="{if $_G['uid']}home.php?mod=spacecp&ac=favorite&type=album&id=$album[albumid]&spaceuid=$space[uid]&handlekey=favorite_album{elseif !$_G[connectguest]}javascript:popup.open('{$comiis_lang['tip16']}', 'confirm', 'member.php?mod=logging&action=login');{else}javascript:popup.open('{$comiis_lang['reg23']}', 'confirm', 'member.php?mod=connect');{/if}" class="{if $_G['uid']}dialog {/if}b_b" comiis="handle"><i class="comiis_font">&#xe617;</i>{lang favorite}</a></li>
		<!--{/if}-->
		<li><a href="{if $_G['uid']}home.php?mod=spacecp&ac=upload{elseif !$_G[connectguest]}javascript:popup.open('{$comiis_lang['tip16']}', 'confirm', 'member.php?mod=logging&action=login');{else}javascript:popup.open('{$comiis_lang['reg23']}', 'confirm', 'member.php?mod=connect');{/if}" class="b_b"><i class="comiis_font">&#xe642;</i>{lang publish}{lang album}</a></li>
        <li><a href="home.php?mod=space&do=album&view=all"{if $_G['uid'] != $album[uid]} class="b_b"{/if}><i class="comiis_font">&#xe657;</i>{$comiis_lang['tip344']}{lang album}{$comiis_lang['tip345']}</a></li>
        <!--{if $_G['uid'] != $album[uid]}-->
		<li><a href="{if $_G['uid']}misc.php?mod=report&rtype=album&uid=$album[uid]&rid=$album[albumid]{elseif !$_G[connectguest]}javascript:popup.open('{$comiis_lang['tip16']}', 'confirm', 'member.php?mod=logging&action=login');{else}javascript:popup.open('{$comiis_lang['reg23']}', 'confirm', 'member.php?mod=connect');{/if}"{if $_G['uid']} class="dialog"{/if}><i class="comiis_font">&#xe636;</i>{$comiis_lang['all2']}</a></li>
		<!--{/if}-->
	</ul>
</div>
<div class="comiis_album_tit">
	<div class="view_top b_b">
		<h2><!--{if ($comiis_isweixin == 1 && ((($_G[uid] == $album[uid] || checkperm('managealbum')) && $album[albumid] > 0) || $space[self])) || $comiis_app_switch['comiis_leftnv'] == 1}--><span href="#moption" class="popup f_g comiis_xifont comiis_edit_rico mt5"><i class="comiis_font">&#xe655;</i>{$comiis_lang['edit']}</span><!--{/if}--><!--{if $album[picnum]}--><span class="f_d">{lang total} $album[picnum] {lang album_pics}</span><!--{/if}-->$album['albumname']</h2>
		<!--{if $list && $album[depict]}-->
			<div class="view_body f_c">$album[depict]</div>
		<!--{/if}-->
	</div>
</div>
<!--{eval comiis_load('YB0kB1Xtk1sF5D3Fv4', 'list,do,pricount,multi,albumlist,space');}-->
<script>
	$(function(){
		comiis_pic_masonry();
	});
	$(window).resize(function(){
		comiis_pic_masonry();
	});
	function comiis_pic_masonry(){
		var comiis_pic_width = ($(window).width() - 36) / 2;
		$('.comiis_album_imgs li').css('width', (comiis_pic_width) + 'px');
		imagesLoaded($('.comiis_album_imgs'),function(){
			$('.comiis_album_imgs').masonry({
				itemSelector:'li',
				columnWidth:comiis_pic_width,
				gutterWidth : 12
			});
		});
	}
</script>
<div class="comiis_share_box bg_e b_t comiis_showleftbox">
	<div id="comiis_share" class="bdsharebuttonbox"></div>
	<h2 class="bg_f f_c b_ok comiis_share_box_close"><a href="javascript:;">{$comiis_lang['all28']}</a></h2>
</div>
<div class="comiis_share_tip"></div>
<script src="template/comiis_app/comiis/js/comiis_nativeShare.js"></script>
<script>
<!--{eval $comiis_share_message = cutstr(str_replace(array("\r\n", "\r", "\n", "'"), '', strip_tags($album[depict])), 100);}-->
var share_obj = new nativeShare('comiis_share', {
	img: (document.getElementsByTagName('img').length > 1 && document.getElementsByTagName('img')[1].src) || '',
	url:'{$_G['siteurl']}home.php?mod=space&do=album&id={$album[albumid]}',
	title:'{$album['albumname']}',
	desc:'{$comiis_share_message}',
	from:'{$_G['setting']['bbname']}'
});
function succeedhandle_favorite_album(a, b, c){
	popup.open(b, 'alert');
}
function errorhandle_favorite_album(a, b){
	popup.open(a, 'alert');
}
function succeedhandle_favorite_add(a, b, c){
	popup.open(b, 'alert');
}
function errorhandle_favorite_add(a, b){
	popup.open(a, 'alert');
}
</script>
<!--{if (($_G[uid] == $album[uid] || checkperm('managealbum')) && $album[albumid] > 0) || $space[self]}-->
	<div id="moption" popup="true" class="comiis_manage comiis_bodybg comiis_popup" style="display:none;" comiis_popup="comiis">
		<ul>
			<!--{if $space[self]}-->
			<li><a href="{if $album[albumid] > 0}home.php?mod=spacecp&ac=album&op=edit&albumid=$album[albumid]{else}home.php?mod=spacecp&ac=album&op=editpic&albumid=0{/if}" class="redirect bg_f b_b">{lang edit_album_information}</a></li>
			<li><a href="home.php?mod=spacecp&ac=album&op=editpic&albumid=$album[albumid]" class="redirect bg_f b_b">{lang edit_pic}</a></li>			
			<!--{/if}-->
			<!--{if ($_G[uid] == $album[uid] || checkperm('managealbum')) && $album[albumid] > 0}--><li><a href="home.php?mod=spacecp&ac=album&op=delete&albumid=$album[albumid]&uid=$album[uid]&handlekey=delalbumhk_{$album[albumid]}" class="dialog bg_f b_b">{lang delete}</a></li><!--{/if}-->
			<li><a href="javascript:;" class="comiis_glclose mt10 bg_f f_g b_t">{lang cancel}</a></li>
		</ul>
	</div>
<!--{/if}-->
<!--{eval $comiis_foot = 'no';}-->
<!--{template common/footer}-->