<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); ?><?php
$comiis_ztfl = <<<EOF

  
EOF;
 if($thread['digest'] > 0) { 
$comiis_ztfl .= <<<EOF

<span class="bg_c f_f">{$comiis_lang['thread_digest']}</span>
  
EOF;
 } elseif($thread['folder'] == 'lock') { 
$comiis_ztfl .= <<<EOF

<span class="bg_del f_f">{$comiis_lang['close']}</span>
  
EOF;
 } elseif($thread['special'] == 1) { 
$comiis_ztfl .= <<<EOF

<span class="bg_0 f_f">{$comiis_lang['thread_poll']}</span>
  
EOF;
 } elseif($thread['special'] == 2) { 
$comiis_ztfl .= <<<EOF

<span class="bg_0 f_f">{$comiis_lang['thread_trade']}</span>
  
EOF;
 } elseif($thread['special'] == '3' && $thread['price'] < 0) { 
$comiis_ztfl .= <<<EOF

    <span class="bg_0 f_f">{$comiis_lang['thread_reward']}</span><span class="bg_a f_f">已解决</span>
  
EOF;
 } elseif($thread['special'] == 3) { 
$comiis_ztfl .= <<<EOF

<span class="bg_0 f_f">{$comiis_lang['thread_reward']}</span><span class="bg_a f_f"><i class="comiis_font">&#xe6e4;</i>{$thread['price']}{$_G['setting']['extcredits'][$_G['setting']['creditstransextra']['2']]['unit']}{$_G['setting']['extcredits'][$_G['setting']['creditstransextra']['2']]['title']}</span>
  
EOF;
 } elseif($thread['special'] == 4) { 
$comiis_ztfl .= <<<EOF

<span class="bg_0 f_f">{$comiis_lang['thread_activity']}</span>
  
EOF;
 } elseif($thread['special'] == 5) { 
$comiis_ztfl .= <<<EOF

<span class="bg_0 f_f">{$comiis_lang['thread_debate']}</span>
  
EOF;
 } 
$comiis_ztfl .= <<<EOF

  
EOF;
 if($rushreply) { 
$comiis_ztfl .= <<<EOF
<span class="bg_a f_f">{$comiis_lang['rushreply']}</span>
EOF;
 } 
$comiis_ztfl .= <<<EOF


EOF;
?>