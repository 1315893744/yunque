<?php echo '';exit;?>
<!--{template common/header}-->
<div class="comiis_tip comiis_input_style bg_f cl">
<form id="medalform" method="post" autocomplete="off" action="home.php?mod=medal&action=apply&medalsubmit=yes">
    <input type="hidden" name="formhash" value="{FORMHASH}" />
    <input type="hidden" name="medalid" value="$medal[medalid]" />
    <input type="hidden" name="operation" value="" />
    <!--{if !empty($_GET['infloat'])}--><input type="hidden" name="handlekey" value="$_GET['handlekey']" /><!--{/if}-->
    <div class="comiis_ratetop comiis_p5 bg_e b_b cl">
        <a href="javascript:;" onclick="popup.close();" class="ratetop_close f_d"><i class="comiis_font">&#xe639</i></a>
        <span class="ratetop_tx"><img src="{STATICURL}image/common/$medal[image]" alt="$medal[name]" style="margin-top:20px;height:30px;width:auto;border-radius:0;" />$medal[name]</span>
        <p class="f_c" style="padding:5px 12px;">$medal[description]</p>
    </div>
    <ul class="comiis_p5 cl">
        <li class="comiis_styli f_a" style="padding-top:5px;padding-bottom:0;text-align:center;">
            <!--{if $medal[expiration]}-->
                {lang expire} $medal[expiration] {lang days}<br>
            <!--{/if}-->
            <!--{if $medal[permission]}-->
                $medal[permission]<br>
            <!--{/if}-->
            <!--{if $medal[type] == 0}-->
                {lang medals_type_0}
            <!--{elseif $medal[type] == 1}-->
                <!--{if $medal['price']}-->
                    <!--{if {$_G['setting']['extcredits'][$medal[credit]][unit]}}-->
                        {$_G['setting']['extcredits'][$medal[credit]][title]} $medal[price] {$_G['setting']['extcredits'][$medal[credit]][unit]}
                    <!--{else}-->
                        $medal[price] {$_G['setting']['extcredits'][$medal[credit]][title]}
                    <!--{/if}-->
                <!--{else}-->
                    {lang medals_type_1}
                <!--{/if}-->
            <!--{elseif $medal[type] == 2}-->
                {lang medals_type_2}
            <!--{/if}-->
        </li>
        <li class="comiis_stylino mt10 mb12">
            <!--{if $medal[type] && $_G['uid']}-->
                <button  class="formdialog comiis_btn bg_c f_f" type="submit" value="true" name="medalsubmit">
                    <!--{if $medal['price']}-->
                        {lang space_medal_buy}
                    <!--{else}-->
                        <!--{if !$medal[permission]}-->
                            {lang medals_apply}
                        <!--{else}-->
                            {lang medals_draw}
                        <!--{/if}-->
                    <!--{/if}-->
                </button>
            <!--{/if}-->
        </li>
    </ul>
</form>
</div>
<!--{template common/footer}-->