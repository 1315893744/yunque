<?PHP exit('Access Denied');?>
<!--{eval include_once DISCUZ_ROOT.'./template/comiis_app/comiis/php/comiis_group_list.php'}-->
<!--{eval include_once DISCUZ_ROOT.'./template/comiis_app/comiis/php/comiis_forumdisplay.php'}-->
<!--{eval $comiis_app_switch['comiis_list_zntits'] = $comiis_app_switch['comiis_grouplist_zntits'];}-->
<!--{if !$_GET['inajax'] && $_G['uid']}-->
	<script>var formhash = '{FORMHASH}', allowrecommend = '{$_G['group']['allowrecommend']}';</script>
	<script src="template/comiis_app/comiis/js/comiis_forumdisplay.js?{VERHASH}"></script>
<!--{/if}-->
<!--{if !$_GET['inajax'] && $_G['forum']['threadtypes']}-->
  <script src="template/comiis_app/comiis/js/comiis_swiper.min.js?{VERHASH}"></script>
    <!--{if $comiis_app_switch['comiis_subnv_top'] != 1}--><div style="height:40px;"><div class="comiis_scrollTop_box"><!--{/if}-->
	<div class="comiis_top_sub">
		<div id="comiis_top_box" class="bg_e">
			<div id="comiis_sub_btn">
				<ul class="swiper-wrapper">
                  <li class="swiper-slide"><a href="forum.php?mod=forumdisplay&action=list&fid=$_G[fid]" {if !$_GET['typeid']} class="f_0"{/if}>{lang forum_viewall}</a></li>
                  <!--{if $_G['forum']['threadtypes']}-->
                    <!--{loop $_G['forum']['threadtypes']['types'] $id $name}-->
                      <li class="swiper-slide"><span class="comiis_tm f_c">/</span><a href="forum.php?mod=forumdisplay&action=list&fid=$_G[fid]{if $_GET['typeid'] != $id}&filter=typeid&typeid=$id$forumdisplayadd[typeid]{/if}" {if $_GET['typeid'] == $id} class="f_0"{/if}>$name</a>
                    <!--{/loop}-->
                  <!--{/if}-->
				</ul>
			</div>
		</div>
	</div>
    <!--{if $comiis_app_switch['comiis_subnv_top'] != 1}--></div></div><!--{/if}-->
	<script>
		var mySwiper1 = new Swiper('#comiis_sub_btn', {
			freeMode : true,
			slidesPerView : 'auto',
			onTouchMove: function(swiper){
				Comiis_Touch_on = 0;
			},
			onTouchEnd: function(swiper){
				Comiis_Touch_on = 1;
			},
		});
	</script>
<!--{/if}-->
<!--{if !$_GET['inajax'] && $comiis_displayorder_list && $page == 1}-->
	<div class="comiis_forumlist_top bg_f b_b mb10 cl" style="margin-top:0;border-top:none !important;padding-bottom:5px;">
        <ul{if $comiis_displayorder_num > 3 && $comiis_displayorder_num < $_G['tpp']} id="comiis_displayorder" style="height:104px;overflow:hidden;"{/if}>
            {$comiis_displayorder_list}
        </ul>
        <!--{if $comiis_displayorder_num > 3 && $comiis_displayorder_num < $_G['tpp']}-->
        <ul class="comiis_displayorder_key b_t">
            <li class="comiis_displayorder_show"><a href="javascript:;" onclick="comiis_displayorder_sh(1);" class="comiis_zdmore f_c">{$comiis_lang['tip53']}<i class="comiis_font">&#xe620;</i></a></li>
            <li class="comiis_displayorder_hide"><a href="javascript:;" onclick="comiis_displayorder_sh(0);" class="comiis_zdmore f_c">{$comiis_lang['tip54']}<i class="comiis_font">&#xe621;</i></a></li>
        </ul>
        <!--{/if}-->
	</div>
<!--{/if}-->
<div class="comiis_group_list group_mt">
<!--{eval $comiis_list_template = 'default_g_style'; include_once DISCUZ_ROOT.'./template/comiis_app/comiis/php/comiis_list.php';}-->
</div>
<!--{if (!$comiis_displayorder_list && ($comiis_app_list_num == 10 || $comiis_app_list_num == 7)) || $comiis_app_list_num == 1 || $comiis_app_list_num == 5 || $comiis_app_list_num == 11 || $comiis_app_list_num == 12}--><style>.group_mt {margin-top:0;}</style><!--{/if}-->
<!--{if !$_GET['inajax']}-->
	<!--{if $comiis_app_list_num != 10}--><div id="list_new"></div><!--{/if}-->
	<!--{eval $comiis_page = ceil($_G['forum_threadcount']/$_G['tpp']);}-->
	<div class="comiis_multi_box{if $comiis_app_list_num != 7 && $comiis_app_list_num != 10} bg_f{/if}{if $comiis_app_list_num != 1 && $comiis_app_list_num != 5 && $comiis_app_list_num != 6 && ($comiis_app_list_num != 7 || $comiis_app_switch['comiis_listpage'] == 0) && ($comiis_app_list_num != 10 || $comiis_app_switch['comiis_listpage'] == 0) && $comiis_app_list_num != 11 && $comiis_app_list_num != 12} b_t mt10{/if}{if $comiis_app_list_num == 11 || $comiis_app_list_num == 12} b_t{/if}">
		<!--{if $multipage && ($comiis_app_switch['comiis_listpage'] == 0 || $page > 1)}-->
			{$multipage}
		<!--{elseif $comiis_app_switch['comiis_listpage'] == 1 && $page < $comiis_page}-->
			<a href="javascript:;" onclick="comiis_list_page()" class="comiis_loadbtn{if $comiis_app_list_num == 7 || $comiis_app_list_num == 10} bg_f{else} bg_e{/if} f_d">{$comiis_lang['tip5']}</a>
		<!--{elseif $comiis_app_switch['comiis_listpage'] == 2 && $page < $comiis_page}-->
			<div class="comiis_loadbtn f_d">{$comiis_lang['tip6']}</div>
		<!--{elseif $comiis_app_switch['comiis_listpage'] && $comiis_page == 1 && $_G['forum_threadcount'] > 4}-->
			<div class="comiis_loadbtn f_d">{$comiis_lang['tip31']}</div>
		<!--{/if}-->
	</div>
	<!--{if $page == '' || $comiis_page == ''}-->
	{eval $comiis_page = $page = 1;}
	<!--{/if}-->
    <!--{eval comiis_load('GodHK05BHhhwKHYkZ1', 'page,comiis_page,forumdisplayadd,multiadd,multipage_archive,comiis_app_list_num,comiis_displayorder_num');}-->
<!--{/if}-->