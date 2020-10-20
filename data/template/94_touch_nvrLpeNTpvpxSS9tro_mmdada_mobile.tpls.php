<?php
//Discuz! cache file, DO NOT modify me!
//Created: Sep 29, 2018, 17:50
//Identify: 945b521b9e76576b920263d9bb4a230b

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
?>
		<?php if($albums) { ?>
<li class="comiis_styli comiis_flex b_b">
<div class="styli_tit f_c"><?php echo $comiis_lang['post29'];?></div>
<div class="flex comiis_input_style">
<div class="comiis_login_select">
<span class="inner">
<i class="comiis_font f_d">&#xe60c</i>
<span class="z">
<span class="comiis_question" id="albumop_name"></span>
</span>					
</span>
<select id="albumop" name="albumop" onchange="album_op(this.value);">
<option value="selectalbum" selected="selected"><?php echo $comiis_lang['post30'];?></option>
<option value="creatalbum"><?php echo $comiis_lang['tip170'];?></option>
</select>
</div>	
</div>
</li>
<div id="selectalbum">
<li class="comiis_styli comiis_flex b_b">
<div class="styli_tit f_c"><?php echo $comiis_lang['post31'];?></div>
<div class="flex comiis_input_style">
<div class="comiis_login_select">
<span class="inner">
<i class="comiis_font f_d">&#xe60c</i>
<span class="z">
<span class="comiis_question" id="albumid_name"></span>
</span>					
</span>
<select id="albumid" name="albumid"><?php if(is_array($albums)) foreach($albums as $value) { if($value['albumid'] == $_GET['albumid']) { ?>
<option value="<?php echo $value['albumid'];?>" selected="selected"><?php echo $value['albumname'];?></option>
<?php } else { ?>
<option value="<?php echo $value['albumid'];?>"><?php echo $value['albumname'];?></option>
<?php } } ?>
</select>
</div>
</div>
</li>
</div>
<div id="creatalbum" style="display:none;">
<?php } else { ?>
<input type="hidden" name="albumop" value="creatalbum" />
<div id="creatalbum">
<?php } if($albums) { ?><li class="styli_h bg_e b_b cl"></li><?php } ?>
<li class="comiis_styli comiis_flex b_b">
<div class="styli_tit f_g"><?php echo $comiis_lang['tip149'];?></div>
<div class="flex"><input type="text" name="albumname" id="albumname" class="comiis_input" value="" placeholder="(<?php echo $comiis_lang['tip106'];?>)" /></div>
</li>					
<li class="comiis_styli  b_b">
<textarea name="depict" placeholder="<?php echo $comiis_lang['tip150'];?>" class="comiis_pt"></textarea>
</li>
<?php if($_G['setting']['albumcategorystat'] && $categoryselect) { ?>
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
<li class="comiis_styli comiis_flex b_b cl">
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
<li class="comiis_styli b_b cl" id="span_password" style="display:none;">
<input type="text" name="password" value="" class="comiis_input" placeholder="<?php echo $comiis_lang['tip171'];?>(<?php echo $comiis_lang['tip106'];?>)" />
</li>		
<div id="tb_selectgroup" style="display:none;">
<li class="comiis_styli b_b cl">
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
<li class="comiis_stylitit b_b bg_e f_c cl"><?php echo $comiis_lang['tip159'];?></li>		
<li class="comiis_styli b_b cl">
<textarea name="target_names" id="target_names" class="comiis_pxs f_0"></textarea>
</li>
</div>
</div>