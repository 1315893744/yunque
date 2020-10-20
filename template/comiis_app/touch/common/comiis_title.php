<?PHP exit('Access Denied');?>
<!--{if $_G['basescript'] == 'forum' && CURMODULE == 'index'}-->
	<!--{if $comiis_app_switch['comiis_bbsxname']}--><!--{eval $navtitle = $comiis_app_switch['comiis_bbsxname'];}--><!--{else}--><!--{/if}-->
<!--{elseif $_G['basescript'] == 'member' && $_GET['mod'] == 'getpasswd'}-->
	<!--{eval $navtitle = $comiis_app_switch['comiis_reg_zmtxt'];}-->
<!--{elseif ($_G['basescript'] == 'forum' || $_G['basescript'] == 'group') && CURMODULE == 'viewthread' && $_GET['do']=='tradeinfo'}-->
	<!--{eval $navtitle = ($trade[subject] ? $trade[subject] : $comiis_lang['tip74']);}-->
<!--{elseif ($_G['basescript'] == 'forum' || $_G['basescript'] == 'group') && CURMODULE == 'trade' && $_GET['orderid']}-->
	<!--{eval $navtitle = $comiis_lang['view61'];}-->
<!--{elseif ($_G['basescript'] == 'forum' || $_G['basescript'] == 'group') && CURMODULE == 'trade'}-->
	<!--{eval $navtitle = $comiis_lang['view62'];}-->
<!--{elseif ($_G['basescript'] == 'forum' || $_G['basescript'] == 'group') && CURMODULE == 'post'}-->
	<!--{eval $navtitle = $_GET[action] == 'edit' ? '{lang edit}' : '{lang send_threads}';}-->
<!--{elseif $_G['basescript'] == 'group' && $_GET['action']=='create'}-->
    <!--{eval $navtitle = $comiis_group_lang['004'].$comiis_group_lang['001'];}-->
<!--{elseif $_G['basescript'] == 'group' && CURMODULE == 'index'}-->
	<!--{eval $navtitle =$comiis_group_lang['001'];}-->
<!--{elseif $_G['basescript'] == 'group' && CURMODULE == 'my'}-->
	<!--{eval $navtitle =$comiis_group_lang['001'];}-->
<!--{elseif $_G['basescript'] == 'portal' && CURMODULE == 'comment'}-->
	<!--{eval $navtitle = '{lang all}'.$comiis_lang['all53'];}-->
<!--{elseif $_G['basescript'] == 'portal' && CURMODULE == 'portalcp' && $_GET['ac']=='article'}-->
	<!--{eval $navtitle = !empty($aid) ? $comiis_lang['post19'] : $comiis_lang['post18'];}-->
<!--{elseif ($_G['basescript'] == 'forum' || $_G['basescript'] == 'group') && CURMODULE == 'misc' && $_GET['action']=='viewpayments'}-->
	<!--{eval $navtitle = $comiis_lang['view46'];}-->
<!--{elseif $_G['basescript'] == 'home' && CURMODULE == 'medal'}-->
	<!--{eval $navtitle = $comiis_lang['tip319'];}-->
<!--{elseif $_G['basescript'] == 'home' && CURMODULE == 'spacecp' && $_GET['ac']=='profile'}-->
	<!--{eval $navtitle = $comiis_lang['post16'];}-->
<!--{elseif $_G['basescript'] == 'home' && CURMODULE == 'spacecp' && $_GET['ac']=='poke'}-->
	<!--{eval $navtitle = $comiis_lang['post38'];}-->
<!--{elseif $_G['basescript'] == 'home' && CURMODULE == 'spacecp' && $_GET['ac']=='usergroup'}-->
    <!--{if $_G['comiis_homegid'] != 0}-->
        <!--{eval $navtitle = $comiis_lang['tip262'].$comiis_lang['tip267'];}-->
    <!--{else}-->
        <!--{eval $navtitle = $comiis_lang['all58'].$comiis_lang['tip262'];}-->
    <!--{/if}-->
<!--{elseif $_G['basescript'] == 'home' && CURMODULE == 'space' && $_GET['do']=='thread'}-->
	<!--{eval $navtitle = '{lang mythread}';}-->
<!--{elseif $_G['basescript'] == 'home' && CURMODULE == 'spacecp' && $_GET['ac']=='search'}-->
    <!--{eval $navtitle = $comiis_lang['tip338'];}-->
<!--{elseif $_G['basescript'] == 'home' && CURMODULE == 'follow' && $_GET['do']=='following'}-->
	<!--{eval $navtitle = $comiis_lang['all33'];}-->
<!--{elseif $_G['basescript'] == 'home' && CURMODULE == 'follow' && $_GET['do']=='follower'}-->
	<!--{eval $navtitle = $comiis_lang['all34'];}-->
<!--{elseif $_G['basescript'] == 'home' && CURMODULE == 'space' && $_GET['do']=='friend' && $_GET['view'] == 'online'}-->
    <!--{eval $navtitle = $comiis_lang['tip337'];}-->
<!--{elseif $_G['basescript'] == 'home' && CURMODULE == 'space' && $_GET['do']=='friend'}-->
	<!--{eval $navtitle = $comiis_lang['all58'].$comiis_lang['all59'];}-->
<!--{elseif $_G['basescript'] == 'home' && CURMODULE == 'space' && $_GET['do']=='pm'}-->
	<!--{if in_array($filter, array('privatepm','announcepm')) || in_array($_GET[subop], array('view'))}-->
		<!--{if in_array($filter, array('privatepm','announcepm'))}-->
			<!--{eval $navtitle = '{lang pm_center}';}-->
		<!--{elseif in_array($_GET[subop], array('view'))}-->
			<!--{eval $navtitle = $_GET['viewall'] == 1 ? '{lang viewmypm}' : $comiis_lang['tip236'];}-->
		<!--{/if}-->	
	<!--{elseif $_GET['subop'] == 'viewg'}-->
		<!--{eval $navtitle = $comiis_lang['all45'];}-->
	<!--{/if}-->
