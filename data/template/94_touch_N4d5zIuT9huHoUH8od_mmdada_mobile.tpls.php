<?php
//Discuz! cache file, DO NOT modify me!
//Created: Sep 29, 2018, 17:30
//Identify: 4db1e3cc83535fb679cfb0b310c67acf

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
?>
        <div class="comiis_flxx_style cl">
            <?php
$comiis_title_data = <<<EOF

            <div class="comiis_viewtit comiis_viewtit_v2">
                <h2>
                    
EOF;
 if($post['warned']) { 
$comiis_title_data .= <<<EOF
<span class="top_jg bg_del f_f">{$comiis_lang['warn_get']}</span>
EOF;
 } 
$comiis_title_data .= <<<EOF

                    
EOF;
 if(in_array($thread['displayorder'], array(1, 2, 3, 4))) { 
$comiis_title_data .= <<<EOF
<span class="top_jh bg_0 f_f">{$comiis_lang['view2']}</span>
EOF;
 } 
$comiis_title_data .= <<<EOF

                    
EOF;
 if($thread['digest'] > 0 && $filter != 'digest') { 
$comiis_title_data .= <<<EOF
<span class="top_jh bg_c f_f">{$comiis_lang['view1']}</span>
EOF;
 } 
$comiis_title_data .= <<<EOF

                    {$_G['forum_thread']['subject']}
                    
EOF;
 if($_G['forum_thread']['displayorder'] == -2) { 
$comiis_title_data .= <<<EOF
 <span class="f_c">({$comiis_lang['moderating']})</span>
                    
EOF;
 } elseif($_G['forum_thread']['displayorder'] == -3) { 
$comiis_title_data .= <<<EOF
 <span class="f_c">({$comiis_lang['have_ignored']})</span>
                    
EOF;
 } elseif($_G['forum_thread']['displayorder'] == -4) { 
$comiis_title_data .= <<<EOF
 <span class="f_c">({$comiis_lang['draft']})</span>
                    
EOF;
 } 
$comiis_title_data .= <<<EOF

                </h2>
            </div>
            
EOF;
?> 
            <?php
$comiis_user_data = <<<EOF

            <span class="comiis_flxx_user">
                <a href="
EOF;
 if(!$post['authorid'] || $post['anonymous']) { 
$comiis_user_data .= <<<EOF
javascript:;
EOF;
 } else { 
$comiis_user_data .= <<<EOF
home.php?mod=space&uid={$post['authorid']}&do=profile
EOF;
 } 
$comiis_user_data .= <<<EOF
" class="flxx_tximg bg_e"><img src="
EOF;
 if(!$post['authorid'] || $post['anonymous']) { 
$comiis_user_data .= <<<EOF
{$_G['setting']['ucenterurl']}/avatar.php?uid=0&size=small
EOF;
 } else { 
$comiis_user_data .= <<<EOF
{$_G['setting']['ucenterurl']}/avatar.php?uid={$post['authorid']}&size=small
EOF;
 } 
$comiis_user_data .= <<<EOF
"></a>
                
EOF;
 if($post['authorid'] && $post['username'] && !$post['anonymous']) { 
$comiis_user_data .= <<<EOF

                    <a href="home.php?mod=space&amp;uid={$post['authorid']}&amp;do=profile">{$post['author']}</a>
                
EOF;
 } else { 
$comiis_user_data .= <<<EOF

                    <a href="javascript:;">
EOF;
 if(!$post['authorid']) { 
$comiis_user_data .= <<<EOF
{$comiis_lang['guest']}
EOF;
 } else { 
$comiis_user_data .= <<<EOF
{$post['author']}
EOF;
 } 
$comiis_user_data .= <<<EOF
</a>
                
EOF;
 } 
$comiis_user_data .= <<<EOF

            </span>
            
EOF;
?>
            <?php
$__STATICURL = STATICURL;$comiis_stamp_data = <<<EOF

                
EOF;
 if($_G['forum_threadstamp']) { 
$comiis_stamp_data .= <<<EOF

                    <div class="comiis_threadstamp_flv1"><img src="{$__STATICURL}image/stamp/{$_G['forum_threadstamp']['url']}" /></div>
                
EOF;
 } 
$comiis_stamp_data .= <<<EOF

            
EOF;
?>
            <?php $threadsortshow['typetemplate'] = str_replace(array('[comiis_subject]', '[comiis_views]', '[comiis_time]', '[comiis_user]','[comiis_stamp]','[comiis_uid]'), array($comiis_title_data, $_G[forum_thread][views], $post[dateline],$comiis_user_data,$comiis_stamp_data,$post[authorid]), $threadsortshow['typetemplate']);
function comiis_replace_flxx_color($var) {
return 'comiis_flxx_color'.$var[1].'><em class="comiis_xifont">'.str_replace('&nbsp;','</em><em class="comiis_xifont">', $var[2]).'</em></';
}
if(strpos($threadsortshow['typetemplate'], 'comiis_flxx_color') !== false){
$threadsortshow['typetemplate'] = preg_replace_callback("/comiis_flxx_color(.*?)>(.*?)&nbsp;<\//i", 'comiis_replace_flxx_color', $threadsortshow['typetemplate']);
}?>            <?php echo $threadsortshow['typetemplate'];?>
        </div>