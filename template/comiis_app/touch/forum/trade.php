<?PHP exit('Access Denied');?>
<!--{template common/header}-->
<div class="comiis_spbox_top cl">
<script type="text/javascript">
var feevalue = 0;
zoomstatus = parseInt($_G[setting][zoomstatus]);
<!--{if $trade[price] > 0}-->var price = $trade[price];<!--{/if}-->
<!--{if $_G['setting']['creditstransextra'][5] != -1 && $trade[credit]}-->var credit = $trade[credit];var currentcredit = <!--{echo getuserprofile('extcredits'.$_G['setting']['creditstransextra'][5])}-->;<!--{/if}-->
</script>
<form method="post" autocomplete="off" id="tradepost" name="tradepost" action="forum.php?mod=trade&action=trade&tid=$_G[tid]&pid=$pid">
	<input type="hidden" name="formhash" value="{FORMHASH}" />
	<!--{eval comiis_load('BpZ12z1R9Yyz1yTP6s', 'trade,usertrade,tradelog,lastbuyerinfo');}-->
</form>
<script type="text/javascript">
function calcsum() {
	<!--{if $trade[price] > 0}-->document.getElementById('caculate').innerHTML = (price * document.getElementById('tradepost').number.value + feevalue);<!--{/if}-->
	<!--{if $_G['setting']['creditstransextra'][5] != -1 && $trade[credit]}-->
		v = (credit * document.getElementById('tradepost').number.value + feevalue);
		if(v > currentcredit) {
			document.getElementById('crediterror').innerHTML = '{lang trade_buy_crediterror}';
			document.getElementById('tradesubmit').disabled = true;
		} else {
			document.getElementById('crediterror').innerHTML = '';
		}
		document.getElementById('caculatecredit').innerHTML = v;
	<!--{/if}-->
}
calcsum();
</script>
<!--{eval comiis_load('xQDkw2xA22KwCCLu06', 'usertrades,trade');}-->
</div>
<!--{eval $comiis_foot = 'no';}-->
<!--{template common/footer}-->