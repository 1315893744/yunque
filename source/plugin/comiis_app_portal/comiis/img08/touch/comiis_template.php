<?PHP exit('Access Denied');?>
<style>
.comiis_mh_hdimg01 {padding:0 6px 12px;overflow:hidden;}
.comiis_mh_hdimg01 li {float:left;margin:12px 6px 0;width:29%;box-sizing:border-box;overflow:hidden;position:relative;border:none !important;}
.comiis_mh_hdimg01 li a.kmimg {display:block;}
.comiis_mh_hdimg01 li a.kmimg img {width:100%;border-radius:0 4px 4px 4px;}
.comiis_mh_hdimg01 li h2 {padding:8px 0 0;height:44px;line-height:22px;font-size:16px;font-weight:400;}
.comiis_mh_hdimg01 li h2 a {display:block;}
.comiis_mh_hdimg01 li h2 font {display:block;font-size:13px;}
.comiis_mh_hdimg01 li em {position:absolute;left:3px;top:3px;width:20px;height:20px;line-height:20px;text-align:center;background:rgba(0,0,0,0.6);border-radius:0 5px 5px 5px;}
</style>
<div id="comiis_mh_imggo{$data['id']}" class="comiis_mh_hdimg01 cl">
	<ul class="swiper-wrapper">
	<!--{eval $kmnn = 0;}-->
    <!--{loop $comiis['itemlist'] $temp}-->
        <!--{eval $kmnn++;}-->
		<li class="swiper-slide">
            <em class="f_f"{if $kmnn == 1} style="background:#FF705E"{elseif $kmnn == 2} style="background:#FFB900"{elseif $kmnn == 3} style="background:#A8C500"{/if}>{$kmnn}</em>
			<a href="{$temp['url']}" title="{$temp['fields']['fulltitle']}" class="kmimg"><img {if $comiis_app_switch['comiis_loadimg']}src="./template/comiis_app/pic/none.png" comiis_loadimages={else}src={/if}
"{if $temp['picflag'] == 0}{$temp['pic']}{else}{if $temp['picflag'] == 2}{$_G['setting']['ftp']['attachurl']}{else}{$_G['setting']['attachurl']}{/if}{if $temp['makethumb'] == 1}{$temp['thumbpath']}{else}{$temp['pic']}{/if}{/if}" alt="{$temp['fields']['fulltitle']}" width="100%" class="vm comiis_imggo_whb{$data['id']}{if $comiis_app_switch['comiis_loadimg']} comiis_loadimages{/if}"></a>
			<h2>{if $temp['fields']['typename']}<font class="f_d">{$temp['fields']['typename']}</font>{elseif $temp['fields']['catname']}<font class="f_d">{$temp['fields']['catname']}</font>{elseif $temp['fields']['groupname']}<font class="f_d">{$temp['fields']['groupname']}</font>{elseif $temp['fields']['forumname']}<font class="f_d">{$temp['fields']['forumname']}</font>{/if}<a href="{$temp['url']}" title="{$temp['fields']['fulltitle']}">{$temp['title']}</a></h2>
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