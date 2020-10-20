<?PHP exit('Access Denied');?>
<!--{if $_GET['inajax']}-->
	<!--{template common/header_ajax}-->
<!--{else}-->
<!--{if $action != 'create'}-->
	<!--{eval $_G['comiis_close_header'] = 1;}-->
<!--{/if}-->
<!--{template common/header}-->
<!--{if $action != 'create'}-->
	<div class="comiis_bigtop_box{if $comiis_app_switch['comiis_group_listhead'] != 2} bg_0{/if}"{if $comiis_app_switch['comiis_group_listhead'] != 2} style="background-image:url({if $_G[forum][banner]}$_G[forum][banner]?{echo time();}{else}template/comiis_app/comiis/img/group_bg.jpg{/if}) !important;background-repeat:no-repeat;background-position:center;background-size:cover !important;"{/if}>
		<div id="comiis_head"{if $comiis_isweixin == 1} class="comiis_head_hidden"{/if}>
			<div class="{if $comiis_app_switch['comiis_group_listhead'] == 2}comiis_head{else}comiis_tmhead comiis_space_head{/if}{if $comiis_app_switch['comiis_group_listhead'] == 2} f_top{else} f_f{/if} cl">
				<div class="header_z"><a href="javascript:;" onclick="history.go(-1);"><i class="comiis_font{if $comiis_app_switch['comiis_group_listhead'] != 2} fyy{/if}">&#xe60d;</i></a></div>
				<h2{if $comiis_app_switch['comiis_group_listhead'] != 2} class="fyy"{/if}>$_G[forum][name]</h2>
				<div class="header_y"><!--{if $comiis_app_switch['comiis_leftnv'] == 1}--><a href="javascript:;" class="comiis_leftnv_top_key"><i class="comiis_font{if $comiis_app_switch['comiis_group_listhead'] != 2} fyy{/if}">&#xe666;</i></a><!--{/if}--><a href="javascript:;" class="comiis_menu_display" id="comiis_menu_gvtr"><i class="comiis_font{if $comiis_app_switch['comiis_group_listhead'] != 2} fyy{/if}">&#xe62b;</i></a><!--{if $comiis_app_switch['comiis_leftnv'] != 1}--><a href="search.php?mod=group"><i class="comiis_font{if $comiis_app_switch['comiis_group_listhead'] != 2} fyy{/if}">&#xe622;</i></a><!--{/if}--></div>
			</div>
		</div>
		<!--{if $comiis_isweixin != 1 || $comiis_app_switch['comiis_group_listhead'] == 0}-->
		<div style="height:48px;"></div>
		<!--{/if}-->
		<!--{if $comiis_app_switch['comiis_group_listhead'] == 1}-->
            <div class="comiis_forumlist_heads comiis_forumlist_headv3{if $comiis_app_switch['comiis_svg'] == 1} comiis_svg_no{/if} cl">	
                <!--{if $status != 2 && $status != 3 && $status != 5}-->
                    <!--{if helper_access::check_module('group') && $status != 'isgroupuser'}-->
                        <a href="{if $_G['uid']}forum.php?mod=group&action=join&fid=$_G[fid]&handlekey=comiis_group_handle{elseif !$_G[connectguest]}javascript:popup.open('{$comiis_lang['tip16']}', 'confirm', 'member.php?mod=logging&action=login');{else}javascript:popup.open('{$comiis_lang['reg23']}', 'confirm', 'member.php?mod=connect');{/if}" class="{if $_G['uid']}dialog {/if}comiis_sendbtn outbg f_f fyy">+ {$comiis_lang['view18']}</a>
                    <!--{/if}-->
                <!--{/if}-->
                <!--{if $status == 2 && helper_access::check_module('group')}-->
                    <a href="{if $_G['uid']}forum.php?mod=group&action=join&fid=$_G[fid]&handlekey=comiis_group_handle{elseif !$_G[connectguest]}javascript:popup.open('{$comiis_lang['tip16']}', 'confirm', 'member.php?mod=logging&action=login');{else}javascript:popup.open('{$comiis_lang['reg23']}', 'confirm', 'member.php?mod=connect');{/if}" class="{if $_G['uid']}dialog {/if}comiis_sendbtn outbg f_f fyy">+ {$comiis_lang['view18']}</a>
                <!--{/if}-->
                <!--{if $status == 'isgroupuser'}-->
                    <button type="button" onclick="popup.open($('#comiis_group_out'))" class="comiis_sendbtn outbg f_f fyy"><i class="comiis_font">&#xe61c</i> {$comiis_group_lang['013']}</button>
                <!--{/if}-->
                <!--{if $status == 3 || $status == 5}--><button class="comiis_sendbtn outbg f_f fyy">{$comiis_lang['tip21']}</button><!--{/if}-->
                <div class="top_left f_f">
                    <div class="top_ico bg_f"><!--{if $_G[forum][icon]}--><img src="$_G[forum][icon]" alt="$_G[forum][name]"class="vm" /><!--{else}--><span class="bg_b f_d"><i class="comiis_font">&#xe627;</i>nopic</span><!--{/if}--></div>
                    <h2 class="fyy">$_G[forum][name]</h2>		
                    <p class="fyy">{lang member}$_G[forum][membernum]<span class="comiis_tm">&nbsp;&nbsp;/&nbsp;&nbsp;</span>{lang posts}$_G[forum][posts]<span class="comiis_tm">&nbsp;&nbsp;/&nbsp;&nbsp;</span>{lang group_member_rank}$groupcache[ranking][data][today]</p>
                </div>
                <!--{if $comiis_app_switch['comiis_svg'] != 1}--><div class="comiis_svg_box"><div class="comiis_svg_a"></div><div class="comiis_svg_b"></div></div><!--{/if}-->
            </div>
        <!--{elseif $comiis_app_switch['comiis_group_listhead'] == 2}-->
            <div class="comiis_forumlist_head bg_f{if !$_G[forum][banner] && !$_G['forum']['description']} b_b{/if} cl">
                <div class="top_show"><a href="javascript:;" onclick="comiis_group_des_showhide()" id="comiis_group_des_showhide"><i class="comiis_font f_d">&#xe621</i></a></div>
                <div class="top_btn">
                    <!--{if $status != 2 && $status != 3 && $status != 5}-->
                        <!--{if helper_access::check_module('group') && $status != 'isgroupuser'}-->
                            <a href="{if $_G['uid']}forum.php?mod=group&action=join&fid=$_G[fid]&handlekey=comiis_group_handle{elseif !$_G[connectguest]}javascript:popup.open('{$comiis_lang['tip16']}', 'confirm', 'member.php?mod=logging&action=login');{else}javascript:popup.open('{$comiis_lang['reg23']}', 'confirm', 'member.php?mod=connect');{/if}" class="{if $_G['uid']}dialog {/if}bg_c f_f comiis_forum_fav">+ {$comiis_lang['view18']}</a>
                        <!--{/if}-->
                    <!--{/if}-->
                    <!--{if $status == 2 && helper_access::check_module('group')}-->
                        <a href="{if $_G['uid']}forum.php?mod=group&action=join&fid=$_G[fid]&handlekey=comiis_group_handle{elseif !$_G[connectguest]}javascript:popup.open('{$comiis_lang['tip16']}', 'confirm', 'member.php?mod=logging&action=login');{else}javascript:popup.open('{$comiis_lang['reg23']}', 'confirm', 'member.php?mod=connect');{/if}" class="{if $_G['uid']}dialog {/if}bg_c f_f comiis_forum_fav">+ {$comiis_lang['view18']}</a>
                    <!--{/if}-->
                    <!--{if $status == 'isgroupuser'}-->
                        <a href="javascript:;" onclick="popup.open($('#comiis_group_out'))" class="bg_b f_d comiis_forum_fav"><i class="comiis_font">&#xe61c</i> {$comiis_group_lang['013']}</a>
                    <!--{/if}-->
                    <!--{if $status == 3 || $status == 5}--><a href="javascript:;" class="bg_b f_d comiis_forum_fav">{$comiis_lang['tip21']}</a><!--{/if}-->
                </div>
                <div class="top_left">
                    <div class="top_ico"><!--{if $_G[forum][icon]}--><img src="$_G[forum][icon]" alt="$_G[forum][name]" class="vm" /><!--{else}--><span class="bg_b f_d"><i class="comiis_font">&#xe627;</i>nopic</span><!--{/if}--></div>
                    <h2 class="f_ok">$_G[forum][name]</h2>
                    <p class="f_c">{lang member}$_G[forum][membernum]<span class="comiis_tm">&nbsp;&nbsp;/&nbsp;&nbsp;</span>{lang posts}$_G[forum][posts]<span class="comiis_tm">&nbsp;&nbsp;/&nbsp;&nbsp;</span>{lang group_member_rank}$groupcache[ranking][data][today]</p>
                </div>
            </div>
            <!--{if $_G[forum][banner] || $_G['forum']['description']}-->
				<div class="comiis_group_des_box">
					<div class="comiis_group_des bg_f b_b f_b cl">
						<div class="comiis_group_img"><img src="<!--{if $_G[forum][banner]}-->$_G[forum][banner]?{echo time();}<!--{else}-->template/comiis_app/comiis/img/group_bg1.jpg<!--{/if}-->" alt="$_G[forum][name]" class="vm" /></div>
						<!--{if $_G['forum']['description']}-->$_G['forum']['description']<!--{/if}-->
					</div>
                </div>
            <!--{/if}-->
            <script>
            function comiis_group_des_showhide(){
				$('#comiis_group_des_showhide i').html($('.comiis_group_des_box').is(':hidden') ? '&#xe621;' : '&#xe620;');
				$('.comiis_group_des_box').slideToggle(400);
            }
            </script>
        <!--{else}-->
            <div class="comiis_bigtop_info f_f">
                <div class="bigtop_ico"><img {if $comiis_app_switch['comiis_loadimg']}src="./template/comiis_app/pic/none.png" comiis_loadimages={else}src={/if}"$_G[forum][icon]" alt="$_G[forum][name]"{if $comiis_app_switch['comiis_loadimg']} class="comiis_loadimages"{/if} /></div>
                <h2 class="fyy">$_G[forum][name]</h2>
                <p class="bigtop_txt fyy">{lang member}$_G[forum][membernum]<span class="comiis_tm">/</span>{lang posts}$_G[forum][posts]<span class="comiis_tm">/</span>{lang group_member_rank}$groupcache[ranking][data][today]</p>
                <!--{if $status == 3 || $status == 5}--><p class="bigtop_txt fyy">{lang group_has_joined}</p><!--{/if}-->
                <p class="bigtop_btn">
                  <!--{if $status != 2 && $status != 3 && $status != 5}-->
                    <!--{if helper_access::check_module('group') && $status != 'isgroupuser'}-->
                      <button type="button" href='forum.php?mod=group&action=join&fid=$_G[fid]&handlekey=comiis_group_handle' class="dialog comiis_sendbtn outbg f_f fyy" comiis='handle'>{$comiis_lang['view18']}{$comiis_group_lang['001']}</button>
                    <!--{/if}-->
                  <!--{/if}-->
                <!--{if $status == 2 && helper_access::check_module('group')}-->
                     <button type="button" href='forum.php?mod=group&action=join&fid=$_G[fid]&handlekey=comiis_group_handle' class="dialog comiis_sendbtn outbg f_f fyy" comiis='handle'>{$comiis_lang['view18']}{$comiis_group_lang['001']}</button>
                <!--{/if}-->
                  <!--{if $status == 'isgroupuser'}--><button type="button" onclick="popup.open($('#comiis_group_out'))" class="comiis_sendbtn outbg f_f fyy">{$comiis_group_lang['013']}{$comiis_group_lang['001']}</button><!--{/if}-->
                </p>
            </div>
            <!--{if $comiis_app_switch['comiis_svg'] != 1}--><div class="comiis_svg_box"><div class="comiis_svg_a"></div><div class="comiis_svg_b"></div></div><!--{/if}-->
        <!--{/if}-->
	</div>
    <div class="comiis_memu_y bg_f f_b" id="comiis_menu_gvtr_menu"  style="display:none;">
        <ul>		
            <li><a href="javascript:;" class="b_b comiis_share_key"><i class="comiis_font">&#xe61f;</i>{$comiis_lang['all1']}</a></li>
            <!--{if $_G[uid]}--><li><a href="{if $_G['uid']}home.php?mod=spacecp&ac=favorite&type=group&id=$_G[fid]&formhash={FORMHASH}&handlekey=forum_fav{elseif !$_G[connectguest]}javascript:popup.open('{$comiis_lang['tip16']}', 'confirm', 'member.php?mod=logging&action=login');{else}javascript:popup.open('{$comiis_lang['reg23']}', 'confirm', 'member.php?mod=connect');{/if}" class="{if $_G['uid']}dialog{/if} b_b" comiis="handle"><i class="comiis_font">&#xe617;</i>{lang favorite}</a></li><!--{/if}-->
            <li><a href="group.php?mod=index" class="b_b"><i class="comiis_font">&#xe657;</i>{$comiis_group_lang['044']}{$comiis_group_lang['001']}</a></li>
            <li><a href="{if $_G['uid']}misc.php?mod=report&url={$_G[currenturl_encode]}{elseif !$_G[connectguest]}javascript:popup.open('{$comiis_lang['tip16']}', 'confirm', 'member.php?mod=logging&action=login');{else}javascript:popup.open('{$comiis_lang['reg23']}', 'confirm', 'member.php?mod=connect');{/if}"{if $_G['uid']} class="dialog"{/if}><i class="comiis_font">&#xe636;</i>{$comiis_lang['all2']}</a></li>
        </ul>
    </div>
    <div class="comiis_share_box bg_e b_t comiis_showleftbox">
        <div id="comiis_share" class="bdsharebuttonbox"></div>
        <h2 class="bg_f f_g b_t comiis_share_box_close"><a href="javascript:;">{lang cancel}</a></h2>
    </div>
    <div class="comiis_share_tip"></div>
    <script src="template/comiis_app/comiis/js/comiis_nativeShare.js"></script>
    <script>
    var share_obj = new nativeShare('comiis_share', {
        img:'{$_G['siteurl']}{$_G[forum][icon]}',
        url:'{$_G['siteurl']}forum.php?mod=forumdisplay&fid={$_G['fid']}&action=list',
        title:'{$comiis_group_lang['045']}{$_G[forum][name]}',
        desc:'{echo str_replace(array("\r\n", "\r", "\n", "'", "'"), '', strip_tags($_G[forum]['description']));}',
        from:'{$_G['setting']['bbname']}'
    });
    </script>
