<?PHP exit('Access Denied');?>
<!--{if $_GET['action']=='newthread'}--><li class="comiis_stylitit b_b bg_e f_c">{lang post_message1}</li><!--{/if}-->
<input type="hidden" name="trade" value="yes" />
<input type="hidden" name="item_type" value="1" />
<!--{eval comiis_load('nc40v4alVc4Z4hh0CS', 'trade');}-->
<li class="styli_h bg_e b_b"></li>
<li class="comiis_styli comiis_flex b_b">
	<div class="styli_tit f_c">{lang post_trade_transport}</div>
	<div class="flex">
		<div class="comiis_login_select">
			<span class="inner">
				<i class="comiis_font f_d">&#xe60c;</i>
				<span class="z">
					<span class="comiis_question" id="transport_name"></span>
				</span>					
			</span>
			<select name="transport" id="transport" onchange="document.getElementById('logisticssetting').style.display = (document.getElementById('transport').value == 'virtual' ? 'none' : '');">
				<option value="virtual" {if $trade['transport'] == 3}selected="selected"{/if}>{lang post_trade_transport_virtual}</option>
				<option value="seller" {if $trade['transport'] == 1}selected="selected"{/if}>{lang post_trade_transport_seller}</option>
				<option value="buyer" {if $trade['transport'] == 2}selected="selected"{/if}>{lang post_trade_transport_buyer}</option>
				<option value="logistics" {if $trade['transport'] == 4}selected="selected"{/if}>{lang trade_type_transport_physical}</option>
				<option value="offline" {if $trade['transport'] == 0}selected="selected"{/if}>{lang post_trade_transport_offline}</option>
			</select>
		</div>	
	</div>
</li>
<div id="logisticssetting" style="display:{if !$trade['transport'] || $trade['transport'] == 3}none{/if}">
	<li class="comiis_styli comiis_flex b_b">
		<div class="styli_tit f_c">{lang post_trade_transport_mail}{$comiis_lang['post12']}</div>
		<div class="flex"><input type="text" name="postage_mail" id="postage_mail" class="comiis_input kmshow" value="$trade[ordinaryfee]" /></div>
		<div class="styli_r f_c">{lang trade_units}</div>
	</li>
	<li class="comiis_styli comiis_flex b_b">
		<div class="styli_tit f_c">{lang post_trade_transport_express}{$comiis_lang['post12']}</div>
		<div class="flex"><input type="text" name="postage_express" id="postage_express" class="comiis_input kmshow" value="$trade[expressfee]" /></div>
		<div class="styli_r f_c">{lang trade_units}</div>
	</li>
	<li class="comiis_styli comiis_flex b_b">
		<div class="styli_tit f_c">EMS{$comiis_lang['post12']}</div>
		<div class="flex"><input type="text" name="postage_ems" id="postage_ems" class="comiis_input kmshow" value="$trade[emsfee]" /></div>
		<div class="styli_r f_c">{lang trade_units}</div>
	</li>
</div>
<li class="comiis_styli comiis_flex b_b">
	<div class="styli_tit f_c">{lang post_trade_paymethod}</div>
	<div class="flex">
		<div class="comiis_login_select">
			<span class="inner">
				<i class="comiis_font f_d">&#xe60c;</i>
				<span class="z">
					<span class="comiis_question" id="paymethod_name"></span>
				</span>					
			</span>
			<select name="paymethod" id="paymethod" onchange="document.getElementById('tenpayseller').style.display = (document.getElementById('paymethod').value == '1' ? 'none' : '');">
				<!--{if $_G[setting][ec_tenpay_opentrans_chnid]}--><option value="0" {if $trade[tenpayaccount]}selected{/if}>{lang post_trade_paymethod_online}</option><!--{/if}-->
				<option value="1" {if !$trade[tenpayaccount]}selected{/if}>{lang post_trade_paymethod_offline}</option>
			</select>
		</div>	
	</div>
</li>
<li class="comiis_styli comiis_flex b_b" id="tenpayseller" style="{if !$trade[tenpayaccount]}display:none{/if}">
	<div class="styli_tit f_c">{lang post_trade_tenpay_seller}</div>
	<div class="flex"><input type="text" name="tenpay_account" id="tenpay_account" class="comiis_input kmshow" value="$trade[tenpayaccount]" /></div>
</li>
<li class="comiis_styli comiis_flex b_b" id="tenpayseller" style="{if !$trade[tenpayaccount]}display:none{/if}">
	<div class="styli_tit f_c">{lang valid_before}</div>
	<div class="flex"><input type="text" name="item_expiration" id="item_expiration" class="comiis_input kmshow comiis_dateshow_nt" autocomplete="off" value="$trade[expiration]" /></div>
	<div class="styli_r"><a href="javascript:;" onclick="$('.comiis_dateshow_nt').val('');"><i class="comiis_font f_g">&#xe647;</i></a></div>
</li>
<!--{eval comiis_load('ZqM1mEJX1ke1M2qqOm', 'trade');}-->
<!--{hook/post_trade_extra}-->