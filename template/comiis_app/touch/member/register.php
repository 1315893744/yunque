<?PHP exit('Access Denied');?>
<!--{template common/header}-->
<!--{if $comiis_app_switch['comiis_reg_ico']==0 && $comiis_app_switch['comiis_reg_tit']==0}-->
<style>.styli_zico .styli_tit {padding-right:0;}</style>
<!--{elseif $comiis_app_switch['comiis_reg_tit']==0}-->
<style>.styli_zico .styli_tit i {padding-right:0;}</style>
<!--{/if}-->
<!--{if $_GET['mod']=='connect'}-->
<div class="comiis_qq_tbox">
	<div class="comiis_space_info bg_0 f_f" style="overflow:hidden;">
		<div class="comiis_space_tx{if $comiis_app_switch['comiis_space_header']==1} comiis_space_txv1{/if}" style="padding-bottom:18px;">
			<div class="user_img"><img src="{$_G[connect][avatar_url]}/$_G['qc']['connect_app_id']/$_G['qc']['connect_openid']"></div>
			<h2>Hi, {$_G['member']['username']}</h2>
			<p>{$comiis_lang['reg15']}</p>
		</div>
	</div>
	<div class="comiis_topnv bg_f b_b">
		<ul class="comiis_flex">
			<li class="flex{if $_GET['ac']!='bind'} kmon{/if}" id="comiis_qqtab1"><a href="javascript:;"{if $_GET['ac']!='bind'} class="b_0 f_0"{/if}>{$comiis_lang['reg22']}</a></li>
			<li class="flex{if $_GET['ac']=='bind'} kmon{/if}" id="comiis_qqtab2"><a href="javascript:;"{if $_GET['ac']=='bind'} class="b_0 f_0"{/if}>{$comiis_lang['reg16']}</a></li>
		</ul>
	</div>
	<div class="comiis_qq_fbox{if $_GET['ac']=='bind'} comiis_qq_fboxs{/if}">
		<div class="comiis_login_from mt15 cl" style="margin:0;">
			<form method="post" autocomplete="off" name="register" id="registerform"  enctype="multipart/form-data" action="member.php?mod=connect">
				<input type="hidden" name="agreebbrule" value="$bbrulehash" id="agreebbrule" checked="checked" />
				<input type="hidden" name="formhash" value="{FORMHASH}" />
				<input type="hidden" name="referer" value="{$_G['qc']['dreferer']}" />
				<input type="hidden" id="auth_hash" name="auth_hash" value="{$_G['qc']['connect_auth_hash']}" />
				<input type="hidden" id="is_notify" name="is_notify" value="{$_G['qc']['connect_is_notify']}" />
				<input type="hidden" id="is_feed" name="is_feed" value="{$_G['qc']['connect_is_feed']}" />
				<input type="hidden" name="activationauth" value="{if $_GET[action] == 'activation'}$activationauth{/if}" />
				<input type="hidden" name="{$_G['setting']['reginput']['email']}" value="QQ_{$_G['timestamp']}@qq.com">
				<input type="hidden" id="password" tabindex="2" class="comiis_input kmshow" value="" name="{$_G['setting']['reginput']['password']}" fwin="login">
				<input type="hidden" id="password2" tabindex="3" class="comiis_input kmshow" value="" name="{$_G['setting']['reginput']['password2']}" fwin="login">
				<input type="hidden" name="use_qzone_avatar_qqshow" value="1"/>				
				<input type="hidden" name="regsubmit" value="true">	
                <ul class="bg_f b_t b_b">
                    <li class="comiis_flex qqli styli_zico f16">
                        <div class="styli_tit"><!--{if $comiis_app_switch['comiis_reg_ico']==1}--><i class="comiis_font f_d">&#xe61e</i><!--{/if}--><!--{if $comiis_app_switch['comiis_reg_tit']==1}-->{$comiis_lang['tip295']}<!--{/if}--></div>
                        <div class="flex"><input id="{$_G['setting']['reginput']['username']}" name="{$_G['setting']['reginput']['username']}" type="text" value="$_G['member']['username']" autocomplete="off" placeholder="{$comiis_lang['inputyourname']}" class="comiis_input"></div>
                    </li>
                    <!--{eval require_once DISCUZ_ROOT.'./template/comiis_app/comiis/php/comiis_function.php';}-->
                    <!--{loop $_G['cache']['fields_register'] $field}-->
                    <!--{if $htmls[$field['fieldid']] && $field['required']}-->
                    <!--{if stripos($htmls[$field['fieldid']], 'residedistrictbox') || stripos($htmls[$field['fieldid']], 'birthdistrictbox') || stripos($htmls[$field['fieldid']], 'textarea') || stripos($htmls[$field['fieldid']], 'radio') || stripos($htmls[$field['fieldid']], 'checkbox')}-->				
                    <li class="styli_zico qqli f15" style="padding-bottom:5px;">
                        <div class="styli_tit">
                            <!--{if $comiis_app_switch['comiis_reg_ico']==1}-->
                                <!--{if $field['fieldid']=='birthcity'}-->
                                    <i class="comiis_font f_d">&#xe6b4</i>
                                <!--{elseif $field['fieldid']=='residecity'}-->
                                    <i class="comiis_font f_d">&#xe6b4</i>
                                <!--{elseif $field['fieldid']=='interest'}-->
                                    <i class="comiis_font f_d">&#xe668</i>
                                <!--{elseif $field['fieldid']=='bio'}-->
                                    <i class="comiis_font f_d">&#xe655</i>
                                <!--{else}-->
                                    <i class="comiis_font f_d">&#xe632</i>
                                <!--{/if}-->
                            <!--{/if}-->
                            $field[title]<!--{if $field['required']}--><span class="f_g">*</span><!--{/if}-->
                        </div>
                    </li>
                    <!--{/if}-->
                    <!--{if stripos($htmls[$field['fieldid']], 'residedistrictbox') || stripos($htmls[$field['fieldid']], 'birthdistrictbox') || stripos($htmls[$field['fieldid']], 'textarea') || stripos($htmls[$field['fieldid']], 'radio') || stripos($htmls[$field['fieldid']], 'checkbox')}-->
                    <li class="hauto qqli comiis_flex b_t f15">
                    <!--{else}-->
                    <li class="styli_zico qqli comiis_flex b_t f15">
                    <!--{/if}-->
                        <!--{if !stripos($htmls[$field['fieldid']], 'residedistrictbox') && !stripos($htmls[$field['fieldid']], 'birthdistrictbox') && !stripos($htmls[$field['fieldid']], 'textarea') && !stripos($htmls[$field['fieldid']], 'radio') && !stripos($htmls[$field['fieldid']], 'checkbox')}-->
                        <div class="styli_tit">
                            <!--{if $comiis_app_switch['comiis_reg_ico']==1}-->
                                <!--{if $field['fieldid']=='gender'}-->
                                    <i class="comiis_font f_d">&#xe6c3</i>
                                <!--{elseif $field['fieldid']=='birthday'}-->
                                    <i class="comiis_font f_d">&#xe6d3</i>
                                <!--{elseif $field['fieldid']=='realname'}-->
                                    <i class="comiis_font f_d">&#xe61e</i>
                                <!--{elseif $field['fieldid']=='telephone'}-->
                                    <i class="comiis_font f_d">&#xe6b6</i>
                                <!--{elseif $field['fieldid']=='mobile'}-->
                                    <i class="comiis_font f_d">&#xe684</i>
                                <!--{elseif $field['fieldid']=='idcardtype'}-->
                                    <i class="comiis_font f_d">&#xe924</i>
                                <!--{elseif $field['fieldid']=='idcard'}-->
                                    <i class="comiis_font f_d">&#xe655</i>
                                <!--{elseif $field['fieldid']=='address'}-->
                                    <i class="comiis_font f_d">&#xe6b4</i>
                                <!--{elseif $field['fieldid']=='zipcode'}-->
                                    <i class="comiis_font f_d">&#xe614</i>
                                <!--{elseif $field['fieldid']=='graduateschool'}-->
                                    <i class="comiis_font f_d">&#xe662</i>
                                <!--{elseif $field['fieldid']=='education'}-->
                                    <i class="comiis_font f_d">&#xe6ca</i>
                                <!--{elseif $field['fieldid']=='company'}-->
                                    <i class="comiis_font f_d">&#xe662</i>
                                <!--{elseif $field['fieldid']=='occupation'}-->
                                    <i class="comiis_font f_d">&#xe924</i>
                                <!--{elseif $field['fieldid']=='position'}-->
                                    <i class="comiis_font f_d">&#xe924</i>
                                <!--{elseif $field['fieldid']=='revenue'}-->
                                    <i class="comiis_font f_d">&#xe6cb</i>
                                <!--{elseif $field['fieldid']=='affectivestatus'}-->
                                    <i class="comiis_font f_d">&#xe60e</i>
                                <!--{elseif $field['fieldid']=='lookingfor'}-->
                                    <i class="comiis_font f_d">&#xe638</i>
                                <!--{elseif $field['fieldid']=='bloodtype'}-->
                                    <i class="comiis_font f_d">&#xe7f9</i>
                                <!--{elseif $field['fieldid']=='alipay'}-->
                                    <i class="comiis_font f_d">&#xe6d9</i>
                                <!--{elseif $field['fieldid']=='qq'}-->
                                    <i class="comiis_font f_d">&#xe6a1</i>
                                <!--{elseif $field['fieldid']=='taobao'}-->
                                    <i class="comiis_font f_d">&#xe6d7</i>
                                <!--{elseif $field['fieldid']=='site'}-->
                                    <i class="comiis_font f_d">&#xe662</i>
                                <!--{elseif $field['fieldid']=='nationality'}-->
                                    <i class="comiis_font f_d">&#xe6d5</i>
                                <!--{elseif $field['fieldid']=='residesuite'}-->
                                    <i class="comiis_font f_d">&#xe806</i>
                                <!--{elseif $field['fieldid']=='height'}-->
                                    <i class="comiis_font f_d">&#xe6d6</i>
                                <!--{elseif $field['fieldid']=='weight'}-->
                                    <i class="comiis_font f_d">&#xe6d4</i>
                                <!--{else}-->
                                    <i class="comiis_font f_d">&#xe632</i>
                                <!--{/if}-->
                            <!--{/if}-->
                            <!--{if $comiis_app_switch['comiis_reg_tit']==1}-->$field[title]<!--{if $field['required']}--><span class="f_g">*</span><!--{/if}--><!--{/if}-->
                        </div>
                        <!--{/if}-->
                        <div class="flex{if stripos($htmls[$field['fieldid']], 'residedistrictbox')} comiis_residedistrictbox bg_e{elseif stripos($htmls[$field['fieldid']], 'birthdistrictbox')} comiis_birthdistrictbox bg_e{elseif stripos($htmls[$field['fieldid']], 'residedistrictbox') || stripos($htmls[$field['fieldid']], 'birthdistrictbox') || stripos($htmls[$field['fieldid']], 'textarea') || stripos($htmls[$field['fieldid']], 'radio') || stripos($htmls[$field['fieldid']], 'checkbox')} bg_e{/if}">
                        <!--{if $field['fieldid']=='birthday'}-->
                            <span class="y"><!--{echo str_replace('class="ps"', 'class="bg_f b_ok comiis_stylino"', $htmls[$field['fieldid']]);}--></span>
                        <!--{elseif stripos($htmls[$field['fieldid']], 'input')}-->
                            <!--{if stripos($htmls[$field['fieldid']], 'radio') || stripos($htmls[$field['fieldid']], 'checkbox')}-->
                                <!--{echo comiis_read_setting($field['fieldid'], array(), false, false, true);}-->
                            <!--{else}-->
                                <!--{echo str_replace(array('class="px"','class="pr"','class="pf"'), array('class="comiis_input kmshow" placeholder="'.$comiis_lang['reg30'].$field[title].'"','class="kmshow" placeholder="'.$comiis_lang['reg30'].$field[title].'"','class="kmshow" placeholder="'.$comiis_lang['reg30'].$field[title].'"'), preg_replace('/<p>(.*?)<\/p>/', '', $htmls[$field['fieldid']]));}-->
                            <!--{/if}-->
                        <!--{elseif stripos($htmls[$field['fieldid']], 'textarea')}-->
                            <!--{echo str_replace(array('class="pt"'), array('class="comiis_pxs kmshow" placeholder="'.$comiis_lang['reg30'].$field[title].'"'), preg_replace('/<p>(.*?)<\/p>/', '', $htmls[$field['fieldid']]));}-->
                        <!--{elseif stripos($htmls[$field['fieldid']], 'select')}-->
                            <!--{if stripos($htmls[$field['fieldid']], 'residedistrictbox')}-->
                                <div class="comiis_login_select comiis_styli">
                                    <span class="inner">
                                        <i class="comiis_font f_d">&#xe60c</i>
                                        <span class="z">
                                            <span class="comiis_residedistrictbox_text f_c"></span>
                                        </span>					
                                    </span>
                                    <!--{echo str_replace(array('class="ps"', '&nbsp;'), array('class="comiis_residedistrictbox"', ''), $htmls[$field['fieldid']]);}-->
                                </div>
                                <script>$('.comiis_residedistrictbox_text').text($('.comiis_residedistrictbox').find('option:selected').text());</script>
                            <!--{else}-->
                                <div class="comiis_login_select{if stripos($htmls[$field['fieldid']], 'birthdistrictbox')} comiis_styli{/if}">
                                    <span class="inner">
                                        <i class="comiis_font f_d">&#xe60c</i>
                                        <span class="z">
                                            <span class="comiis_question_{$field['fieldid']} f_c"></span>
                                        </span>					
                                    </span>
                                    <!--{echo str_replace(array('class="ps"', '&nbsp;'), array('class="comiis_sel_list_'.$field['fieldid'].'"', ''), $htmls[$field['fieldid']]);}-->
                                </div>
                                <script>
                                $('.comiis_question_{$field['fieldid']}').text($('.comiis_sel_list_{$field['fieldid']}').find('option:selected').text());
                                $(document).on('change', '.comiis_sel_list_{$field['fieldid']}', function() {
                                    $('.comiis_question_{$field['fieldid']}').text($(this).find('option:selected').text());
                                });
                                </script>
                            <!--{/if}-->
                        <!--{else}-->
                            {$htmls[$field['fieldid']]}
                        <!--{/if}-->
                        </div>
                    </li>
                    <!--{/if}-->
                    <!--{/loop}-->
                    <!--{if $this->setting['regverify'] == 2}-->
                        <li class="comiis_flex qqli styli_zico b_t f16">
                            <div class="styli_tit"><!--{if $comiis_app_switch['comiis_reg_ico']==1}--><i class="comiis_font f_d">&#xe6d1</i><!--{/if}--><!--{if $comiis_app_switch['comiis_reg_tit']==1}-->{lang register_message}<span class="f_g">*</span><!--{/if}--></div>
                            <div class="flex"><input type="text" name="regmessage" autocomplete="off" tabindex="6" class="comiis_input kmshow" value="" placeholder="{$comiis_lang['reg30']}{lang register_message}" fwin="login"></div>
                        </li>
                    <!--{/if}-->                   
                </ul>	
				<div class="comiis_btnbox btn_register"><button value="true" name="regsubmit" type="submit" id="registerformsubmit" class="formdialog comiis_btn bg_c f_f">{$comiis_lang['reg17']}</button></div>
			</form>
		</div>
		<!--{eval $loginhash = 'L'.random(4);}-->
		<div class="comiis_login_from mt15 cl" style="margin:0;">
			<form method="post" autocomplete="off" name="login" id="loginform_$loginhash" action="member.php?mod=connect&action=login&loginsubmit=yes{if !empty($_GET['handlekey'])}&handlekey=$_GET[handlekey]{/if}&loginhash=$loginhash">
            <!--{eval comiis_load('mSuVGOYzUV0eVzOZoG', 'loginhash');}-->
				<li class="comiis_flex qqli styli_zico f16 b_t">
                    <div class="styli_tit"><!--{if $comiis_app_switch['comiis_reg_ico']==1}--><i class="comiis_font f_d">&#xe6d1</i><!--{/if}--><!--{if $comiis_app_switch['comiis_reg_tit']==1}-->{$comiis_lang['tip296']}<!--{/if}--></div>
                    <div class="flex">			
						<div class="comiis_input_style">
						  <div class="comiis_login_select">
							<span class="inner">
							  <i class="comiis_font f_d">&#xe60c</i>
							  <span class="z">
								<span class="comiis_question" id="questionid_{$loginhash}_name"></span>
							  </span>					
							</span>
							<select id="questionid_{$loginhash}" name="questionid" class="comiis_security_list">
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
						</div>
					</div>		
				</li>
                <li class="comiis_security_input qqli styli_zico b_t f16" style="display:none;">
                    <div class="comiis_flex">
                        <div class="styli_tit"><!--{if $comiis_app_switch['comiis_reg_ico']==1}--><i class="comiis_font f_d">&#xe655</i><!--{/if}--><!--{if $comiis_app_switch['comiis_reg_tit']==1}-->{$comiis_lang['reg18']}<!--{/if}--></div>
                        <div class="flex">
                            <input type="text" name="answer" id="answer_{$loginhash}" placeholder="{$comiis_lang['reg19']}" class="comiis_input">
                        </div>
                    </div>
                </li>
				</ul>
				<div class="comiis_btnbox"><button type="submit" name="loginsubmit" value="true" class="comiis_btn bg_c f_f">{$comiis_lang['reg20']}</button></div>
			</form>
		</div>
	</div>
	<script>
		$('#comiis_qqtab1,#comiis_qqtab2').on("click", function() {
			if($(this).attr('id') == 'comiis_qqtab1'){
				$('.comiis_qq_fbox').removeClass('comiis_qq_fboxs');
			}else{
				$('.comiis_qq_fbox').addClass('comiis_qq_fboxs');
			}
			$('.comiis_flex li').removeClass('kmon');
			$('.comiis_flex li a').removeClass('b_0').removeClass('f_0');
			$(this).addClass('kmon').find('a').addClass('b_0').addClass('f_0');
		});
		$(document).on('change', '.comiis_security_list', function() {
			if($(this).val() == 0) {
				$('.comiis_security_input').css('display', 'none');
			} else {
				$('.comiis_security_input').css('display', 'block');
			}
		});
	</script>
