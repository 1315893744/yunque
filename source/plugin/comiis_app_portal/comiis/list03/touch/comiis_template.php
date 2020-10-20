<?PHP exit('Access Denied');?>
<style>
.comiis_mh_txtlist li {margin:0 12px;height:40px;line-height:40px;font-size:15px;overflow:hidden;}
.comiis_mh_txtlist li:first-child {border-top:none !important;}
.comiis_mh_txtlist li a {display:block;}
.comiis_mh_txtlist li i {font-size:12px;margin-right:4px;}
.comiis_mh_txtlist li span {font-size:13px;padding-left:8px;}
</style>
<div class="comiis_mh_txtlist cl">
	<ul>
    <!--{loop $comiis['itemlist'] $temp}-->
		<li class="b_t"><a href="{$temp['url']}" title="{$temp['fields']['fulltitle']}"><span class="f_d y">{if $temp['fields']['author']}{$temp['fields']['author']}{else}{$temp['fields']['username']}{/if}</span><i class="comiis_mhfont f_d z">&#xe603;</i>{$temp['title']}</a></li>
		<!--{/loop}-->
	</ul>
</div>