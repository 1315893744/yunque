<?php echo '';exit;?>
<!--{eval $avatars = avatar($_G[uid],'middle',true);$header_left = '<a '.($comiis_app_switch['comiis_leftnv'] == 1 || $comiis_app_switch['comiis_leftnv'] == 2 ? ($_G['uid'] ? 'href="home.php?mod=space&do=profile&mycenter=1"' : 'href="member.php?mod=logging&action=login"') : 'href="javascript:;" onclick="comiis_leftnv();"').(' class="kmuser"><i class="comiis_font">&#xe675;</i><em><img src="'.$avatars.'?'.time().'">'.((empty($_G['cookie']['ignore_notice']) && ($_G[member][newpm] || $_G[member][newprompt_num][follower] || $_G[member][newprompt_num][follow] || $_G[member][newprompt])) ? '<span class="icon_msgs bg_del"></span>' : '').'</em></a>');}-->
<!--{if $_G['basescript'] == 'member' && CURMODULE == 'logging'}-->
	<!--{eval 
	$comiis_head = array(
		'left' => '',
		'center' => '{lang login}',
		'right' => '',	
	);}-->
<!--{elseif $_G['basescript'] == 'member' && CURMODULE == 'register'}-->
	<!--{eval 
	$comiis_head = array(
		'left' => '',
		'center' => '{lang register}',
		'right' => '',	
	);}-->
<!--{elseif $_G['basescript'] == 'member' && $_GET['mod'] == 'getpasswd'}-->
	<!--{eval 
	$comiis_head = array(
		'left' => '',
		'center' => $comiis_app_switch['comiis_reg_zmtxt'],
		'right' => '',	
	);}-->
<!--{elseif $_G['basescript'] == 'member' && $_GET['mod'] == 'connect'}-->
	<!--{eval 
	$comiis_head = array(
		'left' => '',
		'center' => $comiis_lang['reg14'],
		'right' => '',	
	);}-->
<!--{elseif $_G['basescript'] == 'misc' && $_GET['mod'] == 'ranklist' && ($_GET['type'] == 'thread' || $_GET['type'] == 'forum')}-->
	<!--{eval 
	$comiis_bg = 1;
	$comiis_head = array(
		'left' => '',
		'center' => $comiis_lang['tip314'],
		'right' => '<a href="search.php?mod=forum"><i class="comiis_font">&#xe622;</i></a>',	
	);}-->
<!--{elseif $_G['basescript'] == 'misc' && $_GET['mod'] == 'ranklist' && $_GET['type'] == 'member'}-->
	<!--{eval 
	$comiis_bg = 1;
	$comiis_head = array(
		'left' => '',
		'center' => $comiis_lang['tip314'],
		'right' => '<a href="/home.php?mod=spacecp&ac=search&op=sex"><i class="comiis_font">&#xe622;</i></a>',	
	);}-->
<!--{elseif $_G['basescript'] == 'misc' && $_GET['mod'] == 'ranklist'}-->
	<!--{eval 
	$comiis_bg = 1;
	$comiis_head = array(
		'left' => '',
		'center' => $comiis_lang['tip314'],
		'right' => '',	
	);}-->
<!--{elseif ($_G['basescript'] == 'forum' || $_G['basescript'] == 'group') && CURMODULE == 'guide' && $_GET['index'] == 1}-->
	<!--{eval 
	$comiis_head = array(
		'left' => '',
		'center' => $comiis_lang['tip323'],
		'right' => '<a href="search.php?mod=forum"><i class="comiis_font">&#xe622;</i></a>',
	);}-->

<!--{elseif $_G['basescript'] == 'forum' && CURMODULE == 'index'}-->
	<!--{eval 
	$comiis_head = array(
		'left' => $header_left,
		'center' => ($comiis_app_switch['comiis_bbsxname'] ? $comiis_app_switch['comiis_bbsxname'] : $comiis_lang['all0']),
		'right' => '<a href="search.php?mod=forum"><i class="comiis_font">&#xe622;</i></a>',
	);}-->
