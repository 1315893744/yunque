<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); hookscriptoutput('showmessage');?>
<?php if($param['login']) { dheader('Location:member.php?mod=logging&action=login');exit;?><?php } $comiis_bg = 1;$comiis_app_switch = $_G['cache']['comiis_app_switch'];$comiis_app_nav = $_G['cache']['comiis_app_nav'];?><?php include template('common/header'); if($_G['inajax']) { if($_GET['ac'] == 'privacy') { ?>
<?php echo $show_message;?>
<?php } else { ?>
<div class="comiis_tip bg_f cl">
<dt class="f_b" id="messagetext">
<p><?php echo $show_message;?></p>
</dt>
<?php if($_G['forcemobilemessage']) { ?>
<dd class="b_t f_14 cl">
                    <?php if($comiis_app_switch['comiis_post_btnwz'] == 1) { ?>
                        <a href="javascript:history.back();" class="tip_btn bg_f f_b">返回上一页</a>
                        <a href="<?php echo $_G['setting']['mobile']['pageurl'];?>" class="tip_btn bg_f f_0"><span class="tip_lx">继续访问</span></a>
                    <?php } else { ?>
                        <a href="<?php echo $_G['setting']['mobile']['pageurl'];?>" class="tip_btn bg_f f_0">继续访问</a>
                        <a href="javascript:history.back();" class="tip_btn bg_f f_b"><span class="tip_lx">返回上一页</span></a>
                    <?php } ?>
</dd>
<?php } if($url_forward && !$_GET['loc']) { ?>
<script type="text/javascript">
setTimeout(function() {
window.location.href = '<?php echo $url_forward;?>';
}, '3000');
</script>
<?php } elseif($allowreturn) { ?>
<dd class="b_t cl"><a href="javascript:;" onclick="popup.close();" class="tip_btn tip_all bg_f f_b"><span>关闭</span></dd>
<?php } ?>
</div>
<?php } } else { ?>
    <div class="comiis_password_top">
        <div class="comiis_password_ico"><i class="comiis_font f_e">&#xe69d;</i></div>
        <p class="f_c"><?php echo $show_message;?></p>
    </div>
    <div class="comiis_password_form cl">
        <?php if($_G['forcemobilemessage']) { ?>    
            <a href="<?php echo $_G['setting']['mobile']['pageurl'];?>" class="comiis_btns bg_c f_f">继续访问</a>
            <a href="javascript:history.back();" class="comiis_btns bg_0 f_f mt15">返回上一页</a>
        <?php } ?>
        <?php if($url_forward) { ?>
            <a href="<?php echo $url_forward;?>" class="comiis_btns bg_0 f_f mt15">点击此链接进行跳转</a>
        <script>
            setTimeout(function() {
                window.location.href = '<?php echo $url_forward;?>';
            }, 1000);
        </script>
        <?php } elseif($allowreturn) { ?>
            <a href="javascript:history.back();" class="comiis_btns bg_0 f_f mt15">[ 点击这里返回上一页 ]</a>
        <script>
            setTimeout(function() {
                history.back();
            }, 3000);
        </script>
        <?php } ?>
    </div>
<?php } $comiis_foot = 'no';?><?php include template('common/footer'); ?>