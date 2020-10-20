<?PHP exit('Access Denied');?>
<!--{template common/header}-->
<!--{if $_GET['inajax'] == 1 && $_GET[action] == 'reply'}-->
<form method="post" id="postforms" 
    {if $_GET[action] == 'newthread'}action="forum.php?mod=post&action={if $special != 2}newthread{else}newtrade{/if}&fid=$_G[fid]&extra=$extra&topicsubmit=yes&mobile=2"
    {elseif $_GET[action] == 'reply'}action="forum.php?mod=post&action=reply&fid=$_G[fid]&tid=$_G[tid]&extra=$extra&replysubmit=yes&mobile=2"
    {elseif $_GET[action] == 'edit'}action="forum.php?mod=post&action=edit&extra=$extra&editsubmit=yes&mobile=2" $enctype
    {/if}>
    <input type="hidden" name="formhash" id="formhash" value="{FORMHASH}" />
    <input type="hidden" name="posttime" id="posttime" value="{TIMESTAMP}" />
    <input type="hidden" name="addfeed" value="1">
    <!--{if !empty($_GET['modthreadkey'])}--><input type="hidden" name="modthreadkey" id="modthreadkey" value="$_GET['modthreadkey']" /><!--{/if}-->
    <!--{if $_GET[action] == 'reply'}-->
        <input type="hidden" name="noticeauthor" value="$noticeauthor" />
        <input type="hidden" name="noticetrimstr" value="$noticetrimstr" />
        <input type="hidden" name="noticeauthormsg" value="$noticeauthormsg" />
        <!--{if $reppid}-->
            <input type="hidden" name="reppid" value="$reppid" />
        <!--{/if}-->
        <!--{if $_GET[reppost]}-->
            <input type="hidden" name="reppost" value="$_GET[reppost]" />
        <!--{elseif $_GET[repquote]}-->
            <input type="hidden" name="reppost" value="$_GET[repquote]" />
        <!--{/if}-->
    <!--{/if}-->
    <!--{if $special}-->
        <input type="hidden" name="special" value="$special" />
    <!--{/if}-->
    <!--{if $specialextra}-->
        <input type="hidden" name="specialextra" value="$specialextra" />
    <!--{/if}-->
    <!--{if $sortid}-->
        <input type="hidden" name="sortid" value="$sortid" />
        <!--{/if}-->
    <input type="hidden" name="{if $_GET[action] == 'newthread'}topicsubmit{elseif $_GET[action] == 'reply'}replysubmit{elseif $_GET[action] == 'edit'}editsubmit{/if}" value="yes">
    <div class="comiis_tip bg_f cl">
        <div class="tip_tit txt_l bg_e b_b"><a href="forum.php?mod=post&action=reply&fid=$_G[fid]&tid=$_G[tid]&repquote=$reppid&page=$page" class="y f_d"><i class="comiis_font">&#xe658;</i></a><span class="f_b">{lang reply}</span> <span class="f_0">$thaquote['author']</span></div>
        <dt class="f_c">
            <div class="tip_form">
                <li class="nop bg_e b_ok cl"><textarea class="comiis_pt" placeholder="{$comiis_lang['all27']}" id="needmessage" name="message"></textarea></li>			
            </div>
            <!--{if $secqaacheck || $seccodecheck}-->
            <div class="comiis_minipost_sec b_b cl">
                <!--{subtemplate common/seccheck}-->
            </div>
            <!--{/if}-->
        </dt>
        <dd class="b_t cl">
            <!--{if $comiis_app_switch['comiis_post_btnwz'] == 1}-->
                <a href="javascript:;" onclick="popup.close();" class="tip_btn bg_f f_b">{lang cancel}</a>
                <button type="submit" name="favoritesubmit_btn" id="fastpostsubmit_btn"  value="{lang join_thread}" onclick="comiis_postre();return false;" class="tip_btn bg_f f_0"><span class="tip_lx">{lang join_thread}</span></button>
            <!--{else}-->
                <button type="submit" name="favoritesubmit_btn" id="fastpostsubmit_btn"  value="{lang join_thread}" onclick="comiis_postre();return false;" class="tip_btn bg_f f_0">{lang join_thread}</button>
                <a href="javascript:;" onclick="popup.close();" class="tip_btn bg_f f_b"><span class="tip_lx">{lang cancel}</span></a>
            <!--{/if}-->
        </dd>
    </div>
