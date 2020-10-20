<?php
//Discuz! cache file, DO NOT modify me!
//Created: Sep 29, 2018, 17:44
//Identify: 1a5f58563c743fb046bffe1ba6794223

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
?>
<?php if($_GET['inajax'] != 1) { ?>
<script type="text/javascript">
function errorhandle_clickhandle(message, values) {
if(values['id']) {
$.ajax({
type:'GET',
url: 'home.php?mod=spacecp&ac=click&op=show&clickid=' +  values['clickid'] + '&idtype='+ values['idtype'] + '&id=' + values['id'] + '&inajax=1' ,
dataType:'xml',
}).success(function(s) {
if(s.lastChild.firstChild.nodeValue){
$('#comiis_clickre_box').html(s.lastChild.firstChild.nodeValue);
setTimeout(function(){
dialog.init();
}, 100);
}
});
}
}
</script>
<div id="comiis_clickre_box">
<?php } ?>
<table cellpadding="0" cellspacing="0" class="comiis_atd">
<tr><?php $clicknum = 0;?><?php if(is_array($clicks)) foreach($clicks as $key => $value) { $clicknum = $clicknum + $value['clicknum'];?><?php $value['height'] = $maxclicknum?intval($value['clicknum']*40/$maxclicknum):0;?><td>
<a href="home.php?mod=spacecp&amp;ac=click&amp;op=add&amp;clickid=<?php echo $key;?>&amp;idtype=<?php echo $idtype;?>&amp;id=<?php echo $_GET['aid'] ? $_GET['aid'] : $id; ?>&amp;hash=<?php echo $hash;?>&amp;handlekey=clickhandle" id="click_<?php echo $idtype;?>_<?php echo $_GET['aid'] ? $_GET['aid'] : $id; ?>_<?php echo $key;?>" class="dialog">
<?php if($value['clicknum'] && $comiis_app_switch['comiis_atd_style'] == 0) { ?>
<div class="comiis_atdc">
<div class="ac<?php echo $value['classid'];?>" style="height:<?php echo $value['height'];?>px;">
<em><?php echo $value['clicknum'];?></em>
</div>
</div>
<?php } ?>
<img src="<?php echo STATICURL;?>image/click/<?php echo $value['icon'];?>" /><p class="f_c"><?php if($value['clicknum'] && $comiis_app_switch['comiis_atd_style'] != 0) { ?><span class="f_a"><?php echo $value['clicknum'];?></span><?php } ?> <?php echo $value['name'];?></p>
</a>
</td>		
<?php } ?>	
</tr>
</table>
<?php if($clickuserlist && $comiis_app_switch['comiis_atd_style'] == 0) { ?>
<div class="comiis_rate cl">
    <p class="rate_tip f_d"><?php echo $comiis_lang['tip198'];?> <em class="f_a"><?php echo $clicknum;?></em> <?php echo $comiis_lang['tip334'];?></p>
    <ul class="cl">
        <?php if(is_array($clickuserlist)) foreach($clickuserlist as $value) { ?>            <?php if($value['username']) { ?>
                <li><a href="home.php?mod=space&amp;uid=<?php echo $value['uid'];?>&amp;do=profile"><?php echo avatar($value[uid], 'small');?></a></li>
            <?php } else { ?>
                <li><img src="<?php echo STATICURL;?>image/magic/hidden.gif" alt="<?php echo $value['clickname'];?>" /></li>
            <?php } ?>
        <?php } ?>
    </ul>
</div>
<?php } if($click_multi) { ?><div class="cl"><?php echo $click_multi;?></div><?php } if($_GET['inajax'] != 1) { ?></div><?php } ?>