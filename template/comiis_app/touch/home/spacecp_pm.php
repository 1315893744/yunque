<?PHP exit('Access Denied');?>
<!--{template common/header}-->
<!--{if $_GET['op'] == 'showmsg' && $msgonly}-->
	<!--{loop $msglist $day $msgarr}-->
		<!--{if dgmdate(intval($_GET['comiis_msg_endtime']), 'Y-m-d') != $day}-->
			<div class="comiis_msg_date f_f cl"><span>$day</span></div>
		<!--{/if}-->
		<!--{loop $msgarr $value}-->
			<!--{if intval($_GET['comiis_msg_endtime']) < $value[dateline]}-->
				<div class="{if $value['msgfromid'] != $_G['uid']}comiis_friend_msg{else}comiis_self_msg{/if} cl">
					<a href="home.php?mod=space&uid={$value['msgfromid']}&do=profile"><img class="msg_avt {if $value['msgfromid'] != $_G['uid']}z{else}y{/if}" src="<!--{avatar($value['msgfromid'], middle, true)}-->" /></a>
					<div class="{if $value['msgfromid'] != $_G['uid']}dialog_white z{else}dialog_green y{/if}">
						<div class="msg_mes">$value[message]</div>
						<div class="msg_time f_d"><!--{if dgmdate($value['dateline'], 'H') < 12}-->{$comiis_lang['all49']}<!--{else}-->{$comiis_lang['all50']}<!--{/if}-->&nbsp;<!--{date($value['dateline'], 'H:i:s')}--></div>
					</div>
				</div>
			<!--{/if}-->
		<!--{/loop}-->
	<!--{/loop}-->
	<!--{if intval($_GET['comiis_msg_endtime']) < $value[dateline]}-->
	<script>var comiis_msg_endtime = $value[dateline];</script>
	<!--{/if}-->
