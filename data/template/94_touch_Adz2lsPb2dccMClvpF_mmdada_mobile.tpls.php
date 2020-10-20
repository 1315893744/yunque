<?php
//Discuz! cache file, DO NOT modify me!
//Created: Sep 29, 2018, 17:42
//Identify: d2c1fbd0cf4809fa384f809578108793

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
?>
<?php if(helper_access::check_module('album')) { ?>
    <div class="comiis_foot_height"></div>
    <div class="comiis_sendpm_box bg_f b_t">
        <div class="comiis_flex comiis_sendpm comiis_openrebox">
            <div class="styli_tit comiis_post_ico f_c cl">
                <a href="javascript:;"><i class="comiis_font">&#xe62e</i></a>
            </div>
            <div class="flex"><div class="comiis_input b_b comiis_reinput"><?php echo $comiis_lang['tip14'];?></div></div>
            <div class="styli_r"><a class="comiis_btn bg_0 f_f" href="javascript:;"><?php echo $comiis_lang['all53'];?></a></div>
        </div>
    </div>
<?php if($_G['comiis_new'] <= 1) { ?>
    <div class="comiis_fastpostbox comiis_showleftbox">
        <div class="comiis_postbox">
            <div class="comiis_minipost bg_e b_t cl">
                <form id="quickcommentform_<?php echo $picid;?>" name="quickcommentform_<?php echo $picid;?>" action="home.php?mod=spacecp&amp;ac=comment&amp;handlekey=qcpic_<?php echo $picid;?>" method="post" autocomplete="off">
                    <input type="hidden" name="refer" value="<?php echo $theurl;?>" />
                    <input type="hidden" name="id" value="<?php echo $picid;?>" />
                    <input type="hidden" name="idtype" value="picid" />
                    <input type="hidden" name="commentsubmit" value="true" />
                    <input type="hidden" name="quickcomment" value="true" />
                    <input type="hidden" name="formhash" value="<?php echo FORMHASH;?>" />
                    <input type="hidden" name="handlekey" value="comiis_qcalbum" />
                    <h2>
                      <span class="y"><i class="comiis_font f_d" onclick="comiis_openrebox(0);" style="padding:10px 2px 10px 20px;">¤”</i></span>
                      <?php echo avatar($_G[uid],middle);?><span class="f_b"><?php echo $_G['member']['username'];?></span>
                    </h2>
                    <div class="comiis_minipost_mes bg_f b_ok f_c cl">
                        <textarea name="message" id="needmessage" placeholder="<?php echo $comiis_lang['all27'];?>..." class="comiis_pt bg_f"></textarea>
                    </div>	
                    <?php if($secqaacheck || $seccodecheck) { ?>
                    <div class="comiis_minipost_sec b_b cl">
                        <?php include template('common/seccheck'); ?>                    </div>
                    <?php } ?>	
                    <div class="comiis_post_ico comiis_minipost_ico f_c cl">
                        <input type="submit" value="<?php echo $comiis_lang['all53'];?>" class="bg_0 f_f y formdialog" name="commentsubmit_btn" value="true" id="fastpostsubmit" comiis='handle' style="border-radius:2px;">
                    </div>
                    <div id="comiis_post_tab">
                        <div class="comiis_bqbox comiis_wzsmiley bg_f b_ok b_t cl">
                            <div class="comiis_smiley_box">
                                <div class="bqbox_c comiis_portal_smiley"></div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php } else { ?>
<div class="comiis_fastpostbox comiis_showleftbox bg_e">
    <form id="quickcommentform_<?php echo $picid;?>" name="quickcommentform_<?php echo $picid;?>" action="home.php?mod=spacecp&amp;ac=comment&amp;handlekey=qcpic_<?php echo $picid;?>" method="post" autocomplete="off">
        <input type="hidden" name="refer" value="<?php echo $theurl;?>" />
        <input type="hidden" name="id" value="<?php echo $picid;?>" />
        <input type="hidden" name="idtype" value="picid" />
        <input type="hidden" name="commentsubmit" value="true" />
        <input type="hidden" name="quickcomment" value="true" />
        <input type="hidden" name="formhash" value="<?php echo FORMHASH;?>" />
        <input type="hidden" name="handlekey" value="comiis_qcalbum" />
        <div class="comiis_head bg_e b_b">
            <div class="header_z"><a onclick="comiis_openrebox(0);"><i class="comiis_font f_d">&#xe639</i></a></div>
            <h2><?php echo $comiis_lang['reply'];?></h2>
            <div class="header_y"></div>
        </div>
        <div class="comiis_styli bg_f b_b cl">
            <textarea name="message" id="needmessage" placeholder="<?php echo $comiis_lang['all27'];?>..." class="comiis_pt bg_f comiis_mini_pt"></textarea>
        </div>	
        <?php if($secqaacheck || $seccodecheck) { ?>
        <div class="comiis_stylino comiis_minipost_sec bg_f b_b f_c cl">
            <?php include template('common/seccheck'); ?>        </div>
        <?php } ?>
        <div class="comiis_post_ico<?php if($comiis_app_switch['comiis_post_icotxt'] != 1) { ?> comiis_minipost_icot<?php } else { ?> comiis_minipost_ico<?php } ?> f_c cl">
            <a href="javascript:;"><i class="comiis_font">&#xe62e<em><?php echo $comiis_lang['tip260'];?></em></i></a>
            <input type="submit" value="<?php echo $comiis_lang['reply'];?>" class="bg_0 f_f y formdialog" name="commentsubmit_btn" value="true" id="fastpostsubmit" comiis='handle'>
        </div>
        <div id="comiis_post_tab">
            <div class="comiis_bqbox bg_f b_b cl" style="display:none;">
                <div class="comiis_smiley_box b_t">
                    <div class="bqbox_c comiis_portal_smiley"></div>
                </div>
            </div>
        </div>
    </form>
</div>
<?php } ?>
    <script>
    function errorhandle_comiis_qcalbum(a, b){
        popup.open(a, 'alert');
    }
    function succeedhandle_comiis_qcalbum(a, b, c){
        if(c['cid']) {
            $.ajax({
                type:'GET',
                url: 'home.php?mod=misc&ac=ajax&op=comment&mobile=2&inajax=1&cid=' + c['cid'] ,
                dataType:'xml',
            }).success(function(s) {
                if(s.lastChild.firstChild.nodeValue){
                    $('.comiis_plli').append(s.lastChild.firstChild.nodeValue);
                    $('#needmessage').val('');
                    $('.sec_code_img').trigger("click");
                    comiis_openrebox(0);
                    popup.open('<?php echo $comiis_lang['tip28'];?>', 'alert');
                    $('.comiis_notip').css('display','none');
                }
            });
        } else {
            popup.open(b, 'alert');
        }
    }
    <?php if($article['idtype'] != 'tid') { ?>
    var comiis_smilies_array = [];
    var comiis_portal_smiley = '<ul>';
    for(i=1; i<31; i++) {
        comiis_portal_smiley += '<li><a href="javascript:;" onclick="insertsmiley(\''+i+'\');"><img src="' + parent.STATICURL + 'image/smiley/comcom/'+i+'.gif" class="vm" /></a></li>';
        if (typeof comiis_smilies_array[('[em:'+i+':]').length] != 'object') {
            comiis_smilies_array[('[em:'+i+':]').length] = new Array();
        }
        comiis_smilies_array[('[em:'+i+':]').length].push('[em:'+i+':]')
    }
    comiis_smilies_array.reverse();
    comiis_portal_smiley += '</ul>';
    $('.comiis_portal_smiley').html(comiis_portal_smiley);
    
    function insertsmiley(a){
        $('#needmessage').comiis_insert('[em:'+a+':]');
    }
    
    $('#needmessage').on('keydown', function(event){
        if(event.keyCode == "8") {
            return $('#needmessage').comiis_delete();
        }
    });		
    var comiis_tab_index = 1;		
    $('.comiis_post_ico>a').on('click', function() {
        if(comiis_tab_index != $(this).index()){
            $('.comiis_post_ico a i').removeClass('f_0');
            $(this).find('i').addClass("f_0");
            comiis_tab_index = $(this).index();
            $("#comiis_post_tab>div").hide().eq(comiis_tab_index).fadeIn();
        }else{
            if($(this).find('i').hasClass("f_0")){
                $('.comiis_post_ico a i').removeClass('f_0');
                $("#comiis_post_tab>div").eq(comiis_tab_index).hide();
            }else{
                $(this).find('i').addClass("f_0");
                $("#comiis_post_tab>div").eq(comiis_tab_index).fadeIn();
            }
        }
    });
    <?php } ?>
    var comiis_view_redata;
    $('.comiis_openrebox').on('click', function() {
        <?php if($_G['uid'] || $_G['group']['allowcomment']) { ?>
            comiis_openrebox(1);
        <?php } else { ?>
            popup.open('<?php echo $comiis_lang['tip16'];?>', 'confirm', 'member.php?mod=logging&action=login');
        <?php } ?>
        return false;
    });
    <?php if($_G['uid'] || $_G['group']['allowcomment']) { ?>
    function comiis_openrebox(a){
        if(a == 1){
            $('.comiis_sendpm_box').css('display', 'none');
            $('.comiis_fastpostbox').css('display', 'block');
            setTimeout(function() {
                $('.comiis_fastpostbox').addClass("comiis_showrebox");
            }, 20);
            $('#comiis_bgbox').off().on('touchstart', function() {
                $(this).off().css({'display':'none'});
                comiis_openrebox(0);
                if(comiis_view_redata == $('#needmessage').val()){
                    $('#needmessage').val('');
                    $('.comiis_reinput').text('');
                }
                comiis_view_redata = '';
                return false;
            }).css({
                'display':'block',
                'width':'100%',
                'height':'100%',
                'position':'fixed',
                'top':'0',
                'left':'0',
                'background':'#000',
                'opacity' : '.7',
                'z-index':'101'
            });
          
        }else{
            $('#comiis_bgbox').off().css({'display':'none'});
            $('.comiis_fastpostbox').removeClass("comiis_showrebox").on('webkitTransitionEnd transitionend', function() {
                $(this).off().css('display', 'none');
                $('.comiis_reinput').text($('#needmessage').val().length > 0 ? $('#needmessage').val() : '<?php echo $comiis_lang['tip14'];?>');
                $('.comiis_sendpm_box').css('display', 'block');
            });
        }
    }
    <?php } ?>
    </script>
<?php } ?>