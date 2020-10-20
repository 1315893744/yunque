<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); ?>
<style>
.comiis_mh_tit {overflow:hidden;position:relative;}
.comiis_mh_tit_more {position:absolute;right:12px;top:8px;width:16px;height:22px;z-index:50;overflow:hidden;}
.comiis_mh_tit .mh_tit_morea {display:block;position:absolute;right:5px;top:8px;width:40px;height:22px;z-index:60;text-indent:-999px;overflow:hidden;}
.comiis_mh_tit h2 {height:18px;line-height:18px;margin:0 12px;padding-top:12px;font-size:16px;font-weight:400;overflow:hidden;}
</style>
<div class="comiis_mh_tit cl">
    <i class="comiis_mhfont comiis_mh_tit_more f_d">&#xe601;</i>
    <?php echo $comiis['summary'];?>
</div>