<?php
//Discuz! cache file, DO NOT modify me!
//Created: Sep 29, 2018, 17:51
//Identify: d45dc44f5f25076ce8afaee01c4cccd0

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
?>
				<input type="hidden" name="formhash" value="<?php echo FORMHASH;?>" />
<input type="hidden" name="referer" value="<?php echo $_G['qc']['dreferer'];?>" />
<input type="hidden" id="auth_hash" name="auth_hash" value="<?php echo $_G['qc']['connect_auth_hash'];?>" />
<input type="hidden" id="is_notify" name="is_notify" value="<?php echo $_G['qc']['connect_is_notify'];?>" />
<input type="hidden" id="is_feed" name="is_feed" value="<?php echo $_G['qc']['connect_is_feed'];?>" />
<input type="hidden" name="use_qqshow" value="1" id="use_qqshow_bind">
<ul class="bg_f b_t b_b">
                <?php if($_G['comiis_new'] <= 1) { ?>
                    <li class="comiis_styli comiis_flex">
                        <?php if($_G['setting']['autoidselect']) { ?>
                            <div class="styli_tit f_c"><?php echo $comiis_lang['username'];?></div>
                        <?php } else { ?>
                            <div class="styli_tit f_c">
                                <div class="comiis_input_style">
                                  <div class="comiis_login_select">
                                  <span class="inner">
                                    <i class="comiis_font f_d">&#xe620</i>
                                    <span class="z">
                                    <span class="comiis_question" id="loginfield_<?php echo $loginhash;?>_name"></span>
                                    </span>					
                                  </span>
                                  <select name="loginfield" id="loginfield_<?php echo $loginhash;?>">
                                    <option value="username"><?php echo $comiis_lang['username'];?></option>
                                    <option value="uid">UID</option>
                                    <option value="email"><?php echo $comiis_lang['email'];?></option>
                                  </select>
                                  </div>	
                                </div>
                            </div>
                        <?php } ?>
                        <div class="flex"><input type="text" value="" name="username" id="username_<?php echo $loginhash;?>" autocomplete="off" placeholder="<?php echo $comiis_lang['inputyourname'];?>" class="comiis_input"></div>
                    </li>
                    <li class="comiis_styli comiis_flex b_t">
                        <div class="styli_tit f_c"><?php echo $comiis_lang['password'];?></div>
                        <div class="flex"><input type="password" id="password3_<?php echo $loginhash;?>" name="password" placeholder="<?php echo $comiis_lang['reg13'];?>" class="comiis_input"></div>
                    </li>
                <?php } else { ?>
                    <li class="comiis_flex qqli styli_zico f16">                        
                        <?php if($_G['setting']['autoidselect']) { ?>
                            <div class="styli_tit"><?php if($comiis_app_switch['comiis_reg_ico']==1) { ?><i class="comiis_font f_d">&#xe61e</i><?php } if($comiis_app_switch['comiis_reg_tit']==1) { ?><?php echo $comiis_lang['tip295'];?><?php } ?></div>
                        <?php } else { ?>
                            <div class="styli_tit">                                
                                <div class="comiis_input_style">
                                  <div class="comiis_login_select">
                                  <span class="inner">
                                    <i class="comiis_font f_d" style="padding-top:0;padding-left:5px;">&#xe620</i>
                                    <?php if($comiis_app_switch['comiis_reg_ico']==1) { ?><i class="comiis_font f_d" style="float:left;padding-top:0;font-size:17px;">&#xe61e</i><?php } ?>
                                    <span class="z">
                                    <span class="comiis_question" id="loginfield_<?php echo $loginhash;?>_name"></span>
                                    </span>					
                                  </span>
                                  <select name="loginfield" id="loginfield_<?php echo $loginhash;?>">
                                    <option value="username"><?php echo $comiis_lang['tip295'];?></option>
                                    <option value="uid">UID</option>
                                    <option value="email"><?php echo $comiis_lang['reg24'];?></option>
                                  </select>
                                  </div>	
                                </div>
                            </div>
                        <?php } ?>
                        <div class="flex"><input type="text" value="" name="username" id="username_<?php echo $loginhash;?>" autocomplete="off" placeholder="<?php echo $comiis_lang['inputyourname'];?>" class="comiis_input"></div>
                    </li>
                    <li class="comiis_flex qqli styli_zico f16 b_t">
                        <div class="styli_tit"><?php if($comiis_app_switch['comiis_reg_ico']==1) { ?><i class="comiis_font f_d">&#xe61d</i><?php } if($comiis_app_switch['comiis_reg_tit']==1) { ?><?php echo $comiis_lang['tip171'];?><?php } ?></div>
                        <div class="flex"><input type="password" id="password3_<?php echo $loginhash;?>" name="password" placeholder="<?php echo $comiis_lang['reg13'];?>" class="comiis_input"></div>
                    </li>
                <?php } ?>