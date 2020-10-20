<?PHP exit('Access Denied');?>
<style>
.comiis_mh_img19 {padding:12px;height:48px;line-height:24px;overflow:hidden;}
.comiis_mh_img19 span.kmtit {float:left;width:40px;height:48px;line-height:24px;font-size:16px;letter-spacing:2px;font-style:italic;padding-right:6px;font-weight:400;overflow:hidden;}
.comiis_mh_img19 span.kmx {float:left;width:1px;height:40px;line-height:40px;font-size:0;margin-top:5px;margin-right:12px;overflow:hidden;}
.comiis_mh_img19 li, .comiis_mh_img19 li a {display:block;height:48px;line-height:24px;font-size:16px;font-weight:400;overflow:hidden;}
.comiis_mh_img19 li a img {float:right;height:48px;margin-left:10px;border-radius:2px;overflow:hidden;}
</style>
<div class="comiis_mh_img19 cl">
    <span class="kmtit">{$comiis['summary']}</span>
    <span class="kmx b_r"></span>
	<div id="comiis_mh_img19{$data['id']}" style="height:48px;line-height:24px;overflow:hidden;">
        <ul>
        <!--{loop $comiis['itemlist'] $temp}-->
            <li><a href="{$temp['url']}" title="{$temp['fields']['fulltitle']}"><img {if $comiis_app_switch['comiis_loadimg']}src="./template/comiis_app/pic/none.png" comiis_loadimages={else}src={/if}
    "{if $temp['picflag'] == 0}{$temp['pic']}{else}{if $temp['picflag'] == 2}{$_G['setting']['ftp']['attachurl']}{else}{$_G['setting']['attachurl']}{/if}{if $temp['makethumb'] == 1}{$temp['thumbpath']}{else}{$temp['pic']}{/if}{/if}" alt="{$temp['fields']['fulltitle']}" class="vm {$data['id']}{if $comiis_app_switch['comiis_loadimg']} comiis_loadimages{/if}">{$temp['title']}</a></li>
        <!--{/loop}-->
        </ul>
	</div>
</div>
<script>comiis_app_portal_loop(48, 30, 5000, 'comiis_mh_img19{$data['id']}');</script>