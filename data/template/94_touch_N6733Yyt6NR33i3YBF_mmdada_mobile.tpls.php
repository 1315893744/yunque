<?php
//Discuz! cache file, DO NOT modify me!
//Created: Sep 29, 2018, 17:20
//Identify: 35400f76bf07fb1670f2a55082ba03ba

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
?>
<?php if($_G['comiis_new'] <= 1) { ?>
<h2>
<span class="y"><i class="comiis_font f_d" onclick="comiis_openrebox(0);" style="padding:10px 2px 10px 20px;">&#xe639</i></span>
<a href="forum.php?mod=post&amp;action=reply&amp;fid=<?php echo $_G['fid'];?>&amp;tid=<?php echo $_G['tid'];?>&amp;reppost=<?php echo $_G['forum_firstpid'];?>&amp;page=<?php echo $page;?>" class="f_0 y"><?php echo $comiis_lang['all26'];?></a>
<img src="<?php echo avatar($_G['uid'], small, true);?>" class="comiis_noloadimage"><span class="f_b"><?php echo $_G['member']['username'];?></span>
</h2>
<?php if($_G['forum_thread']['special'] == 5 && empty($firststand)) { ?>
<div class="comiis_login_select comiis_input_style">
<span class="inner">
<i class="comiis_font f_d">&#xe60c</i>
<span class="z">
<span class="comiis_question f_0" id="stand_name"></span>
</span>					
</span>
<select id="stand" name="stand" >
<option value=""><?php echo $comiis_lang['debate_viewpoint'];?></option>
<option value="0"><?php echo $comiis_lang['debate_neutral'];?></option>
<option value="1"><?php echo $comiis_lang['debate_square'];?></option>
<option value="2"><?php echo $comiis_lang['debate_opponent'];?></option>
</select>
</div>
<?php } ?>	
<div class="comiis_minipost_mes bg_f b_ok f_c cl">
<textarea name="message" id="needmessage" placeholder="<?php echo $comiis_lang['all27'];?>..." class="comiis_pt bg_f"></textarea>
</div>	
<?php if($secqaacheck || $seccodecheck) { ?>
<div class="comiis_minipost_sec b_b f_c cl" id="fastpostsubmitline"><?php include template('common/seccheck'); ?></div>
<?php } ?>	
<div class="comiis_post_ico comiis_minipost_ico f_c cl">
<a href="javascript:;"><i class="comiis_font">&#xe62e</i></a>
<a href="javascript:;" class="comiis_pictitle"><i class="comiis_font">&#xe627</i><span>0</span></a>
<input type="button" value="<?php echo $comiis_lang['reply'];?>" class="bg_0 f_f y" name="replysubmit" id="fastpostsubmit" comiis='handle'>
</div>
<div id="comiis_post_tab">
<div class="comiis_bqbox bg_f cl" style="display:none;">
<div class="bqbox_t b_t cl">
<ul id="comiis_smilies_key"></ul>
</div>
<div class="comiis_smiley_box b_t">
<div class="swiper-wrapper bqbox_c comiis_optimization"></div>
<div class="bqbox_b cl"></div>
</div>
</div>
<div class="comiis_upbox bg_f b_t cl" style="display:none;">
<ul id="imglist" class="comiis_post_imglist cl">
<li class="up_btn"><a href="javascript:;" class="bg_e b_ok f_d"><i class="comiis_font">&#xe610</i><input type="file" name="Filedata" id="filedata"<?php if($_G['comiis_isAndroid'] != 1) { ?> multiple="multiple"<?php } ?> accept="image/*" /></a></li><?php if(is_array($imgattachs['used'])) foreach($imgattachs['used'] as $temp) { ?><li><span aid="<?php echo $temp['aid'];?>" up="1" class="del"><a href="javascript:;"><i class="comiis_font f_g">&#xe648</i></a></span><span class="p_img"><a href="javascript:;"><img style="height:54px;width:54px;" id="aimg_<?php echo $temp['aid'];?>" title="<?php echo $temp['filename'];?>" src="<?php echo $_G['setting']['attachurl'];?>forum/<?php echo $temp['attachment'];?>" class="vm b_ok"></a></span><input type="hidden" name="attachnew[<?php echo $temp['aid'];?>][description]"></li>
<?php } ?>				
</ul>
</div>
</div>
<?php } else { ?>
    <div class="comiis_head bg_e b_b">
        <div class="header_z"><a onclick="comiis_openrebox(0);"><i class="comiis_font f_d">&#xe639</i></a></div>
        <h2><?php echo $comiis_lang['reply'];?></h2>
        <div class="header_y"><a href="forum.php?mod=post&amp;action=reply&amp;fid=<?php echo $_G['fid'];?>&amp;tid=<?php echo $_G['tid'];?>"><i class="comiis_font f_d">&#xe658</i></a></div>
    </div>
<?php if($_G['forum_thread']['special'] == 5 && empty($firststand)) { ?>
<div class="comiis_styli comiis_login_select comiis_input_style bg_f b_b">
<span class="inner">
<i class="comiis_font f_d">&#xe60c</i>
<span class="z">
<span class="comiis_question f_a" id="stand_name"></span>
</span>					
</span>
<select id="stand" name="stand" >
<option value=""><?php echo $comiis_lang['debate_viewpoint'];?></option>
<option value="0"><?php echo $comiis_lang['debate_neutral'];?></option>
<option value="1"><?php echo $comiis_lang['debate_square'];?></option>
<option value="2"><?php echo $comiis_lang['debate_opponent'];?></option>
</select>
</div>
<?php } ?>
    <div class="comiis_styli bg_f b_b cl">
        <textarea name="message" id="needmessage" placeholder="<?php echo $comiis_lang['all27'];?>..." class="comiis_pt bg_f comiis_mini_pt"></textarea>
    </div>	
<?php if($secqaacheck || $seccodecheck) { ?>
<div class="comiis_stylino comiis_minipost_sec bg_f b_b f_c cl" id="fastpostsubmitline"><?php include template('common/seccheck'); ?></div>
<?php } ?>
<div class="comiis_post_ico<?php if($comiis_app_switch['comiis_post_icotxt'] != 1) { ?> comiis_minipost_icot<?php } else { ?> comiis_minipost_ico<?php } ?> f_c cl">
<a href="javascript:;"><i class="comiis_font">&#xe62e<em><?php echo $comiis_lang['tip260'];?></em></i></a>
<a href="javascript:;" class="comiis_pictitle"><i class="comiis_font">&#xe627<em><?php echo $comiis_lang['view43'];?></em></i><span>0</span></a>
<span id="fastpostsubmitline" class="y">
<input type="button" value="<?php echo $comiis_lang['reply'];?>" class="bg_0 f_f" name="replysubmit" id="fastpostsubmit" comiis='handle'>
</span>
</div>
<div id="comiis_post_tab">
<div class="comiis_bqbox bg_f b_b cl" style="display:none;">
<div class="bqbox_t b_t cl">
<ul id="comiis_smilies_key"></ul>
</div>
<div class="comiis_smiley_box b_t">
<div class="swiper-wrapper bqbox_c comiis_optimization"></div>
<div class="bqbox_b cl"></div>
</div>
</div>
<div class="comiis_upbox bg_f b_t b_b cl" style="display:none;">
<ul id="imglist" class="comiis_post_imglist cl">
<li class="up_btn"><a href="javascript:;" class="bg_e b_ok f_d"><i class="comiis_font">&#xe610</i><input type="file" name="Filedata" id="filedata"<?php if($_G['comiis_isAndroid'] != 1) { ?> multiple="multiple"<?php } ?> accept="image/*" /></a></li><?php if(is_array($imgattachs['used'])) foreach($imgattachs['used'] as $temp) { ?><li><span aid="<?php echo $temp['aid'];?>" up="1" class="del"><a href="javascript:;"><i class="comiis_font f_g">&#xe648</i></a></span><span class="p_img"><a href="javascript:;"><img style="height:54px;width:54px;" id="aimg_<?php echo $temp['aid'];?>" title="<?php echo $temp['filename'];?>" src="<?php echo $_G['setting']['attachurl'];?>forum/<?php echo $temp['attachment'];?>" class="vm b_ok"></a></span><input type="hidden" name="attachnew[<?php echo $temp['aid'];?>][description]"></li>
<?php } ?>				
</ul>
</div>
</div>
<?php } ?>