<?php echo 'Zheng Ban QQ:3383288270';exit;?>
<!--{if $param['login']}-->
	<!--{if $_G['inajax']}-->
	<!--{eval dheader('Location:member.php?mod=logging&action=login&inajax=1&infloat=1');exit;}-->
	<!--{else}-->
	<!--{eval dheader('Location:member.php?mod=logging&action=login');exit;}-->
	<!--{/if}-->
<!--{/if}-->
<!--{template common/header}-->
<!--{if $_G['inajax']}-->
<div class="tip" style="height:150px;">
	<dt id="messagetext">
		<p>$show_message</p>
        <!--{if $_G['forcemobilemessage']}-->
        	<p >
            	<a href="{$_G['setting']['mobile']['pageurl']}" class="mtn">{lang continue}</a><br />
                <a href="javascript:history.back();">{lang goback}</a>
            </p>
        <!--{/if}-->
		<!--{if $url_forward && !$_GET['loc']}-->
			<!--<p><a class="grey" href="$url_forward">{lang message_forward_mobile}</a></p>-->
			<script type="text/javascript">
				setTimeout(function() {
					window.location.href = '$url_forward';
				}, '3000');
			</script>
		<!--{elseif $allowreturn}-->
			<p><input type="button" class="button" onclick="popup.close();" value="{lang close}"></p>
		<!--{/if}-->
	</dt>
</div>
<!--{else}-->

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
			<li><a href="search.php?mod=forum" class="icon_search">{lang search}</a></li>
		</ul>
	</div>
</header>
<!-- header end -->
<!-- main jump start -->
<div class="jump_c">
	<p>$show_message</p>
    <!--{if $_G['forcemobilemessage']}-->
		<p>
            <a href="{$_G['setting']['mobile']['pageurl']}" class="mtn">{lang continue}</a><br />
            <a href="javascript:history.back();">{lang goback}</a>
        </p>
    <!--{/if}-->
	<!--{if $url_forward}-->
		<p><a class="grey" href="$url_forward">{lang message_forward_mobile}</a></p>
	<!--{elseif $allowreturn}-->
		<p><a class="grey" href="javascript:history.back();">{lang message_go_back}</a></p>
	<!--{/if}-->
</div>
<!-- main jump end -->

<!--{/if}-->
<!--{eval $nofooter = true;}-->
<!--{template common/footer}-->
<!--
	[Zheng Ban URL]
	https://addon.dismall.com/?@wubian
-->