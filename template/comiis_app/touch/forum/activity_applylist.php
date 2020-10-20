<?PHP exit('Access Denied');?>
<!--{template common/header}-->
<style>.comiis_footer_scroll {bottom:102px;}</style>
<form id="applylistform" method="post" autocomplete="off" action="forum.php?mod=misc&action=activityapplylist&tid=$_G[tid]&applylistsubmit=yes&infloat=yes{if !empty($_GET['from'])}&from=$_GET['from']{/if}">
<input type="hidden" name="formhash" value="{FORMHASH}" />
<input type="hidden" name="operation" value="" id="operation" />
<!--{eval comiis_load('DdbLPtsadAitTbeTSW', 'applylist,isactivitymaster,activity');}-->
<!--{if $isactivitymaster}-->
<div style="height:20px;"></div>
</div>
<div>
<div class="comiis_showleftbox comiis_act_glfoot bg_f b_t">
	<div class="act_glfoot_ps f_c comiis_input_style cl">
		<input type="checkbox" name="chkall" id="comiia_selectall" />
		<label for="comiia_selectall"><i class="comiis_font f_d">&#xe643;</i>{lang checkall}</label>
		<input name="reason" class="comiis_px kmshow bg_f b_b" placeholder="{lang activity_ps}" />
	</div>
	<div class="act_glfoot_btn cl">
		<button class="bg_0 f_f" type="submit" value="true" name="applylistsubmit">{lang confirm}</button>	
		<button class="bg_0 f_f" type="submit" value="true" name="applylistsubmit" onclick="$('#operation').val('replenish');">{lang to_improve}</button>		
		<button class="bg_0 f_f" type="submit" value="true" name="applylistsubmit" onclick="$('#operation').val('notification');">{lang send_notification}</button>
		<button class="bg_0 f_f" type="submit" value="true" name="applylistsubmit" onclick="$('#operation').val('delete');">{lang activity_refuse}</button>			
	</div>
</div>
<!--{/if}-->
</form>
<script>
$('.comiis_activity_more').on('click', function() {
	var obj = $(this);
	var sub_obj = $('#' + obj.attr('id') + '_box');
	if(sub_obj.css('display') == 'none') {
		sub_obj.css('display', 'block');
		obj.html('{$comiis_lang['all19']}<i class="comiis_font f_d">&#xe621;</i>');
	} else {
		sub_obj.css('display', 'none');
		obj.html('{$comiis_lang['all19']}<i class="comiis_font f_d">&#xe620;</i>');
	}
});
$('#comiia_selectall').on('click', function() {
	if($(this).attr("checked")) {
		$("#applylistform input:enabled:checkbox").attr("checked", true);
		$(".comiis_applyid_class").children("i").html('&#xe644;').removeClass('f_d').addClass('f_0');
	}else{
		$("#applylistform input:enabled:checkbox").attr("checked", false);
		$(".comiis_applyid_class").children("i").html('&#xe643;').removeClass('f_0').addClass('f_d');
	}
});
</script>
<!--{eval $comiis_foot = 'no';}-->
<!--{template common/footer}-->