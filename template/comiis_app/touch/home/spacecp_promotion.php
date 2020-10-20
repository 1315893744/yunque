<?PHP exit('Access Denied');?>
<!--{template common/header}-->
<!--{if $_G['setting']['creditspolicy']['promotion_visit'] || $_G['setting']['creditspolicy']['promotion_register']}-->
<div class="comiis_tg_box_tip bg_f b_b f_c cl">    
    <!--{if $_G['setting']['creditspolicy']['promotion_visit']}-->{$comiis_lang['post_promotion_url']}<!--{/if}-->
    <!--{if $_G['setting']['creditspolicy']['promotion_register']}-->
        <!--{if $_G['setting']['creditspolicy']['promotion_visit']}-->
            <br>{$comiis_lang['post_promotion_reg']}
        <!--{else}-->
            <br>{$comiis_lang['post_promotion']}
        <!--{/if}-->
    <!--{/if}-->
</div>
<div class="comiis_tg_box">
    <div class="comiis_tg_code_box bg_f b_ok">
        <div class="comiis_tg_code_img"><img src="https://www.kuaizhan.com/common/encode-png?large=true&data=$_G[siteurl]?fromuid=$_G[uid]" class="vm"></div>
        <div class="comiis_tg_code_user b_t">
        <img src="{echo avatar($_G[uid],middle,true)}?{echo time();}">
        <h2>{$_G[member][username]}</h2> 
        <p class="f_d">{$comiis_lang['tip302']}</p>
        </div>    
    </div>
    <div class="comiis_quote bg_h"><span class="f_c">{$comiis_lang['tip277']}</span><br><a href="forum.php" class="f_a"><i class="comiis_font">&#xe632;</i> {$comiis_lang['tip278']}</a></div>
</div>
<!--{/if}-->
<!--{eval $comiis_foot = 'no';}-->
<!--{template common/footer}-->