<?PHP exit('Access Denied');?>
<!--{template common/header}-->
<!--{if $comiis_app_switch['comiis_subnv_top'] != 1}--><div style="height:41px;"><div class="comiis_scrollTop_box"><!--{/if}-->
<div class="comiis_topnv bg_f b_b">
	<ul class="comiis_flex">
		<li class="flex{if $opactives[base]} f_0{/if}">{if $opactives[base]}<em class="bg_0"></em>{/if}<a href="home.php?mod=spacecp&ac=credit&op=base"{if !$opactives[base]} class="f_c"{/if}>{lang my}</a></li>
		<li class="flex{if $opactives[log]} f_0{/if}">{if $opactives[log]}<em class="bg_0"></em>{/if}<a href="home.php?mod=spacecp&ac=credit&op=log"{if !$opactives[log]} class="f_c"{/if}>{lang doing}</a></li>
		<!--{if $_G[setting][transferstatus] && $_G['group']['allowtransfer']}-->
		<li class="flex{if $opactives[transfer]} f_0{/if}">{if $opactives[transfer]}<em class="bg_0"></em>{/if}<a href="home.php?mod=spacecp&ac=credit&op=transfer"{if !$opactives[transfer]} class="f_c"{/if}>{lang transfer_credits}</a></li>
		<!--{/if}-->
		<!--{if $_G[setting][exchangestatus]}-->
		<li class="flex{if $opactives[exchange]} f_0{/if}">{if $opactives[exchange]}<em class="bg_0"></em>{/if}<a href="home.php?mod=spacecp&ac=credit&op=exchange"{if !$opactives[exchange]} class="f_c"{/if}>{lang exchange_credits}</a></li>
		<!--{/if}-->
		<!--{if $comiis_app_switch['comiis_jifenurl']}-->
            <li class="flex"><a href="{$comiis_app_switch['comiis_jifenurl']}" class="f_c">{lang buy_credits}</a></li>
		<!--{else}-->
            <!--{if $_G[setting][ec_ratio] && ($_G[setting][ec_account] || $_G[setting][ec_tenpay_opentrans_chnid] || $_G[setting][ec_tenpay_bargainor]) || $_G['setting']['card']['open']}-->
            <li class="flex{if $opactives[buy]} f_0{/if}">{if $opactives[buy]}<em class="bg_0"></em>{/if}<a href="home.php?mod=spacecp&ac=credit&op=buy"{if !$opactives[buy]} class="f_c"{/if}>{lang buy_credits}</a></li>
            <!--{/if}-->
		<!--{/if}-->
	</ul>
</div>
<!--{if $comiis_app_switch['comiis_subnv_top'] != 1}--></div></div><!--{/if}-->
<!--{if in_array($_GET['op'], array('base', 'buy', 'transfer', 'exchange'))}-->
	<div class="comiis_creditl cl">
	<!--{eval $creditid=0;}-->
	<!--{if  $_GET['op'] == 'base'}-->
		<h2 class="bg_0 f_f cl">{lang credits}: <span>$_G['member']['credits']</span><p class="comiis_tm">$creditsformulaexp</p></h2>		
	<!--{/if}-->
		<ul>
		<!--{if $_GET['op'] == 'base' && $_G['setting']['creditstrans']}-->
			<!--{eval $creditid=$_G['setting']['creditstrans'];}-->
			<!--{if $_G['setting']['extcredits'][$creditid]}-->
			<!--{eval $credit=$_G['setting']['extcredits'][$creditid]; }-->
			<li class="bg_f b_b"><span><!--{if $credit[img]}--> {$credit[img]}<!--{/if}--> {$credit[title]}: </span><!--{echo getuserprofile('extcredits'.$creditid);}--> {$credit[unit]} &nbsp;
			<!--{if $comiis_app_switch['comiis_jifenurl']}-->
                <a href="{$comiis_app_switch['comiis_jifenurl']}" class="f_a y">{lang card_use} <i class="comiis_font f14">&#xe60c;</i></a>
            <!--{else}-->
                <!--{if ($_G['setting']['ec_ratio'] && ($_G['setting']['ec_tenpay_opentrans_chnid'] || $_G['setting'][ec_tenpay_bargainor] || $_G['setting']['ec_account'])) || $_G['setting']['card']['open']}--><a href="home.php?mod=spacecp&ac=credit&op=buy" class="f_a y">{lang card_use} <i class="comiis_font f14">&#xe60c;</i></a><!--{/if}--></li>
                <!--{/if}-->
			<!--{/if}-->
		<!--{/if}-->
		<!--{loop $_G['setting']['extcredits'] $id $credit}-->
			<!--{if $id!=$creditid}-->
			<li class="bg_f b_b"><span><!--{if $credit[img]}--> {$credit[img]}<!--{/if}--> {$credit[title]}: </span><!--{echo getuserprofile('extcredits'.$id);}--> {$credit[unit]}</li>
			<!--{/if}-->
		<!--{/loop}-->
		</ul>
	</div>
