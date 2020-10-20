<?PHP exit('Access Denied');?>
<style>
.comiis_mhimg10_box {background-size:cover;background-repeat:no-repeat;background-position:center center;transition:background .5s;}
.comiis_mhimg10 {width:100%;padding:15px 0;overflow:hidden;background:rgba(0,0,0,.7);position:relative;}
.comiis_mhimg10 .swiper-slide span {position:absolute;left:0;right:0;bottom:0;display:block;box-sizing:border-box;-webkit-box-sizing:border-box;background:-webkit-linear-gradient(top,rgba(0,0,0,0) 0,rgba(0,0,0,.8) 100%);color:#fff;padding:13px 10px 0;font-size:15px;height:50px;line-height:34px;font-weight:400;overflow:hidden;}
.comiis_mhimg10 li {width:80%;box-sizing:border-box;transition:transform .5s;transform:scale(.9);overflow:hidden;}
.comiis_mhimg10 li.swiper-slide-active {transform:scale(1);}
@supports (-webkit-backdrop-filter:none){.comiis_mhimg10{$data['id']}{background:rgba(0,0,0,.4);-webkit-backdrop-filter:brightness(1) blur(8px)}}
</style>
<div class="comiis_mhimg10_box comiis_mhimg10_box{$data['id']}">
	<div class="comiis_mhimg10 comiis_mhimg10{$data['id']}">
		<ul class="swiper-wrapper">
		<!--{loop $comiis['itemlist'] $temp}-->
			<li class="swiper-slide">
                <a href="{$temp['url']}" title="{$temp['fields']['fulltitle']}">
                    <img {if $comiis_app_switch['comiis_loadimg']}src="./template/comiis_app/pic/none.png" comiis_loadimages={else}src={/if}"{if $temp['picflag'] == 0}{$temp['pic']}{else}{if $temp['picflag'] == 2}{$_G['setting']['ftp']['attachurl']}{else}{$_G['setting']['attachurl']}{/if}{if $temp['makethumb'] == 1}{$temp['thumbpath']}{else}{$temp['pic']}{/if}{/if}" width="100%" class="vm comiis_mhimg10_whbs{$data['id']}{if $comiis_app_switch['comiis_loadimg']} comiis_loadimages{/if}" alt="{$temp['fields']['fulltitle']}">
                    <span>{$temp['title']}</span>
                </a>
			</li>
		<!--{/loop}-->
		</ul>
	</div>
</div>
<script>
  $('.comiis_mhimg10_whbs{$data['id']}').css('height', ($('.comiis_mhimg10_whbs{$data['id']}').width() * {echo $comiis['picheight'] / $comiis['picwidth'];}) + 'px');
	comiis_app_portal_swiper('.comiis_mhimg10{$data['id']}', {
		slidesPerView : 'auto',
        paginationType: 'fraction',
		loop: true,
		autoplay: 5000,
        autoplayDisableOnInteraction: false,
		centeredSlides: true,
		onTouchMove: function(swiper){
			Comiis_Touch_on = 0;
		},
		onTouchEnd: function(swiper){
			Comiis_Touch_on = 1;
		},
		onInit: function(swiper) {
			$(".comiis_mhimg10_box{$data['id']}").css("background-image", 'url(' + $('.comiis_mhimg10{$data['id']} .swiper-slide').eq(swiper.activeIndex).find('img').attr("src") + ')');
		},
		onSlideChangeStart: function(swiper) {
			$(".comiis_mhimg10_box{$data['id']}").css("background-image", 'url(' + $('.comiis_mhimg10{$data['id']} .swiper-slide').eq(swiper.activeIndex).find('img').attr("src") + ')');
		}
	});
</script>