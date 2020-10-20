<?PHP exit('Access Denied');?>
<!--{template common/header}-->
<!--{if $_GET['action'] == 'commentmore'}-->
    <!--{if $comments}-->
        <ul>
            <!--{loop $comments $comment}-->
            <li>
           <!--{if $comment['authorid']}-->
                <a href="home.php?mod=space&uid=$comment[authorid]&do=profile" class="f_ok">$comment[author]:</a>
                <!--{else}-->
                <span class="f_ok">{lang guest}:</span>
            <!--{/if}-->
            $comment[comment]&nbsp;
            <!--{if $comment[rpid]}-->
                <a href="forum.php?mod=redirect&goto=findpost&pid=$comment[rpid]&ptid=$_G[tid]">{lang detail}</a>
                <a href="forum.php?mod=post&action=reply&fid=$_G[fid]&tid=$_G[tid]&reppost=$comment[rpid]&extra=$_GET[extra]&page=$page{if $_GET[from]}&from=$_GET[from]{/if}" onclick="showWindow('reply', this.href)">{lang reply}</a>
            <!--{/if}-->
            <!--{if $_G['forum']['ismoderator'] && $_G['group']['allowdelpost']}--><a href="javascript:;" onclick="modaction('delcomment', $comment[id])" class="f_g">{lang delete}</a><!--{/if}-->
            </li>
            <!--{/loop}-->
        </ul>
    <!--{/if}-->
    <div class="comiis_dianping_page mt5">$multi</div>
<!--{else}-->
    <!--{if $comments}-->
        <h2><i class="comiis_font f_c z">&#xe680;</i> {lang comments}</h2>
        <div class="comiis_plli b_t cl">
        <!--{loop $comments $comment}-->
            <dl class="b_t cl">
                <dt>
                    <!--{if $comment['authorid']}-->
                        <a href="home.php?mod=space&uid=$comment[authorid]&do=profile"><img src="<!--{avatar($comment[authorid], middle, true)}-->" class="top_tximg"></a>
                        <!--{else}-->
                        <img src="<!--{avatar(0, middle, true)}-->" class="top_tximg">
                    <!--{/if}-->
                    <h2>
                        <!--{if $comment['authorid']}-->
                            <a class="top_user f_b" href="home.php?mod=space&uid=$comment[authorid]&do=profile">$comment[author]</a>
                        <!--{else}-->
                            <span class="top_user f_b">{lang guest}</span>
                        <!--{/if}-->
                    </h2>
                    <span class="top_time f_d">$comment[dateline]</span>
                </dt>
                <dd>$comment[comment]</dd>
            </dl>
        <!--{/loop}-->
        </div>
    <!--{/if}-->
    $multi
<!--{/if}-->
<!--{template common/footer}-->