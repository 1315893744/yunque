<?php
//Discuz! cache file, DO NOT modify me!
//Created: Sep 29, 2018, 17:37
//Identify: b9896129b7e69aea2ffa74de717f8e3e

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
?>
<div class="comiis_wzpost comiis_input_style bg_f b_t mt15 cl">	
  <ul>
    <li class="comiis_stylino comiis_flex b_b">	
      <div class="flex styli_tit comiis_group_upico f_c">
        <?php if($_G['forum']['icon']) { ?>
          <em class="bg_e"><img src="<?php echo $_G['forum']['icon'];?>?<?php echo TIMESTAMP;?>" /></em>
        <?php } ?>
        <span><?php echo $comiis_group_lang['001'];?><?php echo $comiis_group_lang['010'];?></span>
      </div>
      <div class="styli_r comiis_editpic" style="margin:0;">
        <ul>
          <li class="up_btn comiis_flex">
          <a class="bg_b b_ok f_c" href="javascript:;"><i class="comiis_font" id="iconnew_i">&#xe627</i><?php echo $comiis_group_lang['012'];?><?php echo $comiis_group_lang['010'];?><input type="file" id="iconnew" name="iconnew" class="kmshow" onchange="$('#iconnew_i').addClass('f_0');" accept="image/*"></a>
          </li>				
        </ul>
      </div>
    </li>
    <?php if(!empty($_G['group']['allowupbanner']) || $_G['adminid'] == 1) { ?>
      <li class="comiis_stylino comiis_flex">	
        <div class="flex styli_tit comiis_group_upico f_c">          
          <em class="bg_e"><img src="<?php if($_G['forum']['banner']) { ?><?php echo $_G['forum']['banner'];?>?<?php echo TIMESTAMP;?><?php } else { ?>static/image/common/groupicon.gif<?php } ?>" /></em>
          <span><?php echo $comiis_group_lang['009'];?></span>
          <?php if($_G['forum']['banner']) { ?>          
          <input type="checkbox" name="deletebanner" id="deletebanner" value="1" class="comiis_checkbox_key" />
          <label for="deletebanner"><code class="bg_f b_ok comiis_checkbox comiis_checkbox_close" style="float:left;margin-top:9px;margin-left:8px;"></code></label>
          <?php } ?>
        </div>
        <div class="styli_r comiis_editpic" style="margin:0;">
          <ul>
            <li class="up_btn comiis_flex">
            <a class="bg_b b_ok f_c" href="javascript:;"><i class="comiis_font" id="bannernew_i">&#xe627</i><?php echo $comiis_group_lang['012'];?><?php echo $comiis_lang['view43'];?><input type="file" name="bannernew" id="bannernew" class="kmshow" onchange="$('#bannernew_i').addClass('f_0');" accept="image/*"></a>
            </li>				
          </ul>
        </div>
      </li>
    <?php } ?>
    <li class="styli_h bg_e b_b"></li>
    <li class="comiis_styli b_b f_a" id="returnmessage4"></li>
    <?php if(!empty($specialswitch['allowchangename']) && ($_G['uid'] == $_G['forum']['founderuid'] || $_G['adminid'] == 1)) { ?>
    <li class="comiis_styli comiis_flex b_b">
      <div class="styli_tit f_c"><?php echo $comiis_group_lang['001'];?><?php echo $comiis_group_lang['002'];?> <span class="f_g">*</span></div>
      <div class="flex"><input type="text" id="name" name="name" value="<?php echo $_G['forum']['name'];?>" autocomplete="off" tabindex="1" class="comiis_input kmshow" /></div>
    </li>
    <?php } ?>
    <?php if(!empty($specialswitch['allowchangetype']) && ($_G['uid'] == $_G['forum']['founderuid'] || $_G['adminid'] == 1)) { ?>
    <li class="comiis_styli comiis_flex b_b">
      <div class="styli_tit f_c"><?php echo $comiis_group_lang['001'];?><?php echo $comiis_group_lang['017'];?> <span class="f_g">*</span></div>
      <div class="flex comiis_input_style">
        <div class="comiis_login_select">
          <span class="inner">
            <i class="comiis_font f_d">&#xe60c</i>
            <span class="z">
              <span class="comiis_question" id="parentid_name"></span>
            </span>					
          </span>
          <select id="parentid" name="parentid" onchange="comiis_parentid('forum.php?mod=ajax&action=secondgroup&fupid='+ this.value);">
            <?php echo $groupselect['first'];?>
          </select>
        </div>
      </div>
    </li>
    <?php if($groupselect['second']) { ?>
    <li class="comiis_styli comiis_flex b_b" id="secondgroup">
      <div class="styli_tit f_c"><?php echo $comiis_group_lang['011'];?> <span class="f_g">*</span></div>
      <div class="flex comiis_input_style">
        <div class="comiis_login_select">
          <span class="inner">
            <i class="comiis_font f_d">&#xe60c</i>
            <span class="z">
              <span class="comiis_question" id="fup_name"></span>
            </span>					
          </span>
          <div id="fup_div"><select id="fup" name="fup"><?php echo $groupselect['second'];?></select></div>
        </div>
      </div>
    </li>
    <?php } ?>
    <?php } ?>
    <li class="comiis_stylitit b_b bg_e f_c"><?php echo $comiis_group_lang['001'];?><?php echo $comiis_group_lang['003'];?></li>	
    <li class="comiis_styli b_b cl">
      <textarea id="descriptionmessage" name="descriptionnew" class="comiis_pxs"><?php echo $_G['forum']['descriptionnew'];?></textarea>
    </li>
    <li class="comiis_styli comiis_flex b_b">
      <div class="styli_tit f_c"><?php echo $comiis_lang['group_perm_visit'];?></div>
      <div class="flex comiis_input_style">
        <div class="comiis_login_select">
          <span class="inner">
            <i class="comiis_font f_d">&#xe60c</i>
            <span class="z">
              <span class="comiis_question" id="gviewpermnew_name"></span>
            </span>					
          </span>
          <select id="gviewpermnew" name="gviewpermnew">
            <option value="1"<?php if($gviewpermselect['1']) { ?> selected = "selected"<?php } ?> /><?php echo $comiis_lang['group_perm_all_user'];?></option>
            <option value="0"<?php if($gviewpermselect['0']) { ?> selected = "selected"<?php } ?> /><?php echo $comiis_lang['group_perm_member_only'];?></option>
          </select>
        </div>
      </div>
    </li> 
    <li class="comiis_styli comiis_flex b_b">
      <div class="styli_tit f_c"><?php echo $comiis_lang['group_join_type'];?></div>
      <div class="flex comiis_input_style">
        <div class="comiis_login_select">
          <span class="inner">
            <i class="comiis_font f_d">&#xe60c</i>
            <span class="z">
              <span class="comiis_question" id="jointypenew_name"></span>
            </span>					
          </span>
          <select id="jointypenew" name="jointypenew">
            <option value="0"<?php if($jointypeselect['0']) { ?> selected = "selected"<?php } ?> /><?php echo $comiis_lang['group_join_type_free'];?></option>
            <option value="2"<?php if($jointypeselect['2']) { ?> selected = "selected"<?php } ?> /><?php echo $comiis_lang['group_join_type_moderate'];?></option>
            <option value="1"<?php if($jointypeselect['1']) { ?> selected = "selected"<?php } ?> /><?php echo $comiis_lang['group_join_type_invite'];?></option>
            <?php if(!empty($specialswitch['allowclosegroup'])) { ?>
            <option value="-1"<?php if($jointypeselect['-1']) { ?> selected = "selected"<?php } ?> /><?php echo $comiis_lang['close'];?></option>
            <?php } ?>
          </select>
        </div>
      </div>
    </li>      
    <?php if($_G['setting']['allowgroupdomain'] && !empty($_G['setting']['domain']['root']['group']) && $domainlength) { ?>
    <li class="comiis_styli comiis_flex b_b">
      <div class="styli_tit f_c"><?php echo $comiis_lang['subdomain'];?> http:// </div>
      <div class="flex"><input type="text" name="domain" class="comiis_input b_b kmshow" value="<?php echo $_G['forum']['domain'];?>" /></div>
      <div class="styli_r f_c">.<?php echo $_G['setting']['domain']['root']['group'];?></div>
    </li>
    <?php } ?>
  </ul>
</div>