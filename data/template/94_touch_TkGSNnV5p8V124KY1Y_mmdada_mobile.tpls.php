<?php
//Discuz! cache file, DO NOT modify me!
//Created: Sep 29, 2018, 17:24
//Identify: 6e06c67347bbc517ffdd3a27cdc01045

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
?>
	<li class="comiis_stylitit b_b bg_e f_c">
<div class="styli_r f15 y">
<input id="pollchecked" type="checkbox" onclick="switchpollm(1)" />
<label for="pollchecked"><i class="comiis_font"></i> <?php echo $comiis_lang['post_single_frame_mode'];?></label>
</div>
<?php echo $comiis_lang['post_poll_comment'];?>
</li>	
<li class="b_b" id="pollm_c_1">
<div class="comiis_polloption_add"></div>
<div class="f_0" style="padding:6px 12px;line-height:30px;font-size:15px;"><a href="javascript:;" onclick="addpolloption()" style="display:block;">+ <?php echo $comiis_lang['post_poll_add'];?></a></div>
</li>
<div id="comiis_polloption_new" style="display:none">
<ul>
<li class="comiis_styli comiis_flex b_b">
<div class="styli_tit f_c"><?php echo $comiis_lang['post7'];?></div>
<div class="flex"><input type="text" name="_comiis_name_[]" class="comiis_input kmshow" autocomplete="off" placeholder="<?php echo $comiis_lang['post8'];?>" /></div>
<div class="styli_rico">
<a href="javascript:;" onclick="comiis_shpicbox('_comiis_id_')" id="comiis_showpic_comiis_id_" style="display:none"><i class="comiis_font f_a">&#xe627</i></a>
<a href="javascript:;" style="position:relative;overflow:hidden;">
<input type="file" class="comiis_file_key" name="Filedata" comiis_index="_comiis_id_" accept="image/*">
<i class="comiis_font f_c">&#xe656</i>
</a>
<a href="javascript:;" onclick="delpolloption(this)"><i class="comiis_font f_g">&#xe647</i></a>				
</div>
</li>
<li class="tebie_poll_img bg_e b_b vm cl" id="comiis_newpicbox_comiis_id_" style="display:none"></li>
</ul>
</div>
<li class="comiis_styli b_b" id="pollm_c_2" style="display:none">
<textarea autocomplete="off" name="polloptions" id="polloptions" class="comiis_pt"></textarea>
<div class="mt10 f_0 b_t cl" style="padding-top:8px;"><?php echo $comiis_lang['post_poll_comment_s'];?></div>
</li>