<!--{elseif $_G['basescript'] == 'forum' && CURMODULE == 'forumdisplay'}-->
	<!--{eval 
	$comiis_head = array(
		'left' => '',		
		'center' => $comiis_app_switch['comiis_list_gosx']==1 ? (strip_tags($_G['forum']['name']) ? strip_tags($_G['forum']['name']) : $_G['forum']['name']) : ('<a href="javascript:comiis_fmenu(\'#comiis_listmore\');">'.(strip_tags($_G['forum']['name']) ? strip_tags($_G['forum']['name']) : $_G['forum']['name']).(!$subforumonly ? '<i class="comiis_font kmxiao">&#xe620;</i>' : '').'</a>'),
		'right' => ($subforumonly ? '' : (($comiis_app_switch['comiis_post_yindao'] == 1 && $_G['group']['allowpost'] && ($_G['group']['allowposttrade'] || $_G['group']['allowpostpoll'] || $_G['group']['allowpostreward'] || $_G['group']['allowpostactivity'] || $_G['group']['allowpostdebate'] || $_G['setting']['threadplugins'] || $_G['forum']['threadsorts'])) ? ('<a href="'.((!$_G['uid'] && !((!$_G['forum']['postperm'] && $_G['group']['allowpost']) || ($_G['forum']['postperm'] && forumperm($_G['forum']['postperm'])))) ? (!$_G[connectguest] ? 'javascript:popup.open(\''.$comiis_lang['tip16'].'\', \'confirm\', \'member.php?mod=logging&action=login\');' : 'javascript:popup.open(\''.$comiis_lang['reg23'].'\', \'confirm\', \'member.php?mod=connect\');') : '#comiis_post_type').'" title="{lang send_threads}"'.($_G['uid'] ? ' class="popup"' : '').'><i class="comiis_font">&#xe62d;</i></a>') : ('<a href="'.((!$_G['uid'] && !((!$_G['forum']['postperm'] && $_G['group']['allowpost']) || ($_G['forum']['postperm'] && forumperm($_G['forum']['postperm'])))) ? (!$_G[connectguest] ? 'javascript:popup.open(\''.$comiis_lang['tip16'].'\', \'confirm\', \'member.php?mod=logging&action=login\');' : 'javascript:popup.open(\''.$comiis_lang['reg23'].'\', \'confirm\', \'member.php?mod=connect\');') : 'forum.php?mod=post&action=newthread&fid='.$_G[fid]).'" title="{lang send_threads}"><i class="comiis_font">&#xe62d;</i></a>'))).($comiis_app_switch['comiis_leftnv'] != 1 ? '<a href="search.php?mod=forum"><i class="comiis_font">&#xe622;</i></a>' : ''),
	);}-->
<!--{elseif ($_G['basescript'] == 'forum' || $_G['basescript'] == 'group') && CURMODULE == 'viewthread' && $_GET['do']=='tradeinfo'}-->
	<!--{eval 
	$comiis_head = array(
		'left' => '',
		'center' => $comiis_lang['tip74'],
		'right' => ' ',	
	);}-->
<!--{elseif ($_G['basescript'] == 'forum' || $_G['basescript'] == 'group') && CURMODULE == 'trade' && $_GET['orderid']}-->
	<!--{eval 
	$comiis_head = array(
		'left' => '',
		'center' => $comiis_lang['view61'],
		'right' => ' ',	
	);}-->
<!--{elseif ($_G['basescript'] == 'forum' || $_G['basescript'] == 'group') && CURMODULE == 'trade'}-->
	<!--{eval 
	$comiis_head = array(
		'left' => '',
		'center' => $comiis_lang['view62'],
		'right' => ' ',	
	);}-->
<!--{elseif $_G['basescript'] == 'group' && $_GET['action']=='create'}-->
	<!--{eval 
	$comiis_head = array(
		'left' => '',
		'center' => $comiis_group_lang['004'].$comiis_group_lang['001'],
		'right' => ' ',	
	);}-->