</form>
<!--{else}-->
<script>
comiis_nvscroll=0;
var action = '{$_GET[action]}';
</script>
<script src="data/cache/common_smilies_var.js?{VERHASH}" charset="{CHARSET}"></script>
<script src="template/comiis_app/comiis/js/comiis_swiper.min.js?{VERHASH}"></script>
<script src="template/comiis_app/comiis/js/comiis_post.js?{VERHASH}" charset="{CHARSET}"></script>
<link rel="stylesheet" href="template/comiis_app/comiis/css/comiis_post.css" type="text/css">
<script src="template/comiis_app/comiis/js/comiis_swiper.min.js?{VERHASH}"></script>
<!--{eval $adveditor = $isfirstpost && $special || $special == 2 && ($_GET['action'] == 'newthread' || $_GET['action'] == 'reply' && !empty($_GET['addtrade']) || $_GET['action'] == 'edit' && $thread['special'] == 2);}-->
<!--{if $_GET[action] == 'newthread'}-->
<!--{if $_G['group']['allowpostpoll'] || $_G['group']['allowpostreward'] || $_G['group']['allowpostdebate'] || $_G['group']['allowpostactivity'] || $_G['group']['allowposttrade'] || $_G['setting']['threadplugins'] || is_array($_G['forum']['threadsorts'][types])}-->
<!--{if $comiis_app_switch['comiis_subnv_top'] != 1}--><div style="height:40px;"><div class="comiis_scrollTop_box"><!--{/if}-->
<div class="comiis_top_sub bg_f">
	<div id="comiis_top_box" class="b_b vzyj">
		<div id="comiis_sub">
			<ul class="swiper-wrapper">
			<!--{if !$_G['forum']['threadsorts']['required'] && !$_G['forum']['allowspecialonly']}-->
				<li class="swiper-slide{if $postspecialcheck[0]} f_0{/if}">{if $postspecialcheck[0]}<em class="bg_0"></em>{/if}<a href="forum.php?mod=post&action=newthread&fid=$_G['fid']"{if !$postspecialcheck[0]} class="f_c"{/if}>{lang post_newthread}</a></li>
			<!--{/if}-->			
			<!--{loop $_G['forum']['threadsorts'][types] $tsortid $name}-->
				<li class="swiper-slide{if $sortid == $tsortid} f_0{/if}">{if $sortid == $tsortid}<em class="bg_0"></em>{/if}<a href="forum.php?mod=post&action=newthread&fid=$_G['fid']&sortid=$tsortid"{if $sortid != $tsortid} class="f_c"{/if}><!--{echo strip_tags($name);}--></a></li>
			<!--{/loop}-->
			<!--{if $_G['group']['allowpostpoll']}--><li class="swiper-slide{if $postspecialcheck[1]} f_0{/if}">{if $postspecialcheck[1]}<em class="bg_0"></em>{/if}<a href="forum.php?mod=post&action=newthread&fid=$_G['fid']&special=1"{if !$postspecialcheck[1]} class="f_c"{/if}>{lang post_newthreadpoll}</a></li><!--{/if}-->
			<!--{if $_G['group']['allowpostreward']}--><li class="swiper-slide{if $postspecialcheck[3]} f_0{/if}">{if $postspecialcheck[3]}<em class="bg_0"></em>{/if}<a href="forum.php?mod=post&action=newthread&fid=$_G['fid']&special=3"{if !$postspecialcheck[3]} class="f_c"{/if}>{lang post_newthreadreward}</a></li><!--{/if}-->
			<!--{if $_G['group']['allowpostdebate']}--><li class="swiper-slide{if $postspecialcheck[5]} f_0{/if}">{if $postspecialcheck[5]}<em class="bg_0"></em>{/if}<a href="forum.php?mod=post&action=newthread&fid=$_G['fid']&special=5"{if !$postspecialcheck[5]} class="f_c"{/if}>{lang post_newthreaddebate}</a></li><!--{/if}-->
			<!--{if $_G['group']['allowpostactivity']}--><li class="swiper-slide{if $postspecialcheck[4]} f_0{/if}">{if $postspecialcheck[4]}<em class="bg_0"></em>{/if}<a href="forum.php?mod=post&action=newthread&fid=$_G['fid']&special=4"{if !$postspecialcheck[4]} class="f_c"{/if}>{lang post_newthreadactivity}</a></li><!--{/if}-->
			<!--{if $_G['group']['allowposttrade']}--><li class="swiper-slide{if $postspecialcheck[2]} f_0{/if}">{if $postspecialcheck[2]}<em class="bg_0"></em>{/if}<a href="forum.php?mod=post&action=newthread&fid=$_G['fid']&special=2"{if !$postspecialcheck[2]} class="f_c"{/if}>{lang post_newthreadtrade}</a></li><!--{/if}-->
			<!--{if $_G['setting']['threadplugins']}-->
				<!--{loop $_G['forum']['threadplugin'] $tpid}-->
					<!--{if array_key_exists($tpid, $_G['setting']['threadplugins']) && @in_array($tpid, $_G['group']['allowthreadplugin'])}-->
						<li class="swiper-slide{if $specialextra==$tpid} f_0{/if}">{if $specialextra==$tpid}<em class="bg_0"></em>{/if}<a href="forum.php?mod=post&action=newthread&fid=$_G['fid']&specialextra=$tpid"{if $specialextra != $tpid} class="f_c"{/if}>{$_G[setting][threadplugins][$tpid][name]}</a></li>
					<!--{/if}-->
				<!--{/loop}-->
			<!--{/if}-->
			</ul>
		</div>
	</div>
