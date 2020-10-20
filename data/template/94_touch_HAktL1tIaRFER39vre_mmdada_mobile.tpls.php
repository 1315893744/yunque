<?php
//Discuz! cache file, DO NOT modify me!
//Created: Sep 29, 2018, 17:45
//Identify: 7e94451aedcbd79bb7d60598fa320100

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
?>
	<div class="comiis_space_info f_f">
<div class="comiis_space_tx<?php if($comiis_app_switch['comiis_space_header']==1) { ?> comiis_space_txv1<?php } ?>">
<?php if($comiis_app_switch['comiis_space_header']==1) { if(helper_access::check_module('follow') && $space['uid'] != $_G['uid']) { ?>
<div class="comiis_space_flw"><?php $follow = 0;?><?php $follow = C::t('home_follow')->fetch_all_by_uid_followuid($_G['uid'], $space['uid']);?><?php if(!$follow) { ?>
<a id="followmod" href="<?php if($_G['uid']) { ?>home.php?mod=spacecp&ac=follow&op=add&hash=<?php echo FORMHASH;?>&fuid=<?php echo $space['uid'];?><?php } elseif(!$_G['connectguest']) { ?>javascript:popup.open('<?php echo $comiis_lang['tip16'];?>', 'confirm', 'member.php?mod=logging&action=login');<?php } else { ?>javascript:popup.open('<?php echo $comiis_lang['reg23'];?>', 'confirm', 'member.php?mod=connect');<?php } ?>"<?php if($_G['uid']) { ?> class="dialog"<?php } ?>><i class="comiis_font">&#xe60e</i><?php echo $comiis_lang['all3'];?>Ta</a>
<?php } else { ?>
<a id="followmod" href="home.php?mod=spacecp&amp;ac=follow&amp;op=del&amp;fuid=<?php echo $space['uid'];?>" class="dialog"><i class="comiis_font">&#xe60e</i><?php echo $comiis_lang['all4'];?></a>
<?php } ?>
</div>
<?php } } ?>
<div class="user_img"><img src="<?php echo avatar($space[uid], middle, true);?>" /></div>
<h2 class="fyy"><?php echo $space['username'];?></h2>
<p>
<?php if($_G['comiis_new'] <= 1) { ?>
                <span class="fyy">Lv.<?php echo $_G['cache']['usergroups'][$space['groupid']]['stars'];?> <?php echo strip_tags($_G['cache']['usergroups'][$space['groupid']]['grouptitle']);; ?></span>
            <?php } else { ?>
                <span class="kmlev bg_0 f_f"<?php if($_G['cache']['usergroups'][$_G['member']['groupid']]['color']) { ?> style="background:<?php echo $_G['cache']['usergroups'][$_G['member']['groupid']]['color'];?> !important;color:#fff !important"<?php } ?>><?php if($comiis_app_switch['comiis_lev_txt']) { ?><?php echo $comiis_app_switch['comiis_lev_txt'];?><?php } else { ?>Lv.<?php } ?><?php echo $_G['cache']['usergroups'][$space['groupid']]['stars'];?></span>
                <span class="fyy"><?php echo strip_tags($_G['cache']['usergroups'][$space['groupid']]['grouptitle']);; ?></span>
            <?php } ?>			
</p>
</div>
</div>