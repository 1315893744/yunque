<?PHP exit('Access Denied');?>
<!--{if empty($threadlist)}--><!--{eval $comiis_bg = 1;}--><!--{/if}-->
<!--{template common/header}-->
<!--{if !$_GET['inajax']}-->
<form id="searchform" class="searchform" method="post" autocomplete="off" action="search.php?mod=forum">
	<input type="hidden" name="formhash" value="{FORMHASH}" />
	<!--{subtemplate search/pubsearch}-->
	<!--{eval $policymsgs = $p = '';}-->
	<!--{loop $_G['setting']['creditspolicy']['search'] $id $policy}-->
	<!--{block policymsg}--><!--{if $_G['setting']['extcredits'][$id][img]}-->$_G['setting']['extcredits'][$id][img] <!--{/if}-->$_G['setting']['extcredits'][$id][title] $policy $_G['setting']['extcredits'][$id][unit]<!--{/block}-->
	<!--{eval $policymsgs .= $p.$policymsg;$p = ', ';}-->
	<!--{/loop}-->
	<!--{if $policymsgs}--><div class="ss_kftip f_c">{lang search_credit_msg}</div><!--{/if}-->
</form>
<!--{/if}-->
<!--{if !empty($searchid) && submitcheck('searchsubmit', 1)}-->
	<!--{subtemplate search/thread_list}-->
<!--{/if}-->
<!--{eval $comiis_foot = 'no';}-->
<!--{template common/footer}-->