</div>
<!--{if $comiis_app_switch['comiis_subnv_top'] != 1}--></div></div><!--{/if}-->
<script>
	if($("#comiis_sub li.f_0").length > 0){
		var comiis_index = $("#comiis_sub li.f_0").offset().left + $("#comiis_sub li.f_0").width() >= $(window).width() ? $("#comiis_sub li.f_0").index() : 0;
	}else{
		var comiis_index = 0;
	}
	mySwiper = new Swiper('#comiis_sub', {
		freeMode : true,
		slidesPerView : 'auto',
		initialSlide : comiis_index,
		onTouchMove: function(swiper){
			Comiis_Touch_on = 0;
		},
		onTouchEnd: function(swiper){
			Comiis_Touch_on = 1;
		},
	});
</script>
<!--{/if}-->
<!--{/if}-->
<form method="post" id="postform" 
			{if $_GET[action] == 'newthread'}action="forum.php?mod=post&action={if $special != 2}newthread{else}newtrade{/if}&fid=$_G[fid]&extra=$extra&topicsubmit=yes&mobile=2"
			{elseif $_GET[action] == 'reply'}action="forum.php?mod=post&action=reply&fid=$_G[fid]&tid=$_G[tid]&extra=$extra&replysubmit=yes&mobile=2"
			{elseif $_GET[action] == 'edit'}action="forum.php?mod=post&action=edit&extra=$extra&editsubmit=yes&mobile=2" $enctype
			{/if}>
<input type="hidden" name="formhash" id="formhash" value="{FORMHASH}" />
<input type="hidden" name="posttime" id="posttime" value="{TIMESTAMP}" />
<!--{if !empty($_GET['modthreadkey'])}--><input type="hidden" name="modthreadkey" id="modthreadkey" value="$_GET['modthreadkey']" /><!--{/if}-->
<!--{if $_GET[action] == 'reply'}-->
	<input type="hidden" name="noticeauthor" value="$noticeauthor" />
	<input type="hidden" name="noticetrimstr" value="$noticetrimstr" />
	<input type="hidden" name="noticeauthormsg" value="$noticeauthormsg" />
	<!--{if $reppid}-->
		<input type="hidden" name="reppid" value="$reppid" />
	<!--{/if}-->
	<!--{if $_GET[reppost]}-->
		<input type="hidden" name="reppost" value="$_GET[reppost]" />
	<!--{elseif $_GET[repquote]}-->
		<input type="hidden" name="reppost" value="$_GET[repquote]" />
	<!--{/if}-->
<!--{/if}-->
<!--{if $_GET[action] == 'edit'}-->
	<input type="hidden" name="fid" id="fid" value="$_G[fid]" />
	<input type="hidden" name="tid" value="$_G[tid]" />
	<input type="hidden" name="pid" value="$pid" />
	<input type="hidden" name="page" value="$_GET[page]" />
