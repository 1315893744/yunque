<?php
//Discuz! cache file, DO NOT modify me!
//Created: Sep 29, 2018, 17:32
//Identify: 20f10c01f6b9b49d6f4ecccf0b8c1a61

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
?>
<div class="comiis_bianlun cl">	
<div class="comiis_bianlun_t cl">
<div class="cl">
<div class="y f_0"><em><?php echo $comiis_lang['view21'];?></em><span><?php echo 100 - $comiis_affirmvotes; ?>%</span></div>
<div class="z f_a"><span><?php echo $comiis_affirmvotes;?>%</span><em><?php echo $comiis_lang['view20'];?></em></div>
</div>	
<div class="votebg bg_0 cl">
<div class="bg_a" style="width:<?php echo $comiis_affirmvotes;?>%"></div>
</div>
</div>
<div class="comiis_bianlun_c cl">
<div class="bianlun_btn"><a href="<?php if($_G['uid']) { ?>forum.php?mod=misc&action=debatevote&tid=<?php echo $_G['tid'];?>&stand=1<?php } else { ?>member.php?mod=logging&action=login&mobile=2<?php } ?>" id="affirmbutton" class="<?php if($_G['uid']) { ?>dialog <?php } ?>bg_a f_f"><?php echo $comiis_lang['view19'];?><?php echo $comiis_lang['view20'];?> <em>(<?php echo $debate['affirmvotes'];?>)</em></a></div>
<div class="bianlun_vs f_d">vs</div>
<div class="bianlun_btn"><a href="<?php if($_G['uid']) { ?>forum.php?mod=misc&action=debatevote&tid=<?php echo $_G['tid'];?>&stand=2<?php } else { ?>member.php?mod=logging&action=login&mobile=2<?php } ?>" id="negabutton" class="<?php if($_G['uid']) { ?>dialog <?php } ?>bg_0 f_f"><?php echo $comiis_lang['view19'];?><?php echo $comiis_lang['view21'];?> <em>(<?php echo $debate['negavotes'];?>)</em></a></div>
</div>
<table cellspacing="0" cellpadding="0" class="comiis_bianlun_b">
<tr>
<td class="blzf b_r">
<div class="bl_guandian f_b cl">[<?php echo $comiis_lang['view20'];?>] <?php echo $debate['affirmpoint'];?></div>
<div class="bl_bianshou bg_b cl">
<h2><span class="f_a y"><a href="javascript:;" onclick="comiis_addre(1);"><?php echo $comiis_lang['view18'];?></a></span><span class="f_b"><?php echo $comiis_lang['tip197'];?>:<em><?php echo $debate['affirmdebaters'];?></em></span></h2>
<ul><?php if(is_array($debate['affirmavatars'])) foreach($debate['affirmavatars'] as $user) { ?><li><a title="<?php echo $user['author'];?>" href="home.php?mod=space&amp;uid=<?php echo $user['authorid'];?>&amp;do=profile"><?php echo $user['avatar'];?></a></li>
<?php } ?>
</ul>
</div>
</td>
<td class="blff">
<div class="bl_guandian f_b cl">[<?php echo $comiis_lang['view21'];?>] <?php echo $debate['negapoint'];?></div>
<div class="bl_bianshou bg_b cl">
<h2><span class="f_0 y"><a href="javascript:;" onclick="comiis_addre(2);"><?php echo $comiis_lang['view18'];?></a></span><span class="f_b"><?php echo $comiis_lang['tip197'];?>:<em><?php echo $debate['negadebaters'];?></em></span></h2>
<ul><?php if(is_array($debate['negaavatars'])) foreach($debate['negaavatars'] as $user) { ?><li><a title="<?php echo $user['author'];?>" href="home.php?mod=space&amp;uid=<?php echo $user['authorid'];?>&amp;do=profile"><?php echo $user['avatar'];?></a></li>
<?php } ?>
</ul>
</div>
</td>
</tr>
</table>
</div>
<script>
function comiis_addre(a){
if(a == 2){
$("#stand").val("2");
}else{
$("#stand").val("1");
}
   $(".comiis_input_style #stand").each(function(){
var obj = $(this);
$('#' + obj.attr('id') + '_name').text(obj.find('option:selected').text());
});
comiis_openrebox(1);
}
</script>