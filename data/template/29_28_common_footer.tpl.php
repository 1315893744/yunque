<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); ?>
</div>
<?php if(empty($topic) || ($topic['usefooter'])) { $focusid = getfocus_rand($_G[basescript]);?><?php if($focusid !== null) { $focus = $_G['cache']['focus']['data'][$focusid];?><?php $focusnum = count($_G['setting']['focus'][$_G[basescript]]);?><div class="focus" id="sitefocus">
  <div class="bm">
    <div class="bm_h cl"> <a href="javascript:;" onclick="setcookie('nofocus_<?php echo $_G['basescript'];?>', 1, <?php echo $_G['cache']['focus']['cookie'];?>*3600);$('sitefocus').style.display='none'" class="y" title="关闭">关闭</a>
      <h2> 
        <?php if($_G['cache']['focus']['title']) { ?><?php echo $_G['cache']['focus']['title'];?><?php } else { ?>站长推荐<?php } ?> 
        <span id="focus_ctrl" class="fctrl"><img src="<?php echo IMGDIR;?>/pic_nv_prev.gif" alt="上一条" title="上一条" id="focusprev" class="cur1" onclick="showfocus('prev');" /> <em><span id="focuscur"></span>/<?php echo $focusnum;?></em> <img src="<?php echo IMGDIR;?>/pic_nv_next.gif" alt="下一条" title="下一条" id="focusnext" class="cur1" onclick="showfocus('next')" /></span> </h2>
    </div>
    <div class="bm_c" id="focus_con"> </div>
  </div>
</div><?php $focusi = 0;?> <?php if(is_array($_G['setting']['focus'][$_G['basescript']])) foreach($_G['setting']['focus'][$_G['basescript']] as $id) { ?><div class="bm_c" style="display: none" id="focus_<?php echo $focusi;?>">
  <dl class="xld cl bbda">
    <dt><a href="<?php echo $_G['cache']['focus']['data'][$id]['url'];?>" class="xi2" target="_blank"><?php echo $_G['cache']['focus']['data'][$id]['subject'];?></a></dt>
    <?php if($_G['cache']['focus']['data'][$id]['image']) { ?>
    <dd class="m"><a href="<?php echo $_G['cache']['focus']['data'][$id]['url'];?>" target="_blank"><img src="<?php echo $_G['cache']['focus']['data'][$id]['image'];?>" alt="<?php echo $_G['cache']['focus']['data'][$id]['subject'];?>" /></a></dd>
    <?php } ?>
    <dd><?php echo $_G['cache']['focus']['data'][$id]['summary'];?></dd>
  </dl>
  <p class="ptn cl"><a href="<?php echo $_G['cache']['focus']['data'][$id]['url'];?>" class="xi2 y" target="_blank">查看 &raquo;</a></p>
</div><?php $focusi ++;?> 
<?php } ?> 
<script type="text/javascript">
var focusnum = <?php echo $focusnum;?>;
if(focusnum < 2) {
$('focus_ctrl').style.display = 'none';
}
if(!$('focuscur').innerHTML) {
var randomnum = parseInt(Math.round(Math.random() * focusnum));
$('focuscur').innerHTML = Math.max(1, randomnum);
}
showfocus();
var focusautoshow = window.setInterval('showfocus(\'next\', 1);', 5000);
</script> 
<?php } ?> 
<?php if($_G['uid'] && $_G['member']['allowadmincp'] == 1 && $_G['setting']['showpatchnotice'] == 1) { ?>
<div class="focus patch" id="patch_notice"></div>
<?php } ?> <?php echo adshow("footerbanner/wp a_f/1");?><?php echo adshow("footerbanner/wp a_f/2");?><?php echo adshow("footerbanner/wp a_f/3");?> <?php echo adshow("float/a_fl/1");?><?php echo adshow("float/a_fr/2");?> <?php echo adshow("couplebanner/a_fl a_cb/1");?><?php echo adshow("couplebanner/a_fr a_cb/2");?> <?php echo adshow("cornerbanner/a_cn");?> 

<?php if(!empty($_G['setting']['pluginhooks']['global_footer'])) echo $_G['setting']['pluginhooks']['global_footer'];?>

<div id="footer" class="footer cl">
  <div id="ft" class="wp cl">
     <div class="ft-wp">
    <div class="wpn cl">
        <div class="ft cl">
            <i class="icon-uimini"></i>
            <div class="ft-info">
                <ul class="ft-nav cl">
                    <li><a href="https://support.qq.com/products/151843/blog/12229" target="_blank">商务合作</a></li>
                    <li><a href="https://support.qq.com/products/151843?" target="_blank">意见反馈</a></li>
                    <li><a href="https://support.qq.com/products/151843/team/" target="_blank">关于我们</a></li>
                    <li><a href="https://www.wjx.top/jq/75487430.aspx">团队招新</a></li>
                    <li><a href="https://support.qq.com/products/151843/blog/12228" target="_blank">隐私政策</a></li>
                 

                </ul>
                <p class="copy"><?php if($_G['setting']['icp']) { ?><a href="http://www.miitbeian.gov.cn/" target="_blank"><?php echo $_G['setting']['icp'];?></a><?php } ?> / &copy; Built in 2020.<a href="www.linkstar.top\index.php" target="_blank"> </a> Developed by <a href="https://support.qq.com/products/151843/">Linkstar Yunque Team.</a> <!--<em><?php echo $_G['setting']['version'];?></em>--><?php if(!empty($_G['setting']['boardlicensed'])) { ?> <!--<a href="http://license.comsenz.com/?pid=1&amp;host=<?php echo $_SERVER['HTTP_HOST'];?>" target="_blank">Licensed</a>--><?php } ?><?php if(!empty($_G['setting']['pluginhooks']['global_footerlink'])) echo $_G['setting']['pluginhooks']['global_footerlink'];?> 

        <?php if($_G['setting']['statcode']) { ?><?php echo $_G['setting']['statcode'];?><?php } ?></p>
                <div class="ft-share cl">
                    <a id="ft-wx" class="share iconfont pos" title="微信" href="javascript:;" target="_blank" rel="nofollow">
                        <i class="icon-weixin1"></i>
                        <div class="ft-wx-show"></div>
                    </a>

                    <a class="share iconfont pos" title="新浪微博" href="http://www.weibo.com" target="_blank" rel="nofollow">
                        <i class="icon-sina"></i>
                    </a>
                    <a class="share iconfont pos" title="腾讯QQ" href="http://wpa.qq.com/msgrd?v=3&amp;uin=1315893744&amp;site=qq&amp;menu=yes" target="_blank" rel="nofollow">
                        <i class="icon-qq"></i>
                    </a>
                    <!--<a target="_blank" href="#" style="width: 79px; height : 30px; margin-right: 5px;"><img style="border: none;" alt="安全联盟认证" src="template/quater_6_ui/src/hy_83x30.png" height="30" width="83"></a>-->
                    <!--<a target="_blank" href="#" style="width: 79px; height : 30px;"><img style="border: none;" alt="信任网站" src="template/quater_6_ui/src/cnnic.png" height="30"></a>-->
                    <style>
                        #kx_verify_link { width: 79px; height: 28px; }
                    </style>
            </div>
        </div><!-- ft -->
    </div><!-- wpn -->
</div>
  </div><?php updatesession();?> 
<?php if($_G['uid'] && $_G['group']['allowinvisible']) { ?> 
<script type="text/javascript">
var invisiblestatus = '<?php if($_G['session']['invisible']) { ?>隐身<?php } else { ?>在线<?php } ?>';
var loginstatusobj = $('loginstatusid');
if(loginstatusobj != undefined && loginstatusobj != null) loginstatusobj.innerHTML = invisiblestatus;
</script> 
<?php } ?> 

<?php } ?> 

