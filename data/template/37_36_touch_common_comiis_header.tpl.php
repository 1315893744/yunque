<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); $avatars = avatar($_G[uid],'middle',true);$header_left = '<a '.($comiis_app_switch['comiis_leftnv'] == 1 || $comiis_app_switch['comiis_leftnv'] == 2 ? ($_G['uid'] ? 'href="home.php?mod=space&amp;do=profile&amp;mycenter=1"' : 'href="member.php?mod=logging&amp;action=login"') : 'href="javascript:;" onclick="comiis_leftnv();"').(' class="kmuser"><i class="comiis_font">&#xe675;</i><em><img src="'.$avatars.'?'.time().'">'.((empty($_G['cookie']['ignore_notice']) && ($_G[member][newpm] || $_G[member][newprompt_num][follower] || $_G[member][newprompt_num][follow] || $_G[member][newprompt])) ? '<span class="icon_msgs bg_del"></span>' : '').'</em></a>');?><?php if($_G['basescript'] == 'member' && CURMODULE == 'logging') { $comiis_head = array(
'left' => '',
'center' => '登录',
'right' => '',	
);?><?php } elseif($_G['basescript'] == 'member' && CURMODULE == 'register') { $comiis_head = array(
'left' => '',
'center' => '注册',
'right' => '',	
);?><?php } elseif($_G['basescript'] == 'member' && $_GET['mod'] == 'getpasswd') { $comiis_head = array(
'left' => '',
'center' => $comiis_app_switch['comiis_reg_zmtxt'],
'right' => '',	
);?><?php } elseif($_G['basescript'] == 'member' && $_GET['mod'] == 'connect') { $comiis_head = array(
'left' => '',
'center' => $comiis_lang['reg14'],
'right' => '',	
);?><?php } elseif($_G['basescript'] == 'misc' && $_GET['mod'] == 'ranklist' && ($_GET['type'] == 'thread' || $_GET['type'] == 'forum')) { $comiis_bg = 1;
$comiis_head = array(
'left' => '',
'center' => $comiis_lang['tip314'],
'right' => '<a href="search.php?mod=forum"><i class="comiis_font">&#xe622;</i></a>',	
);?><?php } elseif($_G['basescript'] == 'misc' && $_GET['mod'] == 'ranklist' && $_GET['type'] == 'member') { $comiis_bg = 1;
$comiis_head = array(
'left' => '',
'center' => $comiis_lang['tip314'],
'right' => '<a href="/home.php?mod=spacecp&amp;ac=search&amp;op=sex"><i class="comiis_font">&#xe622;</i></a>',	
);?><?php } elseif($_G['basescript'] == 'misc' && $_GET['mod'] == 'ranklist') { $comiis_bg = 1;
$comiis_head = array(
'left' => '',
'center' => $comiis_lang['tip314'],
'right' => '',	
);?><?php } elseif(($_G['basescript'] == 'forum' || $_G['basescript'] == 'group') && CURMODULE == 'guide' && $_GET['index'] == 1) { $comiis_head = array(
'left' => '',
'center' => $comiis_lang['tip323'],
'right' => '<a href="search.php?mod=forum"><i class="comiis_font">&#xe622;</i></a>',
);?><?php } elseif($_G['basescript'] == 'forum' && CURMODULE == 'index') { $comiis_head = array(
'left' => $header_left,
'center' => ($comiis_app_switch['comiis_bbsxname'] ? $comiis_app_switch['comiis_bbsxname'] : $comiis_lang['all0']),
'right' => '<a href="search.php?mod=forum"><i class="comiis_font">&#xe622;</i></a>',
);?><?php } elseif($_G['basescript'] == 'forum' && CURMODULE == 'forumdisplay') { $comiis_head = array(
'left' => '',		
'center' => $comiis_app_switch['comiis_list_gosx']==1 ? (strip_tags($_G['forum']['name']) ? strip_tags($_G['forum']['name']) : $_G['forum']['name']) : ('<a href="javascript:comiis_fmenu(\'#comiis_listmore\');">'.(strip_tags($_G['forum']['name']) ? strip_tags($_G['forum']['name']) : $_G['forum']['name']).(!$subforumonly ? '<i class="comiis_font kmxiao">&#xe620;</i>' : '').'</a>'),
'right' => ($subforumonly ? '' : (($comiis_app_switch['comiis_post_yindao'] == 1 && $_G['group']['allowpost'] && ($_G['group']['allowposttrade'] || $_G['group']['allowpostpoll'] || $_G['group']['allowpostreward'] || $_G['group']['allowpostactivity'] || $_G['group']['allowpostdebate'] || $_G['setting']['threadplugins'] || $_G['forum']['threadsorts'])) ? ('<a href="'.((!$_G['uid'] && !((!$_G['forum']['postperm'] && $_G['group']['allowpost']) || ($_G['forum']['postperm'] && forumperm($_G['forum']['postperm'])))) ? (!$_G[connectguest] ? 'javascript:popup.open(\''.$comiis_lang['tip16'].'\', \'confirm\', \'member.php?mod=logging&action=login\');' : 'javascript:popup.open(\''.$comiis_lang['reg23'].'\', \'confirm\', \'member.php?mod=connect\');') : '#comiis_post_type').'" title="发帖"'.($_G['uid'] ? ' class="popup"' : '').'><i class="comiis_font">&#xe62d;</i></a>') : ('<a href="'.((!$_G['uid'] && !((!$_G['forum']['postperm'] && $_G['group']['allowpost']) || ($_G['forum']['postperm'] && forumperm($_G['forum']['postperm'])))) ? (!$_G[connectguest] ? 'javascript:popup.open(\''.$comiis_lang['tip16'].'\', \'confirm\', \'member.php?mod=logging&action=login\');' : 'javascript:popup.open(\''.$comiis_lang['reg23'].'\', \'confirm\', \'member.php?mod=connect\');') : 'forum.php?mod=post&action=newthread&fid='.$_G[fid]).'" title="发帖"><i class="comiis_font">&#xe62d;</i></a>'))).($comiis_app_switch['comiis_leftnv'] != 1 ? '<a href="search.php?mod=forum"><i class="comiis_font">&#xe622;</i></a>' : ''),
);?><?php } elseif(($_G['basescript'] == 'forum' || $_G['basescript'] == 'group') && CURMODULE == 'viewthread' && $_GET['do']=='tradeinfo') { $comiis_head = array(
'left' => '',
'center' => $comiis_lang['tip74'],
'right' => ' ',	
);?><?php } elseif(($_G['basescript'] == 'forum' || $_G['basescript'] == 'group') && CURMODULE == 'trade' && $_GET['orderid']) { $comiis_head = array(
'left' => '',
'center' => $comiis_lang['view61'],
'right' => ' ',	
);?><?php } elseif(($_G['basescript'] == 'forum' || $_G['basescript'] == 'group') && CURMODULE == 'trade') { $comiis_head = array(
'left' => '',
'center' => $comiis_lang['view62'],
'right' => ' ',	
);?><?php } elseif($_G['basescript'] == 'group' && $_GET['action']=='create') { $comiis_head = array(
'left' => '',
'center' => $comiis_group_lang['004'].$comiis_group_lang['001'],
'right' => ' ',	
);?><?php } elseif($_G['basescript'] == 'group' && CURMODULE == 'index') { $comiis_head = array(
'left' => $header_left,
'center' => $comiis_group_lang['001'],
'right' => '<a href="'.($_G['uid'] ? 'forum.php?mod=group&action=create' : (!$_G[connectguest] ? 'javascript:popup.open(\''.$comiis_lang['tip16'].'\', \'confirm\', \'member.php?mod=logging&action=login\');' : 'javascript:popup.open(\''.$comiis_lang['reg23'].'\', \'confirm\', \'member.php?mod=connect\');')).'" class="kmtxt">'.($comiis_app_switch['comiis_leftnv'] != 1 ? '+ '.$comiis_group_lang['033'] : '<i class="comiis_font">&#xe62d;</i>').'</a>',
);?><?php } elseif($_G['basescript'] == 'group' && CURMODULE == 'my') { $comiis_head = array(
'left' => '',
'center' => $comiis_group_lang['001'],
'right' => '<a href="'.($_G['uid'] ? 'forum.php?mod=group&action=create' : (!$_G[connectguest] ? 'javascript:popup.open(\''.$comiis_lang['tip16'].'\', \'confirm\', \'member.php?mod=logging&action=login\');' : 'javascript:popup.open(\''.$comiis_lang['reg23'].'\', \'confirm\', \'member.php?mod=connect\');')).'" class="kmtxt">'.($comiis_app_switch['comiis_leftnv'] != 1 ? '+ '.$comiis_group_lang['033'] : '<i class="comiis_font">&#xe62d;</i>').'</a>',
);?><?php } elseif(($_G['basescript'] == 'forum' || $_G['basescript'] == 'group') && CURMODULE == 'viewthread') { ?><?php
$comiis_right = <<<EOF

<a href="javascript:;" class="comiis_menu_display" id="comiis_menu_vtr"><i class="comiis_font">&#xe62b;</i></a>

EOF;
 if($comiis_app_switch['comiis_leftnv'] != 1) { 
$comiis_right .= <<<EOF

        
EOF;
 if((($_G['forum']['ismoderator'] || $_G['group']['alloweditpost']) || ($_G['forum']['alloweditpost'] && $_G['uid'] && ($_G['forum_thread']['authorid'] == $_G['uid'] && $_G['forum_thread']['closed'] == 0) && !(!$alloweditpost_status && $edittimelimit && TIMESTAMP - $_G['forum_thread']['dateline'] > $edittimelimit)))) { 
$comiis_right .= <<<EOF

            
EOF;
 if(is_array($postlist)) foreach($postlist as $posts) { 
$comiis_right .= <<<EOF
                
EOF;
 if($posts['first']) { 
$comiis_right .= <<<EOF

                    <span href="#moption_{$posts['pid']}" class="popup"><i class="comiis_font">&#xe63e;</i></span>
                
EOF;
 } 
$comiis_right .= <<<EOF

            
EOF;
 } 
$comiis_right .= <<<EOF

        
EOF;
 } } 
$comiis_right .= <<<EOF
			

EOF;
?><?php $comiis_head = array(
'left' => '',
'center' => '<a href="forum.php?mod=forumdisplay&amp;fid='.$_G['forum']['fid'].'">'.($comiis_app_switch['comiis_bbsvtname'] ? $comiis_app_switch['comiis_bbsvtname'] : strip_tags($_G['forum']['name'])).'</a>',
'right' => $comiis_right,
);?><?php } elseif(($_G['basescript'] == 'forum' || $_G['basescript'] == 'group') && CURMODULE == 'post') { $comiis_head = array(
'left' => '',
'center' => $_GET[action] == 'edit' ? '编辑' : ($_GET[action] == 'reply' ? $comiis_lang['reply'] : '发帖'),
'right' => ' ',
);?><?php } elseif($_G['basescript'] == 'search') { $comiis_head = array(
'left' => '',
'center' => '搜索',
'right' => ' ',
);?><?php } elseif($_G['basescript'] == 'portal' && CURMODULE == 'list') { $comiis_head = array(
'left' => '',
'center' => $cat[catname],
'right' => ((($_G['group']['allowpostarticle'] || $_G['group']['allowmanagearticle'] || $categoryperm[$catid]['allowmanage'] || $categoryperm[$catid]['allowpublish']) && empty($cat['disallowpublish'])) ? '<a href="portal.php?mod=portalcp&amp;ac=article&amp;catid='.$cat[catid].'"><i class="comiis_font">&#xe62d;</i></a>' : '').($comiis_app_switch['comiis_leftnv'] != 1 ? '<a href="search.php?mod=portal"><i class="comiis_font">&#xe622;</i></a>' : ''),
);?><?php } elseif($_G['basescript'] == 'portal' && CURMODULE == 'view') { $comiis_bg = 1;
$comiis_head = array(
'left' => '',
'center' => '<a href="'.getportalcategoryurl($cat[catid]).'">'.($comiis_app_switch['comiis_portal_vtname'] ? $comiis_app_switch['comiis_portal_vtname'] : strip_tags($cat[catname])).'</a>',
'right' => '<a href="javascript:;" class="comiis_menu_display" id="comiis_menu_wzvtr"><i class="comiis_font">&#xe62b;</i></a>'.(($_G['group']['allowmanagearticle'] || ($_G['group']['allowpostarticle'] && $article['uid'] == $_G['uid'] && (empty($_G['group']['allowpostarticlemod']) || $_G['group']['allowpostarticlemod'] && $article['status'] == 1)) || $categoryperm[$value['catid']]['allowmanage']) && $comiis_app_switch['comiis_leftnv'] != 1 ? '<span href="#moption" class="popup"><i class="comiis_font">&#xe63e;</i></span>' :''),	
);?><?php } elseif($_G['basescript'] == 'portal' && CURMODULE == 'comment') { $comiis_head = array(
'left' => '',
'center' => '全部'.$comiis_lang['all53'],
'right' => ' ',	
);?><?php } elseif($_G['basescript'] == 'portal' && CURMODULE == 'portalcp' && $_GET['ac']=='article') { $comiis_head = array(
'left' => '',
'center' => !empty($aid) ? $comiis_lang['post19'] : $comiis_lang['post18'],
'right' => ' ',	
);?><?php } elseif(($_G['basescript'] == 'forum' || $_G['basescript'] == 'group') && CURMODULE == 'misc' && $_GET['action']=='viewpayments') { $comiis_head = array(
'left' => '',
'center' => $comiis_lang['view46'],
'right' => ' ',	
);?><?php } elseif($_G['basescript'] == 'home' && CURMODULE == 'medal') { $comiis_bg = 1;
$comiis_head = array(
'left' => '',
'center' => $comiis_lang['tip319'],
'right' => '',	
);?><?php } elseif($_G['basescript'] == 'home' && CURMODULE == 'spacecp' && $_GET['ac']=='profile') { $comiis_head = array(
'left' => '',
'center' => $comiis_lang['post16'],
'right' => ' ',
);?><?php } elseif($_G['basescript'] == 'home' && CURMODULE == 'spacecp' && $_GET['ac']=='invite') { $comiis_bg = 1;
$comiis_head = array(
'left' => '',
'center' => '邀请好友',
'right' => ' ',
);?><?php } elseif($_G['basescript'] == 'home' && CURMODULE == 'spacecp' && $_GET['ac']=='promotion') { $comiis_head = array(
'left' => '',
'center' => $comiis_lang['tip280'],
'right' => ' ',
);?><?php } elseif($_G['basescript'] == 'home' && CURMODULE == 'spacecp' && $_GET['ac']=='poke') { $comiis_head = array(
'left' => '',
'center' => $comiis_lang['post38'],
'right' => ' ',
);?><?php } elseif($_G['basescript'] == 'home' && CURMODULE == 'spacecp' && $_GET['ac']=='usergroup') { $comiis_bg = 1;
$comiis_head = array(
'left' => '',
'center' => $_G['comiis_homegid'] != 0 ? $comiis_lang['tip262'].$comiis_lang['tip267'] : $comiis_lang['all58'].$comiis_lang['tip262'],
'right' => ' ',
);?><?php } elseif($_G['basescript'] == 'home' && CURMODULE == 'spacecp' && $_GET['ac']=='search') { $comiis_head = array(
'left' => '',
'center' => $comiis_lang['tip338'],
'right' => '<a href="home.php?mod=space&amp;do=friend"><i class="comiis_font">&#xe629;</i></a>',
);?><?php } elseif($_G['basescript'] == 'home' && CURMODULE == 'space' && $_GET['do']=='thread') { $comiis_head = array(
'left' => '',
'center' => '我的主题',
'right' => ' ',
);?><?php } elseif($_G['basescript'] == 'home' && CURMODULE == 'follow' && $_GET['do']=='following') { $comiis_head = array(
'left' => '',
'center' => $comiis_lang['all58'].$comiis_lang['all59'],
'right' => '<a href="/home.php?mod=spacecp&amp;ac=search&amp;op=sex"><i class="comiis_font">&#xe622;</i></a>',	
);?><?php } elseif($_G['basescript'] == 'home' && CURMODULE == 'follow' && $_GET['do']=='follower') { $comiis_head = array(
'left' => '',
'center' => $comiis_lang['all58'].$comiis_lang['all59'],
'right' => '<a href="/home.php?mod=spacecp&amp;ac=search&amp;op=sex"><i class="comiis_font">&#xe622;</i></a>',	
);?><?php } elseif($_G['basescript'] == 'home' && CURMODULE == 'space' && $_GET['do']=='friend' && $_GET['type'] == 'near') { $comiis_head = array(
'left' => '',
'center' => $comiis_lang['tip337'],
'right' => '<a href="home.php?mod=space&amp;do=friend"><i class="comiis_font">&#xe629;</i></a>',	
);?><?php } elseif($_G['basescript'] == 'home' && CURMODULE == 'space' && $_GET['do']=='friend') { $comiis_head = array(
'left' => '',
'center' => $comiis_lang['all58'].$comiis_lang['all59'],
'right' => '<a href="/home.php?mod=spacecp&amp;ac=search&amp;op=sex"><i class="comiis_font">&#xe622;</i></a>',	
);?><?php } elseif($_G['basescript'] == 'home' && CURMODULE == 'spacecp' && $_GET['op']=='request') { $comiis_head = array(
'left' => '',
'center' => $comiis_lang['all38'],
'right' => '<a href="/home.php?mod=spacecp&amp;ac=search&amp;op=sex"><i class="comiis_font">&#xe622;</i></a>',	
);?><?php } elseif($_G['basescript'] == 'home' && CURMODULE == 'space' && $_GET['do']=='favorite') { $comiis_head = array(
'left' => '',
'center' => '我的收藏',
'right' => ' ',	
);?><?php } elseif($_G['basescript'] == 'home' && CURMODULE == 'task') { $comiis_bg = 1;
$comiis_head = array(
'left' => '',
'center' => $comiis_lang['tip271'],
'right' => ' ',
);?><?php } elseif($_G['basescript'] == 'home' && CURMODULE == 'space' && $_GET['do']=='pm') { if(in_array($filter, array('privatepm','announcepm')) || in_array($_GET['subop'], array('view'))) { if(in_array($filter, array('privatepm','announcepm'))) { $comiis_head = array(
'left' => '',
'center' => '消息',
'right' => '<a href="home.php?mod=spacecp&amp;ac=pm"><i class="comiis_font">&#xe62d;</i></a>',
);?><?php } elseif(in_array($_GET['subop'], array('view'))) { $comiis_head = array(
'left' => '',
'center' => $_GET['viewall'] == 1 ? '查看消息' : $tousername.' <font class="f14">('.($online ? $comiis_lang['online'] : $comiis_lang['offline']).')</font>',
'right' => $_GET['viewall'] != 1 ? '<a href="home.php?mod=space&amp;do=pm&amp;subop=view&amp;touid='.$_GET['touid'].'&amp;viewall=1"><i class="comiis_font">&#xe62a;</i></a>' : ' ',
);?><?php } ?>	
<?php } elseif($_GET['subop'] == 'viewg') { $comiis_head = array(
'left' => '',
'center' => $comiis_lang['all45'],
'right' => '<a href="home.php?mod=spacecp&amp;ac=pm"><i class="comiis_font">&#xe62d;</i></a>',
);?><?php } } elseif($_G['basescript'] == 'home' && CURMODULE == 'spacecp' && $_GET['ac']=='pm') { $comiis_head = array(
'left' => '',
'center' => '发消息',
'right' => '<a href="home.php?mod=space&amp;do=pm"><i class="comiis_font">&#xe633;</i></a>',
);?><?php } elseif($_G['basescript'] == 'home' && CURMODULE == 'space' && $_GET['do']=='notice') { $comiis_head = array(
'left' => '',
'center' => $comiis_lang['all51'].'提醒',
'right' => ' ',
);?><?php } elseif($_G['basescript'] == 'home' && CURMODULE == 'spacecp' && $_GET['ac']=='credit' && $_GET['op']=='log') { $comiis_head = array(
'left' => '',
'center' => $comiis_lang['all48'],
'right' => ' ',	
);?><?php } elseif($_G['basescript'] == 'home' && CURMODULE == 'spacecp' && $_GET['ac']=='credit') { $comiis_head = array(
'left' => '',
'center' => $comiis_lang['all48'],
'right' => ' ',	
);?><?php } elseif($_G['basescript'] == 'home' && CURMODULE == 'space' && $_GET['do']=='doing') { $comiis_head = array(
'left' => '',
'center' => $comiis_lang['all56'].$comiis_lang['all57'],
'right' => ' ',	
);?><?php } elseif($_G['basescript'] == 'home' && CURMODULE == 'space' && $_GET['do']=='blog' && $_GET['id']) { $comiis_bg = 1;
$comiis_head = array(
'left' => '',
'center' => $comiis_lang['view45'].'日志</a>',
'right' => '<a href="javascript:;" class="comiis_menu_display" id="comiis_menu_blogvtr"><i class="comiis_font">&#xe62b;</i></a>'.((($_G[uid] == $blog[uid] || checkperm('manageblog')) && $comiis_app_switch['comiis_leftnv'] != 1) ? '<span href="#moption" class="popup"><i class="comiis_font">&#xe63e;</i></span>' : ''),	
);?><?php } elseif($_G['basescript'] == 'home' && CURMODULE == 'space' && $_GET['do']=='blog') { $comiis_head = array(
'left' => '',
'center' => '日志',
'right' => '<a href="'.($_G['uid'] ? 'home.php?mod=spacecp&ac=blog' : (!$_G[connectguest] ? 'javascript:popup.open(\''.$comiis_lang['tip16'].'\', \'confirm\', \'member.php?mod=logging&action=login\');' : 'javascript:popup.open(\''.$comiis_lang['reg23'].'\', \'confirm\', \'member.php?mod=connect\');')).'"><i class="comiis_font">&#xe62d;</i></a>'.($comiis_app_switch['comiis_leftnv'] != 1 ? '<a href="search.php?mod=blog"><i class="comiis_font">&#xe622;</i></a>' : ''),
);?><?php } elseif($_G['basescript'] == 'home' && CURMODULE == 'spacecp' && $_GET['ac']=='blog') { $comiis_head = array(
'left' => '',
'center' => $blog[blogid] ? $comiis_lang['post25'].'日志' : $comiis_lang['post24'].'日志',
'right' => ' ',	
);?><?php } elseif($_G['basescript'] == 'home' && CURMODULE == 'spacecp' && $_GET['ac']=='upload') { $comiis_head = array(
'left' => '',
'center' => '添加相册',
'right' => ' ',
);?><?php } elseif($_G['basescript'] == 'home' && CURMODULE == 'space' && $_GET['do']=='album' && $_GET['picid']) { $comiis_bg = 1;
$comiis_head = array(
'left' => '',
'center' => $space[username].$comiis_lang['all44'].'相册',
'right' => '<a href="javascript:;" class="comiis_menu_display" id="comiis_menu_xcplvtr"><i class="comiis_font">&#xe62b;</i></a>'.(($_G[uid] == $pic[uid] || checkperm('managealbum')) && $comiis_app_switch['comiis_leftnv'] != 1 ? '<span href="#moption" class="popup"><i class="comiis_font">&#xe63e;</i></span>' : ''),
);?><?php } elseif($_G['basescript'] == 'home' && CURMODULE == 'spacecp' && $_GET['op'] == 'edit') { $comiis_head = array(
'left' => '',
'center' => '编辑相册',
'right' => ' ',
);?><?php } elseif($_G['basescript'] == 'home' && CURMODULE == 'spacecp' && $_GET['op'] == 'editpic') { $comiis_bg = 1;
$comiis_head = array(
'left' => '',
'center' => '编辑相册',
'right' => ' ',
);?><?php } elseif($_G['basescript'] == 'home' && CURMODULE == 'space' && $_GET['do']=='album' && $_GET['id']) { $comiis_bg = 1;
$comiis_head = array(
'left' => '',
'center' => $space[username].$comiis_lang['all44'].'相册',
'right' => '<a href="javascript:;" class="comiis_menu_display" id="comiis_menu_xcvtr"><i class="comiis_font">&#xe62b;</i></a>'.(((($_G[uid] == $album[uid] || checkperm('managealbum')) && $album[albumid] > 0) || $space[self]) && $comiis_app_switch['comiis_leftnv'] != 1 ? '<span href="#moption" class="popup"><i class="comiis_font">&#xe63e;</i></span>':''),
);?><?php } elseif($_G['basescript'] == 'home' && CURMODULE == 'space' && $_GET['do']=='album') { $comiis_head = array(
'left' => '',
'center' => '相册',
'right' => '<a href="'.($_G['uid'] ? 'home.php?mod=spacecp&ac=upload' : (!$_G[connectguest] ? 'javascript:popup.open(\''.$comiis_lang['tip16'].'\', \'confirm\', \'member.php?mod=logging&action=login\');' : 'javascript:popup.open(\''.$comiis_lang['reg23'].'\', \'confirm\', \'member.php?mod=connect\');')).'"><i class="comiis_font">&#xe64b;</i></a>'.($comiis_app_switch['comiis_leftnv'] != 1 ? '<a href="search.php?mod=album"><i class="comiis_font">&#xe622;</i></a>' : ''),
);?><?php } elseif($_G['basescript'] == 'misc' && CURMODULE == 'faq' && $_GET['op'] == 'url') { $comiis_head = array(
'left' => '',
'center' => $comiis_app_switch['comiis_open_wblink_title'],
'right' => '',	
);?><?php } elseif($_G['basescript'] == 'misc' && CURMODULE == 'faq' && $_GET['op'] == 'recommend') { $comiis_head = array(
'left' => '',
'center' => $comiis_lang['view44'],
'right' => ' ',	
);?><?php } elseif($_G['basescript'] == 'misc' && CURMODULE == 'invite') { $comiis_bg = 1;
$comiis_head = array(
'left' => '',
'center' => '邀请好友',
'right' => ' ',	
);?><?php } elseif($_G['mod'] == 'misc' && $_GET['action'] == 'activityapplylist') { $comiis_bg = 1;
$comiis_head = array(
'left' => '',
'center' => $comiis_lang['tip221'],
'right' => ' ',	
);?><?php } elseif(($_G['basescript'] == 'forum' || $_G['basescript'] == 'group') && CURMODULE == 'misc' && $_GET['action'] == 'viewratings') { $comiis_head = array(
'left' => '',
'center' => $comiis_lang['view49'],
'right' => ' ',	
);?><?php } elseif(($_G['basescript'] == 'forum' || $_G['basescript'] == 'group') && CURMODULE == 'misc' && $_GET['action'] == 'viewattachpayments') { $comiis_head = array(
'left' => '',
'center' => $comiis_lang['view46'],
'right' => ' ',	
);?><?php } elseif($_G['basescript'] == 'misc' && CURMODULE == 'tag') { $comiis_head = array(
'left' => '',
'center' => ($tagname ? $comiis_lang['view54'].' : '.$tagname : 'Tag '.$comiis_lang['view54']),
'right' => ' ',	
);?><?php } elseif($_G['basescript'] == 'home' && CURMODULE == 'space' && $_GET['do'] == 'profile') { $comiis_head = array(
'left' => '',
'center' => $comiis_lang['view58'],
'right' => ' ',
);?><?php } elseif(($_G['basescript'] == 'forum' || $_G['basescript'] == 'group') && CURMODULE == 'announcement') { $comiis_bg = 1;
$comiis_head = array(
'left' => '',
'center' => $comiis_lang['view59'],
'right' => '<a href="javascript:comiis_fmenu(\'#comiis_annmore\');"><i class="comiis_font">&#xe62b;</i></a>',	
);?><?php } elseif($_G['basescript'] == 'plugin' && CURMODULE == 'k_misign') { $comiis_bg = 1;
$comiis_head = array(
'left' => '',
'center' => $comiis_lang['all61'],
'right' => ' ',	
);?><?php } ?>
