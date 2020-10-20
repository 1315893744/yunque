<?PHP exit('Access Denied');?>
<!--{template common/header}-->
<style>.comiis_footer_scroll {bottom:110px;}</style>
<!--{if $_GET['op']=='edit' || $_GET['op']=='editpic'}-->
	<div class="comiis_topnv bg_f b_b">
		<ul class="comiis_flex">
			<!--{eval $aid = $albumid ? $albumid : -1;}-->
			<li class="flex"><a href="home.php?mod=space&uid=$album[uid]&do=album&id=$aid" class="f_c">{lang view_album}</a></li>
			<li class="flex{if $_GET['op']=='edit'} kmon{/if}"><a href="home.php?mod=spacecp&ac=album&op=edit&albumid=$albumid"{if $_GET['op']=='edit'} class="b_0 f_0"{else} class="f_c"{/if}>{lang edit_album_information}</a></li>
			<li class="flex{if $_GET['op']=='editpic'} kmon{/if}"><a href="home.php?mod=spacecp&ac=album&op=editpic&albumid=$albumid"{if $_GET['op']=='editpic'} class="b_0 f_0"{else} class="f_c"{/if}>{lang edit_pic}</a></li>
		</ul>
	</div>
<!--{/if}-->
<!--{if $_GET['op'] == 'edit'}-->
	<form method="post" autocomplete="off" id="theform" name="theform" action="home.php?mod=spacecp&ac=album&op=edit&albumid=$albumid">
		<!--{eval comiis_load('jHh18ocE2H8NQ8XSo8', 'album,categoryselect,friendarr,passwordstyle,selectgroupstyle,groups');}-->
		<div class="comiis_btnbox cl">
			<input type="hidden" name="referer" value="{echo dreferer()}" />
			<input type="hidden" name="editsubmit" value="true" />
			<button name="submit" type="submit" class="comiis_btn bg_c f_f mb15 formdialog">{lang determine}</button>
			<a href="home.php?mod=spacecp&ac=album&op=delete&albumid=$album[albumid]&handlekey=delalbumhk_{$album[albumid]}" id="album_delete_$album[albumid]" class="f16 f_g dialog"><i class="comiis_font">&#xe647;</i> {lang delete_album}</a>
		</div>
		<input type="hidden" name="formhash" value="{FORMHASH}" />
	</form>
<script>
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
</script>
<!--{elseif $_GET['op'] == 'editpic'}-->
	<!--{if $list}-->
		<form method="post" autocomplete="off" id="theform" name="theform" action="home.php?mod=spacecp&ac=album&op=editpic&albumid=$albumid">
			<div class="comiis_editpic cl">
				<div class="comiis_quote bg_h f_c">{lang delete_pic_notice}</div>
				<ul class="comiis_input_style">
				<!--{eval $common = '';}-->
				<!--{eval comiis_load('StQiT8VFYfqHtIfe3V', 'list,common,album');}-->
				</ul>
				<!--{if $multi}-->$multi<!--{/if}-->
			</div>
			<div class="comiis_showleftbox comiis_act_glfoot comiis_input_style bg_e b_t">
				<div class="comiis_styli cl">
					<button type="submit" name="editpicsubmit" value="true" onclick="this.form.action+='&subop=delete';return ischeck('theform', 'ids')" class="f_g y" style="border:none;background:none;"><i class="comiis_font">&#xe647;</i> {lang delete}</button>
					<input type="checkbox" name="chkall" id="chkall" />
					<label for="chkall" onclick="checkAll(this.form, 'ids')"><i class="comiis_font"></i>{lang select_all}</label>				
				</div>				
				<div class="comiis_editpic_foot comiis_flex b_t">									
					<button type="submit" name="editpicsubmit" value="true" class="comiis_sendbtn bg_0 f_f" onclick="this.form.action+='&subop=update';" style="margin-right:10px;">{lang update_explain}</button>	
					<!--{if $albumlist}-->
					<button type="submit" name="editpicsubmit" value="true" class="comiis_sendbtn bg_c f_f" onclick="this.form.action+='&subop=move';return ischeck('theform', 'ids')">{lang move_to}</button>
					<div class="comiis_newalbumid flex bg_f b_ok">
						<div class="comiis_login_select">
							<span class="inner">
								<i class="comiis_font f_d">&#xe60c;</i>
								<span class="z">
									<span class="comiis_question f_c" id="newalbumid_name"></span>
								</span>					
							</span>
							<select name="newalbumid" id="newalbumid">
							<!--{loop $albumlist $key $value}-->
							<!--{if $albumid != $value[albumid]}--><option value="$value[albumid]">$value[albumname]</option><!--{/if}-->
							<!--{/loop}-->
							<!--{if $albumid>0}--><option value="0">{lang default_album}</option><!--{/if}-->
							</select>
							</div>
						</div>
					</div>
					<!--{/if}-->				
				</div>				
			</div>
			<input type="hidden" name="page" value="$page" />
			<input type="hidden" name="editpicsubmit" value="true" />
			<input type="hidden" name="formhash" value="{FORMHASH}" />
		</form>
	<!--{else}-->		
		<div class="comiis_notip comiis_sofa cl">
			<i class="comiis_font f_e cl">&#xe613;</i>
			<span class="f_d">{lang no_pics}</span>
		</div>
	<!--{/if}-->
	<!--{if $albumlist}-->
		<style>.comiis_scrolltop {bottom:116px;}</style>
		<div style="height:90px;"></div>
	<!--{/if}-->
	<script>
	function ischeck(id, prefix) {
		form = document.getElementById(id);
		for(var i = 0; i < form.elements.length; i++) {
			var e = form.elements[i];
			if(e.name.match(prefix) && e.checked) {
				if(confirm("{$comiis_lang['tip39']}")) {
					return true;
				} else {
					return false;
				}
			}
		}
		alert('{$comiis_lang['tip40']}');
		return false;
	}
	function checkAll(form, name) {
		setTimeout(function(){
			for(var i = 0; i < form.elements.length; i++) {
				var e = form.elements[i];
				if(e.name.match(name)) {
					e.checked = form.elements['chkall'].checked;
				}
			}
			comiis_input_style();
		}, 50);
	}
	</script>
