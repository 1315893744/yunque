<?PHP exit('Access Denied');?>
<!--{template common/header}-->
<!--{if !$blog[noreply] && helper_access::check_module('blog')}--><style>.comiis_footer_scroll {bottom:82px;}</style><!--{/if}-->
<!--{eval include_once DISCUZ_ROOT.'./template/comiis_app/comiis/php/comiis_blog_view.php'}-->
<div class="comiis_wzv">
	<!--{if $comiis_app_switch['comiis_leftnv'] == 1 || ($comiis_isweixin == 1 && ($_G[uid] == $blog[uid] || checkperm('manageblog')))}-->
        <div class="cl">
            <span href="#moption" class="popup f_g comiis_xifont comiis_edit_zico mt12"><i class="comiis_font">&#xe655;</i>{$comiis_lang['edit']}</span>
        </div>
    <!--{/if}-->
	<div class="view_top">
		<h2{if $blog[magiccolor]} style="color: {$_G[colorarray][$blog[magiccolor]]}"{/if}><!--{if $blog[status] == 1}--><span class="view_cat bg_del f_f">{lang pending}</span><!--{/if}--><!--{if $blog[catname]}--><a href="home.php?mod=space&do=blog&view=all&catid=$blog[catid]" class="view_cat bg_0 f_f">{$blog[catname]}</a> <!--{/if}-->$blog[subject]</h2>
		<dt class="b_t">
			<a href="home.php?mod=space&uid=$space[uid]&do=profile"><img src="<!--{avatar($space[uid], middle, true)}-->" class="top_tximg"></a>
			<h2>
				<span class="y f_d">
					<i class="comiis_font">&#xe63a;</i><em>$blog[viewnum]</em>
					<i class="comiis_font">&#xe679;</i><em>$blog[replynum]</em>
					<!--{if $blog[hot]}--><i class="comiis_font f_wb">&#xe64e;</i><em class="f_wb">$blog[hot]</em><!--{/if}-->					
				</span>
				<a href="home.php?mod=space&uid=$space[uid]&do=profile" id="author_$value[cid]" class="top_user f_ok">{$space[username]}</a>
			</h2>
			<span class="top_time">				
				<!--{if $classarr[classname]}-->
					<span class="y f_d"><a href="home.php?mod=space&uid=$blog[uid]&do=blog&classid=$blog[classid]&view=me">#{$classarr[classname]}</a></span>
				<!--{/if}-->
				<span class="f_d"><!--{date($blog[dateline])}--></span>
			</span>
		</dt>			
	</div>
	<div class="view_body cl">
		$blog[message]
	</div>	
	<!--{if $comiis_app_switch['comiis_wzview_atd'] == 1}-->
        <!--{subtemplate home/space_click}-->
	<!--{/if}-->
	<!--{if $blog[tag] && $comiis_app_switch['comiis_blogv_tag'] == 1}-->
	<div class="comiis_tags{if $comiis_app_switch['comiis_view_tagstyle'] == 1}_v2{/if} mt12 mb12 cl">
		<!--{if $comiis_app_switch['comiis_view_tagstyle'] != 1}--><i class="comiis_font f_d">&#xe62c</i><!--{/if}-->
		<!--{eval $tagi = 0;}-->
		<!--{loop $blog[tag] $var}-->
			<!--{if $tagi && $comiis_app_switch['comiis_view_tagstyle'] != 1}--><span class="f_d">, </span><!--{/if}--><a href="misc.php?mod=tag&id=$var[0]&type=blog" class="{if $comiis_app_switch['comiis_view_tagstyle'] == 1}f_d comiis_xifont{else}f_ok{/if}">$var[1]</a>
			<!--{eval $tagi++;}-->
		<!--{/loop}-->
	</div>
	<!--{/if}-->
