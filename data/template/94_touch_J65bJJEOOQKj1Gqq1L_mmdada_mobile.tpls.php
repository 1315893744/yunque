<?php
//Discuz! cache file, DO NOT modify me!
//Created: Sep 29, 2018, 17:34
//Identify: 405ab3fb94688d3a8e6583c9859fb2b3

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
?>
<?php if(empty($_GET['archiver'])) { ?>
<div class="comiis_quote bg_h">					
<?php if($thread['payers']) { ?><i class="comiis_font f_a">&#xe61d</i>&nbsp;<?php echo $comiis_lang['tip198'];?> <?php echo $thread['payers'];?> <?php echo $comiis_lang['tip199'];?><?php } ?>			
<?php if($_G['forum_thread']['price'] > 0) { ?><?php echo $comiis_lang['tip200'];?><?php echo $thread['price'];?><?php echo $_G['setting']['extcredits'][$_G['setting']['creditstransextra']['1']]['unit'];?><?php echo $_G['setting']['extcredits'][$_G['setting']['creditstransextra']['1']]['title'];?><?php echo $comiis_lang['tip201'];?><?php } ?>			
<?php if($thread['endtime']) { ?><?php echo $comiis_lang['tip203'];?><?php echo $thread['endtime'];?><?php echo $comiis_lang['tip204'];?><?php } ?>
<div class="cl"><a href="<?php if(!$_G['uid']) { ?>javascript:;<?php } else { ?>forum.php?mod=misc&action=pay&tid=<?php echo $_G['tid'];?>&pid=<?php echo $post['pid'];?><?php if(!empty($_GET['from'])) { ?>&from=<?php echo $_GET['from'];?><?php } } ?>" class="<?php if(!$_G['uid']) { ?>comiis_openrebox<?php } else { ?>dialog<?php } ?> y f_a"><i class="comiis_font">&#xe65b</i> <?php echo $comiis_lang['tip202'];?></a></div>
</div>
<?php } else { ?>
<div class="comiis_quote bg_h">
<?php if($thread['payers']) { ?><i class="comiis_font f_a">&#xe61d</i>&nbsp;<?php echo $comiis_lang['tip198'];?> <?php echo $thread['payers'];?> <?php echo $comiis_lang['tip199'];?><?php } ?>	
<?php if($_G['forum_thread']['price'] > 0) { ?><?php echo $comiis_lang['tip200'];?><?php echo $thread['price'];?><?php echo $_G['setting']['extcredits'][$_G['setting']['creditstransextra']['1']]['unit'];?><?php echo $_G['setting']['extcredits'][$_G['setting']['creditstransextra']['1']]['title'];?><?php echo $comiis_lang['tip201'];?><?php } ?>	
<?php if($thread['endtime']) { ?><?php echo $comiis_lang['tip203'];?><?php echo $thread['endtime'];?><?php echo $comiis_lang['tip204'];?><?php } ?>
</div>
<?php } ?>