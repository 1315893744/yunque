<?PHP exit('Access Denied');?>
<style>
.comiis_mh_kx {padding:10px 12px;height:22px;line-height:22px;overflow:hidden;}
.comiis_mh_kx span.kxico {float:left;width:18px;height:18px;line-height:18px;text-align:center;margin-top:2px;margin-right:8px;overflow:hidden;border-radius:0 4px 4px 4px;}
.comiis_mh_kx span.kxico i {font-size:14px;}
.comiis_mh_kx li, .comiis_mh_kx li a {display:block;font-size:14px;height:22px;line-height:22px;overflow:hidden;}
.comiis_mh_kx li a span.kxtime {float:right;font-size:13px;padding-left:3px;}
</style>
<div class="comiis_mh_kx cl">
	<span class="kxico bg_del f_f"><i class="comiis_mhfont">&#xe600;</i></span>
	<div id="comiis_mh_kx{$data['id']}" style="height:22px;line-height:22px;overflow:hidden;">
	<ul>
    <!--{loop $comiis['itemlist'] $temp}-->
		<li><a href="{$temp['url']}" title="{$temp['fields']['fulltitle']}"><span class="kxtime f_d">{echo dgmdate($temp['fields']['dateline'], ($comiis['dateuformat'] == 1 ? 'u' : $comiis['dateformat']));}</span>{$temp['title']}</a></li>
    <!--{/loop}-->
	</ul>
	</div>
</div>
<script>comiis_app_portal_loop(22, 30, 5000, 'comiis_mh_kx{$data['id']}');</script>