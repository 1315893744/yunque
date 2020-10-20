<?PHP exit('Access Denied');?>
<div class="comiis_actinfo cl">
	<!--{if $activity['thumb']}--><img src="$activity['thumb']" class="vm" /><!--{/if}-->
	<div class="cl">
	<table cellspacing="0" cellpadding="0" class="b_t b_l comiis_actbox">
		<tr><th class="bg_e b_b b_r">{lang activity_type}:</th><td class="b_b b_r">$activity[class]</td></tr>
		<tr><th class="bg_e b_b b_r">{lang activity_starttime}:</th><td class="b_b b_r"><!--{if $activity['starttimeto']}-->{lang activity_start_between}<!--{else}-->$activity[starttimefrom]<!--{/if}--></td></tr>
		<tr><th class="bg_e b_b b_r">{lang activity_space}:</th><td class="b_b b_r">$activity[place]</td></tr>
		<tr><th class="bg_e b_b b_r">{lang gender}:</th><td class="b_b b_r"><!--{if $activity['gender'] == 1}-->{lang male}<!--{elseif $activity['gender'] == 2}-->{lang female}<!--{else}-->{lang unlimited}<!--{/if}--></td></tr>
		<!--{if $activity['cost']}-->
		<tr><th class="bg_e b_b b_r">{lang activity_payment}:</th><td class="b_b b_r">$activity[cost] {lang payment_unit}</td></tr>
		<!--{/if}-->
		<!--{if !$_G['forum_thread']['is_archived']}-->
			<tr><th class="bg_e b_b b_r">{lang activity_already}:</th><td class="b_b b_r"><em>$allapplynum</em> {lang activity_member_unit}</td></tr>
			<!--{if $activity['number']}-->
			<tr><th class="bg_e b_b b_r">{lang activity_about_member}:</th><td class="b_b b_r">$aboutmembers {lang activity_member_unit}</td></tr>
			<!--{/if}-->
			<!--{if $activity['expiration']}-->
			<tr><th class="bg_e b_b b_r">{lang post_closing}:</th><td class="b_b b_r">$activity[expiration]</td></tr>
			<!--{/if}-->
		<!--{/if}-->
	</table>
	</div>	
	<div class="cl">	
		<!--{if !$_G['forum_thread']['is_archived']}-->
			<!--{if $post['invisible'] == 0}-->
				<!--{if $applied && $isverified < 2}-->
					<p class="f_d"><!--{if !$isverified}-->{lang activity_wait}<!--{else}-->{lang activity_join_audit}<!--{/if}--></p>
					<!--{if !$activityclose}--><!--{/if}-->
				<!--{elseif !$activityclose}-->
					<!--{if $isverified != 2}-->
					<!--{else}-->
					<p class="f_d">{$comiis_lang['view10']}</p>
					<!--{/if}-->
				<!--{/if}-->
			<!--{/if}-->
		<!--{/if}-->		
		<!--{if $post['invisible'] == 0 && ($_G['forum_thread']['authorid'] == $_G['uid'] || (in_array($_G['group']['radminid'], array(1, 2)) && $_G['group']['alloweditactivity']) || ( $_G['group']['radminid'] == 3 && $_G['forum']['ismoderator'] && $_G['group']['alloweditactivity']))}-->
			<a href="misc.php?mod=invite&action=thread&id=$_G[tid]&activity=1" class="comiis_actbtns bg_a f_f y">{lang invite}</a>
			<a href="forum.php?mod=misc&action=activityapplylist&tid=$_G[tid]&pid=$post[pid]{if $_GET['from']}&from=$_GET['from']{/if}" class="comiis_actbtns bg_a f_f y" title="{lang manage}">{lang manage}</a>
		<!--{/if}-->		
		<!--{if !$_G['forum_thread']['is_archived']}-->
			<!--{if $post['invisible'] == 0}-->
				<!--{if $_G['uid']}-->
					<!--{if $applied && $isverified < 2}-->
						<!--{if !$activityclose}-->
						<button class="comiis_actbtn bg_0 f_f" id="comiis_ac">{lang activity_join_cancel}</button>
						<!--{/if}-->
					<!--{elseif !$activityclose}-->
						<!--{if $isverified != 2}-->
							<!--{if !$activity['number'] || $aboutmembers > 0}-->
								<button class="comiis_actbtn bg_0 f_f comiis_acbm">{lang activity_join}</button>
							<!--{else}-->
								<button class="comiis_actbtn bg_b f_c ">{$comiis_lang['view11']}</button>
							<!--{/if}-->
						<!--{else}-->
							<button class="comiis_actbtn bg_0 f_f comiis_acbms">{lang complete_data}</button>
						<!--{/if}-->
					<!--{else}-->
						<button class="comiis_actbtn bg_b f_c">{$comiis_lang['view12']}</button>
					<!--{/if}-->
				<!--{else}-->
					<!--{if !$activityclose}-->
						<button class="comiis_actbtn bg_0 f_f comiis_acbm comiis_openrebox">{lang activity_join}</button>
					<!--{else}-->
						<button class="comiis_actbtn bg_b f_c">{$comiis_lang['view12']}</button>
					<!--{/if}-->
				<!--{/if}-->
			<!--{/if}-->		
		<!--{/if}-->
	</div>
