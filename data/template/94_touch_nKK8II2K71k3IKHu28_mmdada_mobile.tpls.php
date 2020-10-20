<?php
//Discuz! cache file, DO NOT modify me!
//Created: Sep 29, 2018, 17:41
//Identify: 17208d754565b0f2e07c98fbe30dbd44

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
?>
<?php if(is_array($list)) foreach($list as $fuid => $fuser) { if($do=='following') { ?>
<li class="b_t cl" id="comiis_friendbox_<?php echo $fuid;?>">
<div class="tx_img"><a href="home.php?mod=space&amp;uid=<?php echo $fuser['followuid'];?>&amp;do=profile"><?php echo avatar($fuser['followuid'],middle);?></a></div>
<h2>
<?php if($fuser['followuid'] != $_G['uid']) { if($fuser['mutual']) { if($fuser['mutual'] > 0) { ?><span class="y f_d"><?php echo $comiis_lang['tip186'];?></span><?php } else { ?><span class="y f_d">ta<?php echo $comiis_lang['tip187'];?></span><?php } } } ?>
<a href="home.php?mod=space&amp;uid=<?php echo $fuser['followuid'];?>&amp;do=profile"><?php echo $fuser['fusername'];?></a>
<span class="friend_bz f_0" id="followbkame_<?php echo $fuser['followuid'];?>"><?php if($fuser['bkname']) { ?><?php echo $fuser['bkname'];?><?php } ?></span>
</h2>
<div class="friend_txt f_d"><?php echo $fuser['recentnote'];?></div>
<div class="friend_gl">											
<?php if($viewself) { ?>
<a id="a_followmod_<?php echo $fuser['followuid'];?>" uid="<?php echo $fuser['followuid'];?>" href="home.php?mod=spacecp&amp;ac=follow&amp;op=del&amp;fuid=<?php echo $fuser['followuid'];?>&amp;handlekey=following" class="b_ok f_c user_gz bg_b f_c" comiis="handle"><?php echo $comiis_lang['all4'];?></a>
<?php } elseif($fuser['followuid'] != $_G['uid']) { if($fuser['mutual']) { ?>
<a id="a_followmod_<?php echo $fuser['followuid'];?>" uid="<?php echo $fuser['followuid'];?>" href="home.php?mod=spacecp&amp;ac=follow&amp;op=del&amp;fuid=<?php echo $fuser['followuid'];?>"  class="b_ok f_c user_gz bg_b f_c"><?php echo $comiis_lang['all4'];?></a>
<?php } elseif(helper_access::check_module('follow')) { ?>
<a id="a_followmod_<?php echo $fuser['followuid'];?>" uid="<?php echo $fuser['followuid'];?>" href="home.php?mod=spacecp&amp;ac=follow&amp;op=add&amp;hash=<?php echo FORMHASH;?>&amp;fuid=<?php echo $fuser['followuid'];?>"  class="b_ok f_c user_gz"><?php echo $comiis_lang['all3'];?>ta</a>
<?php } } if($viewself && $fuser['followuid'] != $_G['uid']) { ?>
<a href="home.php?mod=spacecp&amp;ac=follow&amp;op=bkname&amp;fuid=<?php echo $fuser['followuid'];?>&amp;handlekey=followbkame_<?php echo $fuser['followuid'];?>" id="fbkname_<?php echo $fuser['followuid'];?>" class="b_ok f_c dialog"><?php if($fuser['bkname']) { ?><?php echo $comiis_lang['tip189'];?><?php } else { ?><?php echo $comiis_lang['tip190'];?><?php } ?></a>
<?php if(helper_access::check_module('follow')) { ?>
<a id="a_specialfollow_<?php echo $fuser['followuid'];?>" href="home.php?mod=spacecp&amp;ac=follow&amp;op=add&amp;handlekey=specialfollow&amp;hash=<?php echo FORMHASH;?>&amp;special=<?php if($fuser['status'] == 1) { ?>2<?php } else { ?>1<?php } ?>&amp;fuid=<?php echo $fuser['followuid'];?>" class="b_ok f_c dialog" comiis="handle"><?php if($fuser['status'] == 1) { ?><?php echo $comiis_lang['tip185'];?><?php } else { ?><?php echo $comiis_lang['tip184'];?><?php } ?></a>
<?php } } ?>
</div>
</li>
<?php } else { ?>
<li class="b_t cl" id="comiis_friendbox_<?php echo $fuser['uid'];?>">
<div class="tx_img"><a href="home.php?mod=space&amp;uid=<?php echo $fuser['uid'];?>&amp;do=profile"><?php echo avatar($fuser['uid'],middle);?></a></div>
<h2>
<span class="y f_d" id="comiis_friendtip_<?php echo $fuser['uid'];?>">
<?php if($fuser['uid'] != $_G['uid']) { if($fuser['mutual']) { ?>
<?php echo $comiis_lang['tip186'];?>
<?php } } ?>
</span>
<a href="home.php?mod=space&amp;uid=<?php echo $fuser['uid'];?>&amp;do=profile"><?php echo $fuser['username'];?></a>
</h2>
<div class="friend_txt f_d"><?php echo $fuser['recentnote'];?></div>
<div class="friend_gl">											
<?php if($fuser['uid'] != $_G['uid']) { if($fuser['mutual']) { ?>
<a id="a_followmod_<?php echo $fuser['uid'];?>" uid="<?php echo $fuser['uid'];?>" href="home.php?mod=spacecp&amp;ac=follow&amp;op=del&amp;fuid=<?php echo $fuser['uid'];?>&amp;handlekey=follower" class=" f_c user_gz bg_b f_c" comiis="handle"><?php echo $comiis_lang['all4'];?></a>
<?php } elseif(helper_access::check_module('follow')) { ?>
<a id="a_followmod_<?php echo $fuser['uid'];?>" uid="<?php echo $fuser['uid'];?>" href="home.php?mod=spacecp&amp;ac=follow&amp;op=add&amp;hash=<?php echo FORMHASH;?>&amp;fuid=<?php echo $fuser['uid'];?>&amp;handlekey=follower" class="f_c user_gz bg_0 f_f" comiis="handle"><?php echo $comiis_lang['all3'];?>ta</a>
<?php } } ?>
</div>
</li>
<?php } } ?>