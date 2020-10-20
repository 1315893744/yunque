<?PHP exit('Access Denied');?>
<!--{template common/header}-->
<!--{eval $comiis_app_switch['comiis_list_zntits'] = $comiis_app_switch['comiis_grouplist_zntits'];}-->
<!--{if $comiis_app_switch['comiis_group_style'] == 1 || $_GET['hot'] == 'yes'}-->
	<!--{template group/comiis_grouplist}-->
<!--{else}-->
<!--{eval include_once DISCUZ_ROOT.'./template/comiis_app/comiis/php/comiis_group_index.php';}-->
<!--{if !$_GET['inajax'] && $page == 1}-->	
	<div class="comiis_topsearch cl">	  
		<div id="comiis_search_noe"><a href="javascript:comiis_search_show(1);" class="ssbox ssct b_ok bg_f f_d"><i class="comiis_font f_d">&#xe622;</i> $comiis_group_lang['024']</a></div>
		<div id="comiis_search_two" style="display:none">            
			<form class="searchform" method="post" autocomplete="off" action="search.php?mod=group">
				<input type="hidden" name="formhash" value="{FORMHASH}" />
				<input type="hidden" name="searchsubmit" value="yes" />
				<ul class="comiis_flex">				
				<input type="search" id="scform_srchtxt" name="srchtxt" placeholder="{$comiis_lang['enter_content']}..." class="ssbox b_ok bg_f f_d flex" />	
				<a href="javascript:comiis_search_show(0);" class="ssclose bg_f f_e"><i class="comiis_font">&#xe647;</i></a>
                <button type="submit" value="true" name="scform_submit" class="ssbtn bg_c f_f">{$comiis_lang['tip129']}</button>
				</ul>			
			</form>
		</div>
	</div>	
    <script>
    function comiis_search_show(a){
        if(a == 1){
            $('#comiis_search_noe').hide();
            $('#comiis_search_two').show()
            $('#scform_srchtxt').focus();
        }else{
            $('#comiis_search_two').hide();
            $('#comiis_search_noe').show();
        }
    }
    </script>
    <!--{if $comiis_app_switch['comiis_group_thtml']}-->{$comiis_app_switch['comiis_group_thtml']}<!--{/if}-->
	<script src="template/comiis_app/comiis/js/comiis_swiper.min.js?{VERHASH}"></script>
	<script>
		if($("#comiis_rollimg li").length > 0) {
			var comiis_index = $("#comiis_rollimg li").offset().left + $("#comiis_rollimg li").width() >= $(window).width() ? $("#comiis_rollimg li").index() : 0;
		}else{
			var comiis_index = 0;
		}
		mySwiper = new Swiper('#comiis_rollimg', {
			freeMode : true,
			slidesPerView : 'auto',
			initialSlide : comiis_index,
			onTouchMove: function(swiper){
				Comiis_Touch_on = 0;
			},
			onTouchEnd: function(swiper){
				Comiis_Touch_on = 1;
			},
		});
	</script>
	<div class="comiis_uibox bg_f b_t b_b cl">
		<h2 class="b_b"><!--{if $_G['uid']}--><a href="group.php?mod=my&view=join" class="comiis_xifont y f_0"><i class="comiis_font">&#xe612;</i> {$comiis_lang['tip250']}</a><!--{/if}--><!--{if ($comiis_app_switch['comiis_header_show'] == 2 || ($comiis_app_switch['comiis_header_show'] == 3 && $comiis_isweixin == 1))}--><a href="forum.php?mod=group&action=create" class="comiis_xifont y f_wx">+ {$comiis_group_lang['033']}</a><!--{/if}--><span class="f_c">{$comiis_group_lang['037']}</span>{if $comiis_app_switch['comiis_group_jxtj'] == 0} <em class="f_c">{echo count($user_fid)}</em>{/if}</h2>
		<!--{if $_G['uid'] && count($user_fid)}-->
            <div class="comiis_userlist01{if $comiis_app_switch['comiis_group_jxtj'] == 0} b_b{/if} cl">
              <ul>
                <!--{eval $n = 0;}-->
                <!--{loop $user_fid $fid}-->
                <!--{eval $n++;}-->
                <!--{if $n > 5}--><!--{eval break;}--><!--{/if}-->
                <li class="b_t">
                    <a href="forum.php?mod=forumdisplay&action=list&fid=$fid['fid']" class="block">
                        <i class="comiis_font f_e">&#xe60c;</i>
                        <!--{if $fid[todayposts]}--><em class="bg_c f_f">{$fid[todayposts]}</em><!--{/if}-->
                        <span class="list01_limg bg_e"><img {if $comiis_app_switch['comiis_loadimg']}src="./template/comiis_app/pic/none.png" comiis_loadimages={else}src={/if}"$fid[icon]" alt="$fid[name]"{if $comiis_app_switch['comiis_loadimg']} class="comiis_loadimages"{/if} /></span>
                        <p class="tit">{$fid[name]}</p>
                        <p class="txt f_d"><!--{if $fid[description]}-->{$fid[description]}<!--{else}-->{$comiis_lang['tip325']}<!--{/if}--></p>
                    </a>
                </li>
                <!--{/loop}-->
                <!--{if $comiis_app_switch['comiis_group_jxtj'] == 1 && count($user_fid) > 5}-->
                <li class="b_t">
                    <a href="group.php?mod=my&view=join" class="f_d f14">{$comiis_group_lang['041']}{echo count($user_fid)}{$comiis_group_lang['038']}</a>
                </li>
                <!--{/if}-->
              </ul>
            </div>
            <!--{if $comiis_app_switch['comiis_group_jxtj'] == 0}-->
            <div class="comiis_notip comiis_sofa bg_f cl">
                <a href="group.php?mod=my&view=join" class="bg_c f_f cl" style="margin-top:0;">{$comiis_lang['all58']}{$comiis_group_lang['001']}</a><a href="group.php?hot=yes" class="bg_c f_f cl" style="margin-top:0;">{$comiis_lang['all']}{$comiis_group_lang['001']}</a>
            </div> 
            <!--{/if}-->
		<!--{else}-->
		<div class="comiis_notip comiis_sofa bg_f cl">
			<i class="comiis_font f_d cl">&#xe613;</i>
			<span class="f_d">{$comiis_group_lang['039']}</span>
			<a href="group.php?hot=yes" class="bg_c f_f cl">{$comiis_group_lang['040']}</a>
		</div>
		<!--{/if}-->
	</div>
	<!--{if $comiis_app_switch['comiis_group_jxtj'] == 1 && $_G['setting']['group_recommend'] && count(dunserialize($_G['setting']['group_recommend']))}-->
	<div class="comiis_uibox bg_f b_t b_b mt10 cl">
        <h2 class="b_b"><a href="group.php?hot=yes" class="comiis_xifont y f_0"><i class="comiis_font">&#xe622;</i> {$comiis_lang['all']}{$comiis_group_lang['001']}</a><span class="f_c">{$comiis_app_switch['comiis_group_jxtj_name']}</span></h2>
        <div id="comiis_grouphot" class="comiis_grouphot cl">
            <ul class="swiper-wrapper">	
            <!--{loop dunserialize($_G['setting']['group_recommend']) $val}-->
                <li class="swiper-slide b_ok">					
                    <a href="forum.php?mod=forumdisplay&action=list&fid={$val['fid']}" title="$val[name]">
                        <img {if $comiis_app_switch['comiis_loadimg']}src="./template/comiis_app/pic/none.png" comiis_loadimages={else}src={/if}"$val[icon]" alt="$val[name]" class="vm{if $comiis_app_switch['comiis_loadimg']} comiis_loadimages{/if}" />						
                        <h2>$val[name]</h2>
                    </a>
                    <!--{if is_array($user_fid[$val['fid']])}-->
                    <p class="kmbtn"><span class="bg_b f_d">{$comiis_lang['tip312']}</span></p>
                    <!--{else}-->
                    <p class="kmbtn">
                        <a href="{if $_G['uid']}forum.php?mod=group&action=join&fid={$val['fid']}{elseif !$_G[connectguest]}javascript:popup.open('{$comiis_lang['tip16']}', 'confirm', 'member.php?mod=logging&action=login');{else}javascript:popup.open('{$comiis_lang['reg23']}', 'confirm', 'member.php?mod=connect');{/if}" title="$val[name]"{if $_G['uid']} class="dialog"{/if}><span class="bg_c f_f">+ {$comiis_group_lang['041']}</span></a>
                    </p>
                    <!--{/if}-->
                </li>
            <!--{/loop}-->
            </ul>
        </div>
        <script>
            mySwiper = new Swiper('#comiis_grouphot', {
                freeMode : true,
                freeModeMomentumRatio : 0.5,
                slidesPerView : 'auto',
                onTouchMove: function(swiper){
                    Comiis_Touch_on = 0;
                },
                onTouchEnd: function(swiper){
                    Comiis_Touch_on = 1;
                },
            });
        </script>
	</div>
	<!--{/if}-->
	<!--{if $comiis_app_switch['comiis_group_bhtml']}-->{$comiis_app_switch['comiis_group_bhtml']}<!--{/if}-->
