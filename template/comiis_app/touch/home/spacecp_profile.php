<?PHP exit('Access Denied');?>
<!--{if !$validate && $operation != 'password'}-->
	<!--{eval include DISCUZ_ROOT.'./template/comiis_app/comiis/php/comiis_function.php';$htmls = comiis_readset($allowitems, $fieldid, $space, $vid);}-->
<!--{/if}-->
<!--{template common/header}-->
<script src="template/comiis_app/comiis/js/comiis_swiper.min.js?{VERHASH}"></script>
<!--{if $comiis_app_switch['comiis_subnv_top'] != 1}--><div style="height:40px;"><div class="comiis_scrollTop_box"><!--{/if}-->
<div class="comiis_top_sub bg_f">
	<div id="comiis_top_box" class="b_b">
		<div id="comiis_sub">
			<ul class="swiper-wrapper">
				<!--{loop $profilegroup $key $value}-->
					<!--{if $value[available]}-->
					<li class="swiper-slide{if $opactives[$key]} f_0{/if}">{if $opactives[$key]}<em class="bg_0"></em>{/if}<a href="home.php?mod=spacecp&ac=profile&op=$key"{if !$opactives[$key]} class="f_c"{/if}>$value[title]</a></li>
					<!--{/if}-->
				<!--{/loop}-->
				<!--{if $_G['setting']['allowspacedomain'] && $_G['setting']['domain']['root']['home'] && checkperm('domainlength')}-->
				<li class="swiper-slide{if $opactives[domain]} f_0{/if}">{if $opactives[domain]}<em class="bg_0"></em>{/if}<a href="home.php?mod=spacecp&ac=domain"{if !$opactives[domain]} class="f_c"{/if}>{lang space_domain}</a></li>
				<!--{/if}-->
				<!--{if $_G[setting][verify]}-->
					<!--{loop $_G['setting']['verify'] $vids $verify}-->
						<!--{if $verify['available'] && (empty($verify['groupid']) || in_array($_G['groupid'], $verify['groupid']))}-->
							<!--{if $vids != 7}-->
							<li class="swiper-slide{if $opactives['verify'.$vids]} f_0{/if}">{if $opactives['verify'.$vids]}<em class="bg_0"></em>{/if}<a href="home.php?mod=spacecp&ac=profile&op=verify&vid=$vids"{if !$opactives['verify'.$vids]} class="f_c"{/if}>$verify['title']</a></li>
							<!--{/if}-->
						<!--{/if}-->
					<!--{/loop}-->
				<!--{/if}-->
				<li class="swiper-slide{if $actives[password]} f_0{/if}">{if $actives[password]}<em class="bg_0"></em>{/if}<a href="home.php?mod=spacecp&ac=profile&op=password"{if !$actives[password]} class="f_c"{/if}>{lang password_security}</a></li>
			</ul>
		</div>
	</div>
</div>
<!--{if $comiis_app_switch['comiis_subnv_top'] != 1}--></div></div><!--{/if}-->
<script>
	<!--{eval}-->
	$_G['comiis_htmls'] = '';
	function comiis_replace_htmls($matches){
		global $_G;
		$_G['comiis_htmls'] = $matches[2];
		return '';
	}
	<!--{/eval}-->
	if($("#comiis_sub li.f_0").length > 0) {
		var comiis_index = $("#comiis_sub li.f_0").offset().left + $("#comiis_sub li.f_0").width() >= $(window).width() ? $("#comiis_sub li.f_0").index() : 0;
	}else{
		var comiis_index = 0;
	}
	mySwiper = new Swiper('#comiis_sub', {
		freeMode : true,
		slidesPerView : 'auto',
		initialSlide : comiis_index,
		onTouchMove: function(swiper){
			Comiis_Touch_on = 0;
		},
		onTouchEnd: function(swiper){
			Comiis_Touch_on = 1;
		},
	});
</script>
<!--{if $validate}-->
	<div class="comiis_tips bg_f b_b cl">
		<div class="comiis_quote bg_h f_b">{lang validator_comment}</div>
	</div>
	<form action="member.php?mod=regverify" method="post" autocomplete="off">
		<input type="hidden" value="{FORMHASH}" name="formhash" />
		<div class="comiis_crezz mt15 bg_f b_t cl">
			<li class="styli_tipt f_0 cl">{lang validator_remark}</li>
			<li class="comiis_styli b_b cl" style="padding-top:5px;font-size:14px;">$validate[remark]</li>
			<li class="comiis_flex comiis_styli b_b cl">
				<div class="styli_tit f_c">{lang validator_message}</div>
				<div class="flex"><input type="text" name="regmessagenew" value="" class="comiis_input" /></div>
			</li>
		</div>
		<div class="comiis_btnbox cl">
			<button type="submit" name="verifysubmit" value="true" class="comiis_btn bg_c f_f formdialog" />{lang validator_submit}</button>
		</div>
	</form>
