<?php echo 'Zheng Ban QQ:3383288270';exit;?>
<!--{template common/header}-->

<!--{if !$_GET['infloat']}-->

<!-- header start -->
<header class="header">
    <div class="nav">
        <a href="javascript:;" onclick="history.go(-1)" class="z"><img src="{STATICURL}image/mobile/images/icon_back.png" /></a>
		<span>{lang login}</span>
    </div>
</header>
<!-- header end -->

<!--{/if}-->

{eval $loginhash = 'L'.random(4);}

<!-- userinfo start -->
<div class="loginbox <!--{if $_GET[infloat]}-->login_pop<!--{/if}-->">
	<!--{if $_GET[infloat]}-->
		<h2 class="log_tit"><a href="javascript:;" onclick="popup.close();"><span class="icon_close y">&nbsp;</span></a>{lang login}</h2>
	<!--{/if}-->
		<form id="loginform" method="post" action="member.php?mod=logging&action=login&loginsubmit=yes&loginhash=$loginhash&mobile=2" onsubmit="{if $_G['setting']['pwdsafety']}pwmd5('password3_$loginhash');{/if}" >
		<input type="hidden" name="formhash" id="formhash" value='{FORMHASH}' />
		<input type="hidden" name="referer" id="referer" value="<!--{if dreferer()}-->{echo dreferer()}<!--{else}-->forum.php?mobile=2<!--{/if}-->" />
		<input type="hidden" name="fastloginfield" value="username">
		<input type="hidden" name="cookietime" value="2592000">
		<!--{if $auth}-->
			<input type="hidden" name="auth" value="$auth" />
		<!--{/if}-->
	<div class="login_from">
		<ul>
			<li><input type="text" value="" tabindex="1" class="px p_fre" size="30" autocomplete="off" value="" name="username" placeholder="{lang inputyourname}" fwin="login"></li>
			<li><input type="password" tabindex="2" class="px p_fre" size="30" value="" name="password" placeholder="{lang login_password}" fwin="login"></li>
			<li class="questionli">
				<div class="login_select">
				<span class="login-btn-inner">
					<span class="login-btn-text">
						<span class="span_question">{lang security_question}</span>
					</span>
					<span class="icon-arrow">&nbsp;</span>
				</span>
				<select id="questionid_{$loginhash}" name="questionid" class="sel_list">
					<option value="0" selected="selected">{lang security_question}</option>
					<option value="1">{lang security_question_1}</option>
					<option value="2">{lang security_question_2}</option>
					<option value="3">{lang security_question_3}</option>
					<option value="4">{lang security_question_4}</option>
					<option value="5">{lang security_question_5}</option>
					<option value="6">{lang security_question_6}</option>
					<option value="7">{lang security_question_7}</option>
				</select>
				</div>
			</li>
			<li class="bl_none answerli" style="display:none;"><input type="text" name="answer" id="answer_{$loginhash}" class="px p_fre" size="30" placeholder="{lang security_a}"></li>
		</ul>
		<!--{if $seccodecheck}-->
		<!--{subtemplate common/seccheck}-->
		<!--{/if}-->
	</div>
	<div class="btn_login"><button tabindex="3" value="true" name="submit" type="submit" class="formdialog pn pnc"><span>{lang login}</span></button></div>
	</form>
	<!--{if $_G['setting']['connect']['allow'] && !$_G['setting']['bbclosed']}-->
	<p class="hm">{lang useqqconnectlogin}</p>
	<div class="btn_qqlogin"><a href="$_G[connect][login_url]&statfrom=login_simple">{lang qqconnect:connect_mobile_login}</a></div>
	<!--{/if}-->
	<!--{if $_G['setting']['regstatus']}-->
	<p class="reg_link hm"><a href="member.php?mod={$_G[setting][regname]}">{lang noregister}</a></p>
	<!--{/if}-->
	<!--{hook/logging_bottom_mobile}-->
</div>
<!-- userinfo end -->

<!--{if $_G['setting']['pwdsafety']}-->
	<script type="text/javascript" src="{$_G['setting']['jspath']}md5.js?{VERHASH}" reload="1"></script>
<!--{/if}-->
<!--{eval updatesession();}-->

<script type="text/javascript">
	(function() {
		$(document).on('change', '.sel_list', function() {
			var obj = $(this);
			$('.span_question').text(obj.find('option:selected').text());
			if(obj.val() == 0) {
				$('.answerli').css('display', 'none');
				$('.questionli').addClass('bl_none');
			} else {
				$('.answerli').css('display', 'block');
				$('.questionli').removeClass('bl_none');
			}
		});
	 })();
</script>

<!--{template common/footer}-->
<!--
	[Zheng Ban URL]
	https://addon.dismall.com/?@wubian
-->