<!--{/if}-->
	<!--{if $action != 'manage' && $action == 'list' && $comiis_app_switch['comiis_group_listhead'] != 2}-->
	<div class="comiis_top_postbtn bg_f b_b f_c cl">
    <!--{if $comiis_app_switch['comiis_post_yindao'] == 1 && $_G['group']['allowpost'] && ($_G['group']['allowposttrade'] || $_G['group']['allowpostpoll'] || $_G['group']['allowpostreward'] || $_G['group']['allowpostactivity'] || $_G['group']['allowpostdebate'] || $_G['setting']['threadplugins'] || $_G['forum']['threadsorts'])}-->
	  <a href="{if $_G['uid']}#comiis_post_type{elseif !$_G[connectguest]}javascript:popup.open('{$comiis_lang['tip16']}', 'confirm', 'member.php?mod=logging&action=login');{else}javascript:popup.open('{$comiis_lang['reg23']}', 'confirm', 'member.php?mod=connect');{/if}" title="{lang send_threads}" class="postbtn_box{if $_G['uid']} popup{/if}">
	  <i class="comiis_font f_d y b_l">&#xe642;</i>
	  <span class="top_postbtn_tximg bg_e"><!--{avatar($_G[uid],small)}--></span>
	  <i class="comiis_font f_d">&#xe655;</i> {$comiis_group_lang['025']}
	  </a>
    <!--{else}-->
	  <a href="{if $_G['uid']}forum.php?mod=post&action=newthread&fid=$_G[fid]{elseif !$_G[connectguest]}javascript:popup.open('{$comiis_lang['tip16']}', 'confirm', 'member.php?mod=logging&action=login');{else}javascript:popup.open('{$comiis_lang['reg23']}', 'confirm', 'member.php?mod=connect');{/if}" title="{lang send_threads}" class="postbtn_box">
	  <i class="comiis_font f_d y b_l">&#xe642;</i>
	  <span class="top_postbtn_tximg bg_e"><!--{avatar($_G[uid],small)}--></span>
	  <i class="comiis_font f_d">&#xe655;</i> {$comiis_group_lang['025']}
	  </a>
    <!--{/if}-->
	</div> 
	<!--{/if}-->
	<!--{if $action == 'list'}--><div class="mt10"></div><!--{/if}-->
	<!--{if $action != 'manage' && $action != 'create' && $status != 2 && $status != 3 && $status != 5}-->
	<!--{if $comiis_app_switch['comiis_subnv_top'] != 1}--><div style="height:41px;"><div class="comiis_scrollTop_box"><!--{/if}-->
	<div class="comiis_topnv bg_f b_b">
	  <ul class="comiis_flex">
		<li class="flex{if $action == 'list'} f_0{/if}">{if $action == 'list'}<em class="bg_0"></em>{/if}<a href="forum.php?mod=forumdisplay&action=list&fid=$_G[fid]"{if $action != 'list'} class="f_c"{/if}>{$comiis_group_lang['014']}</a></li>
		<li class="flex{if $action == 'memberlist' || $action == 'invite'} f_0{/if}">{if $action == 'memberlist' || $action == 'invite'}<em class="bg_0"></em>{/if}<a href="forum.php?mod=group&action=memberlist&fid=$_G[fid]"{if $action != 'memberlist' || $action != 'invite'} class="f_c"{/if}>{$comiis_group_lang['015']}</a></li>
		<!--{if $status == 'isgroupuser' && helper_access::check_module('group')}-->
        <li class="flex{if $action == 'invite'} f_0{/if}">{if $action == 'invite'}<em class="bg_0"></em>{/if}<a href="misc.php?mod=invite&action=group&id=$_G[fid]"{if $action != 'invite'} class="f_c"{/if}>{$comiis_group_lang['036']}</a>
        <!--{/if}-->
		<!--{if $_G['forum']['ismoderator']}--><li class="flex{if $action == 'manage'} f_0{/if}">{if $action == 'manage'}<em class="bg_0"></em>{/if}<a href="forum.php?mod=group&action=manage&fid=$_G[fid]"{if $action != 'manage'} class="f_c"{/if}>{$comiis_group_lang['007']}</a></li><!--{/if}-->
	  </ul>
	</div>
	<!--{if $comiis_app_switch['comiis_subnv_top'] != 1}--></div></div><!--{/if}-->
	<!--{/if}-->
