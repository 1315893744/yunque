<?PHP exit('Access Denied');?>
<!--{template common/header}-->
<div class="comiis_spbox_top cl">
	<form method="post" autocomplete="off" id="tradepost" name="tradepost" action="forum.php?mod=trade&orderid=$orderid">
	<!--{if !empty($_G['gp_modthreadkey'])}-->
		<input type="hidden" name="modthreadkey" value="$_G[gp_modthreadkey]" />
	<!--{/if}-->
	<!--{if !empty($_G['gp_tid'])}-->
		<input type="hidden" name="tid" value="$_G[gp_tid]" />
	<!--{/if}-->
	<input type="hidden" name="formhash" value="{FORMHASH}" />
	<div class="comiis_spbox_order bg_0 cl">
		<h2 class="f_f">{lang status}</h2>
		<p class="f_f">{echo str_replace(array('font color'), array('font colorss'), $tradelog[statusview]);} ($tradelog[lastupdate])</p>
		<!--{if trade_typestatus('successtrades', $tradelog[status]) || trade_typestatus('refundsuccess', $tradelog[status])}-->
			<!--{if $tradelog[ratestatus] == 3}-->
				<p class="f_f"><i class="comiis_font z">&#xe688;</i>{lang eccredit_post_between}</p>
			<!--{elseif ($_G['uid'] == $tradelog[buyerid] && $tradelog[ratestatus] == 1) || ($_G['uid'] == $tradelog[sellerid] && $tradelog[ratestatus] == 2)}-->
				<p class="f_f"><i class="comiis_font z">&#xe688;</i>{lang eccredit_post_waiting}</p>
			<!--{else}-->
				<!--{if ($_G['uid'] == $tradelog[buyerid] && $tradelog[ratestatus] == 2) || ($_G['uid'] == $tradelog[sellerid] && $tradelog[ratestatus] == 1)}-->
				<p class="f_f"><i class="comiis_font z">&#xe688;</i>{lang eccredit_post_already}</p>
				<!--{/if}-->
				<!--{if $_G['uid'] == $tradelog[buyerid]}-->
				<p class="mt5 mb5 cl"><a href="home.php?mod=spacecp&ac=eccredit&op=rate&orderid=$tradelog[orderid]&type=0" class="bg_f f_0 z"><i class="comiis_font z">&#xe688;</i>{lang eccredit1}</a></p>
				<!--{elseif $_G['uid'] == $tradelog[sellerid]}-->
				<p class="mt5 mb5 cl"><a href="home.php?mod=spacecp&ac=eccredit&op=rate&orderid=$tradelog[orderid]&type=1" class="bg_f f_0 z"><i class="comiis_font z">&#xe688;</i>{lang eccredit1}</a></p>
				<!--{/if}-->
			<!--{/if}-->
		<!--{/if}-->
	</div>
	<!--{if $tradelog['transport'] != 3 && !($tradelog[status] == 0 && $tradelog[buyerid] == $_G['uid'])}-->
	<div class="comiis_spbox_add bg_f b_t b_b f_b cl">	
		<i class="comiis_font f_c z">&#xe670;</i>
		<h2><span class="y">{if $tradelog[buyerphone]}$tradelog[buyerphone]{/if} {if $tradelog[buyerphone] && $tradelog[buyermobile]}/{/if} {if $tradelog[buyermobile]}$tradelog[buyermobile]{/if}</span>
		{$comiis_lang['tip75']}: $tradelog[buyername]</h2>
		<p>{lang trade_buyercontact}: {if $tradelog[buyercontact]}$tradelog[buyercontact]{else}{lang none}{/if} {if $tradelog[buyerzip]}($tradelog[buyerzip]){/if}</p>
	</div>
	<!--{/if}-->	
	<!--{if $tradelog[offline] && $offlinenext}-->
	<div class="comiis_pltit bg_f b_t b_b mt10 cl">	
		<h2><i class="comiis_font f_c z">&#xe655;</i> {$comiis_lang['tip76']}</h2>
	</div>
	<div class="comiis_spbox_txt bg_f cl">
		<ul>
			<li class="b_b f_c"><input id="password" name="password" type="password" class="comiis_input" placeholder="{lang trade_password}" /></li>
			<li class="b_b f_c"><input id="buyermsg" id="message" name="message" class="comiis_input" placeholder="{lang trade_message}" /></li>
		</ul>
	</div>
	<div class="comiis_p12 bg_f b_b cl" style="padding-bottom:0;">
		<!--{loop $offlinenext $nextid $nextbutton}-->
		<button type="button" onclick="$('#offlinestatus').val('$nextid');$('#offlinesubmit').trigger('click');"  class="comiis_btn bg_c f_f mb12">$nextbutton</button>
		<!--{/loop}-->
		<input type="hidden" name="offlinestatus" value="" id="offlinestatus" />
		<input type="hidden" name="offlinesubmit" value="1" />
		<input type="submit" id="offlinesubmit" style="display: none" class="formdialog" />
	</div>
	<!--{/if}-->	
	<div class="comiis_pltit bg_f b_t mt10 cl">	
		<h2><i class="comiis_font f_c z">&#xe687;</i> {$comiis_lang['tip77']}</h2>
	</div>	
	<div class="comiis_splist bg_f b_t cl">
		<ul>
			<li>
				<a href="forum.php?mod=viewthread&do=tradeinfo&tid=$trade[tid]&pid=$trade[pid]">
					<span class="splist_img bg_e">
						<!--{if $trade['aid']}-->
							<img src="{echo getforumimg($trade[aid])}">
						<!--{else}-->
							<div class="comiis_notip bg_e b_ok cl" title="$usertrade[subject]">
								<i class="comiis_font f_e cl">&#xe627;</i>
								<em class="f_d">{$comiis_lang['tip69']}</em>
							</div>
						<!--{/if}-->
					</span>
					<p class="splist_box b_t">
						<span class="splist_tit">$tradelog[subject]</span>
						<span class="splist_txt f_d">
							<!--{if $tradelog[number]}--><em class="y">x $tradelog[number]</em><!--{/if}-->
							<em class="z"><!--{if $tradelog['quality'] == 1}-->{lang trade_new}<!--{/if}--><!--{if $tradelog['quality'] == 2}-->{lang trade_old}<!--{/if}-->{lang trade_type_buy}</em>
						</span>
					</p>					
					<p class="splist_price">					
						<!--{if $tradelog[price] > 0}--><span class="f_a">&yen; <em>$tradelog[price]</em> {lang payment_unit}</span><!--{/if}-->
						<!--{if $_G['setting']['creditstransextra'][5] != -1 && $tradelog[credit]}-->
							<!--{if $tradelog[price] > 0}--> <span class="f_d">{lang trade_additional} <!--{else}--><span class="f_a"><!--{/if}--><em>$tradelog[credit]</em>&nbsp;{$_G[setting][extcredits][$_G['setting']['creditstransextra'][5]][unit]}{$_G[setting][extcredits][$_G['setting']['creditstransextra'][5]][title]}</span>
						<!--{/if}-->
					</p>			
				</a>
			</li>
		</ul>
	</div>
	<!--{eval comiis_load('XbDHBHzCc6eBF6gTtJ', 'tradelog,orderid,loginurl');}-->
	</form>
	<!--{eval comiis_load('uf6fO77ZFe5P1a15Jz', 'tradelog,messagelist,usertrades,trade');}-->
</div>
<!--{eval $comiis_foot = 'no';}-->
<!--{template common/footer}-->