<?php
//Discuz! cache file, DO NOT modify me!
//Created: Sep 29, 2018, 17:21
//Identify: b4959024fa64fc63eb88f35e9825cf63

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
?>
<script type="text/javascript">
(function() {
var form = $('#fastpostform');
<?php if($_G['uid'] && !$allowpostreply && (!$_G['uid'] && !((!$_G['forum']['postperm'] && $_G['group']['allowpost']) || ($_G['forum']['postperm'] && forumperm($_G['forum']['postperm']))))) { ?>
$('#needmessage').on('focus', function() {
<?php if(!$_G['uid']) { ?>
popup.open('<?php echo $comiis_lang['nologin_tip'];?>', 'confirm', 'member.php?mod=logging&action=login');
<?php } else { ?>
popup.open('<?php echo $comiis_lang['nopostreply'];?>', 'alert');
<?php } ?>
this.blur();
});
<?php } else { ?>
$('#needmessage').on('focus', function() {
var obj = $(this);
if(obj.attr('color') == 'gray') {
obj.removeClass('grey');
obj.attr('color', 'black');
$('#fastpostsubmitline').css('display', 'block');
}
})
.on('blur', function() {
var obj = $(this);
if(obj.attr('value') == '') {
obj.addClass('grey');
obj.attr('color', 'gray');
}
});
<?php } ?>
$('#fastpostsubmit').on('click', function() {
if(typeof comiis_prevent_post === "function") {
comiis_prevent_post('#fastpostsubmit', 1);
}
popup.open('<img src="' + IMGDIR + '/imageloading.gif" class="comiis_loading">');
var msgobj = $('#needmessage');
$.ajax({
type:'POST',
url:form.attr('action') + '&handlekey=fastpost&loc=1&inajax=1',
data:form.serialize(),
dataType:'xml'
})
.success(function(s) {
evalscript(s.lastChild.firstChild.nodeValue);
})
.error(function() {
window.location.href = form.attr('action');
popup.close();
});
return false;
});
$('#replyid').on('click', function() {
$(document).scrollTop($(document).height());
$('#needmessage')[0].focus();
});
})();
function succeedhandle_fastpost(locationhref, message, param) {
var pid = param['pid'];
var tid = param['tid'];
if(pid) {
$.ajax({
type:'POST',
url:'forum.php?mod=viewthread&tid=' + tid + '&viewpid=' + pid + '&mobile=2',
dataType:'xml'
})
.success(function(s) {
$('.comiis_sofa').css('display', 'none');
$('#post_new').append(s.lastChild.firstChild.nodeValue);
popup.open('<?php echo $comiis_lang['view9'];?>', 'alert');
$('.sec_code_img').click();
comiis_openrebox(0);
popup.init();
if(typeof comiis_prevent_post === "function") {
comiis_prevent_post('#fastpostsubmit', 0);
}
})
.error(function() {
window.location.href = 'forum.php?mod=viewthread&tid=' + tid;
popup.close();
});
} else {
if(!message) {
message = '<?php echo $comiis_lang['postreplyneedmod'];?>';
}
popup.open(message, 'alert');
if(typeof comiis_prevent_post === "function") {
comiis_prevent_post('#fastpostsubmit_btn', 0);
}
}
$('#needmessage').attr('value', '');
<?php if($_G['comiis_new'] > 1) { ?>
$("#imglist li[class!='up_btn']").remove();
comiis_picnum();
<?php } ?>
if(param['sechash']) {
$('.sec_code_img').click();
}
}
function errorhandle_fastpost(message, param) {
popup.open(message, 'alert');
if(typeof comiis_prevent_post === "function") {
comiis_prevent_post('#fastpostsubmit', 0);
}
}
</script>