<!--{elseif $_GET['op'] == 'delete'}-->
		<!--{if $uid}-->
			<div id="$uid">
				<form id="delpmform_{$uid}" name="delpmform_{$uid}" method="post" autocomplete="off" action="home.php?mod=spacecp&ac=pm&op=delete&deletepm_deluid[]=$uid">
					<!--{if $_G[inajax]}--><input type="hidden" name="handlekey" value="$_GET[handlekey]" /><!--{/if}-->
					<input type="hidden" name="referer" value="{echo dreferer()}" />
					<input type="hidden" name="deletesubmit" value="true" />
					<input type="hidden" name="formhash" value="{FORMHASH}" />
					<div class="comiis_tip bg_f cl">
						<dt class="f_b"><p>{lang determine_delete_pm}</p></dt>
						<dd class="b_t cl">
                            <!--{if $comiis_app_switch['comiis_post_btnwz'] == 1}-->
                                <a href="javascript:;" onclick="popup.close();" class="tip_btn bg_f f_b">{lang cancel}</a>
                                <button type="submit" name="deletesubmit_btn" id="modsubmit" value="{lang determine}" class="formdialog tip_btn bg_f f_0"><span class="tip_lx">{lang determine}</span></button>
                            <!--{else}-->
                                <input type="submit" name="deletesubmit_btn" id="modsubmit" value="{lang determine}" class="formdialog tip_btn bg_f f_0">
                                <a href="javascript:;" onclick="popup.close();" class="tip_btn bg_f f_b"><span class="tip_lx">{lang cancel}</span></a>	
                            <!--{/if}-->
						</dd>
					</div>
				</form>
			</div>
		<!--{elseif $plid && $delplid}-->
			<div id="$plid">
				<form id="delpmform_{$plid}" name="delpmform_{$plid}" method="post" autocomplete="off" action="home.php?mod=spacecp&ac=pm&op=delete&deletepm_delplid[]=$plid">
					<!--{if $_G[inajax]}--><input type="hidden" name="handlekey" value="$_GET[handlekey]" /><!--{/if}-->
					<input type="hidden" name="referer" value="{echo dreferer()}" />
					<input type="hidden" name="deletesubmit" value="true" />
					<input type="hidden" name="formhash" value="{FORMHASH}" />
					<div class="comiis_tip bg_f cl">
						<dt class="f_b"><p>{lang determine_delete_chatpm}</p></dt>
						<dd class="b_t cl">
                            <!--{if $comiis_app_switch['comiis_post_btnwz'] == 1}-->
                                <a href="javascript:;" onclick="popup.close();" class="tip_btn bg_f f_b">{lang cancel}</a>
                                <button type="submit" name="deletesubmit_btn" id="modsubmit" value="{lang determine}" class="formdialog tip_btn bg_f f_0"><span class="tip_lx">{lang determine}</span></button>
                            <!--{else}-->
                                <input type="submit" name="deletesubmit_btn" id="modsubmit" value="{lang determine}" class="formdialog tip_btn bg_f f_0">
                                <a href="javascript:;" onclick="popup.close();" class="tip_btn bg_f f_b"><span class="tip_lx">{lang cancel}</span></a>	
                            <!--{/if}-->
						</dd>
					</div>
				</form>
			</div>
		<!--{elseif $plid && $quitplid}-->
			<div id="$plid">
				<form id="delpmform_{$plid}" name="delpmform_{$plid}" method="post" autocomplete="off" action="home.php?mod=spacecp&ac=pm&op=delete&deletepm_quitplid[]=$plid">
					<!--{if $_G[inajax]}--><input type="hidden" name="handlekey" value="$_GET[handlekey]" /><!--{/if}-->
					<input type="hidden" name="referer" value="{echo dreferer()}" />
					<input type="hidden" name="deletesubmit" value="true" />
					<input type="hidden" name="formhash" value="{FORMHASH}" />
					<div class="comiis_tip bg_f cl">
						<dt class="f_b"><p>{lang determine_quit_chatpm}</p></dt>
						<dd class="b_t cl">
                            <!--{if $comiis_app_switch['comiis_post_btnwz'] == 1}-->
                                <a href="javascript:;" onclick="popup.close();" class="tip_btn bg_f f_b">{lang cancel}</a>
                                <button type="submit" name="deletesubmit_btn" id="modsubmit" value="{lang determine}" class="formdialog tip_btn bg_f f_0"><span class="tip_lx">{lang determine}</span></button>
                            <!--{else}-->
                                <input type="submit" name="deletesubmit_btn" id="modsubmit" value="{lang determine}" class="formdialog tip_btn bg_f f_0">
                                <a href="javascript:;" onclick="popup.close();" class="tip_btn bg_f f_b"><span class="tip_lx">{lang cancel}</span></a>	
                            <!--{/if}-->
						</dd>
					</div>
				</form>
			</div>
		<!--{elseif $pmid && $delpmid}-->
			<div id="$pmid">
				<form id="delpmform_{$pmid}" name="delpmform_{$pmid}" method="post" autocomplete="off" action="home.php?mod=spacecp&ac=pm&op=delete&deletepm_pmid[]=$pmid&touid=$touid&daterange=$daterange">
					<!--{if $_G[inajax]}--><input type="hidden" name="handlekey" value="$_GET[handlekey]" /><!--{/if}-->
					<input type="hidden" name="referer" value="{echo dreferer()}" />
					<input type="hidden" name="deletesubmit" value="true" />
					<input type="hidden" name="formhash" value="{FORMHASH}" />
					<div class="comiis_tip bg_f cl">
						<dt class="f_b"><p>{lang determine_delete_pmid}</p></dt>
						<dd class="b_t cl">
                            <!--{if $comiis_app_switch['comiis_post_btnwz'] == 1}-->
                                <a href="javascript:;" onclick="popup.close();" class="tip_btn bg_f f_b">{lang cancel}</a>
                                <button type="submit" name="deletesubmit_btn" id="modsubmit" value="{lang determine}" class="formdialog tip_btn bg_f f_0"><span class="tip_lx">{lang determine}</span></button>
                            <!--{else}-->
                                <input type="submit" name="deletesubmit_btn" id="modsubmit" value="{lang determine}" class="formdialog tip_btn bg_f f_0">
                                <a href="javascript:;" onclick="popup.close();" class="tip_btn bg_f f_b"><span class="tip_lx">{lang cancel}</span></a>	
                            <!--{/if}-->
						</dd>
					</div>
				</form>
			</div>
		<!--{elseif $pmid && $gpmid}-->
			<div id="$pmid">
				<form id="delpmform_{$pmid}" name="delpmform_{$pmid}" method="post" autocomplete="off" action="home.php?mod=spacecp&ac=pm&op=delete&deletepm_gpmid[]=$pmid">
					<!--{if $_G[inajax]}--><input type="hidden" name="handlekey" value="$_GET[handlekey]" /><!--{/if}-->
					<input type="hidden" name="referer" value="{echo dreferer()}" />
					<input type="hidden" name="deletesubmit" value="true" />
					<input type="hidden" name="formhash" value="{FORMHASH}" />
					<div class="comiis_tip bg_f cl">
						<dt class="f_b"><p>{lang determine_delete_gpmid}</p></dt>
						<dd class="b_t cl">
                            <!--{if $comiis_app_switch['comiis_post_btnwz'] == 1}-->
                                <a href="javascript:;" onclick="popup.close();" class="tip_btn bg_f f_b">{lang cancel}</a>
                                <button type="submit" name="deletesubmit_btn" id="modsubmit" value="{lang determine}" class="formdialog tip_btn bg_f f_0"><span class="tip_lx">{lang determine}</span></button>
                            <!--{else}-->
                                <input type="submit" name="deletesubmit_btn" id="modsubmit" value="{lang determine}" class="formdialog tip_btn bg_f f_0">
                                <a href="javascript:;" onclick="popup.close();" class="tip_btn bg_f f_b"><span class="tip_lx">{lang cancel}</span></a>	
                            <!--{/if}-->
						</dd>
					</div>
				</form>
			</div>
		<!--{/if}-->
