<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); ?>
<style>    
.tfm th {padding-top:7px;padding-right:8px;width:100px;}
.buddy_group li {line-height:30px;padding:8px 0;}
.buddy_group li img {float:left;width:30px;height:30px;margin-right:8px;border-radius:50%;}
</style>
<ul class="tb wmse cl">
<li<?php if($_GET['mods'] == 'setup') { ?> class="a"<?php } ?>><a href="home.php?mod=spacecp&amp;ac=plugin&amp;id=comiis_sms:comiis_setup"><?php if($comiis_is_mobile_user == 1) { ?><?php echo $comiis_sms['218'];?><?php } else { ?><?php echo $comiis_sms['01'];?><?php } ?></a></li>
<li<?php if($_GET['mods'] == 'rename') { ?> class="a"<?php } ?>><a href="home.php?mod=spacecp&amp;ac=plugin&amp;id=comiis_sms:comiis_setup&amp;mods=rename"><?php echo $comiis_sms['03'];?></a></li>
</ul>
<?php if($_GET['mods'] == 'setup') { ?>
<?php echo $return;?>
<?php if($_G['comiis_sms']['unbundling'] || !$comiis_is_mobile_user) { ?>	
<?php if($comiis_is_mobile_user) { ?>
<div id="comiis_mobile_ub_key">
            <div class="tbmu xi2 cl" style="padding-top:15px;border-bottom:none;"><?php echo $comiis_sms['217'];?></div>
            <div class="tbms mtm xi1 cl"><?php echo $comiis_sms['07'];?>: <?php echo substr_replace($comiis_mobile_user['tel'], '****', 3, 4);; ?></div>
<div class="mtm cl"><button type="button" onclick="comiis_mobile_ub_key()" class="mtm pn pnc"><strong><?php echo $comiis_sms['208'];?><?php echo $comiis_sms['02'];?></strong></button></div>
</div>
<script>
function comiis_mobile_ub_key() {
jQuery('#comiis_mobile_ub_box').show();
jQuery('#comiis_mobile_ub_key').hide();
}
</script>
<?php } ?>		
<div id="comiis_mobile_ub_box"<?php if($comiis_is_mobile_user) { ?> style="display:none;"<?php } ?>>	
<?php if($comiis_is_mobile_user == 1) { ?>
<p class="tbmu mbm xi2"><?php echo $comiis_sms['04'];?></p>
<?php } else { ?>
<p class="tbmu mbm"><?php if($_G['comiis_sms']['renum'] == 1) { ?><?php echo $comiis_sms['228'];?><br><?php } ?><span class="xi1"><?php echo $comiis_sms['06'];?></span></p>
<?php } ?>
<form method="post" autocomplete="off" name="register"  enctype="multipart/form-data"  action="plugin.php?id=comiis_sms:comiis_sms_post&amp;action=<?php if($comiis_is_mobile_user == 1) { ?>Unbundling<?php } else { ?>binding<?php } ?>" id="comiis_mobile_binding_sms" onsubmit="comiis_bindingsubmit('<?php if($comiis_is_mobile_user == 1) { ?>Unbundling<?php } else { ?>binding<?php } ?>');" class="<?php if($comiis_is_mobile_user == 1) { ?>Unbundling<?php } else { ?>binding<?php } ?>">
<input type="hidden" name="formhash" value="<?php echo FORMHASH;?>">
<input type="hidden" name="comiis_mobile_bindingsubmit" value="true">
<input type="hidden" name="referer" value="<?php echo dreferer(); ?>" />
<?php if($comiis_is_mobile_user == 1) { ?>
<input type="hidden" name="comiis_tel" id="comiis_tel" value="<?php echo $comiis_mobile_user['tel'];?>">
<?php } ?>		
<table class="tfm mtw" cellspacing="0" cellpadding="0">
<?php if($comiis_is_mobile_user == 1) { ?>
<tr>
<th><label class="y"><?php echo $comiis_sms['47'];?>:</label></th>
<td><?php echo dgmdate($comiis_mobile_user['dateline']); ?></td>
</tr>
<tr>
<th><label class="y xi1"><?php echo $comiis_sms['07'];?>:</label></th>
<td class="xi1"><?php echo substr_replace($comiis_mobile_user['tel'], '****', 3, 4);; ?></td>
</tr>
<tr>
<th style="padding:2px 0 15px;"></th>
<td class="tipcol" style="padding:2px 0 15px;">
<div class="comiis_mobreg_time xi1" style="display:none"><span></span><?php echo $comiis_sms['08'];?></div>
<input type="button" class="comiis_mobreg_timekey" value="<?php echo $comiis_sms['09'];?>" onclick="comiis_mobreg_fkey('Unbundling')" />
</td>
</tr>
<?php } else { ?>
<tr>
<th><label class="y"><?php echo $comiis_sms['10'];?>:</label><span class="y xi1">*</span></th>
<td><input class="px" type="text" size="25" value="" autocomplete="off" name="comiis_tel" id="comiis_tel" required></td>
</tr>
<tr>
<th style="padding:2px 0 15px;"></th>
<td class="tipcol" style="padding:2px 0 15px;">
<div class="comiis_mobreg_time xi1" style="display:none"><span></span><?php echo $comiis_sms['08'];?></div>
<input type="button" class="comiis_mobreg_timekey" value="<?php echo $comiis_sms['09'];?>" onclick="comiis_mobreg_fkey('binding')" />
</td>
</tr>
<?php } ?>
<tr>
<th><label class="y"><?php if($comiis_is_mobile_user == 1) { ?><?php echo $comiis_sms['144'];?><?php } else { ?><?php echo $comiis_sms['147'];?><?php } ?>:</label><span class="y xi1">*</span></th>
<td><input name="code" class="px" type="text" size="25" value="" autocomplete="off" required></td>
<td class="tipcol"></td>
</tr>	
                <?php if($_G['comiis_sms']['setup_seccodeverify']) { ?>
                    <?php if($seccodecheck) { ?>
                    <tr id="seccode_cc<?php echo $sechash;?>"></tr>
                    <script type="text/javascript" reload="1">updateseccode('cc<?php echo $sechash;?>', '<?php echo $sectpl;?>', '');</script>
                    <?php } ?>
                <?php } ?>
<tr><th>&nbsp;</th><td colspan="2"><button type="submit" class="pn pnc mbm"><strong><?php if($comiis_is_mobile_user == 1) { ?><?php echo $comiis_sms['02'];?><?php } else { ?><?php echo $comiis_sms['137'];?><?php } ?></strong></button></td></tr>
</table>
<?php if($_G['comiis_sms']['unbundling']) { ?><p class="tbms mtm"><?php echo $comiis_sms['05'];?></p><?php } ?>
</form>		
</div>
<?php } else { ?>
        <div class="tbmu xi2 xlco cl" style="padding-top:15px;border-bottom:none;"><?php echo $comiis_sms['12'];?></div>
        <div class="tbms mtm xi1 cl"><?php echo $comiis_sms['07'];?>: <?php echo substr_replace($comiis_mobile_user['tel'], '****', 3, 4);; ?></div>
<?php } ?>	
<?php if(count($comiis_alluser) > 1) { ?>
        <ul class="tb cl" style="margin-top:30px;">
            <li class="a"><a hraf="javascript:;"><?php echo $comiis_sms['14'];?></a></li>        
        </ul>
        <p class="tbmu ypci mbm xi2"><?php echo $comiis_sms['15'];?></p> 
        <ul class="buddy_group">
        <?php if(is_array($comiis_alluser)) foreach($comiis_alluser as $temp) { ?>            <li><span class="xg1 y">UID: <?php echo $temp['uid'];?></span><a href="home.php?mod=space&amp;uid=<?php echo $temp['uid'];?>" title="<?php echo $temp['username'];?>"><img src="<?php echo avatar($temp['uid'], small, true);?>"><?php echo $temp['username'];?></a></li>
        <?php } ?>
        </ul>
<?php } } else { ?>
    <?php if($comiis_is_mobile_reg_user == 1) { ?>
        <p class="tbms aakb mtm mbm"><?php echo $comiis_sms['16'];?></p>	
        <form method="post" autocomplete="off" name="register"  enctype="multipart/form-data"  action="plugin.php?id=comiis_sms:comiis_sms_post&amp;action=rename">
            <input type="hidden" name="formhash" value="<?php echo FORMHASH;?>">
            <input type="hidden" name="renamesubmit" value="true" />
            <table class="tfm mtw" cellspacing="0" cellpadding="0">
                <tr>
                    <th><label class="y"><?php echo $comiis_sms['17'];?>:</label><span class="y xi1">*</span></th>
                    <td><input name="newname" class="px" type="text" size="25" value="" autocomplete="off" required></td>
                    <td class="tipcol"></td>
                </tr> 
                <?php if($comiis_mobile_user['state'] == 2) { ?>
                <tr>
                    <th><label class="y"><?php echo $comiis_sms['170'];?>:</label><span class="y xi1">*</span></th>
                    <td><input name="password1" class="px" type="password" size="25" value="" autocomplete="off" required></td>
                    <td class="tipcol"></td>
                </tr>
                <tr>
                    <th><label class="y"><?php echo $comiis_sms['33'];?>:</label><span class="y xi1">*</span></th>
                    <td><input name="password2" class="px" type="password" size="25" value="" autocomplete="off" required></td>
                    <td class="tipcol"></td>
                </tr>                
                <?php } ?>
                <tr><th>&nbsp;</th><td colspan="2" class="mbm xi1"><?php echo $comiis_sms['18'];?></td></tr>
                <tr><th>&nbsp;</th><td colspan="2"><button type="submit" class="pn pnc"><strong><?php echo $comiis_sms['13'];?></strong></button></td></tr>
            </table>
        </form>
    <?php } else { ?>
        <p class="tbms bfhl mtm"><?php echo $comiis_sms['19'];?></p>
    <?php } ?>	
<?php } ?>
