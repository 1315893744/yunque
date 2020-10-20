<?PHP exit('Access Denied');?>
<!--{eval $_G['home_tpl_titles'] = array('{lang pm}');$online = C::app()->session->fetch_by_uid($touid) ? 1 : 0;}-->
<!--{template common/header}-->
<style>.comiis_footer_scroll {bottom:82px;}</style>
<!--{if in_array($filter, array('privatepm','announcepm'))}-->
	<!--{if in_array($filter, array('privatepm','announcepm'))}-->
        <!--{if $comiis_app_switch['comiis_subnv_top'] != 1}--><div style="height:40px;"><div class="comiis_scrollTop_box"><!--{/if}-->
		<div class="comiis_topnv bg_f b_b">
			<ul class="comiis_flex">
				<li class="flex{if $actives[privatepm]} f_0{/if}">{if $actives[privatepm]}<em class="bg_0"></em>{/if}<a href="home.php?mod=space&do=pm&filter=privatepm"{if !$actives[privatepm]} class="f_c"{/if}>{lang private_pm}</a></li>
				<li class="flex{if $actives[announcepm]} f_0{/if}">{if $actives[announcepm]}<em class="bg_0"></em>{/if}<a href="home.php?mod=space&do=pm&filter=announcepm"{if !$actives[announcepm]} class="f_c"{/if}>{lang announce_pm}</a></li>
			</ul>
		</div>
		<!--{if $comiis_app_switch['comiis_subnv_top'] != 1}--></div></div><!--{/if}-->
	<!--{/if}-->
	<!--{if $filter == 'privatepm'}-->
		<div class="comiis_pmlist mt10 bg_f b_t cl">
			<!--{loop $list $key $value}-->
			<!--{if $value[pmtype] != 2}-->
			<a href="{if $value[touid]}home.php?mod=space&do=pm&subop=view&touid=$value[touid]{else}home.php?mod=space&do=pm&subop=view&plid={$value['plid']}&type=1{/if}" class="b_b">
				<!--{if $value[new]}--><span class="kmnums bg_del f_f"></span><!--{/if}-->
				<!--{if $value[pmtype] == 2}--><div class="systempm bg_0"><i class="comiis_font f_f">&#xe629;</i></div><!--{else}--><img src="<!--{avatar($value[touid] ? $value[touid] : ($value[lastauthorid] ? $value[lastauthorid] : $value[authorid]), middle, true)}-->"><!--{/if}-->
				<h2>
					<span class="f_d"><!--{date($value[dateline], 'u')}--></span>
					<!--{if $value[touid]}-->
						{$value[tousername]}
					<!--{elseif $value['pmtype'] == 2}-->
						{lang chatpm_author}:$value['firstauthor']
					<!--{/if}-->
				</h2>
				<p class="f_c"><!--{if $value['pmtype'] == 2}-->[{lang chatpm}]<!--{if $value[subject]}-->$value[subject]<!--{/if}--><!--{/if}--><!--{if $value['pmtype'] == 2 && $value['lastauthor']}-->$value['lastauthor'] : $value[message]<!--{else}-->$value[message]<!--{/if}--></p>
			</a>
			<!--{/if}-->
			<!--{/loop}-->
		</div>
	<!--{elseif $filter == 'announcepm'}-->
		<!--{if $count || $grouppms}-->
			<!--{if $grouppms}-->
				<div class="comiis_pmlist mt10 bg_f b_t cl">
				<!--{loop $grouppms $grouppm}-->
					<a href="home.php?mod=space&do=pm&subop=viewg&pmid=$grouppm[id]" class="b_b">
						<!--{if !$gpmstatus[$grouppm[id]]}--><span class="kmnums bg_del f_f"></span><!--{/if}-->
						<!--{if $grouppm[author]}--><div class="systempm bg_0"><i class="comiis_font f_f">&#xe614;</i></div><!--{else}--><div class="systempm bg_a"><i class="comiis_font f_f">&#xe614;</i></div><!--{/if}-->
						<h2>
							<span class="f_d"><!--{date($grouppm[dateline], 'u')}--></span>
							<!--{if $grouppm[author]}-->
								{$grouppm[author]}
							<!--{else}-->
								{$comiis_lang['all46']}
							<!--{/if}-->
						</h2>
						<p class="f_c">$grouppm[message]</p>
					</a>
				<!--{/loop}-->
				</div>
			<!--{/if}-->
		<!--{else}-->			
			<div class="comiis_notip comiis_sofa cl">
				<i class="comiis_font f_e cl">&#xe613;</i>
				<span class="f_d">{$comiis_lang['all47']}{$comiis_lang['all46']}</span>
			</div>
		<!--{/if}-->
	<!--{/if}-->