<!--{elseif $op != ''}-->
<div class="bm_c">{lang user_mobile_pm_error}</div>
<!--{else}-->
<form id="pmform_{$pmid}" name="pmform_{$pmid}" method="post" autocomplete="off" action="home.php?mod=spacecp&ac=pm&op=send&touid=$touid&pmid=$pmid&mobile=2" >
	<input type="hidden" name="referer" value="{echo dreferer();}" />
	<input type="hidden" name="pmsubmit" value="true" />
	<input type="hidden" name="formhash" value="{FORMHASH}" />
	<div class="comiis_crezz mt15 bg_f b_t cl">
		<!--{if !$touid}-->
		<li class="comiis_flex comiis_styli b_b cl">
			<div class="styli_tit f_c">{lang addressee}</div><div class="flex"><input type="text" value="" tabindex="1" class="comiis_input" autocomplete="off" id="username" name="username"></div>
		</li>
		<!--{/if}-->
		<li class="comiis_stylitit bg_e b_b f_c cl">{lang thread_content}</li>
		<li class="comiis_styli b_b cl">
			<textarea class="comiis_pt" tabindex="2" autocomplete="off" value="" id="sendmessage" name="message"></textarea>
		</li>
	</div>
	<div class="comiis_btnbox cl">
		<button id="pmsubmit_btn" class="comiis_btn bg_c f_f">{lang sendpm}</button>
	</div>
</form>
<script type="text/javascript">
	(function() {
		var form = $('#pmform_{$pmid}');
		$('#pmsubmit_btn').on('click', function() {
			var obj = $(this);
			$.ajax({
				type:'POST',
				url:form.attr('action') + '&handlekey='+form.attr('id')+'&inajax=1',
				data:form.serialize(),
				dataType:'xml'
			})
			.success(function(s) {
				popup.open(s.lastChild.firstChild.nodeValue);
			})
			.error(function() {
				popup.open('{lang networkerror}', 'alert');
			});
			return false;
			});
	 })();
</script>
<!--{/if}-->
<!--{eval $comiis_foot = 'no';}-->
<!--{template common/footer}-->