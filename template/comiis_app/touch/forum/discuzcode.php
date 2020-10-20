<?PHP exit('Access Denied');?>
<!--{eval require_once DISCUZ_ROOT.'./template/comiis_app/comiis/php/comiis_lang.'.currentlang().'.php';}-->
<!--{eval}-->
function tpl_hide_credits_hidden($creditsrequire) {
	global $_G;
<!--{/eval}-->
<!--{block return}--><div class="comiis_quote bg_h f_c"><!--{if $_G[uid]}-->{$_G[username]}<!--{else}-->{lang guest}<!--{/if}-->{lang post_hide_credits_hidden}</div><!--{/block}-->
<!--{eval}-->
	return $return;
}
function tpl_hide_credits($creditsrequire, $message) {
<!--{/eval}-->
<!--{block return}--><div class="comiis_quote bg_h f_c">{lang post_hide_credits}</div>
$message
<!--{/block}-->
<!--{eval}-->
	return $return;
}
function tpl_codedisp($code) {
<!--{/eval}-->
<!--{block return}--><div class="comiis_blockcode comiis_bodybg b_ok f_b"><div class="bg_f b_l"><ol><li>$code</ol></div></div><!--{/block}-->
<!--{eval}-->
	return $return;
}
function tpl_quote() {
<!--{/eval}-->
<!--{block return}--><div class="comiis_quote bg_h b_dashed f_c"><blockquote><font size="2">{lang reply}</font> \\1</blockquote></div><!--{/block}-->
<!--{eval}-->
	return $return;
}
function tpl_free() {
<!--{/eval}-->
<!--{block return}--><div class="comiis_quote bg_h f_c"><blockquote>\\1</blockquote></div><!--{/block}-->
<!--{eval}-->
	return $return;
}
function tpl_hide_reply() {
	global $_G;
<!--{/eval}-->
<!--{block return}--><div class="comiis_quote bg_h f_c"><h2 class="f_a">{lang post_hide}: </h2>\\1</div>
<!--{/block}-->
<!--{eval}-->
	return $return;
}
function tpl_hide_reply_hidden() {
	global $_G;
<!--{/eval}-->
<!--{block return}--><div class="comiis_quote bg_h f_c"><!--{if $_G[uid]}-->{$_G[username]}<!--{else}-->{lang guest}<!--{/if}-->{lang post_hide_reply_hidden}</div><!--{/block}-->
<!--{eval}-->
	return $return;
}
function attachlist($attach) {
	global $_G, $post;
	if($post['first'] && $_G['forum_threadpay']){
		return;	
	}
	$attach['refcheck'] = (!$attach['remote'] && $_G['setting']['attachrefcheck']) || ($attach['remote'] && ($_G['setting']['ftp']['hideurl'] || ($attach['isimage'] && $_G['setting']['attachimgpost'] && strtolower(substr($_G['setting']['ftp']['attachurl'], 0, 3)) == 'ftp')));
	$aidencode = packaids($attach);
	$is_archive = $_G['forum_thread']['is_archived'] ? "&fid=".$_G['fid']."&archiveid=".$_G[forum_thread][archiveid] : '';
<!--{/eval}-->
<!--{block return}-->
	<div class="comiis_attach bg_e b_ok cl">
		<a {if $_G['uid']}{if !$attach['price'] || $attach['payed']}href="forum.php?mod=attachment{$is_archive}&aid=$aidencode"{else}href="forum.php?mod=misc&action=attachpay&aid=$attach[aid]&tid=$attach[tid]" class="dialog"{/if}{else}href="javascript:;" class="comiis_openrebox"{/if}>
			<i class="comiis_font f_ok">&#xe649;</i>
			<p class="attach_tit">
				$attach[attachicon]
				<!--{if !$attach['price'] || $attach['payed']}-->
				<span class="f_ok">$attach[filename]</span>
				<!--{else}-->
				<span class="f_ok">$attach[filename]</span>
				<!--{/if}-->
				<em class="f_d">&nbsp;{$attach[dateline]}{lang upload}</em>
			</p>		
			<p class="attach_size f_c">
			$attach[attachsize] <!--{if $attach['readperm']}-->, {lang readperm}: $attach[readperm]<!--{/if}-->, {lang downloads}: $attach[downloads]<!--{if !$attach['attachimg'] && $_G['getattachcredits']}-->, {lang attachcredits}: $_G[getattachcredits]<!--{/if}-->
			</p>
		</a>
		<!--{if $attach['description'] || $attach['price']}-->	
		<div class="attach_txt bg_f b_ok">
			<!--{if $attach['price']}-->
				<h2 class="{if $attach['description']}b_b {/if}f_a">
					<!--{if !$attach['payed']}--><a {if $_G['uid']}href="forum.php?mod=misc&action=attachpay&aid=$attach[aid]&tid=$attach[tid]" class="dialog"{else}href="javascript:;" class="comiis_openrebox"{/if}>[{lang attachment_buy}]</a><!--{/if}-->
					<a {if $_G['uid']}href="forum.php?mod=misc&action=viewattachpayments&aid=$attach[aid]"{else}href="javascript:;" class="comiis_openrebox"{/if}>[{lang pay_view}]</a>
					{lang price}: $attach[price] {$_G['setting']['extcredits'][$_G['setting']['creditstransextra'][1]][unit]}{$_G['setting']['extcredits'][$_G['setting']['creditstransextra'][1]][title]}
				</h2>
			<!--{/if}-->
			<!--{if $attach['description']}--><span class="f_c">{$attach[description]}</span><!--{/if}-->
		</div>
		<!--{/if}-->
	</div>	
<!--{/block}-->
<!--{eval}-->
	return $return;
}
function imagelist($attach, $firstpost = 0) { 
	global $_G, $post, $aimgs, $comiis_app_switch, $comiis_lang;
	if($post['first'] && $_G['forum_threadpay']){
		return;	
	}
	$guestviewthumb = !empty($_G['setting']['guestviewthumb']['flag']) && !$_G['uid'];	
	if($guestviewthumb){
		if ($post['first'] == 0 && $comiis_app_switch['comiis_aimg_show'] == 1 || $comiis_app_switch['comiis_aimg_oneshow'] == 1 && $post['first'] == 1) {
			if (count($post['imagelist']) == 1){
				$mobilethumburl = getforumimg($attach['aid'], 0, 300, 300, 'fixnone');		
			}else{
				$mobilethumburl = getforumimg($attach['aid'], 0, 350, 320, 2);		
			}
		}else{
		$mobilethumburl = getforumimg($attach['aid'], 0, 300, 300, 'fixnone');
		}		
	}else{
		$mobilethumburl = $attach['attachimg'] && $_G['setting']['showimages'] && (!$attach['price'] || $attach['payed']) && ($_G['group']['allowgetimage'] || $_G['uid'] == $attach['uid']) ? (((($comiis_app_switch['comiis_aimg_oneshow'] == 0 && $post['first'] == 1) || ($comiis_app_switch['comiis_aimg_show'] == 0  && $post['first'] == 0)) || count($aimgs[$post['pid']]) == 1) ? ($comiis_app_switch['comiis_view_imgdata'] == 1 ? $attach[url].$attach[attachment] : getforumimg($attach['aid'], 0, 600, 1000, 'fixnone')) : getforumimg($attach['aid'], 0, 350, 320, 2)) : '' ;
	}
<!--{/eval}-->
<!--{block return}-->
	<!--{if $attach['attachimg'] && $_G['setting']['showimages'] && (($_G['group']['allowgetimage'] || $_G['uid'] == $attach['uid']) || (($guestviewthumb)))}-->
		<!--{if $guestviewthumb}-->
			<!--{if $post['first'] == 0 && $comiis_app_switch['comiis_aimg_show'] == 1 || $comiis_app_switch['comiis_aimg_oneshow'] == 1 && $post['first'] == 1}-->
			<li><a href="javascript:;"{if !$_G[connectguest]} onclick="popup.open('{$comiis_lang['tip8']}', 'confirm', 'member.php?mod=logging&action=login');"{else} onclick="popup.open('{$comiis_lang['reg23']}', 'confirm', 'member.php?mod=connect');"{/if}><img id="aimg_$attach[aid]" {if $comiis_app_switch['comiis_loadimg']}src="./template/comiis_app/pic/none.png" comiis_loadimages={else}src={/if}"$mobilethumburl" alt="{if $attach['description']}$attach['description']{else}{$_G['forum_thread']['subject']}{/if}[{$attach[imgalt]}]"{if $comiis_app_switch['comiis_loadimg']} class="comiis_loadimages"{/if} /></a></li>
			<!--{else}-->
			<div class="comiis_nouidpic">
				<a href="javascript:;"{if !$_G[connectguest]} onclick="popup.open('{$comiis_lang['tip8']}', 'confirm', 'member.php?mod=logging&action=login');"{else} onclick="popup.open('{$comiis_lang['reg23']}', 'confirm', 'member.php?mod=connect');"{/if}><img id="aimg_$attach[aid]" {if $comiis_app_switch['comiis_loadimg']}src="./template/comiis_app/pic/none.png" comiis_loadimages={else}src={/if}"$mobilethumburl" alt="{if $attach['description']}$attach['description']{else}{$_G['forum_thread']['subject']}{/if}[{$attach[imgalt]}]" class="vm{if $comiis_app_switch['comiis_loadimg']} comiis_loadimages{/if}" /></a>
				<div class="comiis_nouidpic_tip f_ok"><a href="javascript:;"{if !$_G[connectguest]} onclick="popup.open('{$comiis_lang['tip8']}', 'confirm', 'member.php?mod=logging&action=login');"{else} onclick="popup.open('{$comiis_lang['reg23']}', 'confirm', 'member.php?mod=connect');"{/if}>{lang guestviewthumb}</a></div>
			</div>
			<!--{/if}-->
		<!--{else}-->
			<li><span onclick="window.location.href='forum.php?mod=viewthread&tid=$attach[tid]&aid=$attach[aid]&from=album&page=$_G[page]'"><img id="aimg_$attach[aid]" {if $comiis_app_switch['comiis_loadimg']}src="./template/comiis_app/pic/none.png" comiis_loadimages={else}src={/if}"$mobilethumburl" alt="{if $attach['description']}$attach['description']{else}{$_G['forum_thread']['subject']}{/if}[{$attach[imgalt]}]"{if $comiis_app_switch['comiis_loadimg']} class="comiis_loadimages"{/if} /></span></li>
		<!--{/if}-->
	<!--{/if}-->
<!--{/block}-->
<!--{eval}-->
	return $return;
}
function attachinpost($attach, $post) {
	global $_G, $comiis_lang, $comiis_app_switch, $post;
	if($post['first'] && $_G['forum_threadpay']){
		return;	
	}
	$guestviewthumb = !empty($_G['setting']['guestviewthumb']['flag']) && !$_G['uid'];	
	if($guestviewthumb){
		$mobilethumburl = getforumimg($attach['aid'], 0, 300, 300, 'fixnone');
	}else{
		$mobilethumburl = $attach['attachimg'] && $_G['setting']['showimages'] && (!$attach['price'] || $attach['payed']) && ($_G['group']['allowgetimage'] || $_G['uid'] == $attach['uid']) ? ($comiis_app_switch['comiis_view_imgdata'] == 1 ? $attach[url].$attach[attachment] : getforumimg($attach['aid'], 0, 600, 1000, 'fixnone')) : getforumimg($attach['aid'], 0, 160, 300, 'fixnone') ;
	}	
	$is_archive = $_G['forum_thread']['is_archived'] ? '&fid='.$_G['fid'].'&archiveid='.$_G[forum_thread][archiveid] : '';
	$attach['refcheck'] = (!$attach['remote'] && $_G['setting']['attachrefcheck']) || ($attach['remote'] && ($_G['setting']['ftp']['hideurl'] || ($attach['isimage'] && $_G['setting']['attachimgpost'] && strtolower(substr($_G['setting']['ftp']['attachurl'], 0, 3)) == 'ftp')));
	$aidencode = packaids($attach);
<!--{/eval}-->
<!--{block return}-->
	<!--{if $attach['attachimg'] && $_G['setting']['showimages'] && (((!$attach['price'] || $attach['payed']) && ($_G['group']['allowgetimage'] || $_G['uid'] == $attach['uid'])) || (($guestviewthumb)))}-->
		<!--{if $guestviewthumb}-->
		<div class="comiis_nouidpic">
			<a href="javascript:;"{if !$_G[connectguest]} onclick="popup.open('{$comiis_lang['tip8']}', 'confirm', 'member.php?mod=logging&action=login');"{else} onclick="popup.open('{$comiis_lang['reg23']}', 'confirm', 'member.php?mod=connect');"{/if}><img id="aimg_$attach[aid]" {if $comiis_app_switch['comiis_loadimg']}src="./template/comiis_app/pic/none.png" comiis_loadimages={else}src={/if}"$mobilethumburl" alt="$attach[imgalt]" title="$attach[imgalt]" class="vm{if $comiis_app_switch['comiis_loadimg']} comiis_noloadimage comiis_loadimages{/if}" /></a>
			<div class="comiis_nouidpic_tip f_ok"><a href="javascript:;"{if !$_G[connectguest]} onclick="popup.open('{$comiis_lang['tip8']}', 'confirm', 'member.php?mod=logging&action=login');"{else} onclick="popup.open('{$comiis_lang['reg23']}', 'confirm', 'member.php?mod=connect');"{/if}>{lang guestviewthumb}</a></div>
		</div>
		<!--{else}-->
		<span onclick="window.location.href='forum.php?mod=viewthread&tid=$attach[tid]&aid=$attach[aid]&from=album&page=$_G[page]'" class="comiis_postimg vm"><img id="aimg_$attach[aid]" {if $comiis_app_switch['comiis_loadimg']}src="./template/comiis_app/pic/none.png" comiis_loadimages={else}src={/if}"$mobilethumburl" alt="$attach[imgalt]" title="$attach[imgalt]"{if $comiis_app_switch['comiis_loadimg']} class="comiis_loadimages"{/if} /></span>			
		<!--{/if}-->				
	<!--{else}-->
	<div class="comiis_attach bg_e b_ok cl">
		<a {if $_G['uid']}{if !$attach['price'] || $attach['payed']}href="forum.php?mod=attachment{$is_archive}&aid=$aidencode"{else}href="forum.php?mod=misc&action=attachpay&aid=$attach[aid]&tid=$attach[tid]" class="dialog"{/if}{else}href="javascript:;" class="comiis_openrebox"{/if}>
			<p class="attach_tit">
				$attach[attachicon]
				<!--{if !$attach['price'] || $attach['payed']}-->
				<span class="f_ok">$attach[filename]</span>
				<!--{else}-->
				<span class="f_ok">$attach[filename]</span>
				<!--{/if}-->
				<em class="f_d">&nbsp;{$attach[dateline]}{lang upload}</em>
			</p>		
			<p class="attach_size f_c">
			$attach[attachsize] <!--{if $attach['readperm']}-->, {lang readperm}: $attach[readperm]<!--{/if}-->, {lang downloads}: $attach[downloads]<!--{if !$attach['attachimg'] && $_G['getattachcredits']}-->, {lang attachcredits}: $_G[getattachcredits]<!--{/if}-->
			</p>
		</a>
		<!--{if $attach['description'] || $attach['price']}-->	
		<div class="attach_txt bg_f b_ok">
			<!--{if $attach['price']}-->
				<h2 class="{if $attach['description']}b_b {/if}f_a">
					<!--{if !$attach['payed']}--><a {if $_G['uid']}href="forum.php?mod=misc&action=attachpay&aid=$attach[aid]&tid=$attach[tid]" class="dialog"{else}href="javascript:;" class="comiis_openrebox"{/if}>[{lang attachment_buy}]</a><!--{/if}-->
					<a {if $_G['uid']}href="forum.php?mod=misc&action=viewattachpayments&aid=$attach[aid]"{else}href="javascript:;" class="comiis_openrebox"{/if}>[{lang pay_view}]</a>
					{lang price}: $attach[price] {$_G['setting']['extcredits'][$_G['setting']['creditstransextra'][1]][unit]}{$_G['setting']['extcredits'][$_G['setting']['creditstransextra'][1]][title]}
				</h2>
			<!--{/if}-->
			<!--{if $attach['description']}--><span class="f_c">{$attach[description]}</span><!--{/if}-->
		</div>
		<!--{/if}-->
	</div>
	<!--{/if}-->
<!--{/block}-->
<!--{eval}-->
	return $return;
}
<!--{/eval}-->