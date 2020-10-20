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
			<li class="on"><a href="forum.php?mod=guide&view=hot" class="icon_hotthread">{lang hot_thread}</a></li>
			<li><a href="forum.php?forumlist=1" class="icon_threadlist">{lang forum_list}</a></li>
		</ul>
		<h1>$_G['setting']['sitename']</h1>
		<ul class="user_fun_y">
			<li id="usermsg"><a href="<!--{if $_G[uid]}-->home.php?mod=space&uid=$_G[uid]&do=profile&mycenter=1<!--{else}-->member.php?mod=logging&action=login<!--{/if}-->" class="icon_userinfo">{lang user_info}</a><!--{if $_G[member][newpm]}--><span class="icon_msg"></span><!--{/if}--></li>
			<li><a href="search.php?mod=forum" class="icon_search">{lang search}</a></li>
		</ul>
	</div>
</header>
<!-- header end -->
<!-- main threadlist start -->
<div class="threadlist">
	<!--{loop $data $key $list}-->
		<!--{subtemplate forum/guide_list_row}-->
	<!--{/loop}-->
</div>
<!-- main threadlist end -->

$multipage

<div class="pullrefresh" style="display:none;"></div>
<!--{template common/footer}-->
<!--
	[Zheng Ban URL]
	https://addon.dismall.com/?@wubian
-->
