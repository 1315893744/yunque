<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); if($comiis_app_switch['comiis_post_yindao'] == 1 && $_G['group']['allowpost'] && ($_G['group']['allowposttrade'] || $_G['group']['allowpostpoll'] || $_G['group']['allowpostreward'] || $_G['group']['allowpostactivity'] || $_G['group']['allowpostdebate'] || $_G['setting']['threadplugins'] || $_G['forum']['threadsorts'])) { ?>
<div id="comiis_post_type" popup="true" class="comiis_manage comiis_bodybg comiis_popup" style="display:none;" comiis_popup="comiis">
    <?php if($comiis_app_switch['comiis_post_yindao_ico'] != 1) { ?>
    <div class="comiis_gobtn_lbox bg_f b_t cl">
        <ul>
            <?php if(!empty($_G['forum']['sortmode']) && $comiis_app_switch['comiis_flxx_list']) { ?>
            <?php } else { ?>
                <?php if(!$_G['forum']['allowspecialonly']) { ?>
                    <li><a href="forum.php?mod=post&amp;action=newthread&amp;fid=<?php echo $_G['fid'];?>"><span style="background:#3EBBFD;"><i class="comiis_font f_f">&#xe6df;</i></span><?php echo $comiis_lang['post51'];?></a></li>
                <?php } ?>
            <?php } ?>
            <?php if($_G['group']['allowpostpoll']) { ?>
                <li><a href="forum.php?mod=post&amp;action=newthread&amp;fid=<?php echo $_G['fid'];?>&amp;special=1"><span style="background:#FFB300;"><i class="comiis_font f_f">&#xe6e9;</i></span>发投票</a></li>
            <?php } ?>
            <?php if($_G['group']['allowpostreward']) { ?>
                <li><a href="forum.php?mod=post&amp;action=newthread&amp;fid=<?php echo $_G['fid'];?>&amp;special=3"><span style="background:#9DCA08;"><i class="comiis_font f_f">&#xe6e4;</i></span>发悬赏</a></li>
            <?php } ?>
            <?php if($_G['group']['allowpostdebate']) { ?>
                <li><a href="forum.php?mod=post&amp;action=newthread&amp;fid=<?php echo $_G['fid'];?>&amp;special=5"><span style="background:#F37D7D;"><i class="comiis_font f_f">&#xe6e5;</i></span>发辩论</a></li>
            <?php } ?>
            <?php if($_G['group']['allowpostactivity']) { ?>
                <li><a href="forum.php?mod=post&amp;action=newthread&amp;fid=<?php echo $_G['fid'];?>&amp;special=4"><span style="background:#9DCA08;"><i class="comiis_font f_f">&#xe66b;</i></span><?php echo $comiis_lang['post52'];?></a></li>
            <?php } ?>
            <?php if($_G['group']['allowposttrade']) { ?>
            <li><a href="forum.php?mod=post&amp;action=newthread&amp;fid=<?php echo $_G['fid'];?>&amp;special=2"><span style="background:#91B9EB;"><i class="comiis_font f_f">&#xe6ac;</i></span><?php echo $comiis_lang['post53'];?></a></li>
            <?php } ?>
            <?php if($_G['forum']['threadsorts'] && !$_G['forum']['allowspecialonly']) { ?>   
            <?php $kmbgs = array('1'=>'#3EBBFD','2'=>'#FFB300','3'=>'#9DCA08','4'=>'#F37D7D','5'=>'#91B9EB');$ii=0;?>            <?php $kmicos = array('1'=>'&#xe6a7','2'=>'&#xe650','3'=>'&#xe692','4'=>'&#xe6ab','5'=>'&#xe669','6'=>'&#xe6c2','7'=>'&#xe64c','8'=>'&#xe64e');?>                <?php if(is_array($_G['forum']['threadsorts']['types'])) foreach($_G['forum']['threadsorts']['types'] as $id => $threadsorts) { ?>                    <?php if($_G['forum']['threadsorts']['show'][$id]) { ?>
                        <?php $ii++;?>                        <?php if($ii>5) { ?>
                        <?php $ii=1;?>                        <?php } ?>
                        <li><a href="forum.php?mod=post&amp;action=newthread&amp;fid=<?php echo $_G['fid'];?>&amp;extra=<?php echo $extra;?>&amp;sortid=<?php echo $id;?>"><span style="background:<?php echo $kmbgs[$ii];?>;"><i class="comiis_font f_f"><?php echo $kmicos[$ii];?>;</i></span><?php echo $threadsorts;?></a></li>
                    <?php } ?>
                <?php } ?>
            <?php } ?>
            <?php if($_G['setting']['threadplugins']) { ?>
                <?php if(is_array($_G['forum']['threadplugin'])) foreach($_G['forum']['threadplugin'] as $tpid) { ?>                    <?php if(array_key_exists($tpid, $_G['setting']['threadplugins']) && @in_array($tpid, $_G['group']['allowthreadplugin'])) { ?>
                        <?php $ii++;?>                        <?php if($ii>5) { ?>
                        <?php $ii=1;?>                        <?php } ?>
                        <li><a href="forum.php?mod=post&amp;action=newthread&amp;fid=<?php echo $_G['fid'];?>&amp;specialextra=<?php echo $tpid;?>"><span style="background:<?php echo $kmbgs[$ii];?>;"><i class="comiis_font f_f"><?php echo $kmicos[$ii];?>;</i></span><?php echo $_G['setting']['threadplugins'][$tpid]['name'];?></a></li>
                    <?php } ?>
                <?php } ?>
            <?php } ?>
        </ul>
    </div>
    <?php } ?>
<ul>
        <?php if($comiis_app_switch['comiis_post_yindao_ico'] == 1) { ?>
            <?php if(!empty($_G['forum']['sortmode']) && $comiis_app_switch['comiis_flxx_list']) { ?>
            <?php } else { ?>
            <?php if(!$_G['forum']['allowspecialonly']) { ?><li class="bg_f b_b"><a href="forum.php?mod=post&amp;action=newthread&amp;fid=<?php echo $_G['fid'];?>"><?php echo $comiis_lang['post51'];?></a></li><?php } ?>
            <?php } ?>
            <?php if($_G['group']['allowpostpoll']) { ?><li class="bg_f b_b"><a href="forum.php?mod=post&amp;action=newthread&amp;fid=<?php echo $_G['fid'];?>&amp;special=1">发投票</a></li><?php } ?>
            <?php if($_G['group']['allowpostreward']) { ?><li class="bg_f b_b"><a href="forum.php?mod=post&amp;action=newthread&amp;fid=<?php echo $_G['fid'];?>&amp;special=3">发悬赏</a></li><?php } ?>
            <?php if($_G['group']['allowpostdebate']) { ?><li class="bg_f b_b"><a href="forum.php?mod=post&amp;action=newthread&amp;fid=<?php echo $_G['fid'];?>&amp;special=5">发辩论</a></li><?php } ?>
            <?php if($_G['group']['allowpostactivity']) { ?><li class="bg_f b_b"><a href="forum.php?mod=post&amp;action=newthread&amp;fid=<?php echo $_G['fid'];?>&amp;special=4"><?php echo $comiis_lang['post52'];?></a></li><?php } ?>
            <?php if($_G['group']['allowposttrade']) { ?><li class="bg_f b_b"><a href="forum.php?mod=post&amp;action=newthread&amp;fid=<?php echo $_G['fid'];?>&amp;special=2"><?php echo $comiis_lang['post53'];?></a></li><?php } ?>
            <?php if($_G['forum']['threadsorts'] && !$_G['forum']['allowspecialonly']) { ?>
                <?php if(is_array($_G['forum']['threadsorts']['types'])) foreach($_G['forum']['threadsorts']['types'] as $id => $threadsorts) { ?>                    <?php if($_G['forum']['threadsorts']['show'][$id]) { ?>
                        <li class="bg_f b_b"><a href="forum.php?mod=post&amp;action=newthread&amp;fid=<?php echo $_G['fid'];?>&amp;extra=<?php echo $extra;?>&amp;sortid=<?php echo $id;?>"><?php echo $threadsorts;?></a></li>
                    <?php } ?>
                <?php } ?>
            <?php } ?>
            <?php if($_G['setting']['threadplugins']) { ?>
                <?php if(is_array($_G['forum']['threadplugin'])) foreach($_G['forum']['threadplugin'] as $tpid) { ?>                    <?php if(array_key_exists($tpid, $_G['setting']['threadplugins']) && @in_array($tpid, $_G['group']['allowthreadplugin'])) { ?>
                        <li class="bg_f b_b"><a href="forum.php?mod=post&amp;action=newthread&amp;fid=<?php echo $_G['fid'];?>&amp;specialextra=<?php echo $tpid;?>"><?php echo $_G['setting']['threadplugins'][$tpid]['name'];?></a></li>
                    <?php } ?>
                <?php } ?>
            <?php } } ?>
<li><a href="javascript:popup.comiis_close();" class="comiis_glclose mt10 bg_f b_t f_g">取消</a></li>
</ul>
</div>
<?php } ?>