<!--{elseif $_G['basescript'] == 'group' && CURMODULE == 'index'}-->
	<!--{eval 
	$comiis_head = array(
		'left' => $header_left,
		'center' => $comiis_group_lang['001'],
		'right' => '<a href="'.($_G['uid'] ? 'forum.php?mod=group&action=create' : (!$_G[connectguest] ? 'javascript:popup.open(\''.$comiis_lang['tip16'].'\', \'confirm\', \'member.php?mod=logging&action=login\');' : 'javascript:popup.open(\''.$comiis_lang['reg23'].'\', \'confirm\', \'member.php?mod=connect\');')).'" class="kmtxt">'.($comiis_app_switch['comiis_leftnv'] != 1 ? '+ '.$comiis_group_lang['033'] : '<i class="comiis_font">&#xe62d;</i>').'</a>',
	);}-->
<!--{elseif $_G['basescript'] == 'group' && CURMODULE == 'my'}-->
	<!--{eval 
	$comiis_head = array(
		'left' => '',
		'center' => $comiis_group_lang['001'],
		'right' => '<a href="'.($_G['uid'] ? 'forum.php?mod=group&action=create' : (!$_G[connectguest] ? 'javascript:popup.open(\''.$comiis_lang['tip16'].'\', \'confirm\', \'member.php?mod=logging&action=login\');' : 'javascript:popup.open(\''.$comiis_lang['reg23'].'\', \'confirm\', \'member.php?mod=connect\');')).'" class="kmtxt">'.($comiis_app_switch['comiis_leftnv'] != 1 ? '+ '.$comiis_group_lang['033'] : '<i class="comiis_font">&#xe62d;</i>').'</a>',
	);}-->
<!--{elseif ($_G['basescript'] == 'forum' || $_G['basescript'] == 'group') && CURMODULE == 'viewthread'}-->
<!--{block comiis_right}-->
	<a href="javascript:;" class="comiis_menu_display" id="comiis_menu_vtr"><i class="comiis_font">&#xe62b;</i></a>
	<!--{if $comiis_app_switch['comiis_leftnv'] != 1}-->
        <!--{if (($_G['forum']['ismoderator'] || $_G['group']['alloweditpost']) || ($_G['forum']['alloweditpost'] && $_G['uid'] && ($_G['forum_thread']['authorid'] == $_G['uid'] && $_G['forum_thread']['closed'] == 0) && !(!$alloweditpost_status && $edittimelimit && TIMESTAMP - $_G['forum_thread']['dateline'] > $edittimelimit)))}-->
            <!--{loop $postlist $posts}-->
                <!--{if $posts[first]}-->
                    <span href="#moption_$posts[pid]" class="popup"><i class="comiis_font">&#xe63e;</i></span>
                <!--{/if}-->
            <!--{/loop}-->
        <!--{/if}-->
	<!--{/if}-->			
<!--{/block}-->
<!--{eval $comiis_head = array(
	'left' => '',
	'center' => '<a href="forum.php?mod=forumdisplay&fid='.$_G['forum']['fid'].'">'.($comiis_app_switch['comiis_bbsvtname'] ? $comiis_app_switch['comiis_bbsvtname'] : strip_tags($_G['forum']['name'])).'</a>',
	'right' => $comiis_right,
);}-->	
<!--{elseif ($_G['basescript'] == 'forum' || $_G['basescript'] == 'group') && CURMODULE == 'post'}-->
	<!--{eval 
	$comiis_head = array(
		'left' => '',
		'center' => $_GET[action] == 'edit' ? '{lang edit}' : ($_GET[action] == 'reply' ? $comiis_lang['reply'] : '{lang send_threads}'),
		'right' => ' ',
	);}-->
<!--{elseif $_G['basescript'] == 'search'}-->
	<!--{eval
	$comiis_head = array(
		'left' => '',
		'center' => '{lang search}',
		'right' => ' ',
	);}-->
