<?PHP exit('Access Denied');?>
<style>
.comiis_mh_hotbk {width:100%;padding:5px 0;border-collapse:inherit;overflow:hidden;}
.comiis_mh_hotbk li {float:left;text-align:center;width:25%;box-sizing:border-box;}
.comiis_mh_hotbk li a {display:block;padding:10px;}
.comiis_mh_hotbk li img {width:46px;height:46px;margin-bottom:8px;border-radius:3px;}
.comiis_mh_hotbk li p {height:14px;line-height:14px;font-size:13px;}
</style>
<div class="comiis_mh_hotbk cl">
	<ul>
    <!--{loop $comiis['itemlist'] $temp}-->
		<li><a href="{$temp['url']}"><img {if $comiis_app_switch['comiis_loadimg']}src="./template/comiis_app/pic/none.png" comiis_loadimages={else}src={/if}"{$temp['fields']['icon']}" class="vm{if $comiis_app_switch['comiis_loadimg']} comiis_loadimages{/if}"><p>{$temp['title']}</p></a></li>
		<!--{/loop}-->
	</ul>
</div>