<!--{/if}-->
<!--{eval $comiis_page = ceil($num/$mpp);}-->
<!--{if $comiis_app_switch['comiis_group_ilist']}-->
	<!--{if !$_GET['inajax'] && $_G['uid']}-->
		<script>var formhash = '{FORMHASH}', allowrecommend = '{$_G['group']['allowrecommend']}';</script>
		<script src="template/comiis_app/comiis/js/comiis_forumdisplay.js?{VERHASH}"></script>
	<!--{/if}-->
	<!--{if !$_GET['inajax'] && $page == 1}--><div class="mt10"></div><!--{/if}-->
	<!--{if !$_GET['inajax']}-->
	<!--{if $comiis_app_switch['comiis_subnv_top'] != 1}--><div style="height:40px;"><div class="comiis_scrollTop_box"><!--{/if}-->
	<div class="comiis_topnv bg_f b_b">
	  <ul class="comiis_flex">
		<li class="flex f_0"><em class="bg_0"></em><a href="group.php?mod=index">{$comiis_group_lang['043']}{$comiis_group_lang['014']}</a></li>
		<li class="flex"><a href="{if $_G['uid']}group.php?mod=my&view=mythread{elseif !$_G[connectguest]}javascript:popup.open('{$comiis_lang['tip16']}', 'confirm', 'member.php?mod=logging&action=login');{else}javascript:popup.open('{$comiis_lang['reg23']}', 'confirm', 'member.php?mod=connect');{/if}" class="f_c">{$comiis_lang['all58']}{$comiis_group_lang['014']}</a></li>
	  </ul>
	</div>
	<!--{if $comiis_app_switch['comiis_subnv_top'] != 1}--></div></div><!--{/if}-->
	<!--{/if}-->
	<div class="comiis_group_list{if !$_GET['inajax'] || $page == 1} group_mt{/if}">
	<!--{eval $comiis_list_template = 'default_g_style'; include_once DISCUZ_ROOT.'./template/comiis_app/comiis/php/comiis_list.php';}-->
	</div>
	<!--{if !$_GET['inajax']}-->
		<!--{if $comiis_app_list_num != 10}--><div id="list_new"></div><!--{/if}-->
		<!--{if $comiis_app_list_num == 10 || $comiis_app_list_num == 7}--><style>.group_mt {margin-top:0;}</style><!--{/if}-->
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
		<!--{eval comiis_load('NrsxXa4A44RXXaW5Wv', 'page,comiis_page,comiis_app_list_num');}-->
	<!--{/if}-->
<!--{/if}-->
<!--{/if}-->
{eval}
$comiis_app_wx_share['img'] = './template/comiis_app/pic/icon152.png';
$comiis_app_wx_share['title'] = $comiis_group_lang['001'].' - '.$comiis_app_switch['comiis_sitename'];
{/eval}
<!--{template common/footer}-->