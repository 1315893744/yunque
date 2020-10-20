<?php
//Discuz! cache file, DO NOT modify me!
//Created: Sep 29, 2018, 17:35
//Identify: 2a962ada1934e09442b35b1501061daf

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
?>
	<?php if($status == 'isgroupuser') { ?>	  
<div id="comiis_group_out" style="display:none;">
<div class="comiis_tip bg_f cl">
<dt class="f_b">
<p><?php echo $comiis_lang['post44'];?><?php echo $comiis_group_lang['013'];?><?php echo $comiis_group_lang['001'];?>?</p>
</dt>	
<dd class="b_t cl">
                    <?php if($comiis_app_switch['comiis_post_btnwz'] == 1) { ?>
                        <a href="javascript:popup.close()" class="tip_btn bg_f f_b"><?php echo $comiis_lang['cancel'];?></a>
                        <a href="forum.php?mod=group&amp;action=out&amp;fid=<?php echo $_G['fid'];?>&amp;handlekey=comiis_group_handle" class="dialog tip_btn bg_f f_0" comiis='handle'><span class="tip_lx"><?php echo $comiis_lang['all8'];?></span></a>	
                    <?php } else { ?>
                        <a href="forum.php?mod=group&amp;action=out&amp;fid=<?php echo $_G['fid'];?>&amp;handlekey=comiis_group_handle" class="dialog tip_btn bg_f f_0" comiis='handle'><?php echo $comiis_lang['all8'];?></a>
                        <a href="javascript:popup.close()" class="tip_btn bg_f f_b"><span class="tip_lx"><?php echo $comiis_lang['cancel'];?></span></a>
                    <?php } ?>
</dd>
</div>
</div>
<?php } ?>	
<script>
function succeedhandle_comiis_group_handle(a, b, c) {
b = b.replace(/<?php echo $comiis_lang['post47'];?>/g, '<?php echo $comiis_group_lang['001'];?>');
popup.open(b, 'alert');
setTimeout(function() {
location.reload();
}, '2000');
}	
function errorhandle_comiis_group_handle(a, b){
a = a.replace(/<?php echo $comiis_lang['post47'];?>/g, '<?php echo $comiis_group_lang['001'];?>');
popup.open(a, 'alert');
setTimeout(function() {
location.reload();
}, '2000');
}
$(window).scroll(function(){
        if($(window).scrollTop() > 100){
            $('.comiis_space_head').addClass('bg_0');
        }else{
            $('.comiis_space_head').removeClass('bg_0');
        }
    });	
</script>