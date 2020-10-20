<?php echo '顾顾顾北辰 2019-1-11 21:50'; exit;?>
<!--{template common/header}-->
<!--{if $comiis_app_switch['comiis_subnv_top'] != 1}--><div style="height:40px;"><div class="comiis_scrollTop_box"><!--{/if}-->
<div class="comiis_topnv bg_f b_b">
    <ul class="comiis_flex">
        <li class="flex{if $a_actives[credit]} f_0{/if}">{if $a_actives[credit]}<em class="bg_0"></em>{/if}<a href="misc.php?mod=ranklist&type=member&view=credit"{if !$a_actives[credit]} class="f_c"{/if}>{$comiis_lang['tip315']}</a></li>
        <li class="flex{if $a_actives[post]} f_0{/if}">{if $a_actives[post]}<em class="bg_0"></em>{/if}<a href="misc.php?mod=ranklist&type=member&view=post"{if !$a_actives[post]} class="f_c"{/if}>{$comiis_lang['tip316']}</a></li>
        <li class="flex{if $a_actives[beauty]} f_0{/if}">{if $a_actives[beauty]}<em class="bg_0"></em>{/if}<a href="misc.php?mod=ranklist&type=member&view=beauty"{if !$a_actives[beauty]} class="f_c"{/if}>{$comiis_lang['tip317']}</a></li>
        <li class="flex{if $a_actives[handsome]} f_0{/if}">{if $a_actives[handsome]}<em class="bg_0"></em>{/if}<a href="misc.php?mod=ranklist&type=member&view=handsome"{if !$a_actives[handsome]} class="f_c"{/if}>{$comiis_lang['tip318']}</a></li>
    </ul>
</div>
<!--{if $comiis_app_switch['comiis_subnv_top'] != 1}--></div></div><!--{/if}-->
<div class="styli_h10 bg_e b_t b_b"></div>
<!--{if $list}-->
    <div class="cl">
        <!--{eval include_once DISCUZ_ROOT.'./template/comiis_app/comiis/php/ranklist.php';}-->
        
   <div class="comiis_rankhot{if $a_actives[post]} comiis_rankhot_post{/if}{if $a_actives[beauty]} comiis_rankhot_mm{/if}{if $a_actives[handsome]} comiis_rankhot_boy{/if} cl"> 
    <div class="comiis_rankbl">
     <img src="template/comiis_app/comiis/img/comiis_rankbl.png" class="vm" />
    </div> 
    <ul> 
	<!--{loop $list $key $value}-->
	<!--{if $value[rank] <= 3}-->
     <li>
		<a href="home.php?mod=space&amp;uid=$value[uid]&amp;do=profile"> 
		   <div class="user_img">
			<span class="bg_f"><em><img src="template/comiis_app/comiis/img/comiis_rank0$value[rank].png" alt="1" /></em><!--{avatar($value[uid],big)}--></span>
		   </div> <h2> <span class="vm">$value[username]</span><!--{if $_G['comiis_user_data'][$value[uid]][gender]==1}--><i class="comiis_font user_gender bg_boy f_f">&#xe63f;</i><!--{/if}--><!--{if $_G['comiis_user_data'][$value[uid]][gender]==2}--><i class="comiis_font user_gender bg_girl f_f">&#xe637;</i><!--{/if}--></h2>
		   <div class="user_txt comiis_tm">
				<!--{if $value['credits']}-->{lang credit_num}: $value[credits]<!--{/if}-->
				<!--{if $value['posts']}-->{lang posts_num}: $value[posts]<!--{/if}--> 
		   </div>
		</a>
	 </li> 
	 <!--{/if}-->
	 <!--{/loop}-->
    </ul> 
   </div> 
   <div class="comiis_ranklist cl"> 
    <ul> 
	<!--{loop $list $key $value}-->
	<!--{if $value[rank] > 3}-->
		<li class="b_t">
			<a href="home.php?mod=space&amp;uid=$value[uid]&amp;do=profile">
				<span class="y f_c">
				<!--{if $value['credits']}-->{lang credit_num}: $value[credits]<!--{/if}-->
				<!--{if $value['posts']}-->{lang posts_num}: $value[posts]<!--{/if}--> 
				</span>
				<span class="user_mun f_c">$value[rank]</span>
				<!--{avatar($value[uid],middle)}-->
				<span class="user_tit">$value[username]</span>
			</a>
		</li>
	<!--{/if}-->
	<!--{/loop}-->
    </ul> 
   </div> 
      
      
    </div>
    <!--{if $multi}--><div class="comiis_pgs cl">$multi</div><!--{/if}-->
	</div>
<!--{else}-->
	<div class="comiis_notip comiis_sofa mt15 cl">
		<i class="comiis_font f_e cl">&#xe613;</i>
		<span class="f_d">{$comiis_lang['all22']}</span>
	</div>
<!--{/if}-->
<div class="comiis_vfgohome f_d b_t" style="text-align:center;">{$comiis_lang['ranklist_update']}</div>
<!--{eval $comiis_foot = 'no';}-->
<!--{template common/footer}-->