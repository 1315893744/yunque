<?php
//Discuz! cache file, DO NOT modify me!
//Created: Sep 29, 2018, 17:27
//Identify: ebf12f72f0852cf1018ebe85e1270e0e

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
?>
		<?php if(count($threadlist) > 1 || empty($defaultcheck['recommend'])) { if($_G['group']['allowstickthread']) { ?>
<div <?php if(!$defaultcheck['stick']) { ?>style="display:none;"<?php } ?>>
<div class="tip_tit bg_e mb5 f_b b_b"><?php echo $comiis_lang['thread_stick'];?></div>
<dt class="comiis_input_style kmlabs f_b">
<input type="checkbox" name="operations[]" class="pc" value="stick" <?php echo $defaultcheck['stick'];?> />
<div class="comiis_styli comiis_styli_select cl">
<div class="comiis_login_select comiis_inner bg_e b_ok">
<span class="inner">
<i class="comiis_font f_d">&#xe60c</i>
<span class="z">
<span class="comiis_question f_c" id="sticklevel_name"></span>
</span>					
</span>
<select id="sticklevel" name="sticklevel">
<?php if($_G['forum']['status'] != 3) { ?>
<option value="0"><?php echo $comiis_lang['none'];?></option>
<option value="1" <?php echo $stickcheck['1'];?>><?php echo $_G['setting']['threadsticky']['2'];?></option>
<?php if($_G['group']['allowstickthread'] >= 2) { ?>
<option value="2" <?php echo $stickcheck['2'];?>><?php echo $_G['setting']['threadsticky']['1'];?></option>
<?php if($_G['group']['allowstickthread'] == 3) { ?>
<option value="3" <?php echo $stickcheck['3'];?>><?php echo $_G['setting']['threadsticky']['0'];?></option>
<?php } } } else { ?>
<option value="0"><?php echo $comiis_lang['no'];?> </option>
<option value="1" <?php echo $stickcheck['1'];?>><?php echo $comiis_lang['yes'];?> </option>
<?php } ?>
</select>
</div>
</div>				
<div class="comiis_flex mt5 cl">
<div class="styli_tit f_c"><?php echo $comiis_lang['expire'];?></div>
<div class="flex"><input type="text" autocomplete="off" id="expirationstick" name="expirationstick" value="<?php echo $expirationstick;?>" tabindex="1" class="comiis_dateshow kmshow comiis_inputs b_b f_c" /></div>
<div class="styli_r f_c"><a href="javascript:;" onclick="$('.comiis_dateshow').val('');"><i class="comiis_font f_g">&#xe647</i></a></div>
</div>
</dt>				
</div>
<?php } if($_G['group']['allowdigestthread']) { ?>			
<div <?php if(!$defaultcheck['digest']) { ?>style="display:none;"<?php } ?>>
<div class="tip_tit bg_e mb5 f_b b_b"><?php echo $comiis_lang['admin_digest_add'];?></div>
<dt class="comiis_input_style kmlabs f_b">
<input type="checkbox" name="operations[]" class="pc" value="digest" <?php echo $defaultcheck['digest'];?> />
<div class="comiis_styli comiis_styli_select cl">
<div class="comiis_login_select comiis_inner bg_e b_ok">
<span class="inner">
<i class="comiis_font f_d">&#xe60c</i>
<span class="z">
<span class="comiis_question f_c" id="digestlevel_name"></span>
</span>					
</span>
<select id="digestlevel" name="digestlevel">
<option value="0"><?php echo $comiis_lang['admin_digest_remove'];?></option>
<option value="1" <?php echo $digestcheck['1'];?>><?php echo $comiis_lang['thread_digest'];?> 1</option>
<?php if($_G['group']['allowdigestthread'] >= 2) { ?>
<option value="2" <?php echo $digestcheck['2'];?>><?php echo $comiis_lang['thread_digest'];?> 2</option>
<?php if($_G['group']['allowdigestthread'] == 3) { ?>
<option value="3" <?php echo $digestcheck['3'];?>><?php echo $comiis_lang['thread_digest'];?> 3</option>
<?php } } ?>
</select>
</div>
</div>				
<div class="comiis_flex mt5 cl">
<div class="styli_tit f_c"><?php echo $comiis_lang['expire'];?></div>
<div class="flex"><input type="text" name="expirationdigest" id="expirationdigest" autocomplete="off" value="<?php echo $expirationdigest;?>" tabindex="1" class="comiis_dateshow kmshow comiis_inputs b_b f_c" /></div>
<div class="styli_r f_c"><a href="javascript:;" onclick="$('.comiis_dateshow').val('');"><i class="comiis_font f_g">&#xe647</i></a></div>
</div>
</dt>
</div>
<?php } if($_G['group']['allowhighlightthread']) { $_G['forum_colorarray'] = array(0=>'#000000', 1=>'#EE1B2E', 2=>'#EE5023', 3=>'#996600', 4=>'#3C9D40', 5=>'#2897C5', 6=>'#2B65B7', 7=>'#8F2A90', 8=>'#EC1282');?><div <?php if(!$defaultcheck['highlight']) { ?>style="display:none;"<?php } ?>>
<div class="tip_tit bg_e f_b b_b"><?php echo $comiis_lang['thread_highlight'];?></div>
<input type="checkbox" name="operations[]" value="highlight" <?php echo $defaultcheck['highlight'];?> style="display:none;" />
<input type="hidden" class="highlight_style_1" name="highlight_style[1]" value="<?php echo $stylecheck['1'];?>" />
<input type="hidden" class="highlight_style_2" name="highlight_style[2]" value="<?php echo $stylecheck['2'];?>" />
<input type="hidden" class="highlight_style_3" name="highlight_style[3]" value="<?php echo $stylecheck['3'];?>" />
<input type="hidden" class="highlight_color" name="highlight_color" value="<?php echo $colorcheck;?>" />
<dt style="padding:8px 15px 10px;">
<div class="tip_form">
<li class="tip_txt comiis_flex b_b cl">
<div class="styli_tit f_c"><?php echo $comiis_lang['thread_subject'];?><?php echo $comiis_lang['post22'];?>: </div>
<div class="flex">
<a href="javascript:;" id="highlight_op_1" onclick="switchhl(this, 1)" class="comiis_dopt bg_e z<?php if($stylecheck['1']) { ?> bg_del f_f<?php } ?>" style="font-weight:600;margin-right:15px;">B</a>
<a href="javascript:;" id="highlight_op_2" onclick="switchhl(this, 2)" class="comiis_dopt bg_e z<?php if($stylecheck['2']) { ?> bg_del f_f<?php } ?>" style="font-style:italic;margin-right:15px;">I</a>
<a href="javascript:;" id="highlight_op_3" onclick="switchhl(this, 3)" class="comiis_dopt bg_e z<?php if($stylecheck['3']) { ?> bg_del f_f<?php } ?>" style="text-decoration:underline">U</a>
</div>
</li>
<li class="tip_txt comiis_flex b_b">
<div class="styli_tit f_c"><?php echo $comiis_lang['thread_subject'];?><?php echo $comiis_lang['post21'];?>: </div>
<div class="flex f_c" style="padding-left:10px;"><a style="background:<?php echo $_G['forum_colorarray'][$colorcheck];?>;" class="comiis_dopt set_color_style f_f"></a></div>
<div class="styli_r comiis_wzcolor"><?php if(is_array($_G['forum_colorarray'])) foreach($_G['forum_colorarray'] as $key => $temp) { ?><a href="javascript:;" onclick="set_color_style('<?php echo $key;?>', '<?php echo $temp;?>');" style="background:<?php echo $temp;?>;"></a>
<?php } ?>
</div>
</li>
<li class="tip_txt comiis_flex b_b cl">
<div class="styli_tit f_c"><?php echo $comiis_lang['backgroundcolor'];?>: </div>
<div class="flex bg_e b_ok" style="padding:0 5px;">
<input type="text" id="highlight_bgcolor" name="highlight_bgcolor" value="<?php echo $highlight_bgcolor;?>" placeholder="<?php echo $comiis_lang['post23'];?>" class="comiis_px f_c" />
</div>
</li>
<li class="tip_txt comiis_flex cl">
<div class="styli_tit f_c"><?php echo $comiis_lang['expire'];?>: </div>
<div class="flex"><input type="text" name="expirationhighlight" id="expirationhighlight" autocomplete="off" value="<?php echo $expirationhighlight;?>" tabindex="1" class="comiis_dateshow kmshow comiis_inputs b_b f_c" /></div>
<div class="styli_r f_c"><a href="javascript:;" onclick="$('.comiis_dateshow').val('');"><i class="comiis_font f_g">&#xe647</i></a></div>
</li>
</div>
</dt>
</div>
<?php } } ?>