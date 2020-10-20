<?php
//Discuz! cache file, DO NOT modify me!
//Created: Sep 29, 2018, 17:49
//Identify: f27308d3f1ef7f4182f9c712fdce26f0

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
?>
		<iframe id="frame_profile" name="frame_profile" style="display: none"></iframe>
<form action="<?php if($operation != 'plugin') { ?>home.php?mod=spacecp&ac=profile&op=<?php echo $operation;?><?php } else { ?>home.php?mod=spacecp&ac=plugin&op=profile&id=<?php echo $_GET['id'];?><?php } ?>" method="post" enctype="multipart/form-data" autocomplete="off"<?php if($operation != 'plugin') { ?> target="frame_profile"<?php } ?>>
<input type="hidden" value="<?php echo FORMHASH;?>" name="formhash" />
<?php if($_GET['vid']) { ?>
<input type="hidden" value="<?php echo $_GET['vid'];?>" name="vid" />
<?php } ?>
<div class="comiis_crezz comiis_input_style mt15 b_t bg_f cl"><?php if(is_array($settings)) foreach($settings as $key => $value) { if($value['formtype'] == 'textarea') { ?>
<li class="comiis_stylitit bg_e b_b f_c cl">
                        <?php if($_G['comiis_new'] > 2) { ?>
                        <div class="y" style="margin-top:-6px;margin-left:10px;">
                            <?php if($vid) { ?>
                            <input type="hidden" name="privacy[<?php echo $key;?>]" value="3" />
                            <?php } else { ?>
                            <div class="comiis_login_select bg_f b_ok f12" style="padding:0 5px;border-radius:2px">
                                <span class="inner">
                                    <i class="comiis_font f_d">&#xe620</i>
                                    <span class="z">
                                        <span class="comiis_question f_c f12" id="comiis_info<?php echo $key;?>_name" style="padding-right:5px;"><?php echo $comiis_lang['tip172'];?></span>
                                    </span>					
                                </span>
                                <select id="comiis_info<?php echo $key;?>" name="privacy[<?php echo $key;?>]">
                                    <option value="0"<?php if($privacy[$key] == "0") { ?> selected="selected"<?php } ?>><?php echo $comiis_lang['tip172'];?></option>
                                    <option value="1"<?php if($privacy[$key] == "1") { ?> selected="selected"<?php } ?>><?php echo $comiis_lang['tip173'];?></option>
                                    <option value="3"<?php if($privacy[$key] == "3") { ?> selected="selected"<?php } ?>><?php echo $comiis_lang['tip174'];?></option>
                                </select>
                            </div>
                            <?php } ?>
                        </div>
                        <?php } ?>
                        <?php echo $value['title'];?><?php if($value['required']) { ?><span class="f_g">*</span><?php } ?>
</li>
<li class="comiis_flex comiis_styli b_b cl" id="comiis_stylibox_interest"><div class="flex comiis_vrzstyle comiis_vrzstyles"><?php echo $htmls[$key];?></div></li>		
<?php } elseif($value['formtype'] == 'checkbox' || $value['formtype'] == 'radio' || $value['formtype'] == 'list') { ?>
<li class="comiis_stylitit bg_e b_b f_c cl"><?php echo $value['title'];?><?php if($value['required']) { ?><span class="f_g">*</span><?php } ?></li>
<li class="comiis_styli b_b cl"><div class="flex comiis_vrzstyle comiis_vrzstyles"><?php echo $htmls[$key];?></div></li>		
<?php } else { if($key == 'interest' || $key == 'bio' || $key == 'birthcity' || $key == 'residecity') { ?>
<li class="comiis_stylitit bg_e b_b f_c cl">
                        <?php if($_G['comiis_new'] > 2) { ?>
                        <div class="y" style="margin-top:-6px;margin-left:10px;">
                            <?php if($vid) { ?>
                            <input type="hidden" name="privacy[<?php echo $key;?>]" value="3" />
                            <?php } else { ?>
                            <div class="comiis_login_select bg_f b_ok f12" style="padding:0 5px;border-radius:2px">
                                <span class="inner">
                                    <i class="comiis_font f_d">&#xe620</i>
                                    <span class="z">
                                        <span class="comiis_question f_c f12" id="comiis_info<?php echo $key;?>_name" style="padding-right:5px;"><?php echo $comiis_lang['tip172'];?></span>
                                    </span>					
                                </span>
                                <select id="comiis_info<?php echo $key;?>" name="privacy[<?php echo $key;?>]">
                                    <option value="0"<?php if($privacy[$key] == "0") { ?> selected="selected"<?php } ?>><?php echo $comiis_lang['tip172'];?></option>
                                    <option value="1"<?php if($privacy[$key] == "1") { ?> selected="selected"<?php } ?>><?php echo $comiis_lang['tip173'];?></option>
                                    <option value="3"<?php if($privacy[$key] == "3") { ?> selected="selected"<?php } ?>><?php echo $comiis_lang['tip174'];?></option>
                                </select>
                            </div>
                            <?php } ?>
                        </div>
                        <?php } ?>
<?php echo $value['title'];?><?php if($value['required']) { ?><span class="f_g">*</span><?php } ?>
</li>
<?php } ?>				
<?php if($value['available']) { ?>
                    <?php if($value['formtype'] == 'file') { ?>
                    <li class="comiis_stylitit bg_e b_b f_c cl">
                        <?php if($_G['comiis_new'] > 2) { ?>
                        <div class="y" style="margin-top:-5px;margin-left:10px;">
                            <?php if($vid) { ?>
                            <input type="hidden" name="privacy[<?php echo $key;?>]" value="3" />
                            <?php } else { ?>
                            <div class="comiis_login_select bg_f b_ok f12" style="padding:0 5px;border-radius:2px">
                                <span class="inner">
                                    <i class="comiis_font f_d">&#xe620</i>
                                    <span class="z">
                                        <span class="comiis_question f_c f12" id="comiis_info<?php echo $key;?>_name" style="padding-right:5px;"><?php echo $comiis_lang['tip172'];?></span>
                                    </span>					
                                </span>
                                <select id="comiis_info<?php echo $key;?>" name="privacy[<?php echo $key;?>]">
                                    <option value="0"<?php if($privacy[$key] == "0") { ?> selected="selected"<?php } ?>><?php echo $comiis_lang['tip172'];?></option>
                                    <option value="1"<?php if($privacy[$key] == "1") { ?> selected="selected"<?php } ?>><?php echo $comiis_lang['tip173'];?></option>
                                    <option value="3"<?php if($privacy[$key] == "3") { ?> selected="selected"<?php } ?>><?php echo $comiis_lang['tip174'];?></option>
                                </select>
                            </div>
                            <?php } ?>
                        </div>
                        <?php } ?>
                        <?php echo $comiis_lang['tip308'];?>
                    </li>
                    <?php } ?>
<li class="comiis_flex<?php if($key == 'birthcity' || $key == 'residecity') { ?> comiis_selectbox<?php } else { ?> comiis_styli<?php } ?> b_b cl" id="comiis_stylibox_<?php echo $key;?>">
<?php if($key != 'interest' && $key != 'bio' && $key != 'birthcity' && $value['formtype'] != 'file' && $key != 'residecity') { ?><div class="styli_tit f_c"><?php echo $value['title'];?><?php if($value['required']) { ?><span class="f_g">*</span><?php } ?></div><?php } if($value['formtype'] == 'file') { ?><div class="styli_tit f_c"><?php echo $value['title'];?><?php if($value['required']) { ?><span class="f_g">*</span><?php } ?></div><?php } if($key == 'birthday') { ?>
<div class="flex">
<input type="text" class="comiis_input kmshow comiis_dateshow_nt" id="comiis_birthday" value="<?php if($space['birthyear']) { ?><?php echo $space['birthyear'];?>-<?php echo sprintf("%02d", $space['birthmonth']);; ?>-<?php echo sprintf("%02d", $space['birthday']);; } ?>" comiis_change="comiis_dateset" readonly="readonly">
<input type="hidden" value="<?php echo $space['birthyear'];?>" name="birthyear" id="birthyear" />
<input type="hidden" value="<?php echo $space['birthmonth'];?>" name="birthmonth" id="birthmonth" />
<input type="hidden" value="<?php echo $space['birthday'];?>" name="birthday" id="birthday" />
<script>
function comiis_dateset(date){
var comiis_date = date.split("-");
$('#birthyear').val(parseInt(comiis_date[0]));
$('#birthmonth').val(parseInt(comiis_date[1])); 
$('#birthday').val(parseInt(comiis_date[2])); 
}
</script>
</div>
<?php } else { if($htmls[$key]) { $htmls[$key] = preg_replace_callback("/<label><(.*?)name=\"(.*?)\"(.*?)>(.*?)<\/label>/is", 'comiis_replace_htmls', $htmls[$key]);?><?php } ?>						
<div class="flex<?php if(!$_G['comiis_htmls']) { ?> comiis_vrzstyle<?php } else { ?> comiis_vrzstyle comiis_vrzstyles<?php } ?>"><?php echo str_replace(array('&nbsp;<br />','<input type="file"', '<input type="hidden"', 'class="pf"', 'height:26px;', 'class="d"'), array('','<a class="bg_b b_ok f_c y" href="javascript:;"><i class="comiis_font">&#xe627</i>'.$comiis_lang['post57'].$comiis_lang['view43'].'<input type="file" accept="image/*"', '</a><input type="hidden"', 'class="kmshow"', '', 'class="d f_d"'), $htmls[$key]);; ?></div>
<?php if(strpos($htmls[$key], '<img ') !== false) { ?>
</li>	
<li class="comiis_styli comiis_flex b_b f_c">
<div class="flex f_c"><?php echo $comiis_lang['deletefile'];?></div>
<div class="styli_r">
<input type="checkbox" name="<?php echo $_G['comiis_htmls'];?>" id="deletefile_<?php echo $key;?>" value="yes" class="comiis_checkbox_key">
<label for="deletefile_<?php echo $key;?>" class="wauto"><code class="bg_f b_ok comiis_checkbox comiis_checkbox_close"></code></label>
</div>		
<?php } } if($key != 'interest' && $key != 'bio' &&  $key != 'birthcity' && $key != 'residecity' && $value['formtype'] != 'file') { ?>
                            <?php if($_G['comiis_new'] > 2) { ?>
                            <div class="y" style="margin-left:10px;">
                                <?php if($vid) { ?>
                                <input type="hidden" name="privacy[<?php echo $key;?>]" value="3" />
                                <?php } else { ?>
                                <div class="comiis_login_select bg_f b_ok f12" style="padding:0 5px;border-radius:2px">
                                    <span class="inner">
                                        <i class="comiis_font f_d">&#xe620</i>
                                        <span class="z">
                                            <span class="comiis_question f_c f12" id="comiis_info<?php echo $key;?>_name"><?php echo $comiis_lang['tip172'];?></span>
                                        </span>					
                                    </span>
                                    <select id="comiis_info<?php echo $key;?>" name="privacy[<?php echo $key;?>]">
                                        <option value="0"<?php if($privacy[$key] == "0") { ?> selected="selected"<?php } ?>><?php echo $comiis_lang['tip172'];?></option>
                                        <option value="1"<?php if($privacy[$key] == "1") { ?> selected="selected"<?php } ?>><?php echo $comiis_lang['tip173'];?></option>
                                        <option value="3"<?php if($privacy[$key] == "3") { ?> selected="selected"<?php } ?>><?php echo $comiis_lang['tip174'];?></option>
                                    </select>
                                </div>
                                <?php } ?>
                            </div>
                            <?php } } ?>
</li>
<?php if($key == 'residecity') { ?><li class="styli_h bg_e b_b cl"></li><?php } } } } if($allowcstatus && in_array('customstatus', $allowitems)) { ?>
<li class="comiis_flex comiis_styli b_b cl">
<div class="styli_tit f_c"><?php echo $comiis_lang['tip175'];?></div>
<div class="flex">
<input type="text" value="<?php echo $space['customstatus'];?>" name="customstatus" id="customstatus" class="comiis_input kmshow" />
<div class="f_g" id="showerror_customstatus"></div>
</div>
</li>
<?php } if($_G['group']['maxsigsize'] && in_array('sightml', $allowitems)) { ?>
<li class="comiis_stylitit bg_e b_b f_c cl"><?php echo $comiis_lang['tip176'];?></li>
<li class="comiis_styli b_b cl">
<textarea name="sightml" id="sightmlmessage" class="comiis_pxs"><?php echo $space['sightml'];?></textarea>
</li>
<?php } if($operation == 'contact') { ?>
<li class="comiis_flex comiis_styli b_b cl">
<div class="styli_tit f_c">Email</div><div class="flex"><?php echo $space['email'];?></div><div class="y"><a href="home.php?mod=spacecp&amp;ac=profile&amp;op=password&amp;from=contact#contact" class="f_a"><i class="comiis_font">&#xe62d</i> <?php echo $comiis_lang['tip177'];?></a></div>
</li>
<?php } if($operation == 'plugin') { include(template($_GET['id']));?><?php } ?>
</div>
<?php if($showbtn) { ?>				
<div class="comiis_btnbox cl">
<input type="hidden" name="profilesubmit" value="true" />
<button type="submit" name="profilesubmitbtn" id="profilesubmitbtn" value="true" class="comiis_btn bg_c f_f" onclick="popup.open('<img src=\'<?php echo IMGDIR;?>/imageloading.gif\' class=\'comiis_loading\'>');" /><?php echo $comiis_lang['tip178'];?></button>
<span id="submit_result" class="rq"></span>
</div>
<?php } ?>
</form>
<script type="text/javascript">
var warning_time;
function show_error(fieldid, extrainfo) {
clearTimeout(warning_time);
$('.comiis_crezz li').removeClass('comiis_list_tip');
$('#comiis_stylibox_'+fieldid).addClass('comiis_list_tip').focus();
warning_time = setTimeout(function() {
$('#comiis_stylibox_'+fieldid).removeClass('comiis_list_tip');
}, 3000);
popup.open("<?php echo $comiis_lang['tip179'];?> " + extrainfo, 'alert');
}
function show_success(message) {
message = message == '' ? '<?php echo $comiis_lang['tip180'];?>' : message;
popup.open(message, 'alert');
setTimeout(function() {
location.reload();
}, 2000);
}

