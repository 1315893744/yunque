<?PHP exit('Access Denied');?>
<style>
.comiis_mh_img17 {padding:0 6px 8px;overflow:hidden;}
.comiis_mh_img17 li {float:left;margin:12px 6px 0;width:40%;box-sizing:border-box;overflow:hidden;position:relative;border:none !important;}
.comiis_mh_img17 li a.kmimg {display:block;}
.comiis_mh_img17 li a.kmimg img {width:100%;}
.comiis_mh_img17 li h2 {margin:8px 0 3px;height:44px;line-height:22px;font-size:15px;overflow:hidden;}
.comiis_mh_img17 li h2 a {display:block;font-weight:400;}
.comiis_mh_img17 li p {height:20px;line-height:20px;font-size:12px;}
</style>
<div id="comiis_mh_imggo{$data['id']}" class="comiis_mh_img17 cl">
	<ul class="swiper-wrapper">
    <!--{loop $comiis['itemlist'] $temp}-->
		<li class="swiper-slide">					
			<a href="{$temp['url']}" title="{$temp['fields']['fulltitle']}" class="kmimg"><img {if $comiis_app_switch['comiis_loadimg']}src="./template/comiis_app/pic/none.png" comiis_loadimages={else}src={/if}
"{if $temp['picflag'] == 0}{$temp['pic']}{else}{if $temp['picflag'] == 2}{$_G['setting']['ftp']['attachurl']}{else}{$_G['setting']['attachurl']}{/if}{if $temp['makethumb'] == 1}{$temp['thumbpath']}{else}{$temp['pic']}{/if}{/if}" alt="{$temp['fields']['fulltitle']}" width="100%" class="vm comiis_imggo_whb{$data['id']}{if $comiis_app_switch['comiis_loadimg']} comiis_loadimages{/if}"></a>							
			<h2><a href="{$temp['url']}" title="{$temp['fields']['fulltitle']}">{$temp['title']}</a></h2>
			<p class="f_c">{if $temp['fields']['views']}{$temp['fields']['views']}{else}{$temp['fields']['viewnum']}{/if}{$comiis_portal['img17_b']}</p>
		</li>
		<!--{/loop}-->
	</ul>
</div>
<script>
  $('.comiis_imggo_whb{$data['id']}').css('height', ($('.comiis_imggo_whb{$data['id']}').width() * {echo $comiis['picheight'] / $comiis['picwidth'];}) + 'px');
	comiis_app_portal_swiper('#comiis_mh_imggo{$data['id']}', {
		freeMode : true,
		freeModeMomentumRatio : 0.5,
		slidesPerView : 'auto',
		onTouchMove: function(swiper){
			Comiis_Touch_on = 0;
		},
		onTouchEnd: function(swiper){
			Comiis_Touch_on = 1;
		},
	});
</script>