<?php
//Discuz! cache file, DO NOT modify me!
//Created: Sep 29, 2018, 17:23
//Identify: ca18b1f689c9584cd3a98d58ffd10e60

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
?>
<?php if($allowpostimg) { ?>
<li class="comiis_stylino comiis_flex">	
<div class="flex styli_tit f_c"><?php echo $comiis_lang['post_topic_image'];?></div>
<div class="styli_r comiis_editpic" style="margin:0;">
<ul>
<li class="up_btn comiis_flex">
<a class="bg_b b_ok f_c" href="javascript:;"><i class="comiis_font">&#xe627</i><?php if($activityattach['attachment']) { ?><?php echo $comiis_lang['update'];?><?php echo $comiis_lang['forum_recommend_image'];?><?php } else { ?><?php echo $comiis_lang['add'];?><?php echo $comiis_lang['forum_recommend_image'];?><?php } ?><input type="file" name="Filedatasss" id="filedatasss" class="kmshow" accept="image/*"></a>
</li>				
</ul>
</div>
</li>
<li class="comiis_stylino b_b cl">
<input type="hidden" name="activityaid" id="activityaid" <?php if($activityattach['attachment']) { ?>value="<?php echo $activityattach['aid'];?>" <?php } ?>/>
<input type="hidden" name="activityaid_url" id="activityaid_url" />
<a href="javascript:;" class="tebie_upimg cl">
<?php if($activityattach['attachment']) { ?>
<img src="<?php echo $activityattach['url'];?>/<?php if($activityattach['thumb']) { echo getimgthumbname($activityattach['attachment']);?><?php } else { ?><?php echo $activityattach['attachment'];?><?php } ?>" class="comiis_upimg vm" />
<?php } ?>
</a>
</li>
<?php } ?>
<?php if(!empty($_G['setting']['pluginhooks']['post_activity_extra'])) echo $_G['setting']['pluginhooks']['post_activity_extra'];?>
<script>
$(document).on('change', '#filedatasss', function() {
popup.open('<img src="' + IMGDIR + '/imageloading.gif" class="comiis_loading">');
uploadsuccess = function(data) {
if(data == '') {
popup.open('<?php echo $comiis_lang['uploadpicfailed'];?>', 'alert');
}
var dataarr = data.split('|');
if(dataarr[0] == 'DISCUZUPLOAD' && dataarr[2] == 0) {
popup.close();
$('#activityaid').val(dataarr[3]);
$('#activityaid_url').val('<?php echo $activityattach['url'];?>/' + dataarr[5]);
$('.tebie_upimg').html('<img src="<?php echo $_G['setting']['attachurl'];?>forum/'+dataarr[5]+'" class="comiis_upimg vm" />');
} else {
var sizelimit = '';
if(dataarr[7] == 'ban') {
sizelimit = '<?php echo $comiis_lang['uploadpicatttypeban'];?>';
} else if(dataarr[7] == 'perday') {
sizelimit = '<?php echo $comiis_lang['donotcross'];?>'+Math.ceil(dataarr[8]/1024)+'K)';
} else if(dataarr[7] > 0) {
sizelimit = '<?php echo $comiis_lang['donotcross'];?>'+Math.ceil(dataarr[7]/1024)+'K)';
}
popup.open(STATUSMSG[dataarr[2]] + sizelimit, 'alert');
return false;
}
};
if(typeof FileReader != 'undefined' && this.files[0]) {
$.buildfileupload({
uploadurl:'misc.php?mod=swfupload&operation=upload&type=image&inajax=yes&infloat=yes&simple=2',
files:this.files,
uploadformdata:{uid:"<?php echo $_G['uid'];?>", hash:"<?php echo md5(substr(md5($_G[config][security][authkey]), 8).$_G[uid])?>"},
uploadinputname:'Filedata',
maxfilesize:"<?php echo $swfconfig['max'];?>",
success:uploadsuccess,
error:function() {
popup.open('<?php echo $comiis_lang['uploadpicfailed'];?>', 'alert');
}
});
} else {
$.ajaxfileupload({
url:'misc.php?mod=swfupload&operation=upload&type=image&inajax=yes&infloat=yes&simple=2',
data:{uid:"<?php echo $_G['uid'];?>", hash:"<?php echo md5(substr(md5($_G[config][security][authkey]), 8).$_G[uid])?>"},
dataType:'text',
fileElementId:'filedata',
success:uploadsuccess,
error: function() {
popup.open('<?php echo $comiis_lang['uploadpicfailed'];?>', 'alert');
}
});
}
});
</script>