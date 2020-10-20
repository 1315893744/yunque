<?PHP exit('Access Denied');?>
<style>
.comiis_mh_img {padding:6px;overflow:hidden;}
.comiis_mh_img li {float:left;width:50%;padding:6px;box-sizing:border-box;}
.comiis_mh_img li a {display:block;width:100%;overflow:hidden;position:relative;}
.comiis_mh_img li img {width:100%;}
.comiis_mh_img li .album_tit {display:block;width:100%;position:absolute;left:0;bottom:0;background:rgba(0,0,0,0.3);font-size:14px;text-align:center;color:#fff;padding-top:1px;height:26px;line-height:26px;overflow:hidden;}
.comiis_mh_img li .album_tit em {display:block;text-align:center;padding:0 5px;}
</style>
<div class="comiis_mh_img cl">
	<ul>
    <!--{loop $comiis['itemlist'] $temp}-->
		<li><a href="{$temp['url']}" title="{$temp['fields']['fulltitle']}"><img {if $comiis_app_switch['comiis_loadimg']}src="./template/comiis_app/pic/none.png" comiis_loadimages={else}src={/if}
"{if $temp['picflag'] == 0}{$temp['pic']}{else}{if $temp['picflag'] == 2}{$_G['setting']['ftp']['attachurl']}{else}{$_G['setting']['attachurl']}{/if}{if $temp['makethumb'] == 1}{$temp['thumbpath']}{else}{$temp['pic']}{/if}{/if}" alt="{$temp['fields']['fulltitle']}" class="vm comiis_img_whb{$data['id']}{if $comiis_app_switch['comiis_loadimg']} comiis_loadimages{/if}"><span class="album_tit"><em>{$temp['title']}</em></span></a></li>
    <!--{/loop}-->
	</ul>
</div>
<script>$('.comiis_img_whb{$data['id']}').css('height', ($('.comiis_img_whb{$data['id']}').width() * {echo $comiis['picheight'] / $comiis['picwidth'];}) + 'px');</script>