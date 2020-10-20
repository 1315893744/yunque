<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); hookscriptoutput('space_profile');?>
<?php include_once DISCUZ_ROOT.'./template/comiis_app/comiis/php/comiis_space_profile.php'?><?php if($_GET['mycenter'] && !$_G['uid']) { dheader('Location:member.php?mod=logging&action=login');exit;?><?php } include template('common/header'); if(!$_GET['mycenter']) { include template('home/space_header'); ?><div class="comiis_space_profile bg_f b_t b_b mt10 cl">
<ul>
            <?php if($space['uid'] == $_G['uid']) { ?>
            <li class="b_t">
                <a href="home.php?mod=spacecp&amp;ac=usergroup" class="profile_a">
                    <div class="profile_r">
                        <i class="y comiis_font f_d">&#xe60c;</i><span class="y f_a f14"><?php echo $comiis_lang['tip335'];?></span>
                        <span class="kmlev bg_0 f_f f12"<?php if($space['group']['color']) { ?> style="background:<?php echo $space['group']['color'];?> !important"<?php } ?>><?php if($comiis_app_switch['comiis_lev_txt']) { ?><?php echo $comiis_app_switch['comiis_lev_txt'];?><?php } else { ?>Lv.<?php } ?><?php echo $space['group']['stars'];?></span>
                        <span class="f14"><?php echo $space['group']['grouptitle'];?></span>
                    </div>
                    <span>用户组</span>
                </a>
            </li>
            <?php } if($_G['setting']['verify']['enabled']) { ?>
<li class="b_t">
<div class="profile_r comiis_verify">
                    <?php $showverify = true;$show_verify = 0;?>                    
                    <?php if(is_array($_G['setting']['verify'])) foreach($_G['setting']['verify'] as $vid => $verify) { ?>                        <?php if($verify['available']) { ?>
                            <?php if($showverify) { ?>
                            <?php $showverify = false;?>                            <?php } ?>
                            <?php if($space['verify'.$vid] == 1) { ?>
                                <?php $show_verify = 1;?>  
                                <a href="home.php?mod=spacecp&amp;ac=profile&amp;op=verify&amp;vid=<?php echo $vid;?>"><?php if($verify['icon']) { ?><img src="<?php echo $verify['icon'];?>" class="vm" alt="<?php echo $verify['title'];?>" title="<?php echo $verify['title'];?>" /><?php } else { ?><?php echo $verify['title'];?><?php } ?></a>
                            <?php } elseif(!empty($verify['unverifyicon'])) { ?>
                                <?php $show_verify = 1;?> 
                                <a href="home.php?mod=spacecp&amp;ac=profile&amp;op=verify&amp;vid=<?php echo $vid;?>"><?php if($verify['unverifyicon']) { ?><img src="<?php echo $verify['unverifyicon'];?>" class="vm" alt="<?php echo $verify['title'];?>" title="<?php echo $verify['title'];?>" /><?php } ?></a>
                            <?php } ?>
                        <?php } ?>
                    <?php } ?>
                    <?php if($show_verify == 0) { if($space['uid'] == $_G['uid']) { ?><i class="y comiis_font f_d">&#xe60c;</i><a href="home.php?mod=spacecp&amp;ac=profile&amp;op=verify" class="f_a" style="margin-top:0;"><?php echo $comiis_lang['tip301'];?></a><?php } else { ?><span class="f_c"><?php echo $comiis_lang['tip300'];?></span><?php } } ?>
</div>
<span><?php echo $comiis_lang['tip289'];?></span>	
</li>
<?php } ?>			
            <?php if($space['medals']) { ?>
                <li class="b_t">
                    <div class="kmgo"><a href="home.php?mod=medal" class="y f_d"><i class="y comiis_font f_d">&#xe60c;</i><?php echo $comiis_lang['tip319'];?></a></div>
                    <div id="comiis_medal" class="profile_r comiis_medal">                        
                        <ul class="swiper-wrapper">                            
                        <?php if(is_array($space['medals'])) foreach($space['medals'] as $medal) { ?>                            
                            <li class="swiper-slide"><a href="javascript:;" onclick="popup.open('<span class=\'comiis_medalshow\'><img src=\'<?php echo STATICURL;?>/image/common/<?php echo $medal['image'];?>\' class=\'kmimg b_ok bg_e\'><em class=\'kmtit f16 f_0\'><?php echo $medal['name'];?></em><em class=\'kmtxt f14\'><?php echo $medal['description'];?></em></span>', 'alerts');"><img src="<?php echo STATICURL;?>/image/common/<?php echo $medal['image'];?>" alt="<?php echo $medal['name'];?>" id="md_<?php echo $medal['medalid'];?>" class="vm" /></a></li>
                        <?php } ?>
                        </ul>
                    </div>
                    <span><?php echo $comiis_lang['tip321'];?></span>	
                </li>
                <script src="template/comiis_app/comiis/js/comiis_swiper.min.js?<?php echo VERHASH;?>" type="text/javascript"></script>
                <script>
                    mySwiper = new Swiper('#comiis_medal', {
                        freeMode : true,
                        slidesPerView : 'auto',
                        onTouchMove: function(swiper){
                            Comiis_Touch_on = 0;
                        },
                        onTouchEnd: function(swiper){
                            Comiis_Touch_on = 1;
                        },
                    });
                </script>
            <?php } ?>
<li class="b_t">
                <?php if($space['uid'] == $_G['uid']) { ?><a href="home.php?mod=spacecp&amp;ac=profile&amp;op=info" class="profile_a"><?php } ?>
                <div class="profile_r profile_face f_c"><?php if($space['group']['maxsigsize'] && $space['sightml']) { ?><?php echo $space['sightml'];?><?php } else { if($space['uid'] == $_G['uid']) { ?><?php echo $comiis_lang['tip336'];?><?php } else { ?><?php echo $comiis_lang['tip15'];?><?php } } ?></div>
                <span>个人签名</span>
<?php if($space['uid'] == $_G['uid']) { ?></a><?php } ?>
</li>
<li class="b_t">
<a href="javascript:;" class="profile_a profile_ewmbox">
<div class="profile_rs"><i class="comiis_font f_d">&#xe60c;</i><i class="comiis_font profile_ewm f_d">&#xe663;</i></div>
<span><?php echo $comiis_lang['all60'];?></span>
</a>
</li>
</ul>
</div>
<div class="comiis_user_code" style="display:none;">
<div class="comiis_user_code_box">
<div class="comiis_user_code_top">
<img src="<?php echo avatar($space[uid], middle, true);?>" />
<h2><?php echo $space['username'];?></h2> 
<p class="f_d"><?php echo $comiis_lang['tip11'];?></p>
</div>
<div id="comiis_user_code"></div>
</div>
</div>
<script src="template/comiis_app/comiis/js/jquery.qrcode.min.js?<?php echo VERHASH;?>" type="text/javascript"></script>
<script>
jQuery('.profile_ewmbox').on('click', function(e) {
$('.comiis_user_code').css('display', 'block').on('click', function(e) {
$(this).css('display', 'none');
});
if(jQuery('#comiis_user_code canvas').length == 0){
jQuery('#comiis_user_code').qrcode({width: 240, height: 240, text: "<?php echo $_G['siteurl'];?>home.php?mod=space&uid=<?php echo $space['uid'];?>&do=profile"});
}
});
</script>
<div class="comiis_space_profileico bg_f b_t b_b mt10 cl">
<ul>
<?php if($_G['setting']['allowviewuserthread'] !== false) { $space['posts'] = $space['posts'] - $space['threads'];?><li><a href="home.php?mod=space&amp;uid=<?php echo $space['uid'];?>&amp;do=thread&amp;view=me&amp;type=thread&amp;from=space"><i class="comiis_font" style="color:#a8c500;">&#xe64f;</i><span>帖子 <?php echo $space['threads'];?></span></a></li>
<li><a href="home.php?mod=space&amp;uid=<?php echo $space['uid'];?>&amp;do=thread&amp;view=me&amp;type=reply&amp;from=space"><i class="comiis_font" style="color:#FFB900;">&#xe667;</i><span>回复 <?php echo $space['posts'];?></span></a></li>
<?php } ?>
<li><a href="javascript:;"><i class="comiis_font" style="color:#53bcf5;">&#xe66b;</i><span>好友 <?php echo $space['friends'];?></span></a></li>
<?php if(helper_access::check_module('follow')) { ?>
<li><a href="home.php?mod=follow&amp;do=follower&amp;uid=<?php echo $space['uid'];?>"><i class="comiis_font" style="color:#FD7673;">&#xe650;</i><span><?php echo $comiis_lang['all73'];?> <?php echo $space['follower'];?></span></a></li>
<?php } if(helper_access::check_module('blog')) { ?>
<li><a href="home.php?mod=space&amp;uid=<?php echo $space['uid'];?>&amp;do=blog&amp;view=me&amp;from=space"><i class="comiis_font" style="color:#53bcf5;">&#xe64d;</i><span>日志 <?php echo $space['blogs'];?></span></a></li>
<?php } if(helper_access::check_module('album')) { ?>
<li><a href="home.php?mod=space&amp;uid=<?php echo $space['uid'];?>&amp;do=album&amp;view=me&amp;from=space"><i class="comiis_font" style="color:#a8c500;">&#xe653;</i><span>相册 <?php echo $space['albums'];?></span></a></li>
<?php } if(helper_access::check_module('doing')) { ?>
<li><a href="home.php?mod=space&amp;uid=<?php echo $space['uid'];?>&amp;do=doing&amp;view=me&amp;from=space"><i class="comiis_font" style="color:#FD7673;">&#xe691;</i><span><?php echo $comiis_lang['all56'];?> <?php echo $space['doings'];?></span></a></li>
<?php } ?>
            <li><a href="javascript:;"><i class="comiis_font" style="color:#FFB900;">&#xe65a;</i><span><?php echo $comiis_lang['all74'];?> <?php echo $space['views'];?></span></a></li>
</ul>
</div>
<div class="comiis_space_profilejf bg_f b_t b_b mt10 cl">
<ul>
<li class="b_t b_r"><span class="f_0"><?php echo $space['credits'];?></span>积分</li><?php if(is_array($_G['setting']['extcredits'])) foreach($_G['setting']['extcredits'] as $key => $value) { if($value['title']) { ?>
<li class="b_t b_r"><span class="f_0"><?php echo $space["extcredits$key"];?> <?php echo $value['unit'];?></span><?php echo $value['title'];?></span></li>
<?php } } ?>
</ul>
</div>
<div class="comiis_space_profile bg_f b_t b_b mt10 cl">
<ul>
<li class="b_t"><div class="profile_rs f_c"><?php echo $space['uid'];?></div><span>用户ID</span></li>
<?php if(in_array($_G['adminid'], array(1, 2))) { ?>
<li class="b_t"><div class="profile_rs f_c"><?php echo $space['email'];?></div><span>Email</span></li>
<?php } if(is_array($profiles)) foreach($profiles as $value) { ?><li class="b_t"><div class="profile_rs f_c"><?php echo str_replace(array("max-width: 500px;"), array("max-width:none;max-height:100px;margin:8px 0;border-radius:4px;vertical-align: middle;"), $value['value']);; ?></div><span><?php echo $value['title'];?></span></li>
<?php } ?> 
<li class="b_t"><div class="profile_rs f_c"><?php echo $space['oltime'];?> 小时</div><span>在线时间</span></li>
<li class="b_t"><div class="profile_rs f_c"><?php echo $space['regdate'];?></div><span>注册时间</span></li>
<li class="b_t"><div class="profile_rs f_c"><?php echo $space['lastvisit'];?></div><span>最后访问</span></li>
</ul>
</div>
<?php if($space['uid'] == $_G['uid']) { ?>
<div class="cl" style="height:40px;"></div>
<div class="comiis_space_foot bg_f b_t">
<ul class="comiis_flex">
<li class="flex foot_cp"><a href="home.php?mod=spacecp"><i class="comiis_font f_wb">&#xe655;</i><span class="f_b">更新资料</span></a></li>
<?php if($_G['comiis_homestyleid']) { ?><li class="flex foot_cp"><a href="plugin.php?id=comiis_app_homestyle"><i class="comiis_font f_wb">&#xe612;</i><span class="f_b">装扮空间</span></a></li><?php } ?>
</ul>
</div>
<?php } else { include template('home/space_footer'); } } else { ?>
    <?php if($comiis_app_switch['comiis_mystyle'] == 1) { ?>
        <div class="styli_h bg_e b_t cl"></div>
        <div class="comiis_myinfo bg_f b_t cl">	
            <div class="comiis_styli myinfo_box b_t cl">
                <div class="myinfo_ewm f_d"><i class="comiis_font">&#xe663;</i></div>
                <div class="myinfo_img bg_e f_c"><a href="javascript:;" class="comiis_edit_avatar"><span class="f_f">修改</span><img src="<?php echo avatar($_G[uid], middle, true);?>" /></a></div>
                <div class="myinfo_data">
                    <a href="home.php?mod=space&amp;uid=<?php echo $_G['uid'];?>&amp;do=profile" class="myinfo_user"><?php echo $_G['username'];?></a>
                    <a href="home.php?mod=spacecp&amp;ac=profile&amp;op=info" class="myinfo_txt f_c">
                        <?php if($_G['member_'.$_G['uid'].'_field_forum']['sightml']) { ?>
                            <?php echo $_G['member_'.$_G['uid'].'_field_forum']['sightml'];?>
                        <?php } else { ?> 
                           <i class="comiis_font">&#xe62d;</i> <?php echo $comiis_lang['all40'];?>
                        <?php } ?>
                    </a>
                </div>
            </div>	
            <div class="styli_h bg_e b_t cl"></div>
            <a href="plugin.php?id=comiis_app_color" class="comiis_flex comiis_styli b_t cl">
                <div class="styli_tit f_c"><i class="comiis_font" style="color:#F37D7D">&#xe612;</i></div><div class="flex"><?php echo $comiis_lang['tip333'];?></div><div class="styli_ico"><span class="f_ok"><?php echo $comiis_lang['post37'];?></span><i class="comiis_font f_d">&#xe60c;</i></div>
            </a>
            <a href="home.php?mod=space&amp;uid=<?php echo $_G['uid'];?>&amp;do=thread&amp;view=me&amp;from=space" class="comiis_flex comiis_styli b_t cl">
                <div class="styli_tit f_c"><i class="comiis_font" style="color:#10AEFF">&#xe662;</i></div><div class="flex">我的空间</div><div class="styli_ico f_d"><i class="comiis_font">&#xe60c;</i></div>
            </a>
            <a href="home.php?mod=space&amp;do=friend&amp;view=visitor" class="comiis_flex comiis_styli b_t cl">
                <div class="styli_tit f_c"><i class="comiis_font" style="color:#FFB300">&#xe682;</i></div><div class="flex">最近来访</div>
                <div class="my_space_img f_d">
                    <?php if(is_array($comiis_visitor)) foreach($comiis_visitor as $temp) { ?>                        <?php echo avatar($temp['vuid'],'small');; ?>                    <?php } ?>
                </div>
                <div class="styli_ico f_d"><i class="comiis_font">&#xe60c;</i></div>
            </a>
            <?php if($_G['setting']['regstatus'] > 1) { ?>
                <a href="home.php?mod=spacecp&amp;ac=invite" class="comiis_flex comiis_styli b_t cl">
                    <div class="styli_tit f_c"><i class="comiis_font" style="color:#9DCA06">&#xe60f;</i></div><div class="flex">邀请好友</div><div class="styli_ico f_d"><?php if(!($_G['setting']['creditspolicy']['promotion_visit'] || $_G['setting']['creditspolicy']['promotion_register'])) { ?><span class="f13 f_a"><?php echo $comiis_lang['tip293'];?></span><?php } ?><i class="comiis_font">&#xe60c;</i></div>
                </a>
            <?php } ?>
            <?php if($_G['setting']['creditspolicy']['promotion_visit'] || $_G['setting']['creditspolicy']['promotion_register']) { ?>
            <a href="home.php?mod=spacecp&amp;ac=promotion" class="comiis_flex comiis_styli b_t cl">
                <div class="styli_tit f_c"><i class="comiis_font" style="color:#DA99DB">&#xe632;</i></div><div class="flex">访问推广</div><div class="styli_ico f_d"><span class="f13 f_a"><?php echo $comiis_lang['tip303'];?></span><i class="comiis_font">&#xe60c;</i></div>
            </a>
            <?php } ?>
            <?php if(!empty($_G['setting']['pluginhooks']['global_comiis_home_space_profile_mobile'])) echo $_G['setting']['pluginhooks']['global_comiis_home_space_profile_mobile'];?>		
            <div class="styli_h bg_e b_t cl"></div>
            <div name="pm" id="pm">
            <a href="home.php?mod=space&amp;do=notice" class="comiis_flex comiis_styli b_t cl">
                <div class="styli_tit f_c"><i class="comiis_font" style="color:#FFB300">&#xe62f;</i></div><div class="flex"><span class="z"><?php echo $comiis_lang['all51'];?>提醒</span><?php if($_G['member']['newpm'] || $_G['member']['newprompt']) { ?><span class="myinfo_tip bg_del f_f"><?php if($_G['member']['newpm'] && $_G['member']['newprompt']) { echo $_G['member']['newpm'] + $_G['member']['newprompt'];; } elseif($_G['member']['newpm']) { ?><?php echo $_G['member']['newpm'];?><?php } else { ?><?php echo $_G['member']['newprompt'];?><?php } ?></span><?php } ?></div><div class="styli_ico f_d"><i class="comiis_font">&#xe60c;</i></div>
            </a>
            </div>
            <a href="home.php?mod=spacecp&amp;ac=credit" class="comiis_flex comiis_styli b_t cl">
                <div class="styli_tit f_c"><i class="comiis_font" style="color:#9DCA08">&#xe641;</i></div><div class="flex">我的积分</div><div class="styli_ico f_d"><i class="comiis_font">&#xe60c;</i></div>
            </a>
            <a href="home.php?mod=spacecp" class="comiis_flex comiis_styli b_t cl">
                <div class="styli_tit f_c"><i class="comiis_font" style="color:#3EBBFD">&#xe66e;</i></div><div class="flex">我的资料</div><div class="styli_ico"><span class="f_ok">修改</span><i class="comiis_font f_d">&#xe60c;</i></div>
            </a>
            <a href="home.php?mod=space&amp;uid=<?php echo $_G['uid'];?>&amp;do=favorite&amp;view=me&amp;type=all" class="comiis_flex comiis_styli b_t cl">
                <div class="styli_tit f_c"><i class="comiis_font" style="color:#F37D7D">&#xe617;</i></div><div class="flex">我的收藏</div><div class="styli_ico f_d"><i class="comiis_font">&#xe60c;</i></div>
            </a>
            <a href="home.php?mod=space&amp;uid=<?php echo $_G['uid'];?>&amp;do=thread&amp;view=me" class="comiis_flex comiis_styli b_t cl">
                <div class="styli_tit f_c"><i class="comiis_font" style="color:#9DCA06">&#xe679;</i></div><div class="flex">我的帖子</div><div class="styli_ico f_d"><i class="comiis_font">&#xe60c;</i></div>
            </a>
            <?php if($_G['setting']['groupstatus']) { ?>
            <a href="group.php?mod=my&amp;view=join" class="comiis_flex comiis_styli b_t cl">
                <div class="styli_tit f_c"><i class="comiis_font" style="color:#DA99DB">&#xe66a;</i></div><div class="flex"><?php echo $comiis_lang['all58'];?><?php echo $comiis_group_lang['001'];?></div><div class="styli_ico f_d"><i class="comiis_font">&#xe60c;</i></div>
            </a>
            <?php } ?>
            <?php if($_G['setting']['blogstatus']) { ?>
            <a href="home.php?mod=space&amp;do=blog&amp;view=me" class="comiis_flex comiis_styli b_t cl">
                <div class="styli_tit f_c"><i class="comiis_font" style="color:#91B9EB">&#xe681;</i></div><div class="flex">我的日志</div><div class="styli_ico f_d"><i class="comiis_font">&#xe60c;</i></div>
            </a>
            <?php } ?>
            <?php if($_G['setting']['albumstatus']) { ?>
            <a href="home.php?mod=space&amp;do=album&amp;view=me" class="comiis_flex comiis_styli b_t cl">
                <div class="styli_tit f_c"><i class="comiis_font" style="color:#FFB300">&#xe627;</i></div><div class="flex">我的相册</div><div class="styli_ico f_d"><i class="comiis_font">&#xe60c;</i></div>
            </a>
            <?php } ?>
            <?php if($_G['setting']['doingstatus']) { ?>
            <a href="home.php?mod=space&amp;do=doing&amp;view=me" class="comiis_flex comiis_styli b_t cl">
                <div class="styli_tit f_c"><i class="comiis_font" style="color:#F37D7D">&#xe638;</i></div><div class="flex"><?php echo $comiis_lang['all58'];?><?php echo $comiis_lang['all56'];?></div><div class="styli_ico f_d"><i class="comiis_font">&#xe60c;</i></div>
            </a>
            <?php } ?>
            <a href="home.php?mod=space&amp;do=friend" class="comiis_flex comiis_styli b_t cl">
                <div class="styli_tit f_c"><i class="comiis_font" style="color:#9DCA06">&#xe629;</i></div><div class="flex">我的好友</div><div class="styli_ico f_d"><i class="comiis_font">&#xe60c;</i></div>
            </a>
            <?php if($space['medals']) { ?>
            <a href="home.php?mod=medal&amp;action=log" class="comiis_flex comiis_styli b_t cl">
                <div class="styli_tit f_c"><i class="comiis_font" style="color:#3EBBFD">&#xe6ec;</i></div><div class="flex">我的勋章</div><div class="styli_ico f_d"><i class="comiis_font">&#xe60c;</i></div>
            </a>
            <?php } ?>
            <?php if($_G['setting']['taskon']) { ?>
            <a href="home.php?mod=task" class="comiis_flex comiis_styli b_t cl">
                <div class="styli_tit f_c"><i class="comiis_font" style="color:#F37D7D">&#xe983;</i></div><div class="flex">我的任务</div><div class="styli_ico f_d"><i class="comiis_font">&#xe60c;</i></div>
            </a>
            <?php } ?>
        </div>
        <div class="comiis_btnbox cl"><a href="member.php?mod=logging&amp;action=logout&amp;referer=forum.php&amp;formhash=<?php echo FORMHASH;?>&amp;handlekey=logout" class="dialog comiis_btn bg_del f_f" />退出登录</a></div>
        <div class="comiis_user_code" style="display:none;">
            <div class="comiis_user_code_box">
                <div class="comiis_user_code_top">
                    <img src="<?php echo avatar($_G[uid], middle, true);?>" />
                    <h2><?php echo $_G['username'];?></h2> 
                    <p class="f_d"><?php echo $comiis_lang['tip11'];?></p>
                </div>
                <div id="comiis_user_code"></div>
            </div>
        </div>
        <script src="template/comiis_app/comiis/js/jquery.qrcode.min.js?<?php echo VERHASH;?>" type="text/javascript"></script>
        <script>
            jQuery('.myinfo_ewm').on('click', function(e) {
                $('.comiis_user_code').css('display', 'block').on('click', function(e) {
                    $(this).css('display', 'none');
                });
                if(jQuery('#comiis_user_code canvas').length == 0){
                    jQuery('#comiis_user_code').qrcode({width: 240, height: 240, text: "<?php echo $_G['siteurl'];?>home.php?mod=space&uid=<?php echo $_G['uid'];?>&do=profile"});
                }
            });
        </script>
    <?php } else { ?>
        <div class="styli_h10 bg_e cl"></div>
        <div class="comiis_myinfo bg_f b_t b_b cl">	
            <div class="comiis_styli myinfo_boxv1 b_t cl">
                <a href="home.php?mod=space&amp;uid=<?php echo $_G['uid'];?>&amp;do=profile" class="myinfo_ewm f_d"><i class="comiis_font" style="font-size:14px;">&#xe60c;</i></a>
                <div class="myinfo_imgv1 bg_e f_c"><a href="javascript:;" class="comiis_edit_avatar"><span class="f_f">修改</span><img src="<?php echo avatar($_G[uid], middle, true);?>" /></a></div>
                <div class="myinfo_data">
                    <div class="myinfo_titv1">
                        <a href="home.php?mod=space&amp;uid=<?php echo $_G['uid'];?>&amp;do=profile" class="myinfo_user"><?php echo $_G['username'];?></a>
                        <?php if($space['gender'] == 1) { ?><i class="comiis_font kmlev kmgender bg_boy f_f">&#xe63f</i><?php } elseif($space['gender'] == 2) { ?><i class="comiis_font kmlev kmgender bg_girl f_f">&#xe637</i><?php } ?>
                    </div>
                    <div class="myinfo_txtv1 f_c">
                        <a href="home.php?mod=spacecp&amp;ac=usergroup"><span class="bg_0 f_f"<?php if($_G['cache']['usergroups'][$_G['member']['groupid']]['color']) { ?> style="background:<?php echo $_G['cache']['usergroups'][$_G['member']['groupid']]['color'];?> !important;color:#fff !important"<?php } ?>><?php if($comiis_app_switch['comiis_lev_txt']) { ?><?php echo $comiis_app_switch['comiis_lev_txt'];?><?php } else { ?>Lv.<?php } ?><?php echo $_G['cache']['usergroups'][$space['groupid']]['stars'];?></span><span class="f_c" style="margin-right:0;"><?php echo strip_tags($_G['cache']['usergroups'][$space['groupid']]['grouptitle']);; ?></span></a><a href="home.php?mod=spacecp&amp;ac=credit"><span class="f_c">积分: <?php echo $_G['member']['credits'];?></span></a>
                    </div>
                </div>
            </div>           
            <div class="styli_h10 bg_e b_t cl"></div>
            <div class="comiis_myinfo_ico bg_f b_t cl">            
                <ul>
                    <li><a href="home.php?mod=space&amp;uid=<?php echo $_G['uid'];?>&amp;do=thread&amp;view=me&amp;from=space"><i class="comiis_font" style="color:#9DCA06">&#xe664;</i><span>我的空间</span></a></li>
                    <li><a href="home.php?mod=space&amp;uid=<?php echo $_G['uid'];?>&amp;do=thread&amp;view=me"><i class="comiis_font" style="color:#FFB300">&#xe64f;</i><span>我的帖子</span></a></li>
                    <li><a href="home.php?mod=space&amp;uid=<?php echo $_G['uid'];?>&amp;do=favorite&amp;view=me&amp;type=all"><i class="comiis_font" style="color:#53bcf5">&#xe64c;</i><span>我的收藏</span></a></li>
                    <li><a href="home.php?mod=space&amp;do=friend"><i class="comiis_font" style="color:#F37D7D">&#xe698;</i><span>我的好友</span></a></li>
                    <?php if($_G['setting']['blogstatus']) { ?>
                    <li><a href="home.php?mod=space&amp;do=blog&amp;view=me"><i class="comiis_font" style="color:#53bcf5">&#xe64d;</i><span>我的日志</span></a></li>
                    <?php } ?>
                    <?php if($_G['setting']['albumstatus']) { ?>
                    <li><a href="home.php?mod=space&amp;do=album&amp;view=me"><i class="comiis_font" style="color:#a8c500">&#xe653;</i><span>我的相册</span></a></li>
                    <?php } ?>
                    <?php if($_G['setting']['groupstatus']) { ?>
                    <li><a href="group.php?mod=my&amp;view=join"><i class="comiis_font" style="color:#F37D7D">&#xe66b;</i><span><?php echo $comiis_lang['all58'];?><?php echo $comiis_group_lang['001'];?></span></a></li>
                    <?php } ?>
                    <?php if($_G['setting']['doingstatus']) { ?>
                    <li><a href="home.php?mod=space&amp;do=doing&amp;view=me"><i class="comiis_font" style="color:#FFB300">&#xe691;</i><span><?php echo $comiis_lang['all58'];?><?php echo $comiis_lang['all56'];?></span></a></li>
                    <?php } ?> 
                </ul>
            </div>
            <div class="styli_h10 bg_e b_t cl"></div>
            <a href="plugin.php?id=comiis_app_color" class="comiis_flex comiis_styli b_t cl">
                <div class="styli_tit f_c"><i class="comiis_font" style="color:#F37D7D">&#xe612;</i></div><div class="flex"><?php echo $comiis_lang['tip333'];?></div><div class="styli_ico"><span class="f_ok"><?php echo $comiis_lang['post37'];?></span><i class="comiis_font f_d">&#xe60c;</i></div>
            </a>
            <a href="home.php?mod=space&amp;do=friend&amp;view=visitor" class="comiis_flex comiis_styli b_t cl">
                <div class="styli_tit f_c"><i class="comiis_font" style="color:#91B9EB">&#xe682;</i></div><div class="flex">最近来访</div>
                <div class="my_space_img f_d">
                    <?php if(is_array($comiis_visitor)) foreach($comiis_visitor as $temp) { ?>                        <?php echo avatar($temp['vuid'],'small');; ?>                    <?php } ?>
                </div>
                <div class="styli_ico f_d"><i class="comiis_font">&#xe60c;</i></div>
            </a>
            <?php if($_G['setting']['creditspolicy']['promotion_visit'] || $_G['setting']['creditspolicy']['promotion_register']) { ?>
            <a href="home.php?mod=spacecp&amp;ac=promotion" class="comiis_flex comiis_styli b_t cl">
                <div class="styli_tit f_c"><i class="comiis_font" style="color:#FFB300">&#xe632;</i></div><div class="flex">访问推广</div><div class="styli_ico f_d"><span class="f13 f_a"><?php echo $comiis_lang['tip303'];?></span><i class="comiis_font">&#xe60c;</i></div>
            </a>
            <?php } ?>
            <?php if($_G['setting']['regstatus'] > 1) { ?>
                <a href="home.php?mod=spacecp&amp;ac=invite" class="comiis_flex comiis_styli b_t cl">
                    <div class="styli_tit f_c"><i class="comiis_font" style="color:#9DCA08">&#xe60f;</i></div><div class="flex">邀请好友</div><div class="styli_ico f_d"><?php if(!($_G['setting']['creditspolicy']['promotion_visit'] || $_G['setting']['creditspolicy']['promotion_register'])) { ?><span class="f13 f_a"><?php echo $comiis_lang['tip293'];?></span><?php } ?><i class="comiis_font">&#xe60c;</i></div>
                </a>
            <?php } ?>
            <?php if(!empty($_G['setting']['pluginhooks']['global_comiis_home_space_profile_mobile'])) echo $_G['setting']['pluginhooks']['global_comiis_home_space_profile_mobile'];?>
            <div class="styli_h10 bg_e b_t cl"></div>
            <div name="pm" id="pm" class="b_t">            
            <a href="home.php?mod=space&amp;do=notice" class="comiis_flex comiis_styli b_t cl">
                <div class="styli_tit f_c"><i class="comiis_font" style="color:#FFB300">&#xe665;</i></div><div class="flex"><span class="z"><?php echo $comiis_lang['all51'];?>提醒</span><?php if($_G['member']['newpm'] || $_G['member']['newprompt']) { ?><span class="myinfo_tip bg_del f_f"><?php if($_G['member']['newpm'] && $_G['member']['newprompt']) { echo $_G['member']['newpm'] + $_G['member']['newprompt'];; } elseif($_G['member']['newpm']) { ?><?php echo $_G['member']['newpm'];?><?php } else { ?><?php echo $_G['member']['newprompt'];?><?php } ?></span><?php } ?></div><div class="styli_ico f_d"><i class="comiis_font">&#xe60c;</i></div>
            </a>            
            </div>  
            <a href="home.php?mod=spacecp" class="comiis_flex comiis_styli b_t cl">
                <div class="styli_tit f_c"><i class="comiis_font" style="color:#3EBBFD">&#xe66e;</i></div><div class="flex">我的资料</div><div class="styli_ico"><?php if($space['profileprogress'] <100) { ?><span class="f13 f_d"><?php echo $comiis_lang['tip269'];?><?php echo $space['profileprogress'];?>%</span><?php } else { ?><span class="f_ok">修改</span><?php } ?><i class="comiis_font f_d">&#xe60c;</i></div>
            </a>        
            <a href="home.php?mod=spacecp&amp;ac=credit" class="comiis_flex comiis_styli b_t cl">
                <div class="styli_tit f_c"><i class="comiis_font" style="color:#9DCA08">&#xe641;</i></div><div class="flex">我的积分</div><div class="styli_ico f_d"><i class="comiis_font">&#xe60c;</i></div>
            </a>
            <?php if($_G['setting']['taskon']) { ?>
            <a href="home.php?mod=task" class="comiis_flex comiis_styli b_t cl">
                <div class="styli_tit f_c"><i class="comiis_font" style="color:#F37D7D">&#xe983;</i></div><div class="flex">我的任务</div><div class="styli_ico f_d"><i class="comiis_font">&#xe60c;</i></div>
            </a>
            <?php } ?>
            <?php if($space['medals']) { ?>
            <a href="home.php?mod=medal&amp;action=log" class="comiis_flex comiis_styli b_t cl">
                <div class="styli_tit f_c"><i class="comiis_font" style="color:#3EBBFD">&#xe6ec;</i></div><div class="flex">我的勋章</div><div class="styli_ico f_d"><i class="comiis_font">&#xe60c;</i></div>
            </a>
            <?php } ?> 
        </div>
        <div class="comiis_btnbox cl"><a href="member.php?mod=logging&amp;action=logout&amp;referer=forum.php&amp;formhash=<?php echo FORMHASH;?>&amp;handlekey=logout" class="dialog comiis_btn bg_del f_f" /><?php echo $comiis_lang['tip311'];?></a></div>
    <?php } } if($_GET['ispm'] == 'yes') { ?>
<script>
$(document).ready(function() {
jQuery("html,body").animate({scrollTop:jQuery("#pm").offset().top},1000);
});
</script>
<?php } if(!$_GET['mycenter']) { $comiis_foot = 'no';?><?php } include template('common/footer'); ?>