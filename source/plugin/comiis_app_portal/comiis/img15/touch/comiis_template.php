<?PHP exit('Access Denied');?>
<style>
.comiis_mh_img15 {padding:6px;overflow:hidden;}
.comiis_mh_img15 li {float:left;width:50%;padding:6px;box-sizing:border-box;}
.comiis_mh_img15 li a {display:block;width:100%;overflow:hidden;position:relative;}
.comiis_mh_img15 li img {width:100%;}
.comiis_mh_img15 li .album_tit {display:block;width:100%;margin:6px 0 5px;font-size:16px;font-weight:400;height:48px;line-height:24px;overflow:hidden;}
.comiis_mh_img15 li .album_user {display:block;width:100%;font-size:12px;height:16px;line-height:16px;overflow:hidden;}
</style>
<div class="comiis_mh_img15 cl">
	<ul>
    <!--{loop $comiis['itemlist'] $temp}-->
		<li><a href="{$temp['url']}" title="{$temp['fields']['fulltitle']}"><img {if $comiis_app_switch['comiis_loadimg']}src="./template/comiis_app/pic/none.png" comiis_loadimages={else}src={/if}
"{if $temp['picflag'] == 0}{$temp['pic']}{else}{if $temp['picflag'] == 2}{$_G['setting']['ftp']['attachurl']}{else}{$_G['setting']['attachurl']}{/if}{if $temp['makethumb'] == 1}{$temp['thumbpath']}{else}{$temp['pic']}{/if}{/if}" alt="{$temp['fields']['fulltitle']}" class="vm comiis_img_whb{$data['id']}{if $comiis_app_switch['comiis_loadimg']} comiis_loadimages{/if}"><span class="album_tit">{$temp['title']}</span><span class="album_user f_c"><em class="y">{if $temp['fields']['views']}{$temp['fields']['views']}{else}{$temp['fields']['viewnum']}{/if}{$comiis_portal['img15_b']}</em><em class="f_ok">{if $temp['fields']['author']}{$temp['fields']['author']}{else}{$temp['fields']['username']}{/if}</em></span></a></li>
    <!--{/loop}-->
	</ul>
</div>
<script>$('.comiis_img_whb{$data['id']}').css('height', ($('.comiis_img_whb{$data['id']}').width() * {echo $comiis['picheight'] / $comiis['picwidth'];}) + 'px');</script>