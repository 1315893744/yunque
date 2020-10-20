<?PHP exit('Access Denied');?>
<style>
.comiis_mh_list10 li {margin:0 12px;height:40px;line-height:40px;font-size:15px;overflow:hidden;}
.comiis_mh_list10 li:first-child {border-top:none !important;}
.comiis_mh_list10 li a {display:block;}
.comiis_mh_list10 li span {font-size:13px;padding-left:8px;}
</style>
<div class="comiis_mh_list10 cl">
	<ul>
    <!--{loop $comiis['itemlist'] $temp}-->
		<li class="b_t"><a href="{$temp['url']}" title="{$temp['fields']['fulltitle']}"><span class="f_d y">{if $temp['fields']['views']}{$temp['fields']['views']}{else}{$temp['fields']['viewnum']}{/if}{$comiis_portal['list10_b']}</span><font class="f_0">#</font> {$temp['title']}</a></li>
	<!--{/loop}-->
	</ul>
</div>