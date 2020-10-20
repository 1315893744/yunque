<?PHP exit('Access Denied');?>
<style>
.comiis_mh_kx01 {padding:10px 12px;overflow:hidden;}
.comiis_mh_kx01 .kx01_ico {float:left;height:39px;padding:0 1px;margin-top:1px;margin-right:8px;text-align:center;overflow:hidden;border-radius:1.5px;}
.comiis_mh_kx01 .kx01_ico span {display:block;height:20px;line-height:20px;margin:1px auto;font-size:15px;font-weight:400;padding:1px 4px 0 2px;font-style:oblique;overflow:hidden;border-radius:1.5px;}
.comiis_mh_kx01 .kx01_ico p {display:block;height:16px;line-height:16px;font-size:calc(22px / 2);padding:0 4px;overflow:hidden;}
.comiis_mh_kx01 .kx01_ico p em {display:block;height:40px;line-height:16px;overflow:hidden;font-weight:300;}
.comiis_mh_kx01 li {height:40px;line-height:20px;font-size:16px;overflow:hidden;}
.comiis_mh_kx01 li i {height:40px;line-height:40px;padding-left:10px;margin-right:-4px;}
.comiis_mh_kx01 li span {display:block;height:24px;line-height:22px;overflow:hidden;}
.comiis_mh_kx01 li em {display:block;height:16px;line-height:16px;font-size:14px;overflow:hidden;text-overflow:ellipsis;white-space:nowrap;}
</style>
<div class="comiis_mh_kx01 cl">
    <div class="kx01_ico bg_a"><span class="bg_f f_a">{$comiis['summary']}</span><p id="comiis_mh_kx01time{$data['id']}" class="f_f">
    <!--{loop $comiis['itemlist'] $temp}-->
    <em>{echo dgmdate($temp['fields']['dateline'], ($comiis['dateuformat'] == 1 ? 'u' : $comiis['dateformat']));}</em>
    <!--{/loop}-->
    </p></div>
	<div id="comiis_mh_kx01{$data['id']}" style="height:40px;line-height:20px;overflow:hidden;">
	<ul>
    <!--{loop $comiis['itemlist'] $temp}-->
		<li><i class="comiis_mhfont f_d y">&#xe603;</i><a href="{$temp['url']}" title="{$temp['fields']['fulltitle']}"><span>{$temp['title']}</span><em class="f_d">{echo strip_tags($temp['summary']);}</em></a></li>
    <!--{/loop}-->
	</ul>
	</div>
</div>
<script>
comiis_app_portal_loop(40, 30, 3000, 'comiis_mh_kx01{$data['id']}');
comiis_app_portal_loop(40, 30, 3000, 'comiis_mh_kx01time{$data['id']}');
</script>