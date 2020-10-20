<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); ?><?php
$__FORMHASH = FORMHASH;$data = <<<EOF

<style>
.comiis_sms_titbox {height:31px;margin-bottom:-15px;}
.comiis_sms_title_wmse {margin:10px 10px 10px;border-bottom:1px solid #cdcdcd;line-height:30px;}
.comiis_sms_title_wmse ul {margin-left:120px;}
.comiis_sms_title_wmse li {float:left;margin:0 0 -1px 10px;}
.comiis_sms_title_wmse li a {display:block;padding:0 15px;background:#e5edf2;border:1px solid #cdcdcd;}
.comiis_sms_title_wmse li.comiis_sms_on a {background:#fff;border-bottom-color:#fff;font-weight:700;}
.comiis_mobreg_box .rfm .kmdtm th, .comiis_mobreg_box .rfm .kmdtm td {padding:0 0 12px;}
.rfm th, .fwin .rfm th, .fwin .rfm td, .nfl .f_c .rfm th, .nfl .f_c .rfm td {padding:6px 5px 6px 2px;}
</style>

EOF;
 if($_G['comiis_sms']['lostpw_mod'] == 0) { 
$data .= <<<EOF

<div class="comiis_sms_title_wmse cl">
<ul>
<li class="comiis_sms_on xlco" onclick="comiis_mobile_jtab(0)" id="comiis_mobile_jtab_0"><a href="javascript:;">{$comiis_sms['26']}</a></li>
<li onclick="comiis_mobile_jtab(1)" id="comiis_mobile_jtab_1"><a href="javascript:;">{$comiis_sms['27']}</a></li>
</ul>
</div>

EOF;
 } 
$data .= <<<EOF

<form method="post" autocomplete="off" name="register" enctype="multipart/form-data"  action="plugin.php?id=comiis_sms:comiis_sms_post&amp;action=lostpw&amp;inajax=1&amp;handlekey=comiis_lostpw" id="comiis_mobile_jms_sms" onsubmit="comiis_lostpwssubmit('lostpw');return false;">
<input type="hidden" name="formhash" value="{$__FORMHASH}">
<input type="hidden" name="comiis_mobile_jms_submit" value="ypci">
<input type="hidden" name="comiis_mobile_lostpwsubmit" value="true">
<input type="hidden" name="referer" value="
EOF;
 $dreferer = dreferer();
$data .= <<<EOF
{$dreferer}" />	
<div class="c cl lostpw comiis_mobreg_box aakb">
<div class="rfm">
<table>
<tbody>			
<tr>
<th><span class="rq">*</span><label>{$comiis_sms['28']}:</label></th>
<td><input class="px p_fre" size="30" type="text" value="" autocomplete="off" name="comiis_tel" id="comiis_tel" required></td>
</tr>
<tr class="kmdtm">
<th></th>
<td class="tipcol">
<div class="comiis_mobreg_time bfhl xi1" style="display:none"><span></span>{$comiis_sms['08']}</div>
<input type="button" class="comiis_mobreg_timekey" value="{$comiis_sms['09']}" onclick="comiis_mobreg_fkey('lostpw')" />
</td>
</tr>
</tbody>
</table>
</div>
<div class="rfm">
<table>
<tbody>
<tr>
<th><span class="rq">*</span><label>{$comiis_sms['147']}:</label></th>
<td><input name="code" class="px p_fre" size="30" type="text" value="" autocomplete="off" required></td>
<td class="tipcol"></td>
</tr>
</tbody>
</table>
</div>
        
EOF;
 if($_G['comiis_sms']['lostpw_seccodeverify']) { 
$data .= <<<EOF

            
EOF;
 if($seccodecheck2) { 
$data .= <<<EOF

            <div class="rfm"><span id="seccode_cc{$sechash2}"></span></div>
            
EOF;
 } 
$data .= <<<EOF

        
EOF;
 } 
$data .= <<<EOF
		
<div class="rfm mbw bw0">
<table>
<tbody>
<tr>
<th></th>
<td><button class="pn pnc" type="submit" name="lostpwsubmit" value="true" tabindex="100"><span>{$comiis_sms['29']}</span></button></td>
</tr>
</tbody>
</table>
</div>
</div>
</form>

EOF;
?><?php
$__FORMHASH = FORMHASH;$return = <<<EOF

<style>
.comiis_sms_titboxxlco {height:31px;margin-bottom:-15px;}
.comiis_sms_title_wmse {margin:10px 10px 10px;border-bottom:1px solid #cdcdcd;line-height:30px;}
.comiis_sms_title_wmse ul {margin-left:120px;}
.comiis_sms_title_wmse li {float:left;margin:0 0 -1px 10px;}
.comiis_sms_title_wmse li a {display:block;padding:0 15px;background:#e5edf2;border:1px solid #cdcdcd;}
.comiis_sms_title_wmse li.comiis_sms_on a {background:#fff;border-bottom-color:#fff;font-weight:700;}
.comiis_mobreg_box .rfm .kmdtm th, .comiis_mobreg_box .rfm .kmdtm td {padding:0 0 12px;}
.rfm th, .fwin .rfm th, .fwin .rfm td, .nfl .f_c .rfm th, .nfl .f_c .rfm td {padding:6px 5px 6px 2px;}
</style>

EOF;
 if($_G['comiis_sms']['open_pcreg']) { if($_G['comiis_sms']['reg_mod'] == 0) { 
$return .= <<<EOF

<div class="comiis_sms_titboxxlco cl">
    <div class="comiis_sms_title_wmse cl" style="margin:30px auto 0px;width:762px;">
        <ul>
            <li class="comiis_sms_on" onclick="comiis_mobile_tab(0)" id="comiis_mobile_tab_0"><a href="javascript:;">{$comiis_sms['30']}</a></li>
            <li onclick="comiis_mobile_tab(1)" id="comiis_mobile_tab_1"><a href="javascript:;">{$comiis_sms['31']}</a></li>
        </ul>
    </div>
</div>

EOF;
 } 
$return .= <<<EOF

<form method="post" autocomplete="off" name="register"  enctype="multipart/form-data"  action="plugin.php?id=comiis_sms:comiis_sms_post&amp;action=register&amp;inajax=1" id="comiis_sms_sms" onsubmit="comiis_checksubmit('register');return false;">
<input type="hidden" name="formhash" value="{$__FORMHASH}">
<input type="hidden" name="comiis_smssubmit" value="true">
<input type="hidden" name="referer" value="
EOF;
 $dreferer = dreferer();
$return .= <<<EOF
{$dreferer}" />
<div class="register bm_c">
<div class="comiis_mobreg_box ypci mtw">
<div class="rfm aakb">
<table>
<tbody>			
<tr>
<th><span class="rq">*</span><label>{$comiis_sms['28']}:</label></th>
<td><input class="px" type="text" size="25" value="" autocomplete="off" name="comiis_tel" id="comiis_tel" required></td>
</tr>
<tr class="kmdtm">
<th></th>
<td class="tipcol">
<div class="comiis_mobreg_time bfhl xi1" style="display:none"><span></span>{$comiis_sms['08']}</div>
<input type="button" class="comiis_mobreg_timekey" value="{$comiis_sms['09']}" onclick="comiis_mobreg_fkey('register')" />
</td>
</tr>
</tbody>
</table>
</div>
<div class="rfm">
<table>
<tbody>
<tr>
<th><span class="rq">*</span><label>{$comiis_sms['147']}:</label></th>
<td><input name="code" class="px" type="text" size="25" value="" autocomplete="off" required></td>
<td class="tipcol"></td>
</tr>
</tbody>
</table>
</div>

EOF;
 if($_G['comiis_sms']['open_name'] == 1) { 
$return .= <<<EOF

<div class="rfm">
<table>
<tbody>
<tr>
<th><span class="rq">*</span><label>{$comiis_sms['22']}:</label></th>
<td><input name="name" class="px" type="text" size="25" value="" autocomplete="off" required></td>
<td class="tipcol"></td>
</tr>
</tbody>
</table>
</div>

EOF;
 } 
$return .= <<<EOF

<div class="rfm">
<table>
<tbody>
<tr>
<th><span class="rq">*</span><label>{$comiis_sms['32']}:</label></th>
<td><input name="password1" class="px" type="password" size="25" value="" autocomplete="off" required></td>
<td class="tipcol"></td>
</tr>
</tbody>
</table>
</div>
<div class="rfm">
<table>
<tbody>
<tr>
<th><span class="rq">*</span><label>{$comiis_sms['33']}:</label></th>
<td><input name="password2" class="px" type="password" size="25" value="" autocomplete="off" required></td>
<td class="tipcol"></td>
</tr>		
</tbody>
</table>
</div>
            
EOF;
 if($_G['comiis_sms']['seccodeverify']) { 
$return .= <<<EOF

                
EOF;
 if($secqaacheck) { 
$return .= <<<EOF

                        <span id="secqaa_cq{$sechash}"></span>		
                
EOF;
 } 
$return .= <<<EOF

                
EOF;
 if($seccodecheck) { 
$return .= <<<EOF

                        <span id="seccode_cc{$sechash}"></span>		
                
EOF;
 } 
$return .= <<<EOF

            
EOF;
 } 
$return .= <<<EOF
	
</div>
</div>
<div id="layer_reginfo_b">
<div class="rfm mbw bw0 wmse">
<table width="100%">
<tbody>
<tr>
<th>&nbsp;</th>
<td>
<span id="reginfo_a_btn">
<em>&nbsp;</em><button class="pn pnc" id="registerformsubmit" type="submit" name="regsubmit" value="true" tabindex="1"><strong>{$comiis_sms['34']}</strong></button>
</span>
                        
EOF;
 if($_G['setting']['bbrules']) { 
$return .= <<<EOF

                        &nbsp;&nbsp;<input type="checkbox" class="pc" name="agreebbrule" value="1" id="agreebbrule" checked="checked" /> <label for="agreebbrule">{$comiis_sms['210']}<a href="javascript:;" onclick="showBBRule()">{$comiis_sms['211']}</a></label>
                        
EOF;
 } 
$return .= <<<EOF
						
</td>
<td></td>
</tr>
</tbody>
</table>
</div>
</div>
    <div id="layer_reginfo_bs">
        
EOF;
 if(!empty($_G['setting']['pluginhooks']['register_logging_method'])) { 
$return .= <<<EOF

            <div class="rfm bw0 
EOF;
 if(empty($_GET['infloat'])) { 
$return .= <<<EOF
 mbw
EOF;
 } 
$return .= <<<EOF
">
                <hr class="l" />
                <table>
                    <tr>
                        <th>{$comiis_sms['214']}:</th>
                        <td>{$_G['setting']['pluginhooks']['register_logging_method']}</td>
                    </tr>
                </table>
            </div>
        
EOF;
 } 
$return .= <<<EOF

    </div>
</form>

EOF;
 } 
$return .= <<<EOF


EOF;
?>
