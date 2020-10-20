<?PHP exit('Access Denied');?>
<!--{if $_GET[action] == 'newthread'}-->
	<!--{eval comiis_load('vjQDtcjRJtc969jZJ2', '');}-->
<!--{elseif $_GET[action] == 'edit'}-->
	<!--{eval comiis_load('BrYriYsoLFboHjYOh5', 'isorigauthor,thread,rewardprice');}-->
<!--{/if}-->
<!--{if $_G['setting']['rewardexpiration'] > 0}-->
	<li class="comiis_stylino f_a b_b" style="font-size:13px;padding-bottom:12px;">$_G['setting']['rewardexpiration'] {lang post_reward_message}</li>
<!--{/if}-->
<!--{hook/post_reward_extra}-->
<script type="text/javascript" reload="1">
function getrealprice(price){
	if(!price.search(/^\d+$/) ) {
		n = Math.ceil(parseInt(price) + price * $_G['setting']['creditstax']);
		if(price > 32767) {
			$('#realprice').html('<span class="f_a">{lang reward_price_overflow}</span>');
		}<!--{if $_GET[action] == 'edit'}-->	else if(price < $rewardprice) {
			$('#realprice').html('<span class="f_a">{lang reward_cant_fall}</span>');
		}<!--{/if}--> else if(price < $_G['group']['minrewardprice'] || ($_G['group']['maxrewardprice'] > 0 && price > $_G['group']['maxrewardprice'])) {
			$('#realprice').html('<span class="f_a">{lang reward_price_bound}</span>');
		} else {
			$('#realprice').html(n);
		}
	}else{
		$('#realprice').html('<span class="f_a">{lang input_invalid}</span>');
	}
}
if($('#rewardprice').length > 0) {
	getrealprice($('#rewardprice').val());
}
</script>