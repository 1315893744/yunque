<?PHP exit('Access Denied');?>
<style>
.comiis_activity01 {padding:0 12px;overflow:hidden}
.comiis_activity01 li {width:100%;overflow:hidden;padding-top:12px}
.comiis_activity01 li:first-child {border-top:none !important}
.comiis_activity01 li a {display:block}
.comiis_activity01 li a .act_tit {line-height:26px;font-size:18px}
.comiis_activity01 li a .act_time {margin-top:3px;line-height:20px;font-size:12px}
.comiis_activity01 li a .act_time span {display:inline-block;padding:0 5px;margin-right:8px;border-radius:2px}
.comiis_activity01 li a .act_img {width:100%;margin:10px 0;overflow:hidden}
.comiis_activity01 li a .act_img img {width:100%;border-radius:3px}
.comiis_activity01 li a .act_btn {height:34px;line-height:34px;padding-bottom:15px;font-size:16px}
.comiis_activity01 li a .act_btn span {padding:0 5px;font-size:20px}
.comiis_activity01 li a .act_btn em {float:right;padding:0 16px;font-size:14px;border-radius:3px}
</style>
<div class="comiis_activity01 cl">
    <ul>
        <!--{loop $comiis['itemlist'] $temp}-->
        <li class="b_t">
            <a href="{$temp['url']}" title="{$temp['fields']['fulltitle']}">
                <div class="act_tit">{$temp['title']}</div>
                <div class="act_time f_a"><span class="bg_a f_f">{$temp['fields']['class']}</span>{$comiis_portal['activity01_c']}: {$temp['fields']['time']}</div>
                <div class="act_img"><img {if $comiis_app_switch['comiis_loadimg']}src="./template/comiis_app/pic/none.png" comiis_loadimages={else}src={/if}
"{if $temp['picflag'] == 0}{$temp['pic']}{else}{if $temp['picflag'] == 2}{$_G['setting']['ftp']['attachurl']}{else}{$_G['setting']['attachurl']}{/if}{if $temp['makethumb'] == 1}{$temp['thumbpath']}{else}{$temp['pic']}{/if}{/if}" alt="{$temp['fields']['fulltitle']}" class="vm{if $comiis_app_switch['comiis_loadimg']} comiis_loadimages{/if}"></div>
                <div class="act_btn f_c"><em class="bg_a f_f">{$comiis_portal['activity01_b']}</em> {$comiis_portal['activity01_d']}<span class="f_a">{$temp['fields']['applynumber']}</span>{$comiis_portal['activity01_e']}</div>
            </a>
        </li>
        <!--{/loop}-->
    </ul>
</div>