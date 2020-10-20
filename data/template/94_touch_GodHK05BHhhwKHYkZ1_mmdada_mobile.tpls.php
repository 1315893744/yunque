<?php
//Discuz! cache file, DO NOT modify me!
//Created: Sep 29, 2018, 17:36
//Identify: 049ee54616d1badf6749a5836faff004

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
?>
	<script>
<?php if($_G['uid']) { ?>comiis_recommend_addkey();<?php } if($comiis_app_switch['comiis_listpage'] > 0 && $page == 1) { ?>
var comiis_page = <?php echo $page;?>;
var comiis_ispage = 0;
function comiis_list_page(){
comiis_ispage = 1;
comiis_page++;
if(comiis_page <= <?php echo $comiis_page;?>){
$('.comiis_multi_box').html('<div class="comiis_loadbtn f_d"><?php echo $comiis_lang['tip6'];?></div>');
$.ajax({
type:'GET',
url: 'forum.php?mod=forumdisplay&fid=<?php echo $_G['fid'];?>&action=list<?php echo $forumdisplayadd['page'];?><?php echo ($multiadd ? '&'.implode('&', $multiadd) : '');; ?><?php echo $multipage_archive;?>&page=' + comiis_page + '&inajax=1',
dataType:'xml',
}).success(function(s) {
if(typeof(s.lastChild.firstChild.nodeValue) != "undefined"){
$('#list_new').append(s.lastChild.firstChild.nodeValue);
<?php if($comiis_app_list_num == 10) { ?>
var comiis_pic_width = ($(window).width() - 34) / 2;
$(".comiis_waterfall li[class='bg_f b_ok']").css('width', (comiis_pic_width) + 'px');
imagesLoaded($('.comiis_waterfall'),function(){
$('#list_new').masonry('reload');
});
<?php } ?>			
if(comiis_page >= <?php echo $comiis_page;?>){
$('.comiis_multi_box').html('<div class="comiis_loadbtn f_d"><?php echo $comiis_lang['tip31'];?></div>');
}else{
$('.comiis_multi_box').html('<a href="javascript:;" onclick="comiis_list_page()" class="comiis_loadbtn<?php if($comiis_app_list_num == 7 || $comiis_app_list_num == 10) { ?> bg_f<?php } else { ?> bg_e<?php } ?> f_d"><?php echo $comiis_lang['tip5'];?></a>');
}
popup.init();
<?php if($_G['uid']) { ?>comiis_recommend_addkey();<?php } ?>
}else{
comiis_page--;
$('.comiis_multi_box').html('<a href="javascript:;" onclick="comiis_list_page()" class="comiis_loadbtn<?php if($comiis_app_list_num == 7 || $comiis_app_list_num == 10) { ?> bg_f<?php } else { ?> bg_e<?php } ?> f_d"><?php echo $comiis_lang['tip32'];?></a>');
}
comiis_ispage = 0;
}).error(function() {
comiis_page--;
$('.comiis_multi_box').html('<a href="javascript:;" onclick="comiis_list_page()" class="comiis_loadbtn<?php if($comiis_app_list_num == 7 || $comiis_app_list_num == 10) { ?> bg_f<?php } else { ?> bg_e<?php } ?> f_d"><?php echo $comiis_lang['tip32'];?></a>');
comiis_ispage = 0;
});
}
}
<?php if($comiis_app_switch['comiis_listpage'] == 2) { ?>
var comiis_page_timer;
$(window).scroll(function(){
clearTimeout(comiis_page_timer);
comiis_page_timer = setTimeout(function() {
var comiis_scroll_bottom = $(window).scrollTop() + $(window).height();
var comiis_list_bottom = $('#list_new').height() + $('#list_new').offset().top - 200;
if(comiis_scroll_bottom >= comiis_list_bottom && comiis_ispage == 0){
comiis_list_page();
}	
}, 200);
});
<?php } if($page < $comiis_page && $comiis_displayorder_num >= $_G['tpp']) { ?>
comiis_list_page();
<?php } } ?>
</script>