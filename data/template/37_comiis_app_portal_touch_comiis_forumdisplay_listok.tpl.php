<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); if($in_comiis_app != 1 || $comiis_index_applist == 0) { if(!$subforumonly) { ?>
<div class="comiis_app_forumlist djsz cl">
<ul>
<?php if(count($_G['forum_threadlist'])) { if(is_array($_G['forum_threadlist'])) foreach($_G['forum_threadlist'] as $key => $thread) { if($thread['moved']) { $thread[tid]=$thread[closed];?><?php } ?><?php
$comiis_ztfl = <<<EOF


EOF;
 if($thread['digest'] > 0) { 
$comiis_ztfl .= <<<EOF

<span class="bg_c f_f">{$comiis_app_portal_lang['thread_digest']}</span>

EOF;
 } elseif($thread['folder'] == 'lock') { 
$comiis_ztfl .= <<<EOF

<span class="bg_del f_f">{$comiis_app_portal_lang['close']}</span>

EOF;
 } elseif($thread['special'] == 1) { 
$comiis_ztfl .= <<<EOF

<span class="bg_0 f_f">{$comiis_app_portal_lang['thread_poll']}</span>

EOF;
 } elseif($thread['special'] == 2) { 
$comiis_ztfl .= <<<EOF

<span class="bg_0 f_f">{$comiis_app_portal_lang['thread_trade']}</span>

EOF;
 } elseif($thread['special'] == 3) { 
$comiis_ztfl .= <<<EOF

<span class="bg_0 f_f">{$comiis_app_portal_lang['thread_reward']}</span>

EOF;
 } elseif($thread['special'] == 4) { 
$comiis_ztfl .= <<<EOF

<span class="bg_0 f_f">{$comiis_app_portal_lang['thread_activity']}</span>

EOF;
 } elseif($thread['special'] == 5) { 
$comiis_ztfl .= <<<EOF

<span class="bg_0 f_f">{$comiis_app_portal_lang['thread_debate']}</span>

EOF;
 } if($rushreply) { 
$comiis_ztfl .= <<<EOF
<span class="bg_a f_f">{$comiis_app_portal_lang['rushreply']}</span>
EOF;
 } 
$comiis_ztfl .= <<<EOF


EOF;
?>
<li class="comiis_uomj bg_f b_b">
<div class="<?php if(!$comiis_pic_list[$thread['tid']]['num']) { ?>forumlist_noimg<?php } elseif($comiis_pic_list[$thread['tid']]['num'] < 3) { ?>forumlist_one<?php } else { ?>forumlist_imgs<?php } ?>">
<a href="forum.php?mod=viewthread&amp;tid=<?php echo $thread['tid'];?>">
<?php if($thread['attachment'] == 2 && ($comiis_pic_list[$thread['tid']]['num'] == 1 || $comiis_pic_list[$thread['tid']]['num'] == 2)) { ?>
<div class="forumlist_imga"><img <?php if($comiis_app_switch['comiis_loadimg']) { ?>src="./template/comiis_app/pic/none.png" comiis_loadimages=<?php } else { ?>src=<?php } ?>
"<?php echo getforumimg($comiis_pic_list[$thread['tid']]['aid']['0'], '0', '200', '150'); ?>"<?php if($comiis_app_switch['comiis_loadimg']) { ?> class="comiis_loadimages"<?php } ?>></div>
<?php } if($thread['attachment'] == 2 && $comiis_pic_list[$thread['tid']]['num'] >= 3) { ?>
<h2 <?php echo $thread['highlight'];?>><?php if(!$comiis_open_displayorder && in_array($thread['displayorder'], array(1, 2, 3, 4))) { ?><span class="bg_del f_f"><?php echo $comiis_app_portal_lang['thread_stick'];?></span><?php } ?><?php echo $comiis_ztfl;?><?php if($thread['icon'] >= 0) { ?><span class="comiis_xifont f_g"><?php echo $_G['cache']['stamps'][$thread['icon']]['text'];?></span><?php } if($thread['sortid'] && !empty($_G['forum']['threadsorts']['prefix'])) { ?><span class="bg_0 f_f"><?php echo $_G['forum']['threadsorts']['types'][$thread['sortid']];?></span><?php } ?><?php echo $thread['subject'];?></h2>
<div class="listimgs">
<ul><?php if(is_array($comiis_pic_list[$thread['tid']]['aid'])) foreach($comiis_pic_list[$thread['tid']]['aid'] as $temp) { ?><li><img <?php if($comiis_app_switch['comiis_loadimg']) { ?>src="./template/comiis_app/pic/none.png" comiis_loadimages=<?php } else { ?>src=<?php } ?>
"<?php echo getforumimg($temp, '0', '200', '160'); ?>"<?php if($comiis_app_switch['comiis_loadimg']) { ?> class="comiis_loadimages"<?php } ?>></li>
<?php } ?>
</ul>
</div>
<?php } else { ?>
<div class="forumlist_info<?php if($thread['attachment'] == 2) { ?> forumlist_infoa<?php } else { ?> forumlist_infob<?php } ?>">
<h2 <?php echo $thread['highlight'];?>><?php if(!$comiis_open_displayorder && in_array($thread['displayorder'], array(1, 2, 3, 4))) { ?><span class="bg_del f_f"><?php echo $comiis_app_portal_lang['thread_stick'];?></span><?php } ?><?php echo $comiis_ztfl;?><?php if($thread['icon'] >= 0) { ?><span class="comiis_xifont f_g"><?php echo $_G['cache']['stamps'][$thread['icon']]['text'];?></span><?php } if($thread['sortid'] && !empty($_G['forum']['threadsorts']['prefix'])) { ?><span class="bg_0 f_f"><?php echo $_G['forum']['threadsorts']['types'][$thread['sortid']];?></span><?php } ?><?php echo $thread['subject'];?></h2>
</div>
<?php } ?>						
<div class="forumlist_bottom f_d"><em class="y"><?php echo $thread['views'];?><?php echo $comiis_app_portal_lang['271'];?></em><span><?php if($thread['author']) { ?><?php echo $thread['author'];?><?php } else { ?><?php echo $_G['setting']['anonymoustext'];?><?php } ?></span><?php echo $thread['dateline'];?></div>
</a>
</div>	
</li>
<?php } } else { ?>
<li class="comiis_app_nolist bg_f b_b cl">
<i class="comiis_font f_e cl">&#xe613</i>
<span class="f_d"><?php echo $comiis_app_portal_lang['75'];?></span>
</li>
<?php } ?>
</ul>
</div>
<?php } } if($page == 1) { if($comiis_app_list_num != 10) { ?><div id="list_new"></div><?php } ?>
<div class="comiis_multi_box nalg bg_f b_t" style="margin-top:10px;">
<?php if($comiis_data['comiispages'] == 0 && $page < $comiis_page) { ?>
<a href="javascript:;" onclick="comiis_list_page()" class="comiis_loadbtn bg_e f_d"><?php echo $comiis_app_portal_lang['83'];?></a>
<?php } elseif($comiis_data['comiispages'] == 1 && $page < $comiis_page) { ?>
<div class="comiis_loadbtn f_d"><?php echo $comiis_app_portal_lang['84'];?></div>
<?php } elseif($comiis_page == 1 && $num > 4) { ?>
<div class="comiis_loadbtn f_d"><?php echo $comiis_app_portal_lang['85'];?></div>
<?php } ?>
</div>
<script>
var comiis_page_gkqu = <?php echo $page;?>;
var comiis_ispage = 0;
function comiis_list_page(){
comiis_ispage = 1;
if(comiis_page_gkqu < <?php echo $comiis_page;?>){
$('.comiis_multi_box').html('<div class="comiis_loadbtn f_d"><?php echo $comiis_app_portal_lang['84'];?></div>');
$.ajax({
type:'GET',
url: 'plugin.php?id=comiis_app_portal&pid=<?php echo $_GET['pid'];?>&page=' + (comiis_page_gkqu + 1) + '&inajax=1',
dataType:'xml',
}).success(function(s) {
comiis_page_gkqu++;
if(typeof(s.lastChild.firstChild.nodeValue) != "undefined"){
$('#list_new').append(s.lastChild.firstChild.nodeValue);
<?php if($comiis_app_list_num == 10) { ?>
var comiis_pic_width = ($(window).width() - 34) / 2;
$(".comiis_waterfall li[class='bg_f b_ok']").css('width', (comiis_pic_width) + 'px');
imagesLoaded($('.comiis_waterfall'),function(){
$('#list_new').masonry('reload');
});
<?php } ?>
if(comiis_page_gkqu >= <?php echo $comiis_page;?>){
$('.comiis_multi_box').html('<div class="comiis_loadbtn f_d"><?php echo $comiis_app_portal_lang['85'];?></div>');
}else{
$('.comiis_multi_box').html('<a href="javascript:;" onclick="comiis_list_page()" class="comiis_loadbtn bg_e f_d"><?php echo $comiis_app_portal_lang['83'];?></a>');
}
}else{
comiis_page_gkqu--;
$('.comiis_multi_box').html('<a href="javascript:;" onclick="comiis_list_page()" class="comiis_loadbtn bg_e f_d"><?php echo $comiis_app_portal_lang['86'];?></a>');
}
comiis_ispage = 0;
}).error(function() {
comiis_page_gkqu--;
$('.comiis_multi_box').html('<a href="javascript:;" onclick="comiis_list_page()" class="comiis_loadbtn bg_e f_d"><?php echo $comiis_app_portal_lang['86'];?></a>');
comiis_ispage = 0;
});
}else{
$('.comiis_multi_box').html('<div class="comiis_loadbtn f_d"><?php echo $comiis_app_portal_lang['85'];?></div>');
}
}
var comiis_regdata_page = 'comiis_page_gkqu', comiis_regdata_dataid = ['#list_new'];
<?php if($comiis_data['comiispages'] == 1) { ?>
var comiis_page_timer_uomj;
$(window).scroll(function(){
<?php if($comiis_data['header'] == '1') { ?>
if(typeof(comiis_page_start) == "undefined"){
var comiis_page_start = 1;
}
if(comiis_page_start == 0){
return;
}
<?php } ?>
clearTimeout(comiis_page_timer_uomj);
comiis_page_timer_uomj = setTimeout(function() {
var comiis_scroll_bottom = $(window).scrollTop() + $(window).height();
var comiis_list_bottom = $('#list_new').height() + $('#list_new').offset().top - 200;
if(comiis_scroll_bottom >= comiis_list_bottom && comiis_ispage == 0){
comiis_list_page();
}	
}, 200);
});
<?php } ?>
</script>
<?php } ?>