</div>
<div class="comiis_memu_y bg_f f_b" id="comiis_menu_blogvtr_menu" style="display:none;">
	<ul>		
		<li><a href="javascript:;" class="b_b comiis_share_key"><i class="comiis_font">&#xe61f;</i>{$comiis_lang['all1']}</a></li>
		<li><a href="{if $_G['uid']}home.php?mod=spacecp&ac=favorite&type=blog&id=$blog[blogid]&spaceuid=$blog[uid]&handlekey=favoritebloghk_{$blog[blogid]}{elseif !$_G[connectguest]}javascript:popup.open('{$comiis_lang['tip16']}', 'confirm', 'member.php?mod=logging&action=login');{else}javascript:popup.open('{$comiis_lang['reg23']}', 'confirm', 'member.php?mod=connect');{/if}" class="{if $_G['uid']}dialog {/if}b_b" comiis="handle"><i class="comiis_font">&#xe617;</i>{lang favorite}</a></li>
		<li><a href="{if $_G['uid']}home.php?mod=spacecp&ac=blog{elseif !$_G[connectguest]}javascript:popup.open('{$comiis_lang['tip16']}', 'confirm', 'member.php?mod=logging&action=login');{else}javascript:popup.open('{$comiis_lang['reg23']}', 'confirm', 'member.php?mod=connect');{/if}" class="b_b"><i class="comiis_font">&#xe655;</i>{lang memcp_blog}</a></li>
        <li><a href="home.php?mod=space&do=blog&view=all"{if $_G['uid'] != $blog[uid]} class="b_b"{/if}><i class="comiis_font">&#xe657;</i>{$comiis_lang['tip344']}{lang blog}{$comiis_lang['tip345']}</a></li>
        <!--{if $_G['uid'] != $blog[uid]}-->
		<li><a href="{if $_G['uid']}misc.php?mod=report&rtype=blog&uid=$blog[uid]&rid=$blog[blogid]{elseif !$_G[connectguest]}javascript:popup.open('{$comiis_lang['tip16']}', 'confirm', 'member.php?mod=logging&action=login');{else}javascript:popup.open('{$comiis_lang['reg23']}', 'confirm', 'member.php?mod=connect');{/if}"{if $_G['uid']} class="dialog"{/if}><i class="comiis_font">&#xe636;</i>{$comiis_lang['all2']}</a></li>
		<!--{/if}-->
	</ul>
</div>
<!--{eval comiis_load('pS4q5GZ4Rzr5u5TTRr', 'otherlist,blog,newlist');}-->
<!--{if !$blog[noreply] && helper_access::check_module('blog')}-->
<!--{if $comiis_app_switch['comiis_blogv_fg'] == 0}-->
<div class="comiis_wztit b_0 f_0 cl">
	<h2 class="b_0 f_0">		
		<i class="comiis_font">&#xe607;</i> {lang comment} <!--{if $blog[replynum] > 0}--><em class="f12 f_d">{$blog[replynum]}</em><!--{/if}-->
	</h2>
</div>
<!--{elseif $comiis_app_switch['comiis_blogv_fg'] == 1}-->
	<div class="styli_h10 bg_e b_t b_b"></div>
	<div class="comiis_pltit bg_f b_b cl"><h2>{lang comment}<!--{if $blog[replynum] > 0}--><span class="f12 f_d"><em class="comiis_blog_replynum">{$blog[replynum]}</em></span><!--{/if}--></h2></div>
<!--{elseif $comiis_app_switch['comiis_blogv_fg'] == 2}-->
	<div class="comiis_pltit bg_e b_t b_b cl"><h2>{lang comment}<!--{if $blog[replynum] > 0}--><span class="f12 f_d"><em class="comiis_blog_replynum">{$blog[replynum]}</em></span><!--{/if}--></h2></div>
<!--{/if}-->
<div class="comiis_plli cl">
	<!--{if $blog[replynum] > 0}-->
		<!--{eval $nn = 0;}-->
		<!--{loop $list $k $value}-->
			<!--{eval $nn++;}-->
			<!--{if $nn <= 10}-->
				<!--{template home/space_comment_li}-->
			<!--{/if}-->
		<!--{/loop}-->
	<!--{else}-->
		<div class="comiis_notip comiis_sofa cl">
			<i class="comiis_font f_e cl">&#xe613;</i>
			<span class="f_d">{$comiis_lang['all6']}, {$comiis_lang['all7']}</span>
		</div>				
	<!--{/if}-->
</div>
<!--{if $multi}--><div class="b_t cl">$multi</div><!--{/if}-->
<!--{/if}-->
<!--{if $comiis_app_switch[comiis_vfoot_gohome] == 1 && $comiis_is_new_url == 1}--><!--{$comiis_app_switch[comiis_vfoot_gohomedm]}--><!--{/if}-->
<div class="comiis_share_box bg_e b_t comiis_showleftbox">
	<div id="comiis_share" class="bdsharebuttonbox"></div>
	<h2 class="bg_f f_g b_t comiis_share_box_close"><a href="javascript:;">{lang cancel}</a></h2>
