<?php
//Discuz! cache file, DO NOT modify me!
//Created: Sep 29, 2018, 17:31
//Identify: 56c9d5d3d6f0dd9bf39897b9fae4ef8e

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
?>
<?php if($comiis_app_switch['comiis_view_header'] == 2) { ?>
<div class="comiis_view_header2 bg_e">
<span class="f_c y"><?php echo $_G['forum_thread']['views'];?><?php echo $comiis_lang['view47'];?> / <?php echo $_G['forum_thread']['allreplies'];?><?php echo $comiis_lang['join_thread'];?></span>
<span class="f_c"><?php echo $comiis_lang['view48'];?>: </span> <a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $_G['forum']['fid'];?>" class="f_ok"><?php echo $_G['forum']['name'];?></a>
</div>
<?php if($page > 1) { ?>
<div class="comiis_viewtit bg_f b_t b_b mb10">
    <?php if($_G['comiis_new'] <= 1) { ?>
        <h2>
            <?php if($post['warned']) { ?><span class="top_jg bg_del f_f"><?php echo $comiis_lang['warn_get'];?></span><?php } ?>
            <?php if(in_array($thread['displayorder'], array(1, 2, 3, 4))) { ?><span class="top_jh bg_0 f_f"><?php echo $comiis_lang['view2'];?></span><?php } ?>
            <?php if($thread['digest'] > 0 && $filter != 'digest') { ?><span class="top_jh bg_c f_f"><?php echo $comiis_lang['view1'];?></span><?php } ?>
            <?php if($thread['icon'] >= 0 && $comiis_app_switch['comiis_view_titico'] != 1) { ?><span class="top_jh comiis_xifont f_a"><?php echo $_G['cache']['stamps'][$thread['icon']]['text'];?></span><?php } ?>
            <?php echo $_G['forum_thread']['subject'];?>
            <?php if($_G['forum_thread']['displayorder'] == -2) { ?> <span class="f_c">(<?php echo $comiis_lang['moderating'];?>)</span>
            <?php } elseif($_G['forum_thread']['displayorder'] == -3) { ?> <span class="f_c">(<?php echo $comiis_lang['have_ignored'];?>)</span>
            <?php } elseif($_G['forum_thread']['displayorder'] == -4) { ?> <span class="f_c">(<?php echo $comiis_lang['draft'];?>)</span>
            <?php } ?>
        </h2>
    <?php } else { ?>
        <h2>
            <?php if($comiis_app_switch['comiis_view_typeid'] == 1) { ?>
                <?php if($_G['forum_thread']['typeid'] && $_G['forum']['threadtypes']['types'][$_G['forum_thread']['typeid']]) { ?>
                    <?php if(!IS_ROBOT && ($_G['forum']['threadtypes']['listable'] || $_G['forum']['status'] == 3)) { ?>
                        <a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $_G['fid'];?>&amp;filter=typeid&amp;typeid=<?php echo $_G['forum_thread']['typeid'];?>" class="f16 f_ok">[<?php echo $_G['forum']['threadtypes']['types'][$_G['forum_thread']['typeid']];?>]</a> 
                    <?php } else { ?>
                        <span class="f16 f_ok">[<?php echo $_G['forum']['threadtypes']['types'][$_G['forum_thread']['typeid']];?>]</span> 
                    <?php } ?>
                <?php } ?>
                <?php if($threadsorts && $_G['forum_thread']['sortid']) { ?>
                    <a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $_G['fid'];?>&amp;filter=sortid&amp;sortid=<?php echo $_G['forum_thread']['sortid'];?>" class="f16 f_ok">[<?php echo $_G['forum']['threadsorts']['types'][$_G['forum_thread']['sortid']];?>]</a> 
                <?php } ?>
            <?php } ?>
            <?php echo $_G['forum_thread']['subject'];?>
            <?php if($post['warned'] || in_array($thread['displayorder'], array(1, 2, 3, 4)) || ($thread['digest'] > 0 && $filter != 'digest') || in_array($_G['forum_thread']['displayorder'], array(-2, -3, -4)) || ($_G['forum_thread']['typeid'] && $_G['forum']['threadtypes']['types'][$_G['forum_thread']['typeid']]) || ($threadsorts && $_G['forum_thread']['sortid'])) { ?>
            <div class="mt5 cl">
                <?php if($post['warned']) { ?><span class="top_jg bg_del f_f"><?php echo $comiis_lang['warn_get'];?></span><?php } ?>
                <?php if(in_array($thread['displayorder'], array(1, 2, 3, 4))) { ?><span class="top_jh bg_0 f_f"><?php echo $comiis_lang['view41'];?></span><?php } ?>
                <?php if($thread['digest'] > 0 && $filter != 'digest') { ?><span class="top_jh bg_c f_f"><?php echo $comiis_lang['view42'];?></span><?php } ?>
                <?php if($thread['icon'] >= 0 && $comiis_app_switch['comiis_view_titico'] != 1) { ?><span class="top_jh comiis_xifont f_a"><?php echo $_G['cache']['stamps'][$thread['icon']]['text'];?></span><?php } ?>
                <?php if($_G['forum_thread']['displayorder'] == -2) { ?>
                    <span class="top_jg bg_a f_f"><?php echo $comiis_lang['moderating'];?></span>
                <?php } elseif($_G['forum_thread']['displayorder'] == -3) { ?>
                    <span class="top_jg bg_b f_c"><?php echo $comiis_lang['have_ignored'];?></span>
                <?php } elseif($_G['forum_thread']['displayorder'] == -4) { ?>
                    <span class="top_jg bg_a f_f"><?php echo $comiis_lang['draft'];?></span>
                <?php } ?>
                <?php if($comiis_app_switch['comiis_view_typeid'] == 2) { ?>
                    <?php if($_G['forum_thread']['typeid'] && $_G['forum']['threadtypes']['types'][$_G['forum_thread']['typeid']]) { ?>
                        <?php if(!IS_ROBOT && ($_G['forum']['threadtypes']['listable'] || $_G['forum']['status'] == 3)) { ?>
                            <a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $_G['fid'];?>&amp;filter=typeid&amp;typeid=<?php echo $_G['forum_thread']['typeid'];?>"><span class="top_jh comiis_xifont f_ok"><?php echo $_G['forum']['threadtypes']['types'][$_G['forum_thread']['typeid']];?></span></a>
                        <?php } else { ?>
                            <span class="top_jh comiis_xifont f_ok"><?php echo $_G['forum']['threadtypes']['types'][$_G['forum_thread']['typeid']];?></span>
                        <?php } ?>
                    <?php } ?>
                    <?php if($threadsorts && $_G['forum_thread']['sortid']) { ?>
                        <a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $_G['fid'];?>&amp;filter=sortid&amp;sortid=<?php echo $_G['forum_thread']['sortid'];?>"><span class="top_jh comiis_xifont f_ok"><?php echo $_G['forum']['threadsorts']['types'][$_G['forum_thread']['sortid']];?></span></a>
                    <?php } ?>
                <?php } ?>
            </div>
            <?php } ?>
        </h2>
    <?php } ?>
</div>
<?php } } if($comiis_app_switch['comiis_view_header'] == 3) { } elseif($comiis_app_switch['comiis_view_header'] != 2) { ?>
<div class="comiis_viewtit<?php if($comiis_app_switch['comiis_view_header'] == 1) { ?> bg_f<?php } else { ?> bg_f<?php } ?> cl">
    <?php if($comiis_app_switch['comiis_view_zntit'] == 1 && $comiis_isnotitle == 1) { ?>
        <?php if($comiis_app_switch['comiis_view_header'] == 1) { ?>
        <div class="comiis_view_header2">
            <span class="f_d y"><?php echo $_G['forum_thread']['views'];?><?php echo $comiis_lang['view47'];?> / <?php echo $_G['forum_thread']['allreplies'];?><?php echo $comiis_lang['join_thread'];?></span>
            <span class="f_d"><?php echo $comiis_lang['view48'];?>: </span> <a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $_G['forum']['fid'];?>" class="f_ok"><?php echo $_G['forum']['name'];?></a>
        </div>
        <?php } else { ?>
        <a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $_G['forum']['fid'];?>" class="comiis_view_header2">
            <span class="f_d"><?php echo $comiis_lang['view48'];?>: </span> <span class="f_ok"><?php echo $_G['forum']['name'];?></span>
        </a>
        <?php } ?>
    <?php } else { ?>
        <?php if($_G['comiis_new'] <= 1) { ?>
            <h2>
                <?php if($post['warned']) { ?><span class="top_jg bg_del f_f"><?php echo $comiis_lang['warn_get'];?></span><?php } ?>
                <?php if(in_array($thread['displayorder'], array(1, 2, 3, 4))) { ?><span class="top_jh bg_0 f_f"><?php echo $comiis_lang['view2'];?></span><?php } ?>
                <?php if($thread['digest'] > 0 && $filter != 'digest') { ?><span class="top_jh bg_c f_f"><?php echo $comiis_lang['view1'];?></span><?php } ?>
                <?php if($thread['icon'] >= 0 && $comiis_app_switch['comiis_view_titico'] != 1) { ?><span class="top_jh comiis_xifont f_a"><?php echo $_G['cache']['stamps'][$thread['icon']]['text'];?></span><?php } ?>
                <?php echo $_G['forum_thread']['subject'];?>
                <?php if($_G['forum_thread']['displayorder'] == -2) { ?> <span class="f_c">(<?php echo $comiis_lang['moderating'];?>)</span>
                <?php } elseif($_G['forum_thread']['displayorder'] == -3) { ?> <span class="f_c">(<?php echo $comiis_lang['have_ignored'];?>)</span>
                <?php } elseif($_G['forum_thread']['displayorder'] == -4) { ?> <span class="f_c">(<?php echo $comiis_lang['draft'];?>)</span>
                <?php } ?>
            </h2>
        <?php } else { ?>
            <h2>
                <?php if($post['warned'] || in_array($thread['displayorder'], array(1, 2, 3, 4)) || ($thread['digest'] > 0 && $filter != 'digest') || in_array($_G['forum_thread']['displayorder'], array(-2, -3, -4)) || ($_G['forum_thread']['typeid'] && $_G['forum']['threadtypes']['types'][$_G['forum_thread']['typeid']]) || ($threadsorts && $_G['forum_thread']['sortid'])) { ?>
                <div class="cl">
                    <?php if($post['warned']) { ?><span class="top_jg bg_del f_f"><?php echo $comiis_lang['warn_get'];?></span><?php } ?>
                    <?php if(in_array($thread['displayorder'], array(1, 2, 3, 4))) { ?><span class="top_jh bg_0 f_f"><?php echo $comiis_lang['view41'];?></span><?php } ?>
                    <?php if($thread['digest'] > 0 && $filter != 'digest') { ?><span class="top_jh bg_c f_f"><?php echo $comiis_lang['view42'];?></span><?php } ?>
                    <?php if($thread['icon'] >= 0 && $comiis_app_switch['comiis_view_titico'] != 1) { ?><span class="top_jh comiis_xifont f_a"><?php echo $_G['cache']['stamps'][$thread['icon']]['text'];?></span><?php } ?>
                    <?php if($_G['forum_thread']['displayorder'] == -2) { ?>
                        <span class="top_jg bg_a f_f"><?php echo $comiis_lang['moderating'];?></span>
                    <?php } elseif($_G['forum_thread']['displayorder'] == -3) { ?>
                        <span class="top_jg bg_b f_c"><?php echo $comiis_lang['have_ignored'];?></span>
                    <?php } elseif($_G['forum_thread']['displayorder'] == -4) { ?>
                        <span class="top_jg bg_a f_f"><?php echo $comiis_lang['draft'];?></span>
                    <?php } ?>
                    <?php if($comiis_app_switch['comiis_view_typeid'] == 2) { ?>
                        <?php if($_G['forum_thread']['typeid'] && $_G['forum']['threadtypes']['types'][$_G['forum_thread']['typeid']]) { ?>
                            <?php if(!IS_ROBOT && ($_G['forum']['threadtypes']['listable'] || $_G['forum']['status'] == 3)) { ?>
                                <a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $_G['fid'];?>&amp;filter=typeid&amp;typeid=<?php echo $_G['forum_thread']['typeid'];?>"><span class="top_jh comiis_xifont f_ok"><?php echo $_G['forum']['threadtypes']['types'][$_G['forum_thread']['typeid']];?></span></a>
                            <?php } else { ?>
                                <span class="top_jh comiis_xifont f_ok"><?php echo $_G['forum']['threadtypes']['types'][$_G['forum_thread']['typeid']];?></span>
                            <?php } ?>
                        <?php } ?>
                        <?php if($threadsorts && $_G['forum_thread']['sortid']) { ?>
                            <a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $_G['fid'];?>&amp;filter=sortid&amp;sortid=<?php echo $_G['forum_thread']['sortid'];?>"><span class="top_jh comiis_xifont f_ok"><?php echo $_G['forum']['threadsorts']['types'][$_G['forum_thread']['sortid']];?></span></a>
                        <?php } ?>
                    <?php } ?>
                </div>
                <?php } ?>
                <?php if($comiis_app_switch['comiis_view_typeid'] == 1) { ?>
                    <?php if($_G['forum_thread']['typeid'] && $_G['forum']['threadtypes']['types'][$_G['forum_thread']['typeid']]) { ?>
                        <?php if(!IS_ROBOT && ($_G['forum']['threadtypes']['listable'] || $_G['forum']['status'] == 3)) { ?>
                            <a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $_G['fid'];?>&amp;filter=typeid&amp;typeid=<?php echo $_G['forum_thread']['typeid'];?>" class="f16 f_ok">[<?php echo $_G['forum']['threadtypes']['types'][$_G['forum_thread']['typeid']];?>]</a> 
                        <?php } else { ?>
                            <span class="f16 f_ok">[<?php echo $_G['forum']['threadtypes']['types'][$_G['forum_thread']['typeid']];?>]</span> 
                        <?php } ?>
                    <?php } ?>
                    <?php if($threadsorts && $_G['forum_thread']['sortid']) { ?>
                        <a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $_G['fid'];?>&amp;filter=sortid&amp;sortid=<?php echo $_G['forum_thread']['sortid'];?>" class="f16 f_ok">[<?php echo $_G['forum']['threadsorts']['types'][$_G['forum_thread']['sortid']];?>]</a> 
                    <?php } ?>
                <?php } ?>
                <?php echo $_G['forum_thread']['subject'];?>
            </h2>
        <?php } ?>
        <?php if($comiis_app_switch['comiis_view_header'] == 1) { ?>
            <div class="comiis_view_header1">                
                <span class="f_c y"><?php echo $_G['forum_thread']['allreplies'];?><?php echo $comiis_lang['collection_commentnum'];?>&nbsp;&nbsp;&nbsp;<?php echo $_G['forum_thread']['views'];?><?php echo $comiis_lang['view47'];?></span>
                <a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $_G['forum']['fid'];?>" class="comiis_xifont kmbkurl f_ok"><?php echo $_G['forum']['name'];?> <i class="comiis_font">&#xe60c</i></a>
            </div>
        <?php } } if($_G['forum_threadstamp'] && $comiis_app_switch['comiis_view_header'] == 1) { ?>
<div class="comiis_threadstamp_v1"><img src="<?php echo STATICURL;?>image/stamp/<?php echo $_G['forum_threadstamp']['url'];?>" /></div>
<?php } ?>
</div>
<?php } ?>