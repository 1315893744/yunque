<?php
//Discuz! cache file, DO NOT modify me!
//Created: Sep 29, 2018, 17:36
//Identify: b0e05e6cddcb9512aa8f37de14412379

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
?>
<script>
function comiis_parentid(url) {
$.ajax({
type:'GET',
url: url + '&inajax=1' ,
dataType:'xml',
}).success(function(s) {
if(s.lastChild.firstChild.nodeValue){
$('#secondgroup').html('<li class="comiis_styli comiis_flex b_b"><div class="styli_tit f_c"><?php echo $comiis_group_lang['011'];?> <span class="f_g">*</span></div><div class="flex comiis_input_style"><div class="comiis_login_select"><span class="inner"><i class="comiis_font f_d">&#xe60c</i><span class="z"><span class="comiis_question" id="fup_name"></span></span></span>'+s.lastChild.firstChild.nodeValue+'</div></div></li>');
}else{
$('#secondgroup').html('');
}
comiis_input_style();
});
}
<?php if($_GET['fupid']) { ?>
comiis_parentid('forum.php?mod=ajax&action=secondgroup&fupid=<?php echo $_GET['fupid'];?><?php if($_GET['groupid']) { ?>&groupid=<?php echo $_GET['groupid'];?><?php } ?>');
<?php } ?>
function succeedhandle_comiis_group_handles(a, b, c) {
b = b.replace(/<?php echo $comiis_lang['post47'];?>/g, '<?php echo $comiis_group_lang['001'];?>');
popup.open(b, 'alert');
}
function errorhandle_comiis_group_handles(a, b){
a = a.replace(/<?php echo $comiis_lang['post47'];?>/g, '<?php echo $comiis_group_lang['001'];?>');
popup.open(a, 'alert');
}
</script>