</div>
<div class="comiis_share_tip"></div>
<script src="template/comiis_app/comiis/js/comiis_nativeShare.js"></script>
<script>
<!--{eval $comiis_share_message = cutstr(str_replace(array("\r\n", "\r", "\n", "'"), '', strip_tags($blog[message])), 100);}-->
var share_obj = new nativeShare('comiis_share', {
	img: (document.getElementsByTagName('img').length > 1 && document.getElementsByTagName('img')[1].src) || '',
	url:'{$_G['siteurl']}home.php?mod=space&uid={$blog[uid]}&do=blog&id={$blog[catid]}',
	title:'{$blog[subject]}',
	desc:'{$comiis_share_message}',
	from:'{$_G['setting']['bbname']}'
});
</script>
<!--{if $_G[uid] == $blog[uid] || checkperm('manageblog') || helper_access::check_module('portal')}-->
	<div id="moption" popup="true" class="comiis_manage comiis_bodybg comiis_popup" style="display:none;" comiis_popup="comiis">
		<ul>
			<!--{if helper_access::check_module('portal')}-->
				<!--{if !$blog['friend'] && !$blog['pushedaid'] && (getstatus($_G['member']['allowadmincp'], 2) || $_G['group']['allowmanagearticle'])}-->
				<li><a href="portal.php?mod=portalcp&ac=article&from_idtype=blogid&from_id=$blog[blogid]" class="redirect bg_f b_b">{lang article_push}</a></li>
				<!--{/if}-->
			<!--{/if}-->
			<!--{if $_G[uid] == $blog[uid]}-->
			<!--{eval $stickflag = in_array($blog[blogid], explode(',', $space['stickblogs'])) ? 0 : 1;}-->
			<li><a href="home.php?mod=spacecp&ac=blog&blogid=$blog[blogid]&op=stick&stickflag=$stickflag&handlekey=stickbloghk_{$blog[blogid]}" id="blog_stick_$blog[blogid]" class="dialog bg_f b_b"><!--{if $stickflag}-->{lang stick}<!--{else}-->{lang cancel_stick}<!--{/if}--></a></li>
			<!--{/if}-->
			<!--{if checkperm('manageblog')}-->
			<li><a href="home.php?mod=spacecp&ac=blog&blogid=$blog[blogid]&op=edithot&handlekey=bloghothk_{$blog[blogid]}" class="dialog bg_f b_b">{lang hot}</a></li>
			<!--{/if}-->
			<!--{if $_G[uid] == $blog[uid] || checkperm('manageblog')}-->
			<li><a href="home.php?mod=spacecp&ac=blog&blogid=$blog[blogid]&op=edit" class="redirect bg_f b_b">{lang edit}</a></li>
			<li><a href="home.php?mod=spacecp&ac=blog&blogid=$blog[blogid]&op=delete&handlekey=delbloghk_{$blog[blogid]}" class="dialog bg_f b_b">{lang delete}</a></li>
			<!--{/if}-->
			<li><a href="javascript:;" class="comiis_glclose mt10 bg_f b_t f_g">{lang cancel}</a></li>
		</ul>
	</div>
