<?php
//Discuz! cache file, DO NOT modify me!
//Created: Sep 29, 2018, 17:25
//Identify: 8a664f8500f863aa33eef07e5d1c5b83

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
?>
<?php if(is_array($_G['forum_optionlist'])) foreach($_G['forum_optionlist'] as $optionid => $option) { if(in_array($option['type'], array('radio', 'checkbox','textarea'))) { ?><li class="comiis_stylitit b_b bg_e f_c"><?php echo $option['title'];?><?php if($option['required']) { ?> <span class="f_g">*</span><?php } ?></li><?php } ?>
<li class="<?php if(!($option['unchangeable'] && $option['value']) && $option['type'] == 'image') { ?>comiis_stylino comiis_flex<?php } else { ?>comiis_styli comiis_flex<?php if(in_array($option['type'], array('radio', 'checkbox'))) { ?> post_sort<?php } ?> b_b<?php } ?>" id="comiis_list_<?php echo $option['identifier'];?>"<?php if($option['type'] == 'select') { ?> style="padding:0 12px;"<?php } ?>>			
<?php if(!in_array($option['type'], array('radio', 'checkbox','textarea'))) { ?><div class="<?php if(!($option['unchangeable'] && $option['value']) && $option['type'] == 'image') { ?>flex <?php } ?>styli_tit f_c"><?php echo $option['title'];?><?php if($option['required']) { ?> <span class="f_g">*</span><?php } ?></div><?php } if(!($option['unchangeable'] && $option['value']) && $option['type'] == 'image') { ?><div class="styli_r comiis_editpic" style="margin:0;"><?php } else { ?><div id="select_<?php echo $option['identifier'];?>" class="flex"><?php } if(in_array($option['type'], array('number', 'text', 'email', 'calendar', 'image', 'url', 'range', 'upload', 'range'))) { if($option['type'] == 'calendar') { ?>
<input type="text" name="typeoption[<?php echo $option['identifier'];?>]" id="typeoption_<?php echo $option['identifier'];?>" tabindex="1" size="<?php echo $option['inputsize'];?>" onchange="checkoption('<?php echo $option['identifier'];?>', '<?php echo $option['required'];?>', '<?php echo $option['type'];?>')" value="<?php echo $option['value'];?>" <?php echo $option['unchangeable'];?> class="comiis_input kmshow comiis_dateshow_nt" readonly="readonly" placeholder="<?php echo $option['description'];?>" />
<?php } elseif($option['type'] == 'image') { ?>				
<?php if(!($option['unchangeable'] && $option['value'])) { ?>						
<ul>
<li class="up_btn comiis_flex">
<a class="bg_b b_ok f_c" href="javascript:;"><i class="comiis_font">&#xe627</i><?php if($option['value']) { ?><?php echo $comiis_lang['update'];?><?php echo $comiis_lang['forum_recommend_image'];?><?php } else { ?><?php echo $comiis_lang['add'];?><?php echo $comiis_lang['forum_recommend_image'];?><?php } ?><input type="file" id="uploadfile_<?php echo $optionid;?>" class="kmshow" accept="image/*"></a>
</li>				
</ul>
<?php if($option['value']) { ?><input type="hidden" name="oldsortaid[<?php echo $option['identifier'];?>]" value="<?php echo $option['value']['aid'];?>" /><?php } ?>
<input type="hidden" name="typeoption[<?php echo $option['identifier'];?>][aid]" value="<?php echo $option['value']['aid'];?>" id="sortaid_<?php echo $option['identifier'];?>" />
<input type="hidden" name="sortaid_<?php echo $option['identifier'];?>_url" id="sortaid_<?php echo $option['identifier'];?>_url" />
<input type="hidden" name="typeoption[<?php echo $option['identifier'];?>][url]" id="sortattachurl_<?php echo $option['identifier'];?>" <?php if($option['value']['url']) { ?>value="<?php echo $option['value']['url'];?>"<?php } ?> />						
<?php } ?>
<li class="comiis_stylino b_b cl">
<a href="javascript:;" id="sortattach_image_<?php echo $option['identifier'];?>">
<?php if($option['value']['url']) { ?>
<img src="<?php echo $option['value']['url'];?>" class="comiis_upimg vm" />
<?php } ?>
</a>
</li>
<script>
$(document).on('change', '#uploadfile_<?php echo $optionid;?>', function() {
popup.open('<img src="' + IMGDIR + '/imageloading.gif" class="comiis_loading">');
uploadsuccess = function(data) {
if(data == '') {
popup.open('<?php echo $comiis_lang['uploadpicfailed'];?>', 'alert');
}
var dataarr = data.split('|');
if(dataarr[0] == 'DISCUZUPLOAD' && dataarr[2] == 0) {
popup.close();
$('#sortaid_<?php echo $option['identifier'];?>').val(dataarr[3]);
$('#sortaid_<?php echo $option['identifier'];?>_url').val(dataarr[5]);
$('#sortattachurl_<?php echo $option['identifier'];?>').val('<?php echo $_G['setting']['attachurl'];?>forum/' + dataarr[5]);
$('#sortattach_image_<?php echo $option['identifier'];?>').html('<a href="<?php echo $_G['setting']['attachurl'];?>forum/'+dataarr[5]+'" target="_blank"><img src="<?php echo $_G['setting']['attachurl'];?>forum/'+dataarr[5]+'" class="comiis_upimg vm" /></a>');
$('.comiis_upkey i').text('<?php echo $comiis_lang['update'];?>');
} else {
var sizelimit = '';
if(dataarr[7] == 'ban') {
sizelimit = '<?php echo $comiis_lang['uploadpicatttypeban'];?>';
} else if(dataarr[7] == 'perday') {
sizelimit = '<?php echo $comiis_lang['donotcross'];?>'+Math.ceil(dataarr[8]/1024)+'K)';
} else if(dataarr[7] > 0) {
sizelimit = '<?php echo $comiis_lang['donotcross'];?>'+Math.ceil(dataarr[7]/1024)+'K)';
}
popup.open(STATUSMSG[dataarr[2]] + sizelimit, 'alert');
return false;
}
};
if(typeof FileReader != 'undefined' && this.files[0]) {
$.buildfileupload({
uploadurl:'misc.php?mod=swfupload&operation=upload&type=image&inajax=yes&infloat=yes&simple=2',
files:this.files,
uploadformdata:{uid:"<?php echo $_G['uid'];?>", hash:"<?php echo md5(substr(md5($_G[config][security][authkey]), 8).$_G[uid])?>"},
uploadinputname:'Filedata',
maxfilesize:"<?php echo $swfconfig['max'];?>",
success:uploadsuccess,
error:function() {
popup.open('<?php echo $comiis_lang['uploadpicfailed'];?>', 'alert');
}
});
} else {
$.ajaxfileupload({
url:'misc.php?mod=swfupload&operation=upload&type=image&inajax=yes&infloat=yes&simple=2',
data:{uid:"<?php echo $_G['uid'];?>", hash:"<?php echo md5(substr(md5($_G[config][security][authkey]), 8).$_G[uid])?>"},
dataType:'text',
fileElementId:'filedata',
success:uploadsuccess,
error: function() {
popup.open('<?php echo $comiis_lang['uploadpicfailed'];?>', 'alert');
}
});
}
});
</script>
<?php } else { ?>
<input type="text" name="typeoption[<?php echo $option['identifier'];?>]" id="typeoption_<?php echo $option['identifier'];?>" class="comiis_input kmshow" tabindex="1" size="<?php echo $option['inputsize'];?>" onBlur="checkoption('<?php echo $option['identifier'];?>', '<?php echo $option['required'];?>', '<?php echo $option['type'];?>'<?php if($option['maxnum']) { ?>, '<?php echo $option['maxnum'];?>'<?php } else { ?>, '0'<?php } if($option['minnum']) { ?>, '<?php echo $option['minnum'];?>'<?php } else { ?>, '0'<?php } if($option['maxlength']) { ?>, '<?php echo $option['maxlength'];?>'<?php } ?>)" value="<?php if($_G['tid']) { ?><?php echo $option['value'];?><?php } else { if($member_profile[$option['profile']]) { ?><?php echo $member_profile[$option['profile']];?><?php } else { ?><?php echo $option['defaultvalue'];?><?php } } ?>" placeholder="<?php echo $option['description'];?>" <?php echo $option['unchangeable'];?> />
<?php } } elseif(in_array($option['type'], array('radio', 'checkbox', 'select'))) { if($option['type'] == 'select') { if(is_array($option['value'])) foreach($option['value'] as $selectedkey => $selectedvalue) { if($selectedkey) { ?>
<script type="text/javascript">
changeselectthreadsort('<?php echo $selectedkey;?>', <?php echo $optionid;?>, 'update');
</script>
<?php } else { ?>
<div class="comiis_login_select kmselect">
<div class="inner">
<i class="comiis_font f_d">&#xe60c</i>
<div class="z">
<div class="comiis_question" id="comiis_select_<?php echo $option['identifier'];?><?php echo $selectedkey;?>_name"></div>
</div>					
</div>	
<select tabindex="1" id="comiis_select_<?php echo $option['identifier'];?><?php echo $selectedkey;?>" onchange="changeselectthreadsort(this.value, '<?php echo $optionid;?>');checkoption('<?php echo $option['identifier'];?>', '<?php echo $option['required'];?>', '<?php echo $option['type'];?>')" <?php echo $option['unchangeable'];?>>
<option value="0"><?php echo $comiis_lang['please_select'];?></option><?php if(is_array($option['choices'])) foreach($option['choices'] as $id => $value) { if(!$value['foptionid']) { ?>
<option value="<?php echo $id;?>"><?php echo $value['content'];?> <?php if($value['level'] != 1) { ?>&raquo<?php } ?></option>
<?php } } ?>
</select>
</div>			
<?php } } if(!is_array($option['value'])) { ?>
<div class="comiis_login_select kmselect">
<div class="inner">
<i class="comiis_font f_d">&#xe60c</i>
<div class="z">
<div class="comiis_question" id="comiis_select_<?php echo $option['identifier'];?>_name"></div>
</div>					
</div>				
<select id="comiis_select_<?php echo $option['identifier'];?>" tabindex="1" onchange="changeselectthreadsort(this.value, '<?php echo $optionid;?>');checkoption('<?php echo $option['identifier'];?>', '<?php echo $option['required'];?>', '<?php echo $option['type'];?>')" <?php echo $option['unchangeable'];?>>
<option value="0"><?php echo $comiis_lang['please_select'];?></option><?php if(is_array($option['choices'])) foreach($option['choices'] as $id => $value) { if(!$value['foptionid']) { ?>
<option value="<?php echo $id;?>"><?php echo $value['content'];?> <?php if($value['level'] != 1) { ?>&raquo<?php } ?></option>
<?php } } ?>
</select>
</div>
<?php } } elseif($option['type'] == 'radio') { if(is_array($option['choices'])) foreach($option['choices'] as $id => $value) { ?><input type="radio" name="typeoption[<?php echo $option['identifier'];?>]" id="typeoption_<?php echo $option['identifier'];?><?php echo $id;?>" onclick="checkoption('<?php echo $option['identifier'];?>', '<?php echo $option['required'];?>', '<?php echo $option['type'];?>')" value="<?php echo $id;?>" <?php echo $option['value'][$id];?> <?php echo $option['unchangeable'];?>>
<label for="typeoption_<?php echo $option['identifier'];?><?php echo $id;?>"><i class="comiis_font"></i><?php echo $value;?></label>
<?php } } elseif($option['type'] == 'checkbox') { if(is_array($option['choices'])) foreach($option['choices'] as $id => $value) { ?><input type="checkbox" id="typeoption_<?php echo $option['identifier'];?><?php echo $id;?>" name="typeoption[<?php echo $option['identifier'];?>][]" tabindex="1" onclick="checkoption('<?php echo $option['identifier'];?>', '<?php echo $option['required'];?>', '<?php echo $option['type'];?>')" value="<?php echo $id;?>" <?php echo $option['value'][$id][$id];?> <?php echo $option['unchangeable'];?>>
<label for="typeoption_<?php echo $option['identifier'];?><?php echo $id;?>"><i class="comiis_font"></i><?php echo $value;?></label>
<?php } } } elseif(in_array($option['type'], array('textarea'))) { ?>
<textarea name="typeoption[<?php echo $option['identifier'];?>]" tabindex="1" id="typeoption_<?php echo $option['identifier'];?>" cols="<?php echo $option['colsize'];?>" onBlur="checkoption('<?php echo $option['identifier'];?>', '<?php echo $option['required'];?>', '<?php echo $option['type'];?>', 0, 0<?php if($option['maxlength']) { ?>, '<?php echo $option['maxlength'];?>'<?php } ?>)" placeholder="<?php echo $option['description'];?>" <?php echo $option['unchangeable'];?> class="comiis_pt"><?php echo $option['value'];?></textarea>
<?php } ?>				
<?php if($option['unit']) { ?>
</div>
<div class="styli_r f_c"><?php echo $option['unit'];?></div>
<?php } if($option['type'] == 'calendar') { ?>
</div>
<div class="styli_r"><a href="javascript:;" onclick="$('#typeoption_<?php echo $option['identifier'];?>').val('');"><i class="comiis_font f_g">&#xe647</i></a></div>
<?php } if($option['maxnum'] || $option['minnum'] || $option['maxlength'] || $option['unchangeable'] || $option['description']) { ?>
<div class="post_tip f_d mt5 cl" style="display:none;">
<?php if($option['maxnum']) { ?>
<?php echo $comiis_lang['maxnum'];?> <?php echo $option['maxnum'];?> 
<?php } if($option['minnum']) { ?>
<?php echo $comiis_lang['minnum'];?> <?php echo $option['minnum'];?> 
<?php } if($option['maxlength']) { ?>
<?php echo $comiis_lang['maxlength'];?> <?php echo $option['maxlength'];?> 
<?php } if($option['unchangeable']) { ?>
<?php echo $comiis_lang['unchangeable'];?> 
<?php } if($option['description']) { ?>
<?php echo $option['description'];?>
<?php } ?>
</div>
<?php } ?>			
</li>
<?php if(in_array($option['type'], array('textarea'))) { ?><li class="styli_h bg_e b_b"></li><?php } } ?>
<script>
function validateextra() {<?php if(is_array($_G['forum_optionlist'])) foreach($_G['forum_optionlist'] as $optionid => $option) { ?>if(checkoption('<?php echo $option['identifier'];?>', '<?php echo $option['required'];?>', '<?php echo $option['type'];?>') === false) {
return 1;
}
<?php } ?>
return 0;
}
</script>
