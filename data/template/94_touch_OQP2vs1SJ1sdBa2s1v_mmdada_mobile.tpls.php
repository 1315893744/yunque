<?php


if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
?>
        <div class="bg_f b_b cl">
            <div class="comiis_userlist01 cl">
            <?php if(is_array($list)) foreach($list as $fuid => $fuser) { ?>                <?php if($do=='following') { ?>
                 <li class="b_t">
                    <p class="ytit f_d">                              
                         <?php if($viewself) { ?>
                         <a href="home.php?mod=spacecp&amp;ac=follow&amp;op=del&amp;fuid=<?php echo $fuser['followuid'];?>&amp;handlekey=following" id="a_followmod_<?php echo $fuser['followuid'];?>" uid="<?php echo $fuser['followuid'];?>" class="user_gz" comiis="handle"><i class="comiis_font f_wb">&#xe79b</i><font><?php echo $comiis_lang['all9'];?></font></a>                                 
                        <?php } elseif($fuser['followuid'] != $_G['uid']) { ?>
                            <?php if($fuser['mutual']) { ?>
                                <a href="home.php?mod=spacecp&amp;ac=follow&amp;op=del&amp;fuid=<?php echo $fuser['followuid'];?>" id="a_followmod_<?php echo $fuser['followuid'];?>" uid="<?php echo $fuser['followuid'];?>" class="user_gz"><i class="comiis_font f_wb">&#xe79b</i><font><?php echo $comiis_lang['all9'];?></font></a>
                            <?php } elseif(helper_access::check_module('follow')) { ?>
                                <a href="home.php?mod=spacecp&amp;ac=follow&amp;op=add&amp;hash=<?php echo FORMHASH;?>&amp;fuid=<?php echo $fuser['followuid'];?>" id="a_followmod_<?php echo $fuser['followuid'];?>" uid="<?php echo $fuser['followuid'];?>" class="user_gz"><i class="comiis_font f_wb">&#xe60e</i><font><?php echo $comiis_lang['all3'];?></font></a>
                            <?php } ?>
                        <?php } ?>                                
                        <?php if($viewself && $fuser['followuid'] != $_G['uid']) { ?>
                            <a href="home.php?mod=spacecp&amp;ac=follow&amp;op=bkname&amp;fuid=<?php echo $fuser['followuid'];?>&amp;handlekey=followbkame_<?php echo $fuser['followuid'];?>" id="fbkname_<?php echo $fuser['followuid'];?>" class="dialog"><i class="comiis_font f_qq">&#xe633</i><font><?php echo $comiis_lang['tip193'];?></font></a>
                            <?php if(helper_access::check_module('follow')) { ?>
                            <a href="home.php?mod=spacecp&amp;ac=follow&amp;op=add&amp;handlekey=specialfollow&amp;hash=<?php echo FORMHASH;?>&amp;special=<?php if($fuser['status'] == 1) { ?>2<?php } else { ?>1<?php } ?>&amp;fuid=<?php echo $fuser['followuid'];?>" id="a_specialfollow_<?php echo $fuser['followuid'];?>" class="dialog" comiis="handle"><?php if($fuser['status'] == 1) { ?><i class="comiis_font f_wx">&#xe64c</i><font><?php echo $comiis_lang['tip185'];?></font><?php } else { ?><i class="comiis_font f_wx">&#xe617</i><font><?php echo $comiis_lang['tip184'];?></font><?php } ?></a>
                            <?php } ?>
                        <?php } ?>                                
                    </p>
                    <a href="home.php?mod=space&amp;uid=<?php echo $fuser['followuid'];?>&amp;do=profile" class="list01_limg bg_e"><?php echo avatar($fuser['followuid'],middle);?></a>
                    <p class="tit">
                        <a href="home.php?mod=space&amp;uid=<?php echo $fuser['followuid'];?>&amp;do=profile"><?php echo $fuser['fusername'];?></a><font class="kmtit f_0" id="followbkame_<?php echo $fuser['followuid'];?>"><?php echo $fuser['bkname'];?></font>
                    </p>
                    <p class="txt">
                        <a href="home.php?mod=follow&amp;do=follower&amp;uid=<?php echo $fuser['followuid'];?>"><font class="f_d"><code class="f_a" id="followernum_<?php echo $fuser['followuid'];?>"><?php echo $memberinfo[$fuid]['follower'];?></code> <?php echo $comiis_lang['all73'];?></font></a>
                        <a href="home.php?mod=follow&amp;do=following&amp;uid=<?php echo $fuser['followuid'];?>"><font class="f_d" style="margin:0 3px;"><code class="f_a"><?php echo $memberinfo[$fuid]['following'];?></code> <?php echo $comiis_lang['all3'];?></font></a>
                        <font id="comiis_friendtip_<?php echo $fuser['followuid'];?>" class="f_d">
                        <?php if($fuser['followuid'] != $_G['uid']) { ?>
                            <?php if($fuser['mutual']) { ?>
                                <?php if($fuser['mutual'] > 0) { ?><?php echo $comiis_lang['tip186'];?><?php } else { ?><?php echo $comiis_lang['tip187'];?><?php } ?>
                            <?php } ?>
                        <?php } ?>
                        </font>
                    </p>
                </li>
                <?php } else { ?>                
                 <li class="b_t" id="comiis_friendbox_<?php echo $fuser['uid'];?>">
                    <p class="ytit f_d">                              
                        <?php if($fuser['uid'] != $_G['uid']) { ?>
                            <?php if($fuser['mutual']) { ?>
                                <a href="home.php?mod=spacecp&amp;ac=follow&amp;op=del&amp;fuid=<?php echo $fuser['uid'];?>&amp;handlekey=follower" id="a_followmod_<?php echo $fuser['uid'];?>" uid="<?php echo $fuser['uid'];?>" class="user_gz" comiis="handle"><i class="comiis_font f_wb">&#xe79b</i><font><?php echo $comiis_lang['all9'];?></font></a>
                            <?php } elseif(helper_access::check_module('follow')) { ?>
                                <a href="home.php?mod=spacecp&amp;ac=follow&amp;op=add&amp;hash=<?php echo FORMHASH;?>&amp;fuid=<?php echo $fuser['uid'];?>&amp;handlekey=follower" id="a_followmod_<?php echo $fuser['uid'];?>" uid="<?php echo $fuser['uid'];?>" class="user_gz" comiis="handle"><i class="comiis_font f_wb">&#xe60e</i><font><?php echo $comiis_lang['all3'];?></font></a>
                            <?php } ?>
                        <?php } ?>
                    </p>
                    <a href="home.php?mod=space&amp;uid=<?php echo $fuser['uid'];?>&amp;do=profile" class="list01_limg bg_e"><?php echo avatar($fuser['uid'],middle);?></a>
                    <p class="tit">
                        <a href="home.php?mod=space&amp;uid=<?php echo $fuser['uid'];?>&amp;do=profile"><?php echo $fuser['username'];?></a>
                    </p>
                    <p class="txt">
                        <a href="home.php?mod=follow&amp;do=follower&amp;uid=<?php echo $fuser['uid'];?>"><font class="f_d"><code class="f_a" id="followernum_<?php echo $fuser['uid'];?>"><?php echo $memberinfo[$fuid]['follower'];?></code> <?php echo $comiis_lang['all73'];?></font></a>
                        <a href="home.php?mod=follow&amp;do=following&amp;uid=<?php echo $fuser['uid'];?>"><font class="f_d" style="margin:0 3px;"><code class="f_a"><?php echo $memberinfo[$fuid]['following'];?></code> <?php echo $comiis_lang['all3'];?></font></a>
                        <font id="comiis_friendtip_<?php echo $fuser['uid'];?>" class="f_d">
                        <?php if($fuser['uid'] != $_G['uid']) { ?>
                            <?php if($fuser['mutual']) { ?>
                                <?php if($fuser['mutual'] > 0) { ?><?php echo $comiis_lang['tip186'];?><?php } else { ?><?php echo $comiis_lang['tip187'];?><?php } ?>
                            <?php } ?>
                        <?php } ?>
                        </font>
                    </p>
                </li>
                <?php } ?>
            <?php } ?>
            </div>
        </div>