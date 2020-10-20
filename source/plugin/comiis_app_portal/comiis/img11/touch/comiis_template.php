<?PHP exit('Access Denied');?>
<style>
.comis_mhimg_music {padding:3px 12px 10px 0;overflow:hidden;}
.comis_mhimg_music li {float:left;width:calc(33.333% - 12px);margin-left:12px;margin-top:10px;}
.comis_mhimg_music li img {width:70%;}
.comis_mhimg_music .yymk_mkbg {background:url(./source/plugin/comiis_app_portal/image/mhimg_musicbg.png) no-repeat;background-position:right;background-size:60% auto;}
.comis_mhimg_music h2 {margin-top:6px;font-size:14px;height:18px;line-height:18px;overflow:hidden;}
</style>
<div class="comis_mhimg_music cl">
    <ul>
    <!--{loop $comiis['itemlist'] $temp}-->
        <li>
            <a href="{$temp['url']}" title="{$temp['fields']['fulltitle']}">
            <div class="yymk_mkbg cl"><img {if $comiis_app_switch['comiis_loadimg']}src="./template/comiis_app/pic/none.png" comiis_loadimages={else}src={/if}
"{if $temp['picflag'] == 0}{$temp['pic']}{else}{if $temp['picflag'] == 2}{$_G['setting']['ftp']['attachurl']}{else}{$_G['setting']['attachurl']}{/if}{if $temp['makethumb'] == 1}{$temp['thumbpath']}{else}{$temp['pic']}{/if}{/if}" alt="{$temp['fields']['fulltitle']}" class="bg_f b_ok vm comiis_img_whb{$data['id']}{if $comiis_app_switch['comiis_loadimg']} comiis_loadimages{/if}" alt="{$temp['fields']['fulltitle']}" /></div>
            <h2>{$temp['title']}</h2>
            </a>
        </li>
    <!--{/loop}-->
    </ul>
</div>
<script>$('.comiis_img_whb{$data['id']}').css('height', ($('.comiis_img_whb{$data['id']}').width() * {echo $comiis['picheight'] / $comiis['picwidth'];}) + 'px');</script>