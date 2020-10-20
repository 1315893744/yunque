<?PHP exit('Access Denied');?>
<!--{template common/header}-->
<!--{eval require_once DISCUZ_ROOT.'./template/comiis_app/comiis/php/comiis_faq.php'}-->
<!--{if $_GET['op'] == 'url_check'}-->
	<!--{echo dfsockopen('https://cgi.urlsec.qq.com/index.php?m=check&a=check&url='.urlencode($_GET['url']))}-->
<!--{elseif $_GET['op'] == 'url'}-->
	<!--{if $comiis_app_switch['comiis_open_wblink_check'] == 1}-->
		<style>.comiis_tip dt p {display:none;}</style>
		<script>
			var comiis_check_http = 1, comiis_check_title = '';
			function comiis_url_query(obj){
				if (obj['reCode'] == 0){
					comiis_check_http = obj['data']['results']['whitetype'];
					comiis_check_title = obj['data']['results']['WordingTitle'];
				}
			}
			function comiis_url_check(){
				popup.open('<div id="comiis_url_check"><i class="weui-loading weui-icon_toast"></i><span class="f_0">{$comiis_lang['tip297']}</span></div><div class="comiis_url_txt">{$_GET['url']}</div><div class="comiis_url_txt f_d">{$comiis_lang['tip298']}</div>', 'confirm', 'javascript:comiis_open_url();');
				$('.tip_btn.bg_f.f_b').attr('href', '{$_G['siteurl']}');
				$.ajax({
					type:'GET',
					url: 'misc.php?op=url_check&mod=faq&inajax=1&url={echo urlencode($_GET['url'])}',
					dataType:'xml',
				}).success(function(s){
					if(s.lastChild.firstChild.nodeValue.indexOf('{"data":{"retcode":') >= 0){
						eval('comiis_url_query' + s.lastChild.firstChild.nodeValue);
						comiis_show_url_check();
					}
				}).error(function(){
					comiis_show_url_check();
				});
			}
			function comiis_show_url_check() {
				setTimeout(function() {
					if(score_config[comiis_check_http]){
						$('#comiis_url_check').html('<img src="'+score_config[comiis_check_http][2]+'"><span class="'+((comiis_check_http == 3 || comiis_check_http == 4) ? 'kmok' : 'f_g')+'">'+score_config[comiis_check_http][0] + ' ' + comiis_check_title+'</span>');
					}else{
						$('#comiis_url_check').html('<img src="'+score_config[1][2]+'">'+score_config[1][0]);
					}
				}, 500);
			}
			function comiis_open_url() {
				popup.close();
				var comiis_delheight = 98;
				if(!$('#comiis_head') || $('#comiis_head').hasClass('comiis_head_hidden')){
					comiis_delheight = comiis_delheight - 49;
				}
				if(!$('#comiis_foot_box')){
					comiis_delheight = comiis_delheight - 49;
				}
				$('.comiis_bodybox').append('<iframe src="{$_GET['url']}" id="comiis_iframe" frameborder="0" style="position:relative;z-index:1;width:'+$(window).width()+'px !important;height:'+($(window).height() - comiis_delheight)+'px !important;overflow:hidden"></iframe>');
			}
			comiis_url_check();
		</script>
	<!--{else}-->
		<iframe src="{$_GET['url']}" width="100%" height="1000px" id="comiis_iframe" frameborder="0" style="position:relative;z-index:1;"></iframe>
		<script>
			var comiis_delheight = 98;
			if(!$('#comiis_head') || $('#comiis_head').hasClass('comiis_head_hidden')){
				comiis_delheight = comiis_delheight - 49;
			}
			if(!$('#comiis_foot_box')){
				comiis_delheight = comiis_delheight - 49;
			}
			$('#comiis_iframe').css({'height': $(window).height() - comiis_delheight, 'width' : $(window).width()});
		</script>
	<!--{/if}-->
<!--{elseif $_GET['op'] == 'comiis_relatekw'}-->
	<!--{eval require_once("./template/comiis_app/comiis/php/comiis_relatekw.php");}-->
	{echo comiis_relatekw();}
<!--{elseif $_GET['op'] == 'recommend'}-->
	<div class="comiis_userlist bg_f cl">
		<ul>
		<!--{loop $comiis_all_recommend $key $temp}-->
			<li class="b_b"><a href="home.php?mod=space&uid={$temp['uid']}&do=profile" class="kmdbt"><i class="comiis_font f_d">&#xe60c;</i><img src="<!--{avatar($temp['uid'], small, true)}-->">{$temp['username']}</a></li>		
		<!--{/loop}-->
		</ul>
	</div>
	<!--{if $key > 12}-->
	<div class="comiis_loadbtn f_d">{$comiis_lang['all21']}</div>
	<!--{/if}-->	
	<!--{eval $comiis_foot = 'no';}-->
<!--{elseif $_GET['op'] == 'activitylist'}-->
<script src="template/comiis_app/comiis/js/comiis_swiper.min.js?{VERHASH}"></script>
<div class="comiis_top_sub2 bg_f b_b cl">
	<ul class="comiis_activity_swipertitle">
		<li class="kmon b_0 f_0"><a href="javascript:;">{$comiis_lang['tip20']}</a></li>
		<li><a href="javascript:;">{$comiis_lang['tip21']}</a></li>
	</ul>	
