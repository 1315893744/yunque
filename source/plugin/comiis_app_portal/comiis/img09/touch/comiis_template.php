<?PHP exit('Access Denied');?>
<style>
.comiis_mh_hdimg02 {padding:0 7px 12px;overflow:hidden;}
.comiis_mh_hdimg02 li {float:left;margin:12px 5px 1px;width:45%;text-align:center;box-sizing:border-box;overflow:hidden;position:relative;border:none !important;border-radius:4px;}
.comiis_mh_hdimg02 li a {display:block;overflow:hidden;position:relative;}
.comiis_mh_hdimg02 li a.kmimg {display:block;}
.comiis_mh_hdimg02 li a.kmimg img {width:100%;}
.comiis_mh_hdimg02 li h1 {position:absolute;left:0;top:0;width:100%;height:100%;background:rgba(0,0,0,0.4);display:-webkit-flex;display:flex;-webkit-align-items:center;align-items:center;-webkit-justify-content:center;justify-content:center;overflow:hidden;}
.comiis_mh_hdimg02 li h1 b {margin:10px;max-height:44px;line-height:24px;font-size:16px;font-weight:400 !important;overflow:hidden;}
</style>
<div id="comiis_mh_imggo{$data['id']}" class="comiis_mh_hdimg02 cl">
	<ul class="swiper-wrapper">
    <!--{loop $comiis['itemlist'] $temp}-->
		<li class="swiper-slide">
			<a href="{$temp['url']}" title="{$temp['fields']['fulltitle']}" class="kmimg"><img {if $comiis_app_switch['comiis_loadimg']}src="./template/comiis_app/pic/none.png" comiis_loadimages={else}src={/if}
"{if $temp['picflag'] == 0}{$temp['pic']}{else}{if $temp['picflag'] == 2}{$_G['setting']['ftp']['attachurl']}{else}{$_G['setting']['attachurl']}{/if}{if $temp['makethumb'] == 1}{$temp['thumbpath']}{else}{$temp['pic']}{/if}{/if}" alt="{$temp['fields']['fulltitle']}" width="100%" class="vm comiis_imggo_whb{$data['id']}{if $comiis_app_switch['comiis_loadimg']} comiis_loadimages{/if}"><h1><b class="f_f">{$temp['title']}</b></h1></a>
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