<?php
//Discuz! cache file, DO NOT modify me!
//Created: Sep 29, 2018, 17:22
//Identify: 43bc07457481250503a17e786782a059

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
?>
<?php if($_G['comiis_new'] <= 1) { ?>
<div class="comiis_post_ico<?php if($_GET['action'] != 'edit' && ($secqaacheck || $seccodecheck)) { ?> bg_e<?php } else { ?> bg_f<?php } ?> b_t b_b f_d cl">		
<a href="javascript:;"><i class="comiis_font">&#xe62e</i></a>
<?php if($_GET['action'] == 'newthread' || $_GET['action'] == 'edit' && $isfirstpost) { if(($_GET['action'] == 'newthread' && $_G['group']['allowpostrushreply'] && $special != 2) || ($_GET['action'] == 'edit' && getstatus($thread['status'], 3))) { ?>
<a href="javascript:;"><i class="comiis_font">&#xe618</i></a>
<?php } } if($_GET['action'] == 'newthread' || $_GET['action'] == 'edit' && $isfirstpost) { ?><a href="javascript:;" class="comiis_tagtitle<?php if($postinfo['tag']) { ?> comiis_tag<?php } ?>"><i class="comiis_font">&#xe62c</i></a><?php } ?>
<a href="javascript:;"><i class="comiis_font">&#xe619</i></a>		
<?php if($comiis_app_switch['comiis_post_gaoji'] == 1 || ($_G['uid'] && (getstatus($_G['member']['allowadmincp'], 1) || $_G['group']['radminid'] > 1))) { ?>
<div class="comiis_gjsz bg_f f_c"><a href="javascript:comiis_fmenu('#comiis_postmore');"><i class="comiis_font">&#xe612</i><?php echo $comiis_lang['post43'];?></a></div>
<?php } ?>		
</div>
<div id="comiis_post_tab">
<div class="comiis_bqbox bg_f b_b cl" style="display:none;">
            <?php if($comiis_app_switch['comiis_post_icotxt'] != 1) { ?>
<div class="comiis_smiley_box">
<div class="swiper-wrapper bqbox_c comiis_optimization"></div>
<div class="bqbox_b cl"></div>
</div>
<div class="bqbox_t bg_e comiis_icotxt cl">
<ul id="comiis_smilies_key"></ul>
</div>
<?php } else { ?>
<div class="bqbox_t bg_e cl">
<ul id="comiis_smilies_key"></ul>
</div>
<div class="comiis_smiley_box">
<div class="swiper-wrapper bqbox_c comiis_optimization"></div>
<div class="bqbox_b cl"></div>
</div>
<?php } ?>
</div>
<?php if($comiis_app_switch['comiis_post_qianglou'] != 1) { ?>
            <?php if($_GET['action'] == 'newthread' || $_GET['action'] == 'edit' && $isfirstpost) { ?>
                <?php if(($_GET['action'] == 'newthread' && $_G['group']['allowpostrushreply'] && $special != 2) || ($_GET['action'] == 'edit' && getstatus($thread['status'], 3))) { ?>
                <div class="bg_f b_b comiis_input_style cl" style="display:none;">
                    <ul>
                        <li class="comiis_styli_m f14 comiis_flex b_b">
                            <div class="flex"><?php echo $comiis_lang['post35'];?><?php echo $comiis_lang['rushreply_thread'];?></div>
                            <div class="styli_r">
                                <input type="checkbox" name="rushreply" id="rushreply" value="1" <?php if($_GET['action'] == 'edit' && getstatus($thread['status'], 3)) { ?>disabled="disabled" checked="checked"<?php } ?> class="comiis_checkbox_key" />
                                <label for="rushreply" class="wauto"><code class="bg_f b_ok comiis_checkbox comiis_checkbox_close"></code></label>
                            </div>
                        </li>
                        <li class="comiis_styli_m f14 comiis_flex" style="padding-bottom:2px;">
                            <div class="styli_tit"><?php echo $comiis_lang['rushreply_time'];?></div>
                            <div class="flex"><input type="text" name="rushreplyfrom" id="rushreplyfrom" autocomplete="off" value="<?php echo $postinfo['rush']['starttimefrom'];?>" class="comiis_dateshow comiis_input b_b kmshow f_c" style="padding:4px 0;font-size:12px;" /></div>
                            <div class="f_c">  ~  </div>
                            <div class="flex"><input type="text" autocomplete="off" id="rushreplyto" name="rushreplyto" value="<?php echo $postinfo['rush']['starttimeto'];?>" class="comiis_dateshow comiis_input b_b kmshow f_c" style="padding:4px 0;font-size:12px;" /></div>
                        </li>
                        <li class="comiis_styli_m f14 comiis_flex b_b">
                            <div class="styli_tit"><?php echo $comiis_lang['rushreply_rewardfloor'];?></div>
                            <div class="flex"><input type="text" name="rewardfloor" id="rewardfloor" value="<?php echo $postinfo['rush']['rewardfloor'];?>" class="comiis_input kmshow f_c" placeholder="<?php echo $comiis_lang['post33'];?>" /></div>
                        </li>
                        <li class="comiis_styli_m f14 comiis_flex b_b">
                            <div class="styli_tit"><?php echo $comiis_lang['stopfloor'];?>:</div>
                            <div class="flex"><input type="text" name="replylimit" id="replylimit" autocomplete="off" value="<?php echo $postinfo['rush']['replylimit'];?>" class="comiis_input kmshow f_c" placeholder="<?php echo $comiis_lang['replylimit'];?>" /></div>
                        </li>
                        <li class="comiis_styli_m f14 comiis_flex b_b">
                            <div class="styli_tit"><?php echo $comiis_lang['rushreply_end'];?></div>
                            <div class="flex"><input type="text" name="stopfloor" id="stopfloor" autocomplete="off" value="<?php echo $postinfo['rush']['stopfloor'];?>" class="comiis_input kmshow f_c" /></div>
                        </li>
                        <li class="comiis_styli_m f14 comiis_flex">
                            <div class="styli_tit"><?php if($_G['setting']['creditstransextra']['11']) { ?><?php echo $_G['setting']['extcredits'][$_G['setting']['creditstransextra']['11']]['title'];?><?php } else { ?><?php echo $comiis_lang['credits'];?><?php } ?><?php echo $comiis_lang['min_limit'];?>:</div>
                            <div class="flex"><input type="text" name="creditlimit" id="creditlimit" autocomplete="off" value="<?php echo $postinfo['rush']['creditlimit'];?>" class="comiis_input kmshow f_c" placeholder="<?php if($_G['setting']['creditstransextra']['11']) { ?>(<?php echo $_G['setting']['extcredits'][$_G['setting']['creditstransextra']['11']]['title'];?>)<?php } else { ?><?php echo $comiis_lang['total_credits'];?><?php echo $comiis_lang['post34'];?><?php } ?>" /></div>
                        </li>
                    </ul>
                </div>
                <?php } ?>
            <?php } } if($comiis_app_switch['comiis_post_tag'] != 1) { ?>
            <?php if($_GET['action'] == 'newthread' || $_GET['action'] == 'edit' && $isfirstpost) { ?>
            <div class="comiis_tagbox bg_f b_b cl" style="display:none;">
                <table cellspacing="0" cellpadding="0" class="tagbox">
                    <tr>
                        <td><input type="text" class="comiis_px b_b" id="tags" name="tags" value="<?php echo $postinfo['tag'];?>" placeholder="<?php echo $comiis_lang['post1'];?>" /></td>
                        <th><a href="javascript:;" class="comiis_get_tag bg_0 f_f"><?php echo $comiis_lang['auto_keyword'];?></a></th>
                    </tr>
                </table>
                <p class="f_d cl"><?php echo $comiis_lang['posttag_comment'];?></p>
            </div>
            <?php } } if($comiis_app_switch['comiis_post_atpy'] != 1) { ?>
<div class="comiis_tagbox bg_f b_b cl" style="display:none;">
<table cellspacing="0" cellpadding="0" class="tagbox">
<tr>
<td><input type="text" id="atkeyword" value="" placeholder="<?php echo $comiis_lang['inputyourname'];?>" class="comiis_px b_b" /></td>
<th><a href="javascript:;" onclick="comiis_addsmilies('@' + $('#atkeyword').val() + ' ');" class="comiis_get_tag bg_0 f_f">@<?php echo $comiis_lang['add'];?></a></th>
</tr>
</table>
<p class="f_d cl">@<?php echo $comiis_lang['tip12'];?></p>
</div>
<?php } ?>
</div>
<?php } else { ?>
<div class="comiis_post_ico<?php if($comiis_app_switch['comiis_post_icotxt'] != 1) { ?> comiis_minipost_icot bg_e<?php } else { ?> comiis_minipost_ico bg_f<?php } if($_GET['action'] != 'edit' && ($secqaacheck || $seccodecheck)) { ?> bg_e<?php } ?> b_t b_b f_d cl">
<div id="comiis_mh_sub">
<div class="swiper-wrapper comiis_post_ico">
<a href="javascript:;" class="swiper-slide"><i class="comiis_font">&#xe62e<em><?php echo $comiis_lang['tip260'];?></em></i></a>
                <?php if(!empty($_G['setting']['pluginhooks']['global_comiis_video_box'])) { ?>
                <a href="javascript:;" class="swiper-slide"><i class="comiis_font">&#xe6d8<em><?php echo $comiis_lang['post60'];?></em></i></a>
                <?php } if($comiis_app_switch['comiis_post_qianglou'] != 1 || ($_G['uid'] && (getstatus($_G['member']['allowadmincp'], 1) || $_G['group']['radminid'] > 1))) { ?>
                    <?php if($_GET['action'] == 'newthread' || $_GET['action'] == 'edit' && $isfirstpost) { ?>
                        <?php if(($_GET['action'] == 'newthread' && $_G['group']['allowpostrushreply'] && $special != 2) || ($_GET['action'] == 'edit' && getstatus($thread['status'], 3))) { ?>
                            <a href="javascript:;" class="swiper-slide"><i class="comiis_font">&#xe618<em><?php echo $comiis_lang['rushreply'];?></em></i></a>
                        <?php } ?>
                    <?php } ?>
                <?php } ?>
                <?php if($_G['group']['allowposttag']) { ?>
                    <?php if($comiis_app_switch['comiis_post_tag'] != 1 || ($_G['uid'] && (getstatus($_G['member']['allowadmincp'], 1) || $_G['group']['radminid'] > 1))) { ?>
                        <?php if($_GET['action'] == 'newthread' || $_GET['action'] == 'edit' && $isfirstpost) { ?><a href="javascript:;" class="swiper-slide comiis_tagtitle<?php if($postinfo['tag']) { ?> comiis_tag<?php } ?>"><i class="comiis_font">&#xe62c<em><?php echo $comiis_lang['view54'];?></em></i></a><?php } ?>
                    <?php } ?>
                <?php } ?>
                <?php if($comiis_app_switch['comiis_post_atpy'] != 1 || ($_G['uid'] && (getstatus($_G['member']['allowadmincp'], 1) || $_G['group']['radminid'] > 1))) { ?><a href="javascript:;" class="swiper-slide"><i class="comiis_font">&#xe619<em><?php echo $comiis_lang['tip261'];?></em></i></a><?php } ?>
                <?php if($comiis_app_switch['comiis_post_url'] != 1 || ($_G['uid'] && (getstatus($_G['member']['allowadmincp'], 1) || $_G['group']['radminid'] > 1))) { ?>
                <a href="javascript:;" class="swiper-slide"><i class="comiis_font">&#xe632<em><?php echo $comiis_lang['post61'];?></em></i></a>
                <?php } ?>
                <?php if($_G['group']['allowpostattach'] && ($comiis_app_switch['comiis_post_att'] != 1 || ($_G['uid'] && (getstatus($_G['member']['allowadmincp'], 1) || $_G['group']['radminid'] > 1)))) { ?><a href="javascript:;" class="swiper-slide<?php if(count($attachs['used'])) { ?> comiis_tag<?php } ?>"><i class="comiis_font">&#xe781<em><?php echo $comiis_lang['attachment'];?></em></i></a><?php } ?>
                <?php if($comiis_app_switch['comiis_post_gaoji'] != 1 || ($_G['uid'] && (getstatus($_G['member']['allowadmincp'], 1) || $_G['group']['radminid'] > 1))) { ?>
                <a href="javascript:;" class="swiper-slide"><i class="comiis_font">&#xe612<em><?php echo $comiis_lang['post43'];?></em></i></a>
                <?php } ?>
</div>
</div>
</div>
<div id="comiis_post_tab">
<div class="comiis_bqbox bg_f b_b cl" style="display:none;">
            <?php if($comiis_app_switch['comiis_post_icotxt'] != 1) { ?>
<div class="comiis_smiley_box">
<div class="swiper-wrapper bqbox_c comiis_optimization"></div>
<div class="bqbox_b cl"></div>
</div>
<div class="bqbox_t bg_e comiis_icotxt cl">
<ul id="comiis_smilies_key"></ul>
</div>
<?php } else { ?>
<div class="bqbox_t bg_e cl">
<ul id="comiis_smilies_key"></ul>
</div>
<div class="comiis_smiley_box">
<div class="swiper-wrapper bqbox_c comiis_optimization"></div>
<div class="bqbox_b cl"></div>
</div>
<?php } ?>
</div>
<?php if(!empty($_G['setting']['pluginhooks']['global_comiis_video_box'])) { ?>
<div class="bg_f cl" style="display:none;">
            <?php if(!empty($_G['setting']['pluginhooks']['global_comiis_video_box'])) echo $_G['setting']['pluginhooks']['global_comiis_video_box'];?>
</div>
<?php } if($comiis_app_switch['comiis_post_qianglou'] != 1 || ($_G['uid'] && (getstatus($_G['member']['allowadmincp'], 1) || $_G['group']['radminid'] > 1))) { ?>
            <?php if($_GET['action'] == 'newthread' || $_GET['action'] == 'edit' && $isfirstpost) { ?>
                <?php if(($_GET['action'] == 'newthread' && $_G['group']['allowpostrushreply'] && $special != 2) || ($_GET['action'] == 'edit' && getstatus($thread['status'], 3))) { ?>
                <div class="bg_f b_b comiis_input_style cl" style="display:none;">
                    <ul>
                        <li class="comiis_styli_m f14 comiis_flex b_b">
                            <div class="flex"><?php echo $comiis_lang['post35'];?><?php echo $comiis_lang['rushreply_thread'];?></div>
                            <div class="styli_r">
                                <input type="checkbox" name="rushreply" id="rushreply" value="1" <?php if($_GET['action'] == 'edit' && getstatus($thread['status'], 3)) { ?>disabled="disabled" checked="checked"<?php } ?> class="comiis_checkbox_key" />
                                <label for="rushreply" class="wauto"><code class="bg_f b_ok comiis_checkbox comiis_checkbox_close"></code></label>
                            </div>
                        </li>
                        <li class="comiis_styli_m f14 comiis_flex" style="padding-bottom:2px;">
                            <div class="styli_tit"><?php echo $comiis_lang['rushreply_time'];?></div>
                            <div class="flex"><input type="text" name="rushreplyfrom" id="rushreplyfrom" autocomplete="off" value="<?php echo $postinfo['rush']['starttimefrom'];?>" class="comiis_dateshow comiis_input b_b kmshow f_c" style="padding:4px 0;font-size:12px;" /></div>
                            <div class="f_c">  ~  </div>
                            <div class="flex"><input type="text" autocomplete="off" id="rushreplyto" name="rushreplyto" value="<?php echo $postinfo['rush']['starttimeto'];?>" class="comiis_dateshow comiis_input b_b kmshow f_c" style="padding:4px 0;font-size:12px;" /></div>
                        </li>
                        <li class="comiis_styli_m f14 comiis_flex b_b">
                            <div class="styli_tit"><?php echo $comiis_lang['rushreply_rewardfloor'];?></div>
                            <div class="flex"><input type="text" name="rewardfloor" id="rewardfloor" value="<?php echo $postinfo['rush']['rewardfloor'];?>" class="comiis_input kmshow f_c" placeholder="<?php echo $comiis_lang['post33'];?>" /></div>
                        </li>
                        <li class="comiis_styli_m f14 comiis_flex b_b">
                            <div class="styli_tit"><?php echo $comiis_lang['stopfloor'];?>:</div>
                            <div class="flex"><input type="text" name="replylimit" id="replylimit" autocomplete="off" value="<?php echo $postinfo['rush']['replylimit'];?>" class="comiis_input kmshow f_c" placeholder="<?php echo $comiis_lang['replylimit'];?>" /></div>
                        </li>
                        <li class="comiis_styli_m f14 comiis_flex b_b">
                            <div class="styli_tit"><?php echo $comiis_lang['rushreply_end'];?></div>
                            <div class="flex"><input type="text" name="stopfloor" id="stopfloor" autocomplete="off" value="<?php echo $postinfo['rush']['stopfloor'];?>" class="comiis_input kmshow f_c" /></div>
                        </li>
                        <li class="comiis_styli_m f14 comiis_flex">
                            <div class="styli_tit"><?php if($_G['setting']['creditstransextra']['11']) { ?><?php echo $_G['setting']['extcredits'][$_G['setting']['creditstransextra']['11']]['title'];?><?php } else { ?><?php echo $comiis_lang['credits'];?><?php } ?><?php echo $comiis_lang['min_limit'];?>:</div>
                            <div class="flex"><input type="text" name="creditlimit" id="creditlimit" autocomplete="off" value="<?php echo $postinfo['rush']['creditlimit'];?>" class="comiis_input kmshow f_c" placeholder="<?php if($_G['setting']['creditstransextra']['11']) { ?>(<?php echo $_G['setting']['extcredits'][$_G['setting']['creditstransextra']['11']]['title'];?>)<?php } else { ?><?php echo $comiis_lang['total_credits'];?><?php echo $comiis_lang['post34'];?><?php } ?>" /></div>
                        </li>
                    </ul>
                </div>
                <?php } ?>
            <?php } } if($_G['group']['allowposttag']) { ?>
            <?php if($comiis_app_switch['comiis_post_tag'] != 1 || ($_G['uid'] && (getstatus($_G['member']['allowadmincp'], 1) || $_G['group']['radminid'] > 1))) { ?>
                <?php if($_GET['action'] == 'newthread' || $_GET['action'] == 'edit' && $isfirstpost) { ?>
                <div class="bg_f b_b cl" style="display:none;">
                    <div class="comiis_styli_m f14 comiis_flex b_b">
                        <div class="flex"><input type="text" id="tags" name="tags" value="<?php echo $postinfo['tag'];?>" placeholder="<?php echo $comiis_lang['post1'];?>" class="comiis_input kmshow f_c" /></div>
                        <div class="styli_r"><a href="javascript:;" class="comiis_sendbtn comiis_get_tag bg_0 f_f" style="display:block;"><?php echo $comiis_lang['auto_keyword'];?></a></div>
                    </div>
                    <div class="comiis_styli_m f_a"><?php echo $comiis_lang['posttag_comment'];?></div>
                </div>
                <?php } ?>
            <?php } } if($comiis_app_switch['comiis_post_atpy'] != 1 || ($_G['uid'] && (getstatus($_G['member']['allowadmincp'], 1) || $_G['group']['radminid'] > 1))) { ?>
<div class="bg_f b_b cl" style="display:none;">
            <div class="comiis_styli_m f14 comiis_flex b_b">
                <div class="flex"><input type="text" id="atkeyword" value="" placeholder="<?php echo $comiis_lang['inputyourname'];?>" class="comiis_input kmshow f_c" onkeyup="comiis_atFilter(this.value);" /></div>
                <div class="styli_r"><a href="javascript:;" onclick="comiis_addsmilies('@' + $('#atkeyword').val() + ' ');" class="comiis_sendbtn bg_0 f_f" style="display:block;">@<?php echo $comiis_lang['add'];?></a></div>
            </div>
            <?php if($_G['comiis_new'] > 2) { ?><div class="comiis_atlist cl"></div><?php } ?>
            <div class="comiis_styli_m f_a">@<?php echo $comiis_lang['tip12'];?></div>
</div>
<script>
var atKeywords = null, atResult = [];
function comiis_atFilter(k){
atResult = [];
comiis_atSearch(k);
var newlist = '';
if(atResult.length) {
$('.comiis_atlist').show();
for(i in atResult) {
newlist += '<li class="bg_e b_ok"><a href="javascript:;" id="atli_'+i+'" onclick="comiis_addsmilies(this.innerText + \' \')">@' + atResult[i] + '</a></li>';
}
$('.comiis_atlist').html('<ul>' + newlist + '</ul>');
} else {
$('.comiis_atlist').hide();
}
}
function comiis_atSearch(kw){
if(atKeywords === null) {
atKeywords = '';
$.ajax({
type:'GET',
url:'misc.php?mod=getatuser&inajax=1',
dataType:'xml',
}).success(function(s) {
if(s.lastChild.firstChild.nodeValue.length){
atKeywords = s.lastChild.firstChild.nodeValue.split(',');
comiis_atFilter(kw);
}
});
}
var lsi = 0;
for(i in atKeywords) {
if(atKeywords[i].indexOf(kw) !== -1 || kw === '') {
atResult[lsi] = kw !== '' ? atKeywords[i].replace(kw, '<b>' + kw + '</b>') : atKeywords[i];
lsi++;
if(lsi > 10) {
break;
}
}
}
}
comiis_atFilter('');
</script>		
<?php } if($comiis_app_switch['comiis_post_url'] != 1 || ($_G['uid'] && (getstatus($_G['member']['allowadmincp'], 1) || $_G['group']['radminid'] > 1))) { ?>
        <div class="bg_f b_b comiis_input_style cl" style="display:none;">
            <div class="comiis_post_urlico b_b">
                <ul>
                    <li><a href="javascript:;" class="comiis_xifont f_0"><i class="comiis_font">&#xe6ea</i><?php echo $comiis_lang['post85'];?></a></li>
                    <li><a href="javascript:;" class="comiis_xifont f_d"><i class="comiis_font">&#xe653</i><?php echo $comiis_lang['post77'];?></a></li>
                    <?php if($_G['forum']['allowmediacode'] && $_G['group']['allowmediacode']) { ?>
                    <li><a href="javascript:;" class="comiis_xifont f_d"><i class="comiis_font">&#xe6de</i>MP3 <?php echo $comiis_lang['post78'];?></a></li>
                    <li><a href="javascript:;" class="comiis_xifont f_d"><i class="comiis_font">&#xe6e1</i><?php echo $comiis_lang['post79'];?></a></li>
                    <li><a href="javascript:;" class="comiis_xifont f_d"><i class="comiis_font">&#xe73d</i>Flash</a></li>
                    <?php } ?>
                    <li><a href="javascript:;" class="comiis_xifont f_d"><i class="comiis_font">&#xe6df</i><?php echo $comiis_lang['post80'];?></a></li>
                    <li><a href="javascript:;" class="comiis_xifont f_d"><i class="comiis_font">&#xe6e3</i><?php echo $comiis_lang['post81'];?></a></li>                    
                    <?php if($isfirstpost) { ?>
                    <li><a href="javascript:;" class="comiis_xifont f_d"><i class="comiis_font">&#xe6ab</i><?php echo $comiis_lang['post82'];?></a></li>
                    <?php if($_G['group']['allowhidecode']) { ?><li><a href="javascript:;" class="comiis_xifont f_d"><i class="comiis_font">&#xe607</i><?php echo $comiis_lang['post83'];?></a></li><?php } } ?>
                </ul>
            </div>
            <div class="styli_h10 bg_e b_b"></div>
            <div id="comiis_post_qydiv">
<ul>
<li>
<div class="comiis_styli_m f14 comiis_flex b_b">
                            <div class="styli_tit"><?php echo $comiis_lang['post87'];?></div>
<div class="flex"><input type="text" id="comiis_input_addurl" value="" placeholder="<?php echo $comiis_lang['reg30'];?><?php echo $comiis_lang['post87'];?>" class="comiis_input kmshow f_c"></div>
</div>
<div class="comiis_styli_m f14 comiis_flex b_b">
<div class="styli_tit"><?php echo $comiis_lang['post86'];?></div>
<div class="flex"><input type="text" id="comiis_input_addurl2" value="" placeholder="<?php echo $comiis_lang['reg30'];?><?php echo $comiis_lang['post86'];?>" class="comiis_input kmshow f_c"></div>
</div>
                        <div class="comiis_styli_m f14 comiis_flex">
                            <div class="styli_tit"><button class="comiis_sendbtn bg_0 f_f" type="button" onclick="comiis_input_data('comiis_input_addurl')"><?php echo $comiis_lang['post61'];?></button></div>
                            <div class="flex"></div>
                        </div>
</li>
<li style="display:none">
<div class="comiis_styli_m f14 comiis_flex">
<div class="flex"><input type="text" id="comiis_input_httpurl" value="" placeholder="<?php echo $comiis_lang['reg30'];?><?php echo $comiis_lang['post62'];?>" class="comiis_input kmshow f_c"></div>
<div class="styli_r"><button class="comiis_sendbtn bg_0 f_f" type="button" onclick="comiis_input_data('comiis_input_httpurl')"><?php echo $comiis_lang['post61'];?></button></div>
</div>
</li>					
<?php if($_G['forum']['allowmediacode'] && $_G['group']['allowmediacode']) { ?>
<li style="display:none">
<div class="comiis_styli_m f14 comiis_flex b_b">
<div class="flex"><input type="text" id="comiis_input_httpmp3" value="" placeholder="<?php echo $comiis_lang['reg30'];?><?php echo $comiis_lang['post63'];?>" class="comiis_input kmshow f_c"></div>
<div class="styli_r"><button class="comiis_sendbtn bg_0 f_f" type="button" onclick="comiis_input_data('comiis_input_httpmp3')"><?php echo $comiis_lang['post61'];?></button></div>
</div>
<div class="comiis_styli_m f_a"><?php echo $comiis_lang['post70'];?></div>
</li>						
<li style="display:none">
<div class="comiis_styli_m f14 comiis_flex b_b">
<div class="flex"><input type="text" id="comiis_input_httpvideo" value="" placeholder="<?php echo $comiis_lang['reg30'];?><?php echo $comiis_lang['post64'];?>" class="comiis_input kmshow f_c"></div>
<div class="styli_r"><button class="comiis_sendbtn bg_0 f_f" type="button" onclick="comiis_input_data('comiis_input_httpvideo')"><?php echo $comiis_lang['post61'];?></button></div>
</div>
<div class="comiis_styli_m f_a"><?php echo $comiis_lang['post71'];?></div>
</li>
<li style="display:none">
<div class="comiis_styli_m f14 comiis_flex b_b">
<div class="flex"><input type="text" id="comiis_input_httpflash" value="" placeholder="<?php echo $comiis_lang['reg30'];?><?php echo $comiis_lang['post65'];?>" class="comiis_input kmshow f_c"></div>
<div class="styli_r"><button class="comiis_sendbtn bg_0 f_f" type="button" onclick="comiis_input_data('comiis_input_httpflash')"><?php echo $comiis_lang['post61'];?></button></div>
</div>
<div class="comiis_styli_m f_a"><?php echo $comiis_lang['post72'];?></div>
</li>
<?php } ?>					
<li style="display:none">
<div class="comiis_styli_m f14" style="padding-top:12px;">
<div class="bg_e comiis_p5"><textarea class="comiis_pt kmshow f_c" id="comiis_input_httpquote" placeholder="<?php echo $comiis_lang['reg30'];?><?php echo $comiis_lang['post66'];?>"></textarea></div>
</div>
<div class="comiis_styli_m f14 comiis_flex" style="padding-top:0;">							
<div class="styli_tit"><button class="comiis_sendbtn bg_0 f_f" type="button" onclick="comiis_input_data('comiis_input_httpquote')"><?php echo $comiis_lang['post61'];?></button></div>
<div class="flex"></div>
</div>
<?php if($secqaacheck || $seccodecheck) { ?><div class="styli_h10 bg_e b_t"></div><?php } ?>
</li>					
<li style="display:none">
<div class="comiis_styli_m f14" style="padding-top:12px;">
<div class="bg_e comiis_p5"><textarea class="comiis_pt kmshow f_c" id="comiis_input_httpcode" placeholder="<?php echo $comiis_lang['reg30'];?><?php echo $comiis_lang['post67'];?>"></textarea></div>
</div>
<div class="comiis_styli_m f14 comiis_flex" style="padding-top:0;">
<div class="styli_tit"><button class="comiis_sendbtn bg_0 f_f" type="button" onclick="comiis_input_data('comiis_input_httpcode')"><?php echo $comiis_lang['post61'];?></button></div>
<div class="flex"></div>
</div>
<?php if($secqaacheck || $seccodecheck) { ?><div class="styli_h10 bg_e b_t"></div><?php } ?>
</li>
<?php if($isfirstpost) { ?>
<li style="display:none">
<div class="comiis_styli_m f14" style="padding-top:12px;">
<div class="bg_e comiis_p5"><textarea class="comiis_pt kmshow f_c" id="comiis_input_httpfree" placeholder="<?php echo $comiis_lang['post68'];?>"></textarea></div>
</div>
                            <div class="comiis_styli_m f14 comiis_flex" style="padding-top:0;">
                                <div class="styli_tit"><button class="comiis_sendbtn bg_0 f_f" type="button" onclick="comiis_input_data('comiis_input_httpfree')"><?php echo $comiis_lang['post61'];?></button></div>
                                <div class="flex"></div>
                            </div>
                            <?php if($secqaacheck || $seccodecheck) { ?><div class="styli_h10 bg_e b_t"></div><?php } ?>
</li>
<?php if($_G['group']['allowhidecode']) { ?>
<li style="display:none">
                                <div class="comiis_styli_m f14" style="padding-top:12px;">
                                    <div class="bg_e comiis_p5"><textarea class="comiis_pt kmshow f_c" id="comiis_input_httphide" placeholder="<?php echo $comiis_lang['reg30'];?><?php echo $comiis_lang['post69'];?>"></textarea></div>
                                </div>
<div class="comiis_styli_m f14 comiis_flex" style="padding-top:0;">								
                                    <div style="margin-right:5px;"><?php echo $comiis_lang['post73'];?></div>
                                    <div class="flex"><input type="text" id="comiis_input_httphide_a" value="" placeholder="<?php echo $comiis_lang['post11'];?>" class="comiis_input kmshow b_b f_c" style="padding:5px 0;"></div>
                                    <div style="margin:0 5px;"><?php echo $comiis_lang['post74'];?></div>
                                    <div class="flex"><input type="text" id="comiis_input_httphide_b" value="" placeholder="<?php echo $comiis_lang['post11'];?>" class="comiis_input kmshow b_b f_c" style="padding:5px 0;"></div>
                                    <div style="margin-left:5px;"><?php echo $comiis_lang['post75'];?></div>
</div>
                                <div class="comiis_styli_m f14 comiis_flex" style="padding-top:0;">                                    
                                    <div class="styli_tit"><button class="comiis_sendbtn bg_0 f_f" type="button" onclick="comiis_input_data('comiis_input_httphide')"><?php echo $comiis_lang['post61'];?></button></div>
                                    <div class="flex f_a" style="text-align:right;"><?php echo $comiis_lang['post76'];?></div>
                                </div>
                                <?php if($secqaacheck || $seccodecheck) { ?><div class="styli_h10 bg_e b_t"></div><?php } ?>
<li>
<?php } } ?>
</ul>
            </div>
</div>
<script>
function comiis_input_data(a) {
var b = $('#'+a).val();
if(b == ''){
popup.open('<?php echo $comiis_lang['post84'];?>', 'alert');
}else{
if(a == 'comiis_input_httpurl'){
comiis_addsmilies('[img]'+b+'[/img]');
}else if(a == 'comiis_input_addurl'){
var c = $('#'+a+'2').val();
comiis_addsmilies('[url='+b+']'+(c ? c : b)+'[/url]');
}else if(a == 'comiis_input_httpmp3'){
comiis_addsmilies('[audio]'+b+'[/audio]');
}else if(a == 'comiis_input_httpvideo'){
comiis_addsmilies('[media=x,500,375]'+b+'[/media]');
}else if(a == 'comiis_input_httpflash'){
comiis_addsmilies('[flash]'+b+'[/flash]');
}else if(a == 'comiis_input_httpquote'){
comiis_addsmilies('[quote]'+b+'[/quote]');
}else if(a == 'comiis_input_httpcode'){
comiis_addsmilies('[code]'+b+'[/code]');					
}else if(a == 'comiis_input_httpfree'){
comiis_addsmilies('[free]'+b+'[/free]');					
}else if(a == 'comiis_input_httphide'){
var c = $('#'+a+'_a').val();
var d = $('#'+a+'_b').val();
comiis_addsmilies('[hide'+((c != '' || d != '') ? '=' : '')+(d ? 'd'+d : '') +((c != '' && d != '') ? ',' : '')+c+']'+b+'[/hide]');
}
}
}
$('.comiis_post_urlico ul li').on('click', function() {
$('.comiis_post_urlico ul li a').removeClass('f_d f_0').addClass("f_d");
$(this).find('a').removeClass('f_d').addClass("f_0");
$("#comiis_post_qydiv ul li").hide().eq($(this).index()).fadeIn();
});
</script>
<?php } if($comiis_app_switch['comiis_post_att'] != 1 || ($_G['uid'] && (getstatus($_G['member']['allowadmincp'], 1) || $_G['group']['radminid'] > 1))) { ?>
<div class="bg_f b_b cl" style="display:none;">
                <div class="comiis_upbox_attach bg_f cl">
                    <p><?php if($_G['group']['maxattachsize']) { ?><span class="y f_d"><?php echo $comiis_lang['post59'];?> <?php echo $maxattachsize_mb;?></span><?php } ?><a href="javascript:;" class="kmbtn bg_0 f_f"><i class="comiis_font">&#xe656</i><?php echo $comiis_lang['post57'];?><?php echo $comiis_lang['post58'];?><input type="file" name="Filedata" id="filedatas" class="kmshow" /></a></p>
                    <ul id="comiis_upattach">
                    <?php if(is_array($attachs['used'])) foreach($attachs['used'] as $temp) { ?>                        <li class="b_t f_c">
                            <span aid="<?php echo $temp['aid'];?>" up="1" class="del kmbtn bg_e f_c"><a href="javascript:;"><i class="comiis_font z">&#xe67f</i></a></span>
                            <span class="kmbtn bg_a f_f" onclick="comiis_addsmilies('[attach]<?php echo $temp['aid'];?>[/attach]')"><?php echo $comiis_lang['tip220'];?></span>
                            <?php echo str_replace('class="vm"', 'class="vm kmimg"', $temp['filetype']);; ?>                            <?php echo $temp['filename'];?>
                            <input type="hidden" name="attachnew[<?php echo $temp['aid'];?>][description]">   
                        </li>
                    <?php } ?>
                    </ul>
                </div>
</div>
<?php } ?>
        <?php if($comiis_app_switch['comiis_post_gaoji'] != 1 || ($_G['uid'] && (getstatus($_G['member']['allowadmincp'], 1) || $_G['group']['radminid'] > 1))) { ?>
<div class="bg_f cl" style="display:none;">
            <div class="comiis_over_box comiis_input_style">
                <ul>
                <?php if($_GET['action'] == 'newthread' || $_GET['action'] == 'edit' && $isfirstpost) { ?>
                    <?php if($_G['group']['allowsetreadperm']) { ?>
                        <li class="comiis_styli comiis_flex b_b">
                            <div class="styli_tit f_c"><?php echo $comiis_lang['readperm'];?></div>
                            <div class="flex comiis_input_style">
                                <div class="comiis_login_select">
                                    <span class="inner">
                                        <i class="comiis_font f_d">&#xe60c</i>
                                        <span class="z">
                                            <span class="comiis_question" id="readperm_name"></span>
                                        </span>					
                                    </span>
                                    <select name="readperm" id="readperm">
                                        <option value=""><?php echo $comiis_lang['unlimited'];?></option>
                                        <?php if(is_array($_G['cache']['groupreadaccess'])) foreach($_G['cache']['groupreadaccess'] as $val) { ?>                                            <option value="<?php echo $val['readaccess'];?>" title="<?php echo $comiis_lang['readperm'];?>: <?php echo $val['readaccess'];?>"<?php if($thread['readperm'] == $val['readaccess']) { ?> selected="selected"<?php } ?>><?php echo $val['grouptitle'];?></option>
                                        <?php } ?>
                                        <option value="255"<?php if($thread['readperm'] == 255) { ?> selected="selected"<?php } ?>><?php echo $comiis_lang['highest_right'];?></option>
                                    </select>
                                </div>	
                            </div>
                        </li>
                    <?php } ?>	
                <?php } ?>
                <li class="comiis_styli comiis_flex b_b">
                    <div class="styli_tit f_c"><?php echo $comiis_lang['replypassword'];?></div>
                    <div class="flex"><input type="text" id="new_password" class="comiis_input kmshow f_a" placeholder="<?php echo $comiis_lang['reg13'];?>" value="" /> </div>
                    <div class="styli_r"><button onclick="comiis_set_password();" class="comiis_sendbtn bg_0 f_f" type="button"><?php echo $comiis_lang['confirms'];?></button></div>
                </li>
                <?php if($_GET['action'] == 'newthread' || $_GET['action'] == 'edit' && $isfirstpost) { ?>
                    <?php if($_G['group']['maxprice'] && !$special) { ?>
                        <li class="comiis_styli comiis_flex b_b">
                            <div class="styli_tit f_c"><?php echo $comiis_lang['modcp_posts_thread'];?><?php echo $comiis_lang['price'];?></div>
                            <div class="flex"><input type="text" id="price" name="price" class="comiis_input kmshow f_a" placeholder="<?php echo $comiis_lang['post_price_comment'];?>" value="<?php echo $thread['pricedisplay'];?>" /> </div>
                            <div class="styli_r f_c"><?php echo $_G['setting']['extcredits'][$_G['setting']['creditstransextra']['1']]['unit'];?><?php echo $_G['setting']['extcredits'][$_G['setting']['creditstransextra']['1']]['title'];?></div>
                        </li>
                    <?php } ?>			
                    <?php if($_G['group']['allowsetpublishdate'] && ($_GET['action'] == 'newthread' || ($_GET['action'] == 'edit' && $isfirstpost && $thread['displayorder'] == -4))) { ?>
                        <li class="comiis_styli comiis_flex b_b">
                            <div class="styli_tit f_c">
                                <input type="checkbox" name="cronpublish" id="cronpublish" value="true"<?php if($cronpublish) { ?> checked="checked"<?php } ?> />
                                <label for="cronpublish" class="wauto"><i class="comiis_font"></i><?php echo $comiis_lang['post_timer'];?></label>
                            </div>
                            <div class="flex"><input type="text" name="cronpublishdate" id="cronpublishdate" autocomplete="off" value="<?php echo $cronpublishdate;?>" placeholder="<?php echo $comiis_lang['post37'];?><?php echo $comiis_lang['time'];?>" class="comiis_input kmshow comiis_dateshow"></div>
                            <div class="styli_r"><a href="javascript:;" onclick="$('#cronpublishdate').val('');"><i class="comiis_font f_g">&#xe647</i></a></div>
                        </li>
                    <?php } ?>
                    <?php if(!empty($userextcredit)) { ?>
                        <li class="comiis_stylitit b_b bg_e f_c"><?php echo $comiis_lang['replycredit'];?></li>
                        <div id="extra_replycredit_c" class="exfm cl">
                            <div><label><?php echo $comiis_lang['replycredit_once'];?> <input type="text" name="replycredit_extcredits" id="replycredit_extcredits" class="px pxs vm" value="<?php if($replycredit_rule['extcredits'] && $thread['replycredit'] > 0) { ?><?php echo $replycredit_rule['extcredits'];?><?php } else { ?>0<?php } ?>" onkeyup="javascript:getreplycredit();" onblur="extraCheck(0)" /> <?php echo $_G['setting']['extcredits'][$extcreditstype]['unit'];?><?php echo $_G['setting']['extcredits'][$extcreditstype]['title'];?></label><span class="xg1"><?php echo $comiis_lang['replycredit_empty'];?></span> , <label><?php echo $comiis_lang['replycredit_reward'];?> <input type="text" name="replycredit_times" id="replycredit_times" class="px pxs vm" value="<?php if($replycredit_rule['lasttimes']) { ?><?php echo $replycredit_rule['lasttimes'];?><?php } else { ?>1<?php } ?>" onkeyup="javascript:getreplycredit();"  onblur="extraCheck(0)" /> <?php echo $comiis_lang['replycredit_time'];?></label>, <label><?php echo $comiis_lang['replycredit_member'];?> <select id="replycredit_membertimes" name="replycredit_membertimes" class="ps vm">
                            <?php for($i=1;  $i<11;  $i++) {;?>                            <option value="<?php echo $i;?>"<?php if($replycredit_rule['membertimes'] == $i) { ?> selected="selected"<?php } ?>><?php echo $i;?></option>
                            <?php };?>                            </select> <?php echo $comiis_lang['replycredit_time'];?></label>, <label><?php echo $comiis_lang['replycredit_rate'];?> <select id="replycredit_random" name="replycredit_random" class="ps vm">
                             <?php for($i=100;  $i>9;  $i=$i-10) {;?>                            <option value="<?php echo $i;?>"<?php if($replycredit_rule['random'] == $i) { ?> selected="selected"<?php } ?>><?php echo $i;?></option>
                            <?php };?>                            </select> %</label></div>
                            <div class="xg1"><?php echo $comiis_lang['replycredit_total'];?> <span id="replycredit_sum"><?php if($thread['replycredit']) { ?><?php echo $thread['replycredit'];?><?php } else { ?>0<?php } ?></span> <?php echo $_G['setting']['extcredits'][$extcreditstype]['unit'];?><?php echo $_G['setting']['extcredits'][$extcreditstype]['title'];?><?php if($thread['replycredit']) { ?><span class="xg1">(<?php echo $comiis_lang['replycredit_however'];?> <?php echo $thread['replycredit'];?> <?php echo $_G['setting']['extcredits'][$extcreditstype]['unit'];?><?php echo $_G['setting']['extcredits'][$extcreditstype]['title'];?>)</span><?php } ?>, <span id="replycredit"><?php echo $comiis_lang['replycredit_revenue'];?> <?php echo $_G['setting']['extcredits'][$extcreditstype]['title'];?> 0</span> <?php echo $_G['setting']['extcredits'][$extcreditstype]['unit'];?>, <?php echo $comiis_lang['you_have'];?> <?php echo $_G['setting']['extcredits'][$extcreditstype]['title'];?> <?php echo $userextcredit;?> <?php echo $_G['setting']['extcredits'][$extcreditstype]['unit'];?></div>
                        </div>
                    <?php } ?>
                <?php } ?>			
                <li class="comiis_stylitit b_b bg_e f_c"><?php echo $comiis_lang['basic_attr'];?></li>
                <?php if($_GET['action'] != 'edit') { ?>
                    <?php if($_G['group']['allowanonymous']) { ?>
                        <li class="comiis_styli comiis_flex b_b">
                            <div class="flex"><?php echo $comiis_lang['post_anonymous'];?></div>
                            <div class="styli_r">
                                <input type="checkbox" name="isanonymous" id="isanonymous" value="1" class="comiis_checkbox_key" />
                                <label for="isanonymous" class="wauto"><code class="bg_f b_ok comiis_checkbox comiis_checkbox_close"></code></label>
                            </div>	
                        </li>
                    <?php } ?>
                <?php } else { ?>
                    <?php if($_G['group']['allowanonymous'] || (!$_G['group']['allowanonymous'] && $orig['anonymous'])) { ?>
                        <li class="comiis_styli comiis_flex b_b">
                            <div class="flex"><?php echo $comiis_lang['post_anonymous'];?></div>
                            <div class="styli_r">
                                <input type="checkbox" name="isanonymous" id="isanonymous" value="1" class="comiis_checkbox_key" <?php if($orig['anonymous']) { ?>checked="checked"<?php } ?> />
                                <label for="isanonymous" class="wauto"><code class="bg_f b_ok comiis_checkbox comiis_checkbox_close"></code></label>
                            </div>	
                        </li>
                    <?php } ?>	
                <?php } ?>
                <?php if($_GET['action'] == 'newthread' || $_GET['action'] == 'edit' && $isfirstpost) { ?>
                    <li class="comiis_styli comiis_flex b_b comiis_hiddenreplies">
                        <div class="flex"><?php echo $comiis_lang['hiddenreplies'];?></div>
                        <div class="styli_r">
                            <input type="checkbox" name="hiddenreplies" id="hiddenreplies" class="comiis_checkbox_key"<?php if($thread['hiddenreplies']) { ?> checked="checked"<?php } ?> value="1">
                            <label for="hiddenreplies" class="wauto"><code class="bg_f b_ok comiis_checkbox comiis_checkbox_close"></code></label>
                        </div>	
                    </li>
                <?php } ?>
                <?php if($_G['uid'] && ($_GET['action'] == 'newthread' || $_GET['action'] == 'edit' && $isfirstpost) && $special != 3) { ?>
                    <li class="comiis_styli comiis_flex b_b">
                        <div class="flex"><?php echo $comiis_lang['post_descviewdefault'];?></div>
                        <div class="styli_r">
                            <input type="checkbox" name="ordertype" id="ordertype" value="1" class="comiis_checkbox_key" <?php echo $ordertypecheck;?> />
                            <label for="ordertype" class="wauto"><code class="bg_f b_ok comiis_checkbox comiis_checkbox_close"></code></label>
                        </div>	
                    </li>
                <?php } ?>
                <?php if(($_GET['action'] == 'newthread' || $_GET['action'] == 'edit' && $isfirstpost)) { ?>
                    <li class="comiis_styli comiis_flex b_b">
                        <div class="flex"><?php echo $comiis_lang['post_noticeauthor'];?></div>
                        <div class="styli_r">
                            <input type="checkbox" name="allownoticeauthor" id="allownoticeauthor" value="1" class="comiis_checkbox_key"<?php if($allownoticeauthor) { ?> checked="checked"<?php } ?> />
                            <label for="allownoticeauthor" class="wauto"><code class="bg_f b_ok comiis_checkbox comiis_checkbox_close"></code></label>
                        </div>	
                    </li>
                <?php } ?>
                <?php if($_GET['action'] != 'edit' && helper_access::check_module('feed') && $_G['forum']['allowfeed']) { ?>
                    <li class="comiis_styli comiis_flex b_b">
                        <div class="flex"><?php echo $comiis_lang['addfeed'];?></div>
                        <div class="styli_r">
                            <input type="checkbox" name="addfeed" id="addfeed" value="1" class="comiis_checkbox_key" <?php echo $addfeedcheck;?>>
                            <label for="addfeed" class="wauto"><code class="bg_f b_ok comiis_checkbox comiis_checkbox_close"></code></label>
                        </div>	
                    </li>
                <?php } ?>
                    <li class="comiis_styli comiis_flex b_b">
                        <div class="flex"><?php echo $comiis_lang['post_show_sig'];?></div>
                        <div class="styli_r">
                            <input type="checkbox" name="usesig" id="usesig" value="1" class="comiis_checkbox_key" <?php if(!$_G['group']['maxsigsize']) { ?>disabled <?php } else { ?><?php echo $usesigcheck;?> <?php } ?>/>
                            <label for="usesig" class="wauto"><code class="bg_f b_ok comiis_checkbox comiis_checkbox_close"></code></label>
                        </div>	
                    </li>		
                <?php if($_GET['action'] == 'newthread' && $_G['forum']['ismoderator'] && ($_G['group']['allowdirectpost'] || !$_G['forum']['modnewposts'])) { ?>
                    <?php if($_GET['action'] == 'newthread' && $_G['forum']['ismoderator'] && ($_G['group']['allowdirectpost'] || !$_G['forum']['modnewposts']) && ($_G['group']['allowstickthread'] || $_G['group']['allowdigestthread'])) { ?>
                    <li class="comiis_stylitit b_b bg_e f_c"><?php echo $comiis_lang['manage_operation'];?></li>	
                    <?php if($_G['group']['allowstickthread']) { ?>
                    <li class="comiis_styli comiis_flex b_b">
                        <div class="flex"><?php echo $comiis_lang['post_stick_thread'];?></div>
                        <div class="styli_r">
                            <input type="checkbox" name="sticktopic" id="sticktopic" value="1" class="comiis_checkbox_key" <?php echo $stickcheck;?> />
                            <label for="sticktopic" class="wauto"><code class="bg_f b_ok comiis_checkbox comiis_checkbox_close"></code></label>
                        </div>	
                    </li>
                    <?php } ?>
                    <?php if($_G['group']['allowdigestthread']) { ?>
                    <li class="comiis_styli comiis_flex b_b">
                        <div class="flex"><?php echo $comiis_lang['post_digest_thread'];?></div>
                        <div class="styli_r">
                            <input type="checkbox" name="addtodigest" id="addtodigest" value="1" class="comiis_checkbox_key" <?php echo $digestcheck;?> />
                            <label for="addtodigest" class="wauto"><code class="bg_f b_ok comiis_checkbox comiis_checkbox_close"></code></label>
                        </div>	
                    </li>
                    <?php } ?>
                    <?php } ?>	
                <?php } elseif($_GET['action'] == 'edit' && $_G['forum_auditstatuson']) { ?>
                    <li class="comiis_stylitit b_b bg_e f_c"><?php echo $comiis_lang['manage_operation'];?></li>
                    <li class="comiis_styli comiis_flex b_b">
                        <div class="flex f_c"><?php echo $comiis_lang['auditstatuson'];?></div>
                        <div class="styli_r">
                            <input type="checkbox" name="audit" id="audit" class="comiis_checkbox_key" value="1">
                            <label for="audit" class="wauto"><code class="bg_f b_ok comiis_checkbox comiis_checkbox_close"></code></label>
                        </div>	
                    </li>
                <?php } ?>
                </ul>
            </div>
</div>
        <?php } ?>
</div>
<?php } ?>