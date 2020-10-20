<?php
//Discuz! cache file, DO NOT modify me!
//Created: Sep 29, 2018, 17:24
//Identify: b895def42400b90f62c765194fbf450c

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
?>
<li class="comiis_stylitit b_b bg_e f_c"><?php echo $comiis_lang['debate_square_point'];?> <span class="f_g">*</span></li>	
<li class="comiis_styli">
<textarea name="affirmpoint" id="affirmpoint" class="comiis_pt"><?php echo $debate['affirmpoint'];?></textarea>
</li>
<li class="comiis_stylitit b_t b_b bg_e f_c"><?php echo $comiis_lang['debate_opponent_point'];?> <span class="f_g">*</span></li>	
<li class="comiis_styli">
<textarea name="negapoint" id="negapoint" class="comiis_pt"><?php echo $debate['negapoint'];?></textarea>
</li>
<li class="styli_h bg_e b_t b_b"></li>
<li class="comiis_styli comiis_flex b_b">
<div class="styli_tit f_c"><?php echo $comiis_lang['endtime'];?></div>
<div class="flex"><input type="text" name="endtime" id="endtime" class="comiis_input kmshow comiis_dateshow" autocomplete="off" value="<?php echo $debate['endtime'];?>" readonly="readonly" /></div>
<div class="styli_r"><a href="javascript:;" onclick="$('.comiis_dateshow').val('');"><i class="comiis_font f_g">&#xe647</i></a></div>
</li>
<li class="comiis_styli comiis_flex b_b">
<div class="styli_tit f_c"><?php echo $comiis_lang['post6'];?><?php echo $comiis_lang['debate_umpire'];?></div>
<div class="flex"><input type="text" name="umpire" id="umpire" class="comiis_input kmshow" value="<?php echo $debate['umpire'];?>" placeholder="<?php echo $comiis_lang['post15'];?><?php echo $comiis_lang['debate_umpire'];?><?php echo $comiis_lang['username'];?>" /></div>
</li>