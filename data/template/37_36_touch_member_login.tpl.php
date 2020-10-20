<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); hookscriptoutput('login');
0
|| checktplrefresh('./template/comiis_app/touch/member/login.htm', './template/comiis_app/touch/common/seccheck.htm', 1600755737, '36', './data/template/37_36_touch_member_login.tpl.php', './template/comiis_app', 'touch/member/login')
;?><?php include template('common/header'); if($comiis_app_switch['comiis_reg_ico']==0 && $comiis_app_switch['comiis_reg_tit']==0) { ?>
<style>.styli_zico .styli_tit {padding-right:0;}</style>
<?php } elseif($comiis_app_switch['comiis_reg_tit']==0) { ?>
<style>.styli_zico .styli_tit i {padding-right:0;}</style>
<?php } if($_GET['infloat']) { ?>
<script>window.location.href = 'member.php?mod=logging&action=login';</script>
<?php } else { $loginhash = 'L'.random(4);?><?php if($comiis_app_switch['comiis_reg_bg'] == 1) { ?>
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
    .comiis_reg_bg .comiis_login_from li {border-bottom:1px solid rgba(255,255,255,0.3) !important;}
    .comiis_reg_bg .comiis_login_from li.qqli {padding:10px 0;}
    .comiis_reg_bg .comiis_login_from input, .comiis_reg_bg .comiis_login_from select, .comiis_reg_bg a, .comiis_reg_bg .f_a, .comiis_reg_bg .f_c, .comiis_reg_bg .f_d, .comiis_reg_bg .f_0 {color:#fff !important;}
    .comiis_reg_bg .comiis_login_from .f13 i {filter:alpha(opacity=0);-moz-opacity:0;-khtml-opacity:0;opacity:0;}
    .comiis_reg_bg .comiis_log_dsf, .comiis_reg_bg .comiis_log_ico {margin-bottom:0;}
    .comiis_reg_bg .comiis_log_line, .comiis_reg_bg .comiis_log_line .f_c {background:none !important;}
    #comiis_head .b_b {border-bottom:none !important}
</style>
<?php } ?>
<div class="comiis_loginbox<?php if($_GET['infloat']) { ?> comiis_login_pop comiis_bodybg<?php } if($comiis_app_switch['comiis_reg_bg'] == 1) { ?> comiis_reg_bg f_f<?php } ?>">
<?php if($_GET['lostpasswd'] == 'yes') { ?>    
        <?php if($comiis_isweixin == 1 && $comiis_app_switch['comiis_reg_zmtxt'] && $comiis_app_switch['comiis_reg_bg'] != 1) { ?><div class="comiis_login_tit"><?php echo $comiis_app_switch['comiis_reg_zmtxt'];?></div><?php } ?>
        <?php if($comiis_app_switch['comiis_reg_bg'] == 1 && $comiis_app_switch['comiis_reg_bg_logo']) { ?><div class="comiis_login_logo"><?php echo $comiis_app_switch['comiis_reg_bg_logo'];?></div><?php } ?>
        <div class="comiis_post_from<?php if(($comiis_isweixin == 1 && $comiis_app_switch['comiis_reg_zmtxt']) || $comiis_app_switch['comiis_reg_bg'] == 1) { ?> mt15<?php } ?> cl">
            <form method="post" autocomplete="off" id="lostpwform" class="cl" onsubmit="ajaxpost('lostpwform', 'returnmessage3_<?php echo $loginhash;?>', 'returnmessage3_<?php echo $loginhash;?>', 'onerror');return false;" action="member.php?mod=lostpasswd&amp;lostpwsubmit=yes&amp;infloat=yes">
                <input type="hidden" name="formhash" value="<?php echo FORMHASH;?>" />
                <input type="hidden" name="handlekey" value="lostpwform" />
                <div class="comiis_login_from<?php if($comiis_isweixin == 1 && $comiis_app_switch['comiis_reg_zmtxt'] && $comiis_app_switch['comiis_reg_bg'] != 1) { ?> bg_f b_t<?php } ?>"<?php if(($comiis_isweixin != 1 || !$comiis_app_switch['comiis_reg_zmtxt']) && $comiis_app_switch['comiis_reg_bg'] != 1) { ?> style="margin:0;"<?php } ?>>
                    <ul<?php if(($comiis_isweixin != 1 || !$comiis_app_switch['comiis_reg_zmtxt']) && $comiis_app_switch['comiis_reg_bg'] != 1) { ?> class="bg_f b_t"<?php } ?>>
                        <li class="comiis_flex<?php if($comiis_isweixin != 1 || !$comiis_app_switch['comiis_reg_zmtxt']) { ?> qqli<?php } ?> styli_zico f16 b_b">
                            <div class="styli_tit"><?php if($comiis_app_switch['comiis_reg_ico']==1) { ?><i class="comiis_font f_d">&#xe614;</i><?php } if($comiis_app_switch['comiis_reg_tit']==1) { ?><?php echo $comiis_lang['reg24'];?><?php } ?></div>
                            <div class="flex"><input type="text" value="" tabindex="1" class="comiis_px" size="30" autocomplete="off" name="email" id="lostpw_email" placeholder="<?php echo $comiis_lang['reg25'];?>"></div>
                        </li>
                        <li class="comiis_flex<?php if($comiis_isweixin != 1 || !$comiis_app_switch['comiis_reg_zmtxt']) { ?> qqli<?php } ?> styli_zico f16 b_b">
                            <div class="styli_tit"><?php if($comiis_app_switch['comiis_reg_ico']==1) { ?><i class="comiis_font f_d">&#xe61e;</i><?php } if($comiis_app_switch['comiis_reg_tit']==1) { ?><?php echo $comiis_lang['tip295'];?><?php } ?></div>
                            <div class="flex"><input type="text" value="" tabindex="2" class="comiis_px" size="30" autocomplete="off" name="username" id="lostpw_username" placeholder="请输入用户名"></div>
                        </li>
                    </ul>
                </div>
                <div class="comiis_btnbox btn_login"><button tabindex="3" value="true" name="lostpwsubmit" type="submit" class="formdialog comiis_btn bg_c f_f" comiis='handle'>提交</button></div>
            </form>
</div>
<script>
$('.comiis_head h2').html("找回密码");
function succeedhandle_lostpwform(a, b, c){
popup.open(b, 'alert');
if(a){
setTimeout(function() {
window.location.href = a;
}, 1000);
}
}
function errorhandle_lostpwform(a, b){
popup.open(a, 'alert');
}
</script>
<?php } else { ?>
        <?php if($comiis_isweixin == 1 && $comiis_app_switch['comiis_reg_dltxt'] && $comiis_app_switch['comiis_reg_bg'] != 1) { ?><div class="comiis_login_tit"><?php echo $comiis_app_switch['comiis_reg_dltxt'];?></div><?php } ?>
        <?php if($comiis_app_switch['comiis_reg_bg'] == 1 && $comiis_app_switch['comiis_reg_bg_logo']) { ?><div class="comiis_login_logo"><?php echo $comiis_app_switch['comiis_reg_bg_logo'];?></div><?php } if($_GET['infloat']) { ?>
<h2 class="comiis_log_tit"><a href="javascript:;" onclick="popup.close();"><i class="comiis_font f_d y">&#xe639;</i></a>登录</h2>
<?php } ?>
<div class="comiis_post_from<?php if(($comiis_isweixin == 1 && $comiis_app_switch['comiis_reg_dltxt']) || $comiis_app_switch['comiis_reg_bg'] == 1) { ?> mt15<?php } ?> cl">
        <form id="loginform" method="post" action="member.php?mod=logging&amp;action=login&amp;loginsubmit=yes&amp;loginhash=<?php echo $loginhash;?>" onsubmit="<?php if($_G['setting']['pwdsafety']) { ?>pwmd5('password3_<?php echo $loginhash;?>');<?php } ?>" >
        <input type="hidden" name="formhash" id="formhash" value='<?php echo FORMHASH;?>' />
        <input type="hidden" name="referer" id="referer" value="<?php if(dreferer()) { echo dreferer(); } else { ?>forum.php?mobile=2<?php } ?>" />
        <input type="hidden" name="fastloginfield" value="username">
        <input type="hidden" name="cookietime" value="2592000">
        <?php if($auth) { ?>
            <input type="hidden" name="auth" value="<?php echo $auth;?>" />
        <?php } ?>
        <div class="comiis_login_from<?php if($comiis_isweixin == 1 && $comiis_app_switch['comiis_reg_dltxt'] && $comiis_app_switch['comiis_reg_bg'] != 1) { ?> bg_f b_t<?php } ?>"<?php if(($comiis_isweixin != 1 || !$comiis_app_switch['comiis_reg_dltxt']) && $comiis_app_switch['comiis_reg_bg'] != 1) { ?> style="margin:0;"<?php } ?>>
            <ul<?php if(($comiis_isweixin != 1 || !$comiis_app_switch['comiis_reg_dltxt']) && $comiis_app_switch['comiis_reg_bg'] != 1) { ?> class="bg_f b_t"<?php } ?>>
<li class="comiis_flex<?php if($comiis_isweixin != 1 || !$comiis_app_switch['comiis_reg_dltxt']) { ?> qqli<?php } ?> styli_zico f16 b_b">
                    <div class="styli_tit"><?php if($comiis_app_switch['comiis_reg_ico']==1) { ?><i class="comiis_font f_d">&#xe61e;</i><?php } if($comiis_app_switch['comiis_reg_tit']==1) { ?><?php echo $comiis_lang['tip295'];?><?php } ?></div>
                    <div class="flex"><input type="text" value="" tabindex="1" class="comiis_px" autocomplete="off" value="" name="username" placeholder="请输入用户名" fwin="login"></div>
</li>
<li class="comiis_flex<?php if($comiis_isweixin != 1 || !$comiis_app_switch['comiis_reg_dltxt']) { ?> qqli<?php } ?> styli_zico f16 b_b">
                    <div class="styli_tit"><?php if($comiis_app_switch['comiis_reg_ico']==1) { ?><i class="comiis_font f_d">&#xe61d;</i><?php } if($comiis_app_switch['comiis_reg_tit']==1) { ?><?php echo $comiis_lang['tip171'];?><?php } ?></div>
                    <div class="flex"><input type="password" tabindex="2" class="comiis_px" value="" name="password" placeholder="<?php echo $comiis_lang['reg13'];?>" fwin="login" id="password"></div>
                </li>
<li class="comiis_flex<?php if($comiis_isweixin != 1 || !$comiis_app_switch['comiis_reg_dltxt']) { ?> qqli<?php } ?> styli_zico f16 b_b">
                    <div class="styli_tit"><?php if($comiis_app_switch['comiis_reg_ico']==1) { ?><i class="comiis_font f_d">&#xe6d1;</i><?php } if($comiis_app_switch['comiis_reg_tit']==1) { ?><?php echo $comiis_lang['tip296'];?><?php } ?></div>
                    <div class="flex">
                        <div class="comiis_login_select">
                        <span class="inner">
                            <i class="comiis_font f_d">&#xe60c;</i>
                            <span class="z">
                                <span class="comiis_question f_c">安全提问(未设置请忽略)</span>
                            </span>					
                        </span>
                        <select id="questionid_<?php echo $loginhash;?>" name="questionid" class="comiis_sel_list">
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
</li>
<li class="answerli b_b<?php if($comiis_isweixin != 1 || !$comiis_app_switch['comiis_reg_dltxt']) { ?> qqli<?php } ?>" style="display:none;">
                    <div class="comiis_flex styli_zico f16">
                        <div class="styli_tit"><?php if($comiis_app_switch['comiis_reg_ico']==1) { ?><i class="comiis_font f_d">&#xe655;</i><?php } if($comiis_app_switch['comiis_reg_tit']==1) { ?><?php echo $comiis_lang['reg18'];?><?php } ?></div>
                        <div class="flex"><input type="text" name="answer" id="answer_<?php echo $loginhash;?>" class="comiis_px" size="30" placeholder="<?php echo $comiis_lang['reg19'];?>"></div>
                    </div>
                </li>
<?php if($seccodecheck) { ?>
<li class="comiis_flex<?php if($comiis_isweixin != 1 || !$comiis_app_switch['comiis_reg_dltxt']) { ?> qqli<?php } ?> styli_zico f16 b_b">
                    <div class="styli_tit"><?php if($comiis_app_switch['comiis_reg_ico']==1) { ?><i class="comiis_font f_d">&#xe6e0;</i><?php } if($comiis_app_switch['comiis_reg_tit']==1) { ?><?php echo $comiis_lang['reg26'];?><?php } ?></div>
                    <div class="flex">
                    <?php $sechash = 'S'.random(4);
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
</script>                    </div>
                </li>
<?php } ?>
</ul>
</div>
<div class="comiis_btnbox btn_login"><button value="true" name="submit" type="submit" class="formdialog comiis_btn bg_c f_f" tabindex="3" comiis='handle'>登录</button></div>
</form>
</div>
<script src="./template/comiis_app/comiis/js/comiis_hideShowPassword.js" type="text/javascript"></script>
<script type="text/javascript">
$('#password').hidePassword(true);
(function() {
$(document).on('change', '.comiis_sel_list', function() {
var obj = $(this);
$('.comiis_question').text(obj.find('option:selected').text());
if(obj.val() == 0) {
$('.answerli').css('display', 'none');
$('.questionli').addClass('bl_none');
} else {
$('.answerli').css('display', 'block');
$('.questionli').removeClass('bl_none');
}
});
 })();
function succeedhandle_loginform(a, b, c){
popup.open(b, 'alert');
if(a){
setTimeout(function() {
window.location.href = a;
}, 1000);
}
}
function errorhandle_loginform(a, b){
popup.open(a, 'alert');
}
</script>
<?php } ?>	
<?php if($_G['setting']['regstatus']) { ?>
<div class="comiis_reg_link f_ok cl"><?php if($_GET['lostpasswd'] == 'yes') { ?><a href="member.php?mod=logging&amp;action=login" class="y"><?php echo $comiis_lang['reg1'];?></a><?php } else { ?><a href="member.php?mod=logging&amp;action=login&amp;lostpasswd=yes" class="y"><?php echo $comiis_lang['reg2'];?></a><?php } ?><a href="member.php?mod=<?php echo $_G['setting']['regname'];?>"><?php echo $comiis_lang['reg3'];?></a></div>
<?php } if(($_G['setting']['connect']['allow'] && !$_G['setting']['bbclosed']) || !empty($_G['setting']['pluginhooks']['global_comiis_member_login_mobile'])) { ?>
<div class="comiis_log_dsf cl">
<div class="comiis_log_line cl"><span class="<?php if($comiis_isweixin == 1 && $comiis_app_switch['comiis_reg_dltxt']) { ?>bg_f<?php } else { ?>comiis_bodybg<?php } ?> f_c"><?php echo $comiis_lang['reg4'];?></span></div>
<div class="comiis_log_ico f_d">			
<?php if(!empty($_G['setting']['pluginhooks']['global_comiis_member_login_mobile'])) echo $_G['setting']['pluginhooks']['global_comiis_member_login_mobile'];?>
<?php if(($_G['setting']['connect']['allow'] && !$_G['setting']['bbclosed'])) { ?><a href="<?php echo $_G['connect']['login_url'];?>&statfrom=login_simple" class="bg_f b_ok"><i class="comiis_font f_qq">&#xe625;</i><?php if($comiis_app_switch['comiis_qqico_txt'] == 1) { ?><span><?php echo $comiis_lang['tip326'];?></span><?php } ?></a><?php } ?>
</div>
</div>
<?php } ?>
<?php if(!empty($_G['setting']['pluginhooks']['logging_bottom_mobile'])) echo $_G['setting']['pluginhooks']['logging_bottom_mobile'];?>
</div>
<?php if($_G['setting']['pwdsafety']) { ?>
<script src="<?php echo $_G['setting']['jspath'];?>md5.js?<?php echo VERHASH;?>" type="text/javascript" reload="1"></script>
<?php } ?>
    <?php if($comiis_app_switch['comiis_reg_bg'] == 1) { if(!$comiis_app_switch['comiis_reg_bg_img']) { $comiis_bgimg_s = '';
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
}?><?php if($comiis_bgimg_s) { ?>
<script src="./template/comiis_app/comiis/js/comiis_bgstretcher.js" type="text/javascript"></script>
<script>
$(document).ready(function(){
$(document).bgStretcher({
images: [<?php echo $comiis_bgimg_s;?>]
});
});
</script>
<?php } } } updatesession();?><?php } $comiis_foot = 'no';?><?php include template('common/footer'); ?>