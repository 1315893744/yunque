<?PHP exit('Access Denied');?>
<style>
.comiis_mh_twlist01 {overflow:hidden;}
.comiis_mh_twlist01 ul {margin:0 12px;overflow:hidden;}
.comiis_mh_twlist01 .twlist_li:first-child,.comiis_mh_twlist .twlist_li:first-child a {border-top:none !important;}
.comiis_mh_twlist01 .twlist_li a {display:block;width:100%;padding:12px 0;overflow:hidden;}
.comiis_mh_twlist01 .twlist_li a.twlist_noimg {padding:8px 0;}
.comiis_mh_twlist01 .twlist_img {float:right;width:30%;height:85px;overflow:hidden;margin-left:10px;}
.comiis_mh_twlist01 .twlist_img img {width:100%;}
.comiis_mh_twlist01 .twlist_info {height:85px;overflow:hidden;}
.comiis_mh_twlist01 .twlist_info strong {font-weight:400;}
.comiis_mh_twlist01 .twlist_info p,.comiis_mh_twlist01 .twlist_info span {display:block;overflow:hidden;}
.comiis_mh_twlist01 .twlist_info p {height:48px;line-height:24px;font-size:17px;}
.comiis_mh_twlist01 .twlist_info p i {float:left;margin-top:3px;margin-right:4px;height:16px;line-height:16px;font-size:12px;padding:0 2px;overflow:hidden;}
.comiis_mh_twlist01 .twlist_info p i.comiis_xifont:after {border-radius:3px;}
.comiis_mh_twlist01 .twlist_info span {height:20px;line-height:20px;margin-top:17px;font-size:13px;position:relative;}
.comiis_mh_twlist01 .twlist_info span em.img06_tximg {float:left;width:18px;height:18px;line-height:18px;margin-right:4px;border-radius:50%;}
.comiis_mh_twlist01 .twlist_info span img {width:18px;height:18px;border-radius:50%;}
.comiis_mh_twlist01 .twlist_info span em.img06_views {float:right;text-align:right;font-size:12px;display:table-cell;vertical-align:bottom;}
.comiis_mh_twlist01 .twlist_info span i {float:left;margin-top:3px;margin-right:1px;height:14px;line-height:14px;font-size:14px;border-radius:2px;padding:0 2px;overflow:hidden;}
.comiis_mh_twlist01 .twlist_info span font {margin-right:6px;}
</style>
<div class="comiis_mh_twlist01 cl">
	<ul>
		<!--{loop $comiis['itemlist'] $temp}-->
		<li class="twlist_li b_t">
			<a href="{$temp['url']}" title="{$temp['fields']['fulltitle']}">
				<div class="twlist_img bg_e"><img {if $comiis_app_switch['comiis_loadimg']}src="./template/comiis_app/pic/none.png" comiis_loadimages={else}src={/if}"{if $temp['picflag'] == 0}{$temp['pic']}{else}{if $temp['picflag'] == 2}{$_G['setting']['ftp']['attachurl']}{else}{$_G['setting']['attachurl']}{/if}{if $temp['makethumb'] == 1}{$temp['thumbpath']}{else}{$temp['pic']}{/if}{/if}" width="{$temp['picwidth']}" height="{$temp['picheight']}" alt="{$temp['fields']['fulltitle']}"{if $comiis_app_switch['comiis_loadimg']} class="comiis_loadimages"{/if}
></div>
				<div class="twlist_info">
					<p>{if $temp['fields']['views'] > 500}<i class="comiis_xifont f_g">{$comiis_portal['img06_b']}</i>{/if}{$temp['title']}</p>
					<span>
                        <em class="img06_views f_d"><i class="comiis_mhfont f_e">&#xe604;</i>{if $temp['fields']['views']}{$temp['fields']['views']}{else}{$temp['fields']['viewnum']}{/if}</em>
                        <em class="img06_tximg bg_e"><img {if $comiis_app_switch['comiis_loadimg']}src="./template/comiis_app/pic/none.png" comiis_loadimages={else}src={/if}"$temp['fields']['avatar']"{if $comiis_app_switch['comiis_loadimg']} class="comiis_loadimages"{/if}
            ></em><font class="f_b">{if $temp['fields']['author']}{$temp['fields']['author']}{else}{$temp['fields']['username']}{/if}</font>
                        <font class="f_d">{echo dgmdate($temp['fields']['dateline'], ($comiis['dateuformat'] == 1 ? 'u' : $comiis['dateformat']));}</font>
					</span>
				</div>
			</a>
		</li>
		<!--{/loop}-->
	</ul>
</div>