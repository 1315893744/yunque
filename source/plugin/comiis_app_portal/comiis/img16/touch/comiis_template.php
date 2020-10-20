<?PHP exit('Access Denied');?>
<style>
.comiis_mh_img16 {padding:6px;overflow:hidden;}
.comiis_mh_img16 li {float:left;width:33.33%;padding:6px 6px 4px;box-sizing:border-box;}
.comiis_mh_img16 li a {display:block;width:100%;overflow:hidden;position:relative;}
.comiis_mh_img16 li img {width:100%;}
.comiis_mh_img16 li span {display:block;width:100%;margin-top:6px;font-size:14px;height:22px;line-height:22px;overflow:hidden;text-overflow:ellipsis;white-space:nowrap;}
.comiis_mh_img16 li em {display:block;width:100%;height:20px;line-height:20px;overflow:hidden;}
</style>
<div class="comiis_mh_img16 cl">
	<ul>
    <!--{loop $comiis['itemlist'] $temp}-->
		<li><a href="{$temp['url']}" title="{$temp['fields']['fulltitle']}"><img {if $comiis_app_switch['comiis_loadimg']}src="./template/comiis_app/pic/none.png" comiis_loadimages={else}src={/if}
"{if $temp['picflag'] == 0}{$temp['pic']}{else}{if $temp['picflag'] == 2}{$_G['setting']['ftp']['attachurl']}{else}{$_G['setting']['attachurl']}{/if}{if $temp['makethumb'] == 1}{$temp['thumbpath']}{else}{$temp['pic']}{/if}{/if}" alt="{$temp['fields']['fulltitle']}" class="vm comiis_img_whb{$data['id']}{if $comiis_app_switch['comiis_loadimg']} comiis_loadimages{/if}"><span>{$temp['title']}</span><em class="f_c">{if $temp['fields']['author']}{$temp['fields']['author']}{else}{$temp['fields']['username']}{/if}</em></a></li>
    <!--{/loop}-->
	</ul>
</div>
<script>$('.comiis_img_whb{$data['id']}').css('height', ($('.comiis_img_whb{$data['id']}').width() * {echo $comiis['picheight'] / $comiis['picwidth'];}) + 'px');</script>