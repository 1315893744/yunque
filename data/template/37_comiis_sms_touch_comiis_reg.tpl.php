<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); ?><?php
$__FORMHASH = FORMHASH;$return = <<<EOF

EOF;
 $navtitle = $comiis_sms['30'];
$return .= <<<EOF

EOF;
 if($this->comiis_config['reg_mod'] == 0) { 
$return .= <<<EOF

<style>
.comiis_sms_regbox{position: fixed;top: 0;left: 0;width: 100%;height: 100%;overflow: hidden;z-index: 99;background:#f3f3f3;transition: all .4s ease;-webkit-transition: all .4s ease;transform: translateX(0px);-webkit-transform: translateX(0px);}
.comiis_sms_regbox_hide{transform: translateX(100%);-webkit-transform: translateX(100%);}
</style>
<script>
function comiis_sms_regbox(a){
if(a == 0){
$('.comiis_sms_regbox').addClass("comiis_sms_regbox_hide");
}else{
$('.comiis_sms_regbox').removeClass('comiis_sms_regbox_hide');
}
}

EOF;
 if($this->is_comiis_template == 0) { 
$return .= <<<EOF

$('.registerbox').append('<div class="comiis_btn_login"><button value="true" type="button" onclick="comiis_sms_regbox(1);" class="comiis_btn bg_c f_f">{$comiis_sms['30']}</button></div>');

EOF;
 } 
$return .= <<<EOF

</script>

EOF;
 } if($this->is_comiis_template == 1) { 
$return .= <<<EOF

<link rel="stylesheet" href="./source/plugin/comiis_sms/image/comiis_app.css" type="text/css">

EOF;
 } else { 
$return .= <<<EOF

<link rel="stylesheet" href="./source/plugin/comiis_sms/image/comiis.css" type="text/css">
<style>
.bg_0 {background:{$this->comiis_config['sms_bg']};}
.bg_c {background:{$this->comiis_config['sms_bgb']};}
.bg_a {background:{$this->comiis_config['sms_bga']};}
.f_0 {color:{$this->comiis_config['sms_bg']} !important;}
.f_a {color:{$this->comiis_config['sms_bga']} !important;}
.f_ok {color:{$this->comiis_config['sms_bgc']} !important;}
.b_0 {border-color:{$this->comiis_config['sms_bg']};}
</style>

EOF;
 } if($this->comiis_config['reg_mod'] != 0) { 
$return .= <<<EOF
<style>body.comiis_bodybg {background:#f3f3f3;}</style>
EOF;
 } 
$return .= <<<EOF

<div class="comiis_sms_regbox wmse">
    
EOF;
 if($this->is_comiis_template != 1 || $this->comiis_config['reg_mod'] == 0) { 
$return .= <<<EOF

    <div id="comiis_sms_head">		
        <div class="comiis_sms_head
EOF;
 if($comiis_app_switch['comiis_header_style'] == 1) { 
$return .= <<<EOF
 bg_f f_0 b_b
EOF;
 } else { 
$return .= <<<EOF
 bg_0 f_f
EOF;
 } 
$return .= <<<EOF
 xlco cl">
            <div class="header_z">
EOF;
 if($this->comiis_config['reg_mod'] == 0) { 
$return .= <<<EOF
<a href="javascript:;" onclick="comiis_sms_regbox(0);">
EOF;
 } else { 
$return .= <<<EOF
<a href="javascript:history.back(-1)">
EOF;
 } 
$return .= <<<EOF
<i class="comiis_mobfont">&#xe60d;</i></a></div>
            <h2>{$comiis_sms['30']}</h2>
            <div class="header_y"><a href="./"><i class="comiis_mobfont">&#xe662;</i></a></div>
        </div>
    </div>
    
EOF;
 } 
$return .= <<<EOF

<div class="comiis_login_box ypci comiis_mobreg_box register">
        <form method="post" autocomplete="off" name="register"  enctype="multipart/form-data"  action="plugin.php?id=comiis_sms:comiis_sms_post&amp;action=register&amp;inajax=1" id="comiis_sms_sms">
        <input type="hidden" name="formhash" value="{$__FORMHASH}">
        <input type="hidden" name="comiis_smssubmit" value="true">
        <input type="hidden" name="referer" value="
EOF;
 $dreferer = dreferer();
$return .= <<<EOF
{$dreferer}" />
<div class="comiis_login_from aakb bg_f b_t b_b" style="margin:0;">
<ul>
<li class="comiis_flex qqli styli_zico f16">
<div class="styli_tit">
EOF;
 if($comiis_app_switch['comiis_reg_ico']==1) { 
$return .= <<<EOF
<i class="comiis_mobfont f_d">&#xe684;</i>
EOF;
 } if($comiis_app_switch['comiis_reg_tit']==1) { 
$return .= <<<EOF
{$comiis_sms['148']}
EOF;
 } 
$return .= <<<EOF
</div>
<div class="flex"><input type="text" value="" class="comiis_px" placeholder="{$comiis_sms['138']}{$comiis_sms['146']}" name="comiis_tel" id="comiis_tel" autocomplete="off" required></div>
<div class="styli_r">
<div class="comiis_mobreg_time comiis_sendbtn bg_a f_f" style="display:none"><span></span>{$comiis_sms['08']}</div>
<button type="button" class="comiis_sendbtn bg_0 f_f comiis_mobreg_timekey" onclick="comiis_mobreg_fkey('register')">{$comiis_sms['09']}</button></div>
</li>
<li class="comiis_flex qqli styli_zico f16 b_t">
<div class="styli_tit">
EOF;
 if($comiis_app_switch['comiis_reg_ico']==1) { 
$return .= <<<EOF
<i class="comiis_mobfont f_d">&#xe6e0;</i>
EOF;
 } if($comiis_app_switch['comiis_reg_tit']==1) { 
$return .= <<<EOF
{$comiis_sms['149']}
EOF;
 } 
$return .= <<<EOF
</div>
<div class="flex"><input type="text" value="" class="comiis_px" placeholder="{$comiis_sms['138']}{$comiis_sms['147']}" name="code" autocomplete="off" required></div>
</li>
                
EOF;
 if($_G['comiis_sms']['open_name'] == 1) { 
$return .= <<<EOF
				
<li class="comiis_flex qqli styli_zico f16 b_t">
<div class="styli_tit">
EOF;
 if($comiis_app_switch['comiis_reg_ico']==1) { 
$return .= <<<EOF
<i class="comiis_mobfont f_d">&#xe61e;</i>
EOF;
 } if($comiis_app_switch['comiis_reg_tit']==1) { 
$return .= <<<EOF
{$comiis_sms['22']}
EOF;
 } 
$return .= <<<EOF
</div>
<div class="flex"><input type="text" value="" class="comiis_px" placeholder="{$comiis_sms['138']}{$comiis_sms['44']}" name="name" autocomplete="off" required></div>
</li>
                
EOF;
 } 
$return .= <<<EOF

<li class="comiis_flex qqli styli_zico f16 b_t">
<div class="styli_tit">
EOF;
 if($comiis_app_switch['comiis_reg_ico']==1) { 
$return .= <<<EOF
<i class="comiis_mobfont f_d">&#xe61d;</i>
EOF;
 } if($comiis_app_switch['comiis_reg_tit']==1) { 
$return .= <<<EOF
{$comiis_sms['138']}{$comiis_sms['145']}
EOF;
 } 
$return .= <<<EOF
</div>
<div class="flex"><input type="password" value="" class="comiis_px" placeholder="{$comiis_sms['138']}{$comiis_sms['145']}" name="password1" autocomplete="off" required></div>
</li>
<li class="comiis_flex qqli styli_zico f16 b_t">
<div class="styli_tit">
EOF;
 if($comiis_app_switch['comiis_reg_ico']==1) { 
$return .= <<<EOF
<i class="comiis_mobfont f_d">&#xe6d2;</i>
EOF;
 } if($comiis_app_switch['comiis_reg_tit']==1) { 
$return .= <<<EOF
{$comiis_sms['151']}{$comiis_sms['145']}
EOF;
 } 
$return .= <<<EOF
</div>
<div class="flex"><input type="password" value="" class="comiis_px" placeholder="{$comiis_sms['152']}" name="password2" autocomplete="off" required></div>
</li>
                
EOF;
 if($_G['comiis_sms']['seccodeverify'] && ($secqaacheck || $seccodecheck)) { 
$return .= <<<EOF
									
                        
EOF;
 list($seccodecheck, $secqaacheck) = seccheck('register');
                                if($secqaacheck || $seccodecheck){
                                    $sectpl = '<div class="rfm"><table><tr><th><span class="rq">*</span><sec>: </th><td><sec><br /><sec></td></tr></table></div>';
                                    $sechash = !isset($sechash) ? 'S'.($_G['inajax'] ? 'A' : '').$_G['sid'] : $sechash.random(3);
                                    $sectpl = str_replace("'", "\'", $sectpl);
                                }
                            $sechash = 'S'.random(4);
                            $sectpl = !empty($sectpl) ? explode("<sec>", $sectpl) : array('<br />',': ','<br />','');	
                            $ran = random(5, 1);
$return .= <<<EOF
                        
EOF;
 if($secqaacheck) { 
$return .= <<<EOF

                        
EOF;
 $message = '';
                            $question = make_secqaa();
                            $secqaa = lang('core', 'secqaa_tips').$question;
$return .= <<<EOF
                        
EOF;
 } 
$return .= <<<EOF

                        
EOF;
 if($sectpl) { 
$return .= <<<EOF

                            
EOF;
 if($secqaacheck) { 
$return .= <<<EOF
   
                            <li class="comiis_flex qqli styli_zico f16 b_t comiis_reg_secqaacheck" style="height:auto;">  
                                <div class="styli_tit">
EOF;
 if($comiis_app_switch['comiis_reg_ico']==1) { 
$return .= <<<EOF
<i class="comiis_mobfont f_d">&#xe655;</i>
EOF;
 } if($comiis_app_switch['comiis_reg_tit']==1) { 
$return .= <<<EOF
验证问答
EOF;
 } 
$return .= <<<EOF
</div>
                                <div class="comiis_regsec flex">                
                                    <div class="comiis_sec_txt f_c cl" style="padding:0 0 5px;margin-top:-3px;line-height:30px;">
                                    {$secqaa}
                                    <input name="secqaahash" type="hidden" value="{$sechash}" />
                                    &nbsp;<input name="secanswer" id="secqaaverify_{$sechash}" type="text" class="comiis_px b_ok f_a" />
                                    </div>
                                </div>
                            </li>
                            
EOF;
 } 
$return .= <<<EOF

                            
EOF;
 if($seccodecheck) { 
$return .= <<<EOF

                            <li class="comiis_flex qqli styli_zico f16 b_t comiis_reg_secqaacheck">  
                                <div class="styli_tit">
EOF;
 if($comiis_app_switch['comiis_reg_ico']==1) { 
$return .= <<<EOF
<i class="comiis_mobfont f_d">&#xe62f;</i>
EOF;
 } if($comiis_app_switch['comiis_reg_tit']==1) { 
$return .= <<<EOF
{$comiis_sms['209']}
EOF;
 } 
$return .= <<<EOF
</div>
                                <div class="comiis_regsec flex">
                                    <div class="comiis_sec_code cl">
                                        <input name="seccodehash" type="hidden" value="{$sechash}" class="sechashs" />
                                        <img src="misc.php?mod=seccode&amp;update={$ran}&amp;idhash={$sechash}&amp;mobile=2" class="sec_code_imgs sec_code_img" />
                                        <input type="text" class="comiis_px vm" style="ime-mode:disabled;" autocomplete="off" value="" id="seccodeverifys_{$sechash}" name="seccodeverify" placeholder="{$comiis_sms['138']}{$comiis_sms['216']}验证码" fwin="seccode">        
                                    </div>
                                </div>
                            </li>
                            
EOF;
 } 
$return .= <<<EOF

                        
EOF;
 } 
$return .= <<<EOF

                        <script type="text/javascript">
                            (function() {
                                $('.sec_code_imgs').on('click', function() {
                                    $('#seccodeverifys_{$sechash}').attr('value', '');
                                    var tmprandom = 'S' + Math.floor(Math.random() * 1000);
                                    $('.sechashs').attr('value', tmprandom);
                                    $(this).attr('src', 'misc.php?mod=seccode&update={$ran}&idhash='+ tmprandom +'&mobile=2');
                                });
                                
                            })();
                        </script>
                
EOF;
 } 
$return .= <<<EOF
	
</ul>
</div>
        
EOF;
 if($_G['setting']['bbrules']) { 
$return .= <<<EOF

            <div class="comiis_reg_link comiis_input_style cl" style="margin:5px 15px -5px;
EOF;
 if($this->is_comiis_template != 1) { 
$return .= <<<EOF
display:none;
EOF;
 } 
$return .= <<<EOF
">
            <input type="checkbox" class="pc" name="agreebbrule" value="1" id="agreebbruless" checked="checked" />
            <label for="agreebbruless"><i class="comiis_font f_0">&#xe644</i> <span class="f_c">{$comiis_sms['210']}</span>
            <a href="member.php?mod={$_G['setting']['regname']}&amp;agreement=yes" class="f_0 f_u">{$comiis_sms['211']}</a></label>
            </div>
        
EOF;
 } 
$return .= <<<EOF

<div class="comiis_btn_login bfhl"><button value="true" type="submit" name="regsubmit" class="formdialog comiis_btn bg_c f_f">{$comiis_sms['153']}</button></div>
</form>

EOF;
 if($this->comiis_config['reg_mod'] == 0) { 
$return .= <<<EOF

            <div class="comiis_reg_link cl"><a href="member.php?mod=logging&amp;action=login" class="y f_ok">{$comiis_sms['154']}</a><a href="javascript:;" onclick="comiis_sms_regbox(0);" class="f_ok">{$comiis_sms['155']}</a></div>

EOF;
 } else { 
$return .= <<<EOF

            <div class="comiis_reg_link cl"><a href="member.php?mod=logging&amp;action=login&amp;lostpasswd=yes" class="y f_ok">{$comiis_sms['96']}</a><a href="member.php?mod=logging&amp;action=login" class="f_ok">{$comiis_sms['154']}</a></div>

EOF;
 } 
$return .= <<<EOF

</div>
</div>
EOF;
 $comiis_foot = 'no';
$return .= <<<EOF

EOF;
?>
