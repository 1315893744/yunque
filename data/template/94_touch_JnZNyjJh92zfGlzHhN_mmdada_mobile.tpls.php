<?php
//Discuz! cache file, DO NOT modify me!
//Created: Sep 29, 2018, 17:12
//Identify: 6f1a5bcb7c9427509238f32ef30e83ef

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
?>
<script src="<?php echo STATICURL;?>js/mobile/ajaxfileupload.js?<?php echo VERHASH;?>" type="text/javascript"></script>
<script src="template/comiis_app/comiis/js/buildfileupload.js?<?php echo VERHASH;?>" type="text/javascript"></script>
<script type="text/javascript">
var imgexts = typeof imgexts == 'undefined' ? 'jpg, jpeg, gif, png' : imgexts;
var STATUSMSG = {'-1' : '<?php echo $comiis_lang['uploadstatusmsgnag1'];?>', '0' : '<?php echo $comiis_lang['uploadstatusmsg0'];?>', '1' : '<?php echo $comiis_lang['uploadstatusmsg1'];?>', '2' : '<?php echo $comiis_lang['uploadstatusmsg2'];?>', '3' : '<?php echo $comiis_lang['uploadstatusmsg3'];?>', '4' : '<?php echo $comiis_lang['uploadstatusmsg4'];?>', '5' : '<?php echo $comiis_lang['uploadstatusmsg5'];?>', '6' : '<?php echo $comiis_lang['uploadstatusmsg6'];?>', '7' : '<?php echo $comiis_lang['uploadstatusmsg7'];?>(' + imgexts + ')', '8' : '<?php echo $comiis_lang['uploadstatusmsg8'];?>', '9' : '<?php echo $comiis_lang['uploadstatusmsg9'];?>', '10' : '<?php echo $comiis_lang['uploadstatusmsg10'];?>', '11' : '<?php echo $comiis_lang['uploadstatusmsg11'];?>'};
$(document).on('change', '#filedata', function(){
var comiis_file = new Array(); 
var comiis_fileon = 0;
var comiis_filelength = this.files.length;
if(comiis_filelength == 0){
return;
}
popup.open('<img src="' + IMGDIR + '/imageloading.gif" class="comiis_loading comiis_noloadimage">');	
uploadsuccess = function(data) {
comiis_fileon++;
var err = comiis_upload_success(data);
if(err == false){
return false;
}
if(comiis_fileon == comiis_filelength){
popup.close();
popup.open('<?php echo $comiis_lang['tip19'];?>', 'alert');
}		
};
uploaderror = function() {
comiis_fileon++;
popup.open('<?php echo $comiis_lang['uploadpicfailed'];?>', 'alert');
};
if(!(this.files[0].type == 'image/gif' && comiis_filelength == 1) && typeof FileReader != 'undefined' && this.files[0]) {
for (var i = 0; i < this.files.length; i++){
comiis_file[0] = this.files[i];
$.buildfileupload({
uploadurl:'<?php echo $comiis_upload_url;?>',
files:comiis_file,
uploadformdata:{<?php if($_G['basescript']=='portal') { ?>aid:'<?php echo $aid;?>',catid:'<?php echo $catid;?>',<?php } ?>uid:"<?php echo $_G['uid'];?>", hash:"<?php echo md5(substr(md5($_G[config][security][authkey]), 8).$_G[uid])?>"},
uploadinputname:'Filedata',
maxfilesize:"<?php echo $swfconfig['max'];?>",
success:uploadsuccess,
error:uploaderror
});
}
} else {
$.ajaxfileupload({
url:'<?php echo $comiis_upload_url;?>',
data:{uid:"<?php echo $_G['uid'];?>", hash:"<?php echo md5(substr(md5($_G[config][security][authkey]), 8).$_G[uid])?>"},
dataType:'text',
fileElementId:'filedata',
success:uploadsuccess,
error:uploaderror
});
}
});
</script>