<?PHP exit('Access Denied');?>
<!--{template common/header}-->
<!--{if $postlist[$post[pid]]['invisible'] != 0}-->
	<div class="trdb">{lang post_trade_removed}</div>
	<!--{template common/footer}-->
	{eval exit;}
<!--{/if}-->
<!--{if $_G['forum']['ismoderator']}-->
	<script type="text/javascript">	
		var fid = parseInt('$_G[fid]'), tid = parseInt('$_G[tid]');
		function modaction(action, pid, extra, mod) {
			if(!action) {
				return;
			}
			var mod = mod ? mod : 'forum.php?mod=topicadmin';
			var extra = !extra ? '' : '&' + extra;
			document.getElementById('modactions').action = mod + '&action='+ action +'&fid=' + fid + '&tid=' + tid + '&handlekey=mods&infloat=yes&nopost=yes' + (!pid ? '' : '&topiclist[]=' + pid) + extra + '&r' + Math.random();
			var obj = $('#modactions');
			$.ajax({
				type:'POST',
				url:obj.attr('action') + '&inajax=1',
				data:obj.serialize(),
				dataType:'xml'
			})
			.success(function(s) {
				popup.open(s.lastChild.firstChild.nodeValue);
				evalscript(s.lastChild.firstChild.nodeValue);
			});
		}
		function succeedhandle_mods(a, b, c){
			popup.open(b, 'alert');
		}
	</script>
	<form method="post" autocomplete="off" name="modactions" id="modactions">
	<input type="hidden" name="formhash" value="{FORMHASH}" />
	<input type="hidden" name="optgroup" />
	<input type="hidden" name="operation" />
	<input type="hidden" name="listextra" value="" />
	</form>
<!--{/if}-->
<div class="comiis_memu_y bg_f f_b" id="comiis_menu_vtr_menu"  style="display:none;">
	<ul>		
		<li><a href="javascript:;" class="b_b comiis_share_key"><i class="comiis_font">&#xe61f;</i>{$comiis_lang['all1']}</a></li>
		<!--{if $_G[uid]}--><li><a href="home.php?mod=spacecp&ac=favorite&type=thread&id=$_G[tid]&handlekey=favorite_thread" class="dialog b_b" comiis="handle"><i class="comiis_font">&#xe617;</i>{lang favorite}</a></li><!--{/if}-->
		<li><a href="{if $_G['uid']}misc.php?mod=report&url={$_G[currenturl_encode]}{else}javascript:popup.open('{$comiis_lang['tip16']}', 'confirm', 'member.php?mod=logging&action=login');{/if}"{if $_G['uid']} class="dialog"{/if}><i class="comiis_font">&#xe636;</i>{$comiis_lang['all2']}</a></li>
	</ul>
</div>
<!--{eval include_once DISCUZ_ROOT.'./template/comiis_app/comiis/php/comiis_trade_info.php'}-->
<!--{eval comiis_load('m3r98rZtyFr8fcYuQq', 'trade,post,comiis_thead_fav,page');}-->
<div class="comiis_spbox_top cl">
	<!--{eval comiis_load('UQ8eAcccaEE3QaYweA', 'trade,post,allowpostreply');}-->
	<!--{eval comiis_load('yUOOooDmT8rgzRXUfh', 'usertrades,userthreads,trade');}-->
</div>
<div class="comiis_fastpostbox comiis_showleftbox">
<!--{subtemplate forum/forumdisplay_fastpost}-->
</div>
<div>
<div class="comiis_share_box bg_e b_t comiis_showleftbox">
	<div id="comiis_share" class="bdsharebuttonbox"></div>
	<h2 class="bg_f f_g b_t comiis_share_box_close"><a href="javascript:;">{lang cancel}</a></h2>
</div>
<div class="comiis_share_tip"></div>
<script src="template/comiis_app/comiis/js/comiis_nativeShare.js"></script>
<script>
var share_obj = new nativeShare('comiis_share', {
	img:'{if $trade[thumb]}{$_G['siteurl']}{$trade[thumb]}{/if}',
	url:'{$_G['siteurl']}forum.php?mod=viewthread&do=tradeinfo&tid={$_G['tid']}&pid={$post['pid']}',
	title:'{$trade[subject]}',
	desc:'{echo messagecutstr(str_replace(array("\r\n", "\r", "\n", 'replyreload += \',\' + '.$post[pid].';', "'"), '', strip_tags($post[message])), 100)}',
	from:'{$_G['setting']['bbname']}'
});
function comiis_postre() {
	$.ajax({
		type:'POST',
		url:$('#postforms').attr('action') + '&handlekey=fastposts&loc=1&inajax=1',
		data:$('#postforms').serialize(),
		dataType:'xml'
	})
	.success(function(s) {
		evalscript(s.lastChild.firstChild.nodeValue);
	})
	.error(function() {
		window.location.href = obj.attr('action');
		popup.close();
	});
	return false;
}
function succeedhandle_fastposts(locationhref, message, param) {
	var pid = param['pid'];
	var tid = param['tid'];
	if(pid) {
		$.ajax({
			type:'POST',
			url:'forum.php?mod=viewthread&tid=' + tid + '&viewpid=' + pid + '&mobile=2',
			dataType:'xml'
		})
		.success(function(s) {
			$('.comiis_sofa').css('display', 'none');
			$('#post_new').append(s.lastChild.firstChild.nodeValue);
			popup.open('{$comiis_lang['view9']}', 'alert');
			popup.init();
		})
		.error(function() {
			window.location.href = 'forum.php?mod=viewthread&tid=' + tid;
			popup.close();
		});
	} else {
		if(!message) {
			message = '{lang postreplyneedmod}';
		}
		popup.open(message, 'alert');
	}
}
function errorhandle_fastposts(message, param) {
	popup.open(message, 'alert');
}
</script>
<!--{template common/footer}-->