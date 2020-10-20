<?php
//Discuz! cache file, DO NOT modify me!
//Created: Sep 29, 2018, 17:44
//Identify: 903cae23f3b4a838507454c32fef5d10

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
?>
<div class="comiis_mood_go bg_f b_b">
<a href="javascript:<?php if($_G['uid']) { ?>popup.open($('#comiis_doingmore'));<?php } elseif(!$_G['connectguest']) { ?>javascript:popup.open('<?php echo $comiis_lang['tip16'];?>', 'confirm', 'member.php?mod=logging&action=login');<?php } else { ?>javascript:popup.open('<?php echo $comiis_lang['reg23'];?>', 'confirm', 'member.php?mod=connect');<?php } ?>" class="bg_h"><i class="comiis_font yico f_c">&#xe62e</i><i class="comiis_font f_c">&#xe655</i> <span class="f_c"><?php echo $comiis_lang['tip17'];?></span></a>
</div>
<?php if($_G['uid']) { ?>
<div id="comiis_doingmore" style="display:none;">
<div class="comiis_gosx_title bg_e b_b cl"><span class="y"><i class="comiis_font f_d" onclick="popup.close();">&#xe639</i></span><span class="f_c"><?php echo $comiis_lang['post24'];?><?php echo $comiis_lang['all56'];?><span></div>
<div class="bg_f">
<form method="post" autocomplete="off" id="mood_addform" action="home.php?mod=spacecp&amp;ac=doing&amp;view=<?php echo $_GET['view'];?>&amp;spacenote=1">
<input type="hidden" name="addsubmit" value="true" />
<input type="hidden" name="refer" value="<?php echo $theurl;?>" />
<input type="hidden" name="topicid" value="<?php echo $topicid;?>" />
<input type="hidden" name="formhash" value="<?php echo FORMHASH;?>" />
<div class="comiis_mood_top comiis_input_style comiis_flex">			
<a href="home.php?mod=space&amp;uid=<?php echo $_G['uid'];?>&amp;do=profile&amp;mycenter=1" class="mood_user f14 f_ok"><?php echo avatar($_G[uid],middle);?><?php echo $_G['member']['username'];?></a>			
<?php if($_G['group']['maxsigsize']) { ?>
<div class="mood_tosign flex">
<input type="checkbox" name="to_signhtml" id="-comiis_htmlid-to_sign" value="1" class="comiis_checkbox_key" />
<label for="-comiis_htmlid-to_sign" class="y"><code class="bg_f b_ok comiis_checkbox comiis_checkbox_close"></code></label>
<span class="f_d y"><?php echo $comiis_lang['tip148'];?></span>
</div>
<?php } ?>
</div>
<div class="comiis_mood_inputbox bg_e cl">
<div class="comiis_mood_input cl">
<textarea name="message" class="comiis_pt message" placeholder="<?php echo $comiis_lang['tip9'];?>, <?php echo $comiis_lang['tip10'];?>" onkeyup="strLenCalc(this, 'maxlimit')"></textarea>
<div id="comiis_mood_face" class="comiis_mood_face b_t cl"></div>
</div>
</div>
<div class="comiis_mood_btn b_b cl">
<button type="submit" name="add" class="formdialog comiis_sendbtn bg_c f_f y" comiis='handle'><?php echo $comiis_lang['post24'];?></button>
<span class="f_d"><?php echo $comiis_lang['doing_maxlimit_char'];?></span>
</div>
</form>
</div>
</div>
<script>
function succeedhandle_mood_addform(a, b, c){
popup.open(b, 'alert');
setTimeout(function() {
location.reload();
}, '1000');
}
function errorhandle_mood_addform(a, b){
popup.open(a, 'alert');
}
var comiis_smilies_array = [];
var comiis_portal_smiley = '<div class="comiis_facebox"><ul>';
for(i=1; i<31; i++) {
comiis_portal_smiley += '<li><a href="javascript:;" onclick="insertsmiley(\''+i+'\');"><img src="' + parent.STATICURL + 'image/smiley/comcom/'+i+'.gif" class="vm" /></a></li>';
if (typeof comiis_smilies_array[('[em:'+i+':]').length] != 'object') {
comiis_smilies_array[('[em:'+i+':]').length] = new Array();
}
comiis_smilies_array[('[em:'+i+':]').length].push('[em:'+i+':]')
}
comiis_smilies_array.reverse();
comiis_portal_smiley += '</ul></div>';
$('.comiis_mood_face').html(comiis_portal_smiley);
function insertsmiley(a){
$('.message:last').comiis_insert('[em:'+a+':]');
}
$(document).on('keydown', '.message:last', function() {
if(event.keyCode == "8") {
return $('.message:last').comiis_delete();
}
});
function strLenCalc(obj, checklen, maxlen) {
    var v = obj.value
      , charlen = 0
      , maxlen = !maxlen ? 200 : maxlen
      , curlen = maxlen
      , len = strlen(v);
    for (var i = 0; i < v.length; i++) {
        if (v.charCodeAt(i) < 0 || v.charCodeAt(i) > 255) {
            curlen -= charset == 'utf-8' ? 2 : 1;
        }
    }
    if (curlen >= len) {
        $('.'+checklen).text(curlen - len);
    } else {
$('.'+checklen).text(0);
        obj.value = mb_cutstr(v, maxlen, 0);
    }
}
function strlen(str) {
    return str.length;
}
function mb_cutstr(str, maxlen, dot) {
    var len = 0;
    var ret = '';
    var dot = !dot ? '...' : dot;
    maxlen = maxlen - dot.length;
    for (var i = 0; i < str.length; i++) {
        len += str.charCodeAt(i) < 0 || str.charCodeAt(i) > 255 ? (charset == 'utf-8' ? 3 : 2) : 1;
        if (len > maxlen) {
            ret += dot;
            break;
        }
        ret += str.substr(i, 1);
    }
    return ret;
}
</script>
<?php } ?>