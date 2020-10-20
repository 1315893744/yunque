<?PHP exit('Access Denied');?>
<!--{template common/header}-->
<!--{if $_GET[op] == 'delete'}-->
<div class="comiis_tip bg_f cl">
	<form method="post" autocomplete="off" action="home.php?mod=spacecp&ac=blog&op=delete&blogid=$blogid">
		<input type="hidden" name="referer" value="{echo dreferer()}" />
		<input type="hidden" name="deletesubmit" value="true" />
		<input type="hidden" name="formhash" value="{FORMHASH}" />
		<dt class="f_c">
			<p>{lang sure_delete_blog}?</p>
		</dt>
		<dd class="b_t cl">
            <!--{if $comiis_app_switch['comiis_post_btnwz'] == 1}-->
                <a href="javascript:;" onclick="popup.close();" class="tip_btn bg_f f_b">{lang cancel}</a>
                <button type="submit" name="btnsubmit" value="true" class="formdialog tip_btn bg_f f_0"><span class="tip_lx">{lang determine}</span></button>
			<!--{else}-->
                <button type="submit" name="btnsubmit" value="true" class="formdialog tip_btn bg_f f_0">{lang determine}</button>
                <a href="javascript:;" onclick="popup.close();" class="tip_btn bg_f f_b"><span class="tip_lx">{lang cancel}</span></a>
			<!--{/if}-->
		</dd>
	</form>
</div>
<!--{elseif $_GET[op] == 'stick'}-->
<div class="comiis_tip bg_f cl">
	<form method="post" autocomplete="off" action="home.php?mod=spacecp&ac=blog&op=stick&blogid=$blogid">
		<input type="hidden" name="referer" value="{echo dreferer()}" />
		<input type="hidden" name="sticksubmit" value="true" />
		<input type="hidden" name="stickflag" value="$stickflag" />
		<input type="hidden" name="formhash" value="{FORMHASH}" />
		<dt class="f_c">
			<p><!--{if $stickflag}-->{lang sure_stick_blog}<!--{else}-->{lang sure_cancel_stick_blog}<!--{/if}--></p>
		</dt>
		<dd class="b_t cl">
            <!--{if $comiis_app_switch['comiis_post_btnwz'] == 1}-->
                <a href="javascript:;" onclick="popup.close();" class="tip_btn bg_f f_b">{lang cancel}</a>
                <button type="submit" name="btnsubmit" value="true" class="formdialog tip_btn bg_f f_0"><span class="tip_lx">{lang determine}</span></button>
			<!--{else}-->
                <button type="submit" name="btnsubmit" value="true" class="formdialog tip_btn bg_f f_0">{lang determine}</button>
                <a href="javascript:;" onclick="popup.close();" class="tip_btn bg_f f_b"><span class="tip_lx">{lang cancel}</span></a>
			<!--{/if}-->
		</dd>
	</form>
</div>
<!--{elseif $_GET[op] == 'edithot'}-->
<div class="comiis_tip bg_f cl">
	<form method="post" autocomplete="off" action="home.php?mod=spacecp&ac=blog&op=edithot&blogid=$blogid">
		<input type="hidden" name="referer" value="{echo dreferer()}" />
		<input type="hidden" name="hotsubmit" value="true" />
		<input type="hidden" name="formhash" value="{FORMHASH}" />
		<div class="tip_tit bg_e f_b b_b" id="return_report">{lang adjust_hot}</div>
		<dt class="kmlabs f_b">
			<p>{lang new_hot}:</p>
			<p class="kmpx b_ok"><input type="text" name="hot" value="$blog[hot]" class="comiis_px"></p>
		</dt>
		<dd class="b_t cl">
            <!--{if $comiis_app_switch['comiis_post_btnwz'] == 1}-->
                <a href="javascript:;" onclick="popup.close();" class="tip_btn bg_f f_b">{lang cancel}</a>
                <button type="submit" name="btnsubmit" value="true" class="formdialog tip_btn bg_f f_0"><span class="tip_lx">{lang determine}</span></button>
			<!--{else}-->
                <button type="submit" name="btnsubmit" value="true" class="formdialog tip_btn bg_f f_0">{lang determine}</button>
                <a href="javascript:;" onclick="popup.close();" class="tip_btn bg_f f_b"><span class="tip_lx">{lang cancel}</span></a>
			<!--{/if}-->
		</dd>
	</form>
