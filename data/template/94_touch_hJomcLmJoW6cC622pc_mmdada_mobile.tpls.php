<?php
//Discuz! cache file, DO NOT modify me!
//Created: Sep 29, 2018, 17:27
//Identify: 54ca708825d37e36a2876e54fe66c873

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
?>
			<?php if($operation != 'type') { ?>
<div class="tip_tit bg_e mb5 f_b b_b"><?php echo $comiis_lang['modmenu_move'];?></div>
<dt class="comiis_input_style kmlabs f_b">		
<input type="hidden" name="operations[]" value="move" />
<div class="comiis_flex cl">
<div class="styli_tit"><?php echo $comiis_lang['admin_target'];?></div>
<div class="flex">
<div class="comiis_styli comiis_styli_select cl">
<div class="comiis_login_select comiis_inner bg_e b_ok">
<span class="inner">
<i class="comiis_font f_d">&#xe60c</i>
<span class="z">
<span class="comiis_question f_c" id="moveto_name"></span>
</span>					
</span>
<select name="moveto" id="moveto" onchange="comiis_getthreadtypes(this.value, 'threadtypes');if(this.value) {$('#moveext').css('display', 'block');} else {$('#moveext').css('display', 'none');}"><?php echo $forumselect;?></select>
</div>
</div>
</div>
</div>
<div class="comiis_flex cl">
<div class="styli_tit"><?php echo $comiis_lang['admin_targettype'];?></div>
<div class="flex">
<div class="comiis_styli comiis_styli_select cl" id="threadtypes">
<div class="comiis_login_select comiis_inner bg_e b_ok">
<span class="inner">
<i class="comiis_font f_d">&#xe60c</i>
<span class="z">
<span class="comiis_question f_c" id="movetook_name"></span>
</span>					
</span>
<select id="movetook" name="threadtypeid"><option value="0" /></option></select>
</div>
</div>
</div>
</div>
<div class="comiis_tip_radios">
<input type="radio" id="type_a" name="type" value="normal" checked="checked" />
<label for="type_a"><i class="comiis_font"></i><?php echo $comiis_lang['admin_move'];?></label>	
<input type="radio" id="type_b" name="type"  value="redirect"/>
<label for="type_b"><i class="comiis_font"></i><?php echo $comiis_lang['admin_move_hold'];?></label>
</div>
</dt>
<?php } else { ?>				
<?php if($typeselect) { ?>	
<div class="tip_tit bg_e mb5 f_b b_b"><?php echo $comiis_lang['types'];?></div>
<dt class="comiis_input_style kmlabs f_b">			
<input type="hidden" name="operations[]" value="type" />
<div class="comiis_styli comiis_styli_select mt5 cl">
<div class="comiis_login_select comiis_inner bg_e b_ok">
<span class="inner">
<i class="comiis_font f_d">&#xe60c</i>
<span class="z">
<span class="comiis_question f_c" id="typeid_name"><?php echo $comiis_lang['select_thread_catgory'];?></span>
</span>					
</span>
<?php echo $typeselect;?>
</div>
</div>		
</dt>
<?php } else { ?>
<dt class="f_b">			
<p><?php echo $comiis_lang['admin_type_msg'];?><?php $hiddensubmit = true;?></p>		
</dt>
<dd class="b_t cl">
<a href="javascript:;" onclick="popup.close();" class="tip_btn tip_all bg_f f_b"><span><?php echo $comiis_lang['close'];?></span></a>		
</dd>			
<?php } } ?>