<!--{elseif $_GET['op'] == 'delete'}-->
	<div class="comiis_tip bg_f cl">
		<form method="post" autocomplete="off" id="theform" name="theform" action="home.php?mod=spacecp&ac=album&op=delete&albumid=$albumid&uid=$_GET[uid]">
			<input type="hidden" name="referer" value="{echo dreferer()}" />
			<input type="hidden" name="deletesubmit" value="true" />
			<input type="hidden" name="formhash" value="{FORMHASH}" />
			<div class="tip_tit bg_e f_b b_b" id="return_report">{lang delete_album}</div>
			<dt class="kmlabs f_b">
				<p class="f_g" style="text-align:center;">{lang delete_album_message}</p>
				<p class="f_c">{lang the_album_pic}:</p>
				<div class="comiis_input_style mt5 cl">
					<div class="comiis_styli comiis_styli_select cl" id="threadtypes">
						<div class="comiis_login_select comiis_inner b_ok">
							<span class="inner">
								<i class="comiis_font f_d">&#xe60c;</i>
								<span class="z">
									<span class="comiis_question" id="moveto_name"></span>
								</span>					
							</span>
							<select id="moveto" name="moveto" class="ps">
								<option value="-1">{lang completely_remove}</option>
								<option value="0">{lang move_to_default_album}</option>
								<!--{loop $albums $value}-->
								<option value="$value[albumid]">{lang move_to} $value[albumname]</option>
								<!--{/loop}-->
							</select>
						</div>
					</div>
				</div>
				<script>comiis_input_style();</script>
			</dt>
			<dd class="b_t cl">
                <!--{if $comiis_app_switch['comiis_post_btnwz'] == 1}-->
                    <a href="javascript:;" onclick="popup.close();" class="tip_btn bg_f f_b">{lang cancel}</a>
                    <button type="submit" name="submit" value="true" class="formdialog tip_btn bg_f f_0"><span class="tip_lx">{lang determine}</span></button>
                <!--{else}-->
                    <button type="submit" name="submit" value="true" class="formdialog tip_btn bg_f f_0">{lang determine}</button>
                    <a href="javascript:;" onclick="popup.close();" class="tip_btn bg_f f_b"><span class="tip_lx">{lang cancel}</span></a>
                <!--{/if}-->
			</dd>
		</form>
	</div>	
<!--{elseif $_GET['op'] == 'edittitle'}-->
	<form id="titleform" name="titleform" action="home.php?mod=spacecp&ac=album&op=editpic&subop=update&albumid=$pic[albumid]" method="post" autocomplete="off">
		<input type="hidden" name="referer" value="{echo dreferer()}" />
		<input type="hidden" name="formhash" value="{FORMHASH}" />
		<input type="hidden" name="editpicsubmit" value="true" />
		<!--{if $_G[inajax]}--><input type="hidden" name="handlekey" value="$_GET[handlekey]" /><!--{/if}-->
		<div class="comiis_tip bg_f cl">
			<div class="tip_tit bg_e f_b b_b">{lang edit_description}</div>
			<dt class="f_c">
				<div class="tip_form">
					<li class="nop b_ok f_c cl"><textarea class="comiis_pt f_c" id="needmessage" name="title[{$pic[picid]}]">$pic[title]</textarea></li>			
				</div>
			</dt>
			<dd class="b_t cl">
                <!--{if $comiis_app_switch['comiis_post_btnwz'] == 1}-->
                    <a href="javascript:;" onclick="popup.close();" class="tip_btn bg_f f_b">{lang cancel}</a>				
                    <button type="submit" name="editpicsubmit_btn" id="fastpostsubmit_btn" value="{lang update}" class="formdialog tip_btn bg_f f_0" comiis="handle"><span class="tip_lx">{lang confirms}</span></button>
                <!--{else}-->
                    <button type="submit" name="editpicsubmit_btn" id="fastpostsubmit_btn" value="{lang update}" class="formdialog tip_btn bg_f f_0" comiis="handle">{lang confirms}</button>
                    <a href="javascript:;" onclick="popup.close();" class="tip_btn bg_f f_b"><span class="tip_lx">{lang cancel}</span></a>				
                <!--{/if}-->	
			</dd>
		</div>
	</form>
	<script type="text/javascript">
		function succeedhandle_$_GET['handlekey'] (a, b, c) {
			$('#comiis_pic_title').html(c['title']);
			popup.open(b, 'alert');
		}
	</script>
<!--{elseif $_GET[op] == 'edithot'}-->
	<div class="comiis_tip bg_f cl">
		<form method="post" autocomplete="off" action="home.php?mod=spacecp&ac=album&op=edithot&picid=$picid">
			<input type="hidden" name="referer" value="{echo dreferer()}" />
			<input type="hidden" name="hotsubmit" value="true" />
			<input type="hidden" name="formhash" value="{FORMHASH}" />
			<div class="tip_tit bg_e f_b b_b" id="return_report">{lang adjust_hot}</div>
			<dt class="kmlabs f_b">
				<p>{lang new_hot}:</p>
				<p class="kmpx b_ok"><input type="text" name="hot" value="$pic[hot]" class="comiis_px"></p>
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
<!--{/if}-->
<!--{eval $comiis_foot = 'no';}-->
<!--{template common/footer}-->