<!--{elseif $_GET[subop] == 'view'}-->
<!--{eval include_once DISCUZ_ROOT.'./template/comiis_app/comiis/php/comiis_pm.php'}-->
<!--{if $_GET['viewall'] == '1'}-->
		<!--{if !$result}-->
			<div class="comiis_notip comiis_sofa cl">
				<i class="comiis_font f_e cl">&#xe613;</i>
				<span class="f_d">{lang no_corresponding_pm}</span>
			</div>			
		<!--{else}-->
			<!--{loop $result $key $value}-->
				<!--{if $value[msgfromid] != $_G['uid']}-->
				<div class="comiis_friend_msg cl">
					<a href="home.php?mod=space&uid=$value[msgfromid]&do=profile"><img class="msg_avt z" src="<!--{avatar($value[msgfromid], middle, true)}-->" /></a>
					<div class="dialog_white z">
						<div class="msg_mes">$value[message]</div>
						<div class="msg_time f_d"><!--{date($value[dateline], 'u')}--></div>
					</div>
				</div>
				<!--{else}-->
				<div class="comiis_self_msg cl">
					<a href="home.php?mod=space&uid=$value[msgfromid]&do=profile"><img class="msg_avt y" src="<!--{avatar($value[msgfromid], middle, true)}-->" /></a>
					<div class="dialog_green y">			
						<div class="msg_mes">$value[message]</div>
						<div class="msg_time f_d"><!--{date($value[dateline], 'u')}--></div>
					</div>
				</div>
				<!--{/if}-->
			<!--{/loop}-->
			<div class="comiis_msgpage cl">$multi</div>
		<!--{/if}-->
<!--{else}-->
	<script>var action = '{$_GET[action]}';</script>
	<script src="data/cache/common_smilies_var.js?{VERHASH}" charset="{CHARSET}"></script>
	<script src="template/comiis_app/comiis/js/comiis_swiper.min.js?{VERHASH}"></script>
	<div class="comiis_msgbox">			
		<div id="comiis_pm_list">
		<!--{if !$result}-->
			<div class="comiis_notip comiis_sofa cl">
				<i class="comiis_font f_e cl">&#xe613;</i>
				<span class="f_d">{lang no_corresponding_pm}</span>
			</div>
		<!--{else}-->
			<!--{loop $msglist $day $msgarr}-->
				<div class="comiis_msg_date f_f cl"><span>$day</span></div>
				<!--{loop $msgarr $value}-->
					<div class="{if $value['msgfromid'] != $_G['uid']}comiis_friend_msg{else}comiis_self_msg{/if} cl">
						<a href="home.php?mod=space&uid={$value['msgfromid']}&do=profile"><img class="msg_avt {if $value['msgfromid'] != $_G['uid']}z{else}y{/if}" src="<!--{avatar($value['msgfromid'], middle, true)}-->" /></a>
						<div class="{if $value['msgfromid'] != $_G['uid']}dialog_white z{else}dialog_green y{/if}">
							<div class="msg_mes">$value[message]</div>
							<div class="msg_time f_d">
							
							
							<!--{if dgmdate($value['dateline'], 'H') < 12}-->{$comiis_lang['all49']}<!--{else}-->{$comiis_lang['all50']}<!--{/if}-->&nbsp;<!--{date($value['dateline'], 'H:i:s')}--></div>
						</div>
					</div>
				<!--{/loop}-->
			<!--{/loop}-->
		<!--{/if}-->
		<div id="comiis_pm_list_new"></div>
		</div>
	</div>
	<div class="comiis_sendpm_box bg_f b_t">
		<form id="pmform" class="pmform" name="pmform" method="post" action="home.php?mod=spacecp&ac=pm&op=send&pmid=$pmid&daterange=2&pmsubmit=yes&mobile=2" >
			<input type="hidden" name="formhash" value="{FORMHASH}" />
			<!--{if !$touid}-->
			<input type="hidden" name="plid" value="$plid" />
			<!--{else}-->
			<input type="hidden" name="touid" value="$touid" />
			<!--{/if}-->
			<div class="comiis_flex comiis_sendpm">
				<div class="styli_tit comiis_post_ico f_c cl">
					<a href="javascript:;"><i class="comiis_font">&#xe62e;</i></a>
				</div>
				<div class="flex"><input type="text" value="" class="comiis_input b_b" autocomplete="off" id="needmessage" name="message" placeholder="{$comiis_lang['post15']}..."></div>
				<div class="styli_r"><input type="button" name="pmsubmit" id="pmsubmit" class="formdialog comiis_btn bg_0 f_f" value="{lang send}" comiis="handle" /></div>
			</div>	
		</form>
		<div id="comiis_post_tab">
			<div class="comiis_minibq bg_f cl" style="display:none;">
				<div class="comiis_smiley_box">
					<div class="swiper-wrapper bqbox_c comiis_optimization"></div>
					<div class="bqbox_b cl"></div>
				</div>
				<div class="bqbox_t bg_e cl">
					<ul id="comiis_smilies_key"></ul>
				</div>
			</div>
		</div>
	</div>
	<div class="comiis_foot_height"></div>
	<script src="template/comiis_app/comiis/js/comiis_post.js?{VERHASH}"></script>
	<script type="text/javascript">var comiis_Interval;forumallowhtml = 0,allowhtml = 0,allowsmilies = true,allowbbcode = parseInt('{$_G[group][allowsigbbcode]}'),allowimgcode = parseInt('{$_G[group][allowsigimgcode]}');var DISCUZCODE = [];DISCUZCODE['num'] = '-1';DISCUZCODE['html'] = [];var EXTRAFUNC = [];</script>
	<script type="text/javascript" src="./template/comiis_app/comiis/js/bbcode.js?{VERHASH}"></script>
	<script>
	$('.comiis_post_ico>a').on('click', function() {
		$('.comiis_foot_height').toggleClass('comiis_show_smiley');
		comiis_pmbottom();
	});
	$("#needmessage").on('click', function() {
		comiis_pmbottom();
	});	
	var comiis_pm_h = $(document).height();
	function comiis_pmbottom() {
		if(comiis_pm_h != $(document).height()){
			comiis_pm_h = $(document).height();
			setTimeout(function() {
				$('body,html').scrollTop($(document).height());
			}, 500);
		}
	}
	var comiis_msg_endtime = '$comiis_msg_endtime';
	function comiis_formatDate(strTime) {
		var date = new Date(strTime);
		return date.getFullYear()+"-"+(date.getMonth()+1)+"-"+date.getDate();
	}
	function succeedhandle_pmform(locationhref, message, param) {
		popup.open('{$comiis_lang['tip36']}', 'alert');
		$('#comiis_pm_list_new').append((comiis_formatDate(comiis_msg_endtime * 1000) != comiis_formatDate(new Date().getTime()) ? '<div class="comiis_msg_date f_f cl comiis_self_msg_temp"><span>' + comiis_formatDate(new Date().getTime()) + '</span></div>' : '') + '<div class="comiis_self_msg cl comiis_self_msg_temp"><a href="home.php?mod=space&uid={$_G['uid']}&do=profile"><img class="msg_avt y comiis_noloadimage" src="{$_G['setting']['ucenterurl']}/avatar.php?uid={$_G['uid']}&size=middle" /></a><div class="dialog_green y"><div class="msg_mes">' + bbcode2html(parseurl($('#needmessage').val())) + '</div><div class="msg_time f_d">{$comiis_lang['tip37']}</div></div></div>');
		$('#needmessage').val('');
		<!--{if !$list}-->
		comiis_Interval = null;
		$('.nolist').remove();
		comiis_Interval = window.setInterval('comiis_getpmlist();', 10000);
		<!--{/if}-->
		comiis_pmbottom();
	}
	function errorhandle_pmform(message, param) {
		popup.open(message, 'alert');
	}	
	function comiis_getpmlist() {
		$.ajax({
			type:'GET',
			url:'home.php?mod=spacecp&ac=pm&op=showmsg&msgonly=1&touid=$touid&pmid=$pmid&inajax=1&daterange=1&comiis_msg_endtime=' + comiis_msg_endtime,
			dataType:'xml'
		})
		.success(function(s) {
			if(s.lastChild.firstChild.nodeValue){
				$('.comiis_self_msg_temp').remove();
				$('#comiis_pm_list_new').append(s.lastChild.firstChild.nodeValue);
				evalscript(s.lastChild.firstChild.nodeValue);
			}
		})
		.error(function() {
			popup.open('{$comiis_lang['tip38']}', 'alert');
		});
		comiis_pmbottom();
	}
	<!--{if $list}-->
	comiis_getpmlist();
	comiis_Interval = window.setInterval('comiis_getpmlist();', 10000);
	<!--{/if}-->
	</script>
