<?php
//Discuz! cache file, DO NOT modify me!
//Created: Sep 29, 2018, 17:55
//Identify: fc8a9393575cb13a6381a433a3634c00

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
?>
<?php if(empty($showtype) || $showtype == 'thread') { if($threadlist) { if(!$_GET['inajax'] && $_G['uid']) { ?>
<script>var formhash = '<?php echo FORMHASH;?>', allowrecommend = '<?php echo $_G['group']['allowrecommend'];?>';</script>
<script src="template/comiis_app/comiis/js/comiis_forumdisplay.js?<?php echo VERHASH;?>" type="text/javascript"></script>
<?php } $comiis_list_template = 'default_t_style'; include_once DISCUZ_ROOT.'./template/comiis_app/comiis/php/comiis_list.php';?><?php if(empty($showtype)) { ?>
<div class="comiis_forumlist cl">
<ul>			
<li><a href="misc.php?mod=tag&amp;id=<?php echo $id;?>&amp;type=thread" class="comiis_loadbtn bg_f b_ok f_c"><?php echo $comiis_lang['tip53'];?>...</a></li>
</ul>
</div>
<?php } else { if(!$_GET['inajax']) { if($comiis_app_list_num != 10) { ?><div id="list_new"></div><?php } $comiis_page = ceil($count/$tpp);?><div class="comiis_multi_box bg_f b_t" style="margin-top:10px;">
<?php if($multipage && ($comiis_app_switch['comiis_listpage'] == 0 || $page > 1)) { ?>
<?php echo $multipage;?>
<?php } elseif($comiis_app_switch['comiis_listpage'] == 1 && $page < $comiis_page) { ?>
<a href="javascript:;" onclick="comiis_list_page()" class="comiis_loadbtn bg_e f_d"><?php echo $comiis_lang['tip5'];?></a>
<?php } elseif($comiis_app_switch['comiis_listpage'] == 2 && $page < $comiis_page) { ?>
<div class="comiis_loadbtn f_d"><?php echo $comiis_lang['tip6'];?></div>
<?php } elseif($comiis_app_switch['comiis_listpage'] && $comiis_page == 1 && $count > 4) { ?>
<div class="comiis_loadbtn f_d"><?php echo $comiis_lang['tip31'];?></div>
<?php } ?>
</div>
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
url: 'misc.php?mod=tag&id=<?php echo $id;?>&type=thread&page=' + comiis_page + '&inajax=1',
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
$('.comiis_multi_box').html('<a href="javascript:;" onclick="comiis_list_page()" class="comiis_loadbtn bg_e f_d"><?php echo $comiis_lang['tip5'];?></a>');
}
popup.init();
<?php if($_G['uid']) { ?>comiis_recommend_addkey();<?php } ?>
}else{
comiis_page--;
$('.comiis_multi_box').html('<a href="javascript:;" onclick="comiis_list_page()" class="comiis_loadbtn bg_e f_d"><?php echo $comiis_lang['tip32'];?></a>');
}
comiis_ispage = 0;
}).error(function() {
comiis_page--;
$('.comiis_multi_box').html('<a href="javascript:;" onclick="comiis_list_page()" class="comiis_loadbtn bg_e f_d"><?php echo $comiis_lang['tip32'];?></a>');
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
<?php } } ?>
</script>
<?php } } } elseif(!$_GET['inajax']) { ?>
<div class="comiis_forumlist cl">
<ul>		
<li class="comiis_notip mt12 cl">
<i class="comiis_font f_e cl">&#xe613</i><span class="f_d"><?php echo $comiis_lang['tip137'];?></span>
</li>
</ul>
</div>
<?php } } if(helper_access::check_module('blog') && (empty($showtype) || $showtype == 'blog')) { ?>
<div class="cl">
<ul>
<?php if($bloglist) { ?>
<li class="cl">
<div class="comiis_bloglist b_t mt10 cl">
<ul><?php if(is_array($bloglist)) foreach($bloglist as $blog) { ?><li class="bg_f b_b">
<a href="home.php?mod=space&amp;uid=<?php echo $blog['uid'];?>&amp;do=profile" class="blog_avt"><?php echo avatar($blog[uid],small);?></a>
<div class="blog_tit">
<a href="home.php?mod=space&amp;uid=<?php echo $blog['uid'];?>&amp;do=blog&amp;id=<?php echo $blog['blogid'];?>"><?php echo $blog['subject'];?></a>					
</div>
<div class="blog_user">
<?php if($blog['hot']) { ?><span class="f_wb y"><i class="comiis_font">&#xe64e</i><em><?php echo $blog['hot'];?></em></span><?php } ?>
<span class="f_d y"><i class="comiis_font">&#xe63a</i><em><?php echo $blog['viewnum'];?></em></span>
<span class="f_d y"><i class="comiis_font">&#xe679</i><em><?php echo $blog['replynum'];?></em></span>					
<a href="home.php?mod=space&amp;uid=<?php echo $blog['uid'];?>&amp;do=profile" class="f_0"><?php echo $blog['username'];?></a>
<span class="f_d"><?php echo $blog['dateline'];?></span>
</div>
<div class="blog_mes f_c cl">
<a href="home.php?mod=space&amp;uid=<?php echo $blog['uid'];?>&amp;do=blog&amp;id=<?php echo $blog['blogid'];?>">
<?php if($blog['pic']) { ?><div class="blog_img"><img src="<?php echo $blog['pic'];?>" alt="<?php echo $blog['subject'];?>" class="vm" /></div><?php } echo cutstr(strip_tags($blog['message']),120); ?></a>
</div>
</li>
<?php } ?>
</ul>
</div>
</li>
<?php if(empty($showtype)) { ?>
<li><a href="misc.php?mod=tag&amp;id=<?php echo $id;?>&amp;type=blog" class="comiis_loadbtn bg_f b_ok f_c"><?php echo $comiis_lang['tip53'];?>...</a></li>
<?php } else { if($multipage) { ?><?php echo $multipage;?><?php } } } else { ?>
<li class="comiis_notip mt12 cl">
<i class="comiis_font f_e cl">&#xe613</i>
<span class="f_d"><?php echo $comiis_lang['tip137'];?></span>
</li>
<?php } ?>
</ul>
</div>
<?php } ?>