<!--{else}-->
	<!--{if $_GET['agreement'] == 'yes' && $bbrules}-->	
		<div id="comiis_agreement">
			<div class="comiis_fwtk f_b cl">
				{$bbrulestxt}		
			</div>
			<a href="member.php?mod={$_G[setting][regname]}" class="comiis_btn bg_c f_f">{$comiis_lang['reg5']}</a>	
		</div>	
		<script>$('.comiis_head h2').html("{lang rulemessage}");</script>
	<!--{else}-->
    <!--{if $comiis_app_switch['comiis_reg_bg'] == 1}-->
    <style>
        <!--{if $comiis_app_switch['comiis_reg_bg_img']}-->
        body.comiis_bodybg {background:#333 url({$comiis_app_switch['comiis_reg_bg_img']}) !important;background-size:cover;}
        <!--{else}-->
        body.comiis_bodybg {background:#333;}
        #comiis_bgstretcher {background: black;overflow: hidden;width: 100%;position: fixed !important;z-index: -1;}
        #comiis_bgstretcher, #comiis_bgstretcher UL, #comiis_bgstretcher UL LI {position: absolute;top: 0;right: 0;left: 0;bottom: 0;}
        <!--{/if}-->
        <!--{if $comiis_app_switch['comiis_reg_bg_head'] == 1}-->
        #comiis_head .comiis_head {background:none !important;}
        #comiis_head .comiis_head h2 {display:none;}
        <!--{elseif $comiis_app_switch['comiis_reg_bg_head'] == 2}-->
        #comiis_head {display:none;}
        <!--{/if}-->
        .comiis_reg_bg {padding-bottom:30px;padding-top:{if $comiis_app_switch['comiis_reg_bg_head'] == 0 || $comiis_isweixin == 1}40{else}0{/if}px;margin-top:0px;}
        .comiis_reg_bg .comiis_login_logo {margin:0 auto;text-align:center;}
        .comiis_reg_bg .comiis_login_logo img {width:56%;max-width:230px;}
        .comiis_reg_bg .comiis_login_logo .logo_img {width:22%;max-width:90px;box-shadow:0 0 10px rgba(255, 255, 255, 0.4);border-radius:10px;}
        .comiis_reg_bg .comiis_login_from, .comiis_reg_bg .comiis_reg_link {margin:0 25px;}
        .comiis_reg_bg .comiis_btnbox {padding:25px 25px 15px;}
        .comiis_reg_bg .comiis_login_from li, .comiis_login_from div.b_b {border-bottom:1px solid rgba(255,255,255,0.3) !important;}
        .comiis_reg_bg .comiis_login_from li.qqli {padding:10px 0;}
        .comiis_reg_bg .comiis_login_from input, .comiis_reg_bg .comiis_login_from select, .comiis_reg_bg a, .comiis_reg_bg .f_a, .comiis_reg_bg .f_c, .comiis_reg_bg .f_d, .comiis_reg_bg .f_0, .comiis_reg_bg .comiis_login_from .f_ok {color:#fff !important;}
        .comiis_reg_bg .comiis_login_from .f13 i {filter:alpha(opacity=0);-moz-opacity:0;-khtml-opacity:0;opacity:0;}
        .comiis_reg_bg .comiis_log_dsf, .comiis_reg_bg .comiis_log_ico {margin-bottom:0;}
        .comiis_reg_bg .comiis_log_line, .comiis_reg_bg .comiis_log_line .f_c, .comiis_login_from div.bg_e, .comiis_login_from li.hauto div.bg_e {background:none !important;}
        div[style*="padding:0 15px 15px"] {display:none;}
        #comiis_head .b_b {border-bottom:none !important}        
    </style>
    <!--{/if}-->
    <div class="comiis_loginbox{if $comiis_app_switch['comiis_reg_bg'] == 1} comiis_reg_bg f_f{/if}">
        <!--{if $comiis_isweixin == 1 && $comiis_app_switch['comiis_reg_regtxt'] && $comiis_app_switch['comiis_reg_bg'] != 1}--><div class="comiis_login_tit">{$comiis_app_switch['comiis_reg_regtxt']}</div><!--{/if}-->
        <!--{if $comiis_app_switch['comiis_reg_bg'] == 1 && $comiis_app_switch['comiis_reg_bg_logo']}--><div class="comiis_login_logo">{$comiis_app_switch['comiis_reg_bg_logo']}</div><!--{/if}-->
		<script>
			function showdistrict(container, elems, totallevel, changelevel, containertype) {						
				var getdid = function(elem) {
					var op = elem.options[elem.selectedIndex];
					return op['did'] || op.getAttribute('did') || '0';
				};
				var pid = changelevel >= 1 && elems[0] && $(elems[0]) ? getdid(document.getElementById(elems[0])) : 0;
				var cid = changelevel >= 2 && elems[1] && $(elems[1]) ? getdid(document.getElementById(elems[1])) : 0;
				var did = changelevel >= 3 && elems[2] && $(elems[2]) ? getdid(document.getElementById(elems[2])) : 0;
				var coid = changelevel >= 4 && elems[3] && $(elems[3]) ? getdid(document.getElementById(elems[3])) : 0;
				var url = 'home.php?mod=misc&ac=ajax&op=district&container='+container+'&containertype='+containertype
					+'&province='+elems[0]+'&city='+elems[1]+'&district='+elems[2]+'&community='+elems[3]
					+'&pid='+pid + '&cid='+cid+'&did='+did+'&coid='+coid+'&level='+totallevel+'&handlekey='+container+'&inajax=1'+(!changelevel ? '&showdefault=1' : '');
				$.ajax({
					type : 'GET',
					url : url,
					dataType : 'xml'
				}).success(function(s) {
					var rehtml = s.lastChild.firstChild.nodeValue;
					rehtml = rehtml.replace('<select name="'+elems[0]+'"', '<div class="comiis_login_select comiis_styli"><span class="inner"><i class="comiis_font f_d">&#xe60c</i><span class="z"><span class="'+elems[0]+'_text f_c"></span></span></span><select name="'+elems[0]+'"');
					rehtml = rehtml.replace('<select name="'+elems[1]+'"', '<div class="comiis_login_select comiis_selectli b_t"><span class="inner"><i class="comiis_font f_d">&#xe60c</i><span class="z"><span class="'+elems[1]+'_text f_c"></span></span></span><select name="'+elems[1]+'"');
					rehtml = rehtml.replace('<select name="'+elems[2]+'"', '<div class="comiis_login_select comiis_selectli b_t"><span class="inner"><i class="comiis_font f_d">&#xe60c</i><span class="z"><span class="'+elems[2]+'_text f_c"></span></span></span><select name="'+elems[2]+'"');
					rehtml = rehtml.replace('<select name="'+elems[3]+'"', '<div class="comiis_login_select comiis_selectli b_t"><span class="inner"><i class="comiis_font f_d">&#xe60c</i><span class="z"><span class="'+elems[3]+'_text f_c"></span></span></span><select name="'+elems[3]+'"');
					rehtml = rehtml.replace(/&nbsp;/g, '');
					rehtml = rehtml.replace(/<\/select>/g, '</select></div>');
					$('.comiis_'+container).html(rehtml);
					$('.'+elems[0]+'_text').text($('#'+elems[0]).find('option:selected').text());
					$('.'+elems[1]+'_text').text($('#'+elems[1]).find('option:selected').text());
					$('.'+elems[2]+'_text').text($('#'+elems[2]).find('option:selected').text());
					$('.'+elems[3]+'_text').text($('#'+elems[3]).find('option:selected').text());
				});
			}
			function showbirthday(){
				var el = document.getElementById('birthday');
				var birthday = el.value;
				el.length=0;
				el.options.add(new Option('{$comiis_lang['all15']}', ''));
				for(var i=0;i<28;i++){
					el.options.add(new Option(i+1, i+1));
				}
				if(document.getElementById('birthmonth').value!="2"){
					el.options.add(new Option(29, 29));
					el.options.add(new Option(30, 30));
					switch(document.getElementById('birthmonth').value){
						case "1":
						case "3":
						case "5":
						case "7":
						case "8":
						case "10":
						case "12":{
							el.options.add(new Option(31, 31));
						}
					}
				} else if(document.getElementById('birthyear').value!="") {
					var nbirthyear=document.getElementById('birthyear').value;
					if(nbirthyear%400==0 || (nbirthyear%4==0 && nbirthyear%100!=0)) el.options.add(new Option(29, 29));
				}
				el.value = birthday;
			}
		</script>	
		<div class="comiis_post_from{if ($comiis_isweixin == 1 && $comiis_app_switch['comiis_reg_regtxt']) || $comiis_app_switch['comiis_reg_bg'] == 1} mt15{/if} cl">
			<div class="comiis_login_from{if $comiis_isweixin == 1 && $comiis_app_switch['comiis_reg_regtxt'] && $comiis_app_switch['comiis_reg_bg'] != 1} bg_f b_t{/if}"{if ($comiis_isweixin != 1 || !$comiis_app_switch['comiis_reg_regtxt']) && $comiis_app_switch['comiis_reg_bg'] != 1} style="margin:0;"{/if}>			
				<form method="post" autocomplete="off" name="register" id="registerform" action="member.php?mod={$_G[setting][regname]}">
				<input type="hidden" name="regsubmit" value="yes" />
				<input type="hidden" name="formhash" value="{FORMHASH}" />
				<!--{eval $dreferer = str_replace('&amp;', '&', dreferer());}-->
				<input type="hidden" name="referer" value="$dreferer" />
				<input type="hidden" name="activationauth" value="{if $_GET[action] == 'activation'}$activationauth{/if}" />
				<input type="hidden" name="agreebbrule" value="$bbrulehash" id="agreebbrule" checked="checked" />
				<!--{if $_G['setting']['sendregisterurl']}-->
					<input type="hidden" name="hash" value="$_GET[hash]" />
				<!--{/if}-->
				<ul class="comiis_input_style{if ($comiis_isweixin != 1 || !$comiis_app_switch['comiis_reg_regtxt']) && $comiis_app_switch['comiis_reg_bg'] != 1} bg_f b_t{/if}">
				<!--{if $sendurl}-->
					<li class="comiis_flex{if $comiis_isweixin != 1 || !$comiis_app_switch['comiis_reg_regtxt']} qqli{/if} styli_zico b_b f16">
						<div class="styli_tit"><!--{if $comiis_app_switch['comiis_reg_ico']==1}--><i class="comiis_font f_d">&#xe614</i><!--{/if}--><!--{if $comiis_app_switch['comiis_reg_tit']==1}-->{$comiis_lang['reg24']}<span class="f_g">*</span><!--{/if}--></div>
						<div class="flex"><input type="text" tabindex="1" class="comiis_input kmshow" autocomplete="off" value="" id="{$this->setting['reginput']['email']}" name="$this->setting['reginput']['email']" fwin="login"></div>
					</li>
					<div class="comiis_styli_p f13 b_b bg_e f_ok" style="height:auto;">{$comiis_lang['tip249']}</div>
				<!--{else}-->
					<li class="comiis_flex{if $comiis_isweixin != 1 || !$comiis_app_switch['comiis_reg_regtxt']} qqli{/if} styli_zico b_b f16">
						<div class="styli_tit"><!--{if $comiis_app_switch['comiis_reg_ico']==1}--><i class="comiis_font f_d">&#xe61e</i><!--{/if}--><!--{if $comiis_app_switch['comiis_reg_tit']==1}-->{$comiis_lang['tip295']}<span class="f_g">*</span><!--{/if}--></div>
						<div class="flex"><input type="text" tabindex="1" class="comiis_input kmshow" autocomplete="off" value="" name="{$_G['setting']['reginput']['username']}" placeholder="{lang inputyourname}" fwin="login"></div>
					</li>
					<li class="comiis_flex{if $comiis_isweixin != 1 || !$comiis_app_switch['comiis_reg_regtxt']} qqli{/if} styli_zico b_b f16">
						<div class="styli_tit"><!--{if $comiis_app_switch['comiis_reg_ico']==1}--><i class="comiis_font f_d">&#xe61d</i><!--{/if}--><!--{if $comiis_app_switch['comiis_reg_tit']==1}-->{$comiis_lang['tip171']}<span class="f_g">*</span><!--{/if}--></div>
						<div class="flex"><input type="password" id="password" tabindex="2" class="comiis_input kmshow" value="" name="{$_G['setting']['reginput']['password']}" placeholder="{$comiis_lang['reg13']}" fwin="login"></div>
					</li>
					<li class="comiis_flex{if $comiis_isweixin != 1 || !$comiis_app_switch['comiis_reg_regtxt']} qqli{/if} styli_zico b_b f16">
						<div class="styli_tit"><!--{if $comiis_app_switch['comiis_reg_ico']==1}--><i class="comiis_font f_d">&#xe6d2</i><!--{/if}--><!--{if $comiis_app_switch['comiis_reg_tit']==1}-->{$comiis_lang['reg28']}<span class="f_g">*</span><!--{/if}--></div>
						<div class="flex"><input type="password" id="password2" tabindex="3" class="comiis_input kmshow" value="" name="{$_G['setting']['reginput']['password2']}" placeholder="{$comiis_lang['reg29']}" fwin="login"></div>
					</li>
					<li class="comiis_flex{if $comiis_isweixin != 1 || !$comiis_app_switch['comiis_reg_regtxt']} qqli{/if} styli_zico b_b f16">
						<div class="styli_tit"><!--{if $comiis_app_switch['comiis_reg_ico']==1}--><i class="comiis_font f_d">&#xe614</i><!--{/if}--><!--{if $comiis_app_switch['comiis_reg_tit']==1}-->{$comiis_lang['reg24']}<!--{if !$_G['setting']['forgeemail']}--><span class="f_g">*</span><!--{/if}--><!--{/if}--></div>
						<div class="flex"><input type="email" tabindex="4" class="comiis_input kmshow" autocomplete="off" value="$hash[0]" name="{$_G['setting']['reginput']['email']}" placeholder="{$comiis_lang['reg25']}" fwin="login"></div>
					</li>
					<!--{if substr($_G['setting']['version'], 0, 1) == 'F'}-->
						<!--{eval comiis_load('wsy568KCpgc5K1sDu1', '');}-->
						<!--{if $sendsms}-->
							<!--{eval comiis_load('vVSNYpOf70N7O4z8wS', '');}-->
						<!--{/if}-->
					<!--{/if}-->					
					<!--{eval require_once DISCUZ_ROOT.'./template/comiis_app/comiis/php/comiis_function.php';}-->
					<!--{loop $_G['cache']['fields_register'] $field}-->
					<!--{if $htmls[$field['fieldid']]}-->
					<!--{if stripos($htmls[$field['fieldid']], 'residedistrictbox') || stripos($htmls[$field['fieldid']], 'birthdistrictbox') || stripos($htmls[$field['fieldid']], 'textarea') || stripos($htmls[$field['fieldid']], 'radio') || stripos($htmls[$field['fieldid']], 'checkbox') || stripos($htmls[$field['fieldid']], 'file')}-->
					<li class="styli_zico{if $comiis_isweixin != 1 || !$comiis_app_switch['comiis_reg_regtxt']} qqli{/if} f16" style="padding-bottom:5px;">
                        <div class="styli_tit">
                            <!--{if $comiis_app_switch['comiis_reg_ico']==1}-->
                                <!--{if $field['fieldid']=='birthcity'}-->
                                    <i class="comiis_font f_d">&#xe6b4</i>
                                <!--{elseif $field['fieldid']=='residecity'}-->
                                    <i class="comiis_font f_d">&#xe6b4</i>
                                <!--{elseif $field['fieldid']=='interest'}-->
                                    <i class="comiis_font f_d">&#xe668</i>
                                <!--{elseif $field['fieldid']=='bio'}-->
                                    <i class="comiis_font f_d">&#xe655</i>
                                <!--{else}-->
                                    <i class="comiis_font f_d">&#xe632</i>
                                <!--{/if}-->
                            <!--{/if}-->
                            $field[title]<!--{if $field['required']}--><span class="f_g">*</span><!--{/if}-->
                        </div>
                    </li>
					<!--{/if}-->
					<!--{if stripos($htmls[$field['fieldid']], 'residedistrictbox') || stripos($htmls[$field['fieldid']], 'birthdistrictbox') || stripos($htmls[$field['fieldid']], 'textarea') || stripos($htmls[$field['fieldid']], 'radio') || stripos($htmls[$field['fieldid']], 'checkbox') || stripos($htmls[$field['fieldid']], 'file')}-->
					<li class="hauto comiis_flex{if $comiis_isweixin != 1 || !$comiis_app_switch['comiis_reg_regtxt']} qqli{/if} b_b f16">
					<!--{else}-->
					<li class="styli_zico comiis_flex{if $comiis_isweixin != 1 || !$comiis_app_switch['comiis_reg_regtxt']} qqli{/if} b_b f16">
					<!--{/if}-->
						<!--{if !stripos($htmls[$field['fieldid']], 'residedistrictbox') && !stripos($htmls[$field['fieldid']], 'birthdistrictbox') && !stripos($htmls[$field['fieldid']], 'textarea') && !stripos($htmls[$field['fieldid']], 'radio') && !stripos($htmls[$field['fieldid']], 'checkbox') && !stripos($htmls[$field['fieldid']], 'file')}-->
						<div class="styli_tit">
                            <!--{if $comiis_app_switch['comiis_reg_ico']==1}-->
                                <!--{if $field['fieldid']=='gender'}-->
                                    <i class="comiis_font f_d">&#xe6c3</i>
                                <!--{elseif $field['fieldid']=='birthday'}-->
                                    <i class="comiis_font f_d">&#xe6d3</i>
                                <!--{elseif $field['fieldid']=='realname'}-->
                                    <i class="comiis_font f_d">&#xe61e</i>
                                <!--{elseif $field['fieldid']=='telephone'}-->
                                    <i class="comiis_font f_d">&#xe6b6</i>
                                <!--{elseif $field['fieldid']=='mobile'}-->
                                    <i class="comiis_font f_d">&#xe684</i>
                                <!--{elseif $field['fieldid']=='idcardtype'}-->
                                    <i class="comiis_font f_d">&#xe924</i>
                                <!--{elseif $field['fieldid']=='idcard'}-->
                                    <i class="comiis_font f_d">&#xe655</i>
                                <!--{elseif $field['fieldid']=='address'}-->
                                    <i class="comiis_font f_d">&#xe6b4</i>
                                <!--{elseif $field['fieldid']=='zipcode'}-->
                                    <i class="comiis_font f_d">&#xe614</i>
                                <!--{elseif $field['fieldid']=='graduateschool'}-->
                                    <i class="comiis_font f_d">&#xe662</i>
                                <!--{elseif $field['fieldid']=='education'}-->
                                    <i class="comiis_font f_d">&#xe6ca</i>
                                <!--{elseif $field['fieldid']=='company'}-->
                                    <i class="comiis_font f_d">&#xe662</i>
                                <!--{elseif $field['fieldid']=='occupation'}-->
                                    <i class="comiis_font f_d">&#xe924</i>
                                <!--{elseif $field['fieldid']=='position'}-->
                                    <i class="comiis_font f_d">&#xe924</i>
                                <!--{elseif $field['fieldid']=='revenue'}-->
                                    <i class="comiis_font f_d">&#xe6cb</i>
                                <!--{elseif $field['fieldid']=='affectivestatus'}-->
                                    <i class="comiis_font f_d">&#xe60e</i>
                                <!--{elseif $field['fieldid']=='lookingfor'}-->
                                    <i class="comiis_font f_d">&#xe638</i>
                                <!--{elseif $field['fieldid']=='bloodtype'}-->
                                    <i class="comiis_font f_d">&#xe7f9</i>
                                <!--{elseif $field['fieldid']=='alipay'}-->
                                    <i class="comiis_font f_d">&#xe6d9</i>
                                <!--{elseif $field['fieldid']=='qq'}-->
                                    <i class="comiis_font f_d">&#xe6a1</i>
                                <!--{elseif $field['fieldid']=='taobao'}-->
                                    <i class="comiis_font f_d">&#xe6d7</i>
                                <!--{elseif $field['fieldid']=='site'}-->
                                    <i class="comiis_font f_d">&#xe662</i>
                                <!--{elseif $field['fieldid']=='nationality'}-->
                                    <i class="comiis_font f_d">&#xe6d5</i>
                                <!--{elseif $field['fieldid']=='residesuite'}-->
                                    <i class="comiis_font f_d">&#xe806</i>
                                <!--{elseif $field['fieldid']=='height'}-->
                                    <i class="comiis_font f_d">&#xe6d6</i>
                                <!--{elseif $field['fieldid']=='weight'}-->
                                    <i class="comiis_font f_d">&#xe6d4</i>
                                <!--{else}-->
                                    <i class="comiis_font f_d">&#xe632</i>
                                <!--{/if}-->
                            <!--{/if}-->
                            <!--{if $comiis_app_switch['comiis_reg_tit']==1}-->
                                $field[title]<!--{if $field['required']}--><span class="f_g">*</span><!--{/if}-->
                            <!--{/if}-->
                        </div>
                        <!--{/if}-->
						<div class="flex{if stripos($htmls[$field['fieldid']], 'residedistrictbox')} comiis_residedistrictbox bg_e{elseif stripos($htmls[$field['fieldid']], 'birthdistrictbox')} comiis_birthdistrictbox bg_e{elseif stripos($htmls[$field['fieldid']], 'residedistrictbox') || stripos($htmls[$field['fieldid']], 'birthdistrictbox') || stripos($htmls[$field['fieldid']], 'textarea') || stripos($htmls[$field['fieldid']], 'radio') || stripos($htmls[$field['fieldid']], 'checkbox') || stripos($htmls[$field['fieldid']], 'file')} bg_e{/if}">
						<!--{if $field['fieldid']=='birthday'}-->
							<span class="y"><!--{echo str_replace('class="ps"', 'class="bg_f b_ok comiis_stylino"', $htmls[$field['fieldid']]);}--></span>
						<!--{elseif stripos($htmls[$field['fieldid']], 'input')}-->
							<!--{if stripos($htmls[$field['fieldid']], 'radio') || stripos($htmls[$field['fieldid']], 'checkbox')}-->
								<!--{echo comiis_read_setting($field['fieldid'], array(), false, false, true);}-->
							<!--{else}-->
								<!--{echo str_replace(array('class="px"','class="pr"','class="pf"'), array('class="comiis_input kmshow" placeholder="'.$comiis_lang['reg30'].$field[title].'"','class="kmshow" placeholder="'.$comiis_lang['reg30'].$field[title].'"','class="kmshow" placeholder="'.$comiis_lang['reg30'].$field[title].'"'), preg_replace('/<p>(.*?)<\/p>/', '', $htmls[$field['fieldid']]));}-->
							<!--{/if}-->
						<!--{elseif stripos($htmls[$field['fieldid']], 'textarea')}-->
                            <!--{echo str_replace(array('class="pt"'), array('class="comiis_pxs kmshow" placeholder="'.$comiis_lang['reg30'].$field[title].'"'), preg_replace('/<p>(.*?)<\/p>/', '', $htmls[$field['fieldid']]));}-->
						<!--{elseif stripos($htmls[$field['fieldid']], 'select')}-->
							<!--{if stripos($htmls[$field['fieldid']], 'residedistrictbox')}-->
								<div class="comiis_login_select comiis_styli">
									<span class="inner">
										<i class="comiis_font f_d">&#xe60c</i>
										<span class="z">
											<span class="comiis_residedistrictbox_text f_c"></span>
										</span>					
									</span>
									<!--{echo str_replace(array('class="ps"', '&nbsp;'), array('class="comiis_residedistrictbox"', ''), $htmls[$field['fieldid']]);}-->
								</div>
								<script>$('.comiis_residedistrictbox_text').text($('.comiis_residedistrictbox').find('option:selected').text());</script>
							<!--{else}-->
								<div class="comiis_login_select{if stripos($htmls[$field['fieldid']], 'birthdistrictbox')} comiis_styli{/if}">
									<span class="inner">
										<i class="comiis_font f_d">&#xe60c</i>
										<span class="z">
											<span class="comiis_question_{$field['fieldid']} f_c"></span>
										</span>					
									</span>
									<!--{echo str_replace(array('class="ps"', '&nbsp;'), array('class="comiis_sel_list_'.$field['fieldid'].'"', ''), $htmls[$field['fieldid']]);}-->
								</div>
								<script>
								$('.comiis_question_{$field['fieldid']}').text($('.comiis_sel_list_{$field['fieldid']}').find('option:selected').text());
								$(document).on('change', '.comiis_sel_list_{$field['fieldid']}', function() {
									$('.comiis_question_{$field['fieldid']}').text($(this).find('option:selected').text());
								});
								</script>
							<!--{/if}-->
						<!--{else}-->
							{$htmls[$field['fieldid']]}
						<!--{/if}-->
						</div>
					</li>
					<!--{/if}-->
					<!--{/loop}-->
                    <!--{if empty($invite) && ($_G['setting']['regstatus'] == 2 || $_G['setting']['regstatus'] == 3)}-->
                    <li class="comiis_flex{if $comiis_isweixin != 1 || !$comiis_app_switch['comiis_reg_regtxt']} qqli{/if} styli_zico b_b f16">
                        <div class="styli_tit"><!--{if $comiis_app_switch['comiis_reg_ico']==1}--><i class="comiis_font f_d">&#xe60f</i><!--{/if}--><!--{if $comiis_app_switch['comiis_reg_tit']==1}-->{lang invite_code}<!--{if empty($invite) && $this->setting['regstatus'] == 2 && !$invitestatus}--><span class="f_g">*</span><!--{/if}--><!--{/if}--></div>
                        <div class="flex"><input type="text" name="invitecode" autocomplete="off" tabindex="5" class="comiis_input kmshow" value="" placeholder="{$comiis_lang['reg30']}{lang invite_code}{if empty($invite) && $this->setting['regstatus'] != 2 && !$invitestatus}, {$comiis_lang['post11']}{/if}" fwin="login"></div>
                    </li>
                    <!--{if $this->setting['inviteconfig']['invitecodeprompt']}-->
                    <li class="{if $comiis_isweixin != 1 || !$comiis_app_switch['comiis_reg_regtxt']} qqli{/if} styli_zico b_b f_wb f13" style="height:auto;">
                       <div class="styli_tit"><!--{if $comiis_app_switch['comiis_reg_ico']==1}--><i class="comiis_font f_f">&#xe62f</i><!--{/if}--></div>
                        <div class="flex">$this->setting[inviteconfig][invitecodeprompt]</div>
					</li>
					<!--{/if}-->
                    <!--{/if}-->
                    <!--{if $this->setting['regverify'] == 2}-->
                        <li class="comiis_flex{if $comiis_isweixin != 1 || !$comiis_app_switch['comiis_reg_regtxt']} qqli{/if} styli_zico b_b f16">
                            <div class="styli_tit"><!--{if $comiis_app_switch['comiis_reg_ico']==1}--><i class="comiis_font f_d">&#xe6d1</i><!--{/if}--><!--{if $comiis_app_switch['comiis_reg_tit']==1}-->{lang register_message}<span class="f_g">*</span><!--{/if}--></div>
                            <div class="flex"><input type="text" name="regmessage" autocomplete="off" tabindex="6" class="comiis_input kmshow" value="" placeholder="{$comiis_lang['reg30']}{lang register_message}" fwin="login"></div>
                        </li>
                    <!--{/if}-->
				<!--{/if}-->			
				<!--{if $secqaacheck || $seccodecheck}-->
                    <li class="comiis_flex{if $comiis_isweixin != 1 || !$comiis_app_switch['comiis_reg_regtxt']} qqli{/if} styli_zico b_b f16" style="height:auto;">
                        <div class="styli_tit"><!--{if $comiis_app_switch['comiis_reg_ico']==1}--><i class="comiis_font f_d">&#xe6e0</i><!--{/if}--><!--{if $comiis_app_switch['comiis_reg_tit']==1}-->{$comiis_lang['reg26']}<!--{/if}--></div>
                        <div class="comiis_regsec flex"><!--{subtemplate common/seccheck}--></div>
					</li>
				<!--{/if}-->
				</ul>
			</div>
			<div class="comiis_btnbox btn_register"><button tabindex="7" value="true" name="regsubmit" type="submit" class="formdialog comiis_btn bg_c f_f" comiis='handle'>{lang quickregister}</button></div>
			<!--{hook/global_comiis_member_register_mobile}-->
			</form>
			<!--{if $bbrules}-->
			<div class="comiis_reg_link comiis_input_style cl" style="margin-top:-5px;">
			<input type="checkbox" class="pc" name="agreebbrule" value="$bbrulehash" id="agreebbrules" checked="checked" />
			<label for="agreebbrules"><i class="comiis_font f_0">&#xe644</i> <span class="f_c">{$comiis_lang['reg7']}</span>
			<a href="member.php?mod={$_G[setting][regname]}&agreement=yes" class="f_0 f_u">{lang rulemessage}</a></label>
			</div>
			<!--{/if}-->
			<div class="comiis_reg_link f_a cl"><a href="member.php?mod=logging&action=login">{$comiis_lang['reg6']} &gt;&gt;</a>
			</div>
		</div>
        <!--{if ($_G['setting']['connect']['allow'] && !$_G['setting']['bbclosed']) || !empty($_G['setting']['pluginhooks']['global_comiis_member_login_mobile'])}-->
        <div class="comiis_log_dsf cl">
            <div class="comiis_log_line cl"><span class="{if $comiis_isweixin == 1 && $comiis_app_switch['comiis_reg_regtxt']}bg_f{else}comiis_bodybg{/if} f_c">{$comiis_lang['reg4']}</span></div>
            <div class="comiis_log_ico f_d">
                <!--{hook/global_comiis_member_login_mobile}-->
                <!--{if ($_G['setting']['connect']['allow'] && !$_G['setting']['bbclosed'])}--><a href="$_G[connect][login_url]&statfrom=login_simple" class="bg_f b_ok"><i class="comiis_font f_qq">&#xe625;</i><!--{if $comiis_app_switch['comiis_qqico_txt'] == 1}--><span>{$comiis_lang['tip326']}</span><!--{/if}--></a><!--{/if}-->
            </div>
        </div>
        <!--{/if}-->
        </div>
		<script src="./template/comiis_app/comiis/js/comiis_hideShowPassword.js"></script>
		<script type="text/javascript">
			$('#password,#password2').hidePassword(true);
			function succeedhandle_registerform(a, b, c){
				popup.open(b, 'alert');
				if(a){
					setTimeout(function() {
						window.location.href = a;
					}, 1000);
				}
			}
			function errorhandle_registerform(a, b){
				popup.open(a, 'alert');
			}
		</script>
        <!--{if $comiis_app_switch['comiis_reg_bg'] == 1}-->
            <!--{if !$comiis_app_switch['comiis_reg_bg_img']}-->
                <!--{eval}-->
                    $comiis_bgimg_s = '';
                    $comiis_allbgimg = array();			
                    $comiis_bgimg = dir(DISCUZ_ROOT.'./template/comiis_app/pic/loginbg');
                    while($entry = $comiis_bgimg->read()) {
                        if(preg_match("/^comiis_([a-zA-Z0-9\-\_]+)\.(jpg|png|gif)$/", $entry)) {
                            $comiis_allbgimg[] = './template/comiis_app/pic/loginbg/'.$entry;
                        }
                    }
                    $comiis_bgimg->close();
                    if(count($comiis_allbgimg)){
                        $comiis_bgimg_s = dimplode($comiis_allbgimg);
                    }
                <!--{/eval}-->
                <!--{if $comiis_bgimg_s}-->
                    <script type="text/javascript" src="./template/comiis_app/comiis/js/comiis_bgstretcher.js"></script>
                    <script>
                        $(document).ready(function(){
                            $(document).bgStretcher({
                                images: [{$comiis_bgimg_s}]
                            });
                        });
                    </script>
                <!--{/if}-->
            <!--{/if}-->
        <!--{/if}-->
	<!--{/if}-->
<!--{/if}-->
<!--{hook/register_bottom}-->
<!--{eval updatesession();}-->
<!--{eval $comiis_foot = 'no';}-->
<!--{template common/footer}-->