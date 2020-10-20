<?PHP exit('Access Denied');?>
<!--{template common/header}-->
<!--{eval include_once DISCUZ_ROOT.'./template/comiis_app/comiis/php/comiis_lists.php'}-->
<!--{if !$_G['inajax']}-->
<script src="template/comiis_app/comiis/js/comiis_swiper.min.js?{VERHASH}"></script>
<!--{eval $comiis_subs = array();}-->
<!--{loop $cat[subs] $value}-->
	<!--{if $value['closed'] == 0 && !in_array($value['catid'], dunserialize($comiis_app_switch['comiis_noshowcatlist']))}-->
		<!--{eval $comiis_subs[] = $value;}-->
	<!--{/if}-->
<!--{/loop}-->
<!--{if $comiis_app_switch['comiis_subnv_top'] != 1}--><div style="height:{if $cat[subs] && count($comiis_subs)}80{else}40{/if}px;"><div class="comiis_scrollTop_box"><!--{/if}-->
	<!--{if $cat[others]}-->
        <div class="comiis_top_sub bg_f">
            <div id="comiis_top_box" class="b_b">
                <div id="comiis_sub">
                    <ul class="swiper-wrapper">
                        <!--{loop $cat[others] $value}-->
                            <!--{if $value['closed'] == 0 && !in_array($value['catid'], dunserialize($comiis_app_switch['comiis_noshowcatlist']))}-->
                            <li class="swiper-slide{if $value['catid'] == $_GET['catid']} f_0{/if}">{if $value['catid'] == $_GET['catid']}<em class="bg_0"></em>{/if}<a href="{$portalcategory[$value['catid']]['caturl']}"{if $value['catid'] != $_GET['catid']} class="f_c"{/if}>$value[catname]</a></li>
                            <!--{/if}-->
                        <!--{/loop}-->
                    </ul>
                </div>
            </div>
        </div>
        <script>
            if($("#comiis_sub li.f_0").length > 0) {
                var comiis_index = $("#comiis_sub li.f_0").offset().left + $("#comiis_sub li.f_0").width() >= $(window).width() ? $("#comiis_sub li.f_0").index() : 0;
            }else{
                var comiis_index = 0;
            }
            new Swiper('#comiis_sub', {
                freeMode : true,
                slidesPerView : 'auto',
                initialSlide : comiis_index,
                onTouchMove: function(swiper){
                    Comiis_Touch_on = 0;
                },
                onTouchEnd: function(swiper){
                    Comiis_Touch_on = 1;
                },
            });
        </script>
	<!--{/if}-->
	<!--{if count($comiis_subs)}-->
	<div class="comiis_top_sub">
		<div id="comiis_top_box" class="bg_f b_b">
			<div id="comiis_sub_btn" class="f_c">
				<ul class="swiper-wrapper">
					<!--{eval $nn = 0;}-->
					<!--{loop $comiis_subs $value}-->
						<!--{eval $nn++;}-->
						<!--{if $value['closed'] == 0 && !in_array($value['catid'], dunserialize($comiis_app_switch['comiis_noshowcatlist']))}-->
							<li class="swiper-slide"><!--{if $nn !=1}--><span class="comiis_tm">/</span><!--{/if}--><a href="{$portalcategory[$value['catid']]['caturl']}">$value[catname]</a></li>
						<!--{/if}-->
					<!--{/loop}-->
				</ul>
			</div>
		</div>
	</div>
	<script>
		new Swiper('#comiis_sub_btn', {
			freeMode : true,
			slidesPerView : 'auto',
			onTouchMove: function(swiper){
				Comiis_Touch_on = 0;
			},
			onTouchEnd: function(swiper){
				Comiis_Touch_on = 1;
			},
		});
	</script>
	<!--{/if}-->
