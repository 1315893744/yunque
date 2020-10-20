<?PHP exit('Access Denied');?>
<style>
.comiis_mhalbum_list {padding:7px 6px 6px;overflow:hidden;}
.comiis_mhalbum_list li {float:left;width:33.33%;padding:6px;box-sizing:border-box;}
.comiis_mhalbum_list li a {display:block;width:100%;overflow:hidden;position:relative;border-radius:2px;}
.comiis_mhalbum_list li img {width:100%;}
.comiis_mhalbum_list li .mhalbum_tit {display:block;width:100%;position:absolute;left:0;bottom:0;background:rgba(0,0,0,0.4);text-align:center;color:#fff;height:24px;line-height:24px;font-size:14px;overflow:hidden;text-overflow:ellipsis;white-space:nowrap;}
.comiis_mhalbum_list li .mhalbum_tit strong {font-weight:400;}
.comiis_mhalbum_list li .mhalbum_num {position:absolute;top:5px;right:5px;background:rgba(0,0,0,0.3);height:16px;line-height:16px;padding:0 5px;font-size:12px;border-radius:12px;}
.comiis_mhalbum_list li .mhalbum_num i {float:left;margin-right:3px;font-size:14px;}
</style>
<div class="comiis_mhalbum_list cl">
	<ul>
    <!--{loop $comiis['itemlist'] $temp}-->    
		<li>
          <a href="{$temp['url']}">
            <img {if $comiis_app_switch['comiis_loadimg']}src="./template/comiis_app/pic/none.png" comiis_loadimages={else}src={/if}"{if $temp['picflag'] == 2}{$_G['setting']['ftp']['attachurl']}{else}{$_G['setting']['attachurl']}{/if}{$temp['pic']}" class="vm{if $comiis_app_switch['comiis_loadimg']} comiis_loadimages{/if}">
            <span class="mhalbum_tit">{$temp['title']}</span>
            <span class="mhalbum_num f_f"><i class="comiis_mhfont">&#xe627;</i>{$temp['fields']['picnum']}</span>
          </a>
		</li>
		<!--{/loop}-->
	</ul>
</div>