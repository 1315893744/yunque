<?php
//Discuz! cache file, DO NOT modify me!
//Created: Sep 29, 2018, 17:20
//Identify: 2651bfb7d6493ab482cffc3b8bc2cb47

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
?>
<script type="text/javascript">
function comiis_upload_success(data){
if(data == '') {
popup.open('<?php echo $comiis_lang['uploadpicfailed'];?>', 'alert');
}
var dataarr = data.split('|');
if(dataarr[0] == 'DISCUZUPLOAD' && dataarr[2] == 0) {
popup.close();
$('#imglist').append('<li><span aid="'+dataarr[3]+'" class="del"><a href="javascript:;"><i class="comiis_font f_g">&#xe648</i></a></span><span class="p_img"><a href="javascript:;"><img style="height:54px;width:54px;" id="aimg_'+dataarr[3]+'" title="'+dataarr[6]+'" src="<?php echo $_G['setting']['attachurl'];?>forum/'+dataarr[5]+'" class="vm b_ok comiis_noloadimage" /></a></span><input type="hidden" name="attachnew['+dataarr[3]+'][description]" /></li>');
comiis_picnum();
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
}
<?php if(0 && $_G['setting']['mobile']['geoposition']) { ?>
geo.getcurrentposition();
<?php } ?>	
var form = $('#postform');
$('.comiis_postbtn').on('click', function() {
var obj = $(this);
if(obj.attr('disable') == 'true') {
return false;
}
$('.comiis_postbtn').attr('disable', 'true').removeClass('bg_c f_f').addClass('bg_0 f_f');
$('.comiis_btn_pn').removeClass('bg_f f_0').addClass('bg_0 f_f');
popup.open('<img src="' + IMGDIR + '/imageloading.gif" class="comiis_loading">');
var postlocation = '';
if(geo.errmsg === '' && geo.loc) {
postlocation = geo.longitude + '|' + geo.latitude + '|' + geo.loc;
}
$.ajax({
type:'POST',
url:form.attr('action') + '&geoloc=' + postlocation + '&handlekey='+form.attr('id')+'&inajax=1',
data:form.serialize(),
dataType:'xml'
})
.success(function(s) {
popup.open(s.lastChild.firstChild.nodeValue);
})
.error(function() {
popup.open('<?php echo $comiis_lang['networkerror'];?>', 'alert');
});
return false;
});
$(document).on('click', '.del', function() {
var obj = $(this);
$.ajax({
type:'GET',
url:'forum.php?mod=ajax&action=deleteattach&inajax=yes&aids[]=' + obj.attr('aid') + (obj.attr('up') == 1 ? '&tid=<?php echo $postinfo['tid'];?>&pid=<?php echo $postinfo['pid'];?>' : ''),
})
.success(function(s) {
obj.parent().remove();
comiis_picnum();
})
.error(function() {
popup.open('<?php echo $comiis_lang['networkerror'];?>', 'alert');
});
return false;
});
</script>