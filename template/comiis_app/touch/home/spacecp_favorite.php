<?PHP exit('Access Denied');?>
<!--{template common/header}-->
{lang favorite_description_default}
<div class="comiis_tip comiis_tip_form bg_f cl">
<!--{if $_GET['op'] == 'delete'}-->
	<form id="favoriteform_{$favid}" name="favoriteform_{$favid}" method="post" autocomplete="off" action="home.php?mod=spacecp&ac=favorite&op=delete&favid=$favid&type=$_GET[type]&mobile=2">
		<input type="hidden" name="referer" value="{eval echo dreferer();}" />
		<input type="hidden" name="deletesubmit" value="true" />
		<input type="hidden" name="formhash" value="{FORMHASH}" />
		<input type="hidden" name="handlekey" value="{if ($_GET[type] == 'forum' || $_GET[type] == 'group') && $_G['basescript'] != 'home'}favorite_del{else}comiis{/if}" />
		<dt><p style="text-align:center;"><!--{if $_GET[type] == 'forum'}-->{$comiis_lang['all10']}{$comiis_lang['list1']}?<!--{elseif $_GET[type] == 'thread'}-->{lang delete_favorite_message}<!--{else}-->{$comiis_lang['all13']}{$comiis_lang['all11']}<!--{/if}--></p></dt>
		<dd class="b_t cl">
            <!--{if $comiis_app_switch['comiis_post_btnwz'] == 1}-->
                <a href="javascript:;" onclick="popup.close();" class="tip_btn bg_f f_b">{lang cancel}</a>
                <button type="submit" name="deletesubmitbtn" value="{lang determine}" class="formdialog tip_btn bg_f f_0" comiis="handle"><span class="tip_lx">{lang determine}</span></button>
			<!--{else}-->
                <input type="submit" name="deletesubmitbtn" value="{lang determine}" class="formdialog tip_btn bg_f f_0" comiis="handle">
                <a href="javascript:;" onclick="popup.close();" class="tip_btn bg_f f_b"><span class="tip_lx">{lang cancel}</span></a>
			<!--{/if}-->
		</dd>	
	</form>
<!--{else}-->
	<!--{eval comiis_load('RlYZK5ETgzBLUmKyKy', 'id,type,spaceuid,description');}-->
<!--{/if}-->
</div>
<!--{template common/footer}-->