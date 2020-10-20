<?php echo 'Zheng Ban QQ:3383288270';exit;?>
<!--{template common/header}-->
<!-- header start -->
<header class="header">
	<div class="hdc cl">
		<!--{if $_G['setting']['domain']['app']['mobile']}-->
			{eval $nav = 'http://'.$_G['setting']['domain']['app']['mobile'];}
		<!--{else}-->
			{eval $nav = "forum.php";}
		<!--{/if}-->
		<ul class="user_fun_z">
			<!--{if $_G['setting']['mobile']['mobilehotthread']}-->
			<li><a href="forum.php?mod=guide&view=hot" class="icon_hotthread">{lang hot_thread}</a></li>
			<!--{/if}-->
			<li><a href="forum.php?forumlist=1" class="icon_threadlist">{lang forum_list}</a></li>
		</ul>
		<h1>$_G['setting']['sitename']</h1>
		<ul class="user_fun_y">
			<li id="usermsg"><a href="<!--{if $_G[uid]}-->home.php?mod=space&uid=$_G[uid]&do=profile&mycenter=1<!--{else}-->member.php?mod=logging&action=login<!--{/if}-->" class="icon_userinfo">{lang user_info}</a><!--{if $_G[member][newpm]}--><span class="icon_msg"></span><!--{/if}--></li>
			<li class="on"><a href="search.php?mod=forum" class="icon_search">{lang search}</a></li>
		</ul>
	</div>
</header>
<!-- header end -->
<form id="searchform" class="searchform" method="post" autocomplete="off" action="search.php?mod=forum&mobile=2">
	<input type="hidden" name="formhash" value="{FORMHASH}" />

	<!--{subtemplate search/pubsearch}-->

	<!--{eval $policymsgs = $p = '';}-->
	<!--{loop $_G['setting']['creditspolicy']['search'] $id $policy}-->
	<!--{block policymsg}--><!--{if $_G['setting']['extcredits'][$id][img]}-->$_G['setting']['extcredits'][$id][img] <!--{/if}-->$_G['setting']['extcredits'][$id][title] $policy $_G['setting']['extcredits'][$id][unit]<!--{/block}-->
	<!--{eval $policymsgs .= $p.$policymsg;$p = ', ';}-->
	<!--{/loop}-->
	<!--{if $policymsgs}--><p>{lang search_credit_msg}</p><!--{/if}-->
</form>

<!--{if !empty($searchid) && submitcheck('searchsubmit', 1)}-->
	<!--{subtemplate search/thread_list}-->
<!--{/if}-->

<!--{eval $nofooter = true;}-->
<!--{template common/footer}-->
<!--
	[Zheng Ban URL]
	https://addon.dismall.com/?@wubian
-->