<!--{/if}-->
<!--{if $special}-->
	<input type="hidden" name="special" value="$special" />
<!--{/if}-->
<!--{if $specialextra}-->
	<input type="hidden" name="specialextra" value="$specialextra" />
<!--{/if}-->
<!--{if $sortid}-->
<input type="hidden" name="sortid" value="$sortid" />
<!--{/if}-->
<input type="hidden" name="{if $_GET[action] == 'newthread'}topicsubmit{elseif $_GET[action] == 'reply'}replysubmit{elseif $_GET[action] == 'edit'}editsubmit{/if}" value="yes">
<div class="comiis_post_from{if $_GET['action'] != 'reply' && !$quotemessage} mt15{/if} cl">
<!--{if $_GET[action] != 'reply' && !($_GET[action] == 'edit' && $isorigauthor && ($isfirstpost && $thread['replies'] < 1 || !$isfirstpost) && !$rushreply && $_G['setting']['editperdel'])}-->
	<!--{eval $comiis_postautotitle = (array)dunserialize($comiis_app_switch['comiis_postautotitle']); $comiis_postautotitle_notit = in_array($_G['fid'], $comiis_postautotitle);}-->
	<!--{if $comiis_app_switch['comiis_group_notit'] == 1 && $_G['forum']['status'] == 3}-->{eval $comiis_postautotitle_notit=1;}<!--{/if}-->
<!--{/if}-->
	<!--{eval comiis_load('JacCKHKY255JjHbm2z', 'comiis_postautotitle_notit,showthreadsorts,isorigauthor,isfirstpost,thread,rushreply,postinfo,quotemessage,special,adveditor,editorid,editor,imgattachs');comiis_load('Qi2eaIVPiIK1kaAK7n', 'secqaacheck,seccodecheck,postinfo,attachs,maxattachsize_mb,isfirstpost,thread,special,cronpublish,cronpublishdate,userextcredit,replycredit_rule,i,orig,ordertypecheck,allownoticeauthor,addfeedcheck,usesigcheck,stickcheck,digestcheck');}-->
	<!--{if $_GET[action] != 'edit' && ($secqaacheck || $seccodecheck)}-->
	<div class="comiis_seccheck bg_f b_b cl">
		<!--{subtemplate common/seccheck}-->
	</div>
	<!--{/if}-->	
	<div class="comiis_btnbox cl">
		<button class="comiis_btn formdialog bg_c f_f" id="postsubmit"{if count($_G['forum_optionlist'])} onsubmit="validateextra()"{/if}><!--{if $_GET[action] == 'newthread'}-->{lang send_thread}<!--{elseif $_GET[action] == 'reply' && !empty($_GET['addtrade'])}-->{lang trade_add_post}<!--{elseif $_GET[action] == 'reply'}-->{lang join_thread}<!--{elseif $_GET[action] == 'edit'}-->{lang edit_save}<!--{/if}--></button>
	</div>
	<!--{hook/post_bottom_mobile}-->
	<script>var parent = document.getElementsByClassName('comiis_btnbox')[0];</script>
