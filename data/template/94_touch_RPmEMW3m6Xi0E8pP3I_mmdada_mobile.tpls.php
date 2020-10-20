<?php
//Discuz! cache file, DO NOT modify me!
//Created: Sep 29, 2018, 17:54
//Identify: 01d737bdb1e9f254c8cf4f8d1fe22533

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
?>
<?php if(empty($threadlist) && empty($searchid)) { if($comiis_app_switch['comiis_bbstimgs']) { ?><?php echo $comiis_app_switch['comiis_bbstimgs'];?><?php } if($_G['setting']['srchhotkeywords']) { $color = array(' ', 'color1', 'color2', 'color3', 'color4', 'color5');?><div class="comiis_tagtit b_b f_c"><?php echo $comiis_lang['view56'];?><?php echo $comiis_lang['search'];?></div>
<div class="comiis_search_hot cl">	
<div class="comiis_search_hot_a cl"><?php if(is_array($_G['setting']['srchhotkeywords'])) foreach($_G['setting']['srchhotkeywords'] as $val) { if($val=trim($val)) { $valenc=rawurlencode($val);  $show_color=$color[array_rand($color,1)];?><?php
$__FORMHASH = FORMHASH;$srchhotkeywords[] = <<<EOF


EOF;
 if(!empty($searchparams['url'])) { 
$srchhotkeywords[] .= <<<EOF

<a href="{$searchparams['url']}?q={$valenc}&source=hotsearch{$srchotquery}" class="comiis_xifont {$show_color}"><span class="f_b">{$val}</span></a>

EOF;
 } else { 
$srchhotkeywords[] .= <<<EOF

<a href="search.php?mod={$_GET['mod']}&amp;srchtxt={$valenc}&amp;formhash={$__FORMHASH}&amp;searchsubmit=true&amp;source=hotsearch" class="comiis_xifont {$show_color}"><span class="f_b">{$val}</span></a>

EOF;
 } 
$srchhotkeywords[] .= <<<EOF


EOF;
?>
<?php } } echo implode('', $srchhotkeywords);; ?></div>
</div>
<?php } } ?>