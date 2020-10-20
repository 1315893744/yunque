<?PHP exit('Access Denied');?>
<!--{if $comiis_app_switch['comiis_post_yindao'] == 1 && $_G['group']['allowpost'] && ($_G['group']['allowposttrade'] || $_G['group']['allowpostpoll'] || $_G['group']['allowpostreward'] || $_G['group']['allowpostactivity'] || $_G['group']['allowpostdebate'] || $_G['setting']['threadplugins'] || $_G['forum']['threadsorts'])}-->
<div id="comiis_post_type" popup="true" class="comiis_manage comiis_bodybg comiis_popup" style="display:none;" comiis_popup="comiis">
    <!--{if $comiis_app_switch['comiis_post_yindao_ico'] != 1}-->
    <div class="comiis_gobtn_lbox bg_f b_t cl">
        <ul>
            <!--{if !empty($_G['forum']['sortmode']) && $comiis_app_switch['comiis_flxx_list']}-->
            <!--{else}-->
                <!--{if !$_G['forum']['allowspecialonly']}-->
                    <li><a href="forum.php?mod=post&action=newthread&fid=$_G[fid]"><span style="background:#3EBBFD;"><i class="comiis_font f_f">&#xe6df;</i></span>{$comiis_lang['post51']}</a></li>
                <!--{/if}-->
            <!--{/if}-->
            <!--{if $_G['group']['allowpostpoll']}-->
                <li><a href="forum.php?mod=post&action=newthread&fid=$_G[fid]&special=1"><span style="background:#FFB300;"><i class="comiis_font f_f">&#xe6e9;</i></span>{lang post_newthreadpoll}</a></li>
            <!--{/if}-->
            <!--{if $_G['group']['allowpostreward']}-->
                <li><a href="forum.php?mod=post&action=newthread&fid=$_G[fid]&special=3"><span style="background:#9DCA08;"><i class="comiis_font f_f">&#xe6e4;</i></span>{lang post_newthreadreward}</a></li>
            <!--{/if}-->
            <!--{if $_G['group']['allowpostdebate']}-->
                <li><a href="forum.php?mod=post&action=newthread&fid=$_G[fid]&special=5"><span style="background:#F37D7D;"><i class="comiis_font f_f">&#xe6e5;</i></span>{lang post_newthreaddebate}</a></li>
            <!--{/if}-->
            <!--{if $_G['group']['allowpostactivity']}-->
                <li><a href="forum.php?mod=post&action=newthread&fid=$_G[fid]&special=4"><span style="background:#9DCA08;"><i class="comiis_font f_f">&#xe66b;</i></span>{$comiis_lang['post52']}</a></li>
            <!--{/if}-->
            <!--{if $_G['group']['allowposttrade']}-->
            <li><a href="forum.php?mod=post&action=newthread&fid=$_G[fid]&special=2"><span style="background:#91B9EB;"><i class="comiis_font f_f">&#xe6ac;</i></span>{$comiis_lang['post53']}</a></li>
            <!--{/if}-->
            <!--{if $_G['forum']['threadsorts'] && !$_G['forum']['allowspecialonly']}-->   
            <!--{eval $kmbgs = array('1'=>'#3EBBFD','2'=>'#FFB300','3'=>'#9DCA08','4'=>'#F37D7D','5'=>'#91B9EB');$ii=0;}-->
            <!--{eval $kmicos = array('1'=>'&#xe6a7','2'=>'&#xe650','3'=>'&#xe692','4'=>'&#xe6ab','5'=>'&#xe669','6'=>'&#xe6c2','7'=>'&#xe64c','8'=>'&#xe64e');}-->
                <!--{loop $_G['forum']['threadsorts']['types'] $id $threadsorts}-->
                    <!--{if $_G['forum']['threadsorts']['show'][$id]}-->
                        <!--{eval $ii++;}-->
                        <!--{if $ii>5}-->
                        <!--{eval $ii=1;}-->
                        <!--{/if}-->
                        <li><a href="forum.php?mod=post&action=newthread&fid=$_G[fid]&extra=$extra&sortid=$id"><span style="background:{$kmbgs[$ii]};"><i class="comiis_font f_f">{$kmicos[$ii]};</i></span>$threadsorts</a></li>
                    <!--{/if}-->
                <!--{/loop}-->
            <!--{/if}-->
            <!--{if $_G['setting']['threadplugins']}-->
                <!--{loop $_G['forum']['threadplugin'] $tpid}-->
                    <!--{if array_key_exists($tpid, $_G['setting']['threadplugins']) && @in_array($tpid, $_G['group']['allowthreadplugin'])}-->
                        <!--{eval $ii++;}-->
                        <!--{if $ii>5}-->
                        <!--{eval $ii=1;}-->
                        <!--{/if}-->
                        <li><a href="forum.php?mod=post&action=newthread&fid=$_G[fid]&specialextra=$tpid"><span style="background:{$kmbgs[$ii]};"><i class="comiis_font f_f">{$kmicos[$ii]};</i></span>{$_G[setting][threadplugins][$tpid][name]}</a></li>
                    <!--{/if}-->
                <!--{/loop}-->
            <!--{/if}-->
        </ul>
    </div>
    <!--{/if}-->
	<ul>
        <!--{if $comiis_app_switch['comiis_post_yindao_ico'] == 1}-->
            <!--{if !empty($_G['forum']['sortmode']) && $comiis_app_switch['comiis_flxx_list']}-->
            <!--{else}-->
            <!--{if !$_G['forum']['allowspecialonly']}--><li class="bg_f b_b"><a href="forum.php?mod=post&action=newthread&fid=$_G[fid]">{$comiis_lang['post51']}</a></li><!--{/if}-->
            <!--{/if}-->
            <!--{if $_G['group']['allowpostpoll']}--><li class="bg_f b_b"><a href="forum.php?mod=post&action=newthread&fid=$_G[fid]&special=1">{lang post_newthreadpoll}</a></li><!--{/if}-->
            <!--{if $_G['group']['allowpostreward']}--><li class="bg_f b_b"><a href="forum.php?mod=post&action=newthread&fid=$_G[fid]&special=3">{lang post_newthreadreward}</a></li><!--{/if}-->
            <!--{if $_G['group']['allowpostdebate']}--><li class="bg_f b_b"><a href="forum.php?mod=post&action=newthread&fid=$_G[fid]&special=5">{lang post_newthreaddebate}</a></li><!--{/if}-->
            <!--{if $_G['group']['allowpostactivity']}--><li class="bg_f b_b"><a href="forum.php?mod=post&action=newthread&fid=$_G[fid]&special=4">{$comiis_lang['post52']}</a></li><!--{/if}-->
            <!--{if $_G['group']['allowposttrade']}--><li class="bg_f b_b"><a href="forum.php?mod=post&action=newthread&fid=$_G[fid]&special=2">{$comiis_lang['post53']}</a></li><!--{/if}-->
            <!--{if $_G['forum']['threadsorts'] && !$_G['forum']['allowspecialonly']}-->
                <!--{loop $_G['forum']['threadsorts']['types'] $id $threadsorts}-->
                    <!--{if $_G['forum']['threadsorts']['show'][$id]}-->
                        <li class="bg_f b_b"><a href="forum.php?mod=post&action=newthread&fid=$_G[fid]&extra=$extra&sortid=$id">$threadsorts</a></li>
                    <!--{/if}-->
                <!--{/loop}-->
            <!--{/if}-->
            <!--{if $_G['setting']['threadplugins']}-->
                <!--{loop $_G['forum']['threadplugin'] $tpid}-->
                    <!--{if array_key_exists($tpid, $_G['setting']['threadplugins']) && @in_array($tpid, $_G['group']['allowthreadplugin'])}-->
                        <li class="bg_f b_b"><a href="forum.php?mod=post&action=newthread&fid=$_G[fid]&specialextra=$tpid">{$_G[setting][threadplugins][$tpid][name]}</a></li>
                    <!--{/if}-->
                <!--{/loop}-->
            <!--{/if}-->
		<!--{/if}-->
		<li><a href="javascript:popup.comiis_close();" class="comiis_glclose mt10 bg_f b_t f_g">{lang cancel}</a></li>
	</ul>
</div>
<!--{/if}-->