<!--{/if}-->
<!--{if !$blog[noreply] && helper_access::check_module('blog')}-->
<div class="comiis_foot_height"></div>
<div id="comiis_foot_memu" class="comiis_view_foot bg_e b_t">
	<ul>
    <!--{if $comiis_app_switch['comiis_foot_backico'] == 0}-->
    <!--{if $comiis_app_switch['comiis_header_show'] == 2 || ($comiis_isweixin == 1 && $comiis_app_switch['comiis_header_show'] == 3)}--><li class="backico"><a href="javascript:history.back();" class="b_r"><i class="comiis_font f_d" style="line-height:24px;">&#xe60d</i></a></li><!--{/if}-->
    <!--{elseif $comiis_app_switch['comiis_foot_backico'] == 1}-->
    <li class="backico"><a href="javascript:history.back();" class="b_r"><i class="comiis_font f_d" style="line-height:24px;">&#xe60d</i></a></li>
    <!--{/if}-->
		<li><a href="javascript:;" class="comiis_share_key"><i class="comiis_font f_b">&#xe61f;</i></a></li>
		<li><a href="{if $_G['uid']}home.php?mod=spacecp&ac=favorite&type=blog&id=$blog[blogid]&spaceuid=$blog[uid]&handlekey=favoritebloghk_{$blog[blogid]}{elseif !$_G[connectguest]}javascript:popup.open('{$comiis_lang['tip16']}', 'confirm', 'member.php?mod=logging&action=login');{else}javascript:popup.open('{$comiis_lang['reg23']}', 'confirm', 'member.php?mod=connect');{/if}"{if $_G['uid']} class="dialog" comiis="handle"{/if} id="comiis_favorite_a"><i class="comiis_favorite_a_color comiis_font {if $comiis_thead_fav['favid']}f_a{else}f_b{/if}">{if $comiis_thead_fav['favid']}&#xe64c;{else}&#xe617;{/if}</i>{if $comiis_fav_count}<span class="bg_a f_f comiis_favorite_a_num">{$comiis_fav_count}</span>{/if}</a></li>
		<li><a href="javascript:;" class="comiis_openrebox"><i class="comiis_font f_b">&#xe680;</i>{if $blog[replynum]}<span class="bg_del f_f comiis_kmvnum">$blog[replynum]</span>{/if}</a></li>
		<li class="hf_box"><a href="javascript:;" class="bg_f f_c b_ok comiis_openrebox"><i class="comiis_font">&#xe655;</i><em>{$comiis_lang['tip14']}...</em></a></li>		
	</ul>
</div>
<div class="comiis_fastpostbox comiis_showleftbox bg_e">
<!--{subtemplate home/edit}-->
</div>
<script>
function succeedhandle_favoritebloghk_{$blog[blogid]}(a, b, c){
	popup.open(b, 'alert');
}
function errorhandle_favoritebloghk_{$blog[blogid]}(a, b){
	popup.open(a, 'alert');
}
function succeedhandle_favorite_add(a, b, c){
	$('.comiis_favorite_a_color').removeClass('f_b').addClass("f_a").html('&#xe64c;');
	popup.open(b, 'alert');
}
function errorhandle_favorite_add(a, b){
	popup.open(a, 'alert');
}
var comiis_view_redata;
$('.comiis_openrebox').on('click', function() {
	<!--{if $_G['uid']}-->
		comiis_openrebox(1);
	<!--{else}-->
		popup.open('{lang nologin_tip}', 'confirm', 'member.php?mod=logging&action=login');
	<!--{/if}-->
	return false;
});
<!--{if $_G['uid']}-->
function comiis_openrebox(a){
	if(a == 1){
		$('#comiis_foot_memu').css('display', 'none');
		$('.comiis_fastpostbox').css('display', 'block');
		setTimeout(function() {
			$('.comiis_fastpostbox').addClass("comiis_showrebox");
		}, 20);
		$('#comiis_bgbox').off().on('touchstart', function() {
			$(this).off().css({'display':'none'});
			comiis_openrebox(0);
			if(comiis_view_redata == $('#needmessage').val()){
				$('#needmessage').val('');
				$('#comiis_foot_memu .hf_box em').text('{$comiis_lang['all27']}...');
			}
			comiis_view_redata = '';
			return false;
		}).css({
			'display':'block',
			'width':'100%',
			'height':'100%',
			'position':'fixed',
			'top':'0',
			'left':'0',
			'background':'#000',
			'opacity' : '.7',
			'z-index':'101'
		});
	}else{
		$('#comiis_bgbox').off().css({'display':'none'});
		$('.comiis_fastpostbox').removeClass("comiis_showrebox").on('webkitTransitionEnd transitionend', function() {
			$(this).off().css('display', 'none');
			$('#comiis_foot_memu .hf_box em').text($('#needmessage').val().length > 0 ? $('#needmessage').val() : '{$comiis_lang['all27']}...');
			$('#comiis_foot_memu').css('display', 'block');
		});
	}
}
<!--{/if}-->
</script>
<!--{/if}-->
<!--{eval $comiis_foot = 'no';}-->
<!--{template common/footer}-->   