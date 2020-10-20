<?PHP exit('Access Denied');?>
<style>
.comiis_mh_toutiao {padding:0 12px 10px;background:url(./source/plugin/comiis_app_portal/image/toutiao_ico.png) no-repeat;background-position:0 0;background-size:40px auto;overflow:hidden;}
.comiis_mh_toutiao ul {padding-top:7px;overflow:hidden;}
.comiis_mh_toutiao li a {display:block;font-size:14px;line-height:22px;overflow:hidden;}
.comiis_mh_toutiao li a span.hottit {display:block;font-size:18px;height:20px;line-height:20px;font-weight:400;margin:7px 0;text-align:center;overflow:hidden;}
</style>
<!--{loop $comiis['itemlist'] $temp}-->
<div class="comiis_mh_toutiao b_b cl">
	<ul>	
		<li>
			<a href="{$temp['url']}">
				<span class="hottit f_g">{$temp['title']}</span>
				<span class="f_c">{echo strip_tags($temp['summary']);}...</span>
			</a>
		</li>
	</ul>
</div>
<!--{/loop}-->