<?php if(!$_G['setting']['bbclosed'] && !$_G['member']['freeze'] && !$_G['member']['groupexpiry']) { ?> 
<?php if($_G['uid'] && !isset($_G['cookie']['checkpm'])) { ?> 
<script src="home.php?mod=spacecp&ac=pm&op=checknewpm&rand=<?php echo $_G['timestamp'];?>" type="text/javascript"></script> 
<?php } ?> 

<?php if($_G['uid'] && helper_access::check_module('follow') && !isset($_G['cookie']['checkfollow'])) { ?> 
<script src="home.php?mod=spacecp&ac=follow&op=checkfeed&rand=<?php echo $_G['timestamp'];?>" type="text/javascript"></script> 
<?php } ?> 

<?php if(!isset($_G['cookie']['sendmail'])) { ?> 
<script src="home.php?mod=misc&ac=sendmail&rand=<?php echo $_G['timestamp'];?>" type="text/javascript"></script> 
<?php } ?> 

<?php if($_G['uid'] && $_G['member']['allowadmincp'] == 1 && !isset($_G['cookie']['checkpatch'])) { ?> 
<script src="misc.php?mod=patch&action=checkpatch&rand=<?php echo $_G['timestamp'];?>" type="text/javascript"></script> 
<?php } ?> 
<?php } ?> 

