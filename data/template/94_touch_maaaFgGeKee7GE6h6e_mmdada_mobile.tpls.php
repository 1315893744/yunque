<?php
//Discuz! cache file, DO NOT modify me!
//Created: Sep 29, 2018, 17:52
//Identify: 8eaa7607837ec0f7f5dfe4013fb944ce

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
?>
<?php if($op == 'delete') { ?>
<div class="comiis_tip comiis_input_style bg_f cl">
<form method="post" autocomplete="off" action="portal.php?mod=portalcp&amp;ac=article&amp;op=delete&amp;aid=<?php echo $_GET['aid'];?>">
<input type="hidden" name="aid" value="<?php echo $_GET['aid'];?>" />
<input type="hidden" name="referer" value="<?php echo dreferer(); ?>" />
<input type="hidden" name="deletesubmit" value="true" />
<input type="hidden" name="formhash" value="<?php echo FORMHASH;?>" />
<div class="tip_tit bg_e f_b b_b"><?php echo $comiis_lang['article_delete'];?></div>
<dt class="kmlab f_b">
<div class="comiis_tip_radios">
<input type="radio" name="optype" value="0" id="comiis_ban_1">
<label for="comiis_ban_1"><i class="comiis_font f_d"></i><?php echo $comiis_lang['article_delete_direct'];?></label>
<input type="radio" name="optype" value="1" checked="checked" id="comiis_ban_2">
<label for="comiis_ban_2"><i class="comiis_font f_0"></i><?php echo $comiis_lang['article_delete_recyclebin'];?></label>
</div>
</dt>		
<dd class="b_t cl">
        <?php if($comiis_app_switch['comiis_post_btnwz'] == 1) { ?>
            <a href="javascript:popup.close();" class="tip_btn bg_f f_b"><?php echo $comiis_lang['cancel'];?></a>		
            <button type="submit" name="modsubmit" id="modsubmit" value="<?php echo $comiis_lang['confirms'];?>" class="formdialog tip_btn bg_f f_0"><span class="tip_lx"><?php echo $comiis_lang['confirms'];?></span></button>
        <?php } else { ?>
            <input type="submit" name="modsubmit" id="modsubmit" value="<?php echo $comiis_lang['confirms'];?>" class="formdialog tip_btn bg_f f_0 kmshow">
            <a href="javascript:popup.close();" class="tip_btn bg_f f_b"><span class="tip_lx"><?php echo $comiis_lang['cancel'];?></span></a>
        <?php } ?>		
</dd>
    </form>
</div>
<script>comiis_input_style();</script>
<?php } elseif($op == 'add_success') { ?>
<div class="comiis_password_top">
<div class="comiis_password_ico" style="margin-bottom:5px;"><i class="comiis_font f_0">&#xe67d</i></div>
<p class="f_c"><?php echo $comiis_lang['article_send_succeed'];?></p>
</div>
<div class="comiis_password_form cl">
<a href="portal.php?mod=view&amp;aid=<?php echo $aid;?>" class="comiis_btn bg_c f_f"><?php echo $comiis_lang['view_article'];?></a>
<a href="<?php echo $article_add_url;?>&op=edit&aid=<?php echo $aid;?>" class="comiis_btn bg_f f_c mt15"><?php echo $comiis_lang['article_edit'];?></a>
<a href="<?php echo $article_add_url;?>" class="comiis_btn bg_f f_c mt15"><?php echo $comiis_lang['post17'];?></a>
</div>
<?php } else { ?>
<form method="post" autocomplete="off" id="articleform" action="portal.php?mod=portalcp&amp;ac=article<?php if($_GET['modarticlekey']) { ?>&amp;modarticlekey=<?php echo $_GET['modarticlekey'];?><?php } ?>" enctype="multipart/form-data">
<input type="hidden" id="conver" name="conver" value="" />
<input type="hidden" id="aid" name="aid" value="<?php echo $article['aid'];?>" />
<input type="hidden" name="cid" value="<?php echo $article_content['cid'];?>" />
<input type="hidden" id="attach_ids" name="attach_ids" value="0" />
<input type="hidden" name="articlesubmit" value="true" />
<input type="hidden" name="formhash" value="<?php echo FORMHASH;?>" />
<div class="comiis_wzpost bg_f b_t mt15 cl">
<ul>
<li class="comiis_styli comiis_flex b_b">
<div class="styli_tit f_c"><?php echo $comiis_lang['thread_subject'];?></div>
<div class="flex"><input type="text" name="title" id="title" class="comiis_input" value="<?php echo $article['title'];?>" placeholder="(<?php echo $comiis_lang['required'];?>)" /></div>
<div class="styli_r"><a href="javascript:;" onclick="change_title_color();" class="comiis_icoa"><i class="comiis_font bg_0 f_f">&#xe655</i></a></div>
<input type="hidden" id="highlight_style_0" name="highlight_style[0]" value="<?php echo $stylecheck['0'];?>" />
<input type="hidden" id="highlight_style_1" name="highlight_style[1]" value="<?php echo $stylecheck['1'];?>" />
<input type="hidden" id="highlight_style_2" name="highlight_style[2]" value="<?php echo $stylecheck['2'];?>" />
<input type="hidden" id="highlight_style_3" name="highlight_style[3]" value="<?php echo $stylecheck['3'];?>" />
</li>		
<input type="hidden" name="htmlname" id="htmlname" value="<?php echo $article['htmlname'];?>" />
<input type="hidden" name="oldhtmlname" id="oldhtmlname" value="<?php echo $article['htmlname'];?>" />		
<li class="comiis_styli comiis_flex b_b"<?php if($article['contents'] < 2) { ?> style="display: none"<?php } ?>>
<div class="styli_tit f_c"><?php echo $comiis_lang['page_title'];?></div>
<div class="flex"><input type="text" name="pagetitle" id="pagetitle" class="comiis_input" value="<?php echo $article_content['title'];?>" /></div>
</li>		
<?php if($_G['cache']['portalcategory'] && $categoryselect) { ?>
<li class="comiis_styli comiis_flex b_b">
<div class="styli_tit f_c"><?php echo $comiis_lang['article_category'];?></div>
<div class="flex comiis_input_style">
<div class="comiis_login_select">
<span class="inner">
<i class="comiis_font f_d">&#xe60c</i>
<span class="z">
<span class="comiis_question" id="catid_name"></span>
</span>					
</span>
<?php echo $categoryselect;?>
</div>	
</div>
</li>
<?php } ?>		
<li class="comiis_styli comiis_flex b_b">
<div class="styli_tit f_c"><?php echo $comiis_lang['article_source'];?></div>
<div class="flex"><input type="text" id="from" name="from" value="<?php echo $article['from'];?>" class="comiis_input<?php if($from_cookie) { ?> b_b" style="padding:4px 0;<?php } ?>" /></div>
<?php if($from_cookie) { ?>
<div class="styli_r comiis_input_style">
<div class="comiis_login_select comiis_inner b_ok">
<span class="inner">
<i class="comiis_font f_d">&#xe620</i>
<span class="z">
<span class="comiis_question" id="from_cookie"><?php echo $comiis_lang['choose_please'];?></span>
</span>					
</span>
<select name="from_cookie" id="from_cookie" onchange="document.getElementById('from').value=this.value;" style="width:96px;">
<option value="" selected><?php echo $comiis_lang['choose_please'];?></option><?php if(is_array($from_cookie)) foreach($from_cookie as $var) { ?><option value="<?php echo $var;?>"><?php echo $var;?></option>
<?php } ?>
</select>
</div>
</div>
<?php } ?>
</li>		
<li class="comiis_styli comiis_flex b_b">
<div class="styli_tit f_c"><?php echo $comiis_lang['article_source_url'];?></div>
<div class="flex"><input type="text" name="fromurl" value="<?php echo $article['fromurl'];?>" class="comiis_input" /></div>
</li>		
<li class="comiis_styli comiis_flex b_b">
<div class="styli_tit f_c"><?php echo $comiis_lang['article_dateline'];?></div>
<div class="flex"><input type="text" name="dateline" class="comiis_input comiis_dateshow" value="<?php echo $article['dateline'];?>" id="comiis_dateline" readonly="readonly"/></div>
<div class="styli_r f_c"><a href="javascript:;" onclick="$('.comiis_dateshow').val('');"><i class="comiis_font f_g">&#xe647</i></a></div>
</li>		
<?php if(empty($article['aid'])) { ?>
<li class="comiis_stylitit b_b bg_e f_c"><?php echo $comiis_lang['article_auto_grab'];?></li>
<li class="comiis_styli comiis_flex b_b">
<div class="styli_tit comiis_input_style f_c">
<div class="comiis_login_select comiis_inner b_ok">
<span class="inner">
<i class="comiis_font f_d">&#xe620</i>
<span class="z">
<span class="comiis_question f_c" id="from_idtype_name"><?php echo $comiis_lang['thread'];?> tid</span>
</span>					
</span>
<select name="from_idtype" id="from_idtype" change="document.getElementById('ele_getauthorall').style.display=(document.getElementById('from_idtype').value=='tid' ? '' : 'none');">
<option value="tid"<?php echo $idtypes['tid'];?>><?php echo $comiis_lang['thread'];?> tid</option>
<option value="blogid"<?php echo $idtypes['blogid'];?>><?php echo $comiis_lang['blog'];?> id</option>
</select>
</div>
</div>
<div class="flex"><input type="text" name="from_id" id="from_id" value="<?php echo $_GET['from_id'];?>" class="comiis_input b_b" style="padding:4px 0;" /></div>
<?php if($_GET['from_idtype'] == 'tid') { ?>
<span id="ele_getauthorall" style="display:none;">
<label for="getauthorall"><input type="checkbox" name="getauthorall" id="getauthorall" value="1" class="pc" <?php if($_GET['getauthorall']) { ?>checked="checked"<?php } ?>/><?php echo $comiis_lang['article_getauthorall'];?></label>
</span>
<?php } ?>
<div class="styli_r"><button type="button" name="from_button" class="comiis_sendbtn bg_0 f_f" onclick="return from_get();"><?php echo $comiis_lang['grab'];?></button></div>
<input type="hidden" name="id" value="<?php echo $_GET['from_id'];?>" />
<input type="hidden" name="idtype" value="<?php echo $_GET['from_idtype'];?>" />
</li>
<?php } ?>		
<li class="styli_h bg_e b_b"></li>
<li class="comiis_styli comiis_flex b_b">
<div class="styli_tit f_c"><?php echo $comiis_lang['article_url'];?></div>
<div class="flex"><input type="text" name="url" value="<?php echo $article['url'];?>" class="comiis_input" /></div>
</li>		
<li class="comiis_styli comiis_flex b_b">
<div class="styli_tit f_c"><?php echo $comiis_lang['article_author'];?></div>
<div class="flex"><input type="text" name="author" value="<?php echo $article['author'];?>" class="comiis_input" /></div>
</li>		
<?php if($category[$catid]['allowcomment']) { ?>
<li class="comiis_styli comiis_flex comiis_input_style f_c b_b">
<div class="flex f_c"><?php echo $comiis_lang['article_forbidcomment_description'];?></div>
<div class="styli_r">
<input type="checkbox" name="forbidcomment" id="ck_allowcomment" value="1" class="comiis_checkbox_key" />
<label for="ck_allowcomment" class="wauto"><code class="bg_f b_ok comiis_checkbox comiis_checkbox_close"></code></label>
</div>	
</li>
<?php } ?>
<li class="comiis_stylitit b_b bg_e f_c"><?php echo $comiis_lang['article_tag'];?></li>	
<li class="comiis_styli comiis_input_style f_b b_b cl"><?php if(is_array($article_tags)) foreach($article_tags as $key => $tag) { ?><input type="checkbox" name="tag[<?php echo $key;?>]" id="article_tag_<?php echo $key;?>" <?php if($article_tags[$key]) { ?> checked="checked"<?php } ?> />
<label for="article_tag_<?php echo $key;?>"><i class="comiis_font<?php if($article_tags[$key]) { ?> f_0<?php } else { ?> f_d<?php } ?>"><?php if($article_tags[$key]) { ?>&#xe644<?php } else { ?>&#xe643<?php } ?></i><?php echo $tag_names[$key];?></label>
<?php } ?>
</li>		
<?php if(!empty($aid)) { ?>
<li class="comiis_stylitit b_b bg_e f_c"><?php echo $comiis_lang['all41'];?><?php echo $comiis_lang['article_description'];?></li>	
<li class="comiis_styli b_b cl">
<textarea name="summary" class="comiis_pxs f_c"><?php echo $article['summary'];?></textarea>
</li>
<?php } ?>		
<li class="comiis_stylitit b_b bg_e f_c"><?php echo $comiis_lang['all41'];?><?php echo $comiis_lang['thread_content'];?></li>	
<li class="comiis_stylino mt10">
<textarea name="content" id="needmessage" placeholder="<?php echo $comiis_lang['tip10'];?>" class="comiis_pt"><?php echo $article_content['content'];?></textarea>
</li>
<li id="comiis_post_tab">
<div class="comiis_upbox b_b">
<ul id="imglist" class="comiis_post_imglist cl">
<li class="up_btn"><a href="javascript:;" class="bg_e b_ok f_d"><i class="comiis_font">&#xe610</i><input type="file" name="Filedata" id="filedata" <?php if($_G['comiis_isAndroid'] != 1) { ?> multiple="multiple"<?php } ?> accept="image/*" /></a></li><?php if(is_array($attachs)) foreach($attachs as $temp) { ?><li><span aid="<?php echo $temp['attachid'];?>" up="1" class="del"><a href="javascript:;"><i class="comiis_font f_g">&#xe648</i></a></span><span class="p_img"><a href="javascript:;"><img style="height:54px;width:54px;" id="aimg_<?php echo $temp['attachid'];?>" title="<?php echo $temp['filename'];?>" src="<?php if($temp['remote']) { ?><?php echo $_G['setting']['ftp']['attachurl'];?><?php } else { ?><?php echo $_G['setting']['attachurl'];?><?php } if($temp['from'] == 'forum') { ?>forum<?php } else { ?>portal<?php } ?>/<?php echo $temp['attachment'];?><?php if($temp['thumb']) { ?>.thumb.jpg<?php } ?>" class="vm b_ok"></a></span></li>
<?php } ?>
</ul>
</div>
</li>
<li class="styli_h bg_e b_b"></li>
<li class="comiis_styli comiis_flex b_b">
<div class="styli_tit<?php if($article['related']) { ?> f_0<?php } else { ?> f_c<?php } ?>"><?php echo $comiis_lang['article_related'];?></div>
<div class="flex"></div>	
<div class="styli_r"><a id="related_article" href="javascript:;" onclick="comiis_related_article();return false;" class="comiis_sendbtn bg_0 f_f" style="display:block;"><?php echo $comiis_lang['select'];?></a></div>
</li>
<li class="comiis_mysclist comiis_post_xgwz b_b">
<div class="cl">
<ul id="raid_div">
<?php if($article['related']) { if(is_array($article['related'])) foreach($article['related'] as $raid => $rtitle) { ?><li id="raid_li_<?php echo $raid;?>" class="mysclist_li b_t">
<input type="hidden" name="raids[]" value="<?php echo $raid;?>">
<a href="javascript:;" title="<?php echo $comiis_lang['delete'];?>" class="f_d y" onclick="raid_delete(<?php echo $raid;?>);"><i class="comiis_font">&#xe647</i></a>
<h2><a href="portal.php?mod=view&amp;aid=<?php echo $raid;?>" class="f_b"><?php echo $rtitle;?></a></h2>
</li>
<?php } } ?>
</ul>
</div>
</li>
<?php if($secqaacheck || $seccodecheck) { ?>
<li class="styli_h bg_e b_b"></li>
<li class="comiis_styli b_b"><?php include template('common/seccheck'); ?></li>
<?php } ?>
</ul>
</div>
<div class="comiis_btnbox">
<button name="articlebutton" class="comiis_btn bg_c f_f"><?php echo $comiis_lang['submit'];?></button>
</div><?php $comiis_upload_url = 'misc.php?mod=swfupload&action=swfupload&operation=portal&inajax=1&infloat=yes';?><?php include template('common/comiis_upload'); ?><script type="text/javascript">
function comiis_upload_success(data){
if(data == '') {
popup.open('<?php echo $comiis_lang['uploadpicfailed'];?>', 'alert');
}
var comiis_redata = eval("("+data+")");
if(comiis_redata.errorcode == 0 && comiis_redata.aid) {
popup.close();
$('#imglist').append('<li><span aid="'+comiis_redata['aid']+'" class="del"><a href="javascript:;"><i class="comiis_font f_g">&#xe648</i></a></span><span class="p_img"><a href="javascript:;"><img style="height:54px;width:54px;" id="aimg_'+comiis_redata['aid']+'" src="'+comiis_redata['smallimg']+'" class="vm b_ok comiis_noloadimage" /></a></span></li>');
$('#attach_ids').val($('#attach_ids').val() + ',' + comiis_redata['aid']);
if($('#conver').val() == '') {
$('#conver').val(comiis_redata['cover']);
}
} else {
popup.open(STATUSMSG[comiis_redata.errorcode], 'alert');
}
}
$(document).on('click', '.del', function() {
var obj = $(this);
$.ajax({
type:'GET',
url: 'portal.php?mod=attachment&id='+obj.attr('aid')+'&op=delete',
dataType:'xml'
});
obj.parent().remove();
return false;
});
</script>
</form>
<div class="comiis_fmenu" id="comiis_article_style" style="display:none;">
<div class="comiis_fmenubox bg_e">
<div id="comiis_article_style_box"></div>
</div>
</div>
<div class="comiis_fmenu" id="comiis_related_article" style="display:none;">
<div class="comiis_fmenubox bg_e">
<div id="comiis_related_article_box"></div>
</div>
</div>
<script>
function comiis_related_article() {
if($("#catid").val()){
$.ajax({
type:'GET',
url: 'portal.php?mod=portalcp&ac=related&aid=<?php echo $aid;?>&inajax=1&catid=' + $('#catid').val(),
dataType:'xml'
}).success(function(s) {
if(s.lastChild.firstChild.nodeValue) {
$('#comiis_related_article_box').html('<div class="comiis_gosx_title cl"><span class="y"><i class="comiis_font f_d" onclick="comiis_fmenu(\'#comiis_related_article\');">&#xe639</i></span><?php echo $comiis_lang['tip29'];?></div><div class="comiis_wzpost bg_f b_t cl comiis_wzpost_height">' + s.lastChild.firstChild.nodeValue + '</div>');
setTimeout(function() {
comiis_fmenu('#comiis_related_article');
getrelatedarticle();
comiis_input_style();
$('.comiis_wzpost_height').css('height', $(window).height() - 44);
}, 100);
}
});
}else{
popup.open('<?php echo $comiis_lang['tip30'];?><?php echo $comiis_lang['article_category'];?>', 'alert');
}
}
<?php if($_GET['openrelated'] == 'yes') { ?>
setTimeout(function() {
comiis_related_article();
}, 100);
<?php } ?>
</script>
<script type="text/javascript">
var comiis_tab_index = 1;
$('.comiis_post_ico>a').on('click', function() {
if(comiis_tab_index != $(this).index()){
$('.comiis_post_ico a i').removeClass('f_0');
$(this).find('i').addClass("f_0");
comiis_tab_index = $(this).index();
$("#comiis_post_tab>div").hide().eq(comiis_tab_index).fadeIn();
}else{
if($(this).find('i').hasClass("f_0")){
$('.comiis_post_ico a i').removeClass('f_0');
$("#comiis_post_tab>div").eq(comiis_tab_index).hide();
}else{
$(this).find('i').addClass("f_0");
$("#comiis_post_tab>div").eq(comiis_tab_index).fadeIn();
}
}
});
function from_get() {
var el = document.getElementById('catid');
var catid = el ? el.value : 0;
window.location.href='portal.php?mod=portalcp&ac=article&from_idtype='+document.getElementById('from_idtype').value+'&catid='+catid+'&from_id='+document.getElementById('from_id').value+'&getauthorall='+(document.getElementById('getauthorall').checked ? '1' : '');
return true;
}
function raid_delete(aid) {
$('#raid_li_'+aid).remove();
}
function switchhl(obj, v) {
if(parseInt(document.getElementById('highlight_style_' + v).value)) {
document.getElementById('highlight_style_' + v).value = 0;
obj.className = obj.className.replace(/ bg_del f_f/, '');
} else {
document.getElementById('highlight_style_' + v).value = 1;
obj.className += ' bg_del f_f';
}
}
var str = '<div class="comiis_gosx_title comiis_flex cl"><div class="flex"><?php echo $comiis_lang['post14'];?></div><div class="styli_r"><i class="comiis_font f_d" onclick="comiis_fmenu(\'#comiis_article_style\');">&#xe639</i></div></div><div class="comiis_styli comiis_flex bg_f b_t"><div class="styli_tit"><a href="javascript:;" id="highlight_op_1" onclick="switchhl(this, 1)" class="comiis_dopt bg_e<?php if($stylecheck['1']) { ?> bg_del f_f<?php } ?>" style="font-weight:600;">B</a></div><div class="flex f_d"><?php echo $comiis_lang['e_bold'];?></div></div><div class="comiis_styli comiis_flex bg_f b_t"><div class="styli_tit"><a href="javascript:;" id="highlight_op_2" onclick="switchhl(this, 2)" class="comiis_dopt bg_e<?php if($stylecheck['2']) { ?> bg_del f_f<?php } ?>" style="font-style:italic">I</a></div><div class="flex f_d"><?php echo $comiis_lang['e_italic'];?></div></div><div class="comiis_styli comiis_flex bg_f b_t"><div class="styli_tit"><a href="javascript:;" id="highlight_op_3" onclick="switchhl(this, 3)" class="comiis_dopt bg_e<?php if($stylecheck['3']) { ?> bg_del f_f<?php } ?>" style="text-decoration:underline">U</a></div><div class="flex f_d"><?php echo $comiis_lang['e_underline'];?></div></div><div class="comiis_styli comiis_flex bg_f b_t b_b"><div class="styli_tit"><input type="button" id="color_style" fwin="eleStyle" class="comiis_dopt" style="background-color:<?php echo $stylecheck['0'];?>" /></div><div class="flex f_d"><?php echo $comiis_lang['select_color'];?></div><div class="styli_r comiis_wzcolor">';
var coloroptions = {'0' : '#000', '1' : '#EE1B2E', '2' : '#EE5023', '3' : '#996600', '4' : '#3C9D40', '5' : '#2897C5', '6' : '#2B65B7', '7' : '#8F2A90', '8' : '#EC1282'};
var menu = document.createElement('div');
menu.className="comiis_wzpost_style cl";
for(var i in coloroptions) {
str += '<a href="javascript:;" onclick="document.getElementById(\'highlight_style_0\').value=\'' + coloroptions[i] + '\';document.getElementById(\'color_style\').style.backgroundColor=\'' + coloroptions[i] + '\';" style="background:' + coloroptions[i] + ';color:' + coloroptions[i] + ';">' + coloroptions[i] + '</a>';
}
menu.innerHTML = str + '</div></div>';
$('#comiis_article_style_box').html(menu);
function change_title_color() {
comiis_fmenu('#comiis_article_style');
}
function setConver(attach) {
document.getElementById('conver').value = attach;
}
<?php if(!empty($article['conver'])) { ?>
setConver('<?php echo $article['conver'];?>');
<?php } ?>
</script>
<?php } ?>