<?php
//Discuz! cache file, DO NOT modify me!
//Created: Sep 29, 2018, 17:22
//Identify: f6ec8441ea04ac96cfee63ad8082f875

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
?>
	<div class="comiis_wzpost<?php if($showthreadsorts) { ?> comiis_post_sort<?php } ?> comiis_input_style bg_f b_t cl">
<ul class="cl">
<?php if($_GET['action'] == 'edit' && $isorigauthor && ($isfirstpost && $thread['replies'] < 1 || !$isfirstpost) && !$rushreply && $_G['setting']['editperdel']) { ?>
<li class="comiis_styli b_b cl">
<input type="checkbox" name="delete" id="delete" value="1" title="<?php echo $comiis_lang['post_delpost'];?><?php if($thread['special'] == 3) { ?><?php echo $comiis_lang['reward_price_back'];?><?php } ?>"> 
<label for="delete"><i class="comiis_font f_d">&#xe643</i><span class="f_g"><?php echo $comiis_lang['post_delpost'];?>?</span></label><?php echo $comiis_lang['del_thread_warning'];?><?php if($thread['special'] == 3) { ?>, <?php echo $comiis_lang['reward_price_back'];?><?php } ?>
</li>
<script>
$('#delete').on('click', function() {
if($(this).is(':checked')){
popup.open('<?php echo $comiis_lang['post42'];?>', 'alerts');
}
});
</script>
<?php } if($_GET['action'] == 'reply' && !empty($_GET['addtrade']) || $_GET['action'] == 'edit' && $thread['special'] == 2 && !$postinfo['first']) { ?>
<input name="subject" type="hidden" value="" />
<?php } else { if($_GET['action'] != 'reply') { if(!$comiis_postautotitle_notit) { ?>
<li class="comiis_styli comiis_flex b_b">
<div class="styli_tit f_c<?php if($_G['comiis_new'] > 1) { ?> f17<?php } ?>"><?php echo $comiis_lang['thread_subject'];?></div>
<div class="flex<?php if($_G['comiis_new'] > 1) { ?> f17<?php } ?>"><input type="text" class="comiis_input kmshow" id="needsubject" autocomplete="off" value="<?php echo $postinfo['subject'];?>" name="subject" placeholder="<?php if($_GET['action'] == 'edit') { ?>(<?php echo $comiis_lang['tip216'];?>)<?php } elseif($_GET['action'] == 'reply') { ?>(<?php echo $comiis_lang['tip216'];?>)<?php } else { ?>(<?php echo $comiis_lang['required'];?>)<?php } ?>" fwin="login"></div>
</li>
<?php } } else { ?>
                    <?php if($quotemessage) { ?>
                    <li class="comiis_styli kmquote b_b" style="padding-bottom:3px;">
                        <span class="f_d">RE: <?php echo $thread['subject'];?></span>
                        <?php echo $quotemessage;?>
                    </li>
                    <?php } } ?>				
<?php } if($isfirstpost && !empty($_G['forum']['threadtypes']['types'])) { ?>
<li class="comiis_styli comiis_flex b_b">
<div class="styli_tit f_c"><?php echo $comiis_lang['types'];?></div>
<div class="flex comiis_input_style">
<div class="comiis_login_select">
<span class="inner">
<i class="comiis_font f_d">&#xe60c</i>
<span class="z">
<span class="comiis_question" id="typeid_name"></span>
</span>					
</span>
<select id="typeid" name="typeid">
<option value="0" selected="selected"><?php echo $comiis_lang['please_select'];?></option><?php if(is_array($_G['forum']['threadtypes']['types'])) foreach($_G['forum']['threadtypes']['types'] as $typeid => $name) { if(empty($_G['forum']['threadtypes']['moderators'][$typeid]) || $_G['forum']['ismoderator']) { ?>
<option value="<?php echo $typeid;?>"<?php if($thread['typeid'] == $typeid || $_GET['typeid'] == $typeid) { ?> selected="selected"<?php } ?>><?php echo strip_tags($name);; ?></option>
<?php } } ?>
</select>
</div>	
</div>
</li>
<?php } ?>	
<?php if($special == 5 && $_GET['action'] == 'reply') { ?>
<li class="comiis_styli comiis_flex b_b">
<div class="styli_tit f_c"><?php echo $comiis_lang['debate_viewpoint'];?></div>
<div class="flex comiis_input_style">
<div class="comiis_login_select">
<span class="inner">
<i class="comiis_font f_d">&#xe60c</i>
<span class="z">
<span class="comiis_question" id="stand_name"></span>
</span>					
</span>
<select id="stand" name="stand" >
<option value=""><?php echo $comiis_lang['debate_viewpoint'];?></option>
<option value="0"><?php echo $comiis_lang['debate_neutral'];?></option>
<option value="1"><?php echo $comiis_lang['debate_square'];?></option>
<option value="2"><?php echo $comiis_lang['debate_opponent'];?></option>
</select>
</div>	
</div>
</li>
<?php } if($showthreadsorts) { include template('forum/post_sortoption'); } elseif($adveditor) { if($special == 1) { include template('forum/post_poll'); } elseif($special == 2) { include template('forum/post_trade'); } elseif($special == 3) { include template('forum/post_reward'); } elseif($special == 4) { include template('forum/post_activity'); } elseif($special == 5) { include template('forum/post_debate'); } } ?> 
<?php if($adveditor || $showthreadsorts || ($_GET['action'] == 'reply' && $quotemessage)) { ?><li class="comiis_stylitit b_b bg_e f_c"><?php echo $comiis_lang['thread_content'];?></li><?php } ?> 
<li class="comiis_stylino mt10">
<textarea class="comiis_pt" id="needmessage" tabindex="3" autocomplete="off" id="<?php echo $editorid;?>_textarea" name="<?php echo $editor['textarea'];?>" placeholder="<?php if($adveditor || $showthreadsorts) { ?><?php echo $comiis_lang['thread_content'];?>(<?php echo $comiis_lang['required'];?>)<?php } elseif($_GET['action'] == 'reply') { ?><?php echo $comiis_lang['all27'];?>...<?php } else { ?><?php echo $comiis_lang['tip10'];?><?php } ?>" fwin="reply"><?php echo $postinfo['message'];?></textarea>
</li>
<div class="comiis_upbox bg_f cl">
<ul id="imglist" class="comiis_post_imglist cl">
<li class="up_btn"><a href="javascript:;" class="bg_e b_ok f_d"><i class="comiis_font">&#xe610</i><input type="file" name="Filedata" id="filedata" class="kmshow" <?php if($_G['comiis_isAndroid'] != 1) { ?> multiple="multiple"<?php } ?> accept="image/*" /></a></li><?php if(is_array($imgattachs['used'])) foreach($imgattachs['used'] as $temp) { ?><li><span aid="<?php echo $temp['aid'];?>" up="1" class="del"><a href="javascript:;"><i class="comiis_font f_g">&#xe648</i></a></span><span class="charu  f_f"><?php echo $comiis_lang['tip220'];?></span><span class="p_img"><a href="javascript:;" onclick="comiis_addsmilies('[attachimg]<?php echo $temp['aid'];?>[/attachimg]')"><img style="height:54px;width:54px;" id="aimg_<?php echo $temp['aid'];?>" title="<?php echo $temp['filename'];?>" src="<?php echo $temp['url'];?>/<?php echo $temp['attachment'];?>" class="vm b_ok"></a></span><input type="hidden" name="attachnew[<?php echo $temp['aid'];?>][description]"></li>
<?php } ?>
</ul>
</div>
<?php if($comiis_postautotitle_notit) { ?>
<li class="comiis_styli comiis_flex b_t">
<div class="styli_tit f_c"><?php echo $comiis_lang['thread_subject'];?></div>
<div class="flex"><input type="text" class="comiis_input kmshow" id="needsubject" size="30" autocomplete="off" value="<?php echo $postinfo['subject'];?>" name="subject" placeholder="(<?php echo $comiis_lang['tip216'];?>)" fwin="login"></div>
</li>
<?php } ?>
</ul>
</div>