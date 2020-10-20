<?php echo '';exit;?>
<!--{template common/header}-->

<!--{if $comiis_app_switch['comiis_subnv_top'] != 1}--><div style="height:41px;"><div class="comiis_scrollTop_box"><!--{/if}-->
<div class="comiis_topnv bg_f b_b">
    <ul class="comiis_flex">
        <li class="flex{if empty($_GET[action])} f_0{/if}">{if empty($_GET[action])}<em class="bg_0"></em>{/if}<a href="home.php?mod=medal"{if !empty($_GET[action])} class="f_c"{/if}>{lang medals_center}</a></li>
        <li class="flex{if $_GET[action] == 'log'} f_0{/if}">{if $_GET[action] == 'log'}<em class="bg_0"></em>{/if}<a href="home.php?mod=medal&action=log"{if $_GET[action] != 'log'} class="f_c"{/if}>{lang my_medals}</a></li>
    </ul>
</div>
<!--{if $comiis_app_switch['comiis_subnv_top'] != 1}--></div></div><!--{/if}-->
<div class="styli_h10 bg_e b_b"></div>
<!--{if empty($_GET[action])}-->
    <!--{if $medallist}-->
				<!--{if $_G['uid']}-->
        			<!--{if $medalcredits}-->
						<div class="tbmu">
							{lang you_have_now}
							<!--{eval $i = 0;}-->
							<!--{loop $medalcredits $id}-->
								<!--{if $i != 0}-->, <!--{/if}-->{$_G['setting']['extcredits'][$id][img]} {$_G['setting']['extcredits'][$id][title]} <span class="xi1"><!--{echo getuserprofile('extcredits'.$id);}--></span> {$_G['setting']['extcredits'][$id][unit]}
								<!--{eval $i++;}-->
							<!--{/loop}-->
						</div>
					<!--{/if}-->
				<!--{/if}-->
					<div class="comiis_medalbox bg_f cl">
                      <!--{if $_G['uid']==0}-->
                     <div class="comiis_medaltip f_c cl"><a href="member.php?mod=logging&amp;action=login&amp;mobile=2">马上登录获取属于自己的勋章吧！^_^</a></div>
                      <!--{/if}-->
					<ul>
						<!--{loop $medallist $key $medal}-->
							<li class="bg_e">		
								<div id="medal_$medal[medalid]" class="medal_img"><a href="javascript:;" onclick="popup.open('<span class=\'comiis_medalshow\'><img src=\'{STATICURL}image/common/$medal[image]\' class=\'kmimg b_ok bg_e\'><em class=\'kmtit f16 f_0\'>$medal[name]</em><em class=\'kmtxt f12\'>$medal[description]</em><em class=\'mtn\' style=\'color:#ff9900;\'><!--{if $medal[expiration]}-->{lang expire} $medal[expiration] {lang days},<!--{/if}--><!--{if $medal[permission] && !$medal['price']}-->$medal[permission]<!--{else}--><!--{if $medal[type] == 0}-->{lang medals_type_0}<!--{elseif $medal[type] == 1}--><!--{if $medal['price']}--><!--{if {$_G['setting']['extcredits'][$medal[credit]][unit]}}-->{$_G['setting']['extcredits'][$medal[credit]][title]}<strong class=\'xi1 xw1 xs2\'>$medal[price]</strong> {$_G['setting']['extcredits'][$medal[credit]][unit]}<!--{else}--><strong class=\'xi1 xw1 xs2\'>$medal[price]</strong> {$_G['setting']['extcredits'][$medal[credit]][title]}<!--{/if}--><!--{else}-->{lang medals_type_1}<!--{/if}--><!--{elseif $medal[type] == 2}-->{lang medals_type_2}<!--{/if}--><!--{/if}--></em></span>', 'alerts');"><img src="{STATICURL}image/common/$medal[image]" alt="$medal[name]" class="vm" /></a></div>
								
								<p class="f14 medal_mytit">$medal[name]</p>
								<p>
									<!--{if in_array($medal[medalid], $membermedal)}-->
                                  	<a><i class="have">{lang space_medal_have}</i></a>
									<!--{else}-->
										<!--{if $medal[type] && $_G['uid']}-->
											<!--{if in_array($medal[medalid], $mymedals)}-->
												<!--{if $medal['price']}-->
													<a>{lang space_medal_purchased}</a>
												<!--{else}-->
													<!--{if !$medal[permission]}-->
														<a>{lang space_medal_applied}</a>
													<!--{else}-->
														<a>{lang space_medal_receive}</a>
													<!--{/if}-->
												<!--{/if}-->
											<!--{else}-->
												<a href="home.php?mod=medal&action=confirm&medalid=$medal[medalid]" class="xi2 {if $_G['uid']}dialog{else}n5app_wdlts{/if}">
													<!--{if $medal['price']}-->
														<i class="buy">{lang space_medal_buy}</i>
													<!--{else}-->
														<!--{if !$medal[permission]}-->
															<i class="apply">{lang medals_apply}</i>
														<!--{else}-->
															<i class="draw">{lang medals_draw}</i>
														<!--{/if}-->
													<!--{/if}-->
												</a>
											<!--{/if}-->
										<!--{/if}-->
									<!--{/if}-->
								</p>
							</li>
						<!--{/loop}-->
					</ul>
					</div>
    <!--{else}-->

        <!--{if $medallogs}-->
            <div class="comiis_notip comiis_sofa mt15 f_a cl">
                <i class="comiis_font comiis_tm cl">&#xe690;</i>
                <span>{lang medals_nonexistence}</span>
            </div>
        <!--{else}-->
            <div class="comiis_notip comiis_sofa mt15 cl">
                <i class="comiis_font f_e cl">&#xe613;</i>
                <span class="f_d">{lang medals_noavailable}</span>
            </div>
        <!--{/if}-->
    <!--{/if}-->
	
    <!--{if $lastmedals}-->
        <div class="styli_h10 bg_e b_t b_b"></div>
        <div class="comiis_uibox cl">
            <h2 class="b_b"><span class="f_c">{lang medals_record}</span></h2>    
            <div class="comiis_userlist01 cl">
                <ul>
                    <!--{loop $lastmedals $lastmedal}-->
                    <li class="b_t">
                    <a href="home.php?mod=space&uid=$lastmedal[uid]&do=profile" class="block">
                        <span class="list01_limg bg_e"><!--{avatar($lastmedal[uid],small)}--></span>
                        <p class="tit"><font class="y f12 f_e">$lastmedal[dateline]</font>$lastmedalusers[$lastmedal[uid]][username]</p>
                        <p class="txt f_d">{lang medals_message2}{$medallist[$lastmedal['medalid']]['name']}{lang medals}</p>
                    </a>
                    </li>
                    <!--{/loop}-->                    
                </ul>
            </div>
        </div>
    <!--{/if}-->
	
	
	
	
