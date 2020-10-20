<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); ?><?php
$return = <<<EOF

<style>
#postlist .vwthd{position:relative;overflow:visible;padding-right:115px !important;display:block;z-index:99;}
#ct .comiis_snvbt,#ct .kmn19vbt{position:relative;overflow:visible;padding-right:55px;}
.kmfz{height:38px;line-height:38px;}
.comiis_viewtop{overflow:visible;}
.comiis_code{position:absolute;top:0px;right:0px;}
.comiis_code .comiis_code_img{width:38px;height:38px;background:url(source/plugin/comiis_code/comiis_img/comiis_code.png) no-repeat;}
.comiis_code .comiis_code_img1 {width:45px;height:38px;background:url(source/plugin/comiis_code/comiis_img/comiis_code1.png) no-repeat;}
.ie6 .comiis_code .comiis_code_img1{background:url(source/plugin/comiis_code/comiis_img/comiis_code1.gif) no-repeat;}
#comiis_code_menu{z-index:301;border:{$_G['style']['wrapbordercolor']} 1px solid;padding:15px 10px;position:absolute;width:190px;background:#fafafa;height:252px;top:-1px;right:-1px;cursor:pointer;}
.ie6 #comiis_code_menu{right:-2px;}
.comiis_viewtop #comiis_code_menu{top:0px;right:0px;}
#comiis_code_menu p{text-align:center;}
#comiis_code_menu p img{width:168px;height:168px;}
#comiis_code_menu li{text-align:center;line-height:26px;height:26px;}
#comiis_code_menu .comiis_txt1gzra{font:500 16px/38px "Microsoft Yahei";COLOR:#333;}
#comiis_code_menu .comiis_txt2vuba{font:500 12px/38px "Microsoft Yahei";COLOR:#666;}
#comiis_code_menu .comiis_txt2vuba EM{margin:0px 2px;}
#comiis_code_menu .comiis_txt2vuba IMG{margin-top:-3px;vertical-align:middle;}
#comiis_code_menu .comiis_txt3hhig{font:500 12px/38px "Microsoft Yahei";}
#comiis_code_menu .comiis_txt3hhig A{color:#bebebe;}
</style>
<span class="comiis_code"><div class="comiis_code_img
EOF;
 if($plugindata['comiis_code_style'] == '0') { 
$return .= <<<EOF
1
EOF;
 } 
$return .= <<<EOF
" id="comiis_code" onmouseover="showMenu({'ctrlid':this.id,'pos':'*'});" /></div></span>

EOF;
 if($_GET['open']==1) { 
$return .= <<<EOF
{$comiis_code_mm}
EOF;
 } 
$return .= <<<EOF

<div id="comiis_code_menu" style="display:none;">
<p id="comiis_code_image">	

EOF;
 if($plugindata['comiis_code_open']) { 
$return .= <<<EOF

<img src="{$comiis_outcode}" />

EOF;
 } 
$return .= <<<EOF

</p>
<ul>
<li class="comiis_txt1gzra">{$plugindata['comiis_code_title']}</li>
<li class="comiis_txt2vuba">{$plugindata['comiis_code_views']}</li>
<li class="comiis_txt3hhig"><A href="{$plugindata['comiis_code_link']}" target="_blank">{$plugindata['comiis_code_linktitle']}</A></li>
</ul>

EOF;
 if($plugindata['comiis_code_logo']) { 
$return .= <<<EOF

<img src="{$plugindata['comiis_code_logo']}" style="width:30px;height:30px;position:absolute;top:84px;left:90px;" />

EOF;
 } 
$return .= <<<EOF

</div>

EOF;
 if(!$plugindata['comiis_code_open']) { 
$return .= <<<EOF

<script src="./source/plugin/comiis_code/comiis_img/qrcode.min.js" type="text/javascript"></script>
<script>new QRCode(document.getElementById('comiis_code_image'), '{$comiis_urls}');</script>

EOF;
 } 
$return .= <<<EOF


EOF;
?>