function showdistrict(container, elems, totallevel, changelevel, containertype) {
var getdid = function(elem) {
var op = elem.options[elem.selectedIndex];
return op['did'] || op.getAttribute('did') || '0';
};
var pid = changelevel >= 1 && elems[0] && $(elems[0]) ? getdid(document.getElementById(elems[0])) : 0;
var cid = changelevel >= 2 && elems[1] && $(elems[1]) ? getdid(document.getElementById(elems[1])) : 0;
var did = changelevel >= 3 && elems[2] && $(elems[2]) ? getdid(document.getElementById(elems[2])) : 0;
var coid = changelevel >= 4 && elems[3] && $(elems[3]) ? getdid(document.getElementById(elems[3])) : 0;
var url = 'home.php?mod=misc&ac=ajax&op=district&container='+container+'&containertype='+containertype
+'&province='+elems[0]+'&city='+elems[1]+'&district='+elems[2]+'&community='+elems[3]
+'&pid='+pid + '&cid='+cid+'&did='+did+'&coid='+coid+'&level='+totallevel+'&handlekey='+container+'&inajax=1'+(!changelevel ? '&showdefault=1' : '');
$.ajax({
type : 'GET',
url : url,
dataType : 'xml'
}).success(function(s) {
var rehtml = s.lastChild.firstChild.nodeValue;
rehtml = rehtml.replace('<select name="'+elems[0]+'"', '<div class="comiis_login_select comiis_styli"><span class="inner"><i class="comiis_font f_d">&#xe60c</i><span class="z"><span class="'+elems[0]+'_text"></span></span></span><select name="'+elems[0]+'"');
rehtml = rehtml.replace('<select name="'+elems[1]+'"', '<div class="comiis_login_select comiis_selectli b_t"><span class="inner"><i class="comiis_font f_d">&#xe60c</i><span class="z"><span class="'+elems[1]+'_text"></span></span></span><select name="'+elems[1]+'"');
rehtml = rehtml.replace('<select name="'+elems[2]+'"', '<div class="comiis_login_select comiis_selectli b_t"><span class="inner"><i class="comiis_font f_d">&#xe60c</i><span class="z"><span class="'+elems[2]+'_text"></span></span></span><select name="'+elems[2]+'"');
rehtml = rehtml.replace('<select name="'+elems[3]+'"', '<div class="comiis_login_select comiis_selectli b_t"><span class="inner"><i class="comiis_font f_d">&#xe60c</i><span class="z"><span class="'+elems[3]+'_text"></span></span></span><select name="'+elems[3]+'"');
rehtml = rehtml.replace(/&nbsp;/g, ''); /* &nbsp; */
rehtml = rehtml.replace(/<\/select>/g, '</select></div>');
$('#'+container).html(rehtml);
$('.'+elems[0]+'_text').text($('#'+elems[0]).find('option:selected').text());
$('.'+elems[1]+'_text').text($('#'+elems[1]).find('option:selected').text());
$('.'+elems[2]+'_text').text($('#'+elems[2]).find('option:selected').text());
$('.'+elems[3]+'_text').text($('#'+elems[3]).find('option:selected').text());
});
}
</script>