<!--{elseif $_G['basescript'] == 'portal' && CURMODULE == 'list'}-->
	<!--{eval $comiis_head = array(
		'left' => '',
		'center' => $cat[catname],
		'right' => ((($_G['group']['allowpostarticle'] || $_G['group']['allowmanagearticle'] || $categoryperm[$catid]['allowmanage'] || $categoryperm[$catid]['allowpublish']) && empty($cat['disallowpublish'])) ? '<a href="portal.php?mod=portalcp&ac=article&catid='.$cat[catid].'"><i class="comiis_font">&#xe62d;</i></a>' : '').($comiis_app_switch['comiis_leftnv'] != 1 ? '<a href="search.php?mod=portal"><i class="comiis_font">&#xe622;</i></a>' : ''),
	);}-->
<!--{elseif $_G['basescript'] == 'portal' && CURMODULE == 'view'}-->
	<!--{eval 
	$comiis_bg = 1;
	$comiis_head = array(
		'left' => '',
		'center' => '<a href="'.getportalcategoryurl($cat[catid]).'">'.($comiis_app_switch['comiis_portal_vtname'] ? $comiis_app_switch['comiis_portal_vtname'] : strip_tags($cat[catname])).'</a>',
		'right' => '<a href="javascript:;" class="comiis_menu_display" id="comiis_menu_wzvtr"><i class="comiis_font">&#xe62b;</i></a>'.(($_G['group']['allowmanagearticle'] || ($_G['group']['allowpostarticle'] && $article['uid'] == $_G['uid'] && (empty($_G['group']['allowpostarticlemod']) || $_G['group']['allowpostarticlemod'] && $article['status'] == 1)) || $categoryperm[$value['catid']]['allowmanage']) && $comiis_app_switch['comiis_leftnv'] != 1 ? '<span href="#moption" class="popup"><i class="comiis_font">&#xe63e;</i></span>' :''),	
	);}-->
<!--{elseif $_G['basescript'] == 'portal' && CURMODULE == 'comment'}-->
	<!--{eval 
	$comiis_head = array(
		'left' => '',
		'center' => '{lang all}'.$comiis_lang['all53'],
		'right' => ' ',	
	);}-->
<!--{elseif $_G['basescript'] == 'portal' && CURMODULE == 'portalcp' && $_GET['ac']=='article'}-->
	<!--{eval 
	$comiis_head = array(
		'left' => '',
		'center' => !empty($aid) ? $comiis_lang['post19'] : $comiis_lang['post18'],
		'right' => ' ',	
	);}-->
<!--{elseif ($_G['basescript'] == 'forum' || $_G['basescript'] == 'group') && CURMODULE == 'misc' && $_GET['action']=='viewpayments'}-->
	<!--{eval 
	$comiis_head = array(
		'left' => '',
		'center' => $comiis_lang['view46'],
		'right' => ' ',	
	);}-->
<!--{elseif $_G['basescript'] == 'home' && CURMODULE == 'medal'}-->
	<!--{eval 
	$comiis_bg = 1;
	$comiis_head = array(
		'left' => '',
		'center' => $comiis_lang['tip319'],
		'right' => '',	
	);}-->
<!--{elseif $_G['basescript'] == 'home' && CURMODULE == 'spacecp' && $_GET['ac']=='profile'}-->
	<!--{eval
	$comiis_head = array(
		'left' => '',
		'center' => $comiis_lang['post16'],
		'right' => ' ',
	);}-->
<!--{elseif $_G['basescript'] == 'home' && CURMODULE == 'spacecp' && $_GET['ac']=='invite'}-->
	<!--{eval
	$comiis_bg = 1;
	$comiis_head = array(
		'left' => '',
		'center' => '{lang invite_friend}',
		'right' => ' ',
	);}-->
<!--{elseif $_G['basescript'] == 'home' && CURMODULE == 'spacecp' && $_GET['ac']=='promotion'}-->
	<!--{eval
	$comiis_head = array(
		'left' => '',
		'center' => $comiis_lang['tip280'],
		'right' => ' ',
	);}-->
