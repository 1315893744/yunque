<?php echo 'Zheng Ban QQ:3383288270';exit;?>
<!--{template common/header}-->
<!-- header start -->
<header class="header">
    <div class="nav">
		<div class="icon_edit y"><a href="forum.php?mod=post&action=newthread&fid=$_G[fid]" title="{lang send_threads}"><span class="none">{lang send_threads}</span></a></div>
        <a href="forum.php?forumlist=1" class="z"><img src="{STATICURL}image/mobile/images/icon_back.png" /></a>
		<span><!--{eval echo strip_tags($_G['forum']['name']) ? strip_tags($_G['forum']['name']) : $_G['forum']['name'];}--></span>
    </div>
</header>
<!-- header end -->
<!--{if $subexists && $_G['page'] == 1}-->
<div class="bz-sub-nav bzbb1">
	<ul class="cl">
	<!--{loop $sublist $sub}-->
	<li><a href="forum.php?mod=forumdisplay&fid={$sub[fid]}">{$sub['name']}</a><em>/</em></li>
	<!--{/loop}-->
	</ul>
</div>
<div class="cl" style="clear: both;"></div>
<!--{/if}-->
<!--{hook/forumdisplay_top_mobile}-->
<!-- main threadlist start -->
<!--{if !$subforumonly}-->
<div class="threadlist">
	<ul>
	<!--{if $_G['forum_threadcount']}-->
		<!--{loop $_G['forum_threadlist'] $key $thread}-->
			<!--{if !$_G['setting']['mobile']['mobiledisplayorder3'] && $thread['displayorder'] > 0}-->
				{eval continue;}
			<!--{/if}-->
        	<!--{if $thread['displayorder'] > 0 && !$displayorder_thread}-->
        		{eval $displayorder_thread = 1;}
            <!--{/if}-->
			<!--{if $thread['moved']}-->
				<!--{eval $thread[tid]=$thread[closed];}-->
			<!--{/if}-->
			<li>
			<!--{hook/forumdisplay_thread_mobile $key}-->
            <a href="forum.php?mod=viewthread&tid=$thread[tid]&extra=$extra" $thread[highlight] >
			{$thread[subject]}
			<span class="by">$thread[author]</span>
			</a>
			<span class="num">{$thread[replies]}</span>
			<!--{if in_array($thread['displayorder'], array(1, 2, 3, 4))}-->
				<span class="icon_top"><img src="{STATICURL}image/mobile/images/icon_top.png"></span>
			<!--{elseif $thread['digest'] > 0}-->
				<span class="icon_top"><img src="{STATICURL}image/mobile/images/icon_digest.png"></span>
			<!--{elseif $thread['attachment'] == 2 && $_G['setting']['mobile']['mobilesimpletype'] == 0}-->
				<span class="icon_tu"><img src="{STATICURL}image/mobile/images/icon_tu.png"></span>
			<!--{/if}-->
			</li>
        <!--{/loop}-->
    <!--{else}-->
	<li>{lang forum_nothreads}</li>
	<!--{/if}-->
	</ul>
</div>
$multipage
<!--{/if}-->
<!-- main threadlist end -->
<!--{hook/forumdisplay_bottom_mobile}-->
<!--{eval $nofooter = true;}-->
<!--{template common/footer}-->
<!--
	[Zheng Ban URL]
	https://addon.dismall.com/?@wubian
-->
