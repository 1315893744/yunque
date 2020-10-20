<?PHP exit('Access Denied');?>
<!--{template common/header}-->
<div class="comiis_loginbox">
    <!--{if $comiis_isweixin == 1 && $comiis_app_switch['comiis_reg_zmtxt']}--><div class="comiis_login_tit">{$comiis_app_switch['comiis_reg_zmtxt']}</div><!--{/if}-->
    <form method="post" autocomplete="off" action="member.php?mod=getpasswd&uid=$uid&id=$hashid&sign=$_GET[sign]">
    <input type="hidden" name="formhash" value="{FORMHASH}" />
    <input type="hidden" name="getpwsubmit" value="true" />
    <div class="comiis_login_from{if $comiis_isweixin == 1 && $comiis_app_switch['comiis_reg_zmtxt']} bg_f b_t b_b{/if}"{if $comiis_isweixin != 1 || !$comiis_app_switch['comiis_reg_zmtxt']} style="margin:0;"{/if}>
		<ul{if $comiis_isweixin != 1 || !$comiis_app_switch['comiis_reg_zmtxt']} class="bg_f b_t b_b"{/if}>
            <li class="comiis_flex{if $comiis_isweixin != 1 || !$comiis_app_switch['comiis_reg_zmtxt']} qqli{/if} styli_zico f16">
                <div class="styli_tit"><!--{if $comiis_app_switch['comiis_reg_ico']==1}--><i class="comiis_font f_d">&#xe61e;</i><!--{/if}--><!--{if $comiis_app_switch['comiis_reg_tit']==1}-->{$comiis_lang['tip295']}<!--{/if}--></div>
                <div class="flex f_0">$member[username]</div>
            </li>
            <li class="comiis_flex{if $comiis_isweixin != 1 || !$comiis_app_switch['comiis_reg_zmtxt']} qqli{/if} styli_zico f16 b_t">
                <div class="styli_tit"><!--{if $comiis_app_switch['comiis_reg_ico']==1}--><i class="comiis_font f_d">&#xe61d;</i><!--{/if}--><!--{if $comiis_app_switch['comiis_reg_tit']==1}-->{$comiis_lang['tip171']}<!--{/if}--></div>
                <div class="flex"><input type="password" id="newpasswd1" name="newpasswd1" class="comiis_input kmshow" placeholder="{lang new_password}"></div>
            </li>
            <li class="comiis_flex{if $comiis_isweixin != 1 || !$comiis_app_switch['comiis_reg_zmtxt']} qqli{/if} styli_zico f16 b_t">
                <div class="styli_tit"><!--{if $comiis_app_switch['comiis_reg_ico']==1}--><i class="comiis_font f_d">&#xe6d2</i><!--{/if}--><!--{if $comiis_app_switch['comiis_reg_tit']==1}-->{$comiis_lang['reg28']}<!--{/if}--></div>
                <div class="flex"><input type="password" id="newpasswd2" name="newpasswd2" class="comiis_input kmshow" placeholder="{lang new_password_confirm}"></div>
            </li>
        </ul>
    </div>
    <div class="btn_login comiis_btn_login"><button value="true" type="submit" name="" class="formdialog comiis_btn bg_c f_f">{lang submit}</button></div>
    </form>
	<div class="comiis_reg_link f_ok cl"><a href="member.php?mod=logging&action=login" class="y">{$comiis_lang['reg1']}</a><!--{if $_G['setting']['regstatus']}--><a href="member.php?mod={$_G[setting][regname]}">{$comiis_lang['reg3']}</a><!--{/if}--></div>
</div>
<!--{eval $comiis_foot = 'no';}-->
<!--{template common/footer}-->