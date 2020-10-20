<?PHP exit('Access Denied');?>
<style>
.comiis_mh_hot {padding:0;overflow:hidden;}
.comiis_mh_hot li {margin:0 12px;padding:12px 0 10px;overflow:hidden;}
.comiis_mh_hot li:first-child {border-top:none !important;}
.comiis_mh_hot li a {display:block;font-size:14px;line-height:22px;overflow:hidden;}
.comiis_mh_hot li a span.hottit {display:block;font-size:18px;height:20px;line-height:20px;margin-top:2px;margin-bottom:5px;font-weight:400;overflow:hidden;}
</style>
<div class="comiis_mh_hot cl">
	<ul>
    <!--{loop $comiis['itemlist'] $temp}-->
		<li class="b_t">
			<a href="{$temp['url']}" title="{$temp['fields']['fulltitle']}">
				<span class="hottit">{$temp['title']}</span>
				<span class="f_c">{echo strip_tags($temp['summary']);}...</span>
			</a>
		</li>
		<!--{/loop}-->
	</ul>
</div>