<?php
//Discuz! cache file, DO NOT modify me!
//Created: Sep 29, 2018, 17:47
//Identify: 182bd3730a42820bc102f0beb93cfffe

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
?>
		<div class="comiis_wzpost bg_f b_t mt15 cl">
<li class="comiis_styli comiis_flex b_b">
<div class="styli_tit f_c"><?php echo $comiis_lang['tip149'];?></div>
<div class="flex"><input type="text" id="albumname" name="albumname" value="<?php echo $album['albumname'];?>" class="comiis_input" /></div>
</li>
<li class="comiis_stylitit b_b bg_e f_c"><?php echo $comiis_lang['tip150'];?></li>	
<li class="comiis_styli b_b cl">
<textarea name="depict" id="depict"  class="comiis_pt"><?php echo $album['depict'];?></textarea>
</li>
<?php if($categoryselect) { ?>
<li class="comiis_styli comiis_flex b_b">
<div class="styli_tit f_c"><?php echo $comiis_lang['tip151'];?></div>
<div class="flex comiis_input_style">
<div class="comiis_login_select">
<span class="inner">
<i class="comiis_font f_d">&#xe60c</i>
<span class="z">
<span class="comiis_question" id="catid_name"></span>
</span>					
</span>
<?php echo $categoryselect;?>
</div>	
</div>
</li> 
<?php } ?>
<li class="comiis_styli comiis_flex b_b">
<div class="styli_tit f_c"><?php echo $comiis_lang['tip152'];?></div>
<div class="flex comiis_input_style">
<div class="comiis_login_select">
<span class="inner">
<i class="comiis_font f_d">&#xe60c</i>
<span class="z">
<span class="comiis_question" id="friend_name"></span>
</span>					
</span>
<select id="friend" name="friend" onchange="passwordShow(this.value);">
<option value="0"<?php echo $friendarr['0'];?>><?php echo $comiis_lang['tip153'];?></option>
<option value="1"<?php echo $friendarr['1'];?>><?php echo $comiis_lang['tip154'];?></option>
<option value="2"<?php echo $friendarr['2'];?>><?php echo $comiis_lang['tip155'];?></option>
<option value="3"<?php echo $friendarr['3'];?>><?php echo $comiis_lang['tip156'];?></option>
<option value="4"<?php echo $friendarr['4'];?>><?php echo $comiis_lang['tip157'];?></option>
</select>
</div>	
</div>
</li> 
<li class="comiis_styli b_b cl" id="span_password" style="<?php echo $passwordstyle;?>">
<input type="text" name="password" value="<?php echo $album['password'];?>" class="comiis_input" placeholder="!password!(<?php echo $comiis_lang['tip106'];?>)" />
</li>			
<div id="tb_selectgroup" style="<?php echo $selectgroupstyle;?>">
<li class="comiis_styli b_b">
<div class="comiis_input_style">
<div class="comiis_login_select">
<span class="inner">
<i class="comiis_font f_d">&#xe60c</i>
<span class="z">
<span class="comiis_question" id="selectgroup_name"></span>
</span>					
</span>
<select name="selectgroup" id="selectgroup" onchange="getgroup(this.value);">
<option value=""><?php echo $comiis_lang['tip158'];?></option><?php if(is_array($groups)) foreach($groups as $key => $value) { ?><option value="<?php echo $key;?>"><?php echo $value;?></option>
<?php } ?>
</select>
</div>	
</div>
</li>	
<li class="comiis_stylitit b_b bg_e f_c"><?php echo $comiis_lang['tip159'];?></li>		
<li class="comiis_styli b_b cl">
<textarea name="target_names" id="target_names" class="comiis_pxs f_0"><?php echo $album['target_names'];?></textarea>
</li>
</div>		
</div>