<!--{/if}-->
<!--{if $_GET['op'] == 'buy'}-->
	<!--{if ($_G[setting][ec_ratio] && ($_G[setting][ec_account] || $_G[setting][ec_tenpay_opentrans_chnid] || $_G[setting][ec_tenpay_bargainor])) || $_G[setting][card][open]}-->
	<form id="addfundsform" name="addfundsform" method="post" autocomplete="off" action="home.php?mod=spacecp&ac=credit&op=buy">
		<input type="hidden" name="formhash" value="{FORMHASH}" />
		<input type="hidden" name="addfundssubmit" value="true" />
		<input type="hidden" name="handlekey" value="buycredit" />				
		<div class="comiis_crezz mt15 bg_f b_t cl">					
			<li class="comiis_styli cl">{lang mode_of_payment}:</li>
			<li class="comiis_flex styli_tip b_b cl comiis_paybox">
				<!--{if $_G[setting][ec_ratio] && $_G[setting][ec_account]}-->
				<div class="flex">
					<input name="bank_type" type="radio" value="alipay" id="apitype_alipay" $ecchecked onclick="alipay();" checked="true"/><label id="apitype_alipay_pic" onclick="alipay();" for="apitype_alipay" class="comiis_ecbuy_img b_ok b_0"><i class="comiis_font comiis_payico f_qq">&#xe661;</i></label>
				</div>
				<!--{/if}-->
				<!--{if $_G[setting][ec_ratio] && ($_G[setting][ec_tenpay_bargainor] || $_G[setting][ec_tenpay_opentrans_chnid])}-->
				<div class="flex">
					<input type='radio' onClick='alipays();' name='bank_type' id='comiis_qqpay' value='0' /><label for='comiis_qqpay' class="comiis_ecbuy_img b_ok" id="apitype_alipays_pic"><i class="comiis_font comiis_payico f_a">&#xe660;</i></label>
				</div>
				<!--{/if}-->
				<!--{if $_G[setting][card][open]}-->
				<div class="flex">
					<input name="bank_type" type="radio" value="card" id="apitype_card" $ecchecked  onclick="activatecardbox();" /><label id="apitype_card_pic" onclick="activatecardbox();" class="comiis_ecbuy_img f_wb b_ok"><i class="comiis_font comiis_jfpayico f_wb">&#xe65e;</i>{lang card_credit}</label>
				</div>
				<!--{/if}-->
			</li>
			<!--{if $_G[setting][card][open]}-->
				<li class="comiis_flex comiis_styli b_b cl" id="cardbox" style="{if $_G[setting][card][open] && $ecchecked}display:;{else}display:none;{/if}">
					<div class="styli_tit f_c">{lang card}</div><div class="flex"><input type="text" class="comiis_input" id="cardid" name="cardid" /></div>
				</li>
			<!--{if $seccodecheck}-->
				<li class="comiis_styli b_b cl" id="card_box_sec" style="{if $_G[setting][card][open] && $ecchecked}display:;{else}display:none;{/if}">
					<!--{subtemplate common/seccheck}-->
				</li>
			<!--{/if}-->
			<!--{/if}-->	
			<div id="paybox" style="{if ($_G[setting][ec_tenpay_bargainor] || $_G[setting][ec_tenpay_opentrans_chnid] || $_G[setting][ec_account]) && empty($ecchecked) }display:;{else}display:none;{/if}">
				<li class="comiis_flex comiis_styli cl">
					<div class="styli_tit f_c">{lang memcp_credits_addfunds}</div>
					<div class="flex">
						<input type="text" class="comiis_input b_b" style="width:20%;" id="addfundamount" name="addfundamount" value="0" onkeyup="addcalcredit()" />
						&nbsp;{$_G[setting][extcredits][$_G[setting][creditstrans]][title]}&nbsp;
						{lang credits_need}&nbsp;{lang memcp_credits_addfunds_caculate_radio}
					</div>
				</li>
				<li class="styli_tip b_b cl">
					<div class="f_a cl">
						{lang memcp_credits_addfunds_rules_ratio} = {$_G[setting][ec_ratio]} {$_G[setting][extcredits][$_G[setting][creditstrans]][unit]}{$_G[setting][extcredits][$_G[setting][creditstrans]][title]}
						<!--{if $_G[setting][ec_mincredits]}-->, {lang memcp_credits_addfunds_rules_min} {$_G[setting][ec_mincredits]} {$_G[setting][extcredits][$_G[setting][creditstrans]][unit]}{$_G[setting][extcredits][$_G[setting][creditstrans]][title]}<!--{/if}-->
						<!--{if $_G[setting][ec_maxcredits]}-->, {lang memcp_credits_addfunds_rules_max} {$_G[setting][ec_maxcredits]} {$_G[setting][extcredits][$_G[setting][creditstrans]][unit]}{$_G[setting][extcredits][$_G[setting][creditstrans]][title]}<!--{/if}-->
						<!--{if $_G[setting][ec_maxcreditspermonth]}-->, {lang memcp_credits_addfunds_rules_month} {$_G[setting][ec_maxcreditspermonth]} {$_G[setting][extcredits][$_G[setting][creditstrans]][unit]}{$_G[setting][extcredits][$_G[setting][creditstrans]][title]}<!--{/if}-->
					</div>					
				</li>
			</div>
		</div>				
		<div class="comiis_btnbox cl">
			<button type="submit" name="addfundssubmit_btn" id="addfundssubmit_btn" class="comiis_btn bg_c f_f formdialog" value="true" comiis="pay">{lang memcp_credits_addfunds}</button>
		</div>				
	</form>
	<span style="display: none" id="return_addfundsform"></span>
	<script type="text/javascript">
		function addcalcredit() {
			var addfundamount = document.getElementById('addfundamount').value.replace(/^0/, '');
			var addfundamount = parseInt(addfundamount);
			document.getElementById('desamount').innerHTML = !isNaN(addfundamount) ? Math.ceil(((addfundamount / $_G[setting][ec_ratio]) * 100)) / 100 : 0;
		}		
		<!--{if $_G[setting][ec_ratio] && ($_G[setting][ec_tenpay_bargainor] || $_G[setting][ec_tenpay_opentrans_chnid])}-->
		function alipays(){
		{if $_G[setting][card][open]}
			document.getElementById('cardbox').style.display='none';
		{/if}
			if(document.getElementById('card_box_sec')){
				document.getElementById('card_box_sec').style.display='none';
			}
			document.getElementById('paybox').style.display='';
			$('.comiis_paybox label').removeClass('b_0');
			$('#apitype_alipays_pic').addClass('b_0');
		}		
		<!--{/if}-->		
		<!--{if $_G[setting][ec_ratio] && $_G[setting][ec_account]}-->
		function alipay(){
		{if $_G[setting][card][open]}
			document.getElementById('cardbox').style.display='none';
		{/if}
			if(document.getElementById('card_box_sec')){
				document.getElementById('card_box_sec').style.display='none';
			}
			document.getElementById('paybox').style.display='';
			$('.comiis_paybox label').removeClass('b_0');
			$('#apitype_alipay_pic').addClass('b_0');
		}
		<!--{/if}-->		
		<!--{if $_G[setting][card][open]}-->
		function activatecardbox() {
			document.getElementById('apitype_card').checked=true;
			document.getElementById('cardbox').style.display='';
			if(document.getElementById('card_box_sec')){
				document.getElementById('card_box_sec').style.display='';
			}
			document.getElementById('paybox').style.display='none';
			$('.comiis_paybox label').removeClass('b_0');
			$('#apitype_card_pic').addClass('b_0');
		}
		<!--{/if}-->
	</script>
	<!--{/if}-->
