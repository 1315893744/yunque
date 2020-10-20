<?PHP exit('Access Denied');?>
<!--{template common/header}-->
<!--{eval include_once DISCUZ_ROOT.'./template/comiis_app/comiis/php/comiis_forum_ranklist.php';}-->
<!--{if $comiis_app_switch['comiis_forumtimgs']}-->
    <div class="cl" style="position:relative;">
        <!--{if $comiis_app_switch['comiis_forumtimgs']}-->$comiis_app_switch['comiis_forumtimgs']<!--{/if}-->
        <!--{if $comiis_app_switch['comiis_svg'] != 1}--><div class="comiis_svg_box" style="bottom:-6px;"><div class="comiis_svg_a"></div><div class="comiis_svg_b"></div></div><!--{/if}-->
    </div>
<!--{/if}-->
<!--{if $comiis_app_switch['comiis_subnv_top'] != 1}--><div style="height:41px;"><div class="comiis_scrollTop_box"><!--{/if}-->
<div class="comiis_topnv bg_f b_b">
    <ul class="comiis_flex">
        <li class="flex{if $_GET[view] == 'threads'} f_0{/if}">{if $_GET[view] == 'threads'}<em class="bg_0"></em>{/if}<a href="misc.php?mod=ranklist&type=forum&view=threads"{if $_GET[view] != 'threads'} class="f_c"{/if}>{lang ranklist_post}</a></li>
        <li class="flex{if $_GET[view] == 'posts'} f_0{/if}">{if $_GET[view] == 'posts'}<em class="bg_0"></em>{/if}<a href="misc.php?mod=ranklist&type=forum&view=posts"{if $_GET[view] != 'posts'} class="f_c"{/if}>{lang ranklist_reply}</a></li>
        <li class="flex{if $_GET[view] == 'today'} f_0{/if}">{if $_GET[view] == 'today'}<em class="bg_0"></em>{/if}<a href="misc.php?mod=ranklist&type=forum&view=today"{if $_GET[view] != 'today'} class="f_c"{/if}>{$comiis_lang['tip324']}</a></li>
    </ul>
</div>
<!--{if $comiis_app_switch['comiis_subnv_top'] != 1}--></div></div><!--{/if}-->
<div class="styli_h10 bg_e b_b"></div>
<!--{if $forumsrank}-->
    <div class="comiis_bkphb">
        <div class="comiis_ranklist cl">        
            <ul>            
            <!--{loop $forumsrank $forum}-->
                <li<!--{if $forum['rank']%2==1}--> class="bg_e"<!--{/if}-->>
                    <a href="forum.php?mod=forumdisplay&fid=$forum['fid']">
                        <span class="y f_c">            
                            $forum['posts']
                            <!--{if $_GET[view] == 'today'}-->{$comiis_lang['view5']}
                            <!--{elseif $_GET[view] == 'posts'}-->{lang reply}
                            <!--{elseif $_GET[view] == 'thismonth'}-->{$comiis_lang['view5']}
                            <!--{else}-->{$comiis_lang['view5']}<!--{/if}-->                            
                        </span>
                        <span class="user_mun f_c"><!--{if $forum['rank'] <= 3}--><img src="{IMGDIR}/comiis_rank$forum['rank'].png" alt="$forum['rank']" /><!--{else}-->$forum['rank']<!--{/if}--></span>
                        <img src="{if $comiis_forum_icon_s[$forum['fid']]['icon']}{$comiis_forum_icon_s[$forum['fid']]['icon']}{else}./template/comiis_app/comiis/img/forum_new.png{/if}" />
                        <span class="user_tit">$forum['name']</span>
                    </a>
                </li>
            <!--{/loop}-->
            </ul>
        </div>
    </div>
<!--{else}-->
    <div class="comiis_notip comiis_sofa mt15 cl">
        <i class="comiis_font f_e cl">&#xe613;</i>
        <span class="f_d">{$comiis_lang['all22']}</span>
    </div>
<!--{/if}-->
<div class="comiis_vfgohome b_t f_d" style="text-align:center;">{$comiis_lang['ranklist_update']}</div>
<!--{eval $comiis_foot = 'no';}-->
<!--{template common/footer}-->