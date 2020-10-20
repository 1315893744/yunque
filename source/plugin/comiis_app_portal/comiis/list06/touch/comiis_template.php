<?PHP exit('Access Denied');?>
<style>
.comiis_mh_kxtxt {padding:10px 12px;height:22px;line-height:22px;overflow:hidden;}
.comiis_mh_kxtxt span.kxtit {float:left;height:18px;line-height:18px;padding:0 3px;margin-top:2px;margin-right:8px;overflow:hidden;border-radius:1.5px;}
.comiis_mh_kxtxt li, .comiis_mh_kxtxt li a {display:block;font-size:14px;height:22px;line-height:22px;overflow:hidden;}
</style>
<div class="comiis_mh_kxtxt cl">
  <span class="kxtit bg_del f_f">{$comiis['summary']}</span>
	<div id="comiis_mh_kxtxt{$data['id']}" style="height:22px;line-height:22px;overflow:hidden;">
	<ul>
    <!--{loop $comiis['itemlist'] $temp}-->
		<li><a href="{$temp['url']}" title="{$temp['fields']['fulltitle']}">{$temp['title']}</a></li>
    <!--{/loop}-->
	</ul>
	</div>
</div>
<script>comiis_app_portal_loop(22, 30, 5000, 'comiis_mh_kxtxt{$data['id']}');</script>