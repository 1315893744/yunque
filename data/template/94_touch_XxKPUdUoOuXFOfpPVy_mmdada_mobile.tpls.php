<?php
//Discuz! cache file, DO NOT modify me!
//Created: Sep 29, 2018, 17:06
//Identify: 588056c59d5603aebcf88ca497899396

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
?>
<?php if($_G['uid'] && (($_G['basescript'] == 'portal' && in_array(CURMODULE, array('index', 'list', 'view'))) || ($_G['basescript'] == 'forum' && in_array(CURMODULE, array('index', 'forumdisplay', 'viewthread'))) || ($_G['basescript'] == 'plugin' && CURMODULE == 'comiis_app_portal')) && ($_G['member']['newpm'] || $_G['member']['newprompt']) && $comiis_app_switch['comiis_showpm'] == 1) { ?>
<div class="comiis_pmtip_box bg_f b_b">
<a href="home.php?mod=space&amp;uid=<?php echo $_G['uid'];?>&amp;do=profile&amp;mycenter=1&amp;mobile=2#pm" class="comiis_pmtip">
<i class="comiis_font f_f">&#xe60c</i>
<img src="<?php echo avatar($_G['uid'],middle,true); ?>?<?php echo time();; ?>">
<span class="f_f comiis_tm"><?php echo $comiis_lang['tip218'];?> <?php echo $_G['member']['newpm'] + $_G['member']['newprompt']; ?> <?php echo $comiis_lang['tip219'];?></span>		
</a>
</div>
<?php } ?>