<!--{elseif $_G['basescript'] == 'home' && CURMODULE == 'spacecp' && $_GET['ac']=='pm'}-->
	<!--{eval $navtitle = '{lang send_pm}';}-->
<!--{elseif $_G['basescript'] == 'home' && CURMODULE == 'space' && $_GET['do']=='notice'}-->
	<!--{eval $navtitle = $comiis_lang['all51'].'{lang notice}';}-->
<!--{elseif $_G['basescript'] == 'home' && CURMODULE == 'spacecp' && $_GET['ac']=='credit' && $_GET['op']=='log'}-->
	<!--{eval $navtitle = $comiis_lang['all48'];}-->
<!--{elseif $_G['basescript'] == 'home' && CURMODULE == 'spacecp' && $_GET['ac']=='credit'}-->
	<!--{eval $navtitle = $comiis_lang['all48'];}-->
<!--{elseif $_G['basescript'] == 'home' && CURMODULE == 'space' && $_GET['do']=='doing'}-->
	<!--{eval $navtitle = $comiis_lang['all56'].$comiis_lang['all57'];}-->
<!--{elseif $_G['basescript'] == 'home' && CURMODULE == 'space' && $_GET['do']=='blog' && $_GET['id']}-->
	<!--{eval $navtitle = $blog['subject'];}-->
<!--{elseif $_G['basescript'] == 'home' && CURMODULE == 'space' && $_GET['do']=='blog'}-->
	<!--{eval $navtitle = '{lang blog}';}-->
<!--{elseif $_G['basescript'] == 'home' && CURMODULE == 'spacecp' && $_GET['ac']=='blog'}-->
	<!--{eval $navtitle = $blog[blogid] ? $comiis_lang['post25'].'{lang blog}' : $comiis_lang['post24'].'{lang blog}';}-->
<!--{elseif $_G['basescript'] == 'home' && CURMODULE == 'spacecp' && $_GET['ac']=='upload'}-->
	<!--{eval $navtitle = '{lang add}{lang album}';}-->
<!--{elseif $_G['basescript'] == 'home' && CURMODULE == 'space' && $_GET['do']=='album' && $_GET['picid']}-->
	<!--{eval $navtitle = $space[username].$comiis_lang['all44'].'{lang album}';}-->
<!--{elseif $_G['basescript'] == 'home' && CURMODULE == 'spacecp' && $_GET['op'] == 'edit'}-->
	<!--{eval $navtitle = '{lang edit}{lang album}';}-->
<!--{elseif $_G['basescript'] == 'home' && CURMODULE == 'spacecp' && $_GET['op'] == 'editpic'}-->
	<!--{eval $navtitle = '{lang edit}{lang album}';}-->
<!--{elseif $_G['basescript'] == 'home' && CURMODULE == 'space' && $_GET['do']=='album' && $_GET['id']}-->
	<!--{eval $navtitle = $space[username].$comiis_lang['all44'].'{lang album}';}-->
<!--{elseif $_G['basescript'] == 'home' && CURMODULE == 'space' && $_GET['do']=='album'}-->
	<!--{eval $navtitle = '{lang album}';}-->
<!--{elseif $_G['basescript'] == 'misc' && CURMODULE == 'faq' && $_GET['op'] == 'url'}-->
	<!--{eval $navtitle = $comiis_app_switch['comiis_open_wblink_title'];}-->
<!--{elseif $_G['basescript'] == 'misc' && CURMODULE == 'faq' && $_GET['op'] == 'recommend'}-->
	<!--{eval $navtitle = $comiis_lang['view44'];}-->
<!--{elseif $_G['basescript'] == 'misc' && CURMODULE == 'invite'}-->
	<!--{eval $navtitle = '{lang invite_friend}';}-->
<!--{elseif $_G['mod'] == 'misc' && $_GET['action'] == 'activityapplylist'}-->
	<!--{eval $navtitle = $comiis_lang['tip221'];}-->
<!--{elseif ($_G['basescript'] == 'forum' || $_G['basescript'] == 'group') && CURMODULE == 'misc' && $_GET['action'] == 'viewratings'}-->
	<!--{eval $navtitle = $comiis_lang['view49'];}-->
<!--{elseif ($_G['basescript'] == 'forum' || $_G['basescript'] == 'group') && CURMODULE == 'misc' && $_GET['action'] == 'viewattachpayments'}-->
	<!--{eval $navtitle = $comiis_lang['view46'];}-->
<!--{elseif $_G['basescript'] == 'misc' && CURMODULE == 'tag'}-->
	<!--{eval $navtitle = ($tagname ? $comiis_lang['view54'].' : '.$tagname : 'Tag '.$comiis_lang['view54']);}-->
<!--{elseif $_G['basescript'] == 'home' && CURMODULE == 'space' && $_GET['do'] == 'profile'}-->
	<!--{eval $navtitle = $comiis_lang['view58'];}-->
<!--{elseif ($_G['basescript'] == 'forum' || $_G['basescript'] == 'group') && CURMODULE == 'announcement'}-->
	<!--{eval $navtitle = $comiis_lang['view59'];}-->
<!--{elseif $_G['basescript'] == 'plugin' && CURMODULE == 'k_misign'}-->
	<!--{eval $navtitle = $comiis_lang['all61'];}-->
<!--{/if}-->