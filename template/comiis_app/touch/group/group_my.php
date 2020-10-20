<?PHP exit('Access Denied');?>
<!--{if !$_GET['inajax']}-->
<!--{template common/header}-->
<!--{if $comiis_app_switch['comiis_subnv_top'] != 1}--><div style="height:40px;"><div class="comiis_scrollTop_box"><!--{/if}-->
<div class="comiis_topnv bg_f b_b">
	<ul class="comiis_flex">
		<li class="flex{if $actives[groupthread]} f_0{/if}">{if $actives[groupthread]}<em class="bg_0"></em>{/if}<a href="group.php?mod=my&view=groupthread"{if !$actives[groupthread]} class="f_c"{/if}>{$comiis_group_lang['001']}{$comiis_group_lang['014']}</a></li>
		<li class="flex{if $actives[mythread]} f_0{/if}">{if $actives[mythread]}<em class="bg_0"></em>{/if}<a href="group.php?mod=my&view=mythread"{if !$actives[mythread]} class="f_c"{/if}>{lang my_thread}</a></li>
		<li class="flex{if $actives[join]} f_0{/if}">{if $actives[join]}<em class="bg_0"></em>{/if}<a href="group.php?mod=my&view=join"{if !$actives[join]} class="f_c"{/if}>{lang my_join}</a></li>
		<li class="flex{if $actives[manager]} f_0{/if}">{if $actives[manager]}<em class="bg_0"></em>{/if}<a href="group.php?mod=my&view=manager"{if !$actives[manager]} class="f_c"{/if}>{lang my_manage}</a></li>
	</ul>
</div>
<!--{if $comiis_app_switch['comiis_subnv_top'] != 1}--></div></div><!--{/if}-->
<!--{else}-->
<!--{template common/header_ajax}-->
<!--{/if}-->
<!--{if $view == 'groupthread' || $view == 'mythread'}-->
{eval}
include_once DISCUZ_ROOT.'./template/comiis_app/comiis/php/comiis_group_my.php';
foreach($_G['forum_threadlist'] as $k=>$temp) {
	$_G['forum_threadlist'][$k]['dateline'] = dgmdate($_G['forum_threadlist'][$k]['dateline'], 'u');
}
include_once DISCUZ_ROOT.'./template/comiis_app/comiis/php/comiis_forumdisplay.php';
{/eval}
<!--{if count($_G['forum_threadlist'])}-->
    <!--{if $_G['uid']}-->
        <script>var formhash = '{FORMHASH}', allowrecommend = '{$_G['group']['allowrecommend']}';</script>
        <script src="template/comiis_app/comiis/js/comiis_forumdisplay.js?{VERHASH}"></script>
    <!--{/if}-->
    <!--{eval $comiis_list_template = 'default_g_style'; include_once DISCUZ_ROOT.'./template/comiis_app/comiis/php/comiis_list.php';}-->
    <!--{if !$_GET['inajax']}-->
        <!--{if $comiis_app_list_num != 10}--><div id="list_new"></div><!--{/if}-->
        <!--{eval $comiis_page = ceil($num/$mpp);}-->
        <div class="comiis_multi_box bg_f b_t" style="margin-top:10px;">
            <!--{if $multipage && ($comiis_app_switch['comiis_listpage'] == 0 || $page > 1)}-->
                {$multipage}
            <!--{elseif $comiis_app_switch['comiis_listpage'] == 1 && $page < $comiis_page}-->
                <a href="javascript:;" onclick="comiis_list_page()" class="comiis_loadbtn bg_e f_d">{$comiis_lang['tip5']}</a>
            <!--{elseif $comiis_app_switch['comiis_listpage'] == 2 && $page < $comiis_page}-->
                <div class="comiis_loadbtn f_d">{$comiis_lang['tip6']}</div>
            <!--{elseif $comiis_app_switch['comiis_listpage'] && $comiis_page == 1 && $num > 4}-->
                <div class="comiis_loadbtn f_d">{$comiis_lang['tip31']}</div>
            <!--{/if}-->
        </div>
        <!--{eval comiis_load('PEx9o999KM92gx90i0', 'page,comiis_page,comiis_app_list_num');}-->
    <!--{/if}-->
<!--{else}-->
    <div class="comiis_notip comiis_sofa mt15 cl">
        <i class="comiis_font f_e cl">&#xe613</i>
        <span class="f_d">{$comiis_group_lang['042']}</span>
    </div>
<!--{/if}-->
<!--{elseif $view == 'manager' || $view == 'join'}-->
    <!--{eval comiis_load('qyj4tuJIM34u3tIkpM', 'grouplist,view,comiis_group_lang,multipage');}-->   
<!--{/if}-->
<!--{if !$_GET['inajax']}-->
<!--{template common/footer}-->
<!--{else}-->
<!--{template common/footer_ajax}-->
<!--{/if}-->