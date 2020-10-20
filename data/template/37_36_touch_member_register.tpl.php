<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); hookscriptoutput('register');
0
|| checktplrefresh('./template/comiis_app/touch/member/register.htm', './template/comiis_app/touch/common/seccheck.htm', 1600774640, '36', './data/template/37_36_touch_member_register.tpl.php', './template/comiis_app', 'touch/member/register')
;?><?php include template('common/header'); if($comiis_app_switch['comiis_reg_ico']==0 && $comiis_app_switch['comiis_reg_tit']==0) { ?>
<style>.styli_zico .styli_tit {padding-right:0;}</style>
<?php } elseif($comiis_app_switch['comiis_reg_tit']==0) { ?>
<style>.styli_zico .styli_tit i {padding-right:0;}</style>
<?php } if($_GET['mod']=='connect') { ?>
<div class="comiis_qq_tbox">
<div class="comiis_space_info bg_0 f_f" style="overflow:hidden;">
<div class="comiis_space_tx<?php if($comiis_app_switch['comiis_space_header']==1) { ?> comiis_space_txv1<?php } ?>" style="padding-bottom:18px;">
<div class="user_img"><img src="<?php echo $_G['connect']['avatar_url'];?>/<?php echo $_G['qc']['connect_app_id'];?>/<?php echo $_G['qc']['connect_openid'];?>"></div>
<h2>Hi, <?php echo $_G['member']['username'];?></h2>
<p><?php echo $comiis_lang['reg15'];?></p>
</div>
</div>
<div class="comiis_topnv bg_f b_b">
<ul class="comiis_flex">
<li class="flex<?php if($_GET['ac']!='bind') { ?> kmon<?php } ?>" id="comiis_qqtab1"><a href="javascript:;"<?php if($_GET['ac']!='bind') { ?> class="b_0 f_0"<?php } ?>><?php echo $comiis_lang['reg22'];?></a></li>
<li class="flex<?php if($_GET['ac']=='bind') { ?> kmon<?php } ?>" id="comiis_qqtab2"><a href="javascript:;"<?php if($_GET['ac']=='bind') { ?> class="b_0 f_0"<?php } ?>><?php echo $comiis_lang['reg16'];?></a></li>
</ul>
</div>
<div class="comiis_qq_fbox<?php if($_GET['ac']=='bind') { ?> comiis_qq_fboxs<?php } ?>">
<div class="comiis_login_from mt15 cl" style="margin:0;">
<form method="post" autocomplete="off" name="register" id="registerform"  enctype="multipart/form-data" action="member.php?mod=connect">
<input type="hidden" name="agreebbrule" value="<?php echo $bbrulehash;?>" id="agreebbrule" checked="checked" />
<input type="hidden" name="formhash" value="<?php echo FORMHASH;?>" />
<input type="hidden" name="referer" value="<?php echo $_G['qc']['dreferer'];?>" />
<input type="hidden" id="auth_hash" name="auth_hash" value="<?php echo $_G['qc']['connect_auth_hash'];?>" />
<input type="hidden" id="is_notify" name="is_notify" value="<?php echo $_G['qc']['connect_is_notify'];?>" />
<input type="hidden" id="is_feed" name="is_feed" value="<?php echo $_G['qc']['connect_is_feed'];?>" />
<input type="hidden" name="activationauth" value="<?php if($_GET['action'] == 'activation') { ?><?php echo $activationauth;?><?php } ?>" />
<input type="hidden" name="<?php echo $_G['setting']['reginput']['email'];?>" value="QQ_<?php echo $_G['timestamp'];?>@qq.com">
<input type="hidden" id="password" tabindex="2" class="comiis_input kmshow" value="" name="<?php echo $_G['setting']['reginput']['password'];?>" fwin="login">
<input type="hidden" id="password2" tabindex="3" class="comiis_input kmshow" value="" name="<?php echo $_G['setting']['reginput']['password2'];?>" fwin="login">
<input type="hidden" name="use_qzone_avatar_qqshow" value="1"/>				
<input type="hidden" name="regsubmit" value="true">	
                <ul class="bg_f b_t b_b">
                    <li class="comiis_flex qqli styli_zico f16">
                        <div class="styli_tit"><?php if($comiis_app_switch['comiis_reg_ico']==1) { ?><i class="comiis_font f_d">&#xe61e</i><?php } if($comiis_app_switch['comiis_reg_tit']==1) { ?><?php echo $comiis_lang['tip295'];?><?php } ?></div>
                        <div class="flex"><input id="<?php echo $_G['setting']['reginput']['username'];?>" name="<?php echo $_G['setting']['reginput']['username'];?>" type="text" value="<?php echo $_G['member']['username'];?>" autocomplete="off" placeholder="<?php echo $comiis_lang['inputyourname'];?>" class="comiis_input"></div>
                    </li>
                    <?php require_once DISCUZ_ROOT.'./template/comiis_app/comiis/php/comiis_function.php';?>                    <?php if(is_array($_G['cache']['fields_register'])) foreach($_G['cache']['fields_register'] as $field) { ?>                    <?php if($htmls[$field['fieldid']] && $field['required']) { ?>
                    <?php if(stripos($htmls[$field['fieldid']], 'residedistrictbox') || stripos($htmls[$field['fieldid']], 'birthdistrictbox') || stripos($htmls[$field['fieldid']], 'textarea') || stripos($htmls[$field['fieldid']], 'radio') || stripos($htmls[$field['fieldid']], 'checkbox')) { ?>				
                    <li class="styli_zico qqli f15" style="padding-bottom:5px;">
                        <div class="styli_tit">
                            <?php if($comiis_app_switch['comiis_reg_ico']==1) { ?>
                                <?php if($field['fieldid']=='birthcity') { ?>
                                    <i class="comiis_font f_d">&#xe6b4</i>
                                <?php } elseif($field['fieldid']=='residecity') { ?>
                                    <i class="comiis_font f_d">&#xe6b4</i>
                                <?php } elseif($field['fieldid']=='interest') { ?>
                                    <i class="comiis_font f_d">&#xe668</i>
                                <?php } elseif($field['fieldid']=='bio') { ?>
                                    <i class="comiis_font f_d">&#xe655</i>
                                <?php } else { ?>
                                    <i class="comiis_font f_d">&#xe632</i>
                                <?php } ?>
                            <?php } ?>
                            <?php echo $field['title'];?><?php if($field['required']) { ?><span class="f_g">*</span><?php } ?>
                        </div>
                    </li>
                    <?php } ?>
                    <?php if(stripos($htmls[$field['fieldid']], 'residedistrictbox') || stripos($htmls[$field['fieldid']], 'birthdistrictbox') || stripos($htmls[$field['fieldid']], 'textarea') || stripos($htmls[$field['fieldid']], 'radio') || stripos($htmls[$field['fieldid']], 'checkbox')) { ?>
                    <li class="hauto qqli comiis_flex b_t f15">
                    <?php } else { ?>
                    <li class="styli_zico qqli comiis_flex b_t f15">
                    <?php } ?>
                        <?php if(!stripos($htmls[$field['fieldid']], 'residedistrictbox') && !stripos($htmls[$field['fieldid']], 'birthdistrictbox') && !stripos($htmls[$field['fieldid']], 'textarea') && !stripos($htmls[$field['fieldid']], 'radio') && !stripos($htmls[$field['fieldid']], 'checkbox')) { ?>
                        <div class="styli_tit">
                            <?php if($comiis_app_switch['comiis_reg_ico']==1) { ?>
                                <?php if($field['fieldid']=='gender') { ?>
                                    <i class="comiis_font f_d">&#xe6c3</i>
                                <?php } elseif($field['fieldid']=='birthday') { ?>
                                    <i class="comiis_font f_d">&#xe6d3</i>
                                <?php } elseif($field['fieldid']=='realname') { ?>
                                    <i class="comiis_font f_d">&#xe61e</i>
                                <?php } elseif($field['fieldid']=='telephone') { ?>
                                    <i class="comiis_font f_d">&#xe6b6</i>
                                <?php } elseif($field['fieldid']=='mobile') { ?>
                                    <i class="comiis_font f_d">&#xe684</i>
                                <?php } elseif($field['fieldid']=='idcardtype') { ?>
                                    <i class="comiis_font f_d">&#xe924</i>
                                <?php } elseif($field['fieldid']=='idcard') { ?>
                                    <i class="comiis_font f_d">&#xe655</i>
                                <?php } elseif($field['fieldid']=='address') { ?>
                                    <i class="comiis_font f_d">&#xe6b4</i>
                                <?php } elseif($field['fieldid']=='zipcode') { ?>
                                    <i class="comiis_font f_d">&#xe614</i>
                                <?php } elseif($field['fieldid']=='graduateschool') { ?>
                                    <i class="comiis_font f_d">&#xe662</i>
                                <?php } elseif($field['fieldid']=='education') { ?>
                                    <i class="comiis_font f_d">&#xe6ca</i>
                                <?php } elseif($field['fieldid']=='company') { ?>
                                    <i class="comiis_font f_d">&#xe662</i>
                                <?php } elseif($field['fieldid']=='occupation') { ?>
                                    <i class="comiis_font f_d">&#xe924</i>
                                <?php } elseif($field['fieldid']=='position') { ?>
                                    <i class="comiis_font f_d">&#xe924</i>
                                <?php } elseif($field['fieldid']=='revenue') { ?>
                                    <i class="comiis_font f_d">&#xe6cb</i>
                                <?php } elseif($field['fieldid']=='affectivestatus') { ?>
                                    <i class="comiis_font f_d">&#xe60e</i>
                                <?php } elseif($field['fieldid']=='lookingfor') { ?>
                                    <i class="comiis_font f_d">&#xe638</i>
                                <?php } elseif($field['fieldid']=='bloodtype') { ?>
                                    <i class="comiis_font f_d">&#xe7f9</i>
                                <?php } elseif($field['fieldid']=='alipay') { ?>
                                    <i class="comiis_font f_d">&#xe6d9</i>
                                <?php } elseif($field['fieldid']=='qq') { ?>
                                    <i class="comiis_font f_d">&#xe6a1</i>
                                <?php } elseif($field['fieldid']=='taobao') { ?>
                                    <i class="comiis_font f_d">&#xe6d7</i>
                                <?php } elseif($field['fieldid']=='site') { ?>
                                    <i class="comiis_font f_d">&#xe662</i>
                                <?php } elseif($field['fieldid']=='nationality') { ?>
                                    <i class="comiis_font f_d">&#xe6d5</i>
                                <?php } elseif($field['fieldid']=='residesuite') { ?>
                                    <i class="comiis_font f_d">&#xe806</i>
                                <?php } elseif($field['fieldid']=='height') { ?>
                                    <i class="comiis_font f_d">&#xe6d6</i>
                                <?php } elseif($field['fieldid']=='weight') { ?>
                                    <i class="comiis_font f_d">&#xe6d4</i>
                                <?php } else { ?>
                                    <i class="comiis_font f_d">&#xe632</i>
                                <?php } ?>
                            <?php } ?>
                            <?php if($comiis_app_switch['comiis_reg_tit']==1) { ?><?php echo $field['title'];?><?php if($field['required']) { ?><span class="f_g">*</span><?php } } ?>
                        </div>
                        <?php } ?>
                        <div class="flex<?php if(stripos($htmls[$field['fieldid']], 'residedistrictbox')) { ?> comiis_residedistrictbox bg_e<?php } elseif(stripos($htmls[$field['fieldid']], 'birthdistrictbox')) { ?> comiis_birthdistrictbox bg_e<?php } elseif(stripos($htmls[$field['fieldid']], 'residedistrictbox') || stripos($htmls[$field['fieldid']], 'birthdistrictbox') || stripos($htmls[$field['fieldid']], 'textarea') || stripos($htmls[$field['fieldid']], 'radio') || stripos($htmls[$field['fieldid']], 'checkbox')) { ?> bg_e<?php } ?>">
                        <?php if($field['fieldid']=='birthday') { ?>
                            <span class="y"><?php echo str_replace('class="ps"', 'class="bg_f b_ok comiis_stylino"', $htmls[$field['fieldid']]);; ?></span>
                        <?php } elseif(stripos($htmls[$field['fieldid']], 'input')) { ?>
                            <?php if(stripos($htmls[$field['fieldid']], 'radio') || stripos($htmls[$field['fieldid']], 'checkbox')) { ?>
                                <?php echo comiis_read_setting($field['fieldid'], array(), false, false, true);; ?>                            <?php } else { ?>
                                <?php echo str_replace(array('class="px"','class="pr"','class="pf"'), array('class="comiis_input kmshow" placeholder="'.$comiis_lang['reg30'].$field['title'].'"','class="kmshow" placeholder="'.$comiis_lang['reg30'].$field['title'].'"','class="kmshow" placeholder="'.$comiis_lang['reg30'].$field['title'].'"'), preg_replace('/<p>(.*?)<\/p>/', '', $htmls[$field['fieldid']]));; ?>                            <?php } ?>
                        <?php } elseif(stripos($htmls[$field['fieldid']], 'textarea')) { ?>
                            <?php echo str_replace(array('class="pt"'), array('class="comiis_pxs kmshow" placeholder="'.$comiis_lang['reg30'].$field['title'].'"'), preg_replace('/<p>(.*?)<\/p>/', '', $htmls[$field['fieldid']]));; ?>                        <?php } elseif(stripos($htmls[$field['fieldid']], 'select')) { ?>
                            <?php if(stripos($htmls[$field['fieldid']], 'residedistrictbox')) { ?>
                                <div class="comiis_login_select comiis_styli">
                                    <span class="inner">
                                        <i class="comiis_font f_d">&#xe60c</i>
                                        <span class="z">
                                            <span class="comiis_residedistrictbox_text f_c"></span>
                                        </span>					
                                    </span>
                                    <?php echo str_replace(array('class="ps"', '&nbsp;'), array('class="comiis_residedistrictbox"', ''), $htmls[$field['fieldid']]);; ?>                                </div>
                                <script>$('.comiis_residedistrictbox_text').text($('.comiis_residedistrictbox').find('option:selected').text());</script>
                            <?php } else { ?>
                                <div class="comiis_login_select<?php if(stripos($htmls[$field['fieldid']], 'birthdistrictbox')) { ?> comiis_styli<?php } ?>">
                                    <span class="inner">
                                        <i class="comiis_font f_d">&#xe60c</i>
                                        <span class="z">
                                            <span class="comiis_question_<?php echo $field['fieldid'];?> f_c"></span>
                                        </span>					
                                    </span>
                                    <?php echo str_replace(array('class="ps"', '&nbsp;'), array('class="comiis_sel_list_'.$field['fieldid'].'"', ''), $htmls[$field['fieldid']]);; ?>                                </div>
                                <script>
                                $('.comiis_question_<?php echo $field['fieldid'];?>').text($('.comiis_sel_list_<?php echo $field['fieldid'];?>').find('option:selected').text());
                                $(document).on('change', '.comiis_sel_list_<?php echo $field['fieldid'];?>', function() {
                                    $('.comiis_question_<?php echo $field['fieldid'];?>').text($(this).find('option:selected').text());
                                });
                                </script>
                            <?php } ?>
                        <?php } else { ?>
                            <?php echo $htmls[$field['fieldid']];?>
                        <?php } ?>
                        </div>
                    </li>
                    <?php } ?>
                    <?php } ?>
                    <?php if($this->setting['regverify'] == 2) { ?>
                        <li class="comiis_flex qqli styli_zico b_t f16">
                            <div class="styli_tit"><?php if($comiis_app_switch['comiis_reg_ico']==1) { ?><i class="comiis_font f_d">&#xe6d1</i><?php } if($comiis_app_switch['comiis_reg_tit']==1) { ?>注册原因<span class="f_g">*</span><?php } ?></div>
                            <div class="flex"><input type="text" name="regmessage" autocomplete="off" tabindex="6" class="comiis_input kmshow" value="" placeholder="<?php echo $comiis_lang['reg30'];?>注册原因" fwin="login"></div>
                        </li>
                    <?php } ?>                   
                </ul>	
<div class="comiis_btnbox btn_register"><button value="true" name="regsubmit" type="submit" id="registerformsubmit" class="formdialog comiis_btn bg_c f_f"><?php echo $comiis_lang['reg17'];?></button></div>
</form>
</div><?php $loginhash = 'L'.random(4);?><div class="comiis_login_from mt15 cl" style="margin:0;">
<form method="post" autocomplete="off" name="login" id="loginform_<?php echo $loginhash;?>" action="member.php?mod=connect&amp;action=login&amp;loginsubmit=yes<?php if(!empty($_GET['handlekey'])) { ?>&amp;handlekey=<?php echo $_GET['handlekey'];?><?php } ?>&amp;loginhash=<?php echo $loginhash;?>">
            <?php comiis_load('mSuVGOYzUV0eVzOZoG', 'loginhash');?><li class="comiis_flex qqli styli_zico f16 b_t">
                    <div class="styli_tit"><?php if($comiis_app_switch['comiis_reg_ico']==1) { ?><i class="comiis_font f_d">&#xe6d1</i><?php } if($comiis_app_switch['comiis_reg_tit']==1) { ?><?php echo $comiis_lang['tip296'];?><?php } ?></div>
                    <div class="flex">			
<div class="comiis_input_style">
  <div class="comiis_login_select">
<span class="inner">
  <i class="comiis_font f_d">&#xe60c</i>
  <span class="z">
<span class="comiis_question" id="questionid_<?php echo $loginhash;?>_name"></span>
  </span>					
</span>
<select id="questionid_<?php echo $loginhash;?>" name="questionid" class="comiis_security_list">
  <option value="0" selected="selected">安全提问(未设置请忽略)</option>
  <option value="1">母亲的名字</option>
  <option value="2">爷爷的名字</option>
  <option value="3">父亲出生的城市</option>
  <option value="4">您其中一位老师的名字</option>
  <option value="5">您个人计算机的型号</option>
  <option value="6">您最喜欢的餐馆名称</option>
  <option value="7">驾驶执照最后四位数字</option>
</select>
  </div>	
</div>
</div>		
</li>
                <li class="comiis_security_input qqli styli_zico b_t f16" style="display:none;">
                    <div class="comiis_flex">
                        <div class="styli_tit"><?php if($comiis_app_switch['comiis_reg_ico']==1) { ?><i class="comiis_font f_d">&#xe655</i><?php } if($comiis_app_switch['comiis_reg_tit']==1) { ?><?php echo $comiis_lang['reg18'];?><?php } ?></div>
                        <div class="flex">
                            <input type="text" name="answer" id="answer_<?php echo $loginhash;?>" placeholder="<?php echo $comiis_lang['reg19'];?>" class="comiis_input">
                        </div>
                    </div>
                </li>
</ul>
<div class="comiis_btnbox"><button type="submit" name="loginsubmit" value="true" class="comiis_btn bg_c f_f"><?php echo $comiis_lang['reg20'];?></button></div>
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
<?php } else { if($_GET['agreement'] == 'yes' && $bbrules) { ?>	
<div id="comiis_agreement">
<div class="comiis_fwtk f_b cl">
<?php echo $bbrulestxt;?>		
</div>
<a href="member.php?mod=<?php echo $_G['setting']['regname'];?>" class="comiis_btn bg_c f_f"><?php echo $comiis_lang['reg5'];?></a>	
</div>	
<script>$('.comiis_head h2').html("网站服务条款");</script>
<?php } else { ?>
    <?php if($comiis_app_switch['comiis_reg_bg'] == 1) { ?>
    <style>
        <?php if($comiis_app_switch['comiis_reg_bg_img']) { ?>
        body.comiis_bodybg {background:#333 url(<?php echo $comiis_app_switch['comiis_reg_bg_img'];?>) !important;background-size:cover;}
        <?php } else { ?>
        body.comiis_bodybg {background:#333;}
        #comiis_bgstretcher {background: black;overflow: hidden;width: 100%;position: fixed !important;z-index: -1;}
        #comiis_bgstretcher, #comiis_bgstretcher UL, #comiis_bgstretcher UL LI {position: absolute;top: 0;right: 0;left: 0;bottom: 0;}
        <?php } ?>
        <?php if($comiis_app_switch['comiis_reg_bg_head'] == 1) { ?>
        #comiis_head .comiis_head {background:none !important;}
        #comiis_head .comiis_head h2 {display:none;}
        <?php } elseif($comiis_app_switch['comiis_reg_bg_head'] == 2) { ?>
        #comiis_head {display:none;}
        <?php } ?>
        .comiis_reg_bg {padding-bottom:30px;padding-top:<?php if($comiis_app_switch['comiis_reg_bg_head'] == 0 || $comiis_isweixin == 1) { ?>40<?php } else { ?>0<?php } ?>px;margin-top:0px;}
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
    <?php } ?>
    <div class="comiis_loginbox<?php if($comiis_app_switch['comiis_reg_bg'] == 1) { ?> comiis_reg_bg f_f<?php } ?>">
        <?php if($comiis_isweixin == 1 && $comiis_app_switch['comiis_reg_regtxt'] && $comiis_app_switch['comiis_reg_bg'] != 1) { ?><div class="comiis_login_tit"><?php echo $comiis_app_switch['comiis_reg_regtxt'];?></div><?php } ?>
        <?php if($comiis_app_switch['comiis_reg_bg'] == 1 && $comiis_app_switch['comiis_reg_bg_logo']) { ?><div class="comiis_login_logo"><?php echo $comiis_app_switch['comiis_reg_bg_logo'];?></div><?php } ?>
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
el.options.add(new Option('<?php echo $comiis_lang['all15'];?>', ''));
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
<div class="comiis_post_from<?php if(($comiis_isweixin == 1 && $comiis_app_switch['comiis_reg_regtxt']) || $comiis_app_switch['comiis_reg_bg'] == 1) { ?> mt15<?php } ?> cl">
<div class="comiis_login_from<?php if($comiis_isweixin == 1 && $comiis_app_switch['comiis_reg_regtxt'] && $comiis_app_switch['comiis_reg_bg'] != 1) { ?> bg_f b_t<?php } ?>"<?php if(($comiis_isweixin != 1 || !$comiis_app_switch['comiis_reg_regtxt']) && $comiis_app_switch['comiis_reg_bg'] != 1) { ?> style="margin:0;"<?php } ?>>			
<form method="post" autocomplete="off" name="register" id="registerform" action="member.php?mod=<?php echo $_G['setting']['regname'];?>">
<input type="hidden" name="regsubmit" value="yes" />
<input type="hidden" name="formhash" value="<?php echo FORMHASH;?>" /><?php $dreferer = str_replace('&amp;', '&', dreferer());?><input type="hidden" name="referer" value="<?php echo $dreferer;?>" />
<input type="hidden" name="activationauth" value="<?php if($_GET['action'] == 'activation') { ?><?php echo $activationauth;?><?php } ?>" />
<input type="hidden" name="agreebbrule" value="<?php echo $bbrulehash;?>" id="agreebbrule" checked="checked" />
<?php if($_G['setting']['sendregisterurl']) { ?>
<input type="hidden" name="hash" value="<?php echo $_GET['hash'];?>" />
<?php } ?>
<ul class="comiis_input_style<?php if(($comiis_isweixin != 1 || !$comiis_app_switch['comiis_reg_regtxt']) && $comiis_app_switch['comiis_reg_bg'] != 1) { ?> bg_f b_t<?php } ?>">
<?php if($sendurl) { ?>
<li class="comiis_flex<?php if($comiis_isweixin != 1 || !$comiis_app_switch['comiis_reg_regtxt']) { ?> qqli<?php } ?> styli_zico b_b f16">
<div class="styli_tit"><?php if($comiis_app_switch['comiis_reg_ico']==1) { ?><i class="comiis_font f_d">&#xe614</i><?php } if($comiis_app_switch['comiis_reg_tit']==1) { ?><?php echo $comiis_lang['reg24'];?><span class="f_g">*</span><?php } ?></div>
<div class="flex"><input type="text" tabindex="1" class="comiis_input kmshow" autocomplete="off" value="" id="<?php echo $this->setting['reginput']['email'];?>" name="<?php echo $this->setting['reginput']['email'];?>" fwin="login"></div>
</li>
<div class="comiis_styli_p f13 b_b bg_e f_ok" style="height:auto;"><?php echo $comiis_lang['tip249'];?></div>
<?php } else { ?>
<li class="comiis_flex<?php if($comiis_isweixin != 1 || !$comiis_app_switch['comiis_reg_regtxt']) { ?> qqli<?php } ?> styli_zico b_b f16">
<div class="styli_tit"><?php if($comiis_app_switch['comiis_reg_ico']==1) { ?><i class="comiis_font f_d">&#xe61e</i><?php } if($comiis_app_switch['comiis_reg_tit']==1) { ?><?php echo $comiis_lang['tip295'];?><span class="f_g">*</span><?php } ?></div>
<div class="flex"><input type="text" tabindex="1" class="comiis_input kmshow" autocomplete="off" value="" name="<?php echo $_G['setting']['reginput']['username'];?>" placeholder="请输入用户名" fwin="login"></div>
</li>
<li class="comiis_flex<?php if($comiis_isweixin != 1 || !$comiis_app_switch['comiis_reg_regtxt']) { ?> qqli<?php } ?> styli_zico b_b f16">
<div class="styli_tit"><?php if($comiis_app_switch['comiis_reg_ico']==1) { ?><i class="comiis_font f_d">&#xe61d</i><?php } if($comiis_app_switch['comiis_reg_tit']==1) { ?><?php echo $comiis_lang['tip171'];?><span class="f_g">*</span><?php } ?></div>
<div class="flex"><input type="password" id="password" tabindex="2" class="comiis_input kmshow" value="" name="<?php echo $_G['setting']['reginput']['password'];?>" placeholder="<?php echo $comiis_lang['reg13'];?>" fwin="login"></div>
</li>
<li class="comiis_flex<?php if($comiis_isweixin != 1 || !$comiis_app_switch['comiis_reg_regtxt']) { ?> qqli<?php } ?> styli_zico b_b f16">
<div class="styli_tit"><?php if($comiis_app_switch['comiis_reg_ico']==1) { ?><i class="comiis_font f_d">&#xe6d2</i><?php } if($comiis_app_switch['comiis_reg_tit']==1) { ?><?php echo $comiis_lang['reg28'];?><span class="f_g">*</span><?php } ?></div>
<div class="flex"><input type="password" id="password2" tabindex="3" class="comiis_input kmshow" value="" name="<?php echo $_G['setting']['reginput']['password2'];?>" placeholder="<?php echo $comiis_lang['reg29'];?>" fwin="login"></div>
</li>
<li class="comiis_flex<?php if($comiis_isweixin != 1 || !$comiis_app_switch['comiis_reg_regtxt']) { ?> qqli<?php } ?> styli_zico b_b f16">
<div class="styli_tit"><?php if($comiis_app_switch['comiis_reg_ico']==1) { ?><i class="comiis_font f_d">&#xe614</i><?php } if($comiis_app_switch['comiis_reg_tit']==1) { ?><?php echo $comiis_lang['reg24'];?><?php if(!$_G['setting']['forgeemail']) { ?><span class="f_g">*</span><?php } } ?></div>
<div class="flex"><input type="email" tabindex="4" class="comiis_input kmshow" autocomplete="off" value="<?php echo $hash['0'];?>" name="<?php echo $_G['setting']['reginput']['email'];?>" placeholder="<?php echo $comiis_lang['reg25'];?>" fwin="login"></div>
</li>
<?php if(substr($_G['setting']['version'], 0, 1) == 'F') { comiis_load('wsy568KCpgc5K1sDu1', '');?><?php if($sendsms) { comiis_load('vVSNYpOf70N7O4z8wS', '');?><?php } } require_once DISCUZ_ROOT.'./template/comiis_app/comiis/php/comiis_function.php';?><?php if(is_array($_G['cache']['fields_register'])) foreach($_G['cache']['fields_register'] as $field) { if($htmls[$field['fieldid']]) { if(stripos($htmls[$field['fieldid']], 'residedistrictbox') || stripos($htmls[$field['fieldid']], 'birthdistrictbox') || stripos($htmls[$field['fieldid']], 'textarea') || stripos($htmls[$field['fieldid']], 'radio') || stripos($htmls[$field['fieldid']], 'checkbox') || stripos($htmls[$field['fieldid']], 'file')) { ?>
<li class="styli_zico<?php if($comiis_isweixin != 1 || !$comiis_app_switch['comiis_reg_regtxt']) { ?> qqli<?php } ?> f16" style="padding-bottom:5px;">
                        <div class="styli_tit">
                            <?php if($comiis_app_switch['comiis_reg_ico']==1) { ?>
                                <?php if($field['fieldid']=='birthcity') { ?>
                                    <i class="comiis_font f_d">&#xe6b4</i>
                                <?php } elseif($field['fieldid']=='residecity') { ?>
                                    <i class="comiis_font f_d">&#xe6b4</i>
                                <?php } elseif($field['fieldid']=='interest') { ?>
                                    <i class="comiis_font f_d">&#xe668</i>
                                <?php } elseif($field['fieldid']=='bio') { ?>
                                    <i class="comiis_font f_d">&#xe655</i>
                                <?php } else { ?>
                                    <i class="comiis_font f_d">&#xe632</i>
                                <?php } ?>
                            <?php } ?>
                            <?php echo $field['title'];?><?php if($field['required']) { ?><span class="f_g">*</span><?php } ?>
                        </div>
                    </li>
<?php } if(stripos($htmls[$field['fieldid']], 'residedistrictbox') || stripos($htmls[$field['fieldid']], 'birthdistrictbox') || stripos($htmls[$field['fieldid']], 'textarea') || stripos($htmls[$field['fieldid']], 'radio') || stripos($htmls[$field['fieldid']], 'checkbox') || stripos($htmls[$field['fieldid']], 'file')) { ?>
<li class="hauto comiis_flex<?php if($comiis_isweixin != 1 || !$comiis_app_switch['comiis_reg_regtxt']) { ?> qqli<?php } ?> b_b f16">
<?php } else { ?>
<li class="styli_zico comiis_flex<?php if($comiis_isweixin != 1 || !$comiis_app_switch['comiis_reg_regtxt']) { ?> qqli<?php } ?> b_b f16">
<?php } if(!stripos($htmls[$field['fieldid']], 'residedistrictbox') && !stripos($htmls[$field['fieldid']], 'birthdistrictbox') && !stripos($htmls[$field['fieldid']], 'textarea') && !stripos($htmls[$field['fieldid']], 'radio') && !stripos($htmls[$field['fieldid']], 'checkbox') && !stripos($htmls[$field['fieldid']], 'file')) { ?>
<div class="styli_tit">
                            <?php if($comiis_app_switch['comiis_reg_ico']==1) { ?>
                                <?php if($field['fieldid']=='gender') { ?>
                                    <i class="comiis_font f_d">&#xe6c3</i>
                                <?php } elseif($field['fieldid']=='birthday') { ?>
                                    <i class="comiis_font f_d">&#xe6d3</i>
                                <?php } elseif($field['fieldid']=='realname') { ?>
                                    <i class="comiis_font f_d">&#xe61e</i>
                                <?php } elseif($field['fieldid']=='telephone') { ?>
                                    <i class="comiis_font f_d">&#xe6b6</i>
                                <?php } elseif($field['fieldid']=='mobile') { ?>
                                    <i class="comiis_font f_d">&#xe684</i>
                                <?php } elseif($field['fieldid']=='idcardtype') { ?>
                                    <i class="comiis_font f_d">&#xe924</i>
                                <?php } elseif($field['fieldid']=='idcard') { ?>
                                    <i class="comiis_font f_d">&#xe655</i>
                                <?php } elseif($field['fieldid']=='address') { ?>
                                    <i class="comiis_font f_d">&#xe6b4</i>
                                <?php } elseif($field['fieldid']=='zipcode') { ?>
                                    <i class="comiis_font f_d">&#xe614</i>
                                <?php } elseif($field['fieldid']=='graduateschool') { ?>
                                    <i class="comiis_font f_d">&#xe662</i>
                                <?php } elseif($field['fieldid']=='education') { ?>
                                    <i class="comiis_font f_d">&#xe6ca</i>
                                <?php } elseif($field['fieldid']=='company') { ?>
                                    <i class="comiis_font f_d">&#xe662</i>
                                <?php } elseif($field['fieldid']=='occupation') { ?>
                                    <i class="comiis_font f_d">&#xe924</i>
                                <?php } elseif($field['fieldid']=='position') { ?>
                                    <i class="comiis_font f_d">&#xe924</i>
                                <?php } elseif($field['fieldid']=='revenue') { ?>
                                    <i class="comiis_font f_d">&#xe6cb</i>
                                <?php } elseif($field['fieldid']=='affectivestatus') { ?>
                                    <i class="comiis_font f_d">&#xe60e</i>
                                <?php } elseif($field['fieldid']=='lookingfor') { ?>
                                    <i class="comiis_font f_d">&#xe638</i>
                                <?php } elseif($field['fieldid']=='bloodtype') { ?>
                                    <i class="comiis_font f_d">&#xe7f9</i>
                                <?php } elseif($field['fieldid']=='alipay') { ?>
                                    <i class="comiis_font f_d">&#xe6d9</i>
                                <?php } elseif($field['fieldid']=='qq') { ?>
                                    <i class="comiis_font f_d">&#xe6a1</i>
                                <?php } elseif($field['fieldid']=='taobao') { ?>
                                    <i class="comiis_font f_d">&#xe6d7</i>
                                <?php } elseif($field['fieldid']=='site') { ?>
                                    <i class="comiis_font f_d">&#xe662</i>
                                <?php } elseif($field['fieldid']=='nationality') { ?>
                                    <i class="comiis_font f_d">&#xe6d5</i>
                                <?php } elseif($field['fieldid']=='residesuite') { ?>
                                    <i class="comiis_font f_d">&#xe806</i>
                                <?php } elseif($field['fieldid']=='height') { ?>
                                    <i class="comiis_font f_d">&#xe6d6</i>
                                <?php } elseif($field['fieldid']=='weight') { ?>
                                    <i class="comiis_font f_d">&#xe6d4</i>
                                <?php } else { ?>
                                    <i class="comiis_font f_d">&#xe632</i>
                                <?php } ?>
                            <?php } ?>
                            <?php if($comiis_app_switch['comiis_reg_tit']==1) { ?>
                                <?php echo $field['title'];?><?php if($field['required']) { ?><span class="f_g">*</span><?php } ?>
                            <?php } ?>
                        </div>
                        <?php } ?>
<div class="flex<?php if(stripos($htmls[$field['fieldid']], 'residedistrictbox')) { ?> comiis_residedistrictbox bg_e<?php } elseif(stripos($htmls[$field['fieldid']], 'birthdistrictbox')) { ?> comiis_birthdistrictbox bg_e<?php } elseif(stripos($htmls[$field['fieldid']], 'residedistrictbox') || stripos($htmls[$field['fieldid']], 'birthdistrictbox') || stripos($htmls[$field['fieldid']], 'textarea') || stripos($htmls[$field['fieldid']], 'radio') || stripos($htmls[$field['fieldid']], 'checkbox') || stripos($htmls[$field['fieldid']], 'file')) { ?> bg_e<?php } ?>">
<?php if($field['fieldid']=='birthday') { ?>
<span class="y"><?php echo str_replace('class="ps"', 'class="bg_f b_ok comiis_stylino"', $htmls[$field['fieldid']]);; ?></span>
<?php } elseif(stripos($htmls[$field['fieldid']], 'input')) { if(stripos($htmls[$field['fieldid']], 'radio') || stripos($htmls[$field['fieldid']], 'checkbox')) { echo comiis_read_setting($field['fieldid'], array(), false, false, true);; } else { echo str_replace(array('class="px"','class="pr"','class="pf"'), array('class="comiis_input kmshow" placeholder="'.$comiis_lang['reg30'].$field['title'].'"','class="kmshow" placeholder="'.$comiis_lang['reg30'].$field['title'].'"','class="kmshow" placeholder="'.$comiis_lang['reg30'].$field['title'].'"'), preg_replace('/<p>(.*?)<\/p>/', '', $htmls[$field['fieldid']]));; } } elseif(stripos($htmls[$field['fieldid']], 'textarea')) { ?>
                            <?php echo str_replace(array('class="pt"'), array('class="comiis_pxs kmshow" placeholder="'.$comiis_lang['reg30'].$field['title'].'"'), preg_replace('/<p>(.*?)<\/p>/', '', $htmls[$field['fieldid']]));; } elseif(stripos($htmls[$field['fieldid']], 'select')) { if(stripos($htmls[$field['fieldid']], 'residedistrictbox')) { ?>
<div class="comiis_login_select comiis_styli">
<span class="inner">
<i class="comiis_font f_d">&#xe60c</i>
<span class="z">
<span class="comiis_residedistrictbox_text f_c"></span>
</span>					
</span><?php echo str_replace(array('class="ps"', '&nbsp;'), array('class="comiis_residedistrictbox"', ''), $htmls[$field['fieldid']]);; ?></div>
<script>$('.comiis_residedistrictbox_text').text($('.comiis_residedistrictbox').find('option:selected').text());</script>
<?php } else { ?>
<div class="comiis_login_select<?php if(stripos($htmls[$field['fieldid']], 'birthdistrictbox')) { ?> comiis_styli<?php } ?>">
<span class="inner">
<i class="comiis_font f_d">&#xe60c</i>
<span class="z">
<span class="comiis_question_<?php echo $field['fieldid'];?> f_c"></span>
</span>					
</span><?php echo str_replace(array('class="ps"', '&nbsp;'), array('class="comiis_sel_list_'.$field['fieldid'].'"', ''), $htmls[$field['fieldid']]);; ?></div>
<script>
$('.comiis_question_<?php echo $field['fieldid'];?>').text($('.comiis_sel_list_<?php echo $field['fieldid'];?>').find('option:selected').text());
$(document).on('change', '.comiis_sel_list_<?php echo $field['fieldid'];?>', function() {
$('.comiis_question_<?php echo $field['fieldid'];?>').text($(this).find('option:selected').text());
});
</script>
<?php } } else { ?>
<?php echo $htmls[$field['fieldid']];?>
<?php } ?>
</div>
</li>
<?php } } ?>
                    <?php if(empty($invite) && ($_G['setting']['regstatus'] == 2 || $_G['setting']['regstatus'] == 3)) { ?>
                    <li class="comiis_flex<?php if($comiis_isweixin != 1 || !$comiis_app_switch['comiis_reg_regtxt']) { ?> qqli<?php } ?> styli_zico b_b f16">
                        <div class="styli_tit"><?php if($comiis_app_switch['comiis_reg_ico']==1) { ?><i class="comiis_font f_d">&#xe60f</i><?php } if($comiis_app_switch['comiis_reg_tit']==1) { ?>邀请码<?php if(empty($invite) && $this->setting['regstatus'] == 2 && !$invitestatus) { ?><span class="f_g">*</span><?php } } ?></div>
                        <div class="flex"><input type="text" name="invitecode" autocomplete="off" tabindex="5" class="comiis_input kmshow" value="" placeholder="<?php echo $comiis_lang['reg30'];?>邀请码<?php if(empty($invite) && $this->setting['regstatus'] != 2 && !$invitestatus) { ?>, <?php echo $comiis_lang['post11'];?><?php } ?>" fwin="login"></div>
                    </li>
                    <?php if($this->setting['inviteconfig']['invitecodeprompt']) { ?>
                    <li class="<?php if($comiis_isweixin != 1 || !$comiis_app_switch['comiis_reg_regtxt']) { ?> qqli<?php } ?> styli_zico b_b f_wb f13" style="height:auto;">
                       <div class="styli_tit"><?php if($comiis_app_switch['comiis_reg_ico']==1) { ?><i class="comiis_font f_f">&#xe62f</i><?php } ?></div>
                        <div class="flex"><?php echo $this->setting['inviteconfig']['invitecodeprompt'];?></div>
</li>
<?php } ?>
                    <?php } ?>
                    <?php if($this->setting['regverify'] == 2) { ?>
                        <li class="comiis_flex<?php if($comiis_isweixin != 1 || !$comiis_app_switch['comiis_reg_regtxt']) { ?> qqli<?php } ?> styli_zico b_b f16">
                            <div class="styli_tit"><?php if($comiis_app_switch['comiis_reg_ico']==1) { ?><i class="comiis_font f_d">&#xe6d1</i><?php } if($comiis_app_switch['comiis_reg_tit']==1) { ?>注册原因<span class="f_g">*</span><?php } ?></div>
                            <div class="flex"><input type="text" name="regmessage" autocomplete="off" tabindex="6" class="comiis_input kmshow" value="" placeholder="<?php echo $comiis_lang['reg30'];?>注册原因" fwin="login"></div>
                        </li>
                    <?php } } ?>			
<?php if($secqaacheck || $seccodecheck) { ?>
                    <li class="comiis_flex<?php if($comiis_isweixin != 1 || !$comiis_app_switch['comiis_reg_regtxt']) { ?> qqli<?php } ?> styli_zico b_b f16" style="height:auto;">
                        <div class="styli_tit"><?php if($comiis_app_switch['comiis_reg_ico']==1) { ?><i class="comiis_font f_d">&#xe6e0</i><?php } if($comiis_app_switch['comiis_reg_tit']==1) { ?><?php echo $comiis_lang['reg26'];?><?php } ?></div>
                        <div class="comiis_regsec flex"><?php $sechash = 'S'.random(4);
$sectpl = !empty($sectpl) ? explode("<sec>", $sectpl) : array('<br />',': ','<br />','');	
$ran = random(5, 1);?><?php if($secqaacheck) { $message = '';
$question = make_secqaa();
$secqaa = lang('core', 'secqaa_tips').$question;?><?php } if($sectpl) { if($secqaacheck) { ?>
<div class="comiis_sec_txt b_b f_c cl">
验证问答:
        <?php echo $secqaa;?>
<input name="secqaahash" type="hidden" value="<?php echo $sechash;?>" />
        &nbsp;<input name="secanswer" id="secqaaverify_<?php echo $sechash;?>" type="text" class="comiis_px b_ok" />
        </div>
<?php } if($seccodecheck) { ?>
<div class="comiis_sec_code b_t cl">
<input name="seccodehash" type="hidden" value="<?php echo $sechash;?>" class="sechash" />
<img src="misc.php?mod=seccode&amp;update=<?php echo $ran;?>&amp;idhash=<?php echo $sechash;?>&amp;mobile=2" class="sec_code_img" />
<input type="text" class="comiis_px vm" style="ime-mode:disabled;" autocomplete="off" value="" id="seccodeverify_<?php echo $sechash;?>" name="seccodeverify" placeholder="验证码" fwin="seccode">        
</div>
<?php } } ?>
<script type="text/javascript">
(function() {
$('.sec_code_img').on('click', function() {
$('#seccodeverify_<?php echo $sechash;?>').attr('value', '');
var tmprandom = 'S' + Math.floor(Math.random() * 1000);
$('.sechash').attr('value', tmprandom);
$(this).attr('src', 'misc.php?mod=seccode&update=<?php echo $ran;?>&idhash='+ tmprandom +'&mobile=2');
});
})();
</script></div>
</li>
<?php } ?>
</ul>
</div>
<div class="comiis_btnbox btn_register"><button tabindex="7" value="true" name="regsubmit" type="submit" class="formdialog comiis_btn bg_c f_f" comiis='handle'>立即注册</button></div>
<?php if(!empty($_G['setting']['pluginhooks']['global_comiis_member_register_mobile'])) echo $_G['setting']['pluginhooks']['global_comiis_member_register_mobile'];?>
</form>
<?php if($bbrules) { ?>
<div class="comiis_reg_link comiis_input_style cl" style="margin-top:-5px;">
<input type="checkbox" class="pc" name="agreebbrule" value="<?php echo $bbrulehash;?>" id="agreebbrules" checked="checked" />
<label for="agreebbrules"><i class="comiis_font f_0">&#xe644</i> <span class="f_c"><?php echo $comiis_lang['reg7'];?></span>
<a href="member.php?mod=<?php echo $_G['setting']['regname'];?>&amp;agreement=yes" class="f_0 f_u">网站服务条款</a></label>
</div>
<?php } ?>
<div class="comiis_reg_link f_a cl"><a href="member.php?mod=logging&amp;action=login"><?php echo $comiis_lang['reg6'];?> &gt;&gt;</a>
</div>
</div>
        <?php if(($_G['setting']['connect']['allow'] && !$_G['setting']['bbclosed']) || !empty($_G['setting']['pluginhooks']['global_comiis_member_login_mobile'])) { ?>
        <div class="comiis_log_dsf cl">
            <div class="comiis_log_line cl"><span class="<?php if($comiis_isweixin == 1 && $comiis_app_switch['comiis_reg_regtxt']) { ?>bg_f<?php } else { ?>comiis_bodybg<?php } ?> f_c"><?php echo $comiis_lang['reg4'];?></span></div>
            <div class="comiis_log_ico f_d">
                <?php if(!empty($_G['setting']['pluginhooks']['global_comiis_member_login_mobile'])) echo $_G['setting']['pluginhooks']['global_comiis_member_login_mobile'];?>
                <?php if(($_G['setting']['connect']['allow'] && !$_G['setting']['bbclosed'])) { ?><a href="<?php echo $_G['connect']['login_url'];?>&statfrom=login_simple" class="bg_f b_ok"><i class="comiis_font f_qq">&#xe625;</i><?php if($comiis_app_switch['comiis_qqico_txt'] == 1) { ?><span><?php echo $comiis_lang['tip326'];?></span><?php } ?></a><?php } ?>
            </div>
        </div>
        <?php } ?>
        </div>
<script src="./template/comiis_app/comiis/js/comiis_hideShowPassword.js" type="text/javascript"></script>
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
        <?php if($comiis_app_switch['comiis_reg_bg'] == 1) { ?>
            <?php if(!$comiis_app_switch['comiis_reg_bg_img']) { ?>
                <?php $comiis_bgimg_s = '';
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
                    }?>                <?php if($comiis_bgimg_s) { ?>
                    <script src="./template/comiis_app/comiis/js/comiis_bgstretcher.js" type="text/javascript"></script>
                    <script>
                        $(document).ready(function(){
                            $(document).bgStretcher({
                                images: [<?php echo $comiis_bgimg_s;?>]
                            });
                        });
                    </script>
                <?php } ?>
            <?php } ?>
        <?php } } } ?>
<?php if(!empty($_G['setting']['pluginhooks']['register_bottom'])) echo $_G['setting']['pluginhooks']['register_bottom'];?><?php updatesession();?><?php $comiis_foot = 'no';?><?php include template('common/footer'); ?>