</div>
<!--{else}-->
<form id="ttHtmlEditor" method="post" autocomplete="off" action="home.php?mod=spacecp&ac=blog&blogid=$blog[blogid]{if $_GET[modblogkey]}&modblogkey=$_GET[modblogkey]{/if}" enctype="multipart/form-data">
<input type="hidden" name="blogsubmit" value="true" />
<input type="hidden" name="formhash" value="{FORMHASH}" />
<div class="comiis_wzpost bg_f b_t mt15 cl">
	<ul>
		<!--{eval comiis_load('erKEFsHSV4hsLhI6F6', 'blog,categoryselect,classarr');}-->
		<li class="styli_h bg_e b_b"></li>
		<div<!--{if $blog['uid'] && $blog['uid']!=$_G['uid']}--> style="display:none"<!--{eval $selectgroupstyle='display:none';}--><!--{/if}-->>
			<li class="comiis_styli comiis_flex b_b">
				<div class="styli_tit f_c">{lang privacy_settings}</div>
				<div class="flex comiis_input_style">
					<div class="comiis_login_select">
						<span class="inner">
							<i class="comiis_font f_d">&#xe60c;</i>
							<span class="z">
								<span class="comiis_question" id="friend_name"></span>
							</span>					
						</span>
						<select name="friend" id="friend" onchange="passwordShow(this.value);">
							<option value="0"$friendarr[0]>{lang friendname_0}</option>
							<option value="1"$friendarr[1]>{lang friendname_1}</option>
							<option value="2"$friendarr[2]>{lang friendname_2}</option>
							<option value="3"$friendarr[3]>{lang friendname_3}</option>
							<option value="4"$friendarr[4]>{lang friendname_4}</option>
						</select>
					</div>	
				</div>
			</li>
			<li id="span_password" class="comiis_styli b_b" style="$passwordstyle">
				<input type="text" name="password" value="$blog[password]" onkeyup="value=value.replace(/[^\w\.\/]/ig,'')" class="comiis_input" placeholder="{lang password}({lang required})" />
			</li>
			<div id="tb_selectgroup" style="$selectgroupstyle">
				<li class="comiis_styli b_b">
					<div class="comiis_input_style">
						<div class="comiis_login_select">
							<span class="inner">
								<i class="comiis_font f_d">&#xe60c;</i>
								<span class="z">
									<span class="comiis_question" id="selectgroup_name"></span>
								</span>					
							</span>
							<select name="selectgroup" id="selectgroup" onchange="getgroup(this.value);">
								<option value="">{lang from_friends_group}</option>
								<!--{loop $groups $key $value}-->
								<option value="$key">$value</option>
								<!--{/loop}-->
							</select>
						</div>	
					</div>
				</li>	
				<li class="comiis_stylitit b_b bg_e f_c">{lang friend_name_space}</li>		
				<li class="comiis_styli b_b">
					<textarea name="target_names" id="target_names" class="comiis_pxs f_0">$blog[target_names]</textarea>
				</li>
				<li class="styli_h bg_e b_b"></li>
			</div>
		</div>
		<!--{if checkperm('manageblog')}-->
		<li class="comiis_styli comiis_flex b_b">
			<div class="styli_tit f_c">{lang hot}</div>
			<div class="flex"><input type="text" name="hot" id="hot" value="$blog[hot]" class="comiis_input" /></div>
		</li>
		<!--{/if}-->
		<li class="comiis_styli comiis_flex comiis_input_style f_c b_b"<!--{if $blog['uid'] && $blog['uid']!=$_G['uid']}--> style="display:none"<!--{eval $selectgroupstyle='display:none';}--><!--{/if}-->>
			<div class="flex f_c">{lang comments_not_allowed}</div>
			<div class="styli_r">
				<input type="checkbox" name="noreply" id="km_noreply" value="1" class="comiis_checkbox_key" />
				<label for="km_noreply" class="wauto"><code class="bg_f b_ok comiis_checkbox comiis_checkbox_close"></code></label>
			</div>	
		</li>
		<!--{if helper_access::check_module('feed')}-->
		<li class="comiis_styli comiis_flex comiis_input_style f_c b_b">
			<div class="flex f_c">{lang make_feed}</div>
			<div class="styli_r">
				<input type="checkbox" name="makefeed" id="makefeed" value="1" checked="checked" class="comiis_checkbox_key" />
				<label for="makefeed" class="wauto"><code class="bg_f b_ok comiis_checkbox comiis_checkbox_close"></code></label>
			</div>	
		</li>
		<!--{/if}-->
		<!--{if $secqaacheck || $seccodecheck}-->
		<li class="comiis_styli b_b">
			<!--{subtemplate common/seccheck}-->
		</li>
		<!--{/if}-->					
	</ul>				
</div>
<div class="comiis_btnbox">
	<button type="submit" id="issuance" class="comiis_btn bg_c f_f">{lang save_publish}</button>