<!--{elseif $_G['basescript'] == 'home' && CURMODULE == 'spacecp' && $_GET['ac']=='poke'}-->
	<!--{eval
	$comiis_head = array(
		'left' => '',
		'center' => $comiis_lang['post38'],
		'right' => ' ',
	);}-->
<!--{elseif $_G['basescript'] == 'home' && CURMODULE == 'spacecp' && $_GET['ac']=='usergroup'}-->
	<!--{eval
	$comiis_bg = 1;
	$comiis_head = array(
		'left' => '',
		'center' => $_G['comiis_homegid'] != 0 ? $comiis_lang['tip262'].$comiis_lang['tip267'] : $comiis_lang['all58'].$comiis_lang['tip262'],
		'right' => ' ',
	);}-->
<!--{elseif $_G['basescript'] == 'home' && CURMODULE == 'spacecp' && $_GET['ac']=='search'}-->
	<!--{eval
	$comiis_head = array(
		'left' => '',
		'center' => $comiis_lang['tip338'],
		'right' => '<a href="home.php?mod=space&do=friend"><i class="comiis_font">&#xe629;</i></a>',
	);}-->
<!--{elseif $_G['basescript'] == 'home' && CURMODULE == 'space' && $_GET['do']=='thread'}-->
	<!--{eval 
	$comiis_head = array(
		'left' => '',
		'center' => '{lang mythread}',
		'right' => ' ',
	);}-->
<!--{elseif $_G['basescript'] == 'home' && CURMODULE == 'follow' && $_GET['do']=='following'}-->
	<!--{eval 
	$comiis_head = array(
		'left' => '',
		'center' => $comiis_lang['all58'].$comiis_lang['all59'],
		'right' => '<a href="/home.php?mod=spacecp&ac=search&op=sex"><i class="comiis_font">&#xe622;</i></a>',	
	);}-->
<!--{elseif $_G['basescript'] == 'home' && CURMODULE == 'follow' && $_GET['do']=='follower'}-->
	<!--{eval 
	$comiis_head = array(
		'left' => '',
		'center' => $comiis_lang['all58'].$comiis_lang['all59'],
		'right' => '<a href="/home.php?mod=spacecp&ac=search&op=sex"><i class="comiis_font">&#xe622;</i></a>',	
	);}-->
<!--{elseif $_G['basescript'] == 'home' && CURMODULE == 'space' && $_GET['do']=='friend' && $_GET['type'] == 'near'}-->
	<!--{eval 
	$comiis_head = array(
		'left' => '',
		'center' => $comiis_lang['tip337'],
		'right' => '<a href="home.php?mod=space&do=friend"><i class="comiis_font">&#xe629;</i></a>',	
	);}-->
<!--{elseif $_G['basescript'] == 'home' && CURMODULE == 'space' && $_GET['do']=='friend'}-->
	<!--{eval 
	$comiis_head = array(
		'left' => '',
		'center' => $comiis_lang['all58'].$comiis_lang['all59'],
		'right' => '<a href="/home.php?mod=spacecp&ac=search&op=sex"><i class="comiis_font">&#xe622;</i></a>',	
	);}-->
<!--{elseif $_G['basescript'] == 'home' && CURMODULE == 'spacecp' && $_GET['op']=='request'}-->
	<!--{eval 
	$comiis_head = array(
		'left' => '',
		'center' => $comiis_lang['all38'],
		'right' => '<a href="/home.php?mod=spacecp&ac=search&op=sex"><i class="comiis_font">&#xe622;</i></a>',	
	);}-->
<!--{elseif $_G['basescript'] == 'home' && CURMODULE == 'space' && $_GET['do']=='favorite'}-->
	<!--{eval 
	$comiis_head = array(
		'left' => '',
		'center' => '{lang myfavorite}',
		'right' => ' ',	
	);}-->
<!--{elseif $_G['basescript'] == 'home' && CURMODULE == 'task'}-->
	<!--{eval 
	$comiis_bg = 1;
	$comiis_head = array(
		'left' => '',
		'center' => $comiis_lang['tip271'],
		'right' => ' ',
	);}-->
