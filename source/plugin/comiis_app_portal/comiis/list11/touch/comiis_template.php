<?PHP exit('Access Denied');?>
<style>
.comiis_mh_list11 li {margin:0 12px;padding:8px 0 12px;line-height:28px;font-size:16px;overflow:hidden;}
.comiis_mh_list11 li:first-child {border-top:none !important;}
.comiis_mh_list11 li a.list11_tit {display:block;font-weight:400;}
.comiis_mh_list11 li p {padding-top:5px;height:20px;line-height:20px;font-size:12px;}
.comiis_mh_list11 li p a {float:left;margin-right:12px;}
.comiis_mh_list11 li p a img {float:left;width:20px;height:20px;margin-right:6px;border-radius:50%;}
</style>
<div class="comiis_mh_list11 cl">
	<ul>
    <!--{loop $comiis['itemlist'] $temp}-->
		<li class="b_t">		
            <a href="{$temp['url']}" title="{$temp['fields']['fulltitle']}" class="list11_tit">{$temp['title']}</a>
			<p>
				<span class="y f_c">{if $temp['fields']['views']}{$temp['fields']['views']}{else}{$temp['fields']['viewnum']}{/if}{$comiis_portal['list11_b']}</span>
				<a href="home.php?mod=space&uid={if $temp['fields']['author']}{$temp['fields']['authorid']}{else}{$temp['fields']['uid']}{/if}&do=profile" rel="nofollow" class="f_ok"><img src="{$temp['fields']['avatar_middle']}" class="vm">{if $temp['fields']['author']}{$temp['fields']['author']}{else}{$temp['fields']['username']}{/if}</a>
				<span class="f_c">{echo dgmdate($temp['fields']['dateline'], ($comiis['dateuformat'] == 1 ? 'u' : $comiis['dateformat']));}</span>
			</p>
		</li>
	<!--{/loop}-->
	</ul>
</div>