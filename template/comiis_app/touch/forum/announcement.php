<?PHP exit('Access Denied');?>
<!--{template common/header}-->
<!--{eval comiis_load('hHLZk166EqfhGEZ63t', 'announcelist,annid');}-->
<script>
$('.comiis_ann_more').on('click', function() {
	var obj = $(this);
	var sub_obj = $('#' + obj.attr('id') + '_box');
	if(sub_obj.css('display') == 'none') {
		sub_obj.css('display', 'block');
		obj.find('i').html('&#xe620;');
	} else {
		sub_obj.css('display', 'none');
		obj.find('i').html('&#xe60c;');
	}
});
</script>
<div class="comiis_fmenu" id="comiis_annmore" style="display:none;">
	<div class="comiis_fmenubox bg_f">
		<div class="comiis_gosx_title cl"><span class="y"><i class="comiis_font f_d" onclick="comiis_fmenu('#comiis_annmore');">&#xe639;</i></span>{$comiis_lang['all25']}</div>
		<div class="comiis_gosx bg_f b_t cl">
			<ul>
				<li><a href="forum.php?mod=announcement" class="{if empty($_GET[m])}bg_a f_f{else}bg_e f_b{/if}">{lang all}</a></li>
				<!--{loop $months $month}-->
				<li><a href="forum.php?mod=announcement&m=$month[0].$month[1]" class="{if $_GET[m] == $month[0].$month[1]}bg_a f_f{else}bg_e f_b{/if}">{$month[0]}{lang year}{$month[1]}{lang month}</a></li>
				<!--{/loop}-->
			</ul>
		</div>
	</div>
</div>
<!--{eval $comiis_foot = 'no';}-->
<!--{template common/footer}-->