</div>
</form>
<!--{eval $comiis_upload_url = 'misc.php?mod=swfupload&action=swfupload&operation=album&type=image';}-->
<!--{subtemplate common/comiis_upload}-->	
<script type="text/javascript">
	function comiis_blog_images(data){
		$('#uchome-ttHtmlEditor').comiis_insert('<'+'img src="'+data+'">');
	}
	function comiis_upload_success(data){
		if(data == '') {
			popup.open('{lang uploadpicfailed}', 'alert');
		}
		var dataarr = eval('('+data+')');
		popup.close();
		$('#imglist').append('<li><span aid="'+dataarr['picid']+'" class="del"><a href="javascript:;"><i class="comiis_font f_g">&#xe648;</i></a></span><span class="charu f_f">{$comiis_lang['tip220']}</span><span class="p_img"><a href="javascript:;" onclick="comiis_blog_images(\''+dataarr['bigimg']+'\');"><'+'img style="height:54px;width:54px;" id="aimg_'+dataarr['picid']+'" src="'+dataarr['bigimg']+'" class="vm b_ok" /></a></span><input type="hidden" name="picids['+dataarr['picid']+']" value="'+dataarr['picid']+'" /></li>');
	}
	<!--{if 0 && $_G['setting']['mobile']['geoposition']}-->
	geo.getcurrentposition();
	<!--{/if}-->
	$(document).on('click', '.del', function() {
		var obj = $(this);
		$.ajax({
			type:'GET',
			url:'forum.php?mod=ajax&action=deleteattach&inajax=yes&aids[]=' + obj.attr('aid'),
		})
		.success(function(s) {
			obj.parent().remove();
		})
		.error(function() {
			popup.open('{lang networkerror}', 'alert');
		});
		return false;
	});
function addSort(obj) {
	if (obj.value == 'addoption') {
		$('#comiis_addoption').css('display', 'block');
		$('#newsort').focus();
 	}
}
function blogAddOption(sid, aid) {
	var obj = document.getElementById(aid);
	var newOption = document.getElementById(sid).value;
	newOption = newOption.replace(/^\s+|\s+$/g,"");
	document.getElementById(sid).value = "";
	if (newOption!=null && newOption!='') {
		var newOptionTag=document.createElement('option');
		newOptionTag.text=newOption;
		newOptionTag.value="new:" + newOption;
		try {
			obj.add(newOptionTag, obj.options[0]);
		} catch(ex) {
			obj.add(newOptionTag, obj.selecedIndex);
		}
		obj.value="new:" + newOption;
		var obj = document.getElementById(aid);
		obj.value=obj.options[0].value;
		$('#comiis_addoption').css('display', 'none');
		comiis_input_style();
		popup.open('{$comiis_lang['tip42']}', 'alert');
	} else {
		popup.open('{$comiis_lang['tip43']}', 'alert');
		$('#newsort').focus();
	}
}	
function relatekw() {
	var subject = cnCode(document.getElementById('subject').value);
	var message = cnCode(document.getElementById('uchome-ttHtmlEditor').value);
	if(message) {
		message = message.substr(0, 500);
	}
	$.ajax({
		type:'GET',
		url:'misc.php?op=comiis_relatekw&mod=faq&inajax=yes&subjectenc=' + subject + '&messageenc=' + message,
		dataType:'xml'
	})
	.success(function(s) {
		if(s.lastChild.firstChild.nodeValue){
			document.getElementById('tag').value = s.lastChild.firstChild.nodeValue;
		}
	});
}
function cnCode(str) {
	str = str.replace(/<\/?[^>]+>|\[\/?.+?\]|"/ig, "");
	str = str.replace(/\s{2,}/ig, ' ');
	return str;
}
function getgroup(gid) {
	if(gid) {
		$.ajax({
			type:'GET',
			url:'home.php?mod=spacecp&ac=privacy&inajax=1&op=getgroup&gid='+gid,
			dataType:'xml'
		})
		.success(function(s) {
			if(s.lastChild.firstChild.nodeValue){
				var s = $('#target_names').val() + ' ' + s.lastChild.firstChild.nodeValue;
				$('#target_names').val(s);
			}
		});
	}
}
function passwordShow(value) {
	if(value==4) {
		$('#span_password').css('display','');
		$('#tb_selectgroup').css('display','none');
	} else if(value==2) {
		$('#span_password').css('display','none');
		$('#tb_selectgroup').css('display','');
	} else {
		$('#span_password,#tb_selectgroup').css('display','none');
	}
}
</script>
<!--{/if}-->
<!--{eval $comiis_foot = 'no';}-->
<!--{template common/footer}-->