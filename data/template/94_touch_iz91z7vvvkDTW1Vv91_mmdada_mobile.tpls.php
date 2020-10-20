<?php
//Discuz! cache file, DO NOT modify me!
//Created: Sep 29, 2018, 17:31
//Identify: 17a86011184f5cfad3f54e3eafed5867

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
?>
<?php if($_G['forum']['status'] == 3 && helper_access::check_module('group') && $isgroupuser != 'isgroupuser') { if($_GET['inajax'] == 1) { ?>
<div class="comiis_tip comiis_tip_form bg_f cl">
<div class="tip_tit bg_e f_b b_b"><?php echo $comiis_lang['all14'];?></div>
<dl class="cl">
<div class="tip_minibox">
<li class="kmli f_c"><?php echo $comiis_lang['tip208'];?></li>
<li class="kmli b_t f_a cl"><a href="forum.php?mod=group&amp;action=join&amp;fid=<?php echo $_G['fid'];?>"><?php echo $comiis_lang['tip209'];?></a></li>
</div>		
</dl>
<dd class="b_t cl"><a href="javascript:;" onclick="popup.close();" class="tip_btn tip_all bg_f f_b"><span><?php echo $comiis_lang['tip210'];?></span></a></dd>
</div>
<?php } else { ?>
            <div class="comiis_quote bg_h">
                <?php echo $comiis_lang['tip208'];?><br><a href="forum.php?mod=group&amp;action=join&amp;fid=<?php echo $_G['fid'];?>" class="f_a"><?php echo $comiis_lang['tip209'];?></a>
</div>
<?php } } else { ?>	
<div id="activityjoin" class="comiis_actjoin bg_e b_ok cl" style="display:none">
<form name="activity" id="activity" method="post" autocomplete="off" action="forum.php?mod=misc&amp;action=activityapplies&amp;fid=<?php echo $_G['fid'];?>&amp;tid=<?php echo $_G['tid'];?>&amp;pid=<?php echo $post['pid'];?><?php if($_GET['from']) { ?>&amp;from=<?php echo $_GET['from'];?><?php } ?>&amp;mobile=2" >
<input type="hidden" name="formhash" value="<?php echo FORMHASH;?>" />
<h2 class="f_a b_b"><?php echo $comiis_lang['view13'];?></h2>
<div class="tip_minibox comiis_input_style">
<ul>
<?php if($_G['setting']['activitycredit'] && $activity['credit'] && !$applied) { ?>
<li class="kmli comiis_quote bg_h f_c"><?php echo $comiis_lang['tip211'];?> <?php echo $activity['credit'];?> <?php echo $_G['setting']['extcredits'][$_G['setting']['activitycredit']]['title'];?></li>
<?php } if($activity['cost']) { ?>
<li>
<span class="kml f_c"><?php echo $comiis_lang['tip212'];?></span>							
<input type="radio" value="0" name="payment" id="payment_0" checked="checked" />
<label for="payment_0"><i class="comiis_font f_0">&#xe645</i><?php echo $comiis_lang['tip213'];?></label>
<div style="clear:both;"></div>							
<input type="radio" value="1" name="payment" id="payment_1" />
<label for="payment_1"><i class="comiis_font f_d">&#xe646</i><?php echo $comiis_lang['tip214'];?> <input name="payvalue" size="3" class="comiis_px bg_f b_ok f_a" style="display:inline-block;height:22px;line-height:22px;width:75px;" /> <?php echo $comiis_lang['tip23'];?></label>
</li>
<?php } if(!empty($activity['ufield']['userfield'])) { if(is_array($activity['ufield']['userfield'])) foreach($activity['ufield']['userfield'] as $fieldid) { if($settings[$fieldid]['available']) { ?>
<li>
<span class="kml f_c"><?php echo $settings[$fieldid]['title'];?><em class="f_g">*</em></span><?php echo str_replace(array('class="px"', ' class="rq mtn"', 'class="ps"'), array('class="comiis_px bg_f b_ok kmshow"', '', 'class="bg_f b_ok"'), $htmls[$fieldid]);; ?></li>
<?php } } } if(!empty($activity['ufield']['extfield'])) { if(is_array($activity['ufield']['extfield'])) foreach($activity['ufield']['extfield'] as $extname) { ?><li>
<span class="kml f_c"><?php echo $extname;?></span>
<input type="text" name="<?php echo $extname;?>" maxlength="200" class="comiis_px bg_f b_ok kmshow" value="<?php if(!empty($ufielddata)) { ?><?php echo $ufielddata['extfield'][$extname];?><?php } ?>" />
</li>
<?php } } ?>
<li>
<span class="kml f_c"><?php echo $comiis_lang['all20'];?></span>
<textarea name="message" maxlength="200" cols="28" rows="1" class="comiis_pt bg_f b_ok kmshow"><?php echo $applyinfo['message'];?></textarea>
</li>
</ul>
</div>	
<div class="comiis_actjoin_btn cl">
<?php if($_G['setting']['activitycredit'] && $activity['credit'] && checklowerlimit(array('extcredits'.$_G['setting']['activitycredit'] => '-'.$activity['credit']), $_G['uid'], 1, 0, 1) !== true) { ?>
<p class="comiis_quote bg_h f_c"><?php echo $_G['setting']['extcredits'][$_G['setting']['activitycredit']]['title'];?> <?php echo $comiis_lang['tip215'];?><?php echo $activity['credit'];?></p>
<?php } else { ?>
<input type="hidden" name="activitysubmit" value="true">
<em id="return_activityapplies"></em>
<button type="submit" class="z comiis_actbtn bg_c f_f formdialog"><?php echo $comiis_lang['view14'];?></button>
<a href="javascript:;" class="z comiis_actbtn bg_c f_f comiis_acbms"><?php echo $comiis_lang['view16'];?></a>
<?php } ?>			
</div>
</form>
</div>
<script>
$('.comiis_acbm,.comiis_acbms').on('click', function() {
if($("#activityjoin").css("display") == 'none'){
$('.comiis_acbm').text('<?php echo $comiis_lang['view16'];?>');
$('#activityjoin').css('display', '');
}else{
$('.comiis_acbm').text('<?php echo $comiis_lang['view15'];?>');
$('#activityjoin').css('display', 'none');
}
});
</script>
<?php } ?>
