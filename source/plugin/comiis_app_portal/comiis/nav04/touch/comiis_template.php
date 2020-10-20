<?PHP exit('Access Denied');?>
<style>
.comiis_mh_nav_jd {height:40px;width:100%;overflow:hidden;}
.comiis_mh_nav_jdbox {height:40px;position:relative;}
.comiis_mh_nav_jdsub {height:40px;text-align:center;white-space:nowrap;width:100%;}
.comiis_mh_nav_jdsub li {float:left;width:auto;overflow:hidden;position:relative;}
.comiis_mh_nav_jdsub em {position:absolute;left:50%;bottom:2px;margin-left:-9px;height:4px;width:18px;border-radius:10px;}
.comiis_mh_nav_jdsub a {display:inline-block;font-size:15px;height:40px;line-height:40px;padding:0 12px;}
</style>
<!--{if $comiis_app_switch['comiis_subnv_top'] != 1}--><div style="height:40px;"><div class="comiis_scrollTop_box"><!--{/if}-->
<div class="comiis_mh_nav_jd bg_f<!--{if $comiis_app_switch['comiis_subnv_top'] != 1}--> b_b<!--{/if}-->">
	<div class="comiis_mh_nav_jdbox">
		<div class="comiis_mh_nav_jdsub">
			<ul class="comiis_flex">
				{$comiis['summary']}
			</ul>
		</div>
	</div>
</div>
<!--{if $comiis_app_switch['comiis_subnv_top'] != 1}--></div></div><!--{/if}-->