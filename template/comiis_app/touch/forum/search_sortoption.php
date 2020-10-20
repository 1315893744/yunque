<?PHP exit('Access Denied');?>
<script type="text/javascript">
	var forum_optionlist = <!--{if $forum_optionlist}-->'$forum_optionlist'<!--{else}-->''<!--{/if}-->;
</script>
<script type="text/javascript" src="{$_G['setting']['jspath']}threadsort.js?{VERHASH}"></script>
<div class="comiis_flsx_show b_b cl">
	<a href="javascript:;" class="{if $comiis_app_switch['comiis_flxx_list_ss'] == 1}bg_e{else}bg_f{/if} comiis_flsx_key" onclick="comiis_flsx_sh();"><span class="f_a">{$comiis_lang['tip67']} <i class="comiis_font comiis_flsxico">{if $comiis_app_switch['comiis_flxx_list_ss'] == 1}&#xe621;{else}&#xe620;{/if}</i></span><em class="f_d"><i class="comiis_font">&#xe632;</i> {$_G['forum']['threadsorts']['types'][$_GET['sortid']]}</em></a>
</div>
<!--{eval comiis_load('eYnbwiIMovyoHIcIVY', 'quicksearchlist,showoption,tmpcount,filterurladd,sorturladdarray');}-->