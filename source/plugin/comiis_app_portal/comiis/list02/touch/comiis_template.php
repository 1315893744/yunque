<?PHP exit('Access Denied');?>
<style>
.comiis_mh_hotico {padding:0 10px 10px 8px;overflow:hidden;}
.comiis_mh_hotico i {float:left;margin-right:6px;height:42px;line-height:42px;font-size:42px;overflow:hidden;}
.comiis_mh_hotico ul {padding-top:7px;overflow:hidden;}
.comiis_mh_hotico li a {display:block;font-size:14px;line-height:22px;overflow:hidden;}
.comiis_mh_hotico li a span.hottit {display:block;font-size:18px;height:20px;line-height:20px;margin:5px 0;font-weight:400;overflow:hidden;}
</style>
<!--{loop $comiis['itemlist'] $temp}-->
<div class="comiis_mh_hotico cl">
	<i class="comiis_mhfont f_g">&#xe602;</i>
	<ul>	
		<li>
			<a href="{$temp['url']}" title="{$temp['fields']['fulltitle']}">
				<span class="hottit f_g">{$temp['title']}</span>
				<span class="f_c">{echo strip_tags($temp['summary']);}...</span>
			</a>
		</li>
	</ul>
</div>
<!--{/loop}-->