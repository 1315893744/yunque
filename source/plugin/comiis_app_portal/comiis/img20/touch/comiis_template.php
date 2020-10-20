<?PHP exit('Access Denied');?>
<style>
.comiis_mh_img20 {padding:12px 12px 10px;overflow:hidden;}
.comiis_mh_img20 li {float:left;width:33%;padding-left:8px;padding-top:8px;box-sizing:border-box;}
.comiis_mh_img20 li.kmimg2 {width:34%;padding-left:0;}
.comiis_mh_img20 li a {display:block;width:100%;overflow:hidden;position:relative;}
.comiis_mh_img20 li img {object-fit:cover;width:100%;height:100%;}
.comiis_mh_img20 li .kmtit {width:100%;margin-top:8px;font-size:13px;height:36px;line-height:18px;overflow:hidden;}
.comiis_mh_img20 li .kmimg {width:100%;height:70px;overflow:hidden;}
.comiis_mh_img20 li.kmhot {float:none;width:100%;height:130px;padding:0;overflow:hidden;}
.comiis_mh_img20 li.kmhot .kmimg {float:right;width:calc(66% - 8px);height:130px;overflow:hidden;}
.comiis_mh_img20 li.kmhot .kmtit {float:left;width:34%;padding:0 8px;box-sizing:border-box;margin-top:0;height:100%;overflow:hidden;}
.comiis_mh_img20 li.kmhot .kmtit .kmhottop {width:100%;height:24px;line-height:24px;font-size:12px;}
.comiis_mh_img20 li.kmhot .kmtit .kmhottop span {display:inline-block;height:24px;line-height:24px;padding:0 6px;overflow:hidden;}
.comiis_mh_img20 li.kmhot .kmtit .kmhottit {margin:6px 0 5px;height:66px;line-height:22px;font-size:16px;font-weight:400;overflow:hidden;}
.comiis_mh_img20 li.kmhot .kmtit .kmhotfoot {width:100%;height:20px;line-height:20px;font-size:12px;padding-top:6px;position:relative;}
.comiis_mh_img20 li.kmhot .kmtit .kmhotfoot em {display:inline-block;position:absolute;left:0;top:0;height:2px;padding:0 6px;line-height:30px;overflow:hidden;}
</style>
<div class="comiis_mh_img20 cl">
	<ul>
	<!--{eval $kmnn = 0;}-->
    <!--{loop $comiis['itemlist'] $temp}-->
        <!--{eval $kmnn++;}-->
		<li{if $kmnn == 1} class="kmhot bg_e"{elseif $kmnn == 2} class="kmimg2"{/if}>
            <a href="{$temp['url']}" title="{$temp['fields']['fulltitle']}">
                <div class="kmimg"><img {if $comiis_app_switch['comiis_loadimg']}src="./template/comiis_app/pic/none.png" comiis_loadimages={else}src={/if}
    "{if $temp['picflag'] == 0}{$temp['pic']}{else}{if $temp['picflag'] == 2}{$_G['setting']['ftp']['attachurl']}{else}{$_G['setting']['attachurl']}{/if}{if $temp['makethumb'] == 1}{$temp['thumbpath']}{else}{$temp['pic']}{/if}{/if}" alt="{$temp['fields']['fulltitle']}" class="vm {$data['id']}{if $comiis_app_switch['comiis_loadimg']} comiis_loadimages{/if}"></div>
                <div class="kmtit">{if $kmnn == 1}<div class="kmhottop"><span class="bg_0 f_f">{$comiis['summary']}</span></div><div class="kmhottit cl">{/if}{$temp['title']}{if $kmnn == 1}</div><div class="kmhotfoot f_c"><em class="bg_0 f_0">{$comiis['summary']}</em>{if $temp['fields']['views']}{$temp['fields']['views']}{else}{$temp['fields']['viewnum']}{/if}{$comiis_portal['img20_c']}</div>{/if}</div>
            </a>
        </li>
    <!--{/loop}-->
	</ul>
</div>