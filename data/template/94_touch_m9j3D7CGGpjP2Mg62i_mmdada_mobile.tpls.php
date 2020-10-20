<?php
//Discuz! cache file, DO NOT modify me!
//Created: Sep 29, 2018, 17:52
//Identify: 8a00f316fd5dcfc42115d83ab50edf3c

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
?>
<?php if($_G['comiis_new'] <= 1) { ?>
<div class="comiis_postbox">
<div class="comiis_minipost bg_e b_t cl">
<form method="post" autocomplete="off" id="fastpostform" action="<?php echo $form_url;?>">
<?php if(!empty($topicid) ) { ?>
<input type="hidden" name="referer" value="<?php echo $topicurl;?>#comment" />
<input type="hidden" name="topicid" value="<?php echo $topicid;?>">
<?php } else { ?>
<input type="hidden" name="portal_referer" value="<?php echo $viewurl;?>#comment">
<input type="hidden" name="referer" value="<?php echo $viewurl;?>#comment" />
<input type="hidden" name="id" value="<?php echo $article['id'];?>" />
<input type="hidden" name="idtype" value="<?php echo $article['idtype'];?>" />
<input type="hidden" name="aid" value="<?php echo $aid;?>">
<?php } ?>
<input type="hidden" name="formhash" value="<?php echo FORMHASH;?>">
<input type="hidden" name="replysubmit" value="true">
<input type="hidden" name="commentsubmit" value="true" />
      <h2>
        <span class="y"><i class="comiis_font f_d" onclick="comiis_openrebox(0);" style="padding:10px 2px 10px 20px;">&#xe639</i></span>
        <img src="<?php echo avatar($_G['uid'], small, true);?>" class="comiis_noloadimage"><span class="f_b"><?php echo $_G['member']['username'];?></span>
      </h2>
<div class="comiis_minipost_mes bg_f b_ok f_c cl">
<textarea name="message" id="needmessage" placeholder="<?php echo $comiis_lang['all27'];?>..." class="comiis_pt bg_f"></textarea>
</div>	
<?php if($secqaacheck || $seccodecheck) { ?>
<div class="comiis_minipost_sec b_b cl"><?php include template('common/seccheck'); ?></div>
<?php } ?>	
<div class="comiis_post_ico comiis_minipost_ico f_b cl">
<input type="submit" value="<?php echo $comiis_lang['tip96'];?>" class="bg_0 f_f y formdialog" name="commentsubmit_btn" value="true" id="fastpostsubmit" comiis='handle'>
</div>
<?php if($article['idtype'] != 'tid') { ?>
<div id="comiis_post_tab">
<div class="comiis_bqbox comiis_wzsmiley bg_f b_ok b_t cl">
<div class="comiis_smiley_box">
<div class="bqbox_c comiis_portal_smiley"></div>
</div>
</div>
</div>
<?php } ?>
</form>
</div>
</div>
<?php } else { ?>
<form method="post" autocomplete="off" id="fastpostform" action="<?php echo $form_url;?>">
    <?php if(!empty($topicid) ) { ?>
        <input type="hidden" name="referer" value="<?php echo $topicurl;?>#comment" />
        <input type="hidden" name="topicid" value="<?php echo $topicid;?>">
    <?php } else { ?>
        <input type="hidden" name="portal_referer" value="<?php echo $viewurl;?>#comment">
        <input type="hidden" name="referer" value="<?php echo $viewurl;?>#comment" />
        <input type="hidden" name="id" value="<?php echo $article['id'];?>" />
        <input type="hidden" name="idtype" value="<?php echo $article['idtype'];?>" />
        <input type="hidden" name="aid" value="<?php echo $aid;?>">
    <?php } ?>
    <div class="comiis_head bg_e b_b">
        <div class="header_z"><a onclick="comiis_openrebox(0);"><i class="comiis_font f_d">&#xe639</i></a></div>
        <h2><?php echo $comiis_lang['reply'];?></h2>
        <div class="header_y"></div>
    </div>
    <div class="comiis_styli bg_f b_b cl">
        <textarea name="message" id="needmessage" placeholder="<?php echo $comiis_lang['all27'];?>..." class="comiis_pt bg_f comiis_mini_pt"></textarea>
    </div>	
<?php if($secqaacheck || $seccodecheck) { ?>
<div class="comiis_stylino comiis_minipost_sec bg_f b_b f_c cl"><?php include template('common/seccheck'); ?></div>
<?php } ?>
<div class="comiis_post_ico<?php if($comiis_app_switch['comiis_post_icotxt'] != 1) { ?> comiis_minipost_icot<?php } else { ?> comiis_minipost_ico<?php } ?> f_c cl">
<?php if($article['idtype'] != 'tid') { ?>
<a href="javascript:;"><i class="comiis_font">&#xe62e<em><?php echo $comiis_lang['tip260'];?></em></i></a>
    <?php } ?>
<input type="button" value="<?php echo $comiis_lang['reply'];?>" class="bg_0 f_f y formdialog" name="commentsubmit_btn" value="true" id="fastpostsubmit" comiis='handle'>
</div>
<?php if($article['idtype'] != 'tid') { ?>
<div id="comiis_post_tab">
<div class="comiis_bqbox bg_f b_b cl" style="display:none;">
<div class="comiis_smiley_box b_t">
<div class="bqbox_c comiis_portal_smiley"></div>
</div>
</div>
</div>
<?php } ?>
    <input type="hidden" name="formhash" value="<?php echo FORMHASH;?>">
    <input type="hidden" name="replysubmit" value="true">
    <input type="hidden" name="commentsubmit" value="true" />
</form>
<?php } ?>
<script type="text/javascript">
function succeedhandle_fastpostform(a, b, c){
if(b.indexOf("<?php echo $comiis_lang['tip27'];?>") >= 0){
$('#needmessage').val('')
$('.sec_code_img').trigger("click")
$.ajax({
type:'GET',
url: 'portal.php?mod=view&aid=<?php echo $aid;?>&inajax=1',
dataType:'xml',
}).success(function(s) {
if(s.lastChild.firstChild.nodeValue){
$('.comiis_plli').html(s.lastChild.firstChild.nodeValue);
}
});
comiis_openrebox(0);
b = '<?php echo $comiis_lang['tip28'];?>';
}else if(b.indexOf("<?php echo $comiis_lang['tip188'];?>") >= 0){
$('#needmessage').val('');
$('.sec_code_img').trigger("click");
comiis_openrebox(0);
b = '<?php echo $comiis_lang['tip28'];?>';
setTimeout(function() {
location.reload();
}, '1500');
}
popup.open(b, 'alert');
}
function errorhandle_fastpostform(a, b){
popup.open(a, 'alert');
}
<?php if($article['idtype'] != 'tid') { ?>
var comiis_smilies_array = [];
var comiis_portal_smiley = '<ul>';
for(i=1; i<31; i++) {
comiis_portal_smiley += '<li><a href="javascript:;" onclick="insertsmiley(\''+i+'\');"><img src="' + parent.STATICURL + 'image/smiley/comcom/'+i+'.gif" class="vm" /></a></li>';
if (typeof comiis_smilies_array[('[em:'+i+':]').length] != 'object') {
comiis_smilies_array[('[em:'+i+':]').length] = new Array();
}
comiis_smilies_array[('[em:'+i+':]').length].push('[em:'+i+':]')
}
comiis_smilies_array.reverse();
comiis_portal_smiley += '</ul>';
$('.comiis_portal_smiley').html(comiis_portal_smiley);

function insertsmiley(a){
$('#needmessage').comiis_insert('[em:'+a+':]');
}
$('#needmessage').on('keydown', function(event){
if(event.keyCode == "8") {
return $('#needmessage').comiis_delete();
}
});
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
<?php } ?>
</script>