<?PHP exit('Access Denied');?>
<!--{template common/header}-->
    <!--{if $allowinvite}-->
    <form method="post" id="newinvite" autocomplete="off" action="home.php?mod=spacecp&ac=invite&appid=$appid&ref">
        <!--{if $config[inviteaddcredit] || $config[invitedaddcredit]}-->
        <div class="comiis_p12 b_b f_c f14 cl">    
            {lang friend_invite_success}
            <!--{if $config[invitedaddcredit]}-->{lang you_get} <span class="f_a">$config[invitedaddcredit]</span> {lang unit}{$credittitle},<!--{/if}-->
            <!--{if $config[inviteaddcredit]}-->{lang friend_get} <span class="f_a">$config[inviteaddcredit]</span> {lang unit}{$credittitle},<!--{/if}-->
            {lang go_nuts}
        </div>
        <div class="styli_h10 bg_e b_b"></div>
        <!--{/if}-->
        <div class="comiis_styli mt5 f_c"><i class="comiis_font f_d">&#xe632;</i> {$comiis_lang['tip291']}:</div>
        <div class="comiis_invite comiis_flex">
            <div class="flex bg_e b_ok"><input type="text" name="invitenum" value="1" class="comiis_input f_a" /></div>
            <div class="styli_r"><button type="submit" name="invitesubmit_btn" value="true" class="comiis_sendbtn bg_0 f_f y">{lang get_invitation_code}</button></div>
        </div>
        <span id="return_newinvite" style="display:none;"></span>
     
        <div class="comiis_txttip f13 f_c">
            <p>{$comiis_lang['tip290']}{$extcredits[title]}<span class="f_a">$creditnum</span> $extcredits[unit] ( {lang you_have}$extcredits[title] <span id="haveallcredit" class="f_a">{$space[$creditkey]}</span> $extcredits[unit])<!--{if $space[$creditkey] < $creditnum}--><span class="f_a"><a href="home.php?mod=spacecp&ac=credit">{lang credit_recharge}</a></span><!--{/if}--></p>
            <!--{if $_G['group']['maxinviteday']}--><p>{$comiis_lang['tip292']}</p><!--{/if}-->
        </div>
            <div class="comiis_invite_box">
                <div class="comiis_sendbtn bg_c f_f"><i class="comiis_font">&#xe616;</i> {$comiis_lang['tip294']}</div>
            </div>
        <!--{if $list}-->
            <div class="comiis_invite_list">
                <ul>
                    <!--{loop $list $key $url}-->           
                    <li><div href="javascript:;" onclick="copy_url('$key');return false;" class="bg_e f_0">$key</div></li>
                    <!--{/loop}-->
                </ul>
            </div>
        <!--{else}-->
            <div class="comiis_notip comiis_sofa cl">
                <i class="comiis_font f_e cl">&#xe613;</i>
                <span class="f_d">{lang no_invitation_code}</span>
            </div>
        <!--{/if}-->
        <!--{if !$creditnum}-->
            <div class="comiis_invite_list">
                <div class="comiis_styli f_c" style="padding:10px 8px;font-size:13px;">{lang copy_invite_manage}:</div>
                <li class="kmall"><div href="javascript:;" onclick="copy_url('$inviteurl');return false;" class="bg_e f_0">$inviteurl</div></li>
            </div>
        <!--{/if}-->
        <!--{if $flist}-->          
            <div class="styli_h10 bg_e b_t b_b"></div>
            <div class="comiis_uibox cl">
                <h2 class="b_b"><i class="comiis_font f_d">&#xe629;</i>{lang invited_friend}</h2>
                <ul class="comiis_task_act cl">
                    <!--{loop $flist $key $value}-->
                    <li><a href="home.php?mod=space&uid=$value[fuid]&do=profile"><!--{avatar($value[fuid],small)}--><span class="f_c">$value[fusername]</span></a></li>
                    <!--{/loop}-->
                </ul>
            </div>
        <!--{/if}-->        
        <input type="hidden" name="handlekey" value="newinvite" />
        <input type="hidden" name="invitesubmit" value="true" />
        <input type="hidden" name="formhash" value="{FORMHASH}" />
    </form>
    <!--{else}-->
        <div class="comiis_notip comiis_sofa mt15 cl">
            <i class="comiis_font f_e cl">&#xe613;</i>
            <span class="f_d">{lang no_right_invite_friend}</span>
        </div>
    <!--{/if}-->
    <script>
    function copy_url(a){
        var save = function(e){
            e.clipboardData.setData('text/plain', a);
            e.preventDefault();
        }
        document.addEventListener('copy', save);
        var comiis_copy = document.execCommand('copy');
        document.removeEventListener('copy', save);
        if(comiis_copy){
            popup.open('{$comiis_lang['tip279']}', 'alert');
        }else{
            popup.open('{$comiis_lang['tip281']}', 'alerts');
        }
    }
    </script>
<!--{eval $comiis_foot = 'no';}-->
<!--{template common/footer}-->