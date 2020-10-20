<?php
//Discuz! cache file, DO NOT modify me!
//Created: Sep 29, 2018, 17:34
//Identify: a4832d8f1afea92b390174af506dda40

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
?>
	<?php if($isimagepoll) { $i = 0;?><div class="comiis_poll_imglist cl">
<ul><?php if(is_array($polloptions)) foreach($polloptions as $key => $option) { $i++;?><?php $imginfo=$option['imginfo'];?><li<?php if($i % 2 == 0) { ?> class="kmnor"<?php } ?>>
<div class="poll_imgbox b_ok">
<div class="poll_img">
<?php if($imginfo) { ?>
<a href="javascript:;" title="<?php echo $imginfo['filename'];?>" data-wcp="<?php echo $_G['siteurl'];?><?php echo $imginfo['big'];?>" class="poll_imgbg bg_f">
<img src="<?php echo $imginfo['small'];?>" alt="<?php echo $imginfo['filename'];?>" class="vm" />
</a>
<?php } else { ?>
<a href="javascript:;">
<div class="comiis_notip bg_e cl">
<i class="comiis_font f_e cl">&#xe627</i>
<span class="f_d"><?php echo $comiis_lang['all16'];?></span>
</div>
</a>
<?php } ?>
</div>
<?php if($_G['group']['allowvote']) { ?>
<input type="<?php echo $optiontype;?>" id="option_<?php echo $key;?>" name="pollanswers[]" value="<?php echo $option['polloptionid'];?>" <?php if($_G['forum_thread']['is_archived']) { ?>disabled="disabled"<?php } if($optiontype=='checkbox') { ?> onclick="poll_checkbox(this)"<?php } ?> />
<?php } ?>
<label for="option_<?php echo $key;?>"><?php if($_G['group']['allowvote']) { ?><i class="comiis_font f_d"><?php if($_G['forum_thread']['is_archived']) { if($optiontype == 'radio') { ?>&#xe645<?php } else { ?>&#xe644<?php } } else { if($optiontype == 'radio') { ?>&#xe646<?php } else { ?>&#xe643<?php } } ?></i><?php } ?><?php echo $option['polloption'];?></label>
<?php if(!$visiblepoll) { ?>
<div class="poll_ok bg_b cl">
<em style="width:<?php if($option['votes']==0) { ?>2<?php } else { ?><?php echo $option['percent'];?><?php } ?>%;background-color:#<?php echo $option['color'];?>"></em>
<p>
<span class="y<?php if($option['percent'] >95) { ?> f_f<?php } else { ?> f_d<?php } ?>"><?php echo $option['percent'];?>%</span>
<span class="z<?php if($option['percent'] >20) { ?> f_f<?php } else { ?> f_b<?php } ?>"><?php echo $option['votes'];?><?php echo $comiis_lang['view25'];?></span>
</p>
 </div>
<?php } ?>
</div>
</li>
<?php } ?> 
</ul>
</div>	
<?php } else { ?>
<div class="comiis_poll_list comiis_input_style cl">
<ul><?php if(is_array($polloptions)) foreach($polloptions as $key => $option) { ?><li class="<?php if($visiblepoll) { ?>b_t<?php } else { ?>kmnop<?php } ?>">
<?php if($_G['group']['allowvote']) { ?>
<input type="<?php echo $optiontype;?>" id="option_<?php echo $key;?>" name="pollanswers[]" value="<?php echo $option['polloptionid'];?>" <?php if($_G['forum_thread']['is_archived']) { ?>disabled="disabled"<?php } if($optiontype=='checkbox') { ?> onclick="poll_checkbox(this)"<?php } ?> />
<?php } ?>
<label for="option_<?php echo $key;?>"><?php if($_G['group']['allowvote']) { ?><i class="comiis_font f_d"><?php if($_G['forum_thread']['is_archived']) { if($optiontype == 'radio') { ?>&#xe645<?php } else { ?>&#xe644<?php } } else { if($optiontype == 'radio') { ?>&#xe646<?php } else { ?>&#xe643<?php } } ?></i><?php } ?><?php echo $option['polloption'];?></label>
</li>
<?php if(!$visiblepoll) { ?>
<li class="poll_ok cl">
<span class="bg_b">
<em style="width:<?php if($option['votes']==0) { ?>2<?php } else { ?><?php echo $option['percent'];?><?php } ?>%;background-color:#<?php echo $option['color'];?>"></em>
</span>
<em style="color:#<?php echo $option['color'];?>"><?php echo $option['percent'];?>% (<?php echo $option['votes'];?>)</em>
 </li>
<?php } } ?> 
</li>
</div>		
    <?php } ?>