<!--{elseif $_GET['op'] == 'transfer'}-->
	<!--{if $_G[setting][transferstatus] && $_G['group']['allowtransfer']}-->
	<form id="transferform" name="transferform" method="post" autocomplete="off" action="home.php?mod=spacecp&ac=credit&op=transfer">
		<input type="hidden" name="formhash" value="{FORMHASH}" />
		<input type="hidden" name="transfersubmit" value="true" />
		<input type="hidden" name="handlekey" value="transfercredit" />
		<div class="comiis_crezz mt15 bg_f b_t cl">
			<li class="comiis_flex comiis_styli cl">
				<div class="styli_tit f_c">{lang memcp_credits_transfer}</div>
				<div class="flex">
					<input type="text" name="transferamount" id="transferamount" class="comiis_input b_b" style="width:20%;" value="0" />
					<span class="f_c">&nbsp;{$_G[setting][extcredits][$_G[setting][creditstransextra][9]][title]}&nbsp;{lang credits_give}&nbsp;</span>
					<input type="text" name="to" id="to" class="comiis_input b_b" style="width:50%;" />
				</div>
			</li>
			<li class="styli_tip b_b cl">
				<div class="f_a cl">
					{lang memcp_credits_transfer_min_balance} $_G[setting][transfermincredits]{$_G[setting][extcredits][$_G[setting][creditstransextra][9]][unit]}<!--{if intval($taxpercent) > 0}-->, {lang credits_tax} $taxpercent<!--{/if}-->
				</div>					
			</li>
			<li class="comiis_flex comiis_styli b_b cl">
				<div class="styli_tit f_c">{lang transfer_login_password}<span class="f_g">*</span></div><div class="flex"><input type="password" name="password" class="comiis_input" value="" /></div>
			</li>
			<li class="comiis_flex comiis_styli b_b cl">
				<div class="styli_tit f_c">{lang credits_transfer_message}</div><div class="flex"><input type="text" name="transfermessage" class="comiis_input" /></div>
			</li>
		</div>
		<div class="comiis_btnbox cl">
			<button type="submit" name="transfersubmit_btn" id="transfersubmit_btn" class="comiis_btn bg_c f_f formdialog" value="true">{lang memcp_credits_transfer}</button>
			<span style="display:none" id="return_transfercredit"></span>
		</div>
	</form>
	<!--{/if}-->
