<?PHP exit('Access Denied');?>
<style>
.comiis_mh_img12 {width:100%;padding:12px 0;overflow:hidden;position:relative;}
.comiis_mh_img12 li {width:70%;margin:0 6px;box-sizing:border-box;}
.comiis_mh_img12 .swiper-slide h2 {position:absolute;left:0;right:0;bottom:0;display:block;box-sizing:border-box;-webkit-box-sizing:border-box;background:-webkit-linear-gradient(top,rgba(0,0,0,0) 0,rgba(0,0,0,.7) 100%);color:#fff;padding:6px 10px 7px;font-size:15px;height:auto;line-height:22px;font-weight:400;overflow:hidden;}
.comiis_mh_img12 .swiper-slide h2 span {display:block;font-size:13px;}
</style>
<div class="comiis_mh_img12_box{$data['id']}">
	<div class="comiis_mh_img12{$data['id']} comiis_mh_img12">
		<ul class="swiper-wrapper">
		<!--{loop $comiis['itemlist'] $temp}-->
			<li class="swiper-slide">
                <a href="{$temp['url']}" title="{$temp['fields']['fulltitle']}">
                    <img {if $comiis_app_switch['comiis_loadimg']}src="./template/comiis_app/pic/none.png" comiis_loadimages={else}src={/if}"{if $temp['picflag'] == 0}{$temp['pic']}{else}{if $temp['picflag'] == 2}{$_G['setting']['ftp']['attachurl']}{else}{$_G['setting']['attachurl']}{/if}{if $temp['makethumb'] == 1}{$temp['thumbpath']}{else}{$temp['pic']}{/if}{/if}" width="100%" class="vm comiis_mh_img12_whbs{$data['id']}{if $comiis_app_switch['comiis_loadimg']} comiis_loadimages{/if}" alt="{$temp['fields']['fulltitle']}">
                    <h2><span>{echo dgmdate($temp['fields']['dateline'], ($comiis['dateuformat'] == 1 ? 'u' : $comiis['dateformat']));}&nbsp;&nbsp;&nbsp;{if $temp['fields']['typename']}{$temp['fields']['typename']}{elseif $temp['fields']['catname']}{$temp['fields']['catname']}{elseif $temp['fields']['groupname']}{$temp['fields']['groupname']}{elseif $temp['fields']['forumname']}{$temp['fields']['forumname']}{/if}</span>{$temp['title']}</h2>
                </a>
			</li>
			<!--{/loop}-->
		</ul>
	</div>
</div>
<script>
  $('.comiis_mh_img12_whbs{$data['id']}').css('height', ($('.comiis_mh_img12_whbs{$data['id']}').width() * {echo $comiis['picheight'] / $comiis['picwidth'];}) + 'px');
	comiis_app_portal_swiper('.comiis_mh_img12{$data['id']}', {
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
		}
	});
</script>