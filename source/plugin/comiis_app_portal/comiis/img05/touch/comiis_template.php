<?PHP exit('Access Denied');?>
<style>
.comiis_mh_bigimg ul {margin:0 12px;overflow:hidden;}
.comiis_mh_bigimg li:first-child {border-top:none !important;}
.comiis_mh_bigimg li a {padding:12px 0 9px;}
.comiis_mh_bigimg li a,.comiis_mh_bigimg li a img,.comiis_mh_bigimg li a span,.comiis_mh_bigimg li a p {display:block;}
.comiis_mh_bigimg li a img {width:100%;margin-bottom:6px;}
.comiis_mh_bigimg li a span {line-height:28px;font-size:17px;overflow:hidden;font-weight:400;}
.comiis_mh_bigimg li a p {line-height:22px;}
</style>
<div class="comiis_mh_bigimg cl">
	<ul>
    <!--{loop $comiis['itemlist'] $temp}-->
		<li class="b_t"><a href="{$temp['url']}" title="{$temp['fields']['fulltitle']}"><img {if $comiis_app_switch['comiis_loadimg']}src="./template/comiis_app/pic/none.png" comiis_loadimages={else}src={/if}"{if $temp['picflag'] == 0}{$temp['pic']}{else}{if $temp['picflag'] == 2}{$_G['setting']['ftp']['attachurl']}{else}{$_G['setting']['attachurl']}{/if}{if $temp['makethumb'] == 1}{$temp['thumbpath']}{else}{$temp['pic']}{/if}{/if}" alt="{$temp['fields']['fulltitle']}" width="100%" class="vm{if $comiis_app_switch['comiis_loadimg']} comiis_loadimages{/if}"><p class="f_ok">#{if $temp['fields']['typename']}{$temp['fields']['typename']}{elseif $temp['fields']['catname']}{$temp['fields']['catname']}{elseif $temp['fields']['groupname']}{$temp['fields']['groupname']}{elseif $temp['fields']['forumname']}{$temp['fields']['forumname']}{/if}#&nbsp;&nbsp;&nbsp;<em class="f_c">{echo dgmdate($temp['fields']['dateline'], ($comiis['dateuformat'] == 1 ? 'u' : $comiis['dateformat']));}</em></p><span class="album_tit">{$temp['title']}</span><p class="f_c f14">{echo strip_tags($temp['summary']);}...</p></a></li>
		<!--{/loop}-->
	</ul>
</div>