<!--{if $comiis_app_switch['comiis_subnv_top'] != 1}--></div></div><!--{/if}-->
<div class="comiis_wz_list{if in_array($_GET['catid'], dunserialize($comiis_app_switch['comiis_catlist2']))} comiis_wzlist_imgbox{/if} mt12 bg_f{if !in_array($_GET['catid'], dunserialize($comiis_app_switch['comiis_catlist2']))} b_t{/if} cl">
<!--{/if}-->
	<!--{if count($list['list'])}-->
	<!--{eval comiis_load('MyjM8PDvPZcZj1P8oR', 'list,list_count');}-->
	<!--{else}-->
	<div class="comiis_notip comiis_sofa cl">
		<i class="comiis_font f_e cl">&#xe613;</i>
		<span class="f_d">{$comiis_lang['all22']}</span>
	</div>
	<!--{/if}-->
	<div class="comiis_multi_cl" style="clear:both;"></div>
	<div class="comiis_multi_box comiis_p15{if !in_array($_GET['catid'], dunserialize($comiis_app_switch['comiis_catlist2']))} b_t{/if}">
		<!--{if $page == $comiis_page && $comiis_app_switch['comiis_page_style'] != 0}-->
			<div class="comiis_loadbtn f_d">{$comiis_lang['tip4']}</div>
		<!--{elseif $list['multi'] && $comiis_app_switch['comiis_page_style'] == 0}-->
			{$list['multi']}
		<!--{elseif $comiis_app_switch['comiis_page_style'] == 1 && $page < $comiis_page}-->
			<a href="javascript:;" onclick="comiis_list_page()" class="comiis_loadbtn bg_e b_ok f_d">{$comiis_lang['tip5']}</a>
		<!--{elseif $comiis_app_switch['comiis_page_style'] == 2 && $page < $comiis_page}-->
			<div class="comiis_loadbtn bg_e b_ok f_d">{$comiis_lang['tip6']}</div>
		<!--{/if}-->
	</div>
<!--{if !$_G['inajax']}--></div><!--{/if}-->
<!--{if $comiis_app_switch['comiis_page_style'] > 0 && !$_G['inajax']}-->
<script>
	var comiis_page = $page;
	var comiis_ispage = 0;
	function comiis_list_page(){
		comiis_ispage = 1;
		if(comiis_page < $comiis_page){
			$('.comiis_multi_box').html('<div class="comiis_loadbtn bg_e b_ok f_d">{$comiis_lang['tip6']}</div>');
			$.ajax({
				type:'GET',
				url: '$cat[caturl]{echo ($cat['foldername'] ? 'index.php?' : '&');}page=' + (comiis_page + 1) + '&inajax=1' ,
				dataType:'xml',
			}).success(function(s) {
				comiis_page++;
				if(typeof(s.lastChild.firstChild.nodeValue) != "undefined"){
					$('.comiis_multi_cl,.comiis_multi_box').remove();
					$('.comiis_wz_list').append(s.lastChild.firstChild.nodeValue);
				}
				comiis_ispage = 0;
			}).error(function() {
				comiis_page--;
				$('.comiis_multi_box').html('<a href="javascript:;" onclick="comiis_list_page()" class="comiis_loadbtn{if $comiis_app_list_num == 7 || $comiis_app_list_num == 10} bg_f{else} bg_e{/if} f_d">{$comiis_lang['tip32']}</a>');
				comiis_ispage = 0;
			});
		}
	}
	<!--{if $comiis_app_switch['comiis_page_style'] == 2}-->
	var comiis_page_timer;
	$(window).scroll(function(){
		if(comiis_page_start == 0){
			return;
		}
		clearTimeout(comiis_page_timer);
		comiis_page_timer = setTimeout(function() {
			var comiis_scroll_bottom = $(window).scrollTop() + $(window).height();
			var comiis_list_bottom = $('.comiis_wz_list').height() + $('.comiis_wz_list').offset().top - 1000;
			if(comiis_scroll_bottom >= comiis_list_bottom && comiis_ispage == 0){
				comiis_list_page();
			}	
		}, 100);
	});
	var comiis_regdata_page = 'comiis_page', comiis_regdata_dataid = ['.comiis_wz_list'];
	<!--{/if}-->
</script>
<!--{/if}-->
<!--{if $comiis_app_switch['comiis_list_dbdh'] == 0}--><!--{eval $comiis_foot = 'no';}--><!--{/if}-->
<!--{template common/footer}-->