<?php if($_GET['diy'] == 'yes') { ?> 
<?php if(check_diy_perm($topic) && (empty($do) || $do != 'index')) { ?> 
<script src="<?php echo $_G['setting']['jspath'];?>common_diy.js?<?php echo VERHASH;?>" type="text/javascript"></script> 
<script src="<?php echo $_G['setting']['jspath'];?>portal_diy<?php if(!check_diy_perm($topic, 'layout')) { ?>_data<?php } ?>.js?<?php echo VERHASH;?>" type="text/javascript"></script> 
<?php } ?> 
<?php if($space['self'] && CURMODULE == 'space' && $do == 'index') { ?> 
<script src="<?php echo $_G['setting']['jspath'];?>common_diy.js?<?php echo VERHASH;?>" type="text/javascript"></script> 
<script src="<?php echo $_G['setting']['jspath'];?>space_diy.js?<?php echo VERHASH;?>" type="text/javascript"></script> 
<?php } ?> 
<?php } ?> 
<?php if($_G['uid'] && $_G['member']['allowadmincp'] == 1 && $_G['setting']['showpatchnotice'] == 1) { ?> 
<script type="text/javascript">patchNotice();</script> 
<?php } ?> 
<?php if($_G['uid'] && $_G['member']['allowadmincp'] == 1 && empty($_G['cookie']['pluginnotice'])) { ?>
<div class="focus plugin" id="plugin_notice"></div>
<script type="text/javascript">pluginNotice();</script> 
<?php } ?> 
<?php if(!$_G['setting']['bbclosed'] && !$_G['member']['freeze'] && !$_G['member']['groupexpiry'] && $_G['setting']['disableipnotice'] != 1 && $_G['uid'] && !empty($_G['cookie']['lip'])) { ?>
<div class="focus plugin" id="ip_notice"></div>
<script type="text/javascript">ipNotice();</script> 
<?php } ?> 
<?php if($_G['member']['newprompt'] && (empty($_G['cookie']['promptstate_'.$_G['uid']]) || $_G['cookie']['promptstate_'.$_G['uid']] != $_G['member']['newprompt']) && $_GET['do'] != 'notice') { ?> 
<script type="text/javascript">noticeTitle();</script> 
<?php } ?> 

<?php if(($_G['member']['newpm'] || $_G['member']['newprompt']) && empty($_G['cookie']['ignore_notice'])) { ?> 
<script src="<?php echo $_G['setting']['jspath'];?>html5notification.js?<?php echo VERHASH;?>" type="text/javascript"></script> 
<script type="text/javascript">
var h5n = new Html5notification();
if(h5n.issupport()) {
<?php if($_G['member']['newpm'] && $_GET['do'] != 'pm') { ?>
h5n.shownotification('pm', '<?php echo $_G['siteurl'];?>home.php?mod=space&do=pm', '<?php echo avatar($_G[uid],small,true);?>', '新的短消息', '有新的短消息，快去看看吧');
<?php } if($_G['member']['newprompt'] && $_GET['do'] != 'notice') { if(is_array($_G['member']['category_num'])) foreach($_G['member']['category_num'] as $key => $val) { $noticetitle = lang('template', 'notice_'.$key);?>h5n.shownotification('notice_<?php echo $key;?>', '<?php echo $_G['siteurl'];?>home.php?mod=space&do=notice&view=<?php echo $key;?>', '<?php echo avatar($_G[uid],small,true);?>', '<?php echo $noticetitle;?> (<?php echo $val;?>)', '有新的提醒，快去看看吧');
<?php } } ?>
}
</script> 
<?php } ?> <?php userappprompt();?> 
<?php if($_G['basescript'] != 'userapp') { ?>

<div id="share">
<a id="totop" title="">返回顶部</a>
<a class="service" title="QQ" target="_blank" href="http://wpa.qq.com/msgrd?v=3&amp;uin=1315893744&amp;site=qq&amp;menu=yes"><i class="icon-qq"></i></a>
<a class="feedback" title="反馈" href="#">反馈</a>
</div>
<script type="text/javascript">
jQuery.noConflict();
jQuery(function(){
        //首先将#back-to-top隐藏
        jQuery("#share").hide();
        //当滚动条的位置处于距顶部100像素以下时，跳转链接出现，否则消失
        jQuery(function () {
            jQuery(window).scroll(function(){
                if (jQuery(window).scrollTop()>100){
                    jQuery("#share").fadeIn();
                }
                else
                {
                    jQuery("#share").fadeOut();
                }
            });
            //当点击跳转链接后，回到页面顶部位置
            jQuery("#totop").click(function(){
                jQuery('body,html').animate({scrollTop:0},500);
                return false;
            });
        });
    }); 
</script>

<?php } ?> 
<?php if(isset($_G['makehtml'])) { ?> 
<script src="<?php echo $_G['setting']['jspath'];?>html2dynamic.js?<?php echo VERHASH;?>" type="text/javascript"></script> 
<script type="text/javascript">
var html_lostmodify = <?php echo TIMESTAMP;?>;
htmlGetUserStatus();
<?php if(isset($_G['htmlcheckupdate'])) { ?>
htmlCheckUpdate();
<?php } ?>
</script> 
<?php } ?> <?php output();?></div>
</div>
</body></html>