</div>
<!--{if $_G['uid'] && !$activityclose && (!$applied || $isverified == 2)}-->
	<!--{eval comiis_load('iz91z7vvvkDTW1Vv91', 'applied,isverified,isgroupuser,post,activity,settings,htmls,ufielddata,applyinfo');}-->
<!--{elseif $_G['uid'] && !$activityclose && $applied}-->
	<div id="comiis_ac_box" style="display:none">
		<div class="comiis_tip comiis_tip_form bg_f cl">
			<div class="tip_tit bg_e f_b b_b">{lang activity_join_cancel}</div>
			<form name="activity" method="post" autocomplete="off" action="forum.php?mod=misc&action=activityapplies&fid=$_G[fid]&tid=$_G[tid]&pid=$post[pid]{if $_GET['from']}&from=$_GET['from']{/if}">
				<input type="hidden" name="formhash" value="{FORMHASH}" />
				<input type="hidden" name="activitycancel" value="true">
				<dt class="cl">
					<div class="tip_form">
						<li class="tip_txt f_c">{lang leaveword}:</li>
						<li class="nop b_ok f_c cl"><textarea class="comiis_pt f_c" name="message"></textarea></li>
					</div>
				</dt>
				<dd class="b_t cl">
                    <!--{if $comiis_app_switch['comiis_post_btnwz'] == 1}-->
                        <a class="tip_btn bg_f f_b" onclick="popup.close();" href="javascript:;">{$comiis_lang['all9']}</a>
                        <button type="submit" class="formdialog tip_btn bg_f f_0"><span class="tip_lx">{$comiis_lang['all8']}</span></button>
                    <!--{else}-->
                        <button type="submit" class="formdialog tip_btn bg_f f_0">{$comiis_lang['all8']}</button>
                        <a class="tip_btn bg_f f_b" onclick="popup.close();" href="javascript:;"><span class="tip_lx">{$comiis_lang['all9']}</span></a>
                    <!--{/if}-->
				</dd>
			</form>
		</div>
	</div>	
<script>
$('#comiis_ac').on('click', function() {
	popup.open($('#comiis_ac_box'));
});
</script>	
<!--{/if}-->
<!--{if $applylist}-->
<div class="comiis_actok bg_h cl">
    <h2 class="f_a">{lang activity_new_join} {$applynumbers} {lang activity_member_unit}</h2>
    <div id="comiis_applylist">
		<ul class="cl">
			<!--{loop $applylist $apply}-->
			<li>
				<a target="_blank" href="home.php?mod=space&uid=$apply[uid]&do=profile">
					<img src="<!--{avatar($apply[uid], small, true)}-->" class="vm" />
					<span class="f_b">$apply[username]</span>
				</a>
			</li>
			<!--{/loop}-->
		</ul>		
		<!--{if $applynumbers > $_G['setting']['activitypp']}-->
		<div class="comiis_act_page cl">
			<a onclick="comiis_activity_page('1')" href="javascript:;" class="bg_a f_f">{lang next_page}</a>
		</div>
		<!--{/if}-->
	</div>