</div>
<div class="comiis_activity_swiper swiper-container-horizontal">
	<div class="swiper-wrapper comiis_optimization">
		<div class="swiper-slide">
			<!--{if $comiis_ctivity_ys}-->
				<div class="comiis_top_subtxt f_c">{$comiis_lang['tip22']}: {$comiis_ctivity_ys}</div>
				<div class="comiis_activitylist_box bg_f b_t b_b cl">
					<ul>
						<!--{loop $comiis_ctivity_y $temp}-->
							<li class="b_t">		
								<a href="home.php?mod=space&uid={$temp['uid']}&do=profile">
									<i class="comiis_font f_d">&#xe60c;</i>
									<img src="{$_G['setting']['ucenterurl']}/avatar.php?uid={$temp['uid']}&size=middle">
									<div class="z">
										<h2 class="f_0">{$temp['username']}<em class="f_d"><!--{if $temp['payment'] >= 0}-->{$temp['payment']} {$comiis_lang['tip23']}<!--{else}-->{$comiis_lang['tip24']}<!--{/if}--></em></h2>
										<!--{if $temp['message']}--><span class="kmly f_c">{$temp['message']}</span><!--{/if}-->
										<span class="f_d">{echo date('Y-m-d h:i', $temp['dateline']);}</span>
									</div>
								</a>
							</li>
						<!--{/loop}-->
					</ul>
				</div>
				<!--{if $comiis_ctivity_ys > 10}-->
					<div id="comiis_loading" class="f_d">{$comiis_lang['all21']}</div>
				<!--{/if}-->
			<!--{else}-->
				<div class="comiis_notip cl">
					<i class="comiis_font f_e cl">&#xe613;</i>
					<span class="f_d">{$comiis_lang['all22']}</span>
				</div>
			<!--{/if}-->
		</div>
		<div class="swiper-slide">
			<!--{if $comiis_ctivity_ns}-->
				<div class="comiis_top_subtxt f_c">{$comiis_lang['tip22']}: {$comiis_ctivity_ns}</div>
				<div class="comiis_activitylist_box bg_f b_t b_b cl">
					<ul>
						<!--{loop $comiis_ctivity_n $temp}-->
							<li class="b_t">		
								<a href="home.php?mod=space&uid={$temp['uid']}&do=profile">
									<i class="comiis_font f_d">&#xe60c;</i>
									<img src="{$_G['setting']['ucenterurl']}/avatar.php?uid={$temp['uid']}&size=middle">
									<div class="z">
										<h2 class="f_0">{$temp['username']}<em class="f_d"><!--{if $temp['payment'] >= 0}-->{$temp['payment']} {$comiis_lang['tip23']}<!--{else}-->{$comiis_lang['tip24']}<!--{/if}--></em></h2>
										<!--{if $temp['message']}--><span class="kmly f_c">{$temp['message']}</span><!--{/if}-->
										<span class="f_d">{echo date('Y-m-d h:i', $temp['dateline']);}</span>
									</div>
								</a>
							</li>
						<!--{/loop}-->
					</ul>
				</div>
				<!--{if $comiis_ctivity_ns > 10}-->
					<div id="comiis_loading" class="f_d">{$comiis_lang['all21']}</div>
				<!--{/if}-->
			<!--{else}-->
				<div class="comiis_notip cl">
					<i class="comiis_font f_e cl">&#xe613;</i>
					<span class="f_d">{$comiis_lang['all22']}</span>
				</div>
			<!--{/if}-->
		</div>
	</div>
</div>
<script>
$(document).ready(function() {
	var mySwiper = new Swiper('.comiis_activity_swiper',{
		onTouchMove: function(swiper){
			Comiis_Touch_on = 3;
			if(mySwiper.isBeginning){
				mySwiper.lockSwipeToPrev();
			}
		},
		onTouchEnd: function(swiper){
			mySwiper.unlockSwipeToPrev();		
			Comiis_Touch_on = 1;
			if(mySwiper.isBeginning){
				comiis_SwiperX = mySwiper.touches['currentX'] - mySwiper.touches['startX'];
				comiis_SwiperY = mySwiper.touches['currentY'] - mySwiper.touches['startY'];
				if(comiis_SwiperX > 100 && comiis_SwiperX > comiis_SwiperY && comiis_SwiperY < 20){
					Comiis_Touch_openleftnav = 1;
					Comiis_Touch_endtime = new Date().getTime();
					if(Comiis_Touch_openleftnav == 1 && (Comiis_Touch_endtime - Comiis_Touch.Touchstime) < 500){
						Comiis_Touch_openleftnav = 0;
						comiis_leftnv();
					}
					Comiis_Touch_openleftnav = 0;					
				}
			}
		},
		onSlideChangeStart: function(){
			$(".comiis_activity_swipertitle .kmon").removeClass('kmon b_0 f_0');
			$(".comiis_activity_swipertitle li").eq(mySwiper.activeIndex).addClass('kmon b_0 f_0');
		},
		onTouchMoveOpposite: function(swiper, event){
			Comiis_Touch_on = 3;
		},
	});
	$(".comiis_activity_swipertitle li").on('touchstart mousedown',function(e){
		e.preventDefault();
		$(".comiis_activity_swipertitle .kmon").removeClass('kmon b_0 f_0');
		$(this).addClass('kmon b_0 f_0');
		mySwiper.slideTo($(this).index());
	}).click(function(e){
		e.preventDefault();
	});
});
</script>
<!--{/if}-->
<!--{template common/footer}-->