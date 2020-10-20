<?PHP exit('Access Denied');?>
<!--{if $param['login']}-->
	<!--{eval dheader('Location:member.php?mod=logging&action=login');exit;}-->
<!--{/if}-->
<!--{eval $comiis_bg = 1;$comiis_app_switch = $_G['cache']['comiis_app_switch'];$comiis_app_nav = $_G['cache']['comiis_app_nav'];}-->
<!--{template common/header}-->
<!--{if $_G['inajax']}-->
	<!--{if $_GET['ac'] == 'privacy'}-->
		$show_message
	<!--{else}-->
		<div class="comiis_tip bg_f cl">
			<dt class="f_b" id="messagetext">
				<p>$show_message</p>
			</dt>
			<!--{if $_G['forcemobilemessage']}-->
				<dd class="b_t f_14 cl">
                    <!--{if $comiis_app_switch['comiis_post_btnwz'] == 1}-->
                        <a href="javascript:history.back();" class="tip_btn bg_f f_b">{lang goback}</a>
                        <a href="{$_G['setting']['mobile']['pageurl']}" class="tip_btn bg_f f_0"><span class="tip_lx">{lang continue}</span></a>
                    <!--{else}-->
                        <a href="{$_G['setting']['mobile']['pageurl']}" class="tip_btn bg_f f_0">{lang continue}</a>
                        <a href="javascript:history.back();" class="tip_btn bg_f f_b"><span class="tip_lx">{lang goback}</span></a>
                    <!--{/if}-->
				</dd>
			<!--{/if}-->
			<!--{if $url_forward && !$_GET['loc']}-->
				<script type="text/javascript">
					setTimeout(function() {
						window.location.href = '$url_forward';
					}, '3000');
				</script>
			<!--{elseif $allowreturn}-->
				<dd class="b_t cl"><a href="javascript:;" onclick="popup.close();" class="tip_btn tip_all bg_f f_b"><span>{lang close}</span></dd>
			<!--{/if}-->
		</div>
	<!--{/if}-->
<!--{else}-->
    <div class="comiis_password_top">
        <div class="comiis_password_ico"><i class="comiis_font f_e">&#xe69d;</i></div>
        <p class="f_c">$show_message</p>
    </div>
    <div class="comiis_password_form cl">
        <!--{if $_G['forcemobilemessage']}-->    
            <a href="{$_G['setting']['mobile']['pageurl']}" class="comiis_btns bg_c f_f">{lang continue}</a>
            <a href="javascript:history.back();" class="comiis_btns bg_0 f_f mt15">{lang goback}</a>
        <!--{/if}-->
        <!--{if $url_forward}-->
            <a href="$url_forward" class="comiis_btns bg_0 f_f mt15">{lang message_forward_mobile}</a>
        <script>
            setTimeout(function() {
                window.location.href = '$url_forward';
            }, 1000);
        </script>
        <!--{elseif $allowreturn}-->
            <a href="javascript:history.back();" class="comiis_btns bg_0 f_f mt15">{lang message_go_back}</a>
        <script>
            setTimeout(function() {
                history.back();
            }, 3000);
        </script>
        <!--{/if}-->
    </div>
<!--{/if}-->
<!--{eval $comiis_foot = 'no';}-->
<!--{template common/footer}-->