</div>
</form>
<script type="text/javascript">
	<!--{if $comiis_postautotitle_notit}-->
	function clearcode(str){
		str= str.replace(/\[url\]\[\/url\]/ig, '', str);
		str= str.replace(/\[url=((https?|ftp|gopher|news|telnet|rtsp|mms|callto|bctp|thunder|qqdl|synacast){1}:\/\/|www\.|mailto:)?([^\s\[\"']+?)\]\[\/url\]/ig, '', str);
		str= str.replace(/\[email\]\[\/email\]/ig, '', str);
		str= str.replace(/\[email=(.[^\[]*)\]\[\/email\]/ig, '', str);
		str= str.replace(/\[color=([^\[\<]+?)\]\[\/color\]/ig, '', str);
		str= str.replace(/\[size=(\d+?)\]\[\/size\]/ig, '', str);
		str= str.replace(/\[size=(\d+(\.\d+)?(px|pt)+?)\]\[\/size\]/ig, '', str);
		str= str.replace(/\[font=([^\[\<]+?)\]\[\/font\]/ig, '', str);
		str= str.replace(/\[align=([^\[\<]+?)\]\[\/align\]/ig, '', str);
		str= str.replace(/\[p=(\d{1,2}), (\d{1,2}), (left|center|right)\]\[\/p\]/ig, '', str);
		str= str.replace(/\[float=([^\[\<]+?)\]\[\/float\]/ig, '', str);
		str= str.replace(/\[quote\]\[\/quote\]/ig, '', str);
		str= str.replace(/\[code\]\[\/code\]/ig, '', str);
		str= str.replace(/\[table\]\[\/table\]/ig, '', str);
		str= str.replace(/\[free\]\[\/free\]/ig, '', str);
		str= str.replace(/\[b\]\[\/b]/ig, '', str);
		str= str.replace(/\[u\]\[\/u]/ig, '', str);
		str= str.replace(/\[i\]\[\/i]/ig, '', str);
		str= str.replace(/\[s\]\[\/s]/ig, '', str);
		str= str.replace(/\[attachimg\](\d+)\[\/attachimg]/ig, '', str);
		return str;
	}
	$('.comiis_btn').on('click', function(){
		if($('#needsubject').val() == ''){
			var comiis_message = $.trim($('#needmessage').val());
			var comiis_message_len = comiis_message.length;
			var comiis_title_str = clearcode(comiis_message);
			if(typeof smilies_type == 'object'){
				for(var typeid in smilies_array){
					for(var page in smilies_array[typeid]){
						for(var i in smilies_array[typeid][page]){
							re = new RegExp(smilies_array[typeid][page][i][1].replace(/([\\\.\+\*\?\[\^\]\$\(\)\{\}\=\!<>\|\:])/g, "\\$1"), "g");
							comiis_title_str = comiis_title_str.replace(re, '');
						}
					}
				}
			}
			var comiis_title_len = comiis_title_str.length;
			if(comiis_title_len >= {if $comiis_app_switch['comiis_post_titnum']}{$comiis_app_switch['comiis_post_titnum']}{else}10{/if}){
				$('#needsubject').val(comiis_subString($.trim(comiis_title_str), 60));
			}else if(comiis_message_len > {if $comiis_app_switch['comiis_post_hfnum']}{$comiis_app_switch['comiis_post_hfnum']}{else}20{/if}){
				popup.open('{$comiis_lang['tip238']}', 'alert');
				return false;
			}else{
				popup.open('{$comiis_lang['tip239']}', 'alert');
				return false;
			}
		}
		if($('#needsubject').val() == '' || $('#needmessage').val() == ''){
			popup.open('{$comiis_lang['post45']}', 'alert');
			return false;
		} else if(mb_strlen($('#needsubject').val()) > 80){
			popup.open('{$comiis_lang['post54']}', 'alert');
			return false;
		}
		if($('#typeid') && $('#typeid').val() == 0){
			popup.open('{$comiis_lang['post55']}', 'alert');
			return false;
		}
		if($('#sortid') && $('#sortid').val() == 0){
			popup.open('{$comiis_lang['post56']}', 'alert');
			return false;
		}
	});
	function comiis_subString(str, len){ 
		var newLength = 0; 
		var newStr = ""; 
		var chineseRegex = /[^\x00-\xff]/g; 
		var singleChar = ""; 
		var strLength = str.replace(chineseRegex,"**").length; 
		for(var i = 0;i < strLength;i++){ 
			singleChar = str.charAt(i).toString(); 
			if(singleChar.match(chineseRegex) != null){ 
				newLength += 2; 
			}else{ 
				newLength++; 
			} 
			if(newLength > len){ 
				break; 
			} 
			newStr += singleChar; 
		} 
		return newStr; 
	} 
	<!--{/if}-->
	function comiis_set_password(){
		if($('#new_password').val() != ''){
			$('#needmessage').val('[password]'+$('#new_password').val()+'[/password]' + ($('#needmessage').val().replace(/\[password\](.*?)\[\/password\]/ig, '')));
			<!--{if $comiis_app_switch['comiis_post_gaoji'] == 1 || ($_G['uid'] && (getstatus($_G['member']['allowadmincp'], 1) || $_G['group']['radminid'] > 1))}-->comiis_fmenu('#comiis_postmore');<!--{/if}-->
		}else{
			popup.open('{$comiis_lang['reg13']}', 'alert');
		}
	}
	(function(){
		var needsubject = needmessage = false;
		<!--{if $_GET[action] == 'reply'}-->
			needsubject = true;
		<!--{elseif $_GET[action] == 'edit'}-->
			needsubject = needmessage = true;
		<!--{/if}-->
		

		$('#needmessage').on('scroll', function(){
			var obj = $(this);
			if(obj.scrollTop() > 0){
				obj.attr('rows', parseInt(obj.attr('rows'))+2);
			}
		}).scrollTop($(document).height());
	 })();
</script>
<!--{eval $comiis_upload_url = 'misc.php?mod=swfupload&operation=upload&type=image&inajax=yes&infloat=yes&simple=2';}-->
<!--{subtemplate common/comiis_upload}-->
<script type="text/javascript">
	mySwiper2 = new Swiper('#comiis_mh_sub', {
		freeMode : true,
		slidesPerView : 'auto',
		onTouchMove: function(swiper){
			Comiis_Touch_on = 0;
		},
		onTouchEnd: function(swiper){
			Comiis_Touch_on = 1;
		},
	});
	function comiis_upload_success(data){
		if(data == ''){
			popup.open('{lang uploadpicfailed}', 'alert');
		}
		var dataarr = data.split('|');
		if(dataarr[0] == 'DISCUZUPLOAD' && dataarr[2] == 0){
			popup.close();
			$('#imglist').append('<li><span aid="'+dataarr[3]+'" class="del"><a href="javascript:;"><i class="comiis_font f_g">&#xe648;</i></a></span><span class="charu f_f">{$comiis_lang['tip220']}</span><span class="p_img"><a href="javascript:;" onclick="comiis_addsmilies(\'[attachimg]'+dataarr[3]+'[/attachimg]\')"><'+'img style="height:54px;width:54px;" id="aimg_'+dataarr[3]+'" title="'+dataarr[6]+'" src="{$_G[setting][attachurl]}forum/'+dataarr[5]+'" class="vm b_ok" /></a></span><input type="hidden" name="attachnew['+dataarr[3]+'][description]" /></li>');
		} else {
			var sizelimit = '';
			if(dataarr[7] == 'ban'){
				sizelimit = '{lang uploadpicatttypeban}';
			} else if(dataarr[7] == 'perday'){
				sizelimit = '{lang donotcross}'+Math.ceil(dataarr[8]/1024)+'K)';
			} else if(dataarr[7] > 0){
				sizelimit = '{lang donotcross}'+Math.ceil(dataarr[7]/1024)+'K)';
			}
			popup.open(STATUSMSG[dataarr[2]] + sizelimit, 'alert');
			return false;
		}
	}	
	var form = $('#postform');
	<!--{if 0 && $_G['setting']['mobile']['geoposition']}-->
	geo.getcurrentposition();
	<!--{/if}-->
	$('.comiis_postbtn').on('click', function(){
		var obj = $(this);
		if(obj.attr('disable') == 'true'){
			return false;
		}
		popup.open('<img src="' + IMGDIR + '/imageloading.gif" class="comiis_loading">');
		var postlocation = '';
		if(geo.errmsg === '' && geo.loc){
			postlocation = geo.longitude + '|' + geo.latitude + '|' + geo.loc;
		}
		$.ajax({
			type:'POST',
			url:form.attr('action') + '&geoloc=' + postlocation + '&handlekey='+form.attr('id')+'&inajax=1',
			data:form.serialize(),
			dataType:'xml'
		})
		.success(function(s){
			popup.open(s.lastChild.firstChild.nodeValue);
		})
		.error(function(){
			popup.open('{lang networkerror}', 'alert');
		});
		return false;
	});
	$(document).on('click', '.del', function(){
		var obj = $(this);
		$.ajax({
			type:'GET',
			url:'forum.php?mod=ajax&action=deleteattach&inajax=yes&aids[]=' + obj.attr('aid') + (obj.attr('up') == 1 ? '&tid={$postinfo['tid']}&pid={$postinfo['pid']}' : ''),
		})
		.success(function(s){
			obj.parent().remove();
		})
		.error(function(){
			popup.open('{lang networkerror}', 'alert');
		});
		return false;
	});
<!--{if $comiis_app_switch['comiis_open_upattach'] == 1}-->
	$(document).on('change', '#filedatas', function(){
	popup.open('<img src="' + IMGDIR + '/imageloading.gif" class="comiis_loading comiis_noloadimage">');	
	$.ajaxfileupload({
		url:'misc.php?mod=swfupload&action=swfupload&operation=upload&fid={$_G['fid']}&inajax=1&simple=2',
		data:{uid:"$_G[uid]", hash:"<!--{echo md5(substr(md5($_G[config][security][authkey]), 8).$_G[uid])}-->"},
		dataType:'text',
		fileElementId:'filedatas',
		success:function(data){
			if(data == ''){
				popup.open('{lang uploadpicfailed}', 'alert');
			}
			var dataarr = data.split('|');
			if(dataarr[0] == 'DISCUZUPLOAD' && dataarr[2] == 0){
				popup.close();
				var file_ex = 'unknown.gif';
				if(/bittorrent$|torrent$/.test(dataarr[6].toLowerCase())){
					file_ex = 'torrent.gif';
				}else if(/pdf$|pdf$/.test(dataarr[6].toLowerCase())){
					file_ex = 'pdf.gif';
				}else if(/(jpg|gif|png|bmp)$/.test(dataarr[6].toLowerCase())){
					file_ex = 'image.gif';
				}else if(/(swf|fla|flv|swi)$/.test(dataarr[6].toLowerCase())){
					file_ex = 'flash.gif';
				}else if(/(wav|mid|mp3|m3u|wma|asf|asx|vqf|mpg|mpeg|avi|wmv|mp4|ogv|webm|ogg)$/.test(dataarr[6].toLowerCase())){
					file_ex = 'av.gif';
				}else if(/(ra|rm|rv)$/.test(dataarr[6].toLowerCase())){
					file_ex = 'real.gif';
				}else if(/(php|js|pl|cgi|asp|htm|html|xml)$/.test(dataarr[6].toLowerCase())){
					file_ex = 'html.gif';
				}else if(/(txt|rtf|wri|chm)$/.test(dataarr[6].toLowerCase())){
					file_ex = 'text.gif';
				}else if(/(doc|ppt)$/.test(dataarr[6].toLowerCase())){
					file_ex = 'msoffice.gif';
				}else if(/rar$/.test(dataarr[6].toLowerCase())){
					file_ex = 'rar.gif';
				}else if(/(zip|arj|arc|cab|lzh|lha|tar|gz)$/.test(dataarr[6].toLowerCase())){
					file_ex = 'zip.gif';
				}else if(/(exe|com|bat|dll)$/.test(dataarr[6].toLowerCase())){
					file_ex = 'binary.gif';
				}else{
					file_ex = 'unknown.gif';
				}
				$('#comiis_upattach').append('<li class="f_c b_t"><span aid="'+dataarr[3]+'" up="1" class="del kmbtn bg_e f_c"><a href="javascript:;"><i class="comiis_font z">&#xe67f</i></a></span><span class="kmbtn bg_a f_f" onclick="comiis_addsmilies(\'[attach]'+dataarr[3]+'[/attach]\')">{$comiis_lang['tip220']}</span><img src="static/image/filetype/'+file_ex+'" border="0" class="vm kmimg" alt="">'+dataarr[6]+'<input type="hidden" name="attachnew['+dataarr[3]+'][description]"></li>');
			}else{
				var sizelimit = '';
				if(dataarr[7] == 'ban'){
					sizelimit = '{lang uploadpicatttypeban}';
				} else if(dataarr[7] == 'perday'){
					sizelimit = '{lang donotcross}'+Math.ceil(dataarr[8]/1024)+'K)';
				} else if(dataarr[7] > 0){
					sizelimit = '{lang donotcross}'+Math.ceil(dataarr[7]/1024)+'K)';
				}
				popup.open(STATUSMSG[dataarr[2]] + sizelimit, 'alert');
				return false;
			}
		},
		error:function(){
			popup.open('{$comiis_lang['uploadpicfailed']}', 'alert');
		}
	});
});
<!--{/if}-->
</script>
<!--{eval $nofooter = true;}-->
<!--{/if}-->
<!--{eval $comiis_foot = 'no';}-->
<!--{template common/footer}-->