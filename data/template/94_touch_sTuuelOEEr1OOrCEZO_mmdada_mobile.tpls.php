<?php
//Discuz! cache file, DO NOT modify me!
//Created: Sep 29, 2018, 17:49
//Identify: a8a8bc60a4e672f477aa49b84aa28dfd

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
?>
	<div class="comiis_tip comiis_input_style bg_f cl">
<form method="post" autocomplete="off" id="addform_<?php echo $tospace['uid'];?>" name="addform_<?php echo $tospace['uid'];?>" action="home.php?mod=spacecp&amp;ac=friend&amp;op=add&amp;uid=<?php echo $tospace['uid'];?>">
<input type="hidden" name="referer" value="<?php echo dreferer(); ?>" />
<input type="hidden" name="addsubmit" value="true" />
<?php if($_G['inajax']) { ?><input type="hidden" name="handlekey" value="<?php echo $_GET['handlekey'];?>" /><?php } ?>
<input type="hidden" name="formhash" value="<?php echo FORMHASH;?>" />
<div class="comiis_ratetop comiis_p5 bg_e b_b cl">
<a href="javascript:;" onclick="popup.close();" class="ratetop_close f_d"><i class="comiis_font">&#xe639</i></a>
<a href="home.php?mod=space&amp;uid=<?php echo $tospace['uid'];?>&amp;do=profile" class="show_big"><img src="<?php echo avatar($tospace[uid], middle, true);?>"></a>
<p class="f_b kmdbt"><?php echo $comiis_lang['all42'];?> <span class="f_0"><?php echo $tospace['username'];?></span> <?php echo $comiis_lang['all52'];?></p>
</div>
<ul class="comiis_p5 cl">
<li class="comiis_styli comiis_flex">
<div class="styli_tit"><?php echo $comiis_lang['all39'];?></div>
<div class="flex"><input type="text" name="note" placeholder="<?php echo $comiis_lang['tip14'];?>" class="comiis_input kmshow f_c b_b" style="padding:4px 0;" /></div>
</li>
<li class="comiis_styli comiis_flex">
<div class="styli_tit"><?php echo $comiis_lang['tip168'];?></div>
<div class="flex">
<div class="comiis_login_select comiis_inner b_ok">
<span class="inner">
<i class="comiis_font f_d">&#xe60c</i>
<span class="z">
<span class="comiis_question f_c" id="gid_name"></span>
</span>					
</span>
<select name="gid" id="gid" class="ps"><?php if(is_array($groups)) foreach($groups as $key => $value) { ?><option value="<?php echo $key;?>" <?php if(empty($space['privacy']['groupname']) && $key==1) { ?> selected="selected"<?php } ?>><?php echo $value;?></option>
<?php } ?>
</select>
</div>
</div>
</li>	
<li class="comiis_stylino mt10 mb12">
<button type="submit" name="addsubmit_btn" id="addsubmit_btn" class="formdialog comiis_btn bg_c f_f"><?php echo $comiis_lang['tip169'];?></button>
</li>
</ul>
<script type="text/javascript">comiis_input_style();</script>
</form>
</div>