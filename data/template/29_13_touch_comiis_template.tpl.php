<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); ?>
<style>
.comiis_mh_txtlist_bk li {margin:0 12px;height:40px;line-height:40px;font-size:15px;overflow:hidden;}
.comiis_mh_txtlist_bk li:first-child {border-top:none !important;}
.comiis_mh_txtlist_bk li a {display:block;}
.comiis_mh_txtlist_bk li span {font-size:13px;padding-left:8px;}
</style>
<div class="comiis_mh_txtlist_bk cl">
<ul>
    <?php if(is_array($comiis['itemlist'])) foreach($comiis['itemlist'] as $temp) { ?><li class="b_t"><a href="<?php echo $temp['url'];?>" title="<?php echo $temp['fields']['fulltitle'];?>"><span class="f_d y"><?php echo dgmdate($temp['fields']['dateline'], ($comiis['dateuformat'] == 1 ? 'u' : $comiis['dateformat']));; ?></span><?php if($temp['fields']['typename']) { ?><font class="f_0"><?php echo $temp['fields']['typename'];?> |</font><?php } elseif($temp['fields']['catname']) { ?><font class="f_0"><?php echo $temp['fields']['catname'];?> |</font><?php } elseif($temp['fields']['groupname']) { ?><font class="f_0"><?php echo $temp['fields']['groupname'];?> |</font><?php } elseif($temp['fields']['forumname']) { ?><font class="f_0"><?php echo $temp['fields']['forumname'];?> |</font><?php } ?> <?php echo $temp['title'];?></a></li>
<?php } ?>
</ul>
</div>