<!--{elseif $_G['basescript'] == 'home' && CURMODULE == 'space' && $_GET['do']=='pm'}-->
	<!--{if in_array($filter, array('privatepm','announcepm')) || in_array($_GET[subop], array('view'))}-->
		<!--{if in_array($filter, array('privatepm','announcepm'))}-->
		<!--{eval 
		$comiis_head = array(
			'left' => '',
			'center' => '{lang pm_center}',
			'right' => '<a href="home.php?mod=spacecp&ac=pm"><i class="comiis_font">&#xe62d;</i></a>',
		);}-->
		<!--{elseif in_array($_GET[subop], array('view'))}-->	
		<!--{eval $comiis_head = array(
			'left' => '',
			'center' => $_GET['viewall'] == 1 ? '{lang viewmypm}' : $tousername.' <font class="f14">('.($online ? $comiis_lang['online'] : $comiis_lang['offline']).')</font>',
			'right' => $_GET['viewall'] != 1 ? '<a href="home.php?mod=space&do=pm&subop=view&touid='.$_GET['touid'].'&viewall=1"><i class="comiis_font">&#xe62a;</i></a>' : ' ',
		);}-->
		<!--{/if}-->	
	<!--{elseif $_GET['subop'] == 'viewg'}-->
		<!--{eval 
		$comiis_head = array(
			'left' => '',
			'center' => $comiis_lang['all45'],
			'right' => '<a href="home.php?mod=spacecp&ac=pm"><i class="comiis_font">&#xe62d;</i></a>',
		);}-->
	<!--{/if}-->
<!--{elseif $_G['basescript'] == 'home' && CURMODULE == 'spacecp' && $_GET['ac']=='pm'}-->
	<!--{eval $comiis_head = array(
		'left' => '',
		'center' => '{lang send_pm}',
		'right' => '<a href="home.php?mod=space&do=pm"><i class="comiis_font">&#xe633;</i></a>',
	);}-->
<!--{elseif $_G['basescript'] == 'home' && CURMODULE == 'space' && $_GET['do']=='notice'}-->
	<!--{eval
	$comiis_head = array(
		'left' => '',
		'center' => $comiis_lang['all51'].'{lang notice}',
		'right' => ' ',
	);}-->
<!--{elseif $_G['basescript'] == 'home' && CURMODULE == 'spacecp' && $_GET['ac']=='credit' && $_GET['op']=='log'}-->
	<!--{eval 
	$comiis_head = array(
		'left' => '',
		'center' => $comiis_lang['all48'],
		'right' => ' ',	
	);}-->
<!--{elseif $_G['basescript'] == 'home' && CURMODULE == 'spacecp' && $_GET['ac']=='credit'}-->
	<!--{eval 
	$comiis_head = array(
		'left' => '',
		'center' => $comiis_lang['all48'],
		'right' => ' ',	
	);}-->
<!--{elseif $_G['basescript'] == 'home' && CURMODULE == 'space' && $_GET['do']=='doing'}-->
	<!--{eval 
	$comiis_head = array(
		'left' => '',
		'center' => $comiis_lang['all56'].$comiis_lang['all57'],
		'right' => ' ',	
	);}-->
<!--{elseif $_G['basescript'] == 'home' && CURMODULE == 'space' && $_GET['do']=='blog' && $_GET['id']}-->
	<!--{eval 
	$comiis_bg = 1;
	$comiis_head = array(
		'left' => '',
		'center' => $comiis_lang['view45'].'{lang blog}</a>',
		'right' => '<a href="javascript:;" class="comiis_menu_display" id="comiis_menu_blogvtr"><i class="comiis_font">&#xe62b;</i></a>'.((($_G[uid] == $blog[uid] || checkperm('manageblog')) && $comiis_app_switch['comiis_leftnv'] != 1) ? '<span href="#moption" class="popup"><i class="comiis_font">&#xe63e;</i></span>' : ''),	
	);}-->
