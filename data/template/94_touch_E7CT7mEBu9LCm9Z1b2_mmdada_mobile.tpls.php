<?php
//Discuz! cache file, DO NOT modify me!
//Created: Sep 29, 2018, 17:37
//Identify: 577ebf7615dca4690db6d16c1f9293c8

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
?>
  <script type="text/JavaScript">
  var comiis_newid = 0
  function comiis_addrow(){
if(<?php echo $typenumlimit;?> <= $('#threadtypes_manage').children('li').length) {
popup.open('<?php echo $comiis_lang['group_threadtype_limit_1'];?><?php echo $typenumlimit;?><?php echo $comiis_lang['group_threadtype_limit_2'];?>', 'alert');
        return false;
}
comiis_newid++;
$('#threadtypes_manage').append('<li class="comiis_styli comiis_flex b_b"><div class="styli_tit w30"><input type="checkbox" id="comiis_threadtypesnewdel'+comiis_newid+'" name="newenable[]" value="1" disabled="disabled"><label for="comiis_threadtypesnewdel'+comiis_newid+'"><i class="comiis_font f_e"></i></label></div><div class="styli_tit w30"><input type="checkbox" id="comiis_threadtypesnew'+comiis_newid+'" name="newenable[]" value="1" checked="checked"><label for="comiis_threadtypesnew'+comiis_newid+'"><i class="comiis_font f_0"></i></label></div><div class="styli_tit w30"><input type="text" name="newdisplayorder[]" class="comiis_input kmshow" value="0" style="width:40px;"></div><div class="flex"><input type="text" name="newname[]" class="comiis_input kmshow" value="" placeholder="<?php echo $comiis_group_lang['034'];?><?php echo $comiis_lang['threadtype_name'];?>"></div></li>');
comiis_input_style();
  }
  </script>		
  <form id="threadtypeform" action="forum.php?mod=group&amp;action=manage&amp;op=threadtype&amp;fid=<?php echo $_G['fid'];?>" autocomplete="off" method="post" name="threadtypeform">
    <input type="hidden" value="<?php echo FORMHASH;?>" name="formhash" />	
    <input type="hidden" value="1" name="groupthreadtype" />	
    <div class="comiis_p12 bg_f b_b cl">
      <div class="comiis_quote bg_h f_a cl" style="margin:0;font-size:13px;">
        <?php echo $comiis_lang['threadtype_turn_on_comment'];?>
      </div>
    </div>
    <div class="comiis_wzpost comiis_input_style bg_f b_t mt15 cl">	
      <ul>
        <li class="comiis_styli comiis_flex b_b">
          <div class="styli_tit f_c"><?php echo $comiis_lang['threadtype_turn_on'];?></div>
          <div class="flex comiis_input_style">
              <input type="checkbox" id="comiis_threadtypesnew[status]" name="threadtypesnew[status]" value="1" class="comiis_checkbox_key" <?php echo $checkeds['status']['1'];?> onclick="$('#comiis_status_boxs').toggle();" />
              <label for="comiis_threadtypesnew[status]" class="wauto"><code class="bg_f b_ok comiis_checkbox comiis_checkbox_close"></code></label>
          </div>
        </li>		
      </ul>
   </div>
<div id="comiis_status_boxs"<?php if(!$checkeds['status']['1']) { ?> style="display:none;"<?php } ?>>
  <div class="comiis_wzpost comiis_input_style bg_f cl">	
  <ul id="threadtypes_config">
<li class="comiis_styli comiis_flex b_b">
  <div class="styli_tit f_c"><?php echo $comiis_lang['threadtype_required'];?></div>
  <div class="flex comiis_input_style">
  <input type="checkbox" id="comiis_threadtypesnew[required]" name="threadtypesnew[required]" value="1" class="comiis_checkbox_key" <?php echo $checkeds['required']['1'];?> />
  <label for="comiis_threadtypesnew[required]" class="wauto"><code class="bg_f b_ok comiis_checkbox comiis_checkbox_close"></code></label>
  </div>
</li>
<li class="comiis_styli comiis_flex b_b">
  <div class="styli_tit f_c"><?php echo $comiis_group_lang['035'];?><?php echo $comiis_lang['threadtype_prefix'];?></div>
  <div class="flex comiis_input_style">
  <input type="checkbox" id="comiis_threadtypesnew[prefix]" name="threadtypesnew[prefix]" value="1" class="comiis_checkbox_key" <?php echo $checkeds['prefix']['1'];?>  />
  <label for="comiis_threadtypesnew[prefix]" class="wauto"><code class="bg_f b_ok comiis_checkbox comiis_checkbox_close"></code></label>
  </div>
</li>	
  </ul>
</div>
<div class="comiis_wzpost comiis_input_style bg_f cl">
  <ul>
<li class="comiis_stylitit b_b bg_e f_c"><?php echo $comiis_lang['threadtype'];?></li>	
<li class="comiis_styli comiis_flex b_b">
  <div class="styli_tit"><?php echo $comiis_lang['delete'];?></div>
  <div class="styli_tit"><?php echo $comiis_lang['enable'];?></div>
  <div class="styli_tit"><?php echo $comiis_lang['displayorder'];?></div>
  <div class="flex"><?php echo $comiis_lang['threadtype_name'];?></div>
  <div class="styli_r f_0"><a href="javascript:;" onclick="comiis_addrow()">+ <?php echo $comiis_lang['threadtype_add'];?></a></div>
</li>
 </ul>
 <ul id="threadtypes_manage">
<?php if($threadtypes) { ?>
  <?php if(is_array($threadtypes)) foreach($threadtypes as $val) { ?>  <li class="comiis_styli comiis_flex b_b">
<div class="styli_tit w30">
  <input type="checkbox" id="comiis_threadtypesnewdel<?php echo $val['typeid'];?>" name="threadtypesnew[options][delete][]" value="<?php echo $val['typeid'];?>" />
  <label for="comiis_threadtypesnewdel<?php echo $val['typeid'];?>"><i class="comiis_font"></i></label>
</div>
<div class="styli_tit w30">
  <input type="checkbox" id="comiis_threadtypesnew[options][enable][<?php echo $val['typeid'];?>]" name="threadtypesnew[options][enable][<?php echo $val['typeid'];?>]" value="1" <?php echo $val['enablechecked'];?> />
  <label for="comiis_threadtypesnew[options][enable][<?php echo $val['typeid'];?>]"><i class="comiis_font"></i></label>
</div>
<div class="styli_tit w30"><input type="text" name="threadtypesnew[options][displayorder][<?php echo $val['typeid'];?>]" class="comiis_input kmshow" value="<?php echo $val['displayorder'];?>" style="width:40px;" /></div>
<div class="flex"><input type="text" name="threadtypesnew[options][name][<?php echo $val['typeid'];?>]" class="comiis_input kmshow" value="<?php echo $val['name'];?>" /></div>
  </li>
  <?php } } ?>
</ul>
</div>
</div>
    <div class="comiis_btnbox">
      <button type="submit" class="formdialog comiis_btn bg_c f_f"><?php echo $comiis_lang['submit'];?></button>
    </div>
  </form>