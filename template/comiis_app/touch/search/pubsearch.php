<?PHP exit('Access Denied');?>
<!--{eval $keywordenc = $keyword ? rawurlencode($keyword) : '';}-->
<!--{eval comiis_load('yfkFHZK9Zff9BKbkkf', 'srchtype,searchid,threadlist,articlelist,bloglist,albumlist,slist,keyword,comiis_group_lang');}-->
<!--{eval comiis_load('RPmEMW3m6Xi0E8pP3I', 'threadlist,searchid,show_color,searchparams,srchotquery,srchhotkeywords');}-->
<script>
{if $keyword}comiis_search_show(1);{/if}
function comiis_search(){
	if($('#comiis_ssbox_style').children('option:selected').val() != 'user'){
		window.location.href = 'search.php?mod='+$('#comiis_ssbox_style').children('option:selected').val()+'{if $keyword}&srchtxt=$keywordenc&searchsubmit=yes{/if}';
	}else if($('#scform_srchtxt').val()){
		$('.searchform').submit();
	}
}
</script>