<?PHP exit('Access Denied');?>
<!--{template common/header}-->
<!--{if $_GET['index'] == 1}-->
	<!--{if !$_GET['inajax']}-->
        <!--{if $comiis_app_switch['comiis_guidetimgs']}-->
            <div class="cl" style="position:relative;">
                <!--{if $comiis_app_switch['comiis_guidetimgs']}-->$comiis_app_switch['comiis_guidetimgs']<!--{/if}-->
                <!--{if $comiis_app_switch['comiis_svg'] != 1}--><div class="comiis_svg_box" style="bottom:-6px;"><div class="comiis_svg_a"></div><div class="comiis_svg_b"></div></div><!--{/if}-->
            </div>
        <!--{/if}-->
		<!--{if $comiis_app_switch['comiis_subnv_top'] != 1}--><div style="height:41px;"><div class="comiis_scrollTop_box"><!--{/if}-->
		<div class="comiis_topnv bg_f b_b">
			<ul class="comiis_flex">
				<li class="flex{if $currentview['newthread']} f_0{/if}">{if $currentview['newthread']}<em class="bg_0"></em>{/if}<a href="forum.php?mod=guide&view=newthread&index=1"{if !$currentview['newthread']} class="f_c"{/if}>{$comiis_lang['tip309']}</a></li>
				<li class="flex{if $currentview['hot']} f_0{/if}">{if $currentview['hot']}<em class="bg_0"></em>{/if}<a href="forum.php?mod=guide&view=hot&index=1"{if !$currentview['hot']} class="f_c"{/if}>{$comiis_lang['view56']}</a></li>
				<li class="flex{if $currentview['digest']} f_0{/if}">{if $currentview['digest']}<em class="bg_0"></em>{/if}<a href="forum.php?mod=guide&view=digest&index=1"{if !$currentview['digest']} class="f_c"{/if}>{$comiis_lang['view42']}</a></li>     
				<li class="flex{if $currentview['new']} f_0{/if}">{if $currentview['new']}<em class="bg_0"></em>{/if}<a href="forum.php?mod=guide&view=new&index=1"{if !$currentview['new']} class="f_c"{/if}>{$comiis_lang['reply']}</a></li>        
				<li class="flex{if $currentview['sofa']} f_0{/if}">{if $currentview['sofa']}<em class="bg_0"></em>{/if}<a href="forum.php?mod=guide&view=sofa&index=1"{if !$currentview['sofa']} class="f_c"{/if}>{lang guide_sofa}</a></li>
			</ul>
		</div>
		<!--{if $comiis_app_switch['comiis_subnv_top'] != 1}--></div></div><!--{/if}-->
    <!--{/if}-->
	<!--{loop $data $key $list}-->
		<!--{subtemplate forum/guide_list_row}-->
	<!--{/loop}-->
<!--{else}-->
    <div class="comiis_notip comiis_sofa mt15 cl">
        <i class="comiis_font f_e cl">&#xe613;</i>
        <span class="f_d">{$comiis_lang['tip222']}</span>
    </div>
<!--{/if}-->
<!--{template common/footer}-->