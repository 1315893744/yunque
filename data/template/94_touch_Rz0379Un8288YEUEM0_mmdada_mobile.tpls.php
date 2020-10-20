<?php
//Discuz! cache file, DO NOT modify me!
//Created: Sep 29, 2018, 17:16
//Identify: 583e2da8c36e163da54ffbae206fad13

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
?>
<div class="comiis_tip bg_f cl">
<form method="post" autocomplete="off" id="form_report" name="form_report" action="misc.php?mod=report">
<div class="tip_tit bg_e f_b b_b" id="return_report"><?php echo $comiis_lang['all2'];?></div>
<div class="comiis_report_tip b_b f_g"><?php echo $comiis_lang['tip13'];?></div>
<dt class="kmlabs">	
<div class="tip_form">			
<div id="return_report">
<div id="report_reasons" class="f_b comiis_input_style comiis_tip_radios cl"></div>
<div class="mt5 mb5" id="report_other" style="display:none">
<li class="nop b_ok bg_e f_c cl"><textarea id="report_message" name="message" class="reasonarea comiis_pt f_c"></textarea></li>
</div>
</div>
<input type="hidden" name="referer" value="<?php echo dreferer(); ?>" />
<input type="hidden" name="reportsubmit" value="true" />
<input type="hidden" name="rtype" value="<?php echo $_GET['rtype'];?>" />
<input type="hidden" name="rid" value="<?php echo $_GET['rid'];?>" />
<?php if($_GET['fid']) { ?>
<input type="hidden" name="fid" value="<?php echo $_GET['fid'];?>" />
<?php } if($_GET['uid']) { ?>
<input type="hidden" name="uid" value="<?php echo $_GET['uid'];?>" />
<?php } ?>
<input type="hidden" name="url" value="<?php echo $_GET['url'];?>" />
<input type="hidden" name="inajax" value="<?php echo $_G['inajax'];?>" />
<?php if($_G['inajax']) { ?><input type="hidden" name="handlekey" value="report" /><?php } ?>
<input type="hidden" name="formhash" value="<?php echo FORMHASH;?>" />
</div>
</dt>
<dd class="b_t cl">
        <?php if($comiis_app_switch['comiis_post_btnwz'] == 1) { ?>
            <a href="javascript:popup.close();" class="tip_btn bg_f f_b"><?php echo $comiis_lang['close'];?></a>		
            <button type="submit" id="report_submit" class="formdialog tip_btn bg_f f_0" value="true" comiis='handle'><span class="tip_lx"><?php echo $comiis_lang['confirms'];?></span></button>
        <?php } else { ?>
            <button type="submit" id="report_submit" class="formdialog tip_btn bg_f f_0" value="true" comiis='handle'><?php echo $comiis_lang['confirms'];?></button>
            <a href="javascript:popup.close();" class="tip_btn bg_f f_b"><span class="tip_lx"><?php echo $comiis_lang['close'];?></span></a>
        <?php } ?>
</dd>
</form>	
</div>
<script type="text/javascript" reload="1">
var reasons = <?php echo $comiis_lang['report_reason_message'];?>;
var reasonstring = '';
for (i=0; i<reasons.length; i++) {
reasonstring += '<p><input type="radio" id="comiis_report_select_' + i + '" name="report_select" value="' + reasons[i] + '"><label for="comiis_report_select_' + i + '" onclick="comiis_report_other(\'' + (i < reasons.length -1 ? '0' : '1') + '\', \'' + reasons[i] + '\')"><i class="comiis_font f_d">&#xe646</i>' + reasons[i] + '</label></p>';
}
$('#report_reasons').html(reasonstring);
function comiis_report_other(a, b){
a == 0 ? $('#report_other').hide() : $('#report_other').show();
$('#report_message').val(b);
}
comiis_input_style();
function errorhandle_report(a, b){
popup.open(a, 'alert');
}
</script>