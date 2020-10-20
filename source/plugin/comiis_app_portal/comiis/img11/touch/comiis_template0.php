<?PHP exit('Access Denied');?>
<div class="comis_mhimg_music cl">
    <ul>
    <!--{loop $comiis['itemlist'] $temp}-->
        <li>
            <a href="{$temp['url']}" title="{$temp['fields']['fulltitle']}">
            <div class="yymk_mkbg cl"><img {if $comiis_app_switch['comiis_loadimg']}src="./template/comiis_app/pic/none.png" comiis_loadimages={else}src={/if}"{if $temp['picflag'] == 0}{$temp['pic']}{else}{if $temp['picflag'] == 2}{$_G['setting']['ftp']['attachurl']}{else}{$_G['setting']['attachurl']}{/if}{if $temp['makethumb'] == 1}{$temp['thumbpath']}{else}{$temp['pic']}{/if}{/if}" width="100%" alt="{$temp['fields']['fulltitle']}" class="b_ok vm" /></div>
            <h4>{$temp['title']}</h4>
            </a>
        </li>
    <!--{/loop}-->
    </ul>
</div>
