<?PHP exit('Access Denied');?>
<!--{template common/header}-->
<!--{if empty($_GET['op'])}-->
	<form method="post" autocomplete="off" id="albumform" action="home.php?mod=spacecp&ac=upload">
	<input type="hidden" name="albumsubmit" id="albumsubmit" value="true" />
	<input type="hidden" name="formhash" value="{FORMHASH}" />
	<div class="comiis_wzpost bg_f b_t mt15 cl">
		<ul>
		<!--{eval comiis_load('nvrLpeNTpvpxSS9tro', 'albums,categoryselect,friendarr,groups');}-->
		<li class="comiis_stylitit b_b bg_e f_c">{lang select_upload_pic}</li>
		<li class="comiis_stylino b_b cl">		
			<div class="comiis_editpic cl" style="margin:0 0 3px 0;">
				<ul id="imglist">
					<li class="up_btn comiis_flex">
						<a href="javascript:;" class="bg_b b_ok f_c"><i class="comiis_font">&#xe642;</i>{lang add}{lang share_pic}<input type="file" name="Filedata" id="filedata"{if $_G['comiis_isAndroid'] != 1} multiple="multiple"{/if} accept="image/*" /></a>
						<div class="styli_r flex f_d" style="text-align:right;">{$comiis_lang['post32']}</div>
					</li>				
				</ul>
			</div>
		</li>
		<!--{eval $comiis_upload_url = 'misc.php?mod=swfupload&action=swfupload&operation=album&type=image';}-->
		<!--{subtemplate common/comiis_upload}-->
		<script type="text/javascript">
			function comiis_upload_success(a){
				if(a == '') {
					popup.open('{lang uploadpicfailed}', 'alert');
				}else{
					var dataarr = eval('('+a+')');
					if(dataarr['picid'] == '0'){
						popup.open('{lang uploadpicfailed}', 'alert');
					}else{
						$('#imglist').append('<li class="comiis_flex b_t"><div class="editpic_l del" aid="'+dataarr['picid']+'"><i class="comiis_font f_g">&#xe647;</i></div><div class="editpic_img"><div class="editpic_imgbox"><'+'img id="aimg_'+dataarr['picid']+'" src="'+dataarr['bigimg']+'" /></div></div><div class="editpic_textarea b_ok flex"><textarea name="title['+dataarr['picid']+']" placeholder="{$comiis_lang['post28']}"></textarea></div></li>');
					}
				}
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
		</script>				
		</ul>
	</div>
	<div class="comiis_btnbox cl">
		<button type="submit" name="albumsubmit_btn" id="albumsubmit_btn" value="true" class="formdialog comiis_btn bg_c f_f">{lang publish}{lang album}</button>
	</div>	
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
function album_op(id) {
	$('#selectalbum,#creatalbum').css('display','none');
	$('#'+id).css('display','block');
}
</script>
<!--{/if}-->
<!--{eval $comiis_foot = 'no';}-->
<!--{template common/footer}-->