<!--{elseif $_G['basescript'] == 'home' && CURMODULE == 'space' && $_GET['do']=='blog'}-->
	<!--{eval 
	$comiis_head = array(
		'left' => '',
		'center' => '{lang blog}',
		'right' => '<a href="'.($_G['uid'] ? 'home.php?mod=spacecp&ac=blog' : (!$_G[connectguest] ? 'javascript:popup.open(\''.$comiis_lang['tip16'].'\', \'confirm\', \'member.php?mod=logging&action=login\');' : 'javascript:popup.open(\''.$comiis_lang['reg23'].'\', \'confirm\', \'member.php?mod=connect\');')).'"><i class="comiis_font">&#xe62d;</i></a>'.($comiis_app_switch['comiis_leftnv'] != 1 ? '<a href="search.php?mod=blog"><i class="comiis_font">&#xe622;</i></a>' : ''),
	);}-->
<!--{elseif $_G['basescript'] == 'home' && CURMODULE == 'spacecp' && $_GET['ac']=='blog'}-->
	<!--{eval 
	$comiis_head = array(
		'left' => '',
		'center' => $blog[blogid] ? $comiis_lang['post25'].'{lang blog}' : $comiis_lang['post24'].'{lang blog}',
		'right' => ' ',	
	);}-->
<!--{elseif $_G['basescript'] == 'home' && CURMODULE == 'spacecp' && $_GET['ac']=='upload'}-->
	<!--{eval 
	$comiis_head = array(
		'left' => '',
		'center' => '{lang add}{lang album}',
		'right' => ' ',
	);}-->
<!--{elseif $_G['basescript'] == 'home' && CURMODULE == 'space' && $_GET['do']=='album' && $_GET['picid']}-->
	<!--{eval 
	$comiis_bg = 1;
	$comiis_head = array(
		'left' => '',
		'center' => $space[username].$comiis_lang['all44'].'{lang album}',
		'right' => '<a href="javascript:;" class="comiis_menu_display" id="comiis_menu_xcplvtr"><i class="comiis_font">&#xe62b;</i></a>'.(($_G[uid] == $pic[uid] || checkperm('managealbum')) && $comiis_app_switch['comiis_leftnv'] != 1 ? '<span href="#moption" class="popup"><i class="comiis_font">&#xe63e;</i></span>' : ''),
	);}-->
<!--{elseif $_G['basescript'] == 'home' && CURMODULE == 'spacecp' && $_GET['op'] == 'edit'}-->
	<!--{eval 
	$comiis_head = array(
		'left' => '',
		'center' => '{lang edit}{lang album}',
		'right' => ' ',
	);}-->
<!--{elseif $_G['basescript'] == 'home' && CURMODULE == 'spacecp' && $_GET['op'] == 'editpic'}-->
	<!--{eval 
	$comiis_bg = 1;
	$comiis_head = array(
		'left' => '',
		'center' => '{lang edit}{lang album}',
		'right' => ' ',
	);}-->
<!--{elseif $_G['basescript'] == 'home' && CURMODULE == 'space' && $_GET['do']=='album' && $_GET['id']}-->
	<!--{eval 
	$comiis_bg = 1;
	$comiis_head = array(
		'left' => '',
		'center' => $space[username].$comiis_lang['all44'].'{lang album}',
		'right' => '<a href="javascript:;" class="comiis_menu_display" id="comiis_menu_xcvtr"><i class="comiis_font">&#xe62b;</i></a>'.(((($_G[uid] == $album[uid] || checkperm('managealbum')) && $album[albumid] > 0) || $space[self]) && $comiis_app_switch['comiis_leftnv'] != 1 ? '<span href="#moption" class="popup"><i class="comiis_font">&#xe63e;</i></span>':''),
	);}-->
