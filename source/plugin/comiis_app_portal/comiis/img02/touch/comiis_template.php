<?PHP exit('Access Denied');?>
<style>
.comiis_mh_twlist {overflow:hidden;}
.comiis_mh_twlist ul {margin:0 12px;overflow:hidden;}
.comiis_mh_twlist .twlist_li:first-child,.comiis_mh_twlist .twlist_li:first-child a {border-top:none !important;}
.comiis_mh_twlist .twlist_li a {display:block;width:100%;padding:12px 0;overflow:hidden;}
.comiis_mh_twlist .twlist_li a.twlist_noimg {padding:8px 0;}
.comiis_mh_twlist .twlist_img {float:left;width:30%;height:85px;overflow:hidden;margin-right:8px;}
.comiis_mh_twlist .twlist_img img {width:100%;}
.comiis_mh_twlist .twlist_info {height:85px;overflow:hidden;}
.comiis_mh_twlist .twlist_info strong {font-weight:400;}
.comiis_mh_twlist .twlist_info p,.comiis_mh_twlist .twlist_info span {display:block;overflow:hidden;}
.comiis_mh_twlist .twlist_info p {height:52px;line-height:26px;font-size:17px;}
.comiis_mh_twlist .twlist_info span {height:20px;line-height:20px;margin-top:14px;font-size:12px;position:relative;}
.comiis_mh_twlist .twlist_info span em {float:right;text-align:right;display:table-cell;vertical-align:bottom;}
.comiis_mh_twlist .twlist_info span i {float:right;margin-top:1px;margin-left:4px;height:14px;line-height:14px;font-size:12px;border-radius:2px;padding:0 2px;overflow:hidden;}
</style>
<div class="comiis_mh_twlist cl">
	<ul>
		<!--{loop $comiis['itemlist'] $temp}-->
		<li class="twlist_li b_t">
			<a href="{$temp['url']}" title="{$temp['fields']['fulltitle']}">
				<div class="twlist_img bg_e"><img {if $comiis_app_switch['comiis_loadimg']}src="./template/comiis_app/pic/none.png" comiis_loadimages={else}src={/if}"{if $temp['picflag'] == 0}{$temp['pic']}{else}{if $temp['picflag'] == 2}{$_G['setting']['ftp']['attachurl']}{else}{$_G['setting']['attachurl']}{/if}{if $temp['makethumb'] == 1}{$temp['thumbpath']}{else}{$temp['pic']}{/if}{/if}" width="{$temp['picwidth']}" height="{$temp['picheight']}" alt="{$temp['fields']['fulltitle']}"{if $comiis_app_switch['comiis_loadimg']} class="comiis_loadimages"{/if}></div>
				<div class="twlist_info">
					<p>{$temp['title']}</p>
					<span class="f_d"><em>{if $temp['fields']['views'] > 500}<i class="b_ok b_i f_g">{$comiis_portal['img02_b']}</i>{/if}{if $temp['fields']['views']}{$temp['fields']['views']}{else}{$temp['fields']['viewnum']}{/if}{$comiis_portal['img02_c']}</em>{echo dgmdate($temp['fields']['dateline'], ($comiis['dateuformat'] == 1 ? 'u' : $comiis['dateformat']));}</span>
				</div>
			</a>
		</li>
		<!--{/loop}-->
	</ul>
</div>