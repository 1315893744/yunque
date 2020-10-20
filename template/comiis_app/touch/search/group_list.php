<?PHP exit('Access Denied');?>
<div class="comiis_p12 f14 bg_f f_c b_b cl" style="padding-bottom:10px;{if empty($grouplist) && empty($grouplist)}margin-bottom:-11px;{/if}"><!--{if $keyword && empty($searchstring[2])}-->{lang search_group_result_keyword}<!--{elseif $viewgroup}-->{lang search_group_result}<!--{else}-->{lang search_result}<!--{/if}--></div>
<!--{if empty($grouplist) && empty($threadlist)}-->
    <div class="comiis_notip mt15 cl">
        <i class="comiis_font f_e cl">&#xe613;</i>
        <span class="f_d">{lang search_nomatch}</span>
    </div>
<!--{/if}-->
<!--{if $viewgroup}-->
	<!--{if empty($grouplist)}-->
		<div class="comiis_notip mt15 cl">
			<i class="comiis_font f_e cl">&#xe613;</i>
			<span class="f_d">{lang search_nomatch}</span>
		</div>
	<!--{else}-->
        <div class="comiis_uibox bg_f b_b cl">
          <div class="comiis_userlist01 cl">
              <ul>
                <!--{loop $grouplist $group}-->
                <li class="b_t">
                    <a href="forum.php?mod=forumdisplay&action=list&fid=$group[fid]" class="block">
                        <i class="comiis_font f_e">&#xe60c;</i>
                        <span class="list01_limg bg_e"><img src="$group[icon]" /></span>
                        <p class="tit">$group[name]</p>
                        <p class="txt f_d">{lang member}: $group[membernum], {lang threads}: $group[threads], {lang credits}: $group[commoncredits]</p>
                    </a>
                </li>
                <!--{/loop}-->
              </ul>
          </div>
        </div>
		<!--{if !empty($multipage)}--><div class="mt10 b_t cl">$multipage</div><!--{/if}-->
	<!--{/if}-->
<!--{else}-->
	<!--{if !empty($grouplist) && $page < 2}-->
        <div class="comiis_uibox bg_f b_b cl">
          <div class="comiis_userlist01 cl">
              <ul>
                <!--{loop $grouplist $group}-->
                <li class="b_t">
                    <a href="forum.php?mod=forumdisplay&action=list&fid=$group[fid]" class="block">
                        <i class="comiis_font f_e">&#xe60c;</i>
                        <span class="list01_limg bg_e"><img src="$group[icon]" /></span>
                        <p class="tit">$group[name]</p>
                        <p class="txt f_d">{lang member}: $group[membernum], {lang threads}: $group[threads], {lang credits}: $group[commoncredits]</p>
                    </a>
                </li>
                <!--{/loop}-->
              </ul>
          </div>
        </div>
	<!--{/if}-->
	<!--{if !empty($threadlist)}-->
	<!--{if !$_GET['inajax'] && $_G['uid']}-->
		<script>var formhash = '{FORMHASH}', allowrecommend = '{$_G['group']['allowrecommend']}';</script>
		<script src="template/comiis_app/comiis/js/comiis_forumdisplay.js?{VERHASH}"></script>
	<!--{/if}-->
	<!--{eval $comiis_list_template = 'default_s_style'; include_once DISCUZ_ROOT.'./template/comiis_app/comiis/php/comiis_list.php';}-->
	<!--{/if}-->
	<!--{if !$_GET['inajax']}-->
	<!--{if $comiis_app_list_num != 10}--><div id="list_new"></div><!--{/if}-->
	<!--{eval $comiis_page = ceil($index['num']/$_G['tpp']);}-->	
	<div class="comiis_multi_box bg_f{if !empty($grouplist)} b_t{/if}"{if !empty($grouplist)} style="margin-top:10px;"{/if}>
		<!--{if $multipage && ($comiis_app_switch['comiis_listpage'] == 0 || $page > 1)}-->
			{$multipage}
		<!--{elseif $comiis_app_switch['comiis_listpage'] == 1 && $page < $comiis_page}-->
			<a href="javascript:;" onclick="comiis_list_page()" class="comiis_loadbtn bg_e f_d">{$comiis_lang['tip5']}</a>
		<!--{elseif $comiis_app_switch['comiis_listpage'] == 2 && $page < $comiis_page}-->
			<div class="comiis_loadbtn f_d">{$comiis_lang['tip6']}</div>
		<!--{elseif $comiis_app_switch['comiis_listpage'] && $comiis_page == 1 && $index['num'] > 2}-->
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
					url: 'search.php?mod=group&searchid=$searchid&orderby=$orderby&ascdesc=$ascdesc&searchsubmit=yes&page=' + (comiis_page + 1) + '&inajax=1',
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
<!--{/if}-->