<!--{/if}-->
	<!--{if $action == 'index'}-->
	  <!--{if $status == 2 || $status == 3 || $status == 5}-->
        <div class="comiis_notip comiis_sofa bg_f b_b cl">
            <i class="comiis_font f_d cl">&#xe613;</i>
            <span class="f_d">{$comiis_lang['tip251']}{$comiis_group_lang['001']}{$comiis_lang['tip252']}</span>
        </div>
	  <!--{elseif $status != 2 && $status != 3}-->
		<!--{subtemplate group/group_index}-->
	  <!--{/if}-->
	<!--{elseif $action == 'list'}-->
	  <!--{subtemplate group/group_list}-->
      {eval $comiis_app_wx_share['desc'] = str_replace(array("\r\n", "\r", "\n", "'", "'"), '',$_G['forum']['description']);}
	<!--{elseif $action == 'memberlist'}-->
	  <!--{subtemplate group/group_memberlist}-->
	<!--{elseif $action == 'create'}-->
	  <!--{subtemplate group/group_create}-->
	<!--{elseif $action == 'manage'}-->
	  <!--{subtemplate group/group_manage}-->
	<!--{/if}-->
<!--{if $_GET['inajax']}-->
	<!--{template common/footer_ajax}-->
<!--{else}-->
    <!--{eval comiis_load('nR86rxXmDmMdFj8BUx', 'status,comiis_group_lang');}-->
	<!--{template forum/comiis_post_type}-->	
	<!--{template common/footer}-->
<!--{/if}-->