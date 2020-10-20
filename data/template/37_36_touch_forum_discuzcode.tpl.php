<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); require_once DISCUZ_ROOT.'./template/comiis_app/comiis/php/comiis_lang.'.currentlang().'.php';?><?php function tpl_hide_credits_hidden($creditsrequire) {
global $_G;?><?php
$return = <<<EOF
<div class="comiis_quote bg_h f_c">
EOF;
 if($_G['uid']) { 
$return .= <<<EOF
{$_G['username']}
EOF;
 } else { 
$return .= <<<EOF
游客
EOF;
 } 
$return .= <<<EOF
，本帖隐藏的内容需要积分高于 {$creditsrequire} 才可浏览，您当前积分为 {$_G['member']['credits']}</div>
EOF;
?><?php return $return;
}
function tpl_hide_credits($creditsrequire, $message) {?><?php
$return = <<<EOF
<div class="comiis_quote bg_h f_c">以下内容需要积分高于 {$creditsrequire} 才可浏览</div>
{$message}

EOF;
?><?php return $return;
}
function tpl_codedisp($code) {?><?php
$return = <<<EOF
<div class="comiis_blockcode comiis_bodybg b_ok f_b"><div class="bg_f b_l"><ol><li>{$code}</ol></div></div>
EOF;
?><?php return $return;
}
function tpl_quote() {?><?php
$return = <<<EOF
<div class="comiis_quote bg_h b_dashed f_c"><blockquote><font size="2">回复</font> \\1</blockquote></div>
EOF;
?><?php return $return;
}
function tpl_free() {?><?php
$return = <<<EOF
<div class="comiis_quote bg_h f_c"><blockquote>\\1</blockquote></div>
EOF;
?><?php return $return;
}
function tpl_hide_reply() {
global $_G;?><?php
$return = <<<EOF
<div class="comiis_quote bg_h f_c"><h2 class="f_a">本帖隐藏的内容: </h2>\\1</div>

EOF;
?><?php return $return;
}
function tpl_hide_reply_hidden() {
global $_G;?><?php
$return = <<<EOF
<div class="comiis_quote bg_h f_c">
EOF;
 if($_G['uid']) { 
$return .= <<<EOF
{$_G['username']}
EOF;
 } else { 
$return .= <<<EOF
游客
EOF;
 } 
$return .= <<<EOF
，如果您要查看本帖隐藏内容请<a href="forum.php?mod=post&amp;action=reply&amp;fid={$_G['fid']}&amp;tid={$_G['tid']}" onclick="showWindow('reply', this.href)">回复</a></div>
EOF;
?><?php return $return;
}
function attachlist($attach) {
global $_G, $post;
if($post['first'] && $_G['forum_threadpay']){
return;	
}
$attach['refcheck'] = (!$attach['remote'] && $_G['setting']['attachrefcheck']) || ($attach['remote'] && ($_G['setting']['ftp']['hideurl'] || ($attach['isimage'] && $_G['setting']['attachimgpost'] && strtolower(substr($_G['setting']['ftp']['attachurl'], 0, 3)) == 'ftp')));
$aidencode = packaids($attach);
$is_archive = $_G['forum_thread']['is_archived'] ? "&fid=".$_G['fid']."&archiveid=".$_G[forum_thread][archiveid] : '';?><?php
$return = <<<EOF

<div class="comiis_attach bg_e b_ok cl">
<a 
EOF;
 if($_G['uid']) { if(!$attach['price'] || $attach['payed']) { 
$return .= <<<EOF
href="forum.php?mod=attachment{$is_archive}&amp;aid={$aidencode}"
EOF;
 } else { 
$return .= <<<EOF
href="forum.php?mod=misc&amp;action=attachpay&amp;aid={$attach['aid']}&amp;tid={$attach['tid']}" class="dialog"
EOF;
 } } else { 
$return .= <<<EOF
href="javascript:;" class="comiis_openrebox"
EOF;
 } 
$return .= <<<EOF
>
<i class="comiis_font f_ok">&#xe649;</i>
<p class="attach_tit">
{$attach['attachicon']}

EOF;
 if(!$attach['price'] || $attach['payed']) { 
$return .= <<<EOF

<span class="f_ok">{$attach['filename']}</span>

EOF;
 } else { 
$return .= <<<EOF

<span class="f_ok">{$attach['filename']}</span>

EOF;
 } 
$return .= <<<EOF

<em class="f_d">&nbsp;{$attach['dateline']}上传</em>
</p>		
<p class="attach_size f_c">
{$attach['attachsize']} 
EOF;
 if($attach['readperm']) { 
$return .= <<<EOF
, 阅读权限: {$attach['readperm']}
EOF;
 } 
$return .= <<<EOF
, 下载次数: {$attach['downloads']}
EOF;
 if(!$attach['attachimg'] && $_G['getattachcredits']) { 
$return .= <<<EOF
, 下载积分: {$_G['getattachcredits']}
EOF;
 } 
$return .= <<<EOF

</p>
</a>

EOF;
 if($attach['description'] || $attach['price']) { 
$return .= <<<EOF
	
<div class="attach_txt bg_f b_ok">

EOF;
 if($attach['price']) { 
$return .= <<<EOF

<h2 class="
EOF;
 if($attach['description']) { 
$return .= <<<EOF
b_b 
EOF;
 } 
$return .= <<<EOF
f_a">

EOF;
 if(!$attach['payed']) { 
$return .= <<<EOF
<a 
EOF;
 if($_G['uid']) { 
$return .= <<<EOF
href="forum.php?mod=misc&amp;action=attachpay&amp;aid={$attach['aid']}&amp;tid={$attach['tid']}" class="dialog"
EOF;
 } else { 
$return .= <<<EOF
href="javascript:;" class="comiis_openrebox"
EOF;
 } 
$return .= <<<EOF
>[购买]</a>
EOF;
 } 
$return .= <<<EOF

<a 
EOF;
 if($_G['uid']) { 
$return .= <<<EOF
href="forum.php?mod=misc&amp;action=viewattachpayments&amp;aid={$attach['aid']}"
EOF;
 } else { 
$return .= <<<EOF
href="javascript:;" class="comiis_openrebox"
EOF;
 } 
$return .= <<<EOF
>[记录]</a>
售价: {$attach['price']} {$_G['setting']['extcredits'][$_G['setting']['creditstransextra']['1']]['unit']}{$_G['setting']['extcredits'][$_G['setting']['creditstransextra']['1']]['title']}
</h2>

EOF;
 } if($attach['description']) { 
$return .= <<<EOF
<span class="f_c">{$attach['description']}</span>
EOF;
 } 
$return .= <<<EOF

</div>

EOF;
 } 
$return .= <<<EOF

</div>	

EOF;
?><?php return $return;
}
function imagelist($attach, $firstpost = 0) { 
global $_G, $post, $aimgs, $comiis_app_switch, $comiis_lang;
if($post['first'] && $_G['forum_threadpay']){
return;	
}
$guestviewthumb = !empty($_G['setting']['guestviewthumb']['flag']) && !$_G['uid'];	
if($guestviewthumb){
if ($post['first'] == 0 && $comiis_app_switch['comiis_aimg_show'] == 1 || $comiis_app_switch['comiis_aimg_oneshow'] == 1 && $post['first'] == 1) {
if (count($post['imagelist']) == 1){
$mobilethumburl = getforumimg($attach['aid'], 0, 300, 300, 'fixnone');		
}else{
$mobilethumburl = getforumimg($attach['aid'], 0, 350, 320, 2);		
}
}else{
$mobilethumburl = getforumimg($attach['aid'], 0, 300, 300, 'fixnone');
}		
}else{
$mobilethumburl = $attach['attachimg'] && $_G['setting']['showimages'] && (!$attach['price'] || $attach['payed']) && ($_G['group']['allowgetimage'] || $_G['uid'] == $attach['uid']) ? (((($comiis_app_switch['comiis_aimg_oneshow'] == 0 && $post['first'] == 1) || ($comiis_app_switch['comiis_aimg_show'] == 0  && $post['first'] == 0)) || count($aimgs[$post['pid']]) == 1) ? ($comiis_app_switch['comiis_view_imgdata'] == 1 ? $attach[url].$attach[attachment] : getforumimg($attach['aid'], 0, 600, 1000, 'fixnone')) : getforumimg($attach['aid'], 0, 350, 320, 2)) : '' ;
}?><?php
$return = <<<EOF


EOF;
 if($attach['attachimg'] && $_G['setting']['showimages'] && (($_G['group']['allowgetimage'] || $_G['uid'] == $attach['uid']) || (($guestviewthumb)))) { if($guestviewthumb) { if($post['first'] == 0 && $comiis_app_switch['comiis_aimg_show'] == 1 || $comiis_app_switch['comiis_aimg_oneshow'] == 1 && $post['first'] == 1) { 
$return .= <<<EOF

<li><a href="javascript:;"
EOF;
 if(!$_G['connectguest']) { 
$return .= <<<EOF
 onclick="popup.open('{$comiis_lang['tip8']}', 'confirm', 'member.php?mod=logging&action=login');"
EOF;
 } else { 
$return .= <<<EOF
 onclick="popup.open('{$comiis_lang['reg23']}', 'confirm', 'member.php?mod=connect');"
EOF;
 } 
$return .= <<<EOF
><img id="aimg_{$attach['aid']}" 
EOF;
 if($comiis_app_switch['comiis_loadimg']) { 
$return .= <<<EOF
src="./template/comiis_app/pic/none.png" comiis_loadimages=
EOF;
 } else { 
$return .= <<<EOF
src=
EOF;
 } 
$return .= <<<EOF
"{$mobilethumburl}" alt="
EOF;
 if($attach['description']) { 
$return .= <<<EOF
{$attach['description']}
EOF;
 } else { 
$return .= <<<EOF
{$_G['forum_thread']['subject']}
EOF;
 } 
$return .= <<<EOF
[{$attach['imgalt']}]"
EOF;
 if($comiis_app_switch['comiis_loadimg']) { 
$return .= <<<EOF
 class="comiis_loadimages"
EOF;
 } 
$return .= <<<EOF
 /></a></li>

EOF;
 } else { 
$return .= <<<EOF

<div class="comiis_nouidpic">
<a href="javascript:;"
EOF;
 if(!$_G['connectguest']) { 
$return .= <<<EOF
 onclick="popup.open('{$comiis_lang['tip8']}', 'confirm', 'member.php?mod=logging&action=login');"
EOF;
 } else { 
$return .= <<<EOF
 onclick="popup.open('{$comiis_lang['reg23']}', 'confirm', 'member.php?mod=connect');"
EOF;
 } 
$return .= <<<EOF
><img id="aimg_{$attach['aid']}" 
EOF;
 if($comiis_app_switch['comiis_loadimg']) { 
$return .= <<<EOF
src="./template/comiis_app/pic/none.png" comiis_loadimages=
EOF;
 } else { 
$return .= <<<EOF
src=
EOF;
 } 
$return .= <<<EOF
"{$mobilethumburl}" alt="
EOF;
 if($attach['description']) { 
$return .= <<<EOF
{$attach['description']}
EOF;
 } else { 
$return .= <<<EOF
{$_G['forum_thread']['subject']}
EOF;
 } 
$return .= <<<EOF
[{$attach['imgalt']}]" class="vm
EOF;
 if($comiis_app_switch['comiis_loadimg']) { 
$return .= <<<EOF
 comiis_loadimages
EOF;
 } 
$return .= <<<EOF
" /></a>
<div class="comiis_nouidpic_tip f_ok"><a href="javascript:;"
EOF;
 if(!$_G['connectguest']) { 
$return .= <<<EOF
 onclick="popup.open('{$comiis_lang['tip8']}', 'confirm', 'member.php?mod=logging&action=login');"
EOF;
 } else { 
$return .= <<<EOF
 onclick="popup.open('{$comiis_lang['reg23']}', 'confirm', 'member.php?mod=connect');"
EOF;
 } 
$return .= <<<EOF
>登录/注册后可看大图</a></div>
</div>

EOF;
 } } else { 
$return .= <<<EOF

<li><span onclick="window.location.href='forum.php?mod=viewthread&tid={$attach['tid']}&aid={$attach['aid']}&from=album&page={$_G['page']}'"><img id="aimg_{$attach['aid']}" 
EOF;
 if($comiis_app_switch['comiis_loadimg']) { 
$return .= <<<EOF
src="./template/comiis_app/pic/none.png" comiis_loadimages=
EOF;
 } else { 
$return .= <<<EOF
src=
EOF;
 } 
$return .= <<<EOF
"{$mobilethumburl}" alt="
EOF;
 if($attach['description']) { 
$return .= <<<EOF
{$attach['description']}
EOF;
 } else { 
$return .= <<<EOF
{$_G['forum_thread']['subject']}
EOF;
 } 
$return .= <<<EOF
[{$attach['imgalt']}]"
EOF;
 if($comiis_app_switch['comiis_loadimg']) { 
$return .= <<<EOF
 class="comiis_loadimages"
EOF;
 } 
$return .= <<<EOF
 /></span></li>

EOF;
 } } 
$return .= <<<EOF


EOF;
?><?php return $return;
}
function attachinpost($attach, $post) {
global $_G, $comiis_lang, $comiis_app_switch, $post;
if($post['first'] && $_G['forum_threadpay']){
return;	
}
$guestviewthumb = !empty($_G['setting']['guestviewthumb']['flag']) && !$_G['uid'];	
if($guestviewthumb){
$mobilethumburl = getforumimg($attach['aid'], 0, 300, 300, 'fixnone');
}else{
$mobilethumburl = $attach['attachimg'] && $_G['setting']['showimages'] && (!$attach['price'] || $attach['payed']) && ($_G['group']['allowgetimage'] || $_G['uid'] == $attach['uid']) ? ($comiis_app_switch['comiis_view_imgdata'] == 1 ? $attach[url].$attach[attachment] : getforumimg($attach['aid'], 0, 600, 1000, 'fixnone')) : getforumimg($attach['aid'], 0, 160, 300, 'fixnone') ;
}	
$is_archive = $_G['forum_thread']['is_archived'] ? '&fid='.$_G['fid'].'&archiveid='.$_G[forum_thread][archiveid] : '';
$attach['refcheck'] = (!$attach['remote'] && $_G['setting']['attachrefcheck']) || ($attach['remote'] && ($_G['setting']['ftp']['hideurl'] || ($attach['isimage'] && $_G['setting']['attachimgpost'] && strtolower(substr($_G['setting']['ftp']['attachurl'], 0, 3)) == 'ftp')));
$aidencode = packaids($attach);?><?php
$return = <<<EOF


EOF;
 if($attach['attachimg'] && $_G['setting']['showimages'] && (((!$attach['price'] || $attach['payed']) && ($_G['group']['allowgetimage'] || $_G['uid'] == $attach['uid'])) || (($guestviewthumb)))) { if($guestviewthumb) { 
$return .= <<<EOF

<div class="comiis_nouidpic">
<a href="javascript:;"
EOF;
 if(!$_G['connectguest']) { 
$return .= <<<EOF
 onclick="popup.open('{$comiis_lang['tip8']}', 'confirm', 'member.php?mod=logging&action=login');"
EOF;
 } else { 
$return .= <<<EOF
 onclick="popup.open('{$comiis_lang['reg23']}', 'confirm', 'member.php?mod=connect');"
EOF;
 } 
$return .= <<<EOF
><img id="aimg_{$attach['aid']}" 
EOF;
 if($comiis_app_switch['comiis_loadimg']) { 
$return .= <<<EOF
src="./template/comiis_app/pic/none.png" comiis_loadimages=
EOF;
 } else { 
$return .= <<<EOF
src=
EOF;
 } 
$return .= <<<EOF
"{$mobilethumburl}" alt="{$attach['imgalt']}" title="{$attach['imgalt']}" class="vm
EOF;
 if($comiis_app_switch['comiis_loadimg']) { 
$return .= <<<EOF
 comiis_noloadimage comiis_loadimages
EOF;
 } 
$return .= <<<EOF
" /></a>
<div class="comiis_nouidpic_tip f_ok"><a href="javascript:;"
EOF;
 if(!$_G['connectguest']) { 
$return .= <<<EOF
 onclick="popup.open('{$comiis_lang['tip8']}', 'confirm', 'member.php?mod=logging&action=login');"
EOF;
 } else { 
$return .= <<<EOF
 onclick="popup.open('{$comiis_lang['reg23']}', 'confirm', 'member.php?mod=connect');"
EOF;
 } 
$return .= <<<EOF
>登录/注册后可看大图</a></div>
</div>

EOF;
 } else { 
$return .= <<<EOF

<span onclick="window.location.href='forum.php?mod=viewthread&tid={$attach['tid']}&aid={$attach['aid']}&from=album&page={$_G['page']}'" class="comiis_postimg vm"><img id="aimg_{$attach['aid']}" 
EOF;
 if($comiis_app_switch['comiis_loadimg']) { 
$return .= <<<EOF
src="./template/comiis_app/pic/none.png" comiis_loadimages=
EOF;
 } else { 
$return .= <<<EOF
src=
EOF;
 } 
$return .= <<<EOF
"{$mobilethumburl}" alt="{$attach['imgalt']}" title="{$attach['imgalt']}"
EOF;
 if($comiis_app_switch['comiis_loadimg']) { 
$return .= <<<EOF
 class="comiis_loadimages"
EOF;
 } 
$return .= <<<EOF
 /></span>			

EOF;
 } 
$return .= <<<EOF
				

EOF;
 } else { 
$return .= <<<EOF

<div class="comiis_attach bg_e b_ok cl">
<a 
EOF;
 if($_G['uid']) { if(!$attach['price'] || $attach['payed']) { 
$return .= <<<EOF
href="forum.php?mod=attachment{$is_archive}&amp;aid={$aidencode}"
EOF;
 } else { 
$return .= <<<EOF
href="forum.php?mod=misc&amp;action=attachpay&amp;aid={$attach['aid']}&amp;tid={$attach['tid']}" class="dialog"
EOF;
 } } else { 
$return .= <<<EOF
href="javascript:;" class="comiis_openrebox"
EOF;
 } 
$return .= <<<EOF
>
<p class="attach_tit">
{$attach['attachicon']}

EOF;
 if(!$attach['price'] || $attach['payed']) { 
$return .= <<<EOF

<span class="f_ok">{$attach['filename']}</span>

EOF;
 } else { 
$return .= <<<EOF

<span class="f_ok">{$attach['filename']}</span>

EOF;
 } 
$return .= <<<EOF

<em class="f_d">&nbsp;{$attach['dateline']}上传</em>
</p>		
<p class="attach_size f_c">
{$attach['attachsize']} 
EOF;
 if($attach['readperm']) { 
$return .= <<<EOF
, 阅读权限: {$attach['readperm']}
EOF;
 } 
$return .= <<<EOF
, 下载次数: {$attach['downloads']}
EOF;
 if(!$attach['attachimg'] && $_G['getattachcredits']) { 
$return .= <<<EOF
, 下载积分: {$_G['getattachcredits']}
EOF;
 } 
$return .= <<<EOF

</p>
</a>

EOF;
 if($attach['description'] || $attach['price']) { 
$return .= <<<EOF
	
<div class="attach_txt bg_f b_ok">

EOF;
 if($attach['price']) { 
$return .= <<<EOF

<h2 class="
EOF;
 if($attach['description']) { 
$return .= <<<EOF
b_b 
EOF;
 } 
$return .= <<<EOF
f_a">

EOF;
 if(!$attach['payed']) { 
$return .= <<<EOF
<a 
EOF;
 if($_G['uid']) { 
$return .= <<<EOF
href="forum.php?mod=misc&amp;action=attachpay&amp;aid={$attach['aid']}&amp;tid={$attach['tid']}" class="dialog"
EOF;
 } else { 
$return .= <<<EOF
href="javascript:;" class="comiis_openrebox"
EOF;
 } 
$return .= <<<EOF
>[购买]</a>
EOF;
 } 
$return .= <<<EOF

<a 
EOF;
 if($_G['uid']) { 
$return .= <<<EOF
href="forum.php?mod=misc&amp;action=viewattachpayments&amp;aid={$attach['aid']}"
EOF;
 } else { 
$return .= <<<EOF
href="javascript:;" class="comiis_openrebox"
EOF;
 } 
$return .= <<<EOF
>[记录]</a>
售价: {$attach['price']} {$_G['setting']['extcredits'][$_G['setting']['creditstransextra']['1']]['unit']}{$_G['setting']['extcredits'][$_G['setting']['creditstransextra']['1']]['title']}
</h2>

EOF;
 } if($attach['description']) { 
$return .= <<<EOF
<span class="f_c">{$attach['description']}</span>
EOF;
 } 
$return .= <<<EOF

</div>

EOF;
 } 
$return .= <<<EOF

</div>

EOF;
 } 
$return .= <<<EOF


EOF;
?><?php return $return;
}?>