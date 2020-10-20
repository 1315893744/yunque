<?php
//Discuz! cache file, DO NOT modify me!
//Created: Sep 29, 2018, 17:26
//Identify: ad11c872ffe0be2543d185ed143494e9

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
?>
<?php if(is_array($quicksearchlist)) foreach($quicksearchlist as $optionid => $option) { $formsearch = '';?>        <?php if(getstatus($option['search'], 1)) { ?>
        <?php
$__VERHASH = VERHASH;$formsearch = <<<EOF

            <div class="comiis_flsxa comiis_flex">
<div class="flsxa_tit f_c"><span>{$option['title']}:</span></div>
<div class="flsxa_box flex b_b
EOF;
 if(in_array($option['type'], array('radio', 'checkbox', 'select', 'range'))) { 
$formsearch .= <<<EOF
 comiis_input_style
EOF;
 } 
$formsearch .= <<<EOF
">					
                
EOF;
 if(in_array($option['type'], array('radio', 'checkbox', 'select', 'range'))) { 
$formsearch .= <<<EOF

                    <div class="comiis_login_select" id="select_{$option['identifier']}">
                    
EOF;
 if($option['type'] == 'select') { 
$formsearch .= <<<EOF

<span class="inner">
<i class="comiis_font f_d">&#xe60c</i>
<span class="z">
<span class="comiis_question" id="{$option['identifier']}_name"></span>
</span>					
</span>
                            <select name="searchoption[{$optionid}][value]" id="{$option['identifier']}">
                                <option value="0">{$comiis_lang['please_select']}</option>
                            
EOF;
 if(is_array($option['choices'])) foreach($option['choices'] as $id => $value) { 
$formsearch .= <<<EOF
                                
EOF;
 if(!$value['foptionid']) { 
$formsearch .= <<<EOF

                                <option value="{$id}">{$value['content']} 
EOF;
 if($value['level'] != 1) { 
$formsearch .= <<<EOF
?
EOF;
 } 
$formsearch .= <<<EOF
</option>
                                
EOF;
 } 
$formsearch .= <<<EOF

                            
EOF;
 } 
$formsearch .= <<<EOF

                            </select>
<input type="hidden" name="searchoption[{$optionid}][type]" value="{$option['type']}">

EOF;
 if($_GET['searchoption'][$optionid]['value']) { 
$formsearch .= <<<EOF

<script type="text/javascript">
$("#{$option['identifier']}").val({$_GET['searchoption'][$optionid]['value']});
</script>

EOF;
 } 
$formsearch .= <<<EOF

                    
EOF;
 } elseif($option['type'] != 'checkbox') { 
$formsearch .= <<<EOF

<span class="inner">
<i class="comiis_font f_d">&#xe60c</i>
<span class="z">
<span class="comiis_question" id="{$option['identifier']}_name"></span>
</span>					
</span>
                        <select name="searchoption[{$optionid}][value]" id="{$option['identifier']}">
                            <option value="0">{$comiis_lang['please_select']}</option>
                        
EOF;
 if(is_array($option['choices'])) foreach($option['choices'] as $id => $value) { 
$formsearch .= <<<EOF
                            <option value="{$id}" 
EOF;
 if($_GET['searchoption'][$optionid]['value'] == $id) { 
$formsearch .= <<<EOF
selected="selected"
EOF;
 } 
$formsearch .= <<<EOF
>{$value}</option>
                        
EOF;
 } 
$formsearch .= <<<EOF

                        </select>
                        <input type="hidden" name="searchoption[{$optionid}][type]" value="{$option['type']}">
                    
EOF;
 } else { 
$formsearch .= <<<EOF

                        
EOF;
 if(is_array($option['choices'])) foreach($option['choices'] as $id => $value) { 
$formsearch .= <<<EOF
<input type="checkbox" id="searchoption_a{$id}" name="searchoption[{$optionid}][value][{$id}]" value="{$id}" 
EOF;
 if(is_array($_GET['searchoption'][$optionid]) && $_GET['searchoption'][$optionid]['value'][$id]) { 
$formsearch .= <<<EOF
checked="checked"
EOF;
 } 
$formsearch .= <<<EOF
>
<label for="searchoption_a{$id}"><i class="comiis_font"></i>{$value}</label>
                        
EOF;
 } 
$formsearch .= <<<EOF

                        <input type="hidden" name="searchoption[{$optionid}][type]" value="checkbox">
                    
EOF;
 } 
$formsearch .= <<<EOF

                    </div>
                
EOF;
 } else { 
$formsearch .= <<<EOF

                    
EOF;
 if($option['type'] == 'calendar') { 
$formsearch .= <<<EOF

                        <script src="{$_G['setting']['jspath']}calendar.js?{$__VERHASH}" type="text/javascript"></script>
                        <input type="text" name="searchoption[{$optionid}][value]" class="comiis_input" value="
EOF;
 if(is_array($_GET['searchoption'][$optionid])) { 
$formsearch .= <<<EOF
{$_GET['searchoption'][$optionid]['value']}
EOF;
 } 
$formsearch .= <<<EOF
" onclick="showcalendar(event, this, false)" placeholder="{$comiis_lang['enter_content']}" />
                    
EOF;
 } else { 
$formsearch .= <<<EOF

                        <input type="text" name="searchoption[{$optionid}][value]" class="comiis_input" value="
EOF;
 if(is_array($_GET['searchoption'][$optionid])) { 
$formsearch .= <<<EOF
{$_GET['searchoption'][$optionid]['value']}
EOF;
 } 
$formsearch .= <<<EOF
" placeholder="{$comiis_lang['enter_content']}" />
                    
EOF;
 } 
$formsearch .= <<<EOF

                
EOF;
 } 
$formsearch .= <<<EOF

                </div>
            </div>
            
EOF;
?>
<?php } ?>
    <?php $formsearch_html .= $formsearch;?><?php $fontsearch = '';  $showoption = array();  $tmpcount = 0;?><?php if(getstatus($option['search'], 2)) { ?>
    <?php
$fontsearch = <<<EOF

<tr class="flsx_box">
<th><span class="f_c">{$option['title']}:</span></th>
            <td class="b_b">
                <ul class="cl">
                    <li
EOF;
 if($_GET[''.$option['identifier']] == 'all') { 
$fontsearch .= <<<EOF
 class="f_0"
EOF;
 } 
$fontsearch .= <<<EOF
><a href="forum.php?mod=forumdisplay&amp;fid={$_G['fid']}&amp;filter=sortid&amp;sortid={$_GET['sortid']}&amp;searchsort=1{$filterurladd}&amp;{$option['identifier']}=all{$sorturladdarray[$option['identifier']]}" class="xi2">{$comiis_lang['unlimited']}</a></li>

EOF;
 if($option['type'] == 'select') { if(is_array($option['choices'])) foreach($option['choices'] as $id => $value) { if($value['foptionid'] == 0) { 
$fontsearch .= <<<EOF

<li
EOF;
 if(preg_match('/^'.$value['optionid'].'\./i', $_GET[''.$option['identifier']]) || preg_match('/^'.$value['optionid'].'$/i', $_GET[''.$option['identifier']])) { 
$fontsearch .= <<<EOF
 class="f_0"
EOF;
 } 
$fontsearch .= <<<EOF
><a href="forum.php?mod=forumdisplay&amp;fid={$_G['fid']}&amp;filter=sortid&amp;sortid={$_GET['sortid']}&amp;searchsort=1&amp;{$option['identifier']}={$id}{$sorturladdarray[$option['identifier']]}">{$value['content']}</a></li>

EOF;
 } } if(!($_GET[''.$option['identifier']] == 'all' || !isset($_GET[''.$option['identifier']]))) { if(is_array($option['choices'])) foreach($option['choices'] as $id => $value) { if((preg_match('/^'.$value['foptionid'].'\./i', $_GET[''.$option['identifier']]) || preg_match('/^'.$value['foptionid'].'$/i', $_GET[''.$option['identifier']])) && ($showoption[$value['count']][$id] = $value)) { } } if(ksort($showoption)) { } if(is_array($showoption)) foreach($showoption as $optioncount => $values) { if($tmpcount != $optioncount && ($tmpcount = $optioncount)) { 
$fontsearch .= <<<EOF

</ul><ul class="subtsm cl">
EOF;
 if(is_array($values)) foreach($values as $id => $value) { 
$fontsearch .= <<<EOF
<li
EOF;
 if(preg_match('/^'.$value['optionid'].'\./i', $_GET[''.$option['identifier']]) || preg_match('/^'.$value['optionid'].'$/i', $_GET[''.$option['identifier']])) { 
$fontsearch .= <<<EOF
 class="f_0"
EOF;
 } 
$fontsearch .= <<<EOF
><a href="forum.php?mod=forumdisplay&amp;fid={$_G['fid']}&amp;filter=sortid&amp;sortid={$_GET['sortid']}&amp;searchsort=1&amp;{$option['identifier']}={$id}{$sorturladdarray[$option['identifier']]}">{$value['content']}</a></li>

EOF;
 } 
$fontsearch .= <<<EOF

</ul><ul>

EOF;
 } } } } else { if(is_array($option['choices'])) foreach($option['choices'] as $id => $value) { 
$fontsearch .= <<<EOF
<li
EOF;
 if($_GET[''.$option['identifier']] && !strcmp($id, $_GET[''.$option['identifier']])) { 
$fontsearch .= <<<EOF
 class="f_0"
EOF;
 } 
$fontsearch .= <<<EOF
><a href="forum.php?mod=forumdisplay&amp;fid={$_G['fid']}&amp;filter=sortid&amp;sortid={$_GET['sortid']}&amp;searchsort=1&amp;{$option['identifier']}={$id}{$sorturladdarray[$option['identifier']]}">{$value}</a></li>

EOF;
 } } 
$fontsearch .= <<<EOF

                </ul>
            </td>
</tr>

EOF;
?>
     <?php } ?>
     <?php $fontsearch_html .= $fontsearch;?><?php } if($formsearch_html || $fontsearch_html) { ?>
<div class="comiis_flsx bg_f b_b cl comiis_flbox"<?php if($comiis_app_switch['comiis_flxx_list_ss'] !=1) { ?> style="display:none;"<?php } ?>>
<?php if($fontsearch_html) { ?>	    
<table id="fontsearch">
 <?php echo $fontsearch_html;?>
</table>
<?php } if($formsearch_html) { ?>
    <form method="post" autocomplete="off" name="searhsort" id="searhsort" action="forum.php?mod=forumdisplay&amp;fid=<?php echo $_G['fid'];?>&amp;filter=sortid&amp;sortid=<?php echo $_GET['sortid'];?>">
        <input type="hidden" name="formhash" value="<?php echo FORMHASH;?>" />
        <?php echo $formsearch_html;?>
<div class="comiis_btnbox cl"><button type="submit" class="comiis_btn bg_c f_f" name="searchsortsubmit"><?php echo $comiis_lang['search'];?></button></div>	
    </form>
<?php } ?>
</div>
<?php } ?>