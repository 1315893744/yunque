<?php
//Discuz! cache file, DO NOT modify me!
//Created: Sep 29, 2018, 17:37
//Identify: 761bac4bad613f976a0c8014d7e9237d

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
?>
		<?php if($adminuserlist) { ?>
        <div class="comiis_uibox comiis_input_style bg_f b_t b_b mt10 cl">
            <h2 class="f_c b_b"><?php echo $comiis_lang['group_admin_member'];?></h2>    
            <div class="comiis_userlist01 cl">
                <ul>
                    <?php if(is_array($adminuserlist)) foreach($adminuserlist as $user) { ?>                    <li class="b_t">
                        <?php if($_G['adminid'] == 1 || ($_G['uid'] != $user['uid'] && ($_G['uid'] == $_G['forum']['founderuid'] || $user['level'] > $groupuser['level']))) { ?>
                        <input type="checkbox" id="comiis_muid[<?php echo $user['uid'];?>]" name="muid[<?php echo $user['uid'];?>]" value="<?php echo $user['level'];?>" />
                        <label for="comiis_muid[<?php echo $user['uid'];?>]" class="l_label"><i class="comiis_font"></i></label>
                        <?php } ?>
                        <a href="home.php?mod=space&amp;uid=<?php echo $user['uid'];?>&amp;do=profile" class="block">
                            <i class="comiis_font f_d">&#xe60c</i>
                            <span class="list01_limg bg_e"><?php echo avatar($user['uid'], 'middle'); ?></span>
                            <p class="tit"><?php echo $user['username'];?></p>
                            <p class="txt f_c"><span class="bg_c f_f"><?php if($user['level'] == 1) { ?><?php echo $comiis_group_lang['022'];?><?php } elseif($user['level'] == 2) { ?><?php echo $comiis_group_lang['026'];?><?php } ?></span><?php if($user['online']) { ?><span class="bg_0 f_f"><?php echo $comiis_lang['login_normal_mode'];?></span><?php } ?></p>
                        </a>
                    </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
<?php } ?>
        <?php if($staruserlist || $userlist) { ?>
        <div class="comiis_uibox comiis_input_style bg_f b_t b_b mt10 cl">
            <h2 class="f_c b_b"><?php echo $comiis_group_lang['001'];?><?php echo $comiis_group_lang['015'];?></h2>
            <?php if($staruserlist || $userlist) { ?>
            <div class="comiis_userlist01 cl">
                <ul>
                  <?php if($staruserlist) { ?>
                    <?php if(is_array($staruserlist)) foreach($staruserlist as $user) { ?>                    <li class="b_t">
                      <?php if($_G['adminid'] == 1 || $user['level'] > $groupuser['level']) { ?>
                         <input type="checkbox" id="comiis_muid[<?php echo $user['uid'];?>]" name="muid[<?php echo $user['uid'];?>]" value="<?php echo $user['level'];?>" />
                         <label for="comiis_muid[<?php echo $user['uid'];?>]" class="l_label"><i class="comiis_font"></i></label>
                      <?php } ?>
                      <a href="home.php?mod=space&amp;uid=<?php echo $user['uid'];?>&amp;do=profile" class="block">
                        <i class="comiis_font f_d">&#xe60c</i>
                        <span class="list01_limg bg_e"><?php echo avatar($user['uid'], 'middle'); ?></span>
                        <p class="tit"><?php echo $user['username'];?></p>
                        <p class="txt"><span class="bg_c f_f"><?php echo $comiis_lang['group_star_member_title'];?></span><?php if($user['online']) { ?><span class="bg_0 f_f"><?php echo $comiis_lang['login_normal_mode'];?></span><?php } ?><span class="f_d"><?php echo $comiis_lang['view18'];?><?php echo $comiis_lang['time'];?>: <?php echo date('Y-m-d', $user['joindateline']);; ?></span></p>
                      </a>
                    </li>
                    <?php } ?>
                  <?php } ?> 
                  <?php if($userlist) { ?>
                    <?php if(is_array($userlist)) foreach($userlist as $user) { ?>                    <li class="b_t">
                      <?php if($_G['adminid'] == 1 || $user['level'] > $groupuser['level']) { ?>
                         <input type="checkbox" id="comiis_muid[<?php echo $user['uid'];?>]" name="muid[<?php echo $user['uid'];?>]" value="<?php echo $user['level'];?>" />
                         <label for="comiis_muid[<?php echo $user['uid'];?>]" class="l_label"><i class="comiis_font"></i></label>
                      <?php } ?>
                      <a href="home.php?mod=space&amp;uid=<?php echo $user['uid'];?>&amp;do=profile" class="block">
                        <i class="comiis_font f_d">&#xe60c</i>
                        <span class="list01_limg bg_e"><?php echo avatar($user['uid'], 'middle'); ?></span>
                        <p class="tit"><?php echo $user['username'];?></p>
                        <p class="txt"><?php if($user['online']) { ?><span class="bg_0 f_f"><?php echo $comiis_lang['login_normal_mode'];?></span><?php } ?><span class="f_d"><?php echo $comiis_lang['view18'];?><?php echo $comiis_lang['time'];?>: <?php echo date('Y-m-d', $user['joindateline']);; ?></span></p>
                      </a>
                    </li>
                    <?php } ?>
                  <?php } ?> 
                </ul>
            </div>
            <?php } ?>  
        </div>
        <?php } ?>