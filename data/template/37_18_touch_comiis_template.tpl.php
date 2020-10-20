<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); ?>
<style>
.comiis_mh_txtlist_phb li {margin:0 12px;height:40px;line-height:40px;font-size:15px;overflow:hidden;}
.comiis_mh_txtlist_phb li:first-child {border-top:none !important;}
.comiis_mh_txtlist_phb li a {display:block;}
.comiis_mh_txtlist_phb li i {font-size:12px;margin-right:4px;}
.comiis_mh_txtlist_phb li span {font-size:13px;padding-left:8px;}
.comiis_mh_txtlist_phb li em {float:left;margin-top:11px;margin-right:8px;font-size:12px;width:18px;height:18px;line-height:18px;text-align:center;border-radius:0 4px 4px 4px;}
.comiis_mh_txtlist_phb li em.ibg01 {background:#FF705E;}
.comiis_mh_txtlist_phb li em.ibg02 {background:#FFB900;}
.comiis_mh_txtlist_phb li em.ibg03 {background:#A8C500;}
</style>
<div class="comiis_mh_txtlist_phb cl">
<ul>
    <?php $nnn=0;?>    <?php if(is_array($comiis['itemlist'])) foreach($comiis['itemlist'] as $k => $temp) { ?>    <?php $nnn++;?><li class="b_t"><a href="<?php echo $temp['url'];?>" title="<?php echo $temp['fields']['fulltitle'];?>"><em class="<?php if($nnn == 1) { ?>ibg01<?php } elseif($nnn == 2) { ?>ibg02<?php } elseif($nnn == 3) { ?>ibg03<?php } else { ?>bg_hs<?php } ?> f_f"><?php echo $nnn;?></em><?php echo $temp['title'];?></a></li>
<?php } ?>
</ul>
</div>