<!--{elseif $_G['basescript'] == 'home' && CURMODULE == 'space' && $_GET['do']=='album'}-->
	<!--{eval 
	$comiis_head = array(
		'left' => '',
		'center' => '{lang album}',
		'right' => '<a href="'.($_G['uid'] ? 'home.php?mod=spacecp&ac=upload' : (!$_G[connectguest] ? 'javascript:popup.open(\''.$comiis_lang['tip16'].'\', \'confirm\', \'member.php?mod=logging&action=login\');' : 'javascript:popup.open(\''.$comiis_lang['reg23'].'\', \'confirm\', \'member.php?mod=connect\');')).'"><i class="comiis_font">&#xe64b;</i></a>'.($comiis_app_switch['comiis_leftnv'] != 1 ? '<a href="search.php?mod=album"><i class="comiis_font">&#xe622;</i></a>' : ''),
	);}-->
<!--{elseif $_G['basescript'] == 'misc' && CURMODULE == 'faq' && $_GET['op'] == 'url'}-->
	<!--{eval 
	$comiis_head = array(
		'left' => '',
		'center' => $comiis_app_switch['comiis_open_wblink_title'],
		'right' => '',	
	);}-->
<!--{elseif $_G['basescript'] == 'misc' && CURMODULE == 'faq' && $_GET['op'] == 'recommend'}-->
	<!--{eval 
	$comiis_head = array(
		'left' => '',
		'center' => $comiis_lang['view44'],
		'right' => ' ',	
	);}-->
<!--{elseif $_G['basescript'] == 'misc' && CURMODULE == 'invite'}-->
<!--{eval 
$comiis_bg = 1;
$comiis_head = array(
	'left' => '',
	'center' => '{lang invite_friend}',
	'right' => ' ',	
);}-->
<!--{elseif $_G['mod'] == 'misc' && $_GET['action'] == 'activityapplylist'}-->
<!--{eval 
$comiis_bg = 1;
$comiis_head = array(
	'left' => '',
	'center' => $comiis_lang['tip221'],
	'right' => ' ',	
);}-->
<!--{elseif ($_G['basescript'] == 'forum' || $_G['basescript'] == 'group') && CURMODULE == 'misc' && $_GET['action'] == 'viewratings'}-->
	<!--{eval 
	$comiis_head = array(
		'left' => '',
		'center' => $comiis_lang['view49'],
		'right' => ' ',	
	);}-->
<!--{elseif ($_G['basescript'] == 'forum' || $_G['basescript'] == 'group') && CURMODULE == 'misc' && $_GET['action'] == 'viewattachpayments'}-->
	<!--{eval 
	$comiis_head = array(
		'left' => '',
		'center' => $comiis_lang['view46'],
		'right' => ' ',	
	);}-->
<!--{elseif $_G['basescript'] == 'misc' && CURMODULE == 'tag'}-->
	<!--{eval 
	$comiis_head = array(
		'left' => '',
		'center' => ($tagname ? $comiis_lang['view54'].' : '.$tagname : 'Tag '.$comiis_lang['view54']),
		'right' => ' ',	
	);}-->
<!--{elseif $_G['basescript'] == 'home' && CURMODULE == 'space' && $_GET['do'] == 'profile'}-->
	<!--{eval 
		$comiis_head = array(
		'left' => '',
		'center' => $comiis_lang['view58'],
		'right' => ' ',
	);}-->
<!--{elseif ($_G['basescript'] == 'forum' || $_G['basescript'] == 'group') && CURMODULE == 'announcement'}-->
	<!--{eval 
	$comiis_bg = 1;
	$comiis_head = array(
		'left' => '',
		'center' => $comiis_lang['view59'],
		'right' => '<a href="javascript:comiis_fmenu(\'#comiis_annmore\');"><i class="comiis_font">&#xe62b;</i></a>',	
	);}-->
<!--{elseif $_G['basescript'] == 'plugin' && CURMODULE == 'k_misign'}-->
	<!--{eval 
	$comiis_bg = 1;
	$comiis_head = array(
		'left' => '',
		'center' => $comiis_lang['all61'],
		'right' => ' ',	
	);}-->
<!--{/if}-->
