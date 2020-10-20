<?PHP exit('Access Denied');?>
<!--{if !empty($threadlist) && !$_GET['inajax']}-->
	<div class="comiis_p12 f14 bg_f f_c cl" style="margin-bottom:-10px;padding-bottom:10px;"><!--{if $keyword}-->{lang search_result_keyword} <!--{if $modfid}--><a href="forum.php?mod=modcp&action=thread&fid=$modfid&keywords=$modkeyword&submit=true&do=search&page=$page">{lang goto_memcp}</a><!--{/if}--><!--{else}-->{lang search_result}<!--{/if}--></div>
	<!--{if $_G['uid']}-->
	<script>var formhash = '{FORMHASH}', allowrecommend = '{$_G['group']['allowrecommend']}';</script>
	<script src="template/comiis_app/comiis/js/comiis_forumdisplay.js?{VERHASH}"></script>	<!--{/if}-->
	<!--{/if}-->
<!--{/if}-->
<!--{if empty($threadlist) && !$_GET['inajax']}-->
	<!--{if !empty($threadlist) || !empty($searchid)}-->
		<div class="comiis_forumlist cl">	
			<ul>
				<li class="comiis_notip mt15 cl">
					<i class="comiis_font f_e cl">&#xe613;</i>
					<span class="f_d">{lang search_nomatch}</span>
				</li>
			</ul>
		</div>
	<!--{/if}-->
<!--{else}-->
	<!--{eval $comiis_list_template = 'default_s_style'; include_once DISCUZ_ROOT.'./template/comiis_app/comiis/php/comiis_list.php';}-->
	<!--{if !$_GET['inajax']}-->
	<!--{if $comiis_app_list_num != 10}--><div id="list_new"></div><!--{/if}-->
	<!--{eval $comiis_page = ceil($index['num']/$_G['tpp']);}-->
	<div class="comiis_multi_box bg_f b_t" style="margin-top:10px;">
		<!--{if $multipage && ($comiis_app_switch['comiis_listpage'] == 0 || $page > 1)}-->
			{$multipage}
		<!--{elseif $comiis_app_switch['comiis_listpage'] == 1 && $page < $comiis_page}-->
			<a href="javascript:;" onclick="comiis_list_page()" class="comiis_loadbtn bg_e f_d">{$comiis_lang['tip5']}</a>
		<!--{elseif $comiis_app_switch['comiis_listpage'] == 2 && $page < $comiis_page}-->
			<div class="comiis_loadbtn f_d">{$comiis_lang['tip6']}</div>
		<!--{elseif $comiis_app_switch['comiis_listpage'] && $comiis_page == 1 && $index['num'] > 4}-->
			<div class="comiis_loadbtn f_d">{$comiis_lang['tip31']}</div>
		<!--{/if}-->
	</div>
	<script>
	<!--{if $_G['uid']}-->comiis_recommend_addkey();<!--{/if}-->
	<!--{if $comiis_app_switch['comiis_listpage'] > 0 && $page == 1}-->
		var comiis_page = $page;
		var comiis_ispage = 0;
		function comiis_list_page(){
			comiis_ispage = 1;
			if(comiis_page < $comiis_page){
				$('.comiis_multi_box').html('<div class="comiis_loadbtn f_d">{$comiis_lang['tip6']}</div>');
				$.ajax({
					type:'GET',
					url: 'search.php?mod=forum&searchid=$searchid&orderby=$orderby&ascdesc=$ascdesc&searchsubmit=yes&page=' + (comiis_page + 1) + '&inajax=1',
					dataType:'xml',
				}).success(function(s) {
					if(typeof(s.lastChild.firstChild.nodeValue) != "undefined"){
						comiis_page++;
						$('#list_new').append(s.lastChild.firstChild.nodeValue);
						<!--{if $comiis_app_list_num == 10}-->
							var comiis_pic_width = ($(window).width() - 34) / 2;
							$(".comiis_waterfall li[class='bg_f b_ok']").css('width', (comiis_pic_width) + 'px');
							imagesLoaded($('.comiis_waterfall'),function(){
								$('#list_new').masonry('reload');
							});
						<!--{/if}-->			
						if(comiis_page >= $comiis_page){
							$('.comiis_multi_box').html('<div class="comiis_loadbtn f_d">{$comiis_lang['tip31']}</div>');
						}else{
							$('.comiis_multi_box').html('<a href="javascript:;" onclick="comiis_list_page()" class="comiis_loadbtn bg_e f_d">{$comiis_lang['tip5']}</a>');
						}
						comiis_redata_function();
					}else{
						comiis_page--;
						$('.comiis_multi_box').html('<a href="javascript:;" onclick="comiis_list_page()" class="comiis_loadbtn bg_e f_d">{$comiis_lang['tip32']}</a>');
					}
					comiis_ispage = 0;
				}).error(function() {
					comiis_page--;
					$('.comiis_multi_box').html('<a href="javascript:;" onclick="comiis_list_page()" class="comiis_loadbtn bg_e f_d">{$comiis_lang['tip32']}</a>');
					comiis_ispage = 0;
				});
			}
		}
		var comiis_regdata_page = 'comiis_page', comiis_regdata_dataid = ['#list_new'];
		function comiis_redata_function(){
			popup.init();
			<!--{if $_G['uid']}-->comiis_recommend_addkey();<!--{/if}-->
		}		
		<!--{if $comiis_app_switch['comiis_listpage'] == 2}-->
		var comiis_page_timer;
		$(window).scroll(function(){
			if(comiis_page_start == 0){
				return;
			}
			clearTimeout(comiis_page_timer);
			comiis_page_timer = setTimeout(function() {
				var comiis_scroll_bottom = $(window).scrollTop() + $(window).height();
				var comiis_list_bottom = $('#list_new').height() + $('#list_new').offset().top - 200;
				if(comiis_scroll_bottom >= comiis_list_bottom && comiis_ispage == 0){
					comiis_list_page();
				}	
			}, 200);
		});
		<!--{/if}-->
	<!--{/if}-->
	</script>
<!--{/if}-->