<?PHP exit('Access Denied');?>
<div id="comiis_poster_box" class="comiis_poster_nkcrg">
	<div class="comiis_poster_box">
		<div class="comiis_poster_okimg">
			<div style="padding:150px 0;" class="comiis_poster_load">
				<div class="loading_color">
				  <span class="loading_color1"></span>
				  <span class="loading_color2"></span>
				  <span class="loading_color3"></span>
				  <span class="loading_color4"></span>
				  <span class="loading_color5"></span>
				  <span class="loading_color6"></span>
				  <span class="loading_color7"></span>
				</div>
				<div class="comiis_poster_oktit">{$comiis_poster['tip3']}</div>
			</div>
			<div class="comiis_poster_imgshow" style="display:none">
				<img src="./source/plugin/comiis_poster/image/logo.png" class="vm" id="comiis_poster_images">
				<div class="comiis_poster_oktit">{$comiis_poster['tip2']}</div>
			</div>
		</div>
		<div class="comiis_poster_okclose"><a href="javascript:;" class="comiis_poster_closekey"><img src="./source/plugin/comiis_poster/image/comiis_poster_okclose.png" class="vm"></a></div>
	</div>
	<!--{if $comiis_poster_mob == 'list'}-->
		<div class="comiis_poster_box_img ccon cl">
			<div class="comiis_poster_tops">{if $_G['basescript'] == 'group'}{$comiis_poster['group_list']}{else}{$comiis_poster['forum_list']}{/if}</div>
			<div class="comiis_poster_imgs">
				<div class="kmbkbg"><img src="{if $_G[forum][banner] && !$subforumonly}{if $comiis_poster['openimage'] == 1}{echo './plugin.php?id=comiis_poster:comiis_poster_image&src='.urlencode($_G[forum][banner]);}{else}$_G[forum][banner]{/if}{else}{if $comiis_poster['list_topimg']}{$comiis_poster['list_topimg']}{else}./source/plugin/comiis_poster/image/bg.jpg{/if}{/if}" class="vm" id="comiis_poster_image"></div>
				<div class="kmbkimg"><img src="{if $_G['forum'][icon]}{if $comiis_poster['openimage'] == 1}{echo './plugin.php?id=comiis_poster:comiis_poster_image&src='.urlencode(($_G['basescript'] == 'group' ? $_G['forum']['icon'] : get_forumimg($_G['forum']['icon'])));}{else}{if $_G['basescript'] == 'group'}$_G['forum']['icon']{else}{echo get_forumimg($_G['forum']['icon']);}{/if}{/if}{else}{if $comiis_poster['logoimg']}{$comiis_poster['logoimg']}{else}./source/plugin/comiis_poster/image/logo.png{/if}{/if}" class="vm"></div> 
			</div>
			<div class="comiis_poster_tits">{$_G['forum'][name]}</div>
			<div class="comiis_poster_txts">{$_G[forum][description]}</div>
			<div class="comiis_poster_dico"><img src="./source/plugin/comiis_poster/image/comiis_poster_ico.png" class="vm"></div>        
			<div class="comiis_poster_x lefy"></div>
			<div class="comiis_poster_foot khgf">
				<img src="./plugin.php?id=comiis_poster&mod=qrcode&url={$comiis_poster_url}" class="kmewm dgek vm">
				{if $comiis_poster['tipico'] != 0}<img src="./source/plugin/comiis_poster/image/{if $comiis_poster['tipico'] == 1}comiis_poster_zw.png{elseif $comiis_poster['tipico'] == 2}comiis_poster_zwa.png{/if}?urgij" class="kmzw vm">{/if}
				<span class="kmzwtip{if $comiis_poster['tipico'] == 0}s{/if}">{$comiis_poster['tip']}</span>
			</div>
		</div>
	<!--{else}-->
		<div class="comiis_poster_box_img ccon cl">
			<div class="comiis_poster_img">{if $comiis_poster['time'] != 0}<div class="img_time">{if $comiis_poster['time'] == 2}{$comiis_poster_data['time']}{elseif $comiis_poster['time'] == 1}{echo dgmdate(time(), 'd<\s\p\a\n>Y/m</\s\p\a\n>');}{/if}</div>{/if}<img src="{if $comiis_poster_data['pic']}{$comiis_poster_data['pic']}{else}{if $comiis_poster['view_topimg']}{$comiis_poster['view_topimg']}{else}./source/plugin/comiis_poster/image/view_bg.jpg{/if}{/if}" class="vm" id="comiis_poster_image"></div>
			<div class="comiis_poster_tit{if $comiis_poster['showbody'] == 1}a{/if}">{if $_GET['do'] == 'album'}&#30456;&#20876;&#12298;{/if}{$comiis_poster_data['title']}{if $_GET['do'] == 'album'}&#12299;{/if}</div>
			{if $comiis_poster['showbody'] == 1}<div class="comiis_poster_txta">{$comiis_poster_data['message']}</div>{/if}
			<!--{if $comiis_poster_data['icon'] || $comiis_poster_data['user']}-->
                <div class="comiis_poster_user{if $comiis_poster['showbody'] == 1} comiis_poster_user_mt{/if}">
                    <img src="./source/plugin/comiis_poster/image/comiis_poster_ico.png" class="kmdico vm">
                    <div class="kmuser"><span class="kmby">BY</span><img src="{$comiis_poster_data['icon']}" class="vm">{$comiis_poster_data['user']}</div>
                </div>
			<!--{/if}-->
			<div class="comiis_poster_x lefy"></div>
			<div class="comiis_poster_foot khgf">
				<img src="./plugin.php?id=comiis_poster&mod=qrcode&url={$comiis_poster_url}" class="kmewm dgek vm">
				{if $comiis_poster['tipico'] != 0}<img src="./source/plugin/comiis_poster/image/{if $comiis_poster['tipico'] == 1}comiis_poster_zw.png{elseif $comiis_poster['tipico'] == 2}comiis_poster_zwa.png{/if}?urgij" class="kmzw vm">{/if}
				<span class="kmzwtip{if $comiis_poster['tipico'] == 0}s{/if}">{$comiis_poster['tip']}</span>
			</div>
		</div>
	<!--{/if}-->
</div>