<!--{elseif $_GET[action] == 'log'}-->
    <!--{if $mymedals}-->
        <div class="comiis_medalbox bg_f cl">
            <ul>
            <!--{loop $mymedals $mymedal}-->                
                <li class="bg_e">
                    <div class="medal_img"><img src="{STATICURL}image/common/$mymedal[image]" alt="$mymedal[name]" class="vm" /></div>
                    <p class="f14 medal_mytit">$mymedal[name]</p>
                </li>
            <!--{/loop}-->
            </ul>
        </div>
    <!--{/if}-->
    <!--{if $medallogs}-->
        <div class="styli_h10 bg_e b_t b_b"></div>
        <div class="comiis_uibox cl">
            <h2 class="b_b"><span class="f_c">{lang medals_record}</span></h2>    
            <div class="comiis_userlist01 cl">
                <ul>
                    <!--{loop $medallogs $medallog}-->
                    <li class="b_t f13 f_b">
                        <!--{if $medallog['type'] == 2 || $medallog['type'] == 3}-->
                            $medallog[dateline] {lang medals_message4} <span class="f_ok">$medallog[name]</span> {lang medals},<!--{if $medallog['type'] == 2}-->{lang medals_operation_2}<!--{elseif $medallog['type'] == 3}-->{lang medals_operation_3}<!--{/if}-->
                        <!--{elseif $medallog['type'] != 2 && $medallog['type'] != 3}-->
                            $medallog[dateline] {lang medals_message5} <span class="f_ok">$medallog[name]</span> {lang medals},<!--{if $medallog[expiration]}-->{lang expire}: $medallog[expiration]<!--{else}-->{lang medals_noexpire}<!--{/if}-->
                        <!--{/if}-->
                    </li>
                    <!--{/loop}-->                  
                </ul>
            </div>
        </div>
        <!--{if $multipage}--><div class="comiis_pgs cl">$multipage</div><!--{/if}-->
    <!--{else}-->
        <div class="comiis_notip comiis_sofa mt15 cl">
            <i class="comiis_font f_e cl">&#xe613;</i>
            <span class="f_d">{lang medals_nonexistence_own}</span>
        </div>
    <!--{/if}-->
<!--{/if}-->
<!--{eval $comiis_foot = 'no';}-->
<!--{template common/footer}-->