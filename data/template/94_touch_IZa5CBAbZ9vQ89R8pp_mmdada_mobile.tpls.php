<?php
//Discuz! cache file, DO NOT modify me!
//Created: Sep 29, 2018, 17:23
//Identify: 912b2b6bb41089bb5cb7e6702b9e8bb1

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
?>
<li class="comiis_stylitit b_b bg_e f_c">
<div class="styli_r f14 y">
<input type="checkbox" id="activitytime" name="activitytime" onclick="if(this.checked) {$('#certainstarttime').css('display','none');  $('#uncertainstarttime').css('display','');} else {$('#certainstarttime').css('display','');  $('#uncertainstarttime').css('display','none');}" value="1" <?php if($activity['starttimeto']) { ?>checked<?php } ?> />
<label for="activitytime"><i class="comiis_font"></i> <?php echo $comiis_lang['activity_starttime_endtime'];?></label>
</div>
<?php echo $comiis_lang['post2'];?>
</li>
<li class="comiis_styli comiis_flex b_b" id="certainstarttime" <?php if($activity['starttimeto']) { ?>style="display: none"<?php } ?>>
<div class="styli_tit f_c"><?php echo $comiis_lang['post_event_time'];?> <span class="f_g">*</span></div>
<div class="flex"><input type="text" name="starttimefrom[0]" id="starttimefrom_0" class="comiis_input kmshow comiis_dateshow" autocomplete="off" value="<?php echo $activity['starttimefrom'];?>" readonly="readonly" /></div>
<div class="styli_r"><a href="javascript:;" onclick="$('#starttimefrom_0').val('');"><i class="comiis_font f_g">&#xe647</i></a></div>
</li>
<div id="uncertainstarttime" <?php if(!$activity['starttimeto']) { ?>style="display: none"<?php } ?>>
<li class="comiis_styli comiis_flex b_b">
<div class="styli_tit f_g"><?php echo $comiis_lang['activity_starttime'];?>:</div>
<div class="flex"><input type="text" name="starttimefrom[1]" id="starttimefrom_1" class="comiis_input kmshow comiis_dateshow" autocomplete="off" value="<?php echo $activity['starttimefrom'];?>" readonly="readonly" /></div>
<div class="styli_r"><a href="javascript:;" onclick="$('#starttimefrom_1').val('');"><i class="comiis_font f_g">&#xe647</i></a></div>
</li>
<li class="comiis_styli comiis_flex b_b">
<div class="styli_tit f_g"><?php echo $comiis_lang['endtime'];?>:</div>
<div class="flex"><input type="text" autocomplete="off" id="starttimeto" name="starttimeto" class="comiis_input kmshow comiis_dateshow" value="<?php if($activity['starttimeto']) { ?><?php echo $activity['starttimeto'];?><?php } ?>" readonly="readonly" /></div>
<div class="styli_r"><a href="javascript:;" onclick="$('#starttimeto').val('');"><i class="comiis_font f_g">&#xe647</i></a></div>
</li>
</div>
<li class="comiis_styli comiis_flex b_b">
<div class="styli_tit f_c"><?php echo $comiis_lang['activity_space'];?> <span class="f_g">*</span></div>
<div class="flex"><input type="text" name="activityplace" id="activityplace" class="comiis_input kmshow" value="<?php echo $activity['place'];?>" /></div>
</li>
<?php if($_GET['action'] == 'newthread') { ?>
<li class="comiis_styli comiis_flex b_b">
<div class="styli_tit f_c"><?php echo $comiis_lang['activity_city'];?></div>
<div class="flex"><input name="activitycity" id="activitycity" class="comiis_input kmshow" type="text" /></div>
</li>
<?php } ?>
<li class="comiis_styli comiis_flex b_b">
<div class="styli_tit f_c"><?php echo $comiis_lang['activiy_sort'];?></div>	
<div class="flex"><input type="text" id="activityclass" name="activityclass" class="comiis_input kmshow" value="<?php echo $activity['class'];?>" /></div>
<?php if($activitytypelist) { ?>
<div class="styli_r b_l">
<div class="comiis_login_select">
<span class="inner">
<i class="comiis_font f_d">&#xe60c</i>
<span class="z">
<span class="comiis_question f_g" id="comiis_activity_key_name"></span>
</span>					
</span>
<select id="comiis_activity_key" onchange="$('#activityclass').val($('#comiis_activity_key').find('option:selected').val());"><?php if(is_array($activitytypelist)) foreach($activitytypelist as $type) { ?><option value="<?php echo $type;?>"><?php echo $type;?></option>
<?php } ?>
</select>
</div>
</div>
<?php } ?>
</li>
<li class="comiis_styli comiis_flex b_b">
<div class="styli_tit f_c"><?php echo $comiis_lang['activity_need_member'];?></div>
<div class="flex"><input type="text" name="activitynumber" id="activitynumber" class="comiis_input kmshow" value="<?php echo $activity['number'];?>" /></div>
</li>
<li class="comiis_styli comiis_flex b_b">
<div class="styli_tit f_c"><?php echo $comiis_lang['post3'];?></div>
<div class="flex">
<div class="comiis_login_select">
<span class="inner">
<i class="comiis_font f_d">&#xe60c</i>
<span class="z">
<span class="comiis_question" id="gender_name"></span>
</span>					
</span>
<select name="gender" id="gender">
<option value="0" <?php if(!$activity['gender']) { ?>selected="selected"<?php } ?>><?php echo $comiis_lang['unlimited'];?></option>
<option value="1" <?php if($activity['gender'] == 1) { ?>selected="selected"<?php } ?>><?php echo $comiis_lang['male'];?></option>
<option value="2" <?php if($activity['gender'] == 2) { ?>selected="selected"<?php } ?>><?php echo $comiis_lang['female'];?></option>
</select>
<span id="activitynumbermessage"></span>
</div>	
</div>
</li>
<?php if($_G['setting']['activityfield']) { ?>
<li class="comiis_stylitit b_b bg_e f_c"><?php echo $comiis_lang['post4'];?></li>
<li class="comiis_styli comiis_flex post_sort b_b">
<div class="flx"><?php if(is_array($_G['setting']['activityfield'])) foreach($_G['setting']['activityfield'] as $key => $val) { ?><input type="checkbox" name="userfield[]" id="userfield_<?php echo $key;?>" value="<?php echo $key;?>"<?php if($activity['ufield']['userfield'] && in_array($key, $activity['ufield']['userfield'])) { ?> checked="checked"<?php } ?> />
<label for="userfield_<?php echo $key;?>"><i class="comiis_font"></i><?php echo $val;?></label>
<?php } ?>
</div>
</li>
<?php } if($_G['setting']['activityextnum']) { ?>
<li class="comiis_stylitit b_b bg_e f_c"><?php echo $comiis_lang['post5'];?></li>	
<li class="comiis_styli b_b">
<textarea name="extfield" id="extfield" class="comiis_pt cl" placeholder="<?php echo $comiis_lang['post_activity_message'];?> <?php echo $_G['setting']['activityextnum'];?> <?php echo $comiis_lang['post_option'];?>" cols="50"><?php if($activity['ufield']['extfield']) { ?><?php echo $activity['ufield']['extfield'];?><?php } ?></textarea>
</li>
<li class="styli_h bg_e b_b"></li>
<?php } if($_G['setting']['activitycredit']) { ?>
<li class="comiis_styli comiis_flex b_b">
<div class="styli_tit f_c"><?php echo $comiis_lang['consumption_credit'];?></div>
<div class="flex"><input type="text" name="activitycredit" id="activitycredit" class="comiis_input kmshow" value="<?php echo $activity['credit'];?>" /></div>
<div class="styli_r f_c"><?php echo $_G['setting']['extcredits'][$_G['setting']['activitycredit']]['title'];?></div>
</li>
<?php } ?>
<li class="comiis_styli comiis_flex b_b">
<div class="styli_tit f_c"><?php echo $comiis_lang['activity_payment'];?></div>
<div class="flex"><input type="text" name="cost" id="cost" class="comiis_input kmshow" value="<?php echo $activity['cost'];?>" /></div>
<div class="styli_r f_c"><?php echo $comiis_lang['payment_unit'];?></div>
</li>
<li class="comiis_styli comiis_flex b_b">
<div class="styli_tit f_c"><?php echo $comiis_lang['post_closing'];?></div>
<div class="flex"><input type="text" name="activityexpiration" id="activityexpiration" class="comiis_input kmshow comiis_dateshow" autocomplete="off" value="<?php echo $activity['expiration'];?>" readonly="readonly" /></div>
<div class="styli_r"><a href="javascript:;" onclick="$('#activityexpiration').val('');"><i class="comiis_font f_g">&#xe647</i></a></div>
</li>