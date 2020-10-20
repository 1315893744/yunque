<?php
//Discuz! cache file, DO NOT modify me!
//Created: Sep 29, 2018, 17:24
//Identify: f3deb130da743654eb43c342741af2c4

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
?>
	<li class="b_b cl">
<div class="comiis_polloption_add"><?php if(is_array($poll['polloption'])) foreach($poll['polloption'] as $key => $option) { $ppid = $poll['polloptionid'][$key];?><input type="hidden" name="polloptionid[<?php echo $poll['polloptionid'][$key];?>]" value="<?php echo $poll['polloptionid'][$key];?>" />		
<ul>
<li class="comiis_styli comiis_flex b_b">
<div class="styli_tit f_c"><input type="text" name="displayorder[<?php echo $poll['polloptionid'][$key];?>]" class="comiis_input kmshow b_ok f_c" autocomplete="off" tabindex="1" value="<?php echo $poll['displayorder'][$key];?>" style="width:25px;padding-left:5px;" /></div>
<div class="flex"><input type="text" name="polloption[<?php echo $poll['polloptionid'][$key];?>]" class="comiis_input kmshow" autocomplete="off" value="<?php echo $option;?>"<?php if(!$_G['group']['alloweditpoll']) { ?> readonly="readonly"<?php } ?> /></div>
<div class="styli_rico">
<a href="javascript:;" style="position:relative;overflow:hidden;">
<input type="file" class="comiis_file_key" name="Filedata" comiis_index="<?php echo $poll['polloptionid'][$key];?>" comiis_input="1" accept="image/*" >
<i class="comiis_font f_c">&#xe656</i>
</a>
<a href="javascript:;" onclick="comiis_shpicbox('<?php echo $poll['polloptionid'][$key];?>')" id="comiis_showpic<?php echo $poll['polloptionid'][$key];?>"<?php if(!$poll['isimage'] || !$poll['imginfo'][$ppid]['aid']) { ?> style="display:none"<?php } ?>><i class="comiis_font f_a">&#xe627</i></a>				
</div>
</li>
<li class="tebie_poll_img bg_e b_b vm cl" id="comiis_newpicbox<?php echo $poll['polloptionid'][$key];?>" style="display:none">
<input type="hidden" name="pollimage[<?php echo $poll['polloptionid'][$key];?>]" id="pollUploadProgress_<?php echo $poll['polloptionid'][$key];?>_aid" value="<?php echo $poll['imginfo'][$ppid]['aid'];?>" />
<?php if($poll['isimage'] && $poll['imginfo'][$ppid]['aid']) { ?><img src="<?php echo $poll['imginfo'][$ppid]['small'];?>" /><?php } ?>
</li>
</ul>
<?php } ?>	
</div>
<div class="f_0" style="padding:6px 12px;line-height:30px;font-size:15px;"><a href="javascript:;" onclick="addpolloption()" style="display:block;">+ <?php echo $comiis_lang['post_poll_add'];?></a></div>
<div id="comiis_polloption_new" style="display:none">
<ul>
<li class="comiis_styli comiis_flex b_b">
<div class="styli_tit f_c"><input type="text" name="displayorder[]" class="comiis_input kmshow b_ok f_c" autocomplete="off" tabindex="1" value="0" style="width:25px;padding-left:5px;"></div>
<div class="flex"><input type="text" name="_comiis_name_[]" class="comiis_input kmshow" autocomplete="off" tabindex="1" placeholder="<?php echo $comiis_lang['post8'];?>" /></div>
<div class="styli_rico">
<a href="javascript:;" onclick="comiis_shpicbox('_comiis_id_')" id="comiis_showpic_comiis_id_" style="display:none"><i class="comiis_font f_a">&#xe627</i></a>
<a href="javascript:;" style="position:relative;overflow:hidden;">
<input type="file" class="comiis_file_key" name="Filedata" comiis_index="_comiis_id_" accept="image/*">
<i class="comiis_font f_0">&#xe656</i>
</a>
<a href="javascript:;" onclick="delpolloption(this)"><i class="comiis_font f_g">&#xe647</i></a>			
</div>
</li>
<li class="tebie_poll_img bg_e b_b vm cl" id="comiis_newpicbox_comiis_id_" style="display:none"></li>
</ul>
</div>
</li>
