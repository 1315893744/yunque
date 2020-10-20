<?PHP exit('Access Denied');?>
<!--{template common/header}-->
<!--{if $_GET['op'] == 'delete'}-->
<div class="comiis_tip bg_f cl">
	<form method="post" autocomplete="off" id="doingform_{$doid}_{$id}" name="doingform" action="home.php?mod=spacecp&ac=doing&op=delete&doid=$doid&id=$id&spacenote=1">
		<!--{if $_G[inajax]}--><input type="hidden" name="handlekey" value="$_GET[handlekey]" /><!--{/if}-->
		<input type="hidden" name="referer" value="{echo dreferer()}" />
		<input type="hidden" name="formhash" value="{FORMHASH}" />
		<input type="hidden" name="deletesubmit" value="true" />
		<dt class="f_b"><p>{lang determine_delete_doing}</p></dt>
		<dd class="b_t cl">
            <!--{if $comiis_app_switch['comiis_post_btnwz'] == 1}-->
                <a href="javascript:;" onclick="popup.close();" class="tip_btn bg_f f_b">{lang cancel}</a>	
                <button type="submit" id="modsubmit" value="{lang determine}" class="tip_btn bg_f f_0"><span class="tip_lx">{lang determine}</span></button>
			<!--{else}-->
                <input type="submit" id="modsubmit" value="{lang determine}" class="tip_btn bg_f f_0">
                <a href="javascript:;" onclick="popup.close();" class="tip_btn bg_f f_b"><span class="tip_lx">{lang cancel}</span></a>	
			<!--{/if}-->
		</dd>
	</form>
</div>	
<!--{elseif $_GET['op'] == 'docomment' || $_GET['op'] == 'getcomment'}-->
	<!--{if helper_access::check_module('doing')}-->	
		<!--{eval comiis_load('WcaCqAZNNX1qq0a7cg', 'doid,id');}-->
	</div>
	<script>
	function strLenCalc(obj, checklen, maxlen) {
		var v = obj.value
		  , charlen = 0
		  , maxlen = !maxlen ? 200 : maxlen
		  , curlen = maxlen
		  , len = strlen(v);
		for (var i = 0; i < v.length; i++) {
			if (v.charCodeAt(i) < 0 || v.charCodeAt(i) > 255) {
				curlen -= charset == 'utf-8' ? 2 : 1;
			}
		}
		if (curlen >= len) {
			$('.'+checklen).text(curlen - len);
		} else {
	$('.'+checklen).text(0);
			obj.value = mb_cutstr(v, maxlen, 0);
		}
	}
	function strlen(str) {
		return str.length;
	}
	function mb_cutstr(str, maxlen, dot) {
		var len = 0;
		var ret = '';
		var dot = !dot ? '...' : dot;
		maxlen = maxlen - dot.length;
		for (var i = 0; i < str.length; i++) {
			len += str.charCodeAt(i) < 0 || str.charCodeAt(i) > 255 ? (charset == 'utf-8' ? 3 : 2) : 1;
			if (len > maxlen) {
				ret += dot;
				break;
			}
			ret += str.substr(i, 1);
		}
		return ret;
	}
	</script>
	<!--{/if}-->
<!--{/if}-->
<!--{template common/footer}-->