<!--{/if}-->	
<!--{elseif $_GET['subop'] == 'viewg'}-->
	<!--{if $grouppm}-->
		<div class="comiis_msg_date f_f cl"><span><!--{date($grouppm[dateline], 'u')}--></span></div>
		<div class="comiis_system_pmbox bg_f b_ok cl">
			<a href="home.php?mod=spacecp&ac=pm&op=delete&deletepm_gpmid[]=$grouppm[id]&pmid=$grouppm[id]&handlekey=gpmdeletehk_{$grouppm[id]}" id="a_gpmdelete_$grouppm[id]" class="pmbox_del f_d dialog"><i class="comiis_font">&#xe639;</i></a>
			{echo str_replace(array("<b>"), array("<b class='f_0 pmbox_t'>"), $grouppm[message]);}
			<div class="pmbox_b b_t">
				<!--{if $grouppm[author]}--><a href="home.php?mod=spacecp&ac=pm&touid=$grouppm[authorid]" class="f_0 y">{lang reply}</a><!--{/if}-->
				<span class="f_c"><!--{if $grouppm['author']}-->{lang sendmultipmwho}<!--{else}-->{lang sendmultipmsystem}<!--{/if}--></span>
			</div>
		</div>
	<!--{else}-->
		<div class="comiis_notip comiis_sofa cl">
			<i class="comiis_font f_e cl">&#xe613;</i>
			<span class="f_d">{lang no_corresponding_pm}</span>
		</div>
	<!--{/if}-->
<!--{else}-->
	<div class="nolist f_c">{lang user_mobile_pm_error}</div>
<!--{/if}-->
<!--{eval $comiis_foot = 'no';}-->
<!--{template common/footer}-->