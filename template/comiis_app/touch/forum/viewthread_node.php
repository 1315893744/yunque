<?PHP exit('Access Denied');?>
<!--{if $_G[forum_thread][isgroup] == 1}-->
<!--{eval $comiis_app_switch['comiis_view_reply'] = $comiis_app_switch['comiis_view_reply_group'];}-->
<!--{/if}-->
<!--{eval $needhiddenreply = ($hiddenreplies && $_G['uid'] != $post['authorid'] && $_G['uid'] != $_G['forum_thread']['authorid'] && !$post['first'] && !$_G['forum']['ismoderator']);}-->
<!--{hook/viewthread_posttop_mobile $postcount}-->
<!--{if $comiis_app_switch[comiis_flxx_view] == 0 || $comiis_app_switch[comiis_flxx_view_wz] == 0 || !$threadsortshow['typetemplate'] || !$threadsort}-->
<!--{eval comiis_load('X8dZDW2WWfcFwyxdFy', 'post,thread,filter,comiis_isnotitle');}-->
<!--{/if}-->
<!--{block authorverifys}-->
<!--{loop $post['verifyicon'] $vid}-->
	<a href="home.php?mod=spacecp&ac=profile&op=verify&vid=$vid"><!--{if $_G['setting']['verify'][$vid]['icon']}--><img src="$_G['setting']['verify'][$vid]['icon']" class="vm" alt="$_G['setting']['verify'][$vid][title]" title="$_G['setting']['verify'][$vid][title]" /><!--{else}-->$_G['setting']['verify'][$vid]['title']<!--{/if}--></a>
<!--{/loop}-->
<!--{loop $post['unverifyicon'] $vid}-->
	<a href="home.php?mod=spacecp&ac=profile&op=verify&vid=$vid"><img src="$_G['setting']['verify'][$vid]['unverifyicon']" class="vm" alt="$_G['setting']['verify'][$vid][title]" title="$_G['setting']['verify'][$vid][title]" /></a>
