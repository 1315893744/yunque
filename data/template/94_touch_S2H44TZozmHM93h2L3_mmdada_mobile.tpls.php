<?php
/**
 * @Author: 顾顾顾北辰
 * @Date:   2018-12-30 21:57:48
 * @Last Modified by:   Marte
 * @Last Modified time: 2018-12-30 22:33:19
 */
if(!defined('IN_DISCUZ')) {
    exit('Access Denied');
}
?>

<div class="bg_f b_b cl">
    <div class="comiis_userlist01 cl">
        <?php if(is_array($list)) foreach($list as $key => $value) { ?>
            <li class="b_t">
				<?php if($value['isfriend'] && !in_array($_GET['view'], array('blacklist', 'visitor', 'trace', 'online'))) { ?>
                    <a href="home.php?mod=spacecp&amp;ac=friend&amp;op=ignore&amp;uid=<?php echo $value['uid'];?>&amp;handlekey=delfriendhk" id="a_ignore_<?php echo $value['uid'];?>" class="dialog kmdel f_g comiis_font">&#xe647;</a>
				<?php } ?>
                <p class="ytit f_d">
                  	<?php if($value['isfriend'] != 1) { ?>
                  		<a href="home.php?mod=spacecp&amp;ac=friend&amp;op=add&amp;uid=<?php echo $value['uid'];?>&amp;handlekey=adduserhk_<?php echo $value['uid'];?>" id="a_friend_<?php echo $value['uid'];?>" class="dialog"><i class="comiis_font f_qq">&#xe60f;</i><font>加好友</font></a>
                    <?php } if($value['isfriend'] && !in_array($_GET['view'], array('blacklist', 'visitor', 'trace', 'online'))) { ?>
                        <a href="home.php?mod=spacecp&amp;ac=friend&amp;op=changegroup&amp;uid=<?php echo $value['uid'];?>&amp;handlekey=editgrouphk" id="friend_group_<?php echo $value['uid'];?>" class="dialog"><i class="comiis_font f_a">&#xe6db;</i><font>分组</font></a>
                   	<?php } if(isset($value['follow']) && $key != $_G['uid'] && $value['username'] != '') { ?>
                        <a href="home.php?mod=spacecp&amp;ac=follow&amp;op=<?php if($value['follow']) { ?>del<?php } else { ?>add<?php } ?>&amp;fuid=<?php echo $value['uid'];?>&amp;hash=<?php echo FORMHASH;?>&amp;from=a_followmod_<?php echo $value['uid'];?>&amp;handlekey=followmod" uid="<?php echo $value['uid'];?>" id="a_followmod_<?php echo $value['uid'];?>" class="dialog"><?php if($value['follow']) { ?><i class="comiis_font f_wb">&#xe79b;</i><font><?php echo $comiis_lang['all4'];?></font><?php } else { ?><i class="comiis_font f_wb">&#xe60e;</i><font><?php echo $comiis_lang['all37'];?></font><?php } ?></a>
                   <?php } ?>
                    <a href="home.php?mod=spacecp&amp;ac=poke&amp;op=send&amp;uid=<?php echo $value['uid'];?>" id="a_poke_<?php echo $value['uid'];?>"><i class="comiis_font f_wx">&#xe638;</i><font>打招呼</font></a>
                    <a href="home.php?mod=space&amp;do=pm&amp;subop=view&amp;touid=<?php echo $value['uid'];?>" id="a_sendpm_<?php echo $value['uid'];?>"><i class="comiis_font f_a">&#xe665;</i><font>发消息</font></a>
                </p>
                <a href="home.php?mod=space&amp;uid=<?php echo $value['uid'];?>&amp;do=profile" class="list01_limg bg_e"><?php echo avatar($value[uid],middle);?></a>
                <p class="tit">
                    <a href="home.php?mod=space&amp;uid=<?php echo $value['uid'];?>&amp;do=profile" <?php g_color($value[groupid]);?>><?php echo $value['username'];?></a>
					<?php if($value['isfriend'] && !in_array($_GET['view'], array('blacklist', 'visitor', 'trace', 'online'))) { ?>
                        <a href="home.php?mod=spacecp&amp;ac=friend&amp;op=editnote&amp;uid=<?php echo $value['uid'];?>&amp;handlekey=editnote" id="friend_editnote" class="dialog"><font class="f_d f13 kmtit comiis_font">&#xe62d;</font></a>
    				<?php } ?>
                </p>
                <p class="txt">
                  <?php if($value['note']) { ?>
                    <span class="friend_bz f_0" id="friend_bz_<?php echo $value['uid'];?>"><?php echo $value['note'];?></span>
                  <?php } else {?>
                  	<span class="f_d"><?php echo dgmdate($value[dateline], 'n'.$comiis_lang['tip194'].'j'.$comiis_lang['all15']);?></span>
                  <?php } ?>
                </p>
            </li>
        <?php } ?>
        </div>
</div>