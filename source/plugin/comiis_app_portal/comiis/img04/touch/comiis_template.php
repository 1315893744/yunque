<?PHP exit('Access Denied');?>
<style>
.comiis_mh_hdimg {padding:0 6px 12px;overflow:hidden;}
.comiis_mh_hdimg li {float:left;margin:12px 6px 0;width:60%;box-sizing:border-box;overflow:hidden;position:relative;border:none !important;}
.comiis_mh_hdimg li a.kmimg {display:block;}
.comiis_mh_hdimg li a.kmimg img {width:100%;}
.comiis_mh_hdimg li .nums {position:absolute;top:0px;right:0px;background:rgba(0,0,0,0.5);height:20px;line-height:20px;padding:0 5px;font-size:12px;font-weight:400;border-bottom-left-radius:3px;}
.comiis_mh_hdimg li .nums i {float:left;margin-right:3px;font-size:14px;}
.comiis_mh_hdimg li .img_stick {position:absolute;top:0px;left:0px;height:20px;line-height:20px;padding:0 5px;font-size:12px;font-weight:400;border-bottom-right-radius:3px;}
.comiis_mh_hdimg li h2 {padding:7px 10px 6px;height:44px;line-height:22px;font-size:16px;font-weight:400;}
.comiis_mh_hdimg li h2.kmnop {padding:8px 0 0;height:40px;line-height:20px;font-size:14px;}
.comiis_mh_hdimg li h2 a {display:block;}
.comiis_mh_hdimg li h2 span {float:left;margin-top:2px;margin-right:4px;padding:0 2px;height:16px;line-height:16px;font-size:12px;border-radius:2px;}
.comiis_mh_hdimg li p {padding:0 10px 10px;height:20px;line-height:20px;font-size:12px;}
.comiis_mh_hdimg li p a {float:left;font-size:12px;}
.comiis_mh_hdimg li p a img {float:left;width:20px;height:20px;margin-right:5px;border-radius:50%;}
.comiis_mh_hdimg li p span i {font-size:12px;margin-right:2px;}
</style>
<div id="comiis_mh_imggo{$data['id']}" class="comiis_mh_hdimg cl">
	<ul class="swiper-wrapper">
    <!--{loop $comiis['itemlist'] $temp}-->
		<li class="swiper-slide bg_e">					
			<a href="{$temp['url']}" title="{$temp['fields']['fulltitle']}" class="kmimg"><img {if $comiis_app_switch['comiis_loadimg']}src="./template/comiis_app/pic/none.png" comiis_loadimages={else}src={/if}
"{if $temp['picflag'] == 0}{$temp['pic']}{else}{if $temp['picflag'] == 2}{$_G['setting']['ftp']['attachurl']}{else}{$_G['setting']['attachurl']}{/if}{if $temp['makethumb'] == 1}{$temp['thumbpath']}{else}{$temp['pic']}{/if}{/if}" alt="{$temp['fields']['fulltitle']}" width="100%" class="vm comiis_imggo_whb{$data['id']}{if $comiis_app_switch['comiis_loadimg']} comiis_loadimages{/if}"></a>							
			<h2><a href="{$temp['url']}" title="{$temp['fields']['fulltitle']}">{$temp['title']}</a></h2>
			<p>
				<span class="y f_c">{if $temp['fields']['views']}{$temp['fields']['views']}{else}{$temp['fields']['viewnum']}{/if}{$comiis_portal['img04_b']}</span>
				<a href="home.php?mod=space&uid={if $temp['fields']['author']}{$temp['fields']['authorid']}{else}{$temp['fields']['uid']}{/if}&do=profile" rel="nofollow"><img src="{$temp['fields']['avatar_middle']}" class="vm f_b">{if $temp['fields']['author']}{$temp['fields']['author']}{else}{$temp['fields']['username']}{/if}</a>
			</p>
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