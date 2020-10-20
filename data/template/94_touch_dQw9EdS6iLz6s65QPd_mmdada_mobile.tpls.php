<?php
//Discuz! cache file, DO NOT modify me!
//Created: Sep 29, 2018, 17:33
//Identify: 8fea20a6fda5602852772a7c972fda9b

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
?>
  <?php if(($comiis_app_switch['comiis_flxx_list'] == 1 || $comiis_app_switch['comiis_flxx_view'] == 1) && $comiis_app_switch['comiis_flxx_css']) { ?>
  <style>
    <?php echo strip_tags($comiis_app_switch['comiis_flxx_css']);; ?>  </style>
  <?php } ?>
  <?php if($post['first'] && $threadsort && $threadsortshow) { ?>
    <?php if($comiis_app_switch['comiis_flxx_view'] == 1 && $comiis_app_switch['comiis_flxx_view_wz'] != 1 && $threadsortshow['typetemplate']) { ?>
        <?php function comiis_replace_flxx_color($var) {
return 'comiis_flxx_color'.$var[1].'><em class="comiis_xifont">'.str_replace('&nbsp;','</em><em class="comiis_xifont">', $var[2]).'</em></';
}
if(strpos($threadsortshow['typetemplate'], 'comiis_flxx_color') !== false){
$threadsortshow['typetemplate'] = preg_replace_callback("/comiis_flxx_color(.*?)>(.*?)&nbsp;<\//i", 'comiis_replace_flxx_color', $threadsortshow['typetemplate']);
}?>        <?php echo $threadsortshow['typetemplate'];?>
    <?php } elseif($threadsortshow['optionlist'] && !($post['status'] & 1) && !$_G['forum_threadpay'] && ($comiis_app_switch['comiis_flxx_view'] == 0 || !$threadsortshow['typetemplate'])) { ?>
        <?php if($threadsortshow['optionlist'] == 'expire') { ?>
          <div class="comiis_quote bg_h f_c"><?php echo $comiis_lang['has_expired'];?></div>
        <?php } else { ?>
          <div class="comiis_actinfo comiis_view_flxx cl">
            <table cellspacing="0" cellpadding="0" class="b_t b_l comiis_actbox">									
            <?php if(is_array($threadsortshow['optionlist'])) foreach($threadsortshow['optionlist'] as $option) { ?>              <?php if($option['type'] != 'info') { ?>
                <?php if($option['type'] == 'image') { ?>
                  <?php if(preg_match("/href=\"(.*?)\"/i", $option['value'], $matches)) { ?>
                    <?php $option['value'] = '<a href="'.$matches[1].'" target="_blank"><img src="'.$matches[1].'" class="vm"></a>';?>                  <?php } else { ?>
                    <?php $option['value'] = '<a href="'.$option[value].'" target="_blank"><img src="'.$option[value].'" class="vm"></a>';?>                  <?php } ?>
                <?php } ?>
                <tr><th class="comiis_vsort bg_e b_b b_r"><?php echo $option['title'];?>:</th><td class="b_b b_r"><?php if($option['value']) { ?><?php echo $option['value'];?> <?php echo $option['unit'];?><?php } else { ?>--<?php } ?></td></tr>
              <?php } ?>
            <?php } ?>
            </table>
          </div>
        <?php } ?>
    <?php } ?>
  <?php } ?>