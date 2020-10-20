<?PHP exit('Access Denied');?>
<!--{template common/header}-->
<div class="comiis_tip comiis_input_style bg_f cl">
	<form id="topicadminform" method="post" autocomplete="off" action="forum.php?mod=topicadmin&action=$_GET[action]&modsubmit=yes&modclick=yes&mobile=2" >
		<input type="hidden" name="formhash" value="{FORMHASH}" />
		<input type="hidden" name="fid" value="$_G[fid]" />
		<input type="hidden" name="tid" value="$_G[tid]" />
		<input type="hidden" name="page" value="$_G[page]" />
		<input type="hidden" name="reason" value="{lang topicadmin_mobile_mod}" />
		<!--{eval comiis_load('cGr88dA6DEaV844xlh', 'deleteid,banid,checkban,checkunban,warnpid,checkwarn,checkunwarn,forumselect,payment,thread,stickpid');}-->
		<dd class="b_t cl">
            <!--{if $comiis_app_switch['comiis_post_btnwz'] == 1}-->
                <a href="javascript:;" onclick="popup.close();" class="tip_btn bg_f f_b">{lang cancel}</a>
                <button type="submit" name="modsubmit" id="modsubmit" value="{lang confirms}" class="formdialog tip_btn bg_f f_0"><span class="tip_lx">{lang confirms}</span></button>
			<!--{else}-->
                <button type="submit" name="modsubmit" id="modsubmit" value="{lang confirms}" class="formdialog tip_btn bg_f f_0">{lang confirms}</button>
                <a href="javascript:;" onclick="popup.close();" class="tip_btn bg_f f_b"><span class="tip_lx">{lang cancel}</span></a>
			<!--{/if}-->
		</dd>
    </form>
</div>
<script>comiis_input_style();</script>
<!--{template common/footer}-->