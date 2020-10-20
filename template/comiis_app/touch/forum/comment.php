<?PHP exit('Access Denied');?>
<!--{template common/header}-->
<div class="comiis_gosx_title bg_e b_b cl"><span class="y"><i class="comiis_font f_d" onclick="popup.close();">&#xe639;</i></span><span class="f_c">{$comiis_app_switch['comiis_view_dianping_name']}<span></div>
<div class="bg_f" style="padding-top:12px;">
	<form method="post" autocomplete="off" id="commentform" action="forum.php?mod=post&action=reply&comment=yes&tid=$post[tid]&pid=$_GET[pid]&extra=$extra{if !empty($_GET[page])}&page=$_GET[page]{/if}&commentsubmit=yes&infloat=yes">
		<input type="hidden" name="formhash" id="formhash" value="{FORMHASH}" />
		<input type="hidden" name="handlekey" value="$_GET['handlekey']" />
		<div class="comiis_mood_inputbox bg_e cl">
			<div class="comiis_mood_input cl">
				<textarea class="comiis_pt message" name="message" id="commentmessage" onkeyup="strLenCalc(this, 'checklen')"></textarea>
			</div>
		</div>
		<!--{if $secqaacheck || $seccodecheck}-->
		<div class="comiis_spdp_sec b_b">
			<!--{subtemplate common/seccheck}-->
		</div>
		<!--{/if}-->
		<div class="comiis_mood_btn b_b cl">
			<button type="submit" id="commentsubmit" value="true" name="commentsubmit" class="formdialog comiis_sendbtn bg_c f_f y">{lang publish}</button>
			<span class="f_d">{lang comment_message1} <strong class="checklen">200</strong> {lang comment_message2}</span>
		</div>
	</form>
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
<!--{template common/footer}-->