</div>
<!--{if $applynumbers > $_G['setting']['activitypp']}-->
<script>
var comiis_activity_pages = '$page';
function comiis_activity_page(a) {
	if(a == '1'){
		comiis_activity_pages++;
	}else{
		comiis_activity_pages--;
	}
	$.ajax({
		type:'GET',
		url:'forum.php?mod=misc&action=getactivityapplylist&tid={$_G[tid]}&page='+ comiis_activity_pages + '&inajax=1',
		dataType:'xml',
	}).success(function(s) {
		if(s.lastChild.firstChild.nodeValue.length){
			$('#comiis_applylist').html(s.lastChild.firstChild.nodeValue);
		}
	});
}
</script>
<!--{/if}-->
<!--{/if}-->
<!--{if $applylistverified}-->
<div class="b_ok bg_e comiis_actok comiis_actno cl">
    <h2 class="f_b">{lang activity_new_signup} $noverifiednum {lang activity_member_unit}</h2>
    <ul class="cl">
		<!--{loop $applylistverified $apply}-->
		<li>
			<a target="_blank" href="home.php?mod=space&uid=$apply[uid]&do=profile">
				<img src="<!--{avatar($apply[uid], small, true)}-->" class="vm" />
				<span class="f_b">$apply[username]</span>
			</a>
		</li>
		<!--{/loop}-->
    </ul>
</div>
<!--{/if}-->
<div id="postmessage_$post[pid]" class="postmessage km_message">
	<h2 class="b_b">{$comiis_lang['view17']}</h2>
	<div class="comiis_a comiis_message_table">$post[message]</div>
</div>
<script>
function showdistrict(container, elems, totallevel, changelevel, containertype) {
	var getdid = function(elem) {
		var op = elem.options[elem.selectedIndex];
		return op['did'] || op.getAttribute('did') || '0';
	};
	var pid = changelevel >= 1 && elems[0] && document.getElementById(elems[0]) ? getdid(document.getElementById(elems[0])) : 0;
	var cid = changelevel >= 2 && elems[1] && document.getElementById(elems[1]) ? getdid(document.getElementById(elems[1])) : 0;
	var did = changelevel >= 3 && elems[2] && document.getElementById(elems[2]) ? getdid(document.getElementById(elems[2])) : 0;
	var coid = changelevel >= 4 && elems[3] && document.getElementById(elems[3]) ? getdid(document.getElementById(elems[3])) : 0;
	var url = 'home.php?mod=misc&ac=ajax&op=district&container='+container+'&containertype='+containertype
		+'&province='+elems[0]+'&city='+elems[1]+'&district='+elems[2]+'&community='+elems[3]
		+'&pid='+pid + '&cid='+cid+'&did='+did+'&coid='+coid+'&level='+totallevel+'&handlekey='+container+'&inajax=1'+(!changelevel ? '&showdefault=1' : '');
	$.ajax({
		type:'GET',
		url: url ,
	}).success(function(s) {
		$('#' + container).html(s.lastChild.firstChild.nodeValue);
	});
}
function showbirthday(){
	var el = document.getElementById('birthday');
	var birthday = el.value;
	el.length=0;
	el.options.add(new Option('{$comiis_lang['all15']}', ''));
	for(var i=0;i<28;i++){
		el.options.add(new Option(i+1, i+1));
	}
	if(document.getElementById('birthmonth').value!="2"){
		el.options.add(new Option(29, 29));
		el.options.add(new Option(30, 30));
		switch(document.getElementById('birthmonth').value){
			case "1":
			case "3":
			case "5":
			case "7":
			case "8":
			case "10":
			case "12":{
				el.options.add(new Option(31, 31));
			}
		}
	} else if(document.getElementById('birthyear').value!="") {
		var nbirthyear=document.getElementById('birthyear').value;
		if(nbirthyear%400==0 || (nbirthyear%4==0 && nbirthyear%100!=0)) el.options.add(new Option(29, 29));
	}
	el.value = birthday;
}
</script>