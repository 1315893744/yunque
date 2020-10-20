<?php
//Discuz! cache file, DO NOT modify me!
//Created: Sep 29, 2018, 17:36
//Identify: 7793e183e6fbeda8f624b619dc44c20b

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
?>
  <div class="comiis_wzpost comiis_input_style bg_f b_t mt15 cl" id="main_messaqge">	
    <li class="comiis_styli b_b f_a" id="returnmessage4"></li>		
    <li class="comiis_styli comiis_flex b_b">
      <div class="styli_tit f_c"><?php echo $comiis_group_lang['001'];?><?php echo $comiis_group_lang['002'];?> <span class="f_g">*</span></div>
      <div class="flex"><input type="text" name="name" id="name" class="comiis_input kmshow" tabindex="1" value="" autocomplete="off" placeholder="<?php echo $comiis_group_lang['034'];?><?php echo $comiis_group_lang['001'];?><?php echo $comiis_group_lang['002'];?>" /></div>
    </li>
    <li class="comiis_styli comiis_flex b_b">
      <div class="styli_tit f_c"><?php echo $comiis_lang['group_category'];?> <span class="f_g">*</span></div>
      <div class="flex comiis_input_style">
        <div class="comiis_login_select">
          <span class="inner">
            <i class="comiis_font f_d">&#xe60c</i>
            <span class="z">
              <span class="comiis_question" id="parentid_name"></span>
            </span>					
          </span>
          <select id="parentid" name="parentid" onchange="comiis_parentid('forum.php?mod=ajax&action=secondgroup&fupid='+ this.value);">
            <option value="0"><?php echo $comiis_lang['choose_please'];?></option>
            <?php echo $groupselect['first'];?>
          </select>
        </div>
      </div>
    </li>    
    <em id="secondgroup"></em>
    <span id="groupcategorycheck" class="xi1"></span>
    <li class="comiis_stylitit b_b bg_e f_c"><?php echo $comiis_group_lang['001'];?><?php echo $comiis_group_lang['003'];?></li>	
    <li class="comiis_styli b_b cl">
      <textarea id="descriptionmessage" name="descriptionnew" placeholder="<?php echo $comiis_group_lang['034'];?><?php echo $comiis_group_lang['001'];?><?php echo $comiis_group_lang['003'];?>" class="comiis_pxs f_c"></textarea>
    </li>
    <li class="comiis_styli comiis_flex b_b">
      <div class="styli_tit f_c"><?php echo $comiis_lang['group_perm_visit'];?> <span class="f_g">*</span></div>
      <div class="flex comiis_input_style">
        <div class="comiis_login_select">
          <span class="inner">
            <i class="comiis_font f_d">&#xe60c</i>
            <span class="z">
              <span class="comiis_question" id="gviewperm_name"></span>
            </span>					
          </span>
          <select id="gviewperm" name="gviewperm">
            <option value="1" selected="selected"><?php echo $comiis_lang['group_perm_all_user'];?></option>
            <option value="0"><?php echo $comiis_lang['group_perm_member_only'];?></option>
          </select>
        </div>
      </div>
    </li>    
    <li class="comiis_styli comiis_flex b_b">
      <div class="styli_tit f_c"><?php echo $comiis_lang['group_join_type'];?> <span class="f_g">*</span></div>
      <div class="flex comiis_input_style">
        <div class="comiis_login_select">
          <span class="inner">
            <i class="comiis_font f_d">&#xe60c</i>
            <span class="z">
              <span class="comiis_question" id="jointype_name"></span>
            </span>					
          </span>
          <select id="jointype" name="jointype">
            <option value="0" selected="selected"><?php echo $comiis_lang['group_join_type_free'];?></option>
            <option value="2"><?php echo $comiis_lang['group_join_type_moderate'];?></option>
            <option value="1"><?php echo $comiis_lang['group_join_type_invite'];?></option>
          </select>
        </div>
      </div>
    </li>
  </div>