<!--{else}-->
	<!--{if $operation == 'password'}-->
		<script type="text/javascript" src="{$_G[setting][jspath]}register.js?{VERHASH}"></script>
		<div class="comiis_tips bg_f b_b cl">
			<div class="comiis_quote bg_h f_b">
			<!--{if !$_G['member']['freeze']}-->
				<!--{if !$_G['setting']['connect']['allow'] || !$conisregister}-->{lang old_password_comment}<!--{elseif $wechatuser}-->{lang wechat_config_newpassword_comment}<!--{else}-->{lang connect_config_newpassword_comment}<!--{/if}-->
			<!--{elseif $_G['member']['freeze'] == 1}-->
				<strong class="f_a">{lang freeze_pw_tips}</strong>
			<!--{elseif $_G['member']['freeze'] == 2}-->
				<strong class="f_a">{lang freeze_email_tips}</strong>
			<!--{/if}-->
			</div>
		</div>
		<form action="home.php?mod=spacecp&ac=profile" method="post" autocomplete="off">
			<input type="hidden" value="{FORMHASH}" name="formhash" />
			<div class="comiis_crezz mt15 bg_f b_t cl">
				<!--{eval comiis_load('n0TTtyKna31yz5tyY1', 'conisregister,space');}-->
				<!--{if $_G['member']['freeze'] == 2}-->
				<li class="comiis_stylitit b_b bg_e f_c cl">{lang freeze_reason_comment}</li>
				<li class="comiis_styli cl">
					<textarea name="freezereson" placeholder="{lang freeze_reason}" class="comiis_pt">$space[freezereson]</textarea>
				</li>
				<!--{/if}-->
				<li class="comiis_stylitit b_b bg_e f_c cl">{lang security_question}</li>
				<li class="comiis_input_style comiis_styli b_b cl">
					<div class="comiis_login_select">
						<span class="inner">
							<i class="comiis_font f_d">&#xe60c;</i>
							<span class="z">
								<span class="comiis_question f_c" id="questionidnew_name">{lang memcp_profile_security_keep}</span>
							</span>					
						</span>
						<select id="questionidnew" name="questionidnew">
							<option value="" selected>{lang memcp_profile_security_keep}</option>
							<option value="0">{lang security_question_0}</option>
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
				<li class="comiis_flex comiis_styli b_b cl">
					<div class="styli_tit f_c">{lang security_answer}</div>
					<div class="flex"><input type="text" name="answernew" id="answernew" class="comiis_input" /></div>
				</li>
				<!--{if $secqaacheck || $seccodecheck}-->
				<li class="comiis_styli b_b cl">
					<!--{subtemplate common/seccheck}-->
				</li>
				<!--{/if}-->
			</div>
			<div class="comiis_btnbox cl">
				<button type="submit" name="pwdsubmit" value="true" class="comiis_btn bg_c f_f formdialog" />{lang save}</button>
			</div>
			<input type="hidden" name="passwordsubmit" value="true" />
		</form>
		<script type="text/javascript">
			var strongpw = new Array();
			<!--{if $_G['setting']['strongpw']}-->
				<!--{loop $_G['setting']['strongpw'] $key $val}-->
				strongpw[$key] = $val;
				<!--{/loop}-->
			<!--{/if}-->
			var pwlength = <!--{if $_G['setting']['pwlength']}-->$_G['setting']['pwlength']<!--{else}-->0<!--{/if}-->;
			checkPwdComplexity($('newpassword'), $('newpassword2'), true);
		</script>
	<!--{else}-->
		<!--{if $vid && ($_GET['op'] == 'verify' || $_GET['op'] == 'password')}-->
		<div class="comiis_tips bg_f b_b cl">
			<div class="comiis_quote bg_h f_b"><!--{if $showbtn}-->{lang spacecp_profile_message1}<!--{else}-->{lang spacecp_profile_message2}<!--{/if}--></div>
		</div>
		<!--{/if}-->
		<!--{eval comiis_load('zr6zxJmXYyQL6F1fF1', 'operation,settings,vid,privacy,space,htmls,allowcstatus,allowitems,showbtn,htmls');}-->
	<!--{/if}-->
<!--{/if}-->
<!--{eval $comiis_foot = 'no';}-->
<!--{template common/footer}-->