<?php
//Discuz! cache file, DO NOT modify me!
//Created: Sep 29, 2018, 17:49
//Identify: 35b69517a89302bcfd4885322dad576b

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
?>
				<?php if(!$_G['setting']['connect']['allow'] || !$conisregister) { ?>
<li class="comiis_flex comiis_styli b_b cl">
<div class="styli_tit f_c"><?php echo $comiis_lang['tip181'];?><span class="f_g">*</span></div>
<div class="flex"><input type="password" name="oldpassword" id="oldpassword" class="comiis_input" /></div>
</li>
<?php } ?>
<li class="comiis_flex comiis_styli b_b cl">
<div class="styli_tit f_c"><?php echo $comiis_lang['tip182'];?></div>
<div class="flex"><input type="password" name="newpassword" id="newpassword" class="comiis_input" /></div>
</li>
<li class="comiis_flex comiis_styli b_b cl">
<div class="styli_tit f_c"><?php echo $comiis_lang['tip183'];?></div>
<div class="flex"><input type="password" name="newpassword2" id="newpassword2" class="comiis_input" /></div>
</li>
<li class="comiis_flex comiis_styli cl">
<div class="styli_tit f_c">Email</div>
<div class="flex"><input type="text" name="emailnew" id="emailnew" value="<?php echo $space['email'];?>" class="comiis_input b_b" style="padding-bottom:5px;" /></div>
</li>
<li class="styli_tip b_b cl">
<?php if(empty($space['newemail'])) { ?>
<span class="f_a"><i class="comiis_font">&#xe62e</i> <?php echo $comiis_lang['reg10'];?></span>
<?php } else { ?>
<a href="home.php?mod=spacecp&amp;ac=profile&amp;op=password&amp;resend=1" class="y f_g dialog"><?php echo $comiis_lang['reg11'];?></a>
<span class="f_a"><i class="comiis_font">&#xe614</i> <?php echo $space['newemail'];?> <?php echo $comiis_lang['reg12'];?>...</span>
<?php } ?>		
</li>