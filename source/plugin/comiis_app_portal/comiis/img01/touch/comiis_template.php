<?PHP exit('Access Denied');?>
<style>
.comiis_mhswf {width:100%;background:#000;overflow:hidden;position:relative;}
.comiis_mhswf .swiper-slide span {position:absolute;left:0;right:0;bottom:0;display:block;box-sizing:border-box;-webkit-box-sizing:border-box;background:-webkit-linear-gradient(top,rgba(0,0,0,0) 0,rgba(0,0,0,.8) 100%);color:#fff;padding:13px 10px 0;font-size:16px;height:50px;overflow:hidden;line-height:34px;}
.comiis_mhswf_roll {position:absolute;right:12px;bottom:0;line-height:34px;text-align:right;font-family:Arial;color:#fff;font-size:12px;z-index:9;}
.comiis_mhswf_roll .swiper-pagination-current {font-weight:400;font-size:20px;}
.comiis_mhswf_roll .swiper-pagination-total {font-style:100;}
</style>
<div class="comiis_mhswf comiis_mhswf{$data['id']}">
	<ul class="swiper-wrapper">
    <!--{loop $comiis['itemlist'] $temp}-->
		<li class="swiper-slide">
      <a href="{$temp['url']}" title="{$temp['fields']['fulltitle']}">
			<img {if $comiis_app_switch['comiis_loadimg']}src="./template/comiis_app/pic/none.png" comiis_loadimages={else}src={/if}"{if $temp['picflag'] == 0}{$temp['pic']}{else}{if $temp['picflag'] == 2}{$_G['setting']['ftp']['attachurl']}{else}{$_G['setting']['attachurl']}{/if}{if $temp['makethumb'] == 1}{$temp['thumbpath']}{else}{$temp['pic']}{/if}{/if}" width="100%" class="vm comiis_mhswf_whb{$data['id']}{if $comiis_app_switch['comiis_loadimg']} comiis_loadimages{/if}" alt="{$temp['fields']['fulltitle']}">
			<span>{$temp['title']}</span>
			</a>
		</li>
		<!--{/loop}-->
	</ul>
	<div class="comiis_mhswf_roll comiis_mhswf_roll{$data['id']}"></div>
</div>
<script>
  $('.comiis_mhswf_whb{$data['id']}').css('height', ($('.comiis_mhswf_whb{$data['id']}').width() * {echo $comiis['picheight'] / $comiis['picwidth'];}) + 'px');
	comiis_app_portal_swiper('.comiis_mhswf{$data['id']}', {
		slidesPerView : 'auto',
        pagination: '.comiis_mhswf_roll{$data['id']}',
        paginationType: 'fraction',
		loop: true,
		autoplay: 5000,
        autoplayDisableOnInteraction: false,
		onTouchMove: function(swiper){
			Comiis_Touch_on = 0;
		},
		onTouchEnd: function(swiper){
			Comiis_Touch_on = 1;
		},
	});
</script>