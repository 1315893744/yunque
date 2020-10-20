<?PHP exit('Access Denied');?>
<!--{template common/header}-->
<!--{if $comiis_app_switch['comiis_subnv_top'] != 1}--><div style="height:41px;"><div class="comiis_scrollTop_box"><!--{/if}-->
<div class="comiis_topnv bg_f b_b">
    <ul class="comiis_flex">
        <li class="flex{if $actives[new]} f_0{/if}">{if $actives[new]}<em class="bg_0"></em>{/if}<a href="home.php?mod=task&item=new"{if !$actives[new]} class="f_c"{/if}>{lang task_new}</a></li>
        <li class="flex{if $actives[doing]} f_0{/if}">{if $actives[doing]}<em class="bg_0"></em>{/if}<a href="home.php?mod=task&item=doing"{if !$actives[doing]} class="f_c"{/if}>{$comiis_lang['tip268']}</a></li>
        <li class="flex{if $actives[done]} f_0{/if}">{if $actives[done]}<em class="bg_0"></em>{/if}<a href="home.php?mod=task&item=done"{if !$actives[done]} class="f_c"{/if}>{$comiis_lang['tip269']}</a></li>
        <li class="flex{if $actives[failed]} f_0{/if}">{if $actives[failed]}<em class="bg_0"></em>{/if}<a href="home.php?mod=task&item=failed"{if !$actives[failed]} class="f_c"{/if}>{$comiis_lang['tip270']}</a></li>
    </ul>
</div>
<!--{if $comiis_app_switch['comiis_subnv_top'] != 1}--></div></div><!--{/if}-->
<div class="styli_h10 bg_e b_b"></div>
<!--{if empty($do)}-->
    <!--{subtemplate home/space_task_list}-->
<!--{elseif $do == 'view'}-->
    <!--{subtemplate home/space_task_detail}-->
<!--{/if}-->
<!--{eval $comiis_foot = 'no';}-->
<!--{template common/footer}-->