<?php
//Discuz! cache file, DO NOT modify me!
//Created: Sep 29, 2018, 17:28
//Identify: 26054cc4dae4a5028bef960eaa4b3d8d

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
?>
    <?php if($_GET['action'] == 'delpost') { ?>
<dt class="f_b"><p><?php echo $comiis_lang['admin_delpost_confirm'];?></p></dt>
<?php echo $deleteid;?>
<?php } elseif($_GET['action'] == 'delcomment') { ?>
<?php echo $deleteid;?>
<dt class="f_b"><p><?php echo $comiis_lang['topicadmin_delet_comment'];?></p></dt>
<?php } elseif($_GET['action'] == 'banpost') { ?>
<div class="tip_tit bg_e mb5 f_b b_b"><?php echo $comiis_lang['modmenu_banthread'];?></div>
<dt class="kmlab f_b">
<?php echo $banid;?>
<div class="comiis_tip_radios">
<input type="radio" name="banned" value="1" <?php echo $checkban;?> id="comiis_ban_1" />
<label for="comiis_ban_1"><i class="comiis_font<?php if($checkban) { ?> f_0<?php } else { ?> f_d<?php } ?>"><?php if($checkban) { ?>&#xe645<?php } else { ?>&#xe646<?php } ?></i><?php echo $comiis_lang['admin_banpost'];?></label>
<input type="radio" name="banned" value="0" <?php echo $checkunban;?> id="comiis_ban_2" />
<label for="comiis_ban_2"><i class="comiis_font<?php if($checkunban) { ?> f_0<?php } else { ?> f_d<?php } ?>"><?php if($checkunban) { ?>&#xe645<?php } else { ?>&#xe646<?php } ?></i><?php echo $comiis_lang['admin_unbanpost'];?></label>
</div>
</dt>
    <?php } elseif($_GET['action'] == 'warn') { ?>
<div class="tip_tit bg_e mb5 f_b b_b"><?php echo $comiis_lang['modmenu_warn'];?></div>
<dt class="kmlab f_b">
            <?php echo $warnpid;?>
            <div class="comiis_tip_radios">
<input type="radio" name="warned" value="1" <?php echo $checkwarn;?> id="comiis_warn_1" />
<label for="comiis_warn_1"><i class="comiis_font<?php if($checkwarn) { ?> f_0<?php } else { ?> f_d<?php } ?>"><?php if($checkwarn) { ?>&#xe645<?php } else { ?>&#xe646<?php } ?></i><?php echo $comiis_lang['topicadmin_warn_add'];?></label>
<input type="radio" name="warned" value="0" <?php echo $checkunwarn;?> id="comiis_warn_2" />
<label for="comiis_warn_2"><i class="comiis_font<?php if($checkunwarn) { ?> f_0<?php } else { ?> f_d<?php } ?>"><?php if($checkunwarn) { ?>&#xe645<?php } else { ?>&#xe646<?php } ?></i><?php echo $comiis_lang['topicadmin_warn_delete'];?></label>
</div>
</dt>
<?php } elseif($_GET['action'] == 'removereward') { ?>
<dt class="f_b">	
<p><?php echo $comiis_lang['confirms'];?><?php echo $comiis_lang['modmenu_removereward'];?>?</p>
</dt>		
<?php } elseif($_GET['action'] == 'copy') { ?>	
<div class="tip_tit bg_e mb10 f_b b_b"><?php echo $comiis_lang['modmenu_copy'];?></div>
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
<span class="comiis_question f_c" id="copyto_name"></span>
</span>					
</span>
<select name="copyto" id="copyto" onchange="comiis_getthreadtypes(this.value, 'threadtypes')"><?php echo $forumselect;?></select>
</div>
</div>
</div>
</div>
<div class="comiis_flex mt5 cl">
<div class="styli_tit"><?php echo $comiis_lang['admin_targettype'];?></div>
<div class="flex">
<div class="comiis_styli comiis_styli_select cl" id="threadtypes">
<div class="comiis_login_select comiis_inner bg_e b_ok">
<span class="inner">
<i class="comiis_font f_d">&#xe60c</i>
<span class="z">
<span class="comiis_question f_c" id="copytook_name"></span>
</span>					
</span>
<select id="copytook" name="threadtypeid"><option value="0" /></option></select>
</div>
</div>
</div>
</div>
</dt>
<?php } elseif($_GET['action'] == 'merge') { ?>
<div class="tip_tit bg_e f_b b_b"><?php echo $comiis_lang['admin_merge'];?></div>
<dt class="kmlabs f_b">
<p><?php echo $comiis_lang['admin_merge_tid'];?>:</p>
<p class="kmpx bg_e b_ok"><input type="text" name="othertid" id="othertid" class="kmshow comiis_px" /></p>
</dt>
<?php } elseif($_GET['action'] == 'refund') { ?>
<div class="tip_tit bg_e f_b b_b"><?php echo $comiis_lang['modmenu_restore'];?></div>
<dt class="kmlabs f_b" style="padding:5px 15px;">
<div class="comiis_quote bg_h f_b">
<?php echo $comiis_lang['pay_buyers'];?> <?php echo $payment['payers'];?><br>
<?php echo $comiis_lang['pay_author_income'];?> <?php echo $payment['netincome'];?> <?php echo $_G['setting']['extcredits'][$_G['setting']['creditstransextra']['1']]['unit'];?><?php echo $_G['setting']['extcredits'][$_G['setting']['creditstransextra']['1']]['title'];?>
</div>
</dt>				
<?php } elseif($_GET['action'] == 'split') { ?>
<div class="tip_tit bg_e f_b b_b"><?php echo $comiis_lang['modmenu_split'];?></div>
<dt class="kmlabs f_b">
<p><?php echo $comiis_lang['admin_split_newsubject'];?></p>
<p class="kmpx bg_e b_ok"><input type="text" name="subject" id="subject" class="kmshow comiis_px" /></p>
<p><?php echo $comiis_lang['admin_split_comment'];?></p>
<p class="kmpx bg_e b_ok"><textarea name="split" id="split" class="comiis_pt f_c" /></textarea></p>
</dt>
<?php } elseif($_GET['action'] == 'live') { ?>			
<div class="tip_tit bg_e mb5 f_b b_b"><?php echo $comiis_lang['modmenu_live'];?></div>
<dt class="comiis_input_style comiis_tip_radios kmlabs f_b">			
<input type="radio" id="comiis_live_1" name="live" value="1"<?php if($_G['forum']['livetid'] != $_G['tid']) { ?> checked="checked"<?php } ?> />
<label for="comiis_live_1"><i class="comiis_font"></i><?php echo $comiis_lang['admin_live'];?> </label>
<input type="radio" id="comiis_live_2" name="live" value="0"<?php if($_G['forum']['livetid'] == $_G['tid']) { ?> checked="checked"<?php } ?> />
<label for="comiis_live_2"><i class="comiis_font"></i><?php echo $comiis_lang['admin_live_cancle'];?></label>
<div class="comiis_quote bg_h f_b" style="margin-bottom:5px;"><?php echo $comiis_lang['admin_live_tips'];?></div>
</dt>
<?php } elseif($_GET['action'] == 'stamp') { ?>
<div class="tip_tit bg_e f_b b_b"><?php echo $comiis_lang['modmenu_stamp'];?></div>
<dt class="kmlab f_b">
<p><?php echo $comiis_lang['admin_stamp_select'];?></p>
<div class="comiis_styli comiis_styli_select cl">
<div class="comiis_login_select comiis_inner bg_e b_ok">
<span class="inner">
<i class="comiis_font f_d">&#xe60c</i>
<span class="z">
<span class="comiis_question f_c" id="stamp_name"></span>
</span>					
</span>
<select name="stamp" id="stamp">
<option value=""><?php echo $comiis_lang['admin_stamp_none'];?></option><?php if(is_array($_G['cache']['stamps'])) foreach($_G['cache']['stamps'] as $stampid => $stamp) { if($stamp['type'] == 'stamp') { ?>
<option value="<?php echo $stampid;?>"<?php if($thread['stamp'] == $stampid) { ?> selected="selected"<?php } ?>><?php echo $stamp['text'];?></option>
<?php } } ?>
</select>
</div>
</div>
</dt>
<?php } elseif($_GET['action'] == 'stamplist') { ?>
<div class="tip_tit bg_e f_b b_b"><?php echo $comiis_lang['modmenu_icon'];?></div>
<dt class="kmlab f_b">
<p><?php echo $comiis_lang['admin_stamplist_select'];?></p>
<div class="comiis_styli comiis_styli_select cl">
<div class="comiis_login_select comiis_inner bg_e b_ok">
<span class="inner">
<i class="comiis_font f_d">&#xe60c</i>
<span class="z">
<span class="comiis_question f_c" id="stamplist_name"></span>
</span>					
</span>
<select name="stamplist" id="stamplist">
<?php if($thread['icon'] >= 0) { ?><option value="<?php echo $thread['icon'];?>"><?php echo $comiis_lang['admin_stamplist_current'];?></option><?php } ?>
<option value=""><?php echo $comiis_lang['admin_stamplist_none'];?></option><?php if(is_array($_G['cache']['stamps'])) foreach($_G['cache']['stamps'] as $stampid => $stamp) { if($stamp['type'] == 'stamplist' && $stamp['icon']) { ?>
<option value="<?php echo $stampid;?>"<?php if($thread['icon'] == $stampid) { ?> selected="selected"<?php } ?>><?php echo $stamp['text'];?></option>
<?php } } ?>
</select>
</div>
</div>
</dt>
<?php } elseif($_GET['action'] == 'stickreply') { ?>
<div class="tip_tit bg_e mb5 f_b b_b"><?php echo $comiis_lang['admin_select_piece'];?> <?php echo $modpostsnum;?> <?php echo $comiis_lang['admin_select_piece1'];?></div>
<dt class="kmlab f_b">
<?php echo $stickpid;?>
<div class="comiis_tip_radios">
<input type="radio" name="stickreply" value="1" <?php if(empty($_GET['undo'])) { ?> checked="checked"<?php } ?> id="comiis_ban_1" />
<label for="comiis_ban_1"><i class="comiis_font"></i><?php echo $comiis_lang['admin_stickreply'];?></label>
<input type="radio" name="stickreply" value="0" <?php if(!empty($_GET['undo'])) { ?> checked="checked"<?php } ?> id="comiis_ban_2" />
<label for="comiis_ban_2"><i class="comiis_font"></i><?php echo $comiis_lang['admin_unstickreply'];?></label>
</div>
</dt>
    <?php } ?>