<!--{/loop}-->
<!--{/block}-->
<div class="comiis_postli{if !$_GET['viewpid']} comiis_list_readimgs{/if}{if $comiis_app_switch['comiis_view_reply'] == 1} comiis_postli_v1{elseif $comiis_app_switch['comiis_view_reply'] == 2} comiis_postli_v2{/if} zpbe" id="pid$post[pid]">
	<a name="pid$post[pid]"></a>
	<!--{if $post[first]}-->
	<!--{eval $comiis_share_pic = current($post[attachments]);$comiis_share_message = messagecutstr(str_replace(array("\r\n", "\r", "\n", 'replyreload += \',\' + '.$post[pid].';', "'", "'"), '', strip_tags($post[message])), 100);}-->
	<!--{if $comiis_app_switch['comiis_view_header'] != 3 && ($comiis_app_switch[comiis_flxx_view] == 0 || $comiis_app_switch[comiis_flxx_view_wz] == 0 || !$threadsortshow['typetemplate'] || !$threadsort)}-->
	<style>.comiis_flxx_stamp {display:none;}</style>
    <div class="comiis_postli_top bg_f b_t">
      <!--{eval comiis_load('Am1I57R3x1C3Mus9M7', 'post,postnostick,postno,authorverifys');}-->	
    </div>
	<!--{/if}-->
		<!--{if (($_G['forum']['ismoderator'] || $_G['group']['alloweditpost'] && (!in_array($post['adminid'], array(1, 2, 3)) || $_G['adminid'] <= $post['adminid'])) || ($_G['forum']['alloweditpost'] && $_G['uid'] && ($post['authorid'] == $_G['uid'] && $_G['forum_thread']['closed'] == 0) && !(!$alloweditpost_status && $edittimelimit && TIMESTAMP - $post['dbdateline'] > $edittimelimit)))}-->
			<div id="moption_$post[pid]" popup="true" class="comiis_manages comiis_bodybg comiis_popup" style="display:none;" comiis_popup="comiis">
				<ul>
					<!--{if (($_G['forum']['ismoderator'] && $_G['group']['alloweditpost'] && (!in_array($post['adminid'], array(1, 2, 3)) || $_G['adminid'] <= $post['adminid'])) || ($_G['forum']['alloweditpost'] && $_G['uid'] && ($post['authorid'] == $_G['uid'] && $_G['forum_thread']['closed'] == 0) && !(!$alloweditpost_status && $edittimelimit && TIMESTAMP - $post['dbdateline'] > $edittimelimit)))}-->
						<li{if !$_G['forum']['ismoderator'] && !($allowpusharticle && $allowpostarticle)} class="glall"{/if}><a href="forum.php?mod=post&action=edit&fid=$_G[fid]&tid=$_G[tid]&pid=$post[pid]{if !empty($_GET[modthreadkey])}&modthreadkey=$_GET[modthreadkey]{/if}&page=$page" class="redirect bg_f b_b"><!--{if $_G['forum_thread']['special'] == 2 && !$post['message']}-->{lang post_add_aboutcounter}<!--{else}-->{lang edit}<!--{/if}--></a></li>
					<!--{elseif $_G['uid'] && $post['authorid'] == $_G['uid'] && $_G['setting']['postappend']}-->
						<li><a href="forum.php?mod=misc&action=postappend&tid=$post[tid]&pid=$post[pid]&extra=$_GET[extra]&page=$page" class="redirect bg_f b_b">{lang postappend}</a></li>
					<!--{/if}-->
					<!--{if $modmenu['thread']}-->
							<!--{eval $modopt=0;}-->
							<!--{if $_G['forum']['ismoderator']}-->
								<!--{if $_G['group']['allowdelpost']}--><!--{eval $modopt++}--><li><a href="javascript:;" onclick="modthreads(3, 'delete')" class="bg_f b_b">{lang modmenu_deletepost}</a></li><!--{/if}-->
								<!--{if $_G['group']['allowclosethread'] && !$_G['forum_thread']['is_archived'] && $_G['forum']['status'] != 3}--><!--{eval $modopt++}--><li><a href="javascript:;" onclick="modthreads(4)" class="bg_f b_b"><!--{if !$_G['forum_thread']['closed']}-->{lang modmenu_switch_off}<!--{else}-->{lang modmenu_switch_on}<!--{/if}--></a></li><!--{/if}-->
								<!--{if $_G['group']['allowdigestthread'] && !$_G['forum_thread']['is_archived']}--><!--{eval $modopt++}--><li><a href="javascript:;" onclick="modthreads(1, 'digest')" class="bg_f b_b">{lang modmenu_digestpost}</a></li><!--{/if}-->
								<!--{if $_G['group']['allowstickthread'] && ($_G['forum_thread']['displayorder'] <= 3 || $_G['adminid'] == 1) && !$_G['forum_thread']['is_archived']}--><!--{eval $modopt++}--><li><a href="javascript:;" onclick="modthreads(1, 'stick')" class="bg_f b_b">{lang modmenu_stickthread}</a></li><!--{/if}-->								
								<!--{if $_G['group']['allowhighlightthread'] && !$_G['forum_thread']['is_archived']}--><!--{eval $modopt++}--><li><a href="javascript:;" onclick="modthreads(1, 'highlight')" class="bg_f b_b">{lang modmenu_highlight}</a></li><!--{/if}-->
								<!--{if $_G['group']['allowstampthread'] && !$_G['forum_thread']['is_archived']}--><!--{eval $modopt++}--><li><a href="javascript:;" onclick="modaction('stamp')" class="bg_f b_b">{lang modmenu_stamp}</a></li><!--{/if}-->
								<!--{if $_G['group']['allowstamplist'] && !$_G['forum_thread']['is_archived']}--><!--{eval $modopt++}--><li><a href="javascript:;" onclick="modaction('stamplist')" class="bg_f b_b">{lang modmenu_icon}</a></li><!--{/if}-->								
								<!--{if $_G['group']['allowmanagetag']}--><li><a href="forum.php?mod=tag&op=manage&tid=$_G[tid]" class="dialog bg_f b_b">{lang post_tag}</a></li><!--{/if}-->
								<!--{if $_G['group']['allowedittypethread'] && !$_G['forum_thread']['is_archived']}--><!--{eval $modopt++}--><li><a href="javascript:;" onclick="modthreads(2, 'type')" class="bg_f b_b">{lang modmenu_type}</a></li><!--{/if}-->
								<!--{if $_G['group']['allowbumpthread'] && !$_G['forum_thread']['is_archived']}--><!--{eval $modopt++}--><li><a href="javascript:;" onclick="modthreads(3, 'bump')" class="bg_f b_b">{lang modmenu_updown}</a></li><!--{/if}-->								
								<!--{if $_G['group']['allowrecommendthread'] && !empty($_G['forum']['modrecommend']['open']) && $_G['forum']['modrecommend']['sort'] != 1 && !$_G['forum_thread']['is_archived']}--><!--{eval $modopt++}--><li><a href="javascript:;" onclick="modthreads(1, 'recommend')" class="bg_f b_b">{lang modmenu_recommend}</a></li><!--{/if}-->
								<!--{if $_G['group']['allowlivethread'] && !$_G['forum_thread']['is_archived']}--><!--{eval $modopt++}--><li><a href="javascript:;" onclick="modaction('live')" class="bg_f b_b" style="display:none;">{lang modmenu_live}</a></li><!--{/if}-->		
								<!--{if $_G['group']['allowmovethread'] && !$_G['forum_thread']['is_archived'] && $_G['forum']['status'] != 3}--><!--{eval $modopt++}--><li><a href="javascript:;" onclick="modthreads(2, 'move')" class="bg_f b_b">{lang modmenu_move}</a></li><!--{/if}-->
								<!--{if !$_G['forum_thread']['special'] && !$_G['forum_thread']['is_archived']}-->
									<!--{if $_G['group']['allowcopythread'] && $_G['forum']['status'] != 3}--><!--{eval $modopt++}--><li><a href="javascript:;" onclick="modaction('copy')" class="bg_f b_b">{lang modmenu_copy}</a></li><!--{/if}-->
									<!--{if $_G['group']['allowmergethread'] && $_G['forum']['status'] != 3}--><!--{eval $modopt++}--><li><a href="javascript:;" onclick="modaction('merge')" class="bg_f b_b">{lang modmenu_merge}</a></li><!--{/if}-->
									<!--{if $_G['group']['allowrefund'] && $_G['forum_thread']['price'] > 0}--><!--{eval $modopt++}--><li><a href="javascript:;" onclick="modaction('refund')" class="bg_f b_b">{lang modmenu_restore}</a></li><!--{/if}-->
								<!--{/if}-->
								<!--{if $_G['group']['allowremovereward'] && $_G['forum_thread']['special'] == 3 && !$_G['forum_thread']['is_archived']}--><!--{eval $modopt++}--><li><a href="javascript:;" onclick="modaction('removereward')" class="bg_f b_b">{lang modmenu_removereward}</a></li><!--{/if}-->	
								<!--{if $_G['group']['allowsplitthread'] && !$_G['forum_thread']['is_archived'] && $_G['forum']['status'] != 3}--><!--{eval $modopt++}--><li><a href="javascript:;" onclick="modaction('split')" class="bg_f b_b">{lang modmenu_split}</a></li><!--{/if}-->
								<!--{if $_G['group']['allowrepairthread'] && !$_G['forum_thread']['is_archived']}--><!--{eval $modopt++}--><li><a href="javascript:;" onclick="modaction('repair')" class="bg_f b_b">{lang modmenu_repair}</a></li><!--{/if}-->								
								<!--{if $_G['forum_firstpid']}-->
									<!--{if $_G['group']['allowwarnpost']}--><!--{eval $modopt++}--><li><a href="javascript:;" onclick="modaction('warn', '$_G[forum_firstpid]')" class="bg_f b_b">{lang modmenu_warn}</a></li><!--{/if}-->
									<!--{if $_G['group']['allowbanpost']}--><!--{eval $modopt++}--><li><a href="javascript:;" onclick="modaction('banpost', '$_G[forum_firstpid]')" class="bg_f b_b">{lang modmenu_banthread}</a></li><!--{/if}-->
								<!--{/if}-->								
							<!--{/if}-->
							<!--{if $allowpusharticle && $allowpostarticle}--><!--{eval $modopt++}--><li><a href="portal.php?mod=portalcp&ac=article&from_idtype=tid&from_id=$_G['tid']" class="bg_f b_b">{lang modmenu_pusharticle}</a></li><!--{/if}-->										
					<!--{/if}-->							
					<li class="glall"><a href="javascript:;" class="comiis_glclose mt10 bg_f b_t f_g">{lang cancel}</a></li>
				</ul>
			</div>			
		<!--{/if}-->
	<!--{else}-->
		<!--{eval comiis_load('pZCMTUVz481Cc1F1ZV', 'post,rushreply,hiddenreplies,page,postnostick,postno,thread,allowpostreply,authorverifys');}-->
	<!--{/if}-->
	<div class="comiis_message bg_f<!--{if $post['first']}--> view_one b_b<!--{else}--> view_all<!--{/if}--> cl message">
		<div class="comiis_messages{if $comiis_app_switch['comiis_aimg_show'] == 1} comiis_aimg_show{/if} cl">
		<!--{if $comiis_app_switch['comiis_view_zntit'] == 1 && $comiis_isnotitle == 1}-->
		<!--{else}-->
            <!--{if $post['first'] && $comiis_app_switch['comiis_view_header'] == 2 && ($comiis_app_switch[comiis_flxx_view] == 0 || $comiis_app_switch[comiis_flxx_view_wz] == 0 || !$threadsortshow['typetemplate'] || !$threadsort)}-->
            <div class="comiis_viewtit comiis_viewtit_v2">
                <h2>
                    <a href="forum.php?mod=viewthread&tid=$_G[tid]">$_G[forum_thread][subject]</a>
                    <div class="mt5 cl">
                        <!--{if $post['warned']}--><span class="top_jg bg_del f_f">{$comiis_lang['warn_get']}</span><!--{/if}-->
                        <!--{if in_array($thread['displayorder'], array(1, 2, 3, 4))}--><span class="top_jh bg_0 f_f">{$comiis_lang['view41']}</span><!--{/if}-->
                        <!--{if $thread['digest'] > 0 && $filter != 'digest'}--><span class="top_jh bg_c f_f">{$comiis_lang['view42']}</span><!--{/if}-->
                        <!--{if $_G['forum_thread'][displayorder] == -2}-->
                            <span class="top_jg bg_a f_f">{lang moderating}</span>
                        <!--{elseif $_G['forum_thread'][displayorder] == -3}-->
                            <span class="top_jg bg_b f_c">{lang have_ignored}</span>
                        <!--{elseif $_G['forum_thread'][displayorder] == -4}-->
                            <span class="top_jg bg_a f_f">{lang draft}</span>
                        <!--{/if}-->
                    </div>
                </h2>
            </div>
            <!--{/if}-->
		<!--{/if}-->
		<!--{if !$post['first'] && !empty($post[subject])}-->
			<h2 class="f_0">$post[subject]</h2>
		<!--{/if}-->
		<!--{if !IS_ROBOT && $post['first'] && !$_G['forum_thread']['archiveid'] && $comiis_app_switch['comiis_modact_log'] == 1}-->
			<!--{if !empty($lastmod['modaction'])}--><div class="comiis_modact bg_b f_c"><!--{if $lastmod['modactiontype'] == 'REB'}-->{lang thread_mod_recommend_by}<!--{else}-->{lang thread_mod_by}<!--{/if}--></div><!--{/if}-->
		<!--{/if}-->
		<!--{if $post['first'] && $rushreply}-->
			<div class="comiis_quote comiis_qianglou bg_h">
				<!--{if $rushresult[creditlimit] == ''}-->
					<span class="f_a">{lang thread_rushreply}</span><br>
				<!--{else}-->
					<span class="f_a">{lang thread_rushreply_limit}</span><br>
				<!--{/if}-->
				<span class="f_b">
				<!--{if $rushresult['timer']}-->
				<span id="rushtimer_$thread[tid]"> {lang havemore_special} <span id="rushtimer_body_$thread[tid]"></span> <script language="javascript">settimer($rushresult['timer'], 'rushtimer_body_$thread[tid]');</script>{if $rushresult['timertype'] == 'start'} {lang header_start} {else} {lang over} {/if}{lang right_special}</span><br>
				<!--{/if}-->
				<!--{if $rushresult[stopfloor]}-->
					{lang thread_rushreply_end}$rushresult[stopfloor]<br>
				<!--{/if}-->
				<!--{if $rushresult[rewardfloor]}-->
					{lang thread_rushreply_floor} : $rushresult[rewardfloor]<br>
				<!--{/if}-->
				</span>
				<!--{if $rushresult[rewardfloor] && $_GET['checkrush']}-->
					<span class="f_0"><!--{if $countrushpost}-->[$countrushpost] {lang thread_rushreply_rewardnum}<!--{else}--> {lang thread_rushreply_noreward}<!--{/if}--></span><br>
					<div class="cl"><a href="forum.php?mod=viewthread&tid=$_G[tid]" class="y f_a"><i class="comiis_font">&#xe657;</i> {lang thread_rushreply_check_back}</a></div>
				<!--{/if}-->				
				<!--{if $rushresult[rewardfloor] && !$_GET['checkrush']}-->
					<div class="cl"><a href="forum.php?mod=viewthread&tid=$post[tid]&checkrush=1" class="y f_a"><i class="comiis_font">&#xe650;</i> {lang rushreply_view}</a></div>
				<!--{/if}-->
			</div>
		<!--{/if}-->
		<!--{if $_G['adminid'] != 1 && $_G['setting']['bannedmessages'] & 1 && (($post['authorid'] && !$post['username']) || ($post['groupid'] == 4 || $post['groupid'] == 5) || $post['status'] == -1 || $post['memberstatus'])}-->
			<div class="comiis_quote bg_h f_c">{lang message_banned}</div>
		<!--{elseif $_G['adminid'] != 1 && $post['status'] & 1}-->
			<div class="comiis_quote bg_h f_c">{lang message_single_banned}</div>
		<!--{elseif $needhiddenreply}-->
			<div class="comiis_quote bg_h f_c">{lang message_ishidden_hiddenreplies}</div>
		<!--{elseif $post['first'] && $_G['forum_threadpay']}-->
			<!--{template forum/viewthread_pay}-->
		<!--{elseif $_G['forum_discuzcode']['passwordlock'][$post[pid]]}-->
			<div class="comiis_postpw bg_h">
				<ul>
					<li class="f_a"><i class="comiis_font">&#xe61d;</i> {lang message_password_exists} {lang pleaseinputpw}{lang continue}!</li>
					<li class="comiis_flex mt4">
						<div class="flex bg_f b_t b_b b_l"><input type="text" id="postpw_$post[pid]" class="comiis_px" /></div>					
						<button class="bg_0 f_f" type="button" onclick="submitpostpw($post[pid]{if $_GET['from'] == 'preview'},{$post[tid]}{else}{/if})">{lang submit}</button>
					</li>
				</ul>
			</div>			
			<script type="text/javascript" src="{$_G[setting][jspath]}md5.js?{VERHASH}"></script>
		<!--{else}-->
			<!--{if $_G['setting']['bannedmessages'] & 1 && (($post['authorid'] && !$post['username']) || ($post['groupid'] == 4 || $post['groupid'] == 5))}-->
				<div class="comiis_quote bg_h f_c">{lang admin_message_banned}</div>
			<!--{elseif $post['status'] & 1}-->
				<div class="comiis_quote bg_h f_c">{lang admin_message_single_banned}</div>
			<!--{/if}-->
			<!--{if $post['first'] && $_G['forum_thread']['price'] > 0 && $_G['forum_thread']['special'] == 0}-->
				<div class="comiis_quote comiis_qianglou bg_h"><a href="forum.php?mod=misc&action=viewpayments&tid=$_G[tid]" class="y f_a">{lang pay_view}</a><i class="comiis_font f_a">&#xe61d;</i>&nbsp;{lang pay_threads}: <strong>$_G[forum_thread][price] {$_G['setting']['extcredits'][$_G['setting']['creditstransextra'][1]][unit]}{$_G['setting']['extcredits'][$_G['setting']['creditstransextra'][1]][title]}</strong></div>
			<!--{/if}-->
			<!--{eval comiis_load('dQw9EdS6iLz6s65QPd', 'post,threadsort,threadsortshow,matches');}-->					                      
			<!--{if $post['first']}-->
				<!--{if !$_G[forum_thread][special]}-->
					<div class="comiis_a comiis_message_table cl">$post[message]</div>
				<!--{elseif $_G[forum_thread][special] == 1}-->
					<!--{template forum/viewthread_poll}-->
				<!--{elseif $_G[forum_thread][special] == 2}-->
					<!--{template forum/viewthread_trade}-->
				<!--{elseif $_G[forum_thread][special] == 3}-->
					<!--{template forum/viewthread_reward}-->
				<!--{elseif $_G[forum_thread][special] == 4}-->
					<!--{template forum/viewthread_activity}-->
				<!--{elseif $_G[forum_thread][special] == 5}-->
					<!--{template forum/viewthread_debate}-->
				<!--{elseif $threadplughtml}-->
					$threadplughtml
					<div class="comiis_a comiis_message_table cl">$post[message]</div>
				<!--{else}-->
					<div class="comiis_a comiis_message_table cl">$post[message]</div>
				<!--{/if}-->
			<!--{else}-->
				<div class="comiis_a comiis_message_table{if $comiis_app_switch['comiis_view_quote']==1} comiis_quote_v1{/if} cl">$post[message]</div>
			<!--{/if}-->
		<!--{/if}-->
		<!--{if $_G['setting']['mobile']['mobilesimpletype'] == 0}-->
			<!--{if $post['attachment']}-->
			   <div class="comiis_p10 bg_e f14 mt10 mb5 cl" style="line-height:24px;">
                    <div class="comiis_noatt_ico bg_0 f_f"><i class="comiis_font">&#xe650;</i></div>
					<h3 class="f_c">{$comiis_lang['tip283']}</h3>
					<p>
                        <!--{if $_G['uid']}-->
                        <span class="f_c">{$comiis_lang['tip288']}</span>
                        <!--{elseif $_G['connectguest']}-->
                        {$comiis_lang['tip287']}
                        <!--{else}-->
                            <span class="f_c">{$comiis_lang['tip284']}</span> <a href="member.php?mod=logging&action=login" class="f_wb">{$comiis_lang['tip285']}</a> <span class="f_c">{$comiis_lang['tip286']}</span> <a href="member.php?mod={$_G[setting][regname]}" class="f_wb">{$_G[setting][reglinkname]}</a>
                        <!--{/if}-->
					</p>
			   </div>
			<!--{elseif $post['imagelist'] || $post['attachlist']}-->
			   <!--{if $post['imagelist']}-->
				<!--{if count($post['imagelist']) == 1}-->
				<ul class="comiis_img_one{if !$post['first'] && $comiis_app_switch['comiis_aimg_show'] == 1} comiis_vximga{/if} cl">{echo showattach($post, 1)}</ul>
				<!--{else}-->
				<ul class="comiis_img_list{if !$post['first'] && $comiis_app_switch['comiis_aimg_show'] == 1} comiis_vximgb{if count($post['imagelist']) == 4} comiis_vximgb_img4{/if}{/if} cl">{echo showattach($post, 1)}</ul>
				<!--{/if}-->
				<!--{/if}-->
				<!--{if $post['attachlist']}-->
				<ul class="comiis_attach_box cl">{echo showattach($post)}</ul>
				<!--{/if}-->
			<!--{/if}-->
		<!--{/if}-->
		</div>
		<!--{hook/viewthread_postbottom_mobile $postcount}-->
		<!--{eval comiis_load('H47SeNtT7n43eF6336', 'post,postlist,relatedkeywords,comiis_recommend_style1,comiis_recommend_style2,comiis_isweixin,alloweditpost_status,edittimelimit');}-->
		<!--{if !$post['first']}-->
            <!--{if $_GET['from'] != 'preview' && $_G['setting']['commentnumber'] && !empty($comments[$post[pid]])}-->
            <div id="comment_$post[pid]" class="comiis_dianping bg_e mt10 mb5">
                <ul>
                    <!--{loop $comments[$post[pid]] $comment}-->
                    <li>
                    <!--{if $comment['authorid']}-->
                        <a href="home.php?mod=space&uid=$comment[authorid]&do=profile" class="f_ok">$comment[author]:</a>
                        <!--{else}-->
                        <span class="f_ok">{lang guest}:</span>
                    <!--{/if}-->
                    $comment[comment]&nbsp;
                    <!--{if $comment[rpid]}-->
                        <a href="forum.php?mod=redirect&goto=findpost&pid=$comment[rpid]&ptid=$_G[tid]" class="xi2">{lang detail}</a>
                        <a href="forum.php?mod=post&action=reply&fid=$_G[fid]&tid=$_G[tid]&repquote=$comment[rpid]&extra=$_GET[extra]&page=$page{if $_GET[from]}&from=$_GET[from]{/if}" class="xi2" onclick="showWindow('reply', this.href)">{lang reply}</a>
                    <!--{/if}-->
                    <!--{if $_G['forum']['ismoderator'] && $_G['group']['allowdelpost']}--><a href="javascript:;" onclick="modaction('delcomment', $comment[id])" class="f_g">{lang delete}</a><!--{/if}-->
                    </li>
                    <!--{/loop}-->
                </ul>
                <!--{if $commentcount[$post[pid]] > $_G['setting']['commentnumber']}-->
                <div class="comiis_dianping_page">
                    <a href="javascript:;" onclick="ajaxget('forum.php?mod=misc&action=commentmore&tid=$post[tid]&pid=$post[pid]&page=2', 'comment_$post[pid]')" class="kmall f_c">{$comiis_lang['view3']}{if $comiis_app_switch['comiis_view_dianping_name']}{$comiis_app_switch['comiis_view_dianping_name']}{else}{$comiis_lang['comments']}{/if}...</a>
                </div>
                <!--{/if}-->
            </div>
            <!--{/if}-->
        <!--{/if}-->
		<!--{if !$post['first'] && $comiis_app_switch['comiis_view_lcrate'] != 1}-->
            <!--{if $_GET['from'] != 'preview' && !empty($post['ratelog'])}-->
            <div id="ratelog_$post[pid]" class="comiis_view_lcrate mt10 mb5">
                <h3>
					<!--{if count($post['ratelog']) > 5}--><a href="forum.php?mod=misc&action=viewratings&tid=$_G[tid]&pid=$post[pid]" class="comiis_xifont f_d"><i class="comiis_font">&#xe622;</i>{$comiis_lang['view3']}</a><!--{/if}-->
					<span class="f_ok"><i class="comiis_font">&#xe6ba;</i><em class="f_a"><!--{echo count($postlist[$post[pid]][totalrate]);}--></em> {$comiis_lang['tip259']}</span>
                </h3>
                <!--{eval $n=0;}-->
                <!--{loop $post['ratelog'] $uid $ratelog}-->
                    <!--{eval $n++;}-->
                    <!--{if $n <= 5}-->
                    <li id="rate_{$post[pid]}_{$uid}" class="bg_e mt5">
                        <a href="home.php?mod=space&uid=$uid&do=profile" class="lcrate_img"><!--{echo avatar($uid, 'small');}--></a>
                        <h2>
                            <!--{loop $ratelog['score'] $id $score}-->
                                <!--{if $score > 0}-->
                                    <span class="f_a">{$_G['setting']['extcredits'][$id][title]}+{$score}{$_G['setting']['extcredits'][$id][unit]}</span>
                                <!--{else}-->
                                    <span class="f_a">{$_G['setting']['extcredits'][$id][title]}{$score}{$_G['setting']['extcredits'][$id][unit]}</span>
                                <!--{/if}-->
                           <!--{/loop}-->
                           <a href="home.php?mod=space&uid=$uid&do=profile" class="f_c">$ratelog[username]</a>
                       </h2>
                        <p><!--{if $ratelog[reason]}-->$ratelog[reason]<!--{else}-->{$comiis_lang['tip257']}<!--{/if}--></p>
                    </li>
                    <!--{/if}-->
                <!--{/loop}-->           
            </div>
            <!--{/if}-->
        <!--{/if}-->
	</div>
	<!--{if $post['first']}-->
	<!--{if $comiis_app_switch['comiis_view_header_noxx'] == 1 && $comiis_app_switch['comiis_view_bkxx'] == 0}-->
		<div class="comiis_bankuai bg_f b_t b_b cl">
			<ul>
				<li>
				<span><a href="forum.php?mod=forumdisplay&fid={$_G['forum']['fid']}"><i class="comiis_font f_d">&#xe60c;</i></a></span>
				<div class="top_ico"><a href="forum.php?mod=forumdisplay&fid={$_G['forum']['fid']}"><!--{if $_G['forum']['icon']}--><img {if $comiis_app_switch['comiis_loadimg']}src="./template/comiis_app/pic/none.png" comiis_loadimages={else}src={/if}"{echo get_forumimg($_G['forum']['icon'])}"{if $comiis_app_switch['comiis_loadimg']} class="comiis_loadimages"{/if}><!--{else}--><span class="bg_b f_d"><i class="comiis_font">&#xe627;</i>nopic</span><!--{/if}--></a></div>
				<p class="bankuai_tit vm"><a href="forum.php?mod=forumdisplay&fid={$_G['forum']['fid']}" class="z f_b">{$_G['forum']['name']}</a>
				<!--{if $comiis_forum_fav['favid']}-->
				<em class="bg_b f_d comiis_favorites"><a href="home.php?mod=spacecp&ac=favorite&op=delete&type=forum&formhash={FORMHASH}&favid={$comiis_forum_fav['favid']}&handlekey=forum_fav" class="dialog" comiis="handle">{$comiis_lang['all4']}</a></em></p>
				<!--{else}-->
				<em class="bg_a f_f comiis_favorites"><a href="{if $_G['uid']}home.php?mod=spacecp&ac=favorite&type={if $_G[forum_thread][isgroup] == 1}group{else}forum{/if}&id=$_G[fid]&formhash={FORMHASH}&handlekey=forum_fav{elseif !$_G[connectguest]}javascript:popup.open('{$comiis_lang['tip16']}', 'confirm', 'member.php?mod=logging&action=login');{else}javascript:popup.open('{$comiis_lang['reg23']}', 'confirm', 'member.php?mod=connect');{/if}"{if $_G['uid']} class="dialog"{/if} comiis="handle">+ {$comiis_lang['all3']}</a></em>
				<!--{/if}-->
				<p class="f_c">{$comiis_lang['view5']}: {$_G['forum']['posts']}&nbsp;&nbsp;&nbsp;<span id="comiis_forum_favtimes">{if $_G['forum']['favtimes']}{$comiis_lang['all3']}: <em>{$_G['forum']['favtimes']}</em>{/if}</span></p>
				</li>
			</ul>
		</div>
	<!--{elseif $comiis_app_switch['comiis_view_header_noxx'] == 1 && $comiis_app_switch['comiis_view_bkxx'] == 1}-->
        <div class="comiis_userlist bg_f b_t b_b mb10 cl">
            <ul>
                <li class="f_c">
                    <a href="forum.php?mod=forumdisplay&fid={$_G['forum']['fid']}" class="kmdbt">
                    <i class="comiis_font f_d">&#xe60c;</i>
                    <img {if $comiis_app_switch['comiis_loadimg']}src="./template/comiis_app/pic/none.png" comiis_loadimages={else}src={/if}"{if $_G['forum']['icon']}{echo get_forumimg($_G['forum']['icon'])}{else}template/comiis_app/comiis/img/forum.png{/if}"{if $comiis_app_switch['comiis_loadimg']} class="comiis_loadimages"{/if}>
                    {$comiis_lang['tip253']} <span class="f_ok">{$_G['forum']['name']}</span> {$comiis_lang['tip121']}
                    </a>
                </li>
            </ul>
        </div>
    <!--{/if}-->
	<!--{if $post['relateitem'] && $comiis_app_switch['comiis_view_cnxh'] == 1 && $comiis_app_switch['comiis_view_cnxh_wz'] != 1}-->
        <!--{subtemplate forum/comiis_view_cnxh}--> 
	<!--{elseif $post['relateitem'] && $comiis_app_switch['comiis_view_cnxh'] == 1 && $comiis_app_switch['comiis_view_cnxh_wz'] == 1}-->
        <!--{eval $comiis_relateitem = $post['relateitem'];}-->
	<!--{/if}-->
	<a name="comiis_allreplies"></a>
	<div class="comiis_pltit bg_f b_t cl">		
		<span class="comiis_ordertype f_c y">
		<!--{if $post['authorid'] && !$post['anonymous'] && ($_G[forum_thread][allreplies] != 0 && count($postlist) > 1)}-->
              <!--{if !IS_ROBOT && !$_GET['authorid'] && !$_G['forum_thread']['archiveid']}-->
                <a href="forum.php?mod=viewthread&tid=$_G[tid]&page=$page&authorid=$_G[forum_thread][authorid]#comiis_allreplies"><i class="comiis_font vm">&#xe63a;</i>{lang viewonlyauthorid}</a>
              <!--{elseif !$_G['forum_thread']['archiveid']}-->
                <a href="forum.php?mod=viewthread&tid=$_G[tid]&page=$page#comiis_allreplies"><i class="comiis_font vm">&#xe63a;</i>{$comiis_lang['view3']}</a>
              <!--{/if}-->	
                <!--{/if}-->
                <!--{if !IS_ROBOT && !$_G['forum_thread']['archiveid'] && !$rushreply && $_G[forum_thread][allreplies]!=0}-->
              <!--{if $ordertype != 1}-->
                <a href="forum.php?mod=viewthread&tid=$_G[tid]&extra=$_GET[extra]&ordertype=1&mobile=2#comiis_allreplies"><i class="comiis_font vm">&#xe63d;</i>{lang post_descview}</a>
              <!--{else}-->
                <a href="forum.php?mod=viewthread&tid=$_G[tid]&extra=$_GET[extra]&ordertype=2&mobile=2#comiis_allreplies"><i class="comiis_font kmgo vm">&#xe63d;</i>{lang post_ascview}</a>
              <!--{/if}-->
		<!--{/if}-->
		</span>
		<h2><!--{if $_G[forum_thread][allreplies]!=0}-->{$comiis_lang['all5']}<span class="f_d">{$_G[forum_thread][allreplies]}</span><!--{else}-->{$comiis_lang['all6']}<!--{/if}--></h2>
	</div>
	<!--{if $_G[forum_thread][allreplies] == 0 && count($postlist) <= 1}-->
	<div class="comiis_notip bg_f b_t comiis_sofa cl">
		<i class="comiis_font f_e cl">&#xe613;</i>
		<span class="f_d">{$comiis_lang['all6']}, {$comiis_lang['all7']}</span>
	</div>
	<!--{/if}-->
	<!--{/if}-->
	<!--{if !$post[first] && $comiis_app_switch['comiis_view_reply'] == 0}-->
	<div class="comiis_postli_times bg_f">
		<span class="bottom_zhan y">
			<!--{if !$_G['forum_thread']['special'] && !$rushreply && !$hiddenreplies && $_G['setting']['repliesrank'] && !$post['first'] && !($post['isWater'] && $_G['setting']['filterednovote'])}-->
			<a href="javascript:{if $_G['uid']}comiis_recommend('{$post[pid]}'){/if};" class="f_c{if !$_G['uid']} comiis_openrebox{/if}{if $_G['comiis_forum_hotreply_member'][$post[pid]]} f_wb{/if}" id="comiis_hotreply{$post[pid]}"><i class="comiis_font">&#xe63b;</i><span class="znums" id="comiis_recommend{$post[pid]}">{if $post[postreview][support]}{$post[postreview][support]}{/if}</span></a>
			<!--{/if}-->
            <!--{if $comiis_app_switch['comiis_view_lcrate'] != 1}-->		
                <!--{if !$post['first'] && $_G['group']['raterange'] && $post['authorid']}-->
                <a href="{if $_G['uid']}forum.php?mod=misc&action=rate&tid=$_G[tid]&pid=$post[pid]{else}javascript:;{/if}" class="f_c{if !$_G['uid']} comiis_openrebox{else} dialog{/if}"><i class="comiis_font">&#xe6ba;</i></a>
                <!--{/if}-->
            <!--{/if}-->
            <!--{if $comiis_app_switch['comiis_view_dianping'] != 1}-->
                <!--{if $post['invisible'] == 0 && $allowpostreply && $post['allowcomment'] && (!$thread['closed'] || $_G['forum']['ismoderator'])}-->
                <a href="{if $_G['uid']}forum.php?mod=misc&action=comment&tid=$post[tid]&pid=$post[pid]&extra=$_GET[extra]&page=$page{if $_G['forum_thread']['special'] == 127}&special=$specialextra{/if}{else}javascript:;{/if}" class="f_c{if !$_G['uid']} comiis_openrebox{else} dialog{/if}"><i class="comiis_font">&#x{if $comiis_app_switch['comiis_view_dianping_ico']}{$comiis_app_switch['comiis_view_dianping_ico']}{else}e6a0{/if};</i></a>
                <!--{/if}-->
			<!--{/if}-->
			<!--{if $comiis_app_switch['comiis_view_quotes'] != 1}-->
                <a href="{if $_G['uid']}forum.php?mod=post&action=reply&fid=$_G[fid]&tid=$_G[tid]&repquote=$post[pid]&page=$page{else}javascript:;{/if}" class="f_c{if !$_G['uid']} comiis_openrebox{else} dialog{/if}"><i class="comiis_font">&#xe677;</i></a>
			<!--{/if}-->
		</span>			
		<span class="f_d comiis_tm">$post[dateline]</span>
	</div>
	<!--{elseif !$post[first] && $comiis_app_switch['comiis_view_reply'] == 2}-->	
	<div class="comiis_zhanv2 bg_f">
        <!--{if $comiis_app_switch['comiis_view_quotes'] != 1}-->
            <a href="{if $_G['uid']}forum.php?mod=post&action=reply&fid=$_G[fid]&tid=$_G[tid]&repquote=$post[pid]&page=$page{else}javascript:;{/if}" class="y b_ok f_c bg_e{if !$_G['uid']} comiis_openrebox{else} dialog{/if}"><i class="comiis_font">&#xe626;</i>{lang reply}</a>
		<!--{/if}-->
        <!--{if $comiis_app_switch['comiis_view_dianping'] != 1}-->
            <!--{if $post['invisible'] == 0 && $allowpostreply && $post['allowcomment'] && (!$thread['closed'] || $_G['forum']['ismoderator'])}-->
            <a href="{if $_G['uid']}forum.php?mod=misc&action=comment&tid=$post[tid]&pid=$post[pid]&extra=$_GET[extra]&page=$page{else}javascript:;{/if}" class="y b_ok f_c bg_e{if !$_G['uid']} comiis_openrebox{else} dialog{/if}"><i class="comiis_font">&#x{if $comiis_app_switch['comiis_view_dianping_ico']}{$comiis_app_switch['comiis_view_dianping_ico']}{else}e6a0{/if};</i>{if $comiis_app_switch['comiis_view_dianping_name']}{$comiis_app_switch['comiis_view_dianping_name']}{else}{$comiis_lang['comments']}{/if}</a>
            <!--{/if}-->
		<!--{/if}-->
		<!--{if $comiis_app_switch['comiis_view_lcrate'] != 1}-->		
            <!--{if !$post['first'] && $_G['group']['raterange'] && $post['authorid']}-->
            <a href="{if $_G['uid']}forum.php?mod=misc&action=rate&tid=$_G[tid]&pid=$post[pid]{else}javascript:;{/if}" class="y b_ok f_c bg_e{if !$_G['uid']} comiis_openrebox{else} dialog{/if}"><i class="comiis_font">&#xe6bf;</i>{$comiis_lang['view50']}</a>
            <!--{/if}-->
        <!--{/if}-->
		<!--{if !$_G['forum_thread']['special'] && !$rushreply && !$hiddenreplies && $_G['setting']['repliesrank'] && !$post['first'] && !($post['isWater'] && $_G['setting']['filterednovote'])}-->
		<a href="javascript:{if $_G['uid']}comiis_recommend('{$post[pid]}'){/if};" class="y b_ok f_c bg_e{if !$_G['uid']} comiis_openrebox{/if}{if $_G['comiis_forum_hotreply_member'][$post[pid]]} f_wb{/if}" id="comiis_hotreply{$post[pid]}"><i class="comiis_font">&#xe63b;</i><span id="comiis_recommend{$post[pid]}">{if $post[postreview][support]}{$post[postreview][support]}{/if}</span>{$comiis_lang['view7']}</a>
		<!--{/if}-->
	</div>
	<!--{/if}-->
	<!--{if $_G['uid']}-->	
		<div id="moption_$post[pid]" popup="true" class="comiis_manage comiis_bodybg comiis_popup" style="display:none;" comiis_popup="comiis">	
			<ul>
				<!--{if $_G['forum_thread']['special'] == 3 && ($_G['forum']['ismoderator'] && (!$_G['setting']['rewardexpiration'] || $_G['setting']['rewardexpiration'] > 0 && ($_G[timestamp] - $_G['forum_thread']['dateline']) / 86400 > $_G['setting']['rewardexpiration']) || $_G['forum_thread']['authorid'] == $_G['uid']) && $post['authorid'] != $_G['forum_thread']['authorid'] && $post['first'] == 0 && $_G['uid'] != $post['authorid'] && $_G['forum_thread']['price'] > 0}-->
					<li><a href="javascript:;" onclick="setanswer($post['pid'], '$_GET[from]')" class="dialog bg_f b_b">{lang reward_set_bestanswer}</a></li>
				<!--{/if}-->
                <!--{if $comiis_app_switch['comiis_view_reply'] == 1}-->
                    <!--{if $comiis_app_switch['comiis_view_lcrate'] != 1}-->		
                        <!--{if !$post['first'] && $_G['group']['raterange'] && $post['authorid']}-->
                        <li><a href="forum.php?mod=misc&action=rate&tid=$_G[tid]&pid=$post[pid]" class="dialog bg_f b_b">{$comiis_lang['view50']}</a></li>
                        <!--{/if}-->
                    <!--{/if}-->
                    <!--{if $_G['comiis_new'] > 1 && $comiis_app_switch['comiis_view_dianping'] != 1}-->
                        <!--{if $post['invisible'] == 0 && $allowpostreply && $post['allowcomment'] && (!$thread['closed'] || $_G['forum']['ismoderator'])}-->
                        <li><a href="forum.php?mod=misc&action=comment&tid=$post[tid]&pid=$post[pid]&extra=$_GET[extra]&page=$page{if $_G['forum_thread']['special'] == 127}&special=$specialextra{/if}" class="bg_f b_b dialog">{if $comiis_app_switch['comiis_view_dianping_name']}{$comiis_app_switch['comiis_view_dianping_name']}{else}{$comiis_lang['comments']}{/if}</a></li>
                        <!--{/if}-->
                    <!--{/if}-->
                    <!--{if $comiis_app_switch['comiis_view_quotes'] != 1}-->
                        <li><a href="{if $_G['uid']}forum.php?mod=post&action=reply&fid=$_G[fid]&tid=$_G[tid]&repquote=$post[pid]&page=$page{else}javascript:;{/if}" class="bg_f b_b dialog">{$comiis_lang['reply']}</a></li>
                    <!--{/if}-->
                <!--{/if}-->
				<!--{if $post['authorid'] != $_G['uid']}-->
					<li><a href="misc.php?mod=report&rtype=post&rid=$post[pid]&tid=$_G[tid]&fid=$_G[fid]" class="dialog bg_f b_b">{lang report}</a></li>
				<!--{/if}-->
				<!--{if (($_G['forum']['ismoderator'] && $_G['group']['alloweditpost'] && (!in_array($post['adminid'], array(1, 2, 3)) || $_G['adminid'] <= $post['adminid'])) || ($_G['forum']['alloweditpost'] && $_G['uid'] && ($post['authorid'] == $_G['uid'] && $_G['forum_thread']['closed'] == 0) && !(!$alloweditpost_status && $edittimelimit && TIMESTAMP - $post['dbdateline'] > $edittimelimit)))}-->
				<!--{if $_G['forum']['ismoderator'] && $_G['group']['allowstickreply'] || $_G['forum_thread']['authorid'] == $_G['uid']}-->
					<li><a href="javascript:;" onclick="modaction('stickreply', '$post[pid]')" class="bg_f b_b">{lang modmenu_stickpost}</a></li>
				<!--{/if}-->
				<!--{if (($_G['forum']['ismoderator'] && $_G['group']['alloweditpost'] && (!in_array($post['adminid'], array(1, 2, 3)) || $_G['adminid'] <= $post['adminid'])) || ($_G['forum']['alloweditpost'] && $_G['uid'] && ($post['authorid'] == $_G['uid'] && $_G['forum_thread']['closed'] == 0) && !(!$alloweditpost_status && $edittimelimit && TIMESTAMP - $post['dbdateline'] > $edittimelimit)))}-->

					<li><a href="forum.php?mod=post&action=edit&fid=$_G[fid]&tid=$_G[tid]&pid=$post[pid]{if !empty($_GET[modthreadkey])}&modthreadkey=$_GET[modthreadkey]{/if}&page=$page" class="redirect bg_f b_b">{lang edit}</a></li>
					<!--{if $_G['group']['allowdelpost']}--><li><a href="forum.php?mod=topicadmin&action=delpost&fid={$_G[fid]}&tid={$_G[tid]}&operation=&optgroup=&page=&topiclist[]={$post[pid]}" class="dialog bg_f b_b">{lang modmenu_deletepost}</a></li><!--{/if}-->
					<!--{if $_G['group']['allowbanpost']}--><li><a href="forum.php?mod=topicadmin&action=banpost&fid={$_G[fid]}&tid={$_G[tid]}&operation=&optgroup=&page=&topiclist[]={$post[pid]}" class="dialog bg_f b_b">{lang modmenu_banpost}</a></li><!--{/if}-->
					<!--{if $_G['group']['allowwarnpost']}--><li><a href="forum.php?mod=topicadmin&action=warn&fid={$_G[fid]}&tid={$_G[tid]}&operation=&optgroup=&page=&topiclist[]={$post[pid]}" class="dialog bg_f b_b">{lang modmenu_warn}</a></li><!--{/if}-->	
				<!--{/if}-->	
				<!--{/if}-->
				<li><a href="javascript:;" class="comiis_glclose mt10 bg_f b_t f_g">{lang cancel}</a></li>
			</ul>
		</div>
	<!--{/if}-->
	<!--{if $_G[uid] && $allowpostreply && !$post[first]}-->
	<div id="replybtn_$post[pid]" display="true" style="display:none;">
		<input type="button" href="forum.php?mod=post&action=reply&fid=$_G[fid]&tid=$_G[tid]&repquote=$post[pid]&extra=$_GET[extra]&page=$page" value="{lang reply}">
	</div>
	<!--{/if}-->
</div>
<!--{eval $postcount++;}-->