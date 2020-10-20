<?PHP exit('Access Denied');?>
<script>var action = '{$_GET[action]}';</script>
<script src="data/cache/common_smilies_var.js?{VERHASH}" charset="{CHARSET}"></script>
<script src="template/comiis_app/comiis/js/comiis_swiper.min.js?{VERHASH}"></script>
<script src="template/comiis_app/comiis/js/comiis_post.js?{VERHASH}" charset="{CHARSET}"></script>
<div class="comiis_postbox ojig">
	<div class="bg_e b_t cl">
		<form method="post" autocomplete="off" id="fastpostform" action="forum.php?mod=post&action=reply&fid=$_G[fid]&tid=$_G[tid]&extra=$_GET[extra]&replysubmit=yes&mobile=2">
			<input type="hidden" name="formhash" value="{FORMHASH}" />
			<input type="hidden" name="noticeauthor" value="{echo dhtmlspecialchars(authcode('q|'.$_G['forum_thread']['authorid'], 'ENCODE'));}">
			<!--{eval comiis_load('N6733Yyt6NR33i3YBF', 'page,firststand,secqaacheck,seccodecheck,imgattachs');}-->
			<!--{eval $comiis_upload_url = 'misc.php?mod=swfupload&operation=upload&type=image&inajax=yes&infloat=yes&simple=2';}-->
			<!--{subtemplate common/comiis_upload}-->
			<!--{eval comiis_load('B1Ja1GYArYA9xkxb5g', 'postinfo');}-->
			<!--{hook/viewthread_fastpost_button_mobile}-->
		</form>
	</div>
</div>
<!--{eval comiis_load('y4uv8VO5BDS4Or4QUs', 'allowpostreply');}-->