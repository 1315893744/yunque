<?PHP exit('Access Denied');?>
<style>
.comiis_mh_txtlist_bk li {margin:0 12px;height:40px;line-height:40px;font-size:15px;overflow:hidden;}
.comiis_mh_txtlist_bk li:first-child {border-top:none !important;}
.comiis_mh_txtlist_bk li a {display:block;}
.comiis_mh_txtlist_bk li span {font-size:13px;padding-left:8px;}
</style>
<div class="comiis_mh_txtlist_bk cl">
	<ul>
    <!--{loop $comiis['itemlist'] $temp}-->
		<li class="b_t"><a href="{$temp['url']}" title="{$temp['fields']['fulltitle']}"><span class="f_d y">{echo dgmdate($temp['fields']['dateline'], ($comiis['dateuformat'] == 1 ? 'u' : $comiis['dateformat']));}</span>{if $temp['fields']['typename']}<font class="f_0">{$temp['fields']['typename']} |</font>{elseif $temp['fields']['catname']}<font class="f_0">{$temp['fields']['catname']} |</font>{elseif $temp['fields']['groupname']}<font class="f_0">{$temp['fields']['groupname']} |</font>{elseif $temp['fields']['forumname']}<font class="f_0">{$temp['fields']['forumname']} |</font>{/if} {$temp['title']}</a></li>
		<!--{/loop}-->
	</ul>
</div>