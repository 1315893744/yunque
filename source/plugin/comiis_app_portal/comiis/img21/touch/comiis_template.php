<?PHP exit('Access Denied');?>
<style>
.comiis_mh_img21 {padding:7px;overflow:hidden;}
.comiis_mh_img21 a {float:left;width:calc(33% - 10px);height:100px;font-size:13px;margin:5px;overflow:hidden;position:relative;}
.comiis_mh_img21 a:nth-child(1) {width:calc(67% - 10px);height:210px;font-size:14px;}
.comiis_mh_img21 a:nth-child(4) {width:calc(34% - 10px);}
.comiis_mh_img21 a:nth-child(5) {width:calc(33% - 10px);}
.comiis_mh_img21 a img {object-fit:cover;width:100%;height:100%;vertical-align:middle;border-radius:4px;}
.comiis_mh_img21 a span {position:absolute;left:0;bottom:0;width:calc(100% - 10px);padding:1px 5px 0;text-align:center;height:26px;line-height:26px;background:rgba(0,0,0,0.3);color:#fff;overflow:hidden;border-radius:0 0 4px 4px;}
</style>
<div class="comiis_mh_img21 cl">
    <!--{loop $comiis['itemlist'] $temp}-->
    <a href="{$temp['url']}" title="{$temp['fields']['fulltitle']}"><img {if $comiis_app_switch['comiis_loadimg']}src="./template/comiis_app/pic/none.png" comiis_loadimages={else}src={/if}
"{if $temp['picflag'] == 0}{$temp['pic']}{else}{if $temp['picflag'] == 2}{$_G['setting']['ftp']['attachurl']}{else}{$_G['setting']['attachurl']}{/if}{if $temp['makethumb'] == 1}{$temp['thumbpath']}{else}{$temp['pic']}{/if}{/if}" alt="{$temp['fields']['fulltitle']}" class="vm {if $comiis_app_switch['comiis_loadimg']} comiis_loadimages{/if}"><span>{$temp['title']}</span></a>
    <!--{/loop}-->
</div>