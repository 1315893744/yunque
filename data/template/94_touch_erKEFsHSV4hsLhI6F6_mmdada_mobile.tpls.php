<?php
//Discuz! cache file, DO NOT modify me!
//Created: Sep 29, 2018, 17:47
//Identify: 33978b24ddecd102c3a48658deee450b

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
?>
		<li class="comiis_styli comiis_flex b_b">
<div class="styli_tit f_c"><?php echo $comiis_lang['tip105'];?></div>
<div class="flex"><input type="text" id="subject" name="subject" value="<?php echo $blog['subject'];?>" <?php if($_GET['op'] != 'edit') { ?>onblur="relatekw();"<?php } ?> class="comiis_input" placeholder="(<?php echo $comiis_lang['tip106'];?>)" /></div>
</li>		
<?php if($_G['setting']['blogcategorystat'] && $categoryselect) { ?>
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
<div class="styli_tit f_c"><?php echo $comiis_lang['tip161'];?></div>
<div class="flex comiis_input_style">
<div class="comiis_login_select">
<span class="inner">
<i class="comiis_font f_d">&#xe60c</i>
<span class="z">
<span class="comiis_question" id="classid_name"></span>
</span>					
</span>
<select name="classid" id="classid" onchange="addSort(this)" >
<option value="0"><?php echo $comiis_lang['tip41'];?></option><?php if(is_array($classarr)) foreach($classarr as $value) { if($value['classid'] == $blog['classid']) { ?>
<option value="<?php echo $value['classid'];?>" selected><?php echo $value['classname'];?></option>
<?php } else { ?>
<option value="<?php echo $value['classid'];?>"><?php echo $value['classname'];?></option>
<?php } } if(!$blog['uid'] || $blog['uid']==$_G['uid']) { ?><option value="addoption" style="color:red;">+<?php echo $comiis_lang['tip162'];?></option><?php } ?>
</select>
</div>	
</div>
</li>		
<li id="comiis_addoption" style="display:none;">
<div class="comiis_styli comiis_flex b_b">
<div class="flex"><input type="text" name="newsort" id="newsort" class="comiis_input" placeholder="<?php echo $comiis_lang['tip217'];?>" /></div>
<div class="styli_r"><button type="button" name="btnsubmit" value="true" class="comiis_sendbtn bg_0 f_f" onclick="blogAddOption('newsort', 'classid')"><?php echo $comiis_lang['tip163'];?></button></div>
</div>
</li>
<li class="comiis_stylitit b_b bg_e f_c"><?php echo $comiis_lang['tip113'];?><?php echo $comiis_lang['tip121'];?></li>	
<li class="comiis_stylino mt10">
<textarea id="uchome-ttHtmlEditor" name="message" placeholder="<?php echo $comiis_lang['tip10'];?>" class="comiis_pt"><?php echo str_replace(array('&amp;', '&quot;', '&lt;', '&gt;'), array('&', '"', '<', '>'), $blog['message']);; ?></textarea>
</li>
<div class="comiis_upbox b_b cl">
<ul id="imglist" class="comiis_post_imglist">
<li class="up_btn"><a href="javascript:;" class="bg_e b_ok f_d"><i class="comiis_font">&#xe610</i><input type="file" name="Filedata" id="filedata" <?php if($_G['comiis_isAndroid'] != 1) { ?> multiple="multiple"<?php } ?> accept="image/*" /></a></li>
</ul>
</div>
<li class="comiis_styli comiis_flex b_b">
<div class="flex"><input type="text" class="comiis_input f_c" id="tag" name="tag" value="<?php echo $blog['tag'];?>" placeholder="<?php echo $comiis_lang['view54'];?>" /></div>
<div class="styli_r"><button type="button" name="clickbutton[]" onclick="relatekw();" class="comiis_sendbtn bg_0 f_f"><?php echo $comiis_lang['tip112'];?></button></div>
</li>