<!--{elseif $_GET['op'] == 'exchange'}-->
	<!--{if $_G[setting][exchangestatus] && ($_G[setting][extcredits] || $_CACHE['creditsettings'])}-->
	<form id="exchangeform" name="exchangeform" method="post" autocomplete="off" action="home.php?mod=spacecp&ac=credit&op=exchange&handlekey=credit">
		<input type="hidden" name="formhash" value="{FORMHASH}" />
		<input type="hidden" name="operation" value="exchange" />
		<input type="hidden" name="exchangesubmit" value="true" />
		<input type="hidden" name="outi" value="" />
		<div class="comiis_crezz mt15 bg_f b_t cl">
			<li class="comiis_flex comiis_styli cl">
				<div class="styli_tit f_c">{lang memcp_credits_exchange}</div>
				<div class="flex">
					<input type="text" id="exchangeamount" name="exchangeamount" class="comiis_input b_b" style="width:18%;padding-left:4px;" value="0" onkeyup="exchangecalcredit()" />
					<select name="tocredits" id="tocredits" class="bg_f b_ok" onChange="exchangecalcredit()">
					<!--{loop $_G[setting][extcredits] $id $ecredits}-->
						<!--{if $ecredits[allowexchangein] && $ecredits[ratio]}-->
							<option value="$id" unit="$ecredits[unit]" title="$ecredits[title]" ratio="$ecredits[ratio]">$ecredits[title]</option>
						<!--{/if}-->
					<!--{/loop}-->
					<!--{eval $i=0;}-->

					<!--{loop $_CACHE['creditsettings'] $id $data}--><!--{eval $i++;}-->
						<!--{if $data[title]}-->
						<option value="$id" outi="$i">$data[title]</option>
						<!--{/if}-->
					<!--{/loop}-->
					</select>
					&nbsp;{lang credits_need}&nbsp;
					<input type="text" id="exchangedesamount" class="comiis_input b_b" style="width:18%;padding-left:4px;" value="0" readonly="readonly" />
					<select name="fromcredits" id="fromcredits_0" class="bg_f b_ok" style="display: none" onChange="exchangecalcredit();">
					<!--{loop $_G[setting][extcredits] $id $credit}-->
						<!--{if $credit[allowexchangeout] && $credit[ratio]}-->
							<option value="$id" unit="$credit[unit]" title="$credit[title]" ratio="$credit[ratio]">$credit[title]</option>
						<!--{/if}-->
					<!--{/loop}-->
					</select>
					<!--{eval $i=0;}-->
					<!--{loop $_CACHE['creditsettings'] $id $data}--><!--{eval $i++;}-->
						<select name="fromcredits_$i" id="fromcredits_$i" class="ps" style="display: none" onChange="exchangecalcredit()">
						<!--{loop $data[creditsrc] $id $ratio}-->
							<option value="$id" unit="$_G['setting']['extcredits'][$id][unit]" title="$_G['setting']['extcredits'][$id][title]" ratiosrc="$data[ratiosrc][$id]" ratiodesc="$data[ratiodesc][$id]">$_G['setting']['extcredits'][$id][title]</option>
						<!--{/loop}-->
						</select>
					<!--{/loop}-->
					<script type="text/javascript">
						var tocredits = document.getElementById('tocredits');
						var fromcredits = document.getElementById('fromcredits_0');
						if(fromcredits.length > 1 && tocredits.value == fromcredits.value) {
							fromcredits.selectedIndex = tocredits.selectedIndex + 1;
						}
					</script>
			</li>
			<li class="styli_tip b_b cl">
				<div class="f_a cl">
					<!--{if $_G[setting][exchangemincredits]}-->{lang memcp_credits_exchange_min_balance} $_G[setting][exchangemincredits]<!--{/if}--><span id="taxpercent"><!--{if intval($taxpercent) > 0}-->, {lang credits_tax} $taxpercent<!--{/if}--></span>
				</div>					
			</li>
			<li class="comiis_flex comiis_styli b_b cl">
				<div class="styli_tit f_c">{lang transfer_login_password}<span class="f_g">*</span></div><div class="flex"><input type="password" name="password" class="comiis_input" value="" /></div>
			</li>
		</div>
		<div class="comiis_btnbox cl">
			<button type="submit" name="exchangesubmit_btn" id="exchangesubmit_btn" class="comiis_btn bg_c f_f formdialog" value="true" tabindex="2">{lang memcp_credits_exchange}</button>
		</div>
	</form>
	<script type="text/javascript">
		function exchangecalcredit() {
			with(document.getElementById('exchangeform')) {
				tocredit = tocredits[tocredits.selectedIndex];
				if(!tocredit) {
					return;
				}
				<!--{eval $i=0;}-->
				<!--{loop $_CACHE['creditsettings'] $id $data}--><!--{eval $i++;}-->
					document.getElementById('fromcredits_$i').style.display = 'none';
				<!--{/loop}-->
				if(tocredit.getAttribute('outi')) {
					outi.value = tocredit.getAttribute('outi');
					fromcredit = document.getElementById('fromcredits_' + tocredit.getAttribute('outi'));
					document.getElementById('taxpercent').style.display = document.getElementById('fromcredits_0').style.display = 'none';
					fromcredit.style.display = '';
					fromcredit = fromcredit[fromcredit.selectedIndex];
					document.getElementById('exchangeamount').value = document.getElementById('exchangeamount').value.toInt();
					if(document.getElementById('exchangeamount').value != 0) {
						document.getElementById('exchangedesamount').value = Math.floor( fromcredit.getAttribute('ratiosrc') / fromcredit.getAttribute('ratiodesc') * document.getElementById('exchangeamount').value);
					} else {
						document.getElementById('exchangedesamount').value = '';
					}
				} else {
					outi.value = 0;
					document.getElementById('taxpercent').style.display = document.getElementById('fromcredits_0').style.display = '';
					fromcredit = fromcredits[fromcredits.selectedIndex];
					document.getElementById('exchangeamount').value = document.getElementById('exchangeamount').value.toInt();
					if(fromcredit.getAttribute('title') != tocredit.getAttribute('title') && document.getElementById('exchangeamount').value != 0) {
						if(tocredit.getAttribute('ratio') < fromcredit.getAttribute('ratio')) {
							document.getElementById('exchangedesamount').value = Math.ceil( tocredit.getAttribute('ratio') / fromcredit.getAttribute('ratio') * document.getElementById('exchangeamount').value * (1 + $_G[setting][creditstax]));
						} else {
							document.getElementById('exchangedesamount').value = Math.floor( tocredit.getAttribute('ratio') / fromcredit.getAttribute('ratio') * document.getElementById('exchangeamount').value * (1 + $_G[setting][creditstax]));
						}
					} else {
						document.getElementById('exchangedesamount').value = '';
					}
				}
			}
		}
		String.prototype.toInt = function() {
			var s = parseInt(this);
			return isNaN(s) ? 0 : s;
		}
		exchangecalcredit();
	</script>
	<!--{/if}-->
<!--{/if}-->
<!--{